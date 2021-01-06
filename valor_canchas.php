<?php 
include ("componentes/menu.php");
include ("componentes/header.php");
?>

<?php 


      if ($_SESSION['rol'] == "") {
      	header('location: login.php');
      }
?>
<div class="container">
<div class="alert alert-dismissible alert-success" style="margin-top:20px";>
<center><strong><h1>Registrar Valor de las Canchas	</h1></strong> </center>
</div>
<br>
<form action="resultados_valor_canchas.php" method="POST">
<div class="container">
<div class="form-group">  
  <div class="row">
    <div class="col-6 ">
     <strong> <label>Cancha</label></strong>
      <select required class="form-control" name="canchas">
                        <option value=""></option>
                        <?php
                            include_once('connection.php');

                            $database = new Connection();
                            $db = $database->open();
                            try{
                                $sql = 'SELECT cancha_id, cancha_nombre, cancha_tipo FROM canchas';
                                foreach ($db->query($sql) as $row) {
                        ?>
                                    <option value="<?php echo($row['cancha_nombre']." - ".$row['cancha_tipo']);?>"> <?php echo($row['cancha_nombre']." - ".$row['cancha_tipo']); ?></option>
                        <?php
                                }
                            }catch (PDOException $e){
                                $_SESSION['message'] = $e->getMessage();
                                header('location: valor.canchas.php');
                            }
                            $database->close();
                        ?>
                    </select>
    </div>
    <div class="col">
      <strong><label>Fecha de Actualizacion</label></strong>
      <input type="date" class="form-control"  name="vcfecha"  placeholder="" required>
    </div>
  </div>
<br>
   <div class="row">
    <div class="col">
     <strong> <label>$Precio </label></strong>
      <input type="number" class="form-control" name="vcvalor"  placeholder="$Valor" required>
    </div>
    <div class="col">
      <strong><label>Persona Responsable</label></strong>
      <input type="text" class="form-control"  name="username" placeholder="<?php echo ($_SESSION['rol']) ?>" disabled>
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
    
      <th scope="col">Nombre de la cancha</th>
      <th scope="col">Fecha de Actualizacion</th>
      <th scope="col">Precio</th>
      <th scope="col">Persona Responsable</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>

  <?php
include_once('connection.php');
$database = new connection();
$db = $database -> open();

try{

  $sql = 'SELECT * FROM valor_canchas';
  foreach ($db->query($sql) as $row) {
 ?>
<tr>

<td><?php echo $row['cancha_id']; ?></td>
<td><?php echo $row['vc_fecha']; ?></td>
<td><?php echo "$". number_format($row['vc_valor'], 2, ',', '.');  ?></td>
<td><?php echo $row['user_id']; ?></td>
<td>
	


                                 <a href="#edit_valor_canchas_<?php echo $row['vc_id']; ?>" class="btn btn-success btn-sm" data-toggle="modal"><span class="fa fa-edit"></span> Editar</a>
                                 <a href="#delete_valor_canchas_<?php echo $row['vc_id']; ?>" class="btn btn-danger btn-sm" data-toggle="modal"><span class="fa fa-trash"></span> Eliminar</a>
                    </td>
                    <?php include('edit_delete_valor_canchas.php'); ?>
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

include ("componentes/footer.php")

?>


