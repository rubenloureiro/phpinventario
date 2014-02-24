<?php
session_start();
require_once 'funciones_bd.php';
require_once 'funciones.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$_SESSION['id'] = (isset($_REQUEST['id']))?
            $_REQUEST['id']:$_SESSION['id'];

$bd = conectaBd();
$consulta = "SELECT * FROM software WHERE id=".$_SESSION['id'];
$resultado = $bd->query($consulta);

if (!$resultado) {
       $url = "error.php?msg_error=Error_Consulta_Eliminar";
       header('Location:'.$url);
} else { 
       $registro = $resultado->fetch(); 
       if(!$registro) {
           $url = "error.php?msg_error=Error_Registro_Software_inexistente";
           header('Location:'.$url);
       } else {
           $_SESSION['datos'][0] = $registro['titulo'];
           $_SESSION['datos'][1] = $registro['url'];
       }
}

?>