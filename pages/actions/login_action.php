<?php
require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../models/Auth.php';

$auth = new Auth($pdo, $base_url);
$email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, "password");


if ($email && $password) {
    
    if ($auth->validateLogin($email, $password)) {
        $token = $auth->checkToken();
        if ($token) {
            $_SESSION['token'] = $token;
        } else{
            $_SESSION['token'] = false;
        }

        header("Location: ".$base_url."/pages/home.php");
    }
    else {
        $_SESSION["msg"] = "E-mail ou senha errados!";
        header("Location: ".$base_url."/pages/login.php");
    }
    exit;
}