-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03/06/2018 às 23:11
-- Versão do servidor: 10.1.31-MariaDB
-- Versão do PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `teachercontrol`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `curso`
--

CREATE TABLE `curso` (
  `CursoID` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cargaHoraria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `curso`
--

INSERT INTO `curso` (`CursoID`, `nome`, `cargaHoraria`) VALUES
(1, 'Teste', '80'),
(2, 'Teste 2', '80'),
(3, 'Teste', '80'),
(4, 'Teste 3', '80'),
(5, 'Teste 5', '80'),
(6, 'Teste 6', '80'),
(7, 'teste 7', '80');

-- --------------------------------------------------------

--
-- Estrutura para tabela `curso-professor-polo`
--

CREATE TABLE `curso-professor-polo` (
  `FKProfessorID` int(11) NOT NULL,
  `FKPoloID` int(11) NOT NULL,
  `FKCursoID` int(11) NOT NULL,
  `inicio` date NOT NULL,
  `fim` date NOT NULL,
  `turno` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `polo`
--

CREATE TABLE `polo` (
  `PoloID` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `numero` varchar(255) DEFAULT NULL,
  `cep` varchar(255) DEFAULT NULL,
  `bairro` varchar(255) DEFAULT NULL,
  `logradouro` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `polo`
--

INSERT INTO `polo` (`PoloID`, `nome`, `numero`, `cep`, `bairro`, `logradouro`, `cidade`) VALUES
(1, 'teste', '256', '29.148-635', 'Vila Independência', 'Rua das Hortências', 'Cariacica'),
(2, 'Teste 2', 's/n', '29.127-045', 'João Goulart', 'Avenida Muriaé', 'Vila Velha');

-- --------------------------------------------------------

--
-- Estrutura para tabela `professor`
--

CREATE TABLE `professor` (
  `ProfessorID` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `professor`
--

INSERT INTO `professor` (`ProfessorID`, `nome`, `email`, `telefone`) VALUES
(1, 'Bill Da silva', 'willianoliveira608@gmail.com', '(28)58631-2546');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`CursoID`);

--
-- Índices de tabela `curso-professor-polo`
--
ALTER TABLE `curso-professor-polo`
  ADD KEY `FKProfessorID_idx` (`FKProfessorID`),
  ADD KEY `FKPoloID_idx` (`FKPoloID`),
  ADD KEY `FKCursoID_idx` (`FKCursoID`);

--
-- Índices de tabela `polo`
--
ALTER TABLE `polo`
  ADD PRIMARY KEY (`PoloID`);

--
-- Índices de tabela `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`ProfessorID`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `curso`
--
ALTER TABLE `curso`
  MODIFY `CursoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `polo`
--
ALTER TABLE `polo`
  MODIFY `PoloID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `professor`
--
ALTER TABLE `professor`
  MODIFY `ProfessorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `curso-professor-polo`
--
ALTER TABLE `curso-professor-polo`
  ADD CONSTRAINT `FKCursoID` FOREIGN KEY (`FKCursoID`) REFERENCES `curso` (`CursoID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FKPoloID` FOREIGN KEY (`FKPoloID`) REFERENCES `polo` (`PoloID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FKProfessorID` FOREIGN KEY (`FKProfessorID`) REFERENCES `professor` (`ProfessorID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
