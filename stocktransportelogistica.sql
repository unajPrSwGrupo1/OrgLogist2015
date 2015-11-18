-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2015 a las 23:35:42
-- Versión del servidor: 5.6.25
-- Versión de PHP: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `stocktransportelogistica`
--
CREATE DATABASE IF NOT EXISTS `StockTransporteLogistica` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `stocktransportelogistica`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja`
--

DROP TABLE IF EXISTS `caja`;
CREATE TABLE IF NOT EXISTS `caja` (
  `idCaja` int(11) NOT NULL,
  `TipoCaja_idTipoCaja` int(11) NOT NULL,
  `physic` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `caja`
--

INSERT INTO `caja` (`idCaja`, `TipoCaja_idTipoCaja`, `physic`) VALUES
(4, 4, 2),
(2, 1, 3),
(3, 3, 3),
(5, 7, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `idCliente` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Telefono` varchar(45) DEFAULT NULL,
  `Mail` varchar(60) DEFAULT NULL,
  `Direccion` varchar(45) DEFAULT NULL,
  `Descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `Nombre`, `Telefono`, `Mail`, `Direccion`, `Descripcion`) VALUES
(1, 'cli1', '44444444', 'cli1@email.org', 'calle 234', 'comentario sobre cli1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `darsena`
--

DROP TABLE IF EXISTS `darsena`;
CREATE TABLE IF NOT EXISTS `darsena` (
  `idDarsena` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Descripcion` varchar(80) DEFAULT NULL,
  `DarsenaEstado_idDarsenaEstado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `darsenaestado`
--

DROP TABLE IF EXISTS `darsenaestado`;
CREATE TABLE IF NOT EXISTS `darsenaestado` (
  `idDarsenaEstado` int(11) NOT NULL,
  `Estado` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_picking`
--

DROP TABLE IF EXISTS `estado_picking`;
CREATE TABLE IF NOT EXISTS `estado_picking` (
  `id_estado_picking` int(11) NOT NULL,
  `descripcion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_recepcion`
--

DROP TABLE IF EXISTS `estado_recepcion`;
CREATE TABLE IF NOT EXISTS `estado_recepcion` (
  `id_estado_recepcion` int(11) NOT NULL,
  `descripcion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estante`
--

DROP TABLE IF EXISTS `estante`;
CREATE TABLE IF NOT EXISTS `estante` (
  `idEstante` int(11) NOT NULL,
  `Fila` varchar(45) NOT NULL,
  `Columna` varchar(45) NOT NULL,
  `EstanteEstado_idEstanteEstado` int(11) NOT NULL,
  `loadlimit` int(11) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estanteestado`
--

DROP TABLE IF EXISTS `estanteestado`;
CREATE TABLE IF NOT EXISTS `estanteestado` (
  `idEstanteEstado` int(11) NOT NULL,
  `Estado` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estanteestado`
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
-- Estructura de tabla para la tabla `estante_has_caja`
--

DROP TABLE IF EXISTS `estante_has_caja`;
CREATE TABLE IF NOT EXISTS `estante_has_caja` (
  `Estante_idEstante` int(11) NOT NULL,
  `Estante_EstanteEstado_idEstanteEstado` int(11) NOT NULL,
  `Caja_idCaja` int(11) NOT NULL,
  `Caja_TipoCaja_idTipoCaja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

DROP TABLE IF EXISTS `factura`;
CREATE TABLE IF NOT EXISTS `factura` (
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
-- Estructura de tabla para la tabla `factura_has_caja`
--

DROP TABLE IF EXISTS `factura_has_caja`;
CREATE TABLE IF NOT EXISTS `factura_has_caja` (
  `idFacturaCaja` int(11) NOT NULL,
  `idCaja` int(11) NOT NULL,
  `idFactura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `func_tiporrhh`
--

DROP TABLE IF EXISTS `func_tiporrhh`;
CREATE TABLE IF NOT EXISTS `func_tiporrhh` (
  `idFunc` int(11) NOT NULL,
  `link_func` varchar(200) DEFAULT '/basic/web/index.php?r=site/not_has_view',
  `desc_func` varchar(140) DEFAULT NULL,
  `tiporrhh_idTipoRRHH` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `func_tiporrhh`
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
-- Estructura de tabla para la tabla `hojaruta`
--

DROP TABLE IF EXISTS `hojaruta`;
CREATE TABLE IF NOT EXISTS `hojaruta` (
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
-- Estructura de tabla para la tabla `loadlimit`
--

DROP TABLE IF EXISTS `loadlimit`;
CREATE TABLE IF NOT EXISTS `loadlimit` (
  `id` int(11) unsigned NOT NULL,
  `large` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `tall` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `longUnit` enum('mm','cm','dm','m') NOT NULL DEFAULT 'm',
  `weightUnt` enum('mg','g','kg') NOT NULL,
  `descript` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `loadlimit`
--

INSERT INTO `loadlimit` (`id`, `large`, `width`, `tall`, `weight`, `longUnit`, `weightUnt`, `descript`) VALUES
(1, 50, 50, 50, 5000, 'm', 'kg', 'Almacén grande');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `motivoticket`
--

DROP TABLE IF EXISTS `motivoticket`;
CREATE TABLE IF NOT EXISTS `motivoticket` (
  `idMotivoTicket` int(11) NOT NULL,
  `Motivo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento_est_pick`
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
-- Estructura de tabla para la tabla `movimiento_est_recep`
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
-- Estructura de tabla para la tabla `pallet`
--

DROP TABLE IF EXISTS `pallet`;
CREATE TABLE IF NOT EXISTS `pallet` (
  `idPallet` int(11) NOT NULL,
  `cantCajas` int(11) DEFAULT NULL,
  `physic` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pallet_has_caja`
--

DROP TABLE IF EXISTS `pallet_has_caja`;
CREATE TABLE IF NOT EXISTS `pallet_has_caja` (
  `Pallet_idPallet` int(11) NOT NULL,
  `Caja_idCaja` int(11) NOT NULL,
  `descript` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
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
  `Hora` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `physic`
--

DROP TABLE IF EXISTS `physic`;
CREATE TABLE IF NOT EXISTS `physic` (
  `id` int(11) NOT NULL,
  `large` float NOT NULL,
  `tall` float NOT NULL,
  `width` float NOT NULL,
  `maxWeight` float NOT NULL,
  `descript` varchar(45) NOT NULL DEFAULT '"Descipción física"',
  `longUnit` enum('mm','cm','m','hm') NOT NULL DEFAULT 'm',
  `weightUnit` enum('mg','g','Kg','') NOT NULL DEFAULT 'Kg'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `physic`
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
-- Estructura de tabla para la tabla `picking`
--

DROP TABLE IF EXISTS `picking`;
CREATE TABLE IF NOT EXISTS `picking` (
  `num_picking` int(11) NOT NULL,
  `idCaja` int(11) NOT NULL,
  `idPedido` int(11) NOT NULL,
  `cantidad_pedida` int(11) NOT NULL,
  `cantidad_pickeada` int(11) DEFAULT NULL,
  `idEstante` int(11) NOT NULL,
  `idStageArea` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recepcion`
--

DROP TABLE IF EXISTS `recepcion`;
CREATE TABLE IF NOT EXISTS `recepcion` (
  `idRecepcion` int(11) NOT NULL,
  `idFactura` int(11) NOT NULL,
  `idCaja` int(11) NOT NULL,
  `cantidad_esperada` int(11) NOT NULL,
  `cantidad_recibida` int(11) DEFAULT NULL,
  `idEstante` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rrhh`
--

DROP TABLE IF EXISTS `rrhh`;
CREATE TABLE IF NOT EXISTS `rrhh` (
  `idRRHH` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Apellido` varchar(45) NOT NULL,
  `Edad` int(11) NOT NULL,
  `Salario` decimal(10,2) NOT NULL,
  `Jefe` int(11) DEFAULT NULL,
  `descript` varchar(140) NOT NULL,
  `activate` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rrhh`
--

INSERT INTO `rrhh` (`idRRHH`, `Nombre`, `Apellido`, `Edad`, `Salario`, `Jefe`, `descript`, `activate`) VALUES
(10, 'Jose', 'Perez', 22, '1500.00', NULL, 'José Perez 22 años, jefe', 1),
(11, 'Alberto', 'Juarez', 40, '20000.00', 10, 'Alberto Juarez, 40 años', 1),
(13, 'conf', 'configurador', 10, '10.00', 10, 'Comentario sobre el configurador', 1),
(14, 'usuario1', 'apellido1', 99, '99.00', 10, 'Usuario1 Apellido 1', 1),
(15, 'Pancho', 'Ibañez', 54, '34000.00', 10, 'Pancho Ibañes, 54 años', 0),
(16, 'Gerardo', 'Romano', 50, '100.00', 14, 'Gerardo Romano 50', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stagearea`
--

DROP TABLE IF EXISTS `stagearea`;
CREATE TABLE IF NOT EXISTS `stagearea` (
  `idStageArea` int(11) NOT NULL,
  `TipoStageArea_idTipoStageArea` int(11) NOT NULL,
  `loadlimit` int(11) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stagearea_has_pallet`
--

DROP TABLE IF EXISTS `stagearea_has_pallet`;
CREATE TABLE IF NOT EXISTS `stagearea_has_pallet` (
  `StageArea_idStageArea` int(11) NOT NULL,
  `StageArea_TipoStageArea_idTipoStageArea` int(11) NOT NULL,
  `Pallet_idPallet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stockcenter`
--

DROP TABLE IF EXISTS `stockcenter`;
CREATE TABLE IF NOT EXISTS `stockcenter` (
  `idStockCenter` int(11) NOT NULL,
  `CantEstantes` int(11) NOT NULL,
  `RRHH_idRRHH` int(11) NOT NULL,
  `tiporrhh_idTipoRRHH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stockcenter_has_caja`
--

DROP TABLE IF EXISTS `stockcenter_has_caja`;
CREATE TABLE IF NOT EXISTS `stockcenter_has_caja` (
  `StockCenter_idStockCenter` int(11) NOT NULL,
  `Caja_idCaja` int(11) NOT NULL,
  `Caja_TipoCaja_idTipoCaja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stockcenter_has_darsena`
--

DROP TABLE IF EXISTS `stockcenter_has_darsena`;
CREATE TABLE IF NOT EXISTS `stockcenter_has_darsena` (
  `StockCenter_idStockCenter` int(11) NOT NULL,
  `Darsena_idDarsena` int(11) NOT NULL,
  `Darsena_DarsenaEstado_idDarsenaEstado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stockcenter_has_estante`
--

DROP TABLE IF EXISTS `stockcenter_has_estante`;
CREATE TABLE IF NOT EXISTS `stockcenter_has_estante` (
  `StockCenter_idStockCenter` int(11) NOT NULL,
  `Estante_idEstante` int(11) NOT NULL,
  `Estante_EstanteEstado_idEstanteEstado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stockcenter_has_stagearea`
--

DROP TABLE IF EXISTS `stockcenter_has_stagearea`;
CREATE TABLE IF NOT EXISTS `stockcenter_has_stagearea` (
  `StockCenter_idStockCenter` int(11) NOT NULL,
  `StageArea_idStageArea` int(11) NOT NULL,
  `StageArea_TipoStageArea_idTipoStageArea` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket`
--

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE IF NOT EXISTS `ticket` (
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

DROP TABLE IF EXISTS `tipocaja`;
CREATE TABLE IF NOT EXISTS `tipocaja` (
  `idTipoCaja` int(11) NOT NULL,
  `Tipo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipocaja`
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
-- Estructura de tabla para la tabla `tiporrhh`
--

DROP TABLE IF EXISTS `tiporrhh`;
CREATE TABLE IF NOT EXISTS `tiporrhh` (
  `idTipoRRHH` int(11) NOT NULL,
  `Tipo` varchar(45) DEFAULT NULL,
  `descript` varchar(140) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1008 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tiporrhh`
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
-- Estructura de tabla para la tabla `tipostagearea`
--

DROP TABLE IF EXISTS `tipostagearea`;
CREATE TABLE IF NOT EXISTS `tipostagearea` (
  `idTipoStageArea` int(11) NOT NULL,
  `Tipo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipotransporte`
--

DROP TABLE IF EXISTS `tipotransporte`;
CREATE TABLE IF NOT EXISTS `tipotransporte` (
  `idTIpoTransporte` int(11) NOT NULL,
  `Tipo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transporte`
--

DROP TABLE IF EXISTS `transporte`;
CREATE TABLE IF NOT EXISTS `transporte` (
  `idTransporte` int(11) NOT NULL,
  `Matricula` varchar(45) NOT NULL,
  `TIpoTransporte_idTIpoTransporte` int(11) NOT NULL,
  `RRHH_idRRHH` int(11) NOT NULL,
  `tiporrhh_idTipoRRHH` int(11) NOT NULL,
  `loadlimit` int(11) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transporte_has_caja`
--

DROP TABLE IF EXISTS `transporte_has_caja`;
CREATE TABLE IF NOT EXISTS `transporte_has_caja` (
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

DROP TABLE IF EXISTS `transporte_has_pallet`;
CREATE TABLE IF NOT EXISTS `transporte_has_pallet` (
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

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
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
  `activate` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`idAutenticacion`, `username`, `password`, `Mail`, `Authkey`, `Token`, `RRHH_idRRHH`, `tiporrhh_idTipoRRHH`, `Fecha`, `Hora`, `activate`) VALUES
(100, 'admin', '00Ko3aqrA3ETk', 'cualqui@gmail.com', '93ead2876301dbb34f9ae1a73430ade9629ab8872ef500ea6daa5b8f51654a513415302b487afbbbfccbda192d4def57ad243b5ea3ef401a23c5434d6f0b5c85f1082cc2518f7f0f92b3c679bea608250848a715efbc5124a3ec0bc1fcd6b5114c0498fe', 'e009894838b9ad0004c1048a6f45daa1011f0bda9f9a3009a211df195b58b602d7738b38138a9eaa711b78a2a61c275552f3491b30c24c323b30948a10dad8680b2bbac40edb063a7d078f8f5bf9ab81d02e04979c8092076754c3985e7506d3c583081f', 10, 1000, '2015-09-08', '12:22:24', 1),
(101, 'conf', '003308eA/mHG2', 'mailconf@yahoo.com', 'a9351cf9c4085ea6a5cb499b8db92cf2b9e3b32de9c9ec6e78027f36356b7b49b82c2b06b35f61440ace06a916ae84e936cb7378c2e9a930a641340a11ffc3f5026db3cec1dc17314d8d8fef6359db433174ba9d2d09b915df9b4e018c0bdb563314308c', '3eb4e201803349a2b14e3fbc8262844296dee46caf64f6d1e767c7abf64e1e71bb5f52257e0db34000d3de53af82469675c2e5dc94fbe915f5e39ada0b3b7375e9d34154ba6f9daf9f890b96d37bc56149ae1592558599a8e884a81e1ef39ba4ba9268a1', 13, 1007, '2015-10-14', '07:39:19', 1),
(104, 'usuario1', '00u1MCE2Fd2Vc', 'danielrosatto@gmail.com', 'a7417c72ec82a7e7ea9116b70ba6ec3eae6714f66ee7b250347b1998a95ece3c2faa90664a463fcdaae19e0adbe0f728d28d859353ff91292712b72f865d4dc76bb56ae24474cf34dace74351e9b2c9feaaabf36900b6a59a8d8274ab4b46b9bc9bee5ae', 'b1f81b829c029a2a5452643935d80ed2520c3f431bc0c517fcfc78b13e0a332eb915fcf6d1d0c5d2825516cbb2b4b49d30993e5769d840129ce0901b935bd5e7bd65212e05cbc43b6716e97e23f5e3307fbf744ef7f2193e7babb7f315f5f8bcdd2a7cfd', 14, 1004, NULL, NULL, 1),
(111, 'usuario2', '008AVlQ0UTZ2U', 'danielrosatto@gmail.com', '3fb93ceb2789f7d43a155b8f9195460ec1d6428cf6c430fd078b8718e139e9d110db9bee70917e4eb30a0784e1320797dd9ced1c40315d676c7d957ec173f602a05e4d0e496fd2da4bd46b8935382a120d7a1dfbdb11442f559278213b0cc842c2235849', 'ab1469a25aa283a25147fff178a375377a2392b43cd16da155faa5284321ebecb65af758a807c1f7c48df0ba931e56063c79a28b1e836d188fbe6de576a220fc3cb3595ce45a8d963bbfe0bccb552a7bc95781adb6d99c52d772d85fa0b219448f1762a7', 14, 1005, NULL, NULL, 1),
(112, 'Jorge', '00k9koU7t.btE', 'jorgeoscargamez@gmail.com', '8b4721dbced629ba7f8166ac4a05c14c093ce8578ab596b86959981b70d6a92d6ef885b91c79e99b3807a0607d8e66f3a899f80194142145edac9e9b601c0a90c820512fe29530e4791652ac298f9322ce8d902225eb2469ea760c93d8d9f39aabd0b50c', '3f28ffb531ac9c605cf938d96dfaa0cc3f4baff66eb8f213c70e540d05f981620543460e72bb4eab08fa650884ee48eec122b20b6b83702a3fcc4df8e8a9e54052e705ef3a31887f3c730ace224a5888ca813e98e0d566aa1e01ae6b43d1b1b628f25c37', 10, 1005, NULL, NULL, 1),
(113, 'Jorge2', '00k9koU7t.btE', 'eltravieso@comilon.com', '9c2283df7a8795da705f1eb72b58ba22675c45e7ff197ab27139176ec799c6a9aff5754dc309bef8e0816e74d238319e45ecf302f5575f9bbd2613f73b3509e13940de3484035f9dd93a36c8f2a030919bf328b4721dbced629ba7f8166ac4a05c14c093', 'ce8578ab596b86959981b70d6a92d6ef885b91c79e99b3807a0607d8e66f3a899f80194142145edac9e9b601c0a90c820512fe29530e4791652ac298f9322ce8d902225eb2469ea760c93d8d9f39aabd0b50c3f28ffb531ac9c605cf938d96dfaa0cc3f4', 10, 1005, NULL, NULL, 0),
(117, 'rom', '00UW736R5QFJU', 'dominio3@hotmail.com', '9a70e45665207e1d19e0b7c9626c8a161a8e84e1dfe48fd58d6a4acfcfab8e5a71730952309e7684d7c9b2ab12c06864ae4d54aa662e4309060ff05e3bbb2864c00e96d77295f6740c2a25f63a9cce39c994adea74d19fb5f83c3f742f534af5a801abd4', '4c030eebc91410d9ebf0ac876c548ea3fa1b53e871d1e6138c63f40f079c38589f098edb0f75833313cc125d88abd7e409cd9f94720e1539700b1590de9f5c5569778643cc6e8d16c320ffaa1b6aa8ac9f0753c7eca3ccd8ed1bbfaa3e1ae9d9ab6d0632', 16, 1001, NULL, NULL, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `caja`
--
ALTER TABLE `caja`
  ADD PRIMARY KEY (`idCaja`,`TipoCaja_idTipoCaja`),
  ADD KEY `fk_Caja_TipoCaja1_idx` (`TipoCaja_idTipoCaja`),
  ADD KEY `physic` (`physic`);

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
-- Indices de la tabla `estado_picking`
--
ALTER TABLE `estado_picking`
  ADD PRIMARY KEY (`id_estado_picking`);

--
-- Indices de la tabla `estado_recepcion`
--
ALTER TABLE `estado_recepcion`
  ADD PRIMARY KEY (`id_estado_recepcion`);

--
-- Indices de la tabla `estante`
--
ALTER TABLE `estante`
  ADD PRIMARY KEY (`idEstante`,`EstanteEstado_idEstanteEstado`),
  ADD UNIQUE KEY `loadlimit_2` (`loadlimit`),
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
-- Indices de la tabla `factura_has_caja`
--
ALTER TABLE `factura_has_caja`
  ADD PRIMARY KEY (`idFacturaCaja`);

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
-- Indices de la tabla `loadlimit`
--
ALTER TABLE `loadlimit`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `motivoticket`
--
ALTER TABLE `motivoticket`
  ADD PRIMARY KEY (`idMotivoTicket`);

--
-- Indices de la tabla `pallet`
--
ALTER TABLE `pallet`
  ADD PRIMARY KEY (`idPallet`),
  ADD KEY `physic` (`physic`);

--
-- Indices de la tabla `pallet_has_caja`
--
ALTER TABLE `pallet_has_caja`
  ADD PRIMARY KEY (`Pallet_idPallet`,`Caja_idCaja`) USING BTREE,
  ADD KEY `fk_Pallet_has_Caja_Pallet1_idx` (`Pallet_idPallet`),
  ADD KEY `fk_Pallet_has_Caja_Caja1_idx` (`Caja_idCaja`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idPedido`,`RRHH_idRRHH`,`tiporrhh_idTipoRRHH`,`Cliente_idCliente`),
  ADD KEY `fk_Pedido_RRHH1_idx` (`RRHH_idRRHH`,`tiporrhh_idTipoRRHH`),
  ADD KEY `fk_Pedido_Cliente1_idx` (`Cliente_idCliente`),
  ADD KEY `fk_Pedido_tiporrhh1` (`tiporrhh_idTipoRRHH`);

--
-- Indices de la tabla `physic`
--
ALTER TABLE `physic`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `picking`
--
ALTER TABLE `picking`
  ADD PRIMARY KEY (`num_picking`);

--
-- Indices de la tabla `recepcion`
--
ALTER TABLE `recepcion`
  ADD PRIMARY KEY (`idRecepcion`);

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
  ADD KEY `fk_StageArea_TipoStageArea_idx` (`TipoStageArea_idTipoStageArea`),
  ADD KEY `loadlimit` (`loadlimit`);

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
  ADD KEY `fk_Transporte_tiporrhh1` (`tiporrhh_idTipoRRHH`),
  ADD KEY `loadlimit` (`loadlimit`);

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
  MODIFY `idCaja` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
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
  MODIFY `idEstanteEstado` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `idFactura` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `func_tiporrhh`
--
ALTER TABLE `func_tiporrhh`
  MODIFY `idFunc` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
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
-- AUTO_INCREMENT de la tabla `physic`
--
ALTER TABLE `physic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `rrhh`
--
ALTER TABLE `rrhh`
  MODIFY `idRRHH` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
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
  MODIFY `idTipoCaja` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `tiporrhh`
--
ALTER TABLE `tiporrhh`
  MODIFY `idTipoRRHH` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1008;
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
  MODIFY `idAutenticacion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=118;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `caja`
--
ALTER TABLE `caja`
  ADD CONSTRAINT `fk_Caja_TipoCaja1` FOREIGN KEY (`TipoCaja_idTipoCaja`) REFERENCES `tipocaja` (`idTipoCaja`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_physic1` FOREIGN KEY (`physic`) REFERENCES `physic` (`id`);

--
-- Filtros para la tabla `darsena`
--
ALTER TABLE `darsena`
  ADD CONSTRAINT `fk_Darsena_DarsenaEstado1` FOREIGN KEY (`DarsenaEstado_idDarsenaEstado`) REFERENCES `darsenaestado` (`idDarsenaEstado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `estante`
--
ALTER TABLE `estante`
  ADD CONSTRAINT `fk_Estante_EstanteEstado1` FOREIGN KEY (`EstanteEstado_idEstanteEstado`) REFERENCES `estanteestado` (`idEstanteEstado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Loadlimit` FOREIGN KEY (`loadlimit`) REFERENCES `loadlimit` (`id`);

--
-- Filtros para la tabla `estante_has_caja`
--
ALTER TABLE `estante_has_caja`
  ADD CONSTRAINT `fk_Estante_has_Caja_Caja1` FOREIGN KEY (`Caja_idCaja`, `Caja_TipoCaja_idTipoCaja`) REFERENCES `caja` (`idCaja`, `TipoCaja_idTipoCaja`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Estante_has_Caja_Estante1` FOREIGN KEY (`Estante_idEstante`, `Estante_EstanteEstado_idEstanteEstado`) REFERENCES `estante` (`idEstante`, `EstanteEstado_idEstanteEstado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `fk_HojaRuta_Transporte1` FOREIGN KEY (`Transporte_idTransporte`, `Transporte_TIpoTransporte_idTIpoTransporte`, `Transporte_RRHH_idRRHH`, `Transporte_tiporrhh_idTipoRRHH`) REFERENCES `transporte` (`idTransporte`, `TIpoTransporte_idTIpoTransporte`, `RRHH_idRRHH`, `tiporrhh_idTipoRRHH`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pallet`
--
ALTER TABLE `pallet`
  ADD CONSTRAINT `fk_physic` FOREIGN KEY (`physic`) REFERENCES `physic` (`id`);

--
-- Filtros para la tabla `pallet_has_caja`
--
ALTER TABLE `pallet_has_caja`
  ADD CONSTRAINT `fk_Pallet_has_Caja_Caja1` FOREIGN KEY (`Caja_idCaja`) REFERENCES `caja` (`idCaja`) ON DELETE NO ACTION ON UPDATE NO ACTION,
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
  ADD CONSTRAINT `fk_Loadlimit3` FOREIGN KEY (`loadlimit`) REFERENCES `loadlimit` (`id`),
  ADD CONSTRAINT `fk_StageArea_TipoStageArea` FOREIGN KEY (`TipoStageArea_idTipoStageArea`) REFERENCES `tipostagearea` (`idTipoStageArea`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `stagearea_has_pallet`
--
ALTER TABLE `stagearea_has_pallet`
  ADD CONSTRAINT `fk_StageArea_has_Pallet_Pallet1` FOREIGN KEY (`Pallet_idPallet`) REFERENCES `pallet` (`idPallet`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_StageArea_has_Pallet_StageArea1` FOREIGN KEY (`StageArea_idStageArea`, `StageArea_TipoStageArea_idTipoStageArea`) REFERENCES `stagearea` (`idStageArea`, `TipoStageArea_idTipoStageArea`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `fk_StockCenter_has_Caja_Caja1` FOREIGN KEY (`Caja_idCaja`, `Caja_TipoCaja_idTipoCaja`) REFERENCES `caja` (`idCaja`, `TipoCaja_idTipoCaja`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_StockCenter_has_Caja_StockCenter1` FOREIGN KEY (`StockCenter_idStockCenter`) REFERENCES `stockcenter` (`idStockCenter`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `stockcenter_has_darsena`
--
ALTER TABLE `stockcenter_has_darsena`
  ADD CONSTRAINT `fk_StockCenter_has_Darsena_Darsena1` FOREIGN KEY (`Darsena_idDarsena`, `Darsena_DarsenaEstado_idDarsenaEstado`) REFERENCES `darsena` (`idDarsena`, `DarsenaEstado_idDarsenaEstado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_StockCenter_has_Darsena_StockCenter1` FOREIGN KEY (`StockCenter_idStockCenter`) REFERENCES `stockcenter` (`idStockCenter`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `stockcenter_has_estante`
--
ALTER TABLE `stockcenter_has_estante`
  ADD CONSTRAINT `fk_StockCenter_has_Estante_Estante1` FOREIGN KEY (`Estante_idEstante`, `Estante_EstanteEstado_idEstanteEstado`) REFERENCES `estante` (`idEstante`, `EstanteEstado_idEstanteEstado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_StockCenter_has_Estante_StockCenter1` FOREIGN KEY (`StockCenter_idStockCenter`) REFERENCES `stockcenter` (`idStockCenter`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `stockcenter_has_stagearea`
--
ALTER TABLE `stockcenter_has_stagearea`
  ADD CONSTRAINT `fk_StockCenter_has_StageArea_StageArea1` FOREIGN KEY (`StageArea_idStageArea`, `StageArea_TipoStageArea_idTipoStageArea`) REFERENCES `stagearea` (`idStageArea`, `TipoStageArea_idTipoStageArea`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_StockCenter_has_StageArea_StockCenter1` FOREIGN KEY (`StockCenter_idStockCenter`) REFERENCES `stockcenter` (`idStockCenter`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `fk_Ticket_MotivoTicket1` FOREIGN KEY (`MotivoTicket_idMotivoTicket`) REFERENCES `motivoticket` (`idMotivoTicket`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Ticket_RRHH1` FOREIGN KEY (`RRHH_idRRHH`) REFERENCES `rrhh` (`idRRHH`),
  ADD CONSTRAINT `fk_Ticket_Transporte1` FOREIGN KEY (`Transporte_idTransporte`, `Transporte_TIpoTransporte_idTIpoTransporte`, `Transporte_RRHH_idRRHH`, `Transporte_tiporrhh_idTipoRRHH`) REFERENCES `transporte` (`idTransporte`, `TIpoTransporte_idTIpoTransporte`, `RRHH_idRRHH`, `tiporrhh_idTipoRRHH`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Ticket_tiporrhh1` FOREIGN KEY (`tiporrhh_idTipoRRHH`) REFERENCES `tiporrhh` (`idTipoRRHH`);

--
-- Filtros para la tabla `transporte`
--
ALTER TABLE `transporte`
  ADD CONSTRAINT `fk_Loadlimit2` FOREIGN KEY (`loadlimit`) REFERENCES `loadlimit` (`id`),
  ADD CONSTRAINT `fk_Transporte_RRHH1` FOREIGN KEY (`RRHH_idRRHH`) REFERENCES `rrhh` (`idRRHH`),
  ADD CONSTRAINT `fk_Transporte_TIpoTransporte1` FOREIGN KEY (`TIpoTransporte_idTIpoTransporte`) REFERENCES `tipotransporte` (`idTIpoTransporte`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Transporte_tiporrhh1` FOREIGN KEY (`tiporrhh_idTipoRRHH`) REFERENCES `tiporrhh` (`idTipoRRHH`);

--
-- Filtros para la tabla `transporte_has_caja`
--
ALTER TABLE `transporte_has_caja`
  ADD CONSTRAINT `fk_Transporte_has_Caja_Caja1` FOREIGN KEY (`Caja_idCaja`, `Caja_TipoCaja_idTipoCaja`) REFERENCES `caja` (`idCaja`, `TipoCaja_idTipoCaja`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Transporte_has_Caja_Transporte1` FOREIGN KEY (`Transporte_idTransporte`, `Transporte_TIpoTransporte_idTIpoTransporte`, `Transporte_RRHH_idRRHH`, `Transporte_tiporrhh_idTipoRRHH`) REFERENCES `transporte` (`idTransporte`, `TIpoTransporte_idTIpoTransporte`, `RRHH_idRRHH`, `tiporrhh_idTipoRRHH`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `transporte_has_pallet`
--
ALTER TABLE `transporte_has_pallet`
  ADD CONSTRAINT `fk_Transporte_has_Pallet_Pallet1` FOREIGN KEY (`Pallet_idPallet`) REFERENCES `pallet` (`idPallet`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Transporte_has_Pallet_Transporte1` FOREIGN KEY (`Transporte_idTransporte`, `Transporte_TIpoTransporte_idTIpoTransporte`, `Transporte_RRHH_idRRHH`, `Transporte_tiporrhh_idTipoRRHH`) REFERENCES `transporte` (`idTransporte`, `TIpoTransporte_idTIpoTransporte`, `RRHH_idRRHH`, `tiporrhh_idTipoRRHH`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_Autenticacion_RRHH1` FOREIGN KEY (`RRHH_idRRHH`) REFERENCES `rrhh` (`idRRHH`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Autenticacion_TipoRRHH1` FOREIGN KEY (`tiporrhh_idTipoRRHH`) REFERENCES `tiporrhh` (`idTipoRRHH`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
