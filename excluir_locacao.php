<?php
require 'config.php';
if(empty($_SESSION['cLogin'])) {
	header("Location: login.php");
	exit;
}

require 'dao/ReservaDaoMysql.php';
$reservaDaoMysql = new ReservaDaoMysql($pdo);


print_r($_GET);
if(isset($_GET['codigo_imovel']) && !empty($_GET['codigo_imovel']) && isset($_GET['cpf']) && !empty($_GET['cpf'] && isset($_GET['data_inicial']) && !empty($_GET['data_inicial']))) {
	
	$reservaDaoMysql->removeLocacao($_GET['codigo_imovel'], $_GET['cpf'], $_GET['data_inicial']);
}
header("Location: minhas_locacoes.php");
		

