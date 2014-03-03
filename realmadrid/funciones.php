<?php

// Constantes
define('MSG_ERR', "Error.");
define('MSG_ERR_NOM', "Error Nombre.");
define('MSG_ERR_DOR', "Error Dorsal.");
define('MSG_ERR_POS', "Error Posición.");
define('MSG_ERR_PAIS', "Error País.");
define('MSG_ERR_WEB', "Error Web.");
define('MSG_ERR_MAIL', "Error  Email.");

// Funciones de validación
function limpiar($valor) {
    return strip_tags(trim(htmlspecialchars($valor, ENT_QUOTES, "ISO-8859-1"))); 
}

function validarNombre($valor) {
    $valor = limpiar($valor);
    if (strlen($valor)>0 && strlen($valor)<=50){
        return TRUE;
    } else {
        return FALSE;
    }
}

function validarDorsal($valor) {
    if (strlen($valor)>0 && strlen($valor)<=2){
        return TRUE;
    } else {
        return FALSE;
    }
}

function validarPosicion($valor) {
    if (strlen($valor)>0 && strlen($valor)<=3){
        return TRUE;
    } else {
        return FALSE;
    }
}

function validarPais($valor) {
    if (strlen($valor)>0 && strlen($valor)<=3){
        return TRUE;
    } else {
        return FALSE;
    }
}

/*
 * La web debe tener un formato correcto
 */
function validarWeb($valor) {
    return (filter_var($valor, FILTER_VALIDATE_URL ));
}

/*
 * El mail debe tener un formato correcto
 */
function validarEmail ($email) {
    return (filter_var ($email, FILTER_VALIDATE_EMAIL));
}