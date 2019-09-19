<?php
session_start();
include_once'conexion.php';


$res =$mysqli->query("SELECT tipoVentilador, count(*) as number FROM desc_producto AS t1 INNER JOIN productos AS t2 ON t1.idProducto=t2.IdProducto GROUP BY tipoVentilador");



 $resp = $mysqli->query("SELECT YEAR(fecha_pedido), SUM(precio) as number FROM desc_producto AS t1 INNER JOIN productos AS t2 ON t1.idProducto=t2.IdProducto GROUP BY YEAR(fecha_pedido) ORDER BY fecha_pedido");


 $respo = $mysqli->query("SELECT fecha_pedido, SUM(precio) as number, tipoventilador FROM desc_producto AS t1 INNER JOIN productos AS t2 ON t1.idProducto=t2.IdProducto GROUP BY fecha_pedido ORDER BY fecha_pedido");




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
    <title>Reporte de pedidos</title>

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



    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    
<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(chartperiodo);
google.charts.setOnLoadCallback(chartfecha);
google.charts.setOnLoadCallback(chartfechahistorica);
google.charts.setOnLoadCallback(chartsucursal);
google.charts.setOnLoadCallback(chartusuarios);



 
// Draw the chart and set the chart values

function chartperiodo() {
  var data = google.visualization.arrayToDataTable([
                  ['tipoVentilador', 'cantidad'],
<?php

                    while($r=$res->fetch_array())
                    {
                        echo "['".$r['tipoVentilador']."', ".$r['number']."],";
                    }
?>

]);
 
// Optional; add a title and set the width and height of the chart
  var options = {

    'title':'tipo de ventilador vendido'
};
 
  // Display the chart inside the <div> element with id="ColumnChart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}

function chartsucursal() {
  var data = google.visualization.arrayToDataTable([
                  ['sucursal', 'cantidad'],
<?php
$ros =$mysqli->query("SELECT sucursal, count(*) as number FROM desc_producto AS t1 INNER JOIN sucursales AS t2 ON t1.idSucursal=t2.IdSucursal GROUP BY sucursal");

                    while($ir=$ros->fetch_array())
                    {
                        echo "['".$ir['sucursal']."', ".$ir['number']."],";
                    }
?>

]);
 
// Optional; add a title and set the width and height of the chart
  var options = {
    colors:['#09fcd9', '#32d527', '#f51414', '#f3b49f', '#f6c7b6'],
    'title':'productos solicitados por sucursal'
};
 
  // Display the chart inside the <div> element with id="ColumnChart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
  chart.draw(data, options);
}

function chartusuarios() {
  var data = google.visualization.arrayToDataTable([
                  ['sucursal', 'cantidad'],
<?php
$rosx =$mysqli->query("SELECT tipoUsuario, count(*) as number FROM usuarios GROUP BY tipoUsuario");

                    while($irr=$rosx->fetch_array())
                    {
                        echo "['".$irr['tipoUsuario']."', ".$irr['number']."],";
                    }
?>

]);
 
// Optional; add a title and set the width and height of the chart
  var options = {
    'title':'cantidad de usuarios del sistema'
};
 
  // Display the chart inside the <div> element with id="ColumnChart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart3'));
  chart.draw(data, options);
}
 


function chartfecha() {
  var data = google.visualization.arrayToDataTable([
                  ['Año', 'ventas'],
<?php

                    while($ro=$resp->fetch_array())
                    {
                        echo "['".$ro['YEAR(fecha_pedido)']."', ".$ro['number']."],";
                    }
?>

]);
 
// Optional; add a title and set the width and height of the chart
  var options = {
    'title':'ventas por año'
};
 
  // Display the chart inside the <div> element with id="ColumnChart"
  var chart = new google.visualization.ColumnChart(document.getElementById('columnchart'));
  chart.draw(data, options);
}


function chartfechahistorica() {
  var data = google.visualization.arrayToDataTable([
                  ['Fecha', 'ventas'],
<?php

                    while($rot=$respo->fetch_array())
                    {
                        echo "['".$rot['fecha_pedido']."', ".$rot['number']."],";
                    }
?>

]);
 
// Optional; add a title and set the width and height of the chart
  var options = {
    'title':'ventas historicas'
};
 
  // Display the chart inside the <div> element with id="ColumnChart"
  var chart = new google.visualization.LineChart(document.getElementById('column2'));
  chart.draw(data, options);
}


</script>





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
    <li class="breadcrumb-item active" aria-current="page">Zona Reportes</li>
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

          
<div class="container-fluid">
<div class="row">
    <br>


</div>
    
      <div class="container" style="margin-top:10px">
      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
      <div class='row'> 
        <div class='col-md-4'>
            <label>Reportes del sistema</label>
            
        </div>  
    </div>
    <div class="row">
        <hr>
        <div id="columnchart" style="width: 100%; height: 450px; margin-top:10px"></div>
        <br>
        <div id="piechart" style="width: 300px; height: 300px; margin-top:10px"></div>
&nbsp&nbsp&nbsp&nbsp&nbsp
        <div id="piechart2" style="width: 300px; height: 300px; margin-top:10px"></div>
        &nbsp&nbsp&nbsp&nbsp&nbsp
        <div id="piechart3" style="width: 300px; height: 300px; margin-top:10px"></div>
    </div>
    <div class="row">
        <div id="column2" style="width: 100%; height: 450px; margin-top:10px"></div>
    </div>
     <div class='row'> 

        <!----seleccionar periodo
        <div class='col-md-4'>
            <br>
            <select id="year" onchange="" class="form-control">
                <option value='2018'>Período 2018</option>
                <option value='2019' selected>Período 2019</option>
                <option value='2020' >Período 2020</option>
            </select>
        </div>  
    </div>
      </div>

    </div>    --> <!-- /container -->

       
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

<script>
    


</script>