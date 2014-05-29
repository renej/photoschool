<?php
/**
 * Created by PhpStorm.
 * User: rene
 * Date: 26/05/14
 * Time: 12:07 AM
 */
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once '../class/Galerias.php';
require_once '../class/Fotos.php';
$galeria = new Galerias();
$galeria->id = $_POST['id_galeria'];
$galeria->find();
$ruta = $galeria->ruta;

$count = 0;
$exito = 0;

$idGaleria  = $_POST['id_galeria'];
$tipo       = $_POST['tipo'];

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach($_FILES['fotos']['name'] as $i => $name) {
        if(strlen($_FILES['fotos']['name'][$i]) > 1) {
            if(move_uploaded_file($_FILES['fotos']['tmp_name'][$i], $ruta.$name)) {
                $count++;
                $exito = 1;
                $params = array(
                    'foto'          => $name,
                    'id_galeria'    => $idGaleria,
                    'tipo'          => $tipo
                );
                $foto = new Fotos($params);
                $crear = $foto->create();
                header('location: ../admin/foto.php');
            }
        }
    }
}