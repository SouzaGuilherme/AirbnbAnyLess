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
        "1515",
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
      $imovel = $imovelDao->findByCodigo_imovel("2586");
      $imovelDao->remove($imovel);
      break;
    case 3:
      $imovel = $imovelDao->findByCodigo_imovel("2586");
      $imovel->setDescricao("Imovel a venda!");
      $imovelDao->update($imovel);
      break;
    case 4:
      $imovel = $imovelDao->findByCodigo_usuario("191911065");
      print_r($imovel);
      break;
    case 5:
      $imovel = $imovelDao->findByNumero_seqEnd("10");
      print_r($imovel);
      break;
    case 6:
      $imovel = $imovelDao->findByCodigo_imovel("2586");
      print_r($imovel);
      break;
    case 7:
      $imovel = $imovelDao->findByKeys("2586", "55861", "191911065", "10");
      print_r($imovel);
      break;
    case 8:
      $imovel = $imovelDao->findByCodigo_cidade("55861");
      print_r($imovel);
      break;
}
