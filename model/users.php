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
 
class Users extends Model {

	// Atributos
	private $_name;
	private $_email;
	private $_password;
	private $_role;
	 
	// Esta funcion establece los atributos
	public function setFields($array) {

		$this->_name = $array["name"];
		$this->_email = $array["email"];
		if (isset($array["password"])) $this->_password = md5($array["password"]); // Encriptamos el password con MD5
		$this->_id_language = $array["id_language"];
		if (isset($array["role"])) 
			$this->_role = $array["role"];
		else
			$this->_role = false;
	}

	// Esta función obtiene todos los usuarios de la base de datos
	public function getAll($data = null) {

		$sql = "SELECT
					u.id,
					u.name,
					u.email,
					u.role,
					u.id_language,
					l.code as 'code_language',
					u.date,
					(SELECT COUNT(q.id) FROM questions q WHERE q.id_user = u.id) as 'total_questions'
				FROM 
					users u, languages l
				WHERE
					u.id_language = l.id
				ORDER BY u.id ASC";
		 
		$this->_setSql($sql);
		$result = parent::getAll(); // Llamamos al método de la clase padre
		 
		if (empty($result)) {

			return false;
		
		}
		 
		return $result;
	}
	 
	// Esta función obtiene la fila del usuario indicado como parámetro
	public function getById($id) {

		$sql = "SELECT
					u.id,
					u.name,
					u.email,
					u.role,
					u.id_language,
					l.code as 'code_language',
					u.date
				FROM 
					users u, languages l
				WHERE 
					u.id = ? AND u.id_language = l.id";
		 
		$this->_setSql($sql);
		$result = $this->getRow(array($id));
		 
		if (empty($result)) {

			return false;
		
		}
		 
		return $result;
	
	}

	// Esta función inserta un registro en la base de datos
	public function insert() {
		
		$sql = "INSERT INTO users 
					(name, email, password, id_language, role)
				VALUES 
					(?, ?, ?, ?, ?)";
		 
		$data = array(
			$this->_name,
			$this->_email,
			$this->_password,
			$this->_id_language,
			$this->_role
		);
		 
		$sth = $this->_db->prepare($sql);
		return $sth->execute($data);
	}

	// Esta función actualiza el registro pasado como parámetro
	public function update($id) {

		$sql = "";

		if (empty($this->_password)) {

			$sql = "UPDATE users u  
					SET 
						u.name = ?, 
						u.email = ?, 
						u.id_language = ?, 
						u.role = ? 
					WHERE 
						u.id = {$id}";
			 
			$data = array(
				$this->_name,
				$this->_email,
				$this->_id_language,
				$this->_role
			);


		} else {

			$sql = "UPDATE users u 
					SET 
						u.name = ?, 
						u.email = ?, 
						u.password = ?, 
						u.id_language = ?, 
						u.role = ? 
					WHERE 
						u.id = {$id}";
			 
			$data = array(
				$this->_name,
				$this->_email,
				$this->_password,
				$this->_id_language,
				$this->_role
			);

		}

		$sth = $this->_db->prepare($sql);
		return $sth->execute($data);
	}

	// Esta función borra el registro pasado como parametro
	public function delete($id) {

		$sql = "DELETE FROM users 
				WHERE 
					id = ?";
		 
		$data = array(
			$id
		);
		 
		$sth = $this->_db->prepare($sql);
		return $sth->execute($data);
	}


	// Esta función comprueba si el usuario existe en la base de datos
	public function checkUser($email, $password) {

		$sql = "SELECT
					u.id
				FROM 
					users u
				WHERE 
					u.email = ? AND
					u.password = ?";
		 
		$this->_setSql($sql);
		$result = $this->getValue(array($email, md5($password)));
		 
		if (empty($result)) {

			return false;
		
		}
		 
		return $result;
	}

}