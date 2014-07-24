<?php
/*******************************************
 *
 * 2014 - Programaci�n Web
 * Grado en Ingenier�a Inform�tica
 *
 * Ernesto Serrano <info@ernesto.es>
 * 
 *
 *******************************************
 *
 * Cierra una sesi�n abierta, y limpia sesi�n y cookies
 *
 ******************************************************************************/
 ?>
<?php

session_start();
// Borramos toda la sesion
session_destroy();

// Establecemos la duraci�n en ayer 

$duration = time() -3600;
// Borramos las cookies
setcookie("cookie_id_user", "", $duration); 
setcookie("cookie_name", "", $duration); 
setcookie("cookie_email", "", $duration); 
setcookie("cookie_role", "", $duration); 
setcookie("cookie_id_language", "", $duration); 
setcookie('cookie_code_language', $user["code_language"], $duration); 
setcookie('cookie_creation_date', $user["date"], $duration); 

//Redirigimos a la p�gina principal (atenci�n, no funcionar� si pintamos algo previamente)			
header("Location: index.php");

?>
