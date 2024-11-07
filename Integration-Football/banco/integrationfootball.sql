-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07/11/2024 às 07:23
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
(4, '2007-06-13', 390111080, 968080107, 'Vinicius Augusto rodrigues', 'vinicius.silva2029@etec.sp.gov.br', 'vinicius123', 1);

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
(1, 'power soccer\r\n', 'akjsxkjaskjxas'),
(2, 'walking football', ''),
(3, 'walkin football', 'dfdf'),
(4, 'poweer soccer', 'de');

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
  `telefone_professor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `professores`
--

INSERT INTO `professores` (`id`, `nome_professor`, `cpf_professor`, `data_nasc`, `email_professor`, `senha`, `telefone_professor`) VALUES
(1, 'roberto', 0, '0000-00-00', 'roberto@professor.sp.gov.br', '12345', 0),
(5, 'Carlos Alberto', 461294790, '1970-11-14', 'carlosalberto@gmail.com', 'carlos1234', 1196808010);

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
(1, 'A', 5, 1, 1);

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
-- Índices de tabela `modalidade`
--
ALTER TABLE `modalidade`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id_aluno` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- AUTO_INCREMENT de tabela `modalidade`
--
ALTER TABLE `modalidade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `professores`
--
ALTER TABLE `professores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `turma`
--
ALTER TABLE `turma`
  MODIFY `id_turma` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
