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


    <h1>Imovéis que você alugou:</h1>
    <hr/>

    <!-- Header Tabela -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Código</th>
                <th>Valor</th>
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
</div>
<?php require 'pages/footer.php'; ?>