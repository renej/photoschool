<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title></title>
</head>
<body>
    <form action="../actions/galerias.php" method="post">
        <label for="colegio">Colegio:</label>
        <input type="text" name="id_colegio"/><br/>
        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha"/><br/>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre"/><br/>
        <label for="descripcion">Descripción:</label>
        <input type="text" name="descripcion"/><br/>
        <label for="usuario">Usuario:</label>
        <input type="text" name="id_usuario"/><br/>
        <input type="hidden" name="accion" value="agregar"/>
        <input type="submit" value="Agregar"/>
    </form>
</body>
</html>