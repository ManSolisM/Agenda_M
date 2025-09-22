-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-09-2025 a las 20:23:09
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
-- Base de datos: `agenda2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_contactos`
--

CREATE TABLE `t_contactos` (
  `id` int(11) NOT NULL,
  `paterno` varchar(50) DEFAULT NULL,
  `materno` varchar(50) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_contactos`
--

INSERT INTO `t_contactos` (`id`, `paterno`, `materno`, `nombre`, `telefono`, `correo`, `descripcion`) VALUES
(6, 'Romeroo', 'Cadena', 'Michelle', '3244320990', 'mich@gmail.com', ''),
(8, 'Solis', 'Mares', 'Jesuan', '3245974568', 'solis@gmail.com', ''),
(9, 'Santa', 'Rodriguez', 'Oto', '3246870707', 'zarza@gmail.com', ''),
(10, 'Santa', 'Rodriguez', 'Oto', '3246870707', 'zarza@gmail.com', ''),
(11, 'Santa', 'Rodriguez', 'Otho', '3246870707', 'zarza@gmail.com', ''),
(12, 'Santa', 'Rodriguez', 'Otho', '3246870707', 'zarza@gmail.com', ''),
(13, 'Santa', 'Rodriguez', 'Otho', '3246870707', 'zarza@gmail.com', ''),
(14, 'Santa', 'Rodriguez', 'Otho', '3246870707', 'zarza@gmail.com', ''),
(15, 'Santa', 'Rodriguez', 'Otho', '3246870707', 'zarza@gmail.com', ''),
(16, 'Santa', 'Rodriguez', 'Otho', '3246870707', 'zarza@gmail.com', ''),
(17, 'Santa', 'Rodriguez', 'Otho', '3246870707', 'zarza@gmail.com', ''),
(18, 'Santa', 'Rodriguez', 'Otho', '3246870707', 'zarza@gmail.com', ''),
(19, 'Santa', 'Rodriguez', 'Otho', '3246870707', 'zarza@gmail.com', ''),
(20, 'Santa', 'Rodriguez', 'Otho', '3246870707', 'zarza@gmail.com', ''),
(21, 'Santa', 'Rodriguez', 'Otho', '3246870707', 'zarza@gmail.com', ''),
(22, 'Santa', 'Rodriguez', 'Otho', '3246870707', 'zarza@gmail.com', ''),
(23, 'Santa', 'Rodriguez', 'Otho', '3246870707', 'zarza@gmail.com', ''),
(24, 'Santa', 'Rodriguez', 'Otho', '3246870707', 'zarza@gmail.com', ''),
(25, 'Santa', 'Rodriguez', 'Otho', '3246870707', 'zarza@gmail.com', ''),
(26, 'Santa', 'Rodriguez', 'Otho', '3246870707', 'zarza@gmail.com', ''),
(27, 'Santa', 'Rodriguez', 'Otho', '3246870707', 'zarza@gmail.com', ''),
(28, 'Santa', 'Rodriguez', 'Otho', '3246870707', 'zarza@gmail.com', ''),
(29, 'Santa', 'Rodriguez', 'Otho', '3246870707', 'zarza@gmail.com', ''),
(30, 'Santa', 'Rodriguez', 'Otho', '3246870707', 'zarza@gmail.com', ''),
(31, 'Santa', 'Rodriguez', 'Otho', '3246870707', 'zarza@gmail.com', ''),
(32, 'Santa', 'Rodriguez', 'Otho', '3246870707', 'zarza@gmail.com', ''),
(33, 'Santa', 'Rodriguez', 'Otho', '3246870707', 'zarza@gmail.com', ''),
(34, 'Santa', 'Rodriguez', 'Otho', '3246870707', 'zarza@gmail.com', ''),
(35, 'Santa', 'Rodriguez', 'Otho', '3246870707', 'zarza@gmail.com', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_fotos`
--

CREATE TABLE `t_fotos` (
  `id` int(11) NOT NULL,
  `id_contacto` int(11) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `ruta` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `t_contactos`
--
ALTER TABLE `t_contactos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `t_fotos`
--
ALTER TABLE `t_fotos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_contacto` (`id_contacto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `t_contactos`
--
ALTER TABLE `t_contactos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `t_fotos`
--
ALTER TABLE `t_fotos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `t_fotos`
--
ALTER TABLE `t_fotos`
  ADD CONSTRAINT `t_fotos_ibfk_1` FOREIGN KEY (`id_contacto`) REFERENCES `t_contactos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
