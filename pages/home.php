<?php
require_once __DIR__ . '/../config.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Bem-vindo ao AirbnbAnyLess</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1" />
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/css/login.css" />
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/css/home.css" />
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/pages/header_application.css" />
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/pages/find.css" />
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/pages/footer.css" />

</head>

<body class="bg">

    <?php require_once __DIR__ . '/../assets/pages/header_application.php' ?>
    <?php require_once __DIR__ . '/../assets/pages/find.php' ?>

    <p class="line typing-animation">Encontre qualquer lugar para ficar!</p>

    <div class="imovel-container">
        
        <h1 class="title-city-container">Algumas cidades para você!</h1>
        
        <img src="/../assets/images/rio.jpg" class="city1">
        <!--span class="image-text">Rio de Janeiro</span-->
    
        <img src="/../assets/images/porto2.jpeg" class="city2">
        <!--span class="image-text">Porto Alegre</span-->

        <img src="/../assets/images/belo.jpg" class="city3">
        <!--span class="image-text">Belo Horizonte</span-->

        <?php require_once __DIR__ . '/../assets/pages/footer.php' ?>

    </div>

    

</body>

</html>