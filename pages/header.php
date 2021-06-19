<?php require 'config.php'; ?>
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
						<li><a href="minhas_locacoes.php">Minhas Locações</a></li>
						<li><a href="meus_imoveis.php">Meus Imóveis</a></li>

					<?php elseif  ($usuario->getTipoUsuario() == "LOCATARIO"): ?>
						<li><a href="minhas_locacoes.php">Minhas Locações</a></li>

					<?php elseif  ($usuario->getTipoUsuario() == "PROPRIETARIO"): ?>
						<li><a href="meus_imoveis.php">Meus Imóveis</a></li>

					<?php endif; ?>
					<li > <a href="perfil.php">Perfil</a></li>
					<li > <a href="sair.php">Sair</a></li>


				<?php else : ?>
					<li><a href="login.php">Login</a></li>
					<li><a href="cadastrar_usuario.php">Cadastre-se</a></li>
				<?php endif; ?>
			</ul>
		</div>
	</nav>
