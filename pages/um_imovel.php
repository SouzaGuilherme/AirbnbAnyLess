<?php 

require_once __DIR__ . '/../config.php'; 
require_once __DIR__ . '/../dao/ImovelDaoMysql.php';
require_once __DIR__ . '/../dao/EnderecoDaoMysql.php';
require_once __DIR__ . '/../dao/ReservaDaoMysql.php';

$imovelDao = new ImovelDaoMysql($pdo);
$enderecoDao = new EnderecoDaoMysql($pdo);
$reservaDao = new ReservaDaoMysql($pdo);
$Newreserva = new Reserva($pdo);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Meus Imóveis</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1"/>
    <link rel="icon" type="image/png" href="<?=$base_url;?>/assets/images/favicon-32x32.png"/>
    <link rel="stylesheet" href="<?=$base_url;?>/assets/css/um_imovel.css"/>
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/pages/header_application.css"/>
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/css/login.css"/>
</head>

<body class="container-background2">

    <?php require_once __DIR__ . '/../assets/pages/header_application.php'?>

    <?php foreach($imovelDao->findAllImoveis() as $imovel): ?>
    <?php $endereco = $enderecoDao->findByNumeroSeqEnd($imovel['numero_seq_end'])?>
        
        <?php $reserva = $Newreserva->getCodigoImovel()?>    
        <?php echo 'console.log($imovel)'?>

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
            
            <div class="check">
                <form action=<?=$$reservaDao->add($reserva);?> method="POST">
                    <input type="date">
                    <input type="date">
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