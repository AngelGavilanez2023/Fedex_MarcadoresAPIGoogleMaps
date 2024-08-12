-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 18-06-2023 a las 02:35:28
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fedex`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cli` int(11) NOT NULL,
  `cedula_cli` varchar(100) NOT NULL,
  `apellidos_cli` varchar(100) NOT NULL,
  `nombres_cli` varchar(100) NOT NULL,
  `direccion_cli` varchar(200) NOT NULL,
  `ciudad_cli` varchar(100) NOT NULL,
  `pais_cli` varchar(50) NOT NULL,
  `telefono_cli` varchar(100) NOT NULL,
  `email_cli` varchar(100) NOT NULL,
  `latitud_cli` varchar(500) NOT NULL,
  `longitud_cli` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cli`, `cedula_cli`, `apellidos_cli`, `nombres_cli`, `direccion_cli`, `ciudad_cli`, `pais_cli`, `telefono_cli`, `email_cli`, `latitud_cli`, `longitud_cli`) VALUES
(1, '0550712962', 'Vaca', 'Luis', 'Calle Simon Bolivar y Benjamin Terán', 'Ambato', 'Ecuador', '0992829599', 'luis@gmail.com', '-1.2516517523430732', '-78.61775636930618'),
(2, '8789', 'kjjhl', 'lkjh', 'kjh', 'lljk', 'lkjh', '987', 'jkh', '-2.4098697409545817', '-76.58403814776814');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_emp` int(11) NOT NULL,
  `cedula_emp` varchar(100) NOT NULL,
  `apellidos_emp` varchar(100) NOT NULL,
  `nombres_emp` varchar(100) NOT NULL,
  `direccion_emp` varchar(200) NOT NULL,
  `ciudad_emp` varchar(100) NOT NULL,
  `pais_emp` varchar(50) NOT NULL,
  `telefono_emp` varchar(100) NOT NULL,
  `email_emp` varchar(100) NOT NULL,
  `cargo_emp` varchar(100) NOT NULL,
  `id_suc` int(11) NOT NULL,
  `id_veh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fedex`
--

CREATE TABLE `fedex` (
  `id_fed` int(11) NOT NULL,
  `nombre_fed` varchar(50) NOT NULL,
  `direccion_fed` varchar(100) NOT NULL,
  `pais_fed` varchar(50) NOT NULL,
  `ciudad_fed` varchar(100) NOT NULL,
  `telefono_fed` varchar(100) NOT NULL,
  `descripcion_fed` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `fedex`
--

INSERT INTO `fedex` (`id_fed`, `nombre_fed`, `direccion_fed`, `pais_fed`, `ciudad_fed`, `telefono_fed`, `descripcion_fed`) VALUES
(1, 'FEDEX MATRIZ', 'Renaissance Center 1715 Aaron Brenner Drive Suite 600', 'EE.UU', 'Memphis', '1800-463-3339', 'FedEx le ofrece una extensa gama de servicios de encomienda. Ya sea que envíe documentos, cajas o fletes, puede contar con FedEx para una entrega rápida y confiable en todo el mundo.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id_ped` int(11) NOT NULL,
  `id_cli` int(11) NOT NULL,
  `fecha_env_ped` date NOT NULL,
  `fecha_ent_ped` date NOT NULL,
  `id_suc` int(11) NOT NULL,
  `destino_ped` varchar(100) NOT NULL,
  `estado_actual_ped` varchar(100) NOT NULL,
  `peso_ped` decimal(28,0) NOT NULL,
  `latitud_ped` varchar(500) NOT NULL,
  `longitud_ped` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `codigo_per` bigint(11) NOT NULL,
  `nombre_per` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil_usuario`
--

CREATE TABLE `perfil_usuario` (
  `codigo_pu` bigint(11) NOT NULL,
  `codigo_usu` bigint(11) NOT NULL,
  `codigo_per` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursales`
--

CREATE TABLE `sucursales` (
  `id_suc` int(11) NOT NULL,
  `nombre_suc` varchar(100) NOT NULL,
  `direccion_suc` varchar(200) NOT NULL,
  `ciudad_suc` varchar(100) NOT NULL,
  `pais_suc` varchar(50) NOT NULL,
  `telefono_suc` varchar(100) NOT NULL,
  `latitud_suc` varchar(500) NOT NULL,
  `longitud_suc` varchar(500) NOT NULL,
  `id_fed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sucursales`
--

INSERT INTO `sucursales` (`id_suc`, `nombre_suc`, `direccion_suc`, `ciudad_suc`, `pais_suc`, `telefono_suc`, `latitud_suc`, `longitud_suc`, `id_fed`) VALUES
(1, 'FEDEX GUAYAQUIL', 'Calle C No 106 y Av. Juan Tanca Marengo', 'Guayaquil', 'Ecuador', '1800033339', '-2.151886838385355', '-79.87793497655308', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `codigo_usu` bigint(11) NOT NULL,
  `nombre_usu` varchar(500) NOT NULL,
  `apellido_usu` varchar(500) NOT NULL,
  `telefono_usu` varchar(20) NOT NULL,
  `email_usu` varchar(200) NOT NULL,
  `password_usu` varchar(500) NOT NULL,
  `estado_usu` tinyint(4) NOT NULL,
  `perfil_usu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`codigo_usu`, `nombre_usu`, `apellido_usu`, `telefono_usu`, `email_usu`, `password_usu`, `estado_usu`, `perfil_usu`) VALUES
(1, 'Administrador', 'del Sistema', '0992829599', 'admin@utc.edu.ec', 'analitica', 1, 'ADMINISTRADOR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id_veh` int(11) NOT NULL,
  `marca_veh` varchar(100) NOT NULL,
  `modelo_veh` varchar(100) NOT NULL,
  `placa_veh` varchar(100) NOT NULL,
  `capacidad_carga_veh` decimal(28,0) NOT NULL,
  `tipo_veh` varchar(100) NOT NULL,
  `estado_veh` varchar(100) NOT NULL,
  `id_suc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cli`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_emp`),
  ADD KEY `id_suc` (`id_suc`),
  ADD KEY `id_veh` (`id_veh`);

--
-- Indices de la tabla `fedex`
--
ALTER TABLE `fedex`
  ADD PRIMARY KEY (`id_fed`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_ped`),
  ADD KEY `id_cli` (`id_cli`),
  ADD KEY `id_suc` (`id_suc`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`codigo_per`);

--
-- Indices de la tabla `perfil_usuario`
--
ALTER TABLE `perfil_usuario`
  ADD PRIMARY KEY (`codigo_pu`),
  ADD KEY `codigo_usu` (`codigo_usu`),
  ADD KEY `codigo_per` (`codigo_per`);

--
-- Indices de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  ADD PRIMARY KEY (`id_suc`),
  ADD KEY `id_fed` (`id_fed`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`codigo_usu`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id_veh`),
  ADD KEY `id_suc` (`id_suc`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_emp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fedex`
--
ALTER TABLE `fedex`
  MODIFY `id_fed` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_ped` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `codigo_per` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `perfil_usuario`
--
ALTER TABLE `perfil_usuario`
  MODIFY `codigo_pu` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  MODIFY `id_suc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `codigo_usu` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id_veh` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`id_suc`) REFERENCES `sucursales` (`id_suc`),
  ADD CONSTRAINT `empleados_ibfk_2` FOREIGN KEY (`id_veh`) REFERENCES `vehiculos` (`id_veh`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`id_cli`) REFERENCES `clientes` (`id_cli`),
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`id_suc`) REFERENCES `sucursales` (`id_suc`);

--
-- Filtros para la tabla `perfil_usuario`
--
ALTER TABLE `perfil_usuario`
  ADD CONSTRAINT `perfil_usuario_ibfk_1` FOREIGN KEY (`codigo_usu`) REFERENCES `usuario` (`codigo_usu`),
  ADD CONSTRAINT `perfil_usuario_ibfk_2` FOREIGN KEY (`codigo_per`) REFERENCES `perfil` (`codigo_per`);

--
-- Filtros para la tabla `sucursales`
--
ALTER TABLE `sucursales`
  ADD CONSTRAINT `sucursales_ibfk_1` FOREIGN KEY (`id_fed`) REFERENCES `fedex` (`id_fed`);

--
-- Filtros para la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD CONSTRAINT `vehiculos_ibfk_1` FOREIGN KEY (`id_suc`) REFERENCES `sucursales` (`id_suc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
