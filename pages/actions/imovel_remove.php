<?php
require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../models/Auth.php';
require_once __DIR__ . '/../../dao/ImovelDaoMysql.php';
require_once __DIR__ . '/../../dao/ReservaDaoMysql.php';

function function_alert($message)
{

    // Display the alert box 
    echo "<script>alert('$message');</script>";
}

# Dao
$imovelDao = new ImovelDaoMysql($pdo);
$reservaDao = new ReservaDaoMysql($pdo);

$input_codigo_imovel = filter_input(INPUT_GET, "ids");

if ($reservaDao->findAllReservasImovel($input_codigo_imovel) == NULL) {

    $imovelDao->removeCod($input_codigo_imovel);


    header("Location: " . $base_url . "/pages/list_owner.php?ids=2");
} else {

    header("Location: " . $base_url . "/pages/list_owner.php?ids=1");
}

exit;
