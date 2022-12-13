<?php

/**
 * inicio
 * Funcion que hace el login y comprueba que las credenciales sean correctas
 * @return void
 */
function inicio() {
    include('app/models/varios.php');
    require("app/models/usuarios_model.php");
    require("app/models/GestorErrores.php");

    $error = new GestorErrores('<span style="color: red;">', '</span>');

    if ($_POST) {

        if (usuarios_model::getOneUsuario($_POST['nombre'], $_POST['pass'])) {
            session_start();
            $_SESSION["usuario"] = $_POST['nombre'];
            setcookie("nombre",$_POST['nombre']);
            echo $blade->render('elegir');
        } else {
            $error->AnotaError('usuario', 'Nombre y/o pass incorrectos');
            echo $blade->render('login', [
                'error' => $error
            ]);
        }
    } else {
        echo $blade->render('login', [
            'error' => $error
        ]);
    }
}

/**
 * login
 * Funcion para que al seleccionar la seccion de usuarios tras pasar el login, se muestre la pagina inicial
 * @return void
 */
function login() {
    include('app/models/varios.php');
    require("app/models/usuarios_model.php");
    require("app/models/GestorErrores.php");

    $usuarios = usuarios_model::get_usuarios();
    echo $blade->render('usuarios_mostrar', [
        'usuarios' => $usuarios
    ]);
}

function logout() {
    include('app/models/varios.php');
    require("app/models/GestorErrores.php");

    $error = new GestorErrores('<span style="color: red;">', '</span>');

    session_start();
    session_destroy();
    
    echo $blade->render('login', [
        'error' => $error
    ]);
}

/**
 * verUsuarios
 * Funcion que muestra una vista con todos los usuarios y sus datos
 * @return void
 */
function verUsuarios() {
    include('app/models/varios.php');
    require("app/models/usuarios_model.php");

    $usuarios = usuarios_model::get_usuarios();
    echo $blade->render('usuarios_mostrar', [
        'usuarios' => $usuarios
    ]);
}

/**
 * crear
 * Funcion para crear a un usuario pasando antes por un filtro
 * @return void
 */
function crear() {

    include('app/models/varios.php');
    require("app/models/usuarios_model.php");
    require("app/models/GestorErrores.php");

    $error = new GestorErrores('<span style="color: red;">', '</span>');

    if ($_POST) {

        $error = filtradoUsuario($error, $_POST['nombre'], $_POST['apellido'], $_POST['pass'], $_POST['correo'], filter_input(INPUT_POST,'tipo'));

        $data = "'" . $_POST['nombre'] . "','" . $_POST['apellido'] . "','" . $_POST['pass'] . "','" . $_POST['correo'] . "','" . filter_input(INPUT_POST,'tipo') . "'";

        if (!$error->HayErrores()) {
            usuarios_model::insert_usuario($data);
            $usuarios = usuarios_model::get_usuarios();
            echo $blade->render('usuarios_mostrar', [
                'usuarios' => $usuarios
            ]);
        } else {
            echo $blade->render('usuarios_añadir', [
                'error' => $error
            ]);
        }
    } else {
        echo $blade->render('usuarios_añadir', [
            'error' => $error
        ]);
    }
}

/**
 * verOneUsuario
 * Funcion para obtener un usuario concreto al hacer click en modificar y mostrar la vista donde sale dicho usuario
 * @return void
 */
function verOneUsuario() {
    //Llamada al modelo
    include('app/models/varios.php');
    require("app/models/usuarios_model.php");
    require("app/models/GestorErrores.php");
    $id = $_GET['id'];
    $usuarioUnico = usuarios_model::getUsuario($id);
    $error = new GestorErrores('<span style="color: red;">', '</span>');
    if ($_POST) {

        $error = filtradoUsuario($error, $_POST['nombre'], $_POST['apellido'], $_POST['pass'], $_POST['correo'], filter_input(INPUT_POST,'tipo'));

        $data = "nombre='" . $_POST['nombre']  . "', apellido='" . $_POST['apellido']  . "', pass='" . $_POST['pass']  . "', correo='" . $_POST['correo']  . "', tipo='" . filter_input(INPUT_POST,'tipo') . "'";

        if (!$error->HayErrores()) {

            usuarios_model::update_usuario($data, $id);
            $usuarios = usuarios_model::get_usuarios();
            echo $blade->render('usuarios_mostrar', [
                'usuarios' => $usuarios
            ]);
        } else {
            echo $blade->render('usuarios_modificar', [
                'error' => $error, 'usuarios' => $usuarioUnico
            ]);
        }
    } else {
        echo $blade->render('usuarios_modificar', [
            'usuarios' => $usuarioUnico, 'error' => $error
        ]);
    }
}

/**
 * verBorrarUsuario
 * Funcion que te muestra una vista donde sale la tarea seleccionada para confirmar si quiere borrar o no
 * @return void
 */
function verBorrarUsuario() {
    //Llamada al modelo
    $id = $_GET['id'];
    include('app/models/varios.php');
    require("app/models/usuarios_model.php");
    $usuarios = usuarios_model::getUsuario($id);
    echo $blade->render('usuarios_eliminar', [
        'usuarios' => $usuarios
    ]);
}

/**
 * borrarUsuario
 * Si se cofirma la accion de borrar, esta se borra teniendo como referencia su id
 * @return void
 */
function borrarUsuario() {
    //Llamada al modelo
    $id = $_GET['id'];
    include('app/models/varios.php');
    require("app/models/usuarios_model.php");
    usuarios_model::delete_usuario($id);
    $usuarios = usuarios_model::get_usuarios();
    echo $blade->render('usuarios_mostrar', [
        'usuarios' => $usuarios
    ]);
}

/**
 * Filtrado base donde hacemos todas las comprobaciones necesarias para los usuarios con el uso de expresiones regulares y demas
 */

function filtradoUsuario($error, $nombre, $apellido, $pass, $correo, $tipo) {
    include("app/libreria/Util-ValidarNombre.php");
    include("app/libreria/Util-ValidarCorreo.php");

    if (empty($nombre)) {
        $error->AnotaError('nombre', 'No has introducido un nombre');
    } elseif (!validarNombreApellido($nombre)) {
        $error->AnotaError('nombre', 'Formato no valido, no introduzca numeros.');
    }
    if (empty($apellido)) {
        $error->AnotaError('apellido', 'No has introducido un apellido');
    } elseif (!validarNombreApellido($apellido)) {
        $error->AnotaError('apellido', 'Formato no valido, no introduzca numeros.');
    }
    if (empty($pass)) {
        $error->AnotaError('pass', 'No has introducido una pass');
    }
    if (empty($correo)) {
        $error->AnotaError('correo', 'No has introducido un correo');
    } elseif (!validarEmail($correo)) {
        $error->AnotaError('correo', 'El correo no tiene un formato valido');
    }
    if (empty($tipo)) {
        $error->AnotaError('tipo', 'No has introducido un tipo');
    }
    return $error;
}
