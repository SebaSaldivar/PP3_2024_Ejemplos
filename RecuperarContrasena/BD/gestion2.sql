-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2024 a las 15:42:27
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
-- Base de datos: `gestion2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `CODIGO_USUARIO` int(11) NOT NULL,
  `MAIL_USUARIO` varchar(255) NOT NULL,
  `CONTRASEÑA_USUARIO` varchar(255) NOT NULL,
  `token_recuperacion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`CODIGO_USUARIO`, `MAIL_USUARIO`, `CONTRASEÑA_USUARIO`, `token_recuperacion`) VALUES
(1, 'saeusuario@gmail.com', '$2y$10$0rqNIUjIzuVuIz4y1I89teTd/W8wM/MeDlUQIawEFNGqpWfrPwl.W', NULL),
(2, 'usuario2@gmail.com', '$2y$10$gkvStQQaXrFW1z7RzhhT4eOhyBgrn0rOYLPq/pDeKPoqBAV5G5fqi', NULL),
(3, 'usuario3@gmail.com', '$2y$10$nWynLt8AVpDnhP0J1I/KpeMxA6itEOYnbgbWfTVip7LMAvS.V1DWq', NULL),
(4, 'usuario4@gmail.com', '$2y$10$M1iRDT/u0J9H.vPA5l62sOaRIX0KrTt5KrMHR6dbQaLpRLG3.W1aC', NULL),
(5, 'usuario5@gmail.com', '$2y$10$K1.XYPqAGsQ7zKNtn2odWe7V1KE/.qESBtTwnzSUclSfj2B0BoGyi', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`CODIGO_USUARIO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `CODIGO_USUARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
