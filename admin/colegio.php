<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <form action="../actions/colegios.php" method="post">
        <label for="colegio">Colegio:</label>
        <input type="text" name="colegio"/><br/>
        <label for="calle">Calle:</label>
        <input type="text" name="calle"/><br/>
        <label for="colonia">Colonia:</label>
        <input type="text" name="colonia"/><br/>
        <label for="ciudad">Ciudad:</label>
        <input type="text" name="ciudad"/><br/>
        <label for="estado">Estado:</label>
        <input type="text" name="estado"/><br/>
        <label for="cp">Codigo Postal:</label>
        <input type="text" name="cp"/><br/>
        <label for="telefono">Telefono:</label>
        <input type="tel" name="telefono"/><br/>
        <label for="correo">Correo:</label>
        <input type="email" name="correo"/><br/>
        <label for="contacto">Contacto:</label>
        <input type="text" name="contacto"/><br/>
        <input type="hidden" name="accion" value="agregar"/>
        <input type="submit" value="Agregar"/>
    </form>
</body>
</html>