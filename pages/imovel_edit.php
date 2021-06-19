<?php

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../dao/ImovelDaoMysql.php';
require_once __DIR__ . '/../dao/EnderecoDaoMysql.php';
require_once __DIR__ . '/../dao/UsuarioDaoMysql.php';
require_once __DIR__ . '/../dao/CidadeDaoMysql.php';

if(!isset($_SESSION["token"]))
{
header("Location: login.php");
exit;
}

$usuarioDao = new UsuarioDaoMysql($pdo);
$enderecoDao = new EnderecoDaoMysql($pdo);
$cidadeDao = new CidadeDaoMysql($pdo);
$imovelDao = new ImovelDaoMysql($pdo);

$usuario = $usuarioDao->findByToken($_SESSION["token"]);

$imovel = $imovelDao->findByCodigoImovel($_GET["id"]);
$cidade = $cidadeDao->findByCodigoCidade($imovel->getCodigoCidade());
$endereco = $enderecoDao->findByNumeroSeqEnd($imovel->getNumeroSeqEnd());


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Editar Imóvel</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="<?= $base_url; ?>/assets/images/favicon-32x32.png" />
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/pages/header_application.css" />
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/css/login.css" />
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/css/register_home.css" />
</head>

<body>

    <?php require_once __DIR__ . '/../assets/pages/header_application.php' ?>

    <!--div class="container-background"-->
    <section class="container-background">
        <form method="GET" action="<?= $base_url; ?>/pages/actions/imovel_edit_action.php">
            <input class="input" type="hidden" name="ids" value ="<?php echo $imovel->getCodigoImovel(); ?>">
            <div class="container-top-left">

                <div class="container-text">
                    <text>Gostariamos de alertar que para seu imóvel
                        se torne visivel para locação, você deve deixa-lo
                        HABILITADO. Caso seu imovel tenha a oção HABILITADO
                        DESMARCADO seu imóvel não será visivel por nosso usuarios.
                        </br></br> Deseja HABILITAR seu imóvel?
                    </text>
                    <select class="input" name="habilitado">
                        <option value="0">Não</option>
                        <option value="1">Sim</option>
                    </select>
                </div>
            </div>
            <div class="container-down-left">
                <div class="container-text">
                    <text>
                        Informe o valor deste imóvel
                    </text>
                    <div class="container-valor">

                        <input required class="input" type="valor" name="valor" value = "<?php echo $imovel->getValor(); ?>" />

                        <img src="/../assets/images/dinheiro.png" class="valor-image">
                    </div>
                </div>
            </div>
            <div class="container-right">

                <div class="container-descricao">
                    <input required placeholder="Descrição" class="input" type="descricao" name="descricao" value = "<?php echo $imovel->getDescricao(); ?>"/>
                </div>
                <div class="container-qtd_salas">
                    <text>Salas</text>
                    <input required class="input" type="qtd_salas" name="qtd_salas" value = "<?php echo $imovel->getQtdSalas(); ?>"/>
                </div>
                <div class="container-qtd_quartos">
                    <text>Quartos</text>
                    <input required class="input" type="qtd_quartos" name="qtd_quartos" value = "<?php echo $imovel->getQtdQuartos(); ?>"/>
                </div>
                <div class="container-qtd_banheiros">
                    <text>Banheiros</text>
                    <input required class="input" type="qtd_banheiros" name="qtd_banheiros" value = "<?php echo $imovel->getQtdBanheiros(); ?>"/>
                </div>
                <div class="container-qtd_vagas_garagem">
                    <text>Garagem</text>
                    <input required class="input" type="qtd_vagas_garagem" name="qtd_vagas_garagem" value = "<?php echo $imovel->getVagasGaragem(); ?>"/>
                </div>
                <div class="container-piscina">
                    <text>Piscina</text>

                    <select class="input" name="piscina">
                        <option value="0">Não</option>
                        <option value="1">Sim</option>
                    </select>
                </div>

            </div>
            <div class="container-middle">

                <text class="endereco-text">ENDEREÇO</text>
                <div class="container-cidade">
                    <input required placeholder="Cidade" class="input" type="cep" name="nome_cidade" value = "<?php echo $cidade->getNome(); ?>"/>
                </div>
                <div class="container-estado">
                    <input required placeholder="Estado" class="input" type="cep" name="uf"  value = "<?php echo $cidade->getUf(); ?>"/>
                </div>
                <div class="container-logradouro">
                    <input required placeholder="Logradouro" class="input" type="logradouro" name="logradouro" value = "<?php echo $endereco->getLogradouro(); ?>"/>
                </div>
                <div class="container-complemento">
                    <input required placeholder="Complemento" class="input" type="complemento" name="complemento" value = "<?php echo $endereco->getComplemento(); ?>"/>
                </div>
                <div class="container-numero">
                    <input required placeholder="Número" class="input" type="numero" name="numero" value = "<?php echo $endereco->getNumero(); ?>"/>
                </div>
                <div class="container-bairro">
                    <input required placeholder="Bairro" class="input" type="bairro" name="bairro" value = "<?php echo $endereco->getBairro(); ?>"/>
                </div>
                <div class="container-cep">
                    <input required placeholder="Cep" class="input" type="cep" name="cep" value = "<?php echo $endereco->getCep(); ?>"/>
                </div>
                <div class="container-addimage">
                    <input class="button" type="submit" value="Editar" />

                </div>

            </div>


        </form>

    </section>
</body>

</html>