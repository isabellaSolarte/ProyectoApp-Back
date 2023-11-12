-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-11-2023 a las 04:20:41
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `php_mysql_crud`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `CC_USUARIO` int(11) NOT NULL,
  `SUELDO_ADMIN` int(11) NOT NULL,
  `COMISIONES_ADMIN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`CC_USUARIO`, `SUELDO_ADMIN`, `COMISIONES_ADMIN`) VALUES
(3, 54300, 67800),
(4, 55000, 88700);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atencion_medica`
--

CREATE TABLE `atencion_medica` (
  `FECHA_ATMEDICA` date NOT NULL,
  `CC_USUARIO` int(11) DEFAULT NULL,
  `TIPO_ATMEDICA` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `COD_CATEGORIA` int(11) NOT NULL,
  `NOMBRE_CAT` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`COD_CATEGORIA`, `NOMBRE_CAT`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'D'),
(5, 'E'),
(6, 'F'),
(7, 'G'),
(8, 'H'),
(9, 'I'),
(10, 'J'),
(11, 'K'),
(12, 'L');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `CC_CLIENTE` int(11) NOT NULL,
  `FECHA_ATMEDICA` date DEFAULT NULL,
  `NOMBRE_CLIENTE` varchar(15) NOT NULL,
  `DIR_CLIENTE` varchar(15) NOT NULL,
  `CORREO_CLIENTE` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `ID_COMPRA` int(11) NOT NULL,
  `COD_PRODUCTO` int(11) NOT NULL,
  `CC_USUARIO` int(11) DEFAULT NULL,
  `FECHA_COMPRA` date NOT NULL,
  `VALOR_COMPRA` int(11) NOT NULL,
  `CNT_PRODUCTOS` int(11) NOT NULL,
  `SUBTOTAL_COMPRA` int(11) NOT NULL,
  `PRECIO_UNITARIO_COMPRA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_factura`
--

CREATE TABLE `detalle_factura` (
  `ID_VENTA` int(11) NOT NULL,
  `COD_PROMOCION` int(11) NOT NULL,
  `COD_PRODUCTO` int(11) NOT NULL,
  `CANTIDAD_PRODUCTOS` int(11) NOT NULL,
  `SUBTOTAL_FACTURA` int(11) NOT NULL,
  `PRECIO_UNITARIO_FACTURA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distribucion`
--

CREATE TABLE `distribucion` (
  `COD_PROVEEDOR` int(11) NOT NULL,
  `COD_PRODUCTO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `distribucion`
--

INSERT INTO `distribucion` (`COD_PROVEEDOR`, `COD_PRODUCTO`) VALUES
(1, 5),
(1, 20),
(1, 24),
(1, 25),
(2, 24),
(2, 26),
(3, 5),
(4, 6),
(4, 21),
(5, 17),
(6, 10),
(7, 11),
(8, 12),
(9, 13),
(10, 14),
(11, 15),
(11, 22),
(12, 16),
(13, 8),
(13, 17),
(14, 18),
(15, 19),
(15, 22),
(16, 20),
(17, 21),
(18, 22),
(19, 23),
(20, 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domiciliario`
--

CREATE TABLE `domiciliario` (
  `CC_DOMICILIARIO` int(11) NOT NULL,
  `NOMBRE_DOMICILIARIO` varchar(20) NOT NULL,
  `TEL_DOMICILIARIO` int(11) NOT NULL,
  `DIR_DOMICILIARIO` varchar(20) NOT NULL,
  `CORREO_DOMICILIARIO` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `ID_VENTA` int(11) NOT NULL,
  `CC_CLIENTE` int(11) NOT NULL,
  `CC_DOMICILIARIO` int(11) DEFAULT NULL,
  `CC_USUARIO` int(11) NOT NULL,
  `FECHA_VENTA` date NOT NULL,
  `VALOR_VENTA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `COD_PRODUCTO` int(11) NOT NULL,
  `COD_DEVOLUCION` int(11) DEFAULT NULL,
  `COD_CATEGORIA` int(11) NOT NULL,
  `NOMBRE_PRODUCTO` varchar(15) NOT NULL,
  `PRECIO_PUBLICO_PRD` int(11) NOT NULL,
  `PRECIO_COMPRA_PRD` int(11) NOT NULL,
  `FECHA_VENCIMIENTO_PRD` date NOT NULL,
  `PRODUCTO_CANTIDAD` int(11) NOT NULL,
  `LABORATORIO` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`COD_PRODUCTO`, `COD_DEVOLUCION`, `COD_CATEGORIA`, `NOMBRE_PRODUCTO`, `PRECIO_PUBLICO_PRD`, `PRECIO_COMPRA_PRD`, `FECHA_VENCIMIENTO_PRD`, `PRODUCTO_CANTIDAD`, `LABORATORIO`) VALUES
(5, NULL, 1, 'Acetaminofem', 15000, 18000, '2023-11-02', 3, 'Zenu'),
(6, NULL, 1, 'dolex', 15000, 18000, '2023-10-31', 3, 'Zenu'),
(8, NULL, 5, 'Noraver', 230, 100, '2023-11-08', 3, 'Genfar'),
(9, NULL, 7, 'Aspirina Forte', 10000, 8000, '2023-01-01', 50, 'Laboratorio1'),
(10, NULL, 2, 'Vitamina C', 15000, 12000, '2023-02-01', 30, 'Laboratorio2'),
(11, NULL, 5, 'Paracetamol', 8000, 6000, '2023-03-01', 70, 'Laboratorio3'),
(12, NULL, 3, 'Crema Antibióti', 12000, 10000, '2023-04-01', 40, 'Laboratorio1'),
(13, NULL, 4, 'Desinfectante', 20000, 18000, '2023-05-01', 20, 'Laboratorio2'),
(14, NULL, 1, 'Loratadina', 9000, 7000, '2023-06-01', 60, 'Laboratorio3'),
(15, NULL, 3, 'Termómetro ', 11000, 9000, '2023-07-01', 35, 'Laboratorio1'),
(16, NULL, 6, 'Yodo', 16000, 14000, '2023-08-01', 25, 'Laboratorio2'),
(17, NULL, 9, 'Shampoo', 7500, 5500, '2023-09-01', 80, 'Laboratorio3'),
(18, NULL, 3, 'Gel', 13000, 11000, '2023-10-01', 45, 'Laboratorio1'),
(19, NULL, 8, 'Tintes', 18000, 16000, '2023-11-01', 15, 'Laboratorio2'),
(20, NULL, 2, 'Preservativos', 8500, 6500, '2024-01-12', 55, 'Laboratorio3'),
(21, NULL, 3, 'Enjuague ', 11000, 9000, '2023-12-17', 35, 'Laboratorio1'),
(22, NULL, 4, 'Repelente ', 16000, 14000, '2023-12-27', 25, 'Laboratorio2'),
(23, NULL, 9, 'Desodorante', 7500, 5500, '2023-12-09', 80, 'Laboratorio3'),
(24, NULL, 1, 'Bucoxol', 13000, 11000, '2025-10-10', 45, 'Laboratorio1'),
(25, NULL, 8, 'Labial', 18000, 16000, '2024-11-01', 15, 'Laboratorio2'),
(26, NULL, 2, 'Ensure', 8500, 6500, '2023-12-01', 55, 'Laboratorio3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promocion`
--

CREATE TABLE `promocion` (
  `COD_PROMOCION` int(11) NOT NULL,
  `COD_PRODUCTO` int(11) NOT NULL,
  `FECHAINICIO_PROMO` date NOT NULL,
  `FECHAFIN_PROMO` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `COD_PROVEEDOR` int(11) NOT NULL,
  `NOMBRE_PROVEEDOR` varchar(20) NOT NULL,
  `TEL_PROVEEDOR` varchar(13) NOT NULL,
  `CORREO_PROVEEDOR` varchar(45) NOT NULL,
  `DIR_PROVEEDOR` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`COD_PROVEEDOR`, `NOMBRE_PROVEEDOR`, `TEL_PROVEEDOR`, `CORREO_PROVEEDOR`, `DIR_PROVEEDOR`) VALUES
(1, 'Distribuidora Farmac', '555-1234', 'info@farmadist.com', 'Calle Principal 123'),
(2, 'Suministros Médicos ', '555-5678', 'ventas@suministrosxyz.com', 'Avenida Salud 456'),
(3, 'Productos Terapéutic', '555-9876', 'info@productos-terapeuticos.com', 'Plaza Salud 789'),
(4, 'Distribuidor de Insu', '555-5432', 'contacto@distriinsumosb.com', 'Calle de la Salud 101'),
(5, 'Farmacéuticos Unidos', '555-8765', 'info@farmacosunidos.com', 'Avenida de la Salud 202'),
(6, 'Productos Sanitarios', '555-1111', 'info@productossanitarios.com', 'Calle de la Higiene 303'),
(7, 'Comercializadora Sal', '555-2222', 'ventas@saludintegral.com', 'Avenida del Bienestar 505'),
(8, 'Farmaplus Distribuci', '555-3333', 'info@farmaplusdistri.com', 'Calle de los Remedios 707'),
(9, 'Suministros Médicos ', '555-4444', 'contacto@vidasana-suministros.com', 'Plaza de la Salud 909'),
(10, 'Distribuidora Salud ', '555-5555', 'info@saludybienestar-distribuidora.com', 'Avenida de la Medicina 111'),
(11, 'Farmacia Express Dis', '555-6666', 'info@farmaciaexpress.com', 'Calle de la Farmacia 606'),
(12, 'Productos de Salud I', '555-7777', 'ventas@innovasalud.com', 'Avenida Innovación 707'),
(13, 'Distribuidora de Sum', '555-8888', 'contacto@suministrosmedicosdistri.com', 'Plaza de la Medicina 808'),
(14, 'Productos Terapéutic', '555-9999', 'info@terapeuticoscalidad.com', 'Calle Saludable 909'),
(15, 'Farmacia y Suministr', '555-0000', 'ventas@saludtotal.com', 'Avenida Totalidad 101'),
(16, 'Distribuidora de Pro', '555-1212', 'info@distribuidoraabc.com', 'Calle de la Farmacia 1234'),
(17, 'Productos Sanitarios', '555-2323', 'ventas@sanitariosdelsur.com', 'Avenida del Sur 5678'),
(18, 'Distribuciones de Sa', '555-3434', 'contacto@saludbienestar.com', 'Plaza de la Salud 910'),
(19, 'Suministros Médicos ', '555-4545', 'info@innovadoresmedicos.com', 'Calle de la Innovación 1112'),
(20, 'Distribuidora Farmac', '555-5656', 'ventas@vidasana.com', 'Avenida de la Vida 1314');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regente`
--

CREATE TABLE `regente` (
  `CC_USUARIO` int(11) NOT NULL,
  `CERTIFICADO_REGENTE` longblob NOT NULL,
  `EPS_REGENTE` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `regente`
--

INSERT INTO `regente` (`CC_USUARIO`, `CERTIFICADO_REGENTE`, `EPS_REGENTE`) VALUES
(1, 0x454d5054595f424c4f422829, 'EPS Regente 1'),
(2, 0x454d5054595f424c4f422829, 'EPS Regente 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_devolucion`
--

CREATE TABLE `registro_devolucion` (
  `COD_DEVOLUCION` int(11) NOT NULL,
  `CC_CLIENTE` int(11) NOT NULL,
  `CC_USUARIO` int(11) NOT NULL,
  `FECHA_DEVOLUCION` date NOT NULL,
  `MOTIVO_DEVOLUCION` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte`
--

CREATE TABLE `reporte` (
  `FECHA_REPORTE` date NOT NULL,
  `CC_USUARIO` int(11) NOT NULL,
  `REGISTRO_REPORTE` int(11) NOT NULL,
  `TIPO_REPORTE` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `ID_ROL` int(11) NOT NULL,
  `NOMBRE_ROL` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`ID_ROL`, `NOMBRE_ROL`) VALUES
(1, 'Administrador'),
(2, 'Regente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_promocion`
--

CREATE TABLE `tipo_promocion` (
  `COD_PROMOCION` int(11) NOT NULL,
  `VALOR_PROMOCION` int(11) NOT NULL,
  `DESCRIPCION` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajador`
--

CREATE TABLE `trabajador` (
  `CC_USUARIO` int(11) NOT NULL,
  `NOMBRE_USUARIO` varchar(15) NOT NULL,
  `TEL_USUARIO` varchar(13) NOT NULL,
  `LOGIN_USUARIO` varchar(15) NOT NULL,
  `CONTRASENIA_USUARIO` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `trabajador`
--

INSERT INTO `trabajador` (`CC_USUARIO`, `NOMBRE_USUARIO`, `TEL_USUARIO`, `LOGIN_USUARIO`, `CONTRASENIA_USUARIO`) VALUES
(1, 'Simon Guzmán', '2342567', 'siguzman', '123'),
(2, 'Juan Perez', '555-1234567', 'juanito', '123'),
(3, 'Isabella Solart', '534567', 'isabsolarte', '123'),
(4, 'Daniela Riascos', '13534567', 'driascos', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariorol`
--

CREATE TABLE `usuariorol` (
  `CC_USUARIO` int(11) NOT NULL,
  `ID_ROL` int(11) NOT NULL,
  `FECHAINICIOVIGENCIA` date NOT NULL,
  `FECHAFINVIGENCIA` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuariorol`
--

INSERT INTO `usuariorol` (`CC_USUARIO`, `ID_ROL`, `FECHAINICIOVIGENCIA`, `FECHAFINVIGENCIA`) VALUES
(1, 2, '2023-01-01', '2023-12-31'),
(2, 2, '2023-02-15', '2023-11-30'),
(3, 1, '2023-03-10', '2023-10-15'),
(4, 1, '2023-04-20', '2023-09-30');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`CC_USUARIO`);

--
-- Indices de la tabla `atencion_medica`
--
ALTER TABLE `atencion_medica`
  ADD PRIMARY KEY (`FECHA_ATMEDICA`),
  ADD KEY `FK_EJECUTA` (`CC_USUARIO`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`COD_CATEGORIA`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`CC_CLIENTE`),
  ADD KEY `FK_RECIBE2` (`FECHA_ATMEDICA`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`ID_COMPRA`),
  ADD KEY `FK_DETALLE_COMPRA` (`COD_PRODUCTO`),
  ADD KEY `FK_REALIZA` (`CC_USUARIO`);

--
-- Indices de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD PRIMARY KEY (`ID_VENTA`,`COD_PROMOCION`,`COD_PRODUCTO`),
  ADD KEY `FK_DETALLE_FACTURA1` (`COD_PRODUCTO`),
  ADD KEY `FK_DETALLE_FACTURA3` (`COD_PROMOCION`);

--
-- Indices de la tabla `distribucion`
--
ALTER TABLE `distribucion`
  ADD PRIMARY KEY (`COD_PROVEEDOR`,`COD_PRODUCTO`),
  ADD KEY `FK_DISTRIBUCION` (`COD_PRODUCTO`);

--
-- Indices de la tabla `domiciliario`
--
ALTER TABLE `domiciliario`
  ADD PRIMARY KEY (`CC_DOMICILIARIO`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`ID_VENTA`),
  ADD KEY `FK_DESPACHA` (`CC_DOMICILIARIO`),
  ADD KEY `FK_REALIZA2` (`CC_CLIENTE`),
  ADD KEY `FK_REGISTRA` (`CC_USUARIO`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`COD_PRODUCTO`),
  ADD KEY `FK_CONTIENE3` (`COD_DEVOLUCION`),
  ADD KEY `FK_SE_CLASIFICA` (`COD_CATEGORIA`);

--
-- Indices de la tabla `promocion`
--
ALTER TABLE `promocion`
  ADD PRIMARY KEY (`COD_PROMOCION`,`COD_PRODUCTO`,`FECHAINICIO_PROMO`),
  ADD KEY `FK_SE_APLICA` (`COD_PRODUCTO`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`COD_PROVEEDOR`);

--
-- Indices de la tabla `regente`
--
ALTER TABLE `regente`
  ADD PRIMARY KEY (`CC_USUARIO`);

--
-- Indices de la tabla `registro_devolucion`
--
ALTER TABLE `registro_devolucion`
  ADD PRIMARY KEY (`COD_DEVOLUCION`),
  ADD KEY `FK_REGISTRA2` (`CC_USUARIO`),
  ADD KEY `FK_SOLICITA` (`CC_CLIENTE`);

--
-- Indices de la tabla `reporte`
--
ALTER TABLE `reporte`
  ADD PRIMARY KEY (`FECHA_REPORTE`),
  ADD KEY `FK_REGISTRA3` (`CC_USUARIO`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`ID_ROL`);

--
-- Indices de la tabla `tipo_promocion`
--
ALTER TABLE `tipo_promocion`
  ADD PRIMARY KEY (`COD_PROMOCION`);

--
-- Indices de la tabla `trabajador`
--
ALTER TABLE `trabajador`
  ADD PRIMARY KEY (`CC_USUARIO`);

--
-- Indices de la tabla `usuariorol`
--
ALTER TABLE `usuariorol`
  ADD PRIMARY KEY (`CC_USUARIO`,`ID_ROL`,`FECHAINICIOVIGENCIA`),
  ADD KEY `FK_TIENE4` (`ID_ROL`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `COD_PRODUCTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `FK_ADMINISTRADOR_USUARIO` FOREIGN KEY (`CC_USUARIO`) REFERENCES `trabajador` (`CC_USUARIO`);

--
-- Filtros para la tabla `atencion_medica`
--
ALTER TABLE `atencion_medica`
  ADD CONSTRAINT `FK_EJECUTA` FOREIGN KEY (`CC_USUARIO`) REFERENCES `regente` (`CC_USUARIO`);

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `FK_RECIBE2` FOREIGN KEY (`FECHA_ATMEDICA`) REFERENCES `atencion_medica` (`FECHA_ATMEDICA`);

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `FK_DETALLE_COMPRA` FOREIGN KEY (`COD_PRODUCTO`) REFERENCES `producto` (`COD_PRODUCTO`),
  ADD CONSTRAINT `FK_REALIZA` FOREIGN KEY (`CC_USUARIO`) REFERENCES `administrador` (`CC_USUARIO`);

--
-- Filtros para la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD CONSTRAINT `FK_DETALLE_FACTURA1` FOREIGN KEY (`COD_PRODUCTO`) REFERENCES `producto` (`COD_PRODUCTO`),
  ADD CONSTRAINT `FK_DETALLE_FACTURA2` FOREIGN KEY (`ID_VENTA`) REFERENCES `factura` (`ID_VENTA`),
  ADD CONSTRAINT `FK_DETALLE_FACTURA3` FOREIGN KEY (`COD_PROMOCION`) REFERENCES `tipo_promocion` (`COD_PROMOCION`);

--
-- Filtros para la tabla `distribucion`
--
ALTER TABLE `distribucion`
  ADD CONSTRAINT `FK_DISTRIBUCION` FOREIGN KEY (`COD_PRODUCTO`) REFERENCES `producto` (`COD_PRODUCTO`),
  ADD CONSTRAINT `FK_DISTRIBUCION2` FOREIGN KEY (`COD_PROVEEDOR`) REFERENCES `proveedor` (`COD_PROVEEDOR`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `FK_DESPACHA` FOREIGN KEY (`CC_DOMICILIARIO`) REFERENCES `domiciliario` (`CC_DOMICILIARIO`),
  ADD CONSTRAINT `FK_REALIZA2` FOREIGN KEY (`CC_CLIENTE`) REFERENCES `cliente` (`CC_CLIENTE`),
  ADD CONSTRAINT `FK_REGISTRA` FOREIGN KEY (`CC_USUARIO`) REFERENCES `regente` (`CC_USUARIO`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `FK_CONTIENE3` FOREIGN KEY (`COD_DEVOLUCION`) REFERENCES `registro_devolucion` (`COD_DEVOLUCION`),
  ADD CONSTRAINT `FK_SE_CLASIFICA` FOREIGN KEY (`COD_CATEGORIA`) REFERENCES `categoria` (`COD_CATEGORIA`);

--
-- Filtros para la tabla `promocion`
--
ALTER TABLE `promocion`
  ADD CONSTRAINT `FK_CUENTA_CON` FOREIGN KEY (`COD_PROMOCION`) REFERENCES `tipo_promocion` (`COD_PROMOCION`),
  ADD CONSTRAINT `FK_SE_APLICA` FOREIGN KEY (`COD_PRODUCTO`) REFERENCES `producto` (`COD_PRODUCTO`);

--
-- Filtros para la tabla `regente`
--
ALTER TABLE `regente`
  ADD CONSTRAINT `FK_REGENTE_USUARIO` FOREIGN KEY (`CC_USUARIO`) REFERENCES `trabajador` (`CC_USUARIO`);

--
-- Filtros para la tabla `registro_devolucion`
--
ALTER TABLE `registro_devolucion`
  ADD CONSTRAINT `FK_REGISTRA2` FOREIGN KEY (`CC_USUARIO`) REFERENCES `regente` (`CC_USUARIO`),
  ADD CONSTRAINT `FK_SOLICITA` FOREIGN KEY (`CC_CLIENTE`) REFERENCES `cliente` (`CC_CLIENTE`);

--
-- Filtros para la tabla `reporte`
--
ALTER TABLE `reporte`
  ADD CONSTRAINT `FK_REGISTRA3` FOREIGN KEY (`CC_USUARIO`) REFERENCES `regente` (`CC_USUARIO`);

--
-- Filtros para la tabla `usuariorol`
--
ALTER TABLE `usuariorol`
  ADD CONSTRAINT `FK_TIENE4` FOREIGN KEY (`ID_ROL`) REFERENCES `rol` (`ID_ROL`),
  ADD CONSTRAINT `FK_USUARIOROL_USUARIO` FOREIGN KEY (`CC_USUARIO`) REFERENCES `trabajador` (`CC_USUARIO`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
