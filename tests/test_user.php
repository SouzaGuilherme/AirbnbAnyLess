<?php
define('ROOT_PATH', dirname(__FILE__));

require '../config.php';

require ROOT_PATH . '/../dao/UserDaoMysql.php';
#require '../models/User.php';

$user1 = new User(
    '1111111',
    '11',
    '11',
    'RS',
    'Thiago',
    'thiagoheronavila@gmail.com',
    '53999589276',
    'path_foto.png',
    'AMBOS',
    '1234',
    'tokenHash',
);

echo($user1->getNome());


$userDaoMysql = new UserDaoMysql($pdo);
#$userDaoMysql->add($user1);

$userDaoMysql->remove($user1);