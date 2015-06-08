-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 08-Jun-2015 às 15:44
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

--
-- Extraindo dados da tabela `categoriasnoticias`
--

INSERT INTO `categoriasnoticias` (`id_category`, `id_notice`) VALUES
(1, 1),
(1, 2),
(2, 3),
(0, 4),
(8, 5),
(9, 5),
(0, 6),
(3, 7),
(9, 8),
(0, 9),
(3, 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int(11) NOT NULL,
  `name_category` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `category`
--

INSERT INTO `category` (`id_category`, `name_category`) VALUES
(1, 'dasd'),
(2, 'ddddd'),
(3, 'Novidades'),
(4, 'kkkk'),
(5, 'kkkk'),
(6, 'kkkk'),
(7, 'kkkk'),
(8, 'Tecnologia'),
(9, 'Tecnologia'),
(10, 'Reino Animal'),
(11, 'Variedades'),
(12, 'Variedades');

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
  `date_register` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_pdf` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `noticias`
--

INSERT INTO `noticias` (`id`, `title`, `subtitle`, `text`, `resume`, `image`, `id_membro`, `date_register`, `id_pdf`) VALUES
(3, '30/05/2015 07h53 - Atualizado em 30/05/2015 07h53 SÃ³ 2,6% dos municÃ­pios concluÃ­ram elaboraÃ§Ã£o do plano de educaÃ§Ã£o', 'Prazo para os 5.570 municÃ­pios finalizarem plano termina em 24 de junho. Dourado (SP) e Brejo Grande (SE) nÃ£o comeÃ§aram a elaborar o plano.', '<p style="font-family: arial, helvetica, freesans, sans-serif; font-size: 1.26em; margin: 0px; outline: 0px; padding: 0px 0px 1.5em; color: #333333; letter-spacing: -0.02em; line-height: 1.45em; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><strong style="font-family: inherit; font-size: 15.1199998855591px; margin: 0px; outline: 0px; padding: 0px; background: transparent;">Puni&ccedil;&otilde;es</strong><br style="font-family: inherit; font-size: 15.1199998855591px; margin: 0px; outline: 0px; padding: 0px; background: transparent;" />O poss&iacute;vel descumprimento da meta por parte dos gestores n&atilde;o est&aacute; diretamente relacionado a multas ou outras puni&ccedil;&otilde;es. Embora o PNE tenha sido aprovado h&aacute; nove meses e suas regras e metas j&aacute; estejam valendo, ainda n&atilde;o h&aacute; uma regulamenta&ccedil;&atilde;o que especifique responsabilidades para os gestores que descumprirem os prazos e metas. Por&eacute;m, segundo o MEC, os gestores est&atilde;o submetidos a poss&iacute;veis a&ccedil;&otilde;es civis p&uacute;blicas, caso n&atilde;o sigam a legisla&ccedil;&atilde;o vigente.</p>\r\n<p style="font-family: arial, helvetica, freesans, sans-serif; font-size: 1.26em; margin: 0px; outline: 0px; padding: 0px 0px 1.5em; color: #333333; letter-spacing: -0.02em; line-height: 1.45em; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;">Segundo a Uni&atilde;o Nacional dos Dirigentes Municipais de Educa&ccedil;&atilde;o (Undime), o principal entrave dos gestores municipais na hora de elaborar o plano &eacute; o fato de que os munic&iacute;pios n&atilde;o podem fazer o projeto de forma totalmente aut&ocirc;noma dos planos estaduais.</p>\r\n<p style="font-family: arial, helvetica, freesans, sans-serif; font-size: 1.26em; margin: 0px; outline: 0px; padding: 0px 0px 1.5em; color: #333333; letter-spacing: -0.02em; line-height: 1.45em; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;">J&aacute; os governos estaduais, por sua vez, tamb&eacute;m n&atilde;o podem definir suas estrat&eacute;gias e metas sem considerar as realidades dos munic&iacute;pios. Por isso, nos estados onde h&aacute; menos munic&iacute;pios, o processo est&aacute; mais adiantado.</p>\r\n<p style="font-family: arial, helvetica, freesans, sans-serif; font-size: 1.26em; margin: 0px; outline: 0px; padding: 0px 0px 1.5em; color: #333333; letter-spacing: -0.02em; line-height: 1.45em; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;">Ao G1, Cleuza Repulho, presidente da Undime, afirmou que a entidade "a princ&iacute;pio" n&atilde;o pensa em pedir prorroga&ccedil;&atilde;o do prazo para cumprir a meta. "Seria necess&aacute;rio um projeto de lei" para alterar a data final, explicou ela.</p>', 'Nos Ãºltimos dois meses, a quantidade de municÃ­pios que jÃ¡ cumpriram a tarefa de elaborar um plano municipal de educaÃ§Ã£o para a prÃ³xima dÃ©cada cresceu mais de trÃªs vezes.', '9d5b0231577fcf7156525d3230299b7f.jpg', 4, '2015-05-30 09:12:53', 0),
(4, 'Windows 10 chega em 29 de julho, e vocÃª jÃ¡ pode reservar a atualizaÃ§Ã£o gratuita', 'O sistema operacional da Microsoft jÃ¡ estÃ¡ aÃ­!', '<p style="margin: 0px 0px 18px; padding: 0px; border: 0px; font-family: Georgia, serif; font-size: 0.95em; font-stretch: inherit; line-height: 1.5em; vertical-align: baseline; color: #444444; text-align: justify;">&Eacute; importante notar que&nbsp;<strong style="margin: 0px; padding: 0px; border: 0px; font-family: inherit; font-size: inherit; font-style: inherit; font-variant: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline;">voc&ecirc; ainda n&atilde;o pode baixar a vers&atilde;o final do Windows 10 porque ela n&atilde;o est&aacute; pronta</strong>. A notifica&ccedil;&atilde;o serve apenas para voc&ecirc; entrar na lista de reserva: dessa forma,&nbsp;<a style="margin: 0px; padding: 0px; border: 0px; font-family: inherit; font-size: inherit; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; text-decoration: none; color: #4b738f;" href="http://blogs.windows.com/bloggingwindows/2015/06/01/hello-world-windows-10-available-on-july-29/" target="_blank">a atualiza&ccedil;&atilde;o ser&aacute; baixada automaticamente em julho</a>.</p>\r\n<p style="margin: 0px 0px 18px; padding: 0px; border: 0px; font-family: Georgia, serif; font-size: 0.95em; font-stretch: inherit; line-height: 1.5em; vertical-align: baseline; color: #444444; text-align: justify;">Basta clicar em &ldquo;Reserve sua atualiza&ccedil;&atilde;o gratuita&rdquo; e pronto. Se voc&ecirc; quiser, pode colocar seu endere&ccedil;o de e-mail para receber uma mensagem de aviso tamb&eacute;m, mas isso n&atilde;o &eacute; necess&aacute;rio.</p>', 'O sistema operacional da Microsoft estÃ¡ chegando para todos os usuÃ¡rios.', '9a72433120688a9e41efe6ef6f0e3d9e.jpg', 4, '2015-06-03 17:28:23', 0),
(5, 'ESSE GAROTO DE 8 ANOS FOI HUMILHADO POR 2 ANOS POR DEIXAR SEU CABELO CRESCER', 'Christian McPhilamy, um menino de apenas 6 anos, estava em frente a sua TV quando um comercial de um hospital chamou sua atenÃ§Ã£o. ', '<p style="margin: 0px 0px 15px; padding: 0px; border: 0px; font-size: 15px; vertical-align: baseline; color: #484848; font-family: ''Open Sans''; line-height: 24px;">Cristian McPhilamy, um menino de apenas 6 anos, estava em frente a sua TV quando um comercial de um hospital chamou sua aten&ccedil;&atilde;o. Na pe&ccedil;a publicit&aacute;ria,&nbsp;crian&ccedil;as com c&acirc;ncer, todas carecas. Isso, por incr&iacute;vel que pare&ccedil;a, sensibilizou o garoto.</p>\r\n<p style="margin: 0px 0px 15px; padding: 0px; border: 0px; font-size: 15px; vertical-align: baseline; color: #484848; font-family: ''Open Sans''; line-height: 24px;">Ele ent&atilde;o tomou uma decis&atilde;o pol&ecirc;mica&hellip;e m&iacute;tica. Morador da Fl&oacute;rida, ele resolveu deixar seu cabelo crescer para do&aacute;-lo a crian&ccedil;as com c&acirc;ncer. Durante 2 anos e meio ele enfrentou um bullying di&aacute;rio no col&eacute;gio, onde era chamado de &ldquo;menininha&rdquo;, &ldquo;gay&rdquo; e outras coisas. Crian&ccedil;as nessa idade podem ser muito cru&eacute;is, mas Christian, extremamente motivado por seu ideal, aguentou a press&atilde;o!</p>\r\n<p style="margin: 0px 0px 15px; padding: 0px; border: 0px; font-size: 15px; vertical-align: baseline; color: #484848; font-family: ''Open Sans''; line-height: 24px;">Dois anos e meio depois de sua &eacute;pica jornada, os pais de Christian cortaram seu cabelo e enviaram a uma institui&ccedil;&atilde;o especializada em confeccionar perucas para crian&ccedil;as com c&acirc;ncer. A hist&oacute;ria do menino emocionou a internet, principalmente em tempos absurdos de Felicianos, Bolsonaros e Malafaias, que com certeza n&atilde;o deixariam seus filhos usarem &ldquo;cabelo de menininha&rdquo;.</p>', 'Christian McPhilamy aguentou o bullying por 2 anos e meio ao deixar seu cabelo crescer. Mas o motivo era especialâ€¦', '53643be6e91047d645251aa4a35f1771.jpg', 4, '2015-06-04 14:18:52', 0),
(6, 'ANIMAIS RIDICULAMENTE FOTOGÃŠNICOS', 'Se vocÃª tem conta em sites como Facebook e outras redes sociais jÃ¡ deve ter notado que tirar  fotos boas  ou nÃ£o Ã© quase um dom de nascenÃ§a. Ã€s vezes...', '<p>Se<span style="color: #484848; font-family: ''Open Sans''; font-size: 15px; line-height: 24px;">&nbsp;</span><span style="color: #484848; font-family: ''Open Sans''; font-size: 15px; line-height: 24px;">voc&ecirc; tem conta em sites como Facebook e outras redes sociais j&aacute; deve ter notado que tirar &nbsp;fotos boas &nbsp;ou n&atilde;o&nbsp;&eacute; quase um dom de nascen&ccedil;a. &Agrave;s vezes a pessoa nem &eacute; t&atilde;o feia assim, mas na fotografia fica aquela &ldquo;mis&eacute;ria&rdquo;. Outras tantas vezes, no entanto, a pessoa se torna simp&aacute;tica na foto, por talentos pr&oacute;prios ou por voca&ccedil;&atilde;o do Photoshop, mas tudo bem, t&aacute; valendo.</span></p>\r\n<p style="margin: 0px 0px 15px; padding: 0px; border: 0px; font-size: 15px; vertical-align: baseline; color: #484848; font-family: ''Open Sans''; line-height: 24px;">Apesar de soar estranho, h&aacute; quem diga que o fato de ser ou n&atilde;o fotog&ecirc;nicos tamb&eacute;m &eacute; um talento dos animais. Alguns, como podemos ver espalhados pela internet, s&atilde;o verdadeiros prod&iacute;gios das fotografias.</p>', 'Se vocÃª tem conta em sites como Facebook e outras redes sociais jÃ¡ deve ter notado que tirar  fotos boas  ou nÃ£o Ã© quase um dom de nascenÃ§a. Ã€s vezes...\r\n', '584d2278afb5ed612bf3bb0bdae8ced8.jpg', 4, '2015-06-04 14:21:34', 0),
(7, 'O QUE ACONTECE QUANDO SE ABANDONA A CERVEJA', 'A cerveja Ã© uma grande companheira na vida de muitos. E um homem teve a coragem de fazer o que muita gente jamais consideraria â€“ abandonÃ¡-la de vez. Dizer...', '<p style="margin: 0px 0px 15px; padding: 0px; border: 0px; font-size: 15px; vertical-align: baseline; color: #484848; font-family: ''Open Sans''; line-height: 24px;">Cerveja &eacute; uma grande companheira na vida de muitos. E um homem teve a coragem de fazer o que muita gente jamais consideraria &ndash; abandon&aacute;-la de vez. Dizer adeus &agrave; cerveja. Falamos de Lloyd Stevens, de 35 anos, que trabalhava por longas horas em um escrit&oacute;rio, comia muita besteira, e n&atilde;o se exercitava.</p>\r\n<p style="margin: 0px 0px 15px; padding: 0px; border: 0px; font-size: 15px; vertical-align: baseline; color: #484848; font-family: ''Open Sans''; line-height: 24px;">E apesar de ter prometido a si mesmo quando adolescente que &ldquo;jamais deixaria de se cuidar&rdquo;, na faixa dos 30 anos ele j&aacute; estava do outro lado da balan&ccedil;a. Mas depois de se olhar no espelho uma &uacute;ltima vez, ele decidiu botar o p&eacute; no ch&atilde;o e manter a tal promessa &ndash; e come&ccedil;ou um programa de 12 semanas para ficar sarado.</p>', 'A cerveja Ã© uma grande companheira na vida de muitos. E um homem teve a coragem de fazer o que muita gente jamais consideraria â€“ abandonÃ¡-la de vez. Dizer...\r\n', 'ce59b489985a9bcd24fead25cd6fd930.jpg', 4, '2015-06-04 14:37:49', 0),
(8, 'OS MAIORES EXEMPLOS DE SOLIDARIEDADE DO PLANETA', 'Solidariedade Ã© contigo? Todos os dias, a gente vÃª tanta notÃ­cia ruim nos jornais que fica difÃ­cil de acreditar em um mundo melhor e em pessoas capazes de praticarem...', '<p dir="ltr" style="margin: 0px 0px 15px; padding: 0px; border: 0px; font-size: 15px; vertical-align: baseline; color: #484848; font-family: ''Open Sans''; line-height: 24px;">Solidariedade &eacute; contigo? Todos os dias, a gente v&ecirc; tanta not&iacute;cia ruim nos jornais que fica dif&iacute;cil de acreditar em um mundo melhor e em pessoas capazes de praticarem a boa e velha solidariedade. Acontece, no entanto, que essa falta de f&eacute; que a maioria de n&oacute;s tem, nos impede de ver pequenos atos de grandeza que muita gente por a&iacute; ainda &eacute; capaz de praticar e que, por serem a&ccedil;&otilde;es individuais, fica dif&iacute;cil de serem enxergadas se n&atilde;o estivermos em alerta para isso.</p>\r\n<p dir="ltr" style="margin: 0px 0px 15px; padding: 0px; border: 0px; font-size: 15px; vertical-align: baseline; color: #484848; font-family: ''Open Sans''; line-height: 24px;">Essa &eacute; a grande raz&atilde;o para termos selecionado o post de hoje. Nas fotos que selecionamos &agrave; baixo, voc&ecirc; vai ver seres humanos (e at&eacute; animais) dignos de pr&ecirc;mio e que v&atilde;o tentar restaurar sua cren&ccedil;a no melhor da humanidade. Confira os maiores exemplos de solidariedade do planeta:</p>', 'Solidariedade Ã© contigo? Todos os dias, a gente vÃª tanta notÃ­cia ruim nos jornais que fica difÃ­cil de acreditar em um mundo melhor e em pessoas capazes de praticarem...\r\n', 'c1b216d8565a31ffcb30ccb3b37aa90f.jpg', 4, '2015-06-04 14:45:01', 0),
(9, 'COMO TRANSFORMAR O FLASH DE SEU CELULAR EM LUZ NEGRA', 'Quem aÃ­ nunca viu uma lÃ¢mpada de luz negra sendo usada em um filme? Essas lÃ¢mpadas possuem muitas utilidades, mas uma das mais famosas Ã© a de detector de...', '<p>&nbsp;Que<span style="color: #484848; font-family: ''Open Sans''; font-size: 15px; line-height: 24px;">m a&iacute; nunca viu uma l&acirc;mpada de luz negra sendo usada em um filme? Essas l&acirc;mpadas possuem muitas utilidades, mas uma das mais famosas &eacute; a de detector de s&ecirc;men. Afinal, como muita gente aqui sabe, muitos quartos que podem aparentar estar limpinhos est&atilde;o na verdade bem&hellip;imundos.</span></p>\r\n<p style="margin: 0px 0px 15px; padding: 0px; border: 0px; font-size: 15px; vertical-align: baseline; color: #484848; font-family: ''Open Sans''; line-height: 24px;">E para fazer um teste desses, voc&ecirc; s&oacute; precisa de um celular com flash, durex, e duas canetinhas &ndash; uma azul e uma roxa. Pois &eacute;, se voc&ecirc; tiver um celular por a&iacute;, n&atilde;o precisa nem comprar a maldita l&acirc;mpada! S&oacute; cuidado, afinal, os resultados podem n&atilde;o ser muito agrad&aacute;veis&hellip;</p>', 'Quem aÃ­ nunca viu uma lÃ¢mpada de luz negra sendo usada em um filme? Essas lÃ¢mpadas possuem muitas utilidades, mas uma das mais famosas Ã© a de detector de...\r\n', 'b79e6271edcd929c6dce5dab56727b43.jpg', 4, '2015-06-04 14:52:02', 0),
(10, 'AS 16 MULHERES MAIS BONITAS DO MUNDO?', 'Todos os anos corre sempre a mesma discussÃ£o: quem seriam as mulheres mais bonitas do mundo? Dessa vez, quem tentou responder a esse dilema foi o site Hollywoodbuzz.com. A...', '<p style="margin: 0px 0px 15px; padding: 0px; border: 0px; font-size: 15px; vertical-align: baseline; color: #484848; font-family: ''Open Sans''; line-height: 24px;">Todos os anos corre sempre a mesma discuss&atilde;o: quem seriam as mulheres mais bonitas do mundo? Dessa vez, quem tentou responder a esse dilema foi o site Hollywoodbuzz.com. A pesquisa realizada pela p&aacute;gina foi encerrada no dia 14 de dezembro de 2013 e contou com a vota&ccedil;&atilde;o de mais de 4 milh&otilde;es de pessoas.</p>\r\n<p style="margin: 0px 0px 15px; padding: 0px; border: 0px; font-size: 15px; vertical-align: baseline; color: #484848; font-family: ''Open Sans''; line-height: 24px;">A sele&ccedil;&atilde;o final, conforme informou a equipe do site, foi feita pelos leitores que, al&eacute;m da beleza f&iacute;sica, avaliaram se as candidatas eram &nbsp;inteligentes, fortes, atraentes e bem-sucedidas.</p>\r\n<p style="margin: 0px 0px 15px; padding: 0px; border: 0px; font-size: 15px; vertical-align: baseline; color: #484848; font-family: ''Open Sans''; line-height: 24px;">Apesar de ser uma lista mais extensa, o Macaco Velho vai mostrar hoje 16 das eleitas como as mulheres mais bonitas do mundo.&nbsp;Veja, logo abaixo, as fotos das famosas e nos diga: para voc&ecirc; essas seriam mesmo as mulheres mais bonitas do mundo?</p>\r\n<p style="margin: 0px 0px 15px; padding: 0px; border: 0px; font-size: 15px; vertical-align: baseline; color: #484848; font-family: ''Open Sans''; line-height: 24px;">N&atilde;o sabemos voc&ecirc;s, mas na nossa opini&atilde;o, esse pessoal que votou precisava conhecer as &ldquo;belezas naturais&rdquo; do Brasil, antes de se aventurar em uma elei&ccedil;&atilde;o como essa. Confira:</p>', 'Todos os anos corre sempre a mesma discussÃ£o: quem seriam as mulheres mais bonitas do mundo? Dessa vez, quem tentou responder a esse dilema foi o site Hollywoodbuzz.com. A...\r\n', '72487ef6cf1ce374f43df81b61324419.jpg', 4, '2015-06-04 15:00:33', 0);

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
-- Estrutura da tabela `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id_slider` int(11) NOT NULL,
  `title` varchar(233) NOT NULL,
  `text` text NOT NULL,
  `img` varchar(233) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `slider`
--

INSERT INTO `slider` (`id_slider`, `title`, `text`, `img`) VALUES
(6, 'GTA 5', 'OPS', '1789594.jpg'),
(7, 'Rayssa Legalzin', 'coisa scrta kkk kk k k k kk kkkk k  k', 'legal cara.jpg'),
(8, 'mantenha a calma', 'Ta vendo?', 'keep-calm-it-s-today.png');

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
(13, 'anitas', '6116afedcb0bc31083935c1c262ff4c9', 'anita@ops.com', 0, '2015-05-25 21:39:25');

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
(1, 'joerverson', '2015-08-28', 'nada', 'joerversons@g.com', 'asasasdasdasd', 'sei', '11159216_735313696591866_1985617370_o.jpg'),
(5, 'Marieta Nobrega', '2015-09-23', 'asdas', 'info@unisigma.com.br', 'asdasdasdasdasda', 'Nada', ''),
(6, 'anita', '2015-05-03', 'ssssssssss', 'bautry2000@hotmail.com', 'ssssssssssss', 'aaa', '1789594.jpg'),
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
,`date_register` datetime
,`name` varchar(123)
,`email` text
,`file` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vnoticiasporcategoria`
--
CREATE TABLE IF NOT EXISTS `vnoticiasporcategoria` (
`id` int(11)
,`title` varchar(123)
,`id_category` int(11)
,`name_category` varchar(200)
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

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vnoticias` AS select `n`.`id` AS `id`,`n`.`title` AS `title`,`n`.`subtitle` AS `subtitle`,`n`.`text` AS `text`,`n`.`resume` AS `resume`,`n`.`image` AS `image`,`n`.`date_register` AS `date_register`,`u`.`name` AS `name`,`u`.`email` AS `email`,`p`.`file` AS `file` from ((`noticias` `n` join `usuarios` `u` on((`u`.`id` = `n`.`id_membro`))) left join `pdf` `p` on((`p`.`id_pdf` = `n`.`id_pdf`)));

-- --------------------------------------------------------

--
-- Structure for view `vnoticiasporcategoria`
--
DROP TABLE IF EXISTS `vnoticiasporcategoria`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vnoticiasporcategoria` AS select `n`.`id` AS `id`,`n`.`title` AS `title`,`cat`.`id_category` AS `id_category`,`cat`.`name_category` AS `name_category` from ((`categoriasnoticias` `c` join `noticias` `n` on((`n`.`id` = `c`.`id_notice`))) join `category` `cat` on((`cat`.`id_category` = `c`.`id_category`)));

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
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slider`);

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
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `pdf`
--
ALTER TABLE `pdf`
  MODIFY `id_pdf` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
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
