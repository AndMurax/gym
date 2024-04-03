-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 02, 2024 at 02:10 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `academia`
--

-- --------------------------------------------------------

--
-- Table structure for table `associacao_membro_plano`
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
-- Dumping data for table `associacao_membro_plano`
--

INSERT INTO `associacao_membro_plano` (`MembroID`, `PlanoID`, `DataInicio`, `DataTermino`) VALUES
(9, 3, '2024-04-01', '2024-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `associacao_plano_atividade`
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
-- Table structure for table `atividade`
--

DROP TABLE IF EXISTS `atividade`;
CREATE TABLE IF NOT EXISTS `atividade` (
  `AtividadeID` int NOT NULL AUTO_INCREMENT,
  `NomeAtividade` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DescricaoAtividade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  PRIMARY KEY (`AtividadeID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `atividade`
--

INSERT INTO `atividade` (`AtividadeID`, `NomeAtividade`, `DescricaoAtividade`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Supino', 'Peito', NULL, NULL, '2024-04-01'),
(2, 'Cross Over', 'Peito', NULL, NULL, NULL),
(3, 'Teste', 'teste', '2024-03-27', '2024-03-27', '2024-03-27');

-- --------------------------------------------------------

--
-- Table structure for table `instrutor`
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
-- Dumping data for table `instrutor`
--

INSERT INTO `instrutor` (`InstrutorID`, `Nome`, `CPF`, `Email`) VALUES
(1, 'MuRax', '073.210.135-29', 'andmurax@gmail.com'),
(2, 'AndMuRax', '1234056666', 'andmurax@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `membro`
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
  `Email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Telefone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DataInscricao` date DEFAULT NULL,
  `InstrutorID` int DEFAULT NULL,
  `PlanoID` int NOT NULL,
  `Ativo` int NOT NULL,
  PRIMARY KEY (`MembroID`),
  KEY `InstrutorID` (`InstrutorID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `membro`
--

INSERT INTO `membro` (`MembroID`, `Nome`, `CPF`, `Sobrenome`, `DataNascimento`, `Genero`, `Peso`, `Altura`, `Endereco`, `Email`, `Telefone`, `DataInscricao`, `InstrutorID`, `PlanoID`, `Ativo`) VALUES
(9, 'Alguem', '967.896.465-15', 'Conceicao', '2024-03-13', 'masculino', 90, 1.83, 'Tancredo neves', NULL, '71984224045', '2024-03-13', NULL, 3, 1),
(8, 'Anderson', '060.946.425-62', 'dos Santos da Conceição', '1995-12-18', 'masculino', 100, 1.82, 'Tancredo neves', NULL, '71984224045', '2024-04-23', NULL, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `planostreino`
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
-- Dumping data for table `planostreino`
--

INSERT INTO `planostreino` (`PlanoID`, `NomePlano`, `DescricaoPlano`, `DuracaoMeses`, `PrecoPlano`) VALUES
(4, 'VIP', 'Plano para vips ', 1, '60.00'),
(3, 'Gold', 'Plano de 24 horas', 0, '10.00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
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
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `nome`, `password`, `email`, `foto_usuario`, `created_at`, `update_at`) VALUES
(1, 'Anderson Santos', 202, 'andmurax@gmail.com', 'application/assets/foto_usuario/aaa.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Teste', 202, 'Outro_email@gmail.com', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Conceicao', 202, 'andmurax1@gmail.com', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'gym', 202, 'aaa@email.com', 'application/assets/foto_usuario/anderson3.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
