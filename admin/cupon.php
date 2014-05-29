<?php
session_start();
if(!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 'admin') {
    header('location: ../index.php');
}
require '../class/Usuarios.php';
$usuario = new Usuarios();
$usuarios = $usuario->all();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>Agregar Cupon</title>
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
            <li class="current">Cupones</li>
            <li><a href="foto.php">Fotos</a></li>
            <li><a href="galeria.php">Galerias</a></li>
            <li><a href="precio.php">Precio</a></li>
            <li><a href="revista.php">Revista</a></li>
            <li><a href="usuario.php">Usuarios</a></li>
        </ul>
        <div class="large-6 columns">
            <form action="../actions/cupones.php" method="post">
                <fieldset>
                    <legend>Agregar Cupon</legend>
                    <label for="descuento">
                        Descuento:
                        <input type="text" name="descuento"/>
                    </label>
                    <div class="row collapse">
                        <label>Fecha de Inicio:</label>
                        <div class="small-10 columns">
                            <input id="datepicker" type="date" name="fecha_inicio" />
                            <div class="selected"></div>
                        </div>
                        <div class="small-2 columns">
                            <span id="btn-date" class="postfix"><i class="fa fa-calendar"></i></span>
                        </div>
                    </div>
                    <div class="row collapse">
                        <label>Fecha Fin:</label>
                        <div class="small-10 columns">
                            <input id="datepicker2" type="date" name="fecha_fin" />
                            <div class="selected2"></div>
                        </div>
                        <div class="small-2 columns">
                            <span id="btn-date2" class="postfix"><i class="fa fa-calendar"></i></span>
                        </div>
                    </div>
                    <label for="id_usuario">
                        Usuario:
                        <select name="id_usuario">
                            <option value="0">Seleccione...</option>
                            <?php
                            foreach($usuarios as $valor) {
                            ?>
                            <option value="<?= $valor['id'] ?>"><?= $valor['usuario'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </label>
                    <label>
                        Tipo de Usuario:
                        <select name="tipo_usuario">
                            <option value="seleccione">Seleccione...</option>
                            <option value="admin">Administrador</option>
                            <option value="colegio">Colegio</option>
                            <option value="usuario">Usuario</option>
                            <option value="invitado">Invitado</option>
                        </select>
                    </label>
                    <label for="cupon">
                        Cupon:
                        <input type="text" name="cupon"/>
                    </label>
                    <label for="estatus">
                        Estatus:
                        <select name="estatus">
                            <option value="seleccione">Seleccione...</option>
                            <option value="A">Activo</option>
                            <option value="C">Cancelado</option>
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
        var picker2 = new Pikaday({
            field: document.getElementById('datepicker2'),
            trigger: document.getElementById('btn-date2'),
            minDate: new Date('2014-01-01'),
            maxDate: new Date('2040-12-31'),
            yearRange: [2014, 2040],
            onSelect: function() {
                var date = document.createTextNode(this.getMoment().format('Do MMMM YYYY') + ' ');
                document.getElementById('selected2').appendChild(date);
            }
        });
        picker.setMoment(moment().dayOfYear());
        picker2.setMoment(moment().dayOfYear());
    </script>
</body>
</html>