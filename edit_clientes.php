<?php
session_start();
	include_once('connection.php');

		$database = new connection();
		$db = $database->open();
		try{
			$rc_identificacion = $_GET['id'];
			$rc_nombre = $_POST['rc_nombre'];
			$rc_telefono = $_POST['rc_telefono'];
			$rc_correo = $_POST['rc_correo'];

			$sql = "UPDATE clientes SET cl_nombre = '$rc_nombre', cl_telefono = '$rc_telefono', cl_email = '$rc_correo' WHERE Cl_id = '$rc_identificacion'";
			// declaración if-else en la ejecución de nuestra consulta
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Los datos se actualizaron' : 'Ocurrio un error. No se pudo actualizar';

		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//cerrar conexión 
		$database->close();


	header('location: clientes.php');

?>