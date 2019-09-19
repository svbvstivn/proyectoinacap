<?php

session_start();
include_once'funcrealizarpedido.php';

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
    <title>Solicitud de ventilador</title>

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
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Solicitar Producto</li>
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
                        <div class="row">

                         
                         <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Solicitud de Producto.</strong> Ventilación
                                    </div>
                                                
                                    <div class="card-body card-block">
                                        <form  method="post" enctype="multipart/form-data" class="form-horizontal">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label">Pedido por:</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <p class="form-control-static"><?php echo $_SESSION['nombreEmpresa']; ?></p>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                
                                            <div class="col-12 col-md-9">
                                            <input type="hidden" size="25" name="txtid" id="txtid" value="<?php echo $_SESSION['Id'];?>" readonly/>
                                            </div>
                                        </div>
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Tipo de refrigeración.</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="txttipo" id="txttipo" class="form-control" required>
                                                        <option value="">Por favor seleccione</option>
                                                        <option value="prefrio">Envasado o sellado</option>
                                                        <option value="axial">Expuesto</option>
                                                        
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="password-input" class=" form-control-label">Espacio disponible</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="txtespacio" name="txtespacio" placeholder="Mts Disponibles" class="form-control" min="1" pattern="^[0-9]+" required>
                                                    <small class="help-block form-text">Espacio disponible en metros ej: 500</small>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="password-input" class=" form-control-label">Peso total a refrigerar</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="txtrpm" name="peso" min="1" max="600" placeholder="KG" class="form-control" min="1" pattern="^[0-9]+" required>
                                                    <small class="help-block form-text">Ingrese el peso en total en KG. ej:500</small>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="password-input" class=" form-control-label">temperatura Optima</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" id="txttemp" pattern="^[0-9]+" name="txttemp" placeholder="Temperatura" min="-10"  max="40" class="form-control" required >
                                                    <small class="help-block form-text">ingrese temperatura en grados.</small>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="password-input" class=" form-control-label">Altura sobre el mar</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="txtaltura" name="txtaltura" placeholder="Altura" class="form-control" min="1" max="600" pattern="^[0-9]+" required>
                                                    <small class="help-block form-text">ingrese altura sobre el nivel del mar</small>
                                                </div>
                                            </div>

                                            <div class="botones"> 


                                            <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Reiniciar
                                        </button>

                                        <button type="submit" class="btn btn-primary btn-sm" id="pedir" name="pedir" onclick="return confirm('seguro que desea realizar el pedido ?'); ">
                                            <i class="fa fa-dot-circle-o"></i> Ingresar
                                        </button>
                                        
                                    </div>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>   
                            </div>


                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2019 todos los derechos reservados.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>
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
