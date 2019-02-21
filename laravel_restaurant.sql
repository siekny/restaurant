-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2019 at 06:12 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `food_blogs`
--

CREATE TABLE `food_blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `blogName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addDate` datetime DEFAULT NULL,
  `addBy` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `food_blogs`
--

INSERT INTO `food_blogs` (`id`, `blogName`, `addDate`, `addBy`, `description`, `image`, `created_at`, `updated_at`) VALUES
(62, 'Thai Food', '2019-01-09 00:00:00', 'Ny NY', 'Thai cuisine is well known for its spiciness, with Som Tam (a spicy papaya salad) being a famous example. In fact, however, the secret to Thai food is a balance of five flavors: sour, sweet, salty, bitter, and spicy. ... For example, Tom Yum Goong, which is sour and spicy, is often paired with an omelet or rice', '', '2019-02-05 20:18:57', '2019-02-11 18:18:43'),
(64, 'Khmer Food', '2019-02-10 00:00:00', 'Mey ney', 'Khmer food takes influences from a variety of countries. ... Common ingredients in Khmer cuisine are similar to those found in other Southeast Asian culinary traditions – rice and sticky rice, fish sauce, palm sugar, lime, garlic, chilies, coconut milk, lemon grass, galangal, kaffir lime and shallots.', '', '2019-02-05 20:30:01', '2019-02-11 18:16:09'),
(65, 'Chinese Food', '2019-02-20 00:00:00', 'Ny', 'The spread of traditional Chinese food began with Cantonese style cooking from the south of China and this style includes many of the more instantly recognisable Chinese dishes such as stir-fries, sweet and sour and chop suey', '1550725383.the-greens-chinese-cuisine.jpg', '2019-02-20 22:03:03', '2019-02-20 22:03:03');

-- --------------------------------------------------------

--
-- Table structure for table `food_menus`
--

CREATE TABLE `food_menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foodName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `blog_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `food_menus`
--

INSERT INTO `food_menus` (`id`, `image`, `foodName`, `price`, `description`, `blog_id`, `created_at`, `updated_at`) VALUES
(1, '1549599054.1.jpg', 'yummy', 12.30, 'Very yummy', 75, '2019-02-07 21:10:54', '2019-02-07 21:10:54'),
(2, '1549934278.Fish-Amok-.jpg', 'Amok', 4.50, 'It\'s traditional Khmer Food', 64, '2019-02-11 18:17:58', '2019-02-11 18:17:58'),
(3, '1549936213.lemonede.jpeg', 'Lemonade', 3.50, 'Bekal piknik yang Kami rekomendasikan ini sangat mudah dibuat dan bergizi, bisa menjadi referensi bekal piknikmu bersama keluarga', 62, '2019-02-11 18:50:13', '2019-02-11 18:50:13'),
(4, '1549936889.foodtherapy6.jpg', 'Food Therapy', 10.98, 'emicu kedua: Makanan yang diproses adalah makanan hasil olahan pabrik.', 64, '2019-02-11 19:01:29', '2019-02-11 19:01:29'),
(5, '1549936889.foodtherapy6.jpg', 'Food Therapy', 10.98, 'emicu kedua: Makanan yang diproses adalah makanan hasil olahan pabrik.', 64, '2019-02-11 19:01:29', '2019-02-11 19:01:29'),
(6, '1549936889.foodtherapy6.jpg', 'Food Therapy', 10.98, 'emicu kedua: Makanan yang diproses adalah makanan hasil olahan pabrik.', 64, '2019-02-11 19:01:29', '2019-02-11 19:01:29'),
(7, '1549934278.Fish-Amok-.jpg', 'Amok', 4.50, 'It\'s traditional Khmer Food', 64, '2019-02-11 18:17:58', '2019-02-11 18:17:58'),
(8, '1549934278.Fish-Amok-.jpg', 'Amok', 4.50, 'It\'s traditional Khmer Food', 64, '2019-02-11 18:17:58', '2019-02-11 18:17:58');

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
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_resets_table', 1),
(8, '2018_10_13_031332_create_food_blogs_table', 1),
(9, '2018_10_13_031354_create_food_menus_table', 1),
(10, '2018_10_13_031413_create_table_bookings_table', 1),
(11, '2019_01_31_013600_create_ajax_image_tabel', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('sieknyhor@gmail.com', '$2y$10$rxtEB5pzl.wg6daFpDp/M.jVhbvytsZ8/URETSoAJqA76qb3Z9i0.', '2018-10-20 06:57:10');

-- --------------------------------------------------------

--
-- Table structure for table `table_bookings`
--

CREATE TABLE `table_bookings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `numPersons` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'siekny', 'sieknyhor@gmail.com', '$2y$10$zhCXDY/fmfAtc1yQgFi2yuo1XlvzhW4TUgoY/lRwhuL1590mYWQSG', NULL, '2018-10-13 05:30:38', '2018-10-13 05:30:38'),
(2, 'Ny', 'ny@gmail.com', '$2y$10$6wjGZUUjHm6DMOPrQmtZD.a1H7BVbhKvYfxzJdm8UR5o1GWDH4X2S', NULL, '2019-01-29 19:10:53', '2019-01-29 19:10:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food_blogs`
--
ALTER TABLE `food_blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_menus`
--
ALTER TABLE `food_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `table_bookings`
--
ALTER TABLE `table_bookings`
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
-- AUTO_INCREMENT for table `food_blogs`
--
ALTER TABLE `food_blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `food_menus`
--
ALTER TABLE `food_menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `table_bookings`
--
ALTER TABLE `table_bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
