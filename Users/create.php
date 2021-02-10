<?php
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
            <h1 class="titulo">CREATE USER</h1>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="assets/controller/controllerUser.php" method="POST" id="formCreateUser" class="form-row">
                <div class="form-group col-12 col-sm-12 col-md-4 col-lg-4">
                    <label for="id_fiscal">ID Fiscal:</label>
                    <input type="number" name="id_fiscal" id="id_fiscal" class="form-control" required>
                </div>
                <div class="form-group col-12 col-sm-12 col-md-4 col-lg-4">
                    <label for="empresa">Empresa:</label>
                    <input type="text" name="empresa" id="empresa" class="form-control" required>
                </div>
                <div class="form-group col-12 col-sm-12 col-md-4 col-lg-4">
                    <label for="correo">Correo:</label>
                    <input type="text" name="correo" id="correo" class="form-control" required onblur="buscar_email(this.value)">
                    <small class="d-none text-danger">Este Email ya se encuentra registrado</small>
                </div>
                <div class="form-group col-12 col-sm-12 col-md-4 col-lg-4">
                    <label for="telefono">Teléfono:</label>
                    <input type="number" name="telefono" id="telefono" class="form-control" required>
                </div>
                <div class="form-group col-12 col-sm-12 col-md-4 col-lg-4">
                    <label for="direccion">Dirección:</label>
                    <input type="text" name="direccion" id="direccion" class="form-control" required>
                </div>
                <div class="form-group col-12 col-sm-12 col-md-4 col-lg-4">
                    <label for="contacto">Contacto:</label>
                    <input type="text" name="contacto" id="contacto" class="form-control" required>
                </div>
                <div class="form-group col-12 col-sm-12 col-md-4 col-lg-4">
                    <label for="telefono_contacto">Teléfono:</label>
                    <input type="number" name="telefono_contacto" id="telefono_contacto" class="form-control" required>
                </div>
                <div class="form-group col-12 col-sm-12 col-md-4 col-lg-4">
                    <label for="email_contacto">Correo:</label>
                    <input type="email" name="email_contacto" id="email_contacto" class="form-control" required>
                </div>
                <div class="form-group col-12 col-sm-12 col-md-4 col-lg-4">
                    <label for="id_pais">País:</label>
                    <select name="id_pais" id="id_pais" class="form-control">
                        <option value="">Seleccione</option>
                        <option value="1">Colombia</option>
                    </select>
                </div>
                <div class="form-group col-12 col-sm-12 col-md-4 col-lg-4">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <div class="form-group col-12 col-sm-12 col-md-4 col-lg-4">
                    <input type="hidden" name="type" value="create">
                    <button type="submit" class="btn btn-primary btn-block mt-4" id="btnCreateUser"><i class="fas fa-save"></i>&nbsp;Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="assets/js/myscript.js"></script>
<?php
require_once "../assets/php/footer.php";
?>
