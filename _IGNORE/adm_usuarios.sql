SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

CREATE TABLE `adm_usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `nivel` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

INSERT INTO `adm_usuarios` (`id`, `nome`, `usuario`, `senha`, `nivel`) VALUES
(1, 'Administrador', 'admin', 'admin102030','0');
