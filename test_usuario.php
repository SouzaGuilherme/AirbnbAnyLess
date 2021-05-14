<?php

require 'config.php';
require 'models/Usuario.php';
require 'dao/UsuarioDaoMysql.php';
 

$user = new Usuario(
    "03482020000",
    123,
    456,
    "Rio Grande do Sul",
    "Thiago",
    "thiagoheronvila@gmail.com",
    "53999589276",
    "path_foto.png",
    "AMBOS",
    "senha",
    ""
);



$userDao = new UsuarioDaoMysql($pdo);
$userDao->add($user);
$userDao->remove($user);
