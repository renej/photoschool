<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>PhotoSchool | Login</title>
    <link rel="stylesheet" href="css/normalize.css"/>
    <link rel="stylesheet" href="css/foundation.min.css"/>
    <link rel="stylesheet" href="css/styles.css"/>
</head>
<body>
    <div class="row">
        <div class="logo">
            <img alt="PhotoSchool" title="PhotoSchool" src="img/logo.png" class="imgLogo" width="330"/>
        </div>
        <div class="large-2 columns" id="caja">
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
            <div class="small-12 columns" id="formulario">
                <form class="form" action="actions/login.php" method="post">
                    <label for="usuario">Usuario:</label>
                    <input type="text" name="usuario" placeholder="Usuario" required="true"/>
                    <label for="password">Password:</label>
                    <input type="password" name="clave" placeholder="Password" required="true"/>
                    <input type="submit" value="Login"/>
                </form>
            </div>
        </div>
    </div>

    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation/foundation.js"></script>
    <script src="js/foundation/foundation.alert.js"></script>
    <script>
        $(document).foundation();
    </script>
    <script>
        $(document).ready(function(){

            $(window).resize(function(){

                // aquí le pasamos la clase o id de nuestro div a centrar (en este caso "caja")
                $('#caja').css({
                    position:'absolute',
                    left: ($(window).width() - $('#caja').outerWidth())/2,
                    top: ($(window).height() - $('#caja').outerHeight())/2
                });

            });

            // Ejecutamos la función
            $(window).resize();

        });
    </script>
</body>
</html>