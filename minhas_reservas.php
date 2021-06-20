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
?>


<div class="container">

    <h1>Minhas Reservas:</h1>
    <hr/>

    <!-- Header Tabela -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Código Reserva</th>
                <th>Código Imóvel</th>
                <th>Data Inicial</th>
                <th>Data Final</th>
                <th>Nome do Proprietário</th>
            </tr>
        </thead>


        <?php
        require 'dao/ReservaDaoMysql.php';
        require 'dao/ImovelDaoMysql.php';

        $reservaDaoMysql = new ReservaDaoMysql($pdo);
        $imovelDaoMysql = new ImovelDaoMysql($pdo);
    
        $minhasReservas = $reservaDaoMysql->minhasLocacoes($_SESSION['cLogin']);

        foreach ($minhasReservas as $reserva) : ;


        ?>
            <tr>


                <td>
                    <?php if (count($imovelDaoMysql->getFotosImovel($reserva["codigo_imovel"]) ) > 0): ?>
								<img src="assets/images/imoveis/<?php echo $imovelDaoMysql->getFotosImovel($reserva["codigo_imovel"])[0]['url']; ?>" height="50" border="0" />
                    
                    <?php else : ?>
                        <img src="assets/images/default.jpg" height="50" border="0" />
                    <?php endif; ?>
                </td>

                <td><?php echo $reserva['codigo_imovel']; ?></td>
                <td><?php echo $reserva['codigo_reserva']; ?></td>
                <td><?php echo $reserva['data_inicial']; ?></td>
                <td><?php echo $reserva['data_final']; ?></td>
                <td><?php echo $reserva['NomeDonoImove']; ?></td>

              
                <td>
                        <a href="produto.php?codigo_imovel=<?php echo $imovel['codigo_imovel']; ?>" class="btn btn-primary">Visualizar</a>
                    <a href="excluir_locacao.php?codigo_imovel=<?php echo $reserva['codigo_imovel']."&cpf=".$reserva['CpfLocatario']."&data_inicial=".$reserva['data_inicial']; ?>" class="btn btn-default">Cancelar</a>
                    
                </td>

            </tr>
        <?php endforeach; ?>
    </table>











</div>
<?php require 'pages/footer.php'; ?>