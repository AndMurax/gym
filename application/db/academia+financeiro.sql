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



CREATE TABLE api_error( 
      \`id\`  INT  AUTO_INCREMENT    NOT NULL  , 
      \`classe\` varchar  (255)   , 
      \`metodo\` varchar  (255)   , 
      \`url\` varchar  (500)   , 
      \`dados\` varchar  (3000)   , 
      \`error_message\` varchar  (3000)   , 
      \`created_at\` datetime   , 
 PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; 

CREATE TABLE categoria( 
      \`id\`  INT  AUTO_INCREMENT    NOT NULL  , 
      \`tipo_conta_id\` int   NOT NULL  , 
      \`nome\` text   NOT NULL  , 
 PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; 

CREATE TABLE categoria_cliente( 
      \`id\`  INT  AUTO_INCREMENT    NOT NULL  , 
      \`nome\` varchar  (255)   NOT NULL  , 
 PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; 

CREATE TABLE cep_cache( 
      \`id\`  INT  AUTO_INCREMENT    NOT NULL  , 
      \`cep\` varchar  (10)   , 
      \`rua\` varchar  (10)   , 
      \`cidade\` varchar  (500)   , 
      \`bairro\` varchar  (500)   , 
      \`codigo_ibge\` varchar  (20)   , 
      \`uf\` varchar  (2)   , 
      \`cidade_id\` int   , 
      \`estado_id\` int   , 
      \`created_at\` datetime   , 
 PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; 

CREATE TABLE cidade( 
      \`id\`  INT  AUTO_INCREMENT    NOT NULL  , 
      \`estado_id\` int   NOT NULL  , 
      \`nome\` varchar  (255)   NOT NULL  , 
      \`codigo_ibge\` varchar  (10)   NOT NULL  , 
 PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; 

CREATE TABLE conta( 
      \`id\`  INT  AUTO_INCREMENT    NOT NULL  , 
      \`pessoa_id\` int   NOT NULL  , 
      \`tipo_conta_id\` int   NOT NULL  , 
      \`categoria_id\` int   NOT NULL  , 
      \`forma_pagamento_id\` int   NOT NULL  , 
      \`pedido_venda_id\` int   , 
      \`dt_vencimento\` date   , 
      \`dt_emissao\` date   , 
      \`dt_pagamento\` date   , 
      \`valor\` double   , 
      \`parcela\` int   , 
      \`obs\` text   , 
      \`mes_vencimento\` int   , 
      \`ano_vencimento\` int   , 
      \`ano_mes_vencimento\` int   , 
      \`mes_emissao\` int   , 
      \`ano_emissao\` int   , 
      \`ano_mes_emissao\` int   , 
      \`mes_pagamento\` int   , 
      \`ano_pagamento\` int   , 
      \`ano_mes_pagamento\` int   , 
      \`created_at\` datetime   , 
      \`updated_at\` datetime   , 
      \`deleted_at\` datetime   , 
 PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; 

CREATE TABLE conta_anexo( 
      \`id\`  INT  AUTO_INCREMENT    NOT NULL  , 
      \`conta_id\` int   NOT NULL  , 
      \`tipo_anexo_id\` int   NOT NULL  , 
      \`descricao\` text   , 
      \`arquivo\` text   , 
 PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; 

CREATE TABLE error_log_crontab( 
      \`id\`  INT  AUTO_INCREMENT    NOT NULL  , 
      \`classe\` text   , 
      \`metodo\` text   , 
      \`mensagem\` text   , 
      \`created_at\` datetime   , 
 PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; 

CREATE TABLE estado( 
      \`id\`  INT  AUTO_INCREMENT    NOT NULL  , 
      \`nome\` varchar  (255)   NOT NULL  , 
      \`sigla\` char  (2)   NOT NULL  , 
      \`codigo_ibge\` varchar  (10)   , 
 PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; 

CREATE TABLE forma_pagamento( 
      \`id\`  INT  AUTO_INCREMENT    NOT NULL  , 
      \`nome\` text   NOT NULL  , 
 PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; 

CREATE TABLE grupo_pessoa( 
      \`id\`  INT  AUTO_INCREMENT    NOT NULL  , 
      \`nome\` varchar  (255)   NOT NULL  , 
 PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; 

CREATE TABLE pessoa( 
      \`id\`  INT  AUTO_INCREMENT    NOT NULL  , 
      \`tipo_cliente_id\` int   NOT NULL  , 
      \`categoria_cliente_id\` int   , 
      \`system_user_id\` int   , 
      \`nome\` varchar  (500)   NOT NULL  , 
      \`documento\` varchar  (20)   NOT NULL  , 
      \`obs\` varchar  (1000)   , 
      \`fone\` varchar  (255)   , 
      \`email\` varchar  (255)   , 
      \`created_at\` datetime   , 
      \`updated_at\` datetime   , 
      \`deleted_at\` datetime   , 
      \`login\` varchar  (255)   , 
      \`senha\` varchar  (255)   , 
 PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; 

CREATE TABLE pessoa_contato( 
      \`id\`  INT  AUTO_INCREMENT    NOT NULL  , 
      \`pessoa_id\` int   NOT NULL  , 
      \`email\` varchar  (255)   , 
      \`nome\` varchar  (255)   , 
      \`telefone\` varchar  (255)   , 
      \`obs\` varchar  (500)   , 
      \`created_at\` datetime   , 
      \`updated_at\` datetime   , 
 PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; 

CREATE TABLE pessoa_endereco( 
      \`id\`  INT  AUTO_INCREMENT    NOT NULL  , 
      \`pessoa_id\` int   NOT NULL  , 
      \`cidade_id\` int   NOT NULL  , 
      \`nome\` varchar  (255)   , 
      \`principal\` char  (1)   , 
      \`cep\` varchar  (10)   , 
      \`rua\` varchar  (500)   , 
      \`numero\` varchar  (20)   , 
      \`bairro\` varchar  (500)   , 
      \`complemento\` varchar  (500)   , 
      \`data_desativacao\` date   , 
      \`created_at\` datetime   , 
      \`updated_at\` datetime   , 
 PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; 

CREATE TABLE pessoa_grupo( 
      \`id\`  INT  AUTO_INCREMENT    NOT NULL  , 
      \`pessoa_id\` int   NOT NULL  , 
      \`grupo_pessoa_id\` int   NOT NULL  , 
 PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; 

CREATE TABLE system_group( 
      \`id\` int   NOT NULL  , 
      \`name\` text   NOT NULL  , 
      \`uuid\` varchar  (36)   , 
 PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; 

CREATE TABLE system_group_program( 
      \`id\` int   NOT NULL  , 
      \`system_group_id\` int   NOT NULL  , 
      \`system_program_id\` int   NOT NULL  , 
 PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; 

CREATE TABLE system_preference( 
      \`id\` varchar  (255)   NOT NULL  , 
      \`preference\` text   NOT NULL  , 
 PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; 

CREATE TABLE system_program( 
      \`id\` int   NOT NULL  , 
      \`name\` text   NOT NULL  , 
      \`controller\` text   NOT NULL  , 
 PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; 

CREATE TABLE system_unit( 
      \`id\` int   NOT NULL  , 
      \`name\` text   NOT NULL  , 
      \`connection_name\` text   , 
 PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; 

CREATE TABLE system_user_group( 
      \`id\` int   NOT NULL  , 
      \`system_user_id\` int   NOT NULL  , 
      \`system_group_id\` int   NOT NULL  , 
 PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; 

CREATE TABLE system_user_program( 
      \`id\` int   NOT NULL  , 
      \`system_user_id\` int   NOT NULL  , 
      \`system_program_id\` int   NOT NULL  , 
 PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; 

CREATE TABLE system_users( 
      \`id\` int   NOT NULL  , 
      \`name\` text   NOT NULL  , 
      \`login\` text   NOT NULL  , 
      \`password\` text   NOT NULL  , 
      \`email\` text   , 
      \`frontpage_id\` int   , 
      \`system_unit_id\` int   , 
      \`active\` char  (1)   , 
      \`accepted_term_policy_at\` text   , 
      \`accepted_term_policy\` char  (1)   , 
 PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; 

CREATE TABLE system_user_unit( 
      \`id\` int   NOT NULL  , 
      \`system_user_id\` int   NOT NULL  , 
      \`system_unit_id\` int   NOT NULL  , 
 PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; 

CREATE TABLE tipo_anexo( 
      \`id\`  INT  AUTO_INCREMENT    NOT NULL  , 
      \`nome\` text   NOT NULL  , 
 PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; 

CREATE TABLE tipo_cliente( 
      \`id\`  INT  AUTO_INCREMENT    NOT NULL  , 
      \`nome\` varchar  (255)   NOT NULL  , 
      \`sigla\` char  (2)   NOT NULL  , 
 PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; 

CREATE TABLE tipo_conta( 
      \`id\`  INT  AUTO_INCREMENT    NOT NULL  , 
      \`nome\` text   NOT NULL  , 
 PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; 

 
  
 ALTER TABLE categoria ADD CONSTRAINT fk_categoria_1 FOREIGN KEY (tipo_conta_id) references tipo_conta(id); 
ALTER TABLE cidade ADD CONSTRAINT fk_cidade_1 FOREIGN KEY (estado_id) references estado(id); 
ALTER TABLE conta ADD CONSTRAINT fk_conta_1 FOREIGN KEY (tipo_conta_id) references tipo_conta(id); 
ALTER TABLE conta ADD CONSTRAINT fk_conta_2 FOREIGN KEY (categoria_id) references categoria(id); 
ALTER TABLE conta ADD CONSTRAINT fk_conta_3 FOREIGN KEY (forma_pagamento_id) references forma_pagamento(id); 
ALTER TABLE conta ADD CONSTRAINT fk_conta_4 FOREIGN KEY (pessoa_id) references pessoa(id); 
ALTER TABLE conta_anexo ADD CONSTRAINT fk_conta_anexo_1 FOREIGN KEY (conta_id) references conta(id); 
ALTER TABLE conta_anexo ADD CONSTRAINT fk_conta_anexo_2 FOREIGN KEY (tipo_anexo_id) references tipo_anexo(id); 
ALTER TABLE pessoa ADD CONSTRAINT fk_pessoa_1 FOREIGN KEY (tipo_cliente_id) references tipo_cliente(id); 
ALTER TABLE pessoa ADD CONSTRAINT fk_pessoa_2 FOREIGN KEY (categoria_cliente_id) references categoria_cliente(id); 
ALTER TABLE pessoa ADD CONSTRAINT fk_pessoa_3 FOREIGN KEY (system_user_id) references system_users(id); 
ALTER TABLE pessoa_contato ADD CONSTRAINT fk_pessoa_contato_1 FOREIGN KEY (pessoa_id) references pessoa(id); 
ALTER TABLE pessoa_endereco ADD CONSTRAINT fk_pessoa_endereco_1 FOREIGN KEY (pessoa_id) references pessoa(id); 
ALTER TABLE pessoa_endereco ADD CONSTRAINT fk_pessoa_endereco_2 FOREIGN KEY (cidade_id) references cidade(id); 
ALTER TABLE pessoa_grupo ADD CONSTRAINT fk_pessoa_grupo_1 FOREIGN KEY (pessoa_id) references pessoa(id); 
ALTER TABLE pessoa_grupo ADD CONSTRAINT fk_pessoa_grupo_2 FOREIGN KEY (grupo_pessoa_id) references grupo_pessoa(id); 
ALTER TABLE system_group_program ADD CONSTRAINT fk_system_group_program_1 FOREIGN KEY (system_program_id) references system_program(id); 
ALTER TABLE system_group_program ADD CONSTRAINT fk_system_group_program_2 FOREIGN KEY (system_group_id) references system_group(id); 
ALTER TABLE system_user_group ADD CONSTRAINT fk_system_user_group_1 FOREIGN KEY (system_group_id) references system_group(id); 
ALTER TABLE system_user_group ADD CONSTRAINT fk_system_user_group_2 FOREIGN KEY (system_user_id) references system_users(id); 
ALTER TABLE system_user_program ADD CONSTRAINT fk_system_user_program_1 FOREIGN KEY (system_program_id) references system_program(id); 
ALTER TABLE system_user_program ADD CONSTRAINT fk_system_user_program_2 FOREIGN KEY (system_user_id) references system_users(id); 
ALTER TABLE system_users ADD CONSTRAINT fk_system_user_1 FOREIGN KEY (system_unit_id) references system_unit(id); 
ALTER TABLE system_users ADD CONSTRAINT fk_system_user_2 FOREIGN KEY (frontpage_id) references system_program(id); 
ALTER TABLE system_user_unit ADD CONSTRAINT fk_system_user_unit_1 FOREIGN KEY (system_user_id) references system_users(id); 
ALTER TABLE system_user_unit ADD CONSTRAINT fk_system_user_unit_2 FOREIGN KEY (system_unit_id) references system_unit(id); 
 
 CREATE index idx_categoria_tipo_conta_id on categoria(tipo_conta_id); 
CREATE index idx_cidade_estado_id on cidade(estado_id); 
CREATE index idx_conta_tipo_conta_id on conta(tipo_conta_id); 
CREATE index idx_conta_categoria_id on conta(categoria_id); 
CREATE index idx_conta_forma_pagamento_id on conta(forma_pagamento_id); 
CREATE index idx_conta_pessoa_id on conta(pessoa_id); 
CREATE index idx_conta_anexo_conta_id on conta_anexo(conta_id); 
CREATE index idx_conta_anexo_tipo_anexo_id on conta_anexo(tipo_anexo_id); 
CREATE index idx_pessoa_tipo_cliente_id on pessoa(tipo_cliente_id); 
CREATE index idx_pessoa_categoria_cliente_id on pessoa(categoria_cliente_id); 
CREATE index idx_pessoa_system_user_id on pessoa(system_user_id); 
CREATE index idx_pessoa_contato_pessoa_id on pessoa_contato(pessoa_id); 
CREATE index idx_pessoa_endereco_pessoa_id on pessoa_endereco(pessoa_id); 
CREATE index idx_pessoa_endereco_cidade_id on pessoa_endereco(cidade_id); 
CREATE index idx_pessoa_grupo_pessoa_id on pessoa_grupo(pessoa_id); 
CREATE index idx_pessoa_grupo_grupo_pessoa_id on pessoa_grupo(grupo_pessoa_id); 
CREATE index idx_system_group_program_system_program_id on system_group_program(system_program_id); 
CREATE index idx_system_group_program_system_group_id on system_group_program(system_group_id); 
CREATE index idx_system_user_group_system_group_id on system_user_group(system_group_id); 
CREATE index idx_system_user_group_system_user_id on system_user_group(system_user_id); 
CREATE index idx_system_user_program_system_program_id on system_user_program(system_program_id); 
CREATE index idx_system_user_program_system_user_id on system_user_program(system_user_id); 
CREATE index idx_system_users_system_unit_id on system_users(system_unit_id); 
CREATE index idx_system_users_frontpage_id on system_users(frontpage_id); 
CREATE index idx_system_user_unit_system_user_id on system_user_unit(system_user_id); 
CREATE index idx_system_user_unit_system_unit_id on system_user_unit(system_unit_id); 
INSERT INTO categoria (id,tipo_conta_id,nome) VALUES (1,1,'Vendas de mercadorias'); 

INSERT INTO categoria (id,tipo_conta_id,nome) VALUES (2,1,'Vendas de produtos'); 

INSERT INTO categoria (id,tipo_conta_id,nome) VALUES (3,1,'Venda de insumos'); 

INSERT INTO categoria (id,tipo_conta_id,nome) VALUES (4,1,'Serviços de manutenção'); 

INSERT INTO categoria (id,tipo_conta_id,nome) VALUES (5,1,'Receitas financeiras'); 

INSERT INTO categoria (id,tipo_conta_id,nome) VALUES (6,2,'Compras de matérias primas'); 

INSERT INTO categoria (id,tipo_conta_id,nome) VALUES (7,2,'Compras de insumos'); 

INSERT INTO categoria (id,tipo_conta_id,nome) VALUES (8,2,'Pagamento de salários'); 

INSERT INTO categoria (id,tipo_conta_id,nome) VALUES (9,2,'Investimentos em imobilizado'); 

INSERT INTO categoria (id,tipo_conta_id,nome) VALUES (10,2,'Despesas administrativas'); 

INSERT INTO categoria (id,tipo_conta_id,nome) VALUES (11,2,'Despesas comerciais'); 

INSERT INTO categoria_cliente (id,nome) VALUES (1,'Supermercado'); 

INSERT INTO categoria_cliente (id,nome) VALUES (2,'Posto de gasolina'); 

INSERT INTO categoria_cliente (id,nome) VALUES (3,'Igreja'); 

INSERT INTO categoria_cliente (id,nome) VALUES (4,'Escola'); 

INSERT INTO categoria_cliente (id,nome) VALUES (5,'Consumidor final'); 

INSERT INTO categoria_cliente (id,nome) VALUES (6,'Fornecedor'); 

INSERT INTO categoria_cliente (id,nome) VALUES (7,'Vendedor'); 

INSERT INTO cidade (id,estado_id,nome,codigo_ibge) VALUES (1,1,'Lajeado','123123'); 

INSERT INTO conta (id,pessoa_id,tipo_conta_id,categoria_id,forma_pagamento_id,pedido_venda_id,dt_vencimento,dt_emissao,dt_pagamento,valor,parcela,obs,mes_vencimento,ano_vencimento,ano_mes_vencimento,mes_emissao,ano_emissao,ano_mes_emissao,mes_pagamento,ano_pagamento,ano_mes_pagamento,created_at,updated_at,deleted_at) VALUES (1,1,2,8,1,null,'2022-07-20','2022-07-20',null,150,1,'',null,null,null,null,null,null,null,null,null,null,null,null); 

INSERT INTO conta (id,pessoa_id,tipo_conta_id,categoria_id,forma_pagamento_id,pedido_venda_id,dt_vencimento,dt_emissao,dt_pagamento,valor,parcela,obs,mes_vencimento,ano_vencimento,ano_mes_vencimento,mes_emissao,ano_emissao,ano_mes_emissao,mes_pagamento,ano_pagamento,ano_mes_pagamento,created_at,updated_at,deleted_at) VALUES (2,1,2,6,2,null,'2022-07-21','2022-07-20',null,250,1,'',null,null,null,null,null,null,null,null,null,null,null,null); 

INSERT INTO conta (id,pessoa_id,tipo_conta_id,categoria_id,forma_pagamento_id,pedido_venda_id,dt_vencimento,dt_emissao,dt_pagamento,valor,parcela,obs,mes_vencimento,ano_vencimento,ano_mes_vencimento,mes_emissao,ano_emissao,ano_mes_emissao,mes_pagamento,ano_pagamento,ano_mes_pagamento,created_at,updated_at,deleted_at) VALUES (3,1,2,11,3,null,'2022-07-30','2022-07-01',null,300,1,'',null,null,null,null,null,null,null,null,null,null,null,null); 

INSERT INTO conta (id,pessoa_id,tipo_conta_id,categoria_id,forma_pagamento_id,pedido_venda_id,dt_vencimento,dt_emissao,dt_pagamento,valor,parcela,obs,mes_vencimento,ano_vencimento,ano_mes_vencimento,mes_emissao,ano_emissao,ano_mes_emissao,mes_pagamento,ano_pagamento,ano_mes_pagamento,created_at,updated_at,deleted_at) VALUES (4,1,2,10,1,null,'2022-07-30','2022-07-01',null,400,1,'',null,null,null,null,null,null,null,null,null,null,null,null); 

INSERT INTO estado (id,nome,sigla,codigo_ibge) VALUES (1,'Rio Grande do Sul','RS',''); 

INSERT INTO forma_pagamento (id,nome) VALUES (1,'Dinheiro'); 

INSERT INTO forma_pagamento (id,nome) VALUES (2,'Boleto'); 

INSERT INTO forma_pagamento (id,nome) VALUES (3,'Cartão'); 

INSERT INTO grupo_pessoa (id,nome) VALUES (1,'Funcionário'); 

INSERT INTO grupo_pessoa (id,nome) VALUES (2,'Vendedor'); 

INSERT INTO grupo_pessoa (id,nome) VALUES (3,'Cliente'); 

INSERT INTO grupo_pessoa (id,nome) VALUES (4,'Fornecedor'); 

INSERT INTO grupo_pessoa (id,nome) VALUES (5,'Distribuidor'); 

INSERT INTO grupo_pessoa (id,nome) VALUES (6,'Revendedor'); 

INSERT INTO grupo_pessoa (id,nome) VALUES (7,'Transportadora'); 

INSERT INTO pessoa (id,tipo_cliente_id,categoria_cliente_id,system_user_id,nome,documento,obs,fone,email,created_at,updated_at,deleted_at,login,senha) VALUES (1,1,5,null,'Cliente 01','111.111.111-11','','(51) 9 9813-1234','cliente@cliente.com.br',null,null,null,null,null); 

INSERT INTO pessoa (id,tipo_cliente_id,categoria_cliente_id,system_user_id,nome,documento,obs,fone,email,created_at,updated_at,deleted_at,login,senha) VALUES (2,1,7,1,'Vendedor 01','1111111','','','',null,null,null,null,null); 

INSERT INTO pessoa (id,tipo_cliente_id,categoria_cliente_id,system_user_id,nome,documento,obs,fone,email,created_at,updated_at,deleted_at,login,senha) VALUES (3,2,6,null,'Fornecedor 01','1111111','','','',null,null,null,null,null); 

INSERT INTO pessoa (id,tipo_cliente_id,categoria_cliente_id,system_user_id,nome,documento,obs,fone,email,created_at,updated_at,deleted_at,login,senha) VALUES (4,2,null,null,'Transportadora','111111111','','','',null,null,null,null,null); 

INSERT INTO pessoa_grupo (id,pessoa_id,grupo_pessoa_id) VALUES (1,1,3); 

INSERT INTO pessoa_grupo (id,pessoa_id,grupo_pessoa_id) VALUES (2,2,2); 

INSERT INTO pessoa_grupo (id,pessoa_id,grupo_pessoa_id) VALUES (3,3,4); 

INSERT INTO pessoa_grupo (id,pessoa_id,grupo_pessoa_id) VALUES (4,4,7); 

INSERT INTO system_group (id,name,uuid) VALUES (1,'Admin',null); 

INSERT INTO system_group (id,name,uuid) VALUES (2,'Standard',null); 

INSERT INTO system_group_program (id,system_group_id,system_program_id) VALUES (1,1,1); 

INSERT INTO system_group_program (id,system_group_id,system_program_id) VALUES (2,1,2); 

INSERT INTO system_group_program (id,system_group_id,system_program_id) VALUES (3,1,3); 

INSERT INTO system_group_program (id,system_group_id,system_program_id) VALUES (4,1,4); 

INSERT INTO system_group_program (id,system_group_id,system_program_id) VALUES (5,1,5); 

INSERT INTO system_group_program (id,system_group_id,system_program_id) VALUES (6,1,6); 

INSERT INTO system_group_program (id,system_group_id,system_program_id) VALUES (7,1,8); 

INSERT INTO system_group_program (id,system_group_id,system_program_id) VALUES (8,1,9); 

INSERT INTO system_group_program (id,system_group_id,system_program_id) VALUES (9,1,11); 

INSERT INTO system_group_program (id,system_group_id,system_program_id) VALUES (10,1,14); 

INSERT INTO system_group_program (id,system_group_id,system_program_id) VALUES (11,1,15); 

INSERT INTO system_group_program (id,system_group_id,system_program_id) VALUES (12,2,10); 

INSERT INTO system_group_program (id,system_group_id,system_program_id) VALUES (13,2,12); 

INSERT INTO system_group_program (id,system_group_id,system_program_id) VALUES (14,2,13); 

INSERT INTO system_group_program (id,system_group_id,system_program_id) VALUES (15,2,16); 

INSERT INTO system_group_program (id,system_group_id,system_program_id) VALUES (16,2,17); 

INSERT INTO system_group_program (id,system_group_id,system_program_id) VALUES (17,2,18); 

INSERT INTO system_group_program (id,system_group_id,system_program_id) VALUES (18,2,19); 

INSERT INTO system_group_program (id,system_group_id,system_program_id) VALUES (19,2,20); 

INSERT INTO system_group_program (id,system_group_id,system_program_id) VALUES (20,1,21); 

INSERT INTO system_group_program (id,system_group_id,system_program_id) VALUES (21,2,22); 

INSERT INTO system_group_program (id,system_group_id,system_program_id) VALUES (22,2,23); 

INSERT INTO system_group_program (id,system_group_id,system_program_id) VALUES (23,2,24); 

INSERT INTO system_group_program (id,system_group_id,system_program_id) VALUES (24,2,25); 

INSERT INTO system_group_program (id,system_group_id,system_program_id) VALUES (25,1,26); 

INSERT INTO system_group_program (id,system_group_id,system_program_id) VALUES (26,1,27); 

INSERT INTO system_group_program (id,system_group_id,system_program_id) VALUES (27,1,28); 

INSERT INTO system_group_program (id,system_group_id,system_program_id) VALUES (28,1,29); 

INSERT INTO system_group_program (id,system_group_id,system_program_id) VALUES (29,2,30); 

INSERT INTO system_group_program (id,system_group_id,system_program_id) VALUES (30,1,31); 

INSERT INTO system_group_program (id,system_group_id,system_program_id) VALUES (31,1,32); 

INSERT INTO system_group_program (id,system_group_id,system_program_id) VALUES (32,1,33); 

INSERT INTO system_group_program (id,system_group_id,system_program_id) VALUES (33,1,34); 

INSERT INTO system_group_program (id,system_group_id,system_program_id) VALUES (34,1,35); 

INSERT INTO system_group_program (id,system_group_id,system_program_id) VALUES (35,1,36); 

INSERT INTO system_group_program (id,system_group_id,system_program_id) VALUES (36,1,37); 

INSERT INTO system_group_program (id,system_group_id,system_program_id) VALUES (37,1,38); 

INSERT INTO system_group_program (id,system_group_id,system_program_id) VALUES (38,1,39); 

INSERT INTO system_group_program (id,system_group_id,system_program_id) VALUES (39,1,40); 

INSERT INTO system_group_program (id,system_group_id,system_program_id) VALUES (40,1,41); 

INSERT INTO system_group_program (id,system_group_id,system_program_id) VALUES (41,1,42); 

INSERT INTO system_program (id,name,controller) VALUES (1,'System Group Form','SystemGroupForm'); 

INSERT INTO system_program (id,name,controller) VALUES (2,'System Group List','SystemGroupList'); 

INSERT INTO system_program (id,name,controller) VALUES (3,'System Program Form','SystemProgramForm'); 

INSERT INTO system_program (id,name,controller) VALUES (4,'System Program List','SystemProgramList'); 

INSERT INTO system_program (id,name,controller) VALUES (5,'System User Form','SystemUserForm'); 

INSERT INTO system_program (id,name,controller) VALUES (6,'System User List','SystemUserList'); 

INSERT INTO system_program (id,name,controller) VALUES (7,'Common Page','CommonPage'); 

INSERT INTO system_program (id,name,controller) VALUES (8,'System PHP Info','SystemPHPInfoView'); 

INSERT INTO system_program (id,name,controller) VALUES (9,'System ChangeLog View','SystemChangeLogView'); 

INSERT INTO system_program (id,name,controller) VALUES (10,'Welcome View','WelcomeView'); 

INSERT INTO system_program (id,name,controller) VALUES (11,'System Sql Log','SystemSqlLogList'); 

INSERT INTO system_program (id,name,controller) VALUES (12,'System Profile View','SystemProfileView'); 

INSERT INTO system_program (id,name,controller) VALUES (13,'System Profile Form','SystemProfileForm'); 

INSERT INTO system_program (id,name,controller) VALUES (14,'System SQL Panel','SystemSQLPanel'); 

INSERT INTO system_program (id,name,controller) VALUES (15,'System Access Log','SystemAccessLogList'); 

INSERT INTO system_program (id,name,controller) VALUES (16,'System Message Form','SystemMessageForm'); 

INSERT INTO system_program (id,name,controller) VALUES (17,'System Message List','SystemMessageList'); 

INSERT INTO system_program (id,name,controller) VALUES (18,'System Message Form View','SystemMessageFormView'); 

INSERT INTO system_program (id,name,controller) VALUES (19,'System Notification List','SystemNotificationList'); 

INSERT INTO system_program (id,name,controller) VALUES (20,'System Notification Form View','SystemNotificationFormView'); 

INSERT INTO system_program (id,name,controller) VALUES (21,'System Document Category List','SystemDocumentCategoryFormList'); 

INSERT INTO system_program (id,name,controller) VALUES (22,'System Document Form','SystemDocumentForm'); 

INSERT INTO system_program (id,name,controller) VALUES (23,'System Document Upload Form','SystemDocumentUploadForm'); 

INSERT INTO system_program (id,name,controller) VALUES (24,'System Document List','SystemDocumentList'); 

INSERT INTO system_program (id,name,controller) VALUES (25,'System Shared Document List','SystemSharedDocumentList'); 

INSERT INTO system_program (id,name,controller) VALUES (26,'System Unit Form','SystemUnitForm'); 

INSERT INTO system_program (id,name,controller) VALUES (27,'System Unit List','SystemUnitList'); 

INSERT INTO system_program (id,name,controller) VALUES (28,'System Access stats','SystemAccessLogStats'); 

INSERT INTO system_program (id,name,controller) VALUES (29,'System Preference form','SystemPreferenceForm'); 

INSERT INTO system_program (id,name,controller) VALUES (30,'System Support form','SystemSupportForm'); 

INSERT INTO system_program (id,name,controller) VALUES (31,'System PHP Error','SystemPHPErrorLogView'); 

INSERT INTO system_program (id,name,controller) VALUES (32,'System Database Browser','SystemDatabaseExplorer'); 

INSERT INTO system_program (id,name,controller) VALUES (33,'System Table List','SystemTableList'); 

INSERT INTO system_program (id,name,controller) VALUES (34,'System Data Browser','SystemDataBrowser'); 

INSERT INTO system_program (id,name,controller) VALUES (35,'System Menu Editor','SystemMenuEditor'); 

INSERT INTO system_program (id,name,controller) VALUES (36,'System Request Log','SystemRequestLogList'); 

INSERT INTO system_program (id,name,controller) VALUES (37,'System Request Log View','SystemRequestLogView'); 

INSERT INTO system_program (id,name,controller) VALUES (38,'System Administration Dashboard','SystemAdministrationDashboard'); 

INSERT INTO system_program (id,name,controller) VALUES (39,'System Log Dashboard','SystemLogDashboard'); 

INSERT INTO system_program (id,name,controller) VALUES (40,'System Session dump','SystemSessionDumpView'); 

INSERT INTO system_program (id,name,controller) VALUES (41,'Files diff','SystemFilesDiff'); 

INSERT INTO system_program (id,name,controller) VALUES (42,'System Information','SystemInformationView'); 

INSERT INTO system_unit (id,name,connection_name) VALUES (1,'Matriz','matriz'); 

INSERT INTO system_user_group (id,system_user_id,system_group_id) VALUES (1,1,1); 

INSERT INTO system_user_group (id,system_user_id,system_group_id) VALUES (2,2,2); 

INSERT INTO system_user_group (id,system_user_id,system_group_id) VALUES (3,1,2); 

INSERT INTO system_user_program (id,system_user_id,system_program_id) VALUES (1,2,7); 

INSERT INTO system_users (id,name,login,password,email,frontpage_id,system_unit_id,active,accepted_term_policy_at,accepted_term_policy) VALUES (1,'Administrator','admin','21232f297a57a5a743894a0e4a801fc3','admin@admin.net',10,null,'Y','',''); 

INSERT INTO system_users (id,name,login,password,email,frontpage_id,system_unit_id,active,accepted_term_policy_at,accepted_term_policy) VALUES (2,'User','user','ee11cbb19052e40b07aac0ca060c23ee','user@user.net',7,null,'Y','',''); 

INSERT INTO system_user_unit (id,system_user_id,system_unit_id) VALUES (1,1,1); 

INSERT INTO tipo_anexo (id,nome) VALUES (1,'Recibo'); 

INSERT INTO tipo_anexo (id,nome) VALUES (2,'Boleto'); 

INSERT INTO tipo_cliente (id,nome,sigla) VALUES (1,'Física','PF'); 

INSERT INTO tipo_cliente (id,nome,sigla) VALUES (2,'Jurídica','PJ'); 

INSERT INTO tipo_conta (id,nome) VALUES (1,'Receber'); 

INSERT INTO tipo_conta (id,nome) VALUES (2,'Pagar'); 



