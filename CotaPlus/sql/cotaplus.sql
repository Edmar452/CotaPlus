-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28/11/2023 às 21:37
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cotaplus`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(4) NOT NULL,
  `usuario` varchar(90) DEFAULT NULL,
  `telefone` int(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `senha` varchar(90) DEFAULT NULL,
  `cpf_usuario` int(11) DEFAULT NULL,
  `dataNascimento` int(200) DEFAULT NULL,
  `cnpj` int(14) DEFAULT NULL,
  `cep` int(8) DEFAULT NULL,
  `rua` varchar(80) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `numero` int(5) DEFAULT NULL,
  `complemento` varchar(15) DEFAULT NULL,
  `opcao` varchar(50) DEFAULT NULL,
  `nomeCompleto` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`id`, `usuario`, `telefone`, `email`, `senha`, `cpf_usuario`, `dataNascimento`, `cnpj`, `cep`, `rua`, `bairro`, `numero`, `complemento`, `opcao`, `nomeCompleto`) VALUES
(36, 'Ivana', 2147483647, '1959465@unimar.br', '12345', 2147483647, 1960, NULL, NULL, NULL, NULL, NULL, NULL, 'Usuario', 'Ivana bla bla'),
(37, 'ed', 23232233, 'laranjaescolar@gmail.com', '102030', 2147483647, 2004, NULL, NULL, NULL, NULL, NULL, NULL, 'Usuario', 'Edmar augusto Martins'),
(38, 'Carlos', 1231231, '123@d.com', '123', 1231231, 222, NULL, NULL, NULL, NULL, NULL, NULL, 'Usuario', 'Dona Benta');

-- --------------------------------------------------------

--
-- Estrutura para tabela `enderecos`
--

CREATE TABLE `enderecos` (
  `endereco_id` int(11) NOT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `fornecedor_id` int(11) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `neighborhood` varchar(50) DEFAULT NULL,
  `street` varchar(100) DEFAULT NULL,
  `number` varchar(20) DEFAULT NULL,
  `complement` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `id` int(4) NOT NULL,
  `nome` varchar(90) DEFAULT NULL,
  `cnpj` int(14) DEFAULT NULL,
  `cep` int(8) DEFAULT NULL,
  `rua` varchar(80) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `numero` int(5) DEFAULT NULL,
  `complemento` varchar(15) DEFAULT NULL,
  `avaliacao` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(4) NOT NULL,
  `categoria` varchar(30) DEFAULT NULL,
  `referencia` varchar(50) DEFAULT NULL,
  `descricao` varchar(80) DEFAULT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `quantidade` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `enderecos`
--
ALTER TABLE `enderecos`
  ADD PRIMARY KEY (`endereco_id`),
  ADD KEY `cliente_id` (`cliente_id`),
  ADD KEY `fornecedor_id` (`fornecedor_id`);

--
-- Índices de tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de tabela `enderecos`
--
ALTER TABLE `enderecos`
  MODIFY `endereco_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `enderecos`
--
ALTER TABLE `enderecos`
  ADD CONSTRAINT `enderecos_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `enderecos_ibfk_2` FOREIGN KEY (`fornecedor_id`) REFERENCES `fornecedor` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
