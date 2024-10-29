-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Out-2024 às 16:53
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
  `nomeResponsavel` varchar(200) NOT NULL,
  `CpfResponsavel` varchar(15) NOT NULL,
  `RgReponsavel` varchar(13) NOT NULL,
  `emailResponsavel` varchar(55) NOT NULL,
  `telResponsavel` varchar(15) NOT NULL,
  `unidadeInscrito` varchar(55) NOT NULL,
  `modalidadeInscrito` varchar(55) NOT NULL,
  `email_inscrito` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `inscricao`
--

INSERT INTO `inscricao` (`id`, `nome_inscrito`, `telefone_inscrito`, `Cpf_inscrito`, `RG_inscrito`, `data_nasc`, `genero_inscrito`, `deficiencia`, `nomeResponsavel`, `CpfResponsavel`, `RgReponsavel`, `emailResponsavel`, `telResponsavel`, `unidadeInscrito`, `modalidadeInscrito`, `email_inscrito`) VALUES
(18, 'duda', 1197755, '444444', '444444444', '0444-04-04', 'masculino', 'nao', '4444444444', '4333333333', '21323', 'leiva@gmail.com', '454', '', '', 'monetriop@xn--gmail-1ra.com'),
(28, 'dudinha', 2147483647, '52781908800', '8769107832', '2006-02-14', 'feminino', 'sim', 'antonia', '87681078315', '4218808800', 'leiva@gmail.com', '11960132488', 'Santana', 'FUTEBOL DE 5', 'dudinha@gmail.com'),
(30, '', 0, '00000000000', '000000000', '0000-00-00', '', '', 'Nome PadrÃ£o', '00000000000', '000000000', '', '', '', 'POWER SOCCER 2', ''),
(31, '', 0, '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', ''),
(32, '', 0, '00000000000', '000000000', '0000-00-00', '', '', 'Nome PadrÃ£o', '00000000000', '000000000', '', '', 'Itaim Bibi', 'POWER SOCCER', ''),
(33, '', 0, '00000000000', '000000000', '0000-00-00', '', '', 'Nome PadrÃ£o', '00000000000', '000000000', '', '', '', 'POWER SOCCER', '');

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
-- Estrutura da tabela `modalidade`
--

CREATE TABLE `modalidade` (
  `id` int(11) NOT NULL,
  `nome_modalidade` varchar(200) NOT NULL,
  `descricao` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `modalidade`
--

INSERT INTO `modalidade` (`id`, `nome_modalidade`, `descricao`) VALUES
(1, 'power soccer\r\n', 'akjsxkjaskjxas'),
(2, 'walking football', ''),
(3, 'walkin football', 'dfdf'),
(4, 'poweer soccer', 'de');

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidade`
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
-- Extraindo dados da tabela `unidade`
--

INSERT INTO `unidade` (`id`, `nome_unidade`, `cep`, `telefone`, `email`, `endereco`, `numero`, `latitude`, `longitude`, `cidade`, `estado`) VALUES
(1, 'Itaim Bibi', 4104021, 20481510, 'integration@footbal.itaimbibi.gov.br', ' Rua Apeninos ', 1063, '-23.576759747532595', '-46.63932097270229', 'Sao paulo', 'Sao paulo'),
(2, 'Santana', 2013040, 20484567, 'integration@football.santana.sp.gov.br', 'Rua Embaixador Joao Neves da Fountoura ', 645, '-23.502261707123992', '-46.63374347491796', 'São paulo', 'São paulo');
(3, 'Av. Itaquera', 8295001, 1196577075, 'integration@football.itaquera.sp.gov.br', 'Av. Itaquera', 7986, 0, 0, 'São Paulo', 'São paulo');
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
-- Índices para tabela `modalidade`
--
ALTER TABLE `modalidade`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `professores`
--
ALTER TABLE `professores`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `unidade`
--
ALTER TABLE `unidade`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `instituicao`
--
ALTER TABLE `instituicao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `modalidade`
--
ALTER TABLE `modalidade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `professores`
--
ALTER TABLE `professores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `unidade`
--
ALTER TABLE `unidade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
