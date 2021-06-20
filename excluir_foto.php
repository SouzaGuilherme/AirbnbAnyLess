<?php
require 'config.php';
if(empty($_SESSION['cLogin'])) {
	header("Location: login.php");
	exit;
}

require 'dao/ImovelDaoMysql.php';
$imovelDaoMysql = new ImovelDaoMysql($pdo);


print_r($_GET);
if(isset($_GET['codigo_imovel']) && !empty($_GET['codigo_imovel']) && isset($_GET['url']) && !empty($_GET['url'])) {
	
	$imovelDaoMysql->removeFotoImovel($_GET['codigo_imovel'], $_GET['url']);
}
header("Location: editar_imovel.php?codigo_imovel=".$_GET['codigo_imovel']);
		

