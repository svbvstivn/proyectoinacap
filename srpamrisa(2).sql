-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 23-09-2019 a las 00:11:21
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `srpamrisa`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_categoria`(IN `_idCate` INT(50), IN `_cate` VARCHAR(50), IN `_desc` VARCHAR(50), IN `_current` VARCHAR(50))
    NO SQL
DELETE FROM categoria 
WHERE idCategoria=_idCate$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_categoria`(IN `_categoria` VARCHAR(50), IN `_desc_cate` VARCHAR(50), IN `_currentUser` VARCHAR(50))
    NO SQL
INSERT INTO categoria (categoria, desc_cate, currentUser)
values (_categoria,_desc_cate,_currentUser)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_categoria`(IN `_idCate` INT, IN `_categoria` VARCHAR(50), IN `_desc_cate` VARCHAR(50), IN `_currentUser` VARCHAR(50))
    NO SQL
UPDATE categoria SET categoria=_categoria, desc_cate=_desc_cate,
currentUser=_currentUser WHERE idCategoria=_idCate$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `idCategoria` int(50) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(50) NOT NULL,
  `desc_cate` varchar(150) NOT NULL,
  `currentName` varchar(50) NOT NULL,
  PRIMARY KEY (`idCategoria`),
  UNIQUE KEY `categoria` (`categoria`),
  KEY `idCategoria` (`idCategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `categoria`, `desc_cate`, `currentName`) VALUES
(8, 'alto', 'prioridad alta, cliente frecuente', ''),
(11, 'bajo', 'cliente compra muy poco', 'AMRISA'),
(14, 'medio', 'prioridad regular', '');

--
-- Disparadores `categoria`
--
DROP TRIGGER IF EXISTS `trigger_categoria_delete`;
DELIMITER //
CREATE TRIGGER `trigger_categoria_delete` BEFORE DELETE ON `categoria`
 FOR EACH ROW insert into tabla_auditoria(IdUser, fecha_auditoria, tipo_evento, tabla_afectada,id_afectado) 
values (OLD.currentName,now(),"Eliminar", "categoria", OLD.idCategoria)
//
DELIMITER ;
DROP TRIGGER IF EXISTS `trigger_categoria_insert`;
DELIMITER //
CREATE TRIGGER `trigger_categoria_insert` AFTER INSERT ON `categoria`
 FOR EACH ROW insert into tabla_auditoria(IdUser, fecha_auditoria, tipo_evento, tabla_afectada,id_afectado) 
values (NEW.currentName,now(),"Agregar", "categoria", NEW.idCategoria)
//
DELIMITER ;
DROP TRIGGER IF EXISTS `trigger_categoria_update`;
DELIMITER //
CREATE TRIGGER `trigger_categoria_update` AFTER UPDATE ON `categoria`
 FOR EACH ROW insert into tabla_auditoria(IdUser, fecha_auditoria, tipo_evento, tabla_afectada,id_afectado) 
values (NEW.currentName,now(),"Modificar", "categoria", OLD.idCategoria)
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `desc_producto`
--

CREATE TABLE IF NOT EXISTS `desc_producto` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `IdProducto` int(50) NOT NULL,
  `IdSucursal` int(50) NOT NULL,
  `IdCategoria` int(50) NOT NULL,
  `fecha` date NOT NULL,
  `precio` int(11) NOT NULL,
  `currentName` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `IdProducto_2` (`IdProducto`),
  KEY `IdProducto` (`IdProducto`),
  KEY `IdSucursal` (`IdSucursal`),
  KEY `IdCategoria` (`IdCategoria`),
  KEY `IdProducto_3` (`IdProducto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Disparadores `desc_producto`
--
DROP TRIGGER IF EXISTS `trigger_pedidos_delete`;
DELIMITER //
CREATE TRIGGER `trigger_pedidos_delete` BEFORE DELETE ON `desc_producto`
 FOR EACH ROW insert into tabla_auditoria(IdUser, fecha_auditoria, tipo_evento, tabla_afectada,id_afectado) 
values (OLD.currentName,now(),"Eliminar", "Pedidos", OLD.id)
//
DELIMITER ;
DROP TRIGGER IF EXISTS `trigger_pedidos_insert`;
DELIMITER //
CREATE TRIGGER `trigger_pedidos_insert` AFTER INSERT ON `desc_producto`
 FOR EACH ROW insert into tabla_auditoria(IdUser, fecha_auditoria, tipo_evento, tabla_afectada,id_afectado) 
values (NEW.currentName,now(),"Agregar", "Pedidos", NEW.id)
//
DELIMITER ;
DROP TRIGGER IF EXISTS `trigger_pedidos_update`;
DELIMITER //
CREATE TRIGGER `trigger_pedidos_update` AFTER UPDATE ON `desc_producto`
 FOR EACH ROW insert into tabla_auditoria(IdUser, fecha_auditoria, tipo_evento, tabla_afectada,id_afectado) 
values (NEW.currentName,now(),"Modificar", "Pedidos", NEW.id)
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `IdProducto` int(200) NOT NULL AUTO_INCREMENT,
  `tipoVentilador` varchar(10) NOT NULL,
  `peso` int(50) NOT NULL,
  `espacio` int(50) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `motor` varchar(100) NOT NULL,
  `helice` varchar(100) NOT NULL,
  `precio` int(50) NOT NULL,
  `temperatura` int(11) NOT NULL,
  `currentName` varchar(50) NOT NULL,
  PRIMARY KEY (`IdProducto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Disparadores `productos`
--
DROP TRIGGER IF EXISTS `trigger_producto_delete`;
DELIMITER //
CREATE TRIGGER `trigger_producto_delete` BEFORE DELETE ON `productos`
 FOR EACH ROW insert into tabla_auditoria(IdUser, fecha_auditoria, tipo_evento, tabla_afectada,id_afectado) 
values (OLD.currentName,now(),"Eliminar", "Producto", OLD.IdProducto)
//
DELIMITER ;
DROP TRIGGER IF EXISTS `trigger_producto_insert`;
DELIMITER //
CREATE TRIGGER `trigger_producto_insert` AFTER INSERT ON `productos`
 FOR EACH ROW insert into tabla_auditoria(IdUser, fecha_auditoria, tipo_evento, tabla_afectada,id_afectado) 
values (NEW.currentName,now(),"Agregar", "Producto", NEW.IdProducto)
//
DELIMITER ;
DROP TRIGGER IF EXISTS `trigger_producto_update`;
DELIMITER //
CREATE TRIGGER `trigger_producto_update` AFTER UPDATE ON `productos`
 FOR EACH ROW insert into tabla_auditoria(IdUser, fecha_auditoria, tipo_evento, tabla_afectada,id_afectado) 
values (NEW.currentName,now(),"Modificar", "Producto", OLD.IdProducto)
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursales`
--

CREATE TABLE IF NOT EXISTS `sucursales` (
  `idSucursal` int(50) NOT NULL AUTO_INCREMENT,
  `sucursal` varchar(50) NOT NULL,
  `ubicacion` varchar(100) NOT NULL,
  PRIMARY KEY (`idSucursal`),
  KEY `idSucursal` (`idSucursal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `sucursales`
--

INSERT INTO `sucursales` (`idSucursal`, `sucursal`, `ubicacion`) VALUES
(6, 'Casa Matriz', 'Camino Estacion 297, Buin, Region Metropolitana, Chile.'),
(7, 'Sucursal Avenida Golfo', 'Avenida Golfo de Arauco 3652, Coronel, Region del Bio Bio, Chile.'),
(8, 'Sucursal Puerto Montt', 'Puerto Montt, Ruta 5 sur km 1025, Galpon Bodesur, mÃ³dulo 9 y 10B, Mega Centro, Puerto Montt, Chile.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_auditoria`
--

CREATE TABLE IF NOT EXISTS `tabla_auditoria` (
  `IdAuditoria` int(11) NOT NULL AUTO_INCREMENT,
  `IdUser` varchar(20) NOT NULL,
  `fecha_auditoria` datetime NOT NULL,
  `tipo_evento` varchar(11) NOT NULL,
  `tabla_afectada` varchar(11) NOT NULL,
  `id_afectado` int(11) NOT NULL,
  PRIMARY KEY (`IdAuditoria`),
  KEY `IdUser` (`IdUser`),
  KEY `IdUser_2` (`IdUser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nombreEmpresa` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `tipoUsuario` varchar(20) NOT NULL,
  `foto` varbinary(8000) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id`, `usuario`, `password`, `nombreEmpresa`, `correo`, `descripcion`, `tipoUsuario`, `foto`) VALUES
(1, 'admin', 'admin', 'AMRISA', 'signoner01@gmail.com', 'administrador del sitio', 'administrador', ''),
(2, 'cliente', 'cliente2', 'empresa prueba', 'test@func3.cl', 'prueba cliente', 'cliente', ''),
(4, 'cliente2', 'cliente2', 'FRUGO', 'ventas@frugo.cl', 'frugolitocampeon', 'cliente', ''),
(5, 'zepekeno', 'zepekeno', 'favela', 'zepekeno@ejemplo.cl', 'zepekeno quesucede', 'cliente', ''),
(6, 'eladmin', 'eladmin', 'eladmin', 'eladmin@eladmin.cl', 'eladmin administrador', 'administrador', ''),
(7, 'clint', 'clint', 'clint', 'clint@clint.cl', 'clint el clint', 'cliente', ''),
(8, 'aprobador', 'aprobador', 'AMRISA', 'signoner01@gmail.com', 'aprobador de prueba', 'aprobador', ''),
(9, 'despacho', 'despacho', 'AMRISA', 'signoner01@gmail.com', 'despacho de prueba', 'despacho', '');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `desc_producto`
--
ALTER TABLE `desc_producto`
  ADD CONSTRAINT `desc_producto_ibfk_1` FOREIGN KEY (`IdProducto`) REFERENCES `productos` (`IdProducto`),
  ADD CONSTRAINT `desc_producto_ibfk_2` FOREIGN KEY (`IdSucursal`) REFERENCES `sucursales` (`idSucursal`),
  ADD CONSTRAINT `desc_producto_ibfk_3` FOREIGN KEY (`IdCategoria`) REFERENCES `categoria` (`idCategoria`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
