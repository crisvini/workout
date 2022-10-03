-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 19-Set-2022 às 20:34
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
-- Banco de dados: `workou68_workout`
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
(3, 'Crucifixo Polia Alta (Cross Over)', '4x 12', '30\"', 4),
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
(21, 'Mesa Flexora', '4x 12', '30\"', 6),
(22, 'Abdutor', '4x 12', '30\"', 6),
(23, 'Panturrilha em pé (hack)', '4x 12', '30\"', 6),
(24, 'Panturrilha Sentado', '4x 12', '30\"', 6),
(25, 'Desenvolvimento Frente (halter)', '4x 12', '30\"', 6),
(26, 'Elevação Lateral', '4x 12', '30\"', 6),
(27, 'Elevação Frontal (halter)', '4x 12', '30\"', 6),
(28, 'Encolhimento (halter)', '4x 12', '30\"', 6),
(29, 'Abdominal (solo)', '3x 30', '30\"', 6),
(30, 'Supino Declinado', '3x 12', '30\"', 1),
(31, 'Supino Reto', '3x 12', '30\"', 1),
(32, 'Supino Inclinado Cross', '3x 12', '30\"', 1),
(33, 'Crucifixo Reto', '3x 12', '30\"', 1),
(34, 'Triceps Testa', '3x 12', '30\"', 1),
(36, 'Triceps Corda', '3x 12', '30\"', 1),
(37, 'Triceps Pulley', '3x 12', '30\"', 1),
(38, 'Abdominal Militar', '3x 30', '30\"', 1),
(39, 'Cadeira Extensora', '3x 12', '30\"', 2),
(40, 'Cadeira Flexora', '3x 12', '30\"', 2),
(41, 'Legpress', '3x 12', '30\"', 2),
(42, 'Panturrilha Vertical', '3x 12', '30\"', 2),
(43, 'Avanço', '3x 12', '30\"', 2),
(44, 'Elevação Frontal no Cross', '3x 12', '30\"', 2),
(45, 'Elevação Lateral', '3x 12', '30\"', 2),
(46, 'Remada Alta', '3x 12', '30\"', 2),
(47, 'Abdominal Infra', '3x 30', '30\"', 2),
(48, 'Puxador Frontal Aberto', '3x 12', '30\"', 3),
(49, 'Pullover Cross', '3x 12', '30\"', 3),
(50, 'Remada Baixa', '3x 12', '30\"', 3),
(51, 'Crucifixo Inverso', '3x 12', '30\"', 3),
(52, 'Banco Scott', '3x 12', '30\"', 3),
(53, 'Rosca Alternada', '3x 12', '30\"', 3),
(54, 'Rosca Direta Cross', '3x 12', '30\"', 3);

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
-- Estrutura da tabela `metas`
--

CREATE TABLE `metas` (
  `id_metas` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(300) NOT NULL,
  `pontos` int(11) NOT NULL,
  `_id_exercicio` int(10) NOT NULL,
  `quantidade` int(10) NOT NULL,
  `ativo` varchar(10) NOT NULL,
  `_id_treino` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `metas`
--

INSERT INTO `metas` (`id_metas`, `nome`, `descricao`, `pontos`, `_id_exercicio`, `quantidade`, `ativo`, `_id_treino`) VALUES
(4, 'Supino reto', 'Faça 96 repetições de supino reto', 96, 1, 96, 'true', 2),
(5, 'Encolhimento (halter)', 'Faça 48 repetições de encolhimento (halter)', 48, 28, 48, 'true', 2),
(9, 'Elevação lateral', 'Faça 48 repetições de elevação lateral', 48, 26, 48, 'true', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `metas_usuarios`
--

CREATE TABLE `metas_usuarios` (
  `id_metas_usuarios` int(11) NOT NULL,
  `_id_usuarios` int(11) NOT NULL,
  `_id_metas` int(11) NOT NULL,
  `completo` varchar(10) NOT NULL,
  `quantidade_concluida` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `metas_usuarios`
--

INSERT INTO `metas_usuarios` (`id_metas_usuarios`, `_id_usuarios`, `_id_metas`, `completo`, `quantidade_concluida`) VALUES
(48, 40, 4, 'false', 0),
(49, 40, 5, 'false', 0),
(50, 40, 9, 'false', 0),
(51, 42, 4, 'true', 96),
(52, 42, 5, 'false', 0),
(53, 42, 9, 'false', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`id_perfil`, `nome`) VALUES
(1, 'usuario'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ranking`
--

CREATE TABLE `ranking` (
  `id_ranking` int(11) NOT NULL,
  `_id_usuario` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `pontuacao` int(11) NOT NULL,
  `_id_treino` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `ranking`
--

INSERT INTO `ranking` (`id_ranking`, `_id_usuario`, `nome`, `pontuacao`, `_id_treino`) VALUES
(3, 40, 'Cristian Vinícius Leoncini Lopes', 0, 1),
(6, 42, 'Fabiano Teste', 96, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `treinos`
--

CREATE TABLE `treinos` (
  `id_treino` int(11) NOT NULL,
  `objetivo` varchar(20) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `ultima_ficha_completa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `treinos`
--

INSERT INTO `treinos` (`id_treino`, `objetivo`, `nome`, `ultima_ficha_completa`) VALUES
(1, 'emagrecimento', 'Emagrecimento', 3),
(2, 'hipertrofia', 'Hipertrofia', 6);

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
  `numero_cartao` varchar(500) NOT NULL,
  `titular_cartao` varchar(100) NOT NULL,
  `vencimento` varchar(200) NOT NULL,
  `cvv` varchar(200) NOT NULL,
  `cpf_titular` varchar(14) NOT NULL,
  `_id_treino` int(11) NOT NULL,
  `foto_perfil` longtext NOT NULL,
  `ultima_ficha_completa` int(1) NOT NULL,
  `_id_perfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuarios`, `nome`, `email`, `cpf`, `nascimento`, `senha`, `plano`, `numero_cartao`, `titular_cartao`, `vencimento`, `cvv`, `cpf_titular`, `_id_treino`, `foto_perfil`, `ultima_ficha_completa`, `_id_perfil`) VALUES
INSERT INTO `usuarios` (`id_usuarios`, `nome`, `email`, `cpf`, `nascimento`, `senha`, `plano`, `numero_cartao`, `titular_cartao`, `vencimento`, `cvv`, `cpf_titular`, `_id_treino`, `foto_perfil`, `ultima_ficha_completa`, `_id_perfil`) VALUES
(41, 'Cristian Vinícius Leoncini Lopes', 'crisvini.leoncini@outlook.com', '444.252.888-81', '12/02/2001', '01c28a3b53576f31689ea49e2bc0bcec', '-', '-', '-', '-', '-', '-', 1, '-', 4, 2),
(42, 'Fabiano Teste', 'fgsantos@unaerp.nr', '183.216.448-99', '02/12/1972', 'c2379fb6a6f19d28a9ac5e250db13b8a', 'anual', 'dc4d7335d318d87413b715d036d7ffda', '9fafdb2126731cbf76c36e907287f138', 'f07914dda1fa2a05ec338a9c73cba006', 'da4fb5c6e93e74d3df8527599fa62642', '183.216.448-99', 2, 'data:image/png;base64,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', 5, 1);

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
-- Índices para tabela `metas`
--
ALTER TABLE `metas`
  ADD PRIMARY KEY (`id_metas`),
  ADD KEY `_id_exercicio` (`_id_exercicio`),
  ADD KEY `_id_treino` (`_id_treino`);

--
-- Índices para tabela `metas_usuarios`
--
ALTER TABLE `metas_usuarios`
  ADD PRIMARY KEY (`id_metas_usuarios`),
  ADD KEY `_id_metas` (`_id_metas`),
  ADD KEY `_id_usuarios` (`_id_usuarios`);

--
-- Índices para tabela `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Índices para tabela `ranking`
--
ALTER TABLE `ranking`
  ADD PRIMARY KEY (`id_ranking`),
  ADD KEY `_id_usuario` (`_id_usuario`),
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
  ADD KEY `_id_perfil` (`_id_perfil`),
  ADD KEY `_id_treino` (`_id_treino`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `exercicios`
--
ALTER TABLE `exercicios`
  MODIFY `id_exercicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de tabela `fichas`
--
ALTER TABLE `fichas`
  MODIFY `id_ficha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `metas`
--
ALTER TABLE `metas`
  MODIFY `id_metas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `metas_usuarios`
--
ALTER TABLE `metas_usuarios`
  MODIFY `id_metas_usuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de tabela `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `ranking`
--
ALTER TABLE `ranking`
  MODIFY `id_ranking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `treinos`
--
ALTER TABLE `treinos`
  MODIFY `id_treino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

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
-- Limitadores para a tabela `metas`
--
ALTER TABLE `metas`
  ADD CONSTRAINT `metas_ibfk_1` FOREIGN KEY (`_id_exercicio`) REFERENCES `exercicios` (`id_exercicio`),
  ADD CONSTRAINT `metas_ibfk_2` FOREIGN KEY (`_id_treino`) REFERENCES `treinos` (`id_treino`);

--
-- Limitadores para a tabela `metas_usuarios`
--
ALTER TABLE `metas_usuarios`
  ADD CONSTRAINT `metas_usuarios_ibfk_1` FOREIGN KEY (`_id_metas`) REFERENCES `metas` (`id_metas`),
  ADD CONSTRAINT `metas_usuarios_ibfk_2` FOREIGN KEY (`_id_usuarios`) REFERENCES `usuarios` (`id_usuarios`);

--
-- Limitadores para a tabela `ranking`
--
ALTER TABLE `ranking`
  ADD CONSTRAINT `ranking_ibfk_1` FOREIGN KEY (`_id_usuario`) REFERENCES `usuarios` (`id_usuarios`),
  ADD CONSTRAINT `ranking_ibfk_2` FOREIGN KEY (`_id_treino`) REFERENCES `treinos` (`id_treino`);

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`_id_perfil`) REFERENCES `perfil` (`id_perfil`),
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`_id_treino`) REFERENCES `treinos` (`id_treino`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;