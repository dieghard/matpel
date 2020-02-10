-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 24-09-2018 a las 01:43:32
-- Versión del servidor: 5.7.21
-- Versión de PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `matpelbbvvlevalle`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuartel`
--

DROP TABLE IF EXISTS `cuartel`;
CREATE TABLE IF NOT EXISTS `cuartel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `Direccion` varchar(200) NOT NULL,
  `nombreContacto` varchar(200) NOT NULL,
  `celContacto` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cuartel`
--

INSERT INTO `cuartel` (`id`, `Nombre`, `Direccion`, `nombreContacto`, `celContacto`) VALUES
(1, 'Cuartel 51/3 General Levalle', 'E.Genoud 230', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matpel`
--

DROP TABLE IF EXISTS `matpel`;
CREATE TABLE IF NOT EXISTS `matpel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nProducto` varchar(20) DEFAULT NULL,
  `ncas` varchar(20) DEFAULT NULL,
  `clase` int(11) NOT NULL,
  `nombreProducto` varchar(200) NOT NULL,
  `salud` int(11) NOT NULL,
  `inflamabilidad` int(11) NOT NULL,
  `reactividad` int(11) NOT NULL,
  `riesgoEspecial` int(11) NOT NULL,
  `valorTotal` int(11) NOT NULL,
  `ruta` varchar(200) NOT NULL,
  `observaciones` varchar(400) NOT NULL,
  `colorLetra` varchar(20) NOT NULL,
  `colorFondo` varchar(20) NOT NULL,
  `usuarioid` int(11) NOT NULL,
  `FechaModificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `eliminado` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `matpel`
--

INSERT INTO `matpel` (`id`, `nProducto`, `ncas`, `clase`, `nombreProducto`, `salud`, `inflamabilidad`, `reactividad`, `riesgoEspecial`, `valorTotal`, `ruta`, `observaciones`, `colorLetra`, `colorFondo`, `usuarioid`, `FechaModificacion`, `eliminado`) VALUES
(1, '1001', '', 2, 'Acetileno', 0, 4, 3, 0, 7, 'Ruta 7 ', '', '#000000', '#00dd00', 1, '2018-09-19 01:59:15', 'SI'),
(2, '1005', '', 2, 'AmonÃ­aco, anhidro', 3, 1, 0, 0, 4, 'Ruta 7 ', '', '#000000', '#00a653', 1, '2018-09-19 02:08:40', NULL),
(3, '1017', '', 2, 'Cloro', 3, 0, 0, 4, 7, 'Ruta 7 ', '', '#000000', '#00a653', 1, '2018-09-20 19:15:32', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) DEFAULT NULL,
  `mail` varchar(200) DEFAULT NULL,
  `pass` varchar(600) DEFAULT NULL,
  `activo` varchar(2) NOT NULL,
  `cuartelID` int(11) NOT NULL,
  `rol` int(11) NOT NULL COMMENT '0-Usuario Comun- 1 Administrador',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `mail`, `pass`, `activo`, `cuartelID`, `rol`) VALUES
(1, 'Diego Markiewicz', '1', 'MQ==', 'SI', 1, 1),
(4, 'Otro', 'otro@otro.com', 'MQ==', 'SI', 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
