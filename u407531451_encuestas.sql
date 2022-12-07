-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 07-12-2022 a las 18:15:45
-- Versión del servidor: 10.5.17-MariaDB-cll-lve
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u407531451_encuestas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id_curso` int(11) NOT NULL,
  `nombre_curso` text COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id_curso`, `nombre_curso`) VALUES
(1, 'Prueba'),
(140, 'DEMO 2022');

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
(1, 'Prueba Tesla'),
(2, 'Encuesta 1 ');

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
(1, 'Si', 1),
(2, 'No', 1),
(3, 'A veces', 1),
(4, 'Si', 2),
(5, 'No', 2),
(6, 'En caso de haber tenido alguna dificultad contanos porqué...', 3),
(7, 'Si', 4),
(8, 'No', 4),
(9, 'A veces', 4),
(10, 'Aquí podes dejarnos algún comentario o sugerencia...', 5),
(11, 'Comprensible', 6),
(12, 'Incomprensible', 6),
(13, 'Deje aquí su comentario o sugerencia.', 7);

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
(1, '¿Has consultado las clases subidas al aula virtual?', 1, 1),
(2, '¿Tuviste alguna dificultad para encontrar los contenidos?', 1, 1),
(3, '¿Por qué?', 2, 1),
(4, '¿Descargas los PDF del aula virtual para leerlos?', 1, 1),
(5, '¿Te gustaría agregar algo más?', 2, 1),
(6, 'Las explicaciones del docente le resultaron', 1, 2),
(7, '¿Te gustaría agregar algo más?', 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respondio`
--

CREATE TABLE `respondio` (
  `id_inscripcion` int(11) NOT NULL,
  `curso_id` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `encuesta_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `respondio`
--

INSERT INTO `respondio` (`id_inscripcion`, `curso_id`, `id_alumno`, `encuesta_id`) VALUES
(11, 1, 1, 2),
(13, 140, 7221, 1),
(14, 140, 7275, 1),
(15, 140, 7281, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados`
--

CREATE TABLE `resultados` (
  `id_resultado` int(11) NOT NULL,
  `resultado_encuesta_id` int(11) NOT NULL,
  `resultado_curso_id` int(11) NOT NULL,
  `respuesta_text` text COLLATE utf8_spanish2_ci NOT NULL,
  `respuesta_multiplechoice` text COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` date NOT NULL,
  `pregunta_id` int(11) NOT NULL,
  `opcion_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `resultados`
--

INSERT INTO `resultados` (`id_resultado`, `resultado_encuesta_id`, `resultado_curso_id`, `respuesta_text`, `respuesta_multiplechoice`, `fecha`, `pregunta_id`, `opcion_id`) VALUES
(30, 1, 140, '0', 'Si', '2022-11-25', 0, 0),
(31, 1, 140, '0', 'Si', '2022-11-25', 0, 0),
(32, 1, 140, '0', 'A veces', '2022-11-25', 0, 0),
(33, 1, 140, 'No los encontré', '0', '2022-11-25', 3, 0),
(34, 1, 140, 'me gusta el edificio', '0', '2022-11-25', 5, 0),
(35, 1, 140, '0', 'Si', '2022-11-25', 0, 0),
(36, 1, 140, '0', 'No', '2022-11-25', 0, 0),
(37, 1, 140, '0', 'Si', '2022-11-25', 0, 0),
(40, 1, 140, '0', 'Si', '2022-11-25', 0, 0),
(41, 1, 140, '0', 'No', '2022-11-25', 0, 0),
(42, 1, 140, '0', 'A veces', '2022-11-25', 0, 0),
(45, 2, 1, '0', 'Comprensible', '2022-11-25', 0, 0),
(46, 1, 140, '0', 'Si', '2022-11-30', 0, 0),
(47, 1, 140, '0', 'No', '2022-11-30', 0, 0),
(48, 1, 140, '0', 'Si', '2022-11-30', 0, 0),
(49, 1, 140, 'bkñjbjkbj', '0', '2022-11-30', 5, 0),
(50, 1, 140, '0', 'Si', '2022-12-05', 1, 0),
(51, 1, 140, '0', 'No', '2022-12-05', 2, 0),
(52, 1, 140, '0', 'Si', '2022-12-05', 4, 0),
(53, 1, 140, 'Gracias!', '0', '2022-12-05', 5, 0),
(54, 1, 140, '0', 'No', '2022-12-06', 1, 0),
(55, 1, 140, '0', 'No', '2022-12-06', 2, 0),
(56, 1, 140, '0', 'Si', '2022-12-06', 4, 0),
(57, 1, 140, '0', 'Si', '2022-12-06', 1, 0),
(58, 1, 140, '0', 'No', '2022-12-06', 2, 0),
(59, 1, 140, '0', 'Si', '2022-12-06', 4, 0),
(60, 1, 140, 'Porque soy muy inteligente', '0', '2022-12-06', 3, 0),
(61, 1, 140, 'La gente de diseño es muy copada', '0', '2022-12-06', 5, 0);

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
(1, 'Múltiple choice'),
(2, 'Texto');

--
-- Índices para tablas volcadas
--

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
  ADD PRIMARY KEY (`id_inscripcion`),
  ADD KEY `curso_encuesta_id` (`curso_id`),
  ADD KEY `encuesta_id` (`encuesta_id`);

--
-- Indices de la tabla `resultados`
--
ALTER TABLE `resultados`
  ADD PRIMARY KEY (`id_resultado`),
  ADD KEY `resultado_curso_id` (`resultado_curso_id`),
  ADD KEY `resultado_encuesta_id` (`resultado_encuesta_id`),
  ADD KEY `pregunta_id` (`pregunta_id`),
  ADD KEY `opcion_id` (`opcion_id`);

--
-- Indices de la tabla `tipos_preguntas`
--
ALTER TABLE `tipos_preguntas`
  ADD PRIMARY KEY (`id_tipo_pregunta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `encuestas`
--
ALTER TABLE `encuestas`
  MODIFY `id_encuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `opciones`
--
ALTER TABLE `opciones`
  MODIFY `id_opciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id_pregunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `respondio`
--
ALTER TABLE `respondio`
  MODIFY `id_inscripcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `resultados`
--
ALTER TABLE `resultados`
  MODIFY `id_resultado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `tipos_preguntas`
--
ALTER TABLE `tipos_preguntas`
  MODIFY `id_tipo_pregunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

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
  ADD CONSTRAINT `respondio_ibfk_1` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `respondio_ibfk_2` FOREIGN KEY (`encuesta_id`) REFERENCES `encuestas` (`id_encuesta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `resultados`
--
ALTER TABLE `resultados`
  ADD CONSTRAINT `resultados_ibfk_1` FOREIGN KEY (`resultado_encuesta_id`) REFERENCES `encuestas` (`id_encuesta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `resultados_ibfk_2` FOREIGN KEY (`resultado_curso_id`) REFERENCES `cursos` (`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
