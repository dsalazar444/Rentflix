-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 24-03-2026 a las 23:01:12
-- Versión del servidor: 12.2.2-MariaDB
-- Versión de PHP: 8.5.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `Rentflix_e1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bills`
--

CREATE TABLE `bills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `bills`
--

INSERT INTO `bills` (`id`, `user_id`, `price`, `address`, `created_at`, `updated_at`) VALUES
(1, 1, 90000, 'Cra 7 #123-45, Bogotá', '2026-03-24 22:09:03', '2026-03-24 22:09:03'),
(2, 2, 95000, 'Calle 50 #10-20, Medellín', '2026-03-24 22:09:03', '2026-03-24 22:09:03'),
(3, 3, 78000, 'Av. 68 #5-65, Bogotá', '2026-03-24 22:09:03', '2026-03-24 22:09:03'),
(4, 4, 110000, 'Carrera 11 #80-15, Cali', '2026-03-24 22:09:03', '2026-03-24 22:09:03'),
(5, 5, 85000, 'Calle 72 #11-20, Bogotá', '2026-03-24 22:09:03', '2026-03-24 22:09:03'),
(11, 3, 1000, 'Calle 104 a # 80 - 23', '2026-03-25 03:37:53', '2026-03-25 03:37:53'),
(12, 8, 1550, 'calle 101 # 40-57', '2026-03-25 03:55:21', '2026-03-25 03:55:21'),
(13, 4, 95, 'carrera 102 # 40-54', '2026-03-25 03:56:32', '2026-03-25 03:56:32'),
(14, 10, 170, 'calle 101 # 40-57', '2026-03-25 03:57:10', '2026-03-25 03:57:10'),
(15, 3, 74, 'carrera 78 # 23', '2026-03-25 03:58:29', '2026-03-25 03:58:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bill_items`
--

CREATE TABLE `bill_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bill_id` bigint(20) UNSIGNED NOT NULL,
  `movie_id` bigint(20) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `bill_items`
--

INSERT INTO `bill_items` (`id`, `bill_id`, `movie_id`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 50000, 1, '2026-03-24 22:09:23', '2026-03-24 22:09:23'),
(2, 1, 2, 40000, 1, '2026-03-24 22:09:23', '2026-03-24 22:09:23'),
(3, 2, 3, 55000, 1, '2026-03-24 22:09:23', '2026-03-24 22:09:23'),
(4, 2, 4, 40000, 1, '2026-03-24 22:09:23', '2026-03-24 22:09:23'),
(5, 3, 5, 45000, 1, '2026-03-24 22:09:23', '2026-03-24 22:09:23'),
(6, 3, 6, 33000, 1, '2026-03-24 22:09:23', '2026-03-24 22:09:23'),
(7, 4, 7, 42000, 1, '2026-03-24 22:09:23', '2026-03-24 22:09:23'),
(8, 4, 8, 68000, 1, '2026-03-24 22:09:23', '2026-03-24 22:09:23'),
(9, 5, 9, 40000, 1, '2026-03-24 22:09:23', '2026-03-24 22:09:23'),
(10, 5, 10, 45000, 1, '2026-03-24 22:09:23', '2026-03-24 22:09:23'),
(11, 11, 9, 40000, 1, '2026-03-25 03:37:53', '2026-03-25 03:37:53'),
(12, 11, 9, 40000, 1, '2026-03-25 03:37:53', '2026-03-25 03:37:53'),
(13, 12, 10, 45000, 1, '2026-03-25 03:55:21', '2026-03-25 03:55:21'),
(14, 12, 7, 42000, 1, '2026-03-25 03:55:21', '2026-03-25 03:55:21'),
(15, 13, 3, 55000, 1, '2026-03-25 03:56:32', '2026-03-25 03:56:32'),
(16, 14, 7, 42000, 1, '2026-03-25 03:57:10', '2026-03-25 03:57:10'),
(17, 15, 8, 48000, 1, '2026-03-25 03:58:29', '2026-03-25 03:58:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `library_items`
--

CREATE TABLE `library_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `movie_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `library_items`
--

INSERT INTO `library_items` (`id`, `user_id`, `movie_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2026-03-24 22:08:07', '2026-03-24 22:08:07'),
(2, 1, 2, '2026-03-24 22:08:07', '2026-03-24 22:08:07'),
(3, 2, 3, '2026-03-24 22:08:07', '2026-03-24 22:08:07'),
(4, 2, 4, '2026-03-24 22:08:07', '2026-03-24 22:08:07'),
(5, 3, 5, '2026-03-24 22:08:07', '2026-03-24 22:08:07'),
(6, 3, 6, '2026-03-24 22:08:07', '2026-03-24 22:08:07'),
(7, 4, 7, '2026-03-24 22:08:07', '2026-03-24 22:08:07'),
(8, 5, 8, '2026-03-24 22:08:07', '2026-03-24 22:08:07'),
(9, 6, 9, '2026-03-24 22:08:07', '2026-03-24 22:08:07'),
(10, 7, 10, '2026-03-24 22:08:07', '2026-03-24 22:08:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_03_21_142845_create_movies_table', 1),
(5, '2026_03_21_173858_create_library_items_table', 1),
(6, '2026_03_21_230235_create_wishlist_items_table', 1),
(7, '2026_03_22_170738_create_bills_table', 1),
(8, '2026_03_22_174154_create_bill_items_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movies`
--

CREATE TABLE `movies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `director` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `format` varchar(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `quantity_views` int(11) NOT NULL DEFAULT 0,
  `classification` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `trailer_link` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `movies`
--

INSERT INTO `movies` (`id`, `title`, `director`, `genre`, `format`, `location`, `price`, `quantity`, `quantity_views`, `classification`, `year`, `description`, `trailer_link`, `file_name`, `created_at`, `updated_at`) VALUES
(1, 'Inception', 'Christopher Nolan', 'Science Fiction', 'BluRay', 'Shelf A', 50000, 5, 0, 'PG-13', 2010, 'A mind-bending thriller about dreams within dreams', 'https://www.youtube.com/?app=desktop&hl=es', 'image_1774389615.jpg', '2026-03-25 03:00:15', '2026-03-25 03:00:15'),
(2, 'The Dark Knight', 'Christopher Nolan', 'Action', 'BluRay', 'Shelf B', 40000, 3, 0, 'PG-13', 2008, 'Batman faces the Joker in Gotham City', 'https://www.youtube.com/?app=desktop&hl=es', 'image_1774389636.jpg', '2026-03-25 03:00:36', '2026-03-25 03:00:36'),
(3, 'Interstellar', 'Christopher Nolan', 'Science Fiction', 'BluRay', 'Shelf C', 55000, 4, 0, 'PG-13', 2014, 'A journey through a wormhole to save humanity', 'https://www.youtube.com/?app=desktop&hl=es', 'image_1774389665.jpg', '2026-03-25 03:01:05', '2026-03-25 03:01:05'),
(4, 'The Matrix', 'Lana Wachowski', 'Science Fiction', 'DVD', 'Shelf D', 35000, 6, 0, 'R', 1999, 'Explore the reality of the digital world', 'https://www.youtube.com/?app=desktop&hl=es', 'image_1774389684.jpg', '2026-03-25 03:01:24', '2026-03-25 03:01:24'),
(5, 'Pulp Fiction', 'Quentin Tarantino', 'Crime', 'BluRay', 'Shelf E', 45000, 2, 0, 'R', 1994, 'Intertwined stories of Los Angeles criminals', 'https://www.youtube.com/?app=desktop&hl=es', 'image_1774389710.jpg', '2026-03-25 03:01:50', '2026-03-25 03:01:50'),
(6, 'Forrest Gump', 'Robert Zemeckis', 'Drama', 'BluRay', 'Shelf F', 38000, 5, 0, 'PG-13', 1994, 'The life of a man with a low IQ but good heart', 'https://www.youtube.com/?app=desktop&hl=es', 'image_1774389741.jpg', '2026-03-25 03:02:21', '2026-03-25 03:02:21'),
(7, 'The Shawshank Redemption', 'Frank Darabont', 'Drama', 'BluRay', 'Shelf G', 42000, 4, 0, 'R', 1994, 'Two imprisoned men bond in a way that has no name', 'https://www.youtube.com/?app=desktop&hl=es', 'image_1774389761.jpg', '2026-03-25 03:02:41', '2026-03-25 03:02:41'),
(8, 'The Avengers', 'Joss Whedon', 'Action', 'BluRay', 'Shelf H', 48000, 7, 0, 'PG-13', 2012, 'Earth\'s mightiest heroes must come together', 'https://www.youtube.com/?app=desktop&hl=es', 'image_1774389787.jpg', '2026-03-25 03:03:07', '2026-03-25 03:03:07'),
(9, 'Gladiator', 'Ridley Scott', 'Action', 'DVD', 'Shelf I', 40000, 3, 0, 'R', 2000, 'A former Roman General seeks revenge', 'https://www.youtube.com/?app=desktop&hl=es', 'image_1774389882.jpg', '2026-03-25 03:04:42', '2026-03-25 03:04:42'),
(10, 'Titanic', 'James Cameron', 'Romance', 'BluRay', 'Shelf J', 45000, 6, 0, 'PG-13', 1997, 'A love story aboard the ill-fated RMS Titanic', 'https://www.youtube.com/?app=desktop&hl=es', 'image_1774389904.jpg', '2026-03-25 03:05:04', '2026-03-25 03:05:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('AgXcUubzmVRZB4ON94fNAQZUk7lj9pn83FFkIRpH', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64; rv:148.0) Gecko/20100101 Firefox/148.0', 'YTo2OntzOjk6Il9wcmV2aW91cyI7YToyOntzOjM6InVybCI7czozMjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluL2JpbGwiO3M6NToicm91dGUiO3M6MTY6ImFkbWluLmJpbGwuaW5kZXgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjY6Il90b2tlbiI7czo0MDoiWUEzcEU4eENnWVpzUGZ4QWIzck5weEFrbDE4clhlMFo4MENpVzZ2MiI7czo3OiJ1c2VyX2lkIjtpOjEyO3M6NDoicm9sZSI7czo1OiJhZG1pbiI7czo4OiJsYXN0Rm9ybSI7czo5OiJtb3ZpZUZvcm0iO30=', 1774393109);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Daniela', 'd@gmail.com', NULL, 'client', '$2y$12$IAsCBDZyH/nmziQBmzz2D.9sG4j9jO8H5EUcAAlzD1smX8m8Ky13C', NULL, '2026-03-25 02:40:51', '2026-03-25 02:40:51'),
(2, 'Carlos López', 'carlos@example.com', '2026-03-24 21:42:58', 'user', '\r\n $2y$12$IAsCBDZyH/nmziQBmzz2D.9sG4j9jO8H5EUcAAlzD1smX8m8Ky13C', NULL, '2026-03-24 21:42:58', '2026-03-24 21:42:58'),
(3, 'María García', 'maria@example.com', '2026-03-24 21:42:58', 'user', '$2y$12$N9qo8uLOickgx2ZMRZoMyeIjZAgcg7b3XeKeUxWdeS86E36gZvWFm', NULL, '2026-03-24 21:42:58', '2026-03-24 21:42:58'),
(4, 'Juan Pérez', 'juan@example.com', '2026-03-24 21:42:58', 'user', '$2y$12$N9qo8uLOickgx2ZMRZoMyeIjZAgcg7b3XeKeUxWdeS86E36gZvWFm', NULL, '2026-03-24 21:42:58', '2026-03-24 21:42:58'),
(5, 'Ana Martínez', 'ana@example.com', '2026-03-24 21:42:58', 'admin', '$2y$12$N9qo8uLOickgx2ZMRZoMyeIjZAgcg7b3XeKeUxWdeS86E36gZvWFm', NULL, '2026-03-24 21:42:58', '2026-03-24 21:42:58'),
(6, 'Roberto Silva', 'roberto@example.com', '2026-03-24 21:42:58', 'user', '$2y$12$N9qo8uLOickgx2ZMRZoMyeIjZAgcg7b3XeKeUxWdeS86E36gZvWFm', NULL, '2026-03-24 21:42:58', '2026-03-24 21:42:58'),
(7, 'Sofía Rodríguez', 'sofia@example.com', '2026-03-24 21:42:58', 'user', '$2y$12$N9qo8uLOickgx2ZMRZoMyeIjZAgcg7b3XeKeUxWdeS86E36gZvWFm', NULL, '2026-03-24 21:42:58', '2026-03-24 21:42:58'),
(8, 'Miguel Ángel', 'miguel@example.com', '2026-03-24 21:42:58', 'user', '$2y$12$N9qo8uLOickgx2ZMRZoMyeIjZAgcg7b3XeKeUxWdeS86E36gZvWFm', NULL, '2026-03-24 21:42:58', '2026-03-24 21:42:58'),
(9, 'Laura Fernández', 'laura@example.com', '2026-03-24 21:42:58', 'user', '$2y$12$N9qo8uLOickgx2ZMRZoMyeIjZAgcg7b3XeKeUxWdeS86E36gZvWFm', NULL, '2026-03-24 21:42:58', '2026-03-24 21:42:58'),
(10, 'Diego Romero', 'diego@example.com', '2026-03-24 21:42:58', 'user', '$2y$12$N9qo8uLOickgx2ZMRZoMyeIjZAgcg7b3XeKeUxWdeS86E36gZvWFm', NULL, '2026-03-24 21:42:58', '2026-03-24 21:42:58'),
(11, 'Valentina Torres', 'valentina@example.com', '2026-03-24 21:42:58', 'user', '$2y$12$N9qo8uLOickgx2ZMRZoMyeIjZAgcg7b3XeKeUxWdeS86E36gZvWFm', NULL, '2026-03-24 21:42:58', '2026-03-24 21:42:58'),
(12, 'Jose', 'jose@gmail.com', NULL, 'admin', '$2y$12$F5OdOUWfCBk0OxAf8yx9ZeZOsV3HJBaw15aWBOM2t8HenwTmblGCq', NULL, '2026-03-25 02:49:44', '2026-03-25 02:49:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wishlist_items`
--

CREATE TABLE `wishlist_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `movie_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `wishlist_items`
--

INSERT INTO `wishlist_items` (`id`, `user_id`, `movie_id`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '2026-03-24 22:08:37', '2026-03-24 22:08:37'),
(2, 1, 4, '2026-03-24 22:08:37', '2026-03-24 22:08:37'),
(3, 2, 5, '2026-03-24 22:08:37', '2026-03-24 22:08:37'),
(4, 2, 6, '2026-03-24 22:08:37', '2026-03-24 22:08:37'),
(5, 3, 7, '2026-03-24 22:08:37', '2026-03-24 22:08:37'),
(6, 4, 8, '2026-03-24 22:08:37', '2026-03-24 22:08:37'),
(7, 5, 9, '2026-03-24 22:08:37', '2026-03-24 22:08:37'),
(8, 6, 10, '2026-03-24 22:08:37', '2026-03-24 22:08:37'),
(9, 7, 1, '2026-03-24 22:08:37', '2026-03-24 22:08:37'),
(10, 8, 2, '2026-03-24 22:08:37', '2026-03-24 22:08:37');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `bill_items`
--
ALTER TABLE `bill_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_items_bill_id_foreign` (`bill_id`),
  ADD KEY `bill_items_movie_id_foreign` (`movie_id`);

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `library_items`
--
ALTER TABLE `library_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `library_items_user_id_foreign` (`user_id`),
  ADD KEY `library_items_movie_id_foreign` (`movie_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `wishlist_items`
--
ALTER TABLE `wishlist_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `wishlist_items_user_id_movie_id_unique` (`user_id`,`movie_id`),
  ADD KEY `wishlist_items_movie_id_foreign` (`movie_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bills`
--
ALTER TABLE `bills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `bill_items`
--
ALTER TABLE `bill_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `library_items`
--
ALTER TABLE `library_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `movies`
--
ALTER TABLE `movies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `wishlist_items`
--
ALTER TABLE `wishlist_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `bill_items`
--
ALTER TABLE `bill_items`
  ADD CONSTRAINT `bill_items_bill_id_foreign` FOREIGN KEY (`bill_id`) REFERENCES `bills` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bill_items_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `library_items`
--
ALTER TABLE `library_items`
  ADD CONSTRAINT `library_items_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `library_items_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `wishlist_items`
--
ALTER TABLE `wishlist_items`
  ADD CONSTRAINT `wishlist_items_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlist_items_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
