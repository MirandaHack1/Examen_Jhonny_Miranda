-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-12-2023 a las 17:05:47
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sexto`
--
CREATE DATABASE IF NOT EXISTS `sexto` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `sexto`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `ID_Producto` int(11) NOT NULL,
  `ID_Provedores` int(11) NOT NULL,
  `Nombre_Producto` varchar(100) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Precio_Unitario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`ID_Producto`, `ID_Provedores`, `Nombre_Producto`, `Cantidad`, `Precio_Unitario`) VALUES
(9, 2, '12', 213, 123),
(10, 4, '12', 213, 123),
(11, 4, '12', 213, 123),
(12, 4, '12', 213, 123),
(13, 4, '12', 0, 123),
(18, 2, '12', 213, 12346),
(23, 2, 'cambio', 213, 1234),
(25, 2, 'cambio', 213, 1234),
(27, 2, '12', 213, 12346),
(28, 2, '12', 213, 123),
(29, 2, 'cambio12', 1, 123),
(31, 2, 'xd', 1, 1),
(32, 2, '12', 1, 1),
(33, 2, '12', 213, 12346),
(34, 2, '1qweq', 12, 0),
(35, 2, '12', 213, 1),
(37, 2, '12', 213, 12),
(38, 2, '12', 0, 12),
(39, 2, '12', 1, 1),
(40, 2, '12', 213, 0),
(41, 2, 'nuevo', 213, 12346),
(42, 2, 'NUEVO123', 0, 0),
(43, 2, 'NUEVOJHONNY', 213, 12),
(44, 2, 'NUEVO3OOO', 0, 0),
(45, 2, 'NUEVOO333333', 0, 26),
(46, 2, '26', 26, 26),
(47, 2, '27', 27, 27),
(48, 2, '29', 29, 29),
(49, 2, '30', 30, 30),
(50, 2, '33', 33, 33),
(52, 2, 'asdsdsdsdsdsdsdsdsdsdsdsd', 213131, 132132);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `ID_Provedores` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Producto_Sumistrado` text NOT NULL,
  `Fecha_Inicio_Contrato` date NOT NULL,
  `Cedula` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`ID_Provedores`, `Nombre`, `Producto_Sumistrado`, `Fecha_Inicio_Contrato`, `Cedula`) VALUES
(2, 'jhonny32', 'Miranda', '0000-00-00', '2300035421'),
(4, 'jhonny', 'Miranda', '2023-12-14', '230003542'),
(7, 'DIEGO1', 'Miranda', '2023-11-29', '0604422139'),
(8, 'Diego Pazmimo', 'Miranda', '2023-12-14', '060442213'),
(9, 'Sexo', 'Miranda', '2023-12-14', '3wretsefe'),
(12, 'jhonny', 'Miranda', '2023-12-13', '132323'),
(13, 'jhonny', 'Miranda', '2023-12-01', 'dergfdfgd'),
(14, 'XDE', 'XD', '2023-12-15', '12344444'),
(16, 'Sexo', 'SEXO', '2023-12-14', '1231235565');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `UsuarioId` int(11) NOT NULL,
  `Cedula` varchar(17) NOT NULL,
  `Nombres` varchar(100) NOT NULL,
  `Apellidos` varchar(100) NOT NULL,
  `Telefono` varchar(17) NOT NULL,
  `Correo` varchar(150) NOT NULL,
  `Contrasenia` text NOT NULL,
  `Rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`UsuarioId`, `Cedula`, `Nombres`, `Apellidos`, `Telefono`, `Correo`, `Contrasenia`, `Rol`) VALUES
(5, '2300035421', 'Jhonny', 'Miranda', '023791167', 'miranda3791167@gmail.com', '123', 'Vendedor'),
(8, '230000354', 'Diego', 'PAADCSA', 'ASDASD', 'Admi@123.coom', '202cb962ac59075b964b07152d234b70', 'Administrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`ID_Producto`),
  ADD KEY `ID_Provedores` (`ID_Provedores`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`ID_Provedores`),
  ADD UNIQUE KEY `Cedula` (`Cedula`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`UsuarioId`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `ID_Producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `ID_Provedores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `UsuarioId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `inventario_ibfk_1` FOREIGN KEY (`ID_Provedores`) REFERENCES `proveedores` (`ID_Provedores`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
