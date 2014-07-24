<?php
/*******************************************
 *
 * 2014 - Programación Web
 * Grado en Ingeniería Informática
 *
 * Ernesto Serrano <erseco@correo.ugr.es>
 * 
 *
 *******************************************
 *
 * Página principal, desde aqui se llama a todas las demás paginas
 *
 ******************************************************************************/
?>
<?php
// Requerimos la comprobación de que la sesión esté iniciada, si no redirigirá a la ventana de login
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

        // Cargamos la página solicitada
        $page_title = ucwords(str_replace("_", " ", $page));
        include('view/header.phtml');
		include('view/' . $page . '.phtml');
	}
}

// Cargamos el pie de la página
include "view/footer.phtml";


?>