<?php
session_start();

$base_url = "http://localhost/";

$db_name = "airbnb_any_less";
$db_host = "localhost";
$db_user = "root";
$db_pass = "";

$pdo = new PDO("mysql:db=name".$db_name.";host=".$db_host, $db_user, $db_pass);