<?php
require_once 'funciones_users.php';
require_once 'funciones.php';

// Recuperar datos enviados desde formulario_nuevo_usuario.php
function validarDatosRegistro() {
    $datos = Array();
    $datos[0] = (isset($_REQUEST['login']))?
            $_REQUEST['login']:"";
    $datos[0] = limpiar($datos[0]);
    $datos[1] = (isset($_REQUEST['nombre']))?
            $_REQUEST['nombre']:"";
    $datos[2] = (isset($_REQUEST['password']))?
            $_REQUEST['password']:"";


    
    //----- Validar ---- //
    $errores = Array();
    $errores[0] = !validarLogin($datos[0]);
    $errores[1] = !validarNombre($datos[1]);
    $errores[2] = !validarPassword($datos[2]);

    // ----- Asignar a variables de Sesión ----//
    $_SESSION['datos'] = $datos;
    $_SESSION['errores'] = $errores;  
    $_SESSION['hayErrores'] = 
            ($errores[0] || $errores[1]
            || $errores[2]);
    
}

// PRINCIPAL //
validarDatosRegistro();
if ($_SESSION['hayErrores']) {
    $urldestino = "formulario_nuevo_usuario.php";
    header('Location:'.$urldestino);
} else {
    $db = conectaBd();

    $login = $_SESSION['datos'][0];
    $nombre = $_SESSION['datos'][1];
    $password = $_SESSION['datos'][2];

// Consulta a ejecutar
    $consulta = "INSERT INTO usuario (login, nombre, password) VALUES (:login, :nombre, :password)";
    $resultado = $db->prepare($consulta);
    
    if ($resultado->execute(array(":login" => $login, ":nombre" => $nombre, ":password" => $password))) {
        unset ($_SESSION['datos']);
        unset ($_SESSION['errores']);
        unset ($_SESSION['hayErrores']);
        $urldestino = "listado_usuarios.php";
        header('Location:'.$urldestino);
}   else {
        print "<p>Error al crear el registro.</p>\n";
}

$db = null;

}

?>