<?php
session_start();
require_once 'funciones.php';

    // Estructura: campos del formulario
$_SESSION['datos'] = (isset($_SESSION['datos']))?
            $_SESSION['datos']:Array('','');
$_SESSION['errores'] = (isset($_SESSION['errores']))?
            $_SESSION['errores']:Array(FALSE,FALSE);
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
        <div><b>Registro Software Nuevo</b></div></br>
        <form action="grabar_nuevo_software.php" method="GET">
            <div>Título: <input type="text" name="titulo" value="<?php echo $_SESSION['datos'][0]; ?>"/></div>
            <?php
                if ($_SESSION['errores'][0]) {
                    echo "<div class 'error'>".MSG_ERR_TITULO."</div>";
                }
            ?>
            <div>URL: <input type="text" name="url" vlaue="<?php echo $_SESSION['datos'][1]; ?>"/></div>
             <?php
                if ($_SESSION['errores'][1]) {
                    echo "<div class 'error'>".MSG_ERR_URL."</div>";
                }
                ?>
            <p><input type="submit" value="Registrar"/></p>
        </form>
    </body>
</html>