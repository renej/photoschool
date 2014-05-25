<?php
/**
 * Created by PhpStorm.
 * User: rene
 * Date: 22/05/14
 * Time: 08:06 PM
 */
error_reporting(E_ALL);
ini_set('display_errors', '1');
require 'class/Login.php';
$person = new Login();
$login = new Login();
$person->id = "1";
$person->find();

$login->usuario = "gonzalo";
$login->login();

$all = $person->all();
print_r($all);
echo "<hr>";
echo $person->usuario;
echo "<hr>";
echo $login->password;

