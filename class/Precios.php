<?php
/**
 * Created by PhpStorm.
 * User: rene
 * Date: 18/05/14
 * Time: 06:00 PM
 */
require 'CrudModel.php';
class Precios extends CrudModel {
    public function __construct() {
        $this->_dbName = 'photoschool';
    }

    public function get() {
        $this->query = "SELECT * FROM precios";
        $this->simple_query();
    }

    public function add($precio = array()) {
        $this->query = "INSERT INTO precios (tipo, descripcion, precio) VALUES (:tipo, :descripcion, :precio)";
        $this->dynamic_query($precio, true);
    }

    public function edit($precio = array()) {
        $this->query = "UPDATE precios SET tipo = :tipo, descripcion = :descripcion, precio = :precio WHERE id = :id";
        $this->dynamic_query($precio, true);
    }

    public function delete($precio = array()) {
        $this->query = "DELETE FROM precios WHERE id = :id";
        $this->dynamic_query($precio, true);
    }
} 