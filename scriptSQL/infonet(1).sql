-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-11-2022 a las 00:33:06
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `infonet`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `id` int(100) NOT NULL,
  `titulo` varchar(140) NOT NULL,
  `subtitulo` varchar(500) NOT NULL,
  `edicion` date NOT NULL,
  `producto` varchar(50) NOT NULL,
  `seccion` int(11) NOT NULL,
  `cuerpo` varchar(5000) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 0,
  `escritor` varchar(50) NOT NULL,
  `imagen` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`id`, `titulo`, `subtitulo`, `edicion`, `producto`, `seccion`, `cuerpo`, `estado`, `escritor`, `imagen`) VALUES
(5, 'Gano alguien', 'comodamente', '2022-11-02', '7', 1, 'qasdasasd', 1, 'escritor@escritor.com', ''),
(6, 'Gano alguien', 'comodamente', '2022-11-02', '6', 2, 'vjgjfgjfhjhjfghujfjgh', 1, 'escritor@escritor.com', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
