<?php
require 'config.php';
require 'models/Imovel.php';
require 'dao/ImovelDaoMysql.php';

$imovelDao = new ImovelDaoMysql($pdo);

# OPTION VALUES
# 1 = ADD TEST
# 2 = REMOVE TEST
# 3 = UPDATE TEST
# 4 = findByCodigo_Usuario TEST
# 5 = findByNumERO_seqEnd TEST
# 6 = findByCodigo_imovel TEST
# 7 = findByKeys TEST
# 8 = findByCodigo_cidade TEST
$option = 1;

switch ($option) {
    case 1:
      $imovel = new Imovel(
        "6258", // Código imovél 
        "32165498", // Código usuário
        "97", // número_seq_end
        "75498", // Código cidade
        "PR", // UF
        "Imóvel da Katty Perry!", // Descrição
        "8", // Qtd quartos
        "8", // Qtd banheiros
        "3", // Qtd salas
        "2", // piscina
        "10", // Vagas garagem
        "4500", // Valor
        "0", // Alugado?
      );
      $imovelDao->add($imovel); // ADD TEST( Status -> OK!)
      break;

    case 2:
      // Escolher o tipo de busca:
      $imovel = $imovelDao->findByCodigo_imovel("2586"); // TEST(Status -> OK!)
      //$imovel = $imovelDao->findByCodigoUsuario("32165498"); // TEST( Status -> OK!)
      //$imovel = $imovelDao->findByNumeroSeqEnd("97"); // TEST( Status -> OK!)
      $imovelDao->remove($imovel);
      break;

    case 3:
      $imovel = $imovelDao->findByCodigo_imovel("6258"); // TEST( Status -> OK!)
      $imovel->setDescricao("Imovel a venda!"); // TEST( Status -> OK!)
      $imovelDao->update($imovel); // TEST( Status -> OK!)
      break;
      
    case 4:
      $imovel = $imovelDao->findByCodigo_usuario("191911065"); // TEST( Status -> OK!)
      print_r($imovel); 
      break;

    case 5:
      $imovel = $imovelDao->findByNumero_seqEnd("10"); // TEST( Status -> OK!)
      print_r($imovel);
      break;
    case 6:

      $imovel = $imovelDao->findByCodigo_imovel("2586"); // TEST( Status -> OK!)
      print_r($imovel);
      break;

    case 7:
      $imovel = $imovelDao->findByKeys("2586", "55861", "191911065", "10"); // TEST( Status -> OK!)
      print_r($imovel);
      break;

    case 8:
      $imovel = $imovelDao->findByCodigo_cidade("55861"); // TEST( Status -> OK!)
      print_r($imovel);
      break;
}
