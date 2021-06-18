<?php
session_start();

# TODO: Podemos remover como vamos utilizar 
global $pdo;

# Database
$db_name = "airbnb_any_less";
$db_host = "localhost";
$db_user = "root";
$db_pass = "";

# URL
$base_url = "http://localhost";

try {
	$pdo = new PDO("mysql:dbname=".$db_name.";host=".$db_host, $db_user, $db_pass);
} catch(PDOException $e) {
	echo "FALHOU: ".$e->getMessage();
	exit;
}
?>
