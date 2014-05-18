<!DOCTYPE html>
<html>
<head>
    <title>PhotoSchool | Login</title>
</head>
<body>
    <div class="content">
        <div class="caja_login">
            <form class="form" action="actions/login.php" method="post">
                <label for="usuario">Usuario:</label>
                <input type="text" name="usuario" placeholder="Usuario" required="true"/>
                <label for="password">Password:</label>
                <input type="password" name="clave" placeholder="Password" required="true"/>
                <input type="submit" value="Login"/>
            </form>
        </div>
    </div>
</body>
</html>