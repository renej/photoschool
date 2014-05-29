<?php
/**
 * Created by PhpStorm.
 * User: rene
 * Date: 19/05/14
 * Time: 09:52 PM
 */

require '../class/Galerias.php';

$id_colegio         = $_POST['id_colegio'];
$fecha              = $_POST['fecha'];
$nombre             = $_POST['nombre'];
$carpeta            = str_replace(" ", "_", strtolower($nombre));
$ruta               = '../galerias/'.$carpeta.'/';
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
    mkdir($ruta, 0775, true);
    $galeria = new Galerias($params);
    $crear = $galeria->create();
    if($crear) {
        header('location: ../admin/galeria.php');
    }
}