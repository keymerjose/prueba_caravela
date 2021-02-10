<?php
$url = dirname(dirname(dirname(__DIR__)));
require_once($url."/Users/assets/model/usersClass.php");
require_once($url."/Enterprises/assets/model/enterprisesClass.php");
$users = new users();
$enterprises = new enterprises();

if(!empty($_REQUEST['type'])){
    if($_REQUEST['type'] == 'create'){
        $idempresa = $enterprises->create($_REQUEST['empresa']);
        $check = $users->create($_REQUEST['id_fiscal'], (int) $idempresa, $_REQUEST['correo'], $_REQUEST['telefono'], $_REQUEST['direccion'], $_REQUEST['contacto'], $_REQUEST['telefono_contacto'], $_REQUEST['email_contacto'], $_REQUEST['id_pais'] ? $_REQUEST['id_pais'] : NULL, $_REQUEST['password']);
        header('location: ../../../Users');
        die();
    }

    if($_REQUEST['type'] == 'consultar'){
        $check = $users->get($_REQUEST['valor']);
        if($check){
            die("1");
        }else{
            die("2");
        }
    }
}
?>