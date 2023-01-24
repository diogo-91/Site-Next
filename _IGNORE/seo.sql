-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 21, 2014 at 02:28 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `soda`
--

-- --------------------------------------------------------

--
-- Table structure for table `seo`
--

CREATE TABLE IF NOT EXISTS `seo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keywords` varchar(255) NOT NULL,
  `titulo_site` varchar(255) NOT NULL,
  `descricao_site` varchar(255) NOT NULL,
  `imagem_facebook` varchar(255) NOT NULL,
  `favicon` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `seo`
--

INSERT INTO `seo` (`id`, `keywords`, `titulo_site`, `descricao_site`, `imagem_facebook`, `favicon`) VALUES
(1, 'Agência web Sorocaba, Agência de Publicidade Sorocaba, marketing, comunicação convergente, planejamento estratégico, SEO, otimização sites, desenvolvimento sites sorocaba, criação de sites são paulo', 'Soda Pop - We Are Soda !', 'Soda Pop é uma agência de publicidade on-line e offline, comunicação convergente, pois utiliza todos os meios convencionais e não convencionais, para otimizar o seu budget e fazer sua empresa atingir quem realmente precisa', 'logo_soda.jpg', 'favicon.ico');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
