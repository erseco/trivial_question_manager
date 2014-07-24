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
 * Esta clase hereda de la clase Export y establece las condiciones específicas
 * para generar un archivo con la extensión indicada
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
	
	// Reemplazo de la función WriteHeader
	protected function WriteHeader() {
	
		echo "var questions;"."\n";
		echo "function load_questions() {"."\n";
		echo "	questions = ["."\n";

	}


	// Reemplazo de la función WriteBodyLine
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

		// Lo unimos mediante implode (unirá con el caracter indicado como separador)
		echo "		{questions.add(new Question(}";
		echo implode(", ", $row_array);
		echo "},";

	}

	// Reemplazo de la función WriteFooter
	protected function WriteFooter() {

		echo "	];".PHP_EOL;
		echo "};".PHP_EOL;


	}


}

?>