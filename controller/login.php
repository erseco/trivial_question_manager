<?php 
/*******************************************
 *
 * 2014 - Programación Web
 * Grado en Ingeniería Informática
 *
 * Ernesto Serrano <info@ernesto.es>
 * 
 *
 *******************************************
 *
 * Controlador de login, checkea si los valores establecidos son correctos
 * y guarda los valores en la sesion y en cookies
 *
 *******************************************/
?>
<?php

// Bandera de error para mostrar una advertencia en la vista
$error = false;

if(isset($_POST["email"]) && trim($_POST["email"]) != "" && trim($_POST["password"]) != ""){

	// Obtenemos los campos
	$email = trim($_POST["email"]);
	$password = trim($_POST["password"]);

	// Iniciamos un nuevo objeto de la clase Users
	$users = new Users();
	$id = $users->checkUser($email, $password);

	if ($id) {
		
		// Iniciamos la sesión PHP
		session_start();

		// Obtenemos la información del usuario
		$user = $users->getById($id);

		// Nos guardamos las variables de sesion (usamos el prefijo sess_ por motivos de seguridad)
		$_SESSION["sess_id_user"] = $id;	
		$_SESSION["sess_name"] = $user["name"];	
		$_SESSION["sess_email"] = $user["email"];
		$_SESSION["sess_role"] = $user["role"];	
		$_SESSION["sess_id_language"] = $user["id_language"];
		$_SESSION["sess_code_language"] = $user["code_language"];
		$_SESSION["sess_creation_date"] = $user["date"];


		// Si tenemos marcada la opcion de recordar
		if(isset($_POST["remember"])) {

			// Establecemos la duración en una semana 
			$duration = time() + 7 * 24 * 60 * 60;

			// Establecemos las cookies (usamos el prefijo cookies_ por motivos de seguridad)
			setcookie('cookie_id_user', $id, $duration); 
			setcookie('cookie_name', $user["name"], $duration); 
			setcookie('cookie_email', $user["email"], $duration); 
			setcookie('cookie_role', $user["role"], $duration); 
			setcookie('cookie_id_language', $user["id_language"], $duration); 
			setcookie('cookie_code_language', $user["code_language"], $duration); 
			setcookie('cookie_creation_date', $user["date"], $duration); 

		} 

		// Redirigimos a la página principal (atención, no funcionará si pintamos algo previamente)			
		header("Location: index.php");
		exit;

	} else {

		// Si ha habido algun error en el login
		$error = true;

	}
	
}

?>