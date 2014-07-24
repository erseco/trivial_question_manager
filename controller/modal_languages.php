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
 * 	Genera el código de un cuadro modal para insercion/actualizacion
 *
 ******************************************************************************/
?>
<?php

$code = "";
$name = "";

$title = "Create new language";
$button = "Create";
$action = "controller/insert.php?table=languages";
$form = "form_create";

if (isset($_GET["id"]) && $_GET["id"] != 0) {
	
	// Incluimos el fichero de configuracíon (por el __autoload)
	require_once "../config.php";

	$id = $_GET["id"];

	$languages = new Languages();
	$row = $languages->GetById($id);

	$code = $row["code"];
	$name = $row["name"];


	$title = "Update language";
	$button = "Update";
	$action = "controller/update.php?table=languages&id={$id}";
	$form = "form_update";

}

?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
	<h4 class="modal-title custom_align" id="Heading"><?php echo $title; ?></h4>
</div>
<form role="form" data-toggle="validator" method="post" id="<?php echo $form; ?>" action="<?php echo $action; ?>">
<div class="modal-body">
	<div class="form-group">
		<label for="code" class="control-label">Code</label>
		<input name="code" class="form-control" type="text" placeholder="Enter code" value="<?php echo $code; ?>" required>
	</div>
	<div class="form-group">
		<label for="name" class="control-label">Name</label>
		<input name="name" class="form-control" type="text" placeholder="Enter name" value="<?php echo $name; ?>" required>
	</div>
</div>
<div class="modal-footer ">
	<button type="submit" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> <?php echo $button; ?></button>
</div>
</form>
