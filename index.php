<?php
require_once __DIR__ . '/config.php';
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Bem-vindo ao AirbnbAnyLess</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1" />
    <link rel="icon" type="image/png" href="<?=$base_url;?>/assets/images/favicon.png"/>
        <link rel="stylesheet" href="<?= $base_url; ?>/assets/css/login.css" />
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/pages/header_application.css" />
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/pages/home/home.css" />
</head>

<body>
    <div class="container-background">
        <section class="container main">
            <form class="container-login-index" method="POST" action="<?= $base_url; ?>/pages/login.php">
                <input class="button" type="submit" value="Entrar" />
            </form>
            <form class="container-cadastro-index" method="POST" action="<?= $base_url; ?>/pages/cadastrar_usuario.php">
                <input class="button" type="submit" value="Criar Conta" />
            </form>
        </section>
    </div>

    <div>
        <?php require_once __DIR__ . '/assets/pages/home/home.php' ?>
    </div>

</body>

</html>