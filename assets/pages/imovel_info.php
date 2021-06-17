<?php 

require_once __DIR__ . '/../../config.php'; 
require_once __DIR__ . '/../../dao/ImovelDaoMysql.php';
require_once __DIR__ . '/../../dao/EnderecoDaoMysql.php';
$imovelDao = new ImovelDaoMysql($pdo);
$enderecoDao = new EnderecoDaoMysql($pdo);

?>

<!DOCTYPE html>
<html>

<body>
    <?php $imovel = $imovelDao->findByCodigoImovel(1) ?>
    <?php $endereco = $enderecoDao->findByNumeroSeqEnd(2) ?>
    <div class="container">
        <div class="image">
        </div>

        <div class = "city">
            <text class="text"> <?= $imovel->getCodigoCidade() ?> </text>
        </div>

        <div class = "state">
            <text class="text"> <?= $imovel->getUf() ?> </text>
        </div>
            
        <div class = "road">
            <text class="text"> <?= $endereco->getLogradouro() ?>, <?= $endereco->getNumero() ?></text>
        </div>

        <div class = "price">
            <text class="text"> <?= $imovel->getValor() ?> </text>
        </div>
            <input class="calendary">
        </div>   
    </div>
</body>

</html>