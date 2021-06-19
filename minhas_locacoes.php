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

        $reservaDaoMysql = new ReservaDaoMysql($pdo);
    
        $minhasReservas = $reservaDaoMysql->minhasLocacoes($_SESSION['cLogin']);
        var_dump($minhasReservas);
        foreach ($minhasReservas as $reserva) :
            var_dump($reserva);

        ?>
            <tr>
                <td>

                    <?php if (!empty($reserva['url'])) : ?>
                        <img src="assets/images/imoveis/<?php echo $reserva['url']; ?>" height="50" border="0" />
                    <?php else : ?>
                        <img src="assets/images/default.jpg" height="50" border="0" />
                    <?php endif; ?>
                </td>

                <td><?php echo $reserva['codigo_reserva']; ?></td>
                <td><?php echo $reserva['codigo_reserva']; ?></td>
                <td><?php echo $reserva['data_inicial']; ?></td>
                <td><?php echo $reserva['data_final']; ?></td>
                <td><?php echo $reserva['NomeDonoImove']; ?></td>

            </tr>
        <?php endforeach; ?>
    </table>











</div>
<?php require 'pages/footer.php'; ?>