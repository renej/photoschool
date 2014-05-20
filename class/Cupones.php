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
        $this->_dbName = "photoschool";
    }

    public function get() {
        $this->query = 'SELECT * FROM cupones';
        $this->simple_query();
        if($this->rows > 0){
            return $this->rows;
        }
    }

    //inserta un nuevo cupon
    public function add($cupon = array()) {
        //consulta parametrizada
        $this->query = 'INSERT INTO cupones(descuento, fecha_inicio, fecha_fin, id_usuario, tipo_usuario, cupon, estatus)
        VALUES(:descuento, :fecha_inicio, :fecha_fin, :id_usuario, :tipo_usuario, :cupon, :estatus)';
        //con el segundo parámetro a true hacemos un insert
        $this->dynamic_query($cupon, true);
    }

    //actualiza en este caso un cupon, pero puede ser cualquier otra cosa
    public function edit($cupon = array()) {
        $this->query = 'UPDATE cupones SET descuento = :descuento, fecha_inicio = :fecha_inicio, fecha_fin = :fecha_fin,
        id_usuario = :id_usuario, tipo_usuario = :tipo_usuario, cupon = :cupon, estatus = :estatus WHERE id = :id';
        $this->dynamic_query($user, true);
    }

    //elimina un cupon por su id
    public function delete($id = array()) {
        $this->query = 'DELETE FROM cupones WHERE id = :id';
        $this->dynamic_query($id, true);
    }
} 