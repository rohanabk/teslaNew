-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2019 at 09:13 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tesla`
--

-- --------------------------------------------------------

--
-- Table structure for table `cook`
--

CREATE TABLE `cook` (
  `ID` int(11) NOT NULL,
  `receipt1` varchar(500) NOT NULL,
  `receipt2` varchar(500) NOT NULL,
  `usn1` varchar(40) NOT NULL,
  `usn2` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `debate`
--

CREATE TABLE `debate` (
  `id` int(11) NOT NULL,
  `receipt1` varchar(500) NOT NULL,
  `receipt2` varchar(500) NOT NULL,
  `usn1` varchar(40) NOT NULL,
  `usn2` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `debate`
--

INSERT INTO `debate` (`id`, `receipt1`, `receipt2`, `usn1`, `usn2`) VALUES
(1, 'TES6031', 'TES4729', '2GI16CS177', '2GI16CS109');

-- --------------------------------------------------------

--
-- Table structure for table `idea`
--

CREATE TABLE `idea` (
  `ID` int(11) NOT NULL,
  `receipt1` varchar(500) NOT NULL,
  `receipt2` varchar(500) NOT NULL,
  `usn1` varchar(40) NOT NULL,
  `usn2` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `idea`
--

INSERT INTO `idea` (`ID`, `receipt1`, `receipt2`, `usn1`, `usn2`) VALUES
(1, 'TES6031', 'TES4729', '2GI16CS177', '2GI16CS109'),
(3, 'TES4729', 'TES6031', '2GI16CS109', '2GI16CS177');

-- --------------------------------------------------------

--
-- Table structure for table `minute`
--

CREATE TABLE `minute` (
  `id` int(11) NOT NULL,
  `receipt1` varchar(500) NOT NULL,
  `receipt2` varchar(500) DEFAULT NULL,
  `usn1` varchar(40) NOT NULL,
  `usn2` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `minute`
--

INSERT INTO `minute` (`id`, `receipt1`, `receipt2`, `usn1`, `usn2`) VALUES
(2, 'TES6031', NULL, '2GI16CS177', NULL),
(3, 'TES4729', NULL, '2GI16CS109', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `ID` int(11) NOT NULL,
  `receipt1` varchar(500) NOT NULL,
  `receipt2` varchar(500) NOT NULL,
  `usn1` varchar(40) NOT NULL,
  `usn2` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`ID`, `receipt1`, `receipt2`, `usn1`, `usn2`) VALUES
(1, 'TES6031', 'TES4729', '2GI16CS177', '2GI16CS109');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `receipt` varchar(500) NOT NULL,
  `firstName` text NOT NULL,
  `lastName` text NOT NULL,
  `usn` varchar(15) NOT NULL,
  `cname` text NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`receipt`, `firstName`, `lastName`, `usn`, `cname`, `mobile`, `email`) VALUES
('TES4729', 'ROHAN', 'KOSANDAL', '2GI16CS109', 'git', 9480189101, 'rohank@gmail.com'),
('TES6031', 'YASH', 'SHAH', '2GI16CS177', 'git', 8123738100, 'shah.yash362@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `registertemporary`
--

CREATE TABLE `registertemporary` (
  `receipt` varchar(500) NOT NULL,
  `firstName` text NOT NULL,
  `lastName` text NOT NULL,
  `usn` varchar(15) NOT NULL,
  `cname` text NOT NULL,
  `mobile` bigint(15) NOT NULL,
  `email` varchar(45) NOT NULL,
  `transactionID` text NOT NULL,
  `transactionAmt` int(11) NOT NULL,
  `paymentMode` varchar(3) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `transactionDate` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `responseCode` int(6) NOT NULL,
  `responseMsg` text NOT NULL,
  `gatewayName` text NOT NULL,
  `BID` text NOT NULL,
  `bankName` text NOT NULL,
  `checksum` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registertemporary`
--

INSERT INTO `registertemporary` (`receipt`, `firstName`, `lastName`, `usn`, `cname`, `mobile`, `email`, `transactionID`, `transactionAmt`, `paymentMode`, `currency`, `transactionDate`, `status`, `responseCode`, `responseMsg`, `gatewayName`, `BID`, `bankName`, `checksum`) VALUES
('TES4729', 'YASH', 'SHAH', '2GI16CS109', 'git', 9480189101, 'rohank@gmail.com', '20190223111212800110168541500271529', 100, 'DC', 'INR', '2019-02-23 23:19:54.0', 'TXN_SUCCESS', 1, 'Txn Success', 'HDFC', '4036217121962950', 'CITY UNION BANK LTD', 'zWC/EZeggUOygiFLGSa3AJFBmx12UuevvPt0MFBgbY5qls8R+JYGIftsNwG2Z2GFN+/hGHVughtMPdcRP9Yb26F47vot/M7TIBL9XmUHp6U='),
('TES5c702b7f5528a', 'YASH', 'SHAH', '2GI16CS177', 'git', 8123738100, 'shah.yash362@gmail.com', '20190222111212800110168750500272867', 100, 'DC', 'INR', '2019-02-22 22:34:13.0', 'TXN_SUCCESS', 1, 'Txn Success', 'HDFC', '4036217121962950', 'CITY UNION BANK LTD', 'JbnqzgCVE3TMYi0trZeD2p2a0aGNDw+0IF+3X1+mbltbnPB4ZS5XBLrhVnwSH/zNuGdS3X49yCUxLuDlacph9cM6uEyB+iU7uiCCMYYhbm0='),
('TES6031', 'YASH', 'SHAH', '2GI16CS177', 'git', 8123738100, 'shah.yash362@gmail.com', '20190223111212800110168768200272144', 100, 'DC', 'INR', '2019-02-23 18:30:40.0', 'TXN_SUCCESS', 1, 'Txn Success', 'HDFC', '4036217121962950', 'CITY UNION BANK LTD', 'yrBJVOpHzn/BexHZPK5efvUCgKYBWSEdl9tYWe1fQmN5lgfiwmYkp1zMigMwVjDfSw7dFJmg2Vl0+fQmYTA78LW+tfYTS7xXTRX+RdRdflA=');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cook`
--
ALTER TABLE `cook`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `receipt1` (`receipt1`),
  ADD KEY `receipt2` (`receipt2`);

--
-- Indexes for table `debate`
--
ALTER TABLE `debate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `receipt1` (`receipt1`),
  ADD KEY `receipt2` (`receipt2`);

--
-- Indexes for table `idea`
--
ALTER TABLE `idea`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `receipt1` (`receipt1`),
  ADD KEY `receipt2` (`receipt2`);

--
-- Indexes for table `minute`
--
ALTER TABLE `minute`
  ADD PRIMARY KEY (`id`),
  ADD KEY `receipt1` (`receipt1`),
  ADD KEY `receipt2` (`receipt2`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `receipt1` (`receipt1`),
  ADD KEY `receipt2` (`receipt2`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`receipt`);

--
-- Indexes for table `registertemporary`
--
ALTER TABLE `registertemporary`
  ADD PRIMARY KEY (`receipt`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cook`
--
ALTER TABLE `cook`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `debate`
--
ALTER TABLE `debate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `idea`
--
ALTER TABLE `idea`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `minute`
--
ALTER TABLE `minute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cook`
--
ALTER TABLE `cook`
  ADD CONSTRAINT `cook_ibfk_1` FOREIGN KEY (`receipt1`) REFERENCES `register` (`receipt`),
  ADD CONSTRAINT `cook_ibfk_2` FOREIGN KEY (`receipt2`) REFERENCES `register` (`receipt`);

--
-- Constraints for table `debate`
--
ALTER TABLE `debate`
  ADD CONSTRAINT `debate_ibfk_1` FOREIGN KEY (`receipt1`) REFERENCES `register` (`receipt`),
  ADD CONSTRAINT `debate_ibfk_2` FOREIGN KEY (`receipt2`) REFERENCES `register` (`receipt`);

--
-- Constraints for table `idea`
--
ALTER TABLE `idea`
  ADD CONSTRAINT `idea_ibfk_1` FOREIGN KEY (`receipt1`) REFERENCES `register` (`receipt`),
  ADD CONSTRAINT `idea_ibfk_2` FOREIGN KEY (`receipt2`) REFERENCES `register` (`receipt`);

--
-- Constraints for table `minute`
--
ALTER TABLE `minute`
  ADD CONSTRAINT `minute_ibfk_1` FOREIGN KEY (`receipt1`) REFERENCES `register` (`receipt`),
  ADD CONSTRAINT `minute_ibfk_2` FOREIGN KEY (`receipt2`) REFERENCES `register` (`receipt`);

--
-- Constraints for table `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `quiz_ibfk_1` FOREIGN KEY (`receipt1`) REFERENCES `register` (`receipt`),
  ADD CONSTRAINT `quiz_ibfk_2` FOREIGN KEY (`receipt2`) REFERENCES `register` (`receipt`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
