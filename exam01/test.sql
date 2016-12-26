-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2016-12-19 13:45:47
-- 伺服器版本: 10.1.16-MariaDB
-- PHP 版本： 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `test`
--

-- --------------------------------------------------------

--
-- 資料表結構 `bom`
--

CREATE TABLE `bom` (
  `BID` int(20) NOT NULL,
  `BomName` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `BomFlower` int(11) NOT NULL,
  `BomMilk` int(11) NOT NULL,
  `BomMoney` int(11) NOT NULL,
  `BomTime` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `bom`
--

INSERT INTO `bom` (`BID`, `BomName`, `BomFlower`, `BomMilk`, `BomMoney`, `BomTime`) VALUES
(1, '可頌', 20, 15, 1200, 60),
(2, '吐司', 30, 10, 1500, 45),
(3, '炸彈麵包', 1000, 1000, 150000, 1000);

-- --------------------------------------------------------

--
-- 資料表結構 `oven`
--

CREATE TABLE `oven` (
  `OID` int(20) NOT NULL,
  `Complete` int(11) NOT NULL,
  `Useable` int(11) NOT NULL,
  `OvenBRD` int(11) NOT NULL DEFAULT '-1',
  `OTime` int(11) NOT NULL DEFAULT '-1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `oven`
--

INSERT INTO `oven` (`OID`, `Complete`, `Useable`, `OvenBRD`, `OTime`) VALUES
(1, 0, 1, -1, -1),
(2, 0, 1, -1, -1),
(3, 0, 0, -1, -1),
(4, 0, 0, -1, -1);

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `UID` int(12) NOT NULL,
  `Money` int(20) NOT NULL DEFAULT '1000',
  `Flower` int(20) NOT NULL DEFAULT '500',
  `Milk` int(20) NOT NULL DEFAULT '500'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `user`
--

INSERT INTO `user` (`UID`, `Money`, `Flower`, `Milk`) VALUES
(1, 6908, 230, 395);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `bom`
--
ALTER TABLE `bom`
  ADD PRIMARY KEY (`BID`);

--
-- 資料表索引 `oven`
--
ALTER TABLE `oven`
  ADD PRIMARY KEY (`OID`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UID`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `bom`
--
ALTER TABLE `bom`
  MODIFY `BID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用資料表 AUTO_INCREMENT `oven`
--
ALTER TABLE `oven`
  MODIFY `OID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用資料表 AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `UID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
