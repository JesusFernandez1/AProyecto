<?php

/**
 * validarEmail
 *
 * @param  mixed $email
 * @return void
 */
function validarEmail($email){
    $reg = "#^(((([a-z\d][\.\-\+_]?)*)[a-z0-9])+)\@(((([a-z\d][\.\-_]?){0,62})[a-z\d])+)\.([a-z\d]{2,6})$#i";

    if (preg_match($reg, $email)) {
      return true;
    } else {
      return false;
    }
  }