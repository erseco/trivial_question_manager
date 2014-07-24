<?php
/*******************************************
 *
 * 2014 - Programaci�n Web
 * Grado en Ingenier�a Inform�tica
 *
 * Ernesto Serrano <erseco@correo.ugr.es>
 * 
 *
 *******************************************
 *
 * P�gina principal, desde aqui se llama a todas las dem�s paginas
 *
 ******************************************************************************/
?>
<?php
// Requerimos la comprobaci�n de que la sesi�n est� iniciada, si no redirigir� a la ventana de login
require_once "session.php";

include "config.php";
// Include('dbinit.php');


// Si no se solicita ninguna pagina mostramos la home
if(!isset($_GET['page'])) {

    $page = "home";
    $page_title = "Home";
    include('view/header.phtml');    
	include('view/home.phtml');

} else {

	$page = $_GET['page'];

    // Si no existe mostramos la pagina de error
	if(!file_exists("view/" . $page . ".phtml")) {

        header("Location: 404.html");
        exit();

	} else {

        // Cargamos la p�gina solicitada
        $page_title = ucwords(str_replace("_", " ", $page));
        include('view/header.phtml');
		include('view/' . $page . '.phtml');
	}
}

// Cargamos el pie de la p�gina
include "view/footer.phtml";


?>