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
 <center><strong><h1>Registrar Clientes</h1></strong> </center>
</div>


<br>
<form action="resultado_clientes.php" method="POST">
<div class="container">
<div class="form-group">  
  <div class="row">
    <div class="col">
      <strong><label>Identificacion</label></strong>
      <input type="number" class="form-control"  name="rc_identificacion"  placeholder="Indentifiacion" required>
    </div>
    <div class="col">
      
      <strong><label>Nombre</label></strong>
      <input type="text" class="form-control"  name="rc_nombre"  placeholder="Nombre Completo" required>
    </div>
  </div>
<br>
   <div class="row">
    <div class="col">
     <strong> <label>Telefono</label></strong>
      <input type="number" class="form-control" name="rc_telefono"  placeholder="Movil / Fijo" required>
    </div>
    <div class="col">
      <strong><label>E-mail</label></strong>
      <input type="email" class="form-control"  name="rc_correo" placeholder="Correo Electronico" required>
    </div>
  </div>
<br>
 <button type="submit" class="btn btn-success">Guardar</button>

</div>
</form>
</div>



<br> 
 <div class="container">
<table 
 class="table table-dark">
  <thead>
    <tr>
    
      <th scope="col">Identificacion</th>
      <th scope="col">Nombre</th>
      <th scope="col">Telefono</th>
      <th scope="col">E-mail</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>

  <?php
include_once('connection.php');
$database = new connection();
$db = $database -> open();

try{

  $sql = 'SELECT * FROM clientes';
  foreach ($db->query($sql) as $row) {
 ?>
<tr>

<td><?php echo $row['Cl_id']; ?></td>
<td><?php echo $row['cl_nombre']; ?></td>
<td><?php echo $row['cl_telefono']; ?></td>
<td><?php echo $row['cl_email']; ?></td>
<td>

                                 <a href="#edit_clientes_<?php echo $row['Cl_id']; ?>" class="btn btn-success btn-sm" data-toggle="modal"><span class="fa fa-edit"></span> Editar</a>
                                 <a href="#delete_clientes_<?php echo $row['Cl_id']; ?>" class="btn btn-danger btn-sm" data-toggle="modal"><span class="fa fa-trash"></span> Eliminar</a>
                    </td>
                    <?php include('edit_delete_clientes.php'); ?>
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