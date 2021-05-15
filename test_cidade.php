<?php

require 'config.php';
require 'models/Cidade.php';
require 'dao/CidadeDaoMysql.php';
 

$cidadeDAO = new CidadeDaoMysql($pdo);
$cidade = $cidadeDAO->findByCity("ES", "Afonso Cláudio");
print_r($cidade);