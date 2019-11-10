-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2018 at 07:46 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogci`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`, `created_at`) VALUES
(1, 'Business', '2018-08-16 05:36:34'),
(2, 'Technology', '2018-08-16 05:36:34'),
(3, 'Romantic', '2018-08-17 15:37:49'),
(4, 'Poem', '2018-08-19 05:49:21'),
(5, 'Teaching', '2018-08-29 14:40:48');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `username`, `email`, `comment`, `created_at`) VALUES
(1, 22, 'Shadab', 'shadab@gmail.com', 'Nice Boy!!', '2018-08-19 14:26:23'),
(2, 22, 'Shahrukh Khan', 'srk@gmail.com', 'Wow! You are more hadsome than myself!! Love you!', '2018-08-19 15:11:03');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `post_image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `published` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `cat_id`, `user_id`, `title`, `slug`, `body`, `post_image`, `created_at`, `updated_at`, `published`) VALUES
(20, 2, 1, 'Test', 'Test', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n', 'no_image.jpg', '2018-08-28 05:15:48', '0000-00-00 00:00:00', 1),
(22, 2, 3, 'Shadab', 'Shadab', '<p>He is a great computer scientist!!</p>\r\n', 'shadab.jpg', '2018-08-28 05:15:54', '0000-00-00 00:00:00', 1),
(23, 1, 3, 'Test', 'Test', '<p>Habijabi test...</p>\r\n', 'no_image.jpg', '2018-08-28 05:15:56', '0000-00-00 00:00:00', 1),
(24, 4, 1, 'Bangladesh', 'Bangladesh', '<p>This is my bangladesh! I hate my country&#39;s people :D</p>\r\n', 'no_image.jpg', '2018-08-28 05:16:00', '0000-00-00 00:00:00', 1),
(25, 3, 2, 'Hot Wheels', 'Hot-Wheels', '<p>Hello I love hot wheels very much! Because I am track racer!!&nbsp;</p>\r\n', 'hotwheels.jpg', '2018-08-28 05:16:03', '0000-00-00 00:00:00', 1),
(26, 1, 2, 'Great post!', 'Great-post', '<p>What the fox says? The fox says - Let it go!!</p>\r\n', 'no_image.jpg', '2018-08-28 05:16:09', '0000-00-00 00:00:00', 1),
(27, 1, 2, 'Chintoo Candy', 'Chintoo-Candy', '<p>I love chin2 candy!</p>\r\n', 'no_image.jpg', '2018-08-28 05:16:12', '0000-00-00 00:00:00', 1),
(28, 2, 2, 'Techboy in Bangladesh!!!', 'Techboy-in-Bangladesh', '<p>Hello guys! I am the techboy!&nbsp;</p>\r\n', '3D-Robot_1920x1080_2887.jpg', '2018-08-28 05:16:17', '0000-00-00 00:00:00', 1),
(29, 2, 2, 'Prothom Alo', 'Prothom-Alo', '<p>Prothom alo started on 1999.</p>\r\n', 'no_image.jpg', '2018-08-28 05:16:20', '0000-00-00 00:00:00', 1),
(30, 2, 1, 'Xiaomi Redmi 4x Review', 'Xiaomi-Redmi-4x-Review', '<p>Hello guys! I am here to give a quick review of the android device xiaomi redmi&nbsp;4x. Its an excellent device because I use it!! :D&nbsp;</p>\r\n', 'redmi4x.png', '2018-08-28 05:15:16', '0000-00-00 00:00:00', 1),
(31, 4, 1, 'FIFA 2018', 'FIFA-2018', '<p>I love Brazil... I like Neymar Jr. !</p>\r\n', 'no_image.jpg', '2018-08-29 05:30:23', '0000-00-00 00:00:00', 1),
(32, 1, 4, 'Bhool Bhaal', 'Bhool-Bhaal', '<p>Ami Arshad the caretaker of Rahib ps4 sorry personal shotru 4.</p>\r\n', 'no_image.jpg', '2018-08-28 13:35:34', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `propic` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total_posts` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `gender`, `propic`, `occupation`, `zipcode`, `email`, `username`, `password`, `register_date`, `total_posts`) VALUES
(1, 'shadab anwar', 'Male', '', 'Software Engineer', '1217', 'shadab@shadab.com', 'Shadab', '202cb962ac59075b964b07152d234b70', '2018-08-23 15:46:01', 4),
(2, 'Ihfaz Kareem', 'Male', 'porshe.jpg', 'Mastermind', '1217', 'rahib@rahib.com', 'Rahib', '202cb962ac59075b964b07152d234b70', '2018-08-24 14:10:11', 5),
(3, 'Shin Chan', 'Male', '', 'Biroktikor Character', '1217', 'picchi@picchi.com', 'picchi', '202cb962ac59075b964b07152d234b70', '2018-08-24 14:15:24', 2),
(4, 'Arshad Taker', 'Male', '', 'Rahiber bondhu', '1205', 'arshad@taker.com', 'ArshadTaker', '202cb962ac59075b964b07152d234b70', '2018-08-28 05:09:16', 0),
(7, 'Ninja Hattori', 'Male', 'hattori.jpeg', 'Ninja King', '1205', 'ninja@hattori.com', 'Hattori', '202cb962ac59075b964b07152d234b70', '2018-08-31 14:10:50', 0),
(8, 'Nusaiba Raaida', 'Female', 'elsa_n_ana.jpg', 'Mastermind', '1217', 'raaida@frozen.com', 'raaida', '202cb962ac59075b964b07152d234b70', '2018-08-31 14:24:17', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
