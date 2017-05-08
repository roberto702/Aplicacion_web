<?php
/**
 * Obtiene el detalle de un usuario especificado por
 * su identificador "id"
 */
require 'Usuario.php';
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['USER'])) {
        // Obtener parámetro id
        $parametro = $_GET['USER'];
        // Tratar retorno
        $retorno = Usuarios::getById($parametro);
        if ($retorno) {
            $prueba["estado"] = 1;		// cambio "1" a 1 porque no coge bien la cadena.
            $prueba["prueba"] = $retorno;
            // Enviar objeto json del usuario
		print json_encode($prueba);
        } else {
            // Enviar respuesta de error general
            print json_encode(
                array(
                    'estado' => '2',
                    'mensaje' => 'No se obtuvo el registro'
                )
            );
        }
    } else {
        // Enviar respuesta de error
        print json_encode(
            array(
                'estado' => '3',
                'mensaje' => 'Se necesita un identificador'
            )
        );
    }
}