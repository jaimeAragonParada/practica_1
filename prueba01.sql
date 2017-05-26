-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 05-05-2017 a las 01:40:05
-- Versión del servidor: 5.5.8
-- Versión de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `prueba01`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(10) NOT NULL,
  `direccion` varchar(10) NOT NULL,
  `telefono` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre`, `direccion`, `telefono`) VALUES
(38300, 'Juana  Zar', 'Volcanes', 512777),
(36200, 'Sofia Anto', 'San Martin', 951264898);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE IF NOT EXISTS `empleados` (
  `id_empleado` int(11) NOT NULL,
  `nombre` varchar(10) NOT NULL,
  `sueldo` double NOT NULL,
  `turno` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `nombre`, `sueldo`, `turno`) VALUES
(160017, 'Rosa Marti', 2000, 'Matutino'),
(262082, 'Margarita ', 2500, 'Matutino'),
(28999, 'Sergio Lun', 1900, 'vespertino'),
(28000, 'Lorenzo Me', 3000, 'Vespertino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE IF NOT EXISTS `inventario` (
  `id_inventario` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `articulo` varchar(10) NOT NULL,
  `piezas` int(11) NOT NULL,
  `precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`id_inventario`, `fecha`, `articulo`, `piezas`, `precio`) VALUES
(131, '2017-04-16', 'Descosedor', 300, 3.99),
(130, '2017-04-10', 'MaquinaSin', 10, 9956);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `id_producto` int(11) NOT NULL,
  `Articulo` text NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` double NOT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `Articulo`, `cantidad`, `precio`) VALUES
(1, 'chaquira', 200, 4.99),
(2, 'pom', 30, 19.99),
(3, 'boton', 50, 6.99),
(4, 'limpiapipas', 60, 19.99),
(5, 'conoHilo', 17, 60),
(6, 'Tijera_Escolar', 24, 7.99),
(7, 'tijerasart\r\n', 24, 89.99),
(8, 'carretes_plasticos', 400, 9.99);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE IF NOT EXISTS `proveedores` (
  `id_proveedores` int(11) NOT NULL,
  `nombre` varchar(10) NOT NULL,
  `productos` varchar(10) NOT NULL,
  `Lugar` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedores`, `nombre`, `productos`, `Lugar`) VALUES
(1, 'EverShar', 'Tijeras', 'China'),
(2, 'Seralon', 'Hilos', 'Mexico');
