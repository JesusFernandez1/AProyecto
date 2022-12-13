<?php

/**
 * ver
 * Funcion para mostrar la vista donde se cargan todas las tareas con una paginacion inicial
 * @return void
 */
function ver()
{
    //Llamada al modelo
    include('app/models/varios.php');
    require("app/models/tareas_model.php");
    $paginas = tareas_model::totalPaginas();
    $tareas = tareas_model::get_Tareapaginada(1);
    echo $blade->render('tareas_mostrar', [
        'tareas' => $tareas, 'paginas' => $paginas
    ]);
}

/**
 * verPaginacion
 * Tras mostrar por primera vez las tareas paginadas, usaremos este metodo para movernos entre las paginaciones
 * @return void
 */
function verPaginacion()
{
    //Llamada al modelo
    include('app/models/varios.php');
    require("app/models/tareas_model.php");

    $pagina = $_GET['pagina'];

    $tareas = tareas_model::get_Tareapaginada($pagina);
    $paginas = tareas_model::totalPaginas();
    echo $blade->render('tareas_mostrar', [
        'tareas' => $tareas, 'paginas' => $paginas
    ]);
}

/**
 * verPendiente
 * Funcion para ver todas las tareas pendientes
 * @return void
 */
function verPendiente()
{
    //Llamada al modelo
    include('app/models/varios.php');
    require("app/models/tareas_model.php");
    $paginas = tareas_model::totalPaginasPendientes();
    $tareas = tareas_model::get_tareaPendiente(1);

    echo $blade->render('tareas_mostrar_pendientes', [
        'tareas' => $tareas, 'paginas' => $paginas
    ]);
}

function verPendientePaginacion()
{
    //Llamada al modelo
    include('app/models/varios.php');
    require("app/models/tareas_model.php");

    $pagina = $_GET['pagina'];

    $paginas = tareas_model::totalPaginasPendientes();
    $tareas = tareas_model::get_tareaPendiente($pagina);

    echo $blade->render('tareas_mostrar_pendientes', [
        'tareas' => $tareas, 'paginas' => $paginas
    ]);
}

/**
 * verCompleta
 * Funcion para ver todos los detalles de todas las tareas
 * @return void
 */
function verCompleta()
{
    //Llamada al modelo
    include('app/models/varios.php');
    require("app/models/tareas_model.php");
    $paginas = tareas_model::totalPaginas();
    $tareas = tareas_model::get_Tareapaginada(1);
    echo $blade->render('tareas_mostrar_completa', [
        'tareas' => $tareas, 'paginas' => $paginas
    ]);
}

function verCompletaPaginacion()
{
    //Llamada al modelo
    include('app/models/varios.php');
    require("app/models/tareas_model.php");

    $pagina = $_GET['pagina'];

    $paginas = tareas_model::totalPaginas();
    $tareas = tareas_model::get_Tareapaginada($pagina);
    echo $blade->render('tareas_mostrar_completa', [
        'tareas' => $tareas, 'paginas' => $paginas
    ]);
}

/**
 * crear
 * Funcion para crear una nueva tarea pasando esta por un filtrado previo que debera pasar para poder añadirla
 * @return void
 */
function crear()
{

    include('app/models/varios.php');
    require("app/models/tareas_model.php");
    require("app/models/GestorErrores.php");

    $error = new GestorErrores('<span style="color: red;">', '</span>');

    $provincias = tareas_model::get_provincias();

    if ($_POST) {

        $error = filtradoCadena($error, $_POST['identificacion'], $_POST['nombre'], $_POST['apellido'], $_POST['telefono'], $_POST['descripcion'], $_POST['correo'], $_POST['direccion'], $_POST['poblacion'], $_POST['codigo'], filter_input(INPUT_POST, 'provincia'), filter_input(INPUT_POST, 'estado'), $_POST['inicio'], filter_input(INPUT_POST, 'operario'), $_POST['final']);

        $data = "'" . $_POST['identificacion'] . "','" . $_POST['nombre'] . "','" . $_POST['apellido'] . "','" . $_POST['telefono'] . "','" . $_POST['descripcion'] . "','" . $_POST['correo'] . "','" . $_POST['direccion'] . "','"
            . $_POST['poblacion'] . "','" . $_POST['codigo'] . "','" . filter_input(INPUT_POST, 'provincia') . "','" . filter_input(INPUT_POST, 'estado') . "','" . $_POST['inicio'] . "','" . filter_input(INPUT_POST, 'operario') . "','" . $_POST['final'] . "','" . $_POST['anterior'] . "','" . $_POST['posterior'] . "'";

        if (!$error->HayErrores()) {
            tareas_model::insert_tarea($data);
            $paginas = tareas_model::totalPaginas();
            $tareas = tareas_model::get_Tareapaginada(1);
            echo $blade->render('tareas_mostrar', [
                'tareas' => $tareas, 'paginas' => $paginas
            ]);
        } else {
            echo $blade->render('tareas_añadir', [
                'error' => $error, 'provincias' => $provincias
            ]);
        }
    } else {
        echo $blade->render('tareas_añadir', [
            'error' => $error, 'provincias' => $provincias
        ]);
    }
}

/**
 * ModificarUnaTarea
 * Funcion para poder modificar cualquier dato de la tarea seleccionada obteneida a traves de una id y pasando por un filtro
 * @return void
 */
function ModificarUnaTarea()
{
    //Llamada al modelo
    include('app/models/varios.php');
    require("app/models/tareas_model.php");
    require("app/models/GestorErrores.php");

    $id = $_GET['id'];
    $tareaUnica = tareas_model::getOnetarea($id);
    $error = new GestorErrores('<span style="color: red;">', '</span>');
    $provincias = tareas_model::get_provincias();
    if ($_POST) {

        $error = filtradoCadena($error, $_POST['identificacion'], $_POST['nombre'], $_POST['apellido'], $_POST['telefono'], $_POST['descripcion'], $_POST['correo'], $_POST['direccion'], $_POST['poblacion'], $_POST['codigo'], filter_input(INPUT_POST, 'provincia'), filter_input(INPUT_POST, 'estado'), $_POST['inicio'], filter_input(INPUT_POST, 'operario'), $_POST['final']);

        $data = "DNI='" . $_POST['identificacion'] . "', nombre='" . $_POST['nombre']  . "', apellido='" . $_POST['apellido']  . "', telefono='" . $_POST['telefono'] . "', descripcion='" . $_POST['descripcion']  . "', correo='" . $_POST['correo'] . "', direccion='" . $_POST['direccion'] . "', poblacion='" . $_POST['poblacion']
            . "', codigo_postal='" . $_POST['codigo'] . "', provincia='" . filter_input(INPUT_POST, 'provincia') . "', estado_tarea='" . filter_input(INPUT_POST, 'estado')  . "', fecha_creacion='" . $_POST['inicio']  . "', operario_id='" . filter_input(INPUT_POST, 'operario')  . "', fecha_final='" . $_POST['final']  . "', anotacion_inicio='" . $_POST['anterior']  . "', anotacion_final='" . $_POST['posterior'] . "'";

        if (!$error->HayErrores()) {

            tareas_model::update_tarea($data, $id);
            $paginas = tareas_model::totalPaginas();
            $tareas = tareas_model::get_Tareapaginada(1);
            echo $blade->render('tareas_mostrar', [
                'tareas' => $tareas, 'paginas' => $paginas
            ]);
        } else {
            echo $blade->render('tareas_modificar', [
                'error' => $error, 'provincias' => $provincias, 'tareas' => $tareaUnica
            ]);
        }
    } else {
        echo $blade->render('tareas_modificar', [
            'tareas' => $tareaUnica, 'provincias' => $provincias, 'error' => $error
        ]);
    }
}

/**
 * completar
 * Funcion para que los operarios puedan modificar la tarea de forma que este completada
 * @return void
 */
function completar()
{
    //Llamada al modelo
    include('app/models/varios.php');
    require("app/models/tareas_model.php");
    require("app/models/GestorErrores.php");

    $error = new GestorErrores('<span style="color: red;">', '</span>');

    $id = $_GET['id'];
    $tareaUnica = tareas_model::getOnetarea($id);

    if ($_POST) {

        if (!empty($_POST['final'])) {

            $estado = filter_input(INPUT_POST, 'estado');
            $anterior = $_POST['anterior'];
            $posterior = $_POST['posterior'];
            $final = $_POST['final'];

            tareas_model::completar_tarea($estado, $anterior, $posterior, $final, $id);
            $paginas = tareas_model::totalPaginas();
            $tareas = tareas_model::get_Tareapaginada(1);
            echo $blade->render('tareas_mostrar', [
                'tareas' => $tareas, 'paginas' => $paginas
            ]);
        } else {
            $error->AnotaError('fecha_final', 'La fecha final no puede estar vacia');
            echo $blade->render('tareas_completar', [
                'error' => $error, 'tareas' => $tareaUnica
            ]);
        }
    } else {
        echo $blade->render('tareas_completar', [
            'tareas' => $tareaUnica, 'error' => $error
        ]);
    }
}

/**
 * verEliminar
 * Funcion que nos muestra una vista donde esta la tarea seleccionada a eliminar para confirmar si quiere borrarla o no
 * @return void
 */
function verEliminar()
{
    //Llamada al modelo
    include('app/models/varios.php');
    require("app/models/tareas_model.php");
    $id = $_GET['id'];
    $tareaUnica = tareas_model::getOnetarea($id);
    echo $blade->render('tareas_eliminar', [
        'tareas' => $tareaUnica
    ]);
}

/**
 * delete
 * Funcion donde tras confirmar que si quiere borrar una tarea, la eliminamos
 * @return void
 */
function delete()
{
    //Llamada al modelo
    $id = $_GET['id'];
    include('app/models/varios.php');
    require("app/models/tareas_model.php");
    tareas_model::delete_tarea($id);
    $paginas = tareas_model::totalPaginas();
    $tareas = tareas_model::get_Tareapaginada(1);
    echo $blade->render('tareas_mostrar', [
        'tareas' => $tareas, 'paginas' => $paginas
    ]);
}

/**
 * filtrado
 * Apartado donde comprobamos el filtrado
 * @return void
 */
function filtrado()
{
    //Llamada al modelo
    include('app/models/varios.php');
    require("app/models/tareas_model.php");
    require("app/models/GestorErrores.php");

    $error = new GestorErrores('<span style="color: red;">', '</span>');

    if ($_POST) {

        $tareas = tareas_model::filtrar($_POST['nombre'], $_POST['estado'], $_POST['operario'], 1); //REVISAR ESTO JESUS POR FAVOH
        if ($tareas) {
            $paginas = tareas_model::totalPaginas();
            echo $blade->render('tareas_mostrar', [
                'tareas' => $tareas, 'paginas' => $paginas
            ]);
        } else {
            $error->AnotaError('tarera', 'No se encontro ninguna tarea con dichos parametros');
            echo $blade->render('buscador', [
                '$error' => $error
            ]);
        }
    } else {
        echo $blade->render('buscador', [
            '$error' => $error
        ]);
    }
}

/**
 * Filtrado base donde hacemos todas las comprobaciones necesarias para las tareas con el uso de expresiones regulares y demas metodos
 */
function filtradoCadena($error, $identificacion, $nombre, $apellido, $telefono, $descripcion, $correo, $direccion, $poblacion, $codigo, $provincia, $estado, $inicio, $operario, $final)
{
    include("app/libreria/Util-ValidarCodigo.php");
    include("app/libreria/Util-ValidarNombre.php");
    include("app/libreria/Util-FechaValida.php");
    include("app/libreria/Util-ValidarCorreo.php");
    include("app/libreria/Util-ValidarDNI.php");
    include("app/libreria/Util-ValidarTelefono.php");

    if (empty($identificacion)) {
        $error->AnotaError('identificacion', 'No has introducido un dni');
    } elseif (!validDniCifNie($identificacion)) {
        $error->AnotaError('identificacion', 'Formato no valido');
    }
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
    if (empty($telefono)) {
        $error->AnotaError('telefono', 'No has introducido un telefono');
    }
    if (empty($descripcion)) {
        $error->AnotaError('descripcion', 'No has introducido una descripcion');
    }
    if (empty($correo)) {
        $error->AnotaError('correo', 'No has introducido un correo');
    } elseif (!validarEmail($correo)) {
        $error->AnotaError('correo', 'Formato no valido');
    }
    if (empty($direccion)) {
        $error->AnotaError('direccion', 'No has introducido una direccion');
    }
    if (empty($poblacion)) {
        $error->AnotaError('poblacion', 'No has introducido una poblacion');
    }
    if (empty($codigo)) {
        $error->AnotaError('codigo', 'No has introducido un codigo postal');
    } elseif (!comprobarCodigo($codigo)) {
        $error->AnotaError('codigo', 'Formato no valido');
    }
    if (empty($provincia)) {
        $error->AnotaError('provincia', 'No has seleccionado una provincia');
    }
    if (empty($estado)) {
        $error->AnotaError('estado', 'No has seleccionado un estado');
    }
    if (empty($inicio)) {
        $error->AnotaError('inicio', 'No puede estar vacia');
    } elseif (comprobar_fecha_actual($inicio)) {
        $error->AnotaError('inicio', 'No puede ser distinta a la de hoy');
    }
    if (empty($operario)) {
        $error->AnotaError('operario', 'No has seleccionado un operario');
    }
    if (!empty($final)) {
        if (comprobar_fecha($final, $inicio)) {
            $error->AnotaError('final', 'No puede ser menor que la fecha actual');
        }
    }
    return $error;
}
