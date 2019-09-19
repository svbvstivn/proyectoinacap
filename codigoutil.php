<?php

                       include 'conexion.php';

                       $query = "SELECT Id, usuario, password, nombreEmpresa, correo, descripcion, tipoUsuario FROM usuarios ORDER BY Id";
                       $stmt = $con->prepare($query);
                       $stmt->execute();

                       $num = $stmt->rowCount();

                       ?>                      
























<table class="table table-bordered table-responsive">
        <tr>
            <td>Id</td>
            <td>usuario</td>
            <td>contraseña</td>
            <td>nombre empresa</td>
            <td>correo</td>
            <td>descripción</td>
            <td>tipo de usuario</td>
            <td>Acción</td>
        </tr>

          <?php
                           $mysqli = new MySqli('localhost','root','','SRPAMRISA');
                           $sql = "select * from usuarios";
                           $result = $mysqli->query($sql);
                           while($registro = $result->fetch_assoc())
                               {
                                
                              
                           ?>



        <tr>
            <td><?php echo $filas['Id'] ?></td>
            <td><?php echo $filas['usuario'] ?></td>
            <td><?php echo $filas['password'] ?></td>
            <td><?php echo $filas['nombreEmpresa'] ?></td>
            <td><?php echo $filas['correo'] ?></td>
            <td><?php echo $filas['descripcion'] ?></td>
            <td><?php echo $filas['tipoUsuario'] ?></td>
            <td>
                <a href="">Editar</a>
                <a href="">Eliminar</a>
            </td>
            
            
        </tr>
        <?php } ?>







 <?php
include('conexion.php')

if(!isset($_SESSION['tipoUsuario'])){
    header('location: login.php');
}else{
    if($_SESSION['tipoUsuario']!='administrador'){
    header('location: login.php');
}
}
?>





<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalclave">
    Cambiar Contraseña
  </button><i><small>   Cambia la contraseña con la cual deseas ingresar.</small></i> 


<div class="modal fade" id="modalclave" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cambiar Contraseña</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        aqui va a estar un formulario para cambiar la contraseña
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-danger">Cambiar</button>
      </div>
    </div>
 </div>
 </div>
 
<br>
<br>


<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalfoto">
    Cambiar foto de perfil.
  </button>  


<div class="modal fade" id="modalfoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cambia la imagen de tu perfil.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        aqui va un  input tipo archivo el cual subira la imagen.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-danger">Cambiar</button>
      </div>
    </div>
  </div>
  </div>