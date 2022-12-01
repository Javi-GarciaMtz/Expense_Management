-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 23-08-2022 a las 18:58:24
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `expense_management`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expenses`
--

DROP TABLE IF EXISTS `expenses`;
CREATE TABLE IF NOT EXISTS `expenses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `cost` float NOT NULL,
  `date` date NOT NULL,
  `description` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `expenses`
--

INSERT INTO `expenses` (`id`, `name`, `cost`, `date`, `description`) VALUES
(1, 'gasto de prueba', 123.2, '2022-08-18', 'este fue un gasto de prueba que hice el otro dia'),
(2, 'gasto de prueba 2', 223.98, '2022-08-19', 'este es un gasto de prueba que hice el dia 19 XDD'),
(3, 'prueba3', 121, '2022-08-23', 'qweqweeqweqwe'),
(4, 'prueba de gasto desde php', 23.23, '2022-08-19', 'esto es una descriopcion desde php'),
(5, 'prueba de gasto desde php 2', 23.23, '2022-08-19', 'esto es una descriopcion desde php'),
(6, 'ewee', 21312, '2022-08-19', 'dfsdfsdf'),
(7, 'ewee', 21312, '2022-08-19', 'dfsdfsdf'),
(8, 'Este es un gasto desde el front', 20.45, '2022-08-19', 'descripcion XDDDDDDDD'),
(9, 'www', 222, '2022-08-19', 'ass'),
(10, '12', 12, '2022-08-19', '12'),
(11, '12', 12, '2022-08-19', '12'),
(12, '12', 12, '2022-08-19', '12'),
(13, '12', 12, '2022-08-19', '12'),
(14, '12', 12, '2022-08-19', '12'),
(15, '32323', 23233, '2022-08-19', '2323'),
(16, '12', 12, '2022-08-19', 'sdsdsd'),
(17, 'prueba de gasto locochon', 39.5, '2022-08-23', 'esta es otra prueba de gastoXDD'),
(18, 'AA', 10, '2022-08-23', 'a'),
(19, '12', 12, '2022-08-23', '12'),
(20, 'prueba', 10, '2022-08-23', 'XDD'),
(21, '200', 200.5, '2022-08-23', 'XDDD'),
(22, 'prueba', 7.25, '2022-08-23', 'XDD'),
(23, '1', 1, '2022-08-23', ''),
(24, '12', 30, '2022-08-23', 'XDDD'),
(25, 'xdxdx', 21212, '2022-07-13', 'xdxdx');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `income`
--

DROP TABLE IF EXISTS `income`;
CREATE TABLE IF NOT EXISTS `income` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `amount` float NOT NULL,
  `date` date NOT NULL,
  `description` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `income`
--

INSERT INTO `income` (`id`, `name`, `amount`, `date`, `description`) VALUES
(1, 'pruab', 22, '2022-08-23', 'dasdsdd'),
(2, 'prueba de ingreso ', 20, '2022-08-23', 'xxdxd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `money`
--

DROP TABLE IF EXISTS `money`;
CREATE TABLE IF NOT EXISTS `money` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `money`
--

INSERT INTO `money` (`id`, `amount`) VALUES
(1, 149.25);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
