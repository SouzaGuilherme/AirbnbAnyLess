<?php

require_once __DIR__ . '/../config.php';
require_once __DIR__ .  '/../models/Imovel.php';
require_once __DIR__ . '/../dao/ImovelDaoMysql.php';
require_once __DIR__ . '/../dao/EnderecoDaoMysql.php';
require_once __DIR__ . '/../dao/ReservaDaoMysql.php';
require_once __DIR__ . '/../dao/UsuarioDaoMysql.php';

$imovelDao = new ImovelDaoMysql($pdo);
$enderecoDao = new EnderecoDaoMysql($pdo);
$reservaDao = new ReservaDaoMysql($pdo);
$usuarioDao = new UsuarioDaoMysql($pdo);
$usuario = $usuarioDao->findByToken($_SESSION["token"]);
$imovel = $imovelDao->findByCodigo_imovel('5');
$endereco = $enderecoDao->findByNumeroSeqEnd($imovel->getNumeroSeqEnd());
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Imóvel</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1" />
    <link rel="icon" type="image/png" href="<?= $base_url; ?>/assets/images/favicon.png" />
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/css/um_imovel.css" />
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/pages/header_application.css" />
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/css/login.css" />
</head>

<body class="container-background2">

    <?php require_once __DIR__ . '/../assets/pages/header_application.php' ?>



    <div class="container-imovel">
        <div class="image">
        </div>

        <div class="city">
            <text class="text"> <?= $imovel->getCodigoCidade(); ?> </text>
        </div>

        <div class="state">
            <text class="text"> <?= $imovel->getUf(); ?> </text>
        </div>

        <div class="road">
            <text class="text"> <?= $endereco->getLogradouro() ?>, <?= $endereco->getNumero() ?></text>
        </div>

        <div class="price">
            <text class="text"> <?= $imovel->getValor() ?> </text>
        </div>

        <?php $reserva = new Reserva(-1, $usuario->getCpf(), "", "", $imovel->getCodigoImovel()); ?>
        <div class="check">

            <form method="POST" action="<?= $base_url; ?>/pages/actions/um_imovel_action.php">
                <div class="button-group">
                    <div>
                        <p class="text-style">Check In</p>
                        <input type="date" name="check_in" id="check_in">
                    </div>
                    <div>
                        <p class="text-style">Check Out</p>
                        <input type="date" name="check_out" id="check_out">
                    </div>
                </div>
                <input type="submit" class="option-style button-submit" value="Alocar">
            </form>
        </div>

        <div class="options2">

            <form method="GET" action="<?= $base_url; ?>/pages/describ_imovel.php">

                <input class="bottom2" type="hidden" name="ids" value="<?= $imovel->getCodigoImovel(); ?>">
                <button class="bottom2">
                    <p class="option-style one">Descrição</p>
                </button>
            </form>
            </a>

        </div>
    </div>
</body>

</html>