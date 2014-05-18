<?php
/**
 * Created by PhpStorm.
 * User: rene
 * Date: 18/05/14
 * Time: 12:37 AM
 */
require 'CrudModel.php';
class Colegios extends CrudModel {

    public function __construct() {
        $this->_dbName = "photoschool";
    }

    public function get() {
        $this->query = "SELECT * FROM colegios";
        $this->simple_query();
    }

    public function add($colegio = array()) {
        $this->query = "INSERT INTO colegios (colegio, calle, colonia, ciudad, estado, cp, telefono, correo, contacto)
        VALUES (:colegio, :calle, :colonia, :ciudad, :estado, :cp, :telefono, :correo, :contacto)";
        $this->dynamic_query($colegio, true);
    }

    public function edit($colegio = array()) {
        $this->query = "UPDATE colegios SET colegio = :colegio, calle = :calle, colonia = :colonia, ciudad = :ciudad,
        estado = :estado, cp = :cp, telefono = :telefono, correo = :correo, contacto = :contacto WHERE ";
        $this->dynamic_query($colegio, true);
    }

    public function delete($colegio = array()) {
        $this->query = "DELETE FROM colegios WHERE id = :id";
        $this->dynamic_query($colegio, true);
    }
} 