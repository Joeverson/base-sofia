-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 29-Maio-2015 às 21:27
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipos`
--

INSERT INTO `tipos` (`id_tipo`, `name_cat`) VALUES
(0, 'Administrador'),
(1, 'Artigos');

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `name`, `pass`, `email`, `id_tipo`, `last_login`) VALUES
(4, 'marieta', '6116afedcb0bc31083935c1c262ff4c9', 'marieta@g.com', 0, '2015-05-06 00:00:00'),
(11, 'Joerverson Santos', 'd1205746e3192ca4641605d9f67cc897', 'info@unisigma.com.br', 0, '2015-05-13 00:00:00'),
(12, 'mateus', '6116afedcb0bc31083935c1c262ff4c9', 'mateus@a.com', 0, '2015-05-25 21:38:29'),
(13, 'anita', '6116afedcb0bc31083935c1c262ff4c9', 'anita@ops.com', 0, '2015-05-25 21:39:25');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vereadores`
--

CREATE TABLE IF NOT EXISTS `vereadores` (
  `id_vereador` int(11) NOT NULL,
  `name` varchar(244) NOT NULL,
  `dt_birth` date NOT NULL,
  `formacao` text NOT NULL,
  `email` varchar(233) NOT NULL,
  `atividade` text NOT NULL,
  `partido` text NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `vereadores`
--

INSERT INTO `vereadores` (`id_vereador`, `name`, `dt_birth`, `formacao`, `email`, `atividade`, `partido`, `img`) VALUES
(1, 'joerverson', '2015-08-28', 'nada', 'joerversons@g.com', 'asasasdasdasd', 'sei lá', '11159216_735313696591866_1985617370_o.jpg'),
(5, 'Marieta Nobrega', '2015-09-23', 'asdas', 'info@unisigma.com.br', 'asdasdasdasdasda', 'Nada', ''),
(6, 'anitasssss', '2015-05-03', 'ssssssssss', 'bautry2000@hotmail.com', 'ssssssssssss', 'aaaaaaaa', '1789594.jpg'),
(7, 'marieta', '2015-05-21', 'asdasd', 'dom@domagencia.com', 'asdasdasdasd', 'asdasd', '1800389.jpg'),
(8, 'carlos Santos', '2015-05-14', 'sssssssssssss', 'dom@domagencia.com', 'sssssssssssssssssss', 'sss', ''),
(10, 'Joeverson Santos', '2015-05-08', 'GraduaÃ§Ã£o em sistemas', 'bautry2000@hotmail.com', 'varias coisas viu fi', 'play', ''),
(12, 'asdasdsad', '2015-05-12', 'asdasd', 'brunno.hoffman@hotmail.com', 'asdasds', 'asdasdsd', 'stalker-wallpaper-1366x768.jpg'),
(13, 'marcos', '2015-05-08', 'asdasd', 'dom@domagencia.com', 'asdasdas', 'asdasdsd', 'S02E22 - And Straight On ''Til Morning.mp4_snapshot_42.54_[2015.05.11_01.47.29].jpg');

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
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `vereadores`
--
ALTER TABLE `vereadores`
  MODIFY `id_vereador` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
