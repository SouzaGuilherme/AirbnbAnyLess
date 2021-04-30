-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 30-Abr-2021 às 03:38
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `enderecos`
--

CREATE TABLE `enderecos` (
  `numero_seq_end` int(10) NOT NULL COMMENT 'Número sequencial do endereço	',
  `codigo_cidade` int(10) NOT NULL COMMENT 'Código da cidade',
  `uf` varchar(200) NOT NULL COMMENT 'Nome do UF por extenso',
  `logradouro` varchar(200) NOT NULL COMMENT 'Logradouro do Endereço',
  `numero` int(6) NOT NULL COMMENT 'Número do Endereço',
  `complemento` varchar(200) NOT NULL COMMENT '	Complemento do Endereço	',
  `bairro` varchar(200) NOT NULL COMMENT 'Bairro do Endereço',
  `cep` varchar(9) NOT NULL COMMENT 'CEP do Endereço'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estados`
--

CREATE TABLE `estados` (
  `uf` varchar(200) NOT NULL COMMENT 'Nome do UF por extenso'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `imoveis`
--

CREATE TABLE `imoveis` (
  `codigo_imovel` int(10) NOT NULL COMMENT 'Código do Imóvel',
  `codigo_usuario` int(10) NOT NULL COMMENT 'Código de Usuário',
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
  `alugado` tinyint(1) NOT NULL COMMENT 'Representa se o imóvel está alugado ou não'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `reservas`
--

CREATE TABLE `reservas` (
  `codigo_reserva` int(10) NOT NULL COMMENT 'Código da Reserva',
  `codigo_imovel` int(10) NOT NULL COMMENT 'Código do Imóvel',
  `cpf` int(11) NOT NULL COMMENT 'CPF do Usuário',
  `data_inicial` date NOT NULL COMMENT 'Data Final da Inicial',
  `date_final` date NOT NULL COMMENT 'Código Final da Reserva'
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
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cidades`
--
ALTER TABLE `cidades`
  ADD PRIMARY KEY (`codigo_cidade`,`uf`);

--
-- Índices para tabela `enderecos`
--
ALTER TABLE `enderecos`
  ADD PRIMARY KEY (`numero_seq_end`,`codigo_cidade`,`uf`);

--
-- Índices para tabela `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`uf`);

--
-- Índices para tabela `imoveis`
--
ALTER TABLE `imoveis`
  ADD PRIMARY KEY (`codigo_imovel`);

--
-- Índices para tabela `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`codigo_reserva`,`codigo_imovel`,`cpf`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cpf`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
