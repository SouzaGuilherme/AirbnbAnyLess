<?php

require_once __DIR__ . '/../config.php';

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Cadastrar Usuário</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1" />
    <link rel="icon" type="image/png" href="<?= $base_url; ?>/assets/images/favicon-32x32.png" />
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/css/register_home.css" />
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/pages/header_application.css" />
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/pages/home/home.css" />
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/css/login.css" />

</head>

<body>

    <?php require_once __DIR__ . '/../assets/pages/header_application.php' ?>

    <div class="">

        <div class="container-top-left">
            <div class="container-text">
                <text>Gostariamos de alertar que para seu imóvel
                    se torne visivel para locação, você deve deixa-lo
                    HABILITADO. Caso seu imovel tenha a oção HABILITADO
                    DESMARCADO seu imóvel não será visivel por nosso usuarios.
                    </br></br> Deseja HABILITAR seu imóvel?
                </text>
            </div>
            <div class="container-bottons">

            </div>
        </div>

        <div class="container-top-right">
            <div class="container-description">
                <input required class="input" type="cep" name="nome_cidade" />
                <img src="/../assets/images/cidade.png" class="cidade-image">
            </div>
        </div>

        <div class="container-down-left">
            <div class="container-text">
                <text>
                    Informe o númaro maximo de pessoas que você
                    gostaria que frequentase seu imóvel:
                </text>
            </div>
        </div>
        <div class="container-down-right">

        </div>


    </div>
</body>

</html>