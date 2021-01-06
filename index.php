<!-- Pagina principal -->
<?php 
include ("componentes/header.php");
include ("componentes/menu.php");
?>
<?php 
if ($_SESSION['rol'] == "") {

	header('location: login.php');
  }
?>

<link rel="stylesheet" type="text/css" href="css/banner.css">

<br>
<br>

 
<center><h1 id="heading">  
Bienvenidos a Soccer Control Versiòn 1.0</h1> 
 <br>
 <br>
<div class="container">
 
<div class="row"> 


  <div class="col-md-4">
    <div class="card" style="width: 16rem;">
  <img class="card-img-top" src="img/clientes.jpg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Registo de clientes</p>
    <a href="clientes.php" class="btn btn-success">Ingresar</a>
       </div>
       </div>
       </div>
  <div class="col-md-4">
    <div class="card" style="width: 16rem;">
  <img class="card-img-top" src="img/reserva.jpg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Reserva</p>
    <a href="reserva.php" class="btn btn-success">Ingresar</a>      
      </div>
      </div>
      </div>
   <div class="col-md-4">
    <div class="card" style="width: 16rem;">
  <img class="card-img-top" src="img/historial.jpg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Historial de reserva</p>
    <a href="historialreserva.php" class="btn btn-success">Ingresar</a>       
        </div>
        </div>
        </div>
</div>

<?php 
include ("componentes/footer.php")
?>


