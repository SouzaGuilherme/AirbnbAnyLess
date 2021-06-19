<?php
require 'config.php';
if(empty($_SESSION['cLogin'])) {
	header("Location: login.php");
	exit;
}

require 'dao/ImovelDaoMysql.php';
$imovelDaoMysql = new ImovelDaoMysql($pdo);

if(isset($_GET['codigo_imovel']) && !empty($_GET['codigo_imovel'])) {
	$imovelDaoMysql->deleteImovel($_GET['codigo_imovel']);
}

header("Location: meus_imoveis.php");