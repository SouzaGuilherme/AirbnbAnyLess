<?php
    require_once __DIR__ . '/../config.php';


?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>HOME</title>
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
        <form method="POST" action="<?=$base_url;?>/pages/cadastrar_imovel.php">

            <input class="button" type="submit" value="Cadastrar Imóvel" />
        </form>
    </section>
</body>
</html>