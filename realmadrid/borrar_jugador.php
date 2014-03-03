<?php
session_start();
require_once 'funciones_bd.php';

// Conexión a la BBDD
$db = conectaBd();

$id = $_SESSION['id'];
    
    // Consulta a ejecutar
    $consulta = "DELETE FROM jugadores 
        WHERE id= :id";
    
    $resultado = $db->prepare($consulta);
    if ($resultado->execute(array(":id" => $id))) {
        // Vaciamos las variables de sesión si todo va bien
        unset ($_SESSION['datos']);
        unset ($_SESSION['errores']);
        unset ($_SESSION['hayErrores']);
        // Redirigimos a la página del listado 
        $destino = "listado_jugadores.php";
        header('Location:'.$destino);
    } else {
        print "<p>Error al crear el registro.</p>\n";
    }

    $db = null;
    
?>