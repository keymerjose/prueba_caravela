<?php
require_once "../assets/php/header.php";
require_once "assets/model/usersClass.php";

$users = new users();

// if(!empty(@$_GET)){
    $buscar = @$_GET['buscar'] ? @$_GET['buscar'] : '';
    $ArrayData = $users->get($buscar);
// }else{
//     $buscar = '';
// }

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
            <h1 class="titulo">USERS</h1>
        </div>
        <div class="col-12">
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="get" id="formSearchUser">
                <div class="form-group titulo">
                    <input type="text" name="buscar" id="buscar" class="form-control form-control-sm w-75 d-inline-block" placeholder="<?php echo $buscar; ?>">
                    <a href="create.php" class="text-white" title="Crear Usuario"><i class="fas fa-user-plus"></i></a>
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
                            <th>Email</th>
                            <th>Empresa</th>
                            <th>Teléfono</th>
                            <th>País</th>
                            <th>Estatus</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(!empty($ArrayData)){
                            foreach($ArrayData AS $key){
                                if($key['activo'] == '1'){
                                    $estatus = '<span class="badge badge-success">Activo</span>';
                                }elseif($key['activo'] == '0'){
                                    $estatus = '<span class="badge badge-secondary">Eliminado</span>';
                                }

                                echo '<tr>';
                                echo '<td>'.$key['correo'].'</td>';
                                echo '<td>'.$key['empresa'].'</td>';
                                echo '<td>'.$key['telefono'].'</td>';
                                echo '<td>'.$key['pais'].'</td>';
                                echo '<td>'.$estatus.'</td>';
                                echo '</tr>';
                            }
                        }else{
                            echo '<tr><td colspan=5>No hay resultados.</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
require_once "../assets/php/footer.php";
?>
