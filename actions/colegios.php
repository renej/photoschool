<?php
/**
 * Created by PhpStorm.
 * User: rene
 * Date: 20/05/14
 * Time: 09:55 PM
 */
require '../class/Colegios.php';
$colegio = new Colegios();

$nombre_colegio         = $_POST['colegio'];
$calle                  = $_POST['calle'];
$colonia                = $_POST['colonia'];
$ciudad                 = $_POST['ciudad'];
$estado                 = $_POST['estado'];
$cp                     = $_POST['cp'];
$telefono               = $_POST['telefono'];
$correo                 = $_POST['correo'];
$contacto               = $_POST['contacto'];
$accion                 = $_POST['accion'];

$params = array(
    'colegio'           => $nombre_colegio,
    'calle'             => $calle,
    'colonia'           => $colonia,
    'ciudad'            => $ciudad,
    'estado'            => $estado,
    'cp'                => $cp,
    'telefono'          => $telefono,
    'correo'            => $correo,
    'contacto'          => $contacto
);

if($accion == 'agregar') {
    $colegio->add($params);
}