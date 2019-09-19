

<?php

include_once 'conexion.php';

$currentUser = $_SESSION['nombreEmpresa'];

/* code for data insert */
if(isset($_POST['save']))
{

     $tipovent = $mysqli->real_escape_string($_POST['txttipovent']);
     $iduser = $mysqli->real_escape_string($_POST['txtiduser']);
     $caudal = $mysqli->real_escape_string($_POST['txtcaudal']);
     $rpm = $mysqli->real_escape_string($_POST['txtrpm']);
     $temp = $mysqli->real_escape_string($_POST['txttemp']);
     $altura = $mysqli->real_escape_string($_POST['txtaltura']);
 
  $SQL = $mysqli->query("INSERT INTO productos(IdUsuario,tipoVentilador,caudal,RPM,temperatura,altura, currentName) VALUES('$iduser','$tipovent','$caudal','$rpm','$temp','$altura', '$currentUser')");
  
  if(!$SQL)
  {
   echo $mysqli->error;
  } 
}
/* code for data insert */


/* code for data delete */
if(isset($_GET['del']))
{
  $SQL = $mysqli->query("UPDATE productos set currentName='$currentUser' WHERE IdProducto=".$_GET['del']);
 $SQL = $mysqli->query("DELETE FROM productos WHERE IdProducto=".$_GET['del']);
 header("Location: mantenedorpedidos.php");
}
/* code for data delete */



/* code for data update */
if(isset($_GET['edit']))
{
 $SQL = $mysqli->query("SELECT * FROM productos WHERE IdProducto=".$_GET['edit']);
 $getROW = $SQL->fetch_array();
}

if(isset($_POST['update']))
{
 $SQL = $mysqli->query("UPDATE productos SET IdUsuario='".$_POST['txtiduser']."', tipoVentilador='".$_POST['txttipovent']."', caudal='".$_POST['txtcaudal']."', RPM='".$_POST['txtrpm']."', temperatura='".$_POST['txttemp']."', altura='".$_POST['txtaltura']."', currentName='$currentUser' WHERE IdProducto=".$_GET['edit']);
 header("Location: mantenedorpedidos.php");
}
/* code for data update */

?>