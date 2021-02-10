<?php
$url = dirname(dirname(dirname(__DIR__)));
require_once($url."/assets/model/generalClass.php");

class enterprises extends general{
    /**
     * @desc    Consultar Empresas
     * @param   String  $nombre
     * @return  Array   $Array
     */
    public function consultar(string $nombre){
        $nombre = strtolower($nombre);
        $sql = 'SELECT * FROM sys.empresa WHERE TRUE';
        if(!empty($nombre)){
            $sql .= " AND LOWER(empresa.nombre) = '$nombre'";
        }
        $sql .= "ORDER BY empresa.nombre ASC";
        return $this->executeSql($sql, '');
    }


    /**
     * @desc    Crear una empresa
     * @param   String  $nombre
     * @return  Boolean
     */
    public function create(string $nombre){
        $sql = "INSERT INTO sys.empresa (nombre) VALUES (:nombre) ON CONFLICT (nombre) DO NOTHING RETURNING id";
        $arrayParam = array(':nombre' => $nombre);
        $query = $this->conexionBd()->prepare($sql);
        $result = $query->execute($arrayParam);
        $row = $query->fetch(PDO::FETCH_ASSOC);
        if(!$row){
            $empresa = $this->consultar($nombre);
            return $empresa[0]['id'];
        }else{
            return $row['id'];
        }
        
    }
}
?>