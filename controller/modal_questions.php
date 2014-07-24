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

$disable_translate = "disabled=\"disabled\""; // Con esto deshabilitamos los botones de traduccion en el crear

$id_category = 0;
$id_language = 0;
$difficulty = 0;

$question = "";
$answer1 = "";
$answer2 = "";
$answer3 = "";
$comments = "";


$title = "Create new question";
$button = "Create";
$action = "controller/insert.php?table=questions";
$form = "form_create";

if (isset($_GET["id"]) && $_GET["id"] != 0) {
	
	// Incluimos el fichero de configuracíon (por el __autoload)
	require_once "../config.php";

	$disable_translate = "";

	$id = $_GET["id"];

	$questions = new Questions();
	$row = $questions->GetById($id);

	$id_category = $row["id_category"];
	$id_language = $row["id_language"];
	$difficulty = $row["difficulty"];
	
	$question = $row["question"];
	$answer1 = $row["answer1"];
	$answer2 = $row["answer2"];
	$answer3 = $row["answer3"];
	$comments = $row["comments"];


	$title = "Update question";
	$button = "Update";
	$action = "controller/update.php?table=questions&id={$id}";
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
	<!-- Campos ocultos -->
	<input type="hidden" name="id_user" value="<?php echo $_SESSION["sess_id_user"]; ?>" /> 
	<!-- Campos del formulario -->
	<div class="form-group">
		<label for="id_category" class="control-label">Category</label>
		<?php
			include "get_combo_categories.php";
		?>
		<label for="id_language" class="control-label">Language</label>
		<?php
			include "get_combo_languages.php";
		?>
	</div>
	<div class="form-group">

		<label class="control-label">Difficulty</label>
	    <label class="radio-inline"><input id="inlineradio1" name="difficulty" value="1" type="radio"<?php if ($difficulty == 1) echo " checked"; ?>>1</label>
	    <label class="radio-inline"><input id="inlineradio2" name="difficulty" value="2" type="radio"<?php if ($difficulty == 2) echo " checked"; ?>>2</label>
	    <label class="radio-inline"><input id="inlineradio3" name="difficulty" value="3" type="radio"<?php if ($difficulty == 3) echo " checked"; ?>>3</label>
</div>
	<script>
		// Obtenemos los valores from y to de los idiomas
		var from_language = $('#<?php echo $form; ?> select[name=id_language]')[0].selectedOptions[0].attributes['code'].value;
		var to_language = '<?php echo $_SESSION["sess_code_language"]; ?>';

	</script

	<label for="question" class="control-label">Question</label>
	<div class="input-group">
		<input name="question" class="form-control" type="text" placeholder="Enter question" value="<?php echo $question; ?>" required autocomplete="off">
		<!-- Boton de traduccion -->
	    <span class="input-group-btn">
	    	<a tabindex="-1" <?php echo $disable_translate; ?> class="btn btn-default" type="button"><span class="glyphicon glyphicon-globe" rel="tooltip" title="Translate to: <?php echo $_SESSION['sess_code_language']; ?>" onclick="openGoogleTranslate(from_language, to_language, $('#<?php echo $form; ?> input[name=question]').val());"></span></a>
	  	</span>
	</div>
	<label for="answer1" class="control-label">Answer 1 (correct)</label>
	<div class="input-group">
		<input name="answer1" class="form-control" id="answer1" type="text" placeholder="Enter answer 1" value="<?php echo $answer1; ?>" required autocomplete="off">
		<!-- Boton de traduccion -->
	    <span class="input-group-btn">
	    	<a tabindex="-1" <?php echo $disable_translate; ?> class="btn btn-default" type="button"><span class="glyphicon glyphicon-globe" rel="tooltip" title="Translate to: <?php echo $_SESSION['sess_code_language']; ?>" onclick="openGoogleTranslate(from_language, to_language, $('#<?php echo $form; ?> input[name=answer1]').val());"></span></a>
	  	</span>
	  	<div class="help-block with-errors"></div>
	</div>
	<label for="answer2" class="control-label">Answer 2</label>
	<div class="input-group">
		<input name="answer2" class="form-control" id="answer2" type="text" placeholder="Enter answer 2" value="<?php echo $answer2; ?>" required autocomplete="off">
		<!-- Boton de traduccion -->
	    <span class="input-group-btn">
	    	<a tabindex="-1" <?php echo $disable_translate; ?> class="btn btn-default" type="button"><span class="glyphicon glyphicon-globe" rel="tooltip" title="Translate to: <?php echo $_SESSION['sess_code_language']; ?>" onclick="openGoogleTranslate(from_language, to_language, $('#<?php echo $form; ?> input[name=answer2]').val());"></span></a>
	  	</span>
	  	<div class="help-block with-errors"></div>
	</div>
	<label for="answer3" class="control-label">Answer 3</label>
	<div class="input-group">	
		<input name="answer3" class="form-control" id="answer1" type="text" placeholder="Enter answer 3" value="<?php echo $answer3; ?>" required autocomplete="off">
		<!-- Boton de traduccion -->
	    <span class="input-group-btn">
	    	<a tabindex="-1" <?php echo $disable_translate; ?> class="btn btn-default" type="button"><span class="glyphicon glyphicon-globe" rel="tooltip" title="Translate to: <?php echo $_SESSION['sess_code_language']; ?>" onclick="openGoogleTranslate(from_language, to_language, $('#<?php echo $form; ?> input[name=answer3]').val());"></span></a>
	  	</span>
	  	<div class="help-block with-errors"></div>
	</div>
	<div class="form-group">
		<label for="comments" class="control-label">Comments</label>
		<textarea name="comments" class="form-control" rows="2" placeholder="Enter comments"><?php echo $comments; ?></textarea>
	</div>
	<!-- Fin de campos del formulario -->

	<div class="form-group">
			<?php 
				// Aqui mostraremos las correcciones
				$corrections = new corrections();
				$rows = $corrections->getById($id);

				// Solo si las hay
				if (!empty($rows)) :
					$correction_string = "";
					// Recorremos todas las filas
					foreach ($rows as $row): 
						$correction_string .= $row["comments"]."\n";
					endforeach; ?>
					<strong>Corrections:</strong><br />
					<?php echo nl2br($correction_string); ?><br />
					<button onclick="delete_row('Corrections', <?php echo $row['id_question']; ?>);" class="btn btn-warning btn-xs">Mark as Corrected</button>
		
			<?php endif; ?>

	</div>


</div>
<div class="modal-footer ">
	<button type="submit" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> <?php echo $button; ?></button>
</div>
</form>
