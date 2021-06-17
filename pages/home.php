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

</head>

<body class="bg">

    
    <?php require_once __DIR__ . '/../assets/pages/header_application.php' ?>
    <?php require_once __DIR__ . '/../assets/pages/find.php' ?>

</body>

</html>