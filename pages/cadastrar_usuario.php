<?php

require_once __DIR__ . '/../config.php';

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Cadastrar Usuário</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1" />
    <link rel="icon" type="image/png" href="<?=$base_url;?>/assets/images/favicon.png"/>
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/css/login.css" />
    <link rel="stylesheet" href="<?= $base_url; ?>/../assets/pages/header_register.css" />

</head>

<body class="containers-main">

    <?php require_once __DIR__ . '/../assets/pages/header_register.php' ?>

    <div>
        <form method="POST" action="<?= $base_url; ?>/pages/actions/cadastrar_usuario_action.php">

            <input required placeholder="Nome" class="input" type="nome" name="nome" />
            <input required placeholder="Telefone" class="input" type="number" name="telefone" />
            <input required placeholder="CPF" class="input" type="number" name="cpf" />
            <input required placeholder="E-mail" class="input" type="email" name="email" />
            <label>
                Tipo de Usuário:
                <select class="input" name="tipo_usuario">
                    <option value="LOCATARIO">Locatário</option>
                    <option value="PROPRIETARIO">Proprietário</option>
                    <option value="AMBOS">Ambos</option>
                </select>
            </label>
            <input required placeholder="Logradouro" class="input" type="logradouro" name="logradouro" />
            <input required placeholder="Número do Endereço" class="input" type="numero" name="numero" />
            <input required placeholder="Complemento" class="input" type="complemento" name="complemento" />
            <input required placeholder="Bairro" class="input" type="bairro" name="bairro" />
            <input required placeholder="CEP" class="input" type="cep" name="cep" />

            <input required placeholder="Nome Cidade" class="input" type="cep" name="nome_cidade" />
            <input required placeholder="UF" class="input" type="cep" name="siglaUF" />

            <input required placeholder="Senha" class="input" type="password" name="password" />
            <input required placeholder="Confirmar Senha" class="input" type="password" name="password_again" />

            <input required class="button" type="submit" value="Cadastrar" />

        </form>

    </div>
</body>

</html>