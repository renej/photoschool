<?php
/**
 * Created by PhpStorm.
 * User: rene
 * Date: 17/05/14
 * Time: 08:49 PM
 */
require 'CrudModel.php';
class Login extends CrudModel {

    public function __construct() {
        $this->_dbName = "photoschool";
    }

    public function get($user = array()) {
        $this->query = 'SELECT * FROM usuarios WHERE usuario = :usuario AND clave = :clave';
        $this->dynamic_query($user, false);
    }

    public function add($user = array()) {

    }

    public function edit($user = array()) {

    }

    public function delete($id = array()) {

    }
} 