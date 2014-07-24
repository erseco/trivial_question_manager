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
 *  Esta es la clase que carga PDO
 *
 ******************************************************************************/
?>
<?php

class Db {
    //Patron singleton para el objeto pdo
    private static $db;
     
    public static function init() {

        if (!self::$db) {

            try {
                $dsn = 'mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=UTF8';
                self::$db = new PDO($dsn, DB_USER, DB_PASSWORD);
                self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                die('Connection error: ' . $e->getMessage());
            }
        }
        return self::$db;
    }
}