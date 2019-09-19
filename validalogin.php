<?php
ob_start(); 
$usuario = $_POST['txtusuario'];
$clave = $_POST['txtpassword'];



if($usuario)
{
    include_once 'conexion.php';
    session_start();
    
    $sentencia = "SELECT * from usuarios where usuario = '$usuario' and password = '$clave'";
    $resultado = $mysqli->query($sentencia);
    $fila = $resultado->fetch_array();
    
    if(!$fila['usuario'])
    {
        
        header("location:login.php");


    }
    else
    {
        $_SESSION['Id'] = $fila['Id'];
        $_SESSION['usuario'] = $fila['usuario'];
        $_SESSION['password'] = $fila['clave'];
        $_SESSION['nombreEmpresa'] = $fila['nombreEmpresa'];
        $_SESSION['correo'] = $fila['correo'];
        $_SESSION['descripcion'] = $fila['descripcion'];
        $_SESSION['tipoUsuario'] = $fila['tipoUsuario'];

        $userxd = $fila['nombreEmpresa'];
        
        if($_SESSION['tipoUsuario'] == "administrador")
        {
            $SQL = $mysqli->query("INSERT INTO tabla_auditoria(IdUser, fecha_auditoria, tipo_evento) values('$userxd',now(), 'login','n/a','n/a')");
            header("location:index2.php");
        }
        if($_SESSION['tipoUsuario']== "cliente")
        {
            $SQL = $mysqli->query("INSERT INTO tabla_auditoria(IdUser, fecha_auditoria, tipo_evento) values('$userxd',now(), 'Login','n/a','n/a')");
            header("location:index.php");
        }
        if($_SESSION['tipoUsuario']== "vendedor")
        {
            $SQL = $mysqli->query("INSERT INTO tabla_auditoria(IdUser, fecha_auditoria, tipo_evento) values('$userxd',now(), 'Login','n/a','n/a')");
            header("location:Vistas/vendedor/index3.php");
        }
        if($_SESSION['tipoUsuario']== "despacho")
        {
            $SQL = $mysqli->query("INSERT INTO tabla_auditoria(IdUser, fecha_auditoria, tipo_evento) values('$userxd',now(), 'Login','n/a','n/a')");
            header("location:Vistas/despacho/index4.php");
        }
    }
    
}

ob_end_flush();
?>