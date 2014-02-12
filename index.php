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
    </head>
    <body>
        <div>Inventario</div>
        Test de prueba de conexión
        <?php
        $bd = conectaDb();
        echo "Conexión realizada con éxito";
        $bd = null;
        ?>
    </body>
</html>
