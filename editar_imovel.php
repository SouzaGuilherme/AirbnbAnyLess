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
require 'dao/ImovelDaoMysql.php';

$cidadeDao = new CidadeDaoMysql($pdo);
$imovelDao = new ImovelDaoMysql($pdo);


if (
	isset($_GET['codigo_imovel']) && !empty($_GET['codigo_imovel'])
	&& 	isset($_POST['titulo']) && !empty($_POST['titulo'])
	&& 	isset($_POST['descricao']) && !empty($_POST['descricao'])
	&& 	isset($_POST['qtd_banheiros']) && !empty($_POST['qtd_banheiros'])
	&& 	isset($_POST['qtd_quartos']) && !empty($_POST['qtd_quartos'])
	&& 	isset($_POST['qtd_salas']) && !empty($_POST['qtd_salas'])
	&& 	isset($_POST['vagas_garagem']) && !empty($_POST['vagas_garagem'])
	&& 	isset($_POST['valor']) && !empty($_POST['valor'])
	&& 	isset($_POST['habilitado']) && !empty($_POST['habilitado'])
	&& 	isset($_POST['piscina']) && !empty($_POST['piscina'])
	) {


	if(isset($_FILES['fotos'])) {
		$fotos = $_FILES['fotos'];
	} else {
		$fotos = array();
	}


	# Armazena valores do POST
	$titulo = $_POST["titulo"];
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

	# Instância Imóvel
	$imovel = $imovelDao->findByCodigoImovel($_GET["codigo_imovel"]);
	$cidade = $cidadeDao->findByCodeCity($imovel->getCodigoCidade());

	# Atualiza Valores no Objeto
    $imovel->setTitulos($titulo);
    $imovel->setDescricao($descricao);
    $imovel->setQtdBanheiros($qtd_banheiros);
    $imovel->setQtdQuartos($qtd_quartos);
    $imovel->setQtdSalas($qtd_salas);
    $imovel->setPiscina($piscina);
    $imovel->setVagasGaragem($vagas_garagem);
    $imovel->setValor($valor);
    $imovel->setHabilidade($habilitado);

	# Atualiza Valores no Database
	if ($imovelDao->update($imovel, $fotos)){

		?>
		<div class="alert alert-success">
			<strong>Dados atualizados com sucesso!</strong>
		</div>
		<?php

	}




}


if (isset($_GET["codigo_imovel"]) && !empty($_GET["codigo_imovel"])){
	$imovel = $imovelDao->findByCodigoImovel($_GET["codigo_imovel"]);
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

		<!-- Titulo -->
		<div class="form-group">
			<label for="titulo">Titulo:</label>
			<input maxlength="200" name="titulo" id="titulo" class="form-control" value="<?php echo $imovel->getTitulo()?>">
		</div>
		
		<!-- Descrição -->
		<div class="form-group">
			<label for="descricao">Descrição:</label>
			<textarea maxlength="500" name="descricao" id="descricao" class="form-control"><?php echo $imovel->getDescricao()?></textarea>
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
		
		<!-- Adicionar Imagens -->
		<div class="form-group">
			<label for="add_foto">Fotos do imóvel:</label>
			<input type="file" name="fotos[]" multiple /><br/>

			<div class="panel panel-default">
				<div class="panel-heading">Fotos do Imóvel</div>
				<div class="panel-body">
					<?php foreach($imovelDao->getFotosImovel($_GET["codigo_imovel"]) as $foto): ?>
					<div class="foto_item">
						<img src="assets/images/imoveis/<?php echo $foto['url']; ?>" class="img-thumbnail" border="0" /><br/>
						<a href="excluir_foto.php?url=<?php echo $foto['url']."&codigo_imovel=".$foto["codigo_imovel"]; ?>" class="btn btn-default">Excluir Imagem</a>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
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