<?php 

require_once __DIR__ . '/../config.php'; 
require_once __DIR__ . '/../dao/UsuarioDaoMysql.php';
require_once __DIR__ . '/../dao/ReservaDaoMysql.php';
require_once __DIR__ . '/../dao/EnderecoDaoMysql.php';

if(!isset($_SESSION["token"]))
{
header("Location: login.php");
exit;
}

$usuarioDao = new UsuarioDaoMysql($pdo);
$reservaDao = new ReservaDaoMysql($pdo);
$enderecoDao = new EnderecoDaoMysql($pdo);

$usuario = $usuarioDao->findByToken($_SESSION["token"]);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Agenda</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1"/>
    <link rel="icon" type="image/png" href="<?=$base_url;?>/assets/images/favicon-32x32.png"/>
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/css/agenda.css" />
    <link rel="stylesheet" href="<?=$base_url;?>/assets/css/owner.css" />
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/pages/header_application.css" />
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/css/login.css" />
</head>

<body class="agenda-background">

    <?php require_once __DIR__ . '/../assets/pages/header_application.php' ?>

    <?php foreach ($reservaDao->findAllReservas($usuario->getCPF()) as $reservas) : ?>
        <?php ?>
            <div class="check_in">
                <text class="text"> <?= $reservas['data_inicial'] ?> </text>
            </div>

            <div class="check_out">
                <text class="text"> <?= $reservas['data_final'] ?> </text>
            </div>

    <?php endforeach; ?>

</body>

</html>