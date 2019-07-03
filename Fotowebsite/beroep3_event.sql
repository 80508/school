-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 16, 2018 at 01:41 PM
-- Server version: 5.5.59-0+deb8u1
-- PHP Version: 5.6.33-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db80537`
--

-- --------------------------------------------------------

--
-- Table structure for table `beroep3_event`
--

CREATE TABLE IF NOT EXISTS `beroep3_event` (
`id` int(255) NOT NULL,
  `date_added` date NOT NULL,
  `uploader` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `event_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `beroep3_event`
--

INSERT INTO `beroep3_event` (`id`, `date_added`, `uploader`, `event_name`) VALUES
(14, '2018-02-07', 'Test', 'test'),
(31, '2018-02-11', 'test2', 'test2'),
(27, '1959-05-29', 'piet', 'sinterklaas'),
(28, '2018-02-11', 'joop', 'joop'),
(32, '2018-03-08', 'Hans', 'School');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beroep3_event`
--
ALTER TABLE `beroep3_event`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beroep3_event`
--
ALTER TABLE `beroep3_event`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
