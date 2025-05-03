-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2025 at 07:04 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `machinedeal_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `description`, `image_path`, `updated_at`) VALUES
(1, '<h3><strong>About Shri Shyama Super Services</strong></h3><h4>&nbsp;</h4><h4>Welcome to <strong>Shri Shyama Super Services</strong>, a trusted name in providing top-quality services across various sectors. With a commitment to excellence and customer satisfaction, we offer a wide range of services designed to meet the diverse needs of our clients. Our core values of integrity, innovation, and professionalism drive us to deliver exceptional solutions that exceed expectations.</h4><p>&nbsp;</p><p>At Shri Shyama Super Services, we specialize in offering <strong>reliable, efficient, and affordable services</strong>, whether for businesses or individuals. We are passionate about delivering customized solutions that are tailored to the unique requirements of each client, ensuring the highest standards of quality and service.</p><p><i>Our team of skilled professionals brings a wealth of experience, ensuring that every task is carried out with utmost precision, care, and attention to detail. We pride ourselves on our commitment to continuous improvement, staying at the forefront of industry trends, and implementing the latest technologies and practices to provide the best results.</i></p>', '677e7e7caf7ae.png', '2025-01-09 06:55:54');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `text` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image_path`, `text`, `created_at`) VALUES
(3, '1736402988_bener 4.png', 'Welcome to Shri Shyama Super Services\r\n', '2025-01-09 06:09:48'),
(4, '1736417014_1.png', '', '2025-01-09 10:03:34'),
(5, '1736423912_banner-text.jpg', '', '2025-01-09 11:58:32');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`) VALUES
(4, 'Metalworking Machines', '2025-01-08 17:18:44'),
(8, 'Laser Cutting Machines', '2025-01-08 17:20:10'),
(9, 'Heat Treatment Equipment', '2025-01-08 17:20:26'),
(10, 'Other', '2025-01-08 17:20:45'),
(11, 'new test', '2025-01-09 05:40:40');

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `machine_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `short_description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `title`, `short_description`, `image`, `created_at`) VALUES
(1, 'dsgdfg', 'gfhfgh', '677f4ecaf24e7.png', '2025-01-09 04:21:30'),
(2, 'fghfgjh', 'fgjhyujghj', '677f527ca14bf.png', '2025-01-09 04:37:16'),
(4, 'image', 'image test', '677f635732e6b.jpg', '2025-01-09 05:49:11');

-- --------------------------------------------------------

--
-- Table structure for table `machines`
--

CREATE TABLE `machines` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `machines`
--

INSERT INTO `machines` (`id`, `name`, `description`, `short_description`, `image_path`, `category_id`, `created_at`) VALUES
(6, 'new machine', '<p>that is testr for machine adding services</p>', 'best machine', '677f64342a193_1265 R - 1280 R pink.png', 11, '2025-01-09 05:52:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `machines`
--
ALTER TABLE `machines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `machines`
--
ALTER TABLE `machines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `machines`
--
ALTER TABLE `machines`
  ADD CONSTRAINT `machines_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
