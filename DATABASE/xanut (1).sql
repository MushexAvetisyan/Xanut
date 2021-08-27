-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2021 at 06:43 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xanut`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `login` varchar(15) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`login`, `password`) VALUES
('admin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(4) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`) VALUES
(8, 14, 29, 1),
(9, 14, 31, 39),
(13, 14, 35, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(4) NOT NULL,
  `name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(89, '     Fruits Stores'),
(90, ' Clothes Stores'),
(91, ' Library Stores'),
(92, ' Accessory Stores'),
(93, '  Pharmacies Stores'),
(94, 'Technology stores');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(4) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `price` varchar(10) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `cat_id` int(4) DEFAULT NULL,
  `iamge` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `cat_id`, `iamge`) VALUES
(29, 'Acerola', '20', 'Armenian ', 89, 'acerola-cherry-wit.jpg_1630007559'),
(31, 'Apple', '20', 'Armenian ', 89, 'b3873509-e1e1-431b-9a98.jpeg_1630009613'),
(32, 'Apricot', '50', 'Armenian ', 89, 'apricots-6a69ba0.jpg_1630010195'),
(33, 'White Jacket', '120', 'Cotton Wool', 90, 'apricots-6a69ba0.jpg_1630011506'),
(34, 'Red and White', '200', 'Cotton Wool', 90, '553aac23232c63b531d0bf724310b3f7.jpg_1630011528'),
(35, 'Black Jacket', '160', 'Cotton Wool', 90, '41Rj6wwfg2L.jpg_1630011555'),
(36, 'Red and White shirt', '145', 'Cotton Wool', 90, '5c3f18cd992b18878c7df7c73f93a7084295f176.jpg_1630011584'),
(37, 'Hardcore Java', '350', 'Learn Java language', 91, 'content_lrg.jpg_1630011871'),
(38, 'The Power Of Now', '150', 'Pshychology', 91, '20171208111522_003848657_1.jpg_1630011907'),
(39, 'Programmer', '140', 'Learn Coding', 91, '291e2de422af764a5be0666d50186485.jpg_1630011933'),
(40, 'NaviForce', '200', 'Sport', 92, 'NAVIFORCE-2020-New-Fashion-endar.jpg_1630012123'),
(41, 'Yazole', '350', 'Elegant', 92, 'HTB1rWmGfOMnBKNjSZFoq6zOSFXaB.jpg_1630012146'),
(42, 'Curren', '160', 'Sport', 92, 'H0bc3a06762fc4848894c2d0f9248f5815.jpg_1630012169');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(4) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `email`) VALUES
(14, 'Mushex', '123456', 'avetisyan.mushex@inbox.ru');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
