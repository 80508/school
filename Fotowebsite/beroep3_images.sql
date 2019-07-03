-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 16, 2018 at 01:23 PM
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
-- Table structure for table `beroep3_images`
--

CREATE TABLE IF NOT EXISTS `beroep3_images` (
`img_id` int(11) NOT NULL,
  `img_name` varchar(500) CHARACTER SET utf8 NOT NULL,
  `img_path` varchar(500) CHARACTER SET utf8 NOT NULL,
  `thumb_path` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `img_type` longblob NOT NULL,
  `image` longblob NOT NULL,
  `event_id` int(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=459 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `beroep3_images`
--

INSERT INTO `beroep3_images` (`img_id`, `img_name`, `img_path`, `thumb_path`, `img_type`, `image`, `event_id`) VALUES
(408, 'DQmdSUvmbq7qAtnqCbaXAAW8FxNBjo7krPVb22Qpf77fL6r.jpeg', 'images/1520516848DQmdSUvmbq7qAtnqCbaXAAW8FxNBjo7krPVb22Qpf77fL6r.jpeg', 'images/thumb/1520516848DQmdSUvmbq7qAtnqCbaXAAW8FxNBjo7krPVb22Qpf77fL6r.jpeg', 0x696d6167652f6a706567, '', 14),
(447, '1520516848DQmdSUvmbq7qAtnqCbaXAAW8FxNBjo7krPVb22Qpf77fL6r.jpg', 'images/15205351101520516848DQmdSUvmbq7qAtnqCbaXAAW8FxNBjo7krPVb22Qpf77fL6r.jpg', 'images/thumb/15205351101520516848DQmdSUvmbq7qAtnqCbaXAAW8FxNBjo7krPVb22Qpf77fL6r.jpg', 0x696d6167652f6a706567, '', 31),
(410, 'Sports-Cars-Wallpapers.jpg', 'images/1520517017Sports-Cars-Wallpapers.jpg', 'images/thumb/1520517017Sports-Cars-Wallpapers.jpg', 0x696d6167652f6a706567, '', 14),
(435, '53454.jpg', 'images/152053394753454.jpg', 'images/thumb/152053394753454.jpg', 0x696d6167652f6a706567, '', 14),
(456, '944385_511686438896716_139719817_n.jpg', 'images/1520889479944385_511686438896716_139719817_n.jpg', 'images/thumb/1520889479944385_511686438896716_139719817_n.jpg', 0x696d6167652f6a706567, '', 14),
(425, 'Unknown.jpg', 'images/1520526578Unknown.jpg', 'images/thumb/1520526578Unknown.jpg', 0x696d6167652f6a706567, '', 27),
(394, 'Kick-off_Terror_Egg.jpg', 'images/1520513122Kick-off_Terror_Egg.jpg', 'images/thumb/1520513122Kick-off_Terror_Egg.jpg', 0x696d6167652f6a706567, '', 0),
(449, 'download.jpeg', 'images/1520858855download.jpeg', 'images/thumb/1520858855download.jpeg', 0x696d6167652f6a706567, '', 32),
(457, '1504119_672497116167373_5883081246638095527_n.jpg', 'images/15208894801504119_672497116167373_5883081246638095527_n.jpg', 'images/thumb/15208894801504119_672497116167373_5883081246638095527_n.jpg', 0x696d6167652f6a706567, '', 14),
(458, 'Ugly2.jpg', 'images/1520937279Ugly2.jpg', 'images/thumb/1520937279Ugly2.jpg', 0x696d6167652f6a706567, '', 14),
(424, 'images.jpg', 'images/1520526578images.jpg', 'images/thumb/1520526578images.jpg', 0x696d6167652f6a706567, '', 27),
(423, 'diep-in-de-amazone-7.jpg', 'images/1520526578diep-in-de-amazone-7.jpg', 'images/thumb/1520526578diep-in-de-amazone-7.jpg', 0x696d6167652f6a706567, '', 27),
(370, 'logo-dj.png', 'images/1519393558logo-dj.png', 'images/thumb/1519393558logo-dj.png', 0x696d6167652f706e67, '', 0),
(422, '386.jpg', 'images/1520526578386.jpg', 'images/thumb/1520526578386.jpg', 0x696d6167652f6a706567, '', 27),
(448, '20121007042148-jungleroots2.jpg', 'images/152085885420121007042148-jungleroots2.jpg', 'images/thumb/152085885420121007042148-jungleroots2.jpg', 0x696d6167652f6a706567, '', 32),
(443, '386.jpg', 'images/1520535109386.jpg', 'images/thumb/1520535109386.jpg', 0x696d6167652f6a706567, '', 31),
(444, '43434.jpg', 'images/152053510943434.jpg', 'images/thumb/152053510943434.jpg', 0x696d6167652f6a706567, '', 31),
(445, '53454.jpg', 'images/152053510953454.jpg', 'images/thumb/152053510953454.jpg', 0x696d6167652f6a706567, '', 31),
(451, 'IMG-20180226-WA0000.jpg', 'images/1520858915IMG-20180226-WA0000.jpg', 'images/thumb/1520858915IMG-20180226-WA0000.jpg', 0x696d6167652f6a706567, '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beroep3_images`
--
ALTER TABLE `beroep3_images`
 ADD PRIMARY KEY (`img_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beroep3_images`
--
ALTER TABLE `beroep3_images`
MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=459;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
