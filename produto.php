<?php require 'pages/header.php'; ?>

<?php
require 'dao/ImovelDaoMysql.php';

$imovelDaoMysql = new ImovelDaoMysql($pdo);

if(isset($_GET['codigo_imovel']) && !empty($_GET['codigo_imovel'])) {
	$codigo_imovel = addslashes($_GET['codigo_imovel']);
} else {
	?>
	<script type="text/javascript">window.location.href="index.php";</script>
	<?php
	exit;
}

$imovel = $imovelDaoMysql->findByCodigoImovel($codigo_imovel);
?>

<div class="container-fluid">

    <!-- Linha -->
	<div class="row">

        <!-- Fotos do Imóvel: Coluna Esquerda -->
		<div class="col-sm-5">
			
			<div class="carousel slide" data-ride="carousel" id="meuCarousel">
				<div class="carousel-inner" role="listbox">

					<?php foreach($imovel['fotos'] as $chave => $foto): ?>
					<div class="item <?php echo ($chave=='0')?'active':''; ?>">
						<img src="assets/images/imoveois/<?php echo $foto['url']; ?>" />
					</div>
					<?php endforeach; ?>

				</div>
				<a class="left carousel-control" href="#meuCarousel" role="button" data-slide="prev"><span><</span></a>
				<a class="right carousel-control" href="#meuCarousel" role="button" data-slide="next"><span>></span></a>
			</div>

		</div>

        <!-- Descrição do Imóvel: Coluna Direita -->
		<div class="col-sm-7">
			<h1><?php echo $imovel->getTitulo(); ?></h1>
			<h4><?php echo utf8_encode($imovel['categoria']); ?></h4>
			<p><?php echo $imovel->getDescricao(); ?></p>
			<br/>
			<h3>R$ <?php echo number_format($imovel->getValor(), 2); ?></h3>

		</div>
	</div>
</div>

<?php require 'pages/footer.php'; ?>