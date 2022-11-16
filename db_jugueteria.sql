-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2022 a las 01:51:10
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_jugueteria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `categoria` varchar(45) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `categoria`) VALUES
(8, 'Deportes'),
(9, 'Disfraces'),
(10, 'Aire Libre '),
(11, 'Licencias'),
(12, 'Muñecos'),
(13, 'Juegos de mesa'),
(18, 'Tecnologia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) CHARACTER SET latin1 NOT NULL,
  `descripcion` varchar(45) CHARACTER SET latin1 NOT NULL,
  `precio` varchar(50) CHARACTER SET latin1 NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `ofertas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `id_categoria`, `ofertas`) VALUES
(17, 'Superman', 'Muñeco Superman ', '9600', 12, 'Especial navidad'),
(18, 'Hamaca', 'Hamaca tabla reforzada', '11000', 10, 'Especial navidad'),
(22, 'Pelota', 'Pelota original del mundial Qatar 2022', '8000', 8, 'Mundial'),
(24, 'Pistola de agua ', 'Pistola de agua extreme  ', '3000', 10, 'Especial verano'),
(25, 'Ajedrez', 'Juego de mesa Ajedrez Magistral ', '5000', 13, 'Estandar'),
(26, 'Juego de la Oca', 'Juego de la Oca con prendas y desafíos', '3500', 13, 'Estandar'),
(27, 'Pelota ', 'Pelota de básquet tamaño y peso oficial ', '4500', 8, 'Estandar'),
(29, 'Disfraz Superman', 'Disfraz super héroe Superman', '6000', 9, 'Especial navidad'),
(30, 'Calesita', 'Calesita 4 asientos juegosol', '2500', 10, 'Especial verano'),
(31, 'Bicicleta', 'Bicicleta rodado 12 Top-Race', '28000', 10, 'Especial navidad'),
(71, 'Pelota', 'Original de Messi', '8500', 8, 'Estandar'),
(72, 'Funko Pop Eleven', 'Eleven \"Stranger Things\" Original', '4500', 11, 'Estandar'),
(73, 'Disfraz Spiderman ', 'Disfraz de spiderman', '5000', 9, 'Estandar'),
(77, 'Titere', 'hipopotamo', '4000', 12, 'Estandar'),
(78, 'Titere', 'Elefante', '4000', 12, 'Estandar'),
(80, 'Titere', 'Jirafa', '4000', 12, 'Estandar'),
(82, 'pelota', 'Voley Super Playa', '8000', 8, 'Especial verano'),
(86, 'pelota', 'Mega Summer', '4500', 8, ''),
(87, 'pelota', 'Mega Summer', '4500', 8, ''),
(88, 'pelota', 'Mega Summer', '4500', 8, ''),
(89, 'pelota', 'Mega Summer', '4500', 8, ''),
(90, 'pelota', 'Mega Summer', '4500', 8, ''),
(91, 'pelota', 'Basquet Liga Oficial', '4500', 8, ''),
(92, 'pelota', 'Caprichito Playera', '5000', 8, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 NOT NULL,
  `password` varchar(250) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `password`) VALUES
(1, 'admin@demo.com', '$2a$12$E6AU2UVLk8Erfd/zsetBjuQzgaPeohon.rUFb944h7.5hl9NzKAoe');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
