<?php
/**
 * Created by PhpStorm.
 * User: rene
 * Date: 16/05/14
 * Time: 09:47 PM
 *
 * Clase para login de usuarios
 */

require_once 'Conexion.php';
session_start();

class Login {
    private static $instancia;
    private $dbh;

    private function __construct() {
        $this->dbh = Conexion::singleton_conexion();
    }

    public static function singleton_login() {
        if(!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }

    public function login_user($user, $password) {
        try{
            $sql = "SELECT * FROM users WHERE usuario = ? AND clave = ?";
            $query = $this->dbh->prepare($sql);
            $query->bindParam(1, $user);
            $query->bindParam(2, $password);
            $query->execute();
            $this->dbh = null;

            #Si existe el usuario
            if($query->rowCount() == 1){
                $fila = $query->fetch();
                $_SESSION['nombre'] = $fila['usuario'];
                return true;
            }
        }catch (PDOException $e){
            print "Error! " . $e->getMessage();
        }
    }

    public function __clone() {
        trigger_error("La clonacion de este objeto no esta permitida", E_USER_ERROR);
    }
} 