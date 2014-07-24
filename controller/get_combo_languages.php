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
 * 	Obtiene las filas de la tabla, para cargarlas mediante ajax
 *
 ******************************************************************************/
?>
<?php

// Instanciamos un nuevo objeto
$entity = new Languages();
$rows = $entity->getAll();

?>
<select name="id_language" class="form-inline" >
<?php
// Recorremos todas las filas
foreach ($rows as $row): 
	$selected = "";
	if ($id_language == $row["id"]) 
		$selected = " selected";
	echo "<option value=\"{$row["id"]}\" code=\"{$row["code"]}\"{$selected}>{$row["name"]}</option>";	
endforeach; 
?>
</select>