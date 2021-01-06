<!-- Menu principal -->



<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php"><img src="img/logo.png"> <strong>Soccer Control</strong> </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      
      <?php 
         session_start();
  if($_SESSION['Nivel']==1){
       ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="MenuDesplegable" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Mantenimiento
        </a>
        <div class="dropdown-menu"  aria-labelledby="MenuDesplegable">
          <a class="dropdown-item" href="canchas.php">Agregar canchas</a>
          <a class="dropdown-item" href="valor_canchas.php">Modificar precios</a>
          <a class="dropdown-item" href="registro_usuarios.php">Registrar usuarios</a>
        </div>
      </li>
      <?php 
        }
       ?>

      <li class="nav-item">
        <a class="nav-link" href="clientes.php">Clientes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="destruir.php">Reservar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="historialreserva.php">Historial de Reservas</a>
      </li>
    </ul>
  </div>



 <span class="navbar-text"> 
  <?php 

  echo ($_SESSION['rol'])."  ";?>  <img src="img/login.png"> </span>

 
<a href="salir.php"><button type="button" class="btn btn-danger"   style="margin-left: 10px"><strong>Cerrar Sesion </strong></button></a>      

</nav>

