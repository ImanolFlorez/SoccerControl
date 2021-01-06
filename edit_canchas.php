<?php
session_start();
	include_once('connection.php');

		$database = new connection();
		$db = $database->open();
		try{
			$canchaid = $_GET['id'];
			$canchanombre = $_POST['canchanombre'];
			$canchaubicacion = $_POST['canchaubicacion'];
			$canchatipo = $_POST['canchatipo'];
			$canchaobservacion = $_POST['canchaobservacion'];

			$sql = "UPDATE canchas SET cancha_nombre = '$canchanombre', cancha_ubicacion = '$canchaubicacion', cancha_tipo = '$canchatipo', cancha_observacion = '$canchaobservacion' WHERE cancha_id = '$canchaid'";
			// declaración if-else en la ejecución de nuestra consulta
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Los datos se actualizaron' : 'Ocurrio un error. No se pudo actualizar';

		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//cerrar conexión 
		$database->close();


	header('location: canchas.php');

?>