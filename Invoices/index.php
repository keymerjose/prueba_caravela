<?php
@session_start();
require_once "../assets/php/header.php";
require_once "assets/model/invoicesClass.php";

$invoices = new invoices();

if(!empty($_GET)){
    $fecha_inicio = @$_GET['fecha_inicio'] ? @$_GET['fecha_inicio'] : '';
    $fecha_final = @$_GET['fecha_final'] ? @$_GET['fecha_final'] : '';
    $estatus = @$_GET['estatus'] ? @$_GET['estatus'] : NULL;

    if(!empty($fecha_inicio)){
        $fecha_inicio_pre = explode('/', $fecha_inicio);
        $fecha_inicio2 = $fecha_inicio_pre[2].'-'.$fecha_inicio_pre[0].'-'.$fecha_inicio_pre[1];
    }else{
        $fecha_inicio2  = '';
    }

    if(!empty($fecha_final)){
        $fecha_final_pre = explode('/', $fecha_final);
        $fecha_final2 = $fecha_final_pre[2].'-'.$fecha_final_pre[0].'-'.$fecha_final_pre[1];
    }else{
        $fecha_final2    = '';
    }
    
    $ArrayData = $invoices->get($fecha_inicio2, $fecha_final2, $estatus, $_SESSION['id_fiscal']);
}else{
    $fecha_inicio   = '';
    $fecha_final    = '';
    $estatus        = NULL;
    $ArrayData      = '';
}
?>
<link rel="stylesheet" href="assets/css/style.css">
<div class="container-fluid">
    <div class="row" id="pestana">
        <div class="col-12 text-right">
            <p class="font-weight-bold d-inline">Welcome, <?php echo $_SESSION['correo']; ?>&nbsp;|&nbsp;</p><a href="../assets/php/logout.php" class="font-weight-bold text-danger" title="Logout"><i class="fas fa-sign-out-alt"></i></a>
        </div>
    </div>
    <div class="row" id="cont-header">
        <div class="col-12">
            <ul>
                <li><img src="../assets/img/img-1.png"></li>
                <li><a href="../Dashboard/">HOME</a></li>
                <li><a href="../Invoices/">INVOICES</a></li>
                <li><a href="#">NEWS</a></li>
                <li><a href="#">CONTACT US</a></li>
                <li><a href="../Users/">USERS</a></li>
            </ul>
        </div>
        <div class="col-12">
            <h1 class="titulo">INVOICES</h1>
        </div>
        <div class="col-12 mb-3">
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="get" class="form-row">
                <div class="form-gorup col-12 col-sm-12 col-md-4 col-lg-4">
                    <label for="fecha_inicio">Date Start</label>
                    <input type="text" class="form-control form-control-sm datepicker" id="fecha_inicio" name="fecha_inicio" readonly value="<?php echo $fecha_inicio; ?>">
                </div>
                <div class="form-gorup col-12 col-sm-12 col-md-4 col-lg-4">
                    <label for="fecha_final">Date End</label>
                    <input type="text" class="form-control form-control-sm datepicker" id="fecha_final" name="fecha_final" readonly value="<?php echo $fecha_final; ?>">
                </div>
                <div class="form-gorup col-12 col-sm-12 col-md-2 col-lg-2">
                    <label for="estatus">Status</label>
                    <select name="estatus" id="estatus" class="form-control form-control-sm">
                        <option value="">Select</option>
                        <option value="1" <?php echo $estatus == 1 ? 'selected' : ''; ?> >Pending</option>
                        <option value="2" <?php echo $estatus == 2 ? 'selected' : ''; ?> >Complete</option>
                    </select>
                </div>
                <div class="form-gorup col-12 col-sm-12 col-md-2 col-lg-2">
                    <!-- <a href='<?php echo "./?fecha_inicio=$fecha_inicio&fecha_final=$fecha_final&estatus=$estatus"?>'' class="text-white float-left mt-4"><i class="fas fa-search"></i></a> -->
                    <button type="submit"class="btn btn-outline-light mt-4 ml-2" title="Buscar"><i class="fas fa-search"></i></button>
                    <a href="create.php" class="btn btn-outline-light float-left mt-4" title="Create"><i class="fas fa-plus"></i></a>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Number</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(!empty($ArrayData)){
                            foreach($ArrayData AS $key){
                                if($key['id_estado'] == 1){
                                    $estado = '<span class="badge badge-success">Completado</span>';
                                }elseif($key['id_estado'] == 2){
                                    $estado = '<span class="badge badge-secondary">Pendiente</span>';
                                }
                                echo '<tr>';
                                echo '<td>'.$key['fecha_factura'].'</td>';
                                echo '<td>'.$key['id_fiscal'].'</td>';
                                echo '<td>'.$key['moneda'].' '.number_format($key['valor_factura'], 2, ".", ",").'</td>';
                                echo '<td>'.$estado.'</td>';
                                echo '</tr>';
                            }
                        }else{
                            echo '<tr><td colspan=4>No hay resultados.</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<footer>
    <p class="text-center text-secondary">
        Copyright © 2021 Caravela Limited, all rights reserved
    </p>
</footer>
<?php
require_once "../assets/php/footer.php";
?>