<?php
/**
 * Obtiene todas los  usuarios de la base de datos
 */
require 'ListarClase.php';
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Manejar petición GET
    $nom_clase = ListarClase::getAll();
    if ($nom_clase) {
        $datos["estado"] = 1;
        $datos["nombre_clase"] = $nom_clase;
        print json_encode($datos);
    } else {
        print json_encode(array(
            "estado" => 2,
            "mensaje" => "Ha ocurrido un error"
        ));
    }
}