-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 14, 2017 at 11:32 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `billings`
--

CREATE TABLE `billings` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `guest_money` int(11) NOT NULL,
  `refund` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `billings`
--

INSERT INTO `billings` (`id`, `order_id`, `total_amount`, `guest_money`, `refund`, `created_at`) VALUES
(2, 16, 780000, 800000, 20000, '2017-05-13 16:08:19'),
(3, 16, 780000, 800000, 20000, '2017-05-13 16:10:59'),
(4, 16, 780000, 800000, 20000, '2017-05-13 16:11:54'),
(5, 16, 780000, 800000, 20000, '2017-05-13 16:11:57'),
(6, 16, 780000, 800000, 20000, '2017-05-13 16:12:22');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Hải Sản'),
(2, 'Đồ Nướng'),
(3, 'Khai Vị');

-- --------------------------------------------------------

--
-- Table structure for table `dining_tables`
--

CREATE TABLE `dining_tables` (
  `table_number` int(11) NOT NULL,
  `chairs_count` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dining_tables`
--

INSERT INTO `dining_tables` (`table_number`, `chairs_count`, `status`) VALUES
(1, 4, 1),
(2, 6, 1),
(3, 8, 0);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `username`, `password_hash`, `email`, `phone`, `address`, `status`) VALUES
(6, 'hoangpt4', '$2y$10$gg8QLsjo2MxwOrkKXtixBuOA1/L5zFQE0lJBN7ysbvIfE.rYg6EJC', 'hoangpt4@gmail.com', '0123456789', 'Hanoi Vietnam', 3),
(7, 'hoangpt3', '$2y$10$tNQKqMpXreqgtPSE29vsmO/38WkvsFWulVbxXNWuXcazOT1MitJaS', 'hoangpt3@gmail.com', '1234567890', 'Hanoi Vietnam', 2),
(8, 'hoangpt2', '$2y$10$vempMvADA49joc3Wqa2NbOZxW4Nbs59yBUNCw9ZeLEg7plcYIXhF6', 'hoangpt2@gmail.com', '1234567891', 'Hanoi Vietnam', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `name`, `price`, `image`, `category_id`) VALUES
(1, 'Tôm Hùm Xào Gừng', 180000, 'tom-hum-xao-gung.jpg', 1),
(2, 'Tôm Hùm Rang Ớt Tỏi', 130000, 'tom-hum-rang-ot-toi.jpg', 1),
(3, 'Tôm Hùm Hấp Tỏi', 200000, 'tom-hum-hap-toi.jpg', 1),
(6, 'Cua Hoàng Đế', 160000, 'cua-hoang-de.jpg', 1),
(7, 'Hàu Sữa Ăn Gỏi', 150000, 'hau-sua-an-goi.jpg', 1),
(8, 'Hàu Sữa Nướng Mỡ Hành', 170000, 'hau-sua-nuong-mo-hanh.jpg', 1),
(9, 'Sò Điệp Việt Nam', 210000, 'so-diep-viet-nam.jpg', 1),
(10, 'Cua Rang Muối', 170000, 'cua-rang-muoi.jpg', 1),
(11, 'Cá Chình Nướng Riềng Mẻ', 180000, 'ca-chinh-nuong-rieng-me.jpg', 1),
(12, 'Ba Chỉ Bò Mỹ', 110000, 'ba-chi-bo-my.jpg', 2),
(13, 'Ba Chỉ Heo Samgyeosal', 250000, 'ba-chi-heo-samgyeosal.jpg', 2),
(14, 'Bánh Hải Sản Hàn Quốc', 130000, 'banh-hai-san-han-quoc.jpg', 2),
(15, 'Cơm Trộn Hàn Quốc', 100000, 'com-tron-han-quoc.jpg', 2),
(16, 'Miến Sợi Nhỏ Hàn Quốc', 120000, 'mien-soi-nho-han-quoc.jpg', 2),
(17, 'Sườn Los Angeles', 160000, 'suon-los-angeles.jpg', 2),
(18, 'Mực Nướng', 120000, 'muc-nuong.jpg', 2),
(19, 'Lươn Biển Nhật', 140000, 'luon-bien-nhat.jpg', 2),
(20, 'Canh Tương Hải Sản', 150000, 'canh-tuong-hai-san.jpg', 2),
(21, 'Salad Rau', 120000, 'salad-rau.jpg', 3),
(22, 'Salad Hải Sản', 130000, 'salad-hai-san.jpg', 3),
(23, 'Caesar Salad', 150000, 'caesar-salad.jpg', 3),
(24, 'Bò Tươi Salad Hàn Quốc', 190000, 'bo-tuoi-salad-han-quoc.jpg', 3),
(25, 'Salad Cá Ngừ Và Trứng', 140000, 'salad-ca-ngu-va-trung.jpg', 3),
(26, 'Panchan Củ Cải Cay', 170000, 'panchan-cu-cai-cay.jpg', 3),
(27, 'Salad Hoa Quả', 110000, 'salad-hoa-qua.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `total_amount` int(11) NOT NULL,
  `table_number` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `created_at`, `updated_at`, `total_amount`, `table_number`, `employee_id`, `status`) VALUES
(16, '2017-04-29 15:18:35', '2017-04-29 15:18:35', 780000, 1, 8, 2),
(17, '2017-04-29 15:19:47', '2017-04-29 15:19:47', 520000, 2, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `item_id`, `order_id`, `quantity`, `amount`, `status`) VALUES
(2, 1, 16, 2, 360000, 2),
(3, 13, 17, 1, 250000, 2),
(4, 14, 16, 2, 260000, 2),
(5, 18, 17, 1, 120000, 2),
(6, 20, 17, 1, 150000, 1),
(7, 17, 16, 1, 160000, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billings`
--
ALTER TABLE `billings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dining_tables`
--
ALTER TABLE `dining_tables`
  ADD PRIMARY KEY (`table_number`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `table_number` (`table_number`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `item_id` (`item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billings`
--
ALTER TABLE `billings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `dining_tables`
--
ALTER TABLE `dining_tables`
  MODIFY `table_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `billings`
--
ALTER TABLE `billings`
  ADD CONSTRAINT `billings_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`table_number`) REFERENCES `dining_tables` (`table_number`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `menu_items` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
