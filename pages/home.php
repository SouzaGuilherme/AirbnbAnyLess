<?php
require_once __DIR__ . '/../config.php';

if (!isset($_SESSION["token"])) {
    header("Location: login.php");
    exit;
}
function function_alert($message)
{

    // Display the alert box 
    echo "<script>alert('$message');</script>";
}

if (isset($_GET['id'])) {
    if (($_GET['id']) == 1) {

        function_alert("Reservado com sucesso!!");
    }
    if(($_GET['id']) == 3){
        function_alert("Proprietário NÃO pode alocar, edite seu perfil para se tornar locatário.");
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Bem-vindo ao AirbnbAnyLess</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1" />
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/css/login.css" />
    <link rel="icon" type="image/png" href="<?= $base_url; ?>/assets/images/favicon.png" />
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/css/home.css" />
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/pages/header_application.css" />
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/pages/find.css" />
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/pages/footer.css" />

</head>

<body class="bg">

    <?php require_once __DIR__ . '/../assets/pages/header_application.php' ?>

    <div class="options-component">
        <form method="POST" action="<?= $base_url; ?>/pages/view_list.php">
            <input type="text" class="city" placeholder="Cidade" name="city" required />
            <input type="text" class="country" placeholder="País" name="country" required />
            <input type="date" class="start-date" name="start-date" required />
            <input type="date" class="end-date" name="end-date" required />
            <input type="text" class="people" placeholder="Nº de Quartos" name="people" required />
            <input type="text" class="price" placeholder="Preço" name="price" required />
            <input required class="find" type="submit" value="Procurar" />

        </form>
    </div>

    <p class="line typing-animation">Encontre qualquer lugar para ficar!</p>

    <?php require_once __DIR__ . '/../assets/pages/footer.php' ?>



</body>

</html>