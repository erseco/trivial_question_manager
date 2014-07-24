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
 
class Categories extends Model {

    // Atributos
    private $_name;

    public function setName($name)
    {
        $this->_name = $name;
    }

    public function setFields($array) {

        $this->_name = $array["name"];

    }

    public function getAll($data = null) {

        $sql = "SELECT
                    l.id,
                    l.name,
                    (SELECT COUNT(q.id) FROM questions q WHERE q.id_category = l.id) as 'total_questions'
                FROM 
                    categories l
                ORDER BY l.id ASC";
         
        $this->_setSql($sql);
        $result = parent::getAll(); // Llamamos al método de la clase padre
         
        if (empty($result)) {

            return false;
        
        }
         
        return $result;
    }
     
    public function getById($id) {

        $sql = "SELECT
                    l.id,
                    l.name
                FROM 
                    categories l
                WHERE 
                    l.id = ?";
         
        $this->_setSql($sql);
        $result = $this->getRow(array($id));
         
        if (empty($result)) {

            return false;
        
        }
         
        return $result;
    
    }


    public function insert()
    {
        $sql = "INSERT INTO categories 
                    (name)
                VALUES 
                    (?)";
         
        $data = array(
            $this->_name
        );
         
        $sth = $this->_db->prepare($sql);
        return $sth->execute($data);
    }

    // Esta función actualiza el registro pasado como parámetro
    public function update($id) {
        $sql = "UPDATE categories c 
                SET 
                    c.name = ?
                WHERE 
                    c.id = {$id}";
         
        $data = array(
            $this->_name
        );

        $sth = $this->_db->prepare($sql);
        return $sth->execute($data);
    }

    // Esta función borra el registro pasado como parametro
    public function delete($id) {
        $sql = "DELETE FROM categories 
                WHERE 
                    id = ?";
         
        $data = array(
            $id
        );
         
        $sth = $this->_db->prepare($sql);
        return $sth->execute($data);
    }


}