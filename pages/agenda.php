<?php 

require_once __DIR__ . '/../config.php'; 
require_once __DIR__ . '/../dao/UsuarioDaoMysql.php';

if(!isset($_SESSION["token"]))
{
header("Location: login.php");
exit;
}

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
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/css/agenda.css" />
</head>

<body class="agenda-background">

    <?php require_once __DIR__ . '/../assets/pages/header_application.php' ?>
    <?php $usuario = $usuarioDao->findByCPF('03482023000') ?>

</body>

</html>