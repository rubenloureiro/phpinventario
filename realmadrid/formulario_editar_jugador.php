<?php
session_start();
require_once 'funciones.php';
require_once 'funciones_bd.php';

// Estructura: campos del formulario
$_SESSION['datos'] = (isset($_SESSION['datos']))?
            $_SESSION['datos']:Array('','','','','','');
$_SESSION['errores'] = (isset($_SESSION['errores']))?
            $_SESSION['errores']:Array(FALSE,FALSE,FALSE,FALSE,FALSE,FALSE);
$_SESSION['hayErrores'] = (isset($_SESSION['hayErrores']))?
            $_SESSION['hayErrores']:FALSE;


// Cargar de la base de datos
$_SESSION['id'] = (isset($_REQUEST['id']))?
            $_REQUEST['id']:$_SESSION['id'];

$bd = conectaBd();
$consulta = "SELECT * FROM jugadores WHERE id=".$_SESSION['id'];
$resultado = $bd->query($consulta);

if (!$resultado) {
       $url = "error.php?msg_error=Error_Consulta_Editar";
       header('Location:'.$url);
} else { 
       $registro = $resultado->fetch(); 
       if(!$registro) {
           $url = "error.php?msg_error=Error_Registro_Software_inexistente";
           header('Location:'.$url);
       } else {
           $_SESSION['datos'][0] = $registro['nombre'];
           $_SESSION['datos'][1] = $registro['dorsal'];
           $_SESSION['datos'][2] = $registro['posicion'];
           $_SESSION['datos'][3] = $registro['pais'];
           $_SESSION['datos'][4] = $registro['web']; 
           $_SESSION['datos'][5] = $registro['email']; 
       }
}

?>

<html>
    <head>
        <title>Editar</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
    </head>
    <body>
        <div><b>Editar jugador</b></div></br>
        <form action="grabar_editar_jugador.php" method="GET">
            <div>Nombre: <input type="text" name="nombre" 
                              value="<?php echo $_SESSION['datos'][0]; ?>"/>
            </div>
           <?php
                if ($_SESSION['errores'][0]) {
                    echo "<div class 'error'>".MSG_ERR_NOM."</div>";
                }
            ?>
            <div>Dorsal: <input type="text" name="dorsal" 
                            value="<?php echo $_SESSION['datos'][1]; ?>"/></div>
            </div>
            <?php
                if ($_SESSION['errores'][1]) {
                    echo "<div class 'error'>".MSG_ERR_DOR."</div>";
                }
                ?>
            <div>Posicion: <input type="text" name="posicion" 
                            value="<?php echo $_SESSION['datos'][2]; ?>"/></div>
            </div>
            <?php
                if ($_SESSION['errores'][2]) {
                    echo "<div class 'error'>".MSG_ERR_POS."</div>";
                }
                ?>
            <div>Pais: <input type="text" name="pais" 
                            value="<?php echo $_SESSION['datos'][3]; ?>"/></div>
            </div>
            <?php
                if ($_SESSION['errores'][3]) {
                    echo "<div class 'error'>".MSG_ERR_PAIS."</div>";
                }
                ?>
            <div>Web: <input type="text" name="web" 
                            value="<?php echo $_SESSION['datos'][4]; ?>"/></div>
            </div>
            <?php
                if ($_SESSION['errores'][4]) {
                    echo "<div class 'error'>".MSG_ERR_WEB."</div>";
                }
                ?>
            <div>Email: <input type="text" name="email" 
                            value="<?php echo $_SESSION['datos'][5]; ?>"/></div>
            </div>
            <?php
                if ($_SESSION['errores'][5]) {
                    echo "<div class 'error'>".MSG_ERR_MAIL."</div>";
                }
                ?>
            <p><input type="submit" value="Enviar" /></p>
        </form>
    </body>
</html>