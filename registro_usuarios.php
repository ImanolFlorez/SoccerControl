<?php
include ("componentes/header.php");
include ("componentes/menu.php");

?>

<?php 
if ($_SESSION['rol'] == "") {

  header('location: login.php');
}
?>
<div class="container">
	<div class="alert alert-dismissible alert-success" style="margin-top:20px";>
 <center><strong><h1>Registrar Usuarios</h1></strong> </center>
</div>
 <?php 
            
            if(isset($_SESSION['message'])){
        ?>
                <div class="alert alert-dismissible alert-danger" style="margin-top:20px;">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php echo $_SESSION['message']; ?>
                </div>
        <?php

                unset($_SESSION['message']);
            }
        ?>
        </div>

<br>
<form action="resultados_usuarios.php" method="POST">
<div class="container">
<div class="form-group">  
  <div class="row">
    <div class="col">
      <strong><label>Nombre completo</label></strong>
      <input type="text" class="form-control"  name="usernombrecompleto"  placeholder="Nombre Completo" required>
    </div>
    <div class="col">
      <strong> <label>E-mail</label></strong>
      <input type="email" class="form-control" name="usercorreo"  placeholder="Movil / Fijo" required>
    </div>
  </div>
<br>
   <div class="row">
    <div class="col">
      <strong><label>Telefono</label></strong>
      <input type="number" class="form-control"  name="usertelefono"  placeholder="Movil / Fijo" required>
     
    </div>
    <div class="col">
      <strong><label>Usuario</label></strong>
      <input type="text" class="form-control"  name="username" value="" placeholder="" required>
    </div>
    </div>
    <br>
    <div class="row">
  <div class="col-md-4">
  <strong><label>Contraseña</label></strong>
  <input type="password" class="form-control"  name="userpassword" value="" placeholder="" required> 
  </div>
  <div class="col-md-4">
    <strong><label>Repetir Contraseña</label></strong>
      <input type="password" class="form-control"  name="userpassword1" Value="" placeholder="" required> 
     
  </div>
  <div class="col-md-4"> 
   <strong> <label>Nivel de Acceso</label></strong>
     <select class="form-control form-control" name="usernivel" required> 
        <option value=""></option>
        <option value="1">Administrador</option>
        <option value="2">Estandar</option>

     </select> 
  
   </div>
  </div>
<br>
<button type="submit" class="btn btn-success">Guardar</button>

</form>
</div>


 <div class="container">
<table 
 class="table table-dark">
  <thead>
    <tr>
    
      <th scope="col">Nombre completo</th>
      <th scope="col">E-mail</th>
      <th scope="col">Telefono</th>
      <th scope="col">Usuario</th>
      <th scope="col">Contraseña</th>
      <th scope="col">Nilvel de Acceso</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>

  <?php
include_once('connection.php');
$database = new connection();
$db = $database -> open();

try{

  $sql = 'SELECT * FROM usuarios';
  foreach ($db->query($sql) as $row) {
 ?>
<tr>

<td><?php echo $row['user_nombrecompleto']; ?></td>
<td><?php echo $row['user_correo']; ?></td>
<td><?php echo $row['user_telefono']; ?></td>
<td><?php echo $row['user_name']; ?></td>
<td><?php echo $row['user_password']; ?></td>
<td><?php echo $row['user_nivel']; ?></td>
<td>

                                 <a href="#delete_registro_usuarios_<?php echo $row['user_id']; ?>" class="btn btn-danger btn-sm" data-toggle="modal"><span class="fa fa-trash"></span> Eliminar</a>
                    </td>
                    <?php include('edit_delete_registro_usuarios.php'); ?>
                  </tr>

<?php


   }

  }

 catch(PDOException $e){
              echo "There is some problem in connection: " . $e->getMessage();
            }

            //cerrar conexión
            $database->close();

 ?>
  </tbody>
</table>

</div>

<?php 

include ("componentes/footer.php");
 ?>