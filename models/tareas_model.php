<?php
require_once("Conectar.php"); 
class tareas_model {
    

    public static function get_Tareapaginada($pagina)
    {
        $tareas_paginas = 3;
        $desde = ($pagina-1) * $tareas_paginas;
        $query = Database::getInstance()->db->query("SELECT * FROM tareas ORDER BY fecha_creacion DESC LIMIT $desde,$tareas_paginas");
        $tareas = array();
        while($tarea = $query->fetch()){
            $tareas[] = $tarea;
        }
        return $tareas;
    }

    public static function totalPaginas()
    {
        $query = Database::getInstance()->db->query("SELECT * FROM tareas ORDER BY fecha_creacion DESC");
        $tareas_paginas = 3;

        $paginas = ceil($query->rowCount()/$tareas_paginas);
        
        return $paginas;
    }
    /**
     * get_provincias
     * Consulta donde obtengo todas las provincias y asi poder generarlas en los apartados donde se requiera la provincia
     * @return void
     */
    public static function get_provincias(){

        $query = Database::getInstance()->db->query("SELECT * FROM tbl_provincias");
        $provincias = array();
        while($tarea = $query->fetch()){
            $provincias[] = $tarea;
        }
        return $provincias;
    }
    
    /**
     * comprobar_provincia
     * Consulta para comprobar que la provincia seleccionada existe dentro de españa(nuestra base de datos)
     * @param  mixed $condicion es el nombre que pasamos de la provincia seleccionada
     * @return void
     */
    public static function comprobar_provincia($condicion){

        $query = Database::getInstance()->db->query("SELECT * FROM tbl_provincias WHERE nombre = '$condicion'");
        $provincias = array();
        while($provincia = $query->fetch()){
            $provincias[] = $provincia;
        }
        return $provincias;
    }
    
    /**
     * getOnetarea
     * Consulta para obtener una tarea en concreto y poder realizar las acciones que se requieren
     * @param  mixed $tarea_id para esto se identifica a traves de la id obtenida
     * @return void
     */
    public static function getOnetarea($tarea_id){

        $query = Database::getInstance()->db->query("SELECT * FROM tareas WHERE tarea_id = '$tarea_id'");
        $tareas = array();
        while($tarea = $query->fetch(PDO::FETCH_ASSOC)){
            $tareas[] = $tarea;
        }
        return $tareas;
    }
    
    /**
     * filtrar
     * Consulta para buscar por un filtro los parametros que pasamos
     * @param  mixed $nombre
     * @param  mixed $estado
     * @param  mixed $operario
     * @return void
     */
    public static function filtrar($nombre, $estado, $operario, $pagina){

        $tareas_paginas = 3;
        $desde = ($pagina-1) * $tareas_paginas;
        $query = Database::getInstance()->db->query("SELECT * FROM tareas WHERE nombre = '$nombre' OR estado_tarea = '$estado' OR operario_id = '$operario' LIMIT $desde,$tareas_paginas");
        $tareas = array();
        while($tarea = $query->fetch()){
            $tareas[] = $tarea;
        }
        return $tareas;
    }

    public static function totalPaginasPendientes()
    {
        $query = Database::getInstance()->db->prepare("SELECT * FROM tareas WHERE estado_tarea = ? ORDER BY fecha_creacion DESC");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $query->execute(array("P"));
        $tareas_paginas = 3;

        $paginas = ceil($query->rowCount()/$tareas_paginas);
        
        return $paginas;
    }
    /**
     * get_tareaPendiente
     * Consulta para obtener todas las tareas pendientes
     * @return void
     */
    public static function get_tareaPendiente($pagina){

        $tareas_paginas = 3;
        $desde = ($pagina-1) * $tareas_paginas;
        $query = Database::getInstance()->db->prepare("SELECT * FROM tareas WHERE estado_tarea = ? ORDER BY fecha_creacion DESC LIMIT $desde,$tareas_paginas");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $query->execute(array("P"));
        $tareas = array();
        while($tarea = $query->fetch()){
            $tareas[] = $tarea;
        }
        return $tareas;

    }    
    /**
     * insert_tarea
     * Consulta para introducir una tarea
     * @param  mixed $data
     * @return void
     */
    public static function insert_tarea($data){
        
        $query = Database::getInstance()->db->query("INSERT INTO tareas VALUES(NULL," . $data . ")");
        if ($query) {
            return true;
        } else {
            return false;
        }
    }    
    /**
     * update_tarea
     * Funcion para modificar una tarea
     * @param  mixed $data pasamos todos los datos
     * @param  mixed $tarea_id referencia la id obtenida
     * @return void
     */
    public static function update_tarea($data, $tarea_id){

        $query = Database::getInstance()->db->query("UPDATE tareas SET $data WHERE tarea_id = '$tarea_id'");
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    
    public static function completar_tarea($estado, $anterior, $posterior, $final, $tarea_id){

        $query = Database::getInstance()->db->query("UPDATE tareas SET estado_tarea = '$estado', anotacion_inicio = '$anterior', anotacion_final = '$posterior', fecha_final = '$final' WHERE tarea_id = '$tarea_id'");
        if ($query) {
            return true;
        } else {
            return false;
        }
    } 
    /**
     * delete_tarea
     * Consulta para eliminar una tarea por su id
     * @param  mixed $tarea_id
     * @return void
     */
    public static function delete_tarea($tarea_id){
        
        $query = Database::getInstance()->db->prepare("DELETE FROM tareas WHERE tarea_id = ?");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $query->execute(array($tarea_id));
        $resultado = $query->fetch();
        return $resultado;
    }
}
