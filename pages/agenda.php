<?php

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../dao/UsuarioDaoMysql.php';
require_once __DIR__ . '/../dao/ReservaDaoMysql.php';
require_once __DIR__ . '/../dao/EnderecoDaoMysql.php';

if (!isset($_SESSION["token"])) {
    header("Location: login.php");
    exit;
}

$usuarioDao = new UsuarioDaoMysql($pdo);
$reservaDao = new ReservaDaoMysql($pdo);
$enderecoDao = new EnderecoDaoMysql($pdo);

$usuario = $usuarioDao->findByToken($_SESSION["token"]);
if ($usuario->getTipoUsuario() == "PROPRIETARIO") {
    header("Location: " . $base_url . "/pages/owner.php?id=2");
}
$var = 0;
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Agenda</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1" />
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/css/agenda.css" />
    <link rel="icon" type="image/png" href="<?= $base_url; ?>/assets/images/favicon.png" />
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/css/owner.css" />
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/pages/header_application.css" />
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/css/login.css" />
</head>

<body class="agenda-background">

    <?php require_once __DIR__ . '/../assets/pages/header_application.php' ?>

    <h1 class="titulo">Sua agenda</h1>
    <p class="paragrafo"> Aqui temos suas datas de check-in e check-out de suas reservas.</p>

    <div class="reservas-container">
        <?php if ($reservaDao->findAllReservas($usuario->getCPF()) != NULL) : ?>

            <?php foreach ($reservaDao->findAllReservas($usuario->getCPF()) as $reservas) : ?>
                <?php $var = $var + 1; ?>
                <?php ?>

                <div class="dates-container">
                    <div>
                        <text class="text-dates"> Reserva: <?php print($var) ?></text>
                    </div>
                    <div class="check_in">
                        <div class="text-dates">Check in:</div>
                        <text class="text"> <?= $reservas['data_inicial'] ?> </text>
                    </div>

                    <div class="check_out">
                        <div class="text-dates">Check out:</div>
                        <text class="text"> <?= $reservas['data_final'] ?> </text>
                    </div>
                </div>

            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</body>

</html>