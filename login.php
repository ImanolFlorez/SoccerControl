<?php
include ("componentes/header.php");
?>

<br>
<br>
<div class="container">
<div class="row">
  <div class="col-6"> <div class="container">    
<div id="slider_principal" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
<div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="img/carrusel1.png" alt="">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/carrusel2.png" alt="">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/carrusel3.png" alt="!">
    </div>
</div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
  </div>
</div>

  <div class="col-6">  <div class="container">

<!-- Login del sistema -->
<form class="text-center border border-light p-5" action="login_validar.php" method="POST">

    <p class="h4 mb-4"><strong> Hola! <br> Bienvenidos a<br> Soccer Control 1.0 </strong></p>
      <?php 
            session_start();
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

    <!-- Usuario -->
    <input type="text" name="username" class="form-control mb-4" placeholder="Ingrese su usuario">

    <!-- Contraseña -->
    <input type="password" name="userpassword" class="form-control mb-4" placeholder="Ingrese su contrase&ntilde;a">
    
    <!-- Boton de inicio -->
    <button class="btn btn-info btn-block" type="submit">Ingresar</button>

 
     </div>
  </div>
</form>
</div>  
</div>

</div>

<?php 
include ("componentes/footer.php");
 ?>