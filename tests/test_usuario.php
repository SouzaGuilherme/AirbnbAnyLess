<?php

require 'config.php';
#require 'models/Usuario.php';
require 'dao/UsuarioDaoMysql.php';
 

$user = new Usuario(
    $cpf="03482020000",
    $numero_seq_end=2,  # FK
    $codigo_cidade=4,   # FK
    $uf="ES",
    $nome="Thiago",
    $email="thiagoheronvila@gmail.com",
    $telefone="53999589276",
    $foto="path_foto.png",
    $tipoUsuario="AMBOS",
    $senha="senha",
    $token=""
);



$userDao = new UsuarioDaoMysql($pdo);
$userDao->add($user);
#$userDao->remove($user);
