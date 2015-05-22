-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 22-Maio-2015 às 19:48
-- Versão do servidor: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `allusers`
--
CREATE TABLE IF NOT EXISTS `allusers` (
`id` int(11)
,`name` varchar(123)
,`pass` text
,`email` text
,`id_tipo` int(11)
,`last_login` datetime
,`name_cat` varchar(200)
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `camara`
--

CREATE TABLE IF NOT EXISTS `camara` (
  `id_camara` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoriasnoticias`
--

CREATE TABLE IF NOT EXISTS `categoriasnoticias` (
  `id_category` int(11) NOT NULL,
  `id_notice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int(11) NOT NULL,
  `name_category` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
  `id` int(11) NOT NULL,
  `title` varchar(123) NOT NULL,
  `subtitle` text NOT NULL,
  `text` text NOT NULL,
  `resume` text NOT NULL,
  `image` text NOT NULL,
  `id_membro` int(11) NOT NULL,
  `date_register` varchar(34) NOT NULL,
  `id_pdf` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pdf`
--

CREATE TABLE IF NOT EXISTS `pdf` (
  `id_pdf` int(11) NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipos`
--

CREATE TABLE IF NOT EXISTS `tipos` (
  `id_tipo` int(11) NOT NULL,
  `name_cat` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipos`
--

INSERT INTO `tipos` (`id_tipo`, `name_cat`) VALUES
(0, 'Administrador'),
(2, 'Artigos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL,
  `name` varchar(123) NOT NULL,
  `pass` text NOT NULL,
  `email` text NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `last_login` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `name`, `pass`, `email`, `id_tipo`, `last_login`) VALUES
(3, 'marcos', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'antonio@g.com', 2, '2015-05-04 00:00:00'),
(4, 'marieta', '6116afedcb0bc31083935c1c262ff4c9', 'marieta@g.com', 0, '2015-05-06 00:00:00'),
(11, 'Joerverson Barbosa Santos', 'd1205746e3192ca4641605d9f67cc897', 'info@unisigma.com.br', 0, '2015-05-13 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vereadores`
--

CREATE TABLE IF NOT EXISTS `vereadores` (
  `id_vereador` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `dt_birth` int(11) NOT NULL,
  `formacao` int(11) NOT NULL,
  `email` int(11) NOT NULL,
  `atividade` int(11) NOT NULL,
  `partido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `vnoticias`
--
CREATE TABLE IF NOT EXISTS `vnoticias` (
`id` int(11)
,`title` varchar(123)
,`subtitle` text
,`text` text
,`resume` text
,`image` text
,`date_register` varchar(34)
,`name` varchar(123)
,`email` text
,`file` text
);

-- --------------------------------------------------------

--
-- Structure for view `allusers`
--
DROP TABLE IF EXISTS `allusers`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `allusers` AS select `usuarios`.`id` AS `id`,`usuarios`.`name` AS `name`,`usuarios`.`pass` AS `pass`,`usuarios`.`email` AS `email`,`usuarios`.`id_tipo` AS `id_tipo`,`usuarios`.`last_login` AS `last_login`,`tipos`.`name_cat` AS `name_cat` from (`usuarios` join `tipos` on((`tipos`.`id_tipo` = `usuarios`.`id_tipo`)));

-- --------------------------------------------------------

--
-- Structure for view `vnoticias`
--
DROP TABLE IF EXISTS `vnoticias`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vnoticias` AS select `n`.`id` AS `id`,`n`.`title` AS `title`,`n`.`subtitle` AS `subtitle`,`n`.`text` AS `text`,`n`.`resume` AS `resume`,`n`.`image` AS `image`,`n`.`date_register` AS `date_register`,`u`.`name` AS `name`,`u`.`email` AS `email`,`p`.`file` AS `file` from ((`noticias` `n` join `usuarios` `u` on((`u`.`id` = `n`.`id_membro`))) join `pdf` `p` on((`p`.`id_pdf` = `n`.`id_pdf`)));

--
-- Indexes for dumped tables
--

--
-- Indexes for table `camara`
--
ALTER TABLE `camara`
  ADD PRIMARY KEY (`id_camara`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pdf`
--
ALTER TABLE `pdf`
  ADD PRIMARY KEY (`id_pdf`);

--
-- Indexes for table `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vereadores`
--
ALTER TABLE `vereadores`
  ADD PRIMARY KEY (`id_vereador`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `camara`
--
ALTER TABLE `camara`
  MODIFY `id_camara` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pdf`
--
ALTER TABLE `pdf`
  MODIFY `id_pdf` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tipos`
--
ALTER TABLE `tipos`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `vereadores`
--
ALTER TABLE `vereadores`
  MODIFY `id_vereador` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
