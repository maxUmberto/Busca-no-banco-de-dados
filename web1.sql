-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 07-Jul-2017 às 17:17
-- Versão do servidor: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web1`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `cpf` varchar(14) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `nome_usuario` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `data_nascimento` date DEFAULT NULL,
  `telefone` varchar(14) NOT NULL,
  `senha` varchar(40) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`cpf`, `nome`, `nome_usuario`, `email`, `data_nascimento`, `telefone`, `senha`) VALUES
('094.412.546.81', 'Max Umberto Santos', 'maxsantos', 'max.umberto97@gmail.com', '1997-07-03', '(21)973052963', '7c222fb2927d828af22f592134e8932480637c0d'),
('150.208.767-71', 'Israel de Sant anna Nascimento ', 'godinez', 'godinez@god', '1998-05-03', '(21)98293-1114', 'f89bc73b8139bc9136f88c4ad271ce706a343530');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cpf`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
