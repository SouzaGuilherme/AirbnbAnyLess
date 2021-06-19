<?php
    require_once __DIR__ . '/../config.php';
    require_once __DIR__ . '/../dao/ImovelDaoMysql.php';

    $imovelDao = new ImovelDaoMysql($pdo);

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>HOME</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1"/>
    <link rel="icon" type="image/png" href="<?=$base_url;?>/assets/images/favicon.png"/>
    <link rel="stylesheet" href="<?=$base_url;?>/assets/css/login.css" />
</head>
<body>
    <header>
        <div class="container">
            <a href="<?=$base_url;?>"><img src="<?=$base_url;?>/assets/images/logo.png" /></a>
        </div>
    </header>

    <?php foreach($imovelDao->findAllImoveis() as $imovel): ?>
        
        Código do Imóvel: <?= $imovel['codigo_imovel']; ?> <br/>
        Descrição: <?= $imovel['descricao']; ?> <br/>
        Código da Cidade: <?= $imovel['codigo_cidade']; ?> <br/>
        UF: <?= $imovel['uf']; ?> <br/> 
        Descrição: <?= $imovel['descricao']; ?> <br/>
        Quantidade de Quartos: <?= $imovel['qtd_quartos']; ?> <br/>
        Quantidade de Banheiros: <?= $imovel['qtd_banheiros']; ?> <br/>
        Quantidade de Salas: <?= $imovel['qtd_salas']; ?> <br/>
        Tem Piscina? <?= $imovel['piscina']; ?> <br/>
        Vagas Garagem: <?= $imovel['vagas_garagem']; ?> <br/>
        Valor: <?= $imovel['valor']; ?> <br/>


        -----------------------------------------------------------
    <?php endforeach; ?>



</body>
</html>