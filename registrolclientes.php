
<?php

include ("componentes/header.php");
?>

<br> 
 <div class="container">
<table  class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Identificacion</th>
      <th scope="col">Nombre</th>
      <th scope="col">Telefono</th>
      <th scope="col">E-mail</th>
    </tr>
  </thead>

  <?php
include_once('Connection.php');
$database = new connection();
$db = $database -> open();

try{

  $sql = 'SELECT * FROM clientes';
  foreach ($db->query($sql) as $row) {
 ?>
<tr>
  
<td><?php echo $row['identificacion']; ?></td>
<td><?php echo $row['nombre']; ?></td>
<td><?php echo $row['telefono']; ?></td>
<td><?php echo $row['correo']; ?></td>
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


