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
    <div class="row">
        <div class="large-6 columns">
            <img src="../img/logo_small.png" alt="Logo" width="200" height="41"/>
        </div>
        <div class="large-6 columns">
            <p class="text-right">
                Bienvenido: <?= $_SESSION['nombre']; ?><br/>
                <a href="../actions/logout.php" class="text-right">Salir</a>
            </p>
        </div>
    </div>
    <div class="row">
        <ul class="breadcrumbs">
            <li><a href="colegio.php">Colegios</a></li>
            <li><a href="cupon.php">Cupones</a></li>
            <li><a href="foto.php">Fotos</a></li>
            <li><a href="galeria.php">Galerías</a></li>
            <li><a href="precio.php">Precio</a></li>
            <li><a href="revista.php">Revista</a></li>
            <li><a href="usuario.php">Usuarios</a></li>
        </ul>
    </div>
</body>
</html>