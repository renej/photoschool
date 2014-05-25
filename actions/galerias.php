<?php
/**
 * Created by PhpStorm.
 * User: rene
 * Date: 19/05/14
 * Time: 09:52 PM
 */

require '../class/Galerias.php';
error_reporting(E_ALL);
ini_set('display_errors', '1');


$id_colegio         = $_POST['id_colegio'];
$fecha              = $_POST['fecha'];
$ruta               = '/ruta/a/mi/archivo/';
$nombre             = $_POST['nombre'];
$descripcion        = $_POST['descripcion'];
$id_usuario         = $_POST['id_usuario'];
$accion             = $_POST['accion'];

$params = array(
    'id_colegio'    => $id_colegio,
    'fecha'         => $fecha,
    'ruta'          => $ruta,
    'nombre'        => $nombre,
    'descripcion'   => $descripcion,
    'id_usuario'    => $id_usuario
);

if($accion == 'agregar') {
    $galeria = new Galerias($params);
    $crear = $galeria->create();
    if($crear) {
        header('location: ../admin/galeria.php');
    }
}