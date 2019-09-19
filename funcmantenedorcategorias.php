<?php

include_once 'conexion.php';


$currentUser = $_SESSION['nombreEmpresa'];

/* code for data insert */
if(isset($_POST['save']))
{

     $lvl = $_POST['txtnivel'];
     $descr = $_POST['txtdesc'];
     
   
  $SQL = $mysqli->query("INSERT INTO categoria(categoria,desc_cate,currentName) VALUES('$lvl','$descr','$currentUser')");
header("Location: mantenedorcategorias.php");

  
  if(!$SQL)
  {
   echo $mysqli->error;
  } 
}

/* code for data insert */


/* code for data delete */
if(isset($_GET['del']))
{
 $SQL = $mysqli->query("UPDATE FROM categoria SET currentName='$currentUser' WHERE =idCategoria=".$GET['del']);
 $SQL = $mysqli->query("DELETE FROM categoria WHERE idCategoria=".$_GET['del']);
 header("Location: mantenedorcategorias.php");
}
/* code for data delete */



/* code for data update */
if(isset($_GET['edit']))
{
 $SQL = $mysqli->query("SELECT * FROM categoria WHERE idCategoria=".$_GET['edit']);
 $getROW = $SQL->fetch_array();
}

if(isset($_POST['update']))
{
 $SQL = $mysqli->query("UPDATE categoria SET categoria='".$_POST['txtnivel']."',currentName='$currentUser', desc_cate='".$_POST['txtdesc']."' WHERE idCategoria=".$_GET['edit']);
 header("Location:mantenedorcategorias.php");
}
/* code for data update */

/* code for data insert */

?>