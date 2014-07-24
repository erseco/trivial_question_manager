<?php
/*******************************************
 *
 * 2014 - Programaci�n Web
 * Grado en Ingenier�a Inform�tica
 *
 * Ernesto Serrano <info@ernesto.es>
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
class Export_Js extends Export {

	// Constructor
	function Export_Js() {
		
		// Establecemos los atributos
		$this->_filename = "data_questions";
		$this->_extension = "js";

	}
	
	// Reemplazo de la funci�n WriteHeader
	protected function WriteHeader() {
	
		echo "var questions;"."\n";
		echo "function load_questions() {"."\n";
		echo "	questions = ["."\n";

	}


	// Reemplazo de la funci�n WriteBodyLine
	protected function WriteBodyLine($row) {

		// Simbolo de las comillas;
		$quotes = "\"";

		// Declaramos un array con los valores
		$row_array = array(
					"l:".$row["id_language"],
					"c:".$row["id_category"],
					"d:".$row["difficulty"],
					"q:".$quotes.base64_encode($row["question"]).$quotes,
					"a1:".$quotes.base64_encode($row["answer1"]).$quotes,
					"a2:".$quotes.base64_encode($row["answer2"]).$quotes,
					"a3:".$quotes.base64_encode($row["answer3"]).$quotes
				);

		// Lo unimos mediante implode (unir� con el caracter indicado como separador)
		echo "		{questions.add(new Question(}";
		echo implode(", ", $row_array);
		echo "},";

	}

	// Reemplazo de la funci�n WriteFooter
	protected function WriteFooter() {

		echo "	];".PHP_EOL;
		echo "};".PHP_EOL;


	}


}

?>