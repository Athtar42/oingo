-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2018-12-11 23:37:59
-- 服务器版本： 10.1.37-MariaDB
-- PHP 版本： 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `proj1`
--

-- --------------------------------------------------------

--
-- 表的结构 `comment`
--

CREATE TABLE `comment` (
  `cID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `noteID` int(11) NOT NULL,
  `cText` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `comment`
--

INSERT INTO `comment` (`cID`, `userID`, `noteID`, `cText`) VALUES
(1, 2, 5, 'Nah, you suck!! '),
(2, 3, 5, 'I am not. This place offers real food, man!');

-- --------------------------------------------------------

--
-- 表的结构 `current`
--

CREATE TABLE `current` (
  `userID` int(11) NOT NULL,
  `cTime` datetime NOT NULL,
  `cWeekday` int(11) NOT NULL,
  `cLongitude` decimal(10,7) NOT NULL,
  `cLatitude` decimal(10,7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `current`
--

INSERT INTO `current` (`userID`, `cTime`, `cWeekday`, `cLongitude`, `cLatitude`) VALUES
(1, '2018-11-29 12:53:35', 3, '60.1683968', '24.9520721'),
(2, '2018-11-29 12:53:35', 3, '33.9415630', '-118.4070620'),
(3, '2018-11-29 12:53:35', 3, '33.9415630', '-118.4070620'),
(4, '2018-11-29 12:53:35', 3, '33.9415630', '-118.4070620');

-- --------------------------------------------------------

--
-- 表的结构 `filter`
--

CREATE TABLE `filter` (
  `filterID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `fState` varchar(45) DEFAULT NULL,
  `fTag` varchar(45) DEFAULT NULL,
  `fsID` int(11) DEFAULT NULL,
  `fLatitude` decimal(10,7) DEFAULT NULL,
  `fLongitude` decimal(10,7) DEFAULT NULL,
  `fRestrict` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `filter`
--

INSERT INTO `filter` (`filterID`, `userID`, `fState`, `fTag`, `fsID`, `fLatitude`, `fLongitude`, `fRestrict`) VALUES
(1, 2, 'default', 'food', 7, '33.9415630', '-118.4070620', 'all');

-- --------------------------------------------------------

--
-- 表的结构 `friendship`
--

CREATE TABLE `friendship` (
  `userID1` int(11) NOT NULL,
  `userID2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `friendship`
--

INSERT INTO `friendship` (`userID1`, `userID2`) VALUES
(1, 4),
(1, 8),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(3, 2),
(3, 4),
(3, 5),
(4, 2),
(4, 3),
(4, 5),
(4, 6),
(5, 2),
(5, 3),
(5, 4),
(5, 5),
(5, 6),
(5, 7),
(5, 8),
(6, 2),
(6, 4),
(6, 5),
(6, 7),
(7, 5),
(7, 6),
(8, 1),
(8, 5);

-- --------------------------------------------------------

--
-- 表的结构 `note`
--

CREATE TABLE `note` (
  `noteID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `noteText` text NOT NULL,
  `noteTime` datetime NOT NULL,
  `radius` int(11) NOT NULL,
  `nRestrict` varchar(45) NOT NULL,
  `nsID` int(11) NOT NULL,
  `nLatitude` decimal(10,7) NOT NULL,
  `nLongitude` decimal(10,7) NOT NULL,
  `placeName` varchar(45) NOT NULL,
  `nAddress` text NOT NULL,
  `ifComment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `note`
--

INSERT INTO `note` (`noteID`, `userID`, `noteText`, `noteTime`, `radius`, `nRestrict`, `nsID`, `nLatitude`, `nLongitude`, `placeName`, `nAddress`, `ifComment`) VALUES
(1, 1, 'I found a great place! Recommend to everyone!', '2018-11-10 17:02:03', 100, 'all', 1, '60.1683968', '24.9520721', 'Helsingin Yliopisto', 'Yliopistonkatu 4, 00100 Helsinki, Finland', 1),
(2, 1, 'Back to school, so frastrated', '2018-11-23 10:15:33', 100, 'all', 2, '60.1697871', '24.9487758', 'Pizzeria Via Tribunali', 'Sofiankatu 4, 00101 Helsinki, Finland', 0),
(3, 2, 'Brought some cany for my son. Will release Simulation Theory Tour new location on December, stay tuned.', '2018-11-23 12:10:23', 100, 'friends', 3, '33.9431419', '-118.4080958', 'See\'s Candies', '400 World Way, Los Angeles, CA 90045', 1),
(4, 2, 'This place are awesome! Great bar!', '2018-11-23 12:35:12', 100, 'friend', 4, '33.9415630', '-118.4070620', 'American Airlines Admirals Club', 'Terminal 4, Los Angeles International Airport, 1 World Way, Los Angeles, CA 90045', 1),
(5, 3, 'Hate to say, but this place is way better! We\'re talking about real food here.', '2018-11-23 12:36:22', 100, 'all', 5, '33.9438829', '-118.4090564', 'Real Food Daily', '1 World Way, Los Angeles, CA 90045', 0),
(6, 2, 'Miss the place. Gonna have fun in London.', '2018-11-24 10:17:54', 100, 'self', 6, '51.4695758', '-0.4496071', 'Plaza Premium Lounge', 'A3, Terminal 2, London Heathrow Airport, Longford, Hounslow TW6 1EW UK', 0);

-- --------------------------------------------------------

--
-- 表的结构 `request`
--

CREATE TABLE `request` (
  `userID1` int(11) NOT NULL,
  `userID2` int(11) NOT NULL,
  `rStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `request`
--

INSERT INTO `request` (`userID1`, `userID2`, `rStatus`) VALUES
(7, 3, 0);

-- --------------------------------------------------------

--
-- 表的结构 `schedule`
--

CREATE TABLE `schedule` (
  `sID` int(11) NOT NULL,
  `startTime` time DEFAULT NULL,
  `endTime` time DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `Weekday` int(11) NOT NULL,
  `endDate` date DEFAULT NULL,
  `repetition` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `schedule`
--

INSERT INTO `schedule` (`sID`, `startTime`, `endTime`, `startDate`, `Weekday`, `endDate`, `repetition`) VALUES
(1, '11:00:00', '13:00:00', '2018-11-11', 6, '2018-11-30', 'weekly'),
(2, '11:00:00', '13:00:00', '2018-11-25', 6, '2018-11-30', 'daily'),
(3, '12:00:00', '14:00:00', '2018-11-24', 5, '2018-11-30', 'daily'),
(4, '10:00:00', '18:00:00', '2018-11-25', 3, '2019-12-30', 'daily'),
(5, '09:00:00', '13:00:00', '2018-11-25', 6, '2018-12-30', 'daily'),
(6, '11:00:00', '16:00:00', '2018-11-24', 5, '2018-11-24', 'no'),
(7, '10:00:00', '18:00:00', '2018-11-25', 6, '2019-11-30', 'daily');

-- --------------------------------------------------------

--
-- 表的结构 `state`
--

CREATE TABLE `state` (
  `userID` int(11) NOT NULL,
  `state` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `state`
--

INSERT INTO `state` (`userID`, `state`) VALUES
(1, 'default'),
(2, 'lunch break'),
(3, 'at work'),
(4, 'default'),
(5, 'chilling'),
(6, 'lunch break'),
(7, 'default'),
(8, 'default');

-- --------------------------------------------------------

--
-- 表的结构 `tag`
--

CREATE TABLE `tag` (
  `noteID` int(11) NOT NULL,
  `tag` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tag`
--

INSERT INTO `tag` (`noteID`, `tag`) VALUES
(1, '#shopping'),
(2, '#food'),
(3, '#food'),
(3, '#shopping'),
(3, '#tourism'),
(4, '#food'),
(4, '#tourism'),
(4, '#transportation'),
(5, '#food'),
(5, '#tourism'),
(6, '#food'),
(6, '#tourism');

-- --------------------------------------------------------

--
-- 替换视图以便查看 `tempfilter`
-- （参见下面的实际视图）
--
CREATE TABLE `tempfilter` (
`filteruser` int(11)
,`noteID` int(11)
,`noteuser` int(11)
);

-- --------------------------------------------------------

--
-- 替换视图以便查看 `tempnote`
-- （参见下面的实际视图）
--
CREATE TABLE `tempnote` (
`filteruser` int(11)
,`noteID` int(11)
,`noteuser` int(11)
);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `userName` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `birthDate` date DEFAULT NULL,
  `region` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`userID`, `email`, `userName`, `password`, `gender`, `birthDate`, `region`) VALUES
(1, 'amorphisfan@gmail.com', 'amorphis', 'iloveamorphis', 'Male', '1996-10-23', 'Finland'),
(2, 'mattbellamy@muse.mu', 'thehandler', 'simulationtheory', 'Male', '1978-06-09', 'United Kingdom'),
(3, 'domhoward@muse.mu', 'bestdrummer', 'idontknowmatt', 'Male', '1977-12-07', 'United Kingdom'),
(4, 'chriswolstenholme@muse.mu', 'kellyisthebest', 'wolstenholme', 'Male', '1978-12-02', 'United Kingdom'),
(5, 'tomkirk@muse.mu', 'Absolution', 'dronestourdvd', 'Male', '1977-02-24', 'United Kingdom'),
(6, 'chrismartin@coldplay.com', 'paradise', 'chrismartin1977', 'Male', '1977-03-02', 'United Kingdom'),
(7, 'thomyorke@radiohead.com', 'thomyorke', 'ihatedom', 'Male', '1968-10-07', 'United Kingdom'),
(8, 'petrilindroos@ensiferum.com', 'petriworrier', 'wintersunsucks', 'Male', '1980-01-10', 'Finland'),
(99, 'sym@gmail.com', 'sym', '123456', 'female', '2010-01-02', 'China'),
(100, '123', '123', '12345', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 视图结构 `tempfilter`
--
DROP TABLE IF EXISTS `tempfilter`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tempfilter`  AS  (select `filter`.`userID` AS `filteruser`,`note`.`noteID` AS `noteID`,`note`.`userID` AS `noteuser` from (((`filter` join `note`) join `schedule` on((`filter`.`fsID` = `schedule`.`sID`))) join `current` on((`filter`.`userID` = `current`.`userID`))) where ((cast(`current`.`cTime` as date) between `schedule`.`startDate` and `schedule`.`endDate`) and (cast(`current`.`cTime` as time) between `schedule`.`startTime` and `schedule`.`endTime`) and (((`schedule`.`repetition` = 'no') and (cast(`current`.`cTime` as date) = `schedule`.`startDate`)) or (`schedule`.`repetition` = 'daily') or ((`schedule`.`repetition` = 'weekly') and (`current`.`cWeekday` = `schedule`.`Weekday`)) or ((`schedule`.`repetition` = 'monthly') and (dayofmonth(`current`.`cTime`) = dayofmonth(`schedule`.`startDate`))) or ((`schedule`.`repetition` = 'yearly') and (month(`current`.`cTime`) = month(`schedule`.`startDate`)))) and ((acos((((cos(radians(`filter`.`fLatitude`)) * cos(radians(`note`.`nLatitude`))) * cos((radians(`note`.`nLongitude`) - radians(`filter`.`fLongitude`)))) + (sin(radians(`filter`.`fLatitude`)) * sin(radians(`note`.`nLatitude`))))) * 3961) < `note`.`radius`) and ((`filter`.`fRestrict` = 'all') or ((`filter`.`fRestrict` = 'self') and (`filter`.`userID` = `note`.`userID`)) or ((`filter`.`fRestrict` = 'friend') and `filter`.`userID` in (select `friendship`.`userID2` from `friendship` where (`friendship`.`userID1` = `note`.`userID`)))))) ;

-- --------------------------------------------------------

--
-- 视图结构 `tempnote`
--
DROP TABLE IF EXISTS `tempnote`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tempnote`  AS  (select `user`.`userID` AS `filteruser`,`note`.`noteID` AS `noteID`,`note`.`userID` AS `noteuser` from (((`user` join `note`) join `schedule` on((`note`.`nsID` = `schedule`.`sID`))) join `current` on((`user`.`userID` = `current`.`userID`))) where ((cast(`current`.`cTime` as date) between `schedule`.`startDate` and `schedule`.`endDate`) and (cast(`current`.`cTime` as time) between `schedule`.`startTime` and `schedule`.`endTime`) and (((`schedule`.`repetition` = 'no') and (cast(`current`.`cTime` as date) = `schedule`.`startDate`)) or (`schedule`.`repetition` = 'daily') or ((`schedule`.`repetition` = 'weekly') and (`current`.`cWeekday` = `schedule`.`Weekday`)) or ((`schedule`.`repetition` = 'monthly') and (dayofmonth(`current`.`cTime`) = dayofmonth(`schedule`.`startDate`))) or ((`schedule`.`repetition` = 'yearly') and (month(`current`.`cTime`) = month(`schedule`.`startDate`)))) and (acos((((cos(radians(`current`.`cLatitude`)) * cos(radians(`note`.`nLatitude`))) * cos((radians(`note`.`nLongitude`) - radians(`current`.`cLongitude`)))) + (sin(radians(`current`.`cLatitude`)) * sin(radians(`note`.`nLatitude`))))) < `note`.`radius`) and ((`note`.`nRestrict` = 'all') or ((`note`.`nRestrict` = 'self') and (`note`.`userID` = `user`.`userID`)) or ((`note`.`nRestrict` = 'friend') and `user`.`userID` in (select `friendship`.`userID2` from `friendship` where (`friendship`.`userID1` = `note`.`userID`)))))) ;

--
-- 转储表的索引
--

--
-- 表的索引 `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`cID`),
  ADD KEY `userID_fk5` (`userID`),
  ADD KEY `noteID_fk3` (`noteID`);

--
-- 表的索引 `current`
--
ALTER TABLE `current`
  ADD PRIMARY KEY (`userID`);

--
-- 表的索引 `filter`
--
ALTER TABLE `filter`
  ADD PRIMARY KEY (`filterID`),
  ADD KEY `userID_fk4` (`userID`),
  ADD KEY `fsID_fk` (`fsID`);

--
-- 表的索引 `friendship`
--
ALTER TABLE `friendship`
  ADD PRIMARY KEY (`userID1`,`userID2`),
  ADD KEY `userID2_fk1` (`userID2`);

--
-- 表的索引 `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`noteID`),
  ADD KEY `userID_fk1` (`userID`),
  ADD KEY `nsID_fk1` (`nsID`);

--
-- 表的索引 `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`userID1`,`userID2`),
  ADD KEY `userID2_fk2` (`userID2`);

--
-- 表的索引 `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`sID`);

--
-- 表的索引 `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`userID`);

--
-- 表的索引 `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`noteID`,`tag`);

--
-- 表的索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `comment`
--
ALTER TABLE `comment`
  MODIFY `cID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用表AUTO_INCREMENT `filter`
--
ALTER TABLE `filter`
  MODIFY `filterID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `note`
--
ALTER TABLE `note`
  MODIFY `noteID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用表AUTO_INCREMENT `schedule`
--
ALTER TABLE `schedule`
  MODIFY `sID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- 限制导出的表
--

--
-- 限制表 `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `noteID_fk3` FOREIGN KEY (`noteID`) REFERENCES `note` (`noteID`),
  ADD CONSTRAINT `userID_fk5` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

--
-- 限制表 `current`
--
ALTER TABLE `current`
  ADD CONSTRAINT `userID_fk3` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

--
-- 限制表 `filter`
--
ALTER TABLE `filter`
  ADD CONSTRAINT `fsID_fk` FOREIGN KEY (`fsID`) REFERENCES `schedule` (`sID`),
  ADD CONSTRAINT `userID_fk4` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

--
-- 限制表 `friendship`
--
ALTER TABLE `friendship`
  ADD CONSTRAINT `userID1_fk1` FOREIGN KEY (`userID1`) REFERENCES `user` (`userID`),
  ADD CONSTRAINT `userID2_fk1` FOREIGN KEY (`userID2`) REFERENCES `user` (`userID`);

--
-- 限制表 `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `nsID_fk1` FOREIGN KEY (`nsID`) REFERENCES `schedule` (`sID`),
  ADD CONSTRAINT `userID_fk1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

--
-- 限制表 `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `userID1_fk2` FOREIGN KEY (`userID1`) REFERENCES `user` (`userID`),
  ADD CONSTRAINT `userID2_fk2` FOREIGN KEY (`userID2`) REFERENCES `user` (`userID`);

--
-- 限制表 `state`
--
ALTER TABLE `state`
  ADD CONSTRAINT `userID_fk2` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

--
-- 限制表 `tag`
--
ALTER TABLE `tag`
  ADD CONSTRAINT `noteID_fk1` FOREIGN KEY (`noteID`) REFERENCES `note` (`noteID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
