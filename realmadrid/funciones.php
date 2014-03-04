<?php

// Constantes
define('MSG_ERR', "Error.");
define('MSG_ERR_NOM', "Error Nombre.");
define('MSG_ERR_DOR', "Error Dorsal.");
define('MSG_ERR_POS', "Error Posición.");
define('MSG_ERR_PAIS', "Error País.");
define('MSG_ERR_WEB', "Error Web.");
define('MSG_ERR_MAIL', "Error Email.");

/*
 * Constantes para usuarios
 */
define('MSG_ERR_LOG', "Error  Login.");
define('MSG_ERR_PASS', "Error  Password.");
define('MSG_ERR_NOMUSER', "Error  Nombre.");

define('LOGIN_MIN', 3); 
define('LOGIN_MAX', 10); 
define('PASS_MIN', 5); 
define('PASS_MAX', 10); 

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


/*
 * Validación para usuarios
 */
function enRango($inicio, $fin, $valor) {
    return ($valor>=$inicio && $valor<=$fin);
}

function validarNomUser($valor) {
    if (strlen($valor)>=4 && strlen($valor)<=50){
        return TRUE;
    } else {
        return FALSE;
    }
}

function validarLogin($login) {
    $patron = "/^[[:alnum:]]+$/";
    $longitud = strlen($login);
    return (enRango(LOGIN_MIN, LOGIN_MAX, $longitud) 
            && preg_match($patron, $login));
}

function validarPassword($password) {
    $patron = "/^[[:alnum:]]+$/";
    $longitud = strlen($password);
    return (enRango(PASS_MIN, PASS_MAX, $longitud) 
            && preg_match($patron, $password));
}

function longPass ($password, $password2) {
    return ($password == $password2);
}