<?php

session_start();
	include_once('connection.php');

	if(isset($_POST['vcvalor'])){
		$database = new Connection();
		$db = $database->open();
		try{
			// hacer uso de una declaración preparada para evitar la inyección de sql
			$stmt = $db->prepare("INSERT INTO valor_canchas (vc_fecha, vc_valor, cancha_id, user_id) VALUES (:vc_fecha, :vc_valor, :cancha_id, :user_id)");
			// declaración if-else en la ejecución de nuestra declaración preparada
			 $stmt->execute(array(':vc_fecha' => $_POST['vcfecha'],  ':vc_valor' => $_POST['vcvalor'], ':cancha_id' => $_POST['canchas'], ':user_id' => $_SESSION['rol'])) ? 'Miembro agregado correctamente' : 'Something went wrong. Cannot add member';	
	    
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

	header('location: valor_canchas.php');
	
?>
