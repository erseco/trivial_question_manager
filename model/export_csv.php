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
 * Esta clase hereda de la clase Export y establece las condiciones espec�ficas
 * para generar un archivo con la extensi�n indicada
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
	
	// Reemplazo de la funci�n WriteHeader
	protected function WriteHeader() {

		// En los csv aqui no se escribe nada

	}

	// Reemplazo de la funci�n WriteBodyLine
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


		// Lo unimos mediante implode (unir� con el caracter indicado como separador)
		echo implode(";", $row_array);

	}

	// Reemplazo de la funci�n WriteFooter
	protected function WriteFooter() {

		// En los csv aqui no se escribe nada

	}


}

?>