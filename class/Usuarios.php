<?php
/**
 * Created by PhpStorm.
 * User: rene
 * Date: 18/05/14
 * Time: 06:45 PM
 */
require 'CrudModel.php';
class Usuarios extends CrudModel {

    public function __construct() {
        $this->_dbName = 'photoschool';
    }

    public function get() {
        $this->query = "SELECT * FROM usuarios";
        $this->simple_query();
    }

    public function add($usuario = array()) {
        $this->query = "INSERT INTO usuarios (matricula, tipo_usuario, usuario, id_colegio, grado, password, expira)
        VALUES (:matricula, :tipo_usuario, :usuario, :id_colegio, :grado, :password, :expira)";
        $this->dynamic_query($usuario, true);
    }

    public function edit($usuario = array()) {
        $this->query = "UPDATE usuarios SET matricula = :matricula, tipo_usuario = :tipo_usuario, usuario = :usuario,
        id_colegio = :id_colegio, grado = :grado, password = :password, expira = :expira";
        $this->dynamic_query($usuario, true);
    }

    public function delete($usuario = array()) {
        $this->query = "DELETE FROM usuarios WHERE id = :id";
        $this->dynamic_query($usuario, true);
    }

} 