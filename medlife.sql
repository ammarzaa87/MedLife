-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2022 at 07:55 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medlife`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_lab_res`
--

CREATE TABLE `add_lab_res` (
  `id` int(11) NOT NULL,
  `patient_ssn` int(11) NOT NULL,
  `labtech_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `add_radio_res`
--

CREATE TABLE `add_radio_res` (
  `id` int(11) NOT NULL,
  `patient_ssn` int(11) NOT NULL,
  `radiotech_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'med_admin', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `patient_ssn` int(11) NOT NULL,
  `dr_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Health content'),
(2, 'Health strategy'),
(3, 'Health research'),
(4, 'Health care');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `dr_id` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birth` date NOT NULL,
  `profile` varchar(255) NOT NULL,
  `speciality` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `biography` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `first_name`, `last_name`, `dr_id`, `gender`, `phone`, `email`, `password`, `birth`, `profile`, `speciality`, `address`, `biography`) VALUES
(1, 'Aimee', 'Nasser-Karam', '7832675362', 'Female', '03 920717', 'amnasser@medlife.org', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '1983-03-09', 'IMG-623c963d73c1d7.18778331.jpg', 'Cardiothoracic Surgery', 'Hamra, Beirut, Lebanon', 'Cognitive Therapy Specialty at the Center for Cognitive Therapy (Now: Beck’s Institute), Penn University, Philadelphia, U.S.A\nPostdoc: Postgraduate Diploma in Advanced Cognitive Therapy Studies.  Oxford University, U.K\nDBT (Dialectical Behavioral Therapy), OCTC. Oxford, England'),
(3, 'Antoine', 'Challita', '2185745945', 'Male', '01 441 814', 'akchallita@medlife.org', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '2022-03-16', 'IMG-623c97b3de4d01.87169897.jpg', 'Family Medicine', 'Rawshi, Beirut, Lebanon', 'Medical School\n\nSaint Joseph University - Beirut - Lebanon\n\nResidency\n\nOccupational Medicine: Saint Joseph University - Beirut - Lebanon Family Medicine: American University of Beirut - Lebanon\n\nAcademic Rank\n\nInstructor of Clinical Family Medicine - Faculty of Medicine, University of Balamand'),
(4, 'Antoine', 'Jaklis', '4562849764', 'Male', '01 441 889', 'amjaklis@medlife.org', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '1980-06-11', 'IMG-623c9902ea8cd3.93284079.jpg', 'E.N.T.', 'Bar-Elias, Bekaa, Lebanon', 'Lebanese Order of Physicians\r\nLebanese Society of O.R.L - Head and Neck Surgery\r\nLebanese Society of Endoscopic Surgery\r\nFrench Society of O.R.L - Head and Neck Surgery\r\nMediterranean Society of Facial Plastic Surgery'),
(5, 'Assaad', 'Maalouf', '1277895664', 'Male', '01 441 824', 'asnmaalouf@medlife.org', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '1980-11-11', 'doctor.jpg', 'Urology', 'Saida, South Lebanon, Lebanon', 'Medical School\r\n\r\nAmerican University of Beirut - Lebanon\r\n\r\nResidency\r\n\r\nInternal Medicine: Good Samaritan Hospital - U.S.A. and University of Utah - USA\r\nCardiology: University of Utah- USA\r\n\r\nAcademic Rank\r\n\r\nAssistant Professor of Clinical Medicine - Faculty of Medicine, University of Balamand'),
(6, 'Aida', 'Yazigi ', '7693576589', 'Female', '01 441 733', 'avyazigi@medlife.org', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '1971-02-24', 'f-doctor.jpg', 'Gastroenterology', 'Baabda, Mount Lebanon, Lebanon', 'Medical School\r\n\r\nAmerican University of Beirut - Lebanon\r\n\r\nResidency\r\n\r\nPediatrics: American University of Beirut - Lebanon\r\n\r\nAcademic Rank\r\n\r\nProfessor of Clinical Pediatrics- Faculty of Medicine - University of Balamand'),
(15, 'ammar', 'zaa', '32323', 'Male', '71696574', 'ammar.rushdi.zaarour@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '2022-04-13', 'doctor.jpg', 'Family Medicine', 'beqaa, Bekaa, Lebanon', '');

-- --------------------------------------------------------

--
-- Table structure for table `dolab`
--

CREATE TABLE `dolab` (
  `id` int(11) NOT NULL,
  `labtest_id` int(11) NOT NULL,
  `patient_ssn` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doradio`
--

CREATE TABLE `doradio` (
  `id` int(11) NOT NULL,
  `radio_id` int(11) NOT NULL,
  `patient_ssn` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `has_time`
--

CREATE TABLE `has_time` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `timing_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `availability` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `has_time`
--

INSERT INTO `has_time` (`id`, `doctor_id`, `timing_id`, `date`, `availability`) VALUES
(60, 3, 10, '2022-04-13', 1),
(61, 3, 11, '2022-04-13', 1),
(62, 3, 12, '2022-04-13', 1),
(63, 3, 13, '2022-04-13', 1),
(64, 3, 14, '2022-04-13', 1),
(65, 3, 15, '2022-04-13', 1),
(66, 3, 16, '2022-04-13', 1),
(67, 3, 17, '2022-04-13', 1),
(68, 3, 18, '2022-04-13', 1),
(69, 3, 19, '2022-04-13', 1),
(70, 6, 18, '2022-04-13', 1),
(71, 6, 19, '2022-04-13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `labtech`
--

CREATE TABLE `labtech` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `birth` date NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `labtech`
--

INSERT INTO `labtech` (`id`, `fname`, `phone`, `lname`, `birth`, `username`, `password`, `gender`) VALUES
(5, 'ammar', '71696574', 'zaa', '2000-04-12', 'ammarzaa', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `labtests`
--

CREATE TABLE `labtests` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nurses`
--

CREATE TABLE `nurses` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birth` date NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `ssn` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `birth` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `is_critical` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `radios`
--

CREATE TABLE `radios` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `radiotech`
--

CREATE TABLE `radiotech` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birth` date NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `radiotech`
--

INSERT INTO `radiotech` (`id`, `fname`, `lname`, `username`, `password`, `birth`, `phone`, `gender`) VALUES
(5, 'ammar', 'zaa', '21730137', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '2022-05-05', '71696574', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `timing`
--

CREATE TABLE `timing` (
  `id` int(11) NOT NULL,
  `fromm` varchar(255) NOT NULL,
  `too` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timing`
--

INSERT INTO `timing` (`id`, `fromm`, `too`) VALUES
(1, '08:00 AM', '08:30 AM'),
(2, '08:30 AM', '09:00 AM'),
(3, '09:00 AM', '09:30 AM'),
(4, '09:30 AM', '10:00 AM'),
(5, '10:00 AM', '10:30 AM'),
(6, '10:30 AM', '11:00 AM'),
(7, '11:00 AM', '11:30 AM'),
(8, '11:30 AM', '12:00 PM'),
(9, '12:00 PM', '12:30 PM'),
(10, '12:30 PM', '01:00 PM'),
(11, '01:00 PM', '01:30 PM'),
(12, '01:30 PM', '02:00 PM'),
(13, '02:00 PM', '02:30 PM'),
(14, '02:30 PM', '03:00 PM'),
(15, '03:00 PM', '03:30 PM'),
(16, '03:30 PM', '04:00 PM'),
(17, '04:00 PM', '04:30 PM'),
(18, '04:30 PM', '05:00 PM '),
(19, '05:00 PM', '05:30 PM'),
(20, '05:30 PM', '06:00 PM'),
(21, '06:00 PM', '06:30 PM'),
(22, '06:30 PM', '07:00 PM'),
(23, '07:00 PM', '07:30 PM'),
(24, '07:30 PM', '08:00 PM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_lab_res`
--
ALTER TABLE `add_lab_res`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_radio_res`
--
ALTER TABLE `add_radio_res`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dolab`
--
ALTER TABLE `dolab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doradio`
--
ALTER TABLE `doradio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `has_time`
--
ALTER TABLE `has_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `labtech`
--
ALTER TABLE `labtech`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `labtests`
--
ALTER TABLE `labtests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nurses`
--
ALTER TABLE `nurses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `radios`
--
ALTER TABLE `radios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `radiotech`
--
ALTER TABLE `radiotech`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timing`
--
ALTER TABLE `timing`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_lab_res`
--
ALTER TABLE `add_lab_res`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `add_radio_res`
--
ALTER TABLE `add_radio_res`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `dolab`
--
ALTER TABLE `dolab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doradio`
--
ALTER TABLE `doradio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `has_time`
--
ALTER TABLE `has_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `labtech`
--
ALTER TABLE `labtech`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `labtests`
--
ALTER TABLE `labtests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nurses`
--
ALTER TABLE `nurses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `radios`
--
ALTER TABLE `radios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `radiotech`
--
ALTER TABLE `radiotech`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `timing`
--
ALTER TABLE `timing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
