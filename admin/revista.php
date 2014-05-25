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
        <ul class="breadcrumbs">
            <li><a href="colegio.php">Colegios</a></li>
            <li><a href="cupon.php">Cupones</a></li>
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