<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <form action="../actions/revistas.php" method="post">
        <label for="correo">Correo:</label>
        <input type="email" name="correo"/><br/>
        <input type="hidden" name="accion" value="agregar"/>
        <input type="submit" value="Agregar"/>
    </form>
</body>
</html>