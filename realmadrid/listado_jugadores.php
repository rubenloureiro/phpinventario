<?php 
require_once 'head.php';
require_once 'funciones_bd.php';
?>

<html>
    <head>
        <title>Real Madrid</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
    </head>
    <body>
        <div><b>Listado de Software</b></div><br>
        <?php
            $bd = conectaBd();
            $consulta = "SELECT * FROM jugadores ORDER BY nombre";
            $resultado = $bd->query($consulta);
            if (!$resultado) {
                echo "Error en la consulta.";
            } else {
                echo "<table border=1>";
                echo "<tr>";
                echo "<th>Nombre</th>";
                echo "<th>Dorsal</th>";
                echo "<th>Posición</th>";
                echo "<th>País</th>";
                echo "<th>Opción 1</th>";
                echo "<th>Opción 2</th>";
                echo "</tr>";
                foreach($resultado as $registro) {
                    echo "<tr>";
                    echo "<td>".$registro['nombre']."</td>";
                    echo "<td>".$registro['dorsal']."</td>";
                    echo "<td>".$registro['posicion']."</td>";
                    echo "<td>".$registro['pais']."</td>";
                    echo "<td>";
                    echo "<a href=".$registro['web']." target='_blank'>";
                    echo $registro['web'];
                    echo "</a>";
                    echo "</td>";
                    echo "<td>".$registro['email']."</td>";
                    echo "<td>";
                    $destino="formulario_editar_jugador.php?id=".$registro['id'];
                    echo "<a href=".$destino.">Editar</a></td>";
                    echo "<td>";
                    $destino="confirmar_eliminar_jugador.php?id=".$registro['id'];
                    echo "<a href=".$destino.">Eliminar</a></td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            
            $bd = null;
            ?><br>
            
        <a href="formulario_nuevo_jugador.php">Registrar jugador nuevo</a>
    </body>
</html>