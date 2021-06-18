<?php
require_once __DIR__ . '/../config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Airbnb AnyLess</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../assets/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../assets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../assets/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form method="POST" class="login100-form validate-form" action="<?=$base_url;?>/pages/actions/cadastrar_usuario_action.php">
					<span class="login100-form-title p-b-26">
						Cadastrar ao AirbnbAnyLess
					</span>
					<span class="login100-form-title p-b-48">
						<i class="zmdi zmdi-font"></i>
					</span>

					<!-- Email -->
					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100" type="text" name="email">
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100" type="text" name="confirm-email">
						<span class="focus-input100" data-placeholder="Confirmar Email"></span>
					</div>

					<!-- Senha -->
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="Senha"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password_again">
						<span class="focus-input100" data-placeholder="Confirmar Senha"></span>
					</div>
					
					<!-- Usuários -->
					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100" type="text" name="nome">
						<span class="focus-input100" data-placeholder="Nome"></span>
					</div>

					<div class="wrap-input100 validate-input" required>
						<input class="input100" type="text" name="telefone">
						<span class="focus-input100" data-placeholder="Telefone"></span>
					</div>

					<div class="wrap-input100 validate-input" required>
						<input class="input100" type="text" name="cpf">
						<span class="focus-input100" data-placeholder="CPF"></span>
					</div>

					<div class="wrap-input100 validate-input" required>
						<input class="input100" type="text" name="email">
						<span class="focus-input100" data-placeholder="E-mail"></span>
					</div>

					<div class="wrap-input100 validate-input" required>
						<input class="input100" type="text" name="tipo_usuario">
						<span class="focus-input100" data-placeholder="Tipo do Usuário"></span>
					</div>

					<div class="wrap-input100 validate-input" required>
						<input class="input100" type="text" name="logradouro">
						<span class="focus-input100" data-placeholder="Logradouro"></span>
					</div>
					<div class="wrap-input100 validate-input" required>
						<input class="input100" type="text" name="numero">
						<span class="focus-input100" data-placeholder="Nro."></span>
					</div>

					<div class="wrap-input100 validate-input" required>
						<input class="input100" type="text" name="complemento">
						<span class="focus-input100" data-placeholder="Complemento"></span>
					</div>

					<div class="wrap-input100 validate-input" required>
						<input class="input100" type="text" name="bairro">
						<span class="focus-input100" data-placeholder="Bairro"></span>
					</div>

					<div class="wrap-input100 validate-input" required>
						<input class="input100" type="text" name="cep">
						<span class="focus-input100" data-placeholder="CEP"></span>
					</div>

					<div class="wrap-input100 validate-input" required>
						<input class="input100" type="text" name="nome_cidade">
						<span class="focus-input100" data-placeholder="Cidade"></span>
					</div>

					<div class="wrap-input100 validate-input" required>
						<input class="input100" type="text" name="siglaUF">
						<span class="focus-input100" data-placeholder="UF"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="cadastrar100-form-bgbtn"></div>

							<button type="submit" class="login100-form-btn">
								Cadastrar
							</button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>