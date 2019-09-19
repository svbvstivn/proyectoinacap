<?php
include_once'funcmantenedorusuarios.php';
include_once 'conexion.php';



session_start();

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
    <title>Creación de usuarios</title>

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
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    

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
    <li class="breadcrumb-item active" aria-current="page">Mantención de Usuarios</li>
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
          

 <?php
 ////////////////FILTRO DE RESULTADOS /////////////////////////


////variables de busqueda////



///////////////PAGINACIÓN DE LA BUSQUEDA EN PHP/////////////////////////////////
 $where="";

$totalresultados = 4;
if (isset($_GET['page'])&& !empty($_GET['page']))
{
    $paginaActual = $_GET['page'];
} else {
       $paginaActual = 1;
}


$totalSQL = $mysqli->query("SELECT * FROM usuarios $where");
$totalusuarios = mysqli_num_rows($totalSQL);
$comienzaDe = ($paginaActual * $totalresultados) - $totalresultados;

$ultimaPagina = ceil($totalusuarios/$totalresultados);
$primerapagina = 1;
$nextPage = $paginaActual + 1;
$previousPage = $paginaActual - 1;



////consulta base de datos///////////

$res = $mysqli->query("SELECT * FROM usuarios $where ORDER BY Id ASC LIMIT $comienzaDe, $totalresultados");

if(mysqli_num_rows($res)==0)
{
    $mensaje="<h1>No hay registros que coincidan con su busqueda</h1>";
}

 
?>

 <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        
                            



<br>


<script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "getData.php"
    });
} );
</script>
<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead class="thead-dark">
        <tr>
            <th>Id</th>
            <th>usuario</th>
            <th>contraseña</th>
            <th>nombre empresa</th>
            <th>correo</th>
            <th>descripción</th>
            <th>tipo de usuario</th>
            <th>Acción</th>
        </tr>
    </thead>

         

            <?php
            
                    

                    
                    while($r=$res->fetch_array())
                    {
                        
            ?>


<tbody>
        <tr>
            <td><?php echo $r['Id'] ?></td>
            <td><?php echo $r['usuario'] ?></td>
            <td><?php echo $r['password'] ?></td>
            <td><?php echo $r['nombreEmpresa'] ?></td>
            <td><?php echo $r['correo'] ?></td>
            <td><?php echo $r['descripcion'] ?></td>
            <td><?php echo $r['tipoUsuario'] ?></td>
            <td>
                
                                        <a  class="btn btn-primary btn-sm" href="?edit=<?php echo $r['Id']; ?>" onclick="return confirm('sure to edit !'); " >
                                            <i class="fa fa-dot-circle-o"></i> Editar
                                        </a>
                                        <a  class="btn btn-danger btn-sm" href="?del=<?php echo $r['Id']; ?>" onclick="return confirm('seguro que desea eliminar?'); ">
                                            <i class="fa fa-ban"></i> Eliminar
                                    </a></td>
        </tr>
</tbody>
            
            
        
        <?php 
    } 

    ?>
    </table>

    

 <nav aria-label="Page navigation example">
<ul class="pagination justify-content-center">
<?php if($paginaActual != $primerapagina) { ?>
<li class="page-item">
<a class="page-link" href="?page=<?php echo $primerapagina ?>" tabindex="-1" aria-label="Previous">
<span aria-hidden="true">Primera</span>
</a>
</li> &nbsp;
<?php } ?>
<?php if($paginaActual >= 2) { ?>
<li class="page-item"><a class="page-link" href="?page=<?php echo $previousPage ?>"><?php echo $previousPage ?></a></li> &nbsp; 
<?php } ?>
<li class="page-item active"><a class="page-link" href="?page=<?php echo $paginaActual ?>"><?php echo $paginaActual ?></a></li>&nbsp; 
<?php if($paginaActual != $ultimaPagina) { ?>
<li class="page-item"><a class="page-link" href="?page=<?php echo $nextPage ?>"><?php echo $nextPage ?></a></li> &nbsp; 
<li class="page-item">
<a class="page-link" href="?page=<?php echo $ultimaPagina ?>" aria-label="Next">
<span aria-hidden="true">Ultima</span>
</a>
</li>
<?php } ?>
</ul>
</nav>
    


<br>



<!--AQUI VA LO QUE ES CREACION DE UN USUARIO, ESO--->


<br>


<div class="col-lg-6">
    <div class="card">
                                    <div class="card-header">
                                        <strong>Formulario:</strong> Usuario
                                        <br>
                                        <p><small>*al pulsar editar, se trabaja con el Id para modificar*</small></p>
                                    </div>
                                    <div class="card-body card-block">
                                        <form  method="post" enctype="multipart/form-data" class="form-horizontal" >
                                            
                                            
                                            
                                            <div class="row form-group" >
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Tipo de usuario</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="txttipo" id="txttipo" class="form-control" placeholder="por favor seleccione" required>
                                                        <option value="">Por favor seleccione</option>
                                                        <option value="administrador">Administrador</option>
                                                        <option value="cliente">Cliente</option>
                                                        <option value="vendedor">Vendedor</option>
                                                        <option value="vendedor">Vendedor</option>
                                                        <option value="despacho">Despacho</option>
                                                        
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="password-input" class=" form-control-label">Usuario</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="form-text" id="txtuser" name="txtuser"  placeholder="nombre de usuario" class="form-control" value="<?php if(isset($_GET['edit'])) echo $getROW['usuario'];  ?>" required>
                                                    <small class="help-block form-text">Ingrese el usuario con el cual se accedera al sistema</small>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="password-input" class=" form-control-label">Contraseña</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="form-text" id="txtpass" name="txtpass" minlength="5" maxlength="10" placeholder="contraseña" class="form-control" value="<?php if(isset($_GET['edit'])) echo $getROW['password'];  ?>" required>
                                                    <small class="help-block form-text">ingrese la contraseña para el usuario</small>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="password-input" class=" form-control-label">Nombre de Empresa</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="form-text" id="txtname" name="txtname" placeholder="Empresa" class="form-control" value="<?php if(isset($_GET['edit'])) echo $getROW['nombreEmpresa'];  ?>" required>
                                                    <small class="help-block form-text">ingrese el nombre de la empresa o negocio al cual pertenece el usuario</small>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="password-input" class=" form-control-label">Correo</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="email" id="txtcorreo" name="txtcorreo" placeholder="Correo" class="form-control" value="<?php if(isset($_GET['edit'])) echo $getROW['correo'];  ?>" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" required>
                                                    <small class="help-block form-text">Ingrese el correo del usuario</small>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Descripcion</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="txtdesc" id="txtdesc" pattern="[A-Za-z]" rows="9" minlength="10" placeholder="escriba una breve descripción de la empresa del usuario" class="form-control" value="<?php if(isset($_GET['edit'])) echo $getROW['descripcion'];  ?>" required></textarea>
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