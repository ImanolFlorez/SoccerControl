<?php
session_start();
	include_once('connection.php');

		$database = new connection();
		$db = $database->open();
		try{
			$vcid = $_GET['id'];
			$vcfecha = $_POST['vcfecha'];
			$vcvalor = $_POST['vcvalor'];
		
			

			$sql = "UPDATE valor_canchas SET vc_fecha = '$vcfecha', vc_valor = '$vcvalor' WHERE vc_id = '$vcid'";
			// declaración if-else en la ejecución de nuestra consulta
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Los datos se actualizaron' : 'Ocurrio un error. No se pudo actualizar';

		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//cerrar conexión 
		$database->close();


	header('location: valor_canchas.php');

?>