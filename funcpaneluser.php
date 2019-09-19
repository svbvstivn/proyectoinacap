<?php


include_once 'conexion.php';




if(isset($_POST['cambiarcorreo']))
{

    $id = $_POST['txtid2'];
    $correo = $_POST['txtcorreo'];
    $SQL = $mysqli->query("UPDATE usuarios SET correo='$correo' WHERE Id='$id'");
    

    echo "<script>alert('correo actualizado correctamente!');</script>";

     
}

  




if(isset($_POST['btncambiarclave']))
{

  $id = $_POST['txtid'];
  $clave = $_POST['txtclave'];   
  $SQL = $mysqli->query("UPDATE usuarios SET password='$clave' WHERE Id='$id'");
  
  
  
  echo "<script>alert('contraseña actualizada correctamente!');</script>";
  
}


?>