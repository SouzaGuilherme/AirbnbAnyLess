
<?php
require 'config.php';
require 'models/Auth.php';

$auth = new Auth($pdo, $base_url);

$userInfo = $auth->checkToken();

echo 'Index';

