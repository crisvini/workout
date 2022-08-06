-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Ago-2022 às 00:30
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `workout`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuarios` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `nascimento` varchar(10) NOT NULL,
  `senha` varchar(500) NOT NULL,
  `plano` varchar(100) NOT NULL,
  `numero_cartao` varchar(19) NOT NULL,
  `titular_cartao` varchar(100) NOT NULL,
  `vencimento` varchar(7) NOT NULL,
  `cvv` varchar(3) NOT NULL,
  `cpf_titular` varchar(14) NOT NULL,
  `objetivo` varchar(20) NOT NULL,
  `_id_ultima_ficha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuarios`, `nome`, `email`, `cpf`, `nascimento`, `senha`, `plano`, `numero_cartao`, `titular_cartao`, `vencimento`, `cvv`, `cpf_titular`, `objetivo`, `_id_ultima_ficha`) VALUES
(12, 'Cristian Leoncini', 'crisvini.leoncini@outlook.com', '444.252.888-82', '12/02/2001', '01c28a3b53576f31689ea49e2bc0bcec', 'anual', '9999 9999 9999 9999', 'Cristian V L Lopes', '12/2030', '123', '444.252.888-82', 'hipertrofia', 4);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuarios`),
  ADD KEY `_id_ultima_ficha` (`_id_ultima_ficha`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `_id_ultima_ficha` FOREIGN KEY (`_id_ultima_ficha`) REFERENCES `fichas` (`id_ficha`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
