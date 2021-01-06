<?php

session_start();
	include_once('connection.php');

	if(isset($_POST['canchanombre'])){
		$database = new Connection();
		$db = $database->open();
		try{
			// hacer uso de una declaración preparada para evitar la inyección de sql
			$stmt = $db->prepare("INSERT INTO canchas (cancha_nombre, cancha_ubicacion, cancha_tipo, cancha_observacion) VALUES (:cancha_nombre, :cancha_ubicacion, :cancha_tipo, :cancha_observacion)");
			// declaración if-else en la ejecución de nuestra declaración preparada
			 $stmt->execute(array(':cancha_nombre' => $_POST['canchanombre'],  ':cancha_ubicacion' => $_POST['canchaubicacion'], ':cancha_tipo' => $_POST['canchatipo'], ':cancha_observacion' => $_POST['canchaobservacion'])) ? 'Miembro agregado correctamente' : 'Something went wrong. Cannot add member';	
	    
		}
			catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//cerrar conexión
		$database->close();
	}

	else{
		$_SESSION['message'] = 'Fill up add form first';
	}

	header('location: canchas.php');
	
?>
