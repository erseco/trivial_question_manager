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
class Export_Java extends Export {

	// Constructor
	function Export_Java() {
		
		// Establecemos los atributos
		$this->_filename = "Functions_Questions";
		$this->_extension = "java";

	}
	
	// Reemplazo de la funci�n WriteHeader
	protected function WriteHeader() {

		echo "package erseco.soft.trivial.mobile;"."\n";
		echo "class Functions_Questions extends Functions_DataBase{"."\n";
		echo "	protected void InitList(){"."\n";
	}

	// Reemplazo de la funci�n WriteBodyLine
	protected function WriteBodyLine($row) {

		// Simbolo de las comillas;
		$quotes = "\"";

		// Declaramos un array con los valores
		$row_array = array(
					$row["id"],
					$row["id_language"],
					$row["id_category"],
					$row["difficulty"],
					$quotes.base64_encode($row["question"]).$quotes,
					$quotes.base64_encode($row["answer1"]).$quotes,
					$quotes.base64_encode($row["answer2"]).$quotes,
					$quotes.base64_encode($row["answer3"]).$quotes
				);


		// Lo unimos mediante implode (unir� con el caracter indicado como separador)
		echo "		questions.add(new Question(";
		echo implode(", ", $row_array);
		echo "));";

	}

	// Reemplazo de la funci�n WriteFooter
	protected function WriteFooter() {

		echo "	}".PHP_EOL;
		echo "}".PHP_EOL;

	}


}

?>