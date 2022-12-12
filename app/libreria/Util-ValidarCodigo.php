<?php

/**
 * comprobarCodigo
 *
 * @param  mixed $codigo
 * @return void
 */
function comprobarCodigo($codigo) {

    if (preg_match('/^[0-9]{5,5}$/', $codigo)) {
        return true;
    } else {
        return false;
    }
	
}