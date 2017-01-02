-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jan 02, 2017 at 02:23 AM
-- Server version: 5.5.49-log
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buysite`
--

-- --------------------------------------------------------

--
-- Table structure for table `board`
--

CREATE TABLE IF NOT EXISTS `board` (
  `id` int(11) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `board`
--

INSERT INTO `board` (`id`, `message`, `mail`, `date`) VALUES
(1, '網頁做好爛喔', 'asd123456@yahoo.com', '2017-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `goods`
--

CREATE TABLE IF NOT EXISTS `goods` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `uptime` date NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pop` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `goods`
--

INSERT INTO `goods` (`id`, `name`, `picture`, `uptime`, `content`, `pop`, `price`) VALUES
(4, '貓頭鷹杯墊', 'http://i.imgur.com/dM1LLZL.jpg', '2016-12-28', '很像貓頭鷹的杯墊喔', 0, 1000),
(5, '設計過的盆栽', 'http://i.imgur.com/wkagI0s.jpg', '2016-12-28', '跟覆盆子完全沒有關係的盆栽喔!', 0, 1500),
(6, '紫色背包', 'http://i.imgur.com/VYBX1Zb.jpg', '2016-12-28', '紫色恐怖的紫色包包', 0, 500),
(7, '小熊鍋子', 'http://i.imgur.com/KDRoNfH.jpg', '2016-12-28', '外表像小熊喔', 0, 600),
(8, '彩色墨鏡', 'http://i.imgur.com/CEsXfWq.jpg', '2016-12-28', '彩色的眼鏡喔', 0, 300);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `id` int(11) NOT NULL,
  `mail` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addr` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `mail`, `password`, `name`, `phone`, `addr`) VALUES
(5, 'leo5916267@gmail.com', 'asd123', '', '', ''),
(6, 'asd123456@yahoo.com', 'asd123', '金城武', '096393956', '台南市長榮大學'),
(7, 'zxc123456@yahoo.com.tw', 'asd123', '明金城', '0926393956', '長榮大學');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE IF NOT EXISTS `orderdetail` (
  `id` int(11) NOT NULL,
  `goods_id` int(11) NOT NULL,
  `goods_amount` int(11) NOT NULL,
  `goods_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`id`, `goods_id`, `goods_amount`, `goods_total`) VALUES
(43, 4, 1, 1000),
(43, 5, 1, 1500);

-- --------------------------------------------------------

--
-- Table structure for table `ordertab`
--

CREATE TABLE IF NOT EXISTS `ordertab` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `drive` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ordertab`
--

INSERT INTO `ordertab` (`id`, `member_id`, `total`, `order_date`, `drive`) VALUES
(43, 7, 1500, '2017-01-02', 0),
(44, 7, 1000, '2017-01-02', 0),
(45, 7, 3000, '2017-01-02', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`id`,`goods_id`),
  ADD KEY `goods_id` (`goods_id`);

--
-- Indexes for table `ordertab`
--
ALTER TABLE `ordertab`
  ADD PRIMARY KEY (`id`,`member_id`),
  ADD KEY `member_id` (`member_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `board`
--
ALTER TABLE `board`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `ordertab`
--
ALTER TABLE `ordertab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`goods_id`) REFERENCES `goods` (`id`),
  ADD CONSTRAINT `orderdetail_ibfk_1` FOREIGN KEY (`id`) REFERENCES `ordertab` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ordertab`
--
ALTER TABLE `ordertab`
  ADD CONSTRAINT `ordertab_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
