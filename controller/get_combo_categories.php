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
 * 	Obtiene las filas de la tabla, para cargarlas mediante ajax
 *
 ******************************************************************************/
?>
<?php

// Insanciamos un nuevo objeto
$entity = new Categories();
$rows = $entity->getAll();

?>
<select name="id_category" class="form-inline" >
<?php
// Recorremos todas las filas
foreach ($rows as $row): ?>
	<option value="<?php echo $row["id"]; ?>"<?php if ($id_category == $row["id"]) echo " selected"; ?>><?php echo $row["name"]; ?></option>				
<?php endforeach; ?>
</select>