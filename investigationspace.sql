-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-04-2020 a las 01:21:32
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.2.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `investigationspace`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_amigos`
--

CREATE TABLE `tb_amigos` (
  `amigo_id` int(10) NOT NULL,
  `solicitante` int(10) NOT NULL,
  `solicitando` int(10) NOT NULL,
  `estado` int(1) NOT NULL DEFAULT 0,
  `fecht` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_articulos`
--

CREATE TABLE `tb_articulos` (
  `articulo_id` int(10) NOT NULL,
  `nombre_articulo` varchar(20) NOT NULL,
  `contenido_articulo` varchar(200) NOT NULL,
  `fecha_articulo` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_articulos`
--

INSERT INTO `tb_articulos` (`articulo_id`, `nombre_articulo`, `contenido_articulo`, `fecha_articulo`) VALUES
(1, 'TMP36', 'Como calcular la temperatura en grados celsius y fahrenhjal', '2020-03-01'),
(2, 'Sofware Libre', 'Distribuciones linux mas ligeras', '2020-03-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_chat`
--

CREATE TABLE `tb_chat` (
  `chat_id` int(10) NOT NULL,
  `msj_de` int(10) NOT NULL,
  `msj_a` int(10) NOT NULL,
  `mensaje` text NOT NULL,
  `msj_fecha` date NOT NULL,
  `leido` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_comentarios`
--

CREATE TABLE `tb_comentarios` (
  `comentaro_id` int(10) NOT NULL,
  `fk_estudiante_id` int(10) NOT NULL,
  `fk_publicacion_id` int(10) NOT NULL,
  `comentario_fecha` date NOT NULL,
  `comentario_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_detalle_estudiante`
--

CREATE TABLE `tb_detalle_estudiante` (
  `detalle_estudiante_id` int(10) NOT NULL,
  `fk_estudiante_id` int(10) NOT NULL,
  `nombre_universidad` varchar(50) NOT NULL,
  `facultad_universidad` varchar(20) NOT NULL,
  `carrera_universidad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_detalle_estudiante`
--

INSERT INTO `tb_detalle_estudiante` (`detalle_estudiante_id`, `fk_estudiante_id`, `nombre_universidad`, `facultad_universidad`, `carrera_universidad`) VALUES
(1, 1, 'Gerardo Barrios', 'Ciendia y Tecnologia', 'Ing, en Sistemas'),
(2, 2, 'Universidad Gerardo Barrios', 'Ciencia y tecnologia', 'Licenciatura en comp'),
(3, 3, 'UGB', 'Ciencia y Tecnologia', 'ing. en sistemas'),
(4, 4, 'UGB', 'Ciencia y Tecnologia', 'ing. en sistemas'),
(5, 5, 'Don Bosko', 'Ciencias de la Salud', 'Tecnico en Enfermeri');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_estudiante`
--

CREATE TABLE `tb_estudiante` (
  `estudiante_id` int(10) NOT NULL,
  `fk_usuario_id` int(10) NOT NULL,
  `photo` varchar(100) NOT NULL DEFAULT 'defect.jpg',
  `primer_nombre` varchar(20) NOT NULL,
  `segundo_nombre` varchar(20) NOT NULL,
  `apellido_paterno` varchar(20) NOT NULL,
  `apellido_materno` varchar(20) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `genero_estudiante` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_estudiante`
--

INSERT INTO `tb_estudiante` (`estudiante_id`, `fk_usuario_id`, `photo`, `primer_nombre`, `segundo_nombre`, `apellido_paterno`, `apellido_materno`, `fecha_nacimiento`, `genero_estudiante`) VALUES
(1, 1, 'user.png', 'Jonatan', 'Isai', 'Morales', 'Orellana', '1998-04-17', 'Masculino'),
(2, 2, 'defect.jpg', 'Josue', 'David', 'Morales', 'Orellana', '1995-03-02', 'Masculino'),
(3, 3, 'defect.jpg', 'Geylin', 'Azucena', 'Orellana', 'Ortiz', '2013-07-30', 'Femenino'),
(4, 4, 'defect.jpg', 'Geylin', 'Azucena', 'Orellana', 'Ortiz', '2013-07-30', 'Femenino'),
(5, 5, 'defect.jpg', 'Josue', 'David', 'Morales', 'Orellana', '1999-02-04', 'Masculino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_likes`
--

CREATE TABLE `tb_likes` (
  `like_id` int(10) NOT NULL,
  `publicacion_id` int(10) NOT NULL,
  `estudiante_id` int(10) NOT NULL,
  `estado_like` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_publicaciones`
--

CREATE TABLE `tb_publicaciones` (
  `publicacion_id` int(10) NOT NULL,
  `fk_estudiante_id` int(10) NOT NULL,
  `fk_articulo_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_publicaciones`
--

INSERT INTO `tb_publicaciones` (`publicacion_id`, `fk_estudiante_id`, `fk_articulo_id`) VALUES
(1, 1, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `usuario_id` int(10) NOT NULL,
  `correo_user` varchar(50) NOT NULL,
  `telefono_user` int(8) NOT NULL,
  `clave_user` char(100) NOT NULL,
  `codigo` varchar(10) DEFAULT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`usuario_id`, `correo_user`, `telefono_user`, `clave_user`, `codigo`, `fecha`) VALUES
(1, 'h28631053@gmail.com', 75762178, 'WmZDMEp5SWRIS1R0Q05ZZ1Vnd1Q4QT09', 'ISL9scZYXv', '2020-04-11 10:49:00'),
(2, 'moralesorellana170498@gmail.com', 61524588, 'WmZDMEp5SWRIS1R0Q05ZZ1Vnd1Q4QT09', '', '0000-00-00 00:00:00'),
(3, 'correo@gmail.com', 63022148, 'WmZDMEp5SWRIS1R0Q05ZZ1Vnd1Q4QT09', NULL, '0000-00-00 00:00:00'),
(4, 'email@gmail.com', 73062020, 'WmZDMEp5SWRIS1R0Q05ZZ1Vnd1Q4QT09', NULL, '0000-00-00 00:00:00'),
(5, 'david@gmail.com', 61524586, 'WmZDMEp5SWRIS1R0Q05ZZ1Vnd1Q4QT09', NULL, '0000-00-00 00:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_amigos`
--
ALTER TABLE `tb_amigos`
  ADD PRIMARY KEY (`amigo_id`);

--
-- Indices de la tabla `tb_articulos`
--
ALTER TABLE `tb_articulos`
  ADD PRIMARY KEY (`articulo_id`);

--
-- Indices de la tabla `tb_comentarios`
--
ALTER TABLE `tb_comentarios`
  ADD PRIMARY KEY (`comentaro_id`),
  ADD UNIQUE KEY `fk_estudianteId` (`fk_estudiante_id`),
  ADD UNIQUE KEY `fk_publicacionId` (`fk_publicacion_id`);

--
-- Indices de la tabla `tb_detalle_estudiante`
--
ALTER TABLE `tb_detalle_estudiante`
  ADD PRIMARY KEY (`detalle_estudiante_id`),
  ADD UNIQUE KEY `fk_estudianteID` (`fk_estudiante_id`);

--
-- Indices de la tabla `tb_estudiante`
--
ALTER TABLE `tb_estudiante`
  ADD PRIMARY KEY (`estudiante_id`),
  ADD UNIQUE KEY `fk_usuarioId` (`fk_usuario_id`);

--
-- Indices de la tabla `tb_likes`
--
ALTER TABLE `tb_likes`
  ADD PRIMARY KEY (`like_id`),
  ADD UNIQUE KEY `fk_estudianteId` (`estudiante_id`),
  ADD UNIQUE KEY `fk_publicacionId` (`publicacion_id`);

--
-- Indices de la tabla `tb_publicaciones`
--
ALTER TABLE `tb_publicaciones`
  ADD PRIMARY KEY (`publicacion_id`),
  ADD KEY `fk_articuloId` (`fk_articulo_id`),
  ADD KEY `fk_estudianteId` (`fk_estudiante_id`) USING BTREE;

--
-- Indices de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_comentarios`
--
ALTER TABLE `tb_comentarios`
  MODIFY `comentaro_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_likes`
--
ALTER TABLE `tb_likes`
  MODIFY `like_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `usuario_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tb_comentarios`
--
ALTER TABLE `tb_comentarios`
  ADD CONSTRAINT `tb_comentarios_ibfk_1` FOREIGN KEY (`fk_publicacion_id`) REFERENCES `tb_publicaciones` (`publicacion_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_comentarios_ibfk_2` FOREIGN KEY (`fk_estudiante_id`) REFERENCES `tb_estudiante` (`estudiante_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tb_detalle_estudiante`
--
ALTER TABLE `tb_detalle_estudiante`
  ADD CONSTRAINT `tb_detalle_estudiante_ibfk_1` FOREIGN KEY (`fk_estudiante_id`) REFERENCES `tb_estudiante` (`estudiante_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tb_estudiante`
--
ALTER TABLE `tb_estudiante`
  ADD CONSTRAINT `tb_estudiante_ibfk_1` FOREIGN KEY (`fk_usuario_id`) REFERENCES `tb_usuarios` (`usuario_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_likes`
--
ALTER TABLE `tb_likes`
  ADD CONSTRAINT `tb_likes_ibfk_1` FOREIGN KEY (`publicacion_id`) REFERENCES `tb_publicaciones` (`publicacion_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_likes_ibfk_2` FOREIGN KEY (`estudiante_id`) REFERENCES `tb_estudiante` (`estudiante_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tb_publicaciones`
--
ALTER TABLE `tb_publicaciones`
  ADD CONSTRAINT `tb_publicaciones_ibfk_1` FOREIGN KEY (`fk_articulo_id`) REFERENCES `tb_articulos` (`articulo_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
