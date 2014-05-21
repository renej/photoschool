<?php
/**
 * Created by PhpStorm.
 * User: rene
 * Date: 21/05/14
 * Time: 09:27 PM
 */
require '../class/Revista.php';
error_reporting(E_ALL);
ini_set('display_errors', '1');
$revista = new Revista();

$correo             = $_POST['correo'];
$accion             = $_POST['accion'];

$params = array(
    'correo'        => $correo
);

if($accion == 'agregar') {
    $revista->add($params);
}