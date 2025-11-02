-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-09-2023 a las 00:40:16
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pruebas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `fecha_compra` date NOT NULL,
  `cantidad` int(11) NOT NULL,
  `gasto` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `producto_id`, `fecha_compra`, `cantidad`, `gasto`) VALUES
(2, 63, '2023-09-12', 20, 200.00),
(10, 64, '2023-09-20', 123, 500.00),
(11, 64, '2023-09-01', 120, 1200.00),
(12, 62, '2023-09-28', 20, 1200.00),
(14, 73, '2023-09-08', 12, 1400.00),
(15, 70, '2023-09-23', 230, 2500.00),
(16, 70, '2023-09-05', 12, 50.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `precio` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `marca` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`, `marca`) VALUES
(61, 'gaseosa ', '12', 'coca cola'),
(62, 'Maruchan', '25', 'Suli'),
(63, 'Arroz ', '14', 'Faizan '),
(64, 'Jabon ', '100', 'Protection'),
(70, 'Frilojes ', '25', ''),
(71, 'Shampoo', '150', 'HeadandShoulder'),
(73, 'Caramelo', '5', 'castor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `password`, `nombre`, `apellido`) VALUES
(64, 'aminjose193@gmail.com', '4e2ae7e0ab91cacfadd28ea906d8f6871a6ed18ebe6d382adbf9e16c8e80bf18', 'amin', 'Martinez'),
(75, 'KerenSandino@gmail.com', 'd21f44e9702a5cc4105824a86edbefee3624cc525a7c03926ba33db120986ab7', 'Keren ', 'Martinez'),
(78, 'raulmartinez@gmail.com', 'd558cfc9824cc2e3f6c6529005c0b13c81870baa2deb09769b40a1081a786e53', 'carlos', 'Martinez'),
(81, 'Moisesmartinez@gmail.com', '30a0a8c34d944294f35394475bd1c2805c99b514fecca34733f5659dfcd827a3', 'Miguel', 'Martinez  salgado'),
(82, 'Mariamena@gmail.com', 'dac6feb40019280ef3a3f853d2e65733d68df759b0a6b7d06e9ebd60bc246bff', 'Maria', 'mena '),
(83, 'Juanramirez150@gmail.com', 'c993c6c01f61e0155f6ea41d6089324f2619127b86eb64289a0f9a422ebdf675', 'Joseph', 'Ramirez'),
(84, 'aminjose193@gmail.com', '285ac3d5539dc82c5e490679ce0d56d12ac15b7a8dda6b4952d54da964c62f36', 'Jose maria', 'Amin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `producto_id`, `fecha`, `cantidad`) VALUES
(4, 62, '2023-09-28', 12),
(202, 61, '2023-09-01', 32),
(203, 64, '2023-09-16', 20),
(204, 63, '2023-09-07', 12),
(206, 64, '2023-09-23', 12),
(207, 63, '2023-09-22', 12),
(208, 62, '2023-09-29', 2),
(210, 70, '2023-09-28', 123),
(211, 71, '2023-09-17', 3),
(212, 61, '2023-09-23', 24),
(213, 70, '2023-09-15', 20);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
