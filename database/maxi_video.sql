-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-02-2020 a las 06:56:06
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `maxi_video`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actores`
--

CREATE TABLE `actores` (
  `codigos_actores` int(11) NOT NULL,
  `nombre_actor` varchar(45) DEFAULT NULL,
  `nacionalidad_actor` varchar(45) DEFAULT NULL,
  `sexo` varchar(45) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `pelicula` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `actores`
--

INSERT INTO `actores` (`codigos_actores`, `nombre_actor`, `nacionalidad_actor`, `sexo`, `tipo`, `pelicula`) VALUES
(1, 'Chris Hemsworth', 'Australia', 'Masculino', 'Principal', 1),
(2, 'Chris Evans', 'Estados Unidos', 'Masculino', 'Principal', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alquiler`
--

CREATE TABLE `alquiler` (
  `cedula_cliente` int(11) NOT NULL,
  `fecha_ini` date NOT NULL,
  `fecha_final` date NOT NULL,
  `nombre_cliente` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `telefono` int(18) NOT NULL,
  `correo` varchar(49) NOT NULL,
  `pelicula_tres` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alquiler`
--

INSERT INTO `alquiler` (`cedula_cliente`, `fecha_ini`, `fecha_final`, `nombre_cliente`, `direccion`, `telefono`, `correo`, `pelicula_tres`) VALUES
(12, '2020-02-26', '2020-02-21', 'Juan dfefe', 'fefe324', 2324242, 'dscdssdc@snxs.com', 1),
(98, '2020-02-26', '2020-02-28', 'Fiestas de cumpleaños', 'bjjibjb', 342, 'dscdssdc@snxs.com', 5),
(987, '2020-02-26', '2020-02-28', 'Juan David eefe2g', 'fefe324', 342, 'valentina@gmail.com', 3),
(1234, '2020-02-26', '2020-02-27', 'Juan', 'fefe324', 2324242, 'dscdssdc@snxs.com', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `director`
--

CREATE TABLE `director` (
  `codigo_director` int(11) NOT NULL,
  `nombre_director` varchar(45) DEFAULT NULL,
  `nacionalidad_director` varchar(45) DEFAULT NULL,
  `pelicula_dos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `director`
--

INSERT INTO `director` (`codigo_director`, `nombre_director`, `nacionalidad_director`, `pelicula_dos`) VALUES
(1, 'Joss Whedon', 'Estados Unidos ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE `pelicula` (
  `codigo_pelicula` int(11) NOT NULL,
  `titulo` varchar(45) DEFAULT NULL,
  `nacionalidad` varchar(45) DEFAULT NULL,
  `productora` varchar(45) DEFAULT NULL,
  `fecha` varchar(11) DEFAULT NULL,
  `imagen` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`codigo_pelicula`, `titulo`, `nacionalidad`, `productora`, `fecha`, `imagen`) VALUES
(1, 'Avengers Endgame', 'Estado Unidos ', 'Marvel Studios ', '24 abril 20', 'Avengers.jpg'),
(3, 'A dos metros de ti ', 'Estados Unidos ', 'CBS Films', '15 marzo 20', 'adosmetrosdeti.jpg'),
(4, 'Malefica dueña del mal ', 'Estados Unidos ', 'Walt Disney Picture ', '17 octubre ', 'malefica-2.jpg'),
(5, 'A dos metros de ti ', 'Estados Unidos ', 'CBS Films', '15 marzo 20', 'adosmetrosdeti.jpg'),
(6, 'Malefica dueña del mal ', 'Estados Unidos ', 'Walt Disney Picture ', '17 octubre ', 'malefica-2.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actores`
--
ALTER TABLE `actores`
  ADD PRIMARY KEY (`codigos_actores`),
  ADD KEY `pelicula_idx` (`pelicula`);

--
-- Indices de la tabla `alquiler`
--
ALTER TABLE `alquiler`
  ADD PRIMARY KEY (`cedula_cliente`),
  ADD KEY `pelicula_tres` (`pelicula_tres`);

--
-- Indices de la tabla `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`codigo_director`),
  ADD KEY `pelicula_dos_idx` (`pelicula_dos`);

--
-- Indices de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD PRIMARY KEY (`codigo_pelicula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actores`
--
ALTER TABLE `actores`
  MODIFY `codigos_actores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `director`
--
ALTER TABLE `director`
  MODIFY `codigo_director` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  MODIFY `codigo_pelicula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actores`
--
ALTER TABLE `actores`
  ADD CONSTRAINT `pelicula` FOREIGN KEY (`pelicula`) REFERENCES `pelicula` (`codigo_pelicula`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `alquiler`
--
ALTER TABLE `alquiler`
  ADD CONSTRAINT `alquiler_ibfk_1` FOREIGN KEY (`pelicula_tres`) REFERENCES `pelicula` (`codigo_pelicula`);

--
-- Filtros para la tabla `director`
--
ALTER TABLE `director`
  ADD CONSTRAINT `pelicula_dos` FOREIGN KEY (`pelicula_dos`) REFERENCES `pelicula` (`codigo_pelicula`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
