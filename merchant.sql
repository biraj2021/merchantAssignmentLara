-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 30, 2020 at 10:48 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `merchant`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyers`
--

DROP TABLE IF EXISTS `buyers`;
CREATE TABLE IF NOT EXISTS `buyers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `buyers_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buyers`
--

INSERT INTO `buyers` (`id`, `user_id`, `first_name`, `last_name`, `image`, `created_at`, `updated_at`) VALUES
(1, 3, 'Prakash', 'Parmaik', '34SC021.jpg', '2020-06-29 12:32:17', '2020-06-29 12:32:17'),
(10, 29, 'Final', 'Test', '1593556091.jpg', '2020-06-30 22:28:11', '2020-06-30 22:28:11'),
(9, 20, 'Biraj', 'Sharma', '1593504561.png', '2020-06-30 08:09:21', '2020-06-30 08:09:21');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_06_21_121540_create_buyers_table', 1),
(4, '2020_06_21_122042_create_sellers_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

DROP TABLE IF EXISTS `sellers`;
CREATE TABLE IF NOT EXISTS `sellers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sellers_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`id`, `user_id`, `first_name`, `last_name`, `image`, `created_at`, `updated_at`) VALUES
(1, 5, 'test', 'demo', '1592771783.jpg', '2020-06-29 12:35:30', '2020-06-29 12:35:30'),
(11, 24, 'demo', 'test', '1593552802.jpg', '2020-06-30 21:33:22', '2020-06-30 21:33:22'),
(10, 23, 'Amit', 'Jena', '1593552716.jpg', '2020-06-30 21:31:56', '2020-06-30 21:31:56'),
(9, 22, 'Seema', 'Sharma', '1593552604.jpg', '2020-06-30 21:30:05', '2020-06-30 21:30:05'),
(8, 21, 'Biraj', 'Sharma', '1592771441.jpg', '2020-06-30 11:36:17', '2020-06-30 11:36:17'),
(12, 25, 'Rajeev', 'Ranjan', '1593552899.jpg', '2020-06-30 21:34:59', '2020-06-30 21:34:59'),
(13, 28, 'Final', 'Test', '1593555881.JPG', '2020-06-30 22:24:42', '2020-06-30 22:24:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonenumber` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usertype` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_phonenumber_unique` (`phonenumber`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `phonenumber`, `password`, `usertype`, `remember_token`, `created_at`, `updated_at`) VALUES
(25, 'rj@gmail.com', '986521365', '$2y$10$k9mBl5c2GDigxib/biovoOlJiG4vkK3AyK6LQJhYS2RqsFiCLEDIC', '2', NULL, '2020-06-30 21:34:59', '2020-06-30 21:34:59'),
(3, 'sdf@gmail.com', '984584123', '$2y$10$V8lqXOuOqMVEJrB/csWCtewbFJPOz4f7c9ou70YKCThcKaf2GP.9G', '1', NULL, '2020-06-29 12:32:17', '2020-06-29 12:32:17'),
(5, 'demo@gmail.com', '985987243', '$2y$10$8P4uW/bjU2jhI7VxRxAc6euGp19tSf8Wdi5hiQvON0LWPzTYETyoW', '2', NULL, '2020-06-29 12:35:30', '2020-06-29 12:35:30'),
(26, 'final@gmail.com', '9058965230', '$2y$10$ouZEzYd9XDOOP26uqh9U0ur1omBXYpEoxZw1iOKVdQvd4xW2edEai', '2', NULL, '2020-06-30 22:21:08', '2020-06-30 22:21:08'),
(27, 'finaldemo@gmail.com', '9058965000', '$2y$10$fzQp/qyYgeP4KfXAayTL1OmDaDVZEDLj4JxQGKpAeD8t.jwYAuGwm', '1', NULL, '2020-06-30 22:23:04', '2020-06-30 22:23:04'),
(28, 'finaldemo1@gmail.com', '9058905000', '$2y$10$oumxiDqV1AW5qmJuMw45HOggYzGmIKlkXgyFh9sl3VvfXNXVDcFZG', '2', NULL, '2020-06-30 22:24:42', '2020-06-30 22:24:42'),
(29, 'admin@gmail.com', '9058900000', '$2y$10$HS7iCH4q2bUDesM.Bj28yOPX7AJ3cH8IfiTla9NQIt3Wql5X6MZiK', '1', NULL, '2020-06-30 22:28:11', '2020-06-30 22:28:11'),
(22, 'seema@gmail.com', '9073322336', '$2y$10$/5YXyuos33/Nz3VCSKaB6OzlbpamoqU0kpQbZZ9j0kzqO7QXGQM.m', '2', NULL, '2020-06-30 21:30:05', '2020-06-30 21:30:05'),
(23, 'amit@gmail.com', '986523014', '$2y$10$kDvZrIz2zbJauz95RfQ1BuocmJXBgo0oiN7z.Q7LSCUUyg7Oxdpia', '2', NULL, '2020-06-30 21:31:56', '2020-06-30 21:31:56'),
(24, 'test@gmail.com', '986532650', '$2y$10$tjvJ2WBShhgjLQSZWQUKIOz9ERpm7DOPDBCgoeRKkoA8fRJpvQ3M.', '2', NULL, '2020-06-30 21:33:22', '2020-06-30 21:33:22'),
(20, 'dfgt@gmail.com', '9865923650', '$2y$10$XZiZKD4t7q3Oq7cGMmB6kuls25iBmQgrE85uxioGIZhbjEwRNGECe', '1', NULL, '2020-06-30 08:09:21', '2020-06-30 08:09:21'),
(21, 'abcd1@gmail.com', '9865236540', '$2y$10$Q7W7GnJj79aAPPhHI6CmSeyaM8V5uoVXCoaDEdo6twSmA1aHPrOOu', '2', NULL, '2020-06-30 11:36:17', '2020-06-30 11:36:17');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
