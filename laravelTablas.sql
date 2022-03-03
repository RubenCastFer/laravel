-- phpMyAdmin SQL Dump
-- version 5.0.4deb2ubuntu5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 03-03-2022 a las 12:26:28
-- Versión del servidor: 8.0.28-0ubuntu0.21.10.3
-- Versión de PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(1, 'ruben', 'Español', '2022-03-03', '2022-03-03');

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
('2345123456789', 'Harry Potter y la piedra filosofal', 'J. K. Rowling', 'Ingles', '1997-07-26', 0, '2022-02-22', '2022-02-22'),
('2345123456790', 'Harry Potter y la cámara secreta', 'J. K. Rowling', 'español de españa', '1998-07-02', 0, '2022-03-03', '2022-02-22'),
('2345123456791', 'Harry Potter y el prisionero de Azkaban', 'J. K. Rowling', 'Ingles', '1999-07-08', 0, '2022-02-22', '2022-02-22'),
('2345123456792', 'Harry Potter y el cáliz de fuego', 'J. K. Rowling', 'Ingles', '2000-07-08', 0, '2022-02-22', '2022-02-22'),
('2345123456793', 'Harry Potter y la Orden del Fénix', 'J. K. Rowling', 'Ingles', '2003-07-21', 0, '2022-02-22', '2022-02-22'),
('2345123456794', 'Harry Potter y el misterio del príncipe', 'J. K. Rowling', 'Ingles', '2005-07-16', 0, '2022-02-22', '2022-02-22'),
('2345123456795', 'Harry Potter y las reliquias de la Muerte', 'J. K. Rowling', 'Ingles', '2007-07-21', 0, '2022-02-22', '2022-02-22');

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peticiones`
--

CREATE TABLE `peticiones` (
  `id` int NOT NULL,
  `nombre` text NOT NULL,
  `mail` text NOT NULL,
  `titulo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ruben', 'ruben.castellano.fernandez.al@iespoligonosur.org', NULL, '$2y$10$G0.7mx/u6NjZjWRNHBMaC.N.JG0SUk5AN3UkdYBlULUEUKKL6c0mu', NULL, '2022-02-14 08:38:17', '2022-02-14 08:38:17'),
(2, 'Eddy', 'eddy.al@iespoligonosur.org', NULL, '$2y$10$CeJZEMsq3PJUXIfW/jk3ReiG6oUzbJEVsCa8108xfoHDTAbjl.UZK', NULL, '2022-02-14 08:38:56', '2022-02-14 08:38:56'),
(3, 'Antonio', 'antonio.al@iespoligonosur.org', NULL, '$2y$10$S2xsiEoLXkqT4ofvcq.F7edabVtVpKQ/Of.EjBTQ3dixIwwrqnWW.', NULL, '2022-02-14 08:49:13', '2022-02-14 08:49:13'),
(4, 'Javi', 'javi.al@iespoligonosur.org', NULL, '$2y$10$CbXAnao4XsXx1t3Wm4qrBOv9T.SFzj3nuOukfAMKQlvAnefQQlsQa', NULL, '2022-02-14 08:51:46', '2022-02-14 08:51:46'),
(5, 'David', 'david.al@iespoligonosur.org', NULL, '$2y$10$3GemPoTYQr6XOVRauiob0uv2IsDo9Nu.EPKai5VYytrOHcFNbbILm', NULL, '2022-02-14 08:52:27', '2022-02-14 08:52:27');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `editorial`
--
ALTER TABLE `editorial`
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
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `peticiones`
--
ALTER TABLE `peticiones`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
