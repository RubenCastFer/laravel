-- phpMyAdmin SQL Dump
-- version 4.9.7deb1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 03-03-2022 a las 21:14:45
-- Versión del servidor: 8.0.27-0ubuntu0.21.04.1
-- Versión de PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `laravel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editorial`
--

CREATE TABLE `editorial` (
  `id` int NOT NULL,
  `nombre` text NOT NULL,
  `nacionalidad` text NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `editorial`
--

INSERT INTO `editorial` (`id`, `nombre`, `nacionalidad`, `updated_at`, `created_at`) VALUES
(0, 'Bloomsbury Publishing', 'Inglaterra', '2022-02-22', '2022-02-22'),
(1, 'ruben', 'Español', '2022-02-26', '2022-02-26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `isbn` varchar(13) NOT NULL,
  `titulo` text NOT NULL,
  `autor` text NOT NULL,
  `idioma` text NOT NULL,
  `publicacion` date NOT NULL,
  `editorial` int NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`isbn`, `titulo`, `autor`, `idioma`, `publicacion`, `editorial`, `updated_at`, `created_at`) VALUES
('1234123456790', 'Harry Potter y la cámara secreta', 'J. K. Rowling', 'Ingles', '1998-07-02', 0, '2022-02-22', '2022-02-22'),
('1234567891234', 'Harry Potter y la piedra filosofal', 'J. K. Rowling', 'Ingles', '1997-07-26', 0, '2022-02-22', '2022-02-22'),
('2345123456795', 'Harry Potter y las reliquias de la Muerte', 'J. K. Rowling', 'Ingles', '2007-07-21', 0, '2022-02-22', '2022-02-22'),
('3412123456791', 'Harry Potter y el prisionero de Azkaban', 'J. K. Rowling', 'Ingles', '1999-07-08', 0, '2022-02-22', '2022-02-22'),
('3456123456794', 'Harry Potter y el misterio del príncipe', 'J. K. Rowling', 'Ingles', '2005-07-16', 0, '2022-02-22', '2022-02-22'),
('5679123456792', 'Harry Potter y el cáliz de fuego', 'J. K. Rowling', 'Ingles', '2000-07-08', 0, '2022-02-22', '2022-02-22'),
('6793123456793', 'Harry Potter y la Orden del Fénix', 'J. K. Rowling', 'Ingles', '2003-07-21', 0, '2022-02-22', '2022-02-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peticiones`
--

CREATE TABLE `peticiones` (
  `id` int NOT NULL,
  `nombre` text NOT NULL,
  `mail` text NOT NULL,
  `titulo` text NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `peticiones`
--

INSERT INTO `peticiones` (`id`, `nombre`, `mail`, `titulo`, `updated_at`, `created_at`) VALUES
(1, 'ruben', 'rubenruel@hotmail.com', 'El principe', '2022-03-03', '2022-03-03'),
(2, 'ruben', 'rubenruel@hotmail.com', 'afdafsdfadfa', '2022-03-03', '2022-03-03'),
(3, 'ruben', 'rubenruel@hotmail.com', 'afdafsdfadfa', '2022-03-03', '2022-03-03'),
(4, 'ruben', 'rubenruel@hotmail.com', 'afaef', '2022-03-03', '2022-03-03'),
(5, 'Ruben Castellano Fernandez', 'rubenruel@hotmail.com', 'El principe', '2022-03-03', '2022-03-03'),
(6, 'Ruben Castellano Fernandez', 'rubenruel@hotmail.com', 'El principe', '2022-03-03', '2022-03-03'),
(7, 'Ruben Castellano Fernandez', 'rubenruel@hotmail.com', 'El principe', '2022-03-03', '2022-03-03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

CREATE TABLE `prestamo` (
  `id` int NOT NULL,
  `isbn` varchar(13) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `editorial`
--
ALTER TABLE `editorial`
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`) USING BTREE;

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`isbn`),
  ADD KEY `editorial` (`editorial`);

--
-- Indices de la tabla `peticiones`
--
ALTER TABLE `peticiones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD KEY `isbn` (`isbn`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `peticiones`
--
ALTER TABLE `peticiones`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `id` FOREIGN KEY (`editorial`) REFERENCES `editorial` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD CONSTRAINT `isbn` FOREIGN KEY (`isbn`) REFERENCES `libros` (`isbn`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
