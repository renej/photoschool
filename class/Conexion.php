<?php
/**
 * Created by PhpStorm.
 * User: rene
 * Date: 16/05/14
 * Time: 08:23 PM
 *
 * Clase de conexion a la base de datos
 */

class Conexion {
    /**
     * @var $instancia nos servira para instanciar nuestro objeto de conexion
     * @var $dbh Data Base Handler - Manejador de base de datos -
     */
    private static $instancia;
    private $dbh;

    /**
     * Constructor
     */
    private function __construct() {
        try {
            $this->dbh = new PDO('mysql:host = localhost; dbname:photoschool2', 'root', 'root');
            $this->dbh->exec("SET CHARACTER SET utf8");
        } catch(PDOException $e) {
            print "Error!" . $e->getMessage();
            die();
        }
    }

    /**
     * Funcion para ejecutar codigo sql
     */
    public function prepare($sql) {
        return $this->dbh->prepare($sql);
    }

    /**
     * Instancia de la clase
     */
    public static function singleton_conexion() {
        if(!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }

    /**
     *  Evita que el objeto sea clonado
     */
    public function __clone() {
        trigger_error("La clonacion de este objeto no esta permitida", E_USER_ERROR);
    }

} 