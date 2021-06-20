<?php require 'pages/header.php'; ?>
<?php



require 'dao/ImovelDaoMysql.php';
require 'dao/CidadeDaoMysql.php';

$imovelDaoMysql = new ImovelDaoMysql($pdo);
$cidadeDaoMysql = new CidadeDaoMysql($pdo);


$allCidadeEstado = $cidadeDaoMysql->findAllCity();

$filtros = array(
	"city"=> "",
	"preco"=> ""
);
if (isset($_GET["filtros"])){
	$filtros = $_GET["filtros"];
}

$total_imoveis = $imovelDaoMysql->getTotalImoveis();
$total_usuarios = $usuarioDaoMysql->getTotalusuarios();


$allImoveis = $imovelDaoMysql->findImoveisPaginaInicial($filtros);

?>

<div class="container-fluid">

	<!-- Banner -->
	<div class="jumbotron">
		<h2>Nós temos hoje <?php echo $total_imoveis; ?> imóveis.</h2>
		<p>E mais de <?php echo $total_usuarios; ?> usuários cadastrados.</p>
	</div>

	<div class="row">
		<!-- Menu de Filtro de Buscas -->
		<div class="col-sm-3">

			<h4>Pesquisa Avançada</h4>

			<form method="GET">
				<div class="form-group">


					<label for="city">Estado/Cidade:</label>
					<select id="city" name="filtros[city]" class="form-control">
						<option></option>
						<?php foreach ($allCidadeEstado as $city) : ?>
							<option 
								value="<?php echo $city->getCodigoCidade(); ?>"        
								<?php echo ($city->getCodigoCidade()==$filtros["city"])?'selected="selected"':'';?>
							>
								<?php echo $city->getUf() . " - " . $city->getNome(); ?>
							</option>
							
						<?php endforeach; ?>
					</select>
				</div>

				<div class="form-group">
					<label for="preco">Preço da Diária:</label>
					<select id="preco" name="filtros[preco]" class="form-control">
						<option></option>
						<option value="0-50" <?php echo ($filtros['preco'] == '0-50') ? 'selected="selected"' : ''; ?>>R$ 0 - 50</option>
						<option value="51-100" <?php echo ($filtros['preco'] == '51-100') ? 'selected="selected"' : ''; ?>>R$ 51 - 100</option>
						<option value="101-200" <?php echo ($filtros['preco'] == '101-200') ? 'selected="selected"' : ''; ?>>R$ 101 - 200</option>
						<option value="201-500" <?php echo ($filtros['preco'] == '201-500') ? 'selected="selected"' : ''; ?>>R$ 201 - 500</option>
						<option value="500-2000" <?php echo ($filtros['preco'] == '500+') ? 'selected="selected"' : ''; ?>>R$ 500+</option>
					</select>
				</div>

				<div class="form-group">
					<input type="submit" class="btn btn-info" value="Buscar" />
				</div>
			</form>

		</div>

		<!-- Imóveis -->
		<div class="col-sm-9">
			<h3><strong>Últimos Anúncios de Imóveis</strong></h3>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Foto</th>
						<th>Código</th>
						<th>Título</th>
						<th>Diária</th>
						<th>UF</th>
						<th>Cidade</th>


					</tr>
				</thead>


				<?php


				foreach ($allImoveis as $imovel) :
				?>
					<tr>
						<td>

							<?php if (count($imovelDaoMysql->getFotosImovel($imovel["codigo_imovel"]) ) > 0): ?>
								<img src="assets/images/imoveis/<?php echo $imovelDaoMysql->getFotosImovel($imovel["codigo_imovel"])[0]['url']; ?>" height="50" border="0" />
							<?php else : ?>
								<img src="assets/images/default.jpg" height="50" border="0" />
							<?php endif; ?>
						</td>
						<td><?php echo $imovel['codigo_imovel']; ?></td>
						<td><?php echo $imovel['titulo']; ?></td>
						<td>R$ <?php echo number_format($imovel['valor'], 2); ?></td>
						<td><?php echo $imovel['uf']; ?></td>
						<td><?php echo $imovel['nome']; ?></td>




						<td>
							<a href="produto.php?codigo_imovel=<?php echo $imovel['codigo_imovel']; ?>" class="btn btn-primary">Visualizar</a>
						</td>
					</tr>
				<?php endforeach; ?>
			</table>

		</div>
	</div>


</div>

<?php require 'pages/footer.php'; ?>