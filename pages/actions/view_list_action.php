<?php

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../models/Auth.php';
require_once __DIR__ . '/../../models/Estado.php';

require_once __DIR__ . '/../../dao/CidadeDaoMysql.php';
require_once __DIR__ . '/../../dao/EnderecoDaoMysql.php';
require_once __DIR__ . '/../../dao/ImovelDaoMysql.php';
require_once __DIR__ . '/../../dao/UsuarioDaoMysql.php';
require_once __DIR__ . '/../../dao/ReservaDaoMysql.php';

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
echo($input_country);
?> 

<?php foreach($imovelDao->findAllByAll($cidade->getCodigoCidade(), $input_country, $input_start_date, $input_end_date, $input_people, $input_price) as $imovel): ?>
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
    
<?php endforeach; ?>