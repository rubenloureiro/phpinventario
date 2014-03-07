<?php
session_start();
require_once 'funciones_bd.php';
require_once 'funciones.php';

// Recuperar datos enviados desde formulario_editar_jugador.php
function validarDatosRegistro() {
    $datos = Array();
    $datos[0] = (isset($_REQUEST['nombre']))?
            $_REQUEST['nombre']:"";
    $datos[0] = limpiar($datos[0]);
    $datos[1] = (isset($_REQUEST['dorsal']))?
            $_REQUEST['dorsal']:"";
    $datos[2] = (isset($_REQUEST['posicion']))?
            $_REQUEST['posicion']:"";
    $datos[3] = (isset($_REQUEST['pais']))?
            $_REQUEST['pais']:"";
    $datos[4] = (isset($_REQUEST['web']))?
            $_REQUEST['web']:"";
    $datos[5] = (isset($_REQUEST['email']))?
            $_REQUEST['email']:"";

    //---- Validar ---- //
    $errores = Array();
    $errores[0] = !validarNombre($datos[0]);
    $errores[1] = !validarDorsal($datos[1]);
    $errores[2] = !validarPosicion($datos[2]);
    $errores[3] = !validarPais($datos[3]);
    $errores[4] = !validarWeb($datos[4]);
    $errores[5] = !validarEmail($datos[5]);
    
    // ----- Asignar a variables de Sesión ----//
    $_SESSION['datos'] = $datos;
    $_SESSION['errores'] = $errores;  
    $_SESSION['hayErrores'] = 
            ($errores[0] || $errores[1]
            || $errores[2] || $errores[3]
            || $errores[4] || $errores[5]);
    
}

// PRINCIPAL //
validarDatosRegistro();
if ($_SESSION['hayErrores']) {
    $url = "formulario_editar_jugador.php";
    header('Location:'.$url);
} else {

    $db = conectaBd();
    $nombre = $_SESSION['datos'][0];
    $dorsal = $_SESSION['datos'][1];
    $posicion = $_SESSION['datos'][2];
    $pais = $_SESSION['datos'][3];
    $web = $_SESSION['datos'][4];
    $email = $_SESSION['datos'][5];
    
    $id = $_SESSION['id'];

// Consulta a ejecutar
    $consulta = "UPDATE jugadores 
    set nombre = :nombre, 
    dorsal= :dorsal,
    posicion= :posicion,
    pais= :pais,
    web= :web,
    email= :email
    WHERE id= :id";
    
    $resultado = $db->prepare($consulta);
    if ($resultado->execute(array(":nombre" => $nombre,
        ":dorsal" => $dorsal,
        ":posicion" => $posicion,
        ":pais" => $pais,
        ":web" => $web,
        ":email" => $email,
        ":id" => $id))) {
            $url = "listado_jugadores.php";
            header('Location:'.$url);
    } else {
        print "<p>Error al crear el registro.</p>\n";
    }

    $db = null;

}
?>