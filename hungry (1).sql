-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Apr 30, 2020 at 03:20 PM
-- Server version: 5.7.28
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hungry`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'kartik@gmail.com', '$2y$10$Y62.Ii3y18jQn2LxSZKQAevh0DDDmuuZv94i1Ik2iiX1S9qdiWsjW', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
CREATE TABLE IF NOT EXISTS `carts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `menu_id`, `quantity`, `created_at`, `updated_at`) VALUES
(18, 5, 1, 6, '2020-04-27 02:46:06', '2020-04-27 05:35:34');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `state_id` int(11) NOT NULL,
  `city_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `state_id`, `city_name`, `created_at`, `updated_at`) VALUES
(1, 58, 'Ludhiana', '2020-02-25 06:59:52', '2020-02-25 06:59:52'),
(2, 69, 'Mumbai', '2020-02-28 23:55:00', '2020-02-28 23:55:00');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meals`
--

DROP TABLE IF EXISTS `meals`;
CREATE TABLE IF NOT EXISTS `meals` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `meals`
--

INSERT INTO `meals` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Vegetarian', NULL, NULL),
(2, 'Non Vegetarian', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `vendorDetail_id` int(11) NOT NULL,
  `time_id` int(11) NOT NULL,
  `meal_id` int(11) NOT NULL,
  `meal_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `menu_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `vendorDetail_id`, `time_id`, `meal_id`, `meal_name`, `description`, `menu_image`, `price`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 1, 'Lunch', '<p>1 Dal,sbzi,3 roti,rice</p>', 'detail.jpeg', 130, '2020-03-11 23:10:50', '2020-03-11 23:10:50'),
(3, 4, 1, 1, 'Break-1', '<p>2 Aloo Prantha with Curd</p>', '', 60, '2020-04-26 12:40:30', '2020-04-26 12:40:30'),
(4, 4, 1, 1, 'Break-2', '<p>Onion Prantha with pickle</p>', '', 50, '2020-04-26 12:49:19', '2020-04-26 12:49:19');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_01_30_124241_create_admins_table', 2),
(5, '2020_01_31_144304_create_vendors_table', 3),
(6, '2020_02_11_044842_create_states_table', 4),
(7, '2020_02_11_091709_create_cities_table', 5),
(8, '2020_02_25_130312_create_vendor_details_table', 6),
(9, '2020_03_09_182530_create_meals_table', 7),
(10, '2020_03_09_185129_create_times_table', 8),
(11, '2020_03_09_185953_create_menus_table', 9),
(12, '2020_04_02_135631_create_carts_table', 10),
(13, '2020_04_06_135743_create_user_details_table', 11),
(15, '2020_04_07_063053_create_orders_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `userDetail_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `meal_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `payment_status` int(11) NOT NULL DEFAULT '0',
  `order_status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userDetail_id`, `vendor_id`, `meal_id`, `quantity`, `price`, `order_id`, `transaction_id`, `payment_status`, `order_status`, `created_at`, `updated_at`) VALUES
(63, 7, 4, '[1]', '[1]', 130, 775175, '0', 0, 0, '2020-04-27 02:46:56', '2020-04-27 02:46:56');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
CREATE TABLE IF NOT EXISTS `states` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `state_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=83 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `state_name`, `created_at`, `updated_at`) VALUES
(72, 'Andhra Pradesh', '2020-02-29 00:20:51', '2020-02-29 00:20:51'),
(71, 'Madhya Pradesh', '2020-02-29 00:20:38', '2020-02-29 00:20:38'),
(70, 'Goa', '2020-02-29 00:20:13', '2020-02-29 00:20:13'),
(69, 'Maharashtra', '2020-02-28 23:54:42', '2020-02-28 23:54:42'),
(68, 'Gujarat', '2020-02-28 23:54:32', '2020-02-28 23:54:32'),
(64, 'Telangana', '2020-02-23 22:58:43', '2020-02-23 22:58:43'),
(67, 'Rajasthan', '2020-02-28 23:54:19', '2020-02-28 23:54:19'),
(65, 'Mizoram', '2020-02-26 22:28:40', '2020-02-26 22:28:40'),
(61, 'Nagaland', '2020-02-23 22:57:48', '2020-02-23 22:57:48'),
(62, 'Manipur', '2020-02-23 22:57:57', '2020-02-23 22:57:57'),
(60, 'Bihar', '2020-02-23 22:57:35', '2020-02-23 22:57:35'),
(59, 'U.P', '2020-02-23 22:57:30', '2020-02-23 22:57:30'),
(56, 'Haryana', '2020-02-22 04:07:38', '2020-02-23 22:57:20'),
(58, 'Punjab', '2020-02-23 22:57:24', '2020-02-23 22:57:24'),
(73, 'Delhi', '2020-02-29 00:21:08', '2020-02-29 00:21:08'),
(74, 'Uttar Pradesh', '2020-02-29 00:21:30', '2020-02-29 00:21:30'),
(75, 'Bihar', '2020-02-29 00:21:39', '2020-02-29 00:21:39'),
(76, 'Karnataka', '2020-02-29 00:22:14', '2020-02-29 00:22:14'),
(77, 'Tamil Nadu', '2020-02-29 00:22:31', '2020-02-29 00:22:31'),
(78, 'Jharkhand', '2020-02-29 00:22:53', '2020-02-29 00:22:53'),
(79, 'Assam', '2020-02-29 00:23:15', '2020-02-29 00:23:15');

-- --------------------------------------------------------

--
-- Table structure for table `times`
--

DROP TABLE IF EXISTS `times`;
CREATE TABLE IF NOT EXISTS `times` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `time` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `times`
--

INSERT INTO `times` (`id`, `time`, `created_at`, `updated_at`) VALUES
(1, 'Breakfast', NULL, NULL),
(2, 'Lunch', NULL, NULL),
(3, 'Dinner', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'kartik', 'kartik@gmail.com', NULL, '$2y$10$jUGW46Ioj49sQEDv3okr9.iMiDxn8T2LnAO3LMXCPVayHa//y8IaC', NULL, '2020-04-22 12:04:25', '2020-04-22 12:04:25'),
(7, 'rocky', 'rocky@gmail.com', NULL, '$2y$10$x6V0V8vEwMr9i.eWk92nDO7oi4l2OWcbvWcoXhWjRUhL9KnHnQnFG', NULL, '2020-04-27 05:36:43', '2020-04-27 05:36:43');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

DROP TABLE IF EXISTS `user_details`;
CREATE TABLE IF NOT EXISTS `user_details` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `fname`, `lname`, `address`, `mobile`, `created_at`, `updated_at`) VALUES
(1, 4, 'kartik', 'arora', '#1146 Field Ganj, Street No-16,Ludhiana', 8968888193, NULL, NULL),
(2, 4, 'karan', 'Arora', 'fdfdgfdfgsfgdf', 9501003935, '2020-04-07 02:24:10', '2020-04-07 02:24:10'),
(3, 4, 'karan', 'arora', 'qwerty', 9501003935, '2020-04-07 03:12:32', '2020-04-07 03:12:32'),
(6, 5, 'kartik', 'Arora', '#1146 Field Ganj', 8968888193, '2020-04-23 00:34:41', '2020-04-23 00:34:41'),
(7, 5, 'muskan', 'gujral', 'B-1 591 kundan puri,civil lines', 9501037366, '2020-04-23 03:53:08', '2020-04-23 03:53:08');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

DROP TABLE IF EXISTS `vendors`;
CREATE TABLE IF NOT EXISTS `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `vendors_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'qwerty', 'qwerty@gmail.com', NULL, '$2y$10$lsejrllRiLlAqsADj/I.W.0DRNOm5FjvHuSflLW6KPwmIzeC9m6nS', NULL, '2020-02-01 00:21:22', '2020-02-01 00:21:22'),
(4, 'kartik', 'kartik@gmail.com', NULL, '$2y$10$l8fyNAIQeebl1EQzFrjHYeWS0df5rYHdVYhZmSwxdmf/YZmHgtNK.', NULL, '2020-02-01 00:58:18', '2020-02-01 00:58:18'),
(5, 'ishvir', 'ishvir@gmail.com', NULL, '$2y$10$hLxhugHUa.zxqSWHnkcnq.pniRnZ0GautFJvbOwe9xmKjZSeWj.Wa', NULL, '2020-02-03 22:19:03', '2020-02-03 22:19:03'),
(6, 'Lovely Tiffin Service', 'lovely@gmail.com', NULL, '$2y$10$U2UtajVu8SziJA7DvD.LRO6F305npzY9eiO2Lt6i627B4I/lbmqb.', NULL, '2020-04-26 12:19:42', '2020-04-26 12:19:42');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_details`
--

DROP TABLE IF EXISTS `vendor_details`;
CREATE TABLE IF NOT EXISTS `vendor_details` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) NOT NULL,
  `company_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `pincode` int(11) NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `off_days` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meal_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `about_us` text COLLATE utf8_unicode_ci NOT NULL,
  `contact_person` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `vendor_details_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vendor_details`
--

INSERT INTO `vendor_details` (`id`, `vendor_id`, `company_name`, `state_id`, `city_id`, `address`, `pincode`, `mobile`, `email`, `logo`, `off_days`, `meal_type`, `about_us`, `contact_person`, `website`, `status`, `created_at`, `updated_at`) VALUES
(3, 4, 'Spice Box', 58, 1, '#1146 Model Town', 141001, '8968888193', 'kartik@gmail.com', 'qwerty.jpg', 'sunday', '[\"1\",\"2\"]', '<h1>mnbjh</h1>', 'muskan', NULL, 1, '2020-03-09 13:10:33', '2020-04-23 03:49:08'),
(4, 6, 'Lovely Tiffin Service', 58, 1, '4108, Samrala Chowk, New Shivaji Nagar Main Road, Shivajinagar', 141008, '08054519116', 'lovely@gmail.com', 'lovely.jpeg', NULL, '[\"1\"]', '<p>We provide fresh home cooked food</p>', 'Mr Lovely', NULL, 1, '2020-04-26 12:37:42', '2020-04-26 12:43:49');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
