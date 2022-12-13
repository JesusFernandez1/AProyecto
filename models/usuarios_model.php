<?php
require("Conectar.php");
class usuarios_model
{
    
    /**
     * get_usuarios
     * Consulta donde obtenemos todos los usuarios para poder mostrarlos u otras acciones
     * @return void
     */
    public static function get_usuarios()
    {

        $query = Database::getInstance()->db->query("SELECT * FROM usuarios");
        $usuarios = array();
        while ($usuario = $query->fetch()) {
            $usuarios[] = $usuario;
        }
        return $usuarios;
    }
    
    /**
     * getUsuario
     * Consulta para obtener un usuario en concreto y poder realizar las acciones que se requieren a traves de su id
     * @param  mixed $id
     * @return void
     */
    public static function getUsuario($id)
    {

        $query = Database::getInstance()->db->query("SELECT * FROM usuarios WHERE usuario_id = '$id'");
        $usuarios = array();
        while ($usuario = $query->fetch(PDO::FETCH_ASSOC)) {
            $usuarios[] = $usuario;
        }
        return $usuarios;
    }
    
    /**
     * getOneUsuario
     * Consulta parecida a la anterior pero esta la usamos para comprobar si el usuario que hace login existe en nuestra base de datos
     * @param  mixed $nombre
     * @param  mixed $contrase
     * @return void
     */
    public static function getOneUsuario($nombre, $pass)
    {

        $query = Database::getInstance()->db->query("SELECT * FROM usuarios WHERE nombre = '$nombre' AND pass = '$pass'");
        $usuarios = array();
        while ($usuario = $query->fetch(PDO::FETCH_ASSOC)) {
            $usuarios[] = $usuario;
        }
        return $usuarios;
    }
    
    /**
     * insert_usuario
     * Consulta para insertar un usuario pasandole los datos introducidos
     * @param  mixed $data
     * @return void
     */
    public static function insert_usuario($data)
    {

        $query = Database::getInstance()->db->query("INSERT INTO usuarios VALUES(NULL," . $data . ")");
        if ($query) {
            return true;
        } else {
            return false;
        }
    }    
    /**
     * update_usuario
     * Consulta para modificar un usuario pasandole los datos y la id de referncia
     * @param  mixed $data
     * @param  mixed $usuario_id
     * @return void
     */
    public static function update_usuario($data, $usuario_id){

        $query = Database::getInstance()->db->query("UPDATE usuarios SET $data WHERE usuario_id = '$usuario_id'");
        if ($query) {
            return true;
        } else {
            return false;
        }
    }    
    /**
     * delete_usuario
     * Consulta para borrar el usuario seleccionado con su id
     * @param  mixed $usuario_id
     * @return void
     */
    public static function delete_usuario($usuario_id)
    {

        $query = Database::getInstance()->db->prepare("DELETE FROM usuarios WHERE usuario_id = ?");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $query->execute(array($usuario_id));
        $resultado = $query->fetch();
        return $resultado;
    }
}
