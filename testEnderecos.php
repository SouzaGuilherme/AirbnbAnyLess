<?php

require 'config.php';
require 'models/Endereco.php';
require 'dao/EnderecoDaoMysql.php';

#$userDao = new UsuarioDaoMysql($pdo);
#$userDao->add($user);
/*
*/
$endereco = new Endereco(
    "3",
    "123456789",
    "RS",
    "From hell",
    "666",
    "ao lado do purgatório",
    "loucuras de meu deus",
    "40400666"
);

$enderecoDao = new EnderecoDaoMysql($pdo);
$enderecoDao->add($endereco);

# $userDao->remove($user);

