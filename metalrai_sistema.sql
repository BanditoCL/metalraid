-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 11-04-2023 a las 09:47:13
-- Versión del servidor: 10.5.19-MariaDB-cll-lve
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `metalrai_sistema`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulario`
--

CREATE TABLE `formulario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `descripcion` varchar(100) NOT NULL,
  `objetivo` varchar(100) NOT NULL,
  `area` varchar(100) NOT NULL,
  `persona` varchar(100) NOT NULL,
  `logistico` varchar(100) NOT NULL,
  `ubicacion` varchar(100) NOT NULL,
  `tiempo` varchar(100) NOT NULL,
  `trabajo` varchar(100) NOT NULL,
  `prioridad` varchar(100) NOT NULL,
  `accesibilidad` varchar(100) NOT NULL,
  `disponibilidad` varchar(100) NOT NULL,
  `horario` varchar(100) NOT NULL,
  `anticorrupcion` varchar(100) NOT NULL,
  `valorizacion` varchar(100) NOT NULL,
  `negocio` varchar(100) NOT NULL,
  `alcance` varchar(100) NOT NULL,
  `mano` varchar(100) NOT NULL,
  `materiales` varchar(100) NOT NULL,
  `servicios` varchar(100) NOT NULL,
  `cliente` varchar(100) NOT NULL,
  `tipotrabajo` varchar(100) NOT NULL,
  `epp` varchar(100) NOT NULL,
  `equipos` varchar(100) NOT NULL,
  `procedimientos` varchar(100) NOT NULL,
  `jefe` varchar(100) NOT NULL,
  `riesgos` varchar(100) NOT NULL,
  `observaciones` text NOT NULL,
  `imagen1` varchar(300) NOT NULL,
  `imagen2` varchar(300) NOT NULL,
  `imagen3` varchar(300) NOT NULL,
  `imagen4` varchar(300) NOT NULL,
  `imagen5` varchar(300) NOT NULL,
  `imagen6` varchar(300) NOT NULL,
  `imagen7` varchar(300) NOT NULL,
  `imagen8` varchar(300) NOT NULL,
  `imagen9` varchar(300) NOT NULL,
  `imagen10` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `formulario`
--

INSERT INTO `formulario` (`id`, `nombre`, `fecha`, `descripcion`, `objetivo`, `area`, `persona`, `logistico`, `ubicacion`, `tiempo`, `trabajo`, `prioridad`, `accesibilidad`, `disponibilidad`, `horario`, `anticorrupcion`, `valorizacion`, `negocio`, `alcance`, `mano`, `materiales`, `servicios`, `cliente`, `tipotrabajo`, `epp`, `equipos`, `procedimientos`, `jefe`, `riesgos`, `observaciones`, `imagen1`, `imagen2`, `imagen3`, `imagen4`, `imagen5`, `imagen6`, `imagen7`, `imagen8`, `imagen9`, `imagen10`) VALUES
(1047, 'Richard Mendoza', '2023-04-09 03:48:21', 'Prueba de excel', '', '', '', '', '', '', '', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '', '', '', '', '', '', 'files/64327bd5506e6_British_blue_2009_(cropped).jpg', 'files/64327bd55081a_gato-persa.jpg', '', '', '', '', '', '', '', ''),
(1048, 'Richard Mendoza ', '2023-04-09 03:50:23', 'Prueba desde celular ', '', '', '', '', '', '', '', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '', '', '', '', '', '', 'files/64327c4fe80cf_Screenshot_2023-04-08-13-41-21-731_com.android.vending-edit.jpg', 'files/64327c4fe81e2_IMG_20230330_222053.jpg', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `cargo` varchar(20) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `contrasena` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `cargo`, `usuario`, `contrasena`) VALUES
(1, 'Usuario', 'usuario', '123456'),
(2, 'Administrador', 'admin', 'admin123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `formulario`
--
ALTER TABLE `formulario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `formulario`
--
ALTER TABLE `formulario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1053;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
