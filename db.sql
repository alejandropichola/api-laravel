-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 22-12-2018 a las 20:35:58
-- Versión del servidor: 5.7.21
-- Versión de PHP: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dicarsa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carousels`
--

DROP TABLE IF EXISTS `carousels`;
CREATE TABLE IF NOT EXISTS `carousels` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `site_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extension` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `carousels_site_id_foreign` (`site_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncar tablas antes de insertar `carousels`
--

TRUNCATE TABLE `carousels`;
--
-- Volcado de datos para la tabla `carousels`
--

INSERT INTO `carousels` (`id`, `site_id`, `image`, `path`, `extension`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, NULL, '2018-09-19 06:00:00', '2018-09-19 06:00:00'),
(2, 2, NULL, NULL, NULL, '2018-09-19 06:00:00', '2018-09-19 06:00:00'),
(3, 2, 'carousel_1544071724.jpg', 'C:\\wamp\\www\\api\\storage', 'jpeg', '2018-12-06 10:48:44', '2018-12-06 10:48:44'),
(4, 2, 'carousel_1544072225.jpg', 'C:\\wamp\\www\\api\\storage', 'jpeg', '2018-12-06 10:57:05', '2018-12-06 10:57:05'),
(5, 2, 'carousel_1544072510.jpg', 'C:\\wamp\\www\\api\\storage', 'jpeg', '2018-12-06 11:01:50', '2018-12-06 11:01:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alpha2` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alpha3` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `countries_alpha2_unique` (`alpha2`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncar tablas antes de insertar `countries`
--

TRUNCATE TABLE `countries`;
--
-- Volcado de datos para la tabla `countries`
--

INSERT INTO `countries` (`id`, `name`, `alpha2`, `alpha3`, `created_at`, `updated_at`) VALUES
(1, 'Guatemala', 'GT', 'GTM', '2018-09-16 13:02:12', '2018-09-16 13:02:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `site_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `events_site_id_foreign` (`site_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncar tablas antes de insertar `events`
--

TRUNCATE TABLE `events`;
--
-- Volcado de datos para la tabla `events`
--

INSERT INTO `events` (`id`, `site_id`, `image`, `description`, `title`, `created_at`, `updated_at`) VALUES
(3, 2, '', NULL, 'prueba', '2018-09-19 06:00:00', '2018-09-19 06:00:00'),
(5, 1, 'event_1538916731.jpg', 'descripcion del producto categoria', NULL, '2018-10-07 18:52:11', '2018-10-07 18:52:11'),
(6, 1, 'event_1543897152.jpg', 'descripcion del producto categoria', NULL, '2018-12-04 10:19:12', '2018-12-04 10:19:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncar tablas antes de insertar `migrations`
--

TRUNCATE TABLE `migrations`;
--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_08_26_230400_create_table_countries', 1),
(2, '2018_08_26_231300_create_table_subdivision', 1),
(3, '2018_09_10_051040_create_sites_table', 1),
(4, '2018_09_10_051041_create_carousels_table', 1),
(5, '2018_09_10_053753_create_product_categories_table', 1),
(6, '2018_09_10_054504_create_products_table', 1),
(7, '2018_09_15_191205_create_event_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `site_id` int(10) UNSIGNED NOT NULL,
  `product_category_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extension` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_site_id_foreign` (`site_id`),
  KEY `products_product_category_id_foreign` (`product_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncar tablas antes de insertar `products`
--

TRUNCATE TABLE `products`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_categories`
--

DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE IF NOT EXISTS `product_categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `site_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extension` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_categories_site_id_foreign` (`site_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncar tablas antes de insertar `product_categories`
--

TRUNCATE TABLE `product_categories`;
--
-- Volcado de datos para la tabla `product_categories`
--

INSERT INTO `product_categories` (`id`, `site_id`, `name`, `description`, `image`, `extension`, `created_at`, `updated_at`) VALUES
(1, 1, 'prueba 1', 'descripcion del producto categoria', 'product_category_1543896836.jpg', 'jpeg', '2018-12-04 10:13:56', '2018-12-04 10:13:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prueba_datos`
--

DROP TABLE IF EXISTS `prueba_datos`;
CREATE TABLE IF NOT EXISTS `prueba_datos` (
  `id_prueba` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `number_data` int(15) DEFAULT NULL,
  `date_data` date DEFAULT NULL,
  `double_data` double DEFAULT NULL,
  PRIMARY KEY (`id_prueba`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncar tablas antes de insertar `prueba_datos`
--

TRUNCATE TABLE `prueba_datos`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sites`
--

DROP TABLE IF EXISTS `sites`;
CREATE TABLE IF NOT EXISTS `sites` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncar tablas antes de insertar `sites`
--

TRUNCATE TABLE `sites`;
--
-- Volcado de datos para la tabla `sites`
--

INSERT INTO `sites` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'dicarsa', '2018-09-16 06:00:00', '2018-09-16 06:00:00'),
(2, 'distribuidora', '2018-09-19 06:00:00', '2018-09-19 06:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subdivisions`
--

DROP TABLE IF EXISTS `subdivisions`;
CREATE TABLE IF NOT EXISTS `subdivisions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `country_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subdivisions_country_id_foreign` (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncar tablas antes de insertar `subdivisions`
--

TRUNCATE TABLE `subdivisions`;
--
-- Volcado de datos para la tabla `subdivisions`
--

INSERT INTO `subdivisions` (`id`, `country_id`, `name`, `created_at`, `updated_at`) VALUES
(23, 1, 'Alta Verapaz', '2018-09-16 13:02:14', '2018-09-16 13:02:14'),
(24, 1, 'Baja Verapaz', '2018-09-16 13:02:14', '2018-09-16 13:02:14'),
(25, 1, 'Chimaltenango', '2018-09-16 13:02:14', '2018-09-16 13:02:14'),
(26, 1, 'Chiquimula', '2018-09-16 13:02:14', '2018-09-16 13:02:14'),
(27, 1, 'El Progreso', '2018-09-16 13:02:14', '2018-09-16 13:02:14'),
(28, 1, 'Escuintla', '2018-09-16 13:02:14', '2018-09-16 13:02:14'),
(29, 1, 'Guatemala', '2018-09-16 13:02:14', '2018-09-16 13:02:14'),
(30, 1, 'Huehuetenango', '2018-09-16 13:02:14', '2018-09-16 13:02:14'),
(31, 1, 'Izabal', '2018-09-16 13:02:14', '2018-09-16 13:02:14'),
(32, 1, 'Jalapa', '2018-09-16 13:02:14', '2018-09-16 13:02:14'),
(33, 1, 'Jutiapa', '2018-09-16 13:02:14', '2018-09-16 13:02:14'),
(34, 1, 'Petén', '2018-09-16 13:02:14', '2018-09-16 13:02:14'),
(35, 1, 'Quetzaltenango', '2018-09-16 13:02:14', '2018-09-16 13:02:14'),
(36, 1, 'Quiché', '2018-09-16 13:02:14', '2018-09-16 13:02:14'),
(37, 1, 'Retalhuleu', '2018-09-16 13:02:14', '2018-09-16 13:02:14'),
(38, 1, 'Sacatepéquez', '2018-09-16 13:02:14', '2018-09-16 13:02:14'),
(39, 1, 'San Marcos', '2018-09-16 13:02:14', '2018-09-16 13:02:14'),
(40, 1, 'Santa Rosa', '2018-09-16 13:02:14', '2018-09-16 13:02:14'),
(41, 1, 'Sololá', '2018-09-16 13:02:14', '2018-09-16 13:02:14'),
(42, 1, 'Suchitepéquez', '2018-09-16 13:02:14', '2018-09-16 13:02:14'),
(43, 1, 'Totonicapán', '2018-09-16 13:02:14', '2018-09-16 13:02:14'),
(44, 1, 'Zacapa', '2018-09-16 13:02:14', '2018-09-16 13:02:14');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carousels`
--
ALTER TABLE `carousels`
  ADD CONSTRAINT `carousels_site_id_foreign` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_site_id_foreign` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_product_category_id_foreign` FOREIGN KEY (`product_category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_site_id_foreign` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `product_categories`
--
ALTER TABLE `product_categories`
  ADD CONSTRAINT `product_categories_site_id_foreign` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `subdivisions`
--
ALTER TABLE `subdivisions`
  ADD CONSTRAINT `subdivisions_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
