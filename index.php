<?php require_once 'funciones_bd.php'; ?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Inventario</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link url="estilo.css" type="text/css" rel="stylesheet"/>
    </head>
    <body>
        <div><b>Inventario</b></div>
        <div>
        <a href="formulario_nuevo_equipo.php">Nuevo Equipo</a>
        </div>
        <?php
        $bd = conectaDb();
        $consulta = "SELECT * FROM equipos";
        $resultado = $bd -> query($consulta);
        if (!$resultado) {
            echo "No hay equipos.";
        } else {
            echo "Equipo<br> Nombre<br>";
            foreach ($resultado as $registro) {
                echo $registro['nombre']."<br>";
            }
        }
        $bd = null;
        ?>
    </body>
</html>