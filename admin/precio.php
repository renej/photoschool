<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title></title>
</head>
<body>
    <form method="post" action="../actions/precios.php">
        <label for="tipo">Tipo:</label>
        <input type="text" name="tipo"/><br/>
        <label for="descripcion">Descripción:</label>
        <input type="text" name="descripcion"/><br/>
        <label for="precio">Precio:</label>
        <input type="text" name="precio"/><br/>
        <input type="hidden" name="accion" value="agregar"/>
        <input type="submit" value="Agregar"/>
    </form>
</body>
</html>