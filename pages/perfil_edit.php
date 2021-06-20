<?php

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../dao/UsuarioDaoMysql.php';
require_once __DIR__ . '/../dao/EnderecoDaoMysql.php';
require_once __DIR__ . '/../dao/CidadeDaoMysql.php';

$usuarioDao = new UsuarioDaoMysql($pdo);
$enderecoDao = new EnderecoDaoMysql($pdo);
$cidadeDao = new CidadeDaoMysql($pdo);

$usuario = $usuarioDao->findByToken($_SESSION["token"]);
$endereco = $enderecoDao->findByNumeroSeqEnd($usuario->getNumeroSeqEnd());
$cidade = $cidadeDao->findByCodigoCidade($endereco->getCodigoCidade());


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Editar Usuário</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1" />
    <link rel="icon" type="image/png" href="<?=$base_url;?>/assets/images/favicon.png"/>
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/css/login.css" />
    <link rel="stylesheet" href="<?= $base_url; ?>/../assets/pages/header_register.css" />

</head>

<body class="containers-main">

    <?php require_once __DIR__ . '/../assets/pages/header_register.php' ?>

    <div>
        <form method="POST" action="<?= $base_url; ?>/pages/actions/perfil_edit_action.php">

            <input required placeholder="Nome" class="input" type="nome" name="nome" value = "<?php echo $usuario->getNome(); ?>"/> 
            <input required placeholder="Telefone" class="input" type="number" name="telefone" value = "<?php echo $usuario->getTelefone(); ?>"/>
            <input required placeholder="CPF" class="input" type="number" name="cpf" value = "<?php echo $usuario->getCPF(); ?>"/>
            <input required placeholder="E-mail" class="input" type="email" name="email" value = "<?php echo $usuario->getEmail(); ?>"/>
            <label>
                Tipo de Usuário:
                <select class="input" name="tipo_usuario" >
                    <option value="LOCATARIO">Locatário</option>
                    <option value="PROPRIETARIO">Proprietário</option>
                    <option value="AMBOS">Ambos</option>
                </select>
            </label>
            <input required placeholder="Logradouro" class="input" type="logradouro" name="logradouro" value = "<?php echo $endereco->getLogradouro(); ?>"/>
            <input required placeholder="Número do Endereço" class="input" type="numero" name="numero" value = "<?php echo $endereco->getNumero(); ?>"/>
            <input required placeholder="Complemento" class="input" type="complemento" name="complemento" value = "<?php echo $endereco->getComplemento(); ?>"/>
            <input required placeholder="Bairro" class="input" type="bairro" name="bairro" value = "<?php echo $endereco->getBairro(); ?>" />
            <input required placeholder="CEP" class="input" type="cep" name="cep" value = "<?php echo $endereco->getCEP(); ?>"/>

            <input required placeholder="Nome Cidade" class="input" type="cep" name="nome_cidade" value = "<?php echo $cidade->getNome(); ?>" />
            <input required placeholder="UF" class="input" type="cep" name="siglaUF" value = "<?php echo $endereco->getUf(); ?>" />

            <input required class="button" type="submit" value="Editar" />

        </form>

    </div>
</body>

</html>