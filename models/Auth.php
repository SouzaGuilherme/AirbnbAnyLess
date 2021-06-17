<?php

require __DIR__ . '/../dao/UsuarioDaoMysql.php';


class Auth {
    private $pdo;
    private $base_url;

    public function __construct(PDO $pdo, $base_url) {
        $this->pdo = $pdo;
        $this->base_url = $base_url;
    }

    public function checkToken() {
        /*
            Verifica se usuário já possui token de login no database, e se
            esse está preenchido.
            Retornando para Login caso não esteja preenchido.
        */

        if (!empty($_SESSION["token"])) {
            $token = $_SESSION["token"];

            $userDao = new UsuarioDaoMysql($this->pdo);
            $user = $userDao->findByToken($token);
            if ($user) {
                return $user->getToken();
            } else {
                return false;
            }
        }
        exit;
    }

    public function validateLogin($email, $password) {
        /* Verifica se o email e senha existem no database, e retornando
        True ou False, e armazenando o token na SESSION 
        */
        $userDao = new UsuarioDaoMysql($this->pdo);
        $user = $userDao->findByEmail($email);

        if ($user) {
            if ($password == $user->getSenha()) {
                $token = md5(time() . rand(0, 9999));
                $_SESSION["token"] = $token;
                $user->setToken($token);
                $userDao->update($user);
                return true;
            }
        }

        return false;
    }

    public function validateEqualPassword($password, $password_to_check) {
        if ($password == $password_to_check) {
            return true;
        };
        return false;
    }
}
