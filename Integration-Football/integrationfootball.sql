-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Out-2024 às 17:06
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

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
-- Estrutura da tabela `alunos`
--

CREATE TABLE `alunos` (
  `id_aluno` int(10) UNSIGNED NOT NULL,
  `data_nasc` date NOT NULL,
  `cpf_aluno` int(11) NOT NULL,
  `telefone_aluno` int(11) NOT NULL,
  `nome_aluno` varchar(255) NOT NULL,
  `email_aluno` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`id_aluno`, `data_nasc`, `cpf_aluno`, `telefone_aluno`, `nome_aluno`, `email_aluno`, `senha`) VALUES
(1, '0000-00-00', 0, 0, 'maria eduarda', 'maria@aluno.sp.gov.br', '1234');

-- --------------------------------------------------------

--
-- Estrutura da tabela `inscricao`
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
  `telReserva_inscrito` varchar(15) NOT NULL,
  `nomeResponsavel` varchar(200) NOT NULL,
  `CpfResponsavel` varchar(15) NOT NULL,
  `RgReponsavel` varchar(13) NOT NULL,
  `emailResponsavel` varchar(55) NOT NULL,
  `telResponsavel` varchar(15) NOT NULL,
  `unidadeInscrito` varchar(55) NOT NULL,
  `modalidadeInscrito` varchar(55) NOT NULL,
  `email_inscrito` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `instituicao`
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
-- Extraindo dados da tabela `instituicao`
--

INSERT INTO `instituicao` (`id`, `cnpj_instituicao`, `telefone_instituicao`, `nome_instituicao`, `email_instituicao`, `senha`) VALUES
(1, 0, 0, 'Integration Football', 'integration@football.sp.gov.br', '1234');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professores`
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
-- Extraindo dados da tabela `professores`
--

INSERT INTO `professores` (`id`, `nome_professor`, `cpf_professor`, `data_nasc`, `email_professor`, `senha`, `telefone_professor`) VALUES
(1, 'roberto', 0, '0000-00-00', 'roberto@professor.sp.gov.br', '12345', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id_aluno`);

--
-- Índices para tabela `inscricao`
--
ALTER TABLE `inscricao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `instituicao`
--
ALTER TABLE `instituicao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `professores`
--
ALTER TABLE `professores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id_aluno` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `inscricao`
--
ALTER TABLE `inscricao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `instituicao`
--
ALTER TABLE `instituicao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `professores`
--
ALTER TABLE `professores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
