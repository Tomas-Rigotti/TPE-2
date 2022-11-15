-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-10-2022 a las 21:23:53
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tpe`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE `autores` (
  `id_autores` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `lugar_nac` varchar(45) NOT NULL,
  `fecha_nac` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `autores`
--

INSERT INTO `autores` (`id_autores`, `nombre`, `lugar_nac`, `fecha_nac`) VALUES
(1, 'Albert Camus', 'Drean, Algeria', '7/11/1913'),
(2, 'J.K. Rowling', 'Yate, Reino Unido', '31/7/1965'),
(3, 'Stephen King', 'Portland, Maine, Estados Unidos', '21/9/1947'),
(29, 'Autor agregado', 'Tandil', '27/3/2002');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id_libros` int(11) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `fecha_pub` varchar(45) NOT NULL,
  `genero` varchar(45) NOT NULL,
  `cantidad_pag` int(11) NOT NULL,
  `id_autores_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id_libros`, `titulo`, `fecha_pub`, `genero`, `cantidad_pag`, `id_autores_fk`) VALUES
(1, 'El resplandor', '28/1/1977', 'Terror', 599, 3),
(2, 'It', '15/9/1986', 'Terror', 1504, 3),
(3, 'Cementerio de animales', '14/11/1983', 'Terror', 483, 3),
(4, 'El extranjero', '10/1/1942', 'Novela filosófica', 152, 1),
(5, 'La peste', '10/6/1947', 'Novela filosófica', 360, 1),
(6, 'El mito de Sisifo', '19/10/1942', 'Ensayo, literatura filosófica', 160, 1),
(7, 'El oficio del mal', '24/4/2015', 'Novela detectivesca', 576, 2),
(8, 'Harry Potter y la piedra filosofal', '26/6/1997', 'Novela fantástica', 256, 2),
(9, 'El ickabog', '26/5/2020', 'Cuento de hadas', 304, 2),
(42, 'Libro agregado', '9/10/2022', 'Terror', 123, 29);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuarios` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `clave` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuarios`, `email`, `clave`) VALUES
(1, 'admin@gmail.com', '$2a$12$byYpuymMCbJqFMP1gI8tzOxYrVuHr1M6pl3GvoZHUo3WRTcHhn3eq');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`id_autores`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id_libros`),
  ADD KEY `id_autores` (`id_autores_fk`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuarios`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autores`
--
ALTER TABLE `autores`
  MODIFY `id_autores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id_libros` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`id_autores_fk`) REFERENCES `autores` (`id_autores`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
