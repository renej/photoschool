<?php
/**
 * Created by PhpStorm.
 * User: rene
 * Date: 18/05/14
 * Time: 06:21 PM
 */
require 'CrudModel.php';
class Revista extends CrudModel {

    public function __construct() {
        $this->_dbName = 'photoschool';
    }

    public function get() {
        $this->query = "SELECT * FROM revista";
        $this->simple_query();
    }

    public function add($revista = array()) {
        $this->query = "INSERT INTO revista (correo) VALUES (:correo)";
        $this->dynamic_query($revista, true);
    }

    public function edit($revista = array()) {
        $this->query = "UPDATE revista SET correo = :correo WHERE id = :id";
        $this->dynamic_query($revista, true);
    }

    public function delete($revista = array()) {
        $this->query = "DELETE FROM revista WHERE id = :id";
        $this->dynamic_query($revista, true);
    }
} 