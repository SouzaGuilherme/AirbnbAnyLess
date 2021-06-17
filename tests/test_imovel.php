<?php
require '../config.php';
require '../models/Imovel.php';
require '../dao/ImovelDaoMysql.php';
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
$option = 1;

switch ($option) {
    case 1:
      $imovel = new Imovel(
        2,
        '0348123145',
        2,
        4,
        'RS',
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam dignissim auctor dolor non ultrices. Etiam malesuada condimentum nisi, sed maximus nibh suscipit ut. Integer vel tincidunt nisi. In at facilisis elit. Phasellus vel elit nec sem lobortis suscipit. Nam mattis eros finibus dui imperdiet faucibus et sed risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Vestibulum interdum feugiat lacus vel porttitor. Etiam felis sapien, auctor eget ipsum a, vulputate suscipit justo. In hac habitasse platea dictumst. Sed vel viverra quam. Curabitur imperdiet posuere nulla ac facilisis. Ut non pretium lacus. Etiam a metus pulvinar, dignissim nisi sit amet, cursus sem. Aliquam ac molestie lectus, sit amet ultricies purus. Suspendisse rutrum placerat lobortis. Duis quis diam sagittis, rutrum erat at, varius ex. Suspendisse potenti. Nulla ut varius sapien, at ullamcorper dolor. Integer et arcu est. Suspendisse.",
        1,
        1,
        3,
        4,
        2,
        123,
        1,
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
