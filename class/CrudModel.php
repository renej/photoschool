<?php
/**
 * Created by PhpStorm.
 * User: rene
 * Date: 17/05/14
 * Time: 08:08 PM
 */

abstract class CrudModel {

    /**
     * @desc nombre del usuario de la base de datos
     * @var $_dbUser
     * @access private
     */
    private $_dbUser = "root";

    /**
     * @desc password de la base de datos
     * @var $_dbPassword
     * @access private
     */
    private $_dbPassword = "root";

    /**
     * @desc nombre del host
     * @var $_dbHost
     * @access private
     */
    private $_dbHost = "localhost";

    /**
     * @desc nombre de la base de datos
     * @var $_dbName
     * @access protected
     */
    protected $_dbName = "mydb";

    /**
     * @desc será accesible y utilizada por las clases que hereden para realizar las consultas
     * @var $query
     * @access protected
     */
    protected $query;

    /**
     * @desc array para devolver datos a las consultas
     * @var $rows
     * @access protected
     */
    protected $rows = array();

    /**
     * @desc conexión a la base de datos
     * @var $_connection
     * @access private
     */
    private $_connection;

    /**
     * @desc - estos métodos los definimos abstractos y protegidos, ésto es porqué serán implementados
     * por las clases que hereden de ella, de esta forma, podrá ser todo dinámico y escalable
     */
    abstract protected function add();
    abstract protected function get();
    abstract protected function edit();
    abstract protected function delete();

    /**
     * @desc - establecemos la conexión con la base de datos
     * @access private
     */
    private function _connect()
    {
        $this->_connection = new PDO('mysql:host='.$this->_dbHost.'; dbname='.$this->_dbName, $this->_dbUser, $this->_dbPassword);
        $this->_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->_connection->exec("SET CHARACTER SET utf8");
    }

    /**
     * @desc - cierra la conexión con la base de datos
     */
    private function _close_connection()
    {
        $this->_connection = null;
    }

    /**
     * @desc - consulta dinámica con pdo, de ámbito protegido, de esta forma sus clases hijas podrán utilizarlo
     * @access protected
     * @param $values - array con los datos
     * @param $insert - bool si es false devuelve resultados, en otro caso elimina, actualiza o inserta
     */
    protected function dynamic_query($values, $insert = false)
    {
        $this->_connect();
        $result = $this->_connection->prepare($this->query);

        foreach($values as $key => $value){
            if(is_int($value)){
                $param = PDO::PARAM_INT;
            }
            elseif(is_bool($value)){
                $param = PDO::PARAM_BOOL;
            }
            elseif(is_null($value)){
                $param = PDO::PARAM_NULL;
            }
            elseif(is_string($value)){
                $param = PDO::PARAM_STR;
            }
            else{
                $param = FALSE;
            }

            if($param){
                $result->bindValue(":$key",$value,$param);
            }
        }

        $result->execute();

        if($insert == false){
            if($result->rowCount() > 1){
                $this->rows = $result->fetchAll();
            }else if($result->rowCount() == 1){
                $this->rows = $result->fetch();
            }
        }

        $result = null;
        $this->_close_connection();
    }

    /**
     * @desc - útil para hacer una consulta select sencilla y devolver filas,
     * de ámbito protegido, de esta forma sus clases hijas podrán utilizarlo
     */
    protected function simple_query()
    {
        $this->_connect();
        $result = $this->_connection->prepare($this->query);
        $result->execute();
        $this->rows = $result->fetchAll();
        $result = null;
        $this->_close_connection();
    }

} 