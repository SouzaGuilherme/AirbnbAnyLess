<?php require 'pages/header.php'; ?>

<?php
if (empty($_SESSION['cLogin'])) {
	?>
	<script type="text/javascript">
		window.location.href = "login.php";
	</script>
	<?php
	exit;
}

require 'dao/CidadeDaoMysql.php';
require 'dao/EnderecoDaoMysql.php';
require 'dao/ImovelDaoMysql.php';

$enderecoDao = new EnderecoDaoMysql($pdo);
$cidadeDao = new CidadeDaoMysql($pdo);
$imovelDao = new ImovelDaoMysql($pdo);


if (
	isset($_POST['codigo_cidade']) && !empty($_POST['codigo_cidade'])
	&& 	isset($_POST['logradouro']) && !empty($_POST['logradouro'])
	&& 	isset($_POST['numero']) && !empty($_POST['numero'])
	&& 	isset($_POST['complemento']) && !empty($_POST['complemento'])
	&& 	isset($_POST['bairro']) && !empty($_POST['bairro'])
	&& 	isset($_POST['cep']) && !empty($_POST['cep'])

	&& 	isset($_POST['descricao']) && !empty($_POST['descricao'])
	&& 	isset($_POST['qtd_banheiros']) && !empty($_POST['qtd_banheiros'])
	&& 	isset($_POST['qtd_quartos']) && !empty($_POST['qtd_quartos'])
	&& 	isset($_POST['qtd_salas']) && !empty($_POST['qtd_salas'])
	&& 	isset($_POST['vagas_garagem']) && !empty($_POST['vagas_garagem'])
	&& 	isset($_POST['valor']) && !empty($_POST['valor'])
	&& 	isset($_POST['habilitado']) && !empty($_POST['habilitado'])
	&& 	isset($_POST['piscina']) && !empty($_POST['piscina'])
	) {
	$codigo_cidade = $_POST['codigo_cidade'];
	$logradouro = $_POST['logradouro'];
	$numero = $_POST['numero'];
	$complemento = $_POST['complemento'];
	$bairro = $_POST['bairro'];
	$cep = $_POST['cep'];
	
	$descricao = $_POST["descricao"];
	$qtd_banheiros = $_POST["qtd_banheiros"];
	$qtd_quartos = $_POST["qtd_quartos"];
	$qtd_salas = $_POST["qtd_salas"];
	$vagas_garagem = $_POST["vagas_garagem"];
	$valor = $_POST["valor"];
	$habilitado = $_POST["habilitado"];
	$piscina = $_POST["piscina"];
	if ($habilitado == "sim") {
		$habilitado = 1;
	} else{ 	
		$habilitado = 0;
	}

	if ($piscina == "sim") {
		$piscina = 1;
	} else{ 	
		$piscina = 0;
	}


}


if (isset($_GET["codigo_imovel"]) && !empty($_GET["codigo_imovel"])){

	$imovel = $imovelDao->findByCodigoImovel($_GET["codigo_imovel"]);
	$endereco = $enderecoDao->findEndereco($endereco);

	
	# print_r($imovel);
	# print_r($endereco);
} else {
	?>
	<script type="text/javascript">
		window.location.href = "meus_imoveis.php";
	</script>
	<?php

}

?>


<div class="container">
	<h1>Meus Imóveis - Editar Imóvel</h1>
	<hr>

	<!-- Formulário de Adicionar Imóvel -->
	<form method="POST" enctype="multipart/form-data">

		<!-- Informações de Endereço -->
		<h2 class="display-4">Informações de Endereço</h1>
		<hr>

		<!-- Estado / Cidade -->
		<div class="form-group">
			<label for="codigo_cidade">Estado / Cidade do Endereço:</label>
			<select name="codigo_cidade" id="codigo_cidade" class="form-control">
				<?php
				
				$cidadeDaoMysql = new CidadeDaoMysql($pdo);
				$allCities = $cidadeDaoMysql->findAllCity();
				foreach ($allCities as $city) :
				?>	
					
					<option value="<?php echo $city->getCodigoCidade();?>"  <?php echo ($imovel->getCodigoCidade()==$city->getCodigoCidade())?'selected="selected"':'';?>>
						<?php echo $city->getUf()." - ".$city->getNome(); ?>
					</option>

					<option value="<?php echo $city->getCodigoCidade(); ?>"></option>
				<?php
				endforeach;
				?>
			</select>
		</div>

		<!-- Logradouro -->
		<div class="form-group">
			<label for="logradouro">Logradouro:</label>
			<textarea name="logradouro" id="logradouro" class="form-control"><?php echo $endereco->getLogradouro()?></textarea>
		</div>

		<!-- Complemento -->
		<div class="form-group">
			<label for="complemento">Complemento:</label>
			<textarea name="complemento" id="complemento" class="form-control"><?php echo $endereco->getComplemento()?></textarea>
		</div>

		<!-- Bairro -->
		<div class="form-group">
			<label for="bairro">Bairro:</label>
			<textarea name="bairro" id="bairro" class="form-control"><?php echo $endereco->getBairro()?> </textarea>
		</div>

		<!-- CEP -->
		<div class="form-group">
			<label for="cep">CEP:</label>
			<textarea name="cep" id="cep" class="form-control"> <?php echo $endereco->getCep()?></textarea>
		</div>

		<!-- Número do Endereço -->
		<div class="form-group">
			<label for="numero">Número do Endereço:</label>
			<input value="<?php echo $endereco->getNumero()?>" type="text" name="numero" id="numero" class="form-control" />
		</div>


		<!-- Informações do Imóvel -->
		<h2 class="display-4">Informações do Imóvel</h1>
		<hr>
		
		<!-- Descrição -->
		<div class="form-group">
			<label for="descricao">Descrição:</label>
			<textarea name="descricao" id="descricao" class="form-control"><?php echo $imovel->getDescricao()?></textarea>
		</div>
		<!-- Qtd. Banheiros -->
		<div class="form-group">
			<label for="qtd_banheiros">Quantidade de Banheiros:</label>
			<input value="<?php echo $imovel->getQtdBanheiros()?>" type="number" name="qtd_banheiros" id="qtd_banheiros" class="form-control" min="0" max="10" />
		</div>
		<!-- Qtd. Quartos -->
		<div class="form-group">
			<label for="qtd_quartos">Quantidade de Quartos:</label>
			<input value="<?php echo $imovel->getQtdQuartos()?>" type="number" name="qtd_quartos" id="qtd_quartos" class="form-control" min="0" max="10" />
		</div>
		<!-- Qtd. Salas -->
		<div class="form-group">
			<label for="qtd_salas">Quantidade de Salas:</label>
			<input value="<?php echo $imovel->getQtdSalas()?>" type="number" name="qtd_salas" id="qtd_salas" class="form-control" min="0" max="10" />
		</div>
		<!-- Vagas na Garagem -->
		<div class="form-group">
			<label for="vagas_garagem">Vagas na Garagem:</label>
			<input value="<?php echo $imovel->getVagasGaragem()?>" type="number" name="vagas_garagem" id="vagas_garagem" class="form-control" min="0" max="10" />
		</div>
		<!-- Valor -->
		<div class="form-group">
			<label for="valor">Valor:</label>
			<input value="<?php echo $imovel->getValor()?>" type="text" name="valor" id="valor" class="form-control" />
		</div>

		<!-- Disponível para Alugar -->
		<div class="form-group">
			<label for="habilitado"> Disponível para Alugar:</label>

			<select class="form-control" name="habilitado" id="habilitado">
			<option value="sim" <?php echo ($imovel->getHabilitado()==1)?'selected="selected"':'';?>>Sim</option>
			<option value="nao" <?php echo ($imovel->getHabilitado()==0)?'selected="selected"':'';?>>Não</option>
			
			</select>
		</div>

		<!-- Piscina -->
		<div class="form-group">
			<label for="piscina"> Piscina:</label>

			<select class="form-control" name="piscina" id="piscina">
			<option value="sim" <?php echo ($imovel->getPiscina()==1)?'selected="selected"':'';?>>Sim</option>
			<option value="nao" <?php echo ($imovel->getPiscina()==0)?'selected="selected"':'';?>>Não</option>
			
			</select>
		</div>

		<input type="submit" value="Salvar" class="btn bg-success " />
	</form>
















</div>
<?php require 'pages/footer.php'; ?>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>