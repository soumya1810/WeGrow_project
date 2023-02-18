-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2023 at 09:52 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wegrow`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(1, 'General Store'),
(2, 'Electronic Store'),
(3, 'Tuition and Coaching'),
(4, 'Home Services'),
(5, 'Grocery Stores'),
(6, 'Restaurants and cafes'),
(7, 'Automobiles'),
(8, 'Real Estate'),
(9, 'Beauty and Salon'),
(10, 'Event Management'),
(11, 'Clothing and Footwear'),
(12, 'Doctors and Clinics'),
(13, 'Pharmacy'),
(14, 'Automobiles'),
(15, 'Hostels and Hotels'),
(16, 'Pet Care'),
(17, 'Home renovation'),
(18, 'Stationary and Books'),
(19, 'Daily needs'),
(20, 'Kids and Babies'),
(21, 'Health and Fitness'),
(22, 'Sports'),
(23, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `ip`
--

CREATE TABLE `ip` (
  `id` int(10) NOT NULL,
  `shopname` varchar(255) NOT NULL,
  `domain` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `links` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `discount` text NOT NULL,
  `intro_file` text NOT NULL,
  `files` text NOT NULL,
  `hiring_msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ip`
--

INSERT INTO `ip` (`id`, `shopname`, `domain`, `address`, `phone`, `email`, `links`, `city`, `state`, `description`, `discount`, `intro_file`, `files`, `hiring_msg`) VALUES
(1, 'Electronic Market', 'Electronic Store', 'G-645, New Ashok Nagar', '92749879871', 'e.market@gmail.com', 'http://em.in', 'Delhi', 'Delhi', 'This a new electronic store with a wide range of electronic items.', 'Inaugural Offer : 10% off on all products', 'e1.jpg', 'e2.jpg', 'We are in urgent need of helpers for the store. The minimum Qualification required is 10th class pass.'),
(6, 'Home Buddy', 'Grocery Stores', 'A85, Delhi', '937876387829', 'hb@gmail.com', 'http://homebuddy.in', 'Delhi', 'Delhi', 'This is a grocery store.', '10% off', 'e1.jpg', 'e2.jpg', 'We are hiring'),
(9, 'Om Electricals', 'Electronic Store', 'B-65, Sector-4, Vaishali', '742898789', 'om.elec@gmail.com', 'http://om_electricals.in', 'Ghaziabad', 'Uttar Pradesh', 'This is a new electrical shop in vaishali. We have a huge range of electrical products to cater your needs.', 'Inaugural Offer of 5% on all all products', 'e1.jpg', 'e2.jpg', 'We are in urgent need of shop helpers. Minimum qualification required is 10th pass'),
(10, 'nhvcdhbnki', 'Others', 'efwffnkncvkn', '86868776878', 'nvkdnfvkn@gmail.com', 'http://em.in', 'Ghaziabad', 'Uttar Pradesh', 'ncnjsdkncisnin', 'ncidicwiehiu', 'e2.jpg', 'user1.jpg', 'ndknskdniwneiju'),
(12, 'abcd', 'Pharmacy', 'A-85, Vasundhara, Ghaziabad', '2761782779179', 'abcd123@gmail.com', 'http://abcd.in', 'Ghaziabad', 'Uttar Pradesh', 'ndijnhwwiedojweoijpowokjpjrwopjorjfwejiorhidhneinwiufdn', 'ndckjwewndnwkndkuwenidhnijewnkjn', '3076836.jpg', 'download.jpg', 'ndkdnjedknweknjdkjwjnk kdknwedkniwhe'),
(13, 'bckbdjbjb', 'Beauty and Salon', 'nckenwnj', '67576646', 'coolhut@gmail.com', 'http://mycoolhut.com', 'cswde', 'Jharkhand', 'ncksndjcbewbjb', 'nkfewibfjbjbenk', 'b4.png', 'b5.png', 'ncjkwnekbfkjhwiu fjbwejhfiuh');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `shopname` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`shopname`, `ip_address`) VALUES
('abcd', '::1'),
('Electronic Market', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE `owners` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `aadhar_id` varchar(50) NOT NULL,
  `regno` varchar(50) NOT NULL,
  `shopname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `create_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `owners`
--

INSERT INTO `owners` (`id`, `name`, `phone`, `aadhar_id`, `regno`, `shopname`, `email`, `password`, `create_datetime`) VALUES
(1, 'Rakesh Singh', '9378723871', 'xxxxxxx2345', '12345678910', 'Cool Hut', 'rakesh@gmail.com', '67a05e3822ce48a6386746388e6c81f5', '2023-01-30 07:49:40'),
(2, 'Deepak Sharma', '9232313122', 'xxxxxxx1345', '948839281', 'Home Buddy', 'hb@gmail.com', '498b5924adc469aa7b660f457e0fc7e5', '2023-01-30 07:59:22'),
(3, 'Manoj Sharma', '9832123110', 'xxxxxxx4367', '948839281', 'Electronic Market', 'member18@gmail.com', '5e81f9859d223ea420aca993c647b839', '2023-01-30 08:41:58'),
(4, 'Manoj Sharma', '9378723871', 'xxxxxxx4367', '19BCE10159', 'Electronic Market', 'member18@gmail.com', '3dc1e4c3bc5b2ae63520627ea44df7fd', '2023-01-30 08:43:39'),
(5, 'Manoj Sharma', '9378723871', 'xxxxxxx4367', '19BCE10159', 'Electronic Market', 'member18@gmail.com', '3dc1e4c3bc5b2ae63520627ea44df7fd', '2023-01-30 08:54:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `ip`
--
ALTER TABLE `ip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD KEY `shopname` (`shopname`) USING BTREE;

--
-- Indexes for table `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `ip`
--
ALTER TABLE `ip`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `owners`
--
ALTER TABLE `owners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
