-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 20-Set-2019 às 20:02
-- Versão do servidor: 10.1.36-MariaDB
-- versão do PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `casa`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `id_aluno` int(11) NOT NULL,
  `id_trabalho` int(11) DEFAULT NULL,
  `aluno_nome` varchar(100) COLLATE utf16_bin NOT NULL,
  `sobrenome` varchar(100) COLLATE utf16_bin NOT NULL,
  `sexo` varchar(10) COLLATE utf16_bin NOT NULL,
  `num_bi` varchar(20) COLLATE utf16_bin DEFAULT NULL,
  `telefone` varchar(20) COLLATE utf16_bin DEFAULT NULL,
  `telefone2` varchar(30) COLLATE utf16_bin DEFAULT NULL,
  `email` varchar(100) COLLATE utf16_bin DEFAULT NULL,
  `residencia` text COLLATE utf16_bin,
  `nivel_academico` varchar(30) COLLATE utf16_bin DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '2',
  `data_criacao` varchar(30) COLLATE utf16_bin NOT NULL,
  `data_atualizacao` varchar(30) COLLATE utf16_bin DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`id_aluno`, `id_trabalho`, `aluno_nome`, `sobrenome`, `sexo`, `num_bi`, `telefone`, `telefone2`, `email`, `residencia`, `nivel_academico`, `estado`, `data_criacao`, `data_atualizacao`) VALUES
(1, NULL, 'Joana', 'Zamba', 'F', '0000000BA022', '', '', '', NULL, NULL, 2, '30/08/2019', NULL),
(2, NULL, 'Mario', 'Chita', 'M', '0000000CA022', '', '', '', NULL, NULL, 2, '20/09/2019', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `certificado`
--

CREATE TABLE `certificado` (
  `id_certificado` int(11) NOT NULL,
  `codigo` varchar(100) COLLATE utf16_bin NOT NULL,
  `data_emissao` varchar(30) COLLATE utf16_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `id_curso` int(11) NOT NULL,
  `curso_codigo` varchar(30) COLLATE utf16_bin NOT NULL,
  `curso_nome` varchar(100) COLLATE utf16_bin NOT NULL,
  `curso_preco` int(11) NOT NULL,
  `duracao` varchar(30) COLLATE utf16_bin DEFAULT NULL,
  `data_criacao` varchar(30) COLLATE utf16_bin NOT NULL,
  `data_atualizacao` varchar(30) COLLATE utf16_bin DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`id_curso`, `curso_codigo`, `curso_nome`, `curso_preco`, `duracao`, `data_criacao`, `data_atualizacao`) VALUES
(1, 'PG', 'Pedagogia', 20000, '6', '30/08/2019', NULL),
(2, 'NA', 'Natação', 5000, '0', '30/08/2019', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso_aluno`
--

CREATE TABLE `curso_aluno` (
  `id_curso_aluno` int(11) NOT NULL,
  `id_aluno` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `nota_final` int(11) DEFAULT NULL,
  `id_certificado` int(11) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Extraindo dados da tabela `curso_aluno`
--

INSERT INTO `curso_aluno` (`id_curso_aluno`, `id_aluno`, `id_curso`, `nota_final`, `id_certificado`, `estado`) VALUES
(1, 0, 0, NULL, NULL, 3),
(2, 1, 1, NULL, NULL, 1),
(3, 1, 2, NULL, NULL, 1),
(4, 1, 2, NULL, NULL, 1),
(5, 1, 1, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `data`
--

CREATE TABLE `data` (
  `id_data` int(11) NOT NULL,
  `dia` int(11) NOT NULL,
  `mes` int(11) NOT NULL,
  `ano` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `horario`
--

CREATE TABLE `horario` (
  `id_horario` int(11) NOT NULL,
  `horario_descricao` varchar(100) COLLATE utf16_bin NOT NULL,
  `data_criacao` varchar(30) COLLATE utf16_bin NOT NULL,
  `data_atualizacao` varchar(30) COLLATE utf16_bin DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Extraindo dados da tabela `horario`
--

INSERT INTO `horario` (`id_horario`, `horario_descricao`, `data_criacao`, `data_atualizacao`) VALUES
(2, 'Segunda a Sexta das 13h as 15h', '30/08/2019', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `hospedaria_cliente`
--

CREATE TABLE `hospedaria_cliente` (
  `id_cliente` int(11) NOT NULL,
  `nome_cliente` varchar(100) COLLATE utf16_bin NOT NULL,
  `bi_num` varchar(30) COLLATE utf16_bin NOT NULL,
  `sexo` varchar(10) COLLATE utf16_bin NOT NULL,
  `data_criacao` varchar(30) COLLATE utf16_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Extraindo dados da tabela `hospedaria_cliente`
--

INSERT INTO `hospedaria_cliente` (`id_cliente`, `nome_cliente`, `bi_num`, `sexo`, `data_criacao`) VALUES
(1, 'Osvaldo', '002363608LA020', 'M', '03/09/2019');

-- --------------------------------------------------------

--
-- Estrutura da tabela `hospedaria_cliente_quarto`
--

CREATE TABLE `hospedaria_cliente_quarto` (
  `id_cliente_quarto` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_quarto` int(11) NOT NULL,
  `entrada` varchar(30) COLLATE utf16_bin NOT NULL,
  `saida` varchar(30) COLLATE utf16_bin NOT NULL,
  `num_dias` int(11) NOT NULL,
  `valor_pago` int(11) NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Extraindo dados da tabela `hospedaria_cliente_quarto`
--

INSERT INTO `hospedaria_cliente_quarto` (`id_cliente_quarto`, `id_cliente`, `id_quarto`, `entrada`, `saida`, `num_dias`, `valor_pago`, `tipo`) VALUES
(1, 1, 1, '03/09/2019', '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `hospedaria_quarto`
--

CREATE TABLE `hospedaria_quarto` (
  `id_quarto` int(11) NOT NULL,
  `numero` varchar(10) COLLATE utf16_bin NOT NULL,
  `descricao` varchar(100) COLLATE utf16_bin NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `id_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Extraindo dados da tabela `hospedaria_quarto`
--

INSERT INTO `hospedaria_quarto` (`id_quarto`, `numero`, `descricao`, `estado`, `id_tipo`) VALUES
(1, '1', 'Abababa', 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `hospedaria_tipo_quarto`
--

CREATE TABLE `hospedaria_tipo_quarto` (
  `id_tipo_quarto` int(11) NOT NULL,
  `descricao_tipo` varchar(100) COLLATE utf16_bin NOT NULL,
  `preco` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Extraindo dados da tabela `hospedaria_tipo_quarto`
--

INSERT INTO `hospedaria_tipo_quarto` (`id_tipo_quarto`, `descricao_tipo`, `preco`) VALUES
(1, 'Master', 20000);

-- --------------------------------------------------------

--
-- Estrutura da tabela `log`
--

CREATE TABLE `log` (
  `id_log` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `data` varchar(30) COLLATE utf16_bin NOT NULL,
  `hora` varchar(30) COLLATE utf16_bin NOT NULL,
  `acao` varchar(30) COLLATE utf16_bin NOT NULL,
  `mensagem` text COLLATE utf16_bin
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Extraindo dados da tabela `log`
--

INSERT INTO `log` (`id_log`, `id_usuario`, `data`, `hora`, `acao`, `mensagem`) VALUES
(1, 11, '30/08/2019', '09:04:13pm', 'Entrar', 'Usuario cordcentro entrou no sistema'),
(2, 11, '30/08/2019', '09:09:13pm', 'Adicionar', 'adicionou o curso Pedagogia no sistema'),
(3, 11, '30/08/2019', '09:12:43pm', 'Adicionar', 'adicionou o horario Segunda a Sexta das 13h as 15h no sistema'),
(4, 11, '30/08/2019', '09:13:24pm', 'Remover', 'removeu o horario Segunda a Sexta das 13h as 15h do sistema'),
(5, 11, '30/08/2019', '09:13:36pm', 'Adicionar', 'adicionou o horario Segunda a Sexta das 13h as 15h no sistema'),
(6, 11, '30/08/2019', '09:13:52pm', 'Adicionar', 'adicionou a sala Sala 1 no sistema'),
(7, 11, '30/08/2019', '09:20:28pm', 'Adicionar', 'adicionou a turma Iº Ciclo Janeiro no sistema'),
(8, 11, '30/08/2019', '09:23:33pm', 'Sair', 'Usuario cordcentro saiu do sistema'),
(9, 9, '30/08/2019', '09:23:41pm', 'Entrar', 'Usuario recepcao entrou no sistema'),
(10, 9, '30/08/2019', '09:24:01pm', 'Adicionar', 'adicionou o aluno Joana no sistema'),
(11, 9, '30/08/2019', '09:24:01pm', 'Adicionar', 'adicionou o aluno Joana na turma 1'),
(12, 9, '30/08/2019', '09:25:27pm', 'Sair', 'Usuario recepcao saiu do sistema'),
(13, 10, '30/08/2019', '09:25:53pm', 'Entrar', 'Usuario tesouraria entrou no sistema'),
(14, 10, '30/08/2019', '09:26:29pm', 'Adicionar', 'adicionou o pagamento de 1 do tipo 1'),
(15, 10, '30/08/2019', '09:27:04pm', 'Sair', 'Usuario tesouraria saiu do sistema'),
(16, 11, '30/08/2019', '09:27:13pm', 'Entrar', 'Usuario cordcentro entrou no sistema'),
(17, 11, '30/08/2019', '09:30:14pm', 'Editar', 'fechou a turma 1 no sistema'),
(18, 11, '30/08/2019', '09:31:13pm', 'Sair', 'Usuario cordcentro saiu do sistema'),
(19, 10, '30/08/2019', '09:31:23pm', 'Entrar', 'Usuario tesouraria entrou no sistema'),
(20, 10, '30/08/2019', '09:32:12pm', 'Adicionar', 'adicionou o pagamento de 1 do tipo 2'),
(21, 10, '30/08/2019', '09:32:46pm', 'Sair', 'Usuario tesouraria saiu do sistema'),
(22, 11, '30/08/2019', '09:32:57pm', 'Entrar', 'Usuario cordcentro entrou no sistema'),
(23, 11, '30/08/2019', '09:33:09pm', 'Editar', 'terminou a turma 1 no sistema'),
(24, 11, '30/08/2019', '09:35:15pm', 'Adicionar', 'adicionou o curso Natação no sistema'),
(25, 11, '30/08/2019', '09:35:48pm', 'Adicionar', 'adicionou a turma IIº Ciclo Fevereiro no sistema'),
(26, 11, '30/08/2019', '09:36:30pm', 'Adicionar', 'adicionou o aluno 1 na turma 2'),
(27, 11, '30/08/2019', '09:36:57pm', 'Sair', 'Usuario cordcentro saiu do sistema'),
(28, 10, '30/08/2019', '09:37:06pm', 'Entrar', 'Usuario tesouraria entrou no sistema'),
(29, 10, '30/08/2019', '09:37:26pm', 'Adicionar', 'adicionou o pagamento de 1 do tipo 1'),
(30, 10, '30/08/2019', '09:38:42pm', 'Sair', 'Usuario tesouraria saiu do sistema'),
(31, 11, '30/08/2019', '09:38:55pm', 'Entrar', 'Usuario cordcentro entrou no sistema'),
(32, 11, '30/08/2019', '09:39:30pm', 'Editar', 'fechou a turma 2 no sistema'),
(33, 11, '30/08/2019', '09:42:31pm', 'Editar', 'terminou a turma 2 no sistema'),
(34, 11, '30/08/2019', '09:44:14pm', 'Sair', 'Usuario cordcentro saiu do sistema'),
(35, 2, '01/09/2019', '12:08:01am', 'Entrar', 'Usuario admin entrou no sistema'),
(36, 2, '01/09/2019', '12:35:48am', 'Adicionar', 'adicionou a turma Vº Ciclo no sistema'),
(37, 2, '01/09/2019', '12:35:54am', 'Editar', 'fechou a turma 3 no sistema'),
(38, 2, '01/09/2019', '12:36:29am', 'Editar', 'terminou a turma 3 no sistema'),
(39, 2, '01/09/2019', '12:36:59am', 'Remover', 'removeu a turma Vº Ciclo do sistema'),
(40, 2, '01/09/2019', '01:03:11am', 'Adicionar', 'adicionou a turma Vº Ciclo no sistema'),
(41, 2, '01/09/2019', '01:03:17am', 'Editar', 'fechou a turma 4 no sistema'),
(42, 2, '01/09/2019', '01:03:37am', 'Editar', 'terminou a turma 4 no sistema'),
(43, 2, '01/09/2019', '10:03:19pm', 'Entrar', 'Usuario admin entrou no sistema'),
(44, 2, '02/09/2019', '07:50:40pm', 'Entrar', 'Usuario admin entrou no sistema'),
(45, 2, '02/09/2019', '07:52:06pm', 'Adicionar', 'adicionou a turma Iº Ciclo Janeiro I no sistema'),
(46, 2, '02/09/2019', '07:52:28pm', 'Adicionar', 'adicionou o aluno 1 na turma 5'),
(47, 2, '02/09/2019', '07:52:44pm', 'Editar', 'fechou a turma 5 no sistema'),
(48, 2, '02/09/2019', '07:53:27pm', 'Sair', 'Usuario admin saiu do sistema'),
(49, 10, '02/09/2019', '07:53:34pm', 'Entrar', 'Usuario tesouraria entrou no sistema'),
(50, 10, '02/09/2019', '07:53:48pm', 'Adicionar', 'adicionou o pagamento de 1 do tipo 1'),
(51, 10, '02/09/2019', '07:53:55pm', 'Sair', 'Usuario tesouraria saiu do sistema'),
(52, 2, '02/09/2019', '07:54:01pm', 'Entrar', 'Usuario admin entrou no sistema'),
(53, 2, '02/09/2019', '07:55:26pm', 'Editar', 'terminou a turma 5 no sistema'),
(54, 2, '03/09/2019', '06:19:19pm', 'Entrar', 'Usuario admin entrou no sistema'),
(55, 2, '03/09/2019', '06:26:32pm', 'Sair', 'Usuario admin saiu do sistema'),
(56, 5, '03/09/2019', '06:26:36pm', 'Entrar', 'Usuario hosp entrou no sistema'),
(57, 5, '03/09/2019', '06:31:32pm', 'Sair', 'Usuario hosp saiu do sistema'),
(58, 2, '03/09/2019', '06:31:42pm', 'Entrar', 'Usuario admin entrou no sistema'),
(59, 2, '03/09/2019', '06:34:03pm', 'Sair', 'Usuario admin saiu do sistema'),
(60, 2, '04/09/2019', '03:52:35pm', 'Entrar', 'Usuario admin entrou no sistema'),
(61, 2, '16/09/2019', '11:47:49pm', 'Entrar', 'Usuario admin entrou no sistema'),
(62, 2, '20/09/2019', '06:29:46pm', 'Entrar', 'Usuario admin entrou no sistema'),
(63, 2, '20/09/2019', '07:04:13pm', 'Adicionar', 'adicionou a turma Ciclo IV no sistema'),
(64, 2, '20/09/2019', '07:07:05pm', 'Adicionar', 'adicionou a turma X Ciclo no sistema'),
(65, 2, '20/09/2019', '07:07:56pm', 'Adicionar', 'adicionou a turma XI Ciclo no sistema'),
(66, 2, '20/09/2019', '07:08:31pm', 'Adicionar', 'adicionou o aluno 1 na turma 7'),
(67, 2, '20/09/2019', '07:09:41pm', 'Editar', 'fechou a turma 7 no sistema'),
(68, 2, '20/09/2019', '07:09:59pm', 'Editar', 'terminou a turma 7 no sistema');

-- --------------------------------------------------------

--
-- Estrutura da tabela `nivel_usuario`
--

CREATE TABLE `nivel_usuario` (
  `id_nivel_usuario` int(11) NOT NULL,
  `descricao` varchar(30) COLLATE utf16_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Extraindo dados da tabela `nivel_usuario`
--

INSERT INTO `nivel_usuario` (`id_nivel_usuario`, `descricao`) VALUES
(1, 'Administrador'),
(2, 'Direção'),
(3, 'Cordenação do Centro'),
(4, 'Tesouraria'),
(5, 'Formador'),
(6, 'Hospedaria'),
(7, 'Recepção do Centro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamento`
--

CREATE TABLE `pagamento` (
  `id_pagamento` int(11) NOT NULL,
  `id_turma` int(11) NOT NULL,
  `id_aluno` int(11) NOT NULL,
  `valor_pago` int(11) NOT NULL,
  `multa` int(11) NOT NULL DEFAULT '0',
  `codigo` varchar(100) COLLATE utf16_bin NOT NULL,
  `referencia` varchar(30) COLLATE utf16_bin NOT NULL,
  `data_criacao` varchar(30) COLLATE utf16_bin NOT NULL,
  `data_atualizacao` varchar(30) COLLATE utf16_bin NOT NULL,
  `id_tipo_pagamento` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Extraindo dados da tabela `pagamento`
--

INSERT INTO `pagamento` (`id_pagamento`, `id_turma`, `id_aluno`, `valor_pago`, `multa`, `codigo`, `referencia`, `data_criacao`, `data_atualizacao`, `id_tipo_pagamento`) VALUES
(1, 1, 1, 20500, 1, '', 'TPA', '30/08/2019', '', 1),
(2, 1, 1, 20500, 1, '', 'Deposito', '30/08/2019', '', 2),
(3, 2, 1, 5000, 0, '', 'TPA', '30/08/2019', '', 1),
(4, 5, 1, 5000, 0, '', 'TPA', '02/09/2019', '', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sala_de_aula`
--

CREATE TABLE `sala_de_aula` (
  `id_sala_de_aula` int(11) NOT NULL,
  `nome` varchar(30) COLLATE utf16_bin NOT NULL,
  `capacidade` int(11) NOT NULL,
  `sala_descricao` text COLLATE utf16_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Extraindo dados da tabela `sala_de_aula`
--

INSERT INTO `sala_de_aula` (`id_sala_de_aula`, `nome`, `capacidade`, `sala_descricao`) VALUES
(1, 'Sala 1', 30, 'Salas de Aulas Práticas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_pagamento`
--

CREATE TABLE `tipo_pagamento` (
  `id_tipo_pagamento` int(11) NOT NULL,
  `descricao` varchar(100) COLLATE utf16_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Extraindo dados da tabela `tipo_pagamento`
--

INSERT INTO `tipo_pagamento` (`id_tipo_pagamento`, `descricao`) VALUES
(1, 'Matricula'),
(2, 'Mensalidade');

-- --------------------------------------------------------

--
-- Estrutura da tabela `trabalho`
--

CREATE TABLE `trabalho` (
  `id_trabalho` int(11) NOT NULL,
  `empresa` varchar(100) COLLATE utf16_bin DEFAULT NULL,
  `cargo` varchar(100) COLLATE utf16_bin DEFAULT NULL,
  `categoria` varchar(100) COLLATE utf16_bin DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE `turma` (
  `id_turma` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_sala_de_aula` int(11) NOT NULL,
  `id_horario` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL DEFAULT '1',
  `turma_nome` varchar(30) COLLATE utf16_bin NOT NULL,
  `inicio_dia` int(11) NOT NULL,
  `inicio_mes` int(11) NOT NULL,
  `inicio_ano` int(11) NOT NULL,
  `fim_dia` int(11) NOT NULL,
  `fim_mes` int(11) NOT NULL,
  `fim_ano` int(11) NOT NULL,
  `duracao` int(11) DEFAULT NULL,
  `data_criacao` varchar(30) COLLATE utf16_bin NOT NULL,
  `data_atualizacao` varchar(30) COLLATE utf16_bin DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`id_turma`, `id_curso`, `id_usuario`, `id_sala_de_aula`, `id_horario`, `id_estado`, `turma_nome`, `inicio_dia`, `inicio_mes`, `inicio_ano`, `fim_dia`, `fim_mes`, `fim_ano`, `duracao`, `data_criacao`, `data_atualizacao`) VALUES
(6, 1, 3, 1, 2, 1, 'Ciclo IV', 0, 0, 0, 0, 0, 0, NULL, '20/09/2019', NULL),
(7, 1, 3, 1, 2, 3, 'X Ciclo', 20, 9, 2019, 20, 9, 2019, NULL, '20/09/2019', '20/09/19'),
(8, 1, 3, 1, 2, 1, 'XI Ciclo', 0, 0, 0, 0, 0, 0, NULL, '20/09/2019', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma_aluno`
--

CREATE TABLE `turma_aluno` (
  `id_turma_aluno` int(11) NOT NULL,
  `id_turma` int(11) NOT NULL,
  `id_aluno` int(11) NOT NULL,
  `nota_do_aluno` int(11) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `data_inscricao` varchar(30) COLLATE utf16_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Extraindo dados da tabela `turma_aluno`
--

INSERT INTO `turma_aluno` (`id_turma_aluno`, `id_turma`, `id_aluno`, `nota_do_aluno`, `estado`, `data_inscricao`) VALUES
(1, 1, 1, NULL, 3, '30/08/2019'),
(2, 2, 1, NULL, 3, '30/08/2019'),
(3, 5, 1, NULL, 3, '02/09/2019'),
(4, 7, 1, NULL, 3, '20/09/2019');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma_estado`
--

CREATE TABLE `turma_estado` (
  `id_estado` int(11) NOT NULL,
  `estado_descricao` varchar(30) COLLATE utf16_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Extraindo dados da tabela `turma_estado`
--

INSERT INTO `turma_estado` (`id_estado`, `estado_descricao`) VALUES
(1, 'ABERTA'),
(2, 'EM CURSO'),
(3, 'FINALIZADA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `id_nivel_usuario` int(11) NOT NULL,
  `nome_completo` varchar(100) COLLATE utf16_bin DEFAULT NULL,
  `nome_usuario` varchar(100) COLLATE utf16_bin NOT NULL,
  `senha` text COLLATE utf16_bin NOT NULL,
  `data_criacao` varchar(30) COLLATE utf16_bin NOT NULL,
  `data_atualizacao` varchar(30) COLLATE utf16_bin DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `id_nivel_usuario`, `nome_completo`, `nome_usuario`, `senha`, `data_criacao`, `data_atualizacao`) VALUES
(3, 5, 'Mario', 'mario', 'mario', '08/08/2019', NULL),
(2, 1, 'ADMIN', 'admin', 'admin', '08/08/2019', NULL),
(5, 6, 'Hospe', 'hosp', 'hosp', '28/08/2019', NULL),
(9, 7, 'Recepção', 'recepcao', 'admin', '30/08/2019', NULL),
(10, 4, 'Tesouraria', 'tesouraria', 'admin', '30/08/2019', NULL),
(11, 3, 'Cord Centro', 'cordcentro', 'admin', '30/08/2019', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id_aluno`),
  ADD UNIQUE KEY `num_bi` (`num_bi`),
  ADD KEY `Reftrabalho181` (`id_trabalho`);

--
-- Indexes for table `certificado`
--
ALTER TABLE `certificado`
  ADD PRIMARY KEY (`id_certificado`);

--
-- Indexes for table `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id_curso`);

--
-- Indexes for table `curso_aluno`
--
ALTER TABLE `curso_aluno`
  ADD PRIMARY KEY (`id_curso_aluno`,`id_aluno`,`id_curso`),
  ADD KEY `Refaluno21` (`id_aluno`),
  ADD KEY `Refcurso31` (`id_curso`),
  ADD KEY `Refcertificado221` (`id_certificado`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id_data`);

--
-- Indexes for table `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id_horario`);

--
-- Indexes for table `hospedaria_cliente`
--
ALTER TABLE `hospedaria_cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `bi_num` (`bi_num`);

--
-- Indexes for table `hospedaria_cliente_quarto`
--
ALTER TABLE `hospedaria_cliente_quarto`
  ADD PRIMARY KEY (`id_cliente_quarto`);

--
-- Indexes for table `hospedaria_quarto`
--
ALTER TABLE `hospedaria_quarto`
  ADD PRIMARY KEY (`id_quarto`);

--
-- Indexes for table `hospedaria_tipo_quarto`
--
ALTER TABLE `hospedaria_tipo_quarto`
  ADD PRIMARY KEY (`id_tipo_quarto`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `Refusuario141` (`id_usuario`);

--
-- Indexes for table `nivel_usuario`
--
ALTER TABLE `nivel_usuario`
  ADD PRIMARY KEY (`id_nivel_usuario`);

--
-- Indexes for table `pagamento`
--
ALTER TABLE `pagamento`
  ADD PRIMARY KEY (`id_pagamento`),
  ADD KEY `Refturma191` (`id_turma`),
  ADD KEY `Refaluno201` (`id_aluno`),
  ADD KEY `Reftipo_pagamento211` (`id_tipo_pagamento`);

--
-- Indexes for table `sala_de_aula`
--
ALTER TABLE `sala_de_aula`
  ADD PRIMARY KEY (`id_sala_de_aula`);

--
-- Indexes for table `tipo_pagamento`
--
ALTER TABLE `tipo_pagamento`
  ADD PRIMARY KEY (`id_tipo_pagamento`);

--
-- Indexes for table `trabalho`
--
ALTER TABLE `trabalho`
  ADD PRIMARY KEY (`id_trabalho`);

--
-- Indexes for table `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`id_turma`),
  ADD KEY `Refsala_de_aula61` (`id_sala_de_aula`),
  ADD KEY `Refturma_estado91` (`id_estado`),
  ADD KEY `Refhorario151` (`id_horario`),
  ADD KEY `Refcurso161` (`id_curso`),
  ADD KEY `Refusuario171` (`id_usuario`);

--
-- Indexes for table `turma_aluno`
--
ALTER TABLE `turma_aluno`
  ADD PRIMARY KEY (`id_turma_aluno`,`id_turma`,`id_aluno`),
  ADD KEY `Refturma41` (`id_turma`),
  ADD KEY `Refaluno131` (`id_aluno`);

--
-- Indexes for table `turma_estado`
--
ALTER TABLE `turma_estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `nome_usuario` (`nome_usuario`),
  ADD KEY `Refnivel_usuario81` (`id_nivel_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aluno`
--
ALTER TABLE `aluno`
  MODIFY `id_aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `curso`
--
ALTER TABLE `curso`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `curso_aluno`
--
ALTER TABLE `curso_aluno`
  MODIFY `id_curso_aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id_data` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `horario`
--
ALTER TABLE `horario`
  MODIFY `id_horario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hospedaria_cliente`
--
ALTER TABLE `hospedaria_cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hospedaria_cliente_quarto`
--
ALTER TABLE `hospedaria_cliente_quarto`
  MODIFY `id_cliente_quarto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hospedaria_quarto`
--
ALTER TABLE `hospedaria_quarto`
  MODIFY `id_quarto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hospedaria_tipo_quarto`
--
ALTER TABLE `hospedaria_tipo_quarto`
  MODIFY `id_tipo_quarto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `nivel_usuario`
--
ALTER TABLE `nivel_usuario`
  MODIFY `id_nivel_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pagamento`
--
ALTER TABLE `pagamento`
  MODIFY `id_pagamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sala_de_aula`
--
ALTER TABLE `sala_de_aula`
  MODIFY `id_sala_de_aula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tipo_pagamento`
--
ALTER TABLE `tipo_pagamento`
  MODIFY `id_tipo_pagamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `turma`
--
ALTER TABLE `turma`
  MODIFY `id_turma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `turma_aluno`
--
ALTER TABLE `turma_aluno`
  MODIFY `id_turma_aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
