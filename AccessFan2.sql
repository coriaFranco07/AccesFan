-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2023 at 05:28 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `facultad`
--

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `edad` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contraseña` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `id_sexo` int(11) NOT NULL,
  `id_codPostal` int(11) NOT NULL,
  `estado_cliente` int(11) DEFAULT 3,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre`, `apellido`, `edad`, `usuario`, `contraseña`, `correo`, `id_sexo`, `id_codPostal`, `estado_cliente`, `id_rol`) VALUES
(1, 'Franco', 'Coria', 19, 'pepe10', '1212', 'pepe@gmial.com', 2, 5505, 3, 1),
(2, 'Don Mario', 'dada', 12, 'lolo10', '1010', 'lolo10@gmail.com', 2, 5505, 3, 2),
(4, 'Española', 'eee', 44, 'española99', '9999', 'española@gmail.com', 1, 5507, 3, 2),
(18, 'Don Mario', 'Coria', 19, 'prueba2', '1234', 'laurita@gmail.com', 2, 5533, 3, 2),
(19, 'Laura', 'Zaragoza', 12, 'pepe66', '9999', 'laudan01@gmail.com', 1, 5505, 3, 2),
(20, 'Don Mario', 'popo', 18, 'probando', '1111', 'dani@coria.com', 1, 5533, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cuota`
--

CREATE TABLE `cuota` (
  `id_cuota` int(11) NOT NULL,
  `fecha` varchar(50) NOT NULL,
  `valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cuota`
--

INSERT INTO `cuota` (`id_cuota`, `fecha`, `valor`) VALUES
(1, 'Enero', 3000),
(2, 'Febrero', 3000),
(3, 'Marzo', 3000),
(4, 'Abril', 3500),
(6, 'Mayo', 5100);

-- --------------------------------------------------------

--
-- Table structure for table `detalle_cuota`
--

CREATE TABLE `detalle_cuota` (
  `id_detalleCuota` int(11) NOT NULL,
  `id_cuota` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `fecha_cuota` datetime NOT NULL,
  `id_estado` int(11) NOT NULL,
  `id_metodoPago` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detalle_cuota`
--

INSERT INTO `detalle_cuota` (`id_detalleCuota`, `id_cuota`, `id_cliente`, `fecha_cuota`, `id_estado`, `id_metodoPago`) VALUES
(8, 2, 2, '2023-05-30 18:30:05', 1, 1),
(9, 1, 2, '2023-06-07 21:20:09', 1, 2),
(10, 1, 2, '2023-06-29 11:45:08', 1, 1),
(11, 2, 2, '2023-06-29 11:45:15', 1, 1),
(12, 1, 4, '2023-06-29 11:47:20', 1, 1),
(13, 3, 4, '2023-06-29 11:47:25', 1, 1),
(14, 3, 2, '2023-07-31 19:29:54', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `detalle_entrada1`
--

CREATE TABLE `detalle_entrada1` (
  `id_detalleEntrada` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_entrada` int(11) NOT NULL,
  `fecha_entrada` datetime NOT NULL,
  `id_tipoEntrada` int(11) NOT NULL,
  `id_metodoPago` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detalle_entrada1`
--

INSERT INTO `detalle_entrada1` (`id_detalleEntrada`, `id_cliente`, `id_entrada`, `fecha_entrada`, `id_tipoEntrada`, `id_metodoPago`, `id_estado`) VALUES
(10, 2, 1, '2023-05-30 00:40:36', 1, 1, 1),
(25, 2, 5, '2023-06-27 11:05:48', 1, 1, 1),
(27, 2, 8, '2023-07-31 14:33:46', 3, 2, 1),
(28, 2, 1, '2023-07-31 19:26:51', 2, 1, 1),
(29, 2, 9, '2023-07-31 19:28:36', 3, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `entrada`
--

CREATE TABLE `entrada` (
  `id_entrada` int(11) NOT NULL,
  `fecha_entrada` datetime NOT NULL,
  `id_equipoLocal` int(11) NOT NULL,
  `id_equipoVisitante` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `lugar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `entrada`
--

INSERT INTO `entrada` (`id_entrada`, `fecha_entrada`, `id_equipoLocal`, `id_equipoVisitante`, `id_estado`, `lugar`) VALUES
(1, '2023-05-01 21:22:00', 1, 1, 2, 'Malvinas Argentina'),
(5, '2023-05-29 19:07:43', 1, 2, 2, 'La Bombonera'),
(8, '2023-05-13 20:13:00', 1, 2, 2, 'Mas Monumental'),
(9, '2023-06-08 12:58:00', 1, 1, 2, 'Aldosivi');

-- --------------------------------------------------------

--
-- Table structure for table `equipo_local`
--

CREATE TABLE `equipo_local` (
  `id_equipoLocal` int(11) NOT NULL,
  `tipo_equipoLocal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `equipo_local`
--

INSERT INTO `equipo_local` (`id_equipoLocal`, `tipo_equipoLocal`) VALUES
(1, 'Boca Juniors');

-- --------------------------------------------------------

--
-- Table structure for table `equipo_viistante`
--

CREATE TABLE `equipo_viistante` (
  `id_equipoVisitante` int(11) NOT NULL,
  `tipo_equipoVisitante` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `equipo_viistante`
--

INSERT INTO `equipo_viistante` (`id_equipoVisitante`, `tipo_equipoVisitante`) VALUES
(1, 'Godoy Cruz'),
(2, 'Racing'),
(3, 'Banfield'),
(4, 'River Plate');

-- --------------------------------------------------------

--
-- Table structure for table `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `tipo_estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `estado`
--

INSERT INTO `estado` (`id_estado`, `tipo_estado`) VALUES
(1, 'Pagado'),
(2, 'No Pagado'),
(3, 'Activo'),
(4, 'No activo');

-- --------------------------------------------------------

--
-- Table structure for table `localidad`
--

CREATE TABLE `localidad` (
  `id_codPostal` int(11) NOT NULL,
  `tipo_codPostal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `localidad`
--

INSERT INTO `localidad` (`id_codPostal`, `tipo_codPostal`) VALUES
(5505, 'Chacras de Coria'),
(5507, 'Lujan de Cuyo'),
(5530, 'San Jose'),
(5533, 'Lavalle');

-- --------------------------------------------------------

--
-- Table structure for table `metodo_pago`
--

CREATE TABLE `metodo_pago` (
  `id_metodoPago` int(11) NOT NULL,
  `tipo_metodoPago` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `metodo_pago`
--

INSERT INTO `metodo_pago` (`id_metodoPago`, `tipo_metodoPago`) VALUES
(1, 'Trasferencia'),
(2, 'Debito_Credito');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id_rol`, `tipo`) VALUES
(1, 'administrador'),
(2, 'usuario');

-- --------------------------------------------------------

--
-- Table structure for table `sexo`
--

CREATE TABLE `sexo` (
  `id_sexo` int(11) NOT NULL,
  `tipo_sexo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sexo`
--

INSERT INTO `sexo` (`id_sexo`, `tipo_sexo`) VALUES
(1, 'MUJER'),
(2, 'HOMBRE');

-- --------------------------------------------------------

--
-- Table structure for table `valor_entrada`
--

CREATE TABLE `valor_entrada` (
  `id_tipoEntrada` int(11) NOT NULL,
  `valor_entrada` int(11) NOT NULL,
  `tipoEntrada` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `valor_entrada`
--

INSERT INTO `valor_entrada` (`id_tipoEntrada`, `valor_entrada`, `tipoEntrada`) VALUES
(1, 1500, 'Popular'),
(2, 2800, 'Platea Descubierta'),
(3, 4000, 'Platea Cubierta');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `id_sexo` (`id_sexo`,`id_codPostal`),
  ADD KEY `id_codPostal` (`id_codPostal`),
  ADD KEY `id_rol` (`id_rol`);

--
-- Indexes for table `cuota`
--
ALTER TABLE `cuota`
  ADD PRIMARY KEY (`id_cuota`);

--
-- Indexes for table `detalle_cuota`
--
ALTER TABLE `detalle_cuota`
  ADD PRIMARY KEY (`id_detalleCuota`),
  ADD KEY `id_cuota` (`id_cuota`,`id_cliente`,`id_estado`,`id_metodoPago`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_estado` (`id_estado`),
  ADD KEY `id_metodoPago` (`id_metodoPago`);

--
-- Indexes for table `detalle_entrada1`
--
ALTER TABLE `detalle_entrada1`
  ADD PRIMARY KEY (`id_detalleEntrada`),
  ADD KEY `id_cliente` (`id_cliente`,`id_entrada`,`id_tipoEntrada`,`id_metodoPago`,`id_estado`),
  ADD KEY `id_entrada` (`id_entrada`),
  ADD KEY `id_tipoEntrada` (`id_tipoEntrada`),
  ADD KEY `id_metodoPago` (`id_metodoPago`),
  ADD KEY `id_estado` (`id_estado`);

--
-- Indexes for table `entrada`
--
ALTER TABLE `entrada`
  ADD PRIMARY KEY (`id_entrada`),
  ADD KEY `id_equipoLocal` (`id_equipoLocal`,`id_equipoVisitante`,`id_estado`),
  ADD KEY `id_equipoVisitante` (`id_equipoVisitante`),
  ADD KEY `id_estado` (`id_estado`);

--
-- Indexes for table `equipo_local`
--
ALTER TABLE `equipo_local`
  ADD PRIMARY KEY (`id_equipoLocal`);

--
-- Indexes for table `equipo_viistante`
--
ALTER TABLE `equipo_viistante`
  ADD PRIMARY KEY (`id_equipoVisitante`);

--
-- Indexes for table `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indexes for table `localidad`
--
ALTER TABLE `localidad`
  ADD PRIMARY KEY (`id_codPostal`);

--
-- Indexes for table `metodo_pago`
--
ALTER TABLE `metodo_pago`
  ADD PRIMARY KEY (`id_metodoPago`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indexes for table `sexo`
--
ALTER TABLE `sexo`
  ADD PRIMARY KEY (`id_sexo`);

--
-- Indexes for table `valor_entrada`
--
ALTER TABLE `valor_entrada`
  ADD PRIMARY KEY (`id_tipoEntrada`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `cuota`
--
ALTER TABLE `cuota`
  MODIFY `id_cuota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `detalle_cuota`
--
ALTER TABLE `detalle_cuota`
  MODIFY `id_detalleCuota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `detalle_entrada1`
--
ALTER TABLE `detalle_entrada1`
  MODIFY `id_detalleEntrada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `entrada`
--
ALTER TABLE `entrada`
  MODIFY `id_entrada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `equipo_local`
--
ALTER TABLE `equipo_local`
  MODIFY `id_equipoLocal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `equipo_viistante`
--
ALTER TABLE `equipo_viistante`
  MODIFY `id_equipoVisitante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `localidad`
--
ALTER TABLE `localidad`
  MODIFY `id_codPostal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5534;

--
-- AUTO_INCREMENT for table `metodo_pago`
--
ALTER TABLE `metodo_pago`
  MODIFY `id_metodoPago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sexo`
--
ALTER TABLE `sexo`
  MODIFY `id_sexo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `valor_entrada`
--
ALTER TABLE `valor_entrada`
  MODIFY `id_tipoEntrada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`id_sexo`) REFERENCES `sexo` (`id_sexo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cliente_ibfk_2` FOREIGN KEY (`id_codPostal`) REFERENCES `localidad` (`id_codPostal`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cliente_ibfk_3` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON UPDATE CASCADE;

--
-- Constraints for table `detalle_cuota`
--
ALTER TABLE `detalle_cuota`
  ADD CONSTRAINT `detalle_cuota_ibfk_1` FOREIGN KEY (`id_cuota`) REFERENCES `cuota` (`id_cuota`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_cuota_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_cuota_ibfk_3` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_cuota_ibfk_4` FOREIGN KEY (`id_metodoPago`) REFERENCES `metodo_pago` (`id_metodoPago`) ON UPDATE CASCADE;

--
-- Constraints for table `detalle_entrada1`
--
ALTER TABLE `detalle_entrada1`
  ADD CONSTRAINT `detalle_entrada1_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_entrada1_ibfk_2` FOREIGN KEY (`id_entrada`) REFERENCES `entrada` (`id_entrada`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_entrada1_ibfk_3` FOREIGN KEY (`id_tipoEntrada`) REFERENCES `valor_entrada` (`id_tipoEntrada`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_entrada1_ibfk_4` FOREIGN KEY (`id_metodoPago`) REFERENCES `metodo_pago` (`id_metodoPago`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_entrada1_ibfk_5` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`) ON UPDATE CASCADE;

--
-- Constraints for table `entrada`
--
ALTER TABLE `entrada`
  ADD CONSTRAINT `entrada_ibfk_1` FOREIGN KEY (`id_equipoLocal`) REFERENCES `equipo_local` (`id_equipoLocal`) ON UPDATE CASCADE,
  ADD CONSTRAINT `entrada_ibfk_2` FOREIGN KEY (`id_equipoVisitante`) REFERENCES `equipo_viistante` (`id_equipoVisitante`) ON UPDATE CASCADE,
  ADD CONSTRAINT `entrada_ibfk_3` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
