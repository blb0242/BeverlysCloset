-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 10, 2018 at 11:31 PM
-- Server version: 5.6.35
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `BBandThings`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `email` text NOT NULL,
  `password` varchar(25) NOT NULL,
  `profile_pic` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `first_name`, `last_name`, `email`, `password`, `profile_pic`) VALUES
(1, 'Byron', 'Brown', 'lilbbrown32@gmail.com', 'bbrown32', 'images/profile-images/Big1.jpg'),
(3, 'Byron', 'Brown', 'blb0242@unt.edu', 'bbrown32', ''),
(4, 'Beverly', 'Mitchell', 'faithhope57@att.net', 'dancinggirl77', 'images/profile-images/auntbevprofilepic.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(250) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Baskets'),
(2, 'Purses'),
(3, 'Custom');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `trx_id` varchar(255) NOT NULL,
  `p_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` text NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` varchar(200) NOT NULL,
  `product_keywords` text NOT NULL,
  `stripe_id` varchar(255) NOT NULL,
  `stripe_sku` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`, `stripe_id`, `stripe_sku`) VALUES
(108, 2, 'Whites beautiful ', '8000', 'White denim and lanes lanes this white', '../uploads/product_images/E89EE52C-2294-4D35-9A0B-CC6740B24128.jpeg', '', 'prod_DO9UJ5jMB6FXg7', 'sku_DO9U495LaP6zmz'),
(112, 2, 'Black Friday ', '5500', 'Black denim ', '../uploads/product_images/6EF6559E-AC94-46A6-8DEA-2742E066A0D2.jpeg', '', 'prod_DO9fvZ8MyhOrh4', 'sku_DO9fQvdfpXKL0A'),
(114, 2, 'Red blue purse ', '5500', 'Blue denim with red belt/bling decorations ', '../uploads/product_images/96B0C850-EBF1-4BF9-A43C-F4C320E3B6DA.jpeg', '', 'prod_DOAG6OLGMqsK0N', 'sku_DOAG6WCsxGlMzd'),
(126, 2, 'Blue denim ', '5500', 'Beautiful denim ', '../uploads/product_images/3306D39A-0072-4778-909C-621651E82E1C.jpeg', '', 'prod_DOBxvhodDhNVeb', 'sku_DOBxujYwxeKm3P'),
(127, 2, 'White cloud', '5500', 'White and silver denim purse ', '../uploads/product_images/C5D30C8F-DCBE-4921-9C6A-AD441EF1E836.jpeg', '', 'prod_DOCPYiSuQAczyE', 'sku_DOCPHp3XKvZZ3i'),
(128, 2, 'Real red', '5500', 'Red and silver denim purse beautifully decorated ', '../uploads/product_images/2F897D56-78F0-4A0E-9B55-37E949E87095.jpeg', '', 'prod_DOCTJxcAhtgCpU', 'sku_DOCTYMH0KzE4FP'),
(129, 1, 'fv', '2200', 'cvs', '../uploads/product_images/3DDE8E34-5E6F-4ACC-9D4C-B2195B543D2E.jpeg', '', 'prod_DOUxNh9beh9YsN', 'sku_DOUx2afxENNidA');

-- --------------------------------------------------------

--
-- Table structure for table `stripe_orders`
--

CREATE TABLE `stripe_orders` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `card_num` bigint(20) NOT NULL,
  `card_cvc` int(5) NOT NULL,
  `card_exp_month` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `card_exp_year` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `item_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item_number` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `item_price` float(10,2) NOT NULL,
  `item_price_currency` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'usd',
  `paid_amount` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `paid_amount_currency` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `txn_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stripe_orders`
--

INSERT INTO `stripe_orders` (`id`, `name`, `email`, `card_num`, `card_cvc`, `card_exp_month`, `card_exp_year`, `item_name`, `item_number`, `item_price`, `item_price_currency`, `paid_amount`, `paid_amount_currency`, `txn_id`, `payment_status`, `created`, `modified`) VALUES
(1, 'Byron Brown', 'blb0242@unt.edu', 4242424242424242, 123, '09', '2023', 'Premium Script CodexWorld', 'PS123456', 55.00, 'usd', '55', 'usd', 'txn_1CewvaLThQR9g0sV7Y2nZhlz', 'succeeded', '2018-06-20 05:24:14', '2018-06-20 05:24:14'),
(2, 'Byron Brown', 'blb0242@unt.edu', 4242424242424242, 231, '01', '2021', 'Beverlys Basket #1', 'PS12345', 5500.00, 'usd', '5500', 'usd', 'txn_1CfBb9LThQR9g0sVRTn96Qh7', 'succeeded', '2018-06-20 21:04:07', '2018-06-20 21:04:07'),
(3, 'Byron Brown', 'blb0242@unt.edu', 4242424242424242, 231, '01', '2021', 'Beverly\'s Basket #1', 'PS12345', 5500.00, 'usd', '5500', 'usd', 'txn_1CfBb9LThQR9g0sVRTn96Qh7', 'succeeded', '2018-06-20 21:04:07', '2018-06-20 21:04:07'),
(4, 'Byron Brown', 'blb0242@unt.edu', 4242424242424242, 445, '10', '2021', 'Beverly\'s Basket #1', 'PS12345', 5500.00, 'usd', '5500', 'usd', 'txn_1CfBg0LThQR9g0sV6jlCtPa1', 'succeeded', '2018-06-20 21:09:09', '2018-06-20 21:09:09');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address1` varchar(300) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(4) NOT NULL,
  `country` varchar(25) NOT NULL,
  `zip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `city`, `state`, `country`, `zip`) VALUES
(8, 'Byron', 'Brown', 'blb0242@unt.edu', 'bbrown32', '4693283493', '2700 Colorado Blvd.', '', '', '', 0),
(9, 'Byron', 'Brown', '123@abc.com', '202cb962ac59075b964b07152d234b70', '4693283493', '9236 Church Rd.', 'Dallas', '', 'United States', 75231),
(10, 'Byron', 'Brown', 'abc@123.com', '900150983cd24fb0d6963f7d28e17f72', '4693283493', '7718 Kaywood Dr.', 'Dallas', 'TX', 'United States', 75209),
(11, 'Byron', 'Brown', 'lilbbrown32@gmail.com', '1164ac831819e40a96dbeb28b525bcb3', '4693283493', '7718 Kaywood Dr.', 'Dallas', 'TX', 'United States', 75209),
(12, 'Byron', 'Brown', 'b@b.com', '1164ac831819e40a96dbeb28b525bcb3', '4693283493', '9236 Church Rd.', 'Dallas', 'TX', 'United States', 75231),
(14, 'Beverly', 'Mitchell', 'faithhope57@att.net', '49527d6352585321e4c440551ee5cce3', '5624814883', '2601 E Victoria', 'Rancho Dominquez', 'TX', 'United States', 90220),
(15, 'Chayce', 'Tisdale', 'tizckt@gmail.com', '079452c13c51c434f01e6e73fe21bf98', '2149261162', '2801 Shoreline Drive ', 'Denton', 'TX', 'United States', 76210),
(16, 'BYRON', 'BROWN', 'bb@b.com', '1164ac831819e40a96dbeb28b525bcb3', '4692383493', '7718 Kaywood Drive', 'Dallas', 'TX', 'United States', 75209);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

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
-- Indexes for table `stripe_orders`
--
ALTER TABLE `stripe_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;
--
-- AUTO_INCREMENT for table `stripe_orders`
--
ALTER TABLE `stripe_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;