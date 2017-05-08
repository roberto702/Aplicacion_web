<?php
/**
 * Obtiene todas los  usuarios de la base de datos
 */
require 'Usuario.php';
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Manejar petición GET
    $nom_usuario = Usuarios::getAll();
    if ($nom_usuario) {
        $datos["estado"] = 1;
        $datos["USER"] = $nom_usuario;
        print json_encode($datos);
    } else {
        print json_encode(array(
            "estado" => 2,
            "mensaje" => "Ha ocurrido un error"
        ));
    }
}