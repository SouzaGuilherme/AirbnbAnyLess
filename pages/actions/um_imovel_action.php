<?php

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../models/Auth.php';
require_once __DIR__ . '/../../models/Estado.php';

require_once __DIR__ . '/../../dao/CidadeDaoMysql.php';
require_once __DIR__ . '/../../dao/EnderecoDaoMysql.php';
require_once __DIR__ . '/../../dao/ImovelDaoMysql.php';
require_once __DIR__ . '/../../dao/UsuarioDaoMysql.php';
require_once __DIR__ . '/../../dao/ReservaDaoMysql.php';

# Dao
$cidadeDao = new CidadeDaoMysql($pdo);
$enderecoDao = new EnderecoDaoMysql($pdo);
$imovelDao = new ImovelDaoMysql($pdo);
$usuarioDao = new UsuarioDaoMysql($pdo);
$reservaDao = new ReservaDaoMysql($pdo);

$check_in = filter_input(INPUT_POST, "check_in");
$check_out = filter_input(INPUT_POST, "check_out");
$usuario = $usuarioDao->findByToken($_SESSION["token"]);

$reserva = new Reserva (-1, 2, $usuario->getCpf(), $check_in, $check_out);
$reservaDao->add($reserva);