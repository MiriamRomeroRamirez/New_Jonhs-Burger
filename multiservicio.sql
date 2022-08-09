-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-08-2020 a las 20:51:55
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
-- Base de datos: `multirepuestos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `password` varchar(120) NOT NULL,
  `perfil` varchar(80) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id`, `nombre`, `email`, `foto`, `password`, `perfil`, `estado`, `fecha`) VALUES
(8, 'juan person gomez', 'juan@gmail.com', 'vistas/img/perfiles/622.png', '$2a$07$asxx54ahjppf45sd87a5aucjhN.ZIaphOMG9P.d.DrYOYOjZ7kt2q', 'administrador', 1, '2020-08-25 22:34:59'),
(11, 'miguel Tobias Matos', 'miguel@gmail.com', 'vistas/img/perfiles/979.jpg', '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 'administrador', 1, '2020-08-25 23:34:02'),
(77, 'juangomila', 'juangomila@gmail.com', 'vistas/img/perfiles/709.png', '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 'administrador', 1, '2020-08-26 00:47:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nombre` varchar(120) DEFAULT NULL,
  `apellidos` varchar(120) DEFAULT NULL,
  `documento` int(11) DEFAULT NULL,
  `direccion` varchar(120) NOT NULL,
  `telefono` varchar(11) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `departamento` varchar(60) NOT NULL,
  `estado` int(11) NOT NULL,
  `foto` text NOT NULL,
  `email` varchar(60) NOT NULL,
  `provincia` int(11) NOT NULL,
  `distrito` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `apellidos`, `documento`, `direccion`, `telefono`, `fecha`, `departamento`, `estado`, `foto`, `email`, `provincia`, `distrito`) VALUES
(9, 'norma', 'maldonado perez', 753999393, 'los nogales', '9492394', '2020-08-19 04:24:10', 'huanuco', 1, 'vistas/img/cliente/564.jpg', 'marielos@gmail.com', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `comprobante` varchar(80) NOT NULL,
  `num_doc` int(16) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `id_forma_pago` int(11) NOT NULL,
  `total` float NOT NULL,
  `estado` int(11) NOT NULL,
  `impuesto` float NOT NULL,
  `serie` varchar(11) NOT NULL,
  `moneda` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `fecha`, `comprobante`, `num_doc`, `id_proveedor`, `id_forma_pago`, `total`, `estado`, `impuesto`, `serie`, `moneda`) VALUES
(50, '2020-08-19 04:58:46', 'factura', 83, 0, 0, 2090, 1, 0, 'FR0-', 'PEN'),
(51, '2020-08-23 23:01:19', 'boleta', 8606, 0, 0, 14006, 1, 0, 'FR0-', 'PEN'),
(52, '2020-08-23 23:02:31', 'factura', 900, 0, 0, 28012, 1, 0, 'FR0-', 'PEN'),
(53, '2020-08-23 23:05:00', 'factura', 90, 0, 0, 7003, 1, 0, 'FR0-', 'PEN'),
(54, '2020-08-23 23:36:31', 'factura', 900, 0, 0, 27000, 1, 0, 'FR0-', 'PEN'),
(55, '2020-08-23 23:37:37', 'boleta', 900, 0, 0, 72000, 1, 0, 'FR0-', 'PEN'),
(56, '2020-08-23 23:50:36', 'factura', 999, 0, 0, 18000, 1, 0, 'FR0-', 'PEN'),
(57, '2020-08-24 00:04:13', 'boleta', 9888, 0, 0, 18000, 1, 0, 'FR0-', 'PEN'),
(58, '2020-08-24 00:10:03', 'factura', 900, 0, 0, 900, 1, 0, 'FR0-', 'PEN'),
(59, '2020-08-24 00:22:01', 'factura', 87, 0, 0, 18000, 1, 0, 'FR0-', 'PEN'),
(60, '2020-08-24 00:22:04', 'factura', 87, 0, 0, 18000, 1, 0, 'FR0-', 'PEN'),
(61, '2020-08-24 00:22:05', 'factura', 87, 0, 0, 18000, 1, 0, 'FR0-', 'PEN'),
(62, '2020-08-24 00:24:27', 'factura', 866, 0, 0, 9000, 1, 0, 'FR0-', 'PEN'),
(63, '2020-08-24 00:29:44', 'boleta', 822, 0, 0, 18000, 1, 0, 'FR0-', 'PEN'),
(64, '2020-08-24 00:30:58', 'factura', 98, 0, 0, 9000, 1, 0, 'FR0-', 'PEN'),
(65, '2020-08-25 23:50:11', 'boleta', 339, 0, 0, 19800, 1, 0.6, 'FR0-', 'PEN'),
(66, '2020-08-25 23:50:49', 'ticket', 853, 0, 0, 9000, 1, 0, 'FR0-', 'PEN'),
(67, '2020-08-26 04:38:12', 'ticket', 787, 0, 0, 2700, 1, 0, 'FR0-', 'PEN'),
(68, '2020-08-26 04:39:35', 'factura', 683, 0, 0, 11700, 1, 0, 'FR0-', 'PEN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprobante`
--

CREATE TABLE `comprobante` (
  `id` int(11) NOT NULL,
  `detalles` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comprobante`
--

INSERT INTO `comprobante` (`id`, `detalles`) VALUES
(1, 'boleta'),
(2, 'factura'),
(3, 'ticket');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id` int(11) NOT NULL,
  `nombre` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id`, `nombre`) VALUES
(1, 'huanuco'),
(2, 'lima');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_compras`
--

CREATE TABLE `detalles_compras` (
  `idproductos` int(11) NOT NULL,
  `idcompra` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `subtotal` float DEFAULT NULL,
  `descuento` varchar(45) DEFAULT NULL,
  `titulo` varchar(120) NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalles_compras`
--

INSERT INTO `detalles_compras` (`idproductos`, `idcompra`, `cantidad`, `subtotal`, `descuento`, `titulo`, `precio`) VALUES
(0, 50, 0, 0, NULL, '', 0),
(0, 51, 0, 0, NULL, '', 0),
(0, 52, 0, 0, NULL, '', 0),
(0, 53, 0, 0, NULL, '', 0),
(0, 54, 0, 0, NULL, '', 0),
(0, 55, 0, 0, NULL, '', 0),
(0, 56, 0, 0, NULL, '', 0),
(0, 57, 0, 0, NULL, '', 0),
(0, 58, 0, 0, NULL, '', 0),
(0, 59, 0, 0, NULL, '', 0),
(0, 60, 0, 0, NULL, '', 0),
(0, 61, 0, 0, NULL, '', 0),
(0, 62, 0, 0, NULL, '', 0),
(0, 63, 0, 0, NULL, '', 0),
(0, 64, 0, 0, NULL, '', 0),
(0, 65, 0, 0, NULL, '', 0),
(0, 66, 0, 0, NULL, '', 0),
(0, 67, 0, 0, NULL, '', 0),
(0, 68, 0, 0, NULL, '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_ventas`
--

CREATE TABLE `detalles_ventas` (
  `idproductos` int(11) NOT NULL,
  `idventas` int(11) NOT NULL,
  `cantidad` varchar(45) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `descuento` double DEFAULT NULL,
  `subtotal` float NOT NULL,
  `titulo` varchar(180) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalles_ventas`
--

INSERT INTO `detalles_ventas` (`idproductos`, `idventas`, `cantidad`, `precio`, `descuento`, `subtotal`, `titulo`) VALUES
(0, 37, '', 0, NULL, 0, ''),
(6, 18, '1', NULL, NULL, 890, 'toror'),
(12, 18, '2', 890, NULL, 1200, 'msoo'),
(18, 19, '2', 7003, NULL, 14006, 'norma5666'),
(18, 20, '4', 7003, NULL, 28012, 'norma5666'),
(18, 21, '1', 7003, NULL, 7003, 'norma5666'),
(29, 22, '3', 9000, NULL, 27000, 'norm a90'),
(29, 23, '8', 9000, NULL, 72000, 'norm a90'),
(29, 24, '2', 9000, NULL, 18000, 'norm a90'),
(29, 25, '2', 9000, NULL, 18000, 'norm a90'),
(29, 27, '2', 9000, NULL, 18000, 'norm a90'),
(29, 28, '2', 9000, NULL, 18000, 'norm a90'),
(29, 29, '2', 9000, NULL, 18000, 'norm a90'),
(29, 30, '1', 9000, NULL, 9000, 'norm a90'),
(29, 31, '2', 9000, NULL, 18000, 'norm a90'),
(29, 32, '1', 9000, NULL, 9000, 'norm a90'),
(29, 33, '2', 900, NULL, 18000, 'norm a90'),
(29, 34, '1', 9000, NULL, 9000, 'norm a90'),
(29, 36, '1', 900, NULL, 9000, 'norm a90'),
(29, 38, '1', 9000, NULL, 9000, 'norm a90'),
(30, 26, '1', 900, NULL, 900, 'michell'),
(30, 33, '2', NULL, NULL, 1800, 'michell'),
(30, 36, '2', NULL, NULL, 1800, 'michell'),
(31, 36, '1', NULL, NULL, 900, 'michell'),
(33, 35, '3', 900, NULL, 2700, 'norma');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distrito`
--

CREATE TABLE `distrito` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `id_provincia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `distrito`
--

INSERT INTO `distrito` (`id`, `nombre`, `id_provincia`) VALUES
(1, 'huanuco', 1),
(2, 'pillco marca', 1),
(5, 'valle', 1),
(6, 'amarilis', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `apellidos` varchar(60) NOT NULL,
  `documento` int(11) NOT NULL,
  `direccion` varchar(80) NOT NULL,
  `telefono` int(12) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cargo` varchar(60) NOT NULL,
  `estado` int(11) NOT NULL,
  `email` varchar(80) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id`, `nombre`, `apellidos`, `documento`, `direccion`, `telefono`, `fecha`, `cargo`, `estado`, `email`, `foto`) VALUES
(0, 'leoncio rocio', 'rodriguez tello', 842384328, 'los nogale m5345', 9459943, '2020-08-25 23:48:27', 'tecnico', 1, 'rodri@gmail.com', 'vistas/img/empleado/117.png'),
(0, 'michell', 'san mateo', 432432, 'los nogales', 9492394, '2020-08-25 23:48:27', 'soldador', 1, 'marielos@gmail.com', ''),
(0, 'michell', 'milca', 432432, 'los nogales', 9492394, '2020-08-25 23:48:27', 'tecnico', 1, 'ever1@gmail.com', 'vistas/img/empleado/793.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `razon_social` varchar(80) NOT NULL,
  `emp_codbar` varchar(80) NOT NULL,
  `emp_provincia` varchar(80) NOT NULL,
  `emp_distrito` varchar(80) NOT NULL,
  `emp_departamento` varchar(80) NOT NULL,
  `emp_direccion` varchar(100) NOT NULL,
  `emp_textpdffactura` varchar(80) NOT NULL,
  `nombre_comercial` varchar(80) NOT NULL,
  `emp_ruc` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id`, `nombre`, `razon_social`, `emp_codbar`, `emp_provincia`, `emp_distrito`, `emp_departamento`, `emp_direccion`, `emp_textpdffactura`, `nombre_comercial`, `emp_ruc`) VALUES
(1, 'Multirepuestos industriales F & R', 'Multirepuestos industriales F & R', 'FR3535727727', 'Huanuco', 'Huanuco', 'Huanuco', 'los nogales pedro puelles 345', 'exp gravada', 'Multirepuestos industriales F & R', '65473839393993');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forma_pago`
--

CREATE TABLE `forma_pago` (
  `idforma_pago` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `detalle` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquinas`
--

CREATE TABLE `maquinas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `detalles` varchar(145) NOT NULL,
  `especificaciones` varchar(180) DEFAULT NULL,
  `marca` varchar(60) NOT NULL,
  `amperios` varchar(60) DEFAULT NULL,
  `tamano` varchar(60) NOT NULL,
  `watts` varchar(60) NOT NULL,
  `hp` varchar(60) NOT NULL,
  `imagen` varchar(240) DEFAULT NULL,
  `id_tipomotor` int(11) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `maquinas`
--

INSERT INTO `maquinas` (`id`, `nombre`, `detalles`, `especificaciones`, `marca`, `amperios`, `tamano`, `watts`, `hp`, `imagen`, `id_tipomotor`, `fecha`) VALUES
(32, 'norm a90', 'nomrma 1.6 gaoslina', 'mantroca 60008706\'6', 'onda', '400', '50 cm', '5000', '4', 'vistas/img/maquina/844.jpg', 5, '2020-08-24 01:31:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `otros`
--

CREATE TABLE `otros` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `modelo` varchar(45) DEFAULT NULL,
  `especificaciones` varchar(200) DEFAULT NULL,
  `marca` varchar(45) NOT NULL,
  `imagen` varchar(240) DEFAULT NULL,
  `color` varchar(80) NOT NULL,
  `tamano` varchar(80) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `otros`
--

INSERT INTO `otros` (`id`, `nombre`, `modelo`, `especificaciones`, `marca`, `imagen`, `color`, `tamano`, `fecha`) VALUES
(8, 'michell', 'nsa6', 'mantroca 60008706\'6', 'rocktasr', 'vistas/img/otros/629.jpg', 'azul', '50 cm', '2020-08-24 02:33:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `cantidad` int(3) NOT NULL,
  `precio` double NOT NULL,
  `id_otros` int(11) NOT NULL,
  `id_repuestos` int(11) NOT NULL,
  `id_maquinas` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `clasificacion` varchar(60) NOT NULL,
  `cod_producto` varchar(20) NOT NULL,
  `ventas` int(11) NOT NULL,
  `compras` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `cantidad`, `precio`, `id_otros`, `id_repuestos`, `id_maquinas`, `fecha`, `clasificacion`, `cod_producto`, `ventas`, `compras`, `estado`) VALUES
(29, -1, 9000, 0, 0, 32, '2020-08-26 17:27:29', 'maquinas', '', 6, 0, 1),
(30, 85, 900, 0, 15, 0, '2020-08-26 04:39:35', 'repuestos', '', 4, 0, 1),
(31, 54, 900, 8, 0, 0, '2020-08-26 04:39:35', 'otros', '', 1, 0, 1),
(32, 1, 900, 0, 16, 0, '2020-08-26 04:34:58', 'repuestos', '', 0, 0, 1),
(33, 10, 900, 0, 17, 0, '2020-08-26 04:38:13', 'repuestos', '', 3, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `tienda` varchar(100) NOT NULL,
  `documento` int(11) NOT NULL,
  `direccion_web` varchar(100) NOT NULL,
  `tipo_persona` varchar(100) NOT NULL,
  `telefono` varchar(11) DEFAULT NULL,
  `cod_proveedor` varchar(45) DEFAULT NULL,
  `ruc` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `foto` text NOT NULL,
  `estado` int(11) NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id`, `nombre`, `apellidos`, `tienda`, `documento`, `direccion_web`, `tipo_persona`, `telefono`, `cod_proveedor`, `ruc`, `email`, `foto`, `estado`, `id_departamento`, `fecha`) VALUES
(10, 'nogal sac', 'ronal vensec', 'nogal s.a.c', 8292992, 'nogal sac lima', '', '9492394', 'FR-N1312', 738993993, 'marielos@gmail.com', '', 1, 0, '2020-08-25 23:47:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE `provincia` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `id_departamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`id`, `nombre`, `id_departamento`) VALUES
(1, 'huanuco', 1),
(2, 'ambo', 1),
(3, 'leoncio_prado', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repuestos`
--

CREATE TABLE `repuestos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `detalles` varchar(180) DEFAULT NULL,
  `especificaciones` varchar(180) DEFAULT NULL,
  `marca` text NOT NULL,
  `color` text NOT NULL,
  `imagen` varchar(240) DEFAULT NULL,
  `id_maquinas` int(11) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `repuestos`
--

INSERT INTO `repuestos` (`id`, `nombre`, `detalles`, `especificaciones`, `marca`, `color`, `imagen`, `id_maquinas`, `fecha`) VALUES
(15, 'michell', 'SIMIC MOTOR CS', 'dsadsa', 'rocktasr', 'saA', 'vistas/img/repuesto/594.jpg', 32, '2020-08-24 01:33:35'),
(17, 'norma', 'nomrma 1.6 gaoslina', 'mantroca 60008706\'6', 'rocktasr', 'azul', 'vistas/img/repuesto/180.jpg', 32, '2020-08-26 06:35:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_motor`
--

CREATE TABLE `tipo_motor` (
  `id` int(11) NOT NULL,
  `nombre` text DEFAULT NULL,
  `detalles` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_motor`
--

INSERT INTO `tipo_motor` (`id`, `nombre`, `detalles`) VALUES
(1, 'electrobombas', 'maquinas'),
(2, 'motores asincronos', 'motores'),
(3, 'motores universales', NULL),
(4, 'grupo electrogeno', NULL),
(5, 'motores estaticos', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `fecha` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total` float DEFAULT NULL,
  `comprobante` varchar(45) DEFAULT NULL,
  `detalles` varchar(45) DEFAULT NULL,
  `num_doc` double DEFAULT NULL,
  `id_cliente` int(11) NOT NULL,
  `idforma_pago` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `impuesto` float NOT NULL,
  `serie` varchar(60) NOT NULL,
  `moneda` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `fecha`, `total`, `comprobante`, `detalles`, `num_doc`, `id_cliente`, `idforma_pago`, `estado`, `impuesto`, `serie`, `moneda`) VALUES
(18, '2020-08-19 04:58:46', 2090, 'factura', NULL, 83, 9, 0, 1, 0, 'FR0-', 'PEN'),
(19, '2020-08-23 23:01:19', 14006, 'boleta', NULL, 8606, 9, 0, 1, 0, 'FR0-', 'PEN'),
(20, '2020-08-23 23:02:31', 28012, 'factura', NULL, 900, 9, 0, 1, 0, 'FR0-', 'PEN'),
(21, '2020-08-23 23:05:00', 7003, 'factura', NULL, 90, 9, 0, 1, 0, 'FR0-', 'PEN'),
(22, '2020-08-23 23:36:31', 27000, 'factura', NULL, 900, 9, 0, 1, 0, 'FR0-', 'PEN'),
(23, '2020-08-23 23:37:37', 72000, 'boleta', NULL, 900, 9, 0, 1, 0, 'FR0-', 'PEN'),
(24, '2020-08-23 23:50:36', 18000, 'factura', NULL, 999, 9, 0, 1, 0, 'FR0-', 'PEN'),
(25, '2020-08-24 00:04:13', 18000, 'boleta', NULL, 9888, 9, 0, 1, 0, 'FR0-', 'PEN'),
(26, '2020-08-24 00:10:03', 900, 'factura', NULL, 900, 9, 0, 1, 0, 'FR0-', 'PEN'),
(27, '2020-08-24 00:22:01', 18000, 'factura', NULL, 87, 9, 0, 1, 0, 'FR0-', 'PEN'),
(28, '2020-08-24 00:22:04', 18000, 'factura', NULL, 87, 9, 0, 1, 0, 'FR0-', 'PEN'),
(29, '2020-08-24 00:22:04', 18000, 'factura', NULL, 87, 9, 0, 1, 0, 'FR0-', 'PEN'),
(30, '2020-08-24 00:24:27', 9000, 'factura', NULL, 866, 9, 0, 1, 0, 'FR0-', 'PEN'),
(31, '2020-08-24 00:29:44', 18000, 'boleta', NULL, 822, 9, 0, 1, 0, 'FR0-', 'PEN'),
(32, '2020-08-24 00:30:58', 9000, 'factura', NULL, 98, 9, 0, 1, 0, 'FR0-', 'PEN'),
(33, '2020-08-25 23:50:11', 19800, 'boleta', NULL, 339, 9, 0, 1, 0.6, 'FR0-', 'PEN'),
(34, '2020-08-25 23:50:49', 9000, 'ticket', NULL, 853, 9, 0, 1, 0, 'FR0-', 'PEN'),
(35, '2020-08-26 04:38:13', 2700, 'ticket', NULL, 787, 9, 0, 1, 0, 'FR0-', 'PEN'),
(36, '2020-08-26 04:39:35', 11700, 'factura', NULL, 683, 9, 0, 1, 0, 'FR0-', 'PEN'),
(37, '2020-08-26 04:42:41', 9000, 'factura', NULL, 386, 0, 0, 1, 0, 'FR0-', 'PEN'),
(38, '2020-08-26 17:27:29', 18000, 'ticket', NULL, 57, 9, 0, 1, 0, 'FR0-', 'PEN');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comprobante`
--
ALTER TABLE `comprobante`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalles_compras`
--
ALTER TABLE `detalles_compras`
  ADD PRIMARY KEY (`idproductos`,`idcompra`);

--
-- Indices de la tabla `detalles_ventas`
--
ALTER TABLE `detalles_ventas`
  ADD PRIMARY KEY (`idproductos`,`idventas`);

--
-- Indices de la tabla `distrito`
--
ALTER TABLE `distrito`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `forma_pago`
--
ALTER TABLE `forma_pago`
  ADD PRIMARY KEY (`idforma_pago`);

--
-- Indices de la tabla `maquinas`
--
ALTER TABLE `maquinas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `otros`
--
ALTER TABLE `otros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `repuestos`
--
ALTER TABLE `repuestos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_motor`
--
ALTER TABLE `tipo_motor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de la tabla `comprobante`
--
ALTER TABLE `comprobante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `distrito`
--
ALTER TABLE `distrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `maquinas`
--
ALTER TABLE `maquinas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `otros`
--
ALTER TABLE `otros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `provincia`
--
ALTER TABLE `provincia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `repuestos`
--
ALTER TABLE `repuestos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `tipo_motor`
--
ALTER TABLE `tipo_motor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



/*menuuu*/

insert into Menu Values(1,'Nutella',40,1);
insert into Menu Values(2,'Philadelphia',40,1);
insert into Menu Values(3,'Crema de avellanas',35,1);
insert into menu Values(4,'Cajeta',35,1);
insert into menu Values(5,'Frambuesa',30,1);
insert into menu Values(6,'Fresa',30,1);
insert into menu Values(7,'Manzana',30,1);
insert into menu Values(8,'Piña',30,1);
insert into menu Values(9,'Zarzamora',30,1);
insert into menu Values(10,'Carnes frías',60,2);
insert into menu Values(11,'Hawaiana',55,2);
insert into menu Values(12,'Peperoni',50,2);
insert into menu Values(13,'Salchicha',50,2);
insert into menu Values(14,'Jamón',45,2);
insert into menu Values(15,'Queso manchego',40,2);
insert into menu Values(16,'Malteada fresa',55,3);
insert into menu Values(17,'Malteada oreo',55,3);
insert into menu Values(18,'Malteada mazapan',55,3);
insert into menu Values(19,'Malteada chocolate',50,3);
insert into menu Values(20,'Malteada vainilla',50,3);
insert into menu Values(21,'Helado chocolate',17,3);
insert into menu Values(22,'Helado fresa',17,3);
insert into menu Values(23,'Helado oreo',17,3);
insert into menu Values(24,'Helado vainilla',17,3);
insert into menu Values(25,'Plátano frito',35,3);
insert into menu Values(26,'Kitkat',20,4);
insert into menu Values(27,'Milky way',20,4);
insert into menu Values(28,'M&Ms',20,4);
insert into menu Values(29,'Snickers',20,4);
insert into menu Values(30,'Ferrero y muibon',15,4);
insert into menu Values(31,'Kinder delice',15,4);
insert into menu Values(32,'Nuez',15,4);
insert into menu Values(33,'Fresas',10,4);
insert into menu Values(34,'Lechera',10,4);
insert into menu Values(35,'Oreo',10,4);
insert into menu Values(36,'Philadelphia',10,4);
insert into menu Values(37,'Plátano',10,4);
insert into menu Values(38,'Mazapan',5,4);
insert into menu Values(39,'Carlos V',5,4);
insert into menu Values(40,'Kranky',5,4);
insert into menu Values(41,'Clásica',45,5);
insert into menu Values(42,'Americana(Tocino)',55,5);
insert into menu Values(43,'Hawaiana (quesillo, jamón, piña)',65,5);
insert into menu Values(44,'Pizzaburguer (quesillo, peperonni)',65,5);
insert into menu Values(45,'Clásica doble',65,5);
insert into menu Values(46,'Sencillo',25,6);
insert into menu Values(47,'Americana(Tocino)',35,6);
insert into menu Values(48,'Hawaiana (quesillo, jamón, piña)',40,6);
insert into menu Values(49,'Pizajocho (quessillo, peperonni)',40,6);
insert into menu Values(50,'Refrescos',17,7);
insert into menu Values(51,'Naturales',45,8);
insert into menu Values(52,'Adobadas',45,8);
insert into menu Values(53,'Chipotle',45,8);
insert into menu Values(54,'Jalapeño',45,8);
insert into menu Values(55,'Pimienta limón',45,8);
insert into menu Values(56,'Queso',45,8);
insert into menu Values(57,'Crepa gansito',45,9);
insert into menu Values(58,'Crepa chocorrol',45,9);
insert into menu Values(59,'Crepa Carlos V',65,9);
insert into menu Values(60,'Crepa kranky',65,9);
insert into menu Values(61,'Crepa hersheys',65,9);
insert into menu Values(62,'Crepa mazapan',65,9);
insert into menu Values(63,'Crepa kitkat',65,9);
insert into menu Values(64,'Crepa milky way',65,9);
insert into menu Values(65,'Crepa M&Ms',65,9);
insert into menu Values(66,'Crepa snickers',65,9);
insert into menu Values(67,'Crepa ferrero',65,9);
insert into menu Values(68,'Crepa kinder delice',65,9);
insert into menu Values(69,'Crepa oreo',65,9);