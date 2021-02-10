<?php
$url = dirname(dirname(dirname(__DIR__)));
require_once($url."/assets/model/generalClass.php");

class users extends general {
    /**
     * @desc    Crear usuario
     * @param   Int     $id_fiscal
     *          Int     $id_empresa
     *          String  $correo
     *          String  $telefono
     *          String  $direccion
     *          String  $contacto
     *          String  $telefono_contacto
     *          String  $email_contacto
     *          Int     $id_pais
     *          String  $password
     * @return  Boolean
     */
    public function create(Int $id_fiscal, Int $id_empresa, String $correo, String $telefono, String $direccion, String $contacto, String $telefono_contacto, String $email_contacto, ?Int $id_pais, String $password){
        $password = $this->cryptPassword($password);
        $sql = "INSERT INTO sys.clientes (id_fiscal, id_empresa, correo, telefono, direccion, contacto, telefono_contacto, email_contacto, id_pais, password) VALUES (:id_fiscal, :id_empresa, :correo, :telefono, :direccion, :contacto, :telefono_contacto, :email_contacto, :id_pais, :password)";
        $arrayParam = array(':id_fiscal' => $id_fiscal, ':id_empresa' => $id_empresa, ':correo' => $correo, ':telefono' => $telefono, ':direccion' => $direccion, ':contacto' => $contacto, ':telefono_contacto' => $telefono_contacto, ':email_contacto' => $email_contacto, ':id_pais' => $id_pais, ':password' => $password);
        return $this->executeSql($sql, $arrayParam);
    }

    /**
     * @desc    Obtener todos los usuarios
     * @param   String  $buscar
     * @return  Array   $Array
     */
    public function get(?string $buscar){
        $sql = "SELECT 
        clientes.*,
        empresa.nombre AS empresa,
        pais.nombre AS pais
        FROM sys.clientes 
        INNER JOIN sys.empresa ON clientes.id_empresa = empresa.id
        INNER JOIN sys.pais ON clientes.id_pais = pais.id
        WHERE TRUE";
        if(!empty($buscar)){
            $sql .= " AND (clientes.correo ILIKE '%$buscar%' OR clientes.telefono LIKE '%$buscar%' OR pais.nombre ILIKE '%$buscar%' OR empresa.nombre ILIKE '%$buscar%')";
        }
        $sql .= " ORDER BY clientes.correo ASC";
        return $this->executeSql($sql, '');
    }
}

?>