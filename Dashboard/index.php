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
                <li><a href="#">HOME</a></li>
                <li><a href="../Invoices/">INVOICES</a></li>
                <li><a href="#">NEWS</a></li>
                <li><a href="#">CONTACT US</a></li>
                <li><a href="../Users/">USERS</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-white font-weight-bold">WELCOME TO</h1>
            <h1 class="text-white font-weight-bold">CLIENTS PORTAL</h1>
        </div>
    </div>
</div>
<footer>
    <p class="text-center text-secondary">
        Copyright © 2021 Caravela Limited, all rights reserved
    </p>
</footer>