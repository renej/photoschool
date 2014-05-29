<?php
session_start();
if(!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 'admin') {
    header('location: ../index.php');
}
require '../class/Galerias.php';
$galeria = new Galerias();
$galerias = $galeria->all();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>Agregar Foto</title>
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
            <li class="current">Fotos</li>
            <li><a href="galeria.php">Galerias</a></li>
            <li><a href="precio.php">Precio</a></li>
            <li><a href="revista.php">Revista</a></li>
            <li><a href="usuario.php">Usuarios</a></li>
        </ul>
        <div class="large-6 columns">
            <form action="../actions/fotos.php" method="post" enctype="multipart/form-data">
                <fieldset>
                    <legend>Agregar Fotos</legend>
                    <label>
                        Galería
                        <select name="id_galeria">
                            <option value="0">Seleccione...</option>
                            <?php
                            foreach($galerias as $value) {
                                ?>
                                <option value="<?= $value['id'] ?>"><?= $value['nombre'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </label>
                    <label>
                        Tipo:
                        <select name="tipo">
                            <option value="0">Seleccione...</option>
                            <option value="digital">Digital</option>
                            <option value="impresa">Impresa</option>
                            <option value="ambos">Ambos</option>
                        </select>
                    </label>
                    <input type="file" name="fotos[]" id="fotos" multiple/>
                    <input type="hidden" name="accion" value="subir"/>
                    <input type="submit" value="Subir"/>
                </fieldset>
            </form>
        </div>
    </div>
</body>
</html>