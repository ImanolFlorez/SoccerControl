-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-12-2019 a las 21:16:10
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `soccer_control`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canchas`
--

CREATE DATABASE soccer_control;

USE soccer_control;

CREATE TABLE `canchas` (
  `cancha_id` int(11) NOT NULL,
  `cancha_nombre` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `cancha_ubicacion` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `cancha_tipo` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `cancha_observacion` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `canchas`
--

INSERT INTO `canchas` (`cancha_id`, `cancha_nombre`, `cancha_ubicacion`, `cancha_tipo`, `cancha_observacion`) VALUES
(10, 'La Monumental Baranoa ', 'Calle 23 Nª 15-85', 'Futbol', '9 Jugadores');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `Cl_id` double NOT NULL,
  `cl_nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cl_telefono` double NOT NULL,
  `cl_email` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`Cl_id`, `cl_nombre`, `cl_telefono`, `cl_email`) VALUES
(72019666, 'Emir Perez', 3017065737, 'emirsonido@gmail.com'),
(1045756409, 'Heyder Char', 3004512445, 'heyder@gmail.com'),
(1048221340, 'Samir Perez', 3005453271, 'seperez043@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `rs_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `Cl_id` double DEFAULT NULL,
  `cancha_id` int(11) DEFAULT NULL,
  `rs_fecha_inicio` date DEFAULT NULL,
  `rs_hora_inicio` time DEFAULT NULL,
  `rs_hora_fin` time DEFAULT NULL,
  `rs_valor` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`rs_id`, `user_id`, `Cl_id`, `cancha_id`, `rs_fecha_inicio`, `rs_hora_inicio`, `rs_hora_fin`, `rs_valor`) VALUES
(39, 1, 72019666, 10, '2019-12-07', '06:00:00', '09:00:00', 240000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `user_password` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `user_nivel` int(11) NOT NULL,
  `user_nombrecompleto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `user_telefono` double NOT NULL,
  `user_correo` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`user_id`, `user_name`, `user_password`, `user_nivel`, `user_nombrecompleto`, `user_telefono`, `user_correo`) VALUES
(1, 'Admin_Samir', '0120', 1, 'Samir Perez Hernandez', 3005453271, 'seperez043@gmail.com'),
(14, 'Standar_Wil', '1234', 2, 'Wilian insignares', 3013698521, 'wilianing@gail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valor_canchas`
--

CREATE TABLE `valor_canchas` (
  `vc_id` int(11) NOT NULL,
  `vc_fecha` date NOT NULL,
  `cancha_id` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vc_valor` int(11) NOT NULL,
  `user_id` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `valor_canchas`
--

INSERT INTO `valor_canchas` (`vc_id`, `vc_fecha`, `cancha_id`, `vc_valor`, `user_id`) VALUES
(16, '2019-12-06', 'La Monumental Baranoa  - Futbol', 80000, 'Admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `canchas`
--
ALTER TABLE `canchas`
  ADD PRIMARY KEY (`cancha_id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`Cl_id`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`rs_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `cancha_id` (`cancha_id`),
  ADD KEY `Cl_id` (`Cl_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`user_id`);

--
-- Indices de la tabla `valor_canchas`
--
ALTER TABLE `valor_canchas`
  ADD PRIMARY KEY (`vc_id`),
  ADD KEY `cancha_id` (`cancha_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `canchas`
--
ALTER TABLE `canchas`
  MODIFY `cancha_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `rs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `valor_canchas`
--
ALTER TABLE `valor_canchas`
  MODIFY `vc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
