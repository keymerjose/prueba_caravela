<?php
$url = dirname(dirname(dirname(__DIR__)));
require_once($url."/assets/model/generalClass.php");

class loginClass extends general{
    /**
     * @desc    Comprobar que el usuario exista, la constraseña corresponda y este activo
     * @param   String $email
     *          String $password
     * @return  Boolean
     */
    public function login(string $email, string $password){
        $password = $this->cryptPassword($password);
        $sql = 'SELECT * FROM sys.clientes WHERE correo = :email AND password = :password AND activo = 1';
        $arrayParam = array(':email' => $email, ':password' => $password);
        return $this->executeSql($sql, $arrayParam);
    }
}
?>