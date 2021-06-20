<?php
require 'config.php';
if(empty($_SESSION['cLogin'])) {
	header("Location: login.php");
	exit;
}

require 'dao/ReservaDaoMysql.php';
$reservaDaoMysql = new ReservaDaoMysql($pdo);




if(isset($_GET['codigo_imovel']) && !empty($_GET['codigo_imovel']) && isset($_GET['cpf']) && !empty($_GET['cpf'] && isset($_GET['data_inicial']) && !empty($_GET['data_inicial']))) {


	$date1 = strtotime("NOW"); 
	$date2 = strtotime($_GET['data_inicial']); 
	$diff = abs($date2 - $date1); 
	$years = floor($diff / (365*60*60*24)); 
	$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
	$days = floor(($diff - $years * 365*60*60*24 -  $months*30*60*60*24)/ (60*60*24));
	if ($days >= 3) {
		$reservaDaoMysql->removeLocacao($_GET['codigo_imovel'], $_GET['cpf'], $_GET['data_inicial']);
		header("Location: minhas_reservas.php");
	} else {
		?>
		<html>

		<head>
			<title>AirbnbAnyLess</title>
			<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
			<link rel="stylesheet" href="assets/css/style.css" />
			<script type="text/javascript" src="assets/js/jquery.min.js"></script>
			<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
			<script type="text/javascript" src="assets/js/script.js"></script>
		</head>


		<?php
		require 'dao/UsuarioDaoMysql.php';
		$usuarioDaoMysql = new UsuarioDaoMysql($pdo);
		if (isset($_SESSION['cLogin']) && !empty($_SESSION['cLogin'])) {
			$usuario = $usuarioDaoMysql->findByCpf($_SESSION['cLogin']);
			$nome_usuario =  " - Olá, ".$usuario->getNome();
		} else {
			$nome_usuario = "";
		}

		?>

		<body>
			<nav class="navbar navbar-inverse">
				<div class="container-fluid">
					<div class="navbar-header">
						<a href="./" class="navbar-brand">AirbnbAnyLess <?php echo $nome_usuario ?></a>
					</div>
					<ul class="nav navbar-nav navbar-right">
						<?php if (isset($_SESSION['cLogin']) && !empty($_SESSION['cLogin'] && $usuario)) : ?>
							
							<?php if ($usuario->getTipoUsuario() == "AMBOS") : ?>
								<li><a href="minhas_reservas.php">Minhas Reservas</a></li>
								<li><a href="meus_imoveis.php">Meus Imóveis</a></li>

							<?php elseif  ($usuario->getTipoUsuario() == "LOCATARIO"): ?>
								<li><a href="minhas_reservas.php">Minhas Reservas</a></li>

							<?php elseif  ($usuario->getTipoUsuario() == "PROPRIETARIO"): ?>
								<li><a href="meus_imoveis.php">Meus Imóveis</a></li>

							<?php endif; ?>
							<li > <a href="sair.php">Sair</a></li>


						<?php else : ?>
							<li><a href="login.php">Login</a></li>
							<li><a href="cadastrar_usuario.php">Cadastre-se</a></li>
						<?php endif; ?>
					</ul>
				</div>
			</nav>

			<div class="row">

			<div class="col-sm-3"></div>
			<div class="col-sm-6">
				
				<div class="alert alert-danger">
					Este imóvel não pode ser desalocado, no mínimo é necessário realizar o aviso com 3 dias de antecedência.

				</div>
				<a href="minhas_reservas.php" class="btn btn-lg btn-primary">Voltar</a>
			</div>		
			<div class="col-sm-3"></div>					


	
		<?php
	}


}

