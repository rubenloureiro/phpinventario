<?php
session_start();
require_once 'funciones.php';

// Estructura: campos del formulario
$_SESSION['datos'] = (isset($_SESSION['datos']))?
            $_SESSION['datos']:Array('','','');
$_SESSION['errores'] = (isset($_SESSION['errores']))?
            $_SESSION['errores']:Array(FALSE,FALSE,FALSE);
$_SESSION['hayErrores'] = (isset($_SESSION['hayErrores']))?
            $_SESSION['hayErrores']:FALSE;
?>

<html>
    <head>
        <title>Registro</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
    </head>
    <body>
        <div><b>Registrar nuevo usuario</b></div></br>
        <form action="grabar_nuevo_usuario.php" method="GET">
            <div>Login: <input type="text" name="login" value="<?php echo $_SESSION['datos'][0]; ?>"/></div>
            <?php
                if ($_SESSION['errores'][0]) {
                    echo "<div class 'error'>".MSG_ERR_LOG."</div>";
                }
            ?>
            <div>Nombre: <input type="text" name="nombre" value="<?php echo $_SESSION['datos'][1]; ?>"/></div>
             <?php
                if ($_SESSION['errores'][1]) {
                    echo "<div class 'error'>".MSG_ERR_NOMUSER."</div>";
                }
                ?>
            <div>Password: <input type="password" name="password" value="<?php echo $_SESSION['datos'][2]; ?>"/></div>
             <?php
                if ($_SESSION['errores'][2]) {
                    echo "<div class 'error'>".MSG_ERR_PASS."</div>";
                }
                ?>
            <p><input type="submit" value="Registrar"/></p>
            <a href="index.php">Volver al índice</a>
        </form>
    </body>
</html>