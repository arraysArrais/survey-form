SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `survey`
--

--
-- Estrutura da tabela `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `session_token` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`id`, `username`, `pass`, `session_token`) VALUES
(1, 'admin', '$2y$10$M/UXrP2y0wKFWjfSJhY.1.HgQfZnnSvzUj9te3AMqANITybN5RbVq', '4106f0677abc208b7f13dea4b187479f');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `categoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `categoria`) VALUES
(1, 'Moda'),
(2, 'Artigos Diversos'),
(3, 'Beleza/Cuidados Pessoais'),
(4, 'Casa e Decoração'),
(5, 'Gastronomia'),
(6, 'Lazer/Entretenimento'),
(7, 'Pet'),
(8, 'Eletroeletrônico'),
(9, 'Eletrodoméstico'),
(10, 'Infantil');

-- --------------------------------------------------------

--
-- Estrutura da tabela `respostas`
--

CREATE TABLE `respostas` (
  `id` int(11) NOT NULL,
  `resposta` varchar(100) NOT NULL,
  `idCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `respostas`
--

INSERT INTO `respostas` (`id`, `resposta`, `idCategoria`) VALUES
(1, 'Feminina', 1),
(2, 'Masculina', 1),
(3, 'Bolsas/Calçados', 1),
(4, 'Acessórios', 1),
(5, 'Moda sustentável', 1),
(6, 'Livros', 2),
(7, 'Itens Colecionáveis', 2),
(8, 'Ferramenta e construção', 2),
(9, 'Papelaria', 2),
(10, 'Perfume/Hidratante', 3),
(11, 'Maquiagem', 3),
(12, 'Itens para cabelo', 3),
(13, 'Cuidados com a pele', 3),
(14, 'Corpo e banho', 3),
(15, 'Jogo de cama', 4),
(16, 'Jogo de banheiro', 4),
(17, 'Decoração', 4),
(18, 'Móveis', 4),
(19, 'Aparelho de Jantar', 4),
(20, 'Fast-food', 5),
(21, 'Jantar', 5),
(22, 'Cerveja e/ou vinho', 5),
(23, 'Petiscos', 5),
(24, 'Doces', 5),
(25, 'Cinema', 6),
(26, 'Teatro', 6),
(27, 'Lazer infantil', 6),
(28, 'Espaço Gamer', 6),
(29, 'Eventos Culturais do Shopping', 6),
(30, 'Operações Pet', 7),
(31, 'Acessórios Pet', 7),
(32, 'Lazer Pet', 7),
(33, 'Eventos Pet', 7),
(34, 'Celular', 8),
(35, 'Computador/notebook', 8),
(36, 'Video Game', 8),
(37, 'Acessórios Gamer', 8),
(38, 'Fone de ouvido', 8),
(39, 'Microondas', 9),
(40, 'Geladeira', 9),
(41, 'Televisão', 9),
(42, 'Fogão', 9),
(43, 'Ar Condicionado', 9),
(44, 'Brinquedos', 10),
(45, 'Moda Infantil', 10),
(46, 'Acessórios Puericultura', 10),
(47, 'Operações Infantis', 10),
(48, 'Beleza e Cuidado Infantil', 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios_respostas`
--

CREATE TABLE `usuarios_respostas` (
  `id` int(11) NOT NULL,
  `idUsuarios` int(11) NOT NULL,
  `idRespostas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `respostas`
--
ALTER TABLE `respostas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_categoria` (`idCategoria`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios_respostas`
--
ALTER TABLE `usuarios_respostas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuario` (`idUsuarios`),
  ADD KEY `fk_respostas` (`idRespostas`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `respostas`
--
ALTER TABLE `respostas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios_respostas`
--
ALTER TABLE `usuarios_respostas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `respostas`
--
ALTER TABLE `respostas`
  ADD CONSTRAINT `fk_categoria` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`id`);

--
-- Limitadores para a tabela `usuarios_respostas`
--
ALTER TABLE `usuarios_respostas`
  ADD CONSTRAINT `fk_respostas` FOREIGN KEY (`idRespostas`) REFERENCES `respostas` (`id`),
  ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`idUsuarios`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
