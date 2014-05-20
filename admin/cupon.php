<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <form action="../actions/cupones.php" method="post">
        <label for="descuento">Descuento:</label>
        <input type="text" name="descuento"/><br/>
        <label for="fecha_inicio">Fecha de Inicio:</label>
        <input type="date" name="fecha_inicio"/><br/>
        <label for="fehca_fin">Fecha Fin:</label>
        <input type="date" name="fecha_fin"/><br/>
        <label for="id_usuario">Usuario:</label>
        <input type="text" name="id_usuario"/><br/>
        <label for="tipo_usuario">Tipo Usuario:</label>
        <input type="text" name="tipo_usuario"/><br/>
        <label for="cupon">Cupon:</label>
        <input type="text" name="cupon"/><br/>
        <label for="estatus">Estatus:</label>
        <input type="text" name="estatus"/><br/>
        <input type="hidden" name="accion" value="agregar"/>
        <input type="submit" value="Agregar"/>
    </form>
</body>
</html>