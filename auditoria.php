<?php
session_start();
include_once'funcmantenedorpedidos.php';


if(!isset($_SESSION['tipoUsuario'])){
    header('location: login.php');
}else{
    if($_SESSION['tipoUsuario']!="administrador"){
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
    <title>Actividades de Usuarios</title>

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
    <link href="vendor/vector-map/jqvmap.min.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar2">
            <div class="logo">
                <a href="index2.php">
                    <img src="images/srp.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        
                            
                            
                                
                                <li>
                                    <a href="index2.php">
                                        <i class="fas fa-home"></i>Home</a>
                                </li>
                                <li>
                                    <a href="mantenedorusuarios.php">
                                        <i class="fas fa-users"></i>Ingreso Usuarios</a>
                                </li>
                              
                                <li>
                                    <a href="asignacionproducto.php">
                                        <i class="fas fa-calendar-alt"></i>Asignar Pedidos</a>
                                </li>
                                <li>
                                    <a href="auditoria.php">
                                        <i class="fas fa-tasks"></i></i>Actividad Usuarios</a>
                                </li>
                                <li>
                                    <a href="zonareportes.php">
                                        <i class="fa fa-bar-chart" aria-hidden="true"></i>Reportes del sistema</a>
                                </li>

                                <li>
                                    <a href="mantenedorcategorias.php">
                                        <i class="fa fa-list-alt"></i>Mantención Categorias</a>
                                </li>
                                <li>
                                    <a href="mantenedorsucursales.php">
                                        <i class="fas fa-building"></i>Mantención Sucursales</a>
                                </li>
                                  <li>
                                    <a href="mantenedorpedidos.php">
                                        <i class="fas fa-calendar-alt"></i>Mantención pedidos</a>
                                </li>

                                
                                 
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container2">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop2">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <div class="header-button">
                                <div class="noti-wrap">


                                    <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index2.php">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Actividad de usuarios</li>
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
                                            <a class="js-acc-btn" href="#"> <b><?php echo $_SESSION['nombreEmpresa']; ?> </b></a>
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
            <!-- END HEADER DESKTOP-->

            <!-- BREADCRUMB-->
           
            <!-- END BREADCRUMB-->
<br>
<br>
<br>
          


                <?php

 include('conexion.php');
?>
<div class="container-fluid">
    <div class="col-md-auto">
    <div class="row">
<div class="card" >
                                    <div class="card-header">Actividad Usuarios.</div>
                                    <div class="card-body card-block">
<table class="table table-bordered table-responsive">
        <tr>
            <td>Codigo:</td>
            <td>Usuario Responsable:</td>
            <td>tipo de Acción:</td>
            <td>fecha:</td>
            <td>tabla afectada:</td>
            <td>ID tabla afectada:</td>

        </tr>

        <?php
            
                    include'conexion.php';  
                    $res = $mysqli->query("SELECT * FROM tabla_auditoria ORDER BY fecha_auditoria DESC");

                    while($r=$res->fetch_array())
                    {
            ?>

      <tr>
            <td><?php echo $r['IdAuditoria'] ?></td>
            <td><?php echo $r['IdUser']?></td>
            <!--<td><?php echo $r['nombreEmpresa']?></td>-->
            <!--<td><?php echo $r['tipoUsuario'] ?></td>-->
            <td><?php echo $r['tipo_evento'] ?></td>
            <td><?php echo $r['fecha_auditoria'] ?></td>
            <td><?php echo $r['tabla_afectada'] ?></td>
            <td><?php echo $r['id_afectado'] ?></td>


        </tr>

        <?php } ?>

    </table>
    </div>
</div>
</div>
</div>
</div>




  


            

            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>Copyright © 2019 todos los derechos reservados.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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
    <script src="vendor/vector-map/jquery.vmap.js"></script>
    <script src="vendor/vector-map/jquery.vmap.min.js"></script>
    <script src="vendor/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="vendor/vector-map/jquery.vmap.world.js"></script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->