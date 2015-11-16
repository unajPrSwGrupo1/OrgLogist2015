-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 16, 2015 at 02:37 AM
-- Server version: 10.0.22-MariaDB-log
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `StockTransporteLogistica`
--
DROP DATABASE `StockTransporteLogistica`;
CREATE DATABASE IF NOT EXISTS `StockTransporteLogistica` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `StockTransporteLogistica`;

-- --------------------------------------------------------

--
-- Table structure for table `caja`
--

DROP TABLE IF EXISTS `caja`;
CREATE TABLE IF NOT EXISTS `caja` (
  `idCaja` int(11) NOT NULL AUTO_INCREMENT,
  `TipoCaja_idTipoCaja` int(11) NOT NULL,
  `physic` int(11) NOT NULL,
  PRIMARY KEY (`idCaja`,`TipoCaja_idTipoCaja`),
  KEY `fk_Caja_TipoCaja1_idx` (`TipoCaja_idTipoCaja`),
  KEY `physic` (`physic`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `caja`
--

INSERT INTO `caja` (`idCaja`, `TipoCaja_idTipoCaja`, `physic`) VALUES
(4, 4, 2),
(2, 1, 3),
(3, 3, 3),
(5, 7, 7);

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `idCliente` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) DEFAULT NULL,
  `Telefono` varchar(45) DEFAULT NULL,
  `Mail` varchar(60) DEFAULT NULL,
  `Direccion` varchar(45) DEFAULT NULL,
  `Descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`idCliente`, `Nombre`, `Telefono`, `Mail`, `Direccion`, `Descripcion`) VALUES
(1, 'cli1', '44444444', 'cli1@email.org', 'calle 234', 'comentario sobre cli1');

-- --------------------------------------------------------

--
-- Table structure for table `darsena`
--

DROP TABLE IF EXISTS `darsena`;
CREATE TABLE IF NOT EXISTS `darsena` (
  `idDarsena` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) DEFAULT NULL,
  `Descripcion` varchar(80) DEFAULT NULL,
  `DarsenaEstado_idDarsenaEstado` int(11) NOT NULL,
  PRIMARY KEY (`idDarsena`,`DarsenaEstado_idDarsenaEstado`),
  KEY `fk_Darsena_DarsenaEstado1_idx` (`DarsenaEstado_idDarsenaEstado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `darsenaestado`
--

DROP TABLE IF EXISTS `darsenaestado`;
CREATE TABLE IF NOT EXISTS `darsenaestado` (
  `idDarsenaEstado` int(11) NOT NULL AUTO_INCREMENT,
  `Estado` varchar(45) NOT NULL,
  PRIMARY KEY (`idDarsenaEstado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `estado_picking`
--

DROP TABLE IF EXISTS `estado_picking`;
CREATE TABLE IF NOT EXISTS `estado_picking` (
  `id_estado_picking` int(11) NOT NULL,
  `descripcion` varchar(20) NOT NULL,
  PRIMARY KEY (`id_estado_picking`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `estado_recepcion`
--

DROP TABLE IF EXISTS `estado_recepcion`;
CREATE TABLE IF NOT EXISTS `estado_recepcion` (
  `id_estado_recepcion` int(11) NOT NULL,
  `descripcion` varchar(20) NOT NULL,
  PRIMARY KEY (`id_estado_recepcion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `estante`
--

DROP TABLE IF EXISTS `estante`;
CREATE TABLE IF NOT EXISTS `estante` (
  `idEstante` int(11) NOT NULL AUTO_INCREMENT,
  `Fila` varchar(45) NOT NULL,
  `Columna` varchar(45) NOT NULL,
  `EstanteEstado_idEstanteEstado` int(11) NOT NULL,
  `loadlimit` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`idEstante`,`EstanteEstado_idEstanteEstado`),
  UNIQUE KEY `loadlimit_2` (`loadlimit`),
  KEY `fk_Estante_EstanteEstado1_idx` (`EstanteEstado_idEstanteEstado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `estante_has_caja`
--

DROP TABLE IF EXISTS `estante_has_caja`;
CREATE TABLE IF NOT EXISTS `estante_has_caja` (
  `Estante_idEstante` int(11) NOT NULL,
  `Estante_EstanteEstado_idEstanteEstado` int(11) NOT NULL,
  `Caja_idCaja` int(11) NOT NULL,
  `Caja_TipoCaja_idTipoCaja` int(11) NOT NULL,
  PRIMARY KEY (`Estante_idEstante`,`Estante_EstanteEstado_idEstanteEstado`,`Caja_idCaja`,`Caja_TipoCaja_idTipoCaja`),
  KEY `fk_Estante_has_Caja_Caja1_idx` (`Caja_idCaja`,`Caja_TipoCaja_idTipoCaja`),
  KEY `fk_Estante_has_Caja_Estante1_idx` (`Estante_idEstante`,`Estante_EstanteEstado_idEstanteEstado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `estanteestado`
--

DROP TABLE IF EXISTS `estanteestado`;
CREATE TABLE IF NOT EXISTS `estanteestado` (
  `idEstanteEstado` int(11) NOT NULL AUTO_INCREMENT,
  `Estado` varchar(45) NOT NULL,
  PRIMARY KEY (`idEstanteEstado`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `estanteestado`
--

INSERT INTO `estanteestado` (`idEstanteEstado`, `Estado`) VALUES
(1, 'Vacío en espera'),
(2, 'En proceso de reposición'),
(3, 'Vacío deshabilitado'),
(4, 'Pick in en progreso'),
(5, 'Completo'),
(6, 'Sobrecargado');

-- --------------------------------------------------------

--
-- Table structure for table `factura`
--

DROP TABLE IF EXISTS `factura`;
CREATE TABLE IF NOT EXISTS `factura` (
  `idFactura` int(11) NOT NULL AUTO_INCREMENT,
  `Monto` decimal(10,2) NOT NULL,
  `RRHH_idRRHH` int(11) NOT NULL,
  `tiporrhh_idTipoRRHH` int(11) NOT NULL,
  `Cliente_idCliente` int(11) NOT NULL,
  `Fecha` date DEFAULT NULL,
  `Hora` time DEFAULT NULL,
  PRIMARY KEY (`idFactura`,`RRHH_idRRHH`,`tiporrhh_idTipoRRHH`,`Cliente_idCliente`),
  KEY `fk_Factura_RRHH1_idx` (`RRHH_idRRHH`,`tiporrhh_idTipoRRHH`),
  KEY `fk_Factura_Cliente1_idx` (`Cliente_idCliente`),
  KEY `fk_Factura_tiporrhh1` (`tiporrhh_idTipoRRHH`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `factura_has_caja`
--

DROP TABLE IF EXISTS `factura_has_caja`;
CREATE TABLE IF NOT EXISTS `factura_has_caja` (
  `idFacturaCaja` int(11) NOT NULL,
  `idCaja` int(11) NOT NULL,
  `idFactura` int(11) NOT NULL,
  PRIMARY KEY (`idFacturaCaja`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `func_tiporrhh`
--

DROP TABLE IF EXISTS `func_tiporrhh`;
CREATE TABLE IF NOT EXISTS `func_tiporrhh` (
  `idFunc` int(11) NOT NULL AUTO_INCREMENT,
  `link_func` varchar(200) DEFAULT '/basic/web/index.php?r=site/not_has_view',
  `desc_func` varchar(140) DEFAULT NULL,
  `tiporrhh_idTipoRRHH` int(11) NOT NULL,
  PRIMARY KEY (`idFunc`),
  KEY `tiporrhh_idTipoRRHH` (`tiporrhh_idTipoRRHH`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `func_tiporrhh`
--

INSERT INTO `func_tiporrhh` (`idFunc`, `link_func`, `desc_func`, `tiporrhh_idTipoRRHH`) VALUES
(1, '/basic/web/index.php?r=rrhh/index', 'Datos de los empleados', 1000),
(2, '/basic/web/index.php?r=tiporrhh', 'Tabla tiporrhh', 1007),
(3, '/basic/web/index.php?r=pedido', 'Administracion de Pedidos', 1000),
(4, '/basic/web/index.php?r=darsena', 'Mantenimiento de Darsenas', 1000),
(5, '/basic/web/index.php?r=site/not_has_view', 'Consultas de stock', 1000),
(6, '/basic/web/index.php?r=cliente/index', 'Mantenimiento de clientes', 1000),
(7, '/basic/web/index.php?r=user', 'Tabla user', 1007),
(8, '/basic/web/index.php?r=rrhh/index', 'Tabla rrhh', 1007),
(9, '/basic/web/index.php?r=transporte/index', 'Mantenimiento de transportes', 1000),
(10, '/basic/web/index.php?r=factura/index', 'Mantenimiento de facturas', 1000),
(11, '/basic/web/index.php?r=caja/index', 'Mantenimiento de ítems', 1000),
(12, '/basic/web/index.php?r=stagearea/index', 'Mantenimiento de Stage Area', 1000),
(13, '/basic/web/index.php?r=estante/index', 'Mantenimiento de ubicciones', 1000),
(14, '/basic/web/index.php?r=hojaruta/index', 'Mantenimiento de hojas de ruta', 1000),
(15, '/basic/web/index.php?r=pallet', 'Mantenimiento de pallets', 1000),
(16, '/basic/web/index.php?r=ticket/index', 'Mantenimiento de tickets', 1004),
(17, '/basic/web/index.php?r=site/not_has_view', 'Reportes varios.', 1000),
(18, '/basic/web/index.php?r=func-tiporrhh', 'Tabla func-tiporrhh', 1007),
(23, '/basic/web/index.php?r=site/register', 'Perfiles de usuario según su idRRHH', 1007),
(24, '/basic/web/index.php?r=factura/index', 'Punto de venta', 1005),
(26, '/basic/web/index.php?r=estanteestado', 'Edición de estados de los estantes', 1007),
(27, '/basic/web/index.php?r=darsenaestado', 'Edición de los estados de las dársenas', 1007),
(28, '/basic/web/index.php?r=picking/index', 'Generacion de Picking', 1005),
(29, '/basic/web/index.php?r=recepcion/index', 'Generacion de recepciones', 1005),
(30, '/basic/web/index.php?r=pedido', 'Carga de Pedido', 1005),
(31, '/basic/web/index.php?r=factura', 'Carga de Factura', 1005);

-- --------------------------------------------------------

--
-- Table structure for table `hojaruta`
--

DROP TABLE IF EXISTS `hojaruta`;
CREATE TABLE IF NOT EXISTS `hojaruta` (
  `idHojaRuta` int(11) NOT NULL AUTO_INCREMENT,
  `Destino` varchar(45) NOT NULL,
  `cantCajas` int(11) NOT NULL,
  `cantPallets` int(11) NOT NULL,
  `Transporte_idTransporte` int(11) NOT NULL,
  `Transporte_TIpoTransporte_idTIpoTransporte` int(11) NOT NULL,
  `Transporte_RRHH_idRRHH` int(11) NOT NULL,
  `Transporte_tiporrhh_idTipoRRHH` int(11) NOT NULL,
  PRIMARY KEY (`idHojaRuta`,`Transporte_idTransporte`,`Transporte_TIpoTransporte_idTIpoTransporte`,`Transporte_RRHH_idRRHH`,`Transporte_tiporrhh_idTipoRRHH`),
  KEY `fk_HojaRuta_Transporte1_idx` (`Transporte_idTransporte`,`Transporte_TIpoTransporte_idTIpoTransporte`,`Transporte_RRHH_idRRHH`,`Transporte_tiporrhh_idTipoRRHH`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `loadlimit`
--

DROP TABLE IF EXISTS `loadlimit`;
CREATE TABLE IF NOT EXISTS `loadlimit` (
  `id` int(11) UNSIGNED NOT NULL,
  `large` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `tall` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `longUnit` enum('mm','cm','dm','m') NOT NULL DEFAULT 'm',
  `weightUnt` enum('mg','g','kg') NOT NULL,
  `descript` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loadlimit`
--

INSERT INTO `loadlimit` (`id`, `large`, `width`, `tall`, `weight`, `longUnit`, `weightUnt`, `descript`) VALUES
(1, 50, 50, 50, 5000, 'm', 'kg', 'Almacén grande');

-- --------------------------------------------------------

--
-- Table structure for table `motivoticket`
--

DROP TABLE IF EXISTS `motivoticket`;
CREATE TABLE IF NOT EXISTS `motivoticket` (
  `idMotivoTicket` int(11) NOT NULL AUTO_INCREMENT,
  `Motivo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idMotivoTicket`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `movimiento_est_pick`
--

DROP TABLE IF EXISTS `movimiento_est_pick`;
CREATE TABLE IF NOT EXISTS `movimiento_est_pick` (
  `id_movimiento` int(11) NOT NULL,
  `num_picking` int(11) NOT NULL,
  `id_estado_picking` int(11) NOT NULL,
  `fecha_hora` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `movimiento_est_recep`
--

DROP TABLE IF EXISTS `movimiento_est_recep`;
CREATE TABLE IF NOT EXISTS `movimiento_est_recep` (
  `id_movimiento` int(11) NOT NULL,
  `idRecepcion` int(11) NOT NULL,
  `id_estado_recepcion` int(11) NOT NULL,
  `fecha_hora` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pallet`
--

DROP TABLE IF EXISTS `pallet`;
CREATE TABLE IF NOT EXISTS `pallet` (
  `idPallet` int(11) NOT NULL AUTO_INCREMENT,
  `cantCajas` int(11) DEFAULT NULL,
  `physic` int(11) NOT NULL,
  PRIMARY KEY (`idPallet`),
  KEY `physic` (`physic`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pallet_has_caja`
--

DROP TABLE IF EXISTS `pallet_has_caja`;
CREATE TABLE IF NOT EXISTS `pallet_has_caja` (
  `Pallet_idPallet` int(11) NOT NULL,
  `Caja_idCaja` int(11) NOT NULL,
  `descript` varchar(20) NOT NULL,
  PRIMARY KEY (`Pallet_idPallet`,`Caja_idCaja`) USING BTREE,
  KEY `fk_Pallet_has_Caja_Pallet1_idx` (`Pallet_idPallet`),
  KEY `fk_Pallet_has_Caja_Caja1_idx` (`Caja_idCaja`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pedido`
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE IF NOT EXISTS `pedido` (
  `idPedido` int(11) NOT NULL,
  `cantCajas` int(11) DEFAULT NULL,
  `cantPallets` int(11) DEFAULT NULL,
  `RRHH_idRRHH` int(11) NOT NULL,
  `tiporrhh_idTipoRRHH` int(11) NOT NULL,
  `Cliente_idCliente` int(11) NOT NULL,
  `Fecha` date DEFAULT NULL,
  `Hora` time DEFAULT NULL,
  PRIMARY KEY (`idPedido`,`RRHH_idRRHH`,`tiporrhh_idTipoRRHH`,`Cliente_idCliente`),
  KEY `fk_Pedido_RRHH1_idx` (`RRHH_idRRHH`,`tiporrhh_idTipoRRHH`),
  KEY `fk_Pedido_Cliente1_idx` (`Cliente_idCliente`),
  KEY `fk_Pedido_tiporrhh1` (`tiporrhh_idTipoRRHH`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `physic`
--

DROP TABLE IF EXISTS `physic`;
CREATE TABLE IF NOT EXISTS `physic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `large` float NOT NULL,
  `tall` float NOT NULL,
  `width` float NOT NULL,
  `maxWeight` float NOT NULL,
  `descript` varchar(45) NOT NULL DEFAULT '"Descipción física"',
  `longUnit` enum('mm','cm','m','hm') NOT NULL DEFAULT 'm',
  `weightUnit` enum('mg','g','Kg','') NOT NULL DEFAULT 'Kg',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `physic`
--

INSERT INTO `physic` (`id`, `large`, `tall`, `width`, `maxWeight`, `descript`, `longUnit`, `weightUnit`) VALUES
(1, 2.3, 3.4, 4.5, 5.6, '(2,3m x 3,4m x 4,5m) Máx=5,6Kg', 'm', 'Kg'),
(2, 1.2, 2.3, 3.4, 4.5, '( 1,2 x 2,3 x 3,4 ) m Max = 4,5 Kg', 'm', 'Kg'),
(3, 1.2, 2.3, 3.4, 4.5, '( 1,2 x 2,3 x 3,4 )m Max=4,5Kg', 'm', 'Kg'),
(4, 5.6, 6.7, 7.8, 8.9, '"Descipción física"', 'm', 'g'),
(5, 1, 1, 0.5, 0.5, '( 1 x 1 x 0,5 ) m Max =  0,5 Kg', 'm', 'Kg'),
(6, 5, 5, 2.7, 3, '"Descipción física"', 'm', 'g'),
(7, 7, 8, 9, 50, '(7x8X9) Max 50Kg', 'm', 'Kg');

-- --------------------------------------------------------

--
-- Table structure for table `picking`
--

DROP TABLE IF EXISTS `picking`;
CREATE TABLE IF NOT EXISTS `picking` (
  `num_picking` int(11) NOT NULL,
  `idCaja` int(11) NOT NULL,
  `idPedido` int(11) NOT NULL,
  `cantidad_pedida` int(11) NOT NULL,
  `cantidad_pickeada` int(11) DEFAULT NULL,
  `idEstante` int(11) NOT NULL,
  `idStageArea` int(11) NOT NULL,
  PRIMARY KEY (`num_picking`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `recepcion`
--

DROP TABLE IF EXISTS `recepcion`;
CREATE TABLE IF NOT EXISTS `recepcion` (
  `idRecepcion` int(11) NOT NULL,
  `idFactura` int(11) NOT NULL,
  `idCaja` int(11) NOT NULL,
  `cantidad_esperada` int(11) NOT NULL,
  `cantidad_recibida` int(11) DEFAULT NULL,
  `idEstante` int(11) DEFAULT NULL,
  PRIMARY KEY (`idRecepcion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rrhh`
--

DROP TABLE IF EXISTS `rrhh`;
CREATE TABLE IF NOT EXISTS `rrhh` (
  `idRRHH` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) NOT NULL,
  `Apellido` varchar(45) NOT NULL,
  `Edad` int(11) NOT NULL,
  `Salario` decimal(10,2) NOT NULL,
  `Jefe` int(11) DEFAULT NULL,
  `descript` varchar(140) NOT NULL,
  `activate` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`idRRHH`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rrhh`
--

INSERT INTO `rrhh` (`idRRHH`, `Nombre`, `Apellido`, `Edad`, `Salario`, `Jefe`, `descript`, `activate`) VALUES
(10, 'Jose', 'Perez', 22, '1500.00', NULL, 'José Perez 22 años, jefe', 1),
(11, 'Alberto', 'Juarez', 40, '20000.00', 10, 'Alberto Juarez, 40 años', 1),
(13, 'conf', 'configurador', 10, '10.00', 10, 'Comentario sobre el configurador', 1),
(14, 'usuario1', 'apellido1', 99, '99.00', 10, 'Usuario1 Apellido 1', 1),
(15, 'Pancho', 'Ibañez', 54, '34000.00', 10, 'Pancho Ibañes, 54 años', 0);

-- --------------------------------------------------------

--
-- Table structure for table `stagearea`
--

DROP TABLE IF EXISTS `stagearea`;
CREATE TABLE IF NOT EXISTS `stagearea` (
  `idStageArea` int(11) NOT NULL AUTO_INCREMENT,
  `TipoStageArea_idTipoStageArea` int(11) NOT NULL,
  `loadlimit` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`idStageArea`,`TipoStageArea_idTipoStageArea`),
  KEY `fk_StageArea_TipoStageArea_idx` (`TipoStageArea_idTipoStageArea`),
  KEY `loadlimit` (`loadlimit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stagearea_has_pallet`
--

DROP TABLE IF EXISTS `stagearea_has_pallet`;
CREATE TABLE IF NOT EXISTS `stagearea_has_pallet` (
  `StageArea_idStageArea` int(11) NOT NULL,
  `StageArea_TipoStageArea_idTipoStageArea` int(11) NOT NULL,
  `Pallet_idPallet` int(11) NOT NULL,
  PRIMARY KEY (`StageArea_idStageArea`,`StageArea_TipoStageArea_idTipoStageArea`,`Pallet_idPallet`),
  KEY `fk_StageArea_has_Pallet_StageArea1_idx` (`StageArea_idStageArea`,`StageArea_TipoStageArea_idTipoStageArea`),
  KEY `fk_StageArea_has_Pallet_Pallet1_idx` (`Pallet_idPallet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stockcenter`
--

DROP TABLE IF EXISTS `stockcenter`;
CREATE TABLE IF NOT EXISTS `stockcenter` (
  `idStockCenter` int(11) NOT NULL AUTO_INCREMENT,
  `CantEstantes` int(11) NOT NULL,
  `RRHH_idRRHH` int(11) NOT NULL,
  `tiporrhh_idTipoRRHH` int(11) NOT NULL,
  PRIMARY KEY (`idStockCenter`,`RRHH_idRRHH`,`tiporrhh_idTipoRRHH`),
  KEY `fk_StockCenter_RRHH1_idx` (`RRHH_idRRHH`,`tiporrhh_idTipoRRHH`),
  KEY `fk_StockCenter_tiporrhh1` (`tiporrhh_idTipoRRHH`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stockcenter_has_caja`
--

DROP TABLE IF EXISTS `stockcenter_has_caja`;
CREATE TABLE IF NOT EXISTS `stockcenter_has_caja` (
  `StockCenter_idStockCenter` int(11) NOT NULL,
  `Caja_idCaja` int(11) NOT NULL,
  `Caja_TipoCaja_idTipoCaja` int(11) NOT NULL,
  PRIMARY KEY (`StockCenter_idStockCenter`,`Caja_idCaja`,`Caja_TipoCaja_idTipoCaja`),
  KEY `fk_StockCenter_has_Caja_StockCenter1_idx` (`StockCenter_idStockCenter`),
  KEY `fk_StockCenter_has_Caja_Caja1_idx` (`Caja_idCaja`,`Caja_TipoCaja_idTipoCaja`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stockcenter_has_darsena`
--

DROP TABLE IF EXISTS `stockcenter_has_darsena`;
CREATE TABLE IF NOT EXISTS `stockcenter_has_darsena` (
  `StockCenter_idStockCenter` int(11) NOT NULL,
  `Darsena_idDarsena` int(11) NOT NULL,
  `Darsena_DarsenaEstado_idDarsenaEstado` int(11) NOT NULL,
  PRIMARY KEY (`StockCenter_idStockCenter`,`Darsena_idDarsena`,`Darsena_DarsenaEstado_idDarsenaEstado`),
  KEY `fk_StockCenter_has_Darsena_StockCenter1_idx` (`StockCenter_idStockCenter`),
  KEY `fk_StockCenter_has_Darsena_Darsena1_idx` (`Darsena_idDarsena`,`Darsena_DarsenaEstado_idDarsenaEstado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stockcenter_has_estante`
--

DROP TABLE IF EXISTS `stockcenter_has_estante`;
CREATE TABLE IF NOT EXISTS `stockcenter_has_estante` (
  `StockCenter_idStockCenter` int(11) NOT NULL,
  `Estante_idEstante` int(11) NOT NULL,
  `Estante_EstanteEstado_idEstanteEstado` int(11) NOT NULL,
  PRIMARY KEY (`StockCenter_idStockCenter`,`Estante_idEstante`,`Estante_EstanteEstado_idEstanteEstado`),
  KEY `fk_StockCenter_has_Estante_StockCenter1_idx` (`StockCenter_idStockCenter`),
  KEY `fk_StockCenter_has_Estante_Estante1_idx` (`Estante_idEstante`,`Estante_EstanteEstado_idEstanteEstado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stockcenter_has_stagearea`
--

DROP TABLE IF EXISTS `stockcenter_has_stagearea`;
CREATE TABLE IF NOT EXISTS `stockcenter_has_stagearea` (
  `StockCenter_idStockCenter` int(11) NOT NULL,
  `StageArea_idStageArea` int(11) NOT NULL,
  `StageArea_TipoStageArea_idTipoStageArea` int(11) NOT NULL,
  PRIMARY KEY (`StockCenter_idStockCenter`,`StageArea_idStageArea`,`StageArea_TipoStageArea_idTipoStageArea`),
  KEY `fk_StockCenter_has_StageArea_StockCenter1_idx` (`StockCenter_idStockCenter`),
  KEY `fk_StockCenter_has_StageArea_StageArea1_idx` (`StageArea_idStageArea`,`StageArea_TipoStageArea_idTipoStageArea`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE IF NOT EXISTS `ticket` (
  `idTicket` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(80) DEFAULT NULL,
  `MotivoTicket_idMotivoTicket` int(11) NOT NULL,
  `RRHH_idRRHH` int(11) NOT NULL,
  `tiporrhh_idTipoRRHH` int(11) NOT NULL,
  `Transporte_idTransporte` int(11) NOT NULL,
  `Transporte_TIpoTransporte_idTIpoTransporte` int(11) NOT NULL,
  `Transporte_RRHH_idRRHH` int(11) NOT NULL,
  `Transporte_tiporrhh_idTipoRRHH` int(11) NOT NULL,
  `Fecha` date DEFAULT NULL,
  `Hora` time DEFAULT NULL,
  PRIMARY KEY (`idTicket`,`MotivoTicket_idMotivoTicket`,`RRHH_idRRHH`,`tiporrhh_idTipoRRHH`,`Transporte_idTransporte`,`Transporte_TIpoTransporte_idTIpoTransporte`,`Transporte_RRHH_idRRHH`,`Transporte_tiporrhh_idTipoRRHH`),
  KEY `fk_Ticket_MotivoTicket1_idx` (`MotivoTicket_idMotivoTicket`),
  KEY `fk_Ticket_RRHH1_idx` (`RRHH_idRRHH`,`tiporrhh_idTipoRRHH`),
  KEY `fk_Ticket_Transporte1_idx` (`Transporte_idTransporte`,`Transporte_TIpoTransporte_idTIpoTransporte`,`Transporte_RRHH_idRRHH`,`Transporte_tiporrhh_idTipoRRHH`),
  KEY `fk_Ticket_tiporrhh1` (`tiporrhh_idTipoRRHH`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tipocaja`
--

DROP TABLE IF EXISTS `tipocaja`;
CREATE TABLE IF NOT EXISTS `tipocaja` (
  `idTipoCaja` int(11) NOT NULL AUTO_INCREMENT,
  `Tipo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idTipoCaja`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipocaja`
--

INSERT INTO `tipocaja` (`idTipoCaja`, `Tipo`) VALUES
(1, 'Yerbas'),
(2, 'Azucar'),
(3, 'Arroz'),
(4, 'Fideos largos pack 200'),
(5, 'Jugo en sobres x50 unidades'),
(6, 'Gaseosa 330ml pack x12 unidades'),
(7, 'televisor');

-- --------------------------------------------------------

--
-- Table structure for table `tiporrhh`
--

DROP TABLE IF EXISTS `tiporrhh`;
CREATE TABLE IF NOT EXISTS `tiporrhh` (
  `idTipoRRHH` int(11) NOT NULL AUTO_INCREMENT,
  `Tipo` varchar(45) DEFAULT NULL,
  `descript` varchar(140) NOT NULL,
  PRIMARY KEY (`idTipoRRHH`)
) ENGINE=InnoDB AUTO_INCREMENT=1008 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tiporrhh`
--

INSERT INTO `tiporrhh` (`idTipoRRHH`, `Tipo`, `descript`) VALUES
(1000, 'adm-stock', 'Administrador del Stock Center'),
(1001, 'adm-transp', 'Administrador del sistema de gestión de transporte'),
(1002, 'op-stock', 'Operador del sistema de gestión del Stock Center'),
(1003, 'driver', 'Conductor de transporte'),
(1004, 'op-dock', 'Operador del sistema de gestión de dársena'),
(1005, 'op-salepoint', 'Operador del punto de venta del sistema de logística'),
(1007, 'conf-sys', 'Configurador del sistema');

-- --------------------------------------------------------

--
-- Table structure for table `tipostagearea`
--

DROP TABLE IF EXISTS `tipostagearea`;
CREATE TABLE IF NOT EXISTS `tipostagearea` (
  `idTipoStageArea` int(11) NOT NULL AUTO_INCREMENT,
  `Tipo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idTipoStageArea`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tipotransporte`
--

DROP TABLE IF EXISTS `tipotransporte`;
CREATE TABLE IF NOT EXISTS `tipotransporte` (
  `idTIpoTransporte` int(11) NOT NULL AUTO_INCREMENT,
  `Tipo` varchar(45) NOT NULL,
  PRIMARY KEY (`idTIpoTransporte`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transporte`
--

DROP TABLE IF EXISTS `transporte`;
CREATE TABLE IF NOT EXISTS `transporte` (
  `idTransporte` int(11) NOT NULL AUTO_INCREMENT,
  `Matricula` varchar(45) NOT NULL,
  `TIpoTransporte_idTIpoTransporte` int(11) NOT NULL,
  `RRHH_idRRHH` int(11) NOT NULL,
  `tiporrhh_idTipoRRHH` int(11) NOT NULL,
  `loadlimit` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`idTransporte`,`TIpoTransporte_idTIpoTransporte`,`RRHH_idRRHH`,`tiporrhh_idTipoRRHH`),
  KEY `fk_Transporte_TIpoTransporte1_idx` (`TIpoTransporte_idTIpoTransporte`),
  KEY `fk_Transporte_RRHH1_idx` (`RRHH_idRRHH`,`tiporrhh_idTipoRRHH`),
  KEY `fk_Transporte_tiporrhh1` (`tiporrhh_idTipoRRHH`),
  KEY `loadlimit` (`loadlimit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transporte_has_caja`
--

DROP TABLE IF EXISTS `transporte_has_caja`;
CREATE TABLE IF NOT EXISTS `transporte_has_caja` (
  `Transporte_idTransporte` int(11) NOT NULL,
  `Transporte_TIpoTransporte_idTIpoTransporte` int(11) NOT NULL,
  `Transporte_RRHH_idRRHH` int(11) NOT NULL,
  `Transporte_tiporrhh_idTipoRRHH` int(11) NOT NULL,
  `Caja_idCaja` int(11) NOT NULL,
  `Caja_TipoCaja_idTipoCaja` int(11) NOT NULL,
  PRIMARY KEY (`Transporte_idTransporte`,`Transporte_TIpoTransporte_idTIpoTransporte`,`Transporte_RRHH_idRRHH`,`Transporte_tiporrhh_idTipoRRHH`,`Caja_idCaja`,`Caja_TipoCaja_idTipoCaja`),
  KEY `fk_Transporte_has_Caja_Transporte1_idx` (`Transporte_idTransporte`,`Transporte_TIpoTransporte_idTIpoTransporte`,`Transporte_RRHH_idRRHH`,`Transporte_tiporrhh_idTipoRRHH`),
  KEY `fk_Transporte_has_Caja_Caja1_idx` (`Caja_idCaja`,`Caja_TipoCaja_idTipoCaja`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transporte_has_pallet`
--

DROP TABLE IF EXISTS `transporte_has_pallet`;
CREATE TABLE IF NOT EXISTS `transporte_has_pallet` (
  `Transporte_idTransporte` int(11) NOT NULL,
  `Transporte_TIpoTransporte_idTIpoTransporte` int(11) NOT NULL,
  `Transporte_RRHH_idRRHH` int(11) NOT NULL,
  `Transporte_tiporrhh_idTipoRRHH` int(11) NOT NULL,
  `Pallet_idPallet` int(11) NOT NULL,
  PRIMARY KEY (`Transporte_idTransporte`,`Transporte_TIpoTransporte_idTIpoTransporte`,`Transporte_RRHH_idRRHH`,`Transporte_tiporrhh_idTipoRRHH`,`Pallet_idPallet`),
  KEY `fk_Transporte_has_Pallet_Transporte1_idx` (`Transporte_idTransporte`,`Transporte_TIpoTransporte_idTIpoTransporte`,`Transporte_RRHH_idRRHH`,`Transporte_tiporrhh_idTipoRRHH`),
  KEY `fk_Transporte_has_Pallet_Pallet1_idx` (`Pallet_idPallet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `idAutenticacion` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(250) NOT NULL,
  `Mail` varchar(45) NOT NULL,
  `Authkey` varchar(250) DEFAULT NULL,
  `Token` varchar(250) DEFAULT NULL,
  `RRHH_idRRHH` int(11) NOT NULL,
  `tiporrhh_idTipoRRHH` int(11) NOT NULL,
  `Fecha` date DEFAULT NULL,
  `Hora` time DEFAULT NULL,
  `activate` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`idAutenticacion`,`RRHH_idRRHH`,`tiporrhh_idTipoRRHH`),
  KEY `fk_Autenticacion_RRHH1_idx` (`RRHH_idRRHH`,`tiporrhh_idTipoRRHH`),
  KEY `fk_Autenticacion_TipoRRHH1` (`tiporrhh_idTipoRRHH`)
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idAutenticacion`, `username`, `password`, `Mail`, `Authkey`, `Token`, `RRHH_idRRHH`, `tiporrhh_idTipoRRHH`, `Fecha`, `Hora`, `activate`) VALUES
(100, 'admin', '00Ko3aqrA3ETk', 'cualqui@gmail.com', '93ead2876301dbb34f9ae1a73430ade9629ab8872ef500ea6daa5b8f51654a513415302b487afbbbfccbda192d4def57ad243b5ea3ef401a23c5434d6f0b5c85f1082cc2518f7f0f92b3c679bea608250848a715efbc5124a3ec0bc1fcd6b5114c0498fe', 'e009894838b9ad0004c1048a6f45daa1011f0bda9f9a3009a211df195b58b602d7738b38138a9eaa711b78a2a61c275552f3491b30c24c323b30948a10dad8680b2bbac40edb063a7d078f8f5bf9ab81d02e04979c8092076754c3985e7506d3c583081f', 10, 1000, '2015-09-08', '12:22:24', 1),
(101, 'conf', '003308eA/mHG2', 'mailconf@yahoo.com', 'a9351cf9c4085ea6a5cb499b8db92cf2b9e3b32de9c9ec6e78027f36356b7b49b82c2b06b35f61440ace06a916ae84e936cb7378c2e9a930a641340a11ffc3f5026db3cec1dc17314d8d8fef6359db433174ba9d2d09b915df9b4e018c0bdb563314308c', '3eb4e201803349a2b14e3fbc8262844296dee46caf64f6d1e767c7abf64e1e71bb5f52257e0db34000d3de53af82469675c2e5dc94fbe915f5e39ada0b3b7375e9d34154ba6f9daf9f890b96d37bc56149ae1592558599a8e884a81e1ef39ba4ba9268a1', 13, 1007, '2015-10-14', '07:39:19', 1),
(104, 'usuario1', '00u1MCE2Fd2Vc', 'danielrosatto@gmail.com', 'a7417c72ec82a7e7ea9116b70ba6ec3eae6714f66ee7b250347b1998a95ece3c2faa90664a463fcdaae19e0adbe0f728d28d859353ff91292712b72f865d4dc76bb56ae24474cf34dace74351e9b2c9feaaabf36900b6a59a8d8274ab4b46b9bc9bee5ae', 'b1f81b829c029a2a5452643935d80ed2520c3f431bc0c517fcfc78b13e0a332eb915fcf6d1d0c5d2825516cbb2b4b49d30993e5769d840129ce0901b935bd5e7bd65212e05cbc43b6716e97e23f5e3307fbf744ef7f2193e7babb7f315f5f8bcdd2a7cfd', 14, 1004, NULL, NULL, 1),
(111, 'usuario2', '008AVlQ0UTZ2U', 'danielrosatto@gmail.com', '3fb93ceb2789f7d43a155b8f9195460ec1d6428cf6c430fd078b8718e139e9d110db9bee70917e4eb30a0784e1320797dd9ced1c40315d676c7d957ec173f602a05e4d0e496fd2da4bd46b8935382a120d7a1dfbdb11442f559278213b0cc842c2235849', 'ab1469a25aa283a25147fff178a375377a2392b43cd16da155faa5284321ebecb65af758a807c1f7c48df0ba931e56063c79a28b1e836d188fbe6de576a220fc3cb3595ce45a8d963bbfe0bccb552a7bc95781adb6d99c52d772d85fa0b219448f1762a7', 14, 1005, NULL, NULL, 1),
(112, 'Jorge', '00k9koU7t.btE', 'jorgeoscargamez@gmail.com', '8b4721dbced629ba7f8166ac4a05c14c093ce8578ab596b86959981b70d6a92d6ef885b91c79e99b3807a0607d8e66f3a899f80194142145edac9e9b601c0a90c820512fe29530e4791652ac298f9322ce8d902225eb2469ea760c93d8d9f39aabd0b50c', '3f28ffb531ac9c605cf938d96dfaa0cc3f4baff66eb8f213c70e540d05f981620543460e72bb4eab08fa650884ee48eec122b20b6b83702a3fcc4df8e8a9e54052e705ef3a31887f3c730ace224a5888ca813e98e0d566aa1e01ae6b43d1b1b628f25c37', 10, 1005, NULL, NULL, 1),
(113, 'Jorge2', '00k9koU7t.btE', 'eltravieso@comilon.com', '9c2283df7a8795da705f1eb72b58ba22675c45e7ff197ab27139176ec799c6a9aff5754dc309bef8e0816e74d238319e45ecf302f5575f9bbd2613f73b3509e13940de3484035f9dd93a36c8f2a030919bf328b4721dbced629ba7f8166ac4a05c14c093', 'ce8578ab596b86959981b70d6a92d6ef885b91c79e99b3807a0607d8e66f3a899f80194142145edac9e9b601c0a90c820512fe29530e4791652ac298f9322ce8d902225eb2469ea760c93d8d9f39aabd0b50c3f28ffb531ac9c605cf938d96dfaa0cc3f4', 10, 1005, NULL, NULL, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `caja`
--
ALTER TABLE `caja`
  ADD CONSTRAINT `fk_Caja_TipoCaja1` FOREIGN KEY (`TipoCaja_idTipoCaja`) REFERENCES `tipocaja` (`idTipoCaja`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_physic1` FOREIGN KEY (`physic`) REFERENCES `physic` (`id`);

--
-- Constraints for table `darsena`
--
ALTER TABLE `darsena`
  ADD CONSTRAINT `fk_Darsena_DarsenaEstado1` FOREIGN KEY (`DarsenaEstado_idDarsenaEstado`) REFERENCES `darsenaestado` (`idDarsenaEstado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `estante`
--
ALTER TABLE `estante`
  ADD CONSTRAINT `fk_Estante_EstanteEstado1` FOREIGN KEY (`EstanteEstado_idEstanteEstado`) REFERENCES `estanteestado` (`idEstanteEstado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Loadlimit` FOREIGN KEY (`loadlimit`) REFERENCES `loadlimit` (`id`);

--
-- Constraints for table `estante_has_caja`
--
ALTER TABLE `estante_has_caja`
  ADD CONSTRAINT `fk_Estante_has_Caja_Caja1` FOREIGN KEY (`Caja_idCaja`,`Caja_TipoCaja_idTipoCaja`) REFERENCES `caja` (`idCaja`, `TipoCaja_idTipoCaja`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Estante_has_Caja_Estante1` FOREIGN KEY (`Estante_idEstante`,`Estante_EstanteEstado_idEstanteEstado`) REFERENCES `estante` (`idEstante`, `EstanteEstado_idEstanteEstado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `fk_Factura_Cliente1` FOREIGN KEY (`Cliente_idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Factura_RRHH1` FOREIGN KEY (`RRHH_idRRHH`) REFERENCES `rrhh` (`idRRHH`),
  ADD CONSTRAINT `fk_Factura_tiporrhh1` FOREIGN KEY (`tiporrhh_idTipoRRHH`) REFERENCES `tiporrhh` (`idTipoRRHH`);

--
-- Constraints for table `func_tiporrhh`
--
ALTER TABLE `func_tiporrhh`
  ADD CONSTRAINT `fk_func_tiporrhh` FOREIGN KEY (`tiporrhh_idTipoRRHH`) REFERENCES `tiporrhh` (`idTipoRRHH`);

--
-- Constraints for table `hojaruta`
--
ALTER TABLE `hojaruta`
  ADD CONSTRAINT `fk_HojaRuta_Transporte1` FOREIGN KEY (`Transporte_idTransporte`,`Transporte_TIpoTransporte_idTIpoTransporte`,`Transporte_RRHH_idRRHH`,`Transporte_tiporrhh_idTipoRRHH`) REFERENCES `transporte` (`idTransporte`, `TIpoTransporte_idTIpoTransporte`, `RRHH_idRRHH`, `tiporrhh_idTipoRRHH`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pallet`
--
ALTER TABLE `pallet`
  ADD CONSTRAINT `fk_physic` FOREIGN KEY (`physic`) REFERENCES `physic` (`id`);

--
-- Constraints for table `pallet_has_caja`
--
ALTER TABLE `pallet_has_caja`
  ADD CONSTRAINT `fk_Pallet_has_Caja_Caja1` FOREIGN KEY (`Caja_idCaja`) REFERENCES `caja` (`idCaja`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Pallet_has_Caja_Pallet1` FOREIGN KEY (`Pallet_idPallet`) REFERENCES `pallet` (`idPallet`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_Pedido_Cliente1` FOREIGN KEY (`Cliente_idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Pedido_RRHH1` FOREIGN KEY (`RRHH_idRRHH`) REFERENCES `rrhh` (`idRRHH`),
  ADD CONSTRAINT `fk_Pedido_tiporrhh1` FOREIGN KEY (`tiporrhh_idTipoRRHH`) REFERENCES `tiporrhh` (`idTipoRRHH`);

--
-- Constraints for table `stagearea`
--
ALTER TABLE `stagearea`
  ADD CONSTRAINT `fk_Loadlimit3` FOREIGN KEY (`loadlimit`) REFERENCES `loadlimit` (`id`),
  ADD CONSTRAINT `fk_StageArea_TipoStageArea` FOREIGN KEY (`TipoStageArea_idTipoStageArea`) REFERENCES `tipostagearea` (`idTipoStageArea`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `stagearea_has_pallet`
--
ALTER TABLE `stagearea_has_pallet`
  ADD CONSTRAINT `fk_StageArea_has_Pallet_Pallet1` FOREIGN KEY (`Pallet_idPallet`) REFERENCES `pallet` (`idPallet`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_StageArea_has_Pallet_StageArea1` FOREIGN KEY (`StageArea_idStageArea`,`StageArea_TipoStageArea_idTipoStageArea`) REFERENCES `stagearea` (`idStageArea`, `TipoStageArea_idTipoStageArea`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `stockcenter`
--
ALTER TABLE `stockcenter`
  ADD CONSTRAINT `fk_StockCenter_RRHH1` FOREIGN KEY (`RRHH_idRRHH`) REFERENCES `rrhh` (`idRRHH`),
  ADD CONSTRAINT `fk_StockCenter_tiporrhh1` FOREIGN KEY (`tiporrhh_idTipoRRHH`) REFERENCES `tiporrhh` (`idTipoRRHH`);

--
-- Constraints for table `stockcenter_has_caja`
--
ALTER TABLE `stockcenter_has_caja`
  ADD CONSTRAINT `fk_StockCenter_has_Caja_Caja1` FOREIGN KEY (`Caja_idCaja`,`Caja_TipoCaja_idTipoCaja`) REFERENCES `caja` (`idCaja`, `TipoCaja_idTipoCaja`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_StockCenter_has_Caja_StockCenter1` FOREIGN KEY (`StockCenter_idStockCenter`) REFERENCES `stockcenter` (`idStockCenter`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `stockcenter_has_darsena`
--
ALTER TABLE `stockcenter_has_darsena`
  ADD CONSTRAINT `fk_StockCenter_has_Darsena_Darsena1` FOREIGN KEY (`Darsena_idDarsena`,`Darsena_DarsenaEstado_idDarsenaEstado`) REFERENCES `darsena` (`idDarsena`, `DarsenaEstado_idDarsenaEstado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_StockCenter_has_Darsena_StockCenter1` FOREIGN KEY (`StockCenter_idStockCenter`) REFERENCES `stockcenter` (`idStockCenter`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `stockcenter_has_estante`
--
ALTER TABLE `stockcenter_has_estante`
  ADD CONSTRAINT `fk_StockCenter_has_Estante_Estante1` FOREIGN KEY (`Estante_idEstante`,`Estante_EstanteEstado_idEstanteEstado`) REFERENCES `estante` (`idEstante`, `EstanteEstado_idEstanteEstado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_StockCenter_has_Estante_StockCenter1` FOREIGN KEY (`StockCenter_idStockCenter`) REFERENCES `stockcenter` (`idStockCenter`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `stockcenter_has_stagearea`
--
ALTER TABLE `stockcenter_has_stagearea`
  ADD CONSTRAINT `fk_StockCenter_has_StageArea_StageArea1` FOREIGN KEY (`StageArea_idStageArea`,`StageArea_TipoStageArea_idTipoStageArea`) REFERENCES `stagearea` (`idStageArea`, `TipoStageArea_idTipoStageArea`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_StockCenter_has_StageArea_StockCenter1` FOREIGN KEY (`StockCenter_idStockCenter`) REFERENCES `stockcenter` (`idStockCenter`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `fk_Ticket_MotivoTicket1` FOREIGN KEY (`MotivoTicket_idMotivoTicket`) REFERENCES `motivoticket` (`idMotivoTicket`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Ticket_RRHH1` FOREIGN KEY (`RRHH_idRRHH`) REFERENCES `rrhh` (`idRRHH`),
  ADD CONSTRAINT `fk_Ticket_Transporte1` FOREIGN KEY (`Transporte_idTransporte`,`Transporte_TIpoTransporte_idTIpoTransporte`,`Transporte_RRHH_idRRHH`,`Transporte_tiporrhh_idTipoRRHH`) REFERENCES `transporte` (`idTransporte`, `TIpoTransporte_idTIpoTransporte`, `RRHH_idRRHH`, `tiporrhh_idTipoRRHH`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Ticket_tiporrhh1` FOREIGN KEY (`tiporrhh_idTipoRRHH`) REFERENCES `tiporrhh` (`idTipoRRHH`);

--
-- Constraints for table `transporte`
--
ALTER TABLE `transporte`
  ADD CONSTRAINT `fk_Loadlimit2` FOREIGN KEY (`loadlimit`) REFERENCES `loadlimit` (`id`),
  ADD CONSTRAINT `fk_Transporte_RRHH1` FOREIGN KEY (`RRHH_idRRHH`) REFERENCES `rrhh` (`idRRHH`),
  ADD CONSTRAINT `fk_Transporte_TIpoTransporte1` FOREIGN KEY (`TIpoTransporte_idTIpoTransporte`) REFERENCES `tipotransporte` (`idTIpoTransporte`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Transporte_tiporrhh1` FOREIGN KEY (`tiporrhh_idTipoRRHH`) REFERENCES `tiporrhh` (`idTipoRRHH`);

--
-- Constraints for table `transporte_has_caja`
--
ALTER TABLE `transporte_has_caja`
  ADD CONSTRAINT `fk_Transporte_has_Caja_Caja1` FOREIGN KEY (`Caja_idCaja`,`Caja_TipoCaja_idTipoCaja`) REFERENCES `caja` (`idCaja`, `TipoCaja_idTipoCaja`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Transporte_has_Caja_Transporte1` FOREIGN KEY (`Transporte_idTransporte`,`Transporte_TIpoTransporte_idTIpoTransporte`,`Transporte_RRHH_idRRHH`,`Transporte_tiporrhh_idTipoRRHH`) REFERENCES `transporte` (`idTransporte`, `TIpoTransporte_idTIpoTransporte`, `RRHH_idRRHH`, `tiporrhh_idTipoRRHH`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `transporte_has_pallet`
--
ALTER TABLE `transporte_has_pallet`
  ADD CONSTRAINT `fk_Transporte_has_Pallet_Pallet1` FOREIGN KEY (`Pallet_idPallet`) REFERENCES `pallet` (`idPallet`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Transporte_has_Pallet_Transporte1` FOREIGN KEY (`Transporte_idTransporte`,`Transporte_TIpoTransporte_idTIpoTransporte`,`Transporte_RRHH_idRRHH`,`Transporte_tiporrhh_idTipoRRHH`) REFERENCES `transporte` (`idTransporte`, `TIpoTransporte_idTIpoTransporte`, `RRHH_idRRHH`, `tiporrhh_idTipoRRHH`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_Autenticacion_RRHH1` FOREIGN KEY (`RRHH_idRRHH`) REFERENCES `rrhh` (`idRRHH`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Autenticacion_TipoRRHH1` FOREIGN KEY (`tiporrhh_idTipoRRHH`) REFERENCES `tiporrhh` (`idTipoRRHH`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
