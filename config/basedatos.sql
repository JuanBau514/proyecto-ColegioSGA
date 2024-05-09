

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `estudiante` (
  `Nombre` varchar(50) NOT NULL,
  `Profesion` varchar(20) NOT NULL,
  `Edad` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Contrasena` varchar(50) NOT NULL,
  `Grado` int(20) NOT NULL
) ;

CREATE TABLE `profesor` (
  `Nombre` varchar(50) NOT NULL,
  `Profesion` varchar(20) NOT NULL,
  `Edad` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Contrasena` varchar(50) NOT NULL
) ;

