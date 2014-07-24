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
 * Esta clase hereda de la clase Export y establece las condiciones específicas
 * para generar un archivo con la extensión indicada
 *
 ******************************************************************************/
?>
<?php

// Declaracion de la clase
class Export_Csv extends Export {

	// Constructor
	function Export_Csv() {
		
		// Establecemos los atributos
		$this->_filename = "questions";
		$this->_extension = "csv";

	}
	
	// Reemplazo de la función WriteHeader
	protected function WriteHeader() {

		// En los csv aqui no se escribe nada

	}

	// Reemplazo de la función WriteBodyLine
	protected function WriteBodyLine($row) {

		// Declaramos un array con los valores
		$row_array = array(
					$row["id"],
					$row["id_language"],
					$row["category"],
					$row["difficulty"],
					$row["question"],
					$row["answer1"],
					$row["answer2"],
					$row["answer3"]
				);


		// Lo unimos mediante implode (unirá con el caracter indicado como separador)
		echo implode(";", $row_array);

	}

	// Reemplazo de la función WriteFooter
	protected function WriteFooter() {

		// En los csv aqui no se escribe nada

	}


}

?>