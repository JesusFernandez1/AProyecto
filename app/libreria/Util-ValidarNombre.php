<?php

function validarNombreApellido($nombre)
    {
        $pattern = "/^[a-z]+$/i";

        if ((preg_match($pattern, $nombre))) {

            return true;
        } else {

            return false;
        }
    }