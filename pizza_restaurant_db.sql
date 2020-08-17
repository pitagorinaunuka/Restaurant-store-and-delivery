-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2019 at 04:01 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizza_restaurant_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `foodcategories`
--

CREATE TABLE `foodcategories` (
  `id` int(100) NOT NULL,
  `category` varchar(100) COLLATE latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `foodcategories`
--

INSERT INTO `foodcategories` (`id`, `category`) VALUES
(10, 'Pizza'),
(11, 'Hamburger'),
(12, 'Salad'),
(15, 'Pancake'),
(16, 'Dessert'),
(17, 'Shake');

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `id` int(100) NOT NULL,
  `food` varchar(100) COLLATE latin1_general_cs NOT NULL,
  `category` int(100) NOT NULL,
  `price` varchar(100) COLLATE latin1_general_cs NOT NULL,
  `description` varchar(200) COLLATE latin1_general_cs NOT NULL,
  `image` varchar(1000) COLLATE latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`id`, `food`, `category`, `price`, `description`, `image`) VALUES
(17, 'With fries', 11, '2.00', 'Sa pomfritom', 'burger-3-1559955986.jpg'),
(18, 'Cheeseburger', 11, '3.00', 'Cheeseburger', 'burger-1-1559956004.jpg'),
(19, 'With beef', 11, '3.50', 'With beef.', 'burger-2-1559956019.jpg'),
(20, 'Mixed Salad', 12, '4.00', 'Mixed romaine and iceberg lettuce, cherry tomatoes, cucumber, onion and grated carrots', 'salad-3-1559956085.jpg'),
(21, 'Chicken Salad', 12, '9.00', 'Crisp romaine lettuce, garlic croutons, Caesar dressing and shaved parmesan cheese with grilled chicken', 'salad-1-1559956107.jpg'),
(22, 'Mozarella Salad', 12, '6.00', 'Lettuce, cherry tomatoes, mozarella, onion, grated carrots and croutons withchoice of dressing', 'salad-2-1559956125.jpg'),
(23, 'Tuna Salad', 12, '7.00', 'Fine fish meat piled high on house \"Galija\" salad with tomatoes and croutons withchoice of dressing', 'salad-4-1559956144.jpg'),
(24, 'Vegeteriana', 10, '4.00', 'Mushrooms, sweetcorn, onions, peppers, olives, garlic, tomato, mozzarella and basil', 'pizza-1-1559956286.jpg'),
(25, 'Monte Carlo', 10, '6.00', 'Goats cheese, sun blushed tomato, balsamic onions and fresh roquette', 'pizza-2-1559956307.jpg'),
(26, 'Four seasons', 10, '6.00', 'Prawns, smoked chicken, chorizo, peas, mozzarella, barbecue sauce and paprika', 'pizza-3-1559956328.jpg'),
(27, 'Capriciossa', 10, '7.00', 'Chicken, roasted peppers, mozzarella, barbecue sauce and chopped parsley', 'pizza-4-1559956353.jpg'),
(28, 'Galija', 10, '7.00', 'Chicken, roasted peppers, mozzarella, barbecue sauce and chopped parsley', 'pizza-5-1559956374.jpg'),
(29, 'Margherita', 10, '5.00', 'Tomato, mozzarella and oregano', 'pizza-6-1559956393.jpg'),
(30, 'Chocolate with Hazelnuts & Cream', 15, '5.00', 'Chocolate syrup-swirled pancakes witt nuts over or just the right touch of sweetness', 'pancakes-1-1559958428.jpg'),
(31, 'Marmalade Sauce & Fruit ', 15, '5.00', 'Sink your teeth into blueberry-filled pancakes with the fruit syrup of your favourite choice', 'pancakes-2.jpg'),
(32, 'Fruit & Whipped Cream', 15, '5.50', 'Pancakes with chunks of fruit topped with peanut butter or caramel syrup on top with cream of choice', 'pancakes-4.jpg'),
(33, 'House Pancakes\"Galija\"', 15, '6.00', 'Our version of a classic dessert turned favorite. You\'ll go nuts over these rich and flavorful pancakes', 'pancakes-3.jpg'),
(35, 'Chocolate & Cream Cup', 16, '4.00', 'Three layers of chocolate sponge filled with chocolate mousse, covered in chocolate buttercream', 'dessert-1-1559958612.jpg'),
(36, 'Scoop of Ice Cream', 16, '1.50', 'Mocha, Strawberry, Lemon. Gluten free chocolate with Vanilla or other flavour upon request', 'dessert-2-1559958635.jpg'),
(37, 'Sweet Gondola Muffin', 16, '4.00', 'Muffin tossed with a little bit of sugar and splash of lemon topped in chocolate mousse with fruit of choice', 'dessert-4-1559958653.jpg'),
(39, 'Chocolate Shake', 17, '4.00', 'Chocolate shake with brownies, hot fudge, and chocolate chips, topped with whipped cream', 'shake-1-1559958741.jpg'),
(40, 'Strawberry Shake', 17, '5.50', 'Strawberry shake with hot fudge and chocolate chips, topped with whipped cream', 'shake-2-1559958762.jpg'),
(41, 'Raspberry Shake', 17, '5.50', 'Vanilla shake with hot fudge and raspberry syrup, topped with whipped cream  and a raspberry truffle', 'shake-4-1559958782.jpg'),
(42, 'Fruit & Caramel Shake', 17, '6.00', 'Fruit shake made with cold brew coffee and caramel, topped with whipped cream', 'shake-3-1559958804.jpg'),
(43, 'Fried Banana with Cream', 16, '5.00', 'Fresh banana with caramelized sugar topped with fresh berries and cream of choice', 'dessert-3-1559958874.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) COLLATE latin1_general_cs NOT NULL,
  `last_name` varchar(100) COLLATE latin1_general_cs NOT NULL,
  `email` varchar(100) COLLATE latin1_general_cs NOT NULL,
  `message` varchar(2000) COLLATE latin1_general_cs NOT NULL,
  `dateTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `first_name`, `last_name`, `email`, `message`, `dateTime`) VALUES
(7, 'test', 'test', 'test', 'test', '2019-06-08 01:43:46'),
(8, 'test', 'test', 'admin@admin.com', 'test', '2019-06-08 04:00:46');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `food` int(100) NOT NULL,
  `first_name` varchar(100) COLLATE latin1_general_cs NOT NULL,
  `last_name` varchar(100) COLLATE latin1_general_cs NOT NULL,
  `city` varchar(100) COLLATE latin1_general_cs NOT NULL,
  `address` varchar(100) COLLATE latin1_general_cs NOT NULL,
  `telephone` varchar(100) COLLATE latin1_general_cs NOT NULL,
  `dateTime` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `quantity` int(10) NOT NULL DEFAULT '1',
  `processed` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `food`, `first_name`, `last_name`, `city`, `address`, `telephone`, `dateTime`, `quantity`, `processed`) VALUES
(9, 39, 'John', 'Doe', 'Washington', 'Penn 1600', '555555555', '2019-06-08 03:55:16.215121', 2, 0),
(10, 20, 'test', 'test', 'test', 'test', '696969', '2019-06-08 03:55:42.575817', 1, 0),
(11, 20, 'test', 'test', 'test', 'testsetsetestest', '3213213213123213', '2019-06-08 03:56:50.253298', 2, 0),
(12, 21, 'test', 'test', 'test', 'test', '1337', '2019-06-08 03:59:20.912517', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(11) NOT NULL,
  `email` varchar(100) COLLATE latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `email`) VALUES
(2, 'email@email.com'),
(3, 'test@test.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) COLLATE latin1_general_cs NOT NULL,
  `first_name` varchar(100) COLLATE latin1_general_cs NOT NULL,
  `last_name` varchar(100) COLLATE latin1_general_cs NOT NULL,
  `password` varchar(100) COLLATE latin1_general_cs NOT NULL,
  `role` varchar(100) COLLATE latin1_general_cs NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `first_name`, `last_name`, `password`, `role`) VALUES
(1, 'admin@admin.com', 'John', 'Doe', '$2y$10$35.naaYMKbW3XOp6grjJ4..x2CYrCGgmt/hTR2XDRk.aLq2Gu/znC', 'administrator'),
(11, 'test@test.com', 'name', 'lastname', '$2y$10$UKIiSt8C/lZ3Via5Tg7kX.1ldgD1R1XUyxB3W4KobIAO83hCxzNqC', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `foodcategories`
--
ALTER TABLE `foodcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `food` (`food`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `foodcategories`
--
ALTER TABLE `foodcategories`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `foods`
--
ALTER TABLE `foods`
  ADD CONSTRAINT `foods_ibfk_1` FOREIGN KEY (`category`) REFERENCES `foodcategories` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`food`) REFERENCES `foods` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
