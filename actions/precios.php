<?php
/**
 * Created by PhpStorm.
 * User: rene
 * Date: 21/05/14
 * Time: 08:21 PM
 */
require_once '../class/Precios.php';
error_reporting(E_ALL);
ini_set('display_errors', '1');

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
    $precio = new Precios($params);
    $crear = $precio->create();
    if($crear) {
        header('location: ../admin/precio.php');
    }
}