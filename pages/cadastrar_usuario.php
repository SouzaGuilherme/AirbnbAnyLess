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
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/css/login.css" />
    
</head>

<body>
    <div class="containers-main">
            <form method="POST" action="<?= $base_url; ?>/pages/actions/cadastrar_usuario_action.php">

                <input required placeholder="Nome" class="input" type="nome" name="nome" />
                <input required placeholder="Telefone" class="input" type="telefone" name="telefone" />
                <input required placeholder="CPF" class="input" type="cpf" name="cpf" />
                <input required placeholder="E-mail" class="input" type="email" name="email" />
                <input required placeholder="Tipo do Usuário" class="input" type="tipo_usuario" name="tipo_usuario" />

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