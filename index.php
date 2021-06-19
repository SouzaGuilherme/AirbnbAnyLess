<?php require 'pages/header.php'; ?>
<?php



require 'dao/ImovelDaoMysql.php';

$imovelDaoMysql = new ImovelDaoMysql($pdo);


$total_imoveis = $imovelDaoMysql->getTotalImoveis();
$total_usuarios = $usuarioDaoMysql->getTotalusuarios();


$allImoveis = $imovelDaoMysql->findAllImoveisWithCity()

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
					<label for="categoria">Categoria:</label>
					<select id="categoria" name="filtros[categoria]" class="form-control">
						<option></option>
						<?php foreach ($categorias as $cat) : ?>
							<option value="<?php echo $cat['id']; ?>" <?php echo ($cat['id'] == $filtros['categoria']) ? 'selected="selected"' : ''; ?>><?php echo utf8_encode($cat['nome']); ?></option>
						<?php endforeach; ?>
					</select>
				</div>

				<div class="form-group">
					<label for="preco">Preço:</label>
					<select id="preco" name="filtros[preco]" class="form-control">
						<option></option>
						<option value="0-50" <?php echo ($filtros['preco'] == '0-50') ? 'selected="selected"' : ''; ?>>R$ 0 - 50</option>
						<option value="51-100" <?php echo ($filtros['preco'] == '51-100') ? 'selected="selected"' : ''; ?>>R$ 51 - 100</option>
						<option value="101-200" <?php echo ($filtros['preco'] == '101-200') ? 'selected="selected"' : ''; ?>>R$ 101 - 200</option>
						<option value="201-500" <?php echo ($filtros['preco'] == '201-500') ? 'selected="selected"' : ''; ?>>R$ 201 - 500</option>
					</select>
				</div>

				<div class="form-group">
					<label for="estado">Estado de Conservação:</label>
					<select id="estado" name="filtros[estado]" class="form-control">
						<option></option>
						<option value="0" <?php echo ($filtros['estado'] == '0') ? 'selected="selected"' : ''; ?>>Ruim</option>
						<option value="1" <?php echo ($filtros['estado'] == '1') ? 'selected="selected"' : ''; ?>>Bom</option>
						<option value="2" <?php echo ($filtros['estado'] == '2') ? 'selected="selected"' : ''; ?>>Ótimo</option>
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
						<th>Valor</th>
						<th>UF</th>
						<th>Cidade</th>


					</tr>
				</thead>


				<?php


				foreach ($allImoveis as $imovel) :
				?>
					<tr>
						<td>

							<?php if (!empty($imovel['url'])) : ?>
								<img src="assets/images/imoveis/<?php echo $imovel['url']; ?>" height="50" border="0" />
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