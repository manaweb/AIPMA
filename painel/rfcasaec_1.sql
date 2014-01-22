-- phpMyAdmin SQL Dump
-- version 4.0.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 22, 2013 at 09:27 AM
-- Server version: 5.5.32-cll
-- PHP Version: 5.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rfcasaec_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `adm_faq`
--

CREATE TABLE IF NOT EXISTS `adm_faq` (
  `id_faq` int(11) NOT NULL AUTO_INCREMENT,
  `pergunta` varchar(255) NOT NULL,
  `resposta` text NOT NULL,
  PRIMARY KEY (`id_faq`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Table structure for table `adm_historico`
--

CREATE TABLE IF NOT EXISTS `adm_historico` (
  `id_historico` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `id_acao` int(11) NOT NULL,
  `id_ref` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_historico`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=306 ;

--
-- Dumping data for table `adm_historico`
--

INSERT INTO `adm_historico` (`id_historico`, `id_usuario`, `id_menu`, `id_acao`, `id_ref`, `data`) VALUES
(252, 1, 0, 1, 38, '2013-10-28 17:59:31'),
(253, 1, 0, 1, 20, '2013-10-29 17:47:44'),
(254, 1, 0, 1, 21, '2013-10-30 18:21:56'),
(255, 1, 0, 1, 22, '2013-10-30 18:24:26'),
(256, 1, 0, 1, 23, '2013-10-30 18:25:18'),
(257, 1, 0, 1, 24, '2013-10-31 19:37:57'),
(258, 1, 0, 1, 25, '2013-10-31 19:39:31'),
(259, 1, 0, 1, 26, '2013-10-31 19:40:21'),
(260, 1, 0, 4, 21, '2013-11-01 16:03:59'),
(261, 1, 0, 4, 22, '2013-11-01 16:03:59'),
(262, 1, 0, 4, 23, '2013-11-01 16:03:59'),
(263, 1, 0, 4, 24, '2013-11-01 16:03:59'),
(264, 1, 0, 4, 25, '2013-11-01 16:03:59'),
(265, 1, 0, 4, 26, '2013-11-01 16:03:59'),
(266, 1, 0, 1, 38, '2013-11-01 18:08:21'),
(267, 1, 0, 1, 39, '2013-11-01 18:41:10'),
(268, 1, 0, 1, 27, '2013-11-06 18:53:12'),
(269, 1, 0, 4, 39, '2013-11-13 17:43:02'),
(270, 1, 0, 1, 39, '2013-11-14 16:25:03'),
(271, 1, 0, 1, 28, '2013-11-14 16:25:47'),
(272, 1, 0, 1, 29, '2013-11-14 16:26:23'),
(273, 1, 0, 1, 30, '2013-11-14 16:27:20'),
(274, 1, 0, 1, 41, '2013-11-14 16:35:37'),
(275, 1, 0, 1, 31, '2013-11-14 16:36:09'),
(276, 1, 0, 1, 32, '2013-11-18 13:40:12'),
(277, 1, 0, 1, 33, '2013-11-18 13:57:16'),
(278, 1, 0, 4, 32, '2013-11-18 13:57:29'),
(279, 1, 0, 4, 33, '2013-11-18 13:57:29'),
(280, 1, 0, 1, 34, '2013-11-18 14:14:15'),
(281, 1, 0, 1, 35, '2013-11-18 14:15:05'),
(282, 1, 0, 1, 36, '2013-11-18 14:16:26'),
(283, 1, 0, 1, 37, '2013-11-18 14:30:04'),
(284, 1, 0, 3, 11, '2013-11-20 16:20:44'),
(285, 1, 0, 3, 11, '2013-11-20 16:20:54'),
(286, 1, 0, 3, 11, '2013-11-20 16:29:27'),
(287, 1, 0, 4, 17, '2013-11-20 16:30:53'),
(288, 1, 0, 4, 18, '2013-11-20 16:31:01'),
(289, 1, 0, 4, 19, '2013-11-20 16:31:05'),
(290, 1, 0, 4, 20, '2013-11-20 16:31:07'),
(291, 1, 0, 4, 21, '2013-11-20 16:31:10'),
(292, 1, 0, 4, 22, '2013-11-20 16:31:13'),
(293, 1, 0, 3, 10, '2013-11-20 18:13:59'),
(294, 1, 0, 3, 12, '2013-11-20 18:15:03'),
(295, 1, 0, 4, 35, '2013-11-21 18:51:41'),
(296, 1, 0, 4, 16, '2013-11-21 18:51:45'),
(297, 1, 0, 4, 15, '2013-11-21 18:51:47'),
(298, 1, 0, 4, 14, '2013-11-21 18:51:49'),
(299, 1, 0, 4, 13, '2013-11-21 18:51:51'),
(300, 1, 0, 4, 12, '2013-11-21 18:51:54'),
(301, 1, 0, 4, 28, '2013-11-21 18:57:23'),
(302, 1, 0, 4, 6, '2013-11-21 19:14:41'),
(303, 1, 0, 4, 10, '2013-11-21 19:38:07'),
(304, 1, 0, 4, 12, '2013-11-21 19:38:13'),
(305, 1, 0, 4, 7, '2013-11-21 19:38:27');

-- --------------------------------------------------------

--
-- Table structure for table `adm_historico_acoes`
--

CREATE TABLE IF NOT EXISTS `adm_historico_acoes` (
  `id_acao` int(11) NOT NULL AUTO_INCREMENT,
  `acao` varchar(255) NOT NULL,
  PRIMARY KEY (`id_acao`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `adm_menu`
--

CREATE TABLE IF NOT EXISTS `adm_menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `destino` varchar(255) NOT NULL,
  `icone` varchar(100) NOT NULL,
  `dentro_id` int(11) NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=109 ;

--
-- Dumping data for table `adm_menu`
--

INSERT INTO `adm_menu` (`id_menu`, `titulo`, `destino`, `icone`, `dentro_id`) VALUES
(100, 'Editar Texto', 'sobre_dados.php?ID=1', '', 99),
(102, 'Gerenciar Subcategorias', 'produtos_subcategorias.php', '', 86),
(83, 'Banners', '', '', 0),
(84, 'Adicionar banner', 'banner_dados.php', '', 83),
(85, 'Gerenciar banners', 'banner.php', '', 83),
(86, 'Produtos', '', '', 0),
(87, 'Adicionar Produtos', 'produtos_dados.php', '', 86),
(94, 'Gerenciar Categorias', 'produtos_categorias.php', '', 86),
(93, 'Gerenciar Produtos', 'produtos.php', '', 86),
(101, 'Visualizar Texto', 'sobre.php', '', 99),
(103, 'Gerenciar Varia&ccedil;&otilde;es', 'produtos_variacoes.php', '', 86),
(99, 'Sobre a empresa', '', '', 0),
(105, 'Or&ccedil;amentos', '', '', 0),
(106, 'Visualizar Or&ccedil;amentos', 'orcamento.php', '', 105),
(107, 'Clientes', '', '', 0),
(108, 'Visualizar Clientes Cadastrados', 'clientes.php', '', 107);

-- --------------------------------------------------------

--
-- Table structure for table `adm_permissoes`
--

CREATE TABLE IF NOT EXISTS `adm_permissoes` (
  `id_usuario` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `adm_usuarios`
--

CREATE TABLE IF NOT EXISTS `adm_usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `login` varchar(20) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `email` varchar(100) NOT NULL,
  `data_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `flag_status` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `adm_usuarios`
--

INSERT INTO `adm_usuarios` (`id_usuario`, `nome`, `login`, `senha`, `email`, `data_login`, `flag_status`) VALUES
(1, 'admin', 'admin', 'deb1577fbc522d0d0c80412ceb4896b8', 'contato@rfcasaecia.com.br', '2013-11-22 11:22:40', 1);

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `nomeAlbum` char(40) NOT NULL,
  `descricaoAlbum` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `calendario`
--

CREATE TABLE IF NOT EXISTS `calendario` (
  `id_evento` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) CHARACTER SET latin1 NOT NULL,
  `data` date NOT NULL DEFAULT '0000-00-00',
  `descricao` longtext CHARACTER SET latin1 NOT NULL,
  `imagem` varchar(255) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_evento`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=21 ;

-- --------------------------------------------------------

--
-- Table structure for table `historico`
--

CREATE TABLE IF NOT EXISTS `historico` (
  `id` int(11) NOT NULL,
  `texto` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `historico`
--

INSERT INTO `historico` (`id`, `texto`) VALUES
(1, '<div><font face="Arial, Helvetica, sans-serif" size="2"><span style="line-height: 19.5px;">Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</span></font></div><div><font face="Arial, Helvetica, sans-serif" size="2"><span style="line-height: 19.5px;"><br></span></font></div><div><font face="Arial, Helvetica, sans-serif" size="2"><span style="line-height: 19.5px;">Suco de cevadiss, é um leite divinis, qui tem lupuliz, matis, aguis e fermentis. Interagi no mé, cursus quis, vehicula ac nisi. Aenean vel dui dui. Nullam leo erat, aliquet quis tempus a, posuere ut mi. Ut scelerisque neque et turpis posuere pulvinar pellentesque nibh ullamcorper. Pharetra in mattis molestie, volutpat elementum justo. Aenean ut ante turpis. Pellentesque laoreet mé vel lectus scelerisque interdum cursus velit auctor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ac mauris lectus, non scelerisque augue. Aenean justo massa.</span></font></div><div><font face="Arial, Helvetica, sans-serif" size="2"><span style="line-height: 19.5px;"><br></span></font></div><div><font face="Arial, Helvetica, sans-serif" size="2"><span style="line-height: 19.5px;">Casamentiss faiz malandris se pirulitá, Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Lorem ipsum dolor sit amet, consectetuer Ispecialista im mé intende tudis nuam golada, vinho, uiski, carirí, rum da jamaikis, só num pode ser mijis. Adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</span></font></div><div><font face="Arial, Helvetica, sans-serif" size="2"><span style="line-height: 19.5px;"><br></span></font></div><div><font face="Arial, Helvetica, sans-serif" size="2"><span style="line-height: 19.5px;">Cevadis im ampola pa arma uma pindureta. Nam varius eleifend orci, sed viverra nisl condimentum ut. Donec eget justis enim. Atirei o pau no gatis. Viva Forevis aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Copo furadis é disculpa de babadis, arcu quam euismod magna, bibendum egestas augue arcu ut est. Delegadis gente finis. In sit amet mattis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis. Pellentesque viverra accumsan ipsum elementum gravidis.</span></font></div><div><font face="Arial, Helvetica, sans-serif" size="2"><span style="line-height: 19.5px;"><br></span></font></div><div><font face="Arial, Helvetica, sans-serif" size="2"><span style="line-height: 19.5px;">Forevis aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Copo furadis é disculpa de babadis, arcu quam euismod magna, bibendum egestas augue arcu ut est. Etiam ultricies tincidunt ligula, sed accumsan sapien mollis et. Delegadis gente finis. In sit amet mattis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis. Pellentesque viverra accumsan ipsum elementum gravida. Quisque vitae metus id massa tincidunt iaculis sed sed purus. Vestibulum viverra lobortis faucibus. Vestibulum et turpis.</span></font></div><div style="font-family: Arial, Helvetica, sans-serif !important; font-size: 13px; line-height: 1.5em !important;"><br></div>');

-- --------------------------------------------------------

--
-- Table structure for table `tbclientes`
--

CREATE TABLE IF NOT EXISTS `tbclientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `primeironome` varchar(255) NOT NULL,
  `ultimonome` varchar(255) NOT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbclientes`
--

INSERT INTO `tbclientes` (`id`, `email`, `primeironome`, `ultimonome`, `celular`, `telefone`) VALUES
(4, 'wesleyferreira1710@gmail.com', 'Wesley', 'Santos', '123123', '123123132'),
(3, 'wesleyferreira1710@hotmail.com', 'Wesley', 'Santos', '123123', '123123'),
(5, 'wesleyferreira1710@bol.com.br', 'Wesley', 'Santos', '123', '123'),
(8, 'adm@manaweb.com.br', 'Wesley ', 'Feitishi', '16 99998776', '16 32022222'),
(9, 'suportemanaweb@hotmail.com', 'Wesley', 'Feitishi', '16 99998776', '16 32022222'),
(11, 'wesley@manaweb.com.br', 'Wesley', 'Oliveira', '1616166', '1632035555');

-- --------------------------------------------------------

--
-- Table structure for table `tbconfiguracoes`
--

CREATE TABLE IF NOT EXISTS `tbconfiguracoes` (
  `nomesite` varchar(255) CHARACTER SET latin1 NOT NULL,
  `slogansite` varchar(255) CHARACTER SET latin1 NOT NULL,
  `emailsite` varchar(255) CHARACTER SET latin1 NOT NULL,
  `telefone1` varchar(255) CHARACTER SET latin1 NOT NULL,
  `telefone2` varchar(255) CHARACTER SET latin1 NOT NULL,
  `telefone3` varchar(255) CHARACTER SET latin1 NOT NULL,
  `produtoservico` varchar(255) CHARACTER SET latin1 NOT NULL,
  `pagseguro` varchar(255) CHARACTER SET latin1 NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 NOT NULL,
  `twitter` varchar(255) CHARACTER SET latin1 NOT NULL,
  `facebook` varchar(255) CHARACTER SET latin1 NOT NULL,
  `youtube` varchar(255) CHARACTER SET latin1 NOT NULL,
  `imagem` varchar(255) CHARACTER SET latin1 NOT NULL,
  `endereco` longtext CHARACTER SET latin1 NOT NULL,
  `id_config` int(11) NOT NULL AUTO_INCREMENT,
  `corsite` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(255) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_config`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbcontador`
--

CREATE TABLE IF NOT EXISTS `tbcontador` (
  `id_pagina` int(11) NOT NULL AUTO_INCREMENT,
  `acessos` varchar(255) NOT NULL,
  PRIMARY KEY (`id_pagina`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbgalerias`
--

CREATE TABLE IF NOT EXISTS `tbgalerias` (
  `id_galeria` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL DEFAULT '',
  `local` varchar(255) NOT NULL DEFAULT '',
  `data` date NOT NULL DEFAULT '0000-00-00',
  `descricao` text NOT NULL,
  `codigo` varchar(32) NOT NULL DEFAULT '',
  `contador` int(11) NOT NULL DEFAULT '0',
  `flag_status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_galeria`),
  KEY `id_galeria` (`id_galeria`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbgalerias_comentarios`
--

CREATE TABLE IF NOT EXISTS `tbgalerias_comentarios` (
  `id_comentario` int(11) NOT NULL AUTO_INCREMENT,
  `id_galeria` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mensagem` mediumtext NOT NULL,
  `datahora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(15) NOT NULL,
  `flag_status` char(1) NOT NULL,
  PRIMARY KEY (`id_comentario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbgalerias_config`
--

CREATE TABLE IF NOT EXISTS `tbgalerias_config` (
  `campo` varchar(255) NOT NULL DEFAULT '',
  `valor` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`campo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbgalerias_fotos`
--

CREATE TABLE IF NOT EXISTS `tbgalerias_fotos` (
  `id_foto` int(11) NOT NULL AUTO_INCREMENT,
  `id_galeria` int(11) NOT NULL DEFAULT '0',
  `imagem` varchar(100) NOT NULL DEFAULT '',
  `legenda` varchar(255) NOT NULL DEFAULT '',
  `contador` int(11) NOT NULL DEFAULT '0',
  `flag_status` int(1) NOT NULL DEFAULT '1',
  `posicao` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_foto`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1600 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbitensorcamento`
--

CREATE TABLE IF NOT EXISTS `tbitensorcamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produto` int(11) NOT NULL,
  `id_orcamento` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `variacao` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `tbitensorcamento`
--

INSERT INTO `tbitensorcamento` (`id`, `id_produto`, `id_orcamento`, `quantidade`, `variacao`) VALUES
(3, 30, 10, 0, ''),
(4, 29, 10, 0, ''),
(5, 27, 10, 0, ''),
(6, 29, 11, 0, ''),
(7, 28, 11, 0, ''),
(8, 29, 12, 0, ''),
(9, 29, 13, 0, ''),
(10, 29, 14, 0, ''),
(11, 27, 16, 0, ''),
(12, 27, 17, 0, ''),
(13, 30, 20, 0, ''),
(14, 29, 23, 0, ''),
(15, 31, 24, 0, ''),
(16, 29, 24, 0, ''),
(17, 30, 26, 0, ''),
(18, 29, 27, 0, ''),
(19, 29, 28, 0, ''),
(20, 20, 28, 0, ''),
(21, 20, 29, 0, ''),
(22, 20, 30, 0, ''),
(23, 29, 31, 0, ''),
(24, 20, 32, 0, ''),
(25, 20, 33, 0, ''),
(26, 31, 33, 0, ''),
(27, 31, 34, 0, ''),
(28, 27, 35, 0, ''),
(29, 30, 35, 0, ''),
(30, 20, 36, 0, ''),
(31, 28, 36, 0, ''),
(32, 31, 36, 0, ''),
(33, 31, 37, 0, ''),
(34, 30, 37, 0, ''),
(35, 29, 38, 1, 'Solteiro'),
(36, 28, 39, 1, 'Solteiro');

-- --------------------------------------------------------

--
-- Table structure for table `tbmaterias`
--

CREATE TABLE IF NOT EXISTS `tbmaterias` (
  `id_materia` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `texto` text NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  PRIMARY KEY (`id_materia`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=204 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbmaterias_categorias`
--

CREATE TABLE IF NOT EXISTS `tbmaterias_categorias` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `cat_img` varchar(100) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbmural`
--

CREATE TABLE IF NOT EXISTS `tbmural` (
  `id_mural` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mensagem` mediumtext NOT NULL,
  `datahora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `flag_status` char(1) NOT NULL,
  PRIMARY KEY (`id_mural`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbnoticias`
--

CREATE TABLE IF NOT EXISTS `tbnoticias` (
  `id_noticia` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `subtitulo` varchar(250) NOT NULL,
  `creditos` varchar(250) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `texto` text NOT NULL,
  `id_categoria` int(11) NOT NULL,
  PRIMARY KEY (`id_noticia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbnoticias_categorias`
--

CREATE TABLE IF NOT EXISTS `tbnoticias_categorias` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(255) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbnoticias_comentarios`
--

CREATE TABLE IF NOT EXISTS `tbnoticias_comentarios` (
  `id_comentario` int(11) NOT NULL AUTO_INCREMENT,
  `id_noticia` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mensagem` mediumtext NOT NULL,
  `datahora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(15) NOT NULL,
  `flag_status` char(1) NOT NULL,
  PRIMARY KEY (`id_comentario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbnoticias_imagens`
--

CREATE TABLE IF NOT EXISTS `tbnoticias_imagens` (
  `id_img` int(11) NOT NULL AUTO_INCREMENT,
  `id_noticia` int(11) NOT NULL,
  `imagem` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_img`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tboracao`
--

CREATE TABLE IF NOT EXISTS `tboracao` (
  `id_oracao` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `pedido` mediumtext CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `data` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id_oracao`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tborcamento`
--

CREATE TABLE IF NOT EXISTS `tborcamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `flag_status` int(11) NOT NULL,
  `data` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `tborcamento`
--

INSERT INTO `tborcamento` (`id`, `id_cliente`, `flag_status`, `data`) VALUES
(39, 12, 1, '2013-11-21 16:55:13'),
(11, 4, 1, '0000-00-00 00:00:00'),
(10, 4, 1, '0000-00-00 00:00:00'),
(27, 4, 1, '0000-00-00 00:00:00'),
(26, 9, 0, '0000-00-00 00:00:00'),
(25, 8, 0, '0000-00-00 00:00:00'),
(24, 8, 0, '0000-00-00 00:00:00'),
(23, 7, 0, '0000-00-00 00:00:00'),
(29, 4, 1, '2013-11-20 16:42:04'),
(30, 4, 0, '2013-11-20 16:58:18'),
(31, 8, 0, '2013-11-20 17:00:48'),
(32, 9, 0, '2013-11-20 17:02:47'),
(33, 11, 0, '2013-11-21 07:55:17'),
(34, 7, 0, '2013-11-21 08:08:31'),
(36, 11, 0, '2013-11-21 13:54:27'),
(37, 11, 1, '2013-11-21 14:01:43'),
(38, 4, 1, '2013-11-21 16:50:52');

-- --------------------------------------------------------

--
-- Table structure for table `tbprodutos`
--

CREATE TABLE IF NOT EXISTS `tbprodutos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `descricao` mediumtext NOT NULL,
  `foto1` varchar(255) NOT NULL,
  `id_subcategoria` int(11) NOT NULL,
  `variacoes` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `tbprodutos`
--

INSERT INTO `tbprodutos` (`id`, `nome`, `preco`, `descricao`, `foto1`, `id_subcategoria`, `variacoes`) VALUES
(20, 'JG Colcha Matelassê Premier Malha Grafite HD - Solteiro', 218.90, '<font face="Arial, Helvetica, sans-serif" size="2"><span style="line-height: 19.5px;">desc - JG Colcha Matelassê Premier Malha Grafite HD - Solteiro</span></font>', '../../arquivos/produtos/0.815806001383068864produto-teste.png', 38, ' 1; 2; 3'),
(29, 'Edredon casal', 210.00, 'Edredon casal', '../../arquivos/produtos/0.617117001384446383casal-edredon.jpg', 39, ' 1; 2; 3'),
(28, 'Edredon Ursinho', 120.00, 'Edredon de ursinho', '../../arquivos/produtos/0.533187001384446346edredon-urso.jpg', 39, ' 1; 2; 3'),
(27, 'Jogo de cama', 150.00, 'Descrição jogo de cama', '../../arquivos/produtos/0.301889001383763992273627_1_400.jpg', 38, ' 1; 2; 3'),
(30, 'Edredon', 500.00, 'Edredom', '../../arquivos/produtos/0.630837001384446440edredon.jpg', 39, ' 1; 2; 3'),
(31, 'Conjunto de Toalhas', 90.00, 'Jogo de toalhas', '../../arquivos/produtos/0.4212310013844469697421826SZ.jpg', 41, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbprodutos_categorias`
--

CREATE TABLE IF NOT EXISTS `tbprodutos_categorias` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(255) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `tbprodutos_categorias`
--

INSERT INTO `tbprodutos_categorias` (`id_categoria`, `categoria`) VALUES
(16, 'Cama'),
(17, 'Banho');

-- --------------------------------------------------------

--
-- Table structure for table `tbprodutos_subcategorias`
--

CREATE TABLE IF NOT EXISTS `tbprodutos_subcategorias` (
  `id_subcategoria` int(11) NOT NULL AUTO_INCREMENT,
  `subcategoria` varchar(255) NOT NULL,
  `categoria` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_subcategoria`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `tbprodutos_subcategorias`
--

INSERT INTO `tbprodutos_subcategorias` (`id_subcategoria`, `subcategoria`, `categoria`) VALUES
(37, 'Todos', 16),
(38, 'Colchas', 16),
(39, 'Edredom', 16),
(40, 'Todos', 17),
(41, 'Toalhas', 17);

-- --------------------------------------------------------

--
-- Table structure for table `tbprodutos_variacoes`
--

CREATE TABLE IF NOT EXISTS `tbprodutos_variacoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `variacao` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbprodutos_variacoes`
--

INSERT INTO `tbprodutos_variacoes` (`id`, `variacao`) VALUES
(1, 'King'),
(2, 'Solteiro'),
(3, 'Casal');

-- --------------------------------------------------------

--
-- Table structure for table `tbproduto_com_variacao`
--

CREATE TABLE IF NOT EXISTS `tbproduto_com_variacao` (
  `idproduto` int(11) NOT NULL,
  `id_variacao` int(11) NOT NULL,
  PRIMARY KEY (`idproduto`,`id_variacao`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbpublicidade`
--

CREATE TABLE IF NOT EXISTS `tbpublicidade` (
  `id_publicidade` int(11) NOT NULL AUTO_INCREMENT,
  `id_area` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL DEFAULT '',
  `arquivo` varchar(500) NOT NULL DEFAULT '',
  `dimx` int(11) DEFAULT '0',
  `dimy` int(11) DEFAULT '0',
  `destino` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_publicidade`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `tbpublicidade`
--

INSERT INTO `tbpublicidade` (`id_publicidade`, `id_area`, `titulo`, `arquivo`, `dimx`, `dimy`, `destino`) VALUES
(38, 1, 'Banner1', '../../arquivos/banner/0.662000001383329301banner2.jpg', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbpublicidade_areas`
--

CREATE TABLE IF NOT EXISTS `tbpublicidade_areas` (
  `id_area` int(11) NOT NULL AUTO_INCREMENT,
  `area` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_area`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbpublicidade_areas`
--

INSERT INTO `tbpublicidade_areas` (`id_area`, `area`) VALUES
(1, 'Banner Topo');

-- --------------------------------------------------------

--
-- Table structure for table `tbvideos`
--

CREATE TABLE IF NOT EXISTS `tbvideos` (
  `id_video` int(11) NOT NULL AUTO_INCREMENT,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_categoria` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `titulo` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `video` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `descricao` mediumtext COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_video`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbvideos_categorias`
--

CREATE TABLE IF NOT EXISTS `tbvideos_categorias` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(255) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `sobrenome` varchar(255) NOT NULL,
  `mae` varchar(255) NOT NULL,
  `pai` varchar(255) NOT NULL,
  `naturalde` varchar(255) NOT NULL,
  `nacional` varchar(255) NOT NULL,
  `nascimento` date NOT NULL DEFAULT '0000-00-00',
  `estadocivil` varchar(50) NOT NULL,
  `conjuge` varchar(255) NOT NULL,
  `conjugecrente` varchar(10) NOT NULL,
  `igrejaconjuge` varchar(255) NOT NULL,
  `filhos` mediumtext NOT NULL,
  `profissao` varchar(255) NOT NULL,
  `empresa` varchar(255) NOT NULL,
  `telcomercial` varchar(100) NOT NULL,
  `enderecoempresa` varchar(255) NOT NULL,
  `identidade` varchar(11) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `grau` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `cep` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `datafe` date NOT NULL DEFAULT '0000-00-00',
  `databatismo` date NOT NULL DEFAULT '0000-00-00',
  `igrejabatismo` varchar(255) NOT NULL,
  `cidadeigreja` varchar(255) NOT NULL,
  `estadoigreja` varchar(255) NOT NULL,
  `pastorbatismo` varchar(255) NOT NULL,
  `modocomoentrou` varchar(255) NOT NULL,
  `dataentrou` date NOT NULL DEFAULT '0000-00-00',
  `musicapreferida` varchar(255) NOT NULL,
  `bibliapreferida` varchar(500) NOT NULL,
  `dizimista` varchar(25) NOT NULL,
  `ministerio` varchar(255) NOT NULL,
  `talentos` mediumtext NOT NULL,
  `posicaoeclisiastica` varchar(255) NOT NULL,
  `gostariatrabalhar` varchar(255) NOT NULL,
  `orkut` varchar(255) NOT NULL,
  `flag_status` int(11) NOT NULL DEFAULT '1',
  `login` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `aw` varchar(255) NOT NULL,
  `ae` varchar(255) NOT NULL,
  `ar` varchar(255) NOT NULL,
  `at` varchar(255) NOT NULL,
  `ay` varchar(255) NOT NULL,
  `au` varchar(255) NOT NULL,
  `ai` varchar(255) NOT NULL,
  `ao` varchar(255) NOT NULL,
  `ap` varchar(255) NOT NULL,
  `as` varchar(255) NOT NULL,
  `ad` varchar(255) NOT NULL,
  `data` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5459 ;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(40) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `permissao` tinyint(1) DEFAULT '0',
  `foto` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `visitantes`
--

CREATE TABLE IF NOT EXISTS `visitantes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `contador` varchar(10) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=199 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
         