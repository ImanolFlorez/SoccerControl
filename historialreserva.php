<?php
include ("componentes/menu.php");
include ("componentes/header.php");
?>
<div class="container">
<form action="historialreserva.php" method="POST">
	<div class="alert alert-dismissible alert-success" style="margin-top:20px";>
 <center><strong><h1>Consulta de Historial de Reserva</h1></strong> </center>
</div>
<form>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputPassword4"><strong>Fecha de Reserva:</strong></label>
      <input type="date" class="form-control" name="consulta" placeholder="">
    </div>

<!-- Consulta para traer las canchas -->

    <div class="form-group col-md-4">
      <label for="inputState"><strong>Espacio Deportivo</strong></label>
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
                                    <option value="<?php echo($row['cancha_nombre']." - ".$row['cancha_tipo']);?>"> <?php echo($row['cancha_nombre']." - ".$row['cancha_tipo']);
                                        $id_cancha = $row['cancha_id'];                                 
                                     ?></option>
                        <?php
                                }
                            }catch (PDOException $e){
                                $_SESSION['message'] = $e->getMessage();
                                header('location: Historialreserva.php');
                            }
                           
                            $database->close();
                        ?>
                    </select>
    </div>
</div>
  <button type="submit" class="btn btn-success">Consultar</button>
</form>
</div>


<div class="container">
	<div class="alert alert-dismissible alert-dark" style="margin-top:20px";>
 <center><strong><h1>Resultados</h1></strong> </center>
</div>

 <div class="container">
<table 
 class="table table-striped">
  <thead>
    <tr>
    
      <th scope="col">Nombre</th>
      <th scope="col">Fecha</th>
      <th scope="col">Hora Inicio</th>
      <th scope="col">Hora Final</th>
      <th scope="col">Valor a Pagar</th>
       <th scope="col">Cancha</th>
          <th scope="col">Responsable</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>

  <?php
include_once('connection.php');
$database = new connection();
$db = $database -> open();
try{
  @$x = $_POST['consulta'];
  @$y = $_POST['consulta_cancha'];
 
  $sql = 'SELECT clientes.cl_nombre, reserva.rs_fecha_inicio, reserva.rs_hora_inicio,reserva.rs_hora_fin, reserva.rs_valor, canchas.cancha_nombre, usuarios.user_name
FROM reserva 
INNER JOIN clientes ON clientes.Cl_id = reserva.Cl_id
INNER JOIN canchas ON canchas.cancha_id = reserva.cancha_id
INNER JOIN usuarios ON usuarios.user_id = reserva.user_id
where reserva.rs_fecha_inicio="'.$x.'"';

  foreach ($db->query($sql) as $row) {
 ?>
<tr>

<td><?php echo $row['cl_nombre']; ?></td>
<td><?php echo $row['rs_fecha_inicio']; ?></td>
<td><?php echo $row['rs_hora_inicio']; ?></td>
<td><?php echo $row['rs_hora_fin']; ?></td>
<td><?php echo "$". number_format($row['rs_valor'], 2, ',', '.'); ?></td>
<td><?php echo $row['cancha_nombre']; ?></td>
<td><?php echo $row['user_name']; ?></td>
<td>
          
                    
                                 <a href="#delete_historialreserva_<?php echo $row['rs_id']; ?>" class="btn btn-success btn-sm" data-toggle="modal"><span class="fa fa-trash"></span>Reservado</a>
                    </td>
                    <?php include('edit_delete_historialreserva.php'); ?>
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
