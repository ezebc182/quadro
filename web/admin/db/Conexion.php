<?php
/**
 * Created by PhpStorm.
 * User: Eze
 * Date: 12/06/15
 * Time: 14:47
 */

namespace web\admin;

//db connection class using singleton pattern

require_once 'Credenciales.php';

class Conexion
{

//variable to hold connection object.
    protected static $db;

//private construct - class cannot be instatiated externally.
    private function __construct()
    {
        if (self::$db == null) {
            try {
// assign PDO object to db variable
                self::$db = new \PDO(
                    'mysql:dbname=' . DATABASE1 .
                    ';charset=utf8'.
                    ';host=' . HOSTNAME1 . ';',
                    USERNAME1,
                    PASSWORD1);

                self::$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                //Output error - would normally log this to error file rather than output to user.
                echo "Error de conexión: " . $e->getMessage();
            }
        }


    }

// get connection function. Static method - accessible without instantiation
    public static function Conectar()
    {

//Guarantees single instance, if no connection object exists then create one.
        if (!self::$db) {
//new connection object.
            new Conexion();
        }

//return connection.
        return self::$db;
    }

    /**
     * Evita la clonación del objeto
     */
    final protected function __clone()
    {
    }

    function _destructor()
    {
        self::$db = null;
    }

}

