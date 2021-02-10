<?php
@session_start();

if(!empty($_SESSION['id'])){
    header("Location: ../Dashboard/");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/vendor/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../assets/vendor/jquery-ui-1.12.1.custom/jquery-ui.min.css">
    <link rel="stylesheet" href="../assets/vendor/jquery-ui-1.12.1.custom/jquery-ui.structure.min.css">
    <link rel="stylesheet" href="../assets/vendor/jquery-ui-1.12.1.custom/jquery-ui.theme.min.css">
    <link rel="stylesheet" href="../assets/css/jquery-confirm.min.css">
    <link rel="stylesheet" href="../assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
    <script src="../assets/js/jquery-1.9.1.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/vendor/jquery-datatable/datatables.min.css"/>
    <link rel="stylesheet" href="assets/css/styles.css?v=1.0">
    <title>Document</title>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-4 col-lg-4">
            <form id="formLogin">
                <div class="form-group">
                    <img src="assets/img/img-2.png" class="logo w-50">
                </div>
                <div class="form-group">
                    <label for="email">Email Adress</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="form-group text-center">
                    <a class="btn btn-primary btn-sm text-white w-25" onclick="login()">Login</a>
                </div>
                <div class="form-group text-center">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="rememberme">
                        <label class="custom-control-label" for="rememberme">Remember me</label>
                    </div>
                </div>
                <div class="form-group text-center text-secondary">
                    <p>Copyright © 2021 Caravela Limited, all rights reserved</p>
                </div>
            </form>
        </div>
        <div class="d-sm-none d-md-block d-lg-block col-md-8 col-lg-8 img-login">

        </div>
    </div>
</div>

<script src="../assets/js/jquery-confirm.js"></script>
<script src="../assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="../assets/vendor/jquery-datatable/datatables.min.js"></script>
<script src="../assets/js/myscript.js?v=1.0"></script>
<script src="assets/js/myscript.js?v=1.0"></script>
</body>
</html>