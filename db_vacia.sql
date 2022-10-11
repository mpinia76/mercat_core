-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generaciÛn: 11-10-2022 a las 09:42:32
-- VersiÛn del servidor: 5.7.40
-- VersiÛn de PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `marcospi_mercat`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mercat_actualizacion`
--

CREATE TABLE `mercat_actualizacion` (
  `oid` int(11) NOT NULL,
  `cliente_oid` int(11) DEFAULT NULL,
  `user_oid` int(11) DEFAULT NULL,
  `fechaHora` datetime NOT NULL,
  `monto` double NOT NULL,
  `observaciones` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `mercat_actualizacion`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mercat_anulacion`
--

CREATE TABLE `mercat_anulacion` (
  `oid` int(11) NOT NULL,
  `user_oid` int(11) DEFAULT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mercat_banco`
--

CREATE TABLE `mercat_banco` (
  `oid` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cbu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `titular` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cuit` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mercat_caja`
--

CREATE TABLE `mercat_caja` (
  `oid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `mercat_caja`
--

INSERT INTO `mercat_caja` (`oid`) VALUES
(1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mercat_cliente`
--

CREATE TABLE `mercat_cliente` (
  `oid` int(11) NOT NULL,
  `localidad_oid` int(11) DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipoDocumento` int(11) DEFAULT NULL,
  `documento` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `cuit` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` int(11) DEFAULT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `celular` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `laboral` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nacimiento` date DEFAULT NULL,
  `fecha` datetime NOT NULL,
  `ultModificacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `observaciones` longtext COLLATE utf8_unicode_ci,
  `cuentaCorriente_oid` int(11) DEFAULT NULL,
  `tipoCliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `mercat_cliente`
--

INSERT INTO `mercat_cliente` (`oid`, `localidad_oid`, `nombre`, `tipoDocumento`, `documento`, `cuit`, `sexo`, `mail`, `telefono`, `celular`, `laboral`, `direccion`, `nacimiento`, `fecha`, `ultModificacion`, `observaciones`, `cuentaCorriente_oid`, `tipoCliente`) VALUES
(1, 0, 'Consumidor Final', 1, '', '', 1, '', '', '', '', '', '0000-00-00', '2019-03-19 18:37:15', '2019-03-19 18:37:15', '', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mercat_combo`
--

CREATE TABLE `mercat_combo` (
  `oid` int(11) NOT NULL,
  `precio` double DEFAULT NULL,
  `fecha` datetime NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `mercat_combo`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mercat_concepto_gasto`
--

CREATE TABLE `mercat_concepto_gasto` (
  `oid` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `mercat_concepto_gasto`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mercat_concepto_movimiento`
--

CREATE TABLE `mercat_concepto_movimiento` (
  `oid` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `mercat_concepto_movimiento`
--

INSERT INTO `mercat_concepto_movimiento` (`oid`, `nombre`) VALUES
(2, 'Gasto'),
(3, 'AnulaciÛn Gasto'),
(4, 'Venta'),
(5, 'AnulaciÛn Venta'),
(6, 'Pago'),
(7, 'DevoluciÛn'),
(8, 'ActualizaciÛn'),
(9, 'ComisiÛn Venta'),
(10, 'AnulaciÛn ComisiÛn Venta'),
(11, 'Pedido'),
(12, 'AnulaciÛn Pedido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mercat_cuenta`
--

CREATE TABLE `mercat_cuenta` (
  `oid` int(11) NOT NULL,
  `numero` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `saldoInicial` double NOT NULL,
  `saldo` double NOT NULL,
  `discr` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `mercat_cuenta`
--

INSERT INTO `mercat_cuenta` (`oid`, `numero`, `fecha`, `saldoInicial`, `saldo`, `discr`) VALUES
(1, '1', '2022-10-11', 0, 0, 'caja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mercat_cuenta_corriente`
--

CREATE TABLE `mercat_cuenta_corriente` (
  `oid` int(11) NOT NULL,
  `cliente_oid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `mercat_cuenta_corriente`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mercat_detalle_pedido`
--

CREATE TABLE `mercat_detalle_pedido` (
  `oid` int(11) NOT NULL,
  `pedido_oid` int(11) DEFAULT NULL,
  `producto_oid` int(11) DEFAULT NULL,
  `precioUnitario` double NOT NULL,
  `descuento` double NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `mercat_detalle_pedido`
--

CREATE TABLE `mercat_detalle_presupuesto` (
  `oid` int(11) NOT NULL,
  `presupuesto_oid` int(11) DEFAULT NULL,
  `producto_oid` int(11) DEFAULT NULL,
  `precioUnitario` double NOT NULL,
  `descuento` double NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

CREATE TABLE `mercat_detalle_venta` (
  `oid` int(11) NOT NULL,
  `venta_oid` int(11) DEFAULT NULL,
  `producto_oid` int(11) DEFAULT NULL,
  `precioUnitario` double NOT NULL,
  `cantidad` int(11) NOT NULL,
  `costo` double NOT NULL,
  `stockActualizado` tinyint(1) NOT NULL,
  `combo_oid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Estructura de tabla para la tabla `mercat_devolucion_venta`
--

CREATE TABLE `mercat_devolucion_venta` (
  `oid` int(11) NOT NULL,
  `venta_oid` int(11) DEFAULT NULL,
  `producto_oid` int(11) DEFAULT NULL,
  `precioUnitario` double NOT NULL,
  `costo` double NOT NULL,
  `stockActualizado` tinyint(1) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `mercat_devolucion_venta`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mercat_gasto`
--

CREATE TABLE `mercat_gasto` (
  `oid` int(11) NOT NULL,
  `user_oid` int(11) DEFAULT NULL,
  `concepto_oid` int(11) DEFAULT NULL,
  `fecha` datetime NOT NULL,
  `fechaVencimiento` datetime DEFAULT NULL,
  `monto` double NOT NULL,
  `estado` int(11) NOT NULL,
  `observaciones` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `mercat_gasto`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mercat_iva`
--

CREATE TABLE `mercat_iva` (
  `oid` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `mercat_iva`
--

INSERT INTO `mercat_iva` (`oid`, `nombre`) VALUES
(1, '10.5'),
(2, '21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mercat_localidad`
--

CREATE TABLE `mercat_localidad` (
  `oid` int(11) NOT NULL,
  `provincia_oid` int(11) DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mercat_marca_producto`
--

CREATE TABLE `mercat_marca_producto` (
  `oid` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `mercat_marca_producto`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mercat_movimiento_caja`
--

CREATE TABLE `mercat_movimiento_caja` (
  `oid` int(11) NOT NULL,
  `cuenta_oid` int(11) DEFAULT NULL,
  `concepto_oid` int(11) DEFAULT NULL,
  `user_oid` int(11) DEFAULT NULL,
  `venta_oid` int(11) DEFAULT NULL,
  `gasto_oid` int(11) DEFAULT NULL,
  `pago_oid` int(11) DEFAULT NULL,
  `fecha` datetime NOT NULL,
  `haber` double NOT NULL,
  `debe` double NOT NULL,
  `saldo` double NOT NULL,
  `observaciones` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `discr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `actualizacion_oid` int(11) DEFAULT NULL,
  `pedido_oid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `mercat_movimiento_caja`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mercat_pack`
--

CREATE TABLE `mercat_pack` (
  `oid` int(11) NOT NULL,
  `producto_oid` int(11) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `codigo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `precioLista` double DEFAULT NULL,
  `precioEfectivo` double DEFAULT NULL,
  `costo` decimal(10,2) DEFAULT NULL,
  `porcentajeGanancia` double DEFAULT NULL,
  `porcentajeGanancia2` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `mercat_pack`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mercat_pago`
--

CREATE TABLE `mercat_pago` (
  `oid` int(11) NOT NULL,
  `cliente_oid` int(11) DEFAULT NULL,
  `user_oid` int(11) DEFAULT NULL,
  `fechaHora` datetime NOT NULL,
  `monto` double NOT NULL,
  `estado` int(11) NOT NULL,
  `observaciones` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `mercat_pago`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mercat_pais`
--

CREATE TABLE `mercat_pais` (
  `oid` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mercat_parametro`
--

CREATE TABLE `mercat_parametro` (
  `oid` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `valor` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mercat_pedido`
--

CREATE TABLE `mercat_pedido` (
  `oid` int(11) NOT NULL,
  `proveedor_oid` int(11) DEFAULT NULL,
  `user_oid` int(11) DEFAULT NULL,
  `fechaHora` datetime NOT NULL,
  `monto` double NOT NULL,
  `montoDebe` double NOT NULL,
  `estado` int(11) NOT NULL,
  `observaciones` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fechaHoraRecibido` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `mercat_pedido`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mercat_presupuesto`
--

CREATE TABLE `mercat_presupuesto` (
  `oid` int(11) NOT NULL,
  `cliente_oid` int(11) DEFAULT NULL,
  `user_oid` int(11) DEFAULT NULL,
  `fecha` datetime NOT NULL,
  `monto` double NOT NULL,
  `estado` int(11) NOT NULL,
  `observaciones` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vendedor_oid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `mercat_presupuesto`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mercat_producto`
--

CREATE TABLE `mercat_producto` (
  `oid` int(11) NOT NULL,
  `iva_oid` int(11) DEFAULT NULL,
  `fecha` datetime NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` longtext COLLATE utf8_unicode_ci,
  `stock` int(11) DEFAULT NULL,
  `stockMinimo` int(11) DEFAULT NULL,
  `precioLista` double DEFAULT NULL,
  `precioEfectivo` double DEFAULT NULL,
  `costo` decimal(10,2) DEFAULT NULL,
  `porcentajeGanancia` double DEFAULT NULL,
  `tipoProducto_oid` int(11) DEFAULT NULL,
  `marcaProducto_oid` int(11) DEFAULT NULL,
  `vencimiento` datetime DEFAULT NULL,
  `codigo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `porcentajeGanancia2` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `mercat_producto`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mercat_producto_combo`
--

CREATE TABLE `mercat_producto_combo` (
  `oid` int(11) NOT NULL,
  `combo_oid` int(11) DEFAULT NULL,
  `producto_oid` int(11) DEFAULT NULL,
  `precioUnitario` double NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `mercat_producto_combo`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mercat_proveedor`
--

CREATE TABLE `mercat_proveedor` (
  `oid` int(11) NOT NULL,
  `localidad_oid` int(11) DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipoDocumento` int(11) DEFAULT NULL,
  `documento` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `razonSocial` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cuit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `condicionIva` int(11) DEFAULT NULL,
  `sexo` int(11) DEFAULT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `celular` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `laboral` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nacimiento` date DEFAULT NULL,
  `fecha` datetime NOT NULL,
  `ultModificacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `observaciones` longtext COLLATE utf8_unicode_ci,
  `cuentaCorriente_oid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `mercat_proveedor`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mercat_provincia`
--

CREATE TABLE `mercat_provincia` (
  `oid` int(11) NOT NULL,
  `pais_oid` int(11) DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mercat_tarjeta`
--

CREATE TABLE `mercat_tarjeta` (
  `oid` int(11) NOT NULL,
  `cliente_oid` int(11) DEFAULT NULL,
  `marca` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nro` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `titular` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `mercat_tarjeta`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mercat_tipo_producto`
--

CREATE TABLE `mercat_tipo_producto` (
  `oid` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `mercat_tipo_producto`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mercat_vendedor`
--

CREATE TABLE `mercat_vendedor` (
  `oid` int(11) NOT NULL,
  `comision` double DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mayorista` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `mercat_vendedor`
--

INSERT INTO `mercat_vendedor` (`oid`, `comision`, `nombre`, `mail`, `telefono`, `direccion`, `mayorista`) VALUES
(1, 0, 'Local', '', '', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mercat_venta`
--

CREATE TABLE `mercat_venta` (
  `oid` int(11) NOT NULL,
  `cliente_oid` int(11) DEFAULT NULL,
  `user_oid` int(11) DEFAULT NULL,
  `fecha` datetime NOT NULL,
  `monto` double NOT NULL,
  `montoPagado` double DEFAULT NULL,
  `montoDebe` double NOT NULL,
  `estado` int(11) NOT NULL,
  `observaciones` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ganancia` double DEFAULT NULL,
  `montoDevolucion` double DEFAULT NULL,
  `montoActualizado` double DEFAULT NULL,
  `vendedor_oid` int(11) DEFAULT NULL,
  `comision` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `mercat_venta`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `security_groups_permissions`
--

CREATE TABLE `security_groups_permissions` (
  `usergroup_oid` int(11) NOT NULL,
  `permission_oid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `security_groups_permissions`
--

INSERT INTO `security_groups_permissions` (`usergroup_oid`, `permission_oid`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `security_new_password_request`
--

CREATE TABLE `security_new_password_request` (
  `oid` int(11) NOT NULL,
  `user_oid` int(11) DEFAULT NULL,
  `validationCode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `expirationDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `security_permission`
--

CREATE TABLE `security_permission` (
  `oid` int(11) NOT NULL,
  `parent_oid` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `security_permission`
--

INSERT INTO `security_permission` (`oid`, `parent_oid`, `name`, `description`) VALUES
(1, NULL, 'Consultar Usuarios', ''),
(2, NULL, 'Consultar Permisos', ''),
(3, NULL, 'Agregar Permiso', ''),
(4, NULL, 'Asignar Permiso', ''),
(5, NULL, 'Asignar Rol', ''),
(6, NULL, 'Consultar roles', ''),
(7, NULL, 'Asignar Rol', ''),
(8, NULL, 'Agregar rol', ''),
(9, NULL, 'Modificar rol', ''),
(10, NULL, 'Eliminar rol', ''),
(11, NULL, 'Modificar permiso', ''),
(12, NULL, 'Eliminar permiso', ''),
(13, NULL, 'Modificar usuario', ''),
(14, NULL, 'Eliminar usuario', ''),
(15, NULL, 'Agregar usuario', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `security_user`
--

CREATE TABLE `security_user` (
  `oid` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastLogin` datetime DEFAULT NULL,
  `loginFrom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logged` tinyint(1) DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `security_user`
--

INSERT INTO `security_user` (`oid`, `username`, `password`, `name`, `email`, `lastLogin`, `loginFrom`, `logged`, `lastname`) VALUES

(3, 'mpinia', 'c0NlbVRBV1duanNjeDUyTUpLWkFQdz09OjowEqRGyopQ6RTKNuQfzRyC', 'Marcos', 'marcos.pinero1976@gamil.com', '2022-05-07 12:08:06', '', 1, 'PiÒero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `security_usergroup`
--

CREATE TABLE `security_usergroup` (
  `oid` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `security_usergroup`
--

INSERT INTO `security_usergroup` (`oid`, `name`, `description`, `level`) VALUES
(1, 'Admin', 'Administrador', 1),
(2, 'VENDEDOR', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `security_users_groups`
--

CREATE TABLE `security_users_groups` (
  `user_oid` int(11) NOT NULL,
  `usergroup_oid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `security_users_groups`
--

INSERT INTO `security_users_groups` (`user_oid`, `usergroup_oid`) VALUES
(1, 1),
(3, 1),
(4, 2);

--
-- √çndices para tablas volcadas
--

--
-- Indices de la tabla `mercat_actualizacion`
--
ALTER TABLE `mercat_actualizacion`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `IDX_5AC48D77354C5A1F` (`cliente_oid`),
  ADD KEY `IDX_5AC48D77A93C412B` (`user_oid`);

--
-- Indices de la tabla `mercat_anulacion`
--
ALTER TABLE `mercat_anulacion`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `IDX_AAC82DDDA93C412B` (`user_oid`);

--
-- Indices de la tabla `mercat_banco`
--
ALTER TABLE `mercat_banco`
  ADD PRIMARY KEY (`oid`);

--
-- Indices de la tabla `mercat_caja`
--
ALTER TABLE `mercat_caja`
  ADD PRIMARY KEY (`oid`);

--
-- Indices de la tabla `mercat_cliente`
--
ALTER TABLE `mercat_cliente`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `IDX_D6B8CF17BDFD03CB` (`localidad_oid`),
  ADD KEY `IDX_D6B8CF176E6F7ED4` (`cuentaCorriente_oid`);

--
-- Indices de la tabla `mercat_combo`
--
ALTER TABLE `mercat_combo`
  ADD PRIMARY KEY (`oid`);

--
-- Indices de la tabla `mercat_concepto_gasto`
--
ALTER TABLE `mercat_concepto_gasto`
  ADD PRIMARY KEY (`oid`);

--
-- Indices de la tabla `mercat_concepto_movimiento`
--
ALTER TABLE `mercat_concepto_movimiento`
  ADD PRIMARY KEY (`oid`);

--
-- Indices de la tabla `mercat_cuenta`
--
ALTER TABLE `mercat_cuenta`
  ADD PRIMARY KEY (`oid`);

--
-- Indices de la tabla `mercat_cuenta_corriente`
--
ALTER TABLE `mercat_cuenta_corriente`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `IDX_1E80F68F354C5A1F` (`cliente_oid`);

--
-- Indices de la tabla `mercat_detalle_pedido`
--
ALTER TABLE `mercat_detalle_pedido`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `IDX_8F4B5510EFBAC5E4` (`pedido_oid`),
  ADD KEY `IDX_8F4B55102388A37D` (`producto_oid`);

--
-- Indices de la tabla `mercat_detalle_presupuesto`
--
ALTER TABLE `mercat_detalle_presupuesto`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `IDX_6BBD8313B9D1443D` (`presupuesto_oid`),
  ADD KEY `IDX_6BBD83132388A37D` (`producto_oid`);

--
-- Indices de la tabla `mercat_detalle_venta`
--
ALTER TABLE `mercat_detalle_venta`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `IDX_2C7077703CD6C0FA` (`venta_oid`),
  ADD KEY `IDX_2C7077702388A37D` (`producto_oid`),
  ADD KEY `IDX_2C70777010169E76` (`combo_oid`);

--
-- Indices de la tabla `mercat_devolucion_venta`
--
ALTER TABLE `mercat_devolucion_venta`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `IDX_6D15B1FC3CD6C0FA` (`venta_oid`),
  ADD KEY `IDX_6D15B1FC2388A37D` (`producto_oid`);

--
-- Indices de la tabla `mercat_gasto`
--
ALTER TABLE `mercat_gasto`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `IDX_509F0BB1A93C412B` (`user_oid`),
  ADD KEY `IDX_509F0BB19C42A432` (`concepto_oid`);

--
-- Indices de la tabla `mercat_iva`
--
ALTER TABLE `mercat_iva`
  ADD PRIMARY KEY (`oid`);

--
-- Indices de la tabla `mercat_localidad`
--
ALTER TABLE `mercat_localidad`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `IDX_CE1E03286FD9876B` (`provincia_oid`);

--
-- Indices de la tabla `mercat_marca_producto`
--
ALTER TABLE `mercat_marca_producto`
  ADD PRIMARY KEY (`oid`);

--
-- Indices de la tabla `mercat_movimiento_caja`
--
ALTER TABLE `mercat_movimiento_caja`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `IDX_CE7EF47C3A083F94` (`cuenta_oid`),
  ADD KEY `IDX_CE7EF47C9C42A432` (`concepto_oid`),
  ADD KEY `IDX_CE7EF47CA93C412B` (`user_oid`),
  ADD KEY `IDX_CE7EF47C3CD6C0FA` (`venta_oid`),
  ADD KEY `IDX_CE7EF47CBA1EDB5D` (`gasto_oid`),
  ADD KEY `IDX_CE7EF47CC4253090` (`pago_oid`),
  ADD KEY `IDX_CE7EF47C1F100B0` (`actualizacion_oid`),
  ADD KEY `IDX_CE7EF47CEFBAC5E4` (`pedido_oid`);

--
-- Indices de la tabla `mercat_pack`
--
ALTER TABLE `mercat_pack`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `IDX_9F148DBB2388A37D` (`producto_oid`);

--
-- Indices de la tabla `mercat_pago`
--
ALTER TABLE `mercat_pago`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `IDX_FC158CA6354C5A1F` (`cliente_oid`),
  ADD KEY `IDX_FC158CA6A93C412B` (`user_oid`);

--
-- Indices de la tabla `mercat_pais`
--
ALTER TABLE `mercat_pais`
  ADD PRIMARY KEY (`oid`);

--
-- Indices de la tabla `mercat_parametro`
--
ALTER TABLE `mercat_parametro`
  ADD PRIMARY KEY (`oid`);

--
-- Indices de la tabla `mercat_pedido`
--
ALTER TABLE `mercat_pedido`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `IDX_62AE9D78E03958E8` (`proveedor_oid`),
  ADD KEY `IDX_62AE9D78A93C412B` (`user_oid`);

--
-- Indices de la tabla `mercat_presupuesto`
--
ALTER TABLE `mercat_presupuesto`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `IDX_35FFE69C354C5A1F` (`cliente_oid`),
  ADD KEY `IDX_35FFE69CA93C412B` (`user_oid`),
  ADD KEY `IDX_35FFE69CECC71225` (`vendedor_oid`);

--
-- Indices de la tabla `mercat_producto`
--
ALTER TABLE `mercat_producto`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `IDX_6F4EF3C15020E483` (`tipoProducto_oid`),
  ADD KEY `IDX_6F4EF3C1F2F26549` (`marcaProducto_oid`),
  ADD KEY `IDX_6F4EF3C1D46E802F` (`iva_oid`);

--
-- Indices de la tabla `mercat_producto_combo`
--
ALTER TABLE `mercat_producto_combo`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `IDX_12ABA96F10169E76` (`combo_oid`),
  ADD KEY `IDX_12ABA96F2388A37D` (`producto_oid`);

--
-- Indices de la tabla `mercat_proveedor`
--
ALTER TABLE `mercat_proveedor`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `IDX_97B68BF6BDFD03CB` (`localidad_oid`),
  ADD KEY `IDX_97B68BF66E6F7ED4` (`cuentaCorriente_oid`);

--
-- Indices de la tabla `mercat_provincia`
--
ALTER TABLE `mercat_provincia`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `IDX_52EC112B5B3F2B63` (`pais_oid`);

--
-- Indices de la tabla `mercat_tarjeta`
--
ALTER TABLE `mercat_tarjeta`
  ADD PRIMARY KEY (`oid`),
  ADD UNIQUE KEY `claveUnica` (`cliente_oid`,`nro`),
  ADD KEY `IDX_8C34E3B4354C5A1F` (`cliente_oid`);

--
-- Indices de la tabla `mercat_tipo_producto`
--
ALTER TABLE `mercat_tipo_producto`
  ADD PRIMARY KEY (`oid`);

--
-- Indices de la tabla `mercat_vendedor`
--
ALTER TABLE `mercat_vendedor`
  ADD PRIMARY KEY (`oid`);

--
-- Indices de la tabla `mercat_venta`
--
ALTER TABLE `mercat_venta`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `IDX_713B3FF0354C5A1F` (`cliente_oid`),
  ADD KEY `IDX_713B3FF0A93C412B` (`user_oid`),
  ADD KEY `IDX_713B3FF0ECC71225` (`vendedor_oid`);

--
-- Indices de la tabla `security_groups_permissions`
--
ALTER TABLE `security_groups_permissions`
  ADD PRIMARY KEY (`usergroup_oid`,`permission_oid`),
  ADD KEY `IDX_D8DD1EC1FF569B9` (`usergroup_oid`),
  ADD KEY `IDX_D8DD1EC152B1BA91` (`permission_oid`);

--
-- Indices de la tabla `security_new_password_request`
--
ALTER TABLE `security_new_password_request`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `IDX_95EB3A4DA93C412B` (`user_oid`);

--
-- Indices de la tabla `security_permission`
--
ALTER TABLE `security_permission`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `IDX_209B40DF798943C5` (`parent_oid`);

--
-- Indices de la tabla `security_user`
--
ALTER TABLE `security_user`
  ADD PRIMARY KEY (`oid`);

--
-- Indices de la tabla `security_usergroup`
--
ALTER TABLE `security_usergroup`
  ADD PRIMARY KEY (`oid`);

--
-- Indices de la tabla `security_users_groups`
--
ALTER TABLE `security_users_groups`
  ADD PRIMARY KEY (`user_oid`,`usergroup_oid`),
  ADD KEY `IDX_C51F4979A93C412B` (`user_oid`),
  ADD KEY `IDX_C51F4979FF569B9` (`usergroup_oid`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `mercat_actualizacion`
--
ALTER TABLE `mercat_actualizacion`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `mercat_anulacion`
--
ALTER TABLE `mercat_anulacion`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mercat_cliente`
--
ALTER TABLE `mercat_cliente`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `mercat_combo`
--
ALTER TABLE `mercat_combo`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `mercat_concepto_gasto`
--
ALTER TABLE `mercat_concepto_gasto`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `mercat_concepto_movimiento`
--
ALTER TABLE `mercat_concepto_movimiento`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `mercat_cuenta`
--
ALTER TABLE `mercat_cuenta`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `mercat_detalle_pedido`
--
ALTER TABLE `mercat_detalle_pedido`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `mercat_detalle_presupuesto`
--
ALTER TABLE `mercat_detalle_presupuesto`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `mercat_detalle_venta`
--
ALTER TABLE `mercat_detalle_venta`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `mercat_devolucion_venta`
--
ALTER TABLE `mercat_devolucion_venta`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `mercat_gasto`
--
ALTER TABLE `mercat_gasto`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `mercat_iva`
--
ALTER TABLE `mercat_iva`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `mercat_localidad`
--
ALTER TABLE `mercat_localidad`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mercat_marca_producto`
--
ALTER TABLE `mercat_marca_producto`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `mercat_movimiento_caja`
--
ALTER TABLE `mercat_movimiento_caja`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `mercat_pack`
--
ALTER TABLE `mercat_pack`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `mercat_pago`
--
ALTER TABLE `mercat_pago`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `mercat_pais`
--
ALTER TABLE `mercat_pais`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mercat_parametro`
--
ALTER TABLE `mercat_parametro`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mercat_pedido`
--
ALTER TABLE `mercat_pedido`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `mercat_presupuesto`
--
ALTER TABLE `mercat_presupuesto`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `mercat_producto`
--
ALTER TABLE `mercat_producto`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `mercat_producto_combo`
--
ALTER TABLE `mercat_producto_combo`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `mercat_proveedor`
--
ALTER TABLE `mercat_proveedor`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `mercat_provincia`
--
ALTER TABLE `mercat_provincia`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mercat_tipo_producto`
--
ALTER TABLE `mercat_tipo_producto`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `mercat_vendedor`
--
ALTER TABLE `mercat_vendedor`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `mercat_venta`
--
ALTER TABLE `mercat_venta`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `security_new_password_request`
--
ALTER TABLE `security_new_password_request`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `security_permission`
--
ALTER TABLE `security_permission`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `security_user`
--
ALTER TABLE `security_user`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `security_usergroup`
--
ALTER TABLE `security_usergroup`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `mercat_actualizacion`
--
ALTER TABLE `mercat_actualizacion`
  ADD CONSTRAINT `FK_5AC48D77354C5A1F` FOREIGN KEY (`cliente_oid`) REFERENCES `mercat_cliente` (`oid`),
  ADD CONSTRAINT `FK_5AC48D77A93C412B` FOREIGN KEY (`user_oid`) REFERENCES `security_user` (`oid`);

--
-- Filtros para la tabla `mercat_anulacion`
--
ALTER TABLE `mercat_anulacion`
  ADD CONSTRAINT `FK_AAC82DDDA93C412B` FOREIGN KEY (`user_oid`) REFERENCES `security_user` (`oid`);

--
-- Filtros para la tabla `mercat_banco`
--
ALTER TABLE `mercat_banco`
  ADD CONSTRAINT `FK_89023074422A20A0` FOREIGN KEY (`oid`) REFERENCES `mercat_cuenta` (`oid`) ON DELETE CASCADE;

--
-- Filtros para la tabla `mercat_caja`
--
ALTER TABLE `mercat_caja`
  ADD CONSTRAINT `FK_ECAF279D422A20A0` FOREIGN KEY (`oid`) REFERENCES `mercat_cuenta` (`oid`) ON DELETE CASCADE;

--
-- Filtros para la tabla `mercat_cliente`
--
ALTER TABLE `mercat_cliente`
  ADD CONSTRAINT `FK_D6B8CF176E6F7ED4` FOREIGN KEY (`cuentaCorriente_oid`) REFERENCES `mercat_cuenta_corriente` (`oid`),
  ADD CONSTRAINT `FK_D6B8CF17BDFD03CB` FOREIGN KEY (`localidad_oid`) REFERENCES `mercat_localidad` (`oid`);

--
-- Filtros para la tabla `mercat_cuenta_corriente`
--
ALTER TABLE `mercat_cuenta_corriente`
  ADD CONSTRAINT `FK_1E80F68F354C5A1F` FOREIGN KEY (`cliente_oid`) REFERENCES `mercat_cliente` (`oid`),
  ADD CONSTRAINT `FK_1E80F68F422A20A0` FOREIGN KEY (`oid`) REFERENCES `mercat_cuenta` (`oid`) ON DELETE CASCADE;

--
-- Filtros para la tabla `mercat_detalle_pedido`
--
ALTER TABLE `mercat_detalle_pedido`
  ADD CONSTRAINT `FK_8F4B55102388A37D` FOREIGN KEY (`producto_oid`) REFERENCES `mercat_producto` (`oid`),
  ADD CONSTRAINT `FK_8F4B5510EFBAC5E4` FOREIGN KEY (`pedido_oid`) REFERENCES `mercat_pedido` (`oid`);

--
-- Filtros para la tabla `mercat_detalle_presupuesto`
--
ALTER TABLE `mercat_detalle_presupuesto`
  ADD CONSTRAINT `FK_6BBD83132388A37D` FOREIGN KEY (`producto_oid`) REFERENCES `mercat_producto` (`oid`),
  ADD CONSTRAINT `FK_6BBD8313B9D1443D` FOREIGN KEY (`presupuesto_oid`) REFERENCES `mercat_presupuesto` (`oid`);

--
-- Filtros para la tabla `mercat_detalle_venta`
--
ALTER TABLE `mercat_detalle_venta`
  ADD CONSTRAINT `FK_2C70777010169E76` FOREIGN KEY (`combo_oid`) REFERENCES `mercat_combo` (`oid`),
  ADD CONSTRAINT `FK_2C7077702388A37D` FOREIGN KEY (`producto_oid`) REFERENCES `mercat_producto` (`oid`),
  ADD CONSTRAINT `FK_2C7077703CD6C0FA` FOREIGN KEY (`venta_oid`) REFERENCES `mercat_venta` (`oid`);

--
-- Filtros para la tabla `mercat_devolucion_venta`
--
ALTER TABLE `mercat_devolucion_venta`
  ADD CONSTRAINT `FK_6D15B1FC2388A37D` FOREIGN KEY (`producto_oid`) REFERENCES `mercat_producto` (`oid`),
  ADD CONSTRAINT `FK_6D15B1FC3CD6C0FA` FOREIGN KEY (`venta_oid`) REFERENCES `mercat_venta` (`oid`);

--
-- Filtros para la tabla `mercat_gasto`
--
ALTER TABLE `mercat_gasto`
  ADD CONSTRAINT `FK_509F0BB19C42A432` FOREIGN KEY (`concepto_oid`) REFERENCES `mercat_concepto_gasto` (`oid`),
  ADD CONSTRAINT `FK_509F0BB1A93C412B` FOREIGN KEY (`user_oid`) REFERENCES `security_user` (`oid`);

--
-- Filtros para la tabla `mercat_localidad`
--
ALTER TABLE `mercat_localidad`
  ADD CONSTRAINT `FK_CE1E03286FD9876B` FOREIGN KEY (`provincia_oid`) REFERENCES `mercat_provincia` (`oid`);

--
-- Filtros para la tabla `mercat_movimiento_caja`
--
ALTER TABLE `mercat_movimiento_caja`
  ADD CONSTRAINT `FK_CE7EF47C1F100B0` FOREIGN KEY (`actualizacion_oid`) REFERENCES `mercat_actualizacion` (`oid`),
  ADD CONSTRAINT `FK_CE7EF47C3A083F94` FOREIGN KEY (`cuenta_oid`) REFERENCES `mercat_cuenta` (`oid`),
  ADD CONSTRAINT `FK_CE7EF47C3CD6C0FA` FOREIGN KEY (`venta_oid`) REFERENCES `mercat_venta` (`oid`),
  ADD CONSTRAINT `FK_CE7EF47C9C42A432` FOREIGN KEY (`concepto_oid`) REFERENCES `mercat_concepto_movimiento` (`oid`),
  ADD CONSTRAINT `FK_CE7EF47CA93C412B` FOREIGN KEY (`user_oid`) REFERENCES `security_user` (`oid`),
  ADD CONSTRAINT `FK_CE7EF47CBA1EDB5D` FOREIGN KEY (`gasto_oid`) REFERENCES `mercat_gasto` (`oid`),
  ADD CONSTRAINT `FK_CE7EF47CC4253090` FOREIGN KEY (`pago_oid`) REFERENCES `mercat_pago` (`oid`),
  ADD CONSTRAINT `FK_CE7EF47CEFBAC5E4` FOREIGN KEY (`pedido_oid`) REFERENCES `mercat_pedido` (`oid`);

--
-- Filtros para la tabla `mercat_pack`
--
ALTER TABLE `mercat_pack`
  ADD CONSTRAINT `FK_9F148DBB2388A37D` FOREIGN KEY (`producto_oid`) REFERENCES `mercat_producto` (`oid`);

--
-- Filtros para la tabla `mercat_pago`
--
ALTER TABLE `mercat_pago`
  ADD CONSTRAINT `FK_FC158CA6354C5A1F` FOREIGN KEY (`cliente_oid`) REFERENCES `mercat_cliente` (`oid`),
  ADD CONSTRAINT `FK_FC158CA6A93C412B` FOREIGN KEY (`user_oid`) REFERENCES `security_user` (`oid`);

--
-- Filtros para la tabla `mercat_pedido`
--
ALTER TABLE `mercat_pedido`
  ADD CONSTRAINT `FK_62AE9D78A93C412B` FOREIGN KEY (`user_oid`) REFERENCES `security_user` (`oid`),
  ADD CONSTRAINT `FK_62AE9D78E03958E8` FOREIGN KEY (`proveedor_oid`) REFERENCES `mercat_proveedor` (`oid`);

--
-- Filtros para la tabla `mercat_presupuesto`
--
ALTER TABLE `mercat_presupuesto`
  ADD CONSTRAINT `FK_35FFE69C354C5A1F` FOREIGN KEY (`cliente_oid`) REFERENCES `mercat_cliente` (`oid`),
  ADD CONSTRAINT `FK_35FFE69CA93C412B` FOREIGN KEY (`user_oid`) REFERENCES `security_user` (`oid`),
  ADD CONSTRAINT `FK_35FFE69CECC71225` FOREIGN KEY (`vendedor_oid`) REFERENCES `mercat_vendedor` (`oid`);

--
-- Filtros para la tabla `mercat_producto`
--
ALTER TABLE `mercat_producto`
  ADD CONSTRAINT `FK_6F4EF3C15020E483` FOREIGN KEY (`tipoProducto_oid`) REFERENCES `mercat_tipo_producto` (`oid`),
  ADD CONSTRAINT `FK_6F4EF3C1D46E802F` FOREIGN KEY (`iva_oid`) REFERENCES `mercat_iva` (`oid`),
  ADD CONSTRAINT `FK_6F4EF3C1F2F26549` FOREIGN KEY (`marcaProducto_oid`) REFERENCES `mercat_marca_producto` (`oid`);

--
-- Filtros para la tabla `mercat_producto_combo`
--
ALTER TABLE `mercat_producto_combo`
  ADD CONSTRAINT `FK_12ABA96F10169E76` FOREIGN KEY (`combo_oid`) REFERENCES `mercat_combo` (`oid`),
  ADD CONSTRAINT `FK_12ABA96F2388A37D` FOREIGN KEY (`producto_oid`) REFERENCES `mercat_producto` (`oid`);

--
-- Filtros para la tabla `mercat_proveedor`
--
ALTER TABLE `mercat_proveedor`
  ADD CONSTRAINT `FK_97B68BF66E6F7ED4` FOREIGN KEY (`cuentaCorriente_oid`) REFERENCES `mercat_cuenta_corriente` (`oid`),
  ADD CONSTRAINT `FK_97B68BF6BDFD03CB` FOREIGN KEY (`localidad_oid`) REFERENCES `mercat_localidad` (`oid`);

--
-- Filtros para la tabla `mercat_provincia`
--
ALTER TABLE `mercat_provincia`
  ADD CONSTRAINT `FK_52EC112B5B3F2B63` FOREIGN KEY (`pais_oid`) REFERENCES `mercat_pais` (`oid`);

--
-- Filtros para la tabla `mercat_tarjeta`
--
ALTER TABLE `mercat_tarjeta`
  ADD CONSTRAINT `FK_8C34E3B4354C5A1F` FOREIGN KEY (`cliente_oid`) REFERENCES `mercat_cliente` (`oid`),
  ADD CONSTRAINT `FK_8C34E3B4422A20A0` FOREIGN KEY (`oid`) REFERENCES `mercat_cuenta` (`oid`) ON DELETE CASCADE;

--
-- Filtros para la tabla `mercat_venta`
--
ALTER TABLE `mercat_venta`
  ADD CONSTRAINT `FK_713B3FF0354C5A1F` FOREIGN KEY (`cliente_oid`) REFERENCES `mercat_cliente` (`oid`),
  ADD CONSTRAINT `FK_713B3FF0A93C412B` FOREIGN KEY (`user_oid`) REFERENCES `security_user` (`oid`),
  ADD CONSTRAINT `FK_713B3FF0ECC71225` FOREIGN KEY (`vendedor_oid`) REFERENCES `mercat_vendedor` (`oid`);

--
-- Filtros para la tabla `security_groups_permissions`
--
ALTER TABLE `security_groups_permissions`
  ADD CONSTRAINT `FK_D8DD1EC152B1BA91` FOREIGN KEY (`permission_oid`) REFERENCES `security_permission` (`oid`),
  ADD CONSTRAINT `FK_D8DD1EC1FF569B9` FOREIGN KEY (`usergroup_oid`) REFERENCES `security_usergroup` (`oid`);

--
-- Filtros para la tabla `security_new_password_request`
--
ALTER TABLE `security_new_password_request`
  ADD CONSTRAINT `FK_95EB3A4DA93C412B` FOREIGN KEY (`user_oid`) REFERENCES `security_user` (`oid`);

--
-- Filtros para la tabla `security_permission`
--
ALTER TABLE `security_permission`
  ADD CONSTRAINT `FK_209B40DF798943C5` FOREIGN KEY (`parent_oid`) REFERENCES `security_permission` (`oid`);

--
-- Filtros para la tabla `security_users_groups`
--
ALTER TABLE `security_users_groups`
  ADD CONSTRAINT `FK_C51F4979A93C412B` FOREIGN KEY (`user_oid`) REFERENCES `security_user` (`oid`),
  ADD CONSTRAINT `FK_C51F4979FF569B9` FOREIGN KEY (`usergroup_oid`) REFERENCES `security_usergroup` (`oid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
