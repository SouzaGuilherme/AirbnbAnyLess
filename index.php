
<?php
require 'config.php';
require 'models/Auth.php';

define('ROOT_PATH', dirname(__FILE__));

$auth = new Auth($pdo, $base_url);

$userInfo = $auth->checkToken();

echo('Index');