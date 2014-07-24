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
 * Usaremos PHP Data Objects, ya que est� recomendado por PHP
 *
 *******************************************/

class Model 
{
    protected $_db;
    protected $_sql;
     
    public function __construct()
    {
        $this->_db = Db::init();
    }
     
    protected function _setSql($sql)
    {
        $this->_sql = $sql;
    }
     
    public function getAll($data = null)
    {
        if (!$this->_sql)
        {
            throw new Exception("No SQL query!");
        }
         
        $sth = $this->_db->prepare($this->_sql);
        $sth->execute($data);
        return $sth->fetchAll();
    }
     
    public function getRow($data = null)
    {
        if (!$this->_sql)
        {
            throw new Exception("No SQL query!");
        }
         
        $sth = $this->_db->prepare($this->_sql);
        $sth->execute($data);
        return $sth->fetch();
    }

    public function getValue($data = null)
    {
        if (!$this->_sql)
        {
            throw new Exception("No SQL query!");
        }
         
        $sth = $this->_db->prepare($this->_sql);
        $sth->execute($data);
        return $sth->fetchColumn();
    }



    public function setRow($data = null)
    {
        if (!$this->_sql)
        {
            throw new Exception("No SQL query!");
        }
         
        $sth = $this->_db->prepare($this->_sql);
        $sth->execute($data);
        return $sth->fetch();
    }

    public function setValue($data = null)
    {
        if (!$this->_sql)
        {
            throw new Exception("No SQL query!");
        }
         
        $sth = $this->_db->prepare($this->_sql);
        $sth->execute($data);
        return $sth->fetch();
    }

}