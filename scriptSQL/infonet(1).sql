-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-11-2022 a las 04:12:19
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `edicion`
--

CREATE TABLE `edicion` (
  `id` int(11) NOT NULL,
  `precio` double NOT NULL,
  `producto` varchar(100) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `edicion`
--

INSERT INTO `edicion` (`id`, `precio`, `producto`, `fecha`) VALUES
(1, 500, '7', '2022-11-02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_usuario`
--

CREATE TABLE `login_usuario` (
  `id` int(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `authCode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `login_usuario`
--

INSERT INTO `login_usuario` (`id`, `mail`, `password`, `authCode`) VALUES
(14, 'admin@admin.com', '202cb962ac59075b964b07152d234b70', '64e1b8d34f425d19e1ee2ea7236d3028'),
(15, 'lector@lector.com', '202cb962ac59075b964b07152d234b70', '85cde9ed83e14741dc2b89f3a2aa22b6'),
(16, 'escritor@escritor.com', '202cb962ac59075b964b07152d234b70', '4fabc46c2df0f7ef9c776cc2531c184e'),
(17, 'editor@editor', '202cb962ac59075b964b07152d234b70', 'a604122fa62c8f97bd1124eab81edc71');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `logo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `tipo`, `descripcion`, `logo`) VALUES
(5, 'Clarin', '1', 'Clarín es un periódico argentino de tendencia conservadora con sede en la ciudad de Buenos Aires. Fue fundado el 28 de agosto de 1945, por Roberto Noble. La versión digital del periódico Clarin.com es el sexto periódico digital en español más consultado del mundo con 6 948 000 de usuarios únicos en septiembre de 2020', 'https://www.clarin.com/static/CLAClarin/images/Clarin-sahreing-fbk.png'),
(6, 'Ole', '1', 'Olé es un diario argentino de deportes, editado en Buenos Aires desde el 23 de mayo de 1996, por el Grupo Clarín en formato tabloide', 'https://play-lh.googleusercontent.com/OfbdHHNVK5hRhKwthUr3zG4GdjsusEWMuulPCLU9eqT0kOhnOjdRj3Vw2whKWQ1srQ'),
(7, 'La Nacion', '1', 'La Nación es un tradicional periódico argentino de tendencia conservadora con sede en la Ciudad de Buenos Aires. La expresión también es parte del nombre del canal de televisión La Nación + y de la tarjeta Club La Nación', 'https://play-lh.googleusercontent.com/ifqvCKTdx6-o0ocKkUwd4XbXLx_KbmccG2ubMHJCwjdsor0OzZITSWU9qYdfsv1Aq16o'),
(8, 'Miradas', '2', 'Somos una empresa pionera en el mercado peruano en la difusión, promoción y reconocimiento del emprendimiento y el talento de la gastronomía peruana y de profesionales del turismo. Todo este trabajo forma parte de Marca Perú, la estrategia oficial de promoción del Perú en el extranjero, que transmite con eficiencia la propuesta de valor de nuestro país. Nuestra empresa tiene la licencia de Marca Perú desde el 28 de marzo de 2017.', 'https://pbs.twimg.com/profile_images/1283838715073363971/st1g9rp8_400x400.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE `secciones` (
  `id` int(100) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `secciones`
--

INSERT INTO `secciones` (`id`, `nombre`) VALUES
(1, 'Deportes'),
(2, 'Economia'),
(3, 'Interes General'),
(4, 'Moda'),
(5, 'Politica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_producto`
--

CREATE TABLE `tipo_producto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_producto`
--

INSERT INTO `tipo_producto` (`id`, `nombre`) VALUES
(1, 'Diario'),
(2, 'Revista');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `Id` int(11) NOT NULL,
  `Tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`Id`, `Tipo`) VALUES
(1, 'ADMIN'),
(2, 'LECTOR'),
(3, 'ESCRITOR'),
(4, 'EDITOR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `tipo` varchar(10) NOT NULL DEFAULT '2',
  `estado` tinyint(1) NOT NULL DEFAULT 0,
  `telefono` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `mail`, `nombre`, `apellido`, `tipo`, `estado`, `telefono`) VALUES
(14, 'admin@admin.com', 'Admin', 'Admin', '1', 1, NULL),
(15, 'lector@lector.com', 'Lector', 'Lector', '2', 1, NULL),
(16, 'escritor@escritor.com', 'Escritor', 'Escritor', '3', 1, NULL),
(17, 'editor@editor', 'Editor', 'Editor', '4', 1, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `edicion`
--
ALTER TABLE `edicion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `login_usuario`
--
ALTER TABLE `login_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `edicion`
--
ALTER TABLE `edicion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `secciones`
--
ALTER TABLE `secciones`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
