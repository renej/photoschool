<?php
/**
 * Created by PhpStorm.
 * User: rene
 * Date: 17/05/14
 * Time: 08:41 PM
 */
require '../class/Db.class.php';

session_start();

$db = new DB();

$errmsg_arr = array();
$errflag = false;

$usuario = $_POST['usuario'];
$clave = sha1($_POST['clave']);

if($usuario == '') {
    $errmsg_arr[] = 'Error el nombre de usuario es requerido';
    $errflag = true;
}
if($clave == '') {
    $errmsg_arr[] = 'Error el password es requerido';
    $errflag = true;
}

$params = array(
    'usuario'   => $usuario,
    'password'  => $clave
);

$db->bindMore($params);
$user = $db->row("SELECT * FROM usuarios WHERE usuario = :usuario AND password = :password", PDO::FETCH_NUM);

if($user > 0) {
    if($user['tipo_usuario'] == 'admin') {
        $_SESSION['nombre'] = $user['usuario'];
        $_SESSION['tipo'] = $user['tipo_usuario'];
        header('location: ../admin/general.php');
    }
    if($user['tipo_usuario'] == 'colegio') {
        $_SESSION['nombre'] = $user['usuario'];
        $_SESSION['tipo'] = $user['tipo_usuario'];
        header('location: ../sistema/galerias.php');
    }
    if($user['tipo_usuario'] == 'invitado') {
        $_SESSION['nombre'] = $user['usuario'];
        $_SESSION['tipo'] = $user['tipo_usuario'];
        header('location: ../sistema/galerias.php');
    }
}else {
    $errmsg_arr[] = 'El usuario y password no fueron encontrados';
    $errflag = true;
}

if($errflag) {
    $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
    session_write_close();
    header('location: ../index.php');
    exit();
}
