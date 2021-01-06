<?php

session_start();
	include_once('connection.php');


	if (($_POST['userpassword']) == ($_POST['userpassword1'])){

	 if(isset($_POST['usernombrecompleto'])){
		$database = new Connection();
		$db = $database->open();
		try{
			// hacer uso de una declaración preparada para evitar la inyección de sql
			$stmt = $db->prepare("INSERT INTO usuarios (user_name, user_password, user_nivel, user_nombrecompleto, user_telefono, user_correo) VALUES (:user_name, :user_password, :user_nivel, :user_nombrecompleto, :user_telefono, :user_correo)");
			// declaración if-else en la ejecución de nuestra declaración preparada
			 $stmt->execute(array(':user_name' => $_POST['username'],  ':user_password' => $_POST['userpassword'], ':user_nivel' => $_POST['usernivel'], ':user_nombrecompleto' => $_POST['usernombrecompleto'], ':user_telefono' => $_POST['usertelefono'], ':user_correo' => $_POST['usercorreo'])) ? 'Miembro agregado correctamente' : 'Something went wrong. Cannot add member';	
	    
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

	header('location: registro_usuarios.php');
	
	
	}else{

    header('location: registro_usuarios.php');
    $_SESSION['message'] = "Las contraseñas no coinciden!";


	}

?>	