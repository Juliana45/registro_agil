-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-03-2020 a las 20:33:50
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
('00000', 'maria', 'lenovo', 0x2e2e2f696d672f646573312e6a7067, '555', NULL),
('010203', 'camara', 'negra', 0x70726f647563746f342e6a7067, '112', '1'),
('099', 'negro', 'azul', 0x31322e6a7067, '123', NULL),
('134', 'pc', 'azul', 0x2e2e2f696d672f, '123', NULL),
('222', 'sfgh', 'hhh', 0x2e2e2f696d672f3132202831292e6a7067, '555', NULL),
('3235', 'maria', 'hp', 0x2e2e2f696d672f70726f647563746f342e6a7067, '098', NULL),
('4321', 'juan jose', 'azul', 0x2e2e2f696d672f636f6d70752e6a7067, '123', NULL),
('444', 'juana', 'ppp', 0x2e2e2f696d672f3132202831292e6a7067, '112', NULL),
('453', 'camara', 'amari', 0x2e2e2f696d672f, '123', NULL),
('5678', 'guitarra', 'azul', 0x2e2e2f696d672f70726f647563746f322e6a7067, '112', '0'),
('5786', 'guitarra', 'negra', 0x2e2e2f696d672f6c6f676f2e706e67, '098', NULL),
('777', 'negro', 'jjjj', 0x2e2e2f696d672f, '123', NULL),
('8642', 'maria', 'casio', 0x2e2e2f696d672f70726f647563746f322e6a7067, '122', NULL),
('9889', 'negro', 'jjjj', 0x696d672f69636f6e6f2e706e67, '123', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_historial`
--

CREATE TABLE `tbl_historial` (
  `id_historial` int(11) NOT NULL,
  `numero_serial_elemento` varchar(60) NOT NULL,
  `hora_ingreso_historial` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `hora_salida_historial` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_historial`
--

INSERT INTO `tbl_historial` (`id_historial`, `numero_serial_elemento`, `hora_ingreso_historial`, `hora_salida_historial`) VALUES
(4, '099', '2020-03-06 04:24:31', '0000-00-00 00:00:00'),
(5, '134', '2020-03-06 04:31:02', '0000-00-00 00:00:00'),
(7, '134', '2020-03-05 22:40:46', '2020-03-05 23:40:46'),
(8, '099', '2020-03-05 22:42:30', '2020-03-05 23:42:30');

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
('098', 'juan', 'jose', 'maya', 'arboleda', 'ti', '9f8e8ed4a01ed7432b9394d627922ae3bb0a4fbe', 0x2e2e2f696d672f646573322e6a7067, 'juliana.robledobedoya@gmail.com', 'usuario', NULL),
('112', 'valentina', 'maria', 'herrera', 'calle', 'ti', '601ca99d55f00a2e8e736676b606a4d31d374fdd', 0x2e2e2f696d672f6c6f676f2e706e67, NULL, 'usuario', ''),
('122', 'valentina', 'camila', 'herrera', 'cardona', 'ti', '05a8ea5382b9fd885261bb3eed0527d1d3b07262', NULL, NULL, 'usuario', ''),
('123', 'alejandra', 'maria', 'bo', 'pa', 'cc', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL, NULL, 'vigilante', ''),
('4543', 'alejandro', 'andres', 'velez', 'franco', 'cc', '228bf8cc11958bfbebaf85e8ff6e11ea5ee3a701', NULL, NULL, 'vigilante', 'activo'),
('555', 'pedro', 'jose', 'velez', 'perez', 'ce', '555', NULL, NULL, 'supervisor', ''),
('99', 'alejandra', 'andres', 'londoño', 'franco', 'cc', '9a79be611e0267e1d943da0737c6c51be67865a0', NULL, NULL, 'vigilante', 'activo');

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
  MODIFY `id_historial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
