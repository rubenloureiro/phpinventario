<?php
session_start();
require_once 'funciones.php';
require_once 'head.php';

// Estructura: campos del formulario
$_SESSION['datos'] = (isset($_SESSION['datos']))?
            $_SESSION['datos']:Array('','','','','','');
$_SESSION['errores'] = (isset($_SESSION['errores']))?
            $_SESSION['errores']:Array(FALSE,FALSE,FALSE,FALSE,FALSE,FALSE);
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
        <div><b>Registrar nuevo jugador</b></div></br>
        <form action="grabar_nuevo_jugador.php" method="GET">
            <div>Nombre: <input type="text" name="nombre" value="<?php echo $_SESSION['datos'][0]; ?>"/></div>
            <?php
                if ($_SESSION['errores'][0]) {
                    echo "<div class 'error'>".MSG_ERR_NOM."</div>";
                }
            ?>
            <div>Dorsal: <input type="text" name="dorsal" value="<?php echo $_SESSION['datos'][1]; ?>"/></div>
             <?php
                if ($_SESSION['errores'][1]) {
                    echo "<div class 'error'>".MSG_ERR_DOR."</div>";
                }
                ?>
            <div>Posición: <input type="text" name="posicion" value="<?php echo $_SESSION['datos'][2]; ?>"/></div>
             <?php
                if ($_SESSION['errores'][2]) {
                    echo "<div class 'error'>".MSG_ERR_POS."</div>";
                }
                ?>
            <div>País: <input type="text" name="pais" value="<?php echo $_SESSION['datos'][3]; ?>"/></div>
             <?php
                if ($_SESSION['errores'][3]) {
                    echo "<div class 'error'>".MSG_ERR_PAIS."</div>";
                }
                ?>
            <div>Web: <input type="text" name="web" value="<?php echo $_SESSION['datos'][4]; ?>"/></div>
             <?php
                if ($_SESSION['errores'][4]) {
                    echo "<div class 'error'>".MSG_ERR_WEB."</div>";
                }
                ?>
            <div>Email: <input type="text" name="email" value="<?php echo $_SESSION['datos'][5]; ?>"/></div>
             <?php
                if ($_SESSION['errores'][5]) {
                    echo "<div class 'error'>".MSG_ERR_MAIL."</div>";
                }
                ?>
            <p><input type="submit" value="Registrar"/></p>
        </form><br>
        <a href="listado_jugadores.php">Volver al listado</a>
    </body>
</html>