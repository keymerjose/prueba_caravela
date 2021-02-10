<?php
@session_start();
$url = dirname(dirname(dirname(__DIR__)));
require_once($url."/Login/assets/model/loginClass.php");
$login = new loginClass();

if(!empty($_REQUEST['type'])){
    if($_REQUEST['type'] == 'login'){
        $check = $login->login($_REQUEST['login'], $_REQUEST['password']);
        if($check){
            $_SESSION = $check[0];
            die("1");
        }else{
            die("2");
        }
    }
}
?>