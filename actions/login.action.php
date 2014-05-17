<?php
/**
 * Created by PhpStorm.
 * User: rene
 * Date: 17/05/14
 * Time: 12:26 AM
 *
 * Action para el proceso de login
 */
require_once '../class/Login.php';

$singletonLogin = Login::singleton_login();

if(isset($_POST['usuario'])){
    $usuario = $_POST['usuario'];
    $password = $_POST['clave'];

    $login = $singletonLogin->login_user($usuario, $password);

    if($login == true){
        header("Location: ../sistema/index.php");
    }
}