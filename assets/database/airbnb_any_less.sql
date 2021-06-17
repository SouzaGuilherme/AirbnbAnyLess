-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 15-Maio-2021 às 21:41
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `airbnb_any_less`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidades`
--

CREATE TABLE `cidades` (
  `codigo_cidade` int(10) NOT NULL COMMENT 'Código da cidade',
  `uf` varchar(200) NOT NULL COMMENT 'Nome do UF por extenso	',
  `nome` varchar(200) NOT NULL COMMENT 'Nome do Cidade por extenso	'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cidades`
--

INSERT INTO `cidades` (`codigo_cidade`, `uf`, `nome`) VALUES
(1, 'ES', 'Afonso Cláudio'),
(2, 'ES', 'Água Doce do Norte'),
(3, 'ES', 'Águia Branca'),
(4, 'ES', 'Alegre'),
(5, 'ES', 'Alfredo Chaves'),
(6, 'ES', 'Alto Rio Novo'),
(7, 'ES', 'Anchieta'),
(8, 'ES', 'Apiacá'),
(9, 'ES', 'Aracruz'),
(10, 'ES', 'Atilio Vivacqua');

-- --------------------------------------------------------

--
-- Estrutura da tabela `enderecos`
--

CREATE TABLE `enderecos` (
  `numero_seq_end` int(10) NOT NULL COMMENT 'Número sequencial do endereço ',
  `codigo_cidade` int(10) NOT NULL COMMENT 'Código da cidade',
  `uf` varchar(200) NOT NULL COMMENT 'Nome do UF por extenso',
  `logradouro` varchar(200) NOT NULL COMMENT 'Logradouro do Endereço',
  `numero` int(6) NOT NULL COMMENT 'Número do Endereço',
  `complemento` varchar(200) NOT NULL COMMENT '	Complemento do Endereço	',
  `bairro` varchar(200) NOT NULL COMMENT 'Bairro do Endereço',
  `cep` varchar(9) NOT NULL COMMENT 'CEP do Endereço'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `enderecos`
--

INSERT INTO `enderecos` (`numero_seq_end`, `codigo_cidade`, `uf`, `logradouro`, `numero`, `complemento`, `bairro`, `cep`) VALUES
(2, 4, 'ES', 'Moreria Cesar', 671, 'Loja X', 'Centro', '96450000');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estados`
--

CREATE TABLE `estados` (
  `uf` varchar(200) NOT NULL COMMENT 'Nome do UF por extenso'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `estados`
--

INSERT INTO `estados` (`uf`) VALUES
('AC'),
('AL'),
('AM'),
('AP'),
('BA'),
('CE'),
('DF'),
('ES'),
('GO'),
('MA'),
('MG'),
('MS'),
('MT'),
('PA'),
('PB'),
('PE'),
('PI'),
('PR'),
('RJ'),
('RN'),
('RO'),
('RR'),
('RS'),
('SC'),
('SE'),
('SP'),
('TO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imoveis`
--

CREATE TABLE `imoveis` (
  `codigo_imovel` int(10) NOT NULL COMMENT 'Código do Imóvel',
  `cpf` varchar(11) NOT NULL COMMENT 'CPF de Usuário',
  `numero_seq_end` int(10) NOT NULL COMMENT 'Número sequência do endereço',
  `codigo_cidade` int(10) NOT NULL COMMENT 'Código da Cidade',
  `uf` varchar(200) NOT NULL COMMENT 'Nome do UF por extenso	',
  `descricao` varchar(500) NOT NULL COMMENT 'Descrição do Imóvel',
  `qtd_quartos` int(2) NOT NULL COMMENT 'Quantidade de Quartos',
  `qtd_banheiros` int(2) NOT NULL COMMENT 'Quantidade de Banheiros',
  `qtd_salas` int(2) NOT NULL COMMENT 'Quantidade de Salas',
  `piscina` tinyint(1) NOT NULL COMMENT 'Piscina ',
  `vagas_garagem` int(2) NOT NULL COMMENT 'Quantidade de vagas na garagem',
  `valor` double NOT NULL COMMENT 'Valor para alugar o Imóvel',
  `habilitado` tinyint(1) NOT NULL COMMENT 'Representa se o imóvel está alugado ou não'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `imoveis`
--

INSERT INTO `imoveis` (`codigo_imovel`, `cpf`, `numero_seq_end`, `codigo_cidade`, `uf`, `descricao`, `qtd_quartos`, `qtd_banheiros`, `qtd_salas`, `piscina`, `vagas_garagem`, `valor`, `habilitado`) VALUES
(1, '0348123123', 2, 4, 'ES', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam dignissim auctor dolor non ultrices. Etiam malesuada condimentum nisi, sed maximus nibh suscipit ut. Integer vel tincidunt nisi. In at facilisis elit. Phasellus vel elit nec sem lobortis suscipit. Nam mattis eros finibus dui imperdiet faucibus et sed risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Vestibulum interdum feugiat lacus vel porttitor. Etiam felis sapien, auctor eget ipsum a, vulputate suscipit justo. In hac habitasse platea dictumst. Sed vel viverra quam. Curabitur imperdiet posuere nulla ac facilisis. Ut non pretium lacus. Etiam a metus pulvinar, dignissim nisi sit amet, cursus sem. Aliquam ac molestie lectus, sit amet ultricies purus. Suspendisse rutrum placerat lobortis. Duis quis diam sagittis, rutrum erat at, varius ex. Suspendisse potenti. Nulla ut varius sapien, at ullamcorper dolor. Integer et arcu est. Suspendisse.', 1, 1, 3, 4, 2, 123, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `reservas`
--

CREATE TABLE `reservas` (
  `codigo_reserva` int(10) NOT NULL COMMENT 'Código da Reserva',
  `codigo_imovel` int(10) NOT NULL COMMENT 'Código do Imóvel',
  `cpf` varchar(11) NOT NULL COMMENT 'CPF do Usuário',
  `data_inicial` date NOT NULL COMMENT 'Data Final da Inicial',
  `data_final` date NOT NULL COMMENT 'Código Final da Reserva'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `cpf` varchar(11) NOT NULL COMMENT 'CPF',
  `numero_seq_end` int(10) NOT NULL COMMENT 'Número sequencial do endereço',
  `codigo_cidade` int(10) NOT NULL COMMENT 'Código da cidade',
  `uf` varchar(200) NOT NULL COMMENT 'Nome do UF por extenso',
  `nome` varchar(256) NOT NULL COMMENT 'Nome usuário',
  `email` varchar(200) NOT NULL COMMENT 'E-mail do usuário',
  `telefone` varchar(50) NOT NULL COMMENT 'Telefone do usuário',
  `foto` varchar(200) NOT NULL COMMENT 'Nome do arquivo da foto do usuário',
  `tipo_usuario` varchar(50) NOT NULL COMMENT 'Tipo do Locatário: "LOCATARIO", "PROPRIETARIO", "AMBOS"',
  `senha` varchar(32) NOT NULL COMMENT 'Senha criptografada em MD5 ',
  `token` varchar(200) NOT NULL COMMENT 'Token para login'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`cpf`, `numero_seq_end`, `codigo_cidade`, `uf`, `nome`, `email`, `telefone`, `foto`, `tipo_usuario`, `senha`, `token`) VALUES
('0348123123', 2, 4, 'ES', 'Thiago Heron Ávila', 'thiagoheronavila@gmail.com', '53999589276', 'FOTO', 'AMBOS', '1234', 'a88a866ffe3545464f41aa19fb9fead0'),
('03482023000', 2, 4, 'ES', 'Thiago Heron Ávila', 'thiagoheronavila@gmail.com', '53999589276', 'FOTO', '', '1234', '05033af5a97f09af2521163d0c52a3a1'),
('0348202323', 2, 4, 'ES', 'Thiago Heron Ávila', 'thiagoheronavila@gmail.com', '53999589276', 'FOTO', 'AMBOS', '1234', 'token');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cidades`
--
ALTER TABLE `cidades`
  ADD PRIMARY KEY (`codigo_cidade`,`uf`),
  ADD KEY `cidade_uf` (`uf`);

--
-- Índices para tabela `enderecos`
--
ALTER TABLE `enderecos`
  ADD PRIMARY KEY (`numero_seq_end`,`codigo_cidade`,`uf`),
  ADD KEY `endereco_uf` (`uf`),
  ADD KEY `codigo_cidade` (`codigo_cidade`);

--
-- Índices para tabela `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`uf`);

--
-- Índices para tabela `imoveis`
--
ALTER TABLE `imoveis`
  ADD PRIMARY KEY (`codigo_imovel`),
  ADD KEY `imoveis_cpf` (`cpf`),
  ADD KEY `imoveis_codigo_cidade` (`codigo_cidade`),
  ADD KEY `imoveis_numero_seq_end` (`numero_seq_end`);

--
-- Índices para tabela `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`codigo_imovel`,`cpf`,`data_inicial`),
  ADD UNIQUE KEY `codigo_reserva` (`codigo_reserva`),
  ADD KEY `reservas_cpf` (`cpf`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cpf`),
  ADD KEY `usuario_codigo_cidade` (`codigo_cidade`),
  ADD KEY `usuario_uf` (`uf`),
  ADD KEY `usuario_numero_seq_end` (`numero_seq_end`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `enderecos`
--
ALTER TABLE `enderecos`
  MODIFY `numero_seq_end` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Número sequencial do endereço ', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `imoveis`
--
ALTER TABLE `imoveis`
  MODIFY `codigo_imovel` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Código do Imóvel', AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cidades`
--
ALTER TABLE `cidades`
  ADD CONSTRAINT `cidade_uf` FOREIGN KEY (`uf`) REFERENCES `estados` (`uf`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `enderecos`
--
ALTER TABLE `enderecos`
  ADD CONSTRAINT `codigo_cidade` FOREIGN KEY (`codigo_cidade`) REFERENCES `cidades` (`codigo_cidade`),
  ADD CONSTRAINT `endereco_uf` FOREIGN KEY (`uf`) REFERENCES `estados` (`uf`);

--
-- Limitadores para a tabela `imoveis`
--
ALTER TABLE `imoveis`
  ADD CONSTRAINT `imoveis_codigo_cidade` FOREIGN KEY (`codigo_cidade`) REFERENCES `cidades` (`codigo_cidade`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `imoveis_cpf` FOREIGN KEY (`cpf`) REFERENCES `usuarios` (`cpf`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `imoveis_numero_seq_end` FOREIGN KEY (`numero_seq_end`) REFERENCES `enderecos` (`numero_seq_end`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_codigo_imovel` FOREIGN KEY (`codigo_imovel`) REFERENCES `imoveis` (`codigo_imovel`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `reservas_cpf` FOREIGN KEY (`cpf`) REFERENCES `usuarios` (`cpf`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuario_codigo_cidade` FOREIGN KEY (`codigo_cidade`) REFERENCES `enderecos` (`codigo_cidade`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `usuario_numero_seq_end` FOREIGN KEY (`numero_seq_end`) REFERENCES `enderecos` (`numero_seq_end`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `usuario_uf` FOREIGN KEY (`uf`) REFERENCES `enderecos` (`uf`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
