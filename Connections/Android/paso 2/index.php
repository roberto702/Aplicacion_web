<?php

require_once 'include/user.php';

$username = "";

$password = "";

$nombre = "";

$apellidos = "";

$status = "";

$tipo = "";

if(isset($_POST['username'])){

	$username = $_POST['user'];

}

if(isset($_POST['password'])){

	$password = $_POST['password'];

}

if(isset($_POST['nombre'])){

	$nombre = $_POST['nombre'];

}

if(isset($_POST['apellidos'])){

	$apellidos = $_POST['nombre'];

}

if(isset($_POST['fecha_registro'])){

	$fecha_registro = $_POST['fecha_registro'];

}

if(isset($_POST['status'])){

	$status = $_POST['status'];

}

if(isset($_POST['tipo'])){

	$tipo = $_POST['tipo'];
	
}
	
// Instance of a User class

$userObject = new User();

// Registration of new user

if(!empty($username) && !empty($password) && !empty($nombre) && !empty($apellidos)){

$hashed_password = md5($password);

$json_registration = $userObject->createNewRegisterUser($username, $hashed_password, $nombre, $apellidos, $fecha_registro, $status, $tipo);

echo json_encode($json_registration);

}

// User Login

if(!empty($username) && !empty($password)){

$hashed_password = md5($password);

$json_array = $userObject->loginUsers($username, $hashed_password);

echo json_encode($json_array);
}
?>