<?php

/**
 * comprobar_fecha
 *
 * @param  mixed $date
 * @return void
 */

function comprobar_fecha($date) {

    $fecha_entrada = strtotime(date($date));
    $fecha_actual = strtotime(date('d-m-Y'));

    if ($fecha_actual >= $fecha_entrada) {
        return true;
    } else {
        return false;
    }
}


function comprobar_fecha_actual($date) {

    $fecha_entrada = strtotime(date($date));
    $fecha_actual = strtotime(date('d-m-Y'));

    if (($fecha_actual >= $fecha_entrada) || ($fecha_actual <= $fecha_entrada)) {
        return false;
    } else {
        return true;
    }
}