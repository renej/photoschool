<?php
/**
 * Created by PhpStorm.
 * User: rene
 * Date: 17/05/14
 * Time: 08:08 PM
 */

abstract class CrudModel {

    private $_dbUser = 'root';
    private $_dbPassword = 'root';
    private $_dbHost = 'localhost';
    protected $_dbName = 'photoschool';
    protected $query;
    protected $rows = array();
    private $_connection;


    abstract protected function add();
    abstract protected function get();
    abstract protected function edit();
    abstract protected function delete();

    private function _conect() {
        $this->_connection = new PDO('mysql:host=' . $this->_dbHost . '; dbname=' . $this->_dbName, $this->_dbUser, $this->_dbPassword);
        $this->_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->_connection->exec('SET CHARACTER SET utf8');
    }

    private function _close_connection() {
        $this->_connection = null;
    }

    protected function dynamic_query($values, $insert = false) {
        $this->_conect();
        $result = $this->_connection->prepare($this->query);

        foreach($values as $key => $value) {
            if(is_int($value)) {
                $param = PDO::PARAM_INT;
            }elseif(is_bool($value)) {
                $param = PDO::PARAM_BOOL;
            }elseif(is_null($value)) {
                $param = PDO::PARAM_NULL;
            }elseif(is_string($value)) {
                $param = PDO::PARAM_STR;
            }else {
                $param = false;
            }

            if($param) {
                $result->bindValue(":$key", $value, $param);
            }
        }

        $result->execute();

        if($insert == false) {
            if($result->rowCount() > 1) {
                $this->rows = $result->fetchAll();
            }elseif($result->rowCount() == 1) {
                $this->rows = $result->fetch();
            }
        }
        $result = null;
        $this->_close_connection();
    }

    protected function simple_query() {
        $this->_conect();
        $result = $this->_connection->prepare($this->query);
        $result->execute();
        $this->rows = $result->fetchAll();
        $result = null;
        $this->_close_connection();
    }

} 