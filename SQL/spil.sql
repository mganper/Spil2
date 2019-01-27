-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-01-2019 a las 13:00:20
-- Versión del servidor: 10.1.29-MariaDB
-- Versión de PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `spil`
--
CREATE DATABASE IF NOT EXISTS `spil` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `spil`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE `configuracion` (
  `idUsuario` varchar(15) NOT NULL,
  `temaOscuro` tinyint(1) NOT NULL,
  `privacidadSpils` tinyint(1) NOT NULL,
  `modoAdulto` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `megusta`
--

CREATE TABLE `megusta` (
  `idMensaje` int(11) NOT NULL,
  `idUsuario` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `idNotificacion` int(11) NOT NULL,
  `idUsuario` varchar(15) NOT NULL,
  `texto` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respil`
--

CREATE TABLE `respil` (
  `idMensaje` int(11) NOT NULL,
  `idUsuario` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguidores`
--

CREATE TABLE `seguidores` (
  `idUsuarioSeguidor` varchar(15) NOT NULL,
  `idUsuarioSeguido` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `spil`
--

CREATE TABLE `spil` (
  `id` int(11) NOT NULL,
  `texto` varchar(420) NOT NULL,
  `idUsuario` varchar(15) NOT NULL,
  `fechaEscritura` date NOT NULL,
  `numEdiciones` int(11) NOT NULL,
  `contenidoAdulto` tinyint(1) NOT NULL,
  `reportado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuario` varchar(15) NOT NULL,
  `contrasenya` varchar(300) NOT NULL,
  `avatar` varchar(50) DEFAULT NULL,
  `esModerador` tinyint(1) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `fechaAlta` date NOT NULL,
  `tokenAcceso` varchar(150) DEFAULT NULL,
  `fechaToken` date DEFAULT NULL,
  `numReportes` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Indices de la tabla `megusta`
--
ALTER TABLE `megusta`
  ADD PRIMARY KEY (`idMensaje`,`idUsuario`),
  ADD KEY `fk_megusta_usuario` (`idUsuario`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`idNotificacion`),
  ADD KEY `fk_notificacoines_usuario` (`idUsuario`);

--
-- Indices de la tabla `respil`
--
ALTER TABLE `respil`
  ADD PRIMARY KEY (`idMensaje`,`idUsuario`),
  ADD KEY `fk_respil_usuario` (`idUsuario`);

--
-- Indices de la tabla `seguidores`
--
ALTER TABLE `seguidores`
  ADD PRIMARY KEY (`idUsuarioSeguidor`,`idUsuarioSeguido`),
  ADD KEY `fk_seguido_usuario` (`idUsuarioSeguido`);

--
-- Indices de la tabla `spil`
--
ALTER TABLE `spil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_spil_usuario` (`idUsuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `idNotificacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `spil`
--
ALTER TABLE `spil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD CONSTRAINT `fk_configuracion_usuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`usuario`);

--
-- Filtros para la tabla `megusta`
--
ALTER TABLE `megusta`
  ADD CONSTRAINT `fk_megusta_spil` FOREIGN KEY (`idMensaje`) REFERENCES `spil` (`id`),
  ADD CONSTRAINT `fk_megusta_usuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`usuario`);

--
-- Filtros para la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD CONSTRAINT `fk_notificacoines_usuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`usuario`);

--
-- Filtros para la tabla `respil`
--
ALTER TABLE `respil`
  ADD CONSTRAINT `fk_respil_spil` FOREIGN KEY (`idMensaje`) REFERENCES `spil` (`id`),
  ADD CONSTRAINT `fk_respil_usuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`usuario`);

--
-- Filtros para la tabla `seguidores`
--
ALTER TABLE `seguidores`
  ADD CONSTRAINT `fk_seguido_usuario` FOREIGN KEY (`idUsuarioSeguido`) REFERENCES `usuario` (`usuario`),
  ADD CONSTRAINT `fk_seguidor_usuario` FOREIGN KEY (`idUsuarioSeguidor`) REFERENCES `usuario` (`usuario`);

--
-- Filtros para la tabla `spil`
--
ALTER TABLE `spil`
  ADD CONSTRAINT `fk_spil_usuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
