-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-06-2023 a las 04:18:52
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
  `id_pai` varchar(200) NOT NULL,
  `direccion_cli` varchar(200) NOT NULL,
  `ciudad_cli` varchar(100) NOT NULL,
  `telefono_cli` varchar(100) NOT NULL,
  `email_cli` varchar(100) NOT NULL,
  `latitud_cli` varchar(500) NOT NULL,
  `longitud_cli` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cli`, `cedula_cli`, `apellidos_cli`, `nombres_cli`, `id_pai`, `direccion_cli`, `ciudad_cli`, `telefono_cli`, `email_cli`, `latitud_cli`, `longitud_cli`) VALUES
('cli001', '0550712962', 'Gavilanez Guanoluisa', 'Angel Rodrigo', 'pai001', 'San Felipe', 'Latacunga', '0992829599', 'angelo@gmail.com', '-1.2516517523430732', '-78.61775636930618');

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
-- Estructura de tabla para la tabla `continentes`
--

CREATE TABLE `continentes` (
  `id_con` varchar(10) NOT NULL,
  `nombre_con` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `continentes`
--

INSERT INTO `continentes` (`id_con`, `nombre_con`) VALUES
('con001', 'AMERICA'),
('con002', 'ASIA'),
('con003', 'AFRICA'),
('con004', 'EUROPA'),
('con005', 'OCEANIA');

--
-- Disparadores `continentes`
--
DELIMITER $$
CREATE TRIGGER `trg_continentes_id` BEFORE INSERT ON `continentes` FOR EACH ROW BEGIN
  DECLARE next_id INT;
  SET next_id = (SELECT COALESCE(MAX(CAST(SUBSTRING(id_con, 4) AS UNSIGNED)), 0) + 1 FROM continentes);
  SET NEW.id_con = CONCAT('con', LPAD(next_id, 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envios`
--

CREATE TABLE `envios` (
  `id_env` varchar(10) NOT NULL,
  `id_cli` varchar(10) NOT NULL,
  `id_con_origen` varchar(150) NOT NULL,
  `id_pais_origen` varchar(200) NOT NULL,
  `id_suc_origen` varchar(200) NOT NULL,
  `id_con_destino` varchar(150) NOT NULL,
  `id_pais_destino` varchar(200) NOT NULL,
  `id_suc_destino` varchar(200) NOT NULL,
  `fecha_envio_env` date NOT NULL,
  `fecha_entrega_env` date NOT NULL,
  `detalle_env` varchar(500) NOT NULL,
  `peso_env` decimal(28,0) NOT NULL,
  `latitud_env` varchar(500) NOT NULL,
  `longitud_env` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `envios`
--

INSERT INTO `envios` (`id_env`, `id_cli`, `id_con_origen`, `id_pais_origen`, `id_suc_origen`, `id_con_destino`, `id_pais_destino`, `id_suc_destino`, `fecha_envio_env`, `fecha_entrega_env`, `detalle_env`, `peso_env`, `latitud_env`, `longitud_env`) VALUES
('env001', 'cli001', 'con001', 'pai001', 'suc001', 'con004', 'pai002', 'suc002', '2023-06-26', '2023-06-30', 'Envío de tennis blancos', 6, '40.713046080770795', '-3.4500101689941514');

--
-- Disparadores `envios`
--
DELIMITER $$
CREATE TRIGGER `trg_envios_id` BEFORE INSERT ON `envios` FOR EACH ROW BEGIN
  DECLARE next_id INT;
  SET next_id = (SELECT COALESCE(MAX(CAST(SUBSTRING(id_env, 4) AS UNSIGNED)), 0) + 1 FROM envios);
  SET NEW.id_env = CONCAT('env', LPAD(next_id, 3, '0'));
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
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE `paises` (
  `id_pai` varchar(10) NOT NULL,
  `nombre_pai` varchar(100) NOT NULL,
  `id_con` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`id_pai`, `nombre_pai`, `id_con`) VALUES
('pai001', 'ECUADOR', 'con001'),
('pai002', 'ESPAÑA', 'con004');

--
-- Disparadores `paises`
--
DELIMITER $$
CREATE TRIGGER `trg_paises_id` BEFORE INSERT ON `paises` FOR EACH ROW BEGIN
  DECLARE next_id INT;
  SET next_id = (SELECT COALESCE(MAX(CAST(SUBSTRING(id_pai, 4) AS UNSIGNED)), 0) + 1 FROM paises);
  SET NEW.id_pai = CONCAT('pai', LPAD(next_id, 3, '0'));
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
  `ciudad_suc` varchar(100) NOT NULL,
  `direccion_suc` varchar(200) NOT NULL,
  `telefono_suc` varchar(100) NOT NULL,
  `latitud_suc` varchar(500) NOT NULL,
  `longitud_suc` varchar(500) NOT NULL,
  `id_fed` varchar(10) NOT NULL,
  `id_con` varchar(10) NOT NULL,
  `id_pai` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sucursales`
--

INSERT INTO `sucursales` (`id_suc`, `nombre_suc`, `ciudad_suc`, `direccion_suc`, `telefono_suc`, `latitud_suc`, `longitud_suc`, `id_fed`, `id_con`, `id_pai`) VALUES
('suc001', 'FEDEX QUITO (1)', 'QUITO', 'Av. Colon y Américas', '0327685463', '-0.12060167075497806', '-78.47169368236455', 'fed001', 'con001', 'pai001'),
('suc002', 'FEDEX MADRID', 'MADRID', 'Av. Antonio Banderas y Pique', '0325675432', '40.41781010013167', '-3.702695716447328', 'fed001', 'con004', 'pai002');

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

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cli`),
  ADD KEY `id_pai` (`id_pai`);

--
-- Indices de la tabla `continentes`
--
ALTER TABLE `continentes`
  ADD PRIMARY KEY (`id_con`);

--
-- Indices de la tabla `envios`
--
ALTER TABLE `envios`
  ADD PRIMARY KEY (`id_env`),
  ADD KEY `id_cli` (`id_cli`),
  ADD KEY `id_con_origen` (`id_con_origen`),
  ADD KEY `id_pais_origen` (`id_pais_origen`),
  ADD KEY `id_suc_origen` (`id_suc_origen`),
  ADD KEY `id_con_destino` (`id_con_destino`),
  ADD KEY `id_pais_destino` (`id_pais_destino`),
  ADD KEY `id_suc_destino` (`id_suc_destino`);

--
-- Indices de la tabla `fedex`
--
ALTER TABLE `fedex`
  ADD PRIMARY KEY (`id_fed`);

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`id_pai`),
  ADD KEY `id_con` (`id_con`);

--
-- Indices de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  ADD PRIMARY KEY (`id_suc`),
  ADD KEY `id_fed` (`id_fed`),
  ADD KEY `id_con` (`id_con`),
  ADD KEY `id_pai` (`id_pai`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`codigo_usu`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`id_pai`) REFERENCES `paises` (`id_pai`);

--
-- Filtros para la tabla `envios`
--
ALTER TABLE `envios`
  ADD CONSTRAINT `envios_ibfk_1` FOREIGN KEY (`id_cli`) REFERENCES `clientes` (`id_cli`),
  ADD CONSTRAINT `envios_ibfk_2` FOREIGN KEY (`id_con_origen`) REFERENCES `continentes` (`id_con`),
  ADD CONSTRAINT `envios_ibfk_3` FOREIGN KEY (`id_pais_origen`) REFERENCES `paises` (`id_pai`),
  ADD CONSTRAINT `envios_ibfk_4` FOREIGN KEY (`id_suc_origen`) REFERENCES `sucursales` (`id_suc`),
  ADD CONSTRAINT `envios_ibfk_5` FOREIGN KEY (`id_con_destino`) REFERENCES `continentes` (`id_con`),
  ADD CONSTRAINT `envios_ibfk_6` FOREIGN KEY (`id_pais_destino`) REFERENCES `paises` (`id_pai`),
  ADD CONSTRAINT `envios_ibfk_7` FOREIGN KEY (`id_suc_destino`) REFERENCES `sucursales` (`id_suc`);

--
-- Filtros para la tabla `paises`
--
ALTER TABLE `paises`
  ADD CONSTRAINT `paises_ibfk_1` FOREIGN KEY (`id_con`) REFERENCES `continentes` (`id_con`);

--
-- Filtros para la tabla `sucursales`
--
ALTER TABLE `sucursales`
  ADD CONSTRAINT `sucursales_ibfk_1` FOREIGN KEY (`id_fed`) REFERENCES `fedex` (`id_fed`),
  ADD CONSTRAINT `sucursales_ibfk_2` FOREIGN KEY (`id_con`) REFERENCES `continentes` (`id_con`),
  ADD CONSTRAINT `sucursales_ibfk_3` FOREIGN KEY (`id_pai`) REFERENCES `paises` (`id_pai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
