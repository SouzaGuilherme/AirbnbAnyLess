<?php require 'pages/header.php'; ?>


<div class="container">
	<h1>Cadastre-se no AirbnbAnyLess</h1>
	<hr/>

	<?php

	require 'models/Estado.php';
	require 'dao/CidadeDaoMysql.php';
	require 'dao/EnderecoDaoMysql.php';

	$usuarioDao = new UsuarioDaoMysql($pdo);
	$cidadeDaoMysql = new CidadeDaoMysql($pdo);
	$enderecoDao = new EnderecoDaoMysql($pdo);

	if (
		isset($_POST['nome'])
		&& 	isset($_POST['cpf'])
		&& 	isset($_POST['email'])
		&& 	isset($_POST['password'])
		&& 	isset($_POST['password_again'])
		&& 	isset($_POST['logradouro'])
		&& 	isset($_POST['numero'])
		&& 	isset($_POST['complemento'])
		&& 	isset($_POST['cep'])
		&& 	isset($_POST['telefone'])
		&& 	isset($_POST['tipo_usuario'])
	) {

		if (
			!empty($_POST['nome'])
			&& !empty($_POST['cpf'])
			&& !empty($_POST['email'])
			&& !empty($_POST['password'])
			&& !empty($_POST['password_again'])
			&& !empty($_POST['logradouro'])
			&& !empty($_POST['numero'])
			&& !empty($_POST['complemento'])
			&& !empty($_POST['cep'])
			&& !empty($_POST['telefone'])
			&& !empty($_POST['tipo_usuario'])
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

			

					$endereco = new Endereco(
						$codigo_cidade = $cidade->getCodigoCidade(),
						$uf = $cidade->getUf(),
						$logradouro = $logradouro,
						$numero = $numero,
						$complemento = $complemento,
						$bairro = $bairro,
						$cep = $cep,
					);
					$enderecoDao->add($endereco);
					$endereco = $enderecoDao->findEndereco($endereco);

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
			} else {
				?>
				<div class="alert alert-danger">
					Senhas não são iguais. Tente novamente!
				</div>
				<?php
			}
		} else {
			?>
			<div class="alert alert-warning">
				Por favor, preencha todos os dados necessários do formulário.
			</div>
			<?php
		}
	}

	?>

	<!-- Formulário de Cadastrar Usuário -->
	<form method="POST">

		<!-- CPF -->
		<div class="form-group">
			<label for="cpf">CPF:</label>
			<input pattern="[0-9]+" type="text" name="cpf" id="cpf" class="form-control" maxlength="11"/>
		</div>

		<!-- Nome -->
		<div class="form-group">
			<label for="nome">Nome:</label>
			<input type="text" name="nome" id="nome" class="form-control" maxlength="256"/>
		</div>

		<!-- E-mail -->
		<div class="form-group">
			<label for="email">E-mail:</label>
			<input type="email" name="email" id="email" class="form-control" maxlength="200"/>
		</div>

		<!-- Senha -->
		<div class="form-group">
			<label for="password">Senha:</label>
			<input type="password" name="password" id="password" class="form-control" maxlength="32"/>
		</div>

		<!-- Confirmar Senha -->
		<div class="form-group">
			<label for="password_again">Confirmar Senha:</label>
			<input type="password" name="password_again" id="password_again" class="form-control" maxlength="32"/>
		</div>

		<!-- Estado / Cidade -->
		<div class="form-group">
			<label for="codigo_cidade">Estado / Cidade do Endereço:</label>
			<select name="codigo_cidade" id="codigo_cidade" class="form-control">
				<?php

				$allCities = $cidadeDaoMysql->findAllCity();
				foreach ($allCities as $city) :
				?>
					<option value="<?php echo $city->getCodigoCidade(); ?>"><?php echo $city->getUf() . " - " . $city->getNome(); ?></option>
				<?php
				endforeach;
				?>
			</select>
		</div>

		<!-- CEP -->
		<div class="form-group">
			<label for="cep">CEP:</label>
			<input pattern="[0-9]+" type="text" name="cep" id="cep" class="form-control" maxlength="9"/>
		</div>

		<!-- Bairro -->
		<div class="form-group">
			<label for="bairro">Bairro:</label>
			<input type="text" name="bairro" id="bairro" class="form-control" maxlength="200"/>
		</div>

		<!-- Logradouro -->
		<div class="form-group">
			<label for="logradouro">Logradouro:</label>
			<input type="text" name="logradouro" id="logradouro" class="form-control" maxlength="200"/>
		</div>

		<!-- Número -->
		<div class="form-group">
			<label for="numero">Numero:</label>
			<input pattern="[0-9]+" type="text" name="numero" id="numero" class="form-control" maxlength="6"/>
		</div>

		<!-- Complemento -->
		<div class="form-group">
			<label for="complemento">Complemento:</label>
			<input type="text" name="complemento" id="complemento" class="form-control" maxlength="200"/>
		</div>

		<!-- Telefone -->
		<div class="form-group">
			<label pattern="[0-9]+" for="telefone">Telefone:</label>
			<input type="text" name="telefone" id="telefone" class="form-control" maxlength="50" />
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

		<input type="submit" value="Cadastrar" class="btn btn-success btn-block btn-lg" />
	</form>

</div>

<?php require 'pages/footer.php'; ?>