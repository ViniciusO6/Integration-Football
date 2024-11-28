-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28/11/2024 às 12:23
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
  `foto_perfil` varchar(255) NOT NULL,
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

INSERT INTO `alunos` (`id_aluno`, `foto_perfil`, `data_nasc`, `cpf_aluno`, `telefone_aluno`, `nome_aluno`, `email_aluno`, `senha`, `id_turma`) VALUES
(1, './Imagens/user.png', '0000-00-00', 0, 0, 'maria eduarda', 'maria@aluno.sp.gov.br', '1234', 1),
(4, 'https://tcloud.site/filegator/repository/GrupoIntegrationFootball/Uploads/FotosPerfil/67479529c0dbb1.95637143.png', '2007-06-13', 390111080, 968080107, 'Vinicius Augusto Rodrigues', 'vinicius.silva2029@aluno.sp.gov.br', '202cb962ac59075b964b07152d234b70', 1),
(5, './Imagens/user.png', '2007-11-14', 11108019, 968080107, 'Arthur Oliveira', 'arthuroliveira@gmail.com', '123', 1),
(6, './Imagens/user.png', '2007-04-20', 390108019, 968080107, 'Joana Silva', 'joanasilva@gmail.com', '1234', 1),
(8, './Imagens/user.png', '2007-01-15', 301111080, 958000101, 'Lucas Martins Souza', 'lucasms@gmail.com', 'lucas123', 3),
(9, './Imagens/user.png', '2006-05-23', 302222081, 958000102, 'Mariana Alves Pereira', 'marianaap@gmail.com', 'mari123', 3),
(10, './Imagens/user.png', '2008-08-19', 303333082, 958000103, 'Felipe Rocha Silva', 'felipers@gmail.com', 'felipe123', 3),
(11, './Imagens/user.png', '2007-11-30', 304444083, 958000104, 'Ana Paula Costa', 'anapc@gmail.com', 'ana123', 3),
(12, './Imagens/user.png', '2006-07-12', 305555084, 958000105, 'Guilherme Ramos', 'guilhermer@gmail.com', 'gui123', 3),
(13, './Imagens/user.png', '2008-03-25', 306666085, 958000106, 'Bruna Mendes', 'brunam@gmail.com', 'bruna123', 3),
(14, './Imagens/user.png', '2007-09-05', 307777086, 958000107, 'Ricardo Santos', 'ricardos@gmail.com', 'ricardo123', 3),
(15, './Imagens/user.png', '2006-10-14', 308888087, 958000108, 'Fernanda Oliveira', 'fernandao@gmail.com', 'fer123', 3),
(16, './Imagens/user.png', '2008-01-10', 309999088, 958000109, 'João Pedro Lima', 'joaopl@gmail.com', 'joao123', 3),
(17, './Imagens/user.png', '2007-06-21', 310000089, 958000110, 'Camila Souza Andrade', 'camilasa@gmail.com', 'camila123', 3),
(38, './Imagens/user.png', '2008-04-12', 501234567, 958010201, 'Carla Menezes Silva', 'carla.silva@gmail.com', 'carla123', 2),
(39, './Imagens/user.png', '2007-08-17', 502345678, 958010202, 'Renato Borges', 'renato.borges@gmail.com', 'renato123', 2),
(40, './Imagens/user.png', '2006-02-26', 503456789, 958010203, 'Juliana Teixeira', 'juliana.teixeira@gmail.com', 'juliana123', 2),
(41, './Imagens/user.png', '2008-06-22', 504567890, 958010204, 'Pedro Almeida', 'pedro.almeida@gmail.com', 'pedro123', 2),
(42, './Imagens/user.png', '2007-09-11', 505678901, 958010205, 'Larissa Moreira', 'larissa.moreira@gmail.com', 'larissa123', 2),
(43, './Imagens/user.png', '2006-12-05', 506789012, 958010206, 'Thiago Nascimento', 'thiago.nascimento@gmail.com', 'thiago123', 2),
(44, './Imagens/user.png', '2008-11-03', 507890123, 958010207, 'Bianca Ferreira', 'bianca.ferreira@gmail.com', 'bianca123', 2),
(45, './Imagens/user.png', '2007-03-19', 508901234, 958010208, 'Fernando Costa', 'fernando.costa@gmail.com', 'fernando123', 2),
(46, './Imagens/user.png', '2006-10-01', 509012345, 958010209, 'Isabela Souza', 'isabela.souza@gmail.com', 'isabela123', 2),
(47, './Imagens/user.png', '2008-07-30', 510123456, 958010210, 'Gabriel Rodrigues', 'gabriel.rodrigues@gmail.com', 'gabriel123', 2),
(48, '', '0000-00-00', 123312, 2147483647, 'Vinicius Augusto Rodrigues da Silva', 'viniciusnini@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 1),
(49, '', '0000-00-00', 123312, 2147483647, 'Teste da Silva', 'testesilva@gmail.com', '25d55ad283aa400af464c76d713c07ad', 3),
(53, './Imagens/user.png', '2000-07-13', 123312, 2147483647, 'Joana Mendes', 'joana@gmail.com', 'c689de85871d8325aca2ddef8de173cd', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `atividade`
--

CREATE TABLE `atividade` (
  `id_atividade` int(10) UNSIGNED NOT NULL,
  `titulo_atividade` varchar(80) NOT NULL,
  `hora_inicio` time DEFAULT NULL,
  `data_entrega` date NOT NULL,
  `nome_arquivo` varchar(255) NOT NULL,
  `caminho_arquivo` varchar(255) NOT NULL,
  `id_turma` int(10) UNSIGNED NOT NULL,
  `id_professor` int(11) NOT NULL,
  `hora_termino` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `atividade`
--

INSERT INTO `atividade` (`id_atividade`, `titulo_atividade`, `hora_inicio`, `data_entrega`, `nome_arquivo`, `caminho_arquivo`, `id_turma`, `id_professor`, `hora_termino`) VALUES
(31, 'Campeonato Interescolar', '15:30:00', '2024-11-27', 'HistoriaPowerSoccer.pdf', '67411820930a42.19290499.pdf', 1, 5, '18:29:00'),
(33, 'Tesate arquivo1234qasdas', '21:30:00', '2024-11-27', '6743bcfc362285.91518921.jpg', '6747b94a4cd613.92924869.jpg', 1, 5, '21:29:00');

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

--
-- Despejando dados para a tabela `aulas`
--

INSERT INTO `aulas` (`id_aula`, `data_aula`, `id_turma`, `descricao_aula`) VALUES
(1, '2024-11-15', 1, 'Aula de hoje'),
(2, '2024-11-18', 1, 'gdhdghdghdh'),
(3, '2024-11-20', 3, 'cxvzxcvzxcv');

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
  `senha_inscrito` varchar(255) NOT NULL,
  `status` enum('ativa','inativa','pendente') DEFAULT 'pendente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `inscricao`
--

INSERT INTO `inscricao` (`id`, `nome_inscrito`, `telefone_inscrito`, `Cpf_inscrito`, `RG_inscrito`, `data_nasc`, `genero_inscrito`, `deficiencia`, `nomeResponsavel`, `CpfResponsavel`, `RgReponsavel`, `emailResponsavel`, `telResponsavel`, `unidadeInscrito`, `modalidadeInscrito`, `email_inscrito`, `senha_inscrito`, `status`) VALUES
(18, 'duda', 1197755, '444444', '444444444', '0444-04-04', 'masculino', 'nao', '4444444444', '4333333333', '21323', 'leiva@gmail.com', '454', '', '', 'monetriop@xn--gmail-1ra.com', '', 'inativa'),
(28, 'dudinha', 2147483647, '52781908800', '8769107832', '2006-02-14', 'feminino', 'sim', 'antonia', '87681078315', '4218808800', 'leiva@gmail.com', '11960132488', 'Santana', 'FUTEBOL DE 5', 'dudinha@gmail.com', '', 'inativa'),
(38, 'Karinne Angelo', 2147483647, '431.758.460-90', '34.567.890-9', '2004-09-23', 'feminino', '', '0', '0', '0', '0', '0', 'Santana', 'WALKING FOOTBALL', 'karinne.ventura@etec.sp.gov.br', '$2y$10$pJpjtQdV4khnKpW/7Oaf0.7w2Ei9cLUdZSFKRqhcxi9f5h2xbjiXW', 'inativa'),
(39, 'Vinicu', 2147483647, '234.567.898-76', '23.456.789-8', '2003-09-23', 'outro', 'Cadeirante', '0', '0', '0', '0', '0', 'Santana', 'FUTEBOL DE 5', 'vinicu@gmail.com', '$2y$10$ZBPK8UjRI1XPRM6wBA8jHeIRQWdvuNO4uLOGNm7oD3QZEKVYlc3eS', 'inativa'),
(40, 'Jose Pinheiros', 2147483647, '234.567.898-76', '34.567.898-7', '2005-02-23', 'feminino', '', '0', '0', '0', '0', '0', 'Santana', 'WALKING FOOTBALL', 'josepinheiros@gmail.com', '$2y$10$tXNMPgK/hijPkOPcuoU3Ve5wnPDMdbGNS0smTTdUEDx8iyKzYem1S', 'inativa'),
(41, 'jesus', 2147483647, '345.790.986-45', '34.579.086-4', '2003-03-23', 'outro', '', '0', '0', '0', '0', '0', 'Santana', 'FUTEBOL DE 5', 'jesus@gmail.com', '$2y$10$p/fjrgSYp/eqv9jchTPIyO6hW5aPtxdFj9Gm1U22Sdxwk9DDGwOau', ''),
(42, 'jesus', 2147483647, '345.790.986-45', '34.579.086-4', '2004-02-23', 'outro', '', '0', '0', '0', '0', '0', 'Santana', 'WALKING FOOTBALL', 'jesus@gmail.com', '$2y$10$eskTf41QIwE6demwV72LkOY38xkKAFJo6WIFyZjzWmpDUTUsCnL6O', 'ativa'),
(43, 'CARLOS', 2147483647, '345.678.908-66', '09.876.543-2', '2004-03-12', 'outro', 'Demencia', '0', '0', '0', '0', '0', 'Santana', 'POWER SOCCER', 'jesus@gmail.com', '$2y$10$nW2A/sM5D.KKPjOyC95vW.zQkFwPQM8Q73j8iK5oc9GRo82slg.kG', 'ativa'),
(44, 'CARLOS', 2147483647, '234.567.898-76', '23.456.789-8', '2006-04-23', 'outro', 'Demencia', '0', '0', '0', '0', '0', 'Santana', 'WALKING FOOTBALL', 'jesus@gmail.com', '$2y$10$P.T3M22VMnTDNlD/0BKoku9iwXWFgVBtLnN9g6w7pi7CKzO4.z7t6', 'ativa'),
(45, 'CARLOS', 2147483647, '234.567.898-76', '23.456.789-8', '2004-04-23', 'outro', '', '0', '0', '0', '0', '0', 'Santana', 'WALKING FOOTBALL', 'jesus@gmail.com', '$2y$10$3n594.28Zk8IRZUMfsanbeiTM/rw4gDwQZ1x71S1VGb3diB/GCRPS', ''),
(46, 'CARLOS', 2147483647, '234.567.898-76', '23.456.789-8', '2006-04-23', 'outro', '', '0', '0', '0', '0', '0', 'Santana', 'POWER SOCCER', 'jesus@gmail.com', '$2y$10$uI4DQNuMaybFL47EULxzkuwipuMYuPoCjKY5CopIYAECQ7G2Z32ey', ''),
(47, 'CARLOS', 2147483647, '234.567.898-76', '23.456.789-8', '2003-02-23', 'outro', '', '0', '0', '0', '0', '0', 'Santana', 'WALKING FOOTBALL', 'jesus@gmail.com', '$2y$10$VrQxQIkY/b8Xid18vjHHOuKvkSaIAFSuCHSg/uHn6Y67nla53IUfa', 'ativa'),
(48, 'teste', 2147483647, '345.678.998-76', '23.678.965-5', '2003-03-23', 'outro', '', '0', '0', '0', '0', '0', 'Santana', 'WALKING FOOTBALL', 'teste@gmail.com', '$2y$10$pTH7uvSkW3Hq3Rc7Xab74ucVOYx8EaXXfkk92JJx4T7HgYHx0Zq1C', 'ativa'),
(49, 'ANDREIA ANGELO DOS SANTOS VENTURA', 2147483647, '345.678.998-76', '23.678.965-5', '2006-09-22', 'feminino', '', '0', '0', '0', '0', '0', 'Santana', 'POWER SOCCER', 'andreia.angelo@sme.prefeitura.sp.gov.br', '$2y$10$0pymDgFMnMwx3pZs25o17eB1rD5Ut5aAHE47fCxRRpWb0.EPMGLDq', 'ativa'),
(50, 'teste', 2147483647, '431.758.460-90', '23.678.965-5', '2005-02-25', 'outro', '', '0', '0', '0', '0', '0', 'Santana', 'WALKING FOOTBALL', 'teste@gmail.com', '$2y$10$129I/jHEaruLlLFYGJ0D4OTtv5ATrEiE3RPW0ubddDbJIMZD17dOe', 'ativa'),
(51, 'Vinicius Augusto Rodrigues da Silva', 2147483647, '123.312.332-12', '12.312.312-3', '2000-06-13', 'masculino', '', '0', '0', '0', '0', '0', 'Santana', 'POWER SOCCER', 'viniciusnini@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'ativa'),
(52, 'Teste da Silva', 2147483647, '123.312.332-12', '12.312.312-3', '2000-06-13', 'masculino', '', '0', '0', '0', '0', '0', 'Santana', 'POWER SOCCER', 'testesilva@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'ativa'),
(53, 'Joana Mendes', 2147483647, '123.312.332-12', '12.312.312-3', '2000-07-13', 'masculino', '', '0', '0', '0', '0', '0', 'Santana', 'POWER SOCCER', 'joana@gmail.com', 'c689de85871d8325aca2ddef8de173cd', 'ativa');

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
(1, 0, 0, 'Integration Football', 'integration@football.sp.gov.br', '202cb962ac59075b964b07152d234b70'),
(3, 0, 0, 'Itaim bibi', 'integrationitaimbibi@football.sp.gov.br', '202cb962ac59075b964b07152d234b70');

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
  `nome_arquivo` varchar(255) DEFAULT NULL,
  `caminho_arquivo` varchar(255) DEFAULT NULL,
  `aprovado_professor` tinyint(1) DEFAULT NULL,
  `aprovado_instituicao` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `justificativa_falta`
--

INSERT INTO `justificativa_falta` (`id_justificativa`, `id_aluno`, `id_presenca`, `descricao`, `resposta_professor`, `nome_arquivo`, `caminho_arquivo`, `aprovado_professor`, `aprovado_instituicao`) VALUES
(72, 4, 17, 'Abaixo esta meu atestado', NULL, '67411820930a42.19290499 (2).pdf', '67424039acac79.23503675.pdf', 1, NULL),
(73, 4, 17, 'Me machuquei', NULL, '674114fb058c88.43484949.png', '674753db0cd845.72312195.png', 0, NULL),
(74, 4, 17, 'Quebrei minha perna', NULL, 'aNovo-Regimento-Comum-das-Etecs-2022.pdf', '6747565211ad37.85993244.pdf', 1, NULL),
(75, 4, 17, '', NULL, '6747565211ad37.85993244.pdf', '67479f448445f0.43741728.pdf', NULL, NULL),
(76, 4, 17, '', NULL, '674753db0cd845.72312195.png', '6747acbcebfcf2.60774211.png', NULL, NULL);

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

--
-- Despejando dados para a tabela `presencas`
--

INSERT INTO `presencas` (`id_presenca`, `id_aluno`, `id_aula`, `presente`, `justificado`) VALUES
(14, 5, 1, 1, NULL),
(15, 6, 1, 1, NULL),
(16, 1, 1, 1, NULL),
(17, 4, 1, 0, NULL),
(18, 11, 1, 0, NULL),
(19, 13, 1, 0, NULL),
(20, 17, 1, 0, NULL),
(21, 10, 1, 1, NULL),
(22, 15, 1, 1, NULL),
(23, 12, 1, 1, NULL),
(24, 16, 1, 1, NULL),
(25, 8, 1, 0, NULL),
(26, 9, 1, 1, NULL),
(27, 14, 1, 1, NULL),
(28, 5, 1, 1, NULL),
(29, 6, 1, 1, NULL),
(30, 1, 1, 1, NULL),
(31, 4, 1, 0, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `professores`
--

CREATE TABLE `professores` (
  `id` int(11) NOT NULL,
  `nome_professor` varchar(255) NOT NULL,
  `foto_perfil` varchar(255) DEFAULT NULL,
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

INSERT INTO `professores` (`id`, `nome_professor`, `foto_perfil`, `cpf_professor`, `data_nasc`, `email_professor`, `senha`, `telefone_professor`, `nome_coordenador`) VALUES
(1, 'roberto', './Imagens/user.png', 0, '0000-00-00', 'roberto@professor.sp.gov.br', '12345', 0, NULL),
(5, 'Carlos Alberto', 'https://tcloud.site/filegator/repository/GrupoIntegrationFootball/Uploads/FotosPerfil/6747b15b11d229.56765994.jpg', 461294790, '1970-11-14', 'carlosalberto@professor.com', '202cb962ac59075b964b07152d234b70', 1196808010, 'Danilo Lima'),
(6, 'Maria Silva', './Imagens/user.png', 2147483647, '1985-06-23', 'maria.silva@example.com', '123', 2147483647, NULL),
(7, 'João Pereira', './Imagens/user.png', 2147483647, '1992-03-15', 'joao.pereira@example.com', 'joao1234', 2147483647, NULL),
(8, 'Ana Oliveira', './Imagens/user.png', 2147483647, '1978-12-05', 'ana.oliveira@example.com', 'ana1234', 2147483647, NULL);

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
  MODIFY `id_aluno` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de tabela `atividade`
--
ALTER TABLE `atividade`
  MODIFY `id_atividade` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `aulas`
--
ALTER TABLE `aulas`
  MODIFY `id_aula` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `inscricao`
--
ALTER TABLE `inscricao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de tabela `instituicao`
--
ALTER TABLE `instituicao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `justificativa_falta`
--
ALTER TABLE `justificativa_falta`
  MODIFY `id_justificativa` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT de tabela `modalidade`
--
ALTER TABLE `modalidade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `presencas`
--
ALTER TABLE `presencas`
  MODIFY `id_presenca` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

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
