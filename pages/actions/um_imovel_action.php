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

$codigo_imovel = filter_input(INPUT_GET, "ids");

$check_in = filter_input(INPUT_GET, "check_in");
$check_out = filter_input(INPUT_GET, "check_out");

$usuario = $usuarioDao->findByToken($_SESSION["token"]);
if($usuario->getTipoUsuario()=="PROPRIETARIO"){
    header("Location: ".$base_url."/pages/home.php?id=3");
    exit;
}

$reserva = new Reserva (-1, $codigo_imovel, $usuario->getCpf(), $check_in, $check_out);
$reservaDao->add($reserva);

header("Location: ".$base_url."/pages/home.php?id=1");
exit;