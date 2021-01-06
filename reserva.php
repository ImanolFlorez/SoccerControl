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
 <center><strong><h1>Registrar Reserva de Cancha</h1></strong> </center>
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
<form action="reserva.php" method="POST">
<div class="container">
<div class="form-group">  
  <div class="row">
    <div class="col-6">
      <strong><label>Usuario Actual</label></strong>
      <?php 
                 include_once('connection.php');

                            $database = new Connection();
                            $db = $database->open();
                           
                                $sql = 'SELECT user_id FROM usuarios';
                                foreach ($db->query($sql) as $row) {
                                   $id_usuarios = $row['user_id'];  
                                   $_SESSION['user_id'] = $id_usuarios;}

                                 
                                       
     ?>                              

       <input type="text" class="form-control"  name="username1" value="<?php echo($_SESSION['rol']);?>" placeholder="" disabled>
</div>
    <div class="col-6">
      <strong><label>Cedula Cliente</label></strong>
      <input type="text" class="form-control"  id="cedula" name="cedula" value="<?php
          if(isset($_POST["cedula"])){
            echo($_POST["cedula"]);
          $_SESSION["cedula"] = $_POST["cedula"]; 
          }
        ?>" placeholder="" required>
    </div>
    <br>
   </div>

    <div class="row">
    <div class="col-6">
    <strong><label>Nombre Cliente</label></strong>
      <input type="text" class="form-control"  value=
      "<?php
      include_once('connection.php');
      $database = new Connection();
      $db = $database->open();
      $cliente1="";

        if (isset($_POST["cedula"])){ 
        $sql = 'SELECT * FROM clientes WHERE Cl_id = "'.$_POST["cedula"].'"';
        foreach ($db->query($sql) as $row) {
             $cliente1 = $row['cl_nombre'];
               }
            if ($cliente1==""){
            echo("Por favor registrar cliente");//espacio para solicitar registro cliente
       } else {
      echo($cliente1);
    }
  }
$database->close();
?>" name="nombrecliennte" placeholder="" disabled>
      </div>
 <div class="col-6">
     <strong> <label>Cancha</label></strong>

<?php

if (isset($_POST['canchas'])){ 
$_SESSION['cancha']= $_POST['canchas'];
} 

if (isset($_SESSION['cancha'])){  
 

  ?>
<input type="text" class="form-control"  name="username1" value="<?php echo($_SESSION['cancha']);?>" placeholder="" disabled>
<?php } else{?>
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
                              $_SESSION['id_cancha'] = $id_cancha;
                                
                               ?></option>

                        <?php
                                }
                            }catch (PDOException $e){
                                $_SESSION['message'] = $e->getMessage();
                                header('location: cancha_valor.php');
                            }
                            
                            $database->close();
                        ?>
         


<?php } ?>
                 </select>
    </div>


 </div> 
<br>
   <div class="row">
   
    <div class="col-3">
      <strong><label>Fecha de reserva</label></strong>
      <input type="date" class="form-control"  name="fechareserva" value="<?php
          if(isset($_POST["fechareserva"])){
            echo($_POST["fechareserva"]);
          $_SESSION["fechareserva"] = $_POST["fechareserva"];
          }
        ?>" placeholder="Ingrese fecha" >
    </div>
    <div class="col-3">
      <strong><label>Hora de inicio</label></strong>
      <input type="time" class="form-control"  name="inicioreserva" value="<?php
          if(isset($_POST["inicioreserva"])){
            echo($_POST["inicioreserva"]);
          $_SESSION["inicioreserva"] = $_POST["inicioreserva"];
          }
        ?>"placeholder="" >
    </div>
    <div class="col-3">
      <strong><label>Hora Final</label></strong>
      <input type="time" class="form-control"  name="finalreserva" value="<?php
          if(isset($_POST["finalreserva"])){
            echo($_POST["finalreserva"]);
          $_SESSION["finalreserva"] = $_POST["finalreserva"]; 
          }
        ?>" placeholder="" >
    </div>
<?php
//calcular valor

if (isset($_POST['inicioreserva']) && !empty($_POST['inicioreserva'])){
  $inicioreserva = $_POST['inicioreserva'];
if (isset($_POST['finalreserva']) && !empty($_POST['finalreserva'])){
  $finalreserva = $_POST['finalreserva'];
  //echo "inicio reserva ".$inicioreserva;
  $x = explode(":", $inicioreserva);
   $y = explode(":", $finalreserva);
// var_dump($y);

   if ($x[0] > $y[0]) {
    $z = 24 - $x[0];
    $horas = $z + $y[0];


   }else{

    $horas =  $y[0] - $x[0];
   }


 // echo "FINAL reserva ".$finalreserva - $inicioreserva;
// $horas = $finalreserva-$inicioreserva;


include_once('connection.php');

  $database = new Connection();
  $db = $database->open();
  $sql = 'SELECT * FROM valor_canchas WHERE cancha_id = "'.$_SESSION['cancha'].'"';

  foreach ($db->query($sql) as $row) {
      $valor1 = $row['vc_valor'];}
}
if(isset($valor1)){ 
$valor1=$valor1*@$horas;

}}
?>
<div class="col-3">
      <strong><label>Valor a pagar</label></strong>
      <input type="text" class="form-control"  name="vreserva" value="<?php 
    if (isset($valor1)){
    if($valor1!=0){
    echo "$". ($valor1);
    $_SESSION['valor1'] = $valor1; 
}
}
      ?>" placeholder="" disabled>

      </div>

    </div>
    <br>
      <?php 
      $guardar=1;

    if (isset($valor1)) {
    if ($valor1>0){

       $guardar=1;
        ?> <center> 
    <a href="resultados_reserva.php">
    <Button type="button" class="btn btn-dark">Guardar</button></a></center> <?php }
  else {?> <center><Button type="submit" class="btn btn-success">Calcular</button></center> <?php }}
  else {?> <center><Button type="submit" class="btn btn-success">Consular</button></center> <?php }?>
</form>
</div>
<br> 
<?php 
include ("componentes/footer.php");
 ?>