<html>
    <head>
        <title>Borrar</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
    </head>
    <body>
        <div><b>¿Confirmar borrado?</b></div>
    </body>
</html>

<?php
session_start();
require_once 'funciones_bd.php';

// Sólo necesitamos eliminar por la clave principal
$_SESSION['id'] = (isset ($_REQUEST['id']))?
        $_REQUEST['id']:$_SESSION['id'];

// Nos conectamos a la BBDD y ejecutamos la consulta
$bd = conectaBd();
$consulta = "SELECT * FROM jugadores WHERE id=".$_SESSION['id'];
$resultado = $bd ->query($consulta);
if (!$resultado){
    $url = "error.php?msg_error=Error_Consulta_Editar";
    header('Location:', $url);
} else {
       $registro = $resultado->fetch();
       if(!$registro) {
           $url = "error.php?msg_error=Error_Registro_Jugador_Inexistente";
           header('Location:'.$url);
       } else {
           $_SESSION['datos'][0] = $registro['nombre'];
           $_SESSION['datos'][1] = $registro['dorsal'];
           $_SESSION['datos'][2] = $registro['posicion'];
           $_SESSION['datos'][3] = $registro['pais'];           
           echo "<table border=1>";
           echo "<tr>";
           echo "<th>ID</th>";
           echo "<th>Nombre</th>";
           echo "<th>Dorsal</th>";
           echo "<th>Posición</th>";
           echo "<th>País</th>";
           echo "<tr>";
           echo "<td>";
           echo $_SESSION['id'];
           echo "</td>";
           echo "<td>";
           echo $registro['nombre'];
           echo "</td>";
           echo "<td>";
           echo $registro['dorsal'];
           echo "</td>";
           echo "<td>";
           echo $registro['posicion'];
           echo "</td>";
           echo "<td>";
           echo $registro['pais'];
           echo "</td>";
           echo "</table>";
       }
  }
?>

<html>
    <head>
        <title>Confirmar borrado</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
    </head>
    <body>
        <div><a href="listado_jugadores.php">Cancelar</a>
        <a href="borrar_jugador.php">Continuar</a></div>
    </body>
</html>