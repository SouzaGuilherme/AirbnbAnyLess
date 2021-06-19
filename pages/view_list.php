<?php 

require_once __DIR__ . '/../config.php'; 
require_once __DIR__ . '/../dao/ImovelDaoMysql.php';
require_once __DIR__ . '/../dao/EnderecoDaoMysql.php';
require_once __DIR__ . '/../dao/UsuarioDaoMysql.php';

$imovelDao = new ImovelDaoMysql($pdo);
$enderecoDao = new EnderecoDaoMysql($pdo);
    
$usuarioDao = new UsuarioDaoMysql($pdo);

$usuario = $usuarioDao->findByToken($_SESSION["token"]);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Meus Imóveis</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1"/>
    <link rel="icon" type="image/png" href="<?=$base_url;?>/assets/images/favicon.png"/>
    <link rel="stylesheet" href="<?=$base_url;?>/assets/css/view_list.css"/>
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/pages/find.css" />
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/pages/header_application.css"/>
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/css/login.css"/>
</head>

<body class="bg">

    <?php require_once __DIR__ . '/../assets/pages/header_application.php' ?>

    <div class="options-component">

        <input type="text" class="city" placeholder="Cidade" name="city" >
        <input type="text" class="country" placeholder="País" name="country">
        <input type="text" class="start-date" placeholder="Check-in" name="start-date">
        <input type="text" class="end-date" placeholder="Check-out" name="end-date">
        <input type="text" class="people" placeholder="Nº de Quartos" name="people">
        <input type="text" class="price" placeholder="Preço" name="price">
        <input type="submit" class="find" value="Procurar" name="find">

        <?php 
        
        ?>

    </div>

</body>
</html>