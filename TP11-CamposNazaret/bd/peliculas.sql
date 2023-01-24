-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2021 a las 10:45:01
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `peliculas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE `pelicula` (
  `id` int(11) NOT NULL,
  `titulo` varchar(60) NOT NULL,
  `duracion` int(11) NOT NULL,
  `genero` varchar(40) NOT NULL,
  `fecha_estreno` date NOT NULL,
  `foto_portada` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`id`, `titulo`, `duracion`, `genero`, `fecha_estreno`, `foto_portada`) VALUES
(1, 'The Eternals', 156, 'Ciencia Ficción', '2021-11-04', 'eternals.png'),
(2, 'Venom 2', 125, 'Ciencia Ficción', '2021-10-30', 'venom2.jpg'),
(3, 'El Juego del Miedo 20', 110, 'Terror', '2030-10-30', NULL),
(4, 'El gato con Botassss', 123, 'terror', '2021-11-03', 'El gato con Botassss.JPG');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `usuario` varchar(60) NOT NULL,
  `password` varchar(40) NOT NULL,
  `mail` varchar(80) NOT NULL,
  `fecha_alta` date NOT NULL,
  `tipo` varchar(15) NOT NULL,
  `foto` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `password`, `mail`, `fecha_alta`, `tipo`, `foto`) VALUES
(1, 'admin', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'admin@admin.com', '2021-10-01', 'Editor', 'admin.jpg'),
(2, 'mcorrales', '6e3b110b24e941d75adce89439f51ca74061767f', 'mcorrales@herrera.unt.edu.ar', '2021-10-10', 'Restringido', NULL),
(3, 'dsingh', 'abab1d2a5f608941022d1b43da6c92d574d55060', 'dsingh@herrera.unt.edu.ar', '2021-10-10', 'Restringido', NULL),
(4, 'jpepe', '39d19e8bec728e2cd4d2a4199e9434ad7df5e459', 'jpepe@herrera.unt.edu.ar', '2021-10-05', 'Administrador', 'jpepe.jpeg'),
(5, 'mruiz', '397747e2ea1fd4995810616087d0e6c4ab7014d4', 'mruiz@herrera.unt.edu.ar', '2021-10-05', 'Administrador', 'mruiz.jpeg'),
(8, 'ncampos', '8cb2237d0679ca88db6464eac60da96345513964', 'nazaretcampos247.@mail.com', '2021-11-15', 'Administrador', 'ncampos.jpg'),
(9, 'vcampos', '8cb2237d0679ca88db6464eac60da96345513964', 'vickye21campos@gmail.coim', '2021-11-15', 'Administrador', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
