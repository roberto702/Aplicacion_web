<?php
$hostname_Local = "localhost";
$database_Local = "robertoadvance1";
$username_Local = "root";
$password_Local = "";
$Local = mysql_pconnect($hostname_Local, $username_Local, $password_Local) or trigger_error(mysql_error(),E_USER_ERROR); 


$conexion = mysql_connect("localhost","root","");
	mysql_select_db("robertoadvance1",$conexion);
	
	date_default_timezone_set("America/Santiago");
	
	function limpiar($tags){
		$tags = strip_tags($tags);
		$tags = stripslashes($tags);
		$tags = mysql_real_escape_string($tags);
		return $tags;
	}

?>