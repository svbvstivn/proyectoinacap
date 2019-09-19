<?php
session_start();

include_once'funcasignarprodu.php';




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
    <title>Asignación de pedidos</title>

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
   
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />


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
             <header class="header-desktop2">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <div class="header-button">
                                <div class="noti-wrap">


                                    <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index2.php">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Procesar pedidos</li>
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
    <div class="row">
<div class="card" >
                                    <div class="card-header">Lista de Pedidos</div>
                                    <div class="card-body card-block">
<table class="table-sm table-bordered table-responsive">
        <tr>
            <td>Codigo pedido</td>
            <td>Codigo de producto solicitado</td>
            <td>fecha solicitud</td>
            <td>Fecha de entrega</td>
            <td>Sucursal que elabora</td>
            <td>Nombre del Cliente</td>
            <td>Categoria del pedido</td>
            <td>Precio</td>
            <td>Descripción</td>
            <td>acción</td>
        </tr>

         

            <?php
            
                    include'conexion.php';  
                    $res = $mysqli->query("SELECT * FROM desc_producto AS t1 INNER JOIN productos AS t2 ON t1.idProducto=t2.IdProducto INNER JOIN usuarios AS t3 ON 
                        t3.Id=t2.idUsuario INNER JOIN sucursales AS t4 ON t4.idSucursal=t1.IdSucursal INNER JOIN categoria AS t5 ON t5.idCategoria=t1.IdCategoria ORDER BY fecha_pedido DESC");
                    while($r=$res->fetch_array())
                    {
            ?>



        <tr>
            <td><?php echo $r['id'] ?></td>
            <td><?php echo $r['IdProducto'] ?></td>
            <td><?php echo $r['fecha_pedido'] ?></td>
            <td><?php echo $r['fecha'] ?></td>
            <td><?php echo $r['sucursal']?></td>
            <td><?php echo $r['nombreEmpresa'] ?></td>
            <td><?php echo $r['categoria'] ?></td>
            <td><?php echo $r['precio'] ?></td>
            <td><?php echo $r['descripcionprodu'] ?></td>
            <td>

                
                                        <a  class="btn btn-primary btn-sm" href="?edit=<?php echo $r['id']; ?>" onclick="return confirm('seguro que desea editar?'); " >
                                            <i class="fa fa-dot-circle-o"></i> Editar
                                        </a>
                                        <a  class="btn btn-danger btn-sm" href="?del=<?php echo $r['id']; ?>" onclick="return confirm('seguro que desea eliminar?'); ">
                                            <i class="fa fa-ban"></i> Eliminar
                                    </a>
                                </td>
        </tr>
            
            
        
        <?php 
    } 

    ?>
    </table>
</div>
</div>
</div>


</div>


<div class="container-fluid">
    <div class="row">
<div class="col-md-auto">
    <div class="card">
                                    <div class="card-header">
                                        <strong>Formulario:</strong> Pedidos.
                                        <br>
                                        <p><small>*al pulsar editar, se trabaja con el Id para modificar*</small></p>
                                        <br>

                                        <?php 

                                        if(isset($_GET['edit'])) 
                                            echo "<p><small>Id que se esta editando:".$getROW['id']."</small></p>"


                                        ?>
                                    </div>
                                    <div class="card-body card-block">
                                        <form  method="post" enctype="multipart/form-data" class="form-horizontal" >
                                            
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class="form-control-label">Codigo de producto</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select  name="txtidprodu" id="txtidprodu" class="form-control" required>
                                                        <!--<option value="">Por favor seleccione</option>--->
                                                        <option value="">Seleccione</option>                                                       
                                                        <?php
                                                        $res = $mysqli->query("SELECT IdProducto FROM productos");

                                                        while($rou=$res->fetch_array())
                                                        {
                                                            echo "<option value='".$rou['IdProducto']."'>".$rou['IdProducto']."</option>";
                                                        }

                                                        ?>
                                                        
                                                        
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Sucursal</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select  name="txtsucursal" id="txtsucursal" class="form-control" required>
                                                        <!--<option value="">Por favor seleccione</option>--->
                                                        <option value="">Seleccione</option>                                                       
                                                        <?php
                                                        $rest = $mysqli->query("SELECT idSucursal, sucursal FROM sucursales");

                                                        while($rouw=$rest->fetch_array())
                                                        {
                                                            echo "<option value='".$rouw['idSucursal']."'>".$rouw['sucursal']."</option>";
                                                        }

                                                        ?>
                                                        
                                                        
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Categoria</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select  name="txtcategoria" id="txtcategoria" class="form-control" required>
                                                        <!--<option value="">Por favor seleccione</option>--->
                                                        <option value="">Seleccione</option>                                                       
                                                        <?php
                                                        $rest = $mysqli->query("SELECT idCategoria, categoria FROM categoria ");

                                                        while($rouw=$rest->fetch_array())
                                                        {
                                                            echo "<option value='".$rouw['idCategoria']."'>".$rouw['categoria']."</option>";
                                                        }

                                                        ?>
                                                        
                                                        
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Fecha de entrega:</label>
                                                </div>
                                                <div class="col col-md-9">
                                                    <input id="datepicker" pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" min="today"  name="txtfecha" value="<?php if(isset($_GET['edit'])) echo $getROW['fecha'];  ?>" class="form-control" width="276" value="" required />
   <script>
    var today, datepicker;
    today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
    datepicker = $('#datepicker').datepicker({
        minDate: today,
        format: 'yyyy-mm-dd',
        maxDate: '2021-12-31'
      

    });
 </script>
     






                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="password-input" class=" form-control-label">Precio del producto</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" id="txtprecio" name="txtprecio" placeholder="precio final" class="form-control" min="500000" max="2000000" pattern="^[0-9]+" value="<?php if(isset($_GET['edit'])) echo $getROW['precio'];  ?>" required>
                                                    <small class="help-block form-text">ingrese el precio final del producto, considere la documentación para calcular precio.</small>
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Descripcion de la entrega.</label>
                                                </div>
                                                <div class="col-12 col-md-9">

                                                    <textarea name="txtdesc" id="txtdesc" minlength="10" rows="9" placeholder="especifique si la entrega sera por despacho o retiro." class="form-control" value="<?php if(isset($_GET['edit'])) echo $getROW['descripcionprodu'];  ?>" required></textarea>
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
                            </div>


                            <div class="col-md-6">
<div class="card" >
                                    <div class="card-header">Codigo de producto y cliente que lo solicita.</div>
                                    <div class="card-body card-block">
<table class="table-sm table-bordered table-responsive">
        <tr>
            <td>Codigo producto</td>
            <td>nombre Cliente</td>
            <td>Tipo de Ventilador</td>
            <td>Caudal</td>
            <td>RPM</td>
            <td>temperatura</td>
            <td>altura</td>
            <td>Fecha de Solicitud</td>
        </tr>

         

            <?php
            
                    include'conexion.php';  
                    $res = $mysqli->query("SELECT * FROM productos AS t1 INNER JOIN usuarios AS t2 ON t1.idUsuario=t2.Id;");
                    while($r=$res->fetch_array())
                    {
            ?>



        <tr>
            <td><?php echo $r['IdProducto'] ?></td>
            <td><?php echo $r['nombreEmpresa'] ?></td>
            <td><?php echo $r['tipoVentilador'] ?></td>
            <td><?php echo $r['caudal'] ?></td>
            <td><?php echo $r['RPM'] ?></td>
            <td><?php echo $r['temperatura'] ?></td>
            <td><?php echo $r['altura'] ?></td>
            <td><?php echo $r['fecha_pedido'] ?></td>
        </tr>
            
        
        <?php 
    } 

    ?>
    </table>
</div>
</div>

<div class="col-md-auto">
<div class="card">
                                    <div class="card-header">Lista de sucursales</div>
                                    <div class="card-body card-block">
<table class="table table-bordered">
        <tr>
            <td>Sucursal</td>
            <td>ubicación</td>
        </tr>

         

            <?php
            
                    include'conexion.php';  
                    $res = $mysqli->query("SELECT * FROM sucursales");
                    while($r=$res->fetch_array())
                    {
            ?>



        <tr>
            <td><?php echo $r['sucursal'] ?></td>
            <td><?php echo $r['ubicacion'] ?></td>
        </tr>
            
        
        <?php 
    } 

    ?>

    </table>
</div>
</div>
</div>
</div>






                        </div>
                    </div>





<div class="col-4">
<div class="container-fluid">
    <div class="row">


</div>
</div>
</div>
           






<!--AQUI VA LO QUE ES CREACION DE UN USUARIO, ESO--->


<br>



                          






<!--aqui va el apartado del final de la pagina--->












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
    <script src="validar_usuario.js"></script>

</body>

</html>
<!-- end document-->