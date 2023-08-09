-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2023 at 04:13 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hackman`
--

-- --------------------------------------------------------

--
-- Table structure for table `_admins`
--

CREATE TABLE `_admins` (
  `id` int(11) NOT NULL,
  `username` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(256) COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(256) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `_admins`
--

INSERT INTO `_admins` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', 'admin', 'sahilshowkat675@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `_cart`
--

CREATE TABLE `_cart` (
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `_cart`
--

INSERT INTO `_cart` (`item_id`, `user_id`, `product_id`) VALUES
(20, 0, 2),
(21, 0, 1),
(33, 8, 1),
(35, 8, 14),
(36, 8, 16),
(40, 7, 14);

-- --------------------------------------------------------

--
-- Table structure for table `_customers`
--

CREATE TABLE `_customers` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(256) COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `mobile` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `address` varchar(256) COLLATE utf8mb4_bin NOT NULL,
  `zip` int(11) NOT NULL,
  `created_on` varchar(128) COLLATE utf8mb4_bin NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `_customers`
--

INSERT INTO `_customers` (`customer_id`, `name`, `password`, `email`, `mobile`, `address`, `zip`, `created_on`) VALUES
(1, 'sahil', '1006f0ae5a7ece19828a67ac62288e05', 's@g.com', '96229050551', '', 0, '2023-06-24 15:31:43'),
(5, 'Alpha Coder', 'dc4f69afa57999393ff0988bbdff1181', '193201', '9622905051', '', 0, '2023-06-24 23:47:14'),
(6, 'Kartik S', 'c8d39cdb56a46ad807969ee04c4e660b', '193201', '9535334182', '', 0, '2023-06-24 23:54:44'),
(7, 'Sahil Parray', '1006f0ae5a7ece19828a67ac62288e05', 's4hilp4rr4y@gmail.com', '9622905051', '', 0, '2023-06-25 00:04:10'),
(8, 'kar', 'aa8ae3b340c34010e4500a0d6294dc2c', 'kar@gmail.in', '9535334182', 'banashanakari', 5600082, '2023-06-25 03:20:39');

-- --------------------------------------------------------

--
-- Table structure for table `_orders`
--

CREATE TABLE `_orders` (
  `order_id` int(11) NOT NULL,
  `product_id` int(32) NOT NULL,
  `user_id` int(32) NOT NULL,
  `timestamp` varchar(128) COLLATE utf8mb4_bin NOT NULL DEFAULT current_timestamp(),
  `status` varchar(48) COLLATE utf8mb4_bin NOT NULL DEFAULT 'Ordered',
  `paytm_order_id` varchar(32) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `_orders`
--

INSERT INTO `_orders` (`order_id`, `product_id`, `user_id`, `timestamp`, `status`, `paytm_order_id`) VALUES
(2, 1, 100, 'current_timestamp()', 'Delivered', ''),
(3, 2, 101, 'current_timestamp()', 'Delivered', '');

-- --------------------------------------------------------

--
-- Table structure for table `_products`
--

CREATE TABLE `_products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `details` varchar(512) COLLATE utf8mb4_bin NOT NULL,
  `catagory` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `price` int(11) NOT NULL,
  `img` varchar(256) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `_products`
--

INSERT INTO `_products` (`product_id`, `name`, `details`, `catagory`, `price`, `img`) VALUES
(1, 'The Hell', 'Abstract painting prioritizes color, shape, line, and form to express emotions, ideas, or concepts, instead of portraying identifiable objects, fostering a deeper level of interpretation.', 'Abstract', 5, 'f1.jpg'),
(2, 'Silver Linings', 'Oil painting, a conventional art form, employs oil-based pigments to produce artworks featuring vivid colors, depth, and texture, resulting in visually captivating compositions.', 'Oil', 2, 'f2.jpg'),
(3, 'The Hall Of Fame', 'Utilizing acrylic polymer emulsion as its medium, acrylic painting is a versatile art form that offers flexibility and allows for a wide range of artistic expression using pigment mixtures.', 'Acrylic', 3, 'f3.jpg'),
(13, 'The Mess', 'Madonna has features of famous contemporary beauty Simonetta Vespucci. Before World War II owned by the Ingenheim family of Reisewitz (Rysiewice); deposited in 1939 in the Museum in Breslau (Wrocław). Intercepted after the war by the Polish Communist authorities as a war reparation for paintings destroyed during the German Occupation', 'Oil', 2, 'f4.jpg'),
(14, 'The Drip', 'An opulent procession of beautiful women and girls carrying colorful flowers and wearing floral wreaths descends the stairs of a classical marble structure. ', 'Water', 1, 'f5.jpg'),
(15, 'Apocalypse', 'The illusion of detail combats this problem. It involves distilling all the “noise” and information down into the most basic elements, then painting those elements. It’s about getting more done with less. The Russian Impressionists do it well. I’m always amazed at how much information they can convey with a single stroke of their brush.', 'Arcylic', 2, 'f6_768x768.jpg'),
(16, 'The Detail', 'It’s amazing how all the pieces fall into place when you put the right colors in the right spots (I think Richard Schmid said something along these lines in one of his demonstrations). This alone can make it appear like there’s more going on than what’s actually there. The imagination ends up doing much of the work for you.', 'Abstract', 2, 'f8_768x768.jpg'),
(17, 'Gone Girl', 'Sir Arthur Streeton also comes to mind. His work is relaxed and effortless as if he painted without a single hesitation. Yet it’s realistic. It puts you right there in the dry Australian landscape. It all comes down to his remarkable use of the fundamentals-value, color, line, and shape. This allowed him to be more relaxed with his brushwork and detail.', 'Arcylic', 1, 'f8_768x768.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `_transactions`
--

CREATE TABLE `_transactions` (
  `id` int(11) NOT NULL,
  `txn_id` varchar(11) COLLATE utf8mb4_bin NOT NULL,
  `user_id` varchar(11) COLLATE utf8mb4_bin NOT NULL,
  `order_id` varchar(11) COLLATE utf8mb4_bin NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `_transactions`
--

INSERT INTO `_transactions` (`id`, `txn_id`, `user_id`, `order_id`, `amount`) VALUES
(1, '001', '11', '120', 700),
(2, '002', '12', '121', 800);

-- --------------------------------------------------------

--
-- Table structure for table `_users`
--

CREATE TABLE `_users` (
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(256) COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `_users`
--

INSERT INTO `_users` (`id`, `name`, `password`, `email`) VALUES
(1, 'sahil', 'p', 's@g.com'),
(2, 'admin', 'pp', 's@g.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `_admins`
--
ALTER TABLE `_admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `_cart`
--
ALTER TABLE `_cart`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `_customers`
--
ALTER TABLE `_customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `_orders`
--
ALTER TABLE `_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `_products`
--
ALTER TABLE `_products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `_transactions`
--
ALTER TABLE `_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `_users`
--
ALTER TABLE `_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `_admins`
--
ALTER TABLE `_admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `_cart`
--
ALTER TABLE `_cart`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `_customers`
--
ALTER TABLE `_customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `_orders`
--
ALTER TABLE `_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `_products`
--
ALTER TABLE `_products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `_transactions`
--
ALTER TABLE `_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `_users`
--
ALTER TABLE `_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
