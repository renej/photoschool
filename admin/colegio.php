<?php
session_start();
if(!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 'admin') {
    header('location: ../index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Agregar Colegio</title>
    <link rel="stylesheet" href="../css/normalize.css"/>
    <link rel="stylesheet" href="../css/foundation.min.css"/>
</head>
<body>
    <div class="row">
        <ul class="breadcrumbs">
            <li class="current">Colegios</li>
            <li><a href="cupon.php">Cupones</a></li>
            <li><a href="galeria.php">Galerias</a></li>
            <li><a href="precio.php">Precio</a></li>
            <li><a href="revista.php">Revista</a></li>
            <li><a href="usuario.php">Usuarios</a></li>
        </ul>
        <div class="large-6 columns">
            <form action="../actions/colegios.php" method="post">
                <fieldset>
                    <legend>Agregar Colegio</legend>
                    <label for="colegio">
                        Colegio:
                        <input type="text" name="colegio"/>
                    </label>
                    <label for="calle">
                        Calle:
                        <input type="text" name="calle"/>
                    </label>
                    <label for="colonia">
                        Colonia:
                        <input type="text" name="colonia"/>
                    </label>
                    <label for="ciudad">
                        Ciudad:
                        <input type="text" name="ciudad"/>
                    </label>
                    <label for="estado">
                        Estado:
                        <input type="text" name="estado"/>
                    </label>
                    <label for="cp">
                        Codigo Postal:
                        <input type="text" name="cp"/>
                    </label>
                    <label for="telefono">
                        Telefono:
                        <input type="tel" name="telefono"/>
                    </label>
                    <label for="correo">
                        Correo:
                        <input type="email" name="correo"/>
                    </label>
                    <label for="contacto">
                        Contacto:
                        <input type="text" name="contacto"/>
                    </label>
                    <input type="hidden" name="accion" value="agregar"/>
                    <input type="submit" value="Agregar"/>
                </fieldset>
            </form>
        </div>
        <div class="large-6 columns">
            <form action="../actions/colegios.php" method="post">
                <fieldset>
                    <legend>Importar Archivo</legend>
                    <label>
                        Busqueda de Archivo
                        <input type="file" name="archivo"/>
                    </label>
                    <input type="hidden" name="accion" value="subir"/>
                    <input type="submit" value="Importar"/>
                </fieldset>
            </form>
        </div>
    </div>
</body>
</html>