-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Ago-2022 às 05:09
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
-- Estrutura da tabela `exercicios`
--

CREATE TABLE `exercicios` (
  `id_exercicio` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `repeticoes` varchar(10) NOT NULL,
  `descanso` varchar(20) NOT NULL,
  `_id_ficha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `exercicios`
--

INSERT INTO `exercicios` (`id_exercicio`, `nome`, `repeticoes`, `descanso`, `_id_ficha`) VALUES
(1, 'Supino Reto (barra)', '4x 12', '30\"', 4),
(2, 'Supino Inclinado (barra)', '4x 12', '30\"', 4),
(3, 'Crucifixo Polia ALta (Cross Over)', '4x 12', '30\"', 4),
(4, 'Chest Press', '4x 12', '30\"', 4),
(5, 'Tríceps no Pulley (corda)', '4x 12', '30\"', 4),
(6, 'Tríceps no Pulley (barra reta)', '4x 12', '30\"', 4),
(7, 'Tríceps Invertido (unilateral)', '4x 12', '30\"', 4),
(8, 'Tríceps Frances (halter)', '4x 12', '30\"', 4),
(9, 'Abdominal (solo)', '3x 30', '30\"', 4),
(10, 'Puxador Frontal Aberto', '4x 12', '30\"', 5),
(11, 'Remada Serrote', '4x 12', '30\"', 5),
(12, 'Remada Horizontal Aberta', '4x 12', '30\"', 5),
(13, 'Remada no Cabo Sentado', '4x 12', '30\"', 5),
(14, 'Rosca (barra W)', '4x 12', '30\"', 5),
(15, 'Bíceps Scott (unilateral)', '4x 12', '30\"', 5),
(16, 'Bíceps Halter (martelo)', '4x 12', '30\"', 5),
(17, 'Abdominal Cruzado (solo)', '3x 30', '30\"', 5),
(18, 'Agachamento no Smith', '4x12', '30\"', 6),
(19, 'Leg Press 180', '4x 12', '30\"', 6),
(20, 'Extensão de Joelhos', '4x 12', '30\"', 6),
(21, 'Mesa FLexora', '4x 12', '30\"', 6),
(22, 'Abductor', '4x 12', '30\"', 6),
(23, 'Panturrilha em pé (hack)', '4x 12', '30\"', 6),
(24, 'Panturrilha Sentado', '4x 12', '30\"', 6),
(25, 'Desenvolvimento Frente (halter)', '4x 12', '30\"', 6),
(26, 'Elevação Lateral', '4x 12', '30\"', 6),
(27, 'Elevação Frontal (halter)', '4x 12', '30\"', 6),
(28, 'Encolhimento (halter)', '4x 12', '30\"', 6),
(29, 'Abdominal (solo)', '3x 30', '30\"', 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fichas`
--

CREATE TABLE `fichas` (
  `id_ficha` int(11) NOT NULL,
  `nome` varchar(1) NOT NULL,
  `_id_treino` int(11) NOT NULL,
  `id_ficha_anterior` varchar(1) NOT NULL,
  `background` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `fichas`
--

INSERT INTO `fichas` (`id_ficha`, `nome`, `_id_treino`, `id_ficha_anterior`, `background`) VALUES
(1, 'A', 1, '3', 'bg-abdome'),
(2, 'B', 1, '1', 'bg-aerobico'),
(3, 'C', 1, '2', 'bg-ombro'),
(4, 'A', 2, '6', 'bg-peito'),
(5, 'B', 2, '4', 'bg-biceps'),
(6, 'C', 2, '5', 'bg-perna');

-- --------------------------------------------------------

--
-- Estrutura da tabela `treinos`
--

CREATE TABLE `treinos` (
  `id_treino` int(11) NOT NULL,
  `objetivo` varchar(20) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `treinos`
--

INSERT INTO `treinos` (`id_treino`, `objetivo`, `nome`) VALUES
(1, 'emagrecimento', 'Treino de emagrecimento'),
(2, 'hipertrofia', 'Treino de hipertrofia');

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
  `_id_ultima_ficha` int(11) NOT NULL,
  `ultima_ficha_completa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuarios`, `nome`, `email`, `cpf`, `nascimento`, `senha`, `plano`, `numero_cartao`, `titular_cartao`, `vencimento`, `cvv`, `cpf_titular`, `objetivo`, `_id_ultima_ficha`, `ultima_ficha_completa`) VALUES
(12, 'Cristian Leoncini', 'crisvini.leoncini@outlook.com', '444.252.888-82', '12/02/2001', '01c28a3b53576f31689ea49e2bc0bcec', 'anual', '9999 9999 9999 9999', 'Cristian V L Lopes', '12/2030', '123', '444.252.888-82', 'hipertrofia', 4, 6);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `exercicios`
--
ALTER TABLE `exercicios`
  ADD PRIMARY KEY (`id_exercicio`),
  ADD KEY `_id_ficha` (`_id_ficha`);

--
-- Índices para tabela `fichas`
--
ALTER TABLE `fichas`
  ADD PRIMARY KEY (`id_ficha`),
  ADD KEY `_id_treino` (`_id_treino`);

--
-- Índices para tabela `treinos`
--
ALTER TABLE `treinos`
  ADD PRIMARY KEY (`id_treino`);

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
-- AUTO_INCREMENT de tabela `exercicios`
--
ALTER TABLE `exercicios`
  MODIFY `id_exercicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `fichas`
--
ALTER TABLE `fichas`
  MODIFY `id_ficha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `treinos`
--
ALTER TABLE `treinos`
  MODIFY `id_treino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `exercicios`
--
ALTER TABLE `exercicios`
  ADD CONSTRAINT `exercicios_ibfk_1` FOREIGN KEY (`_id_ficha`) REFERENCES `fichas` (`id_ficha`);

--
-- Limitadores para a tabela `fichas`
--
ALTER TABLE `fichas`
  ADD CONSTRAINT `fichas_ibfk_1` FOREIGN KEY (`_id_treino`) REFERENCES `treinos` (`id_treino`);

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `_id_ultima_ficha` FOREIGN KEY (`_id_ultima_ficha`) REFERENCES `fichas` (`id_ficha`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
