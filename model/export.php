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
 * 	Esta es la clase base desde la que se generan los distintos ficheros de exportaci�n
 *
 ******************************************************************************/
?>
<?php

class Export {

	protected $_filename;
	protected $_extension;

	public function GenerateFile() {

		// Escribimos las cabeceras del archivo (tipo, etc...)
		$this->WriteSendHeaders($this->_filename . "." . $this->_extension);

		// Escribimos el encabezado del archivo
		$this->WriteHeader();


		// Obtenemos la lista de preguntas
		$questions = new Questions();
		$rows = $questions->getAll();


		// Recorremos las filas (hacemos un cast de $rows a (array) para evitar comprobar si viene vacio)
		foreach ((array)$rows as $row) {

			// Escribimos cada l�nea del documento
			$this->WriteBodyLine($row);
			// Agregamos un salto de l�nea
			echo PHP_EOL;


		}

		// Escribimos el pie del archivo
		$this->WriteFooter();

		// Terminamos la ejecuci�n
		die();

	}

	private function WriteSendHeaders($filename) {
		
	    // Desactivamos la cache poniendo una fecha lejana
	    $now = gmdate("D, d M Y H:i:s");
	    header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
	    header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
	    header("Last-Modified: {$now} GMT");

	    // Forzamos a que descarge el archivo
	    header("Content-Type: application/force-download");
	    header("Content-Type: application/octet-stream");
	    header("Content-Type: application/download");

	    // Establecemos la codificaci�n a UTF8
	   	header('Content-Type: text/plain; charset=utf-8');


	    // Establecemos el modo de transferencia
	    header("Content-Disposition: attachment;filename={$filename}");
	    header("Content-Transfer-Encoding: binary");

	}

	protected function WriteHeader() {

	}

	protected function WriteBodyLine($row) {


	}

	protected function WriteFooter() {

	}

}

?>