<?php 

require_once __DIR__ . '/../config.php'; 
require_once __DIR__ . '/../dao/ImovelDaoMysql.php';
$imovelDao = new ImovelDaoMysql($pdo);

if(!isset($_SESSION["token"]))
{
header("Location: login.php");
exit;
}

$codigo_imovel = $_GET['ids'];

?>

<!DOCTYPE html>
<html>
    <style>
        .tab1 {
            display: inline-block;
            margin-left: 50px;
        }
        .tab2 {
            display: inline-block;
            margin-left: 100px;
        }
    </style>
<head>
    <meta charset="UTF-8" />
    <title>Descrição do Imóvel</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1"/>
    <link rel="icon" type="image/png" href="<?=$base_url;?>/assets/images/favicon.png"/>
    <link rel="stylesheet" href="<?=$base_url;?>/assets/css/describ_imovel.css" />
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/pages/header_application.css" />
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/css/login.css" />
</head>

<body class="container-backgrounds">
    <?php require_once __DIR__ . '/../assets/pages/header_application.php' ?>
    <?php $imovel = $imovelDao->findByCodigoImovel($codigo_imovel) ?>
    <?php ($imovel->getPiscina() === 1) ? $foo = "sim" : $foo = "nao"; ?>
    
    <div class="container-infos">
        <div class = "imovel-infos">
        <p style = "font-weight: bold";>Informações sobre o Imóvel <br/> 
        <p> <span class="tab1"></span> Quartos:   <span class="tab1"></span> &ensp;&nbsp; <?= $imovel->getQtdQuartos() ?> <br/> </p>
        <p> <span class="tab1"></span> Salas:     <span class="tab2"></span> <?= $imovel->getQtdSalas() ?> <br/> </p>
        <p> <span class="tab1"></span> Banheiros: <span class="tab1"></span> <?= $imovel->getQtdBanheiros() ?> <br/></p>
        <p> <span class="tab1"></span> Piscina:   <span class="tab1"></span> &ensp;&ensp; <?= $foo; ?> <br/> </p>
        <p> <span class="tab1"></span> Garagem:   <span class="tab1"></span> &ensp;<?= $imovel->getVagasGaragem()?> <br/> </p>
    </div>    

        <div class="container-describe">
            <div class="image-user"> 
            </div>

            <div class="describe">
                Descrição <?= $imovel->getDescricao() ?> <br/>
            </div>
        </div>
    </div>
</body>

</html>
