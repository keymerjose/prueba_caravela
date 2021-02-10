<?php
session_start();
$url = dirname(dirname(dirname(__DIR__)));
require_once($url."/Invoices/assets/model/invoicesClass.php");
$invoices = new invoices();

if(!empty($_REQUEST['type'])){
    if($_REQUEST['type'] == 'create'){
        $id_fiscal = $_SESSION['id_fiscal'];
        $invoices->create($id_fiscal, $_REQUEST['fecha_factura'], $_REQUEST['valor_factura'], $_REQUEST['id_moneda'], $_REQUEST['id_estado'], $_REQUEST['id_pais_factura']);
        header('location: ../../../Invoices');
        die();
    }
}
?>