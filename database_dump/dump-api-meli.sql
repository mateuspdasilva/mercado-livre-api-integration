-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 03-Ago-2022 às 02:05
-- Versão do servidor: 5.6.41-84.1
-- versão do PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `Nome_banco`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tokenmercado`
--

CREATE TABLE `tokenmercado` (
  `id` smallint(8) NOT NULL,
  `code` text CHARACTER SET latin1 NOT NULL,
  `access_token` text CHARACTER SET latin1 NOT NULL,
  `client_id` text CHARACTER SET latin1 NOT NULL,
  `client_secret` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tokenmercado`
--

INSERT INTO `tokenmercado` (`id`, `code`, `access_token`, `client_id`, `client_secret`) VALUES
(1, '', '', 'client_id', 'client_secret');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tokenmercado`
--
ALTER TABLE `tokenmercado`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tokenmercado`
--
ALTER TABLE `tokenmercado`
  MODIFY `id` smallint(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
