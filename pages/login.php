<?php
    require_once __DIR__ . '/../config.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1"/>
    <link rel="icon" type="image/png" href="<?=$base_url;?>/assets/images/favicon-32x32.png"/>
    <link rel="stylesheet" href="<?=$base_url;?>/assets/css/login.css" />
</head>
<body>
    <header>
        <div class="container">
            <a href="<?=$base_url;?>"><img src="<?=$base_url;?>/assets/images/logo.png" /></a>
        </div>
    </header>
    <section class="container main">
        <form method="POST" action="<?=$base_url;?>/pages/actions/login_action.php">

            <?php if(!empty($_SESSION["msg"])): ?>
                <?=$_SESSION["msg"];?>
                <?php $_SESSION["msg"] = "";?>
            <?php endif; ?>

            <input required placeholder="Digite seu e-mail" class="input" type="email" name="email" />
            <input required placeholder="Digite sua senha" class="input" type="password" name="password" minlength="4" maxlength="32"/>
            <input class="button" type="submit" value="Acessar o sistema" />
            <a href="<?=$base_url;?>/index.php">Voltar</a>
        </form>
    </section>
</body>
</html>