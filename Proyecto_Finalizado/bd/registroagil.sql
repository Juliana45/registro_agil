-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-06-2020 a las 23:16:45
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `registroagil`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_elementos`
--

CREATE TABLE `tbl_elementos` (
  `numero_serial_elemento` varchar(60) NOT NULL,
  `nombre_elemento` varchar(50) NOT NULL,
  `descripcion_elemento` varchar(250) DEFAULT NULL,
  `foto_elemento` longblob DEFAULT NULL,
  `numero_documento_persona` varchar(20) DEFAULT NULL,
  `estado_elemento` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_elementos`
--

INSERT INTO `tbl_elementos` (`numero_serial_elemento`, `nombre_elemento`, `descripcion_elemento`, `foto_elemento`, `numero_documento_persona`, `estado_elemento`) VALUES
('090807', 'camara', 'negra', 0x2e2e2f696d672f63616d6172612e6a7067, '43405244', '1'),
('098786567', 'camara', 'negra', 0x2e2e2f696d672f63616d6172612e6a7067, '1000918913', '1'),
('099', 'negro', 'azul', 0x31322e6a7067, '123', NULL),
('1110000000', 'camara', 'negra', 0x2e2e2f696d672f70657266696c312e6a7067, '1000298299', '1'),
('121314', 'ventilador', 'negra', 0x73616d757261692e6a7067, '1000298299', '1'),
('12345', 'Camara', 'gopro', 0x2e2e2f696d672f676f70726f2e6a7067, '555', '1'),
('134', 'pc', 'azul', 0x2e2e2f696d672f, '123', NULL),
('1515', 'ventilador', 'blanco', 0x2e2e2f696d672f31322e6a7067, '99', '0'),
('3302', 'camara', 'sony', 0x736f6e792e6a7067, '99', '0'),
('4806', 'camara', 'negra', 0x2e2e2f696d672f70657266696c2e6a7067, '1000298299', '1'),
('5332', 'camara', 'negra', 0x2e2e2f696d672f63616d6172612e6a7067, '112', '1'),
('5336', 'Herramientas', 'naranjadas', 0x2e2e2f696d672f68657272616d69656e7461732e6a7067, '43405244', '1'),
('5407', 'guitarra', 'azul', 0x2e2e2f696d672f31322e6a7067, '112', '1'),
('5506', 'Computador', 'HP', 0x2e2e2f696d672f70632e6a7067, '99', '0'),
('5657', 'holaa', 'holaa', 0x2e2e2f696d672f70657266696c312e6a7067, '99', '1'),
('5959', 'guitarra', 'verde', 0x2e2e2f696d672f63616d6172612e6a7067, '1000918913', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_historial`
--

CREATE TABLE `tbl_historial` (
  `id_historial` int(11) NOT NULL,
  `numero_serial_elemento` varchar(60) NOT NULL,
  `hora_ingreso_historial` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `hora_salida_historial` datetime NOT NULL,
  `estado_boton` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_historial`
--

INSERT INTO `tbl_historial` (`id_historial`, `numero_serial_elemento`, `hora_ingreso_historial`, `hora_salida_historial`, `estado_boton`) VALUES
(4, '099', '2020-05-13 02:51:11', '0000-00-00 00:00:00', 1),
(5, '134', '2020-05-13 02:51:11', '0000-00-00 00:00:00', 1),
(18, '3302', '2020-05-13 02:51:11', '2020-03-29 05:37:37', 1),
(151, '5332', '2020-05-14 00:13:45', '0000-00-00 00:00:00', 1),
(154, '5332', '2020-05-14 00:13:45', '2020-05-14 02:13:45', 1),
(155, '5407', '2020-05-14 00:14:04', '2020-05-14 02:13:52', 1),
(158, '1515', '2020-05-20 05:08:21', '0000-00-00 00:00:00', 1),
(159, '1515', '2020-05-20 05:08:21', '2020-05-14 02:14:54', 1),
(160, '1515', '2020-05-20 05:08:21', '0000-00-00 00:00:00', 1),
(162, '5506', '2020-05-14 00:15:17', '0000-00-00 00:00:00', 0),
(164, '1515', '2020-05-20 05:08:21', '2020-05-20 07:08:21', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_personas`
--

CREATE TABLE `tbl_personas` (
  `numero_documento_persona` varchar(20) NOT NULL,
  `nombre1_persona` varchar(45) NOT NULL,
  `nombre2_persona` varchar(45) DEFAULT NULL,
  `apellido1_persona` varchar(50) NOT NULL,
  `apellido2_persona` varchar(50) DEFAULT NULL,
  `tipo_documento_persona` varchar(25) NOT NULL,
  `clave_persona` varchar(180) NOT NULL,
  `foto_persona` longblob DEFAULT NULL,
  `correo_persona` varchar(100) DEFAULT NULL,
  `rol_persona` varchar(20) DEFAULT NULL,
  `estado_persona` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_personas`
--

INSERT INTO `tbl_personas` (`numero_documento_persona`, `nombre1_persona`, `nombre2_persona`, `apellido1_persona`, `apellido2_persona`, `tipo_documento_persona`, `clave_persona`, `foto_persona`, `correo_persona`, `rol_persona`, `estado_persona`) VALUES
('1000298299', 'Maicol', 'Stiven', 'Robledo', 'Franco', 'ce', '224440a00ac3dc76ec859939ccf98543d384079f', 0x2e2e2f696d672f70657266696c322e6a7067, 'aleja123@gmail.com', 'vigilante', 'activo'),
('1000918913', 'Maria', '', 'Munera', 'Velez', 'ti', '256d612249dbeba848a978ee9f96dd6ef54c107d', 0x2e2e2f696d672f70657266696c2e6a7067, 'juliana.robledobedoya@gmail.com', 'usuario', NULL),
('112', 'Valentina', 'Camila', 'Herrera', 'Calle', 'ti', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0x2e2e2f696d672f31322e6a7067, 'juliana.robledobedoya@gmail.com', 'usuario', ''),
('123', 'alejandra', 'maria', 'bo', 'pa', 'cc', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL, NULL, 'vigilante', ''),
('43405244', 'Juan', 'Manuel', 'Zulueta', 'Franco', 'cc', 'holaMUNDO22', 0x2e2e2f696d672f70657266696c312e6a7067, NULL, 'supervisor', NULL),
('555', 'Pedro', 'Mario', 'Velez', 'Perez', 'ce', 'cfa1150f1787186742a9a884b73a43d8cf219f9b', 0x2e2e2f696d672f70657266696c312e6a7067, NULL, 'supervisor', ''),
('675', 'juan', 'maria', 'parias', 'holaa', 'ti', '4dbe3b9ba308ce8c228d1921f1f02b4ad32f4e3e', NULL, 'aleja123@gmail.com', 'usuario', NULL),
('99', 'Juan', 'Francisco', 'Londoño', 'Franco', 'cc', '9a79be611e0267e1d943da0737c6c51be67865a0', 0x2e2e2f696d672f70657266696c322e6a7067, NULL, 'vigilante', 'activo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_elementos`
--
ALTER TABLE `tbl_elementos`
  ADD PRIMARY KEY (`numero_serial_elemento`),
  ADD KEY `numero_documento_persona` (`numero_documento_persona`);

--
-- Indices de la tabla `tbl_historial`
--
ALTER TABLE `tbl_historial`
  ADD PRIMARY KEY (`id_historial`),
  ADD KEY `numero_serial_elemento` (`numero_serial_elemento`);

--
-- Indices de la tabla `tbl_personas`
--
ALTER TABLE `tbl_personas`
  ADD PRIMARY KEY (`numero_documento_persona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_historial`
--
ALTER TABLE `tbl_historial`
  MODIFY `id_historial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_elementos`
--
ALTER TABLE `tbl_elementos`
  ADD CONSTRAINT `tbl_elementos_ibfk_1` FOREIGN KEY (`numero_documento_persona`) REFERENCES `tbl_personas` (`numero_documento_persona`);

--
-- Filtros para la tabla `tbl_historial`
--
ALTER TABLE `tbl_historial`
  ADD CONSTRAINT `tbl_historial_ibfk_1` FOREIGN KEY (`numero_serial_elemento`) REFERENCES `tbl_elementos` (`numero_serial_elemento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
