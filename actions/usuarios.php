<?php
/**
 * Created by PhpStorm.
 * User: rene
 * Date: 20/05/14
 * Time: 07:41 PM
 */
require '../class/Usuarios.php';

$matricula              = $_POST['matricula'];
$tipo_usuario           = $_POST['tipo_usuario'];
$nombre_usuario         = $_POST['usuario'];
$id_colegio             = $_POST['id_colegio'];
$grado                  = $_POST['grado'];
$password               = sha1($_POST['password']);
$expira                 = $_POST['expira'];
$accion                 = $_POST['accion'];

$params = array(
    'matricula'         => $matricula,
    'tipo_usuario'      => $tipo_usuario,
    'usuario'           => $nombre_usuario,
    'id_colegio'        => $id_colegio,
    'grado'             => $grado,
    'password'          => $password,
    'expira'            => $expira
);

if($accion == 'agregar') {
    $usuario = new Usuarios($params);
    $crear = $usuario->create();
    if($crear) {
        header('location: ../admin/usuario.php');
    }
}