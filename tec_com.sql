-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18-Nov-2018 às 14:11
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tec.com`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cpf` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `rua` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `complemento` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bairro` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cidade` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `telefone`, `email`, `cpf`, `rua`, `numero`, `complemento`, `bairro`, `cidade`, `estado`, `senha`) VALUES
(1, 'Cesar Santos', '(35) 99920.6021', 'cesarsantoskdsrl@gmail.com', '098.148.536-74', '', 0, '', 'Bairro dos Maias EstaÃ§Ã£o Dias', 'BrazÃ³polis', 'MG', '202cb962ac59075b964b07152d234b70'),
(3, 'cesar', '(35) 99920.6021', 'cesarkds@gmail.com', '098.148.536-47', '', 0, '', 'Bairro dos Maias EstaÃ§Ã£o Dias', 'BrazÃ³polis', 'MG', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Estrutura da tabela `problema`
--

CREATE TABLE `problema` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `descricao` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `situacao` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `problema`
--

INSERT INTO `problema` (`id`, `id_cliente`, `descricao`, `situacao`) VALUES
(1, 1, 'meu pc nÃ£o liga', 'Cancelado'),
(2, 1, 'meu pc nÃ£o liga', 'Iniciado'),
(3, 1, 'meu pc morreu', 'Iniciado'),
(6, 3, 'minha internet esta lenta\r\n', 'Cancelado'),
(7, 3, 'meu roteador esta desligando sozinho', 'Iniciado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

CREATE TABLE `servicos` (
  `id` int(11) NOT NULL,
  `data_abertura` date NOT NULL,
  `data_termino` date DEFAULT NULL,
  `id_problema` int(11) NOT NULL,
  `tipo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `id_tecnico` int(11) NOT NULL,
  `descricao_servico` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `avaliacao` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`id`, `data_abertura`, `data_termino`, `id_problema`, `tipo`, `id_tecnico`, `descricao_servico`, `avaliacao`) VALUES
(1, '2018-11-12', '2018-11-15', 2, 'Visita TÃ©cnica', 1, 'o equipamento estava com a fonte queimada', 0),
(2, '2018-11-14', '2018-11-14', 3, 'Visita TÃ©cnica', 11, 'tava fora da tomada', 0),
(5, '2018-11-18', NULL, 7, '', 11, '', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tecnico`
--

CREATE TABLE `tecnico` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cpf` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `data_nasc` date NOT NULL,
  `rua` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `complemento` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bairro` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cidade` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `formacao` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `instituicao` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `avaliacao` float DEFAULT NULL,
  `avaliacao_total` int(11) DEFAULT NULL,
  `qtd_serv` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tecnico`
--

INSERT INTO `tecnico` (`id`, `nome`, `telefone`, `email`, `cpf`, `data_nasc`, `rua`, `numero`, `complemento`, `bairro`, `cidade`, `estado`, `formacao`, `instituicao`, `login`, `senha`, `status`, `avaliacao`, `avaliacao_total`, `qtd_serv`) VALUES
(1, 'CÃ©sar Adriano dos Santos', '(35) 9992.06021', 'cesarsantoskdsrl@gmail.com', '098.148.536-74', '1989-11-14', 'Rua', 0, 'Complemento', 'Bairro dos Maias EstaÃ§Ã£o Dias', 'BrazÃ³polis', 'MG', 'TÃ©cnico em InformÃ¡tica', 'CEP- Centro de EducaÃ§Ã£o Profissional &#34;Tancredo Neves&#34; - BrazÃ³polis MG', 'CÃ©sar Santos', '202cb962ac59075b964b07152d234b70', 2, NULL, NULL, NULL),
(2, 'Alexandre Joaquim Pereira', '(35) 99913.6071', 'alexandrejoaquim1999@gmail.com', '117.121.496-01', '1999-09-27', 'Principal', 0, 'Casa', 'Bom Sucesso', 'BrazÃ³polis', 'MG', 'TÃ©cnico em InformÃ¡tica', 'CEP- Centro de EducaÃ§Ã£o Profissional &#34;Tancredo Neves&#34; - BrazÃ³polis MG', 'Alexandre', '827ccb0eea8a706c4c34a16891f84e7b', 2, NULL, NULL, NULL),
(3, 'Jeferson Aparecido HonÃ³rio', '(35) 8428.8562', 'jefferson.ap.honorio@gmail.com', '063.398.896-03', '1982-05-08', '', 0, '', 'Vila Frei Orestes', 'ParaiÃ³po9lis', 'MG', 'TÃ©cnico em InformÃ¡tica', 'CEP- Centro de EducaÃ§Ã£o Profissional &#34;Tancredo Neves&#34; - BrazÃ³polis MG', 'jeferson', '85f34d7bfc44fa2693f66b563610ede3', 2, NULL, NULL, NULL),
(11, 'Welingson Expedito dos Santos', '(35) 9988.14019', 'welingson12@gmail.com', '121.212.121-21', '1998-01-20', 'Rua', 0, 'Complemento', 'Boa Vista', 'BrazÃ³polis', 'MG', 'TÃ©cnico em InformÃ¡tica', 'CEP- Centro de EducaÃ§Ã£o Profissional &#34;Tancredo Neves&#34; - BrazÃ³polis MG', 'welingson12@gmail.com', '202cb962ac59075b964b07152d234b70', 1, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cpf` (`cpf`);

--
-- Indexes for table `problema`
--
ALTER TABLE `problema`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indexes for table `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_problema` (`id_problema`),
  ADD KEY `id_tecnico` (`id_tecnico`);

--
-- Indexes for table `tecnico`
--
ALTER TABLE `tecnico`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf` (`cpf`) USING BTREE,
  ADD UNIQUE KEY `login_2` (`login`,`senha`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `problema`
--
ALTER TABLE `problema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `servicos`
--
ALTER TABLE `servicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tecnico`
--
ALTER TABLE `tecnico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `problema`
--
ALTER TABLE `problema`
  ADD CONSTRAINT `problema_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `servicos`
--
ALTER TABLE `servicos`
  ADD CONSTRAINT `servicos_ibfk_1` FOREIGN KEY (`id_problema`) REFERENCES `problema` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `servicos_ibfk_2` FOREIGN KEY (`id_tecnico`) REFERENCES `tecnico` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
