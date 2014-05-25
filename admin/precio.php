<?php
session_start();
if(!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 'admin') {
    header('location: ../index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Agregar Precios</title>
    <link rel="stylesheet" href="../css/normalize.css"/>
    <link rel="stylesheet" href="../css/foundation.min.css"/>
</head>
<body>
    <div class="row">
        <ul class="breadcrumbs">
            <li><a href="colegio.php">Colegios</a></li>
            <li><a href="cupon.php">Cupones</a></li>
            <li><a href="galeria.php">Galerias</a></li>
            <li class="current">Precio</li>
            <li><a href="revista.php">Revista</a></li>
            <li><a href="usuario.php">Usuarios</a></li>
        </ul>
        <div class="large-6 columns">
            <form method="post" action="../actions/precios.php">
                <fieldset>
                    <legend>Agregar Precios</legend>
                    <label for="tipo">
                        Tipo:
                        <select name="tipo">
                            <option value="0">Seleccione...</option>
                            <option value="digital">Digital</option>
                            <option value="impresa">Impresa</option>
                        </select>
                    </label>
                    <label>
                        Descripción:
                        <input type="text" name="descripcion"/>
                    </label>
                    <label for="precio">
                        Precio:
                        <input type="text" name="precio"/>
                    </label>
                    <input type="hidden" name="accion" value="agregar"/>
                    <input type="submit" value="Agregar"/>
                </fieldset>
            </form>
        </div>
    </div>
</body>
</html>