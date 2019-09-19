<?php

include_once 'conexion.php';

/* code for data insert */
if(isset($_POST['save']))
{

     $usu = $mysqli->real_escape_string($_POST['txtuser']);
     $contra = $mysqli->real_escape_string($_POST['txtpass']);
     $nombre = $mysqli->real_escape_string($_POST['txtname']);
     $correo = $mysqli->real_escape_string($_POST['txtcorreo']);
     $desc = $mysqli->real_escape_string($_POST['txtdesc']);
     $tipo = $mysqli->real_escape_string($_POST['txttipo']);

   
  $SQL = $mysqli->query("INSERT ignore INTO usuarios(usuario,password,nombreEmpresa,correo,descripcion,tipoUsuario) VALUES('$usu','$contra','$nombre','$correo','$desc','$tipo')");


  
  if(!$SQL)
  {
   echo $mysqli->error;
  } 
}

/* code for data insert */


/* code for data delete */
if(isset($_GET['del']))
{
 $SQL = $mysqli->query("DELETE FROM usuarios WHERE Id=".$_GET['del']);
 header("Location: mantenedorusuarios.php");
}
/* code for data delete */



/* code for data update */
if(isset($_GET['edit']))
{
 $SQL = $mysqli->query("SELECT * FROM usuarios WHERE Id=".$_GET['edit']);
 $getROW = $SQL->fetch_array();
}

if(isset($_POST['update']))
{
 $SQL = $mysqli->query("UPDATE usuarios SET usuario='".$_POST['txtuser']."', password='".$_POST['txtpass']."', nombreEmpresa='".$_POST['txtname']."', correo='".$_POST['txtcorreo']."', descripcion='".$_POST['txtdesc']."', tipoUsuario='".$_POST['txttipo']."' WHERE Id=".$_GET['edit']);
 header("Location: mantenedorusuarios.php");
}
/* code for data update */

?>