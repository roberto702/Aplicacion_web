<?php
/**
 * Insertar un nuevo usuario en la base de datos
 */
require 'ListarClase.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Decodificando formato Json
    $body = json_decode(file_get_contents("php://input"), true);
    // Insertar Clase
	
    $retorno = ListarClase::insert(
	    $body['nombre_clase'],
	    $body['fecha_clase']);
		
    if ($retorno) {
        $json_string = json_encode(array("estado" => 1,"mensaje" => "Creacion correcta"));
		echo $json_string;
    } else {
        $json_string = json_encode(array("estado" => 2,"mensaje" => "No se creo el registro"));
		echo $json_string;
    }
}
?>