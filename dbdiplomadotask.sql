-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-05-2023 a las 03:03:27
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
-- Base de datos: `dbdiplomadotask`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id` int(11) NOT NULL,
  `nombre` varchar(245) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(245) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(245) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(245) COLLATE utf8_unicode_ci NOT NULL,
  `dependencia` varchar(245) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `novedades`
--

CREATE TABLE `novedades` (
  `idnovedades` int(11) NOT NULL,
  `descripcion` varchar(845) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(345) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `novedadesempleados`
--

CREATE TABLE `novedadesempleados` (
  `idempleado` int(11) NOT NULL,
  `idnovedad` int(11) NOT NULL,
  `valor` double NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiene_novedad`
--

CREATE TABLE `tiene_novedad` (
  `idempleado` int(11) NOT NULL,
  `idnovedad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `novedades`
--
ALTER TABLE `novedades`
  ADD PRIMARY KEY (`idnovedades`);

--
-- Indices de la tabla `novedadesempleados`
--
ALTER TABLE `novedadesempleados`
  ADD PRIMARY KEY (`idempleado`,`idnovedad`),
  ADD KEY `fk_empleado_has_novedades_novedades2_idx` (`idnovedad`),
  ADD KEY `fk_empleado_has_novedades_empleado2_idx` (`idempleado`);

--
-- Indices de la tabla `tiene_novedad`
--
ALTER TABLE `tiene_novedad`
  ADD PRIMARY KEY (`idempleado`,`idnovedad`),
  ADD KEY `fk_empleado_has_novedades_novedades1_idx` (`idnovedad`),
  ADD KEY `fk_empleado_has_novedades_empleado1_idx` (`idempleado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `novedades`
--
ALTER TABLE `novedades`
  MODIFY `idnovedades` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `novedadesempleados`
--
ALTER TABLE `novedadesempleados`
  ADD CONSTRAINT `fk_empleado_has_novedades_empleado2` FOREIGN KEY (`idempleado`) REFERENCES `empleado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_empleado_has_novedades_novedades2` FOREIGN KEY (`idnovedad`) REFERENCES `novedades` (`idnovedades`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tiene_novedad`
--
ALTER TABLE `tiene_novedad`
  ADD CONSTRAINT `fk_empleado_has_novedades_empleado1` FOREIGN KEY (`idempleado`) REFERENCES `empleado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_empleado_has_novedades_novedades1` FOREIGN KEY (`idnovedad`) REFERENCES `novedades` (`idnovedades`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
