<?php
/**
 * Created by PhpStorm.
 * User: rene
 * Date: 17/05/14
 * Time: 08:49 PM
 */
require_once 'easyCRUD.class.php';
class Login extends Crud {
    protected $table = 'usuarios';
    protected $pk = 'id';
    protected $usuario = 'usuarios';
} 