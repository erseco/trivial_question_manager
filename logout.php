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
 * Cierra una sesión abierta, y limpia sesión y cookies
 *
 ******************************************************************************/
 ?>
<?php

session_start();
// Borramos toda la sesion
session_destroy();

// Establecemos la duración en ayer 

$duration = time() -3600;
// Borramos las cookies
setcookie("cookie_id_user", "", $duration); 
setcookie("cookie_name", "", $duration); 
setcookie("cookie_email", "", $duration); 
setcookie("cookie_role", "", $duration); 
setcookie("cookie_id_language", "", $duration); 
setcookie('cookie_code_language', $user["code_language"], $duration); 
setcookie('cookie_creation_date', $user["date"], $duration); 

//Redirigimos a la página principal (atención, no funcionará si pintamos algo previamente)			
header("Location: index.php");

?>
