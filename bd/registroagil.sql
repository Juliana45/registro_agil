-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2020 at 11:43 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registroagil`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_elementos`
--

CREATE TABLE `tbl_elementos` (
  `numero_serial_elemento` varchar(60) NOT NULL,
  `nombre_elemento` varchar(50) NOT NULL,
  `descripcion_elemento` varchar(250) DEFAULT NULL,
  `foto_elemento` longblob DEFAULT NULL,
  `numero_documento_persona` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_elementos`
--

INSERT INTO `tbl_elementos` (`numero_serial_elemento`, `nombre_elemento`, `descripcion_elemento`, `foto_elemento`, `numero_documento_persona`) VALUES
('099', 'negro', 'azul', 0x31322e6a7067, '123'),
('134', 'pc', 'azul', 0x2e2e2f696d672f, '123'),
('222', 'sfgh', 'hhh', 0x2e2e2f696d672f3132202831292e6a7067, '555'),
('4321', 'juan jose', 'azul', 0x2e2e2f696d672f636f6d70752e6a7067, '123'),
('444', 'juana', 'ppp', 0x2e2e2f696d672f3132202831292e6a7067, '112'),
('453', 'camara', 'amari', 0x2e2e2f696d672f, '123'),
('777', 'negro', 'jjjj', 0x2e2e2f696d672f, '123'),
('9889', 'negro', 'jjjj', 0x696d672f69636f6e6f2e706e67, '123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_historial`
--

CREATE TABLE `tbl_historial` (
  `id_historial` int(11) NOT NULL,
  `numero_serial_elemento` varchar(60) NOT NULL,
  `hora_ingreso_historial` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `hora_salida_historial` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_historial`
--

INSERT INTO `tbl_historial` (`id_historial`, `numero_serial_elemento`, `hora_ingreso_historial`, `hora_salida_historial`) VALUES
(4, '099', '2020-03-06 04:24:31', '0000-00-00 00:00:00'),
(5, '134', '2020-03-06 04:31:02', '0000-00-00 00:00:00'),
(7, '134', '2020-03-05 22:40:46', '2020-03-05 23:40:46'),
(8, '099', '2020-03-05 22:42:30', '2020-03-05 23:42:30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_personas`
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
  `rol_persona` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_personas`
--

INSERT INTO `tbl_personas` (`numero_documento_persona`, `nombre1_persona`, `nombre2_persona`, `apellido1_persona`, `apellido2_persona`, `tipo_documento_persona`, `clave_persona`, `foto_persona`, `correo_persona`, `rol_persona`) VALUES
('112', 'valentina', 'maria', 'herrera', 'calle', 'ti', '601ca99d55f00a2e8e736676b606a4d31d374fdd', NULL, NULL, 'usuario'),
('122', 'valentina', 'camila', 'herrera', 'cardona', 'ti', '05a8ea5382b9fd885261bb3eed0527d1d3b07262', NULL, NULL, 'usuario'),
('123', 'alejandra', 'maria', 'bo', 'pa', 'cc', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL, NULL, 'vigilante'),
('555', 'pedro', 'jose', 'velez', 'perez', 'ce', '555', NULL, NULL, 'supervisor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_elementos`
--
ALTER TABLE `tbl_elementos`
  ADD PRIMARY KEY (`numero_serial_elemento`),
  ADD KEY `numero_documento_persona` (`numero_documento_persona`);

--
-- Indexes for table `tbl_historial`
--
ALTER TABLE `tbl_historial`
  ADD PRIMARY KEY (`id_historial`),
  ADD KEY `numero_serial_elemento` (`numero_serial_elemento`);

--
-- Indexes for table `tbl_personas`
--
ALTER TABLE `tbl_personas`
  ADD PRIMARY KEY (`numero_documento_persona`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_historial`
--
ALTER TABLE `tbl_historial`
  MODIFY `id_historial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_elementos`
--
ALTER TABLE `tbl_elementos`
  ADD CONSTRAINT `tbl_elementos_ibfk_1` FOREIGN KEY (`numero_documento_persona`) REFERENCES `tbl_personas` (`numero_documento_persona`);

--
-- Constraints for table `tbl_historial`
--
ALTER TABLE `tbl_historial`
  ADD CONSTRAINT `tbl_historial_ibfk_1` FOREIGN KEY (`numero_serial_elemento`) REFERENCES `tbl_elementos` (`numero_serial_elemento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
