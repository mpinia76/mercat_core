-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.38-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table cose_mercat.mercat_actualizacion
CREATE TABLE IF NOT EXISTS `mercat_actualizacion` (
    `oid` int(11) NOT NULL AUTO_INCREMENT,
    `cliente_oid` int(11) DEFAULT NULL,
    `user_oid` int(11) DEFAULT NULL,
    `fechaHora` datetime NOT NULL,
    `monto` double NOT NULL,
    `observaciones` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`oid`),
    KEY `IDX_6D824DCC354C5A1F` (`cliente_oid`),
    KEY `IDX_6D824DCCA93C412B` (`user_oid`),
    CONSTRAINT `FK_6D824DCC354C5A1F` FOREIGN KEY (`cliente_oid`) REFERENCES `mercat_cliente` (`oid`),
    CONSTRAINT `FK_6D824DCCA93C412B` FOREIGN KEY (`user_oid`) REFERENCES `security_user` (`oid`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cose_mercat.mercat_actualizacion: ~0 rows (approximately)
/*!40000 ALTER TABLE `mercat_actualizacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `mercat_actualizacion` ENABLE KEYS */;

-- Dumping structure for table cose_mercat.mercat_anulacion
CREATE TABLE IF NOT EXISTS `mercat_anulacion` (
    `oid` int(11) NOT NULL AUTO_INCREMENT,
    `user_oid` int(11) DEFAULT NULL,
    `fecha` datetime NOT NULL,
    PRIMARY KEY (`oid`),
    KEY `IDX_6D95B803A93C412B` (`user_oid`),
    CONSTRAINT `FK_6D95B803A93C412B` FOREIGN KEY (`user_oid`) REFERENCES `security_user` (`oid`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cose_mercat.mercat_anulacion: ~0 rows (approximately)
/*!40000 ALTER TABLE `mercat_anulacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `mercat_anulacion` ENABLE KEYS */;

-- Dumping structure for table cose_mercat.mercat_banco
CREATE TABLE IF NOT EXISTS `mercat_banco` (
    `oid` int(11) NOT NULL,
    `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `cbu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `titular` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `cuit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    PRIMARY KEY (`oid`),
    CONSTRAINT `FK_33BB81C4422A20A0` FOREIGN KEY (`oid`) REFERENCES `mercat_cuenta` (`oid`) ON DELETE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cose_mercat.mercat_banco: ~0 rows (approximately)
/*!40000 ALTER TABLE `mercat_banco` DISABLE KEYS */;
/*!40000 ALTER TABLE `mercat_banco` ENABLE KEYS */;

-- Dumping structure for table cose_mercat.mercat_caja
CREATE TABLE IF NOT EXISTS `mercat_caja` (
    `oid` int(11) NOT NULL,
    `cajero_oid` int(11) DEFAULT NULL,
    `horaApertura` time NOT NULL,
    `horaCierre` time DEFAULT NULL,
    PRIMARY KEY (`oid`),
    KEY `IDX_85289269796A37C3` (`cajero_oid`),
    CONSTRAINT `FK_85289269422A20A0` FOREIGN KEY (`oid`) REFERENCES `mercat_cuenta` (`oid`) ON DELETE CASCADE,
    CONSTRAINT `FK_85289269796A37C3` FOREIGN KEY (`cajero_oid`) REFERENCES `mercat_empleado` (`oid`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cose_mercat.mercat_caja: ~0 rows (approximately)
/*!40000 ALTER TABLE `mercat_caja` DISABLE KEYS */;
/*!40000 ALTER TABLE `mercat_caja` ENABLE KEYS */;

-- Dumping structure for table cose_mercat.mercat_caja_chica
CREATE TABLE IF NOT EXISTS `mercat_caja_chica` (
    `oid` int(11) NOT NULL,
    PRIMARY KEY (`oid`),
    CONSTRAINT `FK_593C24AD422A20A0` FOREIGN KEY (`oid`) REFERENCES `mercat_cuenta` (`oid`) ON DELETE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cose_mercat.mercat_caja_chica: ~1 rows (approximately)
/*!40000 ALTER TABLE `mercat_caja_chica` DISABLE KEYS */;
INSERT INTO `mercat_caja_chica` (`oid`) VALUES
    (1);
/*!40000 ALTER TABLE `mercat_caja_chica` ENABLE KEYS */;

-- Dumping structure for table cose_mercat.mercat_cliente
CREATE TABLE IF NOT EXISTS `mercat_cliente` (
    `oid` int(11) NOT NULL AUTO_INCREMENT,
    `cuit` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
    `fecha` datetime NOT NULL,
    `ultModificacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `cuentaCorriente_oid` int(11) DEFAULT NULL,
    PRIMARY KEY (`oid`),
    KEY `IDX_8E1B580C6E6F7ED4` (`cuentaCorriente_oid`),
    CONSTRAINT `FK_8E1B580C422A20A0` FOREIGN KEY (`oid`) REFERENCES `mercat_persona` (`oid`) ON DELETE CASCADE,
    CONSTRAINT `FK_8E1B580C6E6F7ED4` FOREIGN KEY (`cuentaCorriente_oid`) REFERENCES `mercat_cuenta_corriente` (`oid`)
    ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cose_mercat.mercat_cliente: ~1 rows (approximately)
/*!40000 ALTER TABLE `mercat_cliente` DISABLE KEYS */;
INSERT INTO `mercat_cliente` (`oid`, `cuit`, `fecha`, `ultModificacion`, `cuentaCorriente_oid`) VALUES
    (1, '', '2022-10-12 09:56:58', '2022-10-12 09:56:58', NULL);
/*!40000 ALTER TABLE `mercat_cliente` ENABLE KEYS */;

-- Dumping structure for table cose_mercat.mercat_combo
CREATE TABLE IF NOT EXISTS `mercat_combo` (
    `oid` int(11) NOT NULL AUTO_INCREMENT,
    `precio` double DEFAULT NULL,
    `fecha` datetime NOT NULL,
    `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
    PRIMARY KEY (`oid`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cose_mercat.mercat_combo: ~0 rows (approximately)
/*!40000 ALTER TABLE `mercat_combo` DISABLE KEYS */;
/*!40000 ALTER TABLE `mercat_combo` ENABLE KEYS */;

-- Dumping structure for table cose_mercat.mercat_concepto_gasto
CREATE TABLE IF NOT EXISTS `mercat_concepto_gasto` (
    `oid` int(11) NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    PRIMARY KEY (`oid`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cose_mercat.mercat_concepto_gasto: ~0 rows (approximately)
/*!40000 ALTER TABLE `mercat_concepto_gasto` DISABLE KEYS */;
/*!40000 ALTER TABLE `mercat_concepto_gasto` ENABLE KEYS */;

-- Dumping structure for table cose_mercat.mercat_concepto_movimiento
CREATE TABLE IF NOT EXISTS `mercat_concepto_movimiento` (
    `oid` int(11) NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    PRIMARY KEY (`oid`)
    ) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cose_mercat.mercat_concepto_movimiento: ~11 rows (approximately)
/*!40000 ALTER TABLE `mercat_concepto_movimiento` DISABLE KEYS */;
INSERT INTO `mercat_concepto_movimiento` (`oid`, `nombre`) VALUES
                                                               (2, 'Gasto'),
                                                               (3, 'Anulación Gasto'),
                                                               (4, 'Venta'),
                                                               (5, 'Anulación Venta'),
                                                               (6, 'Pago'),
                                                               (7, 'Devolución'),
                                                               (8, 'Actualización'),
                                                               (9, 'Comisión Venta'),
                                                               (10, 'Anulación Comisión Venta'),
                                                               (11, 'Pedido'),
                                                               (12, 'Anulación Pedido');
/*!40000 ALTER TABLE `mercat_concepto_movimiento` ENABLE KEYS */;

-- Dumping structure for table cose_mercat.mercat_cuenta
CREATE TABLE IF NOT EXISTS `mercat_cuenta` (
    `oid` int(11) NOT NULL AUTO_INCREMENT,
    `numero` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `fecha` date NOT NULL,
    `saldoInicial` double NOT NULL,
    `saldo` double NOT NULL,
    `discr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    PRIMARY KEY (`oid`)
    ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cose_mercat.mercat_cuenta: ~1 rows (approximately)
/*!40000 ALTER TABLE `mercat_cuenta` DISABLE KEYS */;
INSERT INTO `mercat_cuenta` (`oid`, `numero`, `fecha`, `saldoInicial`, `saldo`, `discr`) VALUES
    (1, '1', '2022-10-11', 0, 0, 'caja_chica');
/*!40000 ALTER TABLE `mercat_cuenta` ENABLE KEYS */;

-- Dumping structure for table cose_mercat.mercat_cuenta_corriente
CREATE TABLE IF NOT EXISTS `mercat_cuenta_corriente` (
    `oid` int(11) NOT NULL,
    `cliente_oid` int(11) DEFAULT NULL,
    PRIMARY KEY (`oid`),
    KEY `IDX_83CED4A2354C5A1F` (`cliente_oid`),
    CONSTRAINT `FK_83CED4A2354C5A1F` FOREIGN KEY (`cliente_oid`) REFERENCES `mercat_cliente` (`oid`),
    CONSTRAINT `FK_83CED4A2422A20A0` FOREIGN KEY (`oid`) REFERENCES `mercat_cuenta` (`oid`) ON DELETE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cose_mercat.mercat_cuenta_corriente: ~0 rows (approximately)
/*!40000 ALTER TABLE `mercat_cuenta_corriente` DISABLE KEYS */;
/*!40000 ALTER TABLE `mercat_cuenta_corriente` ENABLE KEYS */;

-- Dumping structure for table cose_mercat.mercat_detalle_pedido
CREATE TABLE IF NOT EXISTS `mercat_detalle_pedido` (
    `oid` int(11) NOT NULL AUTO_INCREMENT,
    `pedido_oid` int(11) DEFAULT NULL,
    `producto_oid` int(11) DEFAULT NULL,
    `precioUnitario` double NOT NULL,
    `descuento` double NOT NULL,
    `cantidad` int(11) NOT NULL,
    PRIMARY KEY (`oid`),
    KEY `IDX_D3CF79D4EFBAC5E4` (`pedido_oid`),
    KEY `IDX_D3CF79D42388A37D` (`producto_oid`),
    CONSTRAINT `FK_D3CF79D42388A37D` FOREIGN KEY (`producto_oid`) REFERENCES `mercat_producto` (`oid`),
    CONSTRAINT `FK_D3CF79D4EFBAC5E4` FOREIGN KEY (`pedido_oid`) REFERENCES `mercat_pedido` (`oid`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cose_mercat.mercat_detalle_pedido: ~0 rows (approximately)
/*!40000 ALTER TABLE `mercat_detalle_pedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `mercat_detalle_pedido` ENABLE KEYS */;

-- Dumping structure for table cose_mercat.mercat_detalle_presupuesto
CREATE TABLE IF NOT EXISTS `mercat_detalle_presupuesto` (
    `oid` int(11) NOT NULL AUTO_INCREMENT,
    `presupuesto_oid` int(11) DEFAULT NULL,
    `producto_oid` int(11) DEFAULT NULL,
    `precioUnitario` double NOT NULL,
    `descuento` double NOT NULL,
    `cantidad` int(11) NOT NULL,
    PRIMARY KEY (`oid`),
    KEY `IDX_6DFE7C8AB9D1443D` (`presupuesto_oid`),
    KEY `IDX_6DFE7C8A2388A37D` (`producto_oid`),
    CONSTRAINT `FK_6DFE7C8A2388A37D` FOREIGN KEY (`producto_oid`) REFERENCES `mercat_producto` (`oid`),
    CONSTRAINT `FK_6DFE7C8AB9D1443D` FOREIGN KEY (`presupuesto_oid`) REFERENCES `mercat_presupuesto` (`oid`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cose_mercat.mercat_detalle_presupuesto: ~0 rows (approximately)
/*!40000 ALTER TABLE `mercat_detalle_presupuesto` DISABLE KEYS */;
/*!40000 ALTER TABLE `mercat_detalle_presupuesto` ENABLE KEYS */;

-- Dumping structure for table cose_mercat.mercat_detalle_venta
CREATE TABLE IF NOT EXISTS `mercat_detalle_venta` (
    `oid` int(11) NOT NULL AUTO_INCREMENT,
    `venta_oid` int(11) DEFAULT NULL,
    `producto_oid` int(11) DEFAULT NULL,
    `combo_oid` int(11) DEFAULT NULL,
    `precioUnitario` double NOT NULL,
    `costo` double NOT NULL,
    `cantidad` int(11) NOT NULL,
    `stockActualizado` tinyint(1) NOT NULL,
    PRIMARY KEY (`oid`),
    KEY `IDX_1B36B7CB3CD6C0FA` (`venta_oid`),
    KEY `IDX_1B36B7CB2388A37D` (`producto_oid`),
    KEY `IDX_1B36B7CB10169E76` (`combo_oid`),
    CONSTRAINT `FK_1B36B7CB10169E76` FOREIGN KEY (`combo_oid`) REFERENCES `mercat_combo` (`oid`),
    CONSTRAINT `FK_1B36B7CB2388A37D` FOREIGN KEY (`producto_oid`) REFERENCES `mercat_producto` (`oid`),
    CONSTRAINT `FK_1B36B7CB3CD6C0FA` FOREIGN KEY (`venta_oid`) REFERENCES `mercat_venta` (`oid`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cose_mercat.mercat_detalle_venta: ~0 rows (approximately)
/*!40000 ALTER TABLE `mercat_detalle_venta` DISABLE KEYS */;
/*!40000 ALTER TABLE `mercat_detalle_venta` ENABLE KEYS */;

-- Dumping structure for table cose_mercat.mercat_devolucion_venta
CREATE TABLE IF NOT EXISTS `mercat_devolucion_venta` (
    `oid` int(11) NOT NULL AUTO_INCREMENT,
    `venta_oid` int(11) DEFAULT NULL,
    `producto_oid` int(11) DEFAULT NULL,
    `precioUnitario` double NOT NULL,
    `costo` double NOT NULL,
    `cantidad` int(11) NOT NULL,
    `stockActualizado` tinyint(1) NOT NULL,
    PRIMARY KEY (`oid`),
    KEY `IDX_F05B93D13CD6C0FA` (`venta_oid`),
    KEY `IDX_F05B93D12388A37D` (`producto_oid`),
    CONSTRAINT `FK_F05B93D12388A37D` FOREIGN KEY (`producto_oid`) REFERENCES `mercat_producto` (`oid`),
    CONSTRAINT `FK_F05B93D13CD6C0FA` FOREIGN KEY (`venta_oid`) REFERENCES `mercat_venta` (`oid`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cose_mercat.mercat_devolucion_venta: ~0 rows (approximately)
/*!40000 ALTER TABLE `mercat_devolucion_venta` DISABLE KEYS */;
/*!40000 ALTER TABLE `mercat_devolucion_venta` ENABLE KEYS */;

-- Dumping structure for table cose_mercat.mercat_empleado
CREATE TABLE IF NOT EXISTS `mercat_empleado` (
    `oid` int(11) NOT NULL,
    `user_oid` int(11) DEFAULT NULL,
    `numero` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `cuil` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
    `fecha` datetime NOT NULL,
    `ultModificacion` datetime NOT NULL,
    PRIMARY KEY (`oid`),
    KEY `IDX_9B1120FDA93C412B` (`user_oid`),
    CONSTRAINT `FK_9B1120FD422A20A0` FOREIGN KEY (`oid`) REFERENCES `mercat_persona` (`oid`) ON DELETE CASCADE,
    CONSTRAINT `FK_9B1120FDA93C412B` FOREIGN KEY (`user_oid`) REFERENCES `security_user` (`oid`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cose_mercat.mercat_empleado: ~1 rows (approximately)
/*!40000 ALTER TABLE `mercat_empleado` DISABLE KEYS */;
INSERT INTO `mercat_empleado` (`oid`, `user_oid`, `numero`, `cuil`, `fecha`, `ultModificacion`) VALUES
    (5, NULL, '1', '', '2022-10-12 11:04:04', '2022-10-12 11:04:04');
/*!40000 ALTER TABLE `mercat_empleado` ENABLE KEYS */;

-- Dumping structure for table cose_mercat.mercat_gasto
CREATE TABLE IF NOT EXISTS `mercat_gasto` (
    `oid` int(11) NOT NULL AUTO_INCREMENT,
    `user_oid` int(11) DEFAULT NULL,
    `concepto_oid` int(11) DEFAULT NULL,
    `fecha` datetime NOT NULL,
    `fechaVencimiento` datetime DEFAULT NULL,
    `monto` double NOT NULL,
    `estado` int(11) NOT NULL,
    `observaciones` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`oid`),
    KEY `IDX_EA26BA01A93C412B` (`user_oid`),
    KEY `IDX_EA26BA019C42A432` (`concepto_oid`),
    CONSTRAINT `FK_EA26BA019C42A432` FOREIGN KEY (`concepto_oid`) REFERENCES `mercat_concepto_gasto` (`oid`),
    CONSTRAINT `FK_EA26BA01A93C412B` FOREIGN KEY (`user_oid`) REFERENCES `security_user` (`oid`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cose_mercat.mercat_gasto: ~0 rows (approximately)
/*!40000 ALTER TABLE `mercat_gasto` DISABLE KEYS */;
/*!40000 ALTER TABLE `mercat_gasto` ENABLE KEYS */;

-- Dumping structure for table cose_mercat.mercat_iva
CREATE TABLE IF NOT EXISTS `mercat_iva` (
    `oid` int(11) NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    PRIMARY KEY (`oid`)
    ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cose_mercat.mercat_iva: ~2 rows (approximately)
/*!40000 ALTER TABLE `mercat_iva` DISABLE KEYS */;
INSERT INTO `mercat_iva` (`oid`, `nombre`) VALUES
                                               (1, '10.5'),
                                               (2, '21');
/*!40000 ALTER TABLE `mercat_iva` ENABLE KEYS */;

-- Dumping structure for table cose_mercat.mercat_localidad
CREATE TABLE IF NOT EXISTS `mercat_localidad` (
    `oid` int(11) NOT NULL AUTO_INCREMENT,
    `provincia_oid` int(11) DEFAULT NULL,
    `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    PRIMARY KEY (`oid`),
    KEY `IDX_94396F66FD9876B` (`provincia_oid`),
    CONSTRAINT `FK_94396F66FD9876B` FOREIGN KEY (`provincia_oid`) REFERENCES `mercat_provincia` (`oid`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cose_mercat.mercat_localidad: ~0 rows (approximately)
/*!40000 ALTER TABLE `mercat_localidad` DISABLE KEYS */;
/*!40000 ALTER TABLE `mercat_localidad` ENABLE KEYS */;

-- Dumping structure for table cose_mercat.mercat_marca_producto
CREATE TABLE IF NOT EXISTS `mercat_marca_producto` (
    `oid` int(11) NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    PRIMARY KEY (`oid`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cose_mercat.mercat_marca_producto: ~0 rows (approximately)
/*!40000 ALTER TABLE `mercat_marca_producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `mercat_marca_producto` ENABLE KEYS */;

-- Dumping structure for table cose_mercat.mercat_movimiento_caja
CREATE TABLE IF NOT EXISTS `mercat_movimiento_caja` (
    `oid` int(11) NOT NULL AUTO_INCREMENT,
    `cuenta_oid` int(11) DEFAULT NULL,
    `concepto_oid` int(11) DEFAULT NULL,
    `user_oid` int(11) DEFAULT NULL,
    `venta_oid` int(11) DEFAULT NULL,
    `gasto_oid` int(11) DEFAULT NULL,
    `actualizacion_oid` int(11) DEFAULT NULL,
    `pago_oid` int(11) DEFAULT NULL,
    `pedido_oid` int(11) DEFAULT NULL,
    `fecha` datetime NOT NULL,
    `haber` double NOT NULL,
    `debe` double NOT NULL,
    `saldo` double NOT NULL,
    `observaciones` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
    `discr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    PRIMARY KEY (`oid`),
    KEY `IDX_522B76F93A083F94` (`cuenta_oid`),
    KEY `IDX_522B76F99C42A432` (`concepto_oid`),
    KEY `IDX_522B76F9A93C412B` (`user_oid`),
    KEY `IDX_522B76F93CD6C0FA` (`venta_oid`),
    KEY `IDX_522B76F9BA1EDB5D` (`gasto_oid`),
    KEY `IDX_522B76F91F100B0` (`actualizacion_oid`),
    KEY `IDX_522B76F9C4253090` (`pago_oid`),
    KEY `IDX_522B76F9EFBAC5E4` (`pedido_oid`),
    CONSTRAINT `FK_522B76F91F100B0` FOREIGN KEY (`actualizacion_oid`) REFERENCES `mercat_actualizacion` (`oid`),
    CONSTRAINT `FK_522B76F93A083F94` FOREIGN KEY (`cuenta_oid`) REFERENCES `mercat_cuenta` (`oid`),
    CONSTRAINT `FK_522B76F93CD6C0FA` FOREIGN KEY (`venta_oid`) REFERENCES `mercat_venta` (`oid`),
    CONSTRAINT `FK_522B76F99C42A432` FOREIGN KEY (`concepto_oid`) REFERENCES `mercat_concepto_movimiento` (`oid`),
    CONSTRAINT `FK_522B76F9A93C412B` FOREIGN KEY (`user_oid`) REFERENCES `security_user` (`oid`),
    CONSTRAINT `FK_522B76F9BA1EDB5D` FOREIGN KEY (`gasto_oid`) REFERENCES `mercat_gasto` (`oid`),
    CONSTRAINT `FK_522B76F9C4253090` FOREIGN KEY (`pago_oid`) REFERENCES `mercat_pago` (`oid`),
    CONSTRAINT `FK_522B76F9EFBAC5E4` FOREIGN KEY (`pedido_oid`) REFERENCES `mercat_pedido` (`oid`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cose_mercat.mercat_movimiento_caja: ~0 rows (approximately)
/*!40000 ALTER TABLE `mercat_movimiento_caja` DISABLE KEYS */;
/*!40000 ALTER TABLE `mercat_movimiento_caja` ENABLE KEYS */;

-- Dumping structure for table cose_mercat.mercat_pack
CREATE TABLE IF NOT EXISTS `mercat_pack` (
    `oid` int(11) NOT NULL AUTO_INCREMENT,
    `producto_oid` int(11) DEFAULT NULL,
    `precioLista` double DEFAULT NULL,
    `precioEfectivo` double DEFAULT NULL,
    `costo` decimal(10,2) DEFAULT NULL,
    `porcentajeGanancia` double DEFAULT NULL,
    `porcentajeGanancia2` double DEFAULT NULL,
    `cantidad` int(11) NOT NULL,
    `fecha` datetime NOT NULL,
    `codigo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
    `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
    PRIMARY KEY (`oid`),
    KEY `IDX_F693384F2388A37D` (`producto_oid`),
    CONSTRAINT `FK_F693384F2388A37D` FOREIGN KEY (`producto_oid`) REFERENCES `mercat_producto` (`oid`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cose_mercat.mercat_pack: ~0 rows (approximately)
/*!40000 ALTER TABLE `mercat_pack` DISABLE KEYS */;
/*!40000 ALTER TABLE `mercat_pack` ENABLE KEYS */;

-- Dumping structure for table cose_mercat.mercat_pago
CREATE TABLE IF NOT EXISTS `mercat_pago` (
    `oid` int(11) NOT NULL AUTO_INCREMENT,
    `cliente_oid` int(11) DEFAULT NULL,
    `user_oid` int(11) DEFAULT NULL,
    `fechaHora` datetime NOT NULL,
    `monto` double NOT NULL,
    `estado` int(11) NOT NULL,
    `observaciones` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`oid`),
    KEY `IDX_95923952354C5A1F` (`cliente_oid`),
    KEY `IDX_95923952A93C412B` (`user_oid`),
    CONSTRAINT `FK_95923952354C5A1F` FOREIGN KEY (`cliente_oid`) REFERENCES `mercat_cliente` (`oid`),
    CONSTRAINT `FK_95923952A93C412B` FOREIGN KEY (`user_oid`) REFERENCES `security_user` (`oid`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cose_mercat.mercat_pago: ~0 rows (approximately)
/*!40000 ALTER TABLE `mercat_pago` DISABLE KEYS */;
/*!40000 ALTER TABLE `mercat_pago` ENABLE KEYS */;

-- Dumping structure for table cose_mercat.mercat_pais
CREATE TABLE IF NOT EXISTS `mercat_pais` (
    `oid` int(11) NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    PRIMARY KEY (`oid`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cose_mercat.mercat_pais: ~0 rows (approximately)
/*!40000 ALTER TABLE `mercat_pais` DISABLE KEYS */;
/*!40000 ALTER TABLE `mercat_pais` ENABLE KEYS */;

-- Dumping structure for table cose_mercat.mercat_parametro
CREATE TABLE IF NOT EXISTS `mercat_parametro` (
    `oid` int(11) NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `valor` double DEFAULT NULL,
    PRIMARY KEY (`oid`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cose_mercat.mercat_parametro: ~0 rows (approximately)
/*!40000 ALTER TABLE `mercat_parametro` DISABLE KEYS */;
/*!40000 ALTER TABLE `mercat_parametro` ENABLE KEYS */;

-- Dumping structure for table cose_mercat.mercat_pedido
CREATE TABLE IF NOT EXISTS `mercat_pedido` (
    `oid` int(11) NOT NULL AUTO_INCREMENT,
    `proveedor_oid` int(11) DEFAULT NULL,
    `user_oid` int(11) DEFAULT NULL,
    `fechaHora` datetime NOT NULL,
    `monto` double NOT NULL,
    `montoDebe` double NOT NULL,
    `estado` int(11) NOT NULL,
    `observaciones` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
    `fechaHoraRecibido` datetime DEFAULT NULL,
    PRIMARY KEY (`oid`),
    KEY `IDX_A9759745E03958E8` (`proveedor_oid`),
    KEY `IDX_A9759745A93C412B` (`user_oid`),
    CONSTRAINT `FK_A9759745A93C412B` FOREIGN KEY (`user_oid`) REFERENCES `security_user` (`oid`),
    CONSTRAINT `FK_A9759745E03958E8` FOREIGN KEY (`proveedor_oid`) REFERENCES `mercat_proveedor` (`oid`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cose_mercat.mercat_pedido: ~0 rows (approximately)
/*!40000 ALTER TABLE `mercat_pedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `mercat_pedido` ENABLE KEYS */;

-- Dumping structure for table cose_mercat.mercat_persona
CREATE TABLE IF NOT EXISTS `mercat_persona` (
    `oid` int(11) NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `mail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
    `telefono` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
    `celular` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
    `direccion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
    `observaciones` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
    `documento` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
    `tipoDocumento` int(11) DEFAULT NULL,
    `sexo` int(11) DEFAULT NULL,
    `nacimiento` date DEFAULT NULL,
    `discr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    PRIMARY KEY (`oid`)
    ) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cose_mercat.mercat_persona: ~3 rows (approximately)
/*!40000 ALTER TABLE `mercat_persona` DISABLE KEYS */;
INSERT INTO `mercat_persona` (`oid`, `nombre`, `mail`, `telefono`, `celular`, `direccion`, `observaciones`, `documento`, `tipoDocumento`, `sexo`, `nacimiento`, `discr`) VALUES
                                                                                                                                                                             (1, 'Consumidor final', '', '', '', '', '', '', 1, 0, NULL, 'cliente'),
                                                                                                                                                                             (2, 'Marcos Piñero', '', '', '', '', '', '', NULL, NULL, NULL, 'proveedor'),
                                                                                                                                                                             (5, 'Dueño', '', '', '', '', '', '', 1, 0, NULL, 'empleado');
/*!40000 ALTER TABLE `mercat_persona` ENABLE KEYS */;

-- Dumping structure for table cose_mercat.mercat_presupuesto
CREATE TABLE IF NOT EXISTS `mercat_presupuesto` (
    `oid` int(11) NOT NULL AUTO_INCREMENT,
    `cliente_oid` int(11) DEFAULT NULL,
    `vendedor_oid` int(11) DEFAULT NULL,
    `user_oid` int(11) DEFAULT NULL,
    `fecha` datetime NOT NULL,
    `monto` double NOT NULL,
    `estado` int(11) NOT NULL,
    `observaciones` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`oid`),
    KEY `IDX_AA21AE9B354C5A1F` (`cliente_oid`),
    KEY `IDX_AA21AE9BECC71225` (`vendedor_oid`),
    KEY `IDX_AA21AE9BA93C412B` (`user_oid`),
    CONSTRAINT `FK_AA21AE9B354C5A1F` FOREIGN KEY (`cliente_oid`) REFERENCES `mercat_cliente` (`oid`),
    CONSTRAINT `FK_AA21AE9BA93C412B` FOREIGN KEY (`user_oid`) REFERENCES `security_user` (`oid`),
    CONSTRAINT `FK_AA21AE9BECC71225` FOREIGN KEY (`vendedor_oid`) REFERENCES `mercat_vendedor` (`oid`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cose_mercat.mercat_presupuesto: ~0 rows (approximately)
/*!40000 ALTER TABLE `mercat_presupuesto` DISABLE KEYS */;
/*!40000 ALTER TABLE `mercat_presupuesto` ENABLE KEYS */;

-- Dumping structure for table cose_mercat.mercat_producto
CREATE TABLE IF NOT EXISTS `mercat_producto` (
    `oid` int(11) NOT NULL AUTO_INCREMENT,
    `iva_oid` int(11) DEFAULT NULL,
    `fecha` datetime NOT NULL,
    `codigo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
    `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
    `descripcion` longtext COLLATE utf8_unicode_ci,
    `stock` int(11) DEFAULT NULL,
    `stockMinimo` int(11) DEFAULT NULL,
    `precioLista` double DEFAULT NULL,
    `precioEfectivo` double DEFAULT NULL,
    `costo` decimal(10,2) DEFAULT NULL,
    `porcentajeGanancia` double DEFAULT NULL,
    `porcentajeGanancia2` double DEFAULT NULL,
    `vencimiento` datetime DEFAULT NULL,
    `cantidad` int(11) DEFAULT NULL,
    `tipoProducto_oid` int(11) DEFAULT NULL,
    `marcaProducto_oid` int(11) DEFAULT NULL,
    PRIMARY KEY (`oid`),
    KEY `IDX_E57399BA5020E483` (`tipoProducto_oid`),
    KEY `IDX_E57399BAF2F26549` (`marcaProducto_oid`),
    KEY `IDX_E57399BAD46E802F` (`iva_oid`),
    CONSTRAINT `FK_E57399BA5020E483` FOREIGN KEY (`tipoProducto_oid`) REFERENCES `mercat_tipo_producto` (`oid`),
    CONSTRAINT `FK_E57399BAD46E802F` FOREIGN KEY (`iva_oid`) REFERENCES `mercat_iva` (`oid`),
    CONSTRAINT `FK_E57399BAF2F26549` FOREIGN KEY (`marcaProducto_oid`) REFERENCES `mercat_marca_producto` (`oid`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cose_mercat.mercat_producto: ~0 rows (approximately)
/*!40000 ALTER TABLE `mercat_producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `mercat_producto` ENABLE KEYS */;

-- Dumping structure for table cose_mercat.mercat_producto_combo
CREATE TABLE IF NOT EXISTS `mercat_producto_combo` (
    `oid` int(11) NOT NULL AUTO_INCREMENT,
    `combo_oid` int(11) DEFAULT NULL,
    `producto_oid` int(11) DEFAULT NULL,
    `precioUnitario` double NOT NULL,
    `cantidad` int(11) NOT NULL,
    PRIMARY KEY (`oid`),
    KEY `IDX_8AE0B49D10169E76` (`combo_oid`),
    KEY `IDX_8AE0B49D2388A37D` (`producto_oid`),
    CONSTRAINT `FK_8AE0B49D10169E76` FOREIGN KEY (`combo_oid`) REFERENCES `mercat_combo` (`oid`) ON DELETE CASCADE,
    CONSTRAINT `FK_8AE0B49D2388A37D` FOREIGN KEY (`producto_oid`) REFERENCES `mercat_producto` (`oid`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cose_mercat.mercat_producto_combo: ~0 rows (approximately)
/*!40000 ALTER TABLE `mercat_producto_combo` DISABLE KEYS */;
/*!40000 ALTER TABLE `mercat_producto_combo` ENABLE KEYS */;

-- Dumping structure for table cose_mercat.mercat_proveedor
CREATE TABLE IF NOT EXISTS `mercat_proveedor` (
    `oid` int(11) NOT NULL AUTO_INCREMENT,
    `razonSocial` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
    `cuit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
    `condicionIva` int(11) DEFAULT NULL,
    `fecha` datetime NOT NULL,
    `ultModificacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `cuentaCorriente_oid` int(11) DEFAULT NULL,
    PRIMARY KEY (`oid`),
    KEY `IDX_50EB1E286E6F7ED4` (`cuentaCorriente_oid`),
    CONSTRAINT `FK_50EB1E28422A20A0` FOREIGN KEY (`oid`) REFERENCES `mercat_persona` (`oid`) ON DELETE CASCADE,
    CONSTRAINT `FK_50EB1E286E6F7ED4` FOREIGN KEY (`cuentaCorriente_oid`) REFERENCES `mercat_cuenta_corriente` (`oid`)
    ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cose_mercat.mercat_proveedor: ~1 rows (approximately)
/*!40000 ALTER TABLE `mercat_proveedor` DISABLE KEYS */;
INSERT INTO `mercat_proveedor` (`oid`, `razonSocial`, `cuit`, `condicionIva`, `fecha`, `ultModificacion`, `cuentaCorriente_oid`) VALUES
    (2, 'Piña', '', 1, '2022-10-12 10:04:19', '2022-10-12 10:04:19', NULL);
/*!40000 ALTER TABLE `mercat_proveedor` ENABLE KEYS */;

-- Dumping structure for table cose_mercat.mercat_provincia
CREATE TABLE IF NOT EXISTS `mercat_provincia` (
    `oid` int(11) NOT NULL AUTO_INCREMENT,
    `pais_oid` int(11) DEFAULT NULL,
    `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    PRIMARY KEY (`oid`),
    KEY `IDX_95B184F55B3F2B63` (`pais_oid`),
    CONSTRAINT `FK_95B184F55B3F2B63` FOREIGN KEY (`pais_oid`) REFERENCES `mercat_pais` (`oid`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cose_mercat.mercat_provincia: ~0 rows (approximately)
/*!40000 ALTER TABLE `mercat_provincia` DISABLE KEYS */;
/*!40000 ALTER TABLE `mercat_provincia` ENABLE KEYS */;

-- Dumping structure for table cose_mercat.mercat_tarjeta
CREATE TABLE IF NOT EXISTS `mercat_tarjeta` (
    `oid` int(11) NOT NULL,
    `cliente_oid` int(11) DEFAULT NULL,
    `marca` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `nro` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `titular` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    PRIMARY KEY (`oid`),
    UNIQUE KEY `claveUnica` (`cliente_oid`,`nro`),
    KEY `IDX_D49774AF354C5A1F` (`cliente_oid`),
    CONSTRAINT `FK_D49774AF354C5A1F` FOREIGN KEY (`cliente_oid`) REFERENCES `mercat_cliente` (`oid`),
    CONSTRAINT `FK_D49774AF422A20A0` FOREIGN KEY (`oid`) REFERENCES `mercat_cuenta` (`oid`) ON DELETE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cose_mercat.mercat_tarjeta: ~0 rows (approximately)
/*!40000 ALTER TABLE `mercat_tarjeta` DISABLE KEYS */;
/*!40000 ALTER TABLE `mercat_tarjeta` ENABLE KEYS */;

-- Dumping structure for table cose_mercat.mercat_tipo_producto
CREATE TABLE IF NOT EXISTS `mercat_tipo_producto` (
    `oid` int(11) NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    PRIMARY KEY (`oid`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cose_mercat.mercat_tipo_producto: ~0 rows (approximately)
/*!40000 ALTER TABLE `mercat_tipo_producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `mercat_tipo_producto` ENABLE KEYS */;

-- Dumping structure for table cose_mercat.mercat_vendedor
CREATE TABLE IF NOT EXISTS `mercat_vendedor` (
    `oid` int(11) NOT NULL AUTO_INCREMENT,
    `comision` double DEFAULT NULL,
    `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
    `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `telefono` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
    `direccion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
    `mayorista` tinyint(1) NOT NULL,
    PRIMARY KEY (`oid`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cose_mercat.mercat_vendedor: ~0 rows (approximately)
/*!40000 ALTER TABLE `mercat_vendedor` DISABLE KEYS */;
/*!40000 ALTER TABLE `mercat_vendedor` ENABLE KEYS */;

-- Dumping structure for table cose_mercat.mercat_venta
CREATE TABLE IF NOT EXISTS `mercat_venta` (
    `oid` int(11) NOT NULL AUTO_INCREMENT,
    `cliente_oid` int(11) DEFAULT NULL,
    `vendedor_oid` int(11) DEFAULT NULL,
    `user_oid` int(11) DEFAULT NULL,
    `fecha` datetime NOT NULL,
    `monto` double NOT NULL,
    `montoPagado` double DEFAULT NULL,
    `montoDebe` double NOT NULL,
    `ganancia` double DEFAULT NULL,
    `montoDevolucion` double DEFAULT NULL,
    `montoActualizado` double DEFAULT NULL,
    `estado` int(11) NOT NULL,
    `observaciones` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
    `comision` double DEFAULT NULL,
    PRIMARY KEY (`oid`),
    KEY `IDX_CB828E40354C5A1F` (`cliente_oid`),
    KEY `IDX_CB828E40ECC71225` (`vendedor_oid`),
    KEY `IDX_CB828E40A93C412B` (`user_oid`),
    CONSTRAINT `FK_CB828E40354C5A1F` FOREIGN KEY (`cliente_oid`) REFERENCES `mercat_cliente` (`oid`),
    CONSTRAINT `FK_CB828E40A93C412B` FOREIGN KEY (`user_oid`) REFERENCES `security_user` (`oid`),
    CONSTRAINT `FK_CB828E40ECC71225` FOREIGN KEY (`vendedor_oid`) REFERENCES `mercat_vendedor` (`oid`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cose_mercat.mercat_venta: ~0 rows (approximately)
/*!40000 ALTER TABLE `mercat_venta` DISABLE KEYS */;
/*!40000 ALTER TABLE `mercat_venta` ENABLE KEYS */;

-- Dumping structure for table cose_mercat.security_groups_permissions
CREATE TABLE IF NOT EXISTS `security_groups_permissions` (
    `usergroup_oid` int(11) NOT NULL,
    `permission_oid` int(11) NOT NULL,
    PRIMARY KEY (`usergroup_oid`,`permission_oid`),
    KEY `IDX_D8DD1EC1FF569B9` (`usergroup_oid`),
    KEY `IDX_D8DD1EC152B1BA91` (`permission_oid`),
    CONSTRAINT `FK_D8DD1EC152B1BA91` FOREIGN KEY (`permission_oid`) REFERENCES `security_permission` (`oid`),
    CONSTRAINT `FK_D8DD1EC1FF569B9` FOREIGN KEY (`usergroup_oid`) REFERENCES `security_usergroup` (`oid`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cose_mercat.security_groups_permissions: ~15 rows (approximately)
/*!40000 ALTER TABLE `security_groups_permissions` DISABLE KEYS */;
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
/*!40000 ALTER TABLE `security_groups_permissions` ENABLE KEYS */;

-- Dumping structure for table cose_mercat.security_new_password_request
CREATE TABLE IF NOT EXISTS `security_new_password_request` (
    `oid` int(11) NOT NULL AUTO_INCREMENT,
    `user_oid` int(11) DEFAULT NULL,
    `validationCode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `expirationDate` date NOT NULL,
    PRIMARY KEY (`oid`),
    KEY `IDX_95EB3A4DA93C412B` (`user_oid`),
    CONSTRAINT `FK_95EB3A4DA93C412B` FOREIGN KEY (`user_oid`) REFERENCES `security_user` (`oid`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cose_mercat.security_new_password_request: ~0 rows (approximately)
/*!40000 ALTER TABLE `security_new_password_request` DISABLE KEYS */;
/*!40000 ALTER TABLE `security_new_password_request` ENABLE KEYS */;

-- Dumping structure for table cose_mercat.security_permission
CREATE TABLE IF NOT EXISTS `security_permission` (
    `oid` int(11) NOT NULL AUTO_INCREMENT,
    `parent_oid` int(11) DEFAULT NULL,
    `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`oid`),
    KEY `IDX_209B40DF798943C5` (`parent_oid`),
    CONSTRAINT `FK_209B40DF798943C5` FOREIGN KEY (`parent_oid`) REFERENCES `security_permission` (`oid`)
    ) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cose_mercat.security_permission: ~15 rows (approximately)
/*!40000 ALTER TABLE `security_permission` DISABLE KEYS */;
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
/*!40000 ALTER TABLE `security_permission` ENABLE KEYS */;

-- Dumping structure for table cose_mercat.security_user
CREATE TABLE IF NOT EXISTS `security_user` (
    `oid` int(11) NOT NULL AUTO_INCREMENT,
    `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `lastLogin` datetime DEFAULT NULL,
    `loginFrom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
    `logged` tinyint(1) DEFAULT NULL,
    `lastname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`oid`)
    ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cose_mercat.security_user: ~1 rows (approximately)
/*!40000 ALTER TABLE `security_user` DISABLE KEYS */;
INSERT INTO `security_user` (`oid`, `username`, `password`, `name`, `email`, `lastLogin`, `loginFrom`, `logged`, `lastname`) VALUES
    (3, 'mpinia', 'c0NlbVRBV1duanNjeDUyTUpLWkFQdz09OjowEqRGyopQ6RTKNuQfzRyC', 'Marcos', 'marcos.pinero1976@gamil.com', '2022-10-12 09:32:52', '', 1, 'Piñero');
/*!40000 ALTER TABLE `security_user` ENABLE KEYS */;

-- Dumping structure for table cose_mercat.security_usergroup
CREATE TABLE IF NOT EXISTS `security_usergroup` (
    `oid` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
    `level` int(11) NOT NULL,
    PRIMARY KEY (`oid`)
    ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cose_mercat.security_usergroup: ~1 rows (approximately)
/*!40000 ALTER TABLE `security_usergroup` DISABLE KEYS */;
INSERT INTO `security_usergroup` (`oid`, `name`, `description`, `level`) VALUES
    (1, 'Admin', 'Administrador', 1);
/*!40000 ALTER TABLE `security_usergroup` ENABLE KEYS */;

-- Dumping structure for table cose_mercat.security_users_groups
CREATE TABLE IF NOT EXISTS `security_users_groups` (
    `user_oid` int(11) NOT NULL,
    `usergroup_oid` int(11) NOT NULL,
    PRIMARY KEY (`user_oid`,`usergroup_oid`),
    KEY `IDX_C51F4979A93C412B` (`user_oid`),
    KEY `IDX_C51F4979FF569B9` (`usergroup_oid`),
    CONSTRAINT `FK_C51F4979A93C412B` FOREIGN KEY (`user_oid`) REFERENCES `security_user` (`oid`),
    CONSTRAINT `FK_C51F4979FF569B9` FOREIGN KEY (`usergroup_oid`) REFERENCES `security_usergroup` (`oid`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cose_mercat.security_users_groups: ~1 rows (approximately)
/*!40000 ALTER TABLE `security_users_groups` DISABLE KEYS */;
INSERT INTO `security_users_groups` (`user_oid`, `usergroup_oid`) VALUES
    (3, 1);
/*!40000 ALTER TABLE `security_users_groups` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
