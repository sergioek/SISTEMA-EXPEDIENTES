-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-01-2021 a las 01:13:35
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
-- Estructura de tabla para la tabla `estados_tramites`
--

CREATE TABLE `estados_tramites` (
  `ID_ESTADO` int(11) NOT NULL,
  `NOMBRE` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `DESCRIPCION` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estados_tramites`
--

INSERT INTO `estados_tramites` (`ID_ESTADO`, `NOMBRE`, `DESCRIPCION`) VALUES
(1, 'INICIO DE TRÁMITE', 'SE INICIA EL EXPEDIENTE'),
(2, 'EN TRÁMITE', 'EL EXPEDIENTE ESTA EN PROCESO DE GESTÍON'),
(3, 'FINALIZADO-PARA ARCHIVAR', 'EL TRÁMITE FINALIZO Y SE LO ARCHIVA ');

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
  `ESTADO` int(2) NOT NULL,
  `CON_PASE_A` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `MOTIVO_PASE` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `ARCHIVO` varchar(50) COLLATE utf8_spanish_ci NOT NULL
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
  `TRAMITE` int(11) NOT NULL,
  `ESTADO` int(2) NOT NULL,
  `FOLIOS` int(3) NOT NULL,
  `DOCUMENTACION` text COLLATE utf8_spanish_ci NOT NULL,
  `ARCHIVO` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
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
  `ROL` int(1) NOT NULL,
  `TELEFONO` bigint(12) NOT NULL,
  `CORREO` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles_operadores`
--

CREATE TABLE `roles_operadores` (
  `ID` int(11) NOT NULL,
  `ROL` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `DESCRIPCION` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles_operadores`
--

INSERT INTO `roles_operadores` (`ID`, `ROL`, `DESCRIPCION`) VALUES
(1, 'ADMINISTRADOR DE ÁREA', 'PUEDE REGISTRAR USUARIOS OPERADORES'),
(2, 'OPERADOR DE ÁREA', 'NO PUEDE REGISTRAR OPERADORES');

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tramites`
--

CREATE TABLE `tramites` (
  `ID` int(11) NOT NULL,
  `FECHA` date NOT NULL,
  `NOMBRE` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `AREA_TRAMITE` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `REQUISITOS` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indices de la tabla `estados_tramites`
--
ALTER TABLE `estados_tramites`
  ADD PRIMARY KEY (`ID_ESTADO`);

--
-- Indices de la tabla `estado_expedientes`
--
ALTER TABLE `estado_expedientes`
  ADD KEY `NUMERO` (`NUMERO_ID`),
  ADD KEY `OPERADOR` (`OPERADOR`),
  ADD KEY `AREA` (`AREA`),
  ADD KEY `CON_PASE_A` (`CON_PASE_A`),
  ADD KEY `ESTADO` (`ESTADO`);

--
-- Indices de la tabla `expedientes`
--
ALTER TABLE `expedientes`
  ADD PRIMARY KEY (`NUMERO`),
  ADD KEY `DNI_SOLICITANTE` (`DNI_SOLICITANTE`),
  ADD KEY `DNI_OPERADOR` (`DNI_OPERADOR`),
  ADD KEY `AREA` (`AREA`),
  ADD KEY `ESTADO` (`ESTADO`),
  ADD KEY `TRAMITE` (`TRAMITE`);

--
-- Indices de la tabla `operadores`
--
ALTER TABLE `operadores`
  ADD PRIMARY KEY (`DNI`),
  ADD KEY `AREA` (`AREA`),
  ADD KEY `ROL` (`ROL`);

--
-- Indices de la tabla `roles_operadores`
--
ALTER TABLE `roles_operadores`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `solicitante`
--
ALTER TABLE `solicitante`
  ADD PRIMARY KEY (`DNI`);

--
-- Indices de la tabla `tramites`
--
ALTER TABLE `tramites`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `NOMBRE` (`NOMBRE`),
  ADD KEY `AREA_TRAMITE` (`AREA_TRAMITE`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `CODIGO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estados_tramites`
--
ALTER TABLE `estados_tramites`
  MODIFY `ID_ESTADO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `roles_operadores`
--
ALTER TABLE `roles_operadores`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tramites`
--
ALTER TABLE `tramites`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `estado_expedientes_ibfk_4` FOREIGN KEY (`CON_PASE_A`) REFERENCES `area` (`NOMBRE`) ON UPDATE CASCADE,
  ADD CONSTRAINT `estado_expedientes_ibfk_5` FOREIGN KEY (`ESTADO`) REFERENCES `estados_tramites` (`ID_ESTADO`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `expedientes`
--
ALTER TABLE `expedientes`
  ADD CONSTRAINT `expedientes_ibfk_1` FOREIGN KEY (`AREA`) REFERENCES `area` (`NOMBRE`) ON UPDATE CASCADE,
  ADD CONSTRAINT `expedientes_ibfk_2` FOREIGN KEY (`DNI_SOLICITANTE`) REFERENCES `solicitante` (`DNI`) ON UPDATE CASCADE,
  ADD CONSTRAINT `expedientes_ibfk_3` FOREIGN KEY (`DNI_OPERADOR`) REFERENCES `operadores` (`DNI`) ON UPDATE CASCADE,
  ADD CONSTRAINT `expedientes_ibfk_4` FOREIGN KEY (`ESTADO`) REFERENCES `estados_tramites` (`ID_ESTADO`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `expedientes_ibfk_5` FOREIGN KEY (`TRAMITE`) REFERENCES `tramites` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `operadores`
--
ALTER TABLE `operadores`
  ADD CONSTRAINT `operadores_ibfk_1` FOREIGN KEY (`AREA`) REFERENCES `area` (`NOMBRE`) ON UPDATE CASCADE,
  ADD CONSTRAINT `operadores_ibfk_2` FOREIGN KEY (`ROL`) REFERENCES `roles_operadores` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tramites`
--
ALTER TABLE `tramites`
  ADD CONSTRAINT `tramites_ibfk_1` FOREIGN KEY (`AREA_TRAMITE`) REFERENCES `area` (`NOMBRE`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
