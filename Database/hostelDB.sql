--
-- Database: `hostel`
--
START TRANSACTION;
-- --------------------------------------------------------

--
-- Table structure for table `adds`
--

DROP TABLE IF EXISTS `adds`;
CREATE TABLE IF NOT EXISTS `adds` (
  `optionId` int(11) NOT NULL,
  `reservationId` int(11) NOT NULL,
  PRIMARY KEY (`optionId`,`reservationId`),
  KEY `reservationId` (`reservationId`),
  KEY `optionId` (`optionId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `checking`
--

DROP TABLE IF EXISTS `checking`;
CREATE TABLE IF NOT EXISTS `checking` (
  `checkId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `checkIn` datetime DEFAULT NULL,
  `checkOut` datetime DEFAULT NULL,
  `hostelId` int(11) NOT NULL,
  PRIMARY KEY (`checkId`),
  FOREIGN KEY (`userId`) REFERENCES `user`(`userId`),
  FOREIGN KEY (`hostelId`) REFERENCES `hostel`(`hostelId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `existanceoptionroomtype`
--

DROP TABLE IF EXISTS `existanceoptionroomtype`;
CREATE TABLE IF NOT EXISTS `existanceoptionroomtype` (
  `optionId` int(11) NOT NULL,
  `roomTypeId` int(11) NOT NULL,
  PRIMARY KEY (`optionId`,`roomTypeId`),
  KEY `optionId` (`optionId`),
  KEY `roomTypeId` (`roomTypeId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

DROP TABLE IF EXISTS `faq`;
CREATE TABLE IF NOT EXISTS `faq` (
  `faqId` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `priority` int(1) NOT NULL,
  PRIMARY KEY (`faqId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

DROP TABLE IF EXISTS `forum`;
CREATE TABLE IF NOT EXISTS `forum` (
  `forumId` int(11) NOT NULL AUTO_INCREMENT,
  `forumName` varchar(50) NOT NULL,
  PRIMARY KEY (`forumId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hostel`
--

DROP TABLE IF EXISTS `hostel`;
CREATE TABLE IF NOT EXISTS `hostel` (
  `hostelId` int(11) NOT NULL AUTO_INCREMENT,
  `hostelName` varchar(255) NOT NULL,
  `hostelStars` int(1) NOT NULL,
  `add_postCode` varchar(255) NOT NULL,
  `add_number` int(1) NOT NULL,
  `add_streetName` varchar(255) NOT NULL,
  `add_country` varchar(255) NOT NULL,
  `coo_lat` varchar(255) NOT NULL,
  `coo_long` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pool` tinyint(1) NOT NULL,
  `valet` tinyint(1) NOT NULL,
  `roomService` tinyint(1) NOT NULL,
  `touristTaxes` int(1) NOT NULL,
  `isDeleted` tinyint(1) NOT NULL,
  `forumId` int(11) NOT NULL,
  PRIMARY KEY (`hostelId`),
  FOREIGN KEY (`forumId`) REFERENCES `forum`(`forumId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `messageId` int(11) NOT NULL AUTO_INCREMENT,
  `messageContent` text NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `postDate` datetime NOT NULL,
  `userId` int(11) NOT NULL,
  `subjectId` int(11) NOT NULL,
  PRIMARY KEY (`messageId`),
  FOREIGN KEY (`userId`) REFERENCES `user`(`userId`),
  FOREIGN KEY (`subjectId`) REFERENCES `subject`(`subjectId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `option`
--

DROP TABLE IF EXISTS `option`;
CREATE TABLE IF NOT EXISTS `option` (
  `optionId` int(11) NOT NULL AUTO_INCREMENT,
  `optionName` varchar(50) NOT NULL,
  `optionPrice` decimal(10,2) NOT NULL,
  `isPossible` tinyint(1) NOT NULL,
  PRIMARY KEY (`optionId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------
--
-- Table structure for table `picture`
--

DROP TABLE IF EXISTS `picture`;
CREATE TABLE IF NOT EXISTS `picture` (
  `pictureId` int(11) NOT NULL AUTO_INCREMENT,
  `picturePath` varchar(255) DEFAULT NULL,
  `roomId` int(11) NOT NULL,
  PRIMARY KEY (`pictureId`),
  FOREIGN KEY (`roomId`) REFERENCES `room`(`roomId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

DROP TABLE IF EXISTS `price`;
CREATE TABLE IF NOT EXISTS `price` (
  `priceId` int(11) NOT NULL AUTO_INCREMENT,
  `value` decimal(10,2) NOT NULL,
  `roomTypeId` int(11) NOT NULL,
  `seasonId` int(11) NOT NULL,
  PRIMARY KEY (`priceId`),
  FOREIGN KEY (`roomTypeId`) REFERENCES `room_type`(`roomTypeId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `reservationId` int(11) NOT NULL AUTO_INCREMENT,
  `startDate` datetime NOT NULL,
  `endDate` datetime NOT NULL,
  `insurance` tinyint(1) NOT NULL,
  `isCancelled` tinyint(1) NOT NULL,
  `childrenQuantity` int(1) NOT NULL,
  `adultQuantity` int(1) NOT NULL,
  `totalPrice` decimal(5,2) NOT NULL,
  `roomId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  PRIMARY KEY (`reservationId`),
  FOREIGN KEY (`roomId`) REFERENCES `room`(`roomId`),
  FOREIGN KEY (`userId`) REFERENCES `user`(`userId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE IF NOT EXISTS `review` (
  `reviewId` int(11) NOT NULL AUTO_INCREMENT,
  `reviewStars` int(1) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `isApproved` tinyint(1) NOT NULL,
  `userId` int(11) NOT NULL,
  `roomId` int(11) NOT NULL,
  PRIMARY KEY (`reviewId`),
  FOREIGN KEY (`roomId`) REFERENCES `room`(`roomId`),
  FOREIGN KEY (`userId`) REFERENCES `user`(`userId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `roleId` int(11) NOT NULL AUTO_INCREMENT,
  `roleName` varchar(50) NOT NULL,
  PRIMARY KEY (`roleId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

DROP TABLE IF EXISTS `room`;
CREATE TABLE IF NOT EXISTS `room` (
  `roomId` int(11) NOT NULL AUTO_INCREMENT,
  `roomName` varchar(50) NOT NULL,
  `shortDescription` varchar(250) NOT NULL,
  `longDescription` text NOT NULL,
  `childrenCapacity` int(1) NOT NULL,
  `adultCapacity` int(1) NOT NULL,
  `bathroomQuantity` int(1) NOT NULL,
  `toiletQuantity` int(1) NOT NULL,
  `balcony` tinyint(1) NOT NULL,
  `deleteDate` datetime DEFAULT NULL,
  `isDeleted` tinyint(1) NOT NULL,
  `roomTypeId` int(11) NOT NULL,
  `hostelId` int(11) NOT NULL,
  PRIMARY KEY (`roomId`),
  FOREIGN KEY (`roomTypeId`) REFERENCES `room_type`(`roomTypeId`),
  FOREIGN KEY (`hostelId`) REFERENCES `hostel`(`hostelId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `room_type`
--

DROP TABLE IF EXISTS `room_type`;
CREATE TABLE IF NOT EXISTS `room_type` (
  `roomTypeId` int(11) NOT NULL AUTO_INCREMENT,
  `roomTypeName` varchar(50) NOT NULL,
  PRIMARY KEY (`roomTypeId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `season`
--

DROP TABLE IF EXISTS `season`;
CREATE TABLE IF NOT EXISTS `season` (
  `seasonId` int(11) NOT NULL AUTO_INCREMENT,
  `seasonName` varchar(20) NOT NULL,
  `startDate` varchar(20) NOT NULL,
  `endDate` varchar(20) NOT NULL,
  PRIMARY KEY (`seasonId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
CREATE TABLE IF NOT EXISTS `subject` (
  `subjectId` int(11) NOT NULL AUTO_INCREMENT,
  `subjectTitle` varchar(50) NOT NULL,
  `subjectContent` text NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `postDate` datetime NOT NULL,
  `userId` int(11) NOT NULL,
  `forumId` int(11) NOT NULL,
  PRIMARY KEY (`subjectId`),
  FOREIGN KEY (`userId`) REFERENCES `user`(`userId`),
  FOREIGN KEY (`forumId`) REFERENCES `forum`(`forumId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `roleId` int(11) NOT NULL,
  PRIMARY KEY (`userId`),
  FOREIGN KEY (`roleId`) REFERENCES `role`(`roleId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

COMMIT;

