<?php
require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../models/Auth.php';
require_once __DIR__ . '/../../models/Estado.php';


require_once __DIR__ . '/../../dao/CidadeDaoMysql.php';
require_once __DIR__ . '/../../dao/EnderecoDaoMysql.php';
require_once __DIR__ . '/../../dao/ImovelDaoMysql.php';
require_once __DIR__ . '/../../dao/UsuarioDaoMysql.php';

# Dao
$cidadeDao = new CidadeDaoMysql($pdo);
$enderecoDao = new EnderecoDaoMysql($pdo);
$imovelDao = new ImovelDaoMysql($pdo);
$usuarioDao = new UsuarioDaoMysql($pdo);

# Endereço
$input_logradouro = filter_input(INPUT_POST, "logradouro");
$input_numero = filter_input(INPUT_POST, "numero");
$input_complemento = filter_input(INPUT_POST, "complemento");
$input_bairro = filter_input(INPUT_POST, "bairro");
$input_cep = filter_input(INPUT_POST, "cep");

# Cidade
$input_nome_cidade = filter_input(INPUT_POST, "nome_cidade");
$input_siglaUF = filter_input(INPUT_POST, "uf");

# Imóvel
$input_descricao = filter_input(INPUT_POST, "descricao");
$input_qtd_quartos = filter_input(INPUT_POST, "qtd_quartos");
$input_qtd_banheiros = filter_input(INPUT_POST, "qtd_banheiros");
$input_qtd_vagas_garagem= filter_input(INPUT_POST, "qtd_vagas_garagem");
$input_qtd_salas = filter_input(INPUT_POST, "qtd_salas");
$input_piscina = filter_input(INPUT_POST, "piscina");
$input_valor = filter_input(INPUT_POST, "valor");
$input_habilitado = filter_input(INPUT_POST, "habilitado");


$usuario = $usuarioDao->findByToken($_SESSION["token"]);


$cidade = $cidadeDao->findByCity($input_siglaUF, $input_nome_cidade);
if ($cidade){
    $endereco = $enderecoDao->findEndereco($cidade->getCodigoCidade(), $cidade->getUf(), $input_numero, $input_cep);

    if (!$endereco) {
        $endereco = new Endereco(
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

    if ($endereco) {
        $imovel = new Imovel(            
            $usuario->getCpf(),
            $endereco->getNumeroSeqEnd(),
            $cidade->getCodigoCidade(),
            $cidade->getUf(),
            $input_descricao,
            $input_qtd_quartos,
            $input_qtd_banheiros,
            $input_qtd_salas,
            $input_piscina,
            $input_qtd_vagas_garagem,
            $input_valor,
            $input_habilitado
        );
        $imovelDao->add($imovel);
        header("Location: ".$base_url."/pages/home.php");
        return true;
    }
}

header("Location: ".$base_url."/pages/cadastrar_imovel.php");
exit;