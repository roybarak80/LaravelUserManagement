-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2019 at 12:24 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users_api`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_18_170808_update_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `demo_expiration_date` date DEFAULT NULL,
  `credit_card_last_digits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `user_type`, `email`, `password`, `first_name`, `last_name`, `demo_expiration_date`, `credit_card_last_digits`, `created_at`, `updated_at`) VALUES
(3, 1, 'Live', 'ben@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Ben', 'Levi', NULL, 4444, '2019-08-04 18:00:00', '2019-08-25 07:24:09'),
(4, 2, 'Demo', 'Barakroy@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Roy', 'Barak', '2019-08-01', NULL, '2019-08-13 18:00:00', '2019-08-25 07:22:25'),
(5, 3, 'Demo', 'yoni@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Yoni', 'Levi', '2019-08-08', NULL, '2019-08-11 18:00:00', '2019-08-25 07:22:38'),
(6, 4, 'Demo', 'hezi@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Hezi', 'Lev', '2019-08-23', NULL, '2019-08-28 18:00:00', '2019-08-24 17:18:08'),
(8, 6, 'Demo', 'sarit@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Sarit', 'Shalom', '2019-08-29', NULL, '2019-08-06 18:00:00', '2019-08-25 07:22:46'),
(9, 7, 'Demo', 'dana@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Dana', 'Ben', '2019-08-01', NULL, '2019-08-19 18:00:00', '2019-08-24 16:52:30'),
(10, 8, 'Live', 'shalom@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Shalom', 'Choen', NULL, 4473, '2019-08-24 19:13:26', '2019-08-25 07:23:58'),
(14, 9, 'Live', 'ron@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Ron', 'Levi', NULL, 5555, '2019-08-24 19:15:44', '2019-08-25 07:23:29'),
(47, 10, 'Live', 'Yaniv@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Yaniv', 'Bar', NULL, 3444, '2019-08-25 03:07:34', '2019-08-25 07:23:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
