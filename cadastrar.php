<?php require 'pages/header.php'; ?>


<div class="container">
	<h1>Cadastre-se</h1>

	<?php

	require 'models/Estado.php';
	#require 'dao/UsuarioDaoMysql.php';
	require 'dao/CidadeDaoMysql.php';
	require 'dao/EnderecoDaoMysql.php';

	$usuarioDao = new UsuarioDaoMysql($pdo);
	$cidadeDaoMysql = new CidadeDaoMysql($pdo);
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
		$codigo_cidade = addslashes($_POST["codigo_cidade"]);
		$cep = addslashes($_POST['cep']);
		$bairro = addslashes($_POST['bairro']);
		$telefone = addslashes($_POST['telefone']);
		$tipo_usuario = addslashes($_POST['tipo_usuario']);

		if ($password == $password_again) {

			$cidade = $cidadeDaoMysql->findByCodeCity($codigo_cidade);

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
					if ($usuarioDao->add($usuario)) {
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

	<!-- Formulário de Cadastrar Usuário -->
	<form method="POST">

		<!-- CPF -->
		<div class="form-group">
			<label for="cpf">CPF:</label>
			<input type="text" name="cpf" id="cpf" class="form-control" />
		</div>

		<!-- Nome -->
		<div class="form-group">
			<label for="nome">Nome:</label>
			<input type="text" name="nome" id="nome" class="form-control" />
		</div>

		<!-- E-mail -->
		<div class="form-group">
			<label for="email">E-mail:</label>
			<input type="email" name="email" id="email" class="form-control" />
		</div>

		<!-- Senha -->
		<div class="form-group">
			<label for="password">Senha:</label>
			<input type="password" name="password" id="password" class="form-control" />
		</div>

		<!-- Confirmar Senha -->
		<div class="form-group">
			<label for="password_again">Confirmar Senha:</label>
			<input type="password_again" name="password_again" id="password_again" class="form-control" />
		</div>

		<!-- Estado / Cidade -->
		<div class="form-group">
			<label for="codigo_cidade">Estado / Cidade do Endereço:</label>
			<select name="codigo_cidade" id="codigo_cidade" class="form-control">
				<?php
				
				$allCities = $cidadeDaoMysql->findAllCity();
				foreach ($allCities as $city) :
				?>
					<option value="<?php echo $city->getCodigoCidade(); ?>"><?php echo $city->getUf()." - ".$city->getNome(); ?></option>
				<?php
				endforeach;
				?>
			</select>
		</div>

		<!-- CEP -->
		<div class="form-group">
			<label for="cep">CEP:</label>
			<input type="text" name="cep" id="cep" class="form-control" />
		</div>

		<!-- Bairro -->
		<div class="form-group">
			<label for="bairro">Bairro:</label>
			<input type="text" name="bairro" id="bairro" class="form-control" />
		</div>

		<!-- Logradouro -->
		<div class="form-group">
			<label for="logradouro">Logradouro:</label>
			<input type="text" name="logradouro" id="logradouro" class="form-control" />
		</div>

		<!-- Número -->
		<div class="form-group">
			<label for="numero">Numero:</label>
			<input type="text" name="numero" id="numero" class="form-control" />
		</div>

		<!-- Complemento -->
		<div class="form-group">
			<label for="complemento">Complemento:</label>
			<input type="text" name="complemento" id="complemento" class="form-control" />
		</div>

		<!-- Telefone -->
		<div class="form-group">
			<label for="telefone">Telefone:</label>
			<input type="text" name="telefone" id="telefone" class="form-control" />
		</div>

		<!-- Tipo de Usuário -->
		<div class="form-group">
			<label for="tipo_usuario"> Tipo de Usuário:</label>

			<select class="form-control" name="tipo_usuario" id="tipo_usuario">
				<option value="LOCATARIO">Locatário</option>
				<option value="PROPRIETARIO">Proprietário</option>
				<option value="AMBOS">Ambos</option>
			</select>
		</div>

		<input type="submit" value="Cadastrar" class="btn btn-default" />
	</form>

</div>

<?php require 'pages/footer.php'; ?>