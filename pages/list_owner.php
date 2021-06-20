<?php

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../dao/ImovelDaoMysql.php';
require_once __DIR__ . '/../dao/EnderecoDaoMysql.php';
require_once __DIR__ . '/../dao/UsuarioDaoMysql.php';

$imovelDao = new ImovelDaoMysql($pdo);
$enderecoDao = new EnderecoDaoMysql($pdo);
$usuarioDao = new UsuarioDaoMysql($pdo);

function function_alert($message)
{

    // Display the alert box 
    echo "<script>alert('$message');</script>";
}

if (!isset($_SESSION["token"])) {
    header("Location: home.php");
    exit;
}

$usuario = $usuarioDao->findByToken($_SESSION["token"]);

if ($usuario->getTipoUsuario() == "LOCATARIO") {

    header("Location: owner.php?id=1");
    exit;
}

if (isset($_GET['ids'])) {
    if ($_GET['ids'] == 1) {
        function_alert("Você tem reservas neste imóvel, não é possivel apaga-lo!");
    } else if ($_GET['ids'] == 2) {
        function_alert("Imóvel Removido com sucesso!");
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Meus Imóveis</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1" />
    <link rel="icon" type="image/png" href="<?= $base_url; ?>/assets/images/favicon.png" />
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/css/list_owner.css" />
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/pages/header_application.css" />
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/css/login.css" />
</head>

<body class="container-background2">
    <?php require_once __DIR__ . '/../assets/pages/header_application.php' ?>


    <div class="options">
        <div class="bottom">
            <a href="reservas.php">
                <p class="option-style"> Ver Agendas </p>
            </a>
        </div>

        <div class="bottom">
            <a href="register_home.php">
                <p class="option-style"> Cadastrar Imóveis </p>
            </a>
        </div>
    </div>

    <?php foreach ($imovelDao->findAllByCPFImoveis($usuario->getCPF()) as $imovel) : ?>
        <?php $endereco = $enderecoDao->findByNumeroSeqEnd($imovel['numero_seq_end']) ?>

        <div class="container-imovel">
            <div class="image">
            </div>

            <div class="city">
                <text class="text"> <?= $imovel['codigo_cidade']; ?> </text>
            </div>

            <div class="state">
                <text class="text"> <?= $imovel['uf']; ?> </text>
            </div>

            <div class="road">
                <text class="text"> <?= $endereco->getLogradouro() ?>, <?= $endereco->getNumero() ?></text>
            </div>

            <div class="price">
                <text class="text"> <?= $imovel['valor'] ?> </text>
            </div>

            <div class="options2">
                <form method="GET" action="imovel_edit.php">
                    <input class="bottom" type="hidden" name="id" value="<?= $imovel['codigo_imovel']; ?>">
                    <button class="bottom2">
                        <text class="color">Editar</text></button>
                </form>

                <div>
                    <form method="GET" action="<?= $base_url; ?>/pages/actions/imovel_remove.php">

                        <input class="bottom" type="hidden" name="ids" value="<?= $imovel['codigo_imovel']; ?>">
                        <button class="bottom2"> <text class="color">Remover</text></button></button>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</body>

</html>