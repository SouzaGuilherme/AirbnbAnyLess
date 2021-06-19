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
$reservaDao = new UsuarioDaoMysql($pdo);

$input_codigo_imovel = filter_input(INPUT_GET, "ids");
# Endereço
$input_logradouro = filter_input(INPUT_GET, "logradouro");
$input_numero = filter_input(INPUT_GET, "numero");
$input_complemento = filter_input(INPUT_GET, "complemento");
$input_bairro = filter_input(INPUT_GET, "bairro");
$input_cep = filter_input(INPUT_GET, "cep");

# Cidade
$input_nome_cidade = filter_input(INPUT_GET, "nome_cidade");
$input_siglaUF = filter_input(INPUT_GET, "uf");

# Imóvel
$input_descricao = filter_input(INPUT_GET, "descricao");
$input_qtd_quartos = filter_input(INPUT_GET, "qtd_quartos");
$input_qtd_banheiros = filter_input(INPUT_GET, "qtd_banheiros");
$input_qtd_vagas_garagem = filter_input(INPUT_GET, "qtd_vagas_garagem");
$input_qtd_salas = filter_input(INPUT_GET, "qtd_salas");
$input_piscina = filter_input(INPUT_GET, "piscina");
$input_valor = filter_input(INPUT_GET, "valor");
$input_habilitado = filter_input(INPUT_GET, "habilitado");

$imovel = $imovelDao->findByCodigoImovel($input_codigo_imovel);
$imovel->setUf($input_siglaUF);
$imovel->setDescricao($input_descricao);
$imovel->setQtdQuartos($input_qtd_quartos);
$imovel->setQtdBanheiros($input_qtd_banheiros);
$imovel->setVagasGaragem($input_qtd_vagas_garagem);
$imovel->setQtdSalas($input_qtd_salas);
$imovel->setPiscina($input_piscina);
$imovel->setValor($input_valor);
$imovel->setHabilitado($input_habilitado);

$usuario = $usuarioDao->findByToken($_SESSION["token"]);

$cidade = $cidadeDao->findByCity($input_siglaUF, $input_nome_cidade);
$imovel->setCodigoCidade($cidade->getCodigoCidade());

if ($cidade) {
    $endereco = $enderecoDao->findEndereco($cidade->getCodigoCidade(), $cidade->getUf(), $input_numero, $input_cep);
    if (!$endereco) {
        $endereco = new Endereco(
            NULL,
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
    #print($input_siglaUF); 

    if ($endereco) {
        #$endereco = $enderecoDao->findEndereco($cidade->getCodigoCidade(), $cidade->getUf(), $input_numero, $input_cep);
        $imovelDao->update($imovel);
        header("Location: " . $base_url . "/pages/list_owner.php");
        return true;
        exit;
    }
}

header("Location: " . $base_url . "/pages/owner.php");
exit;
