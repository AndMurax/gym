-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 05-Ago-2024 às 23:41
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `academia`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `api_error`
--

DROP TABLE IF EXISTS `api_error`;
CREATE TABLE IF NOT EXISTS `api_error` (
  `id` int NOT NULL AUTO_INCREMENT,
  `classe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metodo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dados` varchar(3000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `error_message` varchar(3000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `associacao_membro_plano`
--

DROP TABLE IF EXISTS `associacao_membro_plano`;
CREATE TABLE IF NOT EXISTS `associacao_membro_plano` (
  `MembroID` int NOT NULL,
  `PlanoID` int NOT NULL,
  `DataInicio` date DEFAULT NULL,
  `DataTermino` date DEFAULT NULL,
  PRIMARY KEY (`MembroID`,`PlanoID`),
  KEY `PlanoID` (`PlanoID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `associacao_membro_plano`
--

INSERT INTO `associacao_membro_plano` (`MembroID`, `PlanoID`, `DataInicio`, `DataTermino`) VALUES
(9, 3, '2024-03-03', '2024-04-03'),
(11, 4, '2024-03-17', '2024-04-16'),
(8, 4, '2024-06-22', '2024-07-22'),
(12, 3, '2024-03-05', '2024-04-04'),
(13, 4, '2024-04-03', '2024-05-03'),
(14, 3, '2024-04-05', '2024-05-05'),
(16, 4, '2024-06-25', '2024-07-25'),
(18, 4, '2024-05-28', '2024-06-27'),
(19, 4, '2024-06-20', '2024-07-20'),
(20, 4, '2024-06-09', '2024-07-09');

-- --------------------------------------------------------

--
-- Estrutura da tabela `associacao_plano_atividade`
--

DROP TABLE IF EXISTS `associacao_plano_atividade`;
CREATE TABLE IF NOT EXISTS `associacao_plano_atividade` (
  `PlanoID` int NOT NULL,
  `AtividadeID` int NOT NULL,
  PRIMARY KEY (`PlanoID`,`AtividadeID`),
  KEY `AtividadeID` (`AtividadeID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividade`
--

DROP TABLE IF EXISTS `atividade`;
CREATE TABLE IF NOT EXISTS `atividade` (
  `AtividadeID` int NOT NULL AUTO_INCREMENT,
  `NomeAtividade` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DescricaoAtividade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`AtividadeID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `atividade`
--

INSERT INTO `atividade` (`AtividadeID`, `NomeAtividade`, `DescricaoAtividade`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Supino', 'Peito', NULL, NULL, '2024-04-01 03:00:00'),
(2, 'Cross Over', 'Peito', NULL, NULL, '2024-04-07 03:00:00'),
(3, 'Teste', 'teste', '2024-03-27 03:00:00', '2024-03-27 03:00:00', '2024-03-27 03:00:00'),
(5, 'Supino', 'Atividade para malhar o peito', '2024-04-07 03:00:00', NULL, NULL),
(6, 'Cross Over', 'Peito', '2024-04-08 03:00:00', NULL, '2024-04-08 03:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `categoria_id` int NOT NULL AUTO_INCREMENT,
  `tipo_conta_id` int NOT NULL,
  `nome` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  PRIMARY KEY (`categoria_id`),
  KEY `idx_categoria_tipo_conta_id` (`tipo_conta_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`categoria_id`, `tipo_conta_id`, `nome`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, 'Academia', '2024-06-25', NULL, '2024-06-25'),
(2, 0, 'Academia2 ', '2024-06-25', NULL, NULL),
(3, 0, 'Ajustar', '2024-07-02', '2024-07-02', '2024-07-02');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria_cliente`
--

DROP TABLE IF EXISTS `categoria_cliente`;
CREATE TABLE IF NOT EXISTS `categoria_cliente` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cep_cache`
--

DROP TABLE IF EXISTS `cep_cache`;
CREATE TABLE IF NOT EXISTS `cep_cache` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cep` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rua` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cidade` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bairro` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codigo_ibge` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uf` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cidade_id` int DEFAULT NULL,
  `estado_id` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidade`
--

DROP TABLE IF EXISTS `cidade`;
CREATE TABLE IF NOT EXISTS `cidade` (
  `id` int NOT NULL AUTO_INCREMENT,
  `estado_id` int NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo_ibge` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_cidade_estado_id` (`estado_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `conta`
--

DROP TABLE IF EXISTS `conta`;
CREATE TABLE IF NOT EXISTS `conta` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pessoa_id` int NOT NULL,
  `tipo_conta_id` int NOT NULL,
  `categoria_id` int NOT NULL,
  `forma_pagamento_id` int NOT NULL,
  `pedido_venda_id` int DEFAULT NULL,
  `dt_vencimento` date DEFAULT NULL,
  `dt_emissao` date DEFAULT NULL,
  `dt_pagamento` date DEFAULT NULL,
  `valor` double DEFAULT NULL,
  `parcela` int DEFAULT NULL,
  `obs` text COLLATE utf8mb4_unicode_ci,
  `mes_vencimento` int DEFAULT NULL,
  `ano_vencimento` int DEFAULT NULL,
  `ano_mes_vencimento` int DEFAULT NULL,
  `mes_emissao` int DEFAULT NULL,
  `ano_emissao` int DEFAULT NULL,
  `ano_mes_emissao` int DEFAULT NULL,
  `mes_pagamento` int DEFAULT NULL,
  `ano_pagamento` int DEFAULT NULL,
  `ano_mes_pagamento` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_conta_tipo_conta_id` (`tipo_conta_id`),
  KEY `idx_conta_categoria_id` (`categoria_id`),
  KEY `idx_conta_forma_pagamento_id` (`forma_pagamento_id`),
  KEY `idx_conta_pessoa_id` (`pessoa_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `conta_anexo`
--

DROP TABLE IF EXISTS `conta_anexo`;
CREATE TABLE IF NOT EXISTS `conta_anexo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `conta_id` int NOT NULL,
  `tipo_anexo_id` int NOT NULL,
  `descricao` text COLLATE utf8mb4_unicode_ci,
  `arquivo` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `idx_conta_anexo_conta_id` (`conta_id`),
  KEY `idx_conta_anexo_tipo_anexo_id` (`tipo_anexo_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `error_log_crontab`
--

DROP TABLE IF EXISTS `error_log_crontab`;
CREATE TABLE IF NOT EXISTS `error_log_crontab` (
  `id` int NOT NULL AUTO_INCREMENT,
  `classe` text COLLATE utf8mb4_unicode_ci,
  `metodo` text COLLATE utf8mb4_unicode_ci,
  `mensagem` text COLLATE utf8mb4_unicode_ci,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado`
--

DROP TABLE IF EXISTS `estado`;
CREATE TABLE IF NOT EXISTS `estado` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sigla` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo_ibge` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `forma_pagamento`
--

DROP TABLE IF EXISTS `forma_pagamento`;
CREATE TABLE IF NOT EXISTS `forma_pagamento` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `forma_pagamento`
--

INSERT INTO `forma_pagamento` (`id`, `nome`) VALUES
(5, 'Dinheiro'),
(2, 'Pix'),
(3, 'Cartão');

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupo_pessoa`
--

DROP TABLE IF EXISTS `grupo_pessoa`;
CREATE TABLE IF NOT EXISTS `grupo_pessoa` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `instrutor`
--

DROP TABLE IF EXISTS `instrutor`;
CREATE TABLE IF NOT EXISTS `instrutor` (
  `InstrutorID` int NOT NULL AUTO_INCREMENT,
  `Nome` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CPF` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`InstrutorID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `instrutor`
--

INSERT INTO `instrutor` (`InstrutorID`, `Nome`, `CPF`, `Email`) VALUES
(1, 'MuRax', '073.210.135-29', 'andmurax@gmail.com'),
(2, 'AndMuRax', '1234056666', 'andmurax@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `membro`
--

DROP TABLE IF EXISTS `membro`;
CREATE TABLE IF NOT EXISTS `membro` (
  `MembroID` int NOT NULL AUTO_INCREMENT,
  `Nome` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CPF` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Sobrenome` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DataNascimento` date DEFAULT NULL,
  `Genero` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Peso` float DEFAULT NULL,
  `Altura` float DEFAULT NULL,
  `Endereco` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Telefone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DataInscricao` date DEFAULT NULL,
  `InstrutorID` int DEFAULT NULL,
  `PlanoID` int NOT NULL,
  `Ativo` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  PRIMARY KEY (`MembroID`),
  KEY `InstrutorID` (`InstrutorID`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `membro`
--

INSERT INTO `membro` (`MembroID`, `Nome`, `CPF`, `Sobrenome`, `DataNascimento`, `Genero`, `Peso`, `Altura`, `Endereco`, `Telefone`, `DataInscricao`, `InstrutorID`, `PlanoID`, `Ativo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(8, 'Outro nome', '297.980.810-56', 'dos Santos da Conceição', '1995-12-18', 'masculino', 100, 1.82, 'Tancredo neves', '71984224045', '2024-04-23', NULL, 4, 1, '0000-00-00 00:00:00', '2024-06-10 00:25:38', NULL),
(16, 'Anderson', '073.210.135-27', 'dos Santos da Conceição', '2024-04-12', 'masculino', 100, 100, 'Tancredo neves', '71984224045', '2024-04-24', NULL, 4, 1, '2024-04-07 14:54:50', '2024-04-25 11:11:49', NULL),
(18, 'Anderson', '073.210.135-27', 'dos Santos da Conceição', '2024-06-12', 'masculino', 99.99, 1.96, 'Tancredo neves', '71984224045', '2024-06-06', NULL, 4, 1, '2024-06-04 00:33:57', NULL, NULL),
(19, 'Anderson', '073.210.135-29', 'dos Santos da Conceição', '2024-06-07', 'masculino', 100, 100, 'Tancredo neves', '71984224045', '2024-05-26', NULL, 4, 1, '2024-06-04 23:26:39', NULL, NULL),
(20, 'Testando CPF', '073.210.135-29', 'dos Santos da Conceição', '2024-06-13', 'masculino', 100, 1.78, 'Tancredo neves', '71984224045', '2024-06-13', NULL, 4, 1, '2024-06-09 21:34:09', '2024-06-10 00:07:34', '2024-06-14');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

DROP TABLE IF EXISTS `pessoa`;
CREATE TABLE IF NOT EXISTS `pessoa` (
  `pessoa_id` int NOT NULL AUTO_INCREMENT,
  `tipo_cliente_id` int NOT NULL,
  `categoria_cliente_id` int DEFAULT NULL,
  `nome` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `obs` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Telefone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`pessoa_id`),
  KEY `idx_pessoa_tipo_cliente_id` (`tipo_cliente_id`),
  KEY `idx_pessoa_categoria_cliente_id` (`categoria_cliente_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`pessoa_id`, `tipo_cliente_id`, `categoria_cliente_id`, `nome`, `obs`, `Telefone`, `email`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, NULL, 'Anderson dos Santos da Conceição', ' Teste\r\n\r\n								', '71984224045', 'andmurax@gmail.com', '2024-06-24 14:13:09', NULL, NULL),
(2, 1, NULL, 'Outra Pessoa', ' Teste outra pessoa \r\n\r\n								', '71984224045', 'andmurax@gmail.com', '2024-06-24 22:39:43', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa_contato`
--

DROP TABLE IF EXISTS `pessoa_contato`;
CREATE TABLE IF NOT EXISTS `pessoa_contato` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pessoa_id` int NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `obs` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_pessoa_contato_pessoa_id` (`pessoa_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa_endereco`
--

DROP TABLE IF EXISTS `pessoa_endereco`;
CREATE TABLE IF NOT EXISTS `pessoa_endereco` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pessoa_id` int NOT NULL,
  `cidade_id` int NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `principal` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cep` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rua` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bairro` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complemento` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_desativacao` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_pessoa_endereco_pessoa_id` (`pessoa_id`),
  KEY `idx_pessoa_endereco_cidade_id` (`cidade_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa_grupo`
--

DROP TABLE IF EXISTS `pessoa_grupo`;
CREATE TABLE IF NOT EXISTS `pessoa_grupo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pessoa_id` int NOT NULL,
  `grupo_pessoa_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_pessoa_grupo_pessoa_id` (`pessoa_id`),
  KEY `idx_pessoa_grupo_grupo_pessoa_id` (`grupo_pessoa_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `planostreino`
--

DROP TABLE IF EXISTS `planostreino`;
CREATE TABLE IF NOT EXISTS `planostreino` (
  `PlanoID` int NOT NULL AUTO_INCREMENT,
  `NomePlano` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DescricaoPlano` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DuracaoMeses` int DEFAULT NULL,
  `PrecoPlano` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`PlanoID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `planostreino`
--

INSERT INTO `planostreino` (`PlanoID`, `NomePlano`, `DescricaoPlano`, `DuracaoMeses`, `PrecoPlano`) VALUES
(4, 'VIP', 'Plano para vips ', 1, '60.00'),
(3, 'Gold', 'Plano de 24 horas', 0, '10.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_users`
--

DROP TABLE IF EXISTS `tb_users`;
CREATE TABLE IF NOT EXISTS `tb_users` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `nome` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` int NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_usuario` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `update_at` timestamp NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `nome`, `password`, `email`, `foto_usuario`, `created_at`, `update_at`) VALUES
(1, 'Anderson Santos', 202, 'andmurax@gmail.com', 'application/assets/foto_usuario/aaa.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Teste', 202, 'Outro_email@gmail.com', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Conceicao', 202, 'andmurax1@gmail.com', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Gym', 202, 'admin@gym.com', 'application/assets/foto_usuario/anderson3.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_anexo`
--

DROP TABLE IF EXISTS `tipo_anexo`;
CREATE TABLE IF NOT EXISTS `tipo_anexo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tipo_anexo`
--

INSERT INTO `tipo_anexo` (`id`, `nome`) VALUES
(1, 'Recibo'),
(2, 'Comprovante');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_cliente`
--

DROP TABLE IF EXISTS `tipo_cliente`;
CREATE TABLE IF NOT EXISTS `tipo_cliente` (
  `tipo_cliente_id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sigla` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`tipo_cliente_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tipo_cliente`
--

INSERT INTO `tipo_cliente` (`tipo_cliente_id`, `nome`, `sigla`) VALUES
(1, 'Física', 'PF'),
(2, 'Jurídica', 'PJ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_conta`
--

DROP TABLE IF EXISTS `tipo_conta`;
CREATE TABLE IF NOT EXISTS `tipo_conta` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tipo_conta`
--

INSERT INTO `tipo_conta` (`id`, `nome`) VALUES
(1, 'Receber'),
(2, 'Pagar');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
