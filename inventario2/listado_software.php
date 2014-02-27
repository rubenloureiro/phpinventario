<?php require_once 'funciones_bd.php'; ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Favoritos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
    </head>
    <body>
        <div><b>Listado de Software</b></div><br>
        <?php
            $bd = conectaBd();
            $consulta = "SELECT * FROM software ORDER BY titulo";
            $resultado = $bd->query($consulta);
            if (!$resultado) {
                echo "Error en la consulta.";
            } else {
                echo "<table border=1>";
                echo "<tr>";
                echo "<th>Titulo</th>";
                echo "<th>URL</th>";
                echo "<th>Opción 1</th>";
                echo "<th>Opción 2</th>";
                echo "</tr>";
                foreach($resultado as $registro) {
                    echo "<tr>";
                    echo "<td>".$registro['titulo']."</td>";
                    echo "<td>".$registro['url']."</td>";
                    echo "<td>";
                    $destino="formulario_editar_software.php?id=".$registro['id'];
                    echo "<a href=".$destino.">Editar</a></td>";
                    echo "<td>";
                    $destino="confirmar_eliminar_software.php?id=".$registro['id'];
                    echo "<a href=".$destino.">Eliminar</a></td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            
            $bd = null;
            ?><br>
        <a href="formulario_nuevo_software.php">Registrar Software Nuevo</a>
    </body>
</html>