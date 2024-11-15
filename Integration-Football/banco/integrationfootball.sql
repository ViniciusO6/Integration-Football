-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15/11/2024 às 21:45
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `integrationfootball`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `alunos`
--

CREATE TABLE `alunos` (
  `id_aluno` int(10) UNSIGNED NOT NULL,
  `data_nasc` date NOT NULL,
  `cpf_aluno` int(11) NOT NULL,
  `telefone_aluno` int(11) NOT NULL,
  `nome_aluno` varchar(255) NOT NULL,
  `email_aluno` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `id_turma` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `alunos`
--

INSERT INTO `alunos` (`id_aluno`, `data_nasc`, `cpf_aluno`, `telefone_aluno`, `nome_aluno`, `email_aluno`, `senha`, `id_turma`) VALUES
(1, '0000-00-00', 0, 0, 'maria eduarda', 'maria@aluno.sp.gov.br', '1234', 1),
(4, '2007-06-13', 390111080, 968080107, 'Vinicius Augusto rodrigues', 'vinicius.silva2029@etec.sp.gov.br', 'vinicius123', 1),
(5, '2007-11-14', 11108019, 968080107, 'Arthur Oliveira', 'arthuroliveira@gmail.com', '123', 1),
(6, '2007-04-20', 390108019, 968080107, 'Joana Silva', 'joanasilva@gmail.com', '1234', 1),
(8, '2007-01-15', 301111080, 958000101, 'Lucas Martins Souza', 'lucasms@gmail.com', 'lucas123', 3),
(9, '2006-05-23', 302222081, 958000102, 'Mariana Alves Pereira', 'marianaap@gmail.com', 'mari123', 3),
(10, '2008-08-19', 303333082, 958000103, 'Felipe Rocha Silva', 'felipers@gmail.com', 'felipe123', 3),
(11, '2007-11-30', 304444083, 958000104, 'Ana Paula Costa', 'anapc@gmail.com', 'ana123', 3),
(12, '2006-07-12', 305555084, 958000105, 'Guilherme Ramos', 'guilhermer@gmail.com', 'gui123', 3),
(13, '2008-03-25', 306666085, 958000106, 'Bruna Mendes', 'brunam@gmail.com', 'bruna123', 3),
(14, '2007-09-05', 307777086, 958000107, 'Ricardo Santos', 'ricardos@gmail.com', 'ricardo123', 3),
(15, '2006-10-14', 308888087, 958000108, 'Fernanda Oliveira', 'fernandao@gmail.com', 'fer123', 3),
(16, '2008-01-10', 309999088, 958000109, 'João Pedro Lima', 'joaopl@gmail.com', 'joao123', 3),
(17, '2007-06-21', 310000089, 958000110, 'Camila Souza Andrade', 'camilasa@gmail.com', 'camila123', 3),
(38, '2008-04-12', 501234567, 958010201, 'Carla Menezes Silva', 'carla.silva@gmail.com', 'carla123', 2),
(39, '2007-08-17', 502345678, 958010202, 'Renato Borges', 'renato.borges@gmail.com', 'renato123', 2),
(40, '2006-02-26', 503456789, 958010203, 'Juliana Teixeira', 'juliana.teixeira@gmail.com', 'juliana123', 2),
(41, '2008-06-22', 504567890, 958010204, 'Pedro Almeida', 'pedro.almeida@gmail.com', 'pedro123', 2),
(42, '2007-09-11', 505678901, 958010205, 'Larissa Moreira', 'larissa.moreira@gmail.com', 'larissa123', 2),
(43, '2006-12-05', 506789012, 958010206, 'Thiago Nascimento', 'thiago.nascimento@gmail.com', 'thiago123', 2),
(44, '2008-11-03', 507890123, 958010207, 'Bianca Ferreira', 'bianca.ferreira@gmail.com', 'bianca123', 2),
(45, '2007-03-19', 508901234, 958010208, 'Fernando Costa', 'fernando.costa@gmail.com', 'fernando123', 2),
(46, '2006-10-01', 509012345, 958010209, 'Isabela Souza', 'isabela.souza@gmail.com', 'isabela123', 2),
(47, '2008-07-30', 510123456, 958010210, 'Gabriel Rodrigues', 'gabriel.rodrigues@gmail.com', 'gabriel123', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `atividade`
--

CREATE TABLE `atividade` (
  `id_atividade` int(10) UNSIGNED NOT NULL,
  `titulo_atividade` varchar(80) NOT NULL,
  `hora_inicio` time DEFAULT NULL,
  `data_entrega` date NOT NULL,
  `caminho_arquivo` varchar(255) NOT NULL,
  `id_turma` int(10) UNSIGNED NOT NULL,
  `id_professor` int(11) NOT NULL,
  `hora_termino` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `atividade`
--

INSERT INTO `atividade` (`id_atividade`, `titulo_atividade`, `hora_inicio`, `data_entrega`, `caminho_arquivo`, `id_turma`, `id_professor`, `hora_termino`) VALUES
(2, 'Atividade Pratica - 1° Bimestre', '14:30:00', '2024-11-26', '', 1, 5, '15:30:59'),
(5, 'asdasdasd', '03:08:00', '2024-11-26', '0', 1, 5, '03:09:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `aulas`
--

CREATE TABLE `aulas` (
  `id_aula` int(10) UNSIGNED NOT NULL,
  `data_aula` date NOT NULL,
  `id_turma` int(10) UNSIGNED NOT NULL,
  `descricao_aula` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `inscricao`
--

CREATE TABLE `inscricao` (
  `id` int(11) NOT NULL,
  `nome_inscrito` varchar(200) NOT NULL,
  `telefone_inscrito` int(11) NOT NULL,
  `Cpf_inscrito` varchar(14) NOT NULL,
  `RG_inscrito` varchar(13) NOT NULL,
  `data_nasc` date NOT NULL,
  `genero_inscrito` varchar(55) NOT NULL,
  `deficiencia` varchar(55) NOT NULL,
  `nomeResponsavel` varchar(200) NOT NULL,
  `CpfResponsavel` varchar(15) NOT NULL,
  `RgReponsavel` varchar(13) NOT NULL,
  `emailResponsavel` varchar(55) NOT NULL,
  `telResponsavel` varchar(15) NOT NULL,
  `unidadeInscrito` varchar(55) NOT NULL,
  `modalidadeInscrito` varchar(55) NOT NULL,
  `email_inscrito` varchar(55) NOT NULL,
  `senha_inscrito` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `inscricao`
--

INSERT INTO `inscricao` (`id`, `nome_inscrito`, `telefone_inscrito`, `Cpf_inscrito`, `RG_inscrito`, `data_nasc`, `genero_inscrito`, `deficiencia`, `nomeResponsavel`, `CpfResponsavel`, `RgReponsavel`, `emailResponsavel`, `telResponsavel`, `unidadeInscrito`, `modalidadeInscrito`, `email_inscrito`, `senha_inscrito`) VALUES
(18, 'duda', 1197755, '444444', '444444444', '0444-04-04', 'masculino', 'nao', '4444444444', '4333333333', '21323', 'leiva@gmail.com', '454', '', '', 'monetriop@xn--gmail-1ra.com', ''),
(28, 'dudinha', 2147483647, '52781908800', '8769107832', '2006-02-14', 'feminino', 'sim', 'antonia', '87681078315', '4218808800', 'leiva@gmail.com', '11960132488', 'Santana', 'FUTEBOL DE 5', 'dudinha@gmail.com', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `instituicao`
--

CREATE TABLE `instituicao` (
  `id` int(11) NOT NULL,
  `cnpj_instituicao` int(11) NOT NULL,
  `telefone_instituicao` int(11) NOT NULL,
  `nome_instituicao` varchar(100) NOT NULL,
  `email_instituicao` varchar(255) NOT NULL,
  `senha` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `instituicao`
--

INSERT INTO `instituicao` (`id`, `cnpj_instituicao`, `telefone_instituicao`, `nome_instituicao`, `email_instituicao`, `senha`) VALUES
(1, 0, 0, 'Integration Football', 'integration@football.sp.gov.br', '1234'),
(3, 0, 0, 'Itaim bibi', 'integrationitaimbibi@football.sp.gov.br', '12345');

-- --------------------------------------------------------

--
-- Estrutura para tabela `justificativa_falta`
--

CREATE TABLE `justificativa_falta` (
  `id_justificativa` int(10) UNSIGNED NOT NULL,
  `id_aluno` int(10) UNSIGNED DEFAULT NULL,
  `id_presenca` int(10) UNSIGNED DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `resposta_professor` varchar(255) DEFAULT NULL,
  `camimho_arquivo` varchar(255) DEFAULT NULL,
  `aprovado_professor` tinyint(1) DEFAULT NULL,
  `aprovado_instituicao` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `modalidade`
--

CREATE TABLE `modalidade` (
  `id` int(11) NOT NULL,
  `nome_modalidade` varchar(200) NOT NULL,
  `descricao` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `modalidade`
--

INSERT INTO `modalidade` (`id`, `nome_modalidade`, `descricao`) VALUES
(1, 'Power Soccer\r\n', ''),
(2, 'Walking Football', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `presencas`
--

CREATE TABLE `presencas` (
  `id_presenca` int(10) UNSIGNED NOT NULL,
  `id_aluno` int(10) UNSIGNED DEFAULT NULL,
  `id_aula` int(10) UNSIGNED DEFAULT NULL,
  `presente` tinyint(1) NOT NULL,
  `justificado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `professores`
--

CREATE TABLE `professores` (
  `id` int(11) NOT NULL,
  `nome_professor` varchar(255) NOT NULL,
  `cpf_professor` int(11) NOT NULL,
  `data_nasc` date NOT NULL,
  `email_professor` varchar(255) NOT NULL,
  `senha` varchar(55) NOT NULL,
  `telefone_professor` int(11) NOT NULL,
  `nome_coordenador` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `professores`
--

INSERT INTO `professores` (`id`, `nome_professor`, `cpf_professor`, `data_nasc`, `email_professor`, `senha`, `telefone_professor`, `nome_coordenador`) VALUES
(1, 'roberto', 0, '0000-00-00', 'roberto@professor.sp.gov.br', '12345', 0, NULL),
(5, 'Carlos Alberto', 461294790, '1970-11-14', 'carlosalberto@gmail.com', 'carlos1234', 1196808010, 'Danilo Lima'),
(6, 'Maria Silva', 2147483647, '1985-06-23', 'maria.silva@example.com', '123', 2147483647, NULL),
(7, 'João Pereira', 2147483647, '1992-03-15', 'joao.pereira@example.com', 'joao1234', 2147483647, NULL),
(8, 'Ana Oliveira', 2147483647, '1978-12-05', 'ana.oliveira@example.com', 'ana1234', 2147483647, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `turma`
--

CREATE TABLE `turma` (
  `id_turma` int(10) UNSIGNED NOT NULL,
  `nome_turma` varchar(50) DEFAULT NULL,
  `id_professor` int(11) DEFAULT NULL,
  `id_instituicao` int(11) DEFAULT NULL,
  `id_modalidade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `turma`
--

INSERT INTO `turma` (`id_turma`, `nome_turma`, `id_professor`, `id_instituicao`, `id_modalidade`) VALUES
(1, 'A', 5, 1, 1),
(2, 'A', 5, 1, 2),
(3, 'B', 5, 1, 1),
(4, 'B', 6, 1, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `unidade`
--

CREATE TABLE `unidade` (
  `id` int(11) NOT NULL,
  `nome_unidade` varchar(100) NOT NULL,
  `cep` int(11) NOT NULL,
  `telefone` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `numero` int(11) NOT NULL,
  `latitude` varchar(200) NOT NULL,
  `longitude` varchar(200) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `unidade`
--

INSERT INTO `unidade` (`id`, `nome_unidade`, `cep`, `telefone`, `email`, `endereco`, `numero`, `latitude`, `longitude`, `cidade`, `estado`) VALUES
(1, 'Itaim Bibi', 4104021, 20481510, 'integrationItaimbibi@football.sp.gov.br', ' Rua Apeninos ', 1063, '-23.576759747532595', '-46.63932097270229', 'Sao paulo', 'Sao paulo'),
(2, 'Santana', 2013040, 20484567, 'integrationSantana@football.sp.gov.br', 'Rua Embaixador Joao Neves da Fountoura ', 645, '-23.502261707123992', '-46.63374347491796', 'São paulo', 'São paulo'),
(3, 'Av. Itaquera', 8295001, 1196577075, 'integrationItaquera@football.sp.gov.br', 'Av. Itaquera', 7986, '', '', 'São paulo', 'São paulo'),
(4, 'Mogi das Cruzes', 8790610, 1196770996, 'IntegrationMogi@football.sp.gov.br', 'R. Mariana Najar - Vila Oliveira,', 599, '', '', 'Mogi das Cruzes', 'São Paulo');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id_aluno`),
  ADD KEY `fk_alunos_turma` (`id_turma`);

--
-- Índices de tabela `atividade`
--
ALTER TABLE `atividade`
  ADD PRIMARY KEY (`id_atividade`),
  ADD KEY `id_turma` (`id_turma`),
  ADD KEY `id_professor` (`id_professor`);

--
-- Índices de tabela `aulas`
--
ALTER TABLE `aulas`
  ADD PRIMARY KEY (`id_aula`),
  ADD KEY `id_turma` (`id_turma`);

--
-- Índices de tabela `inscricao`
--
ALTER TABLE `inscricao`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `instituicao`
--
ALTER TABLE `instituicao`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `justificativa_falta`
--
ALTER TABLE `justificativa_falta`
  ADD PRIMARY KEY (`id_justificativa`),
  ADD KEY `id_aluno` (`id_aluno`),
  ADD KEY `id_presenca` (`id_presenca`);

--
-- Índices de tabela `modalidade`
--
ALTER TABLE `modalidade`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `presencas`
--
ALTER TABLE `presencas`
  ADD PRIMARY KEY (`id_presenca`),
  ADD KEY `id_aluno` (`id_aluno`),
  ADD KEY `id_aula` (`id_aula`);

--
-- Índices de tabela `professores`
--
ALTER TABLE `professores`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`id_turma`),
  ADD KEY `id_professor` (`id_professor`),
  ADD KEY `id_instituicao` (`id_instituicao`),
  ADD KEY `fk_modalidade_turma` (`id_modalidade`);

--
-- Índices de tabela `unidade`
--
ALTER TABLE `unidade`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id_aluno` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de tabela `atividade`
--
ALTER TABLE `atividade`
  MODIFY `id_atividade` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `aulas`
--
ALTER TABLE `aulas`
  MODIFY `id_aula` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `inscricao`
--
ALTER TABLE `inscricao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `instituicao`
--
ALTER TABLE `instituicao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `justificativa_falta`
--
ALTER TABLE `justificativa_falta`
  MODIFY `id_justificativa` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `modalidade`
--
ALTER TABLE `modalidade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `presencas`
--
ALTER TABLE `presencas`
  MODIFY `id_presenca` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `professores`
--
ALTER TABLE `professores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `turma`
--
ALTER TABLE `turma`
  MODIFY `id_turma` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `unidade`
--
ALTER TABLE `unidade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `alunos`
--
ALTER TABLE `alunos`
  ADD CONSTRAINT `fk_alunos_turma` FOREIGN KEY (`id_turma`) REFERENCES `turma` (`id_turma`);

--
-- Restrições para tabelas `atividade`
--
ALTER TABLE `atividade`
  ADD CONSTRAINT `atividade_ibfk_1` FOREIGN KEY (`id_turma`) REFERENCES `turma` (`id_turma`),
  ADD CONSTRAINT `atividade_ibfk_2` FOREIGN KEY (`id_professor`) REFERENCES `professores` (`id`);

--
-- Restrições para tabelas `aulas`
--
ALTER TABLE `aulas`
  ADD CONSTRAINT `aulas_ibfk_1` FOREIGN KEY (`id_turma`) REFERENCES `turma` (`id_turma`);

--
-- Restrições para tabelas `justificativa_falta`
--
ALTER TABLE `justificativa_falta`
  ADD CONSTRAINT `justificativa_falta_ibfk_1` FOREIGN KEY (`id_aluno`) REFERENCES `alunos` (`id_aluno`),
  ADD CONSTRAINT `justificativa_falta_ibfk_2` FOREIGN KEY (`id_presenca`) REFERENCES `presencas` (`id_presenca`);

--
-- Restrições para tabelas `presencas`
--
ALTER TABLE `presencas`
  ADD CONSTRAINT `presencas_ibfk_1` FOREIGN KEY (`id_aluno`) REFERENCES `alunos` (`id_aluno`),
  ADD CONSTRAINT `presencas_ibfk_2` FOREIGN KEY (`id_aula`) REFERENCES `aulas` (`id_aula`);

--
-- Restrições para tabelas `turma`
--
ALTER TABLE `turma`
  ADD CONSTRAINT `fk_modalidade_turma` FOREIGN KEY (`id_modalidade`) REFERENCES `modalidade` (`id`),
  ADD CONSTRAINT `turma_ibfk_1` FOREIGN KEY (`id_professor`) REFERENCES `professores` (`id`),
  ADD CONSTRAINT `turma_ibfk_2` FOREIGN KEY (`id_instituicao`) REFERENCES `instituicao` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
