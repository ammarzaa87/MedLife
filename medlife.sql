-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2022 at 08:48 PM
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
  `patient_ssn` varchar(255) NOT NULL,
  `dr_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time_id` varchar(255) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `patient_ssn`, `dr_id`, `date`, `time_id`, `message`, `status`) VALUES
(23, '0000123456789', 3, '2022-04-13', '10', 'hhhhhhhhhhhh', 1),
(24, '0000123456789', 3, '2022-04-01', '11', 'hhhhhhhhh', 0),
(25, '0000123456789', 3, '2022-04-13', '12', 'kkkkkk', 1),
(27, '0000123456789', 3, '2022-04-13', '19', 'hhhhhhhhhhh', 1),
(28, '0000123456789', 3, '2022-04-01', '15', '', 1);

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

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `description`, `category_id`, `name`, `image`) VALUES
(9, 'Artificial intelligence can now predict one of the leading causes of avoidable patient harm up to two days before it happens, as demonstrated by our latest research published in Nature. Working alongside experts from the US Department of Veterans Affairs (VA), we have developed technology that, in the future, could give doctors a 48-hour head start in treating acute kidney injury (AKI), a condition that is associated with over 100,000 people in the UK every year. These findings come alongside a peer-reviewed service evaluation of Streams, our mobile assistant for clinicians, which shows that patient care can be improved, and health care costs reduced, through the use of digital tools. Together, they form the foundation for a transformative advance in medicine, helping to move from reactive to preventative models of care.', 4, 'Using AI', 'IMG-625af64150ba02.29118013.jpg'),
(10, 'Last week marked a major milestone in studying the human genome. Since the early 2000s, the Human Genome Project has published successive versions of their map, or \"sequence,\" of the human genome. While rightfully acclaimed, even the final version was incomplete - leaving about 8% of the genome undeciphered -and the job not yet done. Subsequent work by the Genome Reference Consortium and others filled in only a portion of the gaps. Persistent technological limitations stymied these attempts, but those barriers have now fallen in what has been described as a technical tour de force, yielding close to a complete sequence.', 2, 'Giant Leap for Human Genomics', 'IMG-625af6ed1914f3.70947754.jpg');

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
(5, 'Assaad', 'Maalouf', '1277895664', 'Male', '01 441 824', 'asnmaalouf@medlife.org', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '1980-11-11', 'doctor.png', 'Urology', 'Saida, South Lebanon, Lebanon', 'Medical School\r\n\r\nAmerican University of Beirut - Lebanon\r\n\r\nResidency\r\n\r\nInternal Medicine: Good Samaritan Hospital - U.S.A. and University of Utah - USA\r\nCardiology: University of Utah- USA\r\n\r\nAcademic Rank\r\n\r\nAssistant Professor of Clinical Medicine - Faculty of Medicine, University of Balamand'),
(6, 'Aida', 'Yazigi ', '7693576589', 'Female', '01 441 733', 'avyazigi@medlife.org', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '1971-02-24', 'f-doctor.png', 'Gastroenterology', 'Baabda, Mount Lebanon, Lebanon', 'Medical School\r\n\r\nAmerican University of Beirut - Lebanon\r\n\r\nResidency\r\n\r\nPediatrics: American University of Beirut - Lebanon\r\n\r\nAcademic Rank\r\n\r\nProfessor of Clinical Pediatrics- Faculty of Medicine - University of Balamand'),
(22, 'jaber', 'shmoury', '1212', 'Male', '81868008', 'jaber@gmail', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '2022-03-29', 'doctor.png', 'Neurology', 'beqaa, Bekaa, Lebanon', 'dmagjdfhgwfjdsadghad');

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
(1, 1, '123456789', 1, '2022-04-20'),
(2, 2, '0000123456789', 1, '2022-04-23'),
(3, 3, '0000123456789', 1, '2022-04-30');

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
(1, 5, '123456789', 1, '2022-04-21');

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
(60, 3, 10, '2022-04-13', 0),
(61, 3, 11, '2022-04-13', 1),
(62, 3, 12, '2022-04-13', 0),
(63, 3, 13, '2022-04-13', 1),
(64, 3, 14, '2022-04-13', 1),
(65, 3, 15, '2022-04-13', 0),
(66, 3, 16, '2022-04-13', 1),
(67, 3, 17, '2022-04-13', 1),
(68, 3, 18, '2022-04-13', 1),
(69, 3, 19, '2022-04-13', 0),
(70, 6, 18, '2022-04-13', 1),
(71, 6, 19, '2022-04-13', 1),
(72, 6, 10, '2022-04-17', 1),
(73, 6, 11, '2022-04-17', 1),
(74, 6, 10, '2022-04-13', 1),
(75, 6, 11, '2022-04-13', 0);

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
(5, 'ammar', '71696574', 'zaa', '2000-04-12', 'ammarzaa', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'Male'),
(6, 'ammar', '71696574', 'zaa', '2022-04-22', '21730137', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'Female');

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
(5, 'ammar', 'zaa', 'tetaaa', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '2022-04-26', '71696574', 'Male');

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
(9, '0000123456789', 'ammar', 'zaa', 'user.jpg', 'ammar.rushdi.zaarour@gmail.com', '71696574', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'Male', '2000-04-12', 'beqaa, Bekaa, Lebanon', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `dolab`
--
ALTER TABLE `dolab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `doradio`
--
ALTER TABLE `doradio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `has_time`
--
ALTER TABLE `has_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

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
-- AUTO_INCREMENT for table `nurses`
--
ALTER TABLE `nurses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `radios`
--
ALTER TABLE `radios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
