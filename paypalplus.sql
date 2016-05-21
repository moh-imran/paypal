-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2016 at 01:11 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paypalplus`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ijaz.ahmed@vengile.com', '$2y$10$BWPKUD12pUY7100DUWtQPOSC8/DTN2QbNH4NgA6VZXD0krU5IHjvi', 'hip7M7R1jZhdjkEaHwDw3dx0akbclwOSEgWunDshnzYMjmvx0Hbu4iawYjE7', NULL, '2016-05-18 06:10:43');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_01_26_071950_Admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(10) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `shop_url` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `shopusername` varchar(255) NOT NULL,
  `shoppassword` varchar(255) NOT NULL,
  `shopurl` varchar(255) NOT NULL,
  `ftphost` varchar(255) NOT NULL,
  `ftpuser` varchar(255) NOT NULL,
  `ftppassword` varchar(255) NOT NULL,
  `paypallive` varchar(255) NOT NULL,
  `paysecret` varchar(255) NOT NULL,
  `approved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `date`, `time`, `fname`, `lname`, `email`, `company`, `shop_url`, `created_at`, `updated_at`, `shopusername`, `shoppassword`, `shopurl`, `ftphost`, `ftpuser`, `ftppassword`, `paypallive`, `paysecret`, `approved`) VALUES
(1, 1, '2016-05-19', '10:00 AM', 'hussain', 'hussain', 'haider.1275@yahoo.com', 'ASDASDASD', 'AAAAA', '2016-05-17 05:09:21', '2016-05-17 05:09:21', '', '', '', '', '', '', '', '', 0),
(2, 1, '2016-05-19', '10:00 AM', 'hussain', 'hussain', 'haider.1275@yahoo.com', 'ASDASDASD', 'AAAAA', '2016-05-17 05:12:23', '2016-05-17 05:12:23', '', '', '', '', '', '', '', '', 0),
(3, 1, '2016-05-17', '4:00 PM', 'hussain', 'ali', 'haider.1275@yahoo.com', 'AAAA', 'ASDASDAD', '2016-05-17 05:14:52', '2016-05-17 05:14:52', '', '', '', '', '', '', '', '', 0),
(4, 1, '2016-05-24', '1:00 PM', 'sdfsdf', 'sdfsdf', 'haider.1275@yahoo.com', 'asd', 'ASDAD', '2016-05-18 06:40:33', '2016-05-18 01:40:33', 'sdfsdf', 'sdfsd', 'sdfsdf', 'sdfsd', 'fsdfs', 'dfsdf', 'sdfsdf', 'sdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shop_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `name`, `email`, `firstname`, `lastname`, `company`, `shop_url`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 0, '', 'haider.1275@yahoo.com', 'ijaz', 'bhatti', 'haider.1275@yahoo.com', 'ASDADasdasd', '$2y$10$X7YYpc3axCR6JPca/qZsguYLrauDARLKK6snDUotspFgNSoMrtW1S', '5NRd5vmlzR9T4SaMrSKHzdcDCAB1qzfNsyCQfCj4n5fkhI8yppg841gkPyoL', '2016-05-17 00:23:18', '2016-05-18 06:09:47'),
(2, 0, '', 'ijaz.ahmed@vengile.com', 'ijaz', 'ahmed', 'ijaz', 'ijaz', '$2y$10$3tyuLJWUnJivnzira65speS7Stfx7IsbHGZwm2xftICANEHiN6p42', '5u3iYElL69uP7wTFD7QqnqZrltwE7q6XuJKhb9Km81IiH1627AEDGQT1TQwe', '2016-05-17 07:43:59', '2016-05-17 07:44:49'),
(3, 0, '', 'asdasda@asda.com', 'asdasd', 'asdasd', 'asdasd', 'AAAAA', '$2y$10$aMW8vuF8CzOPQ22bZlquAO67xDKMbiaUKqTnSuVyzPJZlay8N1jMG', '', '2016-05-17 07:45:34', '2016-05-17 07:45:34'),
(4, 0, '', 'ssshaider.1275@yahoo.com', 'hussain', 'ali', 'ASDASDASD', 'AAAAA', '$2y$10$0WdIe1CIIVrJ9QpQTSzZvOg3sdNrcnXgruXoL0EcQggmyZFLuqMUS', '', '2016-05-17 07:54:01', '2016-05-17 07:54:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
