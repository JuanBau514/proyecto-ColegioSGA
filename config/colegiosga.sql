-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-06-2024 a las 19:26:31
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
(154353, 'sofia', 'estudiante', 12, 'sofi11@gmail.com', 'sofi11', 'sexto'),
(10003433, 'Duban', 'estudiante', 17, 'duvan76@gmail.com', 'duvan76', 'once'),
(10545542, 'Juan', 'estudiante', 14, 'juanito98@gmail.com', 'juanito98', 'octavo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `idGrupo` int(11) NOT NULL,
  `curso` varchar(50) NOT NULL,
  `idProf` int(11) NOT NULL,
  `materia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`idGrupo`, `curso`, `idProf`, `materia`) VALUES
(1, 'sexto', 80003, 'Matematicas'),
(2, 'sexto', 85432, 'Castellano'),
(3, 'sexto', 100054, 'Historia'),
(4, 'sexto', 527758, 'Geometria'),
(5, 'sexto', 546639, 'Musica'),
(6, 'sexto', 932322, 'Religion'),
(7, 'septimo', 80003, 'Matematicas'),
(8, 'septimo', 85432, 'Castellano'),
(9, 'septimo', 100054, 'Historia'),
(10, 'septimo', 527758, 'Geometria'),
(11, 'septimo', 546639, 'Musica'),
(12, 'septimo', 932322, 'Religion'),
(13, 'octavo', 80003, 'Matematicas'),
(14, 'octavo', 85432, 'Castellano'),
(15, 'octavo', 100054, 'Historia'),
(16, 'octavo', 527758, 'Geometria'),
(17, 'octavo', 546639, 'Musica'),
(18, 'octavo', 932322, 'Religion'),
(19, 'noveno', 10012, 'Matematicas'),
(20, 'noveno', 90323, 'Castellano'),
(21, 'noveno', 100087, 'Historia'),
(22, 'noveno', 536732, 'Geometria'),
(23, 'noveno', 546639, 'Musica'),
(24, 'noveno', 1000343, 'Religion'),
(25, 'decimo', 10012, 'Matematicas'),
(26, 'decimo', 90323, 'Castellano'),
(27, 'decimo', 100087, 'Historia'),
(28, 'decimo', 536732, 'Geometria'),
(29, 'decimo', 546639, 'Musica'),
(30, 'decimo', 1000343, 'Religion'),
(31, 'once', 10012, 'Matematicas'),
(32, 'once', 90323, 'Castellano'),
(33, 'once', 100087, 'Historia'),
(34, 'once', 536732, 'Geometria'),
(35, 'once', 546639, 'Musica'),
(36, 'once', 1000343, 'Religion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `idHorario` int(11) NOT NULL,
  `idGrupo` int(11) NOT NULL,
  `dia` varchar(10) NOT NULL,
  `hora` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`idHorario`, `idGrupo`, `dia`, `hora`) VALUES
(101, 1, 'Lunes', '7-8'),
(102, 1, 'Lunes', '8-9'),
(103, 1, 'Lunes', '9-10'),
(104, 2, 'Lunes', '11-12'),
(105, 2, 'Lunes', '12-1'),
(106, 2, 'Lunes', '1-2'),
(107, 2, 'Martes', '7-8'),
(108, 2, 'Martes', '8-9'),
(109, 2, 'Martes', '9-10'),
(110, 4, 'Martes', '11-12'),
(111, 4, 'Martes', '12-1'),
(112, 4, 'Martes', '1-2'),
(113, 4, 'Miercoles', '7-8'),
(114, 4, 'Miercoles', '8-9'),
(115, 4, 'Miercoles', '9-10'),
(116, 3, 'Miercoles', '11-12'),
(117, 3, 'Miercoles', '12-1'),
(118, 3, 'Miercoles', '1-2'),
(119, 6, 'Jueves', '7-8'),
(120, 6, 'Jueves', '8-9'),
(121, 6, 'Jueves', '9-10'),
(122, 1, 'Jueves', '11-12'),
(123, 1, 'Jueves', '12-1'),
(124, 1, 'Jueves', '1-2'),
(125, 5, 'Viernes', '7-8'),
(126, 5, 'Viernes', '8-9'),
(127, 5, 'Viernes', '9-10'),
(128, 6, 'Viernes', '11-12'),
(129, 6, 'Viernes', '12-1'),
(130, 6, 'Viernes', '1-2'),
(131, 8, 'Lunes', '7-8'),
(132, 8, 'Lunes', '8-9'),
(133, 8, 'Lunes', '9-10'),
(134, 7, 'Lunes', '11-12'),
(135, 7, 'Lunes', '12-1'),
(136, 7, 'Lunes', '1-2'),
(137, 11, 'Martes', '7-8'),
(138, 11, 'Martes', '8-9'),
(139, 11, 'Martes', '9-10'),
(140, 12, 'Martes', '11-12'),
(141, 12, 'Martes', '12-1'),
(142, 12, 'Martes', '1-2'),
(143, 7, 'Miercoles', '7-8'),
(144, 7, 'Miercoles', '8-9'),
(145, 7, 'Miercoles', '9-10'),
(146, 10, 'Miercoles', '11-12'),
(147, 10, 'Miercoles', '12-1'),
(148, 10, 'Miercoles', '1-2'),
(149, 8, 'Jueves', '7-8'),
(150, 8, 'Jueves', '8-9'),
(151, 8, 'Jueves', '9-10'),
(152, 10, 'Jueves', '11-12'),
(153, 10, 'Jueves', '12-1'),
(154, 10, 'Jueves', '1-2'),
(155, 12, 'Viernes', '7-8'),
(156, 12, 'Viernes', '8-9'),
(157, 12, 'Viernes', '9-10'),
(158, 9, 'Viernes', '11-12'),
(159, 9, 'Viernes', '12-1'),
(160, 9, 'Viernes', '1-2'),
(161, 16, 'Lunes', '7-8'),
(162, 16, 'Lunes', '8-9'),
(163, 16, 'Lunes', '9-10'),
(164, 18, 'Lunes', '11-12'),
(165, 18, 'Lunes', '12-1'),
(166, 18, 'Lunes', '1-2'),
(167, 18, 'Martes', '7-8'),
(168, 18, 'Martes', '8-9'),
(169, 18, 'Martes', '9-10'),
(170, 13, 'Martes', '11-12'),
(171, 13, 'Martes', '12-1'),
(172, 13, 'Martes', '1-2'),
(173, 14, 'Miercoles', '7-8'),
(174, 14, 'Miercoles', '8-9'),
(175, 14, 'Miercoles', '9-10'),
(176, 17, 'Miercoles', '11-12'),
(177, 17, 'Miercoles', '12-1'),
(178, 17, 'Miercoles', '1-2'),
(179, 15, 'Jueves', '7-8'),
(180, 15, 'Jueves', '8-9'),
(181, 15, 'Jueves', '9-10'),
(182, 14, 'Jueves', '11-12'),
(183, 14, 'Jueves', '12-1'),
(184, 14, 'Jueves', '1-2'),
(185, 16, 'Viernes', '7-8'),
(186, 16, 'Viernes', '8-9'),
(187, 16, 'Viernes', '9-10'),
(188, 13, 'Viernes', '11-12'),
(189, 13, 'Viernes', '12-1'),
(190, 13, 'Viernes', '1-2'),
(191, 20, 'Lunes', '7-8'),
(192, 20, 'Lunes', '8-9'),
(193, 20, 'Lunes', '9-10'),
(194, 24, 'Lunes', '11-12'),
(195, 24, 'Lunes', '12-1'),
(196, 24, 'Lunes', '1-2'),
(197, 19, 'Martes', '7-8'),
(198, 19, 'Martes', '8-9'),
(199, 19, 'Martes', '9-10'),
(200, 22, 'Martes', '11-12'),
(201, 22, 'Martes', '12-1'),
(202, 22, 'Martes', '1-2'),
(203, 19, 'Miercoles', '7-8'),
(204, 19, 'Miercoles', '8-9'),
(205, 19, 'Miercoles', '9-10'),
(206, 22, 'Miercoles', '11-12'),
(207, 22, 'Miercoles', '12-1'),
(208, 22, 'Miercoles', '1-2'),
(209, 21, 'Jueves', '7-8'),
(210, 21, 'Jueves', '8-9'),
(211, 21, 'Jueves', '9-10'),
(212, 23, 'Jueves', '11-12'),
(213, 23, 'Jueves', '12-1'),
(214, 23, 'Jueves', '1-2'),
(215, 24, 'Viernes', '7-8'),
(216, 24, 'Viernes', '8-9'),
(217, 24, 'Viernes', '9-10'),
(218, 20, 'Viernes', '11-12'),
(219, 20, 'Viernes', '12-1'),
(220, 20, 'Viernes', '1-2'),
(221, 25, 'Lunes', '7-8'),
(222, 25, 'Lunes', '8-9'),
(223, 25, 'Lunes', '9-10'),
(224, 29, 'Lunes', '11-12'),
(225, 29, 'Lunes', '12-1'),
(226, 29, 'Lunes', '1-2'),
(227, 28, 'Martes', '7-8'),
(228, 28, 'Martes', '8-9'),
(229, 28, 'Martes', '9-10'),
(230, 30, 'Martes', '11-12'),
(231, 30, 'Martes', '12-1'),
(232, 30, 'Martes', '1-2'),
(233, 26, 'Miercoles', '7-8'),
(234, 26, 'Miercoles', '8-9'),
(235, 26, 'Miercoles', '9-10'),
(236, 30, 'Miercoles', '11-12'),
(237, 30, 'Miercoles', '12-1'),
(238, 30, 'Miercoles', '1-2'),
(239, 26, 'Jueves', '7-8'),
(240, 26, 'Jueves', '8-9'),
(241, 26, 'Jueves', '9-10'),
(242, 28, 'Jueves', '11-12'),
(243, 28, 'Jueves', '12-1'),
(244, 28, 'Jueves', '1-2'),
(245, 25, 'Viernes', '7-8'),
(246, 25, 'Viernes', '8-9'),
(247, 25, 'Viernes', '9-10'),
(248, 27, 'Viernes', '11-12'),
(249, 27, 'Viernes', '12-1'),
(250, 27, 'Viernes', '1-2'),
(251, 34, 'Lunes', '7-8'),
(252, 34, 'Lunes', '8-9'),
(253, 34, 'Lunes', '9-10'),
(254, 31, 'Lunes', '11-12'),
(255, 31, 'Lunes', '12-1'),
(256, 31, 'Lunes', '1-2'),
(257, 32, 'Martes', '7-8'),
(258, 32, 'Martes', '8-9'),
(259, 32, 'Martes', '9-10'),
(260, 35, 'Martes', '11-12'),
(261, 35, 'Martes', '12-1'),
(262, 35, 'Martes', '1-2'),
(263, 36, 'Miercoles', '7-8'),
(264, 36, 'Miercoles', '8-9'),
(265, 36, 'Miercoles', '9-10'),
(266, 32, 'Miercoles', '11-12'),
(267, 32, 'Miercoles', '12-1'),
(268, 32, 'Miercoles', '1-2'),
(269, 31, 'Jueves', '7-8'),
(270, 31, 'Jueves', '8-9'),
(271, 31, 'Jueves', '9-10'),
(272, 33, 'Jueves', '11-12'),
(273, 33, 'Jueves', '12-1'),
(274, 33, 'Jueves', '1-2'),
(275, 34, 'Viernes', '7-8'),
(276, 34, 'Viernes', '8-9'),
(277, 34, 'Viernes', '9-10'),
(278, 36, 'Viernes', '11-12'),
(279, 36, 'Viernes', '12-1'),
(280, 36, 'Viernes', '1-2');

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
(24, 'Musica', 4, 34, 80765),
(25, 'Matematicas', 1, 20, 154353),
(26, 'Matematicas', 2, 30, 154353),
(27, 'Matematicas', 3, 20, 154353),
(28, 'Matematicas', 4, 30, 154353),
(29, 'Historia', 1, 30, 154353),
(30, 'Historia', 2, 30, 154353),
(31, 'Historia', 3, 30, 154353),
(32, 'Historia', 4, 30, 154353),
(33, 'Geometria', 1, 40, 154353),
(34, 'Geometria', 2, 40, 154353),
(35, 'Geometria', 3, 30, 154353),
(36, 'Geometria', 4, 30, 154353),
(37, 'Castellano', 1, 40, 154353),
(38, 'Castellano', 2, 40, 154353),
(39, 'Castellano', 3, 40, 154353),
(40, 'Castellano', 4, 40, 154353),
(41, 'Religion', 1, 42, 154353),
(42, 'Religion', 2, 40, 154353),
(43, 'Religion', 3, 42, 154353),
(44, 'Religion', 4, 40, 154353),
(45, 'Musica', 1, 42, 154353),
(46, 'Musica', 2, 48, 154353),
(47, 'Musica', 3, 42, 154353),
(48, 'Musica', 4, 45, 154353);

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
(10012, 'Andres', 'profesor', 30, 'andreita32@gmail.com', 'andreita32', 322322, 'Matematicas'),
(80003, 'Carlos', 'profesor', 32, 'carlitos@gmail.com', 'ccc888', 3078676, 'Matematicas'),
(85432, 'Roberto', 'profesor', 46, 'roberto56@gmail.com', 'roberto56', 3454543, 'Castellano'),
(90323, 'Sara', 'profesor', 30, 'sarita32@gmail.com', 'sarita32', 3786754, 'Catellano'),
(100054, 'diana', 'profesor', 37, 'dianita@gmail.com', 'ddd333', 312323, 'Historia'),
(100087, 'Ana', 'profesor', 30, 'ana32@gmail.com', 'ana32', 316343, 'Historia'),
(527758, 'Juan', 'profesor', 40, 'juanito@gmail.com', '4563', 322132, 'Geometria'),
(536732, 'Fabian', 'profesor', 30, 'fabian77@gmail.com', 'fabian77', 3654453, 'Geometria'),
(546639, 'maria', 'profesor', 46, 'mari@gmail.com', 'mmm666', 3154646, 'Musica'),
(932322, 'Laura', 'profesor', 30, 'lau54@gmail.com', 'lau54', 345343, 'Religion'),
(1000343, 'Juliana', 'profesor', 36, 'juliana56@gmail.com', 'roberto56', 32054443, 'Religion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `idTarea` int(11) NOT NULL,
  `idGrupo` int(11) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `fechaEntrega` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`idTarea`, `idGrupo`, `descripcion`, `fechaEntrega`) VALUES
(100, 1, 'Realizar 5 multiplicaciones de decimales de dos cifras', '2024-06-06'),
(101, 2, 'Cree una fábula(máximo una hoja)', '2024-04-24'),
(102, 3, 'Consulte sobre la segunda guerra mundial', '2024-06-04'),
(103, 4, 'Dibuje los tipos de triángulos', '2024-06-24'),
(104, 31, 'Resuleva los 10 ejercicios de ecuaciones diferenciales de la pág.120 del libro', '2024-05-05'),
(105, 32, 'Desarrolle un ensayo literario el existencialismo de albert camus', '2024-06-04'),
(106, 33, 'Investigue acerca de un hecho histórico sucedido en el país y prepare una exposición', '2024-06-10'),
(107, 25, 'Resuleva los 10 ejercicios de la pag 120 del libro algebra de baldor.', '2024-05-05'),
(108, 26, 'Desarrolle una exposición sobre el existencialismo.', '2024-06-04'),
(109, 27, 'Investigue acerca de un hecho histórico sucedido en el país.', '2024-06-10');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`idGrupo`),
  ADD KEY `idProf` (`idProf`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`idHorario`),
  ADD KEY `idGrupo` (`idGrupo`);

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
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`idTarea`),
  ADD KEY `idGrupo` (`idGrupo`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD CONSTRAINT `grupoprofe` FOREIGN KEY (`idProf`) REFERENCES `profesor` (`id`);

--
-- Filtros para la tabla `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `horariogrupo` FOREIGN KEY (`idGrupo`) REFERENCES `grupos` (`idGrupo`);

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notaestudiante` FOREIGN KEY (`idEs`) REFERENCES `estudiante` (`id`);

--
-- Filtros para la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD CONSTRAINT `tareasgrupos` FOREIGN KEY (`idGrupo`) REFERENCES `grupos` (`idGrupo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
