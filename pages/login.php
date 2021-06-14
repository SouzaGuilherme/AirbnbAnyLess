<?php
require_once __DIR__ . '/../config.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1" />
    <link rel="icon" type="image/png" href="<?= $base_url; ?>/assets/images/favicon-32x32.png" />
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/css/login.css" />
</head>

<body>
    <div class="container-background">
        <section class="container main">
            <form class="container-login" method="POST" action="<?= $base_url; ?>/pages/actions/login_action.php">

                <?php if (!empty($_SESSION["msg"])) : ?>
                    <?= $_SESSION["msg"]; ?>
                    <?php $_SESSION["msg"] = ""; ?>
                <?php endif; ?>

                <input required placeholder="Digite seu e-mail" class="input" type="email" name="email" />
                <input required placeholder="Digite sua senha" class="input" type="password" name="password" minlength="4" maxlength="32" />
                <input class="button" type="submit" value="Entrar" />
            </form>
            <form class="container-cadastro" method="POST" action="<?= $base_url; ?>/pages/cadastrar_usuario.php">
                <input class="button" type="submit" value="Criar Conta" />
            </form>
        </section>
    </div>
</body>

</html>