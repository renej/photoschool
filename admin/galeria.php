<?php
session_start();
if(!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 'admin') {
    header('location: ../index.php');
}
error_reporting(E_ALL);
ini_set('display_errors', '1');
require '../class/Colegios.php';
$colegio = new Colegios();
$colegios = $colegio->all();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>Agregar Galería</title>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/normalize.css"/>
    <link rel="stylesheet" href="../css/foundation.min.css"/>
    <link rel="stylesheet" href="../css/pikaday.css"/>
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
            <li class="current">Galerias</li>
            <li><a href="precio.php">Precio</a></li>
            <li><a href="revista.php">Revista</a></li>
            <li><a href="usuario.php">Usuarios</a></li>
        </ul>
        <div class="large-6 columns">
            <form class="form" action="../actions/galerias.php" method="post">
                <fieldset>
                    <legend>Agregar Galería</legend>
                    <label>Colegio:
                        <select name="id_colegio">
                            <option value="0">Seleccione..</option>
                            <?php
                            foreach($colegios as $valor) {
                            ?>
                            <option value="<?= $valor['id'] ?>"><?= $valor['colegio'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </label>
                    <div class="row collapse">
                        <label>Fecha:</label>
                        <div class="small-10 columns">
                            <input id="datepicker" type="date" name="fecha" />
                            <div class="selected"></div>
                        </div>
                        <div class="small-2 columns">
                            <span id="btn-date" class="postfix"><i class="fa fa-calendar"></i></span>
                        </div>
                    </div>
                    <label>
                        Nombre:
                        <input type="text" name="nombre"/>
                    </label>
                    <label>
                        Descripción:
                        <textarea name="descripcion" id="descripcion" cols="30" rows="4"></textarea>
                    </label>
                    <label>
                        Usuario:
                        <select name="id_usuario">
                            <option value="0">Seleccione...</option>
                        </select>
                    </label>
                    <input type="hidden" name="accion" value="agregar"/>
                    <input type="submit" value="Agregar"/>
                </fieldset>
            </form>
        </div>
    </div>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.5.1/moment.min.js"></script>
    <script src="../js/vendor/jquery.js"></script>
    <script src="../js/vendor/pikaday.js"></script>
    <script src="../js/foundation.min.js"></script>
    <script>
        var picker = new Pikaday({
            field: document.getElementById('datepicker'),
            trigger: document.getElementById('btn-date'),
            minDate: new Date('2014-01-01'),
            maxDate: new Date('2040-12-31'),
            yearRange: [2014, 2040],
            onSelect: function() {
                var date = document.createTextNode(this.getMoment().format('Do MMMM YYYY') + ' ');
                document.getElementById('selected').appendChild(date);
            }
        });
        picker.setMoment(moment().dayOfYear());
    </script>
</body>
</html>