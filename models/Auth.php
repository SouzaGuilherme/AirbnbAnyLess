<?php
require 'dao/UserDaoMysql.php';


class Auth {
    private $pdo;
    private $base_url;

    public function __construct(PDO $pdo, $base_url){
        $this->pdo = $pdo;
        $this->base_url = $base_url;

    }

    public function checkToken() {
        /*
            Verifica se usuário já possui token de login, e se esse está preenchido.
            Retornando para Login caso não esteja preenchido.
        */

        if (!empty($_SESSION["token"])) {
            $token = $_SESSION["token"];
            
            $userDao = new UserDaoMysql($this->pdo);
            $user = $userDao->findByToken($token);
            if ($user) {
                return $user;
            } 
        }
        header("Location: ".$this->base_url."/login.php");
        exit;
    }

}