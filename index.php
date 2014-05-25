<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>PhotoSchool | Login</title>
    <link rel="stylesheet" href="css/normalize.css"/>
    <link rel="stylesheet" href="css/foundation.min.css"/>
</head>
<body>
    <div class="row">
        <?php
        if(isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) > 0) {?>
            <div data-alert class="alert-box alert radius">
                <?php
                    foreach($_SESSION['ERRMSG_ARR'] as $msg) {
                        echo $msg;
                    }
                    unset($_SESSION['ERRMSG_ARR']);
                ?>
                <a href="#" class="close">&times;</a>
            </div>
        <?php
        }
        ?>
        <form class="form" action="actions/login.php" method="post">
            <div class="large-4 columns">
                <label for="usuario">Usuario:</label>
                <input type="text" name="usuario" placeholder="Usuario" required="true"/>
                <label for="password">Password:</label>
                <input type="password" name="clave" placeholder="Password" required="true"/>
                <input type="submit" value="Login"/>
            </div>
        </form>
    </div>

    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation/foundation.js"></script>
    <script src="js/foundation/foundation.alert.js"></script>
    <script>
        $(document).foundation();
    </script>
</body>
</html>