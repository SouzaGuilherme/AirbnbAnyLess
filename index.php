<?php
require_once __DIR__ . '/config.php';
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Bem-vindo ao AirbnbAnyLess</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1" />
    <link rel="icon" type="image/png" href="<?= $base_url; ?>/assets/images/favicon-32x32.png" />
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/css/login.css" />
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

</body>

</html>