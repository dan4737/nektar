-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 09, 2020 at 01:49 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nectar`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(11) NOT NULL,
  `ip_add` varchar(50) NOT NULL,
  `c_id` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Insert data for Categories
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(12, 'Combo Burgers'),
(13, 'Burgers'),
(14, 'Combo Wings'),
(15, 'Wings'),
(16, 'Combo Wraps'),
(17, 'Wraps'),
(18, 'Hot Dogs'),
(19, 'Fries'),
(20, 'Drinks');

--
-- Insert data for brands
--

INSERT INTO `brands` (`brand_id`, `brand_name`) VALUES
(6, 'Nectar');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_pass` varchar(150) NOT NULL,
  `customer_country` varchar(30) NOT NULL,
  `customer_city` varchar(30) NOT NULL,
  `customer_contact` varchar(15) NOT NULL,
  `customer_image` varchar(100) DEFAULT NULL,
  `user_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_email`, `customer_contact`, `customer_pass`, `user_role`) VALUES
(31, 'Administrator', 'admin@gmail.com', 591860712, '$2y$10$E3aMYna/piAEg.XOar6JO.gEs5xQq4PvcrH8MJCNpm2lOiqZFyeyK', 0);

-- --------------------------------------------------------


-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `order_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_id` int(11) NOT NULL,
  `amt` double NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `currency` text NOT NULL,
  `payment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_cat` int(11) NOT NULL,
  `product_brand` int(11) NOT NULL,
  `product_title` varchar(200) NOT NULL,
  `product_price` double NOT NULL,
  `product_desc` varchar(500) DEFAULT NULL,
  `product_image` varchar(100) DEFAULT NULL,
  `product_keywords` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`) VALUES
(11, 12, 'Chicken Burger + Waffle Fries', 40, '(cheese, Tomato, eggs, Salad, onions, spicy)', '../img/combo-wrap.jpg', 'combo'),
(12, 12, 'Beef Burger + Waffle Fries', 45, '(cheese, Tomato, eggs, Salad, onions, spicy)', '../img/combo-wrap.jpg', 'combo'),
(13, 16, 'Beef wrap + Waffle Fries', 45, '(cheese, Tomato, eggs, Salad, onions)', '../img/combo-wrap.jpg', 'combo'),
(14, 16, 'Chicken wrap + Waffle Fries', 35, '(cheese, Tomato, eggs, Salad, onions)', '../img/combo-wrap.jpg', 'combo'),
(15, 14, 'Regular wings + Waffle Fries', 30, '(5pcs, regular waffle fries)', '../img/wings1.jpg', 'combo'),
(16, 14, 'BBG wings + Waffle Fries', 35, '(4pcs, bbq galze, regular waffle, fries)', '../img/wings3.jpg', 'combo'),
(17, 14, 'Chilli Coated wings + Waffle Fries', 35, '(4pcs, green chilli, regualr waffle)', '../img/wings2.jpg', 'combo'),
(18, 17, 'Beef wrap', 35, 'A beef wrap', '../img/wrap1.jpg', 'wrap'),
(19, 17, 'Chicken wrap', 30, 'A chicken wrap', '../img/wings2.jpg', 'wrap'),
(20, 19, 'Regular Waffle Fries', 15, 'Regular Waffle Fries.', '../img/fries.jpg', 'fries'),
(21, 19, 'Loaded Waffle Fries', 40, 'Waffle fries loaded', '../img/fries.jpg', 'fries'),
(22, 18, 'Hotdog', 15, 'A hotdog', '../img/hotdog1.jpeg', 'hotdog'),
(23, 18, 'Loaded Hotdog', 20, 'A loaded Hotdog', '../img/hotdog2.jpg', 'hotdog'),
(24, 20, 'Pineapple Juice', 15, 'Juice made from pineapple', '../img/juice.jpeg', 'juice'),
(25, 20, 'Watermelon Juice', 15, 'Juice made from watermelon ', '../img/juice.jpeg', 'juice'),
(26, 20, 'Strawberry Milkshake', 22, 'Milkshake made from strawberry', '../img/juice.jpeg', 'milkshake'),
(27, 20, 'Vanilla Milkshake', 22, 'A milkshake made from vanilla', '../img/juice.jpeg', 'milkshake'),
(28, 20, 'Oreo Milkshake', 25, 'A milkshake mixed with oreos ', '../img/juice.jpeg', 'milkshake'),
(29, 20, 'Biscoff Milkshake', 25, 'A milkshake made from biscoff.', '../img/juice.jpeg', 'milkshake'),
(30, 13, 'Spicy Chicken Burger', 30, '(cheese, Tomato, eggs, Salad, onions, spicy)', '../img/donouts.jpg', 'burger'),
(31, 13, 'Spicy Beef Burger', 35, '(cheese, Tomato, eggs, Salad, onions, spicy)', '../img/donouts.jpg', 'burger'),
(32, 13, 'Regular Chicken Burger', 30, '(cheese, Tomato, eggs, Salad, onions)', '../img/donouts.jpg', 'burger'),
(33, 13, 'Regular Beef Burger', 35, '(cheese, Tomato, eggs, Salad, onions)', '../img/donouts.jpg', 'burger');

--
-- Indexes for dumped tables
--

ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD KEY `p_id` (`p_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `customer_email` (`customer_email`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_cat` (`product_cat`),
  ADD KEY `product_brand` (`product_brand`);

--
-- AUTO_INCREMENT for dumped tables
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`c_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`product_cat`) REFERENCES `categories` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
