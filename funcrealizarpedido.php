<?php

include_once 'conexion.php';

if(isset($_POST['pedir']))
{

  $currentUser = $_SESSION['nombreEmpresa'];
     $id = $mysqli->real_escape_string($_POST['txtid']);
     $tipo = $mysqli->real_escape_string($_POST['txttipo']);
     $cau = $mysqli->real_escape_string($_POST['txtcaudal']);
     $rpm = $mysqli->real_escape_string($_POST['txtrpm']);
     $temp = $mysqli->real_escape_string($_POST['txttemp']);
     $alt = $mysqli->real_escape_string($_POST['txtaltura']);

  $SQL = $mysqli->query("INSERT INTO productos (IdUsuario,tipoVentilador,caudal,RPM,temperatura,altura, currentName,fecha_pedido) VALUES('$id','$tipo','$cau','$rpm','$temp','$alt','$currentUser', NOW())");
  echo "<script>alert('producto solicitado correctamente');</script>";
  
  if(!$SQL)
  {
   echo $mysqli->error;
    echo "<script>alert('Ha ocurrido un error, por favor intente nuevamente');</script>";
  

  } 
}

?>