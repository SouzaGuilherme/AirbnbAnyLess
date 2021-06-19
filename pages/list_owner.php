<?php 

    require_once __DIR__ . '/../config.php'; 

?>

<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8" />
    <title>Meus Imóveis</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1"/>
    <link rel="icon" type="image/png" href="<?=$base_url;?>/assets/images/favicon-32x32.png"/>
    <link rel="stylesheet" href="<?=$base_url;?>/assets/css/list_owner.css"/>
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/pages/header_application.css"/>
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/css/login.css"/>
</head>

<body class="container-background2">
    <?php require_once __DIR__ . '/../assets/pages/header_application.php' ?>

    <div class="options">
        <div class="bottom">
            <a href="home.php">
                <p class = "option-style"> Ver Agendas </p>
            </a>
        </div>

        <div class="bottom">
            <a href="home.php">
                <p class = "option-style"> Cadastrar Imóveis </p>
            </a>
        </div>
    </div>
</body>
</html>