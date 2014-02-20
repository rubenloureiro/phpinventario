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
                echo "<tr><th>Titulo</th><th>URL</th></tr>";
                foreach($resultado as $registro) {
                    echo "<tr>";
                    echo "<td>".$registro['titulo']."</td>";
                    echo "<td>".$registro['url']."</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            
            $bd = null;
            ?><br>
        <a href="formulario_nuevo_software.php">Registrar Software Nuevo</a>
    </body>
</html>