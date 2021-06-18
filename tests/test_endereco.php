<?php

require 'config.php';
require 'models/Endereco.php';
require 'dao/EnderecoDaoMysql.php';
 

$endereco = new Endereco(
    1,
    "ES",
    "Logradouro",
    12346,
    "Complemento",
    "Bairro",
    "CEP", 
);

print_r($endereco);



$enderecoDao = new EnderecoDaoMysql($pdo);
$enderecoDao->add($endereco);

