<?php
require_once __DIR__ . '/../config.php'; 

require_once __DIR__ . '/../dao/CidadeDaoMysql.php';
require_once __DIR__ . '/../dao/EnderecoDaoMysql.php';
require_once __DIR__ . '/../dao/ImovelDaoMysql.php';
require_once __DIR__ . '/../dao/UsuarioDaoMysql.php';
require_once __DIR__ . '/../dao/ReservaDaoMysql.php';

$input_city = filter_input(INPUT_POST, "city");
$input_country = filter_input(INPUT_POST, "country");
$input_start_date = filter_input(INPUT_POST, "start-date");
$input_end_date = filter_input(INPUT_POST, "end-date");
$input_people = filter_input(INPUT_POST, "people");
$input_price = filter_input(INPUT_POST, "price");

# Dao
$cidadeDao = new CidadeDaoMysql($pdo);
$enderecoDao = new EnderecoDaoMysql($pdo);
$imovelDao = new ImovelDaoMysql($pdo);
$usuarioDao = new UsuarioDaoMysql($pdo);
$reservaDao = new ReservaDaoMysql($pdo);

$cidade = $cidadeDao->findByCity($input_country, $input_city);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Meus Imóveis</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1"/>
    <link rel="icon" type="image/png" href="<?=$base_url;?>/assets/images/favicon.png"/>
    <link rel="stylesheet" href="<?=$base_url;?>/assets/css/view_list.css"/>
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/pages/header_application.css"/>
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/css/login.css"/>
</head>

<body class="bg">

    <?php require_once __DIR__ . '/../assets/pages/header_application.php'?>

        <div class="options-component">
            <form method="POST" action="<?= $base_url; ?>/pages/view_list.php">
                <input type="text" class="city" placeholder="Cidade" name="city" >
                <input type="text" class="country" placeholder="Estado" name="country">
                <input type="date" class="start-date" placeholder="Check-in" name="start-date">
                <input type="date" class="end-date" placeholder="Check-out" name="end-date">
                <input type="text" class="people" placeholder="Nº de Quartos" name="people">
                <input type="text" class="price" placeholder="Preço" name="price">
                <input required class="find" type="submit" value="Procurar" />
            </form>
        </div>

        <?php foreach($imovelDao->findAllByAll($cidade->getCodigoCidade(), $input_country, $input_start_date, $input_end_date, $input_people, $input_price) as $imovel): ?>
            <?php if($imovel['habilitado']): ?>
                <?php 
                    #echo($input_end_date);
                    $show = 1;
                    $reserva1 = $reservaDao->findByCodigoImovel($imovel['codigo_imovel']);
                    #echo($reserva1->getDataFinal());
                    if($reserva1 != null){
                        #echo("ASDDASASDSDAASDASSADDSASASDSD");
                        foreach($reservaDao->findAllByCodigoImovel($imovel['codigo_imovel']) as $reserva){
                            #echo("BBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBB");
                            if(($input_start_date < $reserva['data_final'] && $input_start_date > $reserva['data_inicial']) || ($input_end_date < $reserva['data_final'] && $input_end_date > $reserva['data_inicial'])){
                                $show = 0;
                            }
                        }
                    }
                ?>
                <?php if ($show == 1): ?>
                    <?php $endereco = $enderecoDao->findByNumeroSeqEnd($imovel['numero_seq_end']);?>
                    <div class="container-imovel">

                        <div class="image">
                        </div>

                        <div class="city2">
                            <text class="text2"> <?= $input_city; ?> </text>
                        </div>

                        <div class="state">
                            <text class="text2"> <?= $input_country; ?> </text>
                        </div>

                        <div class="road">
                            <text class="text2"> <?= $endereco->getLogradouro() ?>, <?= $endereco->getNumero() ?></text>
                        </div>

                        <div class="price2">
                            <text class="text2"> <?= $imovel['valor'] ?> </text>
                        </div>


                        <div class="bottom">
                            <a href="um_imovel.php">
                                <p class="option-style"> Ver Imóvel </p>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        <?php endforeach; ?>
</body>
</html>