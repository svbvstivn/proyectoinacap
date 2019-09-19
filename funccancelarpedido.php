<?php

include_once 'conexion.php';
$currentUser = $_SESSION['nombreEmpresa'];

if(isset($_GET['del']))
{
 $SQL = $mysqli->query("DELETE FROM productos WHERE IdProducto=".$_GET['del']);
 header("Location: verproductos.php");
 echo "<script>alert('producto cancelado correctamente!');</script>";

 if(!$SQL)
  {
    echo "<script>alert('Error: no se puede borrar el producto, porfavor verifique que no ha sido asignado a un pedido');</script>"; 
  }

} 
?>