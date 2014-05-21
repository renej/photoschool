<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <form action="../actions/usuarios.php" method="post">
        <label for="matricula">Matricula:</label>
        <input type="text" name="matricula"/><br/>
        <label for="tipo_usuario">Tipo de Usuario:</label>
        <input type="text" name="tipo_usuario"/><br/>
        <label for="usuario">Nombre de Usuario:</label>
        <input type="text" name="usuario"/><br/>
        <label for="id_colegio">Colegio:</label>
        <input type="text" name="id_colegio"/><br/>
        <label for="grado">Grado:</label>
        <input type="text" name="grado"/><br/>
        <label for="password">Password:</label>
        <input type="password" name="password"/><br/>
        <label for="expira">Expira:</label>
        <input type="date" name="expira"/><br/>
        <input type="hidden" name="accion" value="agregar"/>
        <input type="submit" value="Agregar"/>
    </form>
</body>
</html>