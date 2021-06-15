<?php
require 'config.php';
require 'models/Imovel.php';
require 'dao/ImovelDaoMysql.php';
$imovelDao = new ImovelDaoMysql($pdo);

# OPTION VALUES
# 1 = ADD TEST
# 2 = REMOVE TEST
# 3 = UPDATE TEST
# 4 = findByCodigoUsuario TEST
# 5 = findByNumeroSeqEnd TEST
# 6 = findByCodigoImovel TEST
# 7 = findByKeys TEST
# 8 = findByCodigoCidade TEST
$option = 8;

switch ($option) {
    case 1:
      $imovel = new Imovel(
        "2586",
        "191911065",
        "10",
        "55861",
        "RS",
        "Imóvel bonito e limpo!",
        "4",
        "2",
        "1",
        "0",
        "1",
        "1500",
        "0",
      );
      $imovelDao->add($imovel);
      break;
    case 2:
      $imovel = $imovelDao->findByCodigoImovel("2586");
      $imovelDao->remove($imovel);
      break;
    case 3:
      $imovel = $imovelDao->findByCodigoImovel("2586");
      $imovel->setDescricao("Imovel a venda!");
      $imovelDao->update($imovel);
      break;
    case 4:
      $imovel = $imovelDao->findByCodigoUsuario("191911065");
      print_r($imovel);
      break;
    case 5:
      $imovel = $imovelDao->findByNumeroSeqEnd("10");
      print_r($imovel);
      break;
    case 6:
      $imovel = $imovelDao->findByCodigoImovel("2586");
      print_r($imovel);
      break;
    case 7:
      $imovel = $imovelDao->findByKeys("2586", "55861", "191911065", "10");
      print_r($imovel);
      break;
    case 8:
      $imovel = $imovelDao->findByCodigoCidade("55861");
      print_r($imovel);
      break;
}
