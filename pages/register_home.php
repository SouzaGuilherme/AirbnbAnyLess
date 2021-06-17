<?php

require_once __DIR__ . '/../config.php';

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Cadastrar Usuário</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="<?= $base_url; ?>/assets/images/favicon-32x32.png" />
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/pages/header_application.css" />
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/pages/home/home.css" />
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/css/login.css" />
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/css/register_home.css" />
</head>

<body>

    <?php require_once __DIR__ . '/../assets/pages/header_application.php' ?>

    <div class="container-background">

        <div class="container-top-left">
            <div class="container-text">
                <text>Gostariamos de alertar que para seu imóvel
                    se torne visivel para locação, você deve deixa-lo
                    HABILITADO. Caso seu imovel tenha a oção HABILITADO
                    DESMARCADO seu imóvel não será visivel por nosso usuarios.
                    </br></br> Deseja HABILITAR seu imóvel?
                </text>
                <input required class="input" type="checkbox" name="habilitado" />
            </div>
            <div class="container-bottons">

            </div>
        </div>

        <div class="container-middle">
            <text class="endereco-text">ENDEREÇO</text>
            <div class="container-cidade">
                <input required placeholder="Cidade" class="input" type="cep" name="cidade" />
            </div>
            <div class="container-estado">
                <input required placeholder="Estado" class="input" type="cep" name="estado" />
            </div>
            <div class="container-logradouro">
                <input required placeholder="Logradouro" class="input" type="logradouro" name="logradouro" />
            </div>
            <div class="container-complemento">
                <input required placeholder="Complemento" class="input" type="complemento" name="complemento" />
            </div>
            <div class="container-numero">
                <input required placeholder="Número" class="input" type="numero" name="numero" />
            </div>
            <div class="container-bairro">
                <input required placeholder="Bairro" class="input" type="bairro" name="bairro" />
            </div>
            <div class="container-cep">
                <input required placeholder="Cep" class="input" type="cep" name="cep" />
            </div>
            <div class="container-addimage">
            <form class="container-add" method="POST" action="<?= $base_url; ?>/pages/adicionar_imagem.php">
                <input class="button" type="submit" value="Adicionar Imagens" />
            </form>
            </div>
        </div>

        <div class="container-down-left">
            <div class="container-text">
                <text>
                    Informe o valor deste imóvel
                </text>
                <div class="container-valor">
                    <input required class="input" type="valor" name="valor" />
                    <img src="/../assets/images/dinheiro.png" class="valor-image">
                </div>
            </div>
        </div>
        <div class="container-right">
            <div class="container-descricao">
                <input required placeholder="Descrição" class="input" type="descricao" name="descricao" />
            </div>
            <div class="container-qtd_salas">
                <text>Salas</text>
                <input required class="input" type="qtd_salas" name="qtd_salas" />
            </div>
            <div class="container-qtd_quartos">
                <text>Quartos</text>
                <input required class="input" type="qtd_quartos" name="qtd_quartos" />
            </div>
            <div class="container-qtd_banheiros">
                <text>Banheiros</text>
                <input required class="input" type="qtd_banheiros" name="qtd_banheiros" />
            </div>
            <div class="container-qtd_vagas_garagem">
                <text>Garagem</text>
                <input required class="input" type="qtd_vagas_garagem" name="qtd_vagas_garagem" />
            </div>
            <div class="container-piscina">
                <text>Piscina</text>
                <input required class="input" type="checkbox" name="piscina" />
            </div>
        </div>


    </div>
</body>

</html>