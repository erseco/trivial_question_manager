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
 *  Esta clase permite gestionar la tabla de la entidad indicada
 *
 ******************************************************************************/
?>
<?php
 
class Corrections extends Model {

	// Atributos
	private $_id_question;
	private $_comments;

	// Esta funcion establece los atributos
	public function setFields($array) {

		$this->_id_question	= $array["id_question"];
		$this->_comments	= $array["comments"];
	}

	// Obtenemos todos los registros
	public function getAll($data = null) {

		// Ademas de los registros de la tabla, le vamos a agregar los valores relacionados (idioma y categoria)

		$sql = "SELECT
					c.id,
					c.id_question,
					c.comments
				FROM 
					corrections c
				ORDER BY c.id ASC";
		 
		$this->_setSql($sql);
		$result = parent::getAll(); // Llamamos al m�todo de la clase padre
		 
		if (empty($result)) {

			return false;
		
		}
		 
		return $result;
	}
	 
	// Esta funci�n obtiene la fila del id indicado como par�metro
	public function getById($id_question) {

		$sql = "SELECT
					c.id,
					c.id_question,
					c.comments
				FROM 
					corrections c
				WHERE 
					c.id_question = ?";
		 
		$this->_setSql($sql);
		$result = parent::getAll(array($id_question)); // Llamamos al m�todo de la clase padre
		 
		if (empty($result)) {

			return false;
		
		}
		 
		return $result;
	
	}

	// Esta funci�n inserta un registro en la base de datos
	public function insert() {

		$sql = "INSERT INTO corrections 
					(id_question, comments)
				VALUES 
					(?, ?)";
		 
		$data = array(
			$this->_id_question,
			$this->_comments
		);
		 
		$sth = $this->_db->prepare($sql);
		return $sth->execute($data);
	}


	// Esta funci�n borra el registro pasado como parametro
	public function delete($id_question) {
		$sql = "DELETE FROM corrections 
				WHERE 
					id_question = ?";
		 
		$data = array(
			$id_question
		);
		 
		$sth = $this->_db->prepare($sql);
		return $sth->execute($data);
	}


}