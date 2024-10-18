-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-10-2024 a las 16:34:19
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
-- Base de datos: `gestion_clases_ppr3`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `ID_CARRERA` int(11) NOT NULL,
  `TITULO_ABREVIADO` varchar(100) NOT NULL,
  `DESCRIPCION` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`ID_CARRERA`, `TITULO_ABREVIADO`, `DESCRIPCION`) VALUES
(1, 'TSAS', 'Tecnicatura Superior en Análisis de Sistemas'),
(2, 'TSCIA', 'Tecnicatura Superior en CD e IA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases`
--

CREATE TABLE `clases` (
  `ID_CLASE` int(11) NOT NULL,
  `CODIGO_USUARIO` int(11) NOT NULL,
  `CODIGO_MATERIA` int(11) NOT NULL,
  `FECHA` date NOT NULL,
  `HORA` varchar(13) NOT NULL,
  `TEMAS` varchar(50) DEFAULT NULL,
  `NOVEDADES` varchar(50) DEFAULT NULL,
  `COMISION` varchar(20) NOT NULL,
  `AULA` varchar(20) NOT NULL,
  `ARCHIVOS` varchar(400) DEFAULT NULL
) ;

--
-- Volcado de datos para la tabla `clases`
--

INSERT INTO `clases` (`ID_CLASE`, `CODIGO_USUARIO`, `CODIGO_MATERIA`, `FECHA`, `HORA`, `TEMAS`, `NOVEDADES`, `COMISION`, `AULA`, `ARCHIVOS`) VALUES
(7, 1, 1001, '2024-10-18', '08:00-10:00', 'Introducción', 'Sin novedades', '1ro1ra', '21', 'archivo1.pdf'),
(8, 1, 1001, '2024-10-18', '10:10-12:10', 'Pronombres básicos', 'Sin novedades', '1ro2da', '22', 'archivo2.pdf'),
(9, 1, 1001, '2024-10-19', '08:00-12:10', 'Gramática inicial', 'Requiere revisión', '1ro3ra', '23', 'archivo3.pdf'),
(10, 1, 1002, '2024-10-19', '08:00-10:00', 'Introducción a la ciencia', 'Material extra disponible', '1ro1ra', '24', 'archivo4.pdf'),
(11, 1, 1002, '2024-10-19', '10:10-12:10', 'Evolución de la tecnología', 'Se cambió el aula', '1ro2da', '25', 'archivo5.pdf'),
(12, 1, 1002, '2024-10-20', '08:00-12:10', 'Sociedad y cultura', 'Reprogramar actividad', '1ro3ra', '26', 'archivo6.pdf'),
(13, 1, 1003, '2024-10-20', '08:00-10:00', 'Límites y continuidad', 'Pendiente de corrección', '1ro1ra', '27', 'archivo7.pdf'),
(14, 1, 1003, '2024-10-20', '10:10-12:10', 'Derivadas', 'Sin novedades', '1ro2da', '28', 'archivo8.pdf'),
(15, 1, 1003, '2024-10-21', '08:00-12:10', 'Integrales', 'Nueva actividad disponible', '1ro3ra', '29', 'archivo9.pdf'),
(16, 1, 2001, '2024-10-18', '18:00-20:00', 'Tiempos verbales avanzados', 'Material disponible en línea', '2do1ra', '30', 'archivo10.pdf'),
(17, 1, 2001, '2024-10-18', '20:10-22:10', 'Conjugaciones complejas', 'Pendiente material adicional', '2do2da', '31', 'archivo11.pdf'),
(18, 1, 2002, '2024-10-19', '18:00-20:00', 'Integrales de superficie', 'Nueva fecha de entrega', '2do1ra', '32', 'archivo12.pdf'),
(19, 1, 2002, '2024-10-19', '20:10-22:10', 'Series numéricas', 'Material pendiente de revisión', '2do2da', '33', 'archivo13.pdf'),
(20, 1, 2003, '2024-10-20', '18:00-20:00', 'Distribuciones de probabilidad', 'Agregar referencias bibliográficas', '2do1ra', '34', 'archivo14.pdf'),
(21, 1, 2003, '2024-10-20', '20:10-22:10', 'Teorema central del límite', 'Entrega próxima semana', '2do2da', '35', 'archivo15.pdf'),
(22, 1, 3001, '2024-10-18', '18:00-20:00', 'Preparación para exámenes internacionales', 'Simulacro de examen', '3ro1ra', '36', 'archivo16.pdf'),
(23, 1, 3001, '2024-10-18', '20:10-22:10', 'Traducciones complejas', 'Cambiar fecha de entrega', '3ro2da', '37', 'archivo17.pdf'),
(24, 1, 3002, '2024-10-19', '18:00-20:00', 'Aspectos legales de contratos', 'Firmas digitales requeridas', '3ro1ra', '38', 'archivo18.pdf'),
(25, 1, 3002, '2024-10-19', '20:10-22:10', 'Derechos de propiedad intelectual', 'Revisión de casos prácticos', '3ro2da', '39', 'archivo19.pdf'),
(26, 1, 3004, '2024-10-20', '18:00-20:00', 'Protocolo TCP/IP', 'Tarea práctica entregada', '3ro1ra', '40', 'archivo20.pdf'),
(27, 1, 3004, '2024-10-20', '20:10-22:10', 'Enrutamiento dinámico', 'Pendiente entrega final', '3ro2da', '41', 'archivo21.pdf'),
(28, 1, 1005, '2024-11-01', '08:00-10:00', 'Introducción a algoritmos', 'Sin novedades', '1ro1ra', '21', 'algoritmos1.pdf'),
(29, 1, 1005, '2024-11-01', '10:10-12:10', 'Estructuras de control', 'Pendiente de corrección', '1ro2da', '22', 'algoritmos2.pdf'),
(30, 1, 1005, '2024-11-02', '08:00-12:10', 'Estructuras de datos', 'Nueva actividad subida', '1ro3ra', '23', 'algoritmos3.pdf'),
(31, 1, 1006, '2024-11-03', '08:00-10:00', 'Concepto de sistemas', 'Material adicional subido', '1ro1ra', '24', 'sistemas1.pdf'),
(32, 1, 1006, '2024-11-03', '10:10-12:10', 'Teoría general de sistemas', 'Práctica asignada', '1ro2da', '25', 'sistemas2.pdf'),
(33, 1, 1006, '2024-11-04', '08:00-12:10', 'Sistemas en organizaciones', 'Corrección disponible', '1ro3ra', '26', 'sistemas3.pdf'),
(34, 1, 1007, '2024-11-05', '08:00-10:00', 'Componentes de un computador', 'Pendiente entrega', '1ro1ra', '27', 'arquitectura1.pdf'),
(35, 1, 1007, '2024-11-05', '10:10-12:10', 'Procesadores y memoria', 'Fecha de examen programada', '1ro2da', '28', 'arquitectura2.pdf'),
(36, 1, 1007, '2024-11-06', '08:00-12:10', 'Interconexión de componentes', 'Práctica evaluada', '1ro3ra', '29', 'arquitectura3.pdf'),
(37, 1, 1008, '2024-11-07', '08:00-10:00', 'Trabajo en equipo', 'Nuevas pautas entregadas', '1ro1ra', '30', 'practicas1.pdf'),
(38, 1, 1008, '2024-11-07', '10:10-12:10', 'Desarrollo de proyectos', 'Correcciones subidas', '1ro2da', '31', 'practicas2.pdf'),
(39, 1, 1008, '2024-11-08', '08:00-12:10', 'Evaluación de proyectos', 'Cambios en la fecha de entrega', '1ro3ra', '32', 'practicas3.pdf'),
(40, 1, 2003, '2024-11-09', '18:00-20:00', 'Distribución de frecuencias', 'Pendiente de evaluación', '2do1ra', '33', 'estadistica1.pdf'),
(41, 1, 2003, '2024-11-09', '20:10-22:10', 'Probabilidad y azar', 'Nuevo material disponible', '2do2da', '34', 'estadistica2.pdf'),
(42, 1, 2003, '2024-11-10', '18:00-22:10', 'Teorema de Bayes', 'Ejercicios adicionales asignados', '2do1ra', '35', 'estadistica3.pdf'),
(43, 1, 2004, '2024-11-11', '18:00-20:00', 'Ciclo de vida del software', 'Entrega reprogramada', '2do1ra', '36', 'software1.pdf'),
(44, 1, 2004, '2024-11-11', '20:10-22:10', 'Modelado de requerimientos', 'Nueva tarea subida', '2do2da', '37', 'software2.pdf'),
(45, 1, 2004, '2024-11-12', '18:00-22:10', 'Desarrollo ágil', 'Cambios en el cronograma', '2do1ra', '38', 'software3.pdf'),
(46, 1, 3002, '2024-11-13', '18:00-20:00', 'Contratos en TI', 'Documentos legales subidos', '3ro1ra', '39', 'legales1.pdf'),
(47, 1, 3002, '2024-11-13', '20:10-22:10', 'Propiedad intelectual', 'Práctica asignada', '3ro2da', '40', 'legales2.pdf'),
(48, 1, 3002, '2024-11-14', '18:00-22:10', 'Regulación y normativas', 'Revisión final disponible', '3ro1ra', '41', 'legales3.pdf'),
(49, 1, 3003, '2024-11-15', '18:00-20:00', 'Tendencias actuales en TI', 'Presentación de invitados', '3ro1ra', '42', 'seminario1.pdf'),
(50, 1, 3003, '2024-11-15', '20:10-22:10', 'Nuevas tecnologías emergentes', 'Tarea entregada', '3ro2da', '43', 'seminario2.pdf'),
(51, 1, 3003, '2024-11-16', '18:00-22:10', 'Innovaciones en software', 'Examen programado', '3ro1ra', '44', 'seminario3.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `CODIGO_MATERIA` int(11) NOT NULL,
  `NOMBRE_MATERIA` varchar(100) NOT NULL,
  `ID_CARRERA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`CODIGO_MATERIA`, `NOMBRE_MATERIA`, `ID_CARRERA`) VALUES
(1001, 'Inglés I', 1),
(1002, 'Ciencia Tecnología y Sociedad', 1),
(1003, 'Análisis Matemático I', 1),
(1004, 'Algebra', 1),
(1005, 'Algoritmos y estructuras de datos I', 1),
(1006, 'Sistemas y Organizaciones', 1),
(1007, 'Arquitectura de Computadores', 1),
(1008, 'Prácticas Profesionalizantes I', 1),
(2001, 'Inglés II', 1),
(2002, 'Análisis Matemático II', 1),
(2003, 'Estadística', 1),
(2004, 'Ingeniería de Software I', 1),
(2005, 'Algoritmos y estructuras de datos II', 1),
(2006, 'Sistemas Operativos', 1),
(2007, 'Base de Datos', 1),
(2008, 'Prácticas Profesionalizantes II', 1),
(3001, 'Inglés III', 1),
(3002, 'Aspectos legales de la Profesión', 1),
(3003, 'Seminario de actualización', 1),
(3004, 'Redes y Comunicaciones', 1),
(3005, 'Ingeniería de Software II', 1),
(3006, 'Algoritmos y estructuras de datos III', 1),
(3007, 'Prácticas Profesionalizantes III', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `CODIGO_MODULO` int(11) NOT NULL,
  `DESCRIPCION` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`CODIGO_MODULO`, `DESCRIPCION`) VALUES
(1, 'Gestión de Usuarios'),
(2, 'Gestión de Clases');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `DNI_PERSONA` int(11) NOT NULL,
  `NOMBRE_PERSONA` varchar(50) NOT NULL,
  `APELLIDO_PERSONA` varchar(50) NOT NULL,
  `CARGO` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`DNI_PERSONA`, `NOMBRE_PERSONA`, `APELLIDO_PERSONA`, `CARGO`) VALUES
(12345678, 'Juan', 'Perez', 'Profesor'),
(23456789, 'Maria', 'Gonzalez', 'Estudiante'),
(34567890, 'Luis', 'Martinez', 'Administrativo'),
(55555555, 'Jose', 'Torales', 'Profesor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `CODIGO_ROL` int(11) NOT NULL,
  `DESCRIPCION` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`CODIGO_ROL`, `DESCRIPCION`) VALUES
(1, 'Administrador'),
(2, 'Profesor'),
(3, 'Estudiante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rolxmod`
--

CREATE TABLE `rolxmod` (
  `CODIGO_ROL` int(11) NOT NULL,
  `CODIGO_MODULO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `rolxmod`
--

INSERT INTO `rolxmod` (`CODIGO_ROL`, `CODIGO_MODULO`) VALUES
(1, 1),
(1, 2),
(2, 2),
(3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `CODIGO_USUARIO` int(11) NOT NULL,
  `DNI_PERSONA` int(11) NOT NULL,
  `MAIL_USUARIO` varchar(60) NOT NULL,
  `CONTRASEÑA_USUARIO` varchar(255) DEFAULT NULL,
  `token_recuperacion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`CODIGO_USUARIO`, `DNI_PERSONA`, `MAIL_USUARIO`, `CONTRASEÑA_USUARIO`, `token_recuperacion`) VALUES
(1, 34567890, 'luism@itbeltran.com.ar', '$2y$10$q2H/X1IEZdRtCS1Asf2raOLzwo/b9PiqmiI1J97zO.T7s3w.YRM/2', NULL),
(2, 55555555, 'jtorales@itbeltran.com.ar', '$2y$10$Dwok44BGVwz7sFDt/SJ7.Owj3qWeXRCQ0UYrz9./6HnE2kckyeEai', NULL),
(3, 12345678, 'juan.perez@example.com', '$2y$10$VWB.6fpn.m.WMz8uB2BsW.0JFNKKyRGD5ZTjTiE35BAuWWutp9oSm', NULL),
(4, 23456789, 'mgon@algo.com.ar', '$2y$10$35swk/sVfx8rDgSM34MIV.WHpK427Xcboqausm15T17LhoOK89k9e', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuxrol`
--

CREATE TABLE `usuxrol` (
  `CODIGO_USUARIO` int(11) NOT NULL,
  `CODIGO_ROL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`ID_CARRERA`);

--
-- Indices de la tabla `clases`
--
ALTER TABLE `clases`
  ADD PRIMARY KEY (`ID_CLASE`),
  ADD KEY `CODIGO_USUARIO` (`CODIGO_USUARIO`),
  ADD KEY `CODIGO_MATERIA` (`CODIGO_MATERIA`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`CODIGO_MATERIA`),
  ADD KEY `ID_CARRERA` (`ID_CARRERA`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`CODIGO_MODULO`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`DNI_PERSONA`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`CODIGO_ROL`);

--
-- Indices de la tabla `rolxmod`
--
ALTER TABLE `rolxmod`
  ADD PRIMARY KEY (`CODIGO_ROL`,`CODIGO_MODULO`),
  ADD KEY `CODIGO_MODULO` (`CODIGO_MODULO`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`CODIGO_USUARIO`),
  ADD UNIQUE KEY `UK_DNI_PERSONA` (`DNI_PERSONA`);

--
-- Indices de la tabla `usuxrol`
--
ALTER TABLE `usuxrol`
  ADD PRIMARY KEY (`CODIGO_USUARIO`,`CODIGO_ROL`),
  ADD KEY `CODIGO_ROL` (`CODIGO_ROL`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `ID_CARRERA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `clases`
--
ALTER TABLE `clases`
  MODIFY `ID_CLASE` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `CODIGO_USUARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clases`
--
ALTER TABLE `clases`
  ADD CONSTRAINT `clases_ibfk_1` FOREIGN KEY (`CODIGO_USUARIO`) REFERENCES `usuarios` (`CODIGO_USUARIO`),
  ADD CONSTRAINT `clases_ibfk_2` FOREIGN KEY (`CODIGO_MATERIA`) REFERENCES `materias` (`CODIGO_MATERIA`);

--
-- Filtros para la tabla `materias`
--
ALTER TABLE `materias`
  ADD CONSTRAINT `materias_ibfk_1` FOREIGN KEY (`ID_CARRERA`) REFERENCES `carreras` (`ID_CARRERA`);

--
-- Filtros para la tabla `rolxmod`
--
ALTER TABLE `rolxmod`
  ADD CONSTRAINT `rolxmod_ibfk_1` FOREIGN KEY (`CODIGO_ROL`) REFERENCES `roles` (`CODIGO_ROL`),
  ADD CONSTRAINT `rolxmod_ibfk_2` FOREIGN KEY (`CODIGO_MODULO`) REFERENCES `modulos` (`CODIGO_MODULO`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`DNI_PERSONA`) REFERENCES `personas` (`DNI_PERSONA`);

--
-- Filtros para la tabla `usuxrol`
--
ALTER TABLE `usuxrol`
  ADD CONSTRAINT `usuxrol_ibfk_1` FOREIGN KEY (`CODIGO_USUARIO`) REFERENCES `usuarios` (`CODIGO_USUARIO`),
  ADD CONSTRAINT `usuxrol_ibfk_2` FOREIGN KEY (`CODIGO_ROL`) REFERENCES `roles` (`CODIGO_ROL`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
