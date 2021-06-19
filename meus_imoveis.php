
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
    
    <!-- Meus Imóveis Cadastrados -->
    <h1>Meus Imóveis Cadastrados:</h1>
    <hr/>

    <a href="cadastrar_imovel.php" class="btn btn-success">Adicionar Imóvel</a> <br/><br/>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Código</th>
                <th>Diária</th>
                <th>UF</th>
                <th>Qtd. Quartos</th>
                <th>Qtd. Banheiros</th>
                <th>Qtd. Salas</th>
                <th>Piscina</th>
                <th>Vagas Garagem</th>
                <th>Habilitado</th>
            </tr>
        </thead>


        <?php
        require 'dao/ImovelDaoMysql.php';
        $imovelDaoMysql = new ImovelDaoMysql($pdo);

        $imoveis_by_cpf = $imovelDaoMysql->findAllImoveisByCpf($_SESSION['cLogin']);

        foreach ($imoveis_by_cpf as $imovel) :
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
                <td>R$ <?php echo number_format($imovel['valor'], 2); ?></td>
                <td><?php echo $imovel['uf']; ?></td>
                <td><?php echo $imovel['qtd_quartos']; ?></td>
                <td><?php echo $imovel['qtd_banheiros']; ?></td>
                <td><?php echo $imovel['qtd_salas']; ?></td>
                
                <?php if ($imovel['piscina']): ?>
                    <td>Sim</td>
                <?php else : ?>
                    <td>Não</td>
                <?php endif; ?>

                <td><?php echo $imovel['vagas_garagem']; ?></td>
                

                <?php if ($imovel['habilitado']): ?>
                    <td>Sim</td>
                <?php else : ?>
                    <td>Não</td>
                <?php endif; ?>

                

                <td>
                    <a href="editar_imovel.php?codigo_imovel=<?php echo $imovel['codigo_imovel']; ?>" class="btn btn-default">Editar</a>
                    <a href="excluir_imovel.php?codigo_imovel=<?php echo $imovel['codigo_imovel']; ?>" class="btn btn-danger">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>


    <!-- Meus Imóveis Locados -->
    <h1>Meus Imóveis Locados:</h1>
    <hr/>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Código Reserva</th>
                <th>Código Imóvel</th>
                <th>Data Inicial</th>
                <th>Data Final</th>
                <th>Nome do Locatário</th>
            </tr>
        </thead>


        <?php
        require 'dao/ReservaDaoMysql.php';

        $reservaDaoMysql = new ReservaDaoMysql($pdo);
    
        $reservasMeusImoveis = $reservaDaoMysql->findReservaImovelByCpf($_SESSION['cLogin']);
        
        foreach ($reservasMeusImoveis as $imovel) :

            ?>
            <tr>
                <td>
                    <?php if (!empty($imovel['url'])) : ?>
                        <img src="assets/images/imoveis/<?php echo $imovel['url']; ?>" height="50" border="0" />
                    <?php else : ?>
                        <img src="assets/images/default.jpg" height="50" border="0" />
                    <?php endif; ?>
                </td>

                <td><?php echo $imovel['codigo_reserva']; ?></td>
                <td><?php echo $imovel['codigo_imovel']; ?></td>
                <td><?php echo $imovel['data_inicial']; ?></td>
                <td><?php echo $imovel['data_final']; ?></td>
                <td><?php echo $imovel['nome']; ?></td>

            </tr>
        <?php endforeach; ?>
    </table>

</div>
<?php require 'pages/footer.php'; ?>