<?php
require_once __DIR__ . '/../config.php';

if(!isset($_SESSION["token"]))
{
header("Location: login.php");
exit;
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Cadastrar Imóvel</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1"/>
    <link rel="icon" type="image/png" href="<?=$base_url;?>/assets/images/favicon-32x32.png"/>
    <link rel="stylesheet" href="<?=$base_url;?>/assets/css/login.css" />
    <link rel="stylesheet" href="<?=$base_url;?>/assets/css/cadastrar_imovel.css" />
</head>
<body>
    <header>
        <div class="container">
            <a href="<?=$base_url;?>"><img src="<?=$base_url;?>/assets/images/logo.png" /></a>
        </div>
    </header>
    <section class="container main">
        <form method="POST" action="<?=$base_url;?>/pages/actions/cadastrar_imovel_action.php">

        Endereço:
        <input required placeholder="logradouro" class="input" type="logradouro" name="logradouro" />
        <input required placeholder="numero" class="input" type="numero" name="numero" />
        <input required placeholder="complemento" class="input" type="complemento" name="complemento" />
        <input required placeholder="bairro" class="input" type="bairro" name="bairro" />
        <input required placeholder="cep" class="input" type="cep" name="cep" />

        <br/>
        Cidade: 
        <input required placeholder="Nome Cidade" class="input" type="cep" name="nome_cidade" />
        <input required placeholder="Estado" class="input" type="cep" name="uf" />

        Imóvel:
        <input required placeholder="Descrição" class="input" type="descricao" name="descricao" />
        <input required placeholder="Quantidade de Quartos" class="input" type="qtd_quartos" name="qtd_quartos" />
        <input required placeholder="Quantidade de Banheiros" class="input" type="qtd_banheiros" name="qtd_banheiros" />
        <input required placeholder="Vagas Garagem" class="input" type="qtd_vagas_garagem" name="qtd_vagas_garagem" />
        <input required placeholder="Quantidade de Salas" class="input" type="qtd_salas" name="qtd_salas" />
        <input required placeholder="Piscina (1 ou 0)" class="input" type="piscina" name="piscina" />
        <input required placeholder="Valor" class="input" type="valor" name="valor" />
        <input required placeholder="habilitado (1 ou 0)" class="input" type="habilitado" name="habilitado" />


        <input class="button" type="submit" value="Registrar Imóvel" />
        </form>



    </section>
</body>
</html>