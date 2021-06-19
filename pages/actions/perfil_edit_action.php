<?php
require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../models/Auth.php';
require_once __DIR__ . '/../../models/Estado.php';
require_once __DIR__ . '/../../dao/CidadeDaoMysql.php';
require_once __DIR__ . '/../../dao/EnderecoDaoMysql.php';

$auth = new Auth($pdo, $base_url);
$cidadeDAO = new CidadeDaoMysql($pdo);
$enderecoDao = new EnderecoDaoMysql($pdo);
$usuarioDao = new UsuarioDaoMysql($pdo);
$usuario = $usuarioDao->findByToken($_SESSION["token"]);

$input_email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
$input_nome = filter_input(INPUT_POST, "nome");
$input_telefone = filter_input(INPUT_POST, "telefone");
$input_cpf = filter_input(INPUT_POST, "cpf");
$input_email = filter_input(INPUT_POST, "email");
$input_tipo_usuario = $usuario->getTipoUsuario();
$input_logradouro = filter_input(INPUT_POST, "logradouro");
$input_numero = filter_input(INPUT_POST, "numero");
$input_complemento = filter_input(INPUT_POST, "complemento");
$input_bairro = filter_input(INPUT_POST, "bairro");

$input_cep = filter_input(INPUT_POST, "cep");
$input_nome_cidade = filter_input(INPUT_POST, "nome_cidade");
$input_siglaUF = filter_input(INPUT_POST, "siglaUF");

$input_password = $usuario->getSenha();
$input_password_again = $usuario->getSenha();

$cidade = $cidadeDAO->findByCity($input_siglaUF, $input_nome_cidade);
    if ($cidade){
        $endereco = $enderecoDao->findEndereco($cidade->getCodigoCidade(), $cidade->getUf(), $input_numero, $input_cep);
        if (!$endereco) {
            $endereco = new Endereco(NULL,
                $cidade->getCodigoCidade(),
                $cidade->getUf(),
                $input_logradouro,
                $input_numero,
                $input_complemento,
                $input_bairro,
                $input_cep,     
                );
                $enderecoDao->add($endereco);
        };
        print($input_siglaUF); 
        if ($endereco) {
                $endereco = $enderecoDao->findEndereco($cidade->getCodigoCidade(), $cidade->getUf(), $input_numero, $input_cep);
                $usuarioNew = new Usuario(
                    $input_cpf,
                    $endereco->getNumeroSeqEnd(),
                    $cidade->getCodigoCidade(),
                    $cidade->getUf(),
                    $input_nome,
                    $input_email,
                    $input_telefone,
                    "FOTO",
                    $input_tipo_usuario,
                    $input_password,
                    $usuario->getToken(),
                );
                $usuarioDao->update($usuarioNew);
                header("Location: ".$base_url."/pages/home.php");
                return true;
                exit;
            }
        
}

return false;
header("Location: ".$base_url."/pages/editar_usuario.php");
exit;