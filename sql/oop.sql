-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 02, 2020 at 06:17 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oop`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `profession` varchar(20) NOT NULL,
  `roll` varchar(255) NOT NULL,
  `reg` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `email`, `address`, `city`, `phone`, `username`, `photo`, `profession`, `roll`, `reg`) VALUES
(1, 'Alex Alex', 'alex@gmail.com', 'London', 'Lodon', '099842378', 'alex111', 'alex.png', 'Developer', '111111', '12345678'),
(2, 'Alex Alex', 'alex@gmail.com', 'London', 'Lodon', '099842378', 'alex111', 'alex.png', 'Developer', '111111', '12345678'),
(3, 'Alex Alex', 'alex@gmail.com', 'London', 'Lodon', '099842378', 'alex111', 'alex.png', 'Developer', '111111', '12345678'),
(4, 'Alex Alex', 'alex@gmail.com', 'London', 'Lodon', '099842378', 'alex111', 'alex.png', 'Developer', '111111', '12345678'),
(5, 'Alex Alex', 'alex@gmail.com', 'London', 'Lodon', '099842378', 'alex111', 'alex.png', 'Developer', '111111', '12345678'),
(6, 'Alex Alex', 'alex@gmail.com', 'London', 'Lodon', '099842378', 'alex111', 'alex.png', 'Developer', '111111', '12345678'),
(7, 'Alex Alex', 'alex@gmail.com', 'London', 'Lodon', '099842378', 'alex111', 'alex.png', 'Developer', '111111', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

DROP TABLE IF EXISTS `note`;
CREATE TABLE IF NOT EXISTS `note` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `des` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `datetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `note`
--

INSERT INTO `note` (`id`, `uid`, `title`, `des`, `status`, `datetime`) VALUES
(1, 1, 'Web design', 'It is a long established fact that a reader will be distracted by the readable ', 1, '2020-05-12 15:53:34'),
(4, 3, 'Python', 'I am a python dveveloper.', 1, '2020-12-02 06:07:53'),
(2, 2, 'Php', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed.', 1, '2020-05-12 15:55:55'),
(3, 2, 'Java programming', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed', 1, '2020-05-12 16:01:37');

-- --------------------------------------------------------

--
-- Table structure for table `php_poll`
--

DROP TABLE IF EXISTS `php_poll`;
CREATE TABLE IF NOT EXISTS `php_poll` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `php_fremwork` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `php_poll`
--

INSERT INTO `php_poll` (`id`, `php_fremwork`) VALUES
(1, 'Laravel'),
(2, 'Php'),
(3, 'Boostrap'),
(4, 'Javascript'),
(5, 'Html'),
(6, 'Laravel'),
(7, 'Laravel'),
(8, 'Boostrap'),
(9, 'Boostrap'),
(10, 'Html'),
(11, 'Javascript');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

DROP TABLE IF EXISTS `tbl_student`;
CREATE TABLE IF NOT EXISTS `tbl_student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`id`, `name`, `email`, `phone`) VALUES
(1, 'Asraful Sarkar', 'asraful@gmail.com', '12345678'),
(2, 'Asraful Sarkar', 'jami1234@gmail.com', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `email`, `password`) VALUES
(1, 'Asraful Sarkar Vai', 'asraful', 'jami7403@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759'),
(2, 'Jami islam', 'jami1', 'md.zubaidul@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(3, 'hello', 'hello', 'hello@gmail.com', 'b59a741183b7e1990156a46faa29b60c');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
