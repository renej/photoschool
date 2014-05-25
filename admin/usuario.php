<?php
session_start();
if(!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 'admin') {
    header('location: ../index.php');
}
require '../class/Colegios.php';
$colegio = new Colegios();
$colegios = $colegio->all();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>Agregar Usuario</title>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/normalize.css"/>
    <link rel="stylesheet" href="../css/foundation.min.css"/>
    <link rel="stylesheet" href="../css/pikaday.css"/>
</head>
<body>
    <div class="row">
        <ul class="breadcrumbs">
            <li><a href="colegio.php">Colegios</a></li>
            <li><a href="cupon.php">Cupones</a></li>
            <li><a href="galeria.php">Galerias</a></li>
            <li><a href="precio.php">Precio</a></li>
            <li><a href="revista.php">Revista</a></li>
            <li class="current"><a href="usuario.php">Usuarios</a></li>
        </ul>
        <div class="large-6 columns">
            <form action="../actions/usuarios.php" method="post">
                <fieldset>
                    <legend>Agregar Usuario</legend>
                    <label>
                        Matrícula:
                        <input type="text" name="matricula"/>
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
                    <label>
                        Nombre de Usuario:
                        <input type="text" name="usuario"/>
                    </label>
                    <label>
                        Colegio:
                        <select name="id_colegio">
                            <option value="0">Seleccione...</option>
                            <?php
                            foreach($colegios as $value) {
                            ?>
                            <option value="<?= $value['id'] ?>"><?= $value['colegio'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </label>
                    <label>
                        Grado:
                        <input type="text" name="grado"/>
                    </label>
                    <label>
                        Password:
                        <input type="password" name="password"/><br/>
                    </label>
                    <div class="row collapse">
                        <label>Expira:</label>
                        <div class="small-10 columns">
                            <input id="datepicker" type="date" name="expira" />
                            <div class="selected"></div>
                        </div>
                        <div class="small-2 columns">
                            <span id="btn-date" class="postfix"><i class="fa fa-calendar"></i></span>
                        </div>
                    </div>
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
