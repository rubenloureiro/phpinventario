<?php

/* 
 *Funciones acceso y manejo de BD
 */

// FUNCIÓN DE CONEXIÓN CON LA BASE DE DATOS MYSQL
function conectaDb()
{
    try {
        $db = new PDO("mysql:host=localhost", "root", "abc123.");
        $db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
        return($db);
    } catch (PDOException $e) {
        print "<p>Error: No puede conectarse con la base de datos.</p>\n";
        print "<p>Error: " . $e->getMessage() . "</p>\n";
        exit();
    }
}
