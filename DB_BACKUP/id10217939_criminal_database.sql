-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 03, 2019 at 10:43 PM
-- Server version: 10.3.16-MariaDB
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
-- Database: `id10217939_criminal_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

CREATE TABLE `cases` (
  `Case_id` int(11) NOT NULL,
  `Pt_id` int(11) NOT NULL,
  `P_id` varchar(10) DEFAULT NULL,
  `Case_date` date NOT NULL,
  `Crime_type` varchar(100) NOT NULL,
  `Victims` int(11) NOT NULL,
  `Description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`Case_id`, `Pt_id`, `P_id`, `Case_date`, `Crime_type`, `Victims`, `Description`) VALUES
(35, 12, 'abm_00', '2019-08-04', 'Attempt to murder', 2, 'Gun Shot.'),
(37, 15, 'abm_00', '2017-11-02', 'Thief', 45, 'random picking objectives '),
(38, 14, 'robin_00', '2019-08-04', ' Human Trafficking', 10, '10 person are taken to Malaysia illegally.'),
(39, 16, 'robin_00', '2019-07-29', 'Question out', 100, 'Question out in public exam'),
(40, 17, 'robin_00', '2019-07-28', 'Drug Selling', 23, 'Drug trafficking and selling '),
(41, 19, 'abm_00', '2019-07-31', 'Murder', 10, 'Mass Shooting'),
(42, 20, 'auna96', '2019-08-08', 'Murder', 1, 'His brother was killed by his uncle for unknown reasons.'),
(43, 21, 'iqra_00', '2019-08-08', 'Murder', 2, 'Shot'),
(44, 22, 'abm_00', '2019-09-09', 'Vandalism', 1, 'ghfvhhhfv');

-- --------------------------------------------------------

--
-- Table structure for table `criminals`
--

CREATE TABLE `criminals` (
  `C_id` int(11) NOT NULL,
  `Case_id` int(11) DEFAULT NULL,
  `C_name` varchar(100) NOT NULL,
  `Gender` enum('M','F','N') NOT NULL,
  `Age` int(2) NOT NULL,
  `Height` double(3,2) NOT NULL,
  `Weight` double(5,2) NOT NULL,
  `Build` enum('Buff','Skinny','Chubby') NOT NULL,
  `Hair_color` varchar(20) NOT NULL,
  `Eye_color` varchar(20) NOT NULL,
  `NID` int(11) NOT NULL,
  `Arrest_date` date NOT NULL,
  `C_photo` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `criminals`
--

INSERT INTO `criminals` (`C_id`, `Case_id`, `C_name`, `Gender`, `Age`, `Height`, `Weight`, `Build`, `Hair_color`, `Eye_color`, `NID`, `Arrest_date`, `C_photo`) VALUES
(31, 35, 'Khur Sifat', 'M', 23, 5.00, 56.00, 'Chubby', 'black', 'grey', 543253434, '2019-08-01', ''),
(35, 37, 'Moynar Ma', 'F', 50, 5.00, 49.00, 'Skinny', 'black', 'black', 12345, '2018-12-01', ''),
(37, 38, 'Rohim Bepari', 'M', 54, 5.22, 70.00, 'Buff', 'white', 'black', 12376345, '2019-06-12', ''),
(38, 39, 'Golam Robbani', 'M', 23, 5.60, 62.00, 'Skinny', 'black', 'black', 445533234, '2019-07-11', ''),
(39, 40, 'Rohim Bepari', 'M', 54, 5.22, 70.00, 'Buff', 'white', 'black', 12376345, '2019-06-12', ''),
(41, 44, 'Kaula', 'N', 33, 6.00, 67.00, 'Buff', 'grey', 'red', 0, '2019-09-09', '');

-- --------------------------------------------------------

--
-- Table structure for table `plaintiffs`
--

CREATE TABLE `plaintiffs` (
  `Pt_id` int(11) NOT NULL,
  `Pt_name` varchar(60) NOT NULL,
  `Gender` enum('M','F','N') NOT NULL,
  `Age` int(11) NOT NULL,
  `Email` text NOT NULL,
  `Phone` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plaintiffs`
--

INSERT INTO `plaintiffs` (`Pt_id`, `Pt_name`, `Gender`, `Age`, `Email`, `Phone`) VALUES
(12, 'Rayhan', 'M', 24, 'as@asd.com', '123423'),
(14, 'Kazi Asif', 'M', 30, 'kazi.asif@gmail.com', '345432122'),
(15, 'Shifat', 'M', 25, 'say@a.com', '69696'),
(16, 'Rafi', 'M', 32, 'rafi@gmail.com', '023457683'),
(17, 'Nafis Iqbal', 'M', 35, 'nafis@gmail.com', '0111223344'),
(19, 'Hasib', 'M', 20, '567@gmail.com', '0054354535'),
(20, 'Robiul Islam', 'M', 35, 'rob@gmail.com', '036346474'),
(21, 'Iftekhar', 'M', 35, 'iftekhar.mobin@gmail.com', '01817180000'),
(22, 'Nahian', 'M', 25, 'nahian@gmail.com', '94375349589');

-- --------------------------------------------------------

--
-- Table structure for table `polices`
--

CREATE TABLE `polices` (
  `P_id` varchar(25) NOT NULL,
  `P_name` varchar(100) NOT NULL,
  `Gender` enum('M','F') NOT NULL,
  `Age` int(2) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `P_photo` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `polices`
--

INSERT INTO `polices` (`P_id`, `P_name`, `Gender`, `Age`, `Email`, `P_photo`) VALUES
('abm_00', 'Abm Sayad', 'M', 25, 'abmmmm@gmail.com', ''),
('auna96', 'Fauzia Faria Auna', 'F', 23, 'fauzia@gmail.com', ''),
('hasib_00', 'Hasib Islam', 'M', 23, 'hasib@gmail.com', ''),
('iqra_00', 'Ibrahim Iqra', 'M', 22, 'ibrahimiqra1@gmail.com', ''),
('naj_00', 'Najmul Islam', 'M', 28, 'naj@gmail.com', ''),
('raihan_00', 'Raihan Rahman', 'M', 24, 'robin@gmail.com', ''),
('robin_00', 'Robin Hossain', 'M', 22, 'robin@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `P_id` varchar(25) NOT NULL,
  `Pass` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`P_id`, `Pass`) VALUES
('abm_00', '$2y$10$bty5o2ORm8nXXwPXIycfBuNuhzlEXzW2MH.OiBsSjO1Fv3YxtqlaG'),
('auna96', '$2y$10$IPXnO1o6hmJzdC1aP8Ub4O9ygnw.S2TnZZEY1DoibZy7qwKq27Z22'),
('hasib_00', '$2y$10$w8VpJxMjlKxhtyF/LtWt1ejnkjUkRprWwb4KfTXyELB4WyTqB1uuW'),
('iqra_00', '$2y$10$BpkblxFarVq8hL4/0ZzM6ebFsa0pCAllJL/NMHChGfvOTebkE86Z2'),
('naj_00', '$2y$10$WHg8H59y5uU3cuV./Nt58ee..zNuBPN3Qb.mZuCuhQB7r9ZPVCw1a'),
('raihan_00', '$2y$10$n7h59dFhIEM/QOhPVBaimu1DQeXrq.WSIjSKxnt5qTK4tO6NLyfdC'),
('robin_00', '$2y$10$qeBnZWTAlqadVByKoZnQceHThoVKk6aEx3Verxlx3RjTawo7CTewK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cases`
--
ALTER TABLE `cases`
  ADD PRIMARY KEY (`Case_id`),
  ADD KEY `P_id` (`P_id`),
  ADD KEY `cases_ibfk_2` (`Pt_id`);

--
-- Indexes for table `criminals`
--
ALTER TABLE `criminals`
  ADD PRIMARY KEY (`C_id`),
  ADD KEY `Case_id` (`Case_id`);

--
-- Indexes for table `plaintiffs`
--
ALTER TABLE `plaintiffs`
  ADD PRIMARY KEY (`Pt_id`);

--
-- Indexes for table `polices`
--
ALTER TABLE `polices`
  ADD PRIMARY KEY (`P_id`),
  ADD KEY `P_id` (`P_id`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`P_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cases`
--
ALTER TABLE `cases`
  MODIFY `Case_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `criminals`
--
ALTER TABLE `criminals`
  MODIFY `C_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `plaintiffs`
--
ALTER TABLE `plaintiffs`
  MODIFY `Pt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cases`
--
ALTER TABLE `cases`
  ADD CONSTRAINT `cases_ibfk_1` FOREIGN KEY (`P_id`) REFERENCES `polices` (`P_id`),
  ADD CONSTRAINT `cases_ibfk_2` FOREIGN KEY (`Pt_id`) REFERENCES `plaintiffs` (`Pt_id`);

--
-- Constraints for table `criminals`
--
ALTER TABLE `criminals`
  ADD CONSTRAINT `criminals_ibfk_1` FOREIGN KEY (`Case_id`) REFERENCES `cases` (`Case_id`);

--
-- Constraints for table `polices`
--
ALTER TABLE `polices`
  ADD CONSTRAINT `polices_ibfk_1` FOREIGN KEY (`P_id`) REFERENCES `userinfo` (`P_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
