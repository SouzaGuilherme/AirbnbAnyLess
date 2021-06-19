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
require 'dao/EnderecoDaoMysql.php';
require 'dao/ImovelDaoMysql.php';

$enderecoDao = new EnderecoDaoMysql($pdo);
$cidadeDao = new CidadeDaoMysql($pdo);
$imovelDao = new ImovelDaoMysql($pdo);

$usuario = $usuarioDaoMysql->findByCpf($_SESSION["cLogin"]);



if (
    isset($_POST['nome']) && !empty($_POST['nome'])
    &&     isset($_POST['email']) && !empty($_POST['email'])
    &&     isset($_POST['telefone']) && !empty($_POST['telefone'])
    &&     isset($_POST['tipo_usuario']) && !empty($_POST['tipo_usuario'])
) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $tipo_usuario = $_POST['tipo_usuario'];


    $usuario->setNome($nome);
    $usuario->setEmail($email);
    $usuario->setTelefone($telefone);
    $usuario->setTipoUsuario($tipo_usuario);

    if ($usuarioDaoMysql->update($usuario)) {

    ?>
        <div class="alert alert-success">
            <strong>Parabéns!</strong> Cadastrado com sucesso. <a href="login.php" class="alert-link">Faça o login agora</a>
        </div>
<?php

    }
}


?>


<div class="container">
    <h1>Meu Perfil</h1>
    <hr>

    <!-- Formulário de Cadastrar Usuário -->
    <form method="POST">

        <div class="form-group">
            <label for="foto-perfil">Foto:</label>

        </div>

        <!-- CPF -->
        <div class="form-group">
            <label for="cpf">CPF:</label>
            <input disabled pattern="[0-9]+" value="<?php echo $usuario->getCpf(); ?>" type="text" name="cpf" id="cpf" class="form-control" maxlength="11" />
        </div>

        <!-- Nome -->
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input value="<?php echo $usuario->getNome(); ?>" type="text" name="nome" id="nome" class="form-control" maxlength="256" />
        </div>

        <!-- E-mail -->
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input value="<?php echo $usuario->getEmail(); ?>" type="email" name="email" id="email" class="form-control" maxlength="200" />
        </div>

        <!-- Telefone -->
        <div class="form-group">
            <label pattern="[0-9]+" for="telefone">Telefone:</label>
            <input value="<?php echo $usuario->getTelefone(); ?>" type="text" name="telefone" id="telefone" class="form-control" maxlength="50" />
        </div>

        <!-- Tipo de Usuário -->
        <div class="form-group">
            <label for="tipo_usuario"> Tipo de Usuário:</label>

            <select class="form-control" name="tipo_usuario" id="tipo_usuario">
                <option value="LOCATARIO" <?php echo ($usuario->getTipoUsuario() == "LOCATARIO") ? 'selected="selected"' : ''; ?>>Locatário</option>
                <option value="PROPRIETARIO" <?php echo ($usuario->getTipoUsuario() == "PROPRIETARIO") ? 'selected="selected"' : ''; ?>>Proprietário</option>
                <option value="AMBOS" <?php echo ($usuario->getTipoUsuario() == "AMBOS") ? 'selected="selected"' : ''; ?>>Ambos</option>
            </select>
        </div>

        <input type="submit" value="Atualizar" class="btn btn-success btn-block btn-lg" />
    </form>
















</div>
<?php require 'pages/footer.php'; ?>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>