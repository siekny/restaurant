-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2018 at 10:39 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ckcc`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cate_name` varchar(60) NOT NULL,
  `cate_description` varchar(60) NOT NULL,
  `staus` int(11) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cate_name`, `cate_description`, `staus`, `created_at`, `updated_at`) VALUES
(1, 'Khmer Food', 'khmer food khmer food khmer food khmer food khmer food khmer', 1, '2018-06-27 08:36:46', '0000-00-00 00:00:00'),
(3, 'Thai Food', 'Thai food is blah blah blah', 1, '2018-06-24 15:01:01', '0000-00-00 00:00:00'),
(4, 'Korean Food', 'Korean Food is blah blah blah', 1, '2018-06-28 08:33:22', '2018-06-28 01:33:22'),
(5, 'Japanese', 'japan food is blahing', 1, '2018-06-28 08:28:26', '2018-06-28 01:28:26'),
(6, 'chinese food', 'test', 1, '2018-06-28 04:36:11', '2018-06-28 04:36:11'),
(7, 'test', 'adfasdfas', 0, '2018-07-09 07:55:25', '2018-07-09 00:55:25'),
(8, 'Testing', 'TestingTestingTestingTestingTestingTesting', 1, '2018-07-31 04:41:35', '2018-07-31 04:41:35');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `price` float NOT NULL,
  `description` text,
  `cate_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `picture` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `name`, `price`, `description`, `cate_id`, `created_at`, `updated_at`, `picture`) VALUES
(9, 'A MoKK (អាម៉ុក)', 3.55, 'test1', 1, '2018-06-28 11:10:57', '2018-06-28 04:10:57', '1530184257.pp-food2.jpg'),
(10, 'Som lor ma ju', 1.5, 'ddd', 1, '2018-07-09 09:36:07', '2018-07-09 02:36:07', '1530086964.khmer-food-1.jpg'),
(11, 'Korean  Kimbap', 8, 'asdfasdfasdf', 4, '2018-07-09 09:38:55', '2018-07-09 02:38:55', '1531129135.korean-kimbap8.jpg'),
(13, 'Khua Kling ลิ้งหมู', 3, 'asfdsaf', 3, '2018-07-09 09:42:56', '2018-07-09 02:42:56', '1531129376.seddd.jpg'),
(14, 'Pork cutlet', 4, 'asdfsfasd', 4, '2018-07-09 09:39:33', '2018-07-09 02:39:33', '1531129173.donkkaseu-plate.jpg'),
(17, 'Kimchi Korea', 3.5, 'asdfsadfasdf', 4, '2018-07-09 09:40:22', '2018-07-09 02:40:22', '1531129222.kimchi.jpg'),
(19, 'Bay Cha sach ko', 2, 'Bay cha dak sach ko', 1, '2018-07-09 02:34:31', '2018-07-09 02:34:31', '1531128871.typical-cambodian-food.jpg'),
(20, 'Koung', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting indu', 1, '2018-07-31 11:07:16', '2018-07-31 04:07:16', '1531128919.typical-cambodian-food (1).jpg'),
(22, 'Korean Soup', 8.4, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting indu', 4, '2018-07-31 11:07:07', '2018-07-31 04:07:07', '1531129277.korean-food_625x350_61467094819.jpg'),
(23, 'Nam Prik', 3.5, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting indu', 3, '2018-07-31 11:07:00', '2018-07-31 04:07:00', '1531129537.dddd.jpg'),
(24, 'tsunagu Japan', 4.5, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting indu', 5, '2018-07-31 11:06:49', '2018-07-31 04:06:49', '1531129633.eeee.jpg'),
(25, 'Boston Japanese', 10.5, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting indujj', 5, '2018-08-06 06:33:31', '2018-08-05 23:33:31', '1531129717.w.jpg'),
(26, 'pizza', 100, NULL, 1, '2018-08-06 00:06:52', '2018-08-06 00:06:52', '1533539212.1.jpg'),
(27, 'Burger', 120, NULL, 1, '2018-08-08 05:19:48', '2018-08-08 05:19:48', '1533730788.img-logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `food_order`
--

CREATE TABLE `food_order` (
  `id` int(11) NOT NULL,
  `cust_phone` varchar(20) NOT NULL,
  `cust_add` text NOT NULL,
  `food_name` varchar(255) NOT NULL,
  `unit_price` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `total` float NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food_order`
--

INSERT INTO `food_order` (`id`, `cust_phone`, `cust_add`, `food_name`, `unit_price`, `qty`, `total`, `picture`, `status`, `created_at`, `updated_at`) VALUES
(105, '3', '3', 'Som lor ma ju<br>A MoKK (អាម៉ុក)<br>Bay Cha sach ko', '1.5<br>3.55<br>2', '2<br>1<br>1', 8.55, '1530184257.pp-food2.jpg', 0, '2018-08-05 07:02:35', '2018-08-05 07:02:35'),
(106, '33', 'ff', 'Bay Cha sach ko<br>Pork cutlet', '2<br>4', '1<br>1', 6, '1530184257.pp-food2.jpg', 0, '2018-08-05 07:51:58', '2018-08-05 07:51:58'),
(107, '12', '12', 'A MoKK (អាម៉ុក)<br>\r\nSom lor ma ju<br>', '3.90<br>\r\n1.5<br>', '1<br>\r\n3<br>', 8.4, '1530184257.pp-food2.jpg', 1, '2018-08-06 06:50:50', '2018-08-05 23:50:50'),
(108, '12346799', 'qw', 'Som lor ma ju<br>\r\nA MoKK (អាម៉ុក)<br>', '1.5<br>\r\n3.90<br>', '3<br>\r\n1<br>', 8.05, '1530184257.pp-food2.jpg', 1, '2018-08-06 06:40:21', '2018-08-05 23:40:21'),
(109, '098765321', 'Steong Meanchey, Phnom Penh', 'Korean Soup<br>Bay Cha sach ko', '8.4<br>2', '3<br>4', 33.2, '1530184257.pp-food2.jpg', 0, '2018-08-08 05:08:09', '2018-08-08 05:08:09'),
(110, '1', '11234', 'Bay Cha sach ko', '2', '1', 2, '1530184257.pp-food2.jpg', 0, '2018-08-08 07:10:03', '2018-08-08 07:10:03');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `useradmin`
--

CREATE TABLE `useradmin` (
  `id` int(11) NOT NULL,
  `fullname` varchar(35) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `position` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `useradmin`
--

INSERT INTO `useradmin` (`id`, `fullname`, `username`, `password`, `email`, `position`) VALUES
(1, 'Hor Siekny', 'siekny', 'SieknyHor.Restaurant', 'sieknyhor@gmail.com', 'Admin'),
(2, 'Bun Monyoudom', 'oudom', 'BunMonyOudom.Restaurant', 'oudombun262@gmail.com', 'Admin'),
(3, 'Rin Sopheary', 'sopheary', 'RinSopheary.Restaurant', 'sophearyrin@gmail.com', 'Admin'),
(13, 'Hor Siekny', 'siekny', 'sieknykiki', 'horsiekny@gmail.com', 'Normal User'),
(14, 'admin', 'siekny', 'nykiki', 'ny@gmail.com', 'Normal User');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$X8i.blgcdDVQGg60qblQB.hf1jEtX65GefNyfRGhbJuIlIFeEYyQW', '4V7Z6t3ZEW8mQI5kQhECaJEBDTORZao0MyEY65hIyA6ZrEwgIutuRKzfFDEt', '2018-06-24 06:59:47', '2018-06-24 06:59:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_order`
--
ALTER TABLE `food_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `useradmin`
--
ALTER TABLE `useradmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `food_order`
--
ALTER TABLE `food_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `useradmin`
--
ALTER TABLE `useradmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
