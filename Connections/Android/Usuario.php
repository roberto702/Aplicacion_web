<?php
/**
 * Representa el la estructura de los usuarios
 * almacenadas en la base de datos
 */
require 'Database.php';
class Usuarios
{
    function __construct()
    {
    }
    /**
     * Retorna en la fila especificada de la tabla 'Usuarios'
     *
     * @param $nom_usuario Identificador del registro
     * @return array Datos del registro
     */
    public static function getAll()
    {
        $consulta = "SELECT * FROM usuarios";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();
            return $comando->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }
    /**
     * Obtiene los campos de un Usuario con un identificador
     * determinado
     *
     * @param $nom_usuario Identificador del nombre usuario (USER)
     * @return mixed
     */
    public static function getById($nom_usuario)
    {
        // Consulta de la tabla usuarios
        $consulta = "SELECT NOMBRE,
                            APELLIDOS,
							USER,
							FECHA_REGISTRO,
							ESTATUS,
							TIPO,
							PASSWORD
                            FROM usuarios
                            WHERE USER = ?";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($nom_usuario));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;
        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }
    /**
     * Actualiza un registro de la bases de datos basado
     * en los nuevos valores relacionados con un identificador
     *
     * @param $nom_usuario      identificador
     * @param $nombre      nuevo nombre
     * @param $apellidos   nuevo apellidos
	 * @param $fecha_registro nueva fecha_de_registro
	 * @param $estatus     nuevo estatus
	 * @param $tipo        nuevo tipo
	 * @param $password    nueva password
	 
     */
    
	public static function update(
        
        $nombre,
        $apellidos,
		$nom_usuario,
		$fecha_registro,
		$estatus,
		$tipo,
		$password
    )
    {
        // Creando consulta UPDATE
        $consulta = "UPDATE usuarios" .
            " SET NOMBRE=?, APELLIDOS=?, USER=?, FECHA_REGISTRO=?, ESTATUS=?, TIPO=?, PASSWORD=? " .
            "WHERE USER=?";
        // Preparar la sentencia
        $cmd = Database::getInstance()->getDb()->prepare($consulta);
        // Relacionar y ejecutar la sentencia
        $cmd->execute(array($nombre, $apellidos, $nom_usuario, $fecha_registro, $estatus, $tipo, $password));
        return $cmd;
    }
    /**
     * Insertar un nuevo Usuario
     *
     * @param $nombre      nombre del nuevo registro
     * @param $apellidos   apellidos del nuevo registro
	 * @param $id          id nuevo registro
	 * @param $nom_usuario     usuario del nuevo registro
	 * @param $fecha_registro fecha de registro del nuevo usuario
	 * @param $estatus     estatus del nuevo registro
	 * @param $tipo        tipo del nuevo registro
	 * @param $password    password del nuevo registro
     * @return PDOStatement
     */
    public static function insert(
        $nombre,
		$apellidos,
		$nom_usuario,
		$fecha_registro,
		$estatus,
		$tipo,
		$password
        
    )
    {
        // Sentencia INSERT
        $comando = "INSERT INTO usuarios ( " .
            "nombre," .
			"apellidos," .
			"user," .
			"fecha_registro," .
			"estatus," .
			"tipo," .
			"password)" .
	        " VALUES( ?,?,?,?,?,?,?)";
        // Preparar la sentencia
		
        $sentencia = Database::getInstance()->getDb()->prepare($comando);
        return $sentencia->execute(
            array(
                $nombre,
				$apellidos,
				$nom_usuario,
				$fecha_registro,
				$estatus,
				$tipo,
                $password
            )
        );
    }
    /**
     * Eliminar el registro con el identificador especificado
     *
     * @param $nom_usuario identificador de la tabla usuarios
     * @return bool Respuesta de la eliminación
     */
    public static function delete($nom_usuario)
    {
        // Sentencia DELETE
        $comando = "DELETE FROM usuarios WHERE USER=?";
        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);
        return $sentencia->execute(array($nom_usuario));
    }
}
?>