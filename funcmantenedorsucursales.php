<?php

include_once 'conexion.php';

/* code for data insert */
if(isset($_POST['save']))
{

     $sucu = $mysqli->real_escape_string($_POST['txtsucursal']);
     $ubi = $mysqli->real_escape_string($_POST['txtubicacion']);
     
   
  $SQL = $mysqli->query("INSERT INTO sucursales(sucursal,ubicacion) VALUES('$sucu','$ubi')");
header("Location: mantenedorsucursales.php");

  
  if(!$SQL)
  {
   echo $mysqli->error;
  } 
}

/* code for data insert */


/* code for data delete */
if(isset($_GET['del']))
{
 $SQL = $mysqli->query("DELETE FROM sucursales WHERE idSucursal=".$_GET['del']);
 header("Location: mantenedorsucursales.php");
}
/* code for data delete */



/* code for data update */
if(isset($_GET['edit']))
{
 $SQL = $mysqli->query("SELECT * FROM sucursales WHERE idSucursal=".$_GET['edit']);
 $getROW = $SQL->fetch_array();
}

if(isset($_POST['update']))
{
 $SQL = $mysqli->query("UPDATE sucursales SET sucursal='".$_POST['txtsucursal']."', ubicacion='".$_POST['txtubicacion']."' WHERE idSucursal=".$_GET['edit']);
 header("Location:mantenedorsucursales.php");
}
/* code for data update */

/* code for data insert */

?>