<?php

require 'config.php';

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Cadastrar</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1"/>
    <link rel="stylesheet" href="<?=$base_url;?>/assets/css/login.css" />
</head>
<body>
    <header>
        <div class="container">
            <a href="<?=$base_url;?>"><img src="<?=$base_url;?>/assets/images/logo.png" /></a>
        </div>
    </header>
    <section class="container main">
        <form method="POST" action="<?=$base_url;?>/cadastrar_action.php">

        Usuário:
        <input placeholder="Nome" class="input" type="nome" name="nome" />
        <input placeholder="Telefone" class="input" type="telefone" name="telefone" />
        <input placeholder="CPF" class="input" type="cpf" name="cpf" />
        <input placeholder="E-mail" class="input" type="email" name="email" />
        <input placeholder="Tipo do Usuário" class="input" type="tipo_usuario" name="tipo_usuario" />
        
        Endereço:
        <input placeholder="logradouro" class="input" type="logradouro" name="logradouro" />
        <input placeholder="numero" class="input" type="numero" name="numero" />
        <input placeholder="complemento" class="input" type="complemento" name="complemento" />
        <input placeholder="bairro" class="input" type="bairro" name="bairro" />
        <input placeholder="cep" class="input" type="cep" name="cep" />
        
        

        <input placeholder="Nome Cidade" class="input" type="cep" name="nome_cidade" />
        <input placeholder="UF" class="input" type="cep" name="siglaUF" />

        
       


       
        <input placeholder="Senha" class="input" type="password" name="password" />
        <input placeholder="Confirmar Senha" class="input" type="password_again" name="password_again" />
        
        <input class="button" type="submit" value="Cadastrar" />

        </form>


        <form method="POST" action="<?=$base_url;?>/signup.php">

    </section>
</body>
</html>