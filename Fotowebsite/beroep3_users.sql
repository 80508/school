-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 16, 2018 at 01:40 PM
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
-- Table structure for table `beroep3_users`
--

CREATE TABLE IF NOT EXISTS `beroep3_users` (
`id` int(255) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `beroep3_users`
--

INSERT INTO `beroep3_users` (`id`, `username`, `password`) VALUES
(27, 'kees', 'a631427f8d977427cd915ee3ee917c33'),
(5, 'ayo', '19351f0df296e6e73c827a2fff8dbed1'),
(6, 'niels', '9a1ace5d35232fe3895d023311cc9bee'),
(17, '72773', 'bf678cba9ed04bb7a8d7de0c708afec4'),
(16, 'joop', '1ccd742a2cd9c5e7553d8b4b81c9e34e'),
(14, '11', '6512bd43d9caa6e02c990b0a82652dca'),
(15, '222', 'bcbe3365e6ac95ea2c0343a2395834dd'),
(18, 'sjaak', '7c3689af1e799e976564bc23e1851a2f'),
(19, 'Henk', '6a7259238ba5989e49f0ea5f75dd4cd0'),
(20, 'Joop', '1ccd742a2cd9c5e7553d8b4b81c9e34e'),
(21, 'Haha', '4e4d6c332b6fe62a63afe56171fd3725'),
(42, 'xxcv', 'fd2cc6c54239c40495a0d3a93b6380eb'),
(28, '12', 'c20ad4d76fe97759aa27a0c99bff6710'),
(24, 'jeroen', '324905aefb58c08771149a326741025c'),
(30, 'neiro', 'ac4b0a568e8d3a14b521eae07006bc95'),
(31, 'piet', '734442e33d8eff4b48b62d603966bdb5'),
(32, '2233', '9908279ebbf1f9b250ba689db6a0222b'),
(33, 'Sukkel', 'fd2c72a132a453f937317cf625a8bf22'),
(34, '1234', '81dc9bdb52d04dc20036dbd8313ed055'),
(40, 'rishi', 'ac4b0a568e8d3a14b521eae07006bc95'),
(41, 'vincent', 'ca82256898acd980920f331e47a5f1db'),
(38, 'joop', '1ccd742a2cd9c5e7553d8b4b81c9e34e'),
(39, 'Jackson', 'e2185f81771b90d44053ec9fa944ad42'),
(43, 'bn', '4e58188ff528dea1eec738fffc0e118d'),
(44, 'ui', '7d5c009e4eb8bbc78647caeca308e61b'),
(45, 'test2', 'ad0234829205b9033196ba818f7a872b'),
(46, 'tacoma', '159418ace308c35fd97ee655dabf8262'),
(47, '1832893792', '2be06531996b066fc9fef1e489aee701');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beroep3_users`
--
ALTER TABLE `beroep3_users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beroep3_users`
--
ALTER TABLE `beroep3_users`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
