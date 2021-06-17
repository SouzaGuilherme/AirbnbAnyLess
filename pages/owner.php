<?php 

require_once __DIR__ . '/../config.php'; 
require_once __DIR__ . '/../dao/UsuarioDaoMysql.php';
$usuarioDao = new UsuarioDaoMysql($pdo);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Usuário</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1"/>
    <link rel="icon" type="image/png" href="<?=$base_url;?>/assets/images/favicon-32x32.png"/>
    <link rel="stylesheet" href="<?=$base_url;?>/assets/css/owner.css" />
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/pages/header_application.css" />
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/css/login.css" />
</head>

<body class="container-background">
    <?php require_once __DIR__ . '/../assets/pages/header_application.php' ?>
    <?php $usuario = $usuarioDao->findByCPF('03482023000') ?>

    <div class="user-image">
        <div class="settings">
        </div>
    </div>

    <div class="user-name">
        <p class = "user-name-style"> <?= $usuario->getNome(); ?> </p>
    </div>

    <div class="options">
        <div class="bottom">
            <p class = "option-style"> Minhas Reservas </p>
        </div>

        <div class="bottom">
            <p class = "option-style"> Meus Imóveis </p>
        </div>

        <div class="bottom">
            <p class="option-style"> Editar Perfil </p>
        </div>
    </div>
    
    <div class="container-describe">
    </div>
</body>

</html>