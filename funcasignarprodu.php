<?php

include_once 'conexion.php';


$currentUser = $_SESSION['nombreEmpresa'];

/* code for data insert */
if(isset($_POST['save']))
{

     $idproducto = $mysqli->real_escape_string($_POST['txtidprodu']);
     $fecha = $_POST['txtfecha'];
     $desc = $mysqli->real_escape_string($_POST['txtdesc']);
     $sucu  = $mysqli->real_escape_string($_POST['txtsucursal']);
     $cate  = $mysqli->real_escape_string($_POST['txtcategoria']);
     $precio = $_POST['txtprecio'];
     
   
  $SQL = $mysqli->query("INSERT ignore INTO desc_producto(idProducto,IdSucursal,IdCategoria,fecha,descripcionprodu,precio,currentName) VALUES('$idproducto','$sucu','$cate','$fecha','$desc','$precio','$currentUser')");
header("Location: asignacionproducto.php");

  
  if(!$SQL)
  {
   echo $mysqli->error;
  } 
}

/* code for data insert */


/* code for data delete */
if(isset($_GET['del']))
{
 $SQL = $mysqli->query("UPDATE  desc_producto set currentName='$currentUser' WHERE id=".$_GET['del']);
 $SQL = $mysqli->query("DELETE FROM desc_producto WHERE id=".$_GET['del']);
 
 header("Location: asignacionproducto.php");
}
/* code for data delete */



/* code for data update */
if(isset($_GET['edit']))
{
 $SQL = $mysqli->query("SELECT * FROM desc_producto WHERE id=".$_GET['edit']);
 $getROW = $SQL->fetch_array();
}

if(isset($_POST['update']))
{
 
 $SQL = $mysqli->query("UPDATE ignore desc_producto SET idProducto='".$_POST['txtidprodu']."', IdSucursal='".$_POST['txtsucursal']."', IdCategoria='".$_POST['txtcategoria']."', fecha='".$_POST['txtfecha']."', precio='".$_POST['txtprecio']."', descripcionprodu='".$_POST['txtdesc']."', currentName='$currentUser' WHERE id=".$_GET['edit']);

 header("Location: asignacionproducto.php");
}
/* code for data update */

/* code for data insert */

?>