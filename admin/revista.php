<?php
session_start();
if(!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 'admin') {
    header('location: ../index.php');
}
require '../class/Revista.php';
$revista = new Revista();
$revistas = $revista->all();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Usuarios Suscritos</title>
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
            <li><a href="galeria.php">Galerias</a></li>
            <li><a href="precio.php">Precio</a></li>
            <li class="current">Revista</li>
            <li><a href="usuario.php">Usuarios</a></li>
        </ul>
        <div class="small-6 large-8 columns">
            <table>
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Correo</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($revistas as $valor) {
                    ?>
                    <tr>
                        <td><?= $valor['id'] ?></td>
                        <td><?= $valor['correo'] ?></td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <form action="../actions/revistas.php" method="post">
                <input type="hidden" name="accion" value="exportar"/>
                <input class="button [tiny small large]" type="submit" value="Exportar Excel"/>
            </form>
        </div>
    </div>
    <!--<form action="../actions/revistas.php" method="post">
        <label for="correo">Correo:</label>
        <input type="email" name="correo"/><br/>
        <input type="hidden" name="accion" value="agregar"/>
        <input type="submit" value="Agregar"/>
    </form>-->
</body>
</html>