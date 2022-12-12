<?php
/**
 * Archivo donde asignamos las rutas correspondientes y nos permite hacer uso de blade en nuestro programa
 */

use Jenssegers\Blade\Blade;

error_reporting(E_ERROR | E_WARNING | E_PARSE);

//define('MODEL_PATH', __DIR__.'models/');
//define('CTRL_PATH', __DIR__.'controllers/');
define('VIEW_PATH', __DIR__.'/../views');
define('CACHE_PATH', VIEW_PATH.'/cache');
include (__DIR__.'/../vendor/autoload.php');


$blade = new Blade(VIEW_PATH, CACHE_PATH);

//DIE(VIEW_PATH);