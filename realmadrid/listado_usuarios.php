<?php 
require_once 'funciones_bd.php';
?>

<html>
    <head>
        <title>Usuarios</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
    </head>
    <body>
        <div><b>Listado de usuarios</b></div><br>
        <?php
            $bd = conectaBd();
            $consulta = "SELECT * FROM usuario ORDER BY nombre";
            $resultado = $bd->query($consulta);
            if (!$resultado) {
                echo "Error en la consulta.";
            } else {
                echo "<table border=1>";
                echo "<tr>";
                echo "<th>Login</th>";
                echo "<th>Nombre</th>";
                echo "<th>Password</th>";
                echo "</tr>";
                foreach($resultado as $registro) {
                    echo "<tr>";
                    echo "<td>".$registro['login']."</td>";
                    echo "<td>".$registro['nombre']."</td>";
                    echo "<td>".$registro['password']."</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            
            $bd = null;
            ?><br>
            
        <a href="index.php">Volver al Índice</a>
    </body>
</html>