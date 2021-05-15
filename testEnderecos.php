<?php

require 'config.php';
require 'models/Endereco.php';
require 'dao/EnderecoDaoMysql.php';

$endereco = new Endereco(
    "From hell",
    "RS",
    "3",
    "666",
    "ao lado do purgatório",
    "loucuras de meu deus",
    "40400666"
);

$endereco1 = new Endereco(
    "Fr",
    "RJ",
    "6",
    "66",
    "ao lado do purgatório",
    "loucuras de meu deus",
    "40400666"
);

$enderecoDao = new EnderecoDaoMysql($pdo);
$enderecoDao->add($endereco);

$enderecoDao = new EnderecoDaoMysql($pdo);
$enderecoDao->add($endereco1);

#$enderecoDao->remove($endereco);

