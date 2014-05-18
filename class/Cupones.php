<?php
/**
 * Created by PhpStorm.
 * User: rene
 * Date: 18/05/14
 * Time: 01:15 PM
 */
require 'CrudModel.php';

class Cupones extends CrudModel {

    public function __construct() {
        $this->_dbName = 'photoschool';
    }

    public function get() {
        $this->query = "SELECT * FROM cupones";
        $this->simple_query();
    }

    public function add($cupones = array()) {
        $this->query = "INSERT INTO cupones (descuento, fecha_inicio, fecha_fin, id_usuario, tipo_usuario, cupon, estatus)
        VALUES (:descuento, :fecha_inicio, :fecha_fin, :id_usuario, :tipo_usuario, :cupon, :estatus)";
        $this->dynamic_query($cupones, true);
    }

    public function edit($cupones = array()) {
        $this->query = "UPDATE cupones SET descuento = :descuento, fecha_inicio = :fecha_inicio, fehca_fin = :fecha_fin,
        id_usuario = :id_usuario, tipo_usuario = :tipo_usuario, cupo = :cupon, estatus = :estatus";
        $this->dynamic_query($cupones, true);
    }

    public function delete($cupones = array()) {
        $this->query = "DELETE FROM cupones WHERE id = :id";
        $this->dynamic_query($cupones, true);
    }

} 