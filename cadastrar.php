<?php require 'pages/header.php'; ?>


<div class="container">
	<h1>Cadastre-se</h1>

	<?php

	require 'models/Estado.php';
	require 'dao/UsuarioDaoMysql.php';
	require 'dao/CidadeDaoMysql.php';
	require 'dao/EnderecoDaoMysql.php';

	$usuarioDao = new UsuarioDaoMysql($pdo);
	$cidadeDAO = new CidadeDaoMysql($pdo);
	$enderecoDao = new EnderecoDaoMysql($pdo);


	if (
		isset($_POST['nome']) && !empty($_POST['nome'])
		&& 	isset($_POST['cpf']) && !empty($_POST['cpf'])
		&& 	isset($_POST['email']) && !empty($_POST['email'])
		&& 	isset($_POST['password']) && !empty($_POST['password'])
		&& 	isset($_POST['password_again']) && !empty($_POST['password_again'])
		&& 	isset($_POST['logradouro']) && !empty($_POST['logradouro'])
		&& 	isset($_POST['numero']) && !empty($_POST['numero'])
		&& 	isset($_POST['complemento']) && !empty($_POST['complemento'])
		&& 	isset($_POST['nome_cidade']) && !empty($_POST['nome_cidade'])
		&& 	isset($_POST['uf']) && !empty($_POST['uf'])
		&& 	isset($_POST['cep']) && !empty($_POST['cep'])
		&& 	isset($_POST['telefone']) && !empty($_POST['telefone'])
		&& 	isset($_POST['tipo_usuario']) && !empty($_POST['tipo_usuario'])
	) {
		$cpf = addslashes($_POST['cpf']);
		$nome = addslashes($_POST['nome']);
		$email = addslashes($_POST['email']);
		$password = $_POST['password'];
		$password_again = $_POST['password_again'];
		$logradouro = addslashes($_POST['logradouro']);
		$numero = addslashes($_POST['numero']);
		$complemento = addslashes($_POST['complemento']);
		$nome_cidade = addslashes($_POST['nome_cidade']);
		$uf = addslashes($_POST['uf']);
		$cep = addslashes($_POST['cep']);
		$bairro = addslashes($_POST['bairro']);
		$telefone = addslashes($_POST['telefone']);
		$tipo_usuario = addslashes($_POST['tipo_usuario']);

		if ($password == $password_again) {

			$cidade = $cidadeDAO->findByCity($uf, $nome_cidade);

			if ($cidade) {
				$endereco = $enderecoDao->findEndereco($cidade->getCodigoCidade(), $cidade->getUf(), $numero, $cep);

				if (!$endereco) {
					$endereco = new Endereco(
						$cidade->getCodigoCidade(),
						$cidade->getUf(),
						$logradouro,
						$numero,
						$complemento,
						$bairro,
						$cep,
					);
					$enderecoDao->add($endereco);
				};
				if ($endereco) {
					$endereco = $enderecoDao->findEndereco($cidade->getCodigoCidade(), $cidade->getUf(), $numero, $cep);

					$usuario = new Usuario(
						$cpf,
						$endereco->getNumeroSeqEnd(),
						$cidade->getCodigoCidade(),
						$cidade->getUf(),
						$nome,
						$email,
						$telefone,
						"FOTO",
						$tipo_usuario,
						$password,
						"token",
					);
					if ($usuarioDao->add($usuario)){
						?>
						<div class="alert alert-success">
							<strong>Parabéns!</strong> Cadastrado com sucesso. <a href="login.php" class="alert-link">Faça o login agora</a>
						</div>
						<?php
					} else {
						?>
						<div class="alert alert-warning">
							Este usuário já existe! <a href="login.php" class="alert-link">Faça o login agora</a>
						</div>
						<?php
					}
				}
			}
		} else {
			?>
			<div class="alert alert-warning">
				As senhas não são iguais, preencha corretamente.
			</div>
			<?php
		}
	} else {
		?>
		<div class="alert alert-danger">
			É necessário preencher todos os campos. Tente novamente!
		</div>
		<?php
	}

	?>




	<form method="POST">
		<div class="form-group">
			<label for="cpf">CPF:</label>
			<input type="text" name="cpf" id="cpf" class="form-control" />
		</div>
		<div class="form-group">
			<label for="nome">Nome:</label>
			<input type="text" name="nome" id="nome" class="form-control" />
		</div>
		<div class="form-group">
			<label for="email">E-mail:</label>
			<input type="email" name="email" id="email" class="form-control" />
		</div>
		<div class="form-group">
			<label for="password">Senha:</label>
			<input type="password" name="password" id="password" class="form-control" />
		</div>
		<div class="form-group">
			<label for="password_again">Confirmar Senha:</label>
			<input type="password_again" name="password_again" id="password_again" class="form-control" />
		</div>
		<div class="form-group">
			<label for="uf">Estado:</label>
			<input type="text" name="uf" id="uf" class="form-control" />
		</div>
		<div class="form-group">
			<label for="nome_cidade">Cidade:</label>
			<input type="text" name="nome_cidade" id="nome_cidade" class="form-control" />
		</div>
		<div class="form-group">
			<label for="cep">CEP:</label>
			<input type="text" name="cep" id="cep" class="form-control" />
		</div>

		<div class="form-group">
			<label for="bairro">Bairro:</label>
			<input type="text" name="bairro" id="bairro" class="form-control" />
		</div>


		<div class="form-group">
			<label for="logradouro">Logradouro:</label>
			<input type="text" name="logradouro" id="logradouro" class="form-control" />
		</div>
		<div class="form-group">
			<label for="numero">Numero:</label>
			<input type="text" name="numero" id="numero" class="form-control" />
		</div>
		<div class="form-group">
			<label for="complemento">Complemento:</label>
			<input type="text" name="complemento" id="complemento" class="form-control" />
		</div>

		<div class="form-group">
			<label for="telefone">Telefone:</label>
			<input type="text" name="telefone" id="telefone" class="form-control" />
		</div>
		<div class="form-group">
			<label for="tipo_usuario">Tipo usuário:</label>
			<input type="text" name="tipo_usuario" id="tipo_usuario" class="form-control" />
		</div>



		<input type="submit" value="Cadastrar" class="btn btn-default" />
	</form>

</div>

<?php require 'pages/footer.php'; ?>