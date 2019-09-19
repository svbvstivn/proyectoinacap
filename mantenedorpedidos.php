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
    <title>Gestor de pedidos</title>

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

<body>
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
    <li class="breadcrumb-item active" aria-current="page">Mantención de pedidos</li>
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

           <div class="main-content">
                <div class="section__content section__content--p30">


                <?php

 include('conexion.php');
?>







<div class="container-fluid">
    <div class="row">
<div class="card" >
                                    <div class="card-header">Lista de pedidos realizados</div>
                                    <div class="card-body card-block">
        <table class="table-responsive-sm table-bordered">
        <tr>
            <td>Codigo de Producto:</td>
            <td>Codigo de Cliente:</td>
            <td>Nombre Cliente:</td>
            <td>Tipo de Ventilador:</td>
            <td>Caudal:</td>
            <td>RPM:</td>
            <td>temperatura:</td>
            <td>altura:</td>
            <td>Fecha de Solicitud:</td>
            <td>Acción:</td>
            
        </tr>

        <?php
            
                    include'conexion.php';  
                    $res = $mysqli->query("SELECT * FROM productos AS t1 INNER JOIN usuarios AS t2 ON t1.idUsuario=t2.Id");
                    while($r=$res->fetch_array())
                    {
            ?>

      <tr>
            <td><?php echo $r['IdProducto'] ?></td>
            <td><?php echo $r['IdUsuario']?></td>
            <td><?php echo $r['nombreEmpresa']?></td>
            <td><?php echo $r['tipoVentilador'] ?></td>
            <td><?php echo $r['caudal'] ?></td>
            <td><?php echo $r['RPM'] ?></td>
            <td><?php echo $r['temperatura'] ?></td>
            <td><?php echo $r['altura'] ?></td>
            <td><?php echo $r['fecha_pedido'] ?></td>
            <td>
                <a  class="btn btn-primary btn-sm" href="?edit=<?php echo $r['IdProducto']; ?>" onclick="return confirm('seguro que desea editar ?'); " >
                                            <i class="fa fa-dot-circle-o"></i> Editar
                                        </a>
                                        
                                        <a  class="btn btn-danger btn-sm" href="?del=<?php echo $r['IdProducto']; ?>" onclick="return confirm('seguro que desea eliminar?'); ">
                                            <i class="fa fa-ban"></i> Eliminar
                                    </a>
            </td>
        </tr>

        <?php } ?>

    </table>
    </div>
</div>
</div>
</div>




    <br>


                               <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Mantención:</strong> Pedidos
                                        <br>
                                        <p><small>*al pulsar editar, se trabaja con el Codigo del pedido para modificar*</small></p>
                                    </div>
                                    <div class="card-body card-block">
                                        <form  method="post" enctype="multipart/form-data" class="form-horizontal">
                                            
                                            
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Tipo de ventilador</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="txttipovent" id="txttipovent" class="form-control" placeholder="por favor seleccione" required>
                                                        <option value="">Por favor seleccione</option>
                                                        <option value="prefrio">Pre Frío</option>
                                                        <option value="axilar">Axilar</option>
                                                        
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Id Usuario</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="txtiduser" id="txtiduser" class="form-control" required>
                                                        <option value="">Por favor seleccione</option>
                                                        
                                                        <?php
                                                        $res = $mysqli->query("SELECT Id, nombreEmpresa FROM usuarios");

                                                        while($rou=$res->fetch_array())
                                                        {
                                                            echo "<option value='".$rou['Id']."'>".$rou['nombreEmpresa']."</option>";
                                                        }

                                                        ?>
                                                        
                                                        
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="password-input" class=" form-control-label">Caudal</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" id="txtcaudal" name="txtcaudal" placeholder="caudal" min="1" pattern="^[0-9]+" class="form-control" value="<?php if(isset($_GET['edit'])) echo $getROW['caudal'];  ?>" required>
                                                    <small class="help-block form-text">Ingrese el caudal del motor del cliente</small>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="password-input" class=" form-control-label">RPM</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" id="txtrpm" name="txtrpm" placeholder="rpm" min="1" pattern="^[0-9]+" class="form-control" value="<?php if(isset($_GET['edit'])) echo $getROW['RPM'];  ?>" required>
                                                    <small class="help-block form-text">ingrese los "RPM" del motor del cliente</small>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="password-input" class=" form-control-label">Temperatura</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" id="txttemp" name="txttemp" placeholder="temperatura" min="-25" max="30" class="form-control" value="<?php if(isset($_GET['edit'])) echo $getROW['temperatura'];  ?>" required>
                                                    <small class="help-block form-text">ingrese la temperatura en la cual se desea refrigerar</small>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="password-input" class=" form-control-label">Altura</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" id="txtaltura" name="txtaltura" placeholder="altura sobre el mar" min="1" max="150" pattern="^[0-9]+" class="form-control" value="<?php if(isset($_GET['edit'])) echo $getROW['altura'];  ?>" required>
                                                    <small class="help-block form-text">Ingrese la altura en metros sobre el nivel del mar donde se ubicara el ventilador.</small>
                                                </div>
                                            </div>
                                            
                                        
                                    </div>

                                    <div class="card-footer">
                                        <?php
                                    if(isset($_GET['edit']))
{
 ?>

                                        <button type="submit" class="btn btn-primary btn-sm"  name="update">
                                            <i class="fa fa-dot-circle-o" ></i> Update
                                        </button>
                                        <?php
}
else
{
 ?>

                                        <button type="submit" class="btn btn-primary btn-sm"  name="save">
                                            <i class="fa fa-dot-circle-o"></i> Ingresar
                                        </button>
                                         <?php
}
?>
                                        <button type="reset" class="btn btn-danger btn-sm" name="reset" >
                                            <i class="fa fa-ban"></i> Reiniciar
                                        </button>
                                    </div>

                                    </form>
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