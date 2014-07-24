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
// Iniciamos la session php (accederemos a algunas variables mas abajo)
session_start();
// Incluimos el fichero de configuracíon (por el __autoload)
include "../config.php";

$entity = new Users();
$rows = $entity->getAll();

foreach ($rows as $row): ?>

	<tr id="tr_<?php echo $row["id"]; ?>">
		<td><?php echo $row["id"]; ?></td>
		<td><?php echo $row["name"]; ?></td>
		<td><?php echo $row["email"]; ?></td>
		<td><input type="checkbox" disabled="disabled" <?php echo $row["role"] ? 'checked="checked"' : ''; ?> />
		<td><?php echo $row["code_language"]; ?></td>
		<td class="td-action">
			<button class="btn btn-primary btn-xs" data-toggle="modal" href="controller/modal_users.php?id=<?php echo $row["id"]; ?>" data-target="#update" data-placement="top" rel="tooltip" data-title="Edit" ><i class="glyphicon glyphicon-pencil"></i></button>
		</td>
		<td class="td-action">
	  	<?php 
	  		// Un usuario no debe poder borrarse a si mismo
	  		if ($_SESSION["sess_id_user"] != $row["id"]): 
	  	?>
			<button onclick="delete_row('Users', <?php echo $row["id"]; ?>);" class="btn btn-danger btn-xs" rel="tooltip" data-title="Delete"><i class="glyphicon glyphicon-trash" ></i></button>
		<?php endif; ?>
		</td>
	</tr>
					
<?php endforeach; ?>