-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2023 at 11:54 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tapti_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `pin_code` varchar(11) NOT NULL,
  `locality` text NOT NULL,
  `address` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL DEFAULT 'India',
  `address_type` varchar(255) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `user_id`, `name`, `mobile`, `pin_code`, `locality`, `address`, `city`, `state`, `country`, `address_type`, `is_deleted`, `timestamp`) VALUES
(9, 10, 'df', '5673456345', '345643', 'grhfg', 'df', 'dfgh', 'Himachal Pradesh', 'India', 'home', 0, '2023-06-28 09:30:37'),
(10, 10, ' df', '3646363663', '234636', 'dfgs', 'sdfs', 'sdf', 'Kerala', 'India', 'office', 0, '2023-06-28 09:31:35'),
(19, 9, 'Durgesh Kumar', '7667107173', '851133', 'rani bagh', 'Mokhtiyarpur bhagwanpur begusarai Bihar', 'Begusarai', 'Bihar', 'India', 'home', 0, '2023-06-30 10:14:47'),
(20, 9, 'vikash kumar', '7667107173', '585556', 'ranibagh', 'Mokhtiyarpur bhagwanpur begusarai Bihar', 'Begusarai', 'Delhi', 'India', 'office', 0, '2023-07-04 06:58:06'),
(21, 9, 'fthydh', '8678548585', '453743', '437thsdh', 'sdfhsh', 'sdhdsh', 'Sikkim', 'India', 'home', 0, '2023-07-07 07:31:47'),
(23, 9, 'asd', '2342442424', '232323', 'sad', '23424', '234324', 'Arunachal Pradesh', 'India', 'office', 0, '2023-08-10 11:35:39'),
(24, 9, 'AMIT ', '1234567890', '124578', 'rani bagh', 'SDFASF', 'NEW DELHI', 'Rajasthan', 'India', 'office', 0, '2023-08-12 11:06:07'),
(25, 15, 'Suraj S/O Santosh sharma', '9817145647', '110044', 'India', 'Suraj S/O Santosh sharma H 22A Pooja Bhawan', 'New Delhi', 'Delhi', 'India', 'home', 0, '2023-08-12 11:41:35'),
(26, 15, 'Sujata Singh', '9171488528', '110052', 'Delhi', 'H 502 Lajpat nagar', 'New Delhi', 'Delhi', 'India', 'office', 0, '2023-08-12 11:43:38');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` bigint(20) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `image` text NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `image`, `is_deleted`, `timestamp`) VALUES
(1, 'Top Offers', 'top_offers.webp', 1, '2023-06-13 20:12:41'),
(2, 'Mobiles & Tablets', 'smart_phone.webp', 0, '2023-06-13 20:12:41'),
(3, 'Electronics', 'laptop.webp', 0, '2023-06-13 20:13:37'),
(4, 'TV & Appliances', 'tv.webp', 0, '2023-06-13 20:13:37'),
(5, 'Fashions', 'fashions.webp', 0, '2023-06-13 20:14:45'),
(6, 'Beauty', 'beauty.webp', 0, '2023-06-13 20:14:45'),
(7, 'Home & Kitchen', 'home_and_kitchen.webp', 1, '2023-06-13 20:16:20'),
(8, 'Furniture', 'furniture.webp', 0, '2023-06-13 20:16:20'),
(9, 'Flights', 'flights.webp', 0, '2023-06-13 20:16:55'),
(10, 'Grocery', 'grocery.webp', 0, '2023-06-13 20:16:55'),
(33, 'fgns', '64a7c0195d0e08.56834546.jpg', 1, '2023-07-07 07:34:49'),
(34, 'test', '64a7d17717dd37.72923197.jpg', 0, '2023-07-07 08:48:55'),
(35, 'ddddf', '64a7d7e27008c5.51293678.jpg', 1, '2023-07-07 09:16:18'),
(36, 'asdf', '64a7daed9da835.44118267.jpg', 1, '2023-07-07 09:29:17'),
(37, 'test', '64a7de49029868.97266519.jpg', 1, '2023-07-07 09:43:37'),
(38, 'asdf', '64a7e034c2d920.20759942.jpg', 1, '2023-07-07 09:51:48'),
(39, 'veg', '64a7e255d47813.02749283.jpg', 1, '2023-07-07 10:00:53'),
(40, 'test', '64c9f1b6818510.66353501.jpg', 1, '2023-08-02 06:03:34'),
(41, 'test', '64c9f21cb63974.47797546.jpg', 1, '2023-08-02 06:05:16'),
(42, 'test', '64c9f29fac2623.79899406.jpg', 1, '2023-08-02 06:07:27'),
(43, 'test', '64c9f2ca67afe3.58092732.jpg', 1, '2023-08-02 06:08:10'),
(44, 'test24', '64c9f59a304139.34847488.jpg', 1, '2023-08-02 06:20:10'),
(45, 'teasdasd', '64c9f68842f225.62289138.jpg', 1, '2023-08-02 06:24:08'),
(46, 'sdff', '64c9f6e8e79b70.10916657.jpg', 1, '2023-08-02 06:25:44'),
(47, 'asdf', '64c9f7bd2adf62.12358257.jpg', 1, '2023-08-02 06:29:17'),
(48, 'demo', '64c9fa8c8b9a23.01610567.jpg', 0, '2023-08-02 06:41:16'),
(49, 'test', '64c9fda216c290.26303472.jpg', 1, '2023-08-02 06:54:26'),
(50, 'test3354', '64ca1b00811a33.58144590.jpg', 1, '2023-08-02 07:56:03'),
(51, 'test', '64ca5364e88ac1.51188159.jpg', 1, '2023-08-02 13:00:20');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `message`, `time_stamp`) VALUES
(1, 'durgesh', 'durgesg@gmail.xcom', 'sdfsf', '2023-08-16 09:53:36'),
(2, 'test', 'test@gmail.com', 'test message', '2023-08-16 09:54:27');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(255) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price_single_unit` bigint(20) NOT NULL,
  `total_price` bigint(20) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `delivery_status` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL DEFAULT 'pending',
  `order_event` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `is_canceled` tinyint(1) NOT NULL DEFAULT 0,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `user_id`, `product_id`, `address_id`, `transaction_id`, `quantity`, `price_single_unit`, `total_price`, `payment_method`, `payment_status`, `delivery_status`, `order_status`, `order_event`, `order_date`, `is_deleted`, `is_canceled`, `timestamp`) VALUES
(1, '1689327243ee63ec41', 9, 105, 20, NULL, 1, 10999, 10999, 'pod', 'pending', 'canceled', 'canceled', '[{\"event_name\":\"order placed\",\"Date\":\"14-07-2023\",\"Time\":\"15:04:03\"},{\"event_name\":\"order canceled\",\"Date\":\"14-07-2023\",\"Time\":\"15:07:50\"}]', '2023-07-14 15:04:03', 0, 1, '2023-07-14 09:34:03'),
(2, '16893272432a3ac261', 9, 103, 20, NULL, 1, 290, 290, 'pod', 'success', 'delivered', 'delivered', '[{\"event_name\":\"order placed\",\"Date\":\"14-07-2023\",\"Time\":\"15:04:03\"},{\"event_name\":\"order confirmed\",\"Date\":\"14-07-2023\",\"Time\":\"15:07:56\"},{\"event_name\":\"shipped\",\"Date\":\"04-08-2023\",\"Time\":\"11:39:09\"},{\"event_name\":\"out for delivery\",\"Date\":\"04-08-2023\",\"Time\":\"11:39:54\"},{\"event_name\":\"delivered\",\"Date\":\"04-08-2023\",\"Time\":\"11:57:19\"}]', '2023-07-14 15:04:03', 0, 0, '2023-07-14 09:34:03'),
(3, '1689327243511811f1', 9, 92, 20, NULL, 1, 15999, 15999, 'pod', 'success', 'delivered', 'delivered', '[{\"event_name\":\"order placed\",\"Date\":\"14-07-2023\",\"Time\":\"15:04:03\"},{\"event_name\":\"order confirmed\",\"Date\":\"14-07-2023\",\"Time\":\"15:10:48\"},{\"event_name\":\"shipped\",\"Date\":\"04-08-2023\",\"Time\":\"11:42:08\"},{\"event_name\":\"out for delivery\",\"Date\":\"04-08-2023\",\"Time\":\"11:42:13\"},{\"event_name\":\"delivered\",\"Date\":\"04-08-2023\",\"Time\":\"11:43:28\"}]', '2023-07-14 15:04:03', 0, 0, '2023-07-14 09:34:03'),
(4, '1689327243b346f573', 9, 101, 20, NULL, 1, 10000, 10000, 'pod', 'success', 'delivered', 'delivered', '[{\"event_name\":\"order placed\",\"Date\":\"14-07-2023\",\"Time\":\"15:04:03\"},{\"event_name\":\"order confirmed\",\"Date\":\"04-08-2023\",\"Time\":\"14:51:46\"},{\"event_name\":\"shipped\",\"Date\":\"04-08-2023\",\"Time\":\"14:56:02\"},{\"event_name\":\"out for delivery\",\"Date\":\"04-08-2023\",\"Time\":\"14:56:05\"},{\"event_name\":\"delivered\",\"Date\":\"04-08-2023\",\"Time\":\"17:23:08\"}]', '2023-07-14 15:04:03', 0, 0, '2023-07-14 09:34:03'),
(5, '168932728077f459e2', 9, 105, 20, 'pay_MDdLAMgiRLNsYw', 1, 10999, 10999, 'online', 'success', 'delivered', 'delivered', '[{\"event_name\":\"order placed\",\"Date\":\"14-07-2023\",\"Time\":\"15:04:40\"},{\"event_name\":\"order confirmed\",\"Date\":\"14-07-2023\",\"Time\":\"15:06:39\"},{\"event_name\":\"shipped\",\"Date\":\"14-07-2023\",\"Time\":\"15:06:49\"},{\"event_name\":\"out for delivery\",\"Date\":\"14-07-2023\",\"Time\":\"15:06:58\"},{\"event_name\":\"delivered\",\"Date\":\"14-07-2023\",\"Time\":\"15:07:38\"}]', '2023-07-14 15:04:40', 0, 0, '2023-07-14 09:34:40'),
(6, '1689327280e34c480a', 9, 103, 20, 'pay_MDdLAMgiRLNsYw', 1, 290, 290, 'online', 'success', 'canceled', 'canceled', '[{\"event_name\":\"order placed\",\"Date\":\"14-07-2023\",\"Time\":\"15:04:40\"},{\"event_name\":\"order canceled\",\"Date\":\"04-08-2023\",\"Time\":\"14:47:34\"}]', '2023-07-14 15:04:40', 0, 1, '2023-07-14 09:34:40'),
(7, '1689327280c7e4cc55', 9, 92, 20, 'pay_MDdLAMgiRLNsYw', 1, 15999, 15999, 'online', 'success', 'shipped', 'confirmed', '[{\"event_name\":\"order placed\",\"Date\":\"14-07-2023\",\"Time\":\"15:04:40\"},{\"event_name\":\"order confirmed\",\"Date\":\"04-08-2023\",\"Time\":\"14:47:54\"},{\"event_name\":\"shipped\",\"Date\":\"04-08-2023\",\"Time\":\"14:50:54\"}]', '2023-07-14 15:04:40', 0, 0, '2023-07-14 09:34:40'),
(8, '1689327280b6dd889c', 9, 101, 20, 'pay_MDdLAMgiRLNsYw', 1, 10000, 10000, 'online', 'success', 'delivered', 'delivered', '[{\"event_name\":\"order placed\",\"Date\":\"14-07-2023\",\"Time\":\"15:04:40\"},{\"event_name\":\"order confirmed\",\"Date\":\"04-08-2023\",\"Time\":\"14:50:17\"},{\"event_name\":\"shipped\",\"Date\":\"04-08-2023\",\"Time\":\"14:50:34\"},{\"event_name\":\"out for delivery\",\"Date\":\"04-08-2023\",\"Time\":\"14:51:01\"},{\"event_name\":\"delivered\",\"Date\":\"04-08-2023\",\"Time\":\"14:55:03\"}]', '2023-07-14 15:04:40', 0, 0, '2023-07-14 09:34:40'),
(9, '1691666955ce9eedaa', 9, 101, 19, NULL, 2, 10000, 20000, 'pod', 'pending', 'order confirmed', 'pending', '[{\"event_name\":\"order placed\",\"Date\":\"10-08-2023\",\"Time\":\"16:59:15\"}]', '2023-08-10 16:59:15', 0, 0, '2023-08-10 11:29:15'),
(10, '16916671578e5bbc7b', 9, 119, 19, NULL, 3, 1090, 3270, 'pod', 'pending', 'confirmed', 'confirmed', '[{\"event_name\":\"order placed\",\"Date\":\"10-08-2023\",\"Time\":\"17:02:37\"},{\"event_name\":\"order confirmed\",\"Date\":\"10-08-2023\",\"Time\":\"17:03:39\"}]', '2023-08-10 17:02:37', 0, 0, '2023-08-10 11:32:37'),
(11, '1691747270708d75f3', 9, 119, 19, NULL, 1, 1090, 1090, 'pod', 'pending', 'order placed', 'pending', '[{\"event_name\":\"order placed\",\"Date\":\"11-08-2023\",\"Time\":\"15:17:50\"}]', '2023-08-11 15:17:50', 0, 0, '2023-08-11 09:47:50'),
(12, '169174764696d7be06', 9, 92, 19, NULL, 1, 15003, 15003, 'pod', 'pending', 'order placed', 'pending', '[{\"event_name\":\"order placed\",\"Date\":\"11-08-2023\",\"Time\":\"15:24:06\"}]', '2023-08-11 15:24:06', 0, 0, '2023-08-11 09:54:06'),
(13, '1691753598a57ae526', 9, 119, 19, NULL, 1, 1090, 1090, 'pod', 'pending', 'order placed', 'pending', '[{\"event_name\":\"order placed\",\"Date\":\"11-08-2023\",\"Time\":\"17:03:18\"}]', '2023-08-11 17:03:18', 0, 0, '2023-08-11 11:33:18'),
(14, '169175371911a2aded', 9, 119, 19, NULL, 1, 1090, 1090, 'pod', 'pending', 'order placed', 'pending', '[{\"event_name\":\"order placed\",\"Date\":\"11-08-2023\",\"Time\":\"17:05:19\"}]', '2023-08-11 17:05:19', 0, 0, '2023-08-11 11:35:19'),
(15, '1691753907ddbdb96b', 9, 119, 20, NULL, 1, 1090, 1090, 'pod', 'pending', 'canceled', 'canceled', '[{\"event_name\":\"order placed\",\"Date\":\"11-08-2023\",\"Time\":\"17:08:27\"},{\"event_name\":\"order canceled\",\"Date\":\"11-08-2023\",\"Time\":\"17:42:01\"}]', '2023-08-11 17:08:27', 0, 1, '2023-08-11 11:38:27'),
(16, '1691754312511536f0', 9, 101, 21, NULL, 1, 10000, 10000, 'pod', 'pending', 'canceled', 'canceled', '[{\"event_name\":\"order placed\",\"Date\":\"11-08-2023\",\"Time\":\"17:15:12\"},{\"event_name\":\"order canceled\",\"Date\":\"11-08-2023\",\"Time\":\"17:33:49\"}]', '2023-08-11 17:15:12', 0, 1, '2023-08-11 11:45:12'),
(17, '16917570025a7eb649', 9, 101, 23, NULL, 1, 10000, 10000, 'pod', 'pending', 'order placed', 'pending', '[{\"event_name\":\"order placed\",\"Date\":\"11-08-2023\",\"Time\":\"18:00:02\"}]', '2023-08-11 18:00:02', 0, 0, '2023-08-11 12:30:02'),
(18, '1691757084e1f52e1f', 9, 101, 23, NULL, 1, 10000, 10000, 'pod', 'pending', 'order placed', 'pending', '[{\"event_name\":\"order placed\",\"Date\":\"11-08-2023\",\"Time\":\"18:01:24\"}]', '2023-08-11 18:01:24', 0, 0, '2023-08-11 12:31:24'),
(19, '1691757110ae7c73a8', 9, 101, 23, NULL, 1, 10000, 10000, 'pod', 'pending', 'order placed', 'pending', '[{\"event_name\":\"order placed\",\"Date\":\"11-08-2023\",\"Time\":\"18:01:50\"}]', '2023-08-11 18:01:50', 0, 0, '2023-08-11 12:31:50'),
(20, '1691757141cb369dc3', 9, 101, 23, NULL, 1, 10000, 10000, 'pod', 'pending', 'order placed', 'pending', '[{\"event_name\":\"order placed\",\"Date\":\"11-08-2023\",\"Time\":\"18:02:21\"}]', '2023-08-11 18:02:21', 0, 0, '2023-08-11 12:32:21'),
(21, '1691757153579bbe85', 9, 101, 23, NULL, 1, 10000, 10000, 'pod', 'pending', 'order placed', 'pending', '[{\"event_name\":\"order placed\",\"Date\":\"11-08-2023\",\"Time\":\"18:02:33\"}]', '2023-08-11 18:02:33', 0, 0, '2023-08-11 12:32:33'),
(22, '1691757183720c5a2b', 9, 101, 23, NULL, 1, 10000, 10000, 'pod', 'pending', 'order placed', 'pending', '[{\"event_name\":\"order placed\",\"Date\":\"11-08-2023\",\"Time\":\"18:03:03\"}]', '2023-08-11 18:03:03', 0, 0, '2023-08-11 12:33:03'),
(23, '169175732560cbadd0', 9, 101, 23, NULL, 1, 10000, 10000, 'pod', 'pending', 'order placed', 'pending', '[{\"event_name\":\"order placed\",\"Date\":\"11-08-2023\",\"Time\":\"18:05:25\"}]', '2023-08-11 18:05:25', 0, 0, '2023-08-11 12:35:25'),
(24, '16917579083e506e46', 9, 119, 21, NULL, 1, 1090, 1090, 'pod', 'pending', 'order placed', 'pending', '[{\"event_name\":\"order placed\",\"Date\":\"11-08-2023\",\"Time\":\"18:15:08\"}]', '2023-08-11 18:15:08', 0, 0, '2023-08-11 12:45:08'),
(25, '16917581818dee0660', 9, 92, 20, NULL, 1, 15003, 15003, 'pod', 'pending', 'order placed', 'pending', '[{\"event_name\":\"order placed\",\"Date\":\"11-08-2023\",\"Time\":\"18:19:41\"}]', '2023-08-11 18:19:41', 0, 0, '2023-08-11 12:49:41'),
(26, '16917584160081f349', 9, 92, 23, NULL, 2, 15003, 30006, 'pod', 'pending', 'canceled', 'canceled', '[{\"event_name\":\"order placed\",\"Date\":\"11-08-2023\",\"Time\":\"18:23:36\"},{\"event_name\":\"order canceled\",\"Date\":\"11-08-2023\",\"Time\":\"18:23:44\"}]', '2023-08-11 18:23:36', 0, 1, '2023-08-11 12:53:36'),
(27, '16918370271f875321', 9, 101, 23, NULL, 2, 10000, 20000, 'pod', 'pending', 'order placed', 'pending', '[{\"event_name\":\"order placed\",\"Date\":\"12-08-2023\",\"Time\":\"16:13:47\"}]', '2023-08-12 16:13:47', 0, 0, '2023-08-12 10:43:47'),
(28, '16918370270c33a3a3', 9, 139, 23, NULL, 4, 7999, 31996, 'pod', 'pending', 'order placed', 'pending', '[{\"event_name\":\"order placed\",\"Date\":\"12-08-2023\",\"Time\":\"16:13:47\"}]', '2023-08-12 16:13:47', 0, 0, '2023-08-12 10:43:47'),
(29, '1691837114e3d41918', 9, 101, 23, NULL, 2, 10000, 20000, 'pod', 'pending', 'order placed', 'pending', '[{\"event_name\":\"order placed\",\"Date\":\"12-08-2023\",\"Time\":\"16:15:14\"}]', '2023-08-12 16:15:14', 0, 0, '2023-08-12 10:45:14'),
(30, '169183711497b14f9f', 9, 139, 23, NULL, 2, 7999, 15998, 'pod', 'pending', 'order placed', 'pending', '[{\"event_name\":\"order placed\",\"Date\":\"12-08-2023\",\"Time\":\"16:15:14\"}]', '2023-08-12 16:15:14', 0, 0, '2023-08-12 10:45:14'),
(31, '16918374743c6bd77f', 9, 101, 23, NULL, 3, 10000, 30000, 'pod', 'pending', 'canceled', 'canceled', '[{\"event_name\":\"order placed\",\"Date\":\"12-08-2023\",\"Time\":\"16:21:14\"},{\"event_name\":\"order canceled\",\"Date\":\"12-08-2023\",\"Time\":\"16:22:28\"}]', '2023-08-12 16:21:14', 0, 1, '2023-08-12 10:51:14'),
(32, '1691837474a9fa8cb0', 9, 139, 23, NULL, 2, 7999, 15998, 'pod', 'pending', 'canceled', 'canceled', '[{\"event_name\":\"order placed\",\"Date\":\"12-08-2023\",\"Time\":\"16:21:14\"},{\"event_name\":\"order canceled\",\"Date\":\"12-08-2023\",\"Time\":\"16:23:45\"}]', '2023-08-12 16:21:14', 0, 1, '2023-08-12 10:51:14'),
(33, '16918376521213b58c', 9, 101, 19, NULL, 3, 10000, 30000, 'pod', 'pending', 'order placed', 'pending', '[{\"event_name\":\"order placed\",\"Date\":\"12-08-2023\",\"Time\":\"16:24:12\"}]', '2023-08-12 16:24:12', 0, 0, '2023-08-12 10:54:12'),
(34, '16918376520b6abcd2', 9, 139, 19, NULL, 3, 7999, 23997, 'pod', 'pending', 'order placed', 'pending', '[{\"event_name\":\"order placed\",\"Date\":\"12-08-2023\",\"Time\":\"16:24:12\"}]', '2023-08-12 16:24:12', 0, 0, '2023-08-12 10:54:12'),
(35, '1691838031639f21e8', 9, 119, 23, NULL, 1, 1090, 1090, 'pod', 'pending', 'canceled', 'canceled', '[{\"event_name\":\"order placed\",\"Date\":\"12-08-2023\",\"Time\":\"16:30:31\"},{\"event_name\":\"order canceled\",\"Date\":\"12-08-2023\",\"Time\":\"16:30:47\"}]', '2023-08-12 16:30:31', 0, 1, '2023-08-12 11:00:31'),
(36, '1691838239e457ad65', 9, 119, 23, NULL, 3, 1090, 3270, 'pod', 'pending', 'order placed', 'pending', '[{\"event_name\":\"order placed\",\"Date\":\"12-08-2023\",\"Time\":\"16:33:59\"}]', '2023-08-12 16:33:59', 0, 0, '2023-08-12 11:03:59'),
(37, '169183823960a66dcc', 9, 92, 23, NULL, 2, 15003, 30006, 'pod', 'pending', 'order placed', 'pending', '[{\"event_name\":\"order placed\",\"Date\":\"12-08-2023\",\"Time\":\"16:33:59\"}]', '2023-08-12 16:33:59', 0, 0, '2023-08-12 11:03:59'),
(38, '16918382833ec76c10', 9, 139, 21, NULL, 1, 7999, 7999, 'pod', 'pending', 'canceled', 'canceled', '[{\"event_name\":\"order placed\",\"Date\":\"12-08-2023\",\"Time\":\"16:34:43\"},{\"event_name\":\"order canceled\",\"Date\":\"12-08-2023\",\"Time\":\"16:34:54\"}]', '2023-08-12 16:34:43', 0, 1, '2023-08-12 11:04:43'),
(39, '1691838383f90c8884', 9, 119, 24, NULL, 3, 1090, 3270, 'pod', 'success', 'delivered', 'delivered', '[{\"event_name\":\"order placed\",\"Date\":\"12-08-2023\",\"Time\":\"16:36:23\"},{\"event_name\":\"order confirmed\",\"Date\":\"12-08-2023\",\"Time\":\"16:37:39\"},{\"event_name\":\"shipped\",\"Date\":\"12-08-2023\",\"Time\":\"16:38:07\"},{\"event_name\":\"out for delivery\",\"Date\":\"12-08-2023\",\"Time\":\"16:45:50\"},{\"event_name\":\"delivered\",\"Date\":\"12-08-2023\",\"Time\":\"16:45:54\"}]', '2023-08-12 16:36:23', 0, 0, '2023-08-12 11:06:23'),
(40, '169183838323b29019', 9, 92, 24, NULL, 2, 15003, 30006, 'pod', 'pending', 'canceled', 'canceled', '[{\"event_name\":\"order placed\",\"Date\":\"12-08-2023\",\"Time\":\"16:36:23\"},{\"event_name\":\"order confirmed\",\"Date\":\"12-08-2023\",\"Time\":\"16:39:33\"},{\"event_name\":\"shipped\",\"Date\":\"12-08-2023\",\"Time\":\"16:39:48\"},{\"event_name\":\"order canceled\",\"Date\":\"12-08-2023\",\"Time\":\"16:44:55\"}]', '2023-08-12 16:36:23', 0, 1, '2023-08-12 11:06:23'),
(41, '16918383837d78741e', 9, 139, 24, NULL, 1, 7999, 7999, 'pod', 'pending', 'order placed', 'pending', '[{\"event_name\":\"order placed\",\"Date\":\"12-08-2023\",\"Time\":\"16:36:23\"}]', '2023-08-12 16:36:23', 0, 0, '2023-08-12 11:06:23'),
(42, '1691840734b8527320', 15, 101, 26, NULL, 2, 10000, 20000, 'pod', 'pending', 'order placed', 'pending', '[{\"event_name\":\"order placed\",\"Date\":\"12-08-2023\",\"Time\":\"17:15:34\"}]', '2023-08-12 17:15:34', 0, 0, '2023-08-12 11:45:34'),
(43, '16918407348d38a463', 15, 105, 26, NULL, 1, 10999, 10999, 'pod', 'pending', 'canceled', 'canceled', '[{\"event_name\":\"order placed\",\"Date\":\"12-08-2023\",\"Time\":\"17:15:34\"},{\"event_name\":\"order canceled\",\"Date\":\"12-08-2023\",\"Time\":\"17:28:03\"}]', '2023-08-12 17:15:34', 0, 1, '2023-08-12 11:45:34'),
(44, '1691841146b43e8cf4', 15, 101, 25, NULL, 1, 10000, 10000, 'pod', 'pending', 'order placed', 'pending', '[{\"event_name\":\"order placed\",\"Date\":\"12-08-2023\",\"Time\":\"17:22:26\"}]', '2023-08-12 17:22:26', 0, 0, '2023-08-12 11:52:26');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` text NOT NULL,
  `product_image` text NOT NULL,
  `product_price` bigint(20) NOT NULL,
  `product_desc` text NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_image`, `product_price`, `product_desc`, `sub_category_id`, `is_deleted`, `timestamp`) VALUES
(92, 'Nokia (1208)s', '64c8ecbf4fb206.22419811.jpg', 15003, 'Nokia\'s number one keypad phonews', 32, 0, '2023-06-21 19:34:25'),
(101, 'realme C33 2023', 'ipad.webp', 10000, '4 GB RAM and 64 GB ROM', 1, 0, '2023-06-21 23:43:41'),
(103, 'realme C33 2023', 'ipad.webp', 290, 'sdf', 1, 1, '2023-06-21 23:49:21'),
(105, 'sadf', 'ipad.webp', 10999, 'sadf', 1, 0, '2023-06-21 23:56:06'),
(112, 'shirt', 'ipad.webp', 277, 'half shirt', 32, 1, '2023-06-22 23:17:38'),
(114, 'fsdfs', 'ipad.webp', 0, 'asfsaf', 32, 1, '2023-07-06 11:15:52'),
(115, 'asdgsg', 'ipad.webp', 0, 'zxcbb', 34, 0, '2023-07-06 11:29:21'),
(117, 'sdhd', 'ipad.webp', 5000, 'sdfgh', 34, 0, '2023-07-06 12:42:52'),
(118, 'asdf', 'ipad.webp', 0, 'sf', 36, 0, '2023-07-07 08:49:57'),
(119, 'tset ', 'ipad.webp', 1090, 'sadfa', 36, 0, '2023-07-07 08:50:12'),
(120, 'asdgsg', 'ipad.webp', 1, 'sdfsafgs', 32, 0, '2023-07-07 09:02:39'),
(121, 'sdfs', 'ipad.webp', 0, 'asdfsa', 38, 0, '2023-07-07 09:16:56'),
(122, 'asdf', 'ipad.webp', 0, 'asdf', 39, 0, '2023-07-07 09:29:38'),
(123, 'asdfsa', 'ipad.webp', 23, 'sdfsaf', 40, 1, '2023-07-07 09:44:11'),
(124, 'asdf', 'ipad.webp', 425, 'safds', 42, 1, '2023-07-07 09:52:07'),
(125, 'asdsa', 'ipad.webp', 0, 'asda', 43, 1, '2023-07-07 09:55:24'),
(126, 'MANGO', 'ipad.webp', 1200, 'LELELELE', 44, 1, '2023-07-07 10:01:33'),
(139, 'test poduct', '64c8b5a3c18344.60683912.jpg', 7999, 'test description', 32, 0, '2023-08-01 07:34:59'),
(140, 'sent fragrences', '64c8f77e5b08d3.29327729.jpg', 99990000, 'test descriptionggs', 1, 1, '2023-08-01 11:42:10'),
(141, 'sdf', '64c9ea5a63ac23.66776956.jpg', 34, 'FGHSD', 44, 1, '2023-08-02 05:32:10'),
(142, 'demo', '64c9fada547087.73500165.jpg', 333, 'wfsd', 44, 1, '2023-08-02 06:42:34'),
(143, 'veg', '64ca3c6b18d691.17376187.jpeg', 2342, 'weqw', 44, 1, '2023-08-02 11:22:19'),
(144, 'sdfa', '64ca46dc745027.93067130.jpg', 235, 'sdf', 46, 1, '2023-08-02 12:06:52'),
(145, 'asda', '64ca53813d87f2.83791633.jpg', 4234, 'ASD', 48, 1, '2023-08-02 13:00:49');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `image_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image_path` text NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`image_id`, `product_id`, `image_path`, `is_deleted`, `time_stamp`) VALUES
(22, 139, '64c8b5a3c37120.58308935.jpg', 0, '2023-08-01 07:34:59'),
(23, 139, '64c8b5a3c4f681.66183635.jpg', 0, '2023-08-01 07:34:59'),
(24, 139, '64c8b5a3c59b13.59783582.jpg', 0, '2023-08-01 07:34:59'),
(26, 139, '64c8b5a3c69875.22973962.jpg', 0, '2023-08-01 07:34:59'),
(34, 92, '64c8ecbf517674.05740128.jpg', 0, '2023-08-01 11:30:07'),
(35, 92, '64c8ecbf51eb67.41371421.jpg', 0, '2023-08-01 11:30:07'),
(43, 140, '64c8f77e5d97f0.70628108.jpg', 0, '2023-08-01 12:15:58'),
(44, 140, '64c8f7b83e1ca8.07852535.jpeg', 0, '2023-08-01 12:16:56'),
(45, 140, '64c8f7b83e9538.44055678.jpg', 0, '2023-08-01 12:16:56'),
(46, 141, '64c9ea5a64f3d8.09504165.jpg', 0, '2023-08-02 05:32:10'),
(47, 141, '64c9ea5a658282.34427387.jpg', 0, '2023-08-02 05:32:10'),
(48, 141, '64c9ea5a662478.00048232.jpg', 0, '2023-08-02 05:32:10'),
(49, 142, '64c9fada55a246.91637526.jpg', 0, '2023-08-02 06:42:34'),
(50, 143, '64ca3c6b1ae268.00159573.jpg', 0, '2023-08-02 11:22:19'),
(51, 143, '64ca3c6b1bc949.02727807.jpg', 0, '2023-08-02 11:22:19'),
(52, 143, '64ca3c6b1c63b2.82164265.jpg', 0, '2023-08-02 11:22:19'),
(53, 144, '64ca46dc751927.33986863.jpg', 0, '2023-08-02 12:06:52'),
(54, 145, '64ca53813e3da3.41830335.jpg', 0, '2023-08-02 13:00:49');

-- --------------------------------------------------------

--
-- Table structure for table `razorpay_record`
--

CREATE TABLE `razorpay_record` (
  `id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `razorpay_order_id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `razorpay_record`
--

INSERT INTO `razorpay_record` (`id`, `order_id`, `razorpay_order_id`, `user_id`, `product_id`, `datetime`, `is_deleted`, `timestamp`) VALUES
(23, '16882058926226f17d', 'order_M8Uufxnk5DR7Gl', 9, 101, '2023-07-01 15:34:52', 0, '2023-07-01 10:04:52'),
(24, '1688207793b4101fcc', 'order_M8VS9LG3lLVH9s', 9, 101, '2023-07-01 16:06:33', 0, '2023-07-01 10:36:33'),
(25, '1688207825821fbe7c', 'order_M8VSiRJFpfgBPe', 9, 101, '2023-07-01 16:07:06', 0, '2023-07-01 10:37:06'),
(26, '1688208467cb631848', 'order_M8Ve1JT2pvxAEf', 9, 101, '2023-07-01 16:17:48', 0, '2023-07-01 10:47:48'),
(27, '16882085093171a921', 'order_M8VekLviFUV9QH', 9, 101, '2023-07-01 16:18:29', 0, '2023-07-01 10:48:29'),
(28, '1688208596c100e217', 'order_M8VgIDCzhqXIWK', 9, 101, '2023-07-01 16:19:57', 0, '2023-07-01 10:49:57'),
(29, '1688209565acd740ff', 'order_M8VxLeJZBv2MOB', 9, 101, '2023-07-01 16:36:06', 0, '2023-07-01 11:06:06');

-- --------------------------------------------------------

--
-- Table structure for table `specifications`
--

CREATE TABLE `specifications` (
  `specification_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `value` text NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `specifications`
--

INSERT INTO `specifications` (`specification_id`, `product_id`, `name`, `value`, `is_deleted`, `timestamp`) VALUES
(25, 92, 'ramsd', ' 64 MBdsd', 0, '2023-06-21 19:35:42'),
(26, 92, 'romsd', '500 MBsd', 0, '2023-06-21 19:36:14'),
(35, 105, 'ss', 'dsg', 0, '2023-06-21 23:56:06'),
(36, 105, 'sdfg', 'dsfg', 0, '2023-06-21 23:56:06'),
(37, 105, 'asf', 'sf', 0, '2023-06-21 23:56:06'),
(47, 112, 'color', 'black', 0, '2023-06-22 23:17:38'),
(48, 112, 'size', '95 cm', 0, '2023-06-22 23:17:38'),
(49, 117, 'sdf', 'sdg', 0, '2023-07-06 12:42:52'),
(50, 117, 'sdf', 'sdfg', 0, '2023-07-06 12:42:52'),
(51, 118, 'asdf', 'asdf', 0, '2023-07-07 08:49:57'),
(52, 123, 'asdf', 'asdf', 0, '2023-07-07 09:44:11'),
(53, 126, 'AA', 'AA', 0, '2023-07-07 10:01:33'),
(76, 139, 'color', 'black', 0, '2023-08-01 07:34:59'),
(77, 139, 'size', '60cm', 0, '2023-08-01 07:34:59'),
(78, 139, 'texture', 'solid', 0, '2023-08-01 07:34:59'),
(79, 140, 'typefgas', 'deoasdf', 0, '2023-08-01 11:42:10'),
(80, 141, 'SDF', 'SDFG', 0, '2023-08-02 05:32:10'),
(81, 142, 'asd', 'sdf', 0, '2023-08-02 06:42:34'),
(82, 143, 'add', 'ASDA', 0, '2023-08-02 11:22:19');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `sub_category_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `category_id` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sub_category_id`, `name`, `category_id`, `is_deleted`, `timestamp`) VALUES
(1, 'smartphone', 2, 0, '2023-06-21 19:18:33'),
(9, 'tablets', 2, 1, '2023-06-21 23:29:18'),
(25, 'hgjk', 6, 0, '2023-06-22 22:14:55'),
(26, 'dfhdfhd', 6, 0, '2023-06-22 22:14:58'),
(30, 'key-pad', 2, 1, '2023-06-22 23:15:17'),
(32, 'asdf', 5, 0, '2023-06-22 23:16:57'),
(34, 'sdfag', 1, 1, '2023-07-06 11:28:59'),
(35, 'asdf', 33, 1, '2023-07-07 07:35:01'),
(36, 'test sub cat', 34, 0, '2023-07-07 08:49:34'),
(37, 'test sub cat', 34, 1, '2023-07-07 09:02:20'),
(38, 'asfdf', 35, 1, '2023-07-07 09:16:38'),
(39, 'asdf', 36, 1, '2023-07-07 09:29:26'),
(40, 'test sub cat', 37, 1, '2023-07-07 09:43:48'),
(41, 'test sub cat2', 37, 1, '2023-07-07 09:43:54'),
(42, 'asdf', 38, 1, '2023-07-07 09:51:56'),
(43, 'sads', 38, 1, '2023-07-07 09:55:10'),
(44, 'SUB-VEG', 48, 1, '2023-07-07 10:01:08'),
(45, 'asdf', 3, 1, '2023-08-02 12:06:12'),
(46, 'gggg', 5, 1, '2023-08-02 12:06:26'),
(47, 'demo', 3, 1, '2023-08-02 12:48:23'),
(48, 'asda', 51, 1, '2023-08-02 13:00:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `mobile`, `gender`, `password`, `user_type`, `is_deleted`, `timestamp`) VALUES
(1, 'durgesh kumar', 'durgesh@gmail.com', '7667107173', 'male', '12345', 'admin', 0, '2023-06-21 17:29:23'),
(9, 'vikash kumar', 'durgeshkumarraj62@gmail.com', '9508727678', 'male', '12345', 'customer', 0, '2023-06-23 17:27:25'),
(10, 'naveen', 'naveen@gmail.com', '6205925686', 'male', '12345', 'customer', 0, '2023-06-28 04:10:23'),
(15, 'Suraj', 'suraj.sinha@gmail.com', '9898120141', 'male', 'Suraj@1', 'customer', 0, '2023-08-12 11:24:31');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `wishlist_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`wishlist_id`, `user_id`, `product_id`, `is_deleted`, `timestamp`) VALUES
(196, 9, 103, 0, '2023-08-09 07:12:40'),
(198, 9, 140, 0, '2023-08-09 07:12:43'),
(201, 9, 144, 0, '2023-08-09 07:12:49'),
(232, 9, 118, 0, '2023-08-12 11:00:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `address_id` (`address_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_table_ibfk_1` (`sub_category_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `razorpay_record`
--
ALTER TABLE `razorpay_record`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `specifications`
--
ALTER TABLE `specifications`
  ADD PRIMARY KEY (`specification_id`),
  ADD KEY `product_specifications_table_ibfk_1` (`product_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`sub_category_id`),
  ADD KEY `sub_category_ibfk_1` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`wishlist_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `razorpay_record`
--
ALTER TABLE `razorpay_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `specifications`
--
ALTER TABLE `specifications`
  MODIFY `specification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `sub_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `wishlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`address_id`) REFERENCES `address` (`address_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_category` (`sub_category_id`);

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `razorpay_record`
--
ALTER TABLE `razorpay_record`
  ADD CONSTRAINT `razorpay_record_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `razorpay_record_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `specifications`
--
ALTER TABLE `specifications`
  ADD CONSTRAINT `specifications_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `sub_category_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `wishlists_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
