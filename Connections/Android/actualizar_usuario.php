<?php
/**
 * Actualiza un alumno especificado por su identificador
 */
require 'Usuario.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Decodificando formato Json
    $body = json_decode(file_get_contents("php://input"), true);
    // Actualizar usuario
    $retorno = Usuarios::update(
        $body['NOMBRE'],
		$body['APELLIDOS'],
        $body['USER'],
		$body['FECHA_REGISTRO'],
        $body['ESTATUS'],
		$body['TIPO'],
        $body['PASSWORD']);
    if ($retorno) {
        $json_string = json_encode(array("estado" => 1,"mensaje" => "Actualizacion correcta"));
		echo $json_string;
    } else {
        $json_string = json_encode(array("estado" => 2,"mensaje" => "No se actualizo el registro"));
		echo $json_string;
    }
}
?>