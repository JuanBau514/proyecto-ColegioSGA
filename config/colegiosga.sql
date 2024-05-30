-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-05-2024 a las 00:56:52
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
-- Base de datos: `colegiosga`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `profesion` varchar(50) NOT NULL,
  `edad` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contrasena` varchar(50) NOT NULL,
  `grado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`id`, `nombre`, `profesion`, `edad`, `email`, `contrasena`, `grado`) VALUES
(80765, 'Stik ', 'estudiante', 18, 'stik88@gmail.com', 'stik88', 'decimo'),
(100056, 'esteban', 'estudiante', 15, 'esteban5@gmail.com', 'esteban5', 'noveno'),
(102023, 'jairo', 'estudiante', 12, 'jairo22@gmail.com', 'jairo22', 'septimo'),
(154353, 'sofia', 'estudiante', 10, 'sofi11@gmail.com', 'sofi11', 'sofi11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id` int(11) NOT NULL,
  `materia` varchar(50) NOT NULL,
  `periodo` int(1) NOT NULL,
  `nota` int(3) NOT NULL,
  `idEs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id`, `materia`, `periodo`, `nota`, `idEs`) VALUES
(1, 'Matematicas', 1, 35, 80765),
(2, 'Matematicas', 2, 38, 80765),
(3, 'Matematicas', 3, 45, 80765),
(4, 'Matematicas', 4, 40, 80765),
(5, 'Historia', 1, 30, 80765),
(6, 'Historia', 2, 30, 80765),
(7, 'Historia', 3, 30, 80765),
(8, 'Historia', 4, 40, 80765),
(9, 'Geometria', 1, 40, 80765),
(10, 'Geometria', 2, 48, 80765),
(11, 'Geometria', 3, 45, 80765),
(12, 'Geometria', 4, 45, 80765),
(13, 'Castellano', 1, 25, 80765),
(14, 'Castellano', 2, 28, 80765),
(15, 'Castellano', 3, 45, 80765),
(16, 'Castellano', 4, 40, 80765),
(17, 'Religion', 1, 50, 80765),
(18, 'Religion', 2, 48, 80765),
(19, 'Religion', 3, 45, 80765),
(20, 'Religion', 4, 45, 80765),
(21, 'Musica', 1, 33, 80765),
(22, 'Musica', 2, 32, 80765),
(23, 'Musica', 3, 40, 80765),
(24, 'Musica', 4, 34, 80765);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `padre`
--

CREATE TABLE `padre` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `profesion` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `idEs` int(11) NOT NULL,
  `contrasena` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `padre`
--

INSERT INTO `padre` (`id`, `nombre`, `profesion`, `email`, `telefono`, `idEs`, `contrasena`) VALUES
(523434, 'Luis', 'padre', 'luisito23@gmail.com', '3004545', 80765, 'luisito23'),
(767887, 'Marlen', 'padre', 'marleni@gmail.com', '3004545', 100056, 'marleni'),
(64545, 'Ricardo', 'padre', 'richard@gmail.com', '3004545', 102023, 'richard'),
(87456, 'Claudia', 'padre', 'clau@gmail.com', '3004545', 154353, 'clau');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `profesion` varchar(50) NOT NULL,
  `edad` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contrasena` varchar(50) NOT NULL,
  `telefono` int(15) NOT NULL,
  `area` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`id`, `nombre`, `profesion`, `edad`, `email`, `contrasena`, `telefono`, `area`) VALUES
(80003, 'Carlos', 'profesor', 32, 'carlitos@gmail.com', 'ccc888', 3078676, 'Matematicas'),
(85432, 'Roberto', 'profesor', 46, 'roberto56@gmail.com', 'roberto56', 3454543, 'Castellano'),
(100054, 'diana', 'profesor', 37, 'dianita@gmail.com', 'ddd333', 312323, 'Historia'),
(527758, 'Juan', 'profesor', 40, 'juanito@gmail.com', '4563', 322132, 'Geometria'),
(546639, 'maria', 'profesor', 46, 'mari@gmail.com', 'mmm666', 3154646, 'Musica'),
(1000343, 'Juliana', 'profesor', 36, 'juliana56@gmail.com', 'roberto56', 32054443, 'Religion');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idEs` (`idEs`),
  ADD KEY `id_materia` (`materia`),
  ADD KEY `id_materia_2` (`materia`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`id`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notaestudiante` FOREIGN KEY (`idEs`) REFERENCES `estudiante` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
