<?php
/**
 * Insertar un nuevo usuario en la base de datos
 */
require 'Usuario.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Decodificando formato Json
    $body = json_decode(file_get_contents("php://input"), true);
    // Insertar Usuario
	
    $retorno = Usuarios::insert(
	    $body['nombre'],
	    $body['apellidos'],
	    $body['nom_usuario'],
	    $body['fecha_registro'],
	    $body['estatus'],
        $body['tipo'],
        $body['password']);
		
    if ($retorno) {
        $json_string = json_encode(array("estado" => 1,"mensaje" => "Creacion correcta"));
		echo $json_string;
    } else {
        $json_string = json_encode(array("estado" => 2,"mensaje" => "No se creo el registro"));
		echo $json_string;
    }
}
?>