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
 * Funciones javascript utilizadas en la página
 *
 ******************************************************************************/

// Esta función muestra un diálogo de confirmación e intenta
// borrar el registro (id) de la tabla (table), mediante
// una llamada asíncrona, si consigue borrarla, busca la fila
// en el DOM y la elimina (responsivo)
function delete_row (table, id) {

	// Desactivamos el confirm bootbox hasta que solucionen el problema en moviles
	//bootbox.confirm("Are you sure?", function(result) {

		if (confirm("Are you sure?")) {


			$.ajax({
				type     : 'POST',
				cache    : false,
				url      : 'controller/delete.php',
				data     : { table: table, id: id },
				dataType : 'json',
				success  : function(data) {

					if (data.response == 'success') {

						//// Eliminamos la fila de la vista de la tabla (responsivo)
						//$('#tr_' + id).remove(); Reutilizamos la funcion refreshTable para unificar

						// Refrescamos la tabla
						refreshTable();

					} else {

						bootbox.alert("Cannot delete row."); // show response from the php script.

					}
				},
				error: function (error) {
					console.log(error);
				}
			});
		}
	  
	//}); 
}

// Esta función inserta/actualiza un registro en la base de datos, es común para todas las entidades
// ya que los parámetros los coge desde la propia ventana
// El selector de jquery detecta cuando se hace un submit de los formularios de insert y update
$('.modal').on('submit', '#form_create,#form_update', function(e) {
	var $form = $(this);

	$.ajax({
		type     : 'POST',
		cache    : false,
		url      : $form.attr('action'),
		data     : $form.serializeArray(),
		dataType : 'json',
		success  : function(data) {

			if (data.response == 'success') {

				// Cerramos la ventana modal
				$('#create,#update').modal('hide');

				// Ponemos un try-catch porque en la de update no tenemos acceso al de creacion
				try{
					// Reseteamos el formulario de creación
					$('#form_create')[0].reset();
				} catch(e) {	
				}
				// Refrescamos la tabla
				refreshTable();

			} else {

				// Mostramos el mensaje de error
				bootbox.alert(data.message);

			}

		},
		error: function (error) {
			console.log(error);
		}
	});
	
	// Evitamos que el formulario se envíe de la manera por defecto	
    e.preventDefault();

});


// Este código se activa al cargar la página y hace que empiece a funcionar la extensión tablesorter
  $(function(){
	$("#dev-table").tablesorter();
  });

// Este código limpia el modal de update cuando se oculta, así funcionará correctamente cuando se vuelva a mostrar
$('#update').on('hidden.bs.modal', function () {
  $(this).removeData('bs.modal');
});

// Este código activa los tooltip en los sitios que se ha especificado en el atributo rel
// por el tema de los modales de edición
$(function () {
	$("[rel='tooltip']").tooltip();
});

// Esta función hace que al abrirse un modal coja el foco el primer campo del formulario
$('#create,#update').on('shown.bs.modal', function () {
  $('input:text:visible:first', this).focus();
});

// Esta funcion abre una nueva ventana con el traductor de Google
function openGoogleTranslate(from_language, to_language, value) {

	var translate_url = 'http://translate.google.com/#'+ from_language +'|'+ to_language + '|' + value;

	window.open(translate_url);

}