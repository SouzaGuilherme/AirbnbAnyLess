<?php require 'pages/header.php'; ?>
<div class="container">
	<h1>Login</h1>
	<?php
	$usuarioDao = new UsuarioDaoMysql($pdo);

	if (isset($_POST['email'])) {
		if (!empty($_POST['email'])) {
			$email = addslashes($_POST['email']);
			$password = $_POST['password'];

			if ($usuarioDao->login($email, $password)) {
				?>
				<script type="text/javascript">
					window.location.href = "./";
				</script>
				<?php
			} else {
				?>
				<div class="alert alert-danger">
					Usuário e/ou Senha errados!
				</div>
				<?php
			}
		} else {
			?>
			<div class="alert alert-warning">
				Por favor, preencha com e-mail e senha!.
			</div>
			<?php
		}
	}
	?>
	<form method="POST">
		<div class="form-group">
			<label for="email">E-mail:</label>
			<input type="email" name="email" id="email" class="form-control" />
		</div>
		<div class="form-group">
			<label for="password">Senha:</label>
			<input type="password" name="password" id="password" class="form-control" />
		</div>
		<input type="submit" value="Fazer Login" class="btn btn-default" />
	</form>

</div>
<?php require 'pages/footer.php'; ?>