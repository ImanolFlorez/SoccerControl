<?php 
session_start();
  include_once('connection.php'); 
    $database = new Connection();
    $db = $database->open();
    try{
      // hacer uso de una declaración preparada para evitar la inyección de sql
      $stmt = $db->prepare("INSERT INTO reserva (user_id,Cl_id,cancha_id,rs_fecha_inicio,rs_hora_inicio,rs_hora_fin,rs_valor) VALUES (:user_id,:Cl_id,:cancha_id,:rs_fecha_inicio,:rs_hora_inicio,:rs_hora_fin,:rs_valor)");

      // declaración if-else en la ejecución de nuestra declaración preparada
       $stmt->execute(array(':user_id' => $_SESSION['user_id'],':Cl_id' => $_SESSION['cedula'],':cancha_id' =>  $_SESSION['id_cancha'],':rs_fecha_inicio' => $_SESSION['fechareserva'], ':rs_hora_inicio' => $_SESSION['inicioreserva'], ':rs_hora_fin' => $_SESSION['finalreserva'], ':rs_valor' => $_SESSION['valor1'])) ? 'Miembro agregado correctamente' : 'Something went wrong. Cannot add member';  
      
    }

      catch(PDOException $e){

      $_SESSION['message'] = $e->getMessage();
      echo $e;
    }

    //cerrar conexión
    $database->close();


 

  header('location: reserva.php');
  
?>
