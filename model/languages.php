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
 *  Esta clase permite gestionar la tabla de la entidad indicada
 *
 ******************************************************************************/
?>
<?php
 
class Languages extends Model {

    // Atributos
    private $_code;
    private $_name;

     
    public function setCode($code)
    {
        $this->_email = $code;
    }
          
    public function setName($name)
    {
        $this->_name = $name;
    }

    public function setFields($array) {

        $this->_code = $array["code"];
        $this->_name = $array["name"];

    }

    // Esta función obtiene todos los usuarios de la base de datos
    public function getAll($data = null) {

        $sql = "SELECT
                    l.id,
                    l.code,
                    l.name,
                    (SELECT COUNT(q.id) FROM questions q WHERE q.id_language = l.id) as 'total_questions'
                FROM 
                    languages l
                ORDER BY l.id ASC";
         
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
                    l.id,
                    l.code,
                    l.name
                FROM 
                    languages l
                WHERE 
                    l.id = ?";
         
        $this->_setSql($sql);
        $result = $this->getRow(array($id));
         
        if (empty($result)) {

            return false;
        
        }
         
        return $result;
    
    }

    // Esta función obtiene los idiomas con una columna adicional indicando el numero de preguntas
    // por idioma, se utiliza para las estádisticas
    public function getQuestionsPerLanguage() {

        $sql = "SELECT
                    l.id,
                    l.code,
                    l.name,
                    (SELECT COUNT(*) FROM questions q WHERE q.id_language = l.id) as questions
                FROM 
                    languages l";
         
        $this->_setSql($sql);
        $result = $this->getAll();
         
        if (empty($result)) {

            return false;
        
        }
         
        return $result;
    
        
    }

 
    // Esta función inserta un registro en la base de datos
    public function insert() {
        $sql = "INSERT INTO languages 
                    (code, name)
                VALUES 
                    (?, ?)";
         
        $data = array(
            $this->_code,
            $this->_name
        );
         
        $sth = $this->_db->prepare($sql);
        return $sth->execute($data);
    }

    // Esta función actualiza el registro pasado como parámetro
    public function update($id) {
        $sql = "UPDATE languages l 
                SET 
                    l.code = ?, 
                    l.name = ? 
                WHERE 
                    l.id = {$id}";
         
        $data = array(
            $this->_code,
            $this->_name
        );

        $sth = $this->_db->prepare($sql);
        return $sth->execute($data);
    }

    // Esta función borra el registro pasado como parametro
    public function delete($id) {
        $sql = "DELETE FROM languages 
                WHERE 
                    id = ?";
         
        $data = array(
            $id
        );
         
        $sth = $this->_db->prepare($sql);
        return $sth->execute($data);
    }


}