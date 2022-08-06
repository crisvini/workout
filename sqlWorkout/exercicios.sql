-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Ago-2022 às 00:26
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
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `exercicios`
--
ALTER TABLE `exercicios`
  MODIFY `id_exercicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `exercicios`
--
ALTER TABLE `exercicios`
  ADD CONSTRAINT `exercicios_ibfk_1` FOREIGN KEY (`_id_ficha`) REFERENCES `fichas` (`id_ficha`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
