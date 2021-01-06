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
 <center><strong><h1>Registrar  Canchas</h1></strong> </center>
</div>
<br>
<form action="resultados_canchas.php" method="POST">
<div class="container">
<div class="form-group">  
  <div class="row">
    <div class="col">
      <strong><label>Nombre de la cancha</label></strong>

      <input type="text" class="form-control"  name="canchanombre"  placeholder="" required>
    </div>
    <div class="col">
      <strong><label>Ubicacion</label></strong>
      <input type="text" class="form-control"  name="canchaubicacion"  placeholder="" required>
    </div>
  </div>
<br>
   <div class="row">
    <div class="col">
     <strong> <label>Tipo de cancha</label></strong>
     <select class="form-control form-control" name="canchatipo" required> 
        
        <option value="Futbol">Futbol</option>
        <option value="Tennis">Tennis</option>

     </select> 
    </div>
    <div class="col">
      <strong><label>Observacion</label></strong>
      <input type="text" class="form-control"  name="canchaobservacion" placeholder="" required>
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
    
      <th scope="col">Nombre</th>
      <th scope="col">Ubicacion</th>
      <th scope="col">Tipo</th>
      <th scope="col">Observacion</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>

  <?php
include_once('connection.php');
$database = new connection();
$db = $database -> open();

try{

  $sql = 'SELECT * FROM canchas';
  foreach ($db->query($sql) as $row) {
 ?>
<tr>

<td><?php echo $row['cancha_nombre']; ?></td>
<td><?php echo $row['cancha_ubicacion']; ?></td>
<td><?php echo $row['cancha_tipo']; ?></td>
<td><?php echo $row['cancha_observacion']; ?></td>
<td>

                                 <a href="#edit_canchas_<?php echo $row['cancha_id']; ?>" class="btn btn-success btn-sm" data-toggle="modal"><span class="fa fa-edit"></span> Editar</a>
                                 <a href="#delete_canchas_<?php echo $row['cancha_id']; ?>" class="btn btn-danger btn-sm" data-toggle="modal"><span class="fa fa-trash"></span> Eliminar</a>
                    </td>
                    <?php include('edit_delete_canchas.php'); ?>
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