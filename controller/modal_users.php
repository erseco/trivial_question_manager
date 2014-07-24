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
 * 	Genera el código de un cuadro modal para insercion/actualizacion
 *
 ******************************************************************************/
?>
<?php
// Iniciamos la session php (accederemos a algunas variables mas abajo)
if(session_id() == '') session_start();

$name = "";
$email = "";
$role = "";
$id_language = 0;

$title = "Create new user";
$button = "Create";
$action = "controller/insert.php?table=users";
$form = "form_create";

if (isset($_GET["id"]) && $_GET["id"] != 0) {
	
	// Incluimos el fichero de configuracíon (por el __autoload)
	require_once "../config.php";

	$id = $_GET["id"];

	$users = new Users();
	$row = $users->GetById($id);

	
	$name = $row["name"];
	$email = $row["email"];
	$role = $row["role"];
	$id_language = $row["id_language"];

	$title = "Update user";
	$button = "Update";
	$action = "controller/update.php?table=users&id={$id}";
	$form = "form_update";

}


?>

<!-- Cabecera -->
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
	<h4 class="modal-title custom_align" id="Heading"><?php echo $title; ?></h4>
</div>
<form role="form" data-toggle="validator" method="post" id="<?php echo $form; ?>" action="<?php echo $action; ?>">
<div class="modal-body">
	<!-- Campos del formulario -->
	<div class="form-group">
		<label for="id_language" class="control-label">Language</label>
		<?php
			include "get_combo_languages.php";
		?>
	</div>
	<div class="form-group">
		<label for="name" class="control-label">Name</label>
		<input name="name" class="form-control" type="text" placeholder="Name" value="<?php echo $name; ?>" required>
	</div>
	<div class="form-group">
		<label for="email" class="control-label">Email</label>
		<input name="email" class="form-control" id="email" type="email" placeholder="E-Mail" value="<?php echo $email; ?>" required autocomplete="off">
		<div class="help-block with-errors"></div>
	</div>
	<?php 
	// Solo se establece el password al crear (y en profile)
	if ($form == "form_create" || isset($_GET["profile"])) : ?>


	<div class="form-group">
		<label for="password" class="control-label">Password</label>
		<input name="password" class="form-control" id="password" type="password" placeholder="Password" required data-minlength="6" autocomplete="off">
		<span class="help-block">Minimum of 6 characters</span>

	</div>
	<div class="form-group">
		<label for="password2" class="control-label">Re-type password</label>
		<input name="password2" class="form-control" id="password2" type="password" placeholder="Re-type password" required data-match="#password" data-match-error="Whoops, the passwords don't match" autocomplete="off">
	</div>
	<?php endif; ?>
	<?php 
	// Solo los administradores deben poder cambiar el rol
	if ($_SESSION["sess_role"] == 1): ?>
	<div class="form-group">
		<div class="checkbox">
		  <label>
			<input name="role" type="checkbox" <?php echo $role ? 'checked="checked"' : ''; ?>>
			Administrator privileges
		  </label>
		</div>
	</div>
	<?php endif; ?>
	<!-- Fin de campos del formulario -->
</div>
<div class="modal-footer ">
	<button type="submit" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> <?php echo $button; ?></button>
</div>
</form>

<?php if (isset($_GET["id"]) && $_GET["id"] != 0): ?>
<script type="text/javascript">
	// Parche para forzar la validacion cuando estemos en profile
    $('form[data-toggle="validator"]').each(function () {
      var $form = $(this)
      $form.validator($form.data())
    })
</script>
<?php endif; ?>

