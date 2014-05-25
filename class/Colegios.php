<?php
/**
 * Created by PhpStorm.
 * User: rene
 * Date: 18/05/14
 * Time: 12:37 AM
 */
require 'easyCRUD.class.php';
class Colegios extends Crud {
    protected $table    = 'colegios';
    protected $pk       = 'id';
}