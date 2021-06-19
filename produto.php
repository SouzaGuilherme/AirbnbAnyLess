<?php require 'pages/header.php'; ?>

<?php
require 'dao/ImovelDaoMysql.php';
require "dao/EnderecoDaoMysql.php";
require "dao/CidadeDaoMysql.php";

$imovelDaoMysql = new ImovelDaoMysql($pdo);
$enderecoDaoMysql = new EnderecoDaoMysql($pdo);
$cidadeDaoMysql = new CidadeDaoMysql($pdo);

if(isset($_GET['codigo_imovel']) && !empty($_GET['codigo_imovel'])) {
	$codigo_imovel = addslashes($_GET['codigo_imovel']);
} else {
	?>
	<script type="text/javascript">window.location.href="index.php";</script>
	<?php
	exit;
}

$imovel = $imovelDaoMysql->findByCodigoImovel($codigo_imovel);
$endereco = $enderecoDaoMysql->findEnderecoByKeys(
	$numero_seq_end=$imovel->getNumeroSeqEnd(),
	$uf=$imovel->getUf(),
	$codigo_cidade=$imovel->getCodigoCidade(),
);
$cidade = $cidadeDaoMysql->findByCodeCity($endereco->getCodigoCidade());
?>

<div class="container-fluid">

    <!-- Linha -->
	<div class="row">

        <!-- Fotos do Imóvel: Coluna Esquerda -->
		<div class="col-sm-5">
			
			<div class="carousel slide" data-ride="carousel" id="meuCarousel">
				<div class="carousel-inner" role="listbox">

					aa

				</div>
				<a class="left carousel-control" href="#meuCarousel" role="button" data-slide="prev"><span><</span></a>
				<a class="right carousel-control" href="#meuCarousel" role="button" data-slide="next"><span>></span></a>
			</div>

		</div>

        <!-- Descrição do Imóvel: Coluna Direita -->
		<div class="col-sm-7">
			<h3><strong><?php echo $imovel->getTitulo(); ?></strong></h3>
			<hr/>
			<p><?php echo $imovel->getDescricao(); ?></p>

			<br/>
			
			<!-- Informações de Localização -->
			<h4><strong>Informações de Localizaçao</strong> </h4> <hr/>
			<h5><strong>Valor:</strong> R$ <?php echo number_format($imovel->getValor(), 2); ?></h5>
			<h5><strong>Cidade/Estado:</strong> <?php echo $cidade->getNome()." / ".$imovel->getUf(); ?></h5>
			<h5><strong>Endereço:</strong> <?php echo $endereco->getLogradouro().", ".$endereco->getNumero(); ?></h5>


			<br/>

			<!-- Informações do Imóvel -->
			<h4><strong>Informações do Imóvel</strong> </h4> <hr/>
			<h5><strong>Quantidade de Salas:</strong> <?php echo $imovel->getQtdSalas(); ?></h5>
			<h5><strong>Quantidade de Quartos:</strong> <?php echo $imovel->getQtdQuartos(); ?></h5>
			<h5><strong>Quantidade de Banheiros:</strong> <?php echo $imovel->getQtdBanheiros(); ?></h5>
			<h5><strong>Quantidade de Salas:</strong> <?php echo $imovel->getQtdSalas(); ?></h5>
			<h5><strong>Quantidade de Quartos:</strong> <?php echo $imovel->getQtdQuartos(); ?></h5>
			<h5><strong>Vagas Garagem:</strong> <?php echo $imovel->getVagasGaragem(); ?></h5>
			<h5><strong>Piscina:</strong><?php if ($imovel->getPiscina()) : ?> Sim <?php else : ?> Não <?php endif; ?></h5>
			

	
			<br/>

			<h3><strong>Período para Alugar</strong></h3><hr/>
			<form method="POST" enctype="multipart/form-data">

			<div class="form-row">
				<div class="col">
					<div class="form-group">
						<label for="start_date">Data Inicial:</label>
						<input type="date" name="start_date" id="start_date" class="form-control"/>
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label for="end_date">Data Final:</label>
						<input type="date" name="end_date" id="end_date" class="form-control"/>
					</div>
				</div>
			</div>

			<input type="submit" value="Alugar" class="btn bg-success btn-lg " />
			<a href="index.php" class="btn btn-danger btn-lg">Voltar</a>

			</form>

		

		</div>
	</div>
</div>

<?php require 'pages/footer.php'; ?>