-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 06-10-2015 a las 19:40:50
-- Versión del servidor: 10.0.21-MariaDB-log
-- Versión de PHP: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `StockTransporteLogistica`
--
CREATE DATABASE IF NOT EXISTS `StockTransporteLogistica` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `StockTransporteLogistica`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja`
--

CREATE TABLE IF NOT EXISTS `caja` (
  `idCaja` int(11) NOT NULL AUTO_INCREMENT,
  `Peso` int(11) NOT NULL,
  `Volumen` int(11) NOT NULL,
  `TipoCaja_idTipoCaja` int(11) NOT NULL,
  PRIMARY KEY (`idCaja`,`TipoCaja_idTipoCaja`),
  KEY `fk_Caja_TipoCaja1_idx` (`TipoCaja_idTipoCaja`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

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
-- Estructura de tabla para la tabla `darsena`
--

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
-- Estructura de tabla para la tabla `darsenaestado`
--

CREATE TABLE IF NOT EXISTS `darsenaestado` (
  `idDarsenaEstado` int(11) NOT NULL AUTO_INCREMENT,
  `Estado` varchar(45) NOT NULL,
  PRIMARY KEY (`idDarsenaEstado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estante`
--

CREATE TABLE IF NOT EXISTS `estante` (
  `idEstante` int(11) NOT NULL AUTO_INCREMENT,
  `Fila` varchar(45) NOT NULL,
  `Columna` varchar(45) NOT NULL,
  `EstanteEstado_idEstanteEstado` int(11) NOT NULL,
  PRIMARY KEY (`idEstante`,`EstanteEstado_idEstanteEstado`),
  KEY `fk_Estante_EstanteEstado1_idx` (`EstanteEstado_idEstanteEstado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estanteestado`
--

CREATE TABLE IF NOT EXISTS `estanteestado` (
  `idEstanteEstado` int(11) NOT NULL AUTO_INCREMENT,
  `Estado` varchar(45) NOT NULL,
  PRIMARY KEY (`idEstanteEstado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estante_has_caja`
--

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
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE IF NOT EXISTS `factura` (
  `idFactura` int(11) NOT NULL AUTO_INCREMENT,
  `Monto` decimal(10,2) NOT NULL,
  `RRHH_idRRHH` int(11) NOT NULL,
  `RRHH_TipoRRHH_idTipoRRHH` int(11) NOT NULL,
  `Cliente_idCliente` int(11) NOT NULL,
  `Fecha` date DEFAULT NULL,
  `Hora` time DEFAULT NULL,
  PRIMARY KEY (`idFactura`,`RRHH_idRRHH`,`RRHH_TipoRRHH_idTipoRRHH`,`Cliente_idCliente`),
  KEY `fk_Factura_RRHH1_idx` (`RRHH_idRRHH`,`RRHH_TipoRRHH_idTipoRRHH`),
  KEY `fk_Factura_Cliente1_idx` (`Cliente_idCliente`),
  KEY `fk_Factura_tiporrhh1` (`RRHH_TipoRRHH_idTipoRRHH`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hojaruta`
--

CREATE TABLE IF NOT EXISTS `hojaruta` (
  `idHojaRuta` int(11) NOT NULL AUTO_INCREMENT,
  `Destino` varchar(45) NOT NULL,
  `cantCajas` int(11) NOT NULL,
  `cantPallets` int(11) NOT NULL,
  `Transporte_idTransporte` int(11) NOT NULL,
  `Transporte_TIpoTransporte_idTIpoTransporte` int(11) NOT NULL,
  `Transporte_RRHH_idRRHH` int(11) NOT NULL,
  `Transporte_RRHH_TipoRRHH_idTipoRRHH` int(11) NOT NULL,
  PRIMARY KEY (`idHojaRuta`,`Transporte_idTransporte`,`Transporte_TIpoTransporte_idTIpoTransporte`,`Transporte_RRHH_idRRHH`,`Transporte_RRHH_TipoRRHH_idTipoRRHH`),
  KEY `fk_HojaRuta_Transporte1_idx` (`Transporte_idTransporte`,`Transporte_TIpoTransporte_idTIpoTransporte`,`Transporte_RRHH_idRRHH`,`Transporte_RRHH_TipoRRHH_idTipoRRHH`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `motivoticket`
--

CREATE TABLE IF NOT EXISTS `motivoticket` (
  `idMotivoTicket` int(11) NOT NULL AUTO_INCREMENT,
  `Motivo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idMotivoTicket`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pallet`
--

CREATE TABLE IF NOT EXISTS `pallet` (
  `idPallet` int(11) NOT NULL AUTO_INCREMENT,
  `cantCajas` int(11) DEFAULT NULL,
  `Peso` int(11) DEFAULT NULL,
  `Volumen` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPallet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pallet_has_caja`
--

CREATE TABLE IF NOT EXISTS `pallet_has_caja` (
  `Pallet_idPallet` int(11) NOT NULL,
  `Caja_idCaja` int(11) NOT NULL,
  `Caja_TipoCaja_idTipoCaja` int(11) NOT NULL,
  PRIMARY KEY (`Pallet_idPallet`,`Caja_idCaja`,`Caja_TipoCaja_idTipoCaja`),
  KEY `fk_Pallet_has_Caja_Pallet1_idx` (`Pallet_idPallet`),
  KEY `fk_Pallet_has_Caja_Caja1_idx` (`Caja_idCaja`,`Caja_TipoCaja_idTipoCaja`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
  `idPedido` int(11) NOT NULL,
  `cantCajas` int(11) DEFAULT NULL,
  `cantPallets` int(11) DEFAULT NULL,
  `RRHH_idRRHH` int(11) NOT NULL,
  `RRHH_TipoRRHH_idTipoRRHH` int(11) NOT NULL,
  `Cliente_idCliente` int(11) NOT NULL,
  `Fecha` date DEFAULT NULL,
  `Hora` time DEFAULT NULL,
  PRIMARY KEY (`idPedido`,`RRHH_idRRHH`,`RRHH_TipoRRHH_idTipoRRHH`,`Cliente_idCliente`),
  KEY `fk_Pedido_RRHH1_idx` (`RRHH_idRRHH`,`RRHH_TipoRRHH_idTipoRRHH`),
  KEY `fk_Pedido_Cliente1_idx` (`Cliente_idCliente`),
  KEY `fk_Pedido_tiporrhh1` (`RRHH_TipoRRHH_idTipoRRHH`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rrhh`
--

CREATE TABLE IF NOT EXISTS `rrhh` (
  `idRRHH` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) NOT NULL,
  `Apellido` varchar(45) NOT NULL,
  `Edad` int(11) NOT NULL,
  `Salario` decimal(10,2) NOT NULL,
  `Jefe` int(11) DEFAULT NULL,
  `descript` varchar(140) NOT NULL,
  PRIMARY KEY (`idRRHH`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stagearea`
--

CREATE TABLE IF NOT EXISTS `stagearea` (
  `idStageArea` int(11) NOT NULL AUTO_INCREMENT,
  `TipoStageArea_idTipoStageArea` int(11) NOT NULL,
  PRIMARY KEY (`idStageArea`,`TipoStageArea_idTipoStageArea`),
  KEY `fk_StageArea_TipoStageArea_idx` (`TipoStageArea_idTipoStageArea`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stagearea_has_pallet`
--

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
-- Estructura de tabla para la tabla `stockcenter`
--

CREATE TABLE IF NOT EXISTS `stockcenter` (
  `idStockCenter` int(11) NOT NULL AUTO_INCREMENT,
  `CantEstantes` int(11) NOT NULL,
  `RRHH_idRRHH` int(11) NOT NULL,
  `RRHH_TipoRRHH_idTipoRRHH` int(11) NOT NULL,
  PRIMARY KEY (`idStockCenter`,`RRHH_idRRHH`,`RRHH_TipoRRHH_idTipoRRHH`),
  KEY `fk_StockCenter_RRHH1_idx` (`RRHH_idRRHH`,`RRHH_TipoRRHH_idTipoRRHH`),
  KEY `fk_StockCenter_tiporrhh1` (`RRHH_TipoRRHH_idTipoRRHH`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stockcenter_has_caja`
--

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
-- Estructura de tabla para la tabla `stockcenter_has_darsena`
--

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
-- Estructura de tabla para la tabla `stockcenter_has_estante`
--

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
-- Estructura de tabla para la tabla `stockcenter_has_stagearea`
--

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
-- Estructura de tabla para la tabla `ticket`
--

CREATE TABLE IF NOT EXISTS `ticket` (
  `idTicket` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(80) DEFAULT NULL,
  `MotivoTicket_idMotivoTicket` int(11) NOT NULL,
  `RRHH_idRRHH` int(11) NOT NULL,
  `RRHH_TipoRRHH_idTipoRRHH` int(11) NOT NULL,
  `Transporte_idTransporte` int(11) NOT NULL,
  `Transporte_TIpoTransporte_idTIpoTransporte` int(11) NOT NULL,
  `Transporte_RRHH_idRRHH` int(11) NOT NULL,
  `Transporte_RRHH_TipoRRHH_idTipoRRHH` int(11) NOT NULL,
  `Fecha` date DEFAULT NULL,
  `Hora` time DEFAULT NULL,
  PRIMARY KEY (`idTicket`,`MotivoTicket_idMotivoTicket`,`RRHH_idRRHH`,`RRHH_TipoRRHH_idTipoRRHH`,`Transporte_idTransporte`,`Transporte_TIpoTransporte_idTIpoTransporte`,`Transporte_RRHH_idRRHH`,`Transporte_RRHH_TipoRRHH_idTipoRRHH`),
  KEY `fk_Ticket_MotivoTicket1_idx` (`MotivoTicket_idMotivoTicket`),
  KEY `fk_Ticket_RRHH1_idx` (`RRHH_idRRHH`,`RRHH_TipoRRHH_idTipoRRHH`),
  KEY `fk_Ticket_Transporte1_idx` (`Transporte_idTransporte`,`Transporte_TIpoTransporte_idTIpoTransporte`,`Transporte_RRHH_idRRHH`,`Transporte_RRHH_TipoRRHH_idTipoRRHH`),
  KEY `fk_Ticket_tiporrhh1` (`RRHH_TipoRRHH_idTipoRRHH`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipocaja`
--

CREATE TABLE IF NOT EXISTS `tipocaja` (
  `idTipoCaja` int(11) NOT NULL AUTO_INCREMENT,
  `Tipo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idTipoCaja`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiporrhh`
--

CREATE TABLE IF NOT EXISTS `tiporrhh` (
  `idTipoRRHH` int(11) NOT NULL AUTO_INCREMENT,
  `Tipo` varchar(45) DEFAULT NULL,
  `descript` varchar(140) NOT NULL,
  PRIMARY KEY (`idTipoRRHH`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipostagearea`
--

CREATE TABLE IF NOT EXISTS `tipostagearea` (
  `idTipoStageArea` int(11) NOT NULL AUTO_INCREMENT,
  `Tipo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idTipoStageArea`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipotransporte`
--

CREATE TABLE IF NOT EXISTS `tipotransporte` (
  `idTIpoTransporte` int(11) NOT NULL AUTO_INCREMENT,
  `Tipo` varchar(45) NOT NULL,
  PRIMARY KEY (`idTIpoTransporte`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transporte`
--

CREATE TABLE IF NOT EXISTS `transporte` (
  `idTransporte` int(11) NOT NULL AUTO_INCREMENT,
  `Matricula` varchar(45) NOT NULL,
  `Peso` int(11) NOT NULL,
  `TIpoTransporte_idTIpoTransporte` int(11) NOT NULL,
  `RRHH_idRRHH` int(11) NOT NULL,
  `RRHH_TipoRRHH_idTipoRRHH` int(11) NOT NULL,
  PRIMARY KEY (`idTransporte`,`TIpoTransporte_idTIpoTransporte`,`RRHH_idRRHH`,`RRHH_TipoRRHH_idTipoRRHH`),
  KEY `fk_Transporte_TIpoTransporte1_idx` (`TIpoTransporte_idTIpoTransporte`),
  KEY `fk_Transporte_RRHH1_idx` (`RRHH_idRRHH`,`RRHH_TipoRRHH_idTipoRRHH`),
  KEY `fk_Transporte_tiporrhh1` (`RRHH_TipoRRHH_idTipoRRHH`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transporte_has_caja`
--

CREATE TABLE IF NOT EXISTS `transporte_has_caja` (
  `Transporte_idTransporte` int(11) NOT NULL,
  `Transporte_TIpoTransporte_idTIpoTransporte` int(11) NOT NULL,
  `Transporte_RRHH_idRRHH` int(11) NOT NULL,
  `Transporte_RRHH_TipoRRHH_idTipoRRHH` int(11) NOT NULL,
  `Caja_idCaja` int(11) NOT NULL,
  `Caja_TipoCaja_idTipoCaja` int(11) NOT NULL,
  PRIMARY KEY (`Transporte_idTransporte`,`Transporte_TIpoTransporte_idTIpoTransporte`,`Transporte_RRHH_idRRHH`,`Transporte_RRHH_TipoRRHH_idTipoRRHH`,`Caja_idCaja`,`Caja_TipoCaja_idTipoCaja`),
  KEY `fk_Transporte_has_Caja_Transporte1_idx` (`Transporte_idTransporte`,`Transporte_TIpoTransporte_idTIpoTransporte`,`Transporte_RRHH_idRRHH`,`Transporte_RRHH_TipoRRHH_idTipoRRHH`),
  KEY `fk_Transporte_has_Caja_Caja1_idx` (`Caja_idCaja`,`Caja_TipoCaja_idTipoCaja`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transporte_has_pallet`
--

CREATE TABLE IF NOT EXISTS `transporte_has_pallet` (
  `Transporte_idTransporte` int(11) NOT NULL,
  `Transporte_TIpoTransporte_idTIpoTransporte` int(11) NOT NULL,
  `Transporte_RRHH_idRRHH` int(11) NOT NULL,
  `Transporte_RRHH_TipoRRHH_idTipoRRHH` int(11) NOT NULL,
  `Pallet_idPallet` int(11) NOT NULL,
  PRIMARY KEY (`Transporte_idTransporte`,`Transporte_TIpoTransporte_idTIpoTransporte`,`Transporte_RRHH_idRRHH`,`Transporte_RRHH_TipoRRHH_idTipoRRHH`,`Pallet_idPallet`),
  KEY `fk_Transporte_has_Pallet_Transporte1_idx` (`Transporte_idTransporte`,`Transporte_TIpoTransporte_idTIpoTransporte`,`Transporte_RRHH_idRRHH`,`Transporte_RRHH_TipoRRHH_idTipoRRHH`),
  KEY `fk_Transporte_has_Pallet_Pallet1_idx` (`Pallet_idPallet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `idAutenticacion` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(250) NOT NULL,
  `Mail` varchar(45) NOT NULL,
  `Authkey` varchar(250) DEFAULT NULL,
  `Token` varchar(250) DEFAULT NULL,
  `RRHH_idRRHH` int(11) NOT NULL,
  `RRHH_TipoRRHH_idTipoRRHH` int(11) NOT NULL,
  `Fecha` date DEFAULT NULL,
  `Hora` time DEFAULT NULL,
  `activate` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idAutenticacion`,`RRHH_idRRHH`,`RRHH_TipoRRHH_idTipoRRHH`),
  KEY `fk_Autenticacion_RRHH1_idx` (`RRHH_idRRHH`,`RRHH_TipoRRHH_idTipoRRHH`),
  KEY `fk_Autenticacion_TipoRRHH1` (`RRHH_TipoRRHH_idTipoRRHH`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `caja`
--
ALTER TABLE `caja`
  ADD CONSTRAINT `fk_Caja_TipoCaja1` FOREIGN KEY (`TipoCaja_idTipoCaja`) REFERENCES `tipocaja` (`idTipoCaja`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `darsena`
--
ALTER TABLE `darsena`
  ADD CONSTRAINT `fk_Darsena_DarsenaEstado1` FOREIGN KEY (`DarsenaEstado_idDarsenaEstado`) REFERENCES `darsenaestado` (`idDarsenaEstado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `estante`
--
ALTER TABLE `estante`
  ADD CONSTRAINT `fk_Estante_EstanteEstado1` FOREIGN KEY (`EstanteEstado_idEstanteEstado`) REFERENCES `estanteestado` (`idEstanteEstado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `estante_has_caja`
--
ALTER TABLE `estante_has_caja`
  ADD CONSTRAINT `fk_Estante_has_Caja_Caja1` FOREIGN KEY (`Caja_idCaja`,`Caja_TipoCaja_idTipoCaja`) REFERENCES `caja` (`idCaja`, `TipoCaja_idTipoCaja`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Estante_has_Caja_Estante1` FOREIGN KEY (`Estante_idEstante`,`Estante_EstanteEstado_idEstanteEstado`) REFERENCES `estante` (`idEstante`, `EstanteEstado_idEstanteEstado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `fk_Factura_Cliente1` FOREIGN KEY (`Cliente_idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Factura_RRHH1` FOREIGN KEY (`RRHH_idRRHH`) REFERENCES `rrhh` (`idRRHH`),
  ADD CONSTRAINT `fk_Factura_tiporrhh1` FOREIGN KEY (`RRHH_TipoRRHH_idTipoRRHH`) REFERENCES `tiporrhh` (`idTipoRRHH`);

--
-- Filtros para la tabla `hojaruta`
--
ALTER TABLE `hojaruta`
  ADD CONSTRAINT `fk_HojaRuta_Transporte1` FOREIGN KEY (`Transporte_idTransporte`,`Transporte_TIpoTransporte_idTIpoTransporte`,`Transporte_RRHH_idRRHH`,`Transporte_RRHH_TipoRRHH_idTipoRRHH`) REFERENCES `transporte` (`idTransporte`, `TIpoTransporte_idTIpoTransporte`, `RRHH_idRRHH`, `RRHH_TipoRRHH_idTipoRRHH`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pallet_has_caja`
--
ALTER TABLE `pallet_has_caja`
  ADD CONSTRAINT `fk_Pallet_has_Caja_Caja1` FOREIGN KEY (`Caja_idCaja`,`Caja_TipoCaja_idTipoCaja`) REFERENCES `caja` (`idCaja`, `TipoCaja_idTipoCaja`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Pallet_has_Caja_Pallet1` FOREIGN KEY (`Pallet_idPallet`) REFERENCES `pallet` (`idPallet`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_Pedido_Cliente1` FOREIGN KEY (`Cliente_idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Pedido_RRHH1` FOREIGN KEY (`RRHH_idRRHH`) REFERENCES `rrhh` (`idRRHH`),
  ADD CONSTRAINT `fk_Pedido_tiporrhh1` FOREIGN KEY (`RRHH_TipoRRHH_idTipoRRHH`) REFERENCES `tiporrhh` (`idTipoRRHH`);


--
-- Filtros para la tabla `stagearea`
--
ALTER TABLE `stagearea`
  ADD CONSTRAINT `fk_StageArea_TipoStageArea` FOREIGN KEY (`TipoStageArea_idTipoStageArea`) REFERENCES `tipostagearea` (`idTipoStageArea`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `stagearea_has_pallet`
--
ALTER TABLE `stagearea_has_pallet`
  ADD CONSTRAINT `fk_StageArea_has_Pallet_Pallet1` FOREIGN KEY (`Pallet_idPallet`) REFERENCES `pallet` (`idPallet`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_StageArea_has_Pallet_StageArea1` FOREIGN KEY (`StageArea_idStageArea`,`StageArea_TipoStageArea_idTipoStageArea`) REFERENCES `stagearea` (`idStageArea`, `TipoStageArea_idTipoStageArea`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `stockcenter`
--
ALTER TABLE `stockcenter`
  ADD CONSTRAINT `fk_StockCenter_RRHH1` FOREIGN KEY (`RRHH_idRRHH`) REFERENCES `rrhh` (`idRRHH`),
  ADD CONSTRAINT `fk_StockCenter_tiporrhh1` FOREIGN KEY (`RRHH_TipoRRHH_idTipoRRHH`) REFERENCES `tiporrhh` (`idTipoRRHH`);

--
-- Filtros para la tabla `stockcenter_has_caja`
--
ALTER TABLE `stockcenter_has_caja`
  ADD CONSTRAINT `fk_StockCenter_has_Caja_Caja1` FOREIGN KEY (`Caja_idCaja`,`Caja_TipoCaja_idTipoCaja`) REFERENCES `caja` (`idCaja`, `TipoCaja_idTipoCaja`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_StockCenter_has_Caja_StockCenter1` FOREIGN KEY (`StockCenter_idStockCenter`) REFERENCES `stockcenter` (`idStockCenter`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `stockcenter_has_darsena`
--
ALTER TABLE `stockcenter_has_darsena`
  ADD CONSTRAINT `fk_StockCenter_has_Darsena_Darsena1` FOREIGN KEY (`Darsena_idDarsena`,`Darsena_DarsenaEstado_idDarsenaEstado`) REFERENCES `darsena` (`idDarsena`, `DarsenaEstado_idDarsenaEstado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_StockCenter_has_Darsena_StockCenter1` FOREIGN KEY (`StockCenter_idStockCenter`) REFERENCES `stockcenter` (`idStockCenter`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `stockcenter_has_estante`
--
ALTER TABLE `stockcenter_has_estante`
  ADD CONSTRAINT `fk_StockCenter_has_Estante_Estante1` FOREIGN KEY (`Estante_idEstante`,`Estante_EstanteEstado_idEstanteEstado`) REFERENCES `estante` (`idEstante`, `EstanteEstado_idEstanteEstado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_StockCenter_has_Estante_StockCenter1` FOREIGN KEY (`StockCenter_idStockCenter`) REFERENCES `stockcenter` (`idStockCenter`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `stockcenter_has_stagearea`
--
ALTER TABLE `stockcenter_has_stagearea`
  ADD CONSTRAINT `fk_StockCenter_has_StageArea_StageArea1` FOREIGN KEY (`StageArea_idStageArea`,`StageArea_TipoStageArea_idTipoStageArea`) REFERENCES `stagearea` (`idStageArea`, `TipoStageArea_idTipoStageArea`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_StockCenter_has_StageArea_StockCenter1` FOREIGN KEY (`StockCenter_idStockCenter`) REFERENCES `stockcenter` (`idStockCenter`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `fk_Ticket_MotivoTicket1` FOREIGN KEY (`MotivoTicket_idMotivoTicket`) REFERENCES `motivoticket` (`idMotivoTicket`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Ticket_RRHH1` FOREIGN KEY (`RRHH_idRRHH`) REFERENCES `rrhh` (`idRRHH`),
  ADD CONSTRAINT `fk_Ticket_Transporte1` FOREIGN KEY (`Transporte_idTransporte`,`Transporte_TIpoTransporte_idTIpoTransporte`,`Transporte_RRHH_idRRHH`,`Transporte_RRHH_TipoRRHH_idTipoRRHH`) REFERENCES `transporte` (`idTransporte`, `TIpoTransporte_idTIpoTransporte`, `RRHH_idRRHH`, `RRHH_TipoRRHH_idTipoRRHH`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Ticket_tiporrhh1` FOREIGN KEY (`RRHH_TipoRRHH_idTipoRRHH`) REFERENCES `tiporrhh` (`idTipoRRHH`);

--
-- Filtros para la tabla `transporte`
--
ALTER TABLE `transporte`
  ADD CONSTRAINT `fk_Transporte_RRHH1` FOREIGN KEY (`RRHH_idRRHH`) REFERENCES `rrhh` (`idRRHH`),
  ADD CONSTRAINT `fk_Transporte_TIpoTransporte1` FOREIGN KEY (`TIpoTransporte_idTIpoTransporte`) REFERENCES `tipotransporte` (`idTIpoTransporte`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Transporte_tiporrhh1` FOREIGN KEY (`RRHH_TipoRRHH_idTipoRRHH`) REFERENCES `tiporrhh` (`idTipoRRHH`);

--
-- Filtros para la tabla `transporte_has_caja`
--
ALTER TABLE `transporte_has_caja`
  ADD CONSTRAINT `fk_Transporte_has_Caja_Caja1` FOREIGN KEY (`Caja_idCaja`,`Caja_TipoCaja_idTipoCaja`) REFERENCES `caja` (`idCaja`, `TipoCaja_idTipoCaja`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Transporte_has_Caja_Transporte1` FOREIGN KEY (`Transporte_idTransporte`,`Transporte_TIpoTransporte_idTIpoTransporte`,`Transporte_RRHH_idRRHH`,`Transporte_RRHH_TipoRRHH_idTipoRRHH`) REFERENCES `transporte` (`idTransporte`, `TIpoTransporte_idTIpoTransporte`, `RRHH_idRRHH`, `RRHH_TipoRRHH_idTipoRRHH`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `transporte_has_pallet`
--
ALTER TABLE `transporte_has_pallet`
  ADD CONSTRAINT `fk_Transporte_has_Pallet_Pallet1` FOREIGN KEY (`Pallet_idPallet`) REFERENCES `pallet` (`idPallet`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Transporte_has_Pallet_Transporte1` FOREIGN KEY (`Transporte_idTransporte`,`Transporte_TIpoTransporte_idTIpoTransporte`,`Transporte_RRHH_idRRHH`,`Transporte_RRHH_TipoRRHH_idTipoRRHH`) REFERENCES `transporte` (`idTransporte`, `TIpoTransporte_idTIpoTransporte`, `RRHH_idRRHH`, `RRHH_TipoRRHH_idTipoRRHH`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_Autenticacion_RRHH1` FOREIGN KEY (`RRHH_idRRHH`) REFERENCES `rrhh` (`idRRHH`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Autenticacion_TipoRRHH1` FOREIGN KEY (`RRHH_TipoRRHH_idTipoRRHH`) REFERENCES `tiporrhh` (`idTipoRRHH`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
