-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 03-Out-2025 às 22:50
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
-- Banco de dados: `bd_dsloja`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_categorias`
--

DROP TABLE IF EXISTS `tb_categorias`;
CREATE TABLE IF NOT EXISTS `tb_categorias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `categoria` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Extraindo dados da tabela `tb_categorias`
--

INSERT INTO `tb_categorias` (`id`, `categoria`) VALUES
(1, 'Eletrônicos'),
(15, 'Eletrônicos dfgdfgfdg'),
(20, 'Audio e video'),
(21, 'ETEC 25-09-2025');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_clientes`
--

DROP TABLE IF EXISTS `tb_clientes`;
CREATE TABLE IF NOT EXISTS `tb_clientes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `cpf` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `telefone` varchar(15) COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_bin NOT NULL,
  `senha` varchar(32) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpf` (`cpf`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_clientes_enderecos`
--

DROP TABLE IF EXISTS `tb_clientes_enderecos`;
CREATE TABLE IF NOT EXISTS `tb_clientes_enderecos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_cliente` int NOT NULL,
  `descricao` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `endereco` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `numero` varchar(10) COLLATE utf8mb4_bin NOT NULL,
  `bairro` varchar(40) COLLATE utf8mb4_bin NOT NULL,
  `cep` varchar(10) COLLATE utf8mb4_bin NOT NULL,
  `estado` varchar(2) COLLATE utf8mb4_bin NOT NULL,
  `cidade` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_cliente` (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pedidos`
--

DROP TABLE IF EXISTS `tb_pedidos`;
CREATE TABLE IF NOT EXISTS `tb_pedidos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `emissao` date NOT NULL,
  `id_cliente` int NOT NULL,
  `total` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pedidos_itens`
--

DROP TABLE IF EXISTS `tb_pedidos_itens`;
CREATE TABLE IF NOT EXISTS `tb_pedidos_itens` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_pedido` int NOT NULL,
  `id_produto` int NOT NULL,
  `valor_unitario` decimal(10,2) NOT NULL,
  `qtd` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pedido` (`id_pedido`),
  KEY `id_produto` (`id_produto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_produtos`
--

DROP TABLE IF EXISTS `tb_produtos`;
CREATE TABLE IF NOT EXISTS `tb_produtos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_subcategoria` int NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `descricao` blob NOT NULL,
  `estoque` int NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `foto` varchar(200) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Extraindo dados da tabela `tb_produtos`
--

INSERT INTO `tb_produtos` (`id`, `id_subcategoria`, `nome`, `descricao`, `estoque`, `preco`, `foto`) VALUES
(1, 3, 'SOm Sony 1000W', 0x5375706572206d65676120626c617374657220736f6d, 2, '0.00', '68df21b0e5089.jpg'),
(2, 5, 'TV Samsumg', 0x6d65676120545620646520353922, 5, '0.00', '68df223578cde.webp'),
(3, 3, 'sdfdsfdsf', 0x647366736466736466, 454, '0.00', '68df2271551b1.png'),
(4, 3, 'Radio de teste', 0x7361646173646173646173647361, 4, '650.00', '68df2314b43a1.png'),
(5, 5, 'TV AOC', 0x4d4567612074656c657669736f7220646120414f432064652034302220636f6d20536f6d206469676974616c20, 10, '3999.99', '68df24dbecb33.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_subcategorias`
--

DROP TABLE IF EXISTS `tb_subcategorias`;
CREATE TABLE IF NOT EXISTS `tb_subcategorias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_categoria` int NOT NULL,
  `subcategoria` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_categoria` (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Extraindo dados da tabela `tb_subcategorias`
--

INSERT INTO `tb_subcategorias` (`id`, `id_categoria`, `subcategoria`) VALUES
(3, 20, 'Som SONY'),
(5, 21, 'Televisores');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuarios`
--

DROP TABLE IF EXISTS `tb_usuarios`;
CREATE TABLE IF NOT EXISTS `tb_usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(200) COLLATE utf8mb4_bin NOT NULL,
  `nome` varchar(60) COLLATE utf8mb4_bin NOT NULL,
  `senha` varchar(32) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Extraindo dados da tabela `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id`, `email`, `nome`, `senha`) VALUES
(1, 'Administrador', 'etec@etec.com', '123');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_clientes_enderecos`
--
ALTER TABLE `tb_clientes_enderecos`
  ADD CONSTRAINT `tb_clientes_enderecos_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `tb_clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tb_pedidos_itens`
--
ALTER TABLE `tb_pedidos_itens`
  ADD CONSTRAINT `tb_pedidos_itens_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `tb_pedidos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pedidos_itens_ibfk_2` FOREIGN KEY (`id_produto`) REFERENCES `tb_produtos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tb_subcategorias`
--
ALTER TABLE `tb_subcategorias`
  ADD CONSTRAINT `tb_subcategorias_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `tb_categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
