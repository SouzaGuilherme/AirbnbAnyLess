<?php

# Session
session_start();

# URL
$base_url = "http://localhost";

# Database
$db_name = "airbnb_any_less";
$db_host = "localhost";
$db_user = "root";
$db_pass = "";

$pdo = new PDO("mysql:dbname=".$db_name.";host=".$db_host, $db_user, $db_pass);
