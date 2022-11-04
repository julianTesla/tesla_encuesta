-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-11-2022 a las 23:47:20
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tesla_encuestas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id_alumno` int(11) NOT NULL,
  `usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_encuesta`
--

CREATE TABLE `asignacion_encuesta` (
  `id_asignacion_encuesta` int(11) NOT NULL,
  `curso_id` int(11) NOT NULL,
  `encuesta_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id_curso` int(11) NOT NULL,
  `nombre_curso` text COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuestas`
--

CREATE TABLE `encuestas` (
  `id_encuesta` int(11) NOT NULL,
  `nombre_encuesta` text COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `encuestas`
--

INSERT INTO `encuestas` (`id_encuesta`, `nombre_encuesta`) VALUES
(6, '0'),
(7, '0'),
(8, 'Encuesta Nº1'),
(9, 'Encuesta julian'),
(10, 'Encuesta final');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opciones`
--

CREATE TABLE `opciones` (
  `id_opciones` int(11) NOT NULL,
  `descripcion` text COLLATE utf8_spanish2_ci NOT NULL,
  `pregunta_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `opciones`
--

INSERT INTO `opciones` (`id_opciones`, `descripcion`, `pregunta_id`) VALUES
(1, '', 4),
(2, '', 5),
(3, 'mas', 6),
(4, '', 6),
(5, '', 6),
(6, '', 6),
(7, '', 6),
(8, '', 6),
(9, 'mal', 7),
(10, 'mas', 8),
(11, 'bien', 8),
(12, 'regular', 8),
(13, '', 8),
(14, '', 8),
(15, '', 8),
(16, 'rey', 9),
(17, 'reyna', 9),
(18, '', 9),
(19, '', 9),
(20, '', 9),
(21, '', 9),
(22, 'ly', 10),
(23, 'le', 10),
(24, 'ly', 11),
(25, 'le', 11),
(26, 'lo', 11),
(27, 'pop', 12),
(28, 'comentanos', 13),
(29, 'uno', 14),
(30, 'dos', 14),
(31, 'uno', 15),
(32, 'dos', 15),
(33, 'esta es la marca de agua', 16),
(34, 'opcion1', 17),
(35, 'opcion2', 17),
(36, 'opcion3', 17),
(37, 'opcion4', 17),
(38, 'opcion5', 17),
(39, 'marca de agua', 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `id_pregunta` int(11) NOT NULL,
  `nombre_pregunta` text COLLATE utf8_spanish2_ci NOT NULL,
  `tipo_pregunta_id` int(11) NOT NULL,
  `encuesta_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id_pregunta`, `nombre_pregunta`, `tipo_pregunta_id`, `encuesta_id`) VALUES
(3, 'Pregunta Nº1 de la encuesta 3', 1, 0),
(4, 'Pregunta Nº2 de la encuesta 3', 1, 0),
(5, '', 1, 0),
(6, 'pregunta Nº3 de la encuesta 6', 1, 0),
(7, 'pregunta Nº4 de la encuesta 6', 1, 0),
(8, 'pregunta Nº5 de la encuesta 6', 1, 0),
(9, 'pregunta Nº6  de la encuesta 6', 1, 0),
(10, 'pregunta Nº7  de la encuesta 6', 1, 0),
(11, 'pregunta Nº7  de la encuesta 6', 1, 0),
(12, 'pregunta Nº7 de la encuesta 6', 1, 0),
(13, 'pregunta Nº7 de la encuesta 6', 1, 0),
(14, 'Julian', 1, 8),
(15, 'pregunta julian', 1, 9),
(16, 'pregunta 2', 1, 9),
(17, '¿Pregunta final?', 1, 10),
(18, '¿Pregunta final dos?', 2, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respondio`
--

CREATE TABLE `respondio` (
  `id_inscripcion` int(11) NOT NULL,
  `respondio` int(11) NOT NULL,
  `curso_encuesta_id` int(11) NOT NULL,
  `alumno_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados`
--

CREATE TABLE `resultados` (
  `id_resultado` int(11) NOT NULL,
  `resultado_curso_id` int(11) NOT NULL,
  `respuesta_text` text COLLATE utf8_spanish2_ci NOT NULL,
  `respuesta_multiplechoice` text COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_preguntas`
--

CREATE TABLE `tipos_preguntas` (
  `id_tipo_pregunta` int(11) NOT NULL,
  `tipo` text COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tipos_preguntas`
--

INSERT INTO `tipos_preguntas` (`id_tipo_pregunta`, `tipo`) VALUES
(1, 'checkbox'),
(2, 'texto');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id_alumno`);

--
-- Indices de la tabla `asignacion_encuesta`
--
ALTER TABLE `asignacion_encuesta`
  ADD PRIMARY KEY (`id_asignacion_encuesta`),
  ADD KEY `curso_id` (`curso_id`),
  ADD KEY `encuesta_id` (`encuesta_id`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id_curso`);

--
-- Indices de la tabla `encuestas`
--
ALTER TABLE `encuestas`
  ADD PRIMARY KEY (`id_encuesta`);

--
-- Indices de la tabla `opciones`
--
ALTER TABLE `opciones`
  ADD PRIMARY KEY (`id_opciones`),
  ADD KEY `tipos_preguntas_id` (`pregunta_id`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id_pregunta`),
  ADD KEY `tipo_pregunta_id` (`tipo_pregunta_id`),
  ADD KEY `encuesta_id` (`encuesta_id`);

--
-- Indices de la tabla `respondio`
--
ALTER TABLE `respondio`
  ADD KEY `curso_encuesta_id` (`curso_encuesta_id`),
  ADD KEY `alumno_id` (`alumno_id`);

--
-- Indices de la tabla `resultados`
--
ALTER TABLE `resultados`
  ADD PRIMARY KEY (`id_resultado`),
  ADD KEY `resultado_curso_id` (`resultado_curso_id`);

--
-- Indices de la tabla `tipos_preguntas`
--
ALTER TABLE `tipos_preguntas`
  ADD PRIMARY KEY (`id_tipo_pregunta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id_alumno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `asignacion_encuesta`
--
ALTER TABLE `asignacion_encuesta`
  MODIFY `id_asignacion_encuesta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `encuestas`
--
ALTER TABLE `encuestas`
  MODIFY `id_encuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `opciones`
--
ALTER TABLE `opciones`
  MODIFY `id_opciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id_pregunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `resultados`
--
ALTER TABLE `resultados`
  MODIFY `id_resultado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipos_preguntas`
--
ALTER TABLE `tipos_preguntas`
  MODIFY `id_tipo_pregunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignacion_encuesta`
--
ALTER TABLE `asignacion_encuesta`
  ADD CONSTRAINT `asignacion_encuesta_ibfk_2` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `asignacion_encuesta_ibfk_3` FOREIGN KEY (`encuesta_id`) REFERENCES `encuestas` (`id_encuesta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `opciones`
--
ALTER TABLE `opciones`
  ADD CONSTRAINT `opciones_ibfk_1` FOREIGN KEY (`pregunta_id`) REFERENCES `preguntas` (`id_pregunta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD CONSTRAINT `preguntas_ibfk_2` FOREIGN KEY (`tipo_pregunta_id`) REFERENCES `tipos_preguntas` (`id_tipo_pregunta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `respondio`
--
ALTER TABLE `respondio`
  ADD CONSTRAINT `respondio_ibfk_1` FOREIGN KEY (`curso_encuesta_id`) REFERENCES `asignacion_encuesta` (`id_asignacion_encuesta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `respondio_ibfk_2` FOREIGN KEY (`alumno_id`) REFERENCES `alumnos` (`id_alumno`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
