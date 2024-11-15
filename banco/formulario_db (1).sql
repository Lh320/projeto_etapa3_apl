-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16/11/2024 às 00:30
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
-- Banco de dados: `formulario_db`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `tipo_documento` enum('cpf','cnpj') NOT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `cnpj` varchar(18) DEFAULT NULL,
  `rg` varchar(12) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `telefone`, `tipo_documento`, `cpf`, `cnpj`, `rg`, `senha`) VALUES
(2, 'luisa malta ', '(21) 21212-121', 'cpf', '111.111.111-11', NULL, '11.111.111-1', ''),
(3, 'luis henrique malta', '(21) 21212-121', 'cpf', '111.111.111-11', '', '22.222.222-2', '$2y$10$l4tAZcfZh7tnORNXrsgZlOdLUGaeKKzp4643V.GA91yAtGg1Vk6O2'),
(4, 'llll', '(21) 21212-121', 'cpf', '111.111.111-11', '', '22.222.222-2', '$2y$10$/AKUQI2wIXAs7.F8ieeaAuXgwi/rgluu7hO/J/YmT6NhR8fz6WSay'),
(7, 'mm', '(77) 77777-777', 'cnpj', '', '77.777.777/7777-77', '77.777.777-9', '$2y$10$Nh6z8jvTmKumh18/mmk4zO8HeAn0eWnEQO3K6Xo0v96K1uraK3ZFG'),
(9, 'lucas francisco', '(55) 55555-555', 'cpf', '555.555.555-55', NULL, '55.555.555-5', '$2y$10$rJa17GU7fEWbchex01dCz.G5iv/Tr/Nlz1yGosWLKNIUcGUAOkas2'),
(10, 'pitz', '(99) 99999-999', 'cpf', '888.888.888-88', NULL, '88.888.888-8', '$2y$10$fpMpjnYSbwWuAWrZLg44Pu2pVIDcUDe5MB3L5lJMR5rfORBujr55K'),
(11, 'miguel', '(55) 55555-555', 'cpf', '436.387.283-28', NULL, '46.467.474-7', '$2y$10$ORsNvRoABfARkwbZDDBZtugBvMFzLSCLZJsMgiFB.GlFv3mfafZri'),
(12, 'peida leite ', '(21) 98737-373', 'cpf', '212.121.212-12', NULL, '12.121.212-1', '$2y$10$kGiYfml0optvPcuWlxWchuOxsXLnx65IShPgjmXEb7vgTsSiMqBv6');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
