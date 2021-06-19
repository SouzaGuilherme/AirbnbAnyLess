<?php
require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../models/Auth.php';
require_once __DIR__ . '/../../dao/ImovelDaoMysql.php';

# Dao
$imovelDao = new ImovelDaoMysql($pdo);

$input_codigo_imovel = filter_input(INPUT_GET, "ids");

$imovelDao->removeCod($input_codigo_imovel);

header("Location: " . $base_url . "/pages/list_owner.php");
exit;
