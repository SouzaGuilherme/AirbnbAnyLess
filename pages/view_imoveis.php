<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../dao/ImovelDaoMysql.php';

$imovelDao = new ImovelDaoMysql($pdo);

?>
<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>AirbnbAnyLess - Imóveis</title>
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="../assets/css/view_imoveis.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/navbar.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/select_boxes.css">
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script type='text/javascript' src='../assets/js/navbar.js'></script>
    <style>

    </style>
</head>

<body oncontextmenu='return false' class='snippet-body'>



    <nav class="full">
        <a onClick="ul(0)">Visualizar Todos Imóveis</a><a onClick="ul(1)"></a><a onClick="ul(2)"></a><a onClick="ul(3)">Imóveis</a><a onClick="ul(4)">Perfil</a>
    </nav>



    <div class="container">
        <div class="control-group">
            <h1>Checkboxes</h1>
            <label class="control control--checkbox">First checkbox
                <input type="checkbox" checked="checked" />
                <div class="control__indicator"></div>
            </label>
            <label class="control control--checkbox">Second checkbox
                <input type="checkbox" />
                <div class="control__indicator"></div>
            </label>
            <label class="control control--checkbox">Disabled
                <input type="checkbox" disabled="disabled" />
                <div class="control__indicator"></div>
            </label>
            <label class="control control--checkbox">Disabled & checked
                <input type="checkbox" disabled="disabled" checked="checked" />
                <div class="control__indicator"></div>
            </label>
        </div>
        <div class="control-group">
            <h1>Radio buttons</h1>
            <label class="control control--radio">First radio
                <input type="radio" name="radio" checked="checked" />
                <div class="control__indicator"></div>
            </label>
            <label class="control control--radio">Second radio
                <input type="radio" name="radio" />
                <div class="control__indicator"></div>
            </label>
            <label class="control control--radio">Disabled
                <input type="radio" name="radio2" disabled="disabled" />
                <div class="control__indicator"></div>
            </label>
            <label class="control control--radio">Disabled & checked
                <input type="radio" name="radio2" disabled="disabled" checked="checked" />
                <div class="control__indicator"></div>
            </label>
        </div>
        <div class="control-group">
            <h1>Select boxes</h1>
            <div class="select">
                <select>
                    <option>First select</option>
                    <option>Option</option>
                    <option>Option</option>
                </select>
                <div class="select__arrow"></div>
            </div>
            <div class="select">
                <select>
                    <option>Second select</option>
                    <option>Option</option>
                    <option>Option</option>
                </select>
                <div class="select__arrow"></div>
            </div>
            <div class="select">
                <select disabled="disabled">
                    <option>Disabled</option>
                    <option>Option</option>
                    <option>Option</option>
                </select>
                <div class="select__arrow"></div>
            </div>
        </div>
    </div>







    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-10">

                <?php foreach ($imovelDao->findAllImoveisWithCity() as $imovel) : ?>

                    <br />

                    <div class="row p-2 bg-white border rounded">
                        <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image" src="https://i.imgur.com/QpjAiHq.jpg"></div>
                        <div class="col-md-6 mt-1">
                            <h5><?= $imovel['uf']; ?> / <?= $imovel['nome']; ?> </h5>
                            <div class="d-flex flex-row">
                                <div class="ratings mr-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div><span>310</span>
                            </div>
                            <div class="mt-1 mb-1 spec-1"><span>Qtd. de Salas: <?= $imovel['qtd_salas']; ?></span></div>
                            <div class="mt-1 mb-1 spec-1"><span>Qtd. de Quartos: <?= $imovel['qtd_quartos']; ?></span></div>
                            <div class="mt-1 mb-1 spec-1"><span>Qtd. de Banheiros: <?= $imovel['qtd_banheiros']; ?></span></div>
                            <div class="mt-1 mb-1 spec-1"><span>Vagas Garagem: <?= $imovel['vagas_garagem']; ?></span></div>
                            <div class="mt-1 mb-1 spec-1"><span>Tem Piscina: <?= $imovel['piscina']; ?></span></div>
                            <p class="text-justify text-truncate para mb-0"><?= $imovel['descricao']; ?> <br /><br><br></p>
                        </div>
                        <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                            <div class="d-flex flex-row align-items-center">
                                <h4 class="mr-1">R$ <?= $imovel['valor']; ?></h4><span class="strike-text">R$ Valor: <?= $imovel['valor'] + 50; ?> <br /></span>
                            </div>

                            <?php if ($imovel['habilitado']) : ?>

                                <h6 class="text-success">Disponível</h6>
                            <?php else : ?>
                                <h6 class="strike-text">Indisponível</h6>

                            <?php endif ?>
                            <div class="d-flex flex-column mt-4"><button class="btn btn-primary btn-sm" type="button">Details</button><button class="btn btn-outline-primary btn-sm mt-2" type="button">Add to wishlist</button></div>
                        </div>
                    </div>



                <?php endforeach; ?>



            </div>
        </div>
    </div>
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js'></script>
    <script type='text/javascript'></script>
</body>

</html>