<?php

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../models/Auth.php';
require_once __DIR__ . '/../../models/Estado.php';

require_once __DIR__ . '/../../dao/CidadeDaoMysql.php';
require_once __DIR__ . '/../../dao/EnderecoDaoMysql.php';
require_once __DIR__ . '/../../dao/ImovelDaoMysql.php';
require_once __DIR__ . '/../../dao/UsuarioDaoMysql.php';
require_once __DIR__ . '/../../dao/ReservaDaoMysql.php';

$input_city = filter_input(INPUT_POST, "city", FILTER_VALIDATE_EMAIL);
$input_country = filter_input(INPUT_POST, "country");
$input_start_date = filter_input(INPUT_POST, "start-date");
$input_end_date = filter_input(INPUT_POST, "end-date");
$input_people = filter_input(INPUT_POST, "people");
$input_price = filter_input(INPUT_POST, "price");
$input_find = filter_input(INPUT_POST, "find");

# Dao
$cidadeDao = new CidadeDaoMysql($pdo);
$enderecoDao = new EnderecoDaoMysql($pdo);
$imovelDao = new ImovelDaoMysql($pdo);
$usuarioDao = new UsuarioDaoMysql($pdo);
$reservaDao = new ReservaDaoMysql($pdo);

?> 

<?php foreach($imovelDao->findByPeople($input_people) as $imovel): ?>
    
<?php endforeach; ?>