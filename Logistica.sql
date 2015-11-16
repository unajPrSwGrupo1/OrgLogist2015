-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 16, 2015 at 02:39 AM
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
