<?php require 'pages/header.php'; ?>

<?php

# Imports
require 'dao/ImovelDaoMysql.php';
require "dao/EnderecoDaoMysql.php";
require "dao/CidadeDaoMysql.php";
require "dao/ReservaDaoMysql.php";

# Criando DAOs
$imovelDaoMysql = new ImovelDaoMysql($pdo);
$enderecoDaoMysql = new EnderecoDaoMysql($pdo);
$cidadeDaoMysql = new CidadeDaoMysql($pdo);
$reservaDaoMysql = new ReservaDaoMysql($pdo);


# Verifica através do GET se existe o imóvel no Database.
if(isset($_GET['codigo_imovel']) && !empty($_GET['codigo_imovel'])) {
	$codigo_imovel = addslashes($_GET['codigo_imovel']);
} else {
	?>
	<script type="text/javascript">window.location.href="index.php";</script>
	<?php
	exit;
}

# Verificação/Inserção do Imóvel
if (isset($_POST['start_date']) && isset($_POST['end_date'])) {

	if (!empty($_SESSION["cLogin"])){

		if ($usuario->getTipoUsuario() == "LOCATARIO" || $usuario->getTipoUsuario() == "AMBOS"){


			if (!empty($_POST['start_date']) && !empty($_POST['end_date'])) {
				$start_date = date($_POST['start_date']);
				$end_date = date($_POST['end_date']);
				

				

				if ($start_date <= $end_date){
					
					$reserva = $reservaDaoMysql->estaAlugado($start_date, $end_date, $_GET["codigo_imovel"]);
					if ($reserva) {
						?>
						<div class="alert alert-warning">
							Esse imóvel já está alugado para o período: <?php echo $start_date ?> < <?php echo $end_date ?>

						</div>
						<?php
						
					} else {

						$nova_reserva = new Reserva(
							$codigo_imovel=$_GET["codigo_imovel"],
							$cpf=$_SESSION['cLogin'],
							$data_inicial=$start_date,
							$data_final=$end_date,
						);
						$reservaDaoMysql->add($nova_reserva);

						?>
						<div class="alert alert-success">
							Parabéns, você alugou este imóvel para o período <?php echo $start_date ?> < <?php echo $end_date ?>

						</div>
						<?php



					}



				} else {
					?>
					<div class="alert alert-warning">
						A data inicial deve ser menor do que a final.
						<?php echo $start_date ?> < <?php echo $end_date ?>

					</div>
					<?php

				}



			} else {
				?>
				<div class="alert alert-warning">
					Por favor, preencha as datas que deseja alugar.
				</div>
				<?php

			}
		} else {
			?>
			<div class="alert alert-warning">
				Sua conta é do tipo <?php echo $usuario->getTipoUsuario() ?>, apenas LOCATÁRIO e AMBOS pode realizar reservas.
			</div>
			<?php

		}

	} else {

		?>
			<div class="alert alert-warning">
				Por favor, faça <a href="login.php" class="alert-link">login</a> antes de continuar!
			</div>
		<?php
	}

}








$imovel = $imovelDaoMysql->findByCodigoImovel($codigo_imovel);
$fotosImovel = $imovelDaoMysql->getFotosImovel($codigo_imovel);


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
					<?php if (count($fotosImovel) > 0): ?>
						<?php foreach($fotosImovel as $chave => $foto): ?>
							
							<div class="item <?php echo ($chave=='0')?'active':''; ?>">
								<img src="assets/images/imoveis/<?php echo $foto['url']; ?>" />
							</div>
						<?php endforeach; ?>
					<?php else : ?>
							<img src="assets/images/default.jpg" height="500" border="0" />
					<?php endif; ?>

				</div>
				<a class="left carousel-control" href="#meuCarousel" role="button" data-slide="prev"><span><</span></a>
				<a class="right carousel-control" href="#meuCarousel" role="button" data-slide="next"><span>></span></a>
			</div>

			<br/><br/><br/><br/>
			<!-- Informações sobre Reservas -->
			<h3><strong>Meus Dias Reservados: </strong> </h3> <hr/>

			<?php foreach ($reservaDaoMysql->reservaImovelCpf($_GET["codigo_imovel"], $_SESSION["cLogin"]) as $reserva) : ?>

				<h4>
					<strong>Período:</strong>
					<span style="color:green;">
						<strong><?php echo $reserva["data_inicial"]." / ".$reserva["data_final"]?></strong>
					</span>
				</h4>
				
			


	
			<?php endforeach; ?>
            <a href="minhas_reservas.php" class="btn btn-lg btn-primary">Voltar</a>
			
		</div>

        <!-- Descrição do Imóvel: Coluna Direita -->
		<div class="col-sm-5">
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



		</div>

		<div class="col-sm-2">
		</div>
	</div>
</div>

<?php require 'pages/footer.php'; ?>