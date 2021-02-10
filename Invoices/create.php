<?php
@session_start();
require_once "../assets/php/header.php";
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
            <h1 class="titulo">CREATE INVOICE</h1>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="assets/controller/controllerInvoices.php" method="post" class="form-row">
                <div class="form-group col-12 col-sm-12 col-md-4 col-lg-4">
                    <label for="">Fecha Factura:</label>
                    <input type="text" name="fecha_factura" id="fecha_factura" class="form-control datepicker" readonly required>
                </div>
                <div class="form-group col-12 col-sm-12 col-md-4 col-lg-4">
                    <label for="valor_factura">Valor Factura</label>
                    <input type="number" name="valor_factura" id="valor_factura" class="form-control" step="any" min="0" required>
                </div>
                <div class="form-group col-12 col-sm-12 col-md-4 col-lg-4">
                    <label for="id_moneda">Moneda:</label>
                    <select name="id_moneda" id="id_moneda" class="form-control" required>
                        <option value="">Selecciona</option>
                        <option value="1">COP</option>
                        <option value="2">USD</option>
                    </select>
                </div>
                <div class="form-group col-12 col-sm-12 col-md-4 col-lg-4">
                    <label for="id_estado">Estado</label>
                    <select name="id_estado" id="id_estado" class="form-control" required>
                        <option value="">Selecciona</option>
                        <option value="1">Completado</option>
                        <option value="2">Pendiente</option>
                    </select>
                </div>
                <div class="form-group col-12 col-sm-12 col-md-4 col-lg-4">
                    <label for="id_pais_factura">País</label>
                    <select name="id_pais_factura" id="id_pais_factura" class="form-control" required>
                        <option value="">Selecciona</option>
                        <option value="1">Colombia</option>
                        <option value="2">EEUU</option>
                    </select>
                </div>
                <div class="form-group col-12 col-sm-12 col-md-4 col-lg-4">
                    <input type="hidden" name="type" value="create">
                    <button type="submit" class="btn btn-primary btn-block mt-4" id="btnCreateInvoice"><i class="fas fa-save"></i>&nbsp;Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
require_once "../assets/php/footer.php";
?>