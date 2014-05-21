<?php
/**
 * Created by PhpStorm.
 * User: rene
 * Date: 21/05/14
 * Time: 08:21 PM
 */
require '../class/Precios.php';
error_reporting(E_ALL);
ini_set('display_errors', '1');
$precio = new Precios();

$tipo               = $_POST['tipo'];
$descripcion        = $_POST['descripcion'];
$costo             = $_POST['precio'];
$accion             =$_POST['accion'];

$params = array(
    'tipo'          => $tipo,
    'descripcion'   => $descripcion,
    'precio'        => $costo
);

if($accion == 'agregar') {
    $precio->add($params);
}