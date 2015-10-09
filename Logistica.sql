-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 09-10-2015 a las 19:57:19
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja`
--

CREATE TABLE `caja` (
  `idCaja` int(11) NOT NULL,
  `Peso` int(11) NOT NULL,
  `Volumen` int(11) NOT NULL,
  `TipoCaja_idTipoCaja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Telefono` varchar(45) DEFAULT NULL,
  `Mail` varchar(60) DEFAULT NULL,
  `Direccion` varchar(45) DEFAULT NULL,
  `Descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `darsena`
--

CREATE TABLE `darsena` (
  `idDarsena` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Descripcion` varchar(80) DEFAULT NULL,
  `DarsenaEstado_idDarsenaEstado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `darsenaestado`
--

CREATE TABLE `darsenaestado` (
  `idDarsenaEstado` int(11) NOT NULL,
  `Estado` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estante`
--

CREATE TABLE `estante` (
  `idEstante` int(11) NOT NULL,
  `Fila` varchar(45) NOT NULL,
  `Columna` varchar(45) NOT NULL,
  `EstanteEstado_idEstanteEstado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estanteestado`
--

CREATE TABLE `estanteestado` (
  `idEstanteEstado` int(11) NOT NULL,
  `Estado` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estante_has_caja`
--

CREATE TABLE `estante_has_caja` (
  `Estante_idEstante` int(11) NOT NULL,
  `Estante_EstanteEstado_idEstanteEstado` int(11) NOT NULL,
  `Caja_idCaja` int(11) NOT NULL,
  `Caja_TipoCaja_idTipoCaja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `idFactura` int(11) NOT NULL,
  `Monto` decimal(10,2) NOT NULL,
  `RRHH_idRRHH` int(11) NOT NULL,
  `tiporrhh_idTipoRRHH` int(11) NOT NULL,
  `Cliente_idCliente` int(11) NOT NULL,
  `Fecha` date DEFAULT NULL,
  `Hora` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `func_tiporrhh`
--

CREATE TABLE `func_tiporrhh` (
  `idFunc` int(11) NOT NULL,
  `link_func` varchar(200) NOT NULL DEFAULT 'http://localhost/basic/web/index.php?r=site/not_has_view',
  `desc_func` varchar(140) DEFAULT NULL,
  `tiporrhh_idTipoRRHH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hojaruta`
--

CREATE TABLE `hojaruta` (
  `idHojaRuta` int(11) NOT NULL,
  `Destino` varchar(45) NOT NULL,
  `cantCajas` int(11) NOT NULL,
  `cantPallets` int(11) NOT NULL,
  `Transporte_idTransporte` int(11) NOT NULL,
  `Transporte_TIpoTransporte_idTIpoTransporte` int(11) NOT NULL,
  `Transporte_RRHH_idRRHH` int(11) NOT NULL,
  `Transporte_tiporrhh_idTipoRRHH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `motivoticket`
--

CREATE TABLE `motivoticket` (
  `idMotivoTicket` int(11) NOT NULL,
  `Motivo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pallet`
--

CREATE TABLE `pallet` (
  `idPallet` int(11) NOT NULL,
  `cantCajas` int(11) DEFAULT NULL,
  `Peso` int(11) DEFAULT NULL,
  `Volumen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pallet_has_caja`
--

CREATE TABLE `pallet_has_caja` (
  `Pallet_idPallet` int(11) NOT NULL,
  `Caja_idCaja` int(11) NOT NULL,
  `Caja_TipoCaja_idTipoCaja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `idPedido` int(11) NOT NULL,
  `cantCajas` int(11) DEFAULT NULL,
  `cantPallets` int(11) DEFAULT NULL,
  `RRHH_idRRHH` int(11) NOT NULL,
  `tiporrhh_idTipoRRHH` int(11) NOT NULL,
  `Cliente_idCliente` int(11) NOT NULL,
  `Fecha` date DEFAULT NULL,
  `Hora` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rrhh`
--

CREATE TABLE `rrhh` (
  `idRRHH` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Apellido` varchar(45) NOT NULL,
  `Edad` int(11) NOT NULL,
  `Salario` decimal(10,2) NOT NULL,
  `Jefe` int(11) DEFAULT NULL,
  `descript` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stagearea`
--

CREATE TABLE `stagearea` (
  `idStageArea` int(11) NOT NULL,
  `TipoStageArea_idTipoStageArea` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stagearea_has_pallet`
--

CREATE TABLE `stagearea_has_pallet` (
  `StageArea_idStageArea` int(11) NOT NULL,
  `StageArea_TipoStageArea_idTipoStageArea` int(11) NOT NULL,
  `Pallet_idPallet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stockcenter`
--

CREATE TABLE `stockcenter` (
  `idStockCenter` int(11) NOT NULL,
  `CantEstantes` int(11) NOT NULL,
  `RRHH_idRRHH` int(11) NOT NULL,
  `tiporrhh_idTipoRRHH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stockcenter_has_caja`
--

CREATE TABLE `stockcenter_has_caja` (
  `StockCenter_idStockCenter` int(11) NOT NULL,
  `Caja_idCaja` int(11) NOT NULL,
  `Caja_TipoCaja_idTipoCaja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stockcenter_has_darsena`
--

CREATE TABLE `stockcenter_has_darsena` (
  `StockCenter_idStockCenter` int(11) NOT NULL,
  `Darsena_idDarsena` int(11) NOT NULL,
  `Darsena_DarsenaEstado_idDarsenaEstado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stockcenter_has_estante`
--

CREATE TABLE `stockcenter_has_estante` (
  `StockCenter_idStockCenter` int(11) NOT NULL,
  `Estante_idEstante` int(11) NOT NULL,
  `Estante_EstanteEstado_idEstanteEstado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stockcenter_has_stagearea`
--

CREATE TABLE `stockcenter_has_stagearea` (
  `StockCenter_idStockCenter` int(11) NOT NULL,
  `StageArea_idStageArea` int(11) NOT NULL,
  `StageArea_TipoStageArea_idTipoStageArea` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket`
--

CREATE TABLE `ticket` (
  `idTicket` int(11) NOT NULL,
  `Descripcion` varchar(80) DEFAULT NULL,
  `MotivoTicket_idMotivoTicket` int(11) NOT NULL,
  `RRHH_idRRHH` int(11) NOT NULL,
  `tiporrhh_idTipoRRHH` int(11) NOT NULL,
  `Transporte_idTransporte` int(11) NOT NULL,
  `Transporte_TIpoTransporte_idTIpoTransporte` int(11) NOT NULL,
  `Transporte_RRHH_idRRHH` int(11) NOT NULL,
  `Transporte_tiporrhh_idTipoRRHH` int(11) NOT NULL,
  `Fecha` date DEFAULT NULL,
  `Hora` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipocaja`
--

CREATE TABLE `tipocaja` (
  `idTipoCaja` int(11) NOT NULL,
  `Tipo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiporrhh`
--

CREATE TABLE `tiporrhh` (
  `idTipoRRHH` int(11) NOT NULL,
  `Tipo` varchar(45) DEFAULT NULL,
  `descript` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipostagearea`
--

CREATE TABLE `tipostagearea` (
  `idTipoStageArea` int(11) NOT NULL,
  `Tipo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipotransporte`
--

CREATE TABLE `tipotransporte` (
  `idTIpoTransporte` int(11) NOT NULL,
  `Tipo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transporte`
--

CREATE TABLE `transporte` (
  `idTransporte` int(11) NOT NULL,
  `Matricula` varchar(45) NOT NULL,
  `Peso` int(11) NOT NULL,
  `TIpoTransporte_idTIpoTransporte` int(11) NOT NULL,
  `RRHH_idRRHH` int(11) NOT NULL,
  `tiporrhh_idTipoRRHH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transporte_has_caja`
--

CREATE TABLE `transporte_has_caja` (
  `Transporte_idTransporte` int(11) NOT NULL,
  `Transporte_TIpoTransporte_idTIpoTransporte` int(11) NOT NULL,
  `Transporte_RRHH_idRRHH` int(11) NOT NULL,
  `Transporte_tiporrhh_idTipoRRHH` int(11) NOT NULL,
  `Caja_idCaja` int(11) NOT NULL,
  `Caja_TipoCaja_idTipoCaja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transporte_has_pallet`
--

CREATE TABLE `transporte_has_pallet` (
  `Transporte_idTransporte` int(11) NOT NULL,
  `Transporte_TIpoTransporte_idTIpoTransporte` int(11) NOT NULL,
  `Transporte_RRHH_idRRHH` int(11) NOT NULL,
  `Transporte_tiporrhh_idTipoRRHH` int(11) NOT NULL,
  `Pallet_idPallet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `idAutenticacion` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(250) NOT NULL,
  `Mail` varchar(45) NOT NULL,
  `Authkey` varchar(250) DEFAULT NULL,
  `Token` varchar(250) DEFAULT NULL,
  `RRHH_idRRHH` int(11) NOT NULL,
  `tiporrhh_idTipoRRHH` int(11) NOT NULL,
  `Fecha` date DEFAULT NULL,
  `Hora` time DEFAULT NULL,
  `activate` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `caja`
--
ALTER TABLE `caja`
  ADD PRIMARY KEY (`idCaja`,`TipoCaja_idTipoCaja`),
  ADD KEY `fk_Caja_TipoCaja1_idx` (`TipoCaja_idTipoCaja`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `darsena`
--
ALTER TABLE `darsena`
  ADD PRIMARY KEY (`idDarsena`,`DarsenaEstado_idDarsenaEstado`),
  ADD KEY `fk_Darsena_DarsenaEstado1_idx` (`DarsenaEstado_idDarsenaEstado`);

--
-- Indices de la tabla `darsenaestado`
--
ALTER TABLE `darsenaestado`
  ADD PRIMARY KEY (`idDarsenaEstado`);

--
-- Indices de la tabla `estante`
--
ALTER TABLE `estante`
  ADD PRIMARY KEY (`idEstante`,`EstanteEstado_idEstanteEstado`),
  ADD KEY `fk_Estante_EstanteEstado1_idx` (`EstanteEstado_idEstanteEstado`);

--
-- Indices de la tabla `estanteestado`
--
ALTER TABLE `estanteestado`
  ADD PRIMARY KEY (`idEstanteEstado`);

--
-- Indices de la tabla `estante_has_caja`
--
ALTER TABLE `estante_has_caja`
  ADD PRIMARY KEY (`Estante_idEstante`,`Estante_EstanteEstado_idEstanteEstado`,`Caja_idCaja`,`Caja_TipoCaja_idTipoCaja`),
  ADD KEY `fk_Estante_has_Caja_Caja1_idx` (`Caja_idCaja`,`Caja_TipoCaja_idTipoCaja`),
  ADD KEY `fk_Estante_has_Caja_Estante1_idx` (`Estante_idEstante`,`Estante_EstanteEstado_idEstanteEstado`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`idFactura`,`RRHH_idRRHH`,`tiporrhh_idTipoRRHH`,`Cliente_idCliente`),
  ADD KEY `fk_Factura_RRHH1_idx` (`RRHH_idRRHH`,`tiporrhh_idTipoRRHH`),
  ADD KEY `fk_Factura_Cliente1_idx` (`Cliente_idCliente`),
  ADD KEY `fk_Factura_tiporrhh1` (`tiporrhh_idTipoRRHH`);

--
-- Indices de la tabla `func_tiporrhh`
--
ALTER TABLE `func_tiporrhh`
  ADD PRIMARY KEY (`idFunc`),
  ADD KEY `tiporrhh_idTipoRRHH` (`tiporrhh_idTipoRRHH`);

--
-- Indices de la tabla `hojaruta`
--
ALTER TABLE `hojaruta`
  ADD PRIMARY KEY (`idHojaRuta`,`Transporte_idTransporte`,`Transporte_TIpoTransporte_idTIpoTransporte`,`Transporte_RRHH_idRRHH`,`Transporte_tiporrhh_idTipoRRHH`),
  ADD KEY `fk_HojaRuta_Transporte1_idx` (`Transporte_idTransporte`,`Transporte_TIpoTransporte_idTIpoTransporte`,`Transporte_RRHH_idRRHH`,`Transporte_tiporrhh_idTipoRRHH`);

--
-- Indices de la tabla `motivoticket`
--
ALTER TABLE `motivoticket`
  ADD PRIMARY KEY (`idMotivoTicket`);

--
-- Indices de la tabla `pallet`
--
ALTER TABLE `pallet`
  ADD PRIMARY KEY (`idPallet`);

--
-- Indices de la tabla `pallet_has_caja`
--
ALTER TABLE `pallet_has_caja`
  ADD PRIMARY KEY (`Pallet_idPallet`,`Caja_idCaja`,`Caja_TipoCaja_idTipoCaja`),
  ADD KEY `fk_Pallet_has_Caja_Pallet1_idx` (`Pallet_idPallet`),
  ADD KEY `fk_Pallet_has_Caja_Caja1_idx` (`Caja_idCaja`,`Caja_TipoCaja_idTipoCaja`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idPedido`,`RRHH_idRRHH`,`tiporrhh_idTipoRRHH`,`Cliente_idCliente`),
  ADD KEY `fk_Pedido_RRHH1_idx` (`RRHH_idRRHH`,`tiporrhh_idTipoRRHH`),
  ADD KEY `fk_Pedido_Cliente1_idx` (`Cliente_idCliente`),
  ADD KEY `fk_Pedido_tiporrhh1` (`tiporrhh_idTipoRRHH`);

--
-- Indices de la tabla `rrhh`
--
ALTER TABLE `rrhh`
  ADD PRIMARY KEY (`idRRHH`);

--
-- Indices de la tabla `stagearea`
--
ALTER TABLE `stagearea`
  ADD PRIMARY KEY (`idStageArea`,`TipoStageArea_idTipoStageArea`),
  ADD KEY `fk_StageArea_TipoStageArea_idx` (`TipoStageArea_idTipoStageArea`);

--
-- Indices de la tabla `stagearea_has_pallet`
--
ALTER TABLE `stagearea_has_pallet`
  ADD PRIMARY KEY (`StageArea_idStageArea`,`StageArea_TipoStageArea_idTipoStageArea`,`Pallet_idPallet`),
  ADD KEY `fk_StageArea_has_Pallet_StageArea1_idx` (`StageArea_idStageArea`,`StageArea_TipoStageArea_idTipoStageArea`),
  ADD KEY `fk_StageArea_has_Pallet_Pallet1_idx` (`Pallet_idPallet`);

--
-- Indices de la tabla `stockcenter`
--
ALTER TABLE `stockcenter`
  ADD PRIMARY KEY (`idStockCenter`,`RRHH_idRRHH`,`tiporrhh_idTipoRRHH`),
  ADD KEY `fk_StockCenter_RRHH1_idx` (`RRHH_idRRHH`,`tiporrhh_idTipoRRHH`),
  ADD KEY `fk_StockCenter_tiporrhh1` (`tiporrhh_idTipoRRHH`);

--
-- Indices de la tabla `stockcenter_has_caja`
--
ALTER TABLE `stockcenter_has_caja`
  ADD PRIMARY KEY (`StockCenter_idStockCenter`,`Caja_idCaja`,`Caja_TipoCaja_idTipoCaja`),
  ADD KEY `fk_StockCenter_has_Caja_StockCenter1_idx` (`StockCenter_idStockCenter`),
  ADD KEY `fk_StockCenter_has_Caja_Caja1_idx` (`Caja_idCaja`,`Caja_TipoCaja_idTipoCaja`);

--
-- Indices de la tabla `stockcenter_has_darsena`
--
ALTER TABLE `stockcenter_has_darsena`
  ADD PRIMARY KEY (`StockCenter_idStockCenter`,`Darsena_idDarsena`,`Darsena_DarsenaEstado_idDarsenaEstado`),
  ADD KEY `fk_StockCenter_has_Darsena_StockCenter1_idx` (`StockCenter_idStockCenter`),
  ADD KEY `fk_StockCenter_has_Darsena_Darsena1_idx` (`Darsena_idDarsena`,`Darsena_DarsenaEstado_idDarsenaEstado`);

--
-- Indices de la tabla `stockcenter_has_estante`
--
ALTER TABLE `stockcenter_has_estante`
  ADD PRIMARY KEY (`StockCenter_idStockCenter`,`Estante_idEstante`,`Estante_EstanteEstado_idEstanteEstado`),
  ADD KEY `fk_StockCenter_has_Estante_StockCenter1_idx` (`StockCenter_idStockCenter`),
  ADD KEY `fk_StockCenter_has_Estante_Estante1_idx` (`Estante_idEstante`,`Estante_EstanteEstado_idEstanteEstado`);

--
-- Indices de la tabla `stockcenter_has_stagearea`
--
ALTER TABLE `stockcenter_has_stagearea`
  ADD PRIMARY KEY (`StockCenter_idStockCenter`,`StageArea_idStageArea`,`StageArea_TipoStageArea_idTipoStageArea`),
  ADD KEY `fk_StockCenter_has_StageArea_StockCenter1_idx` (`StockCenter_idStockCenter`),
  ADD KEY `fk_StockCenter_has_StageArea_StageArea1_idx` (`StageArea_idStageArea`,`StageArea_TipoStageArea_idTipoStageArea`);

--
-- Indices de la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`idTicket`,`MotivoTicket_idMotivoTicket`,`RRHH_idRRHH`,`tiporrhh_idTipoRRHH`,`Transporte_idTransporte`,`Transporte_TIpoTransporte_idTIpoTransporte`,`Transporte_RRHH_idRRHH`,`Transporte_tiporrhh_idTipoRRHH`),
  ADD KEY `fk_Ticket_MotivoTicket1_idx` (`MotivoTicket_idMotivoTicket`),
  ADD KEY `fk_Ticket_RRHH1_idx` (`RRHH_idRRHH`,`tiporrhh_idTipoRRHH`),
  ADD KEY `fk_Ticket_Transporte1_idx` (`Transporte_idTransporte`,`Transporte_TIpoTransporte_idTIpoTransporte`,`Transporte_RRHH_idRRHH`,`Transporte_tiporrhh_idTipoRRHH`),
  ADD KEY `fk_Ticket_tiporrhh1` (`tiporrhh_idTipoRRHH`);

--
-- Indices de la tabla `tipocaja`
--
ALTER TABLE `tipocaja`
  ADD PRIMARY KEY (`idTipoCaja`);

--
-- Indices de la tabla `tiporrhh`
--
ALTER TABLE `tiporrhh`
  ADD PRIMARY KEY (`idTipoRRHH`);

--
-- Indices de la tabla `tipostagearea`
--
ALTER TABLE `tipostagearea`
  ADD PRIMARY KEY (`idTipoStageArea`);

--
-- Indices de la tabla `tipotransporte`
--
ALTER TABLE `tipotransporte`
  ADD PRIMARY KEY (`idTIpoTransporte`);

--
-- Indices de la tabla `transporte`
--
ALTER TABLE `transporte`
  ADD PRIMARY KEY (`idTransporte`,`TIpoTransporte_idTIpoTransporte`,`RRHH_idRRHH`,`tiporrhh_idTipoRRHH`),
  ADD KEY `fk_Transporte_TIpoTransporte1_idx` (`TIpoTransporte_idTIpoTransporte`),
  ADD KEY `fk_Transporte_RRHH1_idx` (`RRHH_idRRHH`,`tiporrhh_idTipoRRHH`),
  ADD KEY `fk_Transporte_tiporrhh1` (`tiporrhh_idTipoRRHH`);

--
-- Indices de la tabla `transporte_has_caja`
--
ALTER TABLE `transporte_has_caja`
  ADD PRIMARY KEY (`Transporte_idTransporte`,`Transporte_TIpoTransporte_idTIpoTransporte`,`Transporte_RRHH_idRRHH`,`Transporte_tiporrhh_idTipoRRHH`,`Caja_idCaja`,`Caja_TipoCaja_idTipoCaja`),
  ADD KEY `fk_Transporte_has_Caja_Transporte1_idx` (`Transporte_idTransporte`,`Transporte_TIpoTransporte_idTIpoTransporte`,`Transporte_RRHH_idRRHH`,`Transporte_tiporrhh_idTipoRRHH`),
  ADD KEY `fk_Transporte_has_Caja_Caja1_idx` (`Caja_idCaja`,`Caja_TipoCaja_idTipoCaja`);

--
-- Indices de la tabla `transporte_has_pallet`
--
ALTER TABLE `transporte_has_pallet`
  ADD PRIMARY KEY (`Transporte_idTransporte`,`Transporte_TIpoTransporte_idTIpoTransporte`,`Transporte_RRHH_idRRHH`,`Transporte_tiporrhh_idTipoRRHH`,`Pallet_idPallet`),
  ADD KEY `fk_Transporte_has_Pallet_Transporte1_idx` (`Transporte_idTransporte`,`Transporte_TIpoTransporte_idTIpoTransporte`,`Transporte_RRHH_idRRHH`,`Transporte_tiporrhh_idTipoRRHH`),
  ADD KEY `fk_Transporte_has_Pallet_Pallet1_idx` (`Pallet_idPallet`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idAutenticacion`,`RRHH_idRRHH`,`tiporrhh_idTipoRRHH`),
  ADD KEY `fk_Autenticacion_RRHH1_idx` (`RRHH_idRRHH`,`tiporrhh_idTipoRRHH`),
  ADD KEY `fk_Autenticacion_TipoRRHH1` (`tiporrhh_idTipoRRHH`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `caja`
--
ALTER TABLE `caja`
  MODIFY `idCaja` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `darsena`
--
ALTER TABLE `darsena`
  MODIFY `idDarsena` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `darsenaestado`
--
ALTER TABLE `darsenaestado`
  MODIFY `idDarsenaEstado` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `estante`
--
ALTER TABLE `estante`
  MODIFY `idEstante` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `estanteestado`
--
ALTER TABLE `estanteestado`
  MODIFY `idEstanteEstado` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `idFactura` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `func_tiporrhh`
--
ALTER TABLE `func_tiporrhh`
  MODIFY `idFunc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `hojaruta`
--
ALTER TABLE `hojaruta`
  MODIFY `idHojaRuta` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `motivoticket`
--
ALTER TABLE `motivoticket`
  MODIFY `idMotivoTicket` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pallet`
--
ALTER TABLE `pallet`
  MODIFY `idPallet` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `rrhh`
--
ALTER TABLE `rrhh`
  MODIFY `idRRHH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `stagearea`
--
ALTER TABLE `stagearea`
  MODIFY `idStageArea` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `stockcenter`
--
ALTER TABLE `stockcenter`
  MODIFY `idStockCenter` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ticket`
--
ALTER TABLE `ticket`
  MODIFY `idTicket` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipocaja`
--
ALTER TABLE `tipocaja`
  MODIFY `idTipoCaja` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tiporrhh`
--
ALTER TABLE `tiporrhh`
  MODIFY `idTipoRRHH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1008;
--
-- AUTO_INCREMENT de la tabla `tipostagearea`
--
ALTER TABLE `tipostagearea`
  MODIFY `idTipoStageArea` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipotransporte`
--
ALTER TABLE `tipotransporte`
  MODIFY `idTIpoTransporte` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `transporte`
--
ALTER TABLE `transporte`
  MODIFY `idTransporte` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `idAutenticacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
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
  ADD CONSTRAINT `fk_Factura_tiporrhh1` FOREIGN KEY (`tiporrhh_idTipoRRHH`) REFERENCES `tiporrhh` (`idTipoRRHH`);

--
-- Filtros para la tabla `func_tiporrhh`
--
ALTER TABLE `func_tiporrhh`
  ADD CONSTRAINT `fk_func_tiporrhh` FOREIGN KEY (`tiporrhh_idTipoRRHH`) REFERENCES `tiporrhh` (`idTipoRRHH`);

--
-- Filtros para la tabla `hojaruta`
--
ALTER TABLE `hojaruta`
  ADD CONSTRAINT `fk_HojaRuta_Transporte1` FOREIGN KEY (`Transporte_idTransporte`,`Transporte_TIpoTransporte_idTIpoTransporte`,`Transporte_RRHH_idRRHH`,`Transporte_tiporrhh_idTipoRRHH`) REFERENCES `transporte` (`idTransporte`, `TIpoTransporte_idTIpoTransporte`, `RRHH_idRRHH`, `tiporrhh_idTipoRRHH`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `fk_Pedido_tiporrhh1` FOREIGN KEY (`tiporrhh_idTipoRRHH`) REFERENCES `tiporrhh` (`idTipoRRHH`);

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
  ADD CONSTRAINT `fk_StockCenter_tiporrhh1` FOREIGN KEY (`tiporrhh_idTipoRRHH`) REFERENCES `tiporrhh` (`idTipoRRHH`);

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
  ADD CONSTRAINT `fk_Ticket_Transporte1` FOREIGN KEY (`Transporte_idTransporte`,`Transporte_TIpoTransporte_idTIpoTransporte`,`Transporte_RRHH_idRRHH`,`Transporte_tiporrhh_idTipoRRHH`) REFERENCES `transporte` (`idTransporte`, `TIpoTransporte_idTIpoTransporte`, `RRHH_idRRHH`, `tiporrhh_idTipoRRHH`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Ticket_tiporrhh1` FOREIGN KEY (`tiporrhh_idTipoRRHH`) REFERENCES `tiporrhh` (`idTipoRRHH`);

--
-- Filtros para la tabla `transporte`
--
ALTER TABLE `transporte`
  ADD CONSTRAINT `fk_Transporte_RRHH1` FOREIGN KEY (`RRHH_idRRHH`) REFERENCES `rrhh` (`idRRHH`),
  ADD CONSTRAINT `fk_Transporte_TIpoTransporte1` FOREIGN KEY (`TIpoTransporte_idTIpoTransporte`) REFERENCES `tipotransporte` (`idTIpoTransporte`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Transporte_tiporrhh1` FOREIGN KEY (`tiporrhh_idTipoRRHH`) REFERENCES `tiporrhh` (`idTipoRRHH`);

--
-- Filtros para la tabla `transporte_has_caja`
--
ALTER TABLE `transporte_has_caja`
  ADD CONSTRAINT `fk_Transporte_has_Caja_Caja1` FOREIGN KEY (`Caja_idCaja`,`Caja_TipoCaja_idTipoCaja`) REFERENCES `caja` (`idCaja`, `TipoCaja_idTipoCaja`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Transporte_has_Caja_Transporte1` FOREIGN KEY (`Transporte_idTransporte`,`Transporte_TIpoTransporte_idTIpoTransporte`,`Transporte_RRHH_idRRHH`,`Transporte_tiporrhh_idTipoRRHH`) REFERENCES `transporte` (`idTransporte`, `TIpoTransporte_idTIpoTransporte`, `RRHH_idRRHH`, `tiporrhh_idTipoRRHH`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `transporte_has_pallet`
--
ALTER TABLE `transporte_has_pallet`
  ADD CONSTRAINT `fk_Transporte_has_Pallet_Pallet1` FOREIGN KEY (`Pallet_idPallet`) REFERENCES `pallet` (`idPallet`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Transporte_has_Pallet_Transporte1` FOREIGN KEY (`Transporte_idTransporte`,`Transporte_TIpoTransporte_idTIpoTransporte`,`Transporte_RRHH_idRRHH`,`Transporte_tiporrhh_idTipoRRHH`) REFERENCES `transporte` (`idTransporte`, `TIpoTransporte_idTIpoTransporte`, `RRHH_idRRHH`, `tiporrhh_idTipoRRHH`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_Autenticacion_RRHH1` FOREIGN KEY (`RRHH_idRRHH`) REFERENCES `rrhh` (`idRRHH`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Autenticacion_TipoRRHH1` FOREIGN KEY (`tiporrhh_idTipoRRHH`) REFERENCES `tiporrhh` (`idTipoRRHH`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
