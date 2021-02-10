<?php
@session_start();
$url = dirname(dirname(__DIR__));
require_once($url."/assets/config/config.php");

class general{
    public $host;
    public $username;
    public $password;
    public $db;
    public $port;
    public $con;
    public $datosUsuario;

    public function __construct(){
        # Datos de conexión
        $this->host     = HOST;
        $this->username = USERNAME;
        $this->password = PASSWORD;
        $this->db       = DB;
        $this->port     = PORT;
        $this->con = $this->conexionBd();
        #$this->datosUsuario = $_SESSION;
    }

    public function setUserData($array){
        $this->datosUsuario = $array;
    }


    /** 
    *    Realiza la conexión a la base de datos
    *    @access public
    *    @param none
    *    @return conexion
    */
    public function conexionBd(){      
        try{
            /*En este caso el tipo es pgsql, además le indicamos el puerto */
            $this->con = new PDO('pgsql:host='.$this->host.';port='.$this->port.';dbname='.$this->db, $this->username, $this->password);
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->con;
        }catch(PDOException $e){
            echo "ERROR: " . $e->getMessage();
        }
    }


    /**
        *Ejecuta las sentencias sql
        * @access public
        * @param  string $sql sentencia a ejecutar
        *        array $param parametros que va a recibir la consulta para ejecutar
        * @return array $Array resultado de la consulta 
     */
    public function executeSql($sql, $param){
        try {
            $query = $this->conexionBd()->prepare($sql);
            
            
            if(!empty($param)){
                $result = $query->execute($param);
            }else{
                $result = $query->execute();
            }
            
            $ArrayQuery = array('INSERT', 'SELECT', 'UPDATE', 'DELETE');
            $ArraySql = explode(" ", $sql);
            $search = in_array($ArraySql[0], $ArrayQuery);
            
            if($search){
                if($ArraySql[0] == 'SELECT'){
                    if($query->rowCount() > 0){
                        while($row = $query->fetch(PDO::FETCH_ASSOC)){
                            $Array[] = array_map('utf8_encode', $row);
                        }
                        
                        $query->closeCursor();
                        if(!empty($Array)){
                            
                            return $Array;
                        }else{
                            return $result;
                        }
                    }else{
                        return false;
                    }
                }elseif($ArraySql[0] == 'INSERT'){
                    return $result;
                }else{
                    if($result){
                        return true;
                    }else{
                        return false;
                    }
                }
            }
        } catch (PDOException $th) {
            return "Error:".print_r($th);
        }
    }

    function cryptPassword($password){
        return md5($password . "+prueba_caravela");
    }

    /**
     * Destruye la conexión a la BD
     * @access public
     * @param none
     * @return none
     */
    public function __destruct(){
        $this->con = NULL;
    }
}

?>