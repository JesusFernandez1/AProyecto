<?php

/**
 * validarTelefono
 *
 * @param  mixed $numero
 * @return void
 */
function validarTelefono($numero)
{
  $reg = "#^\(?\d{2}\)?[\s\.-]?\d{4}[\s\.-]?\d{4}$#";
  if (preg_match($reg, $numero)) {

    return true;
  } else {
    
    return false;
  }
}
