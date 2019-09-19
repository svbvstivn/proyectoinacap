<?php
session_start();

include_once'funccancelarpedido.php';

if(!isset($_SESSION['tipoUsuario'])){
    header('location: login.php');
}else{
    if($_SESSION['tipoUsuario']!="cliente"){
    header('location: login.php');
}
}
?>
<!DOCTYPE html>



<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Ver Productos</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body>
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
       
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="images/srp.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        
                            
                                <li>
                                    <a href="index.php"><i class="fas fa-home"></i>Home</a>
                                </li>
                                <li>
                                    <a href="realizarpedido.php"><i class="fas fa-bell"></i>Solicitar Producto</a>
                                </li>
                                <li>
                                    <a href="verproductos.php"><i class="fas fa-clipboard-list"></i>Ver Productos</a>
                                </li>
                                
                                <li>
                                    <a href="verpedidos.php"><i class="fas fa-copy"></i></i>Pedidos procesados</a>
                                </li>
                                <li>
                                    <a href="acerca.php"><i class="fas fa-info"></i>Información del sitio.</a>
                                </li>         
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Ver productos solicitados</li>
  </ol>
</nav>
                                </div>
                               
                            </div>

                             <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="images/amrisalogo.jpg" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"> <?php echo $_SESSION['nombreEmpresa']; ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="images/amrisalogo.jpg" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"> <?php echo $_SESSION['nombreEmpresa']; ?></a>
                                                    </h5>
                                                    <span class="email"> <?php echo $_SESSION['correo']; ?></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="configcuenta.php">
                                                        <i class="zmdi zmdi-account"></i>CUENTA</a>
                                                </div>
                                                
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="logout.php">
                                                    <i class="zmdi zmdi-power"></i>Cerrar Sesión</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>

                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <h4>Aqui se encuentran los detalles especificos de los pedidos que usted ha realizado!</h4>
                        <br>
                        <p>Si no aparece ningún pedido en la tabla significa que usted no ha realizado ningún pedido.</p>
                        <br>
                        <p>tiene 5 días habiles para cancelar un producto solicitado, de lo contrario será procesado el pedido y no se podra cancelar</p>
                        <br>
                        <div class="col text-center">
                    <button type="button" class="btn btn-dark"><i class="fa fa-file-excel-o" aria-hidden="true"></i>        <a href="exportardata.php" target="_blank"> Descargar Lista en Excel</a></button>
                </div>
                    <br>

                        
<br>

                         <?php

 include('conexion.php');
?>

                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>Codigo de producto</th>
                                                <th>Tipo de Ventilador</th>
                                                <th>Caudal</th>
                                                <th class="text-right">Rpm</th>
                                                <th class="text-right">Temperatura</th>
                                                <th class="text-right">Altura</th>
                                                <th class="text-right">fecha de solicitud</th>
                                                <th>acción</th>
                                            </tr>
                                        </thead>

                                        <?php
            
                    include'conexion.php';
                    $idk= $_SESSION['Id'];  
                    $res = $mysqli->query("SELECT * FROM productos where IdUsuario='$idk'");
                    while($r=$res->fetch_array())
                    {
            ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $r['IdProducto'] ?></td>
                                                <td><?php echo $r['tipoVentilador'] ?></td>
                                                <td><?php echo $r['caudal'] ?></td>
                                                <td><?php echo $r['RPM'] ?></td>
                                                <td><?php echo $r['temperatura'] ?></td>
                                                <td><?php echo $r['altura'] ?></td>
                                                <td><?php echo $r['fecha_pedido'] ?></td>
                                                <td><a  class="btn btn-danger btn-sm" href="?del" onclick="return confirm('seguro que desea cancelar/eliminar este producto?'); ">
                                            <i class="fa fa-ban"></i> Cancelar
                                    </a></td>

                                            </tr>
                                                                                <?php 
    } 

    ?>
                                        </tbody>
                                    </table>
                                
 





                        



                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2019 todos los derechos reservados.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>
    

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
