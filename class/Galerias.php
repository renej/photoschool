<?php
/**
 * Created by PhpStorm.
 * User: rene
 * Date: 18/05/14
 * Time: 01:56 PM
 */
require 'CrudModel.php';
class Galerias extends CrudModel {

    public function __construct() {
        $this->_dbName = 'photoschool';
    }

    public function get() {
        $this->query = "SELECT * FROM galerias";
        $this->simple_query();
    }

    public function add($galeria = array()) {
        $this->query = "INSERT INTO galerias (id_colegio, fecha, ruta, nombre, descripcion, id_usuario) VALUES(
        :id_colegio, :fecha, :ruta, :nombre, :descripcion, :id_usuario)";
        $this->dynamic_query($galeria, true);
    }

    public function edit($galeria = array()) {
        $this->query = "UPDATE galerias SET id_colegio = :id_colegio, fecha = :fecha, ruta = :ruta, nombre = :nombre,
        descripcion = :descripcion, id_usuario = :id_usuario WHERE id = :id";
        $this->dynamic_query($galeria, true);
    }

    public function delete($galeria = array()) {
        $this->query = "DELETE FROM galerias WHERE id = :id";
        $this->dynamic_query($galeria, true);
    }

} 