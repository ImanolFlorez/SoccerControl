<?php

session_start();
	include_once('connection.php');

	if(isset($_POST['rc_identificacion'])){
		$database = new Connection();
		$db = $database->open();
		try{
			// hacer uso de una declaración preparada para evitar la inyección de sql
			$stmt = $db->prepare("INSERT INTO clientes (Cl_id, cl_nombre, cl_telefono, cl_email) VALUES (:Cl_id, :cl_nombre, :cl_telefono, :cl_email)");
			// declaración if-else en la ejecución de nuestra declaración preparada
			 $stmt->execute(array(':Cl_id' => $_POST['rc_identificacion'],  ':cl_nombre' => $_POST['rc_nombre'], ':cl_telefono' => $_POST['rc_telefono'], ':cl_email' => $_POST['rc_correo'])) ? 'Miembro agregado correctamente' : 'Something went wrong. Cannot add member';	
	    
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

	header('location: clientes.php');
	
?>
