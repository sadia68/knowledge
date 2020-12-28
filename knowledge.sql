-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2020 at 06:50 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `knowledge`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'farjana@gmail.com', '96e79218965eb72c92a549dd5a330112');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'php'),
(2, 'mysql'),
(3, 'html'),
(4, 'css'),
(5, 'javascript'),
(6, 'bootstrap'),
(7, 'codeigniter'),
(8, 'laravel'),
(9, 'c++');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(255) NOT NULL,
  `message_from` int(11) DEFAULT NULL,
  `message_to` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_on` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `code` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `seen` int(11) NOT NULL,
  `answer` int(11) NOT NULL,
  `reject` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `title`, `category_id`, `description`, `code`, `user_id`, `date`, `seen`, `answer`, `reject`) VALUES
(49, 'What is the difference between HTML tags <div> and <span>?', 3, 'I would like to ask for some simple examples showing the uses of <div> and <span>. I\'ve seen them both used to mark a section of a page with an id or class, but I\'m interested in knowing if there are times when one is preferred over the other.', '', 25, '1591979630', 3, 0, 0),
(50, 'What are valid values for the id attribute in HTML?', 3, 'When creating the id attributes for HTML elements, what rules are there for the value?', '', 25, '1591979839', 0, 0, 0),
(51, 'What is the purpose of the “role” attribute in HTML?', 3, 'I keep seeing role attributes in some people\'s work. I use it too, but I\'m not sure about its effect.', 'For example:\r\n<header id=\"header\" role=\"banner\">\r\n    Header stuff in here\r\n</header>', 25, '1591979917', 1, 0, 0),
(52, 'Why doesn\'t strip_tags work in PHP?', 1, 'I\'ve got the following code:', '<?php echo strip_tags($firstArticle->introtext); ?>', 23, '1591980024', 1, 0, 0),
(53, 'How do I get PHP errors to display?', 1, 'I have checked my PHP ini file (php.ini) and display_errors is set and also error reporting is E_ALL. I have restarted my Apache webserver.\r\n\r\n', 'I have even put these lines at the top of my script, and it doesn\'t even catch simple parse errors. For example, I declare variables with a \"$\" and I don\'t close statements\";\". But all my scripts show a blank page on these errors, but I want to actually see the errors in my browser output.\r\n\r\nerror_reporting(E_ALL);\r\nini_set(\'display_errors\', 1);\r\n\r\nWhat is left to do?', 23, '1591980111', 1, 0, 0),
(54, 'How can I prevent SQL injection in PHP?', 1, 'This question\'s answers are a community effort. Edit existing answers to improve this post. It is not currently accepting new answers or interactions.\r\nIf user input is inserted without modification into an SQL query, then the application becomes vulnerable to SQL injection, like in the following example:', '', 23, '1591980161', 0, 0, 0),
(55, 'Select query in MySQL', 2, 'I want to select total comments posted on post. Somehow I am able to do it but the problem is that the total comment will show under each post even if there is no comment on the post.', 'SELECT SUM(total_comment) AS comment \r\nFROM   user_comment \r\n       INNER JOIN post \r\n               ON user_comment.image_id = post.id \r\nWHERE  status = 0 ', 26, '1591980283', 1, 0, 0),
(56, 'How to reset AUTO_INCREMENT in MySQL?', 2, 'How can I reset the AUTO_INCREMENT of a field?\r\nI want it to start counting from 1 again.', '', 26, '1591980319', 0, 0, 0),
(57, 'How do I UPDATE from a SELECT in SQL Server?', 2, 'Tried this.', 'INSERT INTO Table (col1, col2, col3)\r\nSELECT col1, col2, col3 \r\nFROM other_table \r\nWHERE sql = \'cool\'', 26, '1591980365', 1, 0, 0),
(58, 'How do I check if an element is hidden in jQuery?', 5, 'Is it possible to toggle the visibility of an element, using the functions .hide(), .show() or .toggle()?', '', 26, '1591980468', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `unique_key` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `block` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `unique_key`, `status`, `block`) VALUES
(1, 'test', 'test@gmail.com', '96e79218965eb72c92a549dd5a330112', '', 0, 0),
(2, 'test2', 'teswwt@gmail.com', '96e79218965eb72c92a549dd5a330112', '', 0, 1),
(3, 'test3', 'teswwt@gmail.com', '96e79218965eb72c92a549dd5a330112', '', 0, 0),
(4, 'test4', 'tes4@gmail.com', '96e79218965eb72c92a549dd5a330112', '', 0, 0),
(21, 'test5', 'tes5@gmail.com', '96e79218965eb72c92a549dd5a330112', '', 0, 0),
(22, 'test6', 'tes6@gmail.com', '96e79218965eb72c92a549dd5a330112', '', 0, 0),
(23, 'farjana', 'farjana@gmail.com', '96e79218965eb72c92a549dd5a330112', '', 0, 0),
(24, 'sadia', 'sadia@email.com', '96e79218965eb72c92a549dd5a330112', '', 0, 0),
(25, 'user', 'user@gmail.com', '96e79218965eb72c92a549dd5a330112', '', 0, 0),
(26, 'sadiaa', 'sadia@gmail.com', '96e79218965eb72c92a549dd5a330112', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE `vote` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `answer_id` int(10) NOT NULL,
  `like_answer` int(1) NOT NULL DEFAULT 0,
  `dislike_answer` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vote`
--

INSERT INTO `vote` (`id`, `user_id`, `answer_id`, `like_answer`, `dislike_answer`) VALUES
(23, 25, 17, 0, 1),
(24, 23, 17, 1, 0),
(25, 25, 16, 0, 1),
(26, 23, 16, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vote`
--
ALTER TABLE `vote`
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
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `vote`
--
ALTER TABLE `vote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
