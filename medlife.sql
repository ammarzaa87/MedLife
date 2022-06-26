-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2022 at 03:23 PM
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
  `patient_ssn` varchar(255) NOT NULL,
  `labtech_id` int(11) NOT NULL,
  `labtest_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_lab_res`
--

INSERT INTO `add_lab_res` (`id`, `patient_ssn`, `labtech_id`, `labtest_id`, `date`, `file`) VALUES
(1, '000047359813', 1, 1, '2022-05-19', 'LABTEST-6286727f6011d0.62871515.pdf'),
(2, '000047359813', 1, 5, '2022-05-26', 'LABTEST-62867388ce3e47.44879820.pdf'),
(8, '000047359813', 1, 10, '2022-06-16', 'LABTEST-62aa5b8c743020.51975484.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `add_radio_res`
--

CREATE TABLE `add_radio_res` (
  `id` int(11) NOT NULL,
  `patient_ssn` varchar(255) NOT NULL,
  `radiotech_id` int(11) NOT NULL,
  `radio_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_radio_res`
--

INSERT INTO `add_radio_res` (`id`, `patient_ssn`, `radiotech_id`, `radio_id`, `date`, `file`) VALUES
(1, '000047359813', 1, 1, '2022-05-19', 'TEST-628672014a8497.13783174.pdf'),
(7, '000047359813', 1, 11, '2022-06-16', 'TEST-62aa5bdb62a988.30143461.pdf');

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
(1, 'med_admin', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `patient_ssn` varchar(255) NOT NULL,
  `dr_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time_id` int(255) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `patient_ssn`, `dr_id`, `date`, `time_id`, `message`, `status`) VALUES
(1, '000047359813', 1, '2022-05-22', 1, '', 0),
(2, '000047359813', 1, '2022-05-22', 5, '', 0),
(3, '000047359813', 1, '2022-06-02', 3, '', 0),
(11, '000047359813', 1, '2022-06-30', 1, 'any', 0),
(12, '000047359813', 1, '2022-06-30', 2, 'any', 1);

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `description`, `category_id`, `name`, `image`, `date`) VALUES
(1, 'Why follow?Everyday Health covers health from A to Z—literally! This comprehensive site is a go-to resource for a wide range of symptoms and illnesses, as well as the latest news on developments in healthcare and breakthroughs in diseases. But the fun doesn’t stop there. Everyday Health also offers articles on mental and emotional health. Add in health tools like a symptom checker, meal planner and diabetes journal, and it’s easy to see that this site has something for everyone', 1, 'Everyday Health', 'IMG-6286205c1ba009.62960005.jpg', '2022-05-19'),
(2, 'Why follow?Everyday Health covers health from A to Z—literally! This comprehensive site is a go-to resource for a wide range of symptoms and illnesses, as well as the latest news on developments in healthcare and breakthroughs in diseases. But the fun doesn’t stop there. Everyday Health also offers articles on mental and emotional health. Add in health tools like a symptom checker, meal planner and diabetes journal, and it’s easy to see that this site has something for everyone', 1, 'Your Blood', 'IMG-6287a5ba4f6167.68012567.jpg', '2022-05-20');

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
(1, 'Aime', 'Nasser-Karam', '11111111', 'Female', '71696574', 'amnasser@medlife.org', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '1983-03-09', 'IMG-62a8d5cbe44b17.75727207.jpg', 'Cardiothoracic Surgery', 'El Marj, Bekaa, Lebanon', 'Cognitive Therapy Specialty at the Center for Cognitive Therapy (Now: Beck’s Institute), Penn University, Philadelphia, U.S.A\r\nPostdoc: Postgraduate Diploma in Advanced Cognitive Therapy Studies.  Oxford University, U.K\r\nDBT (Dialectical Behavioral Therapy), OCTC. Oxford, England'),
(2, 'Antoine', 'Challita', '2185745945', 'Male', '01 441 814', 'akchallita@medlife.org', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '1950-02-16', 'IMG-623c97b3de4d01.87169897.jpg', 'Family Medicine', 'Rawshi, Beirut, Lebanon', 'Medical School\r\n\r\nSaint Joseph University - Beirut - Lebanon\r\n\r\nResidency\r\n\r\nOccupational Medicine: Saint Joseph University - Beirut - Lebanon Family Medicine: American University of Beirut - Lebanon\r\n\r\nAcademic Rank\r\n\r\nInstructor of Clinical Family Medicine - Faculty of Medicine, University of Balamand'),
(3, 'Antoine', 'Jaklis', '4562849764', 'Male', '01 441 889', 'amjaklis@medlife.org', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '1980-06-11', 'IMG-623c9902ea8cd3.93284079.jpg', 'E.N.T.', 'El Marj, Bekaa, Lebanon', 'Lebanese Order of Physicians\r\nLebanese Society of O.R.L - Head and Neck Surgery\r\nLebanese Society of Endoscopic Surgery\r\nFrench Society of O.R.L - Head and Neck Surgery\r\nMediterranean Society of Facial Plastic Surgery'),
(4, 'Assaad', 'Maalouf', '1277895664', 'Male', '01 441 824', 'asnmaalouf@medlife.org', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '1980-11-11', 'doctor.png', 'Urology', 'Saida, South Lebanon, Lebanon', 'Medical School\r\n\r\nAmerican University of Beirut - Lebanon\r\n\r\nResidency\r\n\r\nInternal Medicine: Good Samaritan Hospital - U.S.A. and University of Utah - USA\r\nCardiology: University of Utah- USA\r\n\r\nAcademic Rank\r\n\r\nAssistant Professor of Clinical Medicine - Faculty of Medicine, University of Balamand');

-- --------------------------------------------------------

--
-- Table structure for table `dolab`
--

CREATE TABLE `dolab` (
  `id` int(11) NOT NULL,
  `labtest_id` int(11) NOT NULL,
  `patient_ssn` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dolab`
--

INSERT INTO `dolab` (`id`, `labtest_id`, `patient_ssn`, `status`, `date`) VALUES
(1, 1, '000047359813', 0, '2022-05-19'),
(2, 5, '000047359813', 0, '2022-05-27'),
(9, 5, '000047359813', 1, '2022-06-30'),
(10, 10, '000047359813', 0, '2022-07-01');

-- --------------------------------------------------------

--
-- Table structure for table `doradio`
--

CREATE TABLE `doradio` (
  `id` int(11) NOT NULL,
  `radio_id` int(11) NOT NULL,
  `patient_ssn` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doradio`
--

INSERT INTO `doradio` (`id`, `radio_id`, `patient_ssn`, `status`, `date`) VALUES
(1, 1, '000047359813', 0, '2022-05-19'),
(7, 5, '000047359813', 1, '2022-06-30'),
(8, 11, '000047359813', 0, '2022-07-01');

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
(113, 1, 1, '2022-06-30', 0),
(114, 1, 2, '2022-06-30', 0),
(115, 1, 3, '2022-06-30', 1),
(116, 1, 4, '2022-06-30', 1),
(117, 1, 5, '2022-06-30', 1),
(118, 1, 6, '2022-06-30', 1),
(119, 1, 7, '2022-06-30', 1),
(120, 1, 8, '2022-06-30', 1),
(121, 1, 9, '2022-06-30', 1),
(122, 1, 10, '2022-06-30', 1),
(123, 1, 11, '2022-06-30', 1),
(124, 1, 12, '2022-06-30', 1),
(125, 1, 13, '2022-06-30', 1),
(126, 1, 14, '2022-06-30', 1),
(127, 1, 15, '2022-06-30', 1),
(128, 1, 16, '2022-06-30', 1);

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
(1, 'emad', '78 000 000', 'Zaarour', '2002-02-20', 'emadzaa', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'Male'),
(2, 'Rayan', '71600600', 'Zaarour', '2004-03-10', 'rayanzaa', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `labtests`
--

CREATE TABLE `labtests` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `labtests`
--

INSERT INTO `labtests` (`id`, `name`) VALUES
(1, 'Complete Blood Count\r\n'),
(2, 'Prothrombin Time'),
(3, 'Basic Metabolic Panel'),
(4, 'Comprehensive Metabolic Panel'),
(5, 'Lipid Panel'),
(6, 'Liver Panel'),
(7, 'Thyroid Stimulating Hormone'),
(8, 'Hemoglobin A1C'),
(9, 'Urinalysis'),
(10, 'Cultures');

-- --------------------------------------------------------

--
-- Table structure for table `monitoring`
--

CREATE TABLE `monitoring` (
  `id` int(11) NOT NULL,
  `patient_ssn` varchar(255) NOT NULL,
  `nurse_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(255) NOT NULL,
  `pressure` varchar(255) NOT NULL,
  `diabetes` varchar(255) NOT NULL,
  `heartbeat` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `monitoring`
--

INSERT INTO `monitoring` (`id`, `patient_ssn`, `nurse_id`, `date`, `time`, `pressure`, `diabetes`, `heartbeat`) VALUES
(1, '00004737832', 1, '2022-05-22', '02:21 am', '92', '80', 90),
(2, '000047359844', 1, '2022-05-22', '10:22 am', '90', '90', 90),
(6, '000047359813', 1, '2022-06-16', '01:24 am', '10000', '10000', 10000);

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

--
-- Dumping data for table `nurses`
--

INSERT INTO `nurses` (`id`, `fname`, `lname`, `username`, `password`, `birth`, `phone`, `gender`) VALUES
(1, 'Hussien', 'Zaarour', 'husszaa', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '1999-04-12', '76 767 676', 'Male'),
(2, 'Alaa', 'Zaarour', 'alaazaa', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '1996-07-25', '71717171', 'Female');

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

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `ssn`, `fname`, `lname`, `profile`, `email`, `phone`, `password`, `gender`, `birth`, `address`, `is_critical`) VALUES
(1, '000047359813', 'Ammar ', 'Zaarour', 'IMG-62a9cacc3fb5c1.14115066.jpg', 'ammar.rushdi.zaarour@gmail.com', '71696574', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'Male', '2000-04-12', 'El-Marj, Bekaa, Lebanon', 1),
(2, '00004737832', 'Ali', 'haidar', 'IMG-62867e09deb714.30441724.jpg', 'ali.haidar@gmail.com', '71 232323', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'Male', '1990-12-05', 'Bar-Elias, Bekaa, Lebanon', 1),
(3, '000047359890', 'Rola', 'Shehab', 'user.jpg', 'rola.she@gmail.com', '71 676767', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'Female', '1989-12-07', 'Hamra, Beirut, Lebanon', 0),
(4, '000047359833', 'Rana', 'Haj', 'IMG-62867f47d94009.52264382.jpg', 'rana.haj@gmail.com', '03 555555', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'Female', '1995-12-05', 'Nabatieh, South Lebanon, Lebanon', 0),
(5, '000047359844', 'Khaled', 'Hali', 'IMG-6286804834d4b7.67672678.jpg', 'khaled.hali@gmail.com', '81 765645', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'Male', '1980-09-18', 'Khiam, South Lebanon, Lebanon', 1);

-- --------------------------------------------------------

--
-- Table structure for table `radios`
--

CREATE TABLE `radios` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `radios`
--

INSERT INTO `radios` (`id`, `name`) VALUES
(1, 'X-ray'),
(2, 'Magnetic Resonance Imaging (MRI)'),
(3, 'Magnetic Resonance Angiogram (MRA)'),
(4, 'Ultrasound'),
(5, 'Color Doppler'),
(6, 'Computed Tomography (CT Scan)'),
(7, 'Mammography'),
(8, 'PET Scan'),
(9, 'Bone Density test'),
(10, 'Biopsy'),
(11, 'Fluoroscopy');

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
(1, 'Mohammad', 'Zaarour', 'moezaa', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '1997-03-06', '71 400 000', 'Male'),
(2, 'Ahmad', 'Zaarour', 'ahmadzaa', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '1994-03-10', '71600000', 'Male');

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
-- Indexes for table `monitoring`
--
ALTER TABLE `monitoring`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `add_radio_res`
--
ALTER TABLE `add_radio_res`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `dolab`
--
ALTER TABLE `dolab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `doradio`
--
ALTER TABLE `doradio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `has_time`
--
ALTER TABLE `has_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `labtech`
--
ALTER TABLE `labtech`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `labtests`
--
ALTER TABLE `labtests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `monitoring`
--
ALTER TABLE `monitoring`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nurses`
--
ALTER TABLE `nurses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `radios`
--
ALTER TABLE `radios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `radiotech`
--
ALTER TABLE `radiotech`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `timing`
--
ALTER TABLE `timing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
