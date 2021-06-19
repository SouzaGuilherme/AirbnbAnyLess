<?php 

require_once __DIR__ . '/../config.php'; 
require_once __DIR__ . '/../dao/ImovelDaoMysql.php';
require_once __DIR__ . '/../dao/EnderecoDaoMysql.php';
require_once __DIR__ . '/../dao/ReservaDaoMysql.php';
require_once __DIR__ . '/../dao/UsuarioDaoMysql.php';

$imovelDao = new ImovelDaoMysql($pdo);
$enderecoDao = new EnderecoDaoMysql($pdo);
$reservaDao = new ReservaDaoMysql($pdo);
$usuarioDao = new UsuarioDaoMysql($pdo);
$usuario = $usuarioDao->findByToken($_SESSION["token"]);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Meus Imóveis</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1"/>
    <link rel="icon" type="image/png" href="<?=$base_url;?>/assets/images/favicon.png"/>
    <link rel="stylesheet" href="<?=$base_url;?>/assets/css/um_imovel.css"/>
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/pages/header_application.css"/>
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/css/login.css"/>
</head>

<body class="container-background2">

    <?php require_once __DIR__ . '/../assets/pages/header_application.php'?>

    <?php foreach($imovelDao->findAllImoveis() as $imovel): ?>
    <?php $endereco = $enderecoDao->findByNumeroSeqEnd($imovel['numero_seq_end'])?>
           

        <div class="container-imovel">
            <div class="image">
            </div>

            <div class = "city">
                <text class="text"> <?= $imovel['codigo_cidade']; ?> </text>
            </div>

            <div class = "state">
                <text class="text"> <?= $imovel['uf'];?> </text>
            </div>
                
            <div class = "road">
                <text class="text"> <?= $endereco->getLogradouro() ?>, <?= $endereco->getNumero() ?></text>
            </div>

            <div class = "price">
                <text class="text"> <?= $imovel['valor'] ?> </text>
            </div>
            
            <?php $reserva = new Reserva($usuario->getCpf(),"","", $imovel['codigo_imovel']); ?>
            <div class="check">

                <form method="POST" action="<?= $base_url; ?>/pages/actions/um_imovel_action.php">
                    <input type="date" name="check_in" id="check_in">
                    <input type="date" name="check_out" id="check_out">
                    <input type="submit" class = "option-style" value="Alocar">
                </form>
            </div>

            <div class = "options2">
                <div class="bottom2">
                    <a href="describ_imovel.php">
                        <p class = "option-style one"> Descrição </p>
                    </a>
                </div> 

            </div>
        </div>
    <?php endforeach; ?>
</body>
</html>