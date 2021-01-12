-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-01-2021 a las 02:23:56
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `expedientes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `USUARIO` int(8) NOT NULL,
  `CONTRASEÑA` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`USUARIO`, `CONTRASEÑA`) VALUES
(37313478, '$2y$12$v1sOoRyR.SkqgBgxtuUt7O6cZybxejDd8nqCZnJQH9k6GuFjK6zeW');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `CODIGO` int(11) NOT NULL,
  `NOMBRE` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `DESCRIPCION` text COLLATE utf8_spanish_ci NOT NULL,
  `JEFE` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `TELEFONO` bigint(12) NOT NULL,
  `CORREO` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_expedientes`
--

CREATE TABLE `estado_expedientes` (
  `FECHA` date NOT NULL,
  `FECHA_HORA` datetime NOT NULL,
  `NUMERO_ID` int(11) NOT NULL,
  `AREA` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `OPERADOR` int(12) NOT NULL,
  `MOTIVO` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `FOLIOS` int(3) NOT NULL,
  `ESTADO` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `CON_PASE_A` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `MOTIVO_PASE` varchar(150) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expedientes`
--

CREATE TABLE `expedientes` (
  `NUMERO` int(11) NOT NULL,
  `AÑO` int(4) NOT NULL,
  `FECHA` date NOT NULL,
  `DNI_SOLICITANTE` int(12) NOT NULL,
  `TRAMITE` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ESTADO` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `FOLIOS` int(3) NOT NULL,
  `DOCUMENTACION` text COLLATE utf8_spanish_ci NOT NULL,
  `AREA` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `DNI_OPERADOR` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operadores`
--

CREATE TABLE `operadores` (
  `NOMBRES` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `DNI` int(12) NOT NULL,
  `FECHANACIMIENTO` date NOT NULL,
  `DOMICILIO` text COLLATE utf8_spanish_ci NOT NULL,
  `CONTRASEÑA` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `AREA` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `CARGO` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `ROL` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `TELEFONO` bigint(12) NOT NULL,
  `CORREO` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitante`
--

CREATE TABLE `solicitante` (
  `SOLICITANTE` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `DNI` int(12) NOT NULL,
  `NACIMIENTO` date NOT NULL,
  `DOMICILIO` text COLLATE utf8_spanish_ci NOT NULL,
  `TELEFONO` bigint(12) NOT NULL,
  `CORREO` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`USUARIO`);

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`NOMBRE`),
  ADD KEY `Codigo` (`CODIGO`);

--
-- Indices de la tabla `estado_expedientes`
--
ALTER TABLE `estado_expedientes`
  ADD KEY `NUMERO` (`NUMERO_ID`),
  ADD KEY `OPERADOR` (`OPERADOR`),
  ADD KEY `AREA` (`AREA`),
  ADD KEY `CON_PASE_A` (`CON_PASE_A`);

--
-- Indices de la tabla `expedientes`
--
ALTER TABLE `expedientes`
  ADD PRIMARY KEY (`NUMERO`),
  ADD KEY `DNI_SOLICITANTE` (`DNI_SOLICITANTE`),
  ADD KEY `DNI_OPERADOR` (`DNI_OPERADOR`),
  ADD KEY `AREA` (`AREA`);

--
-- Indices de la tabla `operadores`
--
ALTER TABLE `operadores`
  ADD PRIMARY KEY (`DNI`),
  ADD KEY `AREA` (`AREA`);

--
-- Indices de la tabla `solicitante`
--
ALTER TABLE `solicitante`
  ADD PRIMARY KEY (`DNI`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `CODIGO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `expedientes`
--
ALTER TABLE `expedientes`
  MODIFY `NUMERO` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estado_expedientes`
--
ALTER TABLE `estado_expedientes`
  ADD CONSTRAINT `estado_expedientes_ibfk_1` FOREIGN KEY (`AREA`) REFERENCES `area` (`NOMBRE`) ON UPDATE CASCADE,
  ADD CONSTRAINT `estado_expedientes_ibfk_2` FOREIGN KEY (`OPERADOR`) REFERENCES `operadores` (`DNI`) ON UPDATE CASCADE,
  ADD CONSTRAINT `estado_expedientes_ibfk_3` FOREIGN KEY (`NUMERO_ID`) REFERENCES `expedientes` (`NUMERO`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `estado_expedientes_ibfk_4` FOREIGN KEY (`CON_PASE_A`) REFERENCES `area` (`NOMBRE`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `expedientes`
--
ALTER TABLE `expedientes`
  ADD CONSTRAINT `expedientes_ibfk_1` FOREIGN KEY (`AREA`) REFERENCES `area` (`NOMBRE`) ON UPDATE CASCADE,
  ADD CONSTRAINT `expedientes_ibfk_2` FOREIGN KEY (`DNI_SOLICITANTE`) REFERENCES `solicitante` (`DNI`) ON UPDATE CASCADE,
  ADD CONSTRAINT `expedientes_ibfk_3` FOREIGN KEY (`DNI_OPERADOR`) REFERENCES `operadores` (`DNI`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `operadores`
--
ALTER TABLE `operadores`
  ADD CONSTRAINT `operadores_ibfk_1` FOREIGN KEY (`AREA`) REFERENCES `area` (`NOMBRE`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
