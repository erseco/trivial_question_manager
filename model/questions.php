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
 *  Esta clase permite gestionar la tabla de la entidad indicada
 *
 ******************************************************************************/
?>
<?php
 
class Questions extends Model {

	// Atributos
	private $_id_category;
	private $_id_language;
	private $_id_user;
	private $_question;
	private $_answer1;
	private $_answer2;
	private $_answer3;
	private $_comments;
	private $_difficulty;
	

	// Esta funcion establece los atributos
	public function setFields($array) {

		$this->_id_category	= $array["id_category"];
		$this->_id_language	= $array["id_language"];
		$this->_id_user		= $array["id_user"];
		$this->_question	= $array["question"];
		$this->_answer1		= $array["answer1"];
		$this->_answer2		= $array["answer2"];
		$this->_answer3		= $array["answer3"];
		$this->_comments	= $array["comments"];
		$this->_difficulty	= $array["difficulty"];

	}

	// Obtenemos todos los registros
	public function getAll($data = null) {

		// Ademas de los registros de la tabla, le vamos a agregar los valores relacionados (idioma y categoria)
		// así como las correcciones de cada fila concatenadas

		$sql = "SELECT
					q.id,
					q.id_category,
					q.id_language,
					q.difficulty,
					q.question,
					q.answer1,
					q.answer2,
					q.answer3,
					l.code as 'language',
					c.name as 'category',
                    (SELECT 
                    	GROUP_CONCAT(o.comments SEPARATOR '\n') 
                    FROM 
                    	corrections o 
                    WHERE o.id_question = q.id) as 'corrections'
                 FROM 
					languages l, categories c, questions q
             
				WHERE q.id_language = l.id AND q.id_category = c.id
				ORDER BY q.id ASC";
		 
		$this->_setSql($sql);
		$result = parent::getAll(); // Llamamos al método de la clase padre
		 
		if (empty($result)) {

			return false;
		
		}
		 
		return $result;
	}
	 
	// Esta función obtiene la fila del id indicado como parámetro
	public function getById($id) {

		$sql = "SELECT
					q.id,
					q.id_category,
					q.id_language,
					q.difficulty,
					q.question,
					q.answer1,
					q.answer2,
					q.answer3,
					q.comments
				FROM 
					questions q
				WHERE 
					q.id = ?";
		 
		$this->_setSql($sql);
		$result = $this->getRow(array($id));
		 
		if (empty($result)) {

			return false;
		
		}
		 
		return $result;
	
	}

	// Esta función inserta un registro en la base de datos
	public function insert() {

		$sql = "INSERT INTO questions 
					(id_category, id_language, id_user, question, answer1, answer2, answer3, comments, difficulty)
				VALUES 
					(?, ?, ?, ?, ?, ?, ?, ?, ?)";
		 
		$data = array(
			$this->_id_category,
			$this->_id_language,
			$this->_id_user,
			$this->_question,	
			$this->_answer1,	
			$this->_answer2,	
			$this->_answer3,	
			$this->_comments,	
			$this->_difficulty
		);
		 
		$sth = $this->_db->prepare($sql);
		return $sth->execute($data);
	}

	// Esta función actualiza el registro pasado como parámetro
	public function update($id) {

		$sql = "UPDATE questions q 
				SET 
					q.id_category = ?,
					q.id_language = ?,
					q.id_user = ?,
					q.question = ?,
					q.answer1 = ?,
					q.answer2 = ?,
					q.answer3 = ?,
					q.comments = ?,
					q.difficulty = ?
				WHERE 
					q.id = {$id}";
		 
		$data = array(
			$this->_id_category,
			$this->_id_language,
			$this->_id_user,
			$this->_question,	
			$this->_answer1,	
			$this->_answer2,	
			$this->_answer3,	
			$this->_comments,	
			$this->_difficulty
		);

		$sth = $this->_db->prepare($sql);
		return $sth->execute($data);
	}

	// Esta función borra el registro pasado como parametro
	// NOTA: Además borra las correcciones asociadas, se podría haber
	// resuelto con un constraint, pero estariamos obligados a usar InnoDB
	public function delete($id) {
		$sql = "DELETE FROM questions 
				WHERE 
					id = ?; 
				DELETE FROM corrections 
				WHERE 
					id_question = ?;";
		 
		$data = array(
			$id,
			$id
		);
		 
		$sth = $this->_db->prepare($sql);
		return $sth->execute($data);
	}


}