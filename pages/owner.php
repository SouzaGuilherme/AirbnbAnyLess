<?php 

require_once __DIR__ . '/../config.php'; 
require_once __DIR__ . '/../dao/UsuarioDaoMysql.php';

$usuarioDao = new UsuarioDaoMysql($pdo);
$usuario = $usuarioDao->findByToken($_SESSION["token"]);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Usuário</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1"/>
    <link rel="icon" type="image/png" href="<?=$base_url;?>/assets/images/favicon-32x32.png"/>
    <link rel="stylesheet" href="<?=$base_url;?>/assets/css/owner.css"/>
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/pages/header_application.css"/>
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/css/login.css"/>
</head>

<body class="container-background1">
    <?php require_once __DIR__ . '/../assets/pages/header_application.php' ?>

    <div class="user-image">
    </div>

    <div class="user-name">
        <p class = "user-name-style"> <?= $usuario->getNome() ?> </p>
    </div>

    <div class="options">
        <div class="bottom">
            <a href="home.php">
                <p class = "option-style"> Minhas Reservas </p>
            </a>
        </div>

        <div class="bottom">
            <a href="list_owner.php">
                <p class = "option-style"> Meus Imóveis</p>
            </a>
        </div>

        <div class="bottom">
            <a href="home.php">
                <p class = "option-style"> Editar Perfil </p>
            </a>
        </div>
    </div>
</body>

</html>