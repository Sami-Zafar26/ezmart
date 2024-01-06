-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2024 at 09:58 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ezmart`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(20) NOT NULL,
  `admin_email` varchar(20) NOT NULL,
  `admin_password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, '', 'admin@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_image` varchar(35) NOT NULL,
  `category_name` varchar(30) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_image`, `category_name`, `time`) VALUES
(1, 'images/moniter.jpg', 'Moniters', '2023-05-11 13:33:57'),
(2, 'images/cpu.jpg', 'Cpu', '2023-05-11 13:33:57'),
(3, 'images/ram.jpg', 'Ram', '2023-05-11 13:33:57'),
(4, 'images/gpu.jpg', 'Gpu', '2023-05-11 13:33:57'),
(5, 'images/keyboard.jpg', 'Keyboard', '2023-05-11 13:33:57'),
(6, 'images/mousecate.jpg', 'Mouse', '2023-05-11 13:33:57'),
(7, 'images/headset.jpg', 'Headset', '2023-05-11 13:33:57'),
(8, 'images/speaker.jpg', 'Speakers', '2023-05-11 13:33:57'),
(9, 'images/computercase.jpg', 'Computercase', '2023-05-11 13:33:57');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `product_name` varchar(40) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `order_qty` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_name` varchar(40) NOT NULL,
  `product_description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `foreign_category_name` varchar(30) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_image`, `product_name`, `product_description`, `price`, `foreign_category_name`, `time`) VALUES
(45, 'product_images/speaker1.jpg', 'speaker 1.0', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, architecto, iste perspiciatis vero rerum fuga eum inventore ab odio repellat placeat officiis laborum velit. Expedita eaque esse sit ab ullam. Voluptatum recusandae ipsam voluptate?', 5000.00, 'Speakers', '2023-05-16 13:01:58'),
(47, 'product_images/mouse.jpg', 'Logitech H2R', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, architecto, iste perspiciatis vero rerum fuga eum inventore ab odio repellat placeat officiis laborum velit. Expedita eaque esse sit ab ullam. Voluptatum recusandae ipsam voluptate?', 2000.00, 'Mouse', '2023-05-16 13:08:19'),
(49, 'product_images/amd1.jpg', 'amd r7 470', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, architecto, iste perspiciatis vero rerum fuga eum inventore ab odio repellat placeat officiis laborum velit. Expedita eaque esse sit ab ullam. Voluptatum recusandae ipsam voluptate?', 6500.00, 'Gpu', '2023-05-16 13:12:12'),
(50, 'product_images/zotac.jpg', 'Zotac gt 660', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, architecto, iste perspiciatis vero rerum fuga eum inventore ab odio repellat placeat officiis laborum velit. Expedita eaque esse sit ab ullam. Voluptatum recusandae ipsam voluptate?', 15000.00, 'Gpu', '2023-05-16 13:14:34'),
(51, 'product_images/hpunit.jpg', 'Hp corei5 3570', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, architecto, iste perspiciatis vero rerum fuga eum inventore ab odio repellat placeat officiis laborum velit. Expedita eaque esse sit ab ullam. Voluptatum recusandae ipsam voluptate?', 14700.00, 'Cpu', '2023-05-16 13:15:44'),
(54, 'product_images/0b4bc5dcfc77de1514b3706b7a794975.png', 'Ram ddr3 4gb', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, architecto, iste perspiciatis vero rerum fuga eum inventore ab odio repellat placeat officiis laborum velit. Expedita eaque esse sit ab ullam. Voluptatum recusandae ipsam voluptate?', 1700.00, 'Ram', '2023-05-16 13:18:03'),
(57, 'product_images/computercase2.jpg', 'pc case 1.0', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, architecto, iste perspiciatis vero rerum fuga eum inventore ab odio repellat placeat officiis laborum velit. Expedita eaque esse sit ab ullam. Voluptatum recusandae ipsam voluptate?', 4500.00, 'Computercase', '2023-05-16 13:21:21'),
(58, 'product_images/keyboard3.jpg', 'Dell keyboard', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, architecto, iste perspiciatis vero rerum fuga eum inventore ab odio repellat placeat officiis laborum velit. Expedita eaque esse sit ab ullam. Voluptatum recusandae ipsam voluptate?', 1000.00, 'Keyboard', '2023-05-16 13:23:27'),
(59, 'product_images/mouse3.jpg', 'Logitech  mouse', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, architecto, iste perspiciatis vero rerum fuga eum inventore ab odio repellat placeat officiis laborum velit. Expedita eaque esse sit ab ullam. Voluptatum recusandae ipsam voluptate?', 4500.00, 'Mouse', '2023-05-16 13:24:33'),
(66, 'product_images/4c438b3a89829096b4fc77a3c7a535f4.jpg_720x720.jpg_.jpg', 'Dell | lcd | 19 inches', 'Diagonally Viewable Size:58.4 cm23.0 inches (23.0 -inch wide viewable image size)Aspect Ratio:Widescreen (16:9)Panel Type, Surface:TN, anti glare with hard coat 3HOptimal resolution:1920 x 1080 at 60 HzContrast Ratio:1000 to 1 (typical)Brightness:250 cd/m (typical)Response Time:5 ms (back to white)Max Viewing Angle:(160° vertical /170° horizontal)Color Gamut: (typical): 83% (CIE 1976)Color Support:Color Depth: 16.7 million colorsPixel Pitch:0.265 mmPanel Backlight:LEDDisplay Type:Widescreen Flat Panel DisplayDisplay Screen Coating:Antiglare with hard coating 3H', 16500.00, 'Moniters', '2023-05-17 12:50:54'),
(67, 'product_images/moniter.jpg', 'Philips 4K HDR', 'Smooth console gaming at 4K/120 Hz Via HDMI 2.1 4K/144 Hz PC gaming on the big screen Via Displayport 1.4 DisplayHDR 1000 for truly vivid details and realism', 25000.00, 'Moniters', '2023-05-17 12:52:30'),
(68, 'product_images/headset1.jpg', 'headset', '	Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, architecto, iste perspiciatis vero rerum fuga eum inventore ab odio repellat placeat officiis laborum velit. Expedita eaque esse sit ab ullam. Voluptatum recusandae ipsam voluptate?', 1500.00, 'Headset', '2023-05-18 14:12:47'),
(69, 'product_images/1532541-gf-web-dmo-graphics-cards-3070-594x308.png', 'Nvidia RTX 3060', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, architecto, iste perspiciatis vero rerum fuga eum inventore ab odio repellat placeat officiis laborum velit. Expedita eaque esse sit ab ullam. Voluptatum recusandae ipsam voluptate', 55500.00, 'Gpu', '2023-05-19 10:05:21');

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

CREATE TABLE `queries` (
  `query_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `query_by` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `message` text NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(11) NOT NULL,
  `question_content` text NOT NULL,
  `foreign_product_id` int(11) NOT NULL,
  `question_by` int(11) NOT NULL,
  `question_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `question_content`, `foreign_product_id`, `question_by`, `question_time`) VALUES
(2705, 'This product is good', 66, 11, '2024-01-06 01:34:04'),
(2706, 'this graphics card is better than amd rx 340', 49, 11, '2024-01-06 01:51:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` varchar(10) NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `city` varchar(15) NOT NULL,
  `checkbox` varchar(10) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `date`, `month`, `year`, `gender`, `city`, `checkbox`, `time`) VALUES
(11, 'user1', 'user@gmail.com', '$2y$10$QZUPpDuA.IARnW8ES6T8/uUis9Zb6Ng1/KqdI2aZBGS62q.j3b9KO', '13', 'Jan', '2001', 'male', 'Multan', 'yes', '2024-01-06 01:32:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `queries`
--
ALTER TABLE `queries`
  ADD PRIMARY KEY (`query_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`);

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
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `queries`
--
ALTER TABLE `queries`
  MODIFY `query_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2707;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
