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
 * Desde aquí se envía un e-mail al formulario de soporte
 *
 ******************************************************************************/
?>
<?php

// Comprobamos que hayamos enviado el formulario
if($_POST && $_POST["message"] != "") {
	 
	// Obtenemos los datos
	$sender=$_SESSION["email"];    

	$email=SUPPORT_MAIL;
	$subject=$_POST["subject"] . " - [TQM Support]";
	$message=$_POST["message"];

	// Establecemos las cabeceras del email
	$headers = "MIME-Version: 1.0".PHP_EOL;
	$headers .= "From: {$sender}".PHP_EOL;
	$headers .= "Content-Type: text/plain; charset=UTF-8".PHP_EOL;
	$headers .= "X-Priority: 3".PHP_EOL;
	$headers .= "X-MSMail-Priority: Normal".PHP_EOL;
	$headers .= "X-Mailer: php".PHP_EOL;       

	// Enviamos el email
	mail($email, $subject, $message, $headers);

}

?>