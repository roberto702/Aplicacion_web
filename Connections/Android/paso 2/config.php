<?php

$servername = "mysql.robertoadvance.dreamhosters.com";
$username = "robertoadvance";
$password = "3KZTb?SQ";
$dbname = "robertoadvance1";

try {
    	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    	die("OOPs something went wrong");
    }

?>
