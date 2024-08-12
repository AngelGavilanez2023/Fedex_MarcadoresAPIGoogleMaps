-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-06-2023 a las 21:52:37
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

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
  `id_cli` varchar(10) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cli`, `cedula_cli`, `apellidos_cli`, `nombres_cli`, `direccion_cli`, `ciudad_cli`, `pais_cli`, `telefono_cli`, `email_cli`, `latitud_cli`, `longitud_cli`) VALUES
('cli001', '0550712962', 'Vaca', 'Luis', 'Calle Simon Bolivar y Benjamin Terán', 'Ambato', 'Ecuador', '0992829599', 'luis@gmail.com', '-1.2516517523430732', '-78.61775636930618'),
('cli002', '0555071234', 'kjjhl', 'lkjh', 'kjh', 'lljk', 'lkjh', '987', 'jkh', '-2.4098697409545817', '-76.58403814776814'),
('cli003', '0750520967', 'Asanza Orozco', 'Carlos Javier', 'Av. Simon Rodriguez y calle Nicaragua', 'Latacunga', 'Ecuador', '0963129283', 'carlosasanza15072001@gmail.com', '-0.9210029682717181', '-78.63180012448704'),
('cli004', '0550712962', 'Gavilanez Guanoluisa', 'Angel Rodrigo', 'San Felipe, Calle Paraguay y 10 de Agosto', 'Latacunga', 'Peru', '0992829599', 'angel.gavilanes2962@utc.edu.ec', '-5.193979440857222', '-80.62700689776814'),
('cli005', '1234567890', 'Quiroga Quizhpe', 'Chanel Carolina', 'Calle México', 'Latacunga', 'Ecuador', '0963129299', 'chanelquiroga@gmail.com', '-0.919994587831562', '-78.63116444095051');

--
-- Disparadores `clientes`
--
DELIMITER $$
CREATE TRIGGER `trg_clientes_id` BEFORE INSERT ON `clientes` FOR EACH ROW BEGIN
  DECLARE next_id INT;
  SET next_id = (SELECT COALESCE(MAX(CAST(SUBSTRING(id_cli, 4) AS UNSIGNED)), 0) + 1 FROM clientes);
  SET NEW.id_cli = CONCAT('cli', LPAD(next_id, 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_emp` varchar(10) NOT NULL,
  `cedula_emp` varchar(100) NOT NULL,
  `apellidos_emp` varchar(100) NOT NULL,
  `nombres_emp` varchar(100) NOT NULL,
  `direccion_emp` varchar(200) NOT NULL,
  `ciudad_emp` varchar(100) NOT NULL,
  `pais_emp` varchar(50) NOT NULL,
  `telefono_emp` varchar(100) NOT NULL,
  `email_emp` varchar(100) NOT NULL,
  `cargo_emp` varchar(100) NOT NULL,
  `id_suc` varchar(10) NOT NULL,
  `id_veh` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Disparadores `empleados`
--
DELIMITER $$
CREATE TRIGGER `trg_empleados_id` BEFORE INSERT ON `empleados` FOR EACH ROW BEGIN
  DECLARE next_id INT;
  SET next_id = (SELECT COALESCE(MAX(CAST(SUBSTRING(id_emp, 4) AS UNSIGNED)), 0) + 1 FROM empleados);
  SET NEW.id_emp = CONCAT('emp', LPAD(next_id, 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fedex`
--

CREATE TABLE `fedex` (
  `id_fed` varchar(10) NOT NULL,
  `nombre_fed` varchar(50) NOT NULL,
  `direccion_fed` varchar(100) NOT NULL,
  `pais_fed` varchar(50) NOT NULL,
  `ciudad_fed` varchar(100) NOT NULL,
  `telefono_fed` varchar(100) NOT NULL,
  `descripcion_fed` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `fedex`
--

INSERT INTO `fedex` (`id_fed`, `nombre_fed`, `direccion_fed`, `pais_fed`, `ciudad_fed`, `telefono_fed`, `descripcion_fed`) VALUES
('fed001', 'FEDEX MATRIZ', 'Renaissance Center 1715 Aaron Brenner Drive Suite 600', 'EE.UU', 'Memphis', '1800-463-3339', 'FedEx le ofrece una extensa gama de servicios de encomienda. Ya sea que envíe documentos, cajas o fletes, puede contar con FedEx para una entrega rápida y confiable en todo el mundo.');

--
-- Disparadores `fedex`
--
DELIMITER $$
CREATE TRIGGER `trg_FedEx_id` BEFORE INSERT ON `fedex` FOR EACH ROW BEGIN
  DECLARE next_id INT;
  SET next_id = (SELECT COALESCE(MAX(CAST(SUBSTRING(id_fed, 4) AS UNSIGNED)), 0) + 1 FROM FedEx);
  SET NEW.id_fed = CONCAT('fed', LPAD(next_id, 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id_ped` varchar(10) NOT NULL,
  `id_cli` varchar(10) NOT NULL,
  `fecha_env_ped` date NOT NULL,
  `fecha_ent_ped` date NOT NULL,
  `id_suc` varchar(10) NOT NULL,
  `destino_ped` varchar(100) NOT NULL,
  `estado_actual_ped` varchar(100) NOT NULL,
  `peso_ped` decimal(28,0) NOT NULL,
  `latitud_ped` varchar(500) NOT NULL,
  `longitud_ped` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id_ped`, `id_cli`, `fecha_env_ped`, `fecha_ent_ped`, `id_suc`, `destino_ped`, `estado_actual_ped`, `peso_ped`, `latitud_ped`, `longitud_ped`) VALUES
('ped001', 'cli001', '2023-06-24', '2023-07-01', 'suc004', 'FEDEX QUITO(2)', 'Ingresado', 7, '-0.2303605334309237', '-78.33825328407805');

--
-- Disparadores `pedidos`
--
DELIMITER $$
CREATE TRIGGER `trg_pedidos_id` BEFORE INSERT ON `pedidos` FOR EACH ROW BEGIN
  DECLARE next_id INT;
  SET next_id = (SELECT COALESCE(MAX(CAST(SUBSTRING(id_ped, 4) AS UNSIGNED)), 0) + 1 FROM pedidos);
  SET NEW.id_ped = CONCAT('ped', LPAD(next_id, 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `codigo_per` varchar(10) NOT NULL,
  `nombre_per` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Disparadores `perfil`
--
DELIMITER $$
CREATE TRIGGER `trg_perfil_id` BEFORE INSERT ON `perfil` FOR EACH ROW BEGIN
  DECLARE next_id INT;
  SET next_id = (SELECT COALESCE(MAX(CAST(SUBSTRING(codigo_per, 4) AS UNSIGNED)), 0) + 1 FROM perfil);
  SET NEW.codigo_per = CONCAT('per', LPAD(next_id, 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil_usuario`
--

CREATE TABLE `perfil_usuario` (
  `codigo_pu` varchar(10) NOT NULL,
  `codigo_usu` varchar(10) NOT NULL,
  `codigo_per` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Disparadores `perfil_usuario`
--
DELIMITER $$
CREATE TRIGGER `trg_perfil_usuario_id` BEFORE INSERT ON `perfil_usuario` FOR EACH ROW BEGIN
  DECLARE next_id INT;
  SET next_id = (SELECT COALESCE(MAX(CAST(SUBSTRING(codigo_pu, 4) AS UNSIGNED)), 0) + 1 FROM perfil_usuario);
  SET NEW.codigo_pu = CONCAT('pu', LPAD(next_id, 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursales`
--

CREATE TABLE `sucursales` (
  `id_suc` varchar(10) NOT NULL,
  `nombre_suc` varchar(100) NOT NULL,
  `direccion_suc` varchar(200) NOT NULL,
  `ciudad_suc` varchar(100) NOT NULL,
  `pais_suc` varchar(50) NOT NULL,
  `telefono_suc` varchar(100) NOT NULL,
  `latitud_suc` varchar(500) NOT NULL,
  `longitud_suc` varchar(500) NOT NULL,
  `id_fed` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sucursales`
--

INSERT INTO `sucursales` (`id_suc`, `nombre_suc`, `direccion_suc`, `ciudad_suc`, `pais_suc`, `telefono_suc`, `latitud_suc`, `longitud_suc`, `id_fed`) VALUES
('suc001', 'FEDEX GUAYAQUIL', 'Calle C No 106 y Av. Juan Tanca Marengo', 'Guayaquil', 'Ecuador', '1800033339', '-2.151886838385355', '-79.87793497655308', 'fed001'),
('suc002', 'FEDEX AMBATO(1)', 'Av Cevallos 01-161 Y Abdon Ca 170307', 'Ambato', 'Ecuador', '1800033398', '-1.2590176538893125', '-78.7032407615987', 'fed001'),
('suc003', 'FEDEX AMBATO(2)', 'Calle Chirimoyas 01-14 Y Av G', 'Ambato', 'Ecuador', '1800033388', '-1.2368785888624179', '-78.63352478488362', 'fed001'),
('suc004', 'FEDEX CUENCA', 'Av. Gil Ramírez Dávalos 1-156 y El Pedregal CC CENCOMAY 010102 ', 'Cuenca', 'Ecuador', '1800033377', '-2.883866380899316', '-78.98237288936055', 'fed001'),
('suc005', 'FEDEX QUITO(1)', 'Av Amazonas N24-01 Y Wilson Quito 170307', 'Quito', 'Ecuador', '1800033366', '-0.20167107749956273', '-78.49276782020009', 'fed001'),
('suc006', 'FEDEX QUITO(2)', 'Av Interoceanica Y Pampite 170307', 'Quito', 'Ecuador', '1800033355', '-0.1914130294893171', '-78.46924082382596', 'fed001'),
('suc007', 'FEDEX QUITO(3)', 'Av Naciones Unidas E5-47 Y A Quito 170307', 'Quito', 'Ecuador', '1800033344', '-0.17514685619584883', '-78.48384142859852', 'fed001'),
('suc008', 'FEDEX BOGOTÁ', 'Avenida Carrera 19 # 120 – 79, LOCAL 6 Local6 Bogota 110111 CO', 'Bogotá', 'Colombia', '018000110339', '4.638596572941036', '-74.0976089332906', 'fed001'),
('suc009', 'FEDEX LIMA(1)', 'Calle Los Cedros 143 Urbanizacion Bocanegra Lima PE', 'Lima', 'Peru', '016806120', '-12.073004649806183', '-77.05198706134236', 'fed001'),
('suc010', 'FedEx Brasil - Duque De Caxias', 'Rod Washington Luiz 7749 Blvd 2 Arm 13 Duque De Caxias RJ 25050-000 BR', 'Rio de Janiero', 'Brasil', '08007033339', '-22.911305783962767', '-43.19517076953328', 'fed001');

--
-- Disparadores `sucursales`
--
DELIMITER $$
CREATE TRIGGER `trg_sucursales_id` BEFORE INSERT ON `sucursales` FOR EACH ROW BEGIN
  DECLARE next_id INT;
  SET next_id = (SELECT COALESCE(MAX(CAST(SUBSTRING(id_suc, 4) AS UNSIGNED)), 0) + 1 FROM sucursales);
  SET NEW.id_suc = CONCAT('suc', LPAD(next_id, 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `codigo_usu` varchar(10) NOT NULL,
  `nombre_usu` varchar(500) NOT NULL,
  `apellido_usu` varchar(500) NOT NULL,
  `telefono_usu` varchar(20) NOT NULL,
  `email_usu` varchar(200) NOT NULL,
  `password_usu` varchar(500) NOT NULL,
  `estado_usu` tinyint(4) NOT NULL,
  `perfil_usu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`codigo_usu`, `nombre_usu`, `apellido_usu`, `telefono_usu`, `email_usu`, `password_usu`, `estado_usu`, `perfil_usu`) VALUES
('usu001', 'Administrador', 'del Sistema', '0992829599', 'admin@utc.edu.ec', 'analitica', 1, 'ADMINISTRADOR');

--
-- Disparadores `usuario`
--
DELIMITER $$
CREATE TRIGGER `trg_usuario_id` BEFORE INSERT ON `usuario` FOR EACH ROW BEGIN
  DECLARE next_id INT;
  SET next_id = (SELECT COALESCE(MAX(CAST(SUBSTRING(codigo_usu, 4) AS UNSIGNED)), 0) + 1 FROM usuario);
  SET NEW.codigo_usu = CONCAT('usu', LPAD(next_id, 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id_veh` varchar(10) NOT NULL,
  `marca_veh` varchar(100) NOT NULL,
  `modelo_veh` varchar(100) NOT NULL,
  `placa_veh` varchar(100) NOT NULL,
  `capacidad_carga_veh` decimal(28,0) NOT NULL,
  `tipo_veh` varchar(100) NOT NULL,
  `estado_veh` varchar(100) NOT NULL,
  `id_suc` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Disparadores `vehiculos`
--
DELIMITER $$
CREATE TRIGGER `trg_vehiculos_id` BEFORE INSERT ON `vehiculos` FOR EACH ROW BEGIN
  DECLARE next_id INT;
  SET next_id = (SELECT COALESCE(MAX(CAST(SUBSTRING(id_veh, 4) AS UNSIGNED)), 0) + 1 FROM vehiculos);
  SET NEW.id_veh = CONCAT('veh', LPAD(next_id, 3, '0'));
END
$$
DELIMITER ;

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
