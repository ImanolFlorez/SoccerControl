<?php
 
  session_start();
  include_once('connection.php');

  $database = new Connection();
  $db = $database->open();

 $username = $_POST["username"];
 $userpassword = $_POST["userpassword"];


 try {

  $sql = 'SELECT * FROM usuarios WHERE user_name = "'.$username.'"';

  foreach ($db->query($sql) as $row) {
      $NombreUsuario = $row['user_name'];
      $NivelSeguridad = $row['user_nivel'];
      $Contrasenia = $row['user_password'];
      
    }


if($NombreUsuario==""){

  $_SESSION['message'] = 'Usuario no existe, Intente Nuevamente';
        header('location: login.php');
      
}

        if($NombreUsuario != '' && is_null($NombreUsuario) == false){      

if($Contrasenia != $userpassword ){
        $ValidacionExitosa = false;
        $_SESSION['message'] = 'Contraseña Incorrecta, Intente Nuevamente';
        header('location: login.php');
      }else{
        $_SESSION['Nivel'] = $NivelSeguridad;
       	$_SESSION['rol'] = $NombreUsuario;
        $ValidacionExitosa = true ;
        header('location: index.php');
 
    }
   }

 } catch (Exception $e) {
 	 $_SESSION['message'] = $e->getMessage();
    header('location: login.php');
    return;
  }
 

   $database->close();
?>