<?php
/**
 * Created by PhpStorm.
 * User: rene
 * Date: 17/05/14
 * Time: 08:41 PM
 */
require '../class/Login.php';
session_start();
$login = new Login();

$usuario = $_POST['usuario'];
$clave = sha1($_POST['clave']);

$login->get(array('usuario' => $usuario, 'clave' => $clave));

if($login['roll'] == 'admin') {
    $_SESSION['tipo'] = "admin";
    $_SESSION['nombre'] = $login['usuario'];
    header('Location: ../admin/usuarios.php');
}elseif($login['tipo'] == 'colegio') {
    $_SESSION['tipo'] = "colegio";
    $_SESSION['nombre'] = $login['usuario'];
    header('Location: ../sistema/products.php');
}elseif($login['tipo'] == 'invitado') {
    $_SESSION['tipo'] = "invitado";
    $_SESSION['nombre'] = $login['usuario'];
    header('Location: ../sistema/products.php');
}