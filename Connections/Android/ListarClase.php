<?php
/**
 * Representa el la estructura de las clases
 * almacenadas en la base de datos
 */
require 'Database.php';
class ListarClase
{
    function __construct()
    {
    }
    /**
     * Retorna en la fila especificada de la tabla 'Clase'
     *
     * @param $nom_clase Identificador del registro
     * @return array Datos del registro
     */
    public static function getAll()
    {
        $consulta = "SELECT * FROM clase";
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
     * Obtiene los campos de una clase con un identificador
     * determinado
     *
     * @param $nom_clase Identificador del nombre clase (nombre_clase)
     * @return mixed
     */
    public static function getById($nom_clase)
    {
        // Consulta de la tabla clase
        $consulta = "SELECT id_clase,
                            nombre_clase,
							fecha_clase
							FROM clase
                            WHERE nombre_clase = ?";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($nom_clase));
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
     * @param $nom_clase      identificador / nombre de la clase
     * @param $fecha_clase    fecha de creación de la clase
     * @param $id_clase   	  identificador
     */
    
	public static function update(
        
        $nom_clase,
        $fecha_clase
    )
    {
        // Creando consulta UPDATE
        $consulta = "UPDATE clase" .
            " SET nombre_clase=?, fecha_clase=? " .
            "WHERE nombre_clase=?";
        // Preparar la sentencia
        $cmd = Database::getInstance()->getDb()->prepare($consulta);
        // Relacionar y ejecutar la sentencia
        $cmd->execute(array($nom_clase, $fecha_clase));
        return $cmd;
    }
    /**
     * Insertar una nueva clase
     *
     * @param $nom_clase      nombre del nuevo registro
     * @param $fecha_clase    fecha del nuevo registro
	 * @param $id_clase             id nuevo registro
	 * @return PDOStatement
     */
    public static function insert(
        $nom_clase,
		$fecha_clase
      )
    {
        // Sentencia INSERT
        $comando = "INSERT INTO clase ( " .
            "nombre_clase," .
			"fecha_clase)" .
	        " VALUES( ?,?)";
        // Preparar la sentencia
		
        $sentencia = Database::getInstance()->getDb()->prepare($comando);
        return $sentencia->execute(
            array(
                $nom_clase,
				$fecha_clase
            )
        );
    }
    /**
     * Eliminar el registro con el identificador especificado
     *
     * @param $nom_clase identificador de la tabla clase
     * @return bool Respuesta de la eliminación
     */
    public static function delete($nom_clase)
    {
        // Sentencia DELETE
        $comando = "DELETE FROM clase WHERE nombre_clase=?";
        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);
        return $sentencia->execute(array($nom_clase));
    }
}
?>