-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-10-2022 a las 23:34:30
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
  `fecha` date NOT NULL,
  `empresa` varchar(50) NOT NULL,
  `cuerpo` varchar(5000) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 0,
  `escritor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`id`, `titulo`, `subtitulo`, `fecha`, `empresa`, `cuerpo`, `estado`, `escritor`) VALUES
(2, 'Elon Musk confirmó que formará un consejo de moderación de contenidos en Twitter “con puntos de vista diversos”\r\n', 'Con esta decisión, el también director de Tesla parece referirse a todos aquellos que han visto sus cuentas bloqueadas en los últimos años por violar las políticas de publicación de la red, mayormente por enviar mensajes de odio o escribir insultos', '2022-10-28', 'Infobae', 'El magnate Elon Musk, ya propietario único de Twitter, anunció este viernes que creará un “consejo de moderación de contenidos” en la plataforma, que se caracterizará por incluir “puntos de vista ampliamente diversos”.\r\n\r\nMusk, que ha elegido su propia cuenta de Twitter para comunicar algunas de sus intenciones, señala en su último tuit que “mientras ese consejo no se reúna, no habrá mayores decisiones sobre contenidos ni restablecimientos de cuentas”.\r\n\r\nCon esa última frase, Musk parece referirse a todos aquellos que han visto sus cuentas bloqueadas en los últimos años por violar las políticas de contenido de la red, mayormente por publicar mensajes de odio o escribir insultos en sus cuentas.\r\n\r\nTe puede interesar: Cuánto les pagará Elon Musk como indemnización a los principales ejecutivos de Twitter que despidió\r\nLa cuenta más prominente de las bloqueadas ha sido la del ex presidente estadounidense Donald Trump (2017-2021), expulsado de Twitter y de otras redes sociales como Facebook tras el asalto al Capitolio en enero de 2021, al considerar que había instigado desde su cuenta a sus seguidores para protagonizar aquellos hechos violentos.\r\nHoy mismo, el propio Trump saludó la toma de control de Twitter por parte de Musk al publicar en su red social Truth que se sentía “feliz porque Twitter está ahora en manos (de personas) cuerdas”, pero no aclaró si tenía intención de regresar como usuario a una red de la que llegó a hacer un uso casi compulsivo.\r\n\r\nSegún algunos de los principales medios de prensa de Estados Unidos, la primera medida de Musk tras hacerse con las riendas de la empresa ha sido despedir a algunos de sus máximos directivos, entre ellos el consejero delegado, Parag Agrawal, así como el director financiero, Ned Segal, y la máxima responsable de políticas y asuntos legales, Vijaya Gadde.\r\n\r\nTe puede interesar: Twitter, otra vez en problemas: se hunden sus acciones y EEUU amenaza con investigar a las empresas de Musk por supuesta cercanía a Putin\r\nSin embargo, Musk aún no ha confirmado, ni mediante tuits ni de ningún otro modo, el cese de la plana mayor de Twitter y las condiciones inherentes a esos despidos.\r\n\r\nAntes de cerrar la adquisición, Elon Musk, también  propietario de Tesla y SpaceX, se presentó en la sede de Twitter, el miércoles, con una gran sonrisa y cargando un lavabo de porcelana, una escena que luego publicó en un tuit junto a la frase: “Deja que se hunda”, que también podría interpretarse como “Vayamos asumiéndolo”, haciendo un juego con la palabra “sink”. Musk también cambió su descripción en su perfil de Twitter y ahora aparece como “Jefe Tuitero”.\r\nCuando quedaban poco más de 24 horas para que expirara el plazo que le había dado una jueza para abrir un proceso si no se formalizaba la compra de la red social, Musk confirmó que iba a comprar la empresa “por el futuro de la civilización”.\r\n\r\n“Es importante para el futuro de la civilización tener una plaza digital común donde pueda debatirse de manera sana un amplio espectro de creencias”, escribió en un mensaje a los anunciantes en Twitter, al tiempo que adelantó que la publicidad tendrá un lugar relevante en la red a partir de ahora.\r\n\r\n(Con información de EFE)', 0, 'escritor@escritor.com');

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
(13, 'nsngt7@gmail.com', '202cb962ac59075b964b07152d234b70', 'e754715717ec43df5e9c0fdd90354cc7'),
(14, 'admin@admin.com', '202cb962ac59075b964b07152d234b70', '64e1b8d34f425d19e1ee2ea7236d3028'),
(15, 'lector@lector.com', '202cb962ac59075b964b07152d234b70', '85cde9ed83e14741dc2b89f3a2aa22b6'),
(16, 'escritor@escritor.com', '202cb962ac59075b964b07152d234b70', '4fabc46c2df0f7ef9c776cc2531c184e'),
(17, 'editor@editor', '202cb962ac59075b964b07152d234b70', 'a604122fa62c8f97bd1124eab81edc71'),
(18, 'nsngt47@gmail.com', '202cb962ac59075b964b07152d234b70', '7aeb08011c41ffc7dae36a034828122a');

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
(17, 'editor@editor', 'Editor', 'Editor', '4', 1, NULL),
(18, 'nsngt47@gmail.com', 'Nicolas', 'Tomasin', '2', 1, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
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
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
