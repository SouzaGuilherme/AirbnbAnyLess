<?php
require '../config.php';
require '../models/Auth.php';

$email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, "password");

if ($email && $password) {
    $auth = new Auth($pdo, $base_url);
    
    if ($auth->validateLogin($email, $password)) {
        header("Location: ".$base_url);
        exit;
    }
}

# $_SESSION["flash"] = "E-mail ou senha errados!";

header("Location: ".$base_url."/login.php");
exit;