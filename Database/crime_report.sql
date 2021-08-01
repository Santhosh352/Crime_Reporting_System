-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2021 at 08:54 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crime_report`
--

-- --------------------------------------------------------

--
-- Table structure for table `case_status`
--

CREATE TABLE `case_status` (
  `fir_no` bigint(10) NOT NULL,
  `case_id` int(11) NOT NULL,
  `case_type` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `police_station_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `case_status`
--

INSERT INTO `case_status` (`fir_no`, `case_id`, `case_type`, `date`, `status`, `police_station_name`) VALUES
(2003010013, 3, 'Robbery', '2020-02-05', 'Successful', 'Thirtahalli Police Station'),
(2003300010, 1, 'murder', '2020-01-30', 'Successful', 'Nanjanagudu Police Station'),
(2010050005, 2, 'Chain Snatching', '2020-09-28', 'Pending', 'Bailahongal Police Station');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `CaseId` int(11) NOT NULL,
  `CaseType` varchar(30) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `District` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `Area` varchar(50) NOT NULL,
  `Pincode` int(6) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `police_station_name` varchar(50) NOT NULL,
  `Aadhar_No` bigint(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`CaseId`, `CaseType`, `Date`, `Time`, `District`, `city`, `Area`, `Pincode`, `Description`, `police_station_name`, `Aadhar_No`) VALUES
(1, 'Murder', '2020-01-30', '07:30:00', 'Mysore', 'Nanjanagudu', '2nd cross, Shankarpur', 571301, 'The person vishal, he lived in Shankrapur. This morning he was murdered. The murderer was stranger, he looks like 6 feet height and has bluish eyes', 'Nanjanagudu Police Station', 147852369852),
(2, 'Chain Snatching', '2020-09-28', '20:00:00', 'Belagaum', 'Bailahongal', '5th cross, Bharathinagar', 591102, 'A chain snatcher came through a bike. He snatch the gold chain of my cousin when she was at market. The bike number is KA-09-AB-1324.', 'Bailahongal Police Station', 896321475289),
(3, 'Robbery', '2020-02-05', '12:30:00', 'Shivamogga', 'Thirtahalli', '#198, 2nd cross, Bharathinagar', 577432, 'In bharathinagar some people smuggling the drugs from last week', 'Thirtahalli Police Station', 258741236985);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(255) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `Name`, `Email`, `Message`) VALUES
(1, 'Hitesh Gowda', 'Hiteshgowda56@gmail.com', 'Recently I changed my phone number. So please update my phone number. My new phone number is 9925613211');

-- --------------------------------------------------------

--
-- Table structure for table `judgement_report`
--

CREATE TABLE `judgement_report` (
  `jr_no` bigint(10) NOT NULL,
  `fir_no` bigint(10) NOT NULL,
  `case_type` varchar(30) NOT NULL,
  `court_type` varchar(30) NOT NULL,
  `judgement_date` date NOT NULL,
  `judgement` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `judgement_report`
--

INSERT INTO `judgement_report` (`jr_no`, `fir_no`, `case_type`, `court_type`, `judgement_date`, `judgement`) VALUES
(2003290011, 2003010013, 'Robbery', 'District Court', '2020-03-29', 'Under \"section 392\" of the indian penal code, the accused person should pay a fine of 2-lakhs and should be in imprisonment for 6-months'),
(2003300015, 2003300010, 'murder', 'High Court', '2020-03-30', 'Under \"section 302\" of the indian penal code, the accused person is punished with death sentence');

-- --------------------------------------------------------

--
-- Table structure for table `police`
--

CREATE TABLE `police` (
  `Pid` varchar(8) NOT NULL,
  `FName` varchar(30) NOT NULL,
  `LName` varchar(30) DEFAULT NULL,
  `Mail` varchar(30) NOT NULL,
  `PhNo` bigint(10) NOT NULL,
  `Station_Name` varchar(50) NOT NULL,
  `District` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `Pincode` int(6) NOT NULL,
  `police_photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `police`
--

INSERT INTO `police` (`Pid`, `FName`, `LName`, `Mail`, `PhNo`, `Station_Name`, `District`, `city`, `Pincode`, `police_photo`) VALUES
('DAHS021', 'Akshay', 'kumar', 'Akshay021@gmail.com', 9951357860, 'Hubli Suburbun Police Station', 'Dharwad', 'Hubli', 580020, '../upload/police3.png'),
('KABE1012', 'Harshith', 'Prasad', 'Harshith10@gmail.com', 9514793258, 'Bailahongal Police Station', 'Belagaum', 'Bailahongal', 591102, '../upload/police4.png'),
('MYNA121', 'Vedanth', 'Bakshi', 'Vedanthbakshi01@gmail.com', 9638521470, 'Nanjanagudu Police Station', 'Mysore', 'Nanjanagudu', 571301, '../upload/police1.png'),
('SHTH001', 'Umesh', 'Yadav', 'Yadav018@gmail.com', 8895136974, 'Thirtahalli Police Station', 'Shivamogga', 'Thirtahalli', 577432, '../upload/police2.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_register`
--

CREATE TABLE `user_register` (
  `AadharNo` bigint(12) NOT NULL,
  `FName` varchar(30) NOT NULL,
  `LName` varchar(30) DEFAULT NULL,
  `Mail` varchar(30) NOT NULL,
  `PhNo` bigint(10) NOT NULL,
  `District` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `Area` varchar(50) NOT NULL,
  `Pincode` int(6) NOT NULL,
  `psw` varchar(15) NOT NULL,
  `user_type` varchar(5) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_register`
--

INSERT INTO `user_register` (`AadharNo`, `FName`, `LName`, `Mail`, `PhNo`, `District`, `city`, `Area`, `Pincode`, `psw`, `user_type`) VALUES
(147852369852, 'Hitesh', 'Gowda', 'Hiteshgowda56@gmail.com', 8648129753, 'Mysore', 'Nanjanagudu', '#123,Vidyanagar Extension', 571301, 'Hitesh@426', 'user'),
(258741236985, 'Gautam', 'Nayak', 'Gautamnayak023@gmail.com', 9845632471, 'Shivamogga', 'Thirtahalli', '#30,1st ward,Azad Rd,Thirtahalli', 577432, 'Nayak@357', 'user'),
(357914682284, 'Rohan', 'Shetty', 'Rohanshetty235@gmail.com', 9632587159, 'Chikkamagalore', 'Sringeri', '#150 Harihara st', 577139, 'Rohan@4268', 'user'),
(896321475289, 'Charan', 'Patel', 'Charanpatel156@gmail.com', 8975362414, 'Belagaum', 'Bailahongal', '#567,3rd cross, Basavi Circle', 591102, 'Charan@486', 'user'),
(963287414562, 'Aditya', 'Verma', 'Aditya123@gmail.com', 9951357860, 'Ballary', 'Sandur', '#51,15th Ward,Subhash Nagar', 583119, 'Aditya@123', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `wanted_criminals`
--

CREATE TABLE `wanted_criminals` (
  `Criminal_id` varchar(5) NOT NULL,
  `FName` varchar(30) NOT NULL,
  `LName` varchar(30) DEFAULT NULL,
  `Age` int(11) NOT NULL,
  `Religion` varchar(15) NOT NULL,
  `Crimes` varchar(100) NOT NULL,
  `criminal_photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wanted_criminals`
--

INSERT INTO `wanted_criminals` (`Criminal_id`, `FName`, `LName`, `Age`, `Religion`, `Crimes`, `criminal_photo`) VALUES
('MK015', 'Jhon', 'Mark', 39, 'Christian', '2 Murders and Kidnapping cases', '../upload/criminal1.png'),
('MM001', 'Madoor', 'Isubu', 35, 'Muslim', '2-Muders', '../upload/criminal2.png'),
('RH203', 'Prakash', 'Babu', 30, 'Hindu', '5 Robbery cases', '../upload/criminal3.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `case_status`
--
ALTER TABLE `case_status`
  ADD PRIMARY KEY (`fir_no`),
  ADD KEY `fk1` (`case_id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`CaseId`),
  ADD KEY `fk0` (`Aadhar_No`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `judgement_report`
--
ALTER TABLE `judgement_report`
  ADD PRIMARY KEY (`jr_no`),
  ADD KEY `fk2` (`fir_no`);

--
-- Indexes for table `police`
--
ALTER TABLE `police`
  ADD PRIMARY KEY (`Pid`);

--
-- Indexes for table `user_register`
--
ALTER TABLE `user_register`
  ADD PRIMARY KEY (`AadharNo`);

--
-- Indexes for table `wanted_criminals`
--
ALTER TABLE `wanted_criminals`
  ADD PRIMARY KEY (`Criminal_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `CaseId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2011200010;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `case_status`
--
ALTER TABLE `case_status`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`case_id`) REFERENCES `complaint` (`CaseId`) ON DELETE CASCADE;

--
-- Constraints for table `complaint`
--
ALTER TABLE `complaint`
  ADD CONSTRAINT `fk0` FOREIGN KEY (`Aadhar_No`) REFERENCES `user_register` (`AadharNo`) ON DELETE CASCADE;

--
-- Constraints for table `judgement_report`
--
ALTER TABLE `judgement_report`
  ADD CONSTRAINT `fk2` FOREIGN KEY (`fir_no`) REFERENCES `case_status` (`fir_no`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
