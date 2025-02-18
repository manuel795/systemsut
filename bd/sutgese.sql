-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-01-2025 a las 21:22:02
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sutgese`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `faltas`
--

CREATE TABLE `faltas` (
  `id_faltas` int(4) NOT NULL,
  `fecha` date NOT NULL,
  `motivo` text NOT NULL,
  `justificacion` text NOT NULL,
  `estado` varchar(25) NOT NULL,
  `curp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `faltas`
--

INSERT INTO `faltas` (`id_faltas`, `fecha`, `motivo`, `justificacion`, `estado`, `curp`) VALUES
(1, '2025-01-02', 'ENTRADA', 'Sin Validar', 'Sin Validar', 'MATM871015HCCRRN01'),
(2, '2025-01-03', 'DASD', 'Sin Validar', 'Sin Validar', 'MATM871015HCCRRN01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `curp` varchar(20) NOT NULL,
  `nombre_completo` text NOT NULL,
  `telefono` bigint(12) NOT NULL,
  `correo` text NOT NULL,
  `user` text NOT NULL,
  `pass` varchar(255) NOT NULL,
  `imagen_perfil` mediumblob NOT NULL,
  `estado` varchar(12) NOT NULL,
  `privilegio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabla de usuarios de sutgese';

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`curp`, `nombre_completo`, `telefono`, `correo`, `user`, `pass`, `imagen_perfil`, `estado`, `privilegio`) VALUES
('AEDJ831101HCCLRN08', 'JUAN CARLOS MARBEL ALEJANDRO DUARTE', 981187144, 'juan.alejandro@educacioncampeche.gob.mx', 'juan.alejandro', 'alejandro', '', 'ACTIVO', 'usuario'),
('MATM871015HCCRRN01', 'MANUEL ISAIAS MARIN TREJO', 9821185144, 'manuel.marin@educacioncampeche.gob.mx', 'manuel.marin', 'marin', '', 'ACTIVO', 'administrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `faltas`
--
ALTER TABLE `faltas`
  ADD PRIMARY KEY (`id_faltas`),
  ADD KEY `curp` (`curp`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`curp`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `faltas`
--
ALTER TABLE `faltas`
  MODIFY `id_faltas` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
