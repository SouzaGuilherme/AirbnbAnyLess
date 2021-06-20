<?php
require_once __DIR__ . '/../config.php';

if(!isset($_SESSION["token"]))
{
header("Location: login.php");
exit;
}
function function_alert($message)
{

    // Display the alert box 
    echo "<script>alert('$message');</script>";
}

if (($_GET['id']) == 1) {

    function_alert("Reservado com sucesso!!");

}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Bem-vindo ao AirbnbAnyLess</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1" />
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/css/login.css" />
    <link rel="icon" type="image/png" href="<?=$base_url;?>/assets/images/favicon.png"/>
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/css/home.css" />
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/pages/header_application.css" />
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/pages/find.css" />
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/pages/footer.css" />

</head>

<body class="bg">

    <?php require_once __DIR__ . '/../assets/pages/header_application.php' ?>
    <?php require_once __DIR__ . '/../assets/pages/find.php' ?>

    <p class="line typing-animation">Encontre qualquer lugar para ficar!</p>

    <?php require_once __DIR__ . '/../assets/pages/footer.php' ?>

    

</body>

</html>