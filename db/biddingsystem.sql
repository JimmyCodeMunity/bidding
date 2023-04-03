-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2023 at 12:02 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biddingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(60) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `status`) VALUES
(1, 'OnlineBid', 'admin@bids.com', 'e6e061838856bf47e1de730719fb2609', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(255) NOT NULL,
  `categoryname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryname`) VALUES
(1, 'Electronics'),
(2, 'Cars'),
(3, 'Furniture'),
(4, 'Kitchen Accessory'),
(5, 'Computers'),
(6, 'Phones');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `username` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `seen` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`username`, `message`, `seen`) VALUES
('', 'Congratulation Mr., Your Product Subaru has been sold and Buyer is Clava You can contact with Buyer by Email:savana@gmail.com or You can use phone:114068776.', 0),
('Clava', 'Congratulation Mr.Clava, Your are the final and highest bidder of  Product Subaru. Now This is Your Product. Product Seller is , You can contact with Seller by Email: or You can use phone: .', 0),
('GhostBmer', 'Congratulation Mr.GhostBmer, Your Product MacBook Pro has been sold and Buyer is  You can contact with Buyer by Email: or You can use phone:.', 0),
('', 'Congratulation Mr., Your are the final and highest bidder of  Product MacBook Pro. Now This is Your Product. Product Seller is GhostBmer, You can contact with Seller by Email:ghostbmer@gmail.com or You can use phone: 114068776.', 0),
('GhostBmer', 'Congratulation Mr.GhostBmer, Your Product Mac has been sold and Buyer is Clava You can contact with Buyer by Email:savana@gmail.com or You can use phone:114068776.', 0),
('Clava', 'Congratulation Mr.Clava, Your are the final and highest bidder of  Product Mac. Now This is Your Product. Product Seller is GhostBmer, You can contact with Seller by Email:ghostbmer@gmail.com or You can use phone: 114068776.', 0),
('Clava', 'Congratulation Mr.Clava, Your Product Lambo has been sold and Buyer is GhostBmer You can contact with Buyer by Email:ghostbmer@gmail.com or You can use phone:114068776.', 0),
('GhostBmer', 'Congratulation Mr.GhostBmer, Your are the final and highest bidder of  Product Lambo. Now This is Your Product. Product Seller is Clava, You can contact with Seller by Email:savana@gmail.com or You can use phone: 114068776.', 0),
('GhostBmer', 'Congratulation Mr.GhostBmer, Your Product Phone has been sold and Buyer is Denis You can contact with Buyer by Email:dennis@gmail.com or You can use phone:71214574.', 0),
('Denis', 'Congratulation Mr.Denis, Your are the final and highest bidder of  Product Phone. Now This is Your Product. Product Seller is GhostBmer, You can contact with Seller by Email:ghostbmer@gmail.com or You can use phone: 114068776.', 0),
('Denis', 'Congratulation Mr.Denis, Your Product Hp has been sold and Buyer is GhostBmer You can contact with Buyer by Email:ghostbmer@gmail.com or You can use phone:114068776.', 0),
('GhostBmer', 'Congratulation Mr.GhostBmer, Your are the final and highest bidder of  Product Hp. Now This is Your Product. Product Seller is Denis, You can contact with Seller by Email:dennis@gmail.com or You can use phone: 71214574.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(255) NOT NULL,
  `buyer` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `productimage` varchar(60) NOT NULL,
  `startdate` varchar(60) NOT NULL,
  `enddate` varchar(60) NOT NULL,
  `sellprice` int(11) NOT NULL,
  `sold` int(11) NOT NULL DEFAULT 1,
  `pay_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `buyer`, `username`, `productname`, `price`, `quantity`, `description`, `category`, `productimage`, `startdate`, `enddate`, `sellprice`, `sold`, `pay_status`) VALUES
(9, 'Clav', 'Clava', 'Call of duty', 4700, 1, 'buy our games', 'Electronics', '138241516.png', '2023-03-30', '2023-03-31', 0, 0, 0),
(12, 'Clava', 'GhostBmer', 'Mac', 40600, 1, '500GB SSD', 'Electronics', '1213431380.jpg', '2023-03-31', '2023-04-01', 40400, 0, 1),
(13, 'GhostBmer', 'Clava', 'Lambo', 56300, 1, '3500CC,V8 in good condition', 'Cars', '771258995.jpg', '2023-03-31', '2023-04-01', 56300, 0, 1),
(14, 'Denis', 'GhostBmer', 'Phone', 13950, 1, 'iphone', 'Phones', '1983656591.jpg', '2023-03-31', '2023-04-02', 0, 0, 0),
(15, 'Clava', 'GhostBmer', 'Subaru', 456100, 1, 'subaru impreza', 'Cars', '608124603.jpg', '2023-03-31', '2023-03-31', 456100, 0, 1),
(16, 'GhostBmer', 'Denis', 'Hp', 23200, 1, '500ssd', 'Computers', '305245351.jpg', '2023-04-01', '2023-04-02', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` int(255) NOT NULL,
  `profilepic` varchar(30) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`id`, `name`, `email`, `password`, `phone`, `profilepic`, `status`) VALUES
(1, 'Clava', 'savana@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 114068776, '780764934.jpg', 1),
(2, 'GhostBmer', 'ghostbmer@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 114068777, '1463764748.jpg', 1),
(3, 'Denis', 'dennis@gmail.com', '25d55ad283aa400af464c76d713c07ad', 71214574, '2099821975.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
