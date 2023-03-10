-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2020 a las 01:00:53
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `parcial_labo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bomboneria`
--

CREATE TABLE `bomboneria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `relleno` varchar(20) NOT NULL,
  `tipo_chocolate` varchar(20) NOT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `foto` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bomboneria`
--

INSERT INTO `bomboneria` (`id`, `nombre`, `relleno`, `tipo_chocolate`, `fecha_vencimiento`, `foto`) VALUES
(1, 'Avellana Amarga', 'Crema de Moca', 'Agridulce', '2021-04-21', 'Crema de Moca.png'),
(2, 'Corazon Envuelto', 'Cereza entera', 'Oscuro', '2021-03-10', 'Cereza entera.jpg'),
(3, 'Mora Agridulce', 'Mora', 'Agridulce', '2021-05-02', 'Mora.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `covid`
--

CREATE TABLE `covid` (
  `id` int(11) NOT NULL,
  `nombre_paciente` varchar(100) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `fecha_hisopado` date NOT NULL,
  `foto` varchar(104) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `covid`
--

INSERT INTO `covid` (`id`, `nombre_paciente`, `telefono`, `direccion`, `fecha_hisopado`, `foto`) VALUES
(1, 'Jorge Hernán Lucero', '3814568851', 'Larrea 2320', '2020-06-15', 'Jorge Hernán Lucero.jpg'),
(2, 'Rocío del Valle Gills', '3816024870', 'Monteagudo 233', '2020-08-05', 'Rocío del Valle Gills.jpg'),
(3, 'Ernesto Santana', '3815221580', 'Av. Alem 327', '2020-09-28', 'Ernesto Santana.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `duracion` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `mail` varchar(60) DEFAULT NULL,
  `logo` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id`, `nombre`, `duracion`, `fecha_inicio`, `mail`, `logo`) VALUES
(1, 'noSQL con MongoDB', 20, '2020-08-03', 'curso-mongo@eduka.com', 'noSQL con MongoDB.jpg'),
(2, 'MERN Full Stack', 45, '2020-10-05', 'curso-mern@eduka.com', 'MERN Full Stack.jpg'),
(3, 'Curso Maestro de Python 3', 24, '2020-09-10', 'python_master@eduonline.com', 'Curso Maestro de Python 3.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `discos`
--

CREATE TABLE `discos` (
  `id` int(11) NOT NULL,
  `interprete` varchar(60) NOT NULL,
  `titulo` varchar(60) NOT NULL,
  `fecha_edicion` date DEFAULT NULL,
  `foto_portada` varchar(64) DEFAULT NULL,
  `genero` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `discos`
--

INSERT INTO `discos` (`id`, `interprete`, `titulo`, `fecha_edicion`, `foto_portada`, `genero`) VALUES
(1, 'Queen', 'A night at the opera', '1975-11-21', 'A night at the opera.jpg', 'Rock'),
(2, 'Dua Lipa', 'Club Future Nostalgia', '2020-08-28', 'Club Future Nostalgia.jpg', 'Pop'),
(3, 'Maluma', '11:11', '2019-05-17', '1111.jpg', 'Regueton');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `dni` varchar(8) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `sueldo` float DEFAULT NULL,
  `foto` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `nombre`, `apellido`, `dni`, `fecha_nacimiento`, `sueldo`, `foto`) VALUES
(1, 'Karina Elizabeth', 'Moyano', '34125858', '1988-04-17', 35178.2, '34125858.jpg'),
(2, 'Julián Ezequiel', 'Morante', '28586718', '1981-11-25', 43556.3, '28586718.jpg'),
(3, 'Carolina Romina', 'Rodriguez', '36630919', '1990-09-15', 30180.5, '36630919.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `infracciones`
--

CREATE TABLE `infracciones` (
  `id` int(11) NOT NULL,
  `nombre_conductor` varchar(100) NOT NULL,
  `nombre_agente` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `lugar` varchar(100) DEFAULT NULL,
  `tipo_infraccion` varchar(50) DEFAULT NULL,
  `foto` varchar(104) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `infracciones`
--

INSERT INTO `infracciones` (`id`, `nombre_conductor`, `nombre_agente`, `fecha`, `lugar`, `tipo_infraccion`, `foto`) VALUES
(1, 'Alonso Moreno Leal', 'Nicolás Romano', '2020-07-13', 'Crisóstomo 300', 'Mal estacionado', 'Alonso Moreno Leal.jpg'),
(2, 'Juan Carlos Rearte', 'Julieta Medrano', '2020-10-18', 'Bernabé Araoz 100', 'Alcoholemia', 'Juan Carlos Rearte.jpg'),
(3, 'Noelia del Valle Peralta', 'Joaquín Belfiglio', '2020-11-20', '24 de Septiembre 1000', 'Sin carnet', 'Noelia del Valle Peralta.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inmobiliaria`
--

CREATE TABLE `inmobiliaria` (
  `id` int(11) NOT NULL,
  `tipo_propiedad` varchar(60) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `superficie` int(11) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `foto` varchar(104) DEFAULT NULL,
  `fecha_disponible` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `inmobiliaria`
--

INSERT INTO `inmobiliaria` (`id`, `tipo_propiedad`, `direccion`, `superficie`, `telefono`, `foto`, `fecha_disponible`) VALUES
(1, 'Departamento 1D', 'Bolivar 533', 35, '3815685520', 'Bolivar 533.jpg', '2020-11-01'),
(2, 'Casa 3D', 'Av Mate de Luna 2860', 380, '3816743258', 'Av Mate de Luna 2860.jpg', '2020-12-01'),
(3, 'Monoambiente', 'Moreno 313', 28, '3814586300', 'Moreno 313.jpg', '2020-12-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `titulo` varchar(120) NOT NULL,
  `subtitulo` varchar(300) NOT NULL,
  `fecha` date NOT NULL,
  `foto_nota` varchar(15) DEFAULT NULL,
  `nota` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `subtitulo`, `fecha`, `foto_nota`, `nota`) VALUES
(1, 'Apple, Google, coronavirus y privacidad', 'una tormenta perfecta que plantea si es peor el remedio que la enfermedad', '2020-04-13', '2020-04-13.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum'),
(2, 'Los robots de limpieza pueden espiarte', 'Estos dispositivos no tienen micrófonos, pero los sistemas de navegación por láser pueden ser empleados para capturar el efecto de las vibraciones del sonido en los reflejos', '2020-11-24', '2020-11-24.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum'),
(3, 'Desarrollan robot que identifica y sigue personas', 'Aether ha sido pensado para asistir a residentes en hogares para personas mayores y pacientes en centros de salud. Su algoritmo es capaz de superar la baja iluminación y la perdida temporal del contacto visual', '2020-11-19', '2020-11-19.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `stock` int(11) NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  `categoria` varchar(40) DEFAULT NULL,
  `foto` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `stock`, `fecha_vencimiento`, `categoria`, `foto`) VALUES
(1, 'Arroz Marolio 1kg', 32, '2022-03-10', 'Granos', 'Arroz Marolio 1kg.jpg'),
(2, 'Leche Entera Milkaut 1lt', 50, '2021-01-26', 'Lácteos', 'Leche Entera Milkaut 1lt.jpg'),
(3, 'Queso Cremoso La Lacteo', 10, '2020-12-20', 'Lácteos', 'Queso Cremoso La Lacteo.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `series`
--

CREATE TABLE `series` (
  `id` int(11) NOT NULL,
  `titulo` varchar(40) NOT NULL,
  `temporadas` int(11) NOT NULL,
  `fecha_estreno` date DEFAULT NULL,
  `productora` varchar(40) DEFAULT NULL,
  `foto_portada` varchar(44) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `series`
--

INSERT INTO `series` (`id`, `titulo`, `temporadas`, `fecha_estreno`, `productora`, `foto_portada`) VALUES
(1, 'Better Call Saul', 5, '2015-02-08', 'Netflix', 'Better Call Saul.jpg'),
(2, 'The Mandalorian', 1, '2019-11-12', 'Disney', 'The Mandalorian.jpg'),
(3, 'How I Met Your Mother', 9, '2005-09-19', 'CBS', 'How I Met Your Mother.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transito`
--

CREATE TABLE `transito` (
  `id` int(11) NOT NULL,
  `num_carnet` varchar(11) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `fecha_emision` date DEFAULT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `foto` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `transito`
--

INSERT INTO `transito` (`id`, `num_carnet`, `apellido`, `nombre`, `fecha_emision`, `fecha_vencimiento`, `foto`) VALUES
(1, '523658', 'Castro López', 'Lorenzo', '2018-04-12', '2021-04-12', '523658.jpg'),
(2, '635881', 'Carrizo', 'Norma Monserrat', '2019-12-05', '2024-12-05', '635881.jpg'),
(3, '489602', 'Paz', 'Julieta Noemi', '2017-05-23', '2020-05-23', '489602.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bomboneria`
--
ALTER TABLE `bomboneria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `covid`
--
ALTER TABLE `covid`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `discos`
--
ALTER TABLE `discos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `infracciones`
--
ALTER TABLE `infracciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inmobiliaria`
--
ALTER TABLE `inmobiliaria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `transito`
--
ALTER TABLE `transito`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bomboneria`
--
ALTER TABLE `bomboneria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `covid`
--
ALTER TABLE `covid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `discos`
--
ALTER TABLE `discos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `infracciones`
--
ALTER TABLE `infracciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `inmobiliaria`
--
ALTER TABLE `inmobiliaria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `series`
--
ALTER TABLE `series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `transito`
--
ALTER TABLE `transito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
