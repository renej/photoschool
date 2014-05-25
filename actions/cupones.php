<?php
/**
 * Created by PhpStorm.
 * User: rene
 * Date: 18/05/14
 * Time: 09:00 PM
 */

require '../class/Cupones.php';

$descuento              = $_POST['descuento'];
$inicio                 = $_POST['fecha_inicio'];
$fin                    = $_POST['fecha_fin'];
$usuario                = $_POST['id_usuario'];
$tipo_usuario           = $_POST['tipo_usuario'];
$cupon_nombre           = $_POST['cupon'];
$estatus                = $_POST['estatus'];
$accion                 = $_POST['accion'];

$params = array(
    'descuento'         => $descuento,
    'fecha_inicio'      => $inicio,
    'fecha_fin'         => $fin,
    'id_usuario'        => $usuario,
    'tipo_usuario'      => $tipo_usuario,
    'cupon'             => $cupon_nombre,
    'estatus'           => $estatus
);

if($accion == 'agregar') {
    $cupon = new Cupones($params);
    $crear = $cupon->create();
    if($crear) {
        header('location: ../admin/cupon.php');
    }
}