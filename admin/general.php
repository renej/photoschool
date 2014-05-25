<?php
session_start();
if(!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 'admin') {
    header('location: ../index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../css/normalize.css"/>
    <link rel="stylesheet" href="../css/foundation.min.css"/>
</head>
<body>
    Hola <?= $_SESSION['nombre'] ?> eres del tipo <?= $_SESSION['tipo'] ?>
    <div class="row">
        <ul class="breadcrumbs">
            <li><a href="colegio.php">Colegios</a></li>
            <li><a href="cupon.php">Cupones</a></li>
            <li><a href="galeria.php">Galerías</a></li>
            <li><a href="precio.php">Precio</a></li>
            <li><a href="revista.php">Revista</a></li>
            <li><a href="usuario.php">Usuarios</a></li>
        </ul>
    </div>
</body>
</html>