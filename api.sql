-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2022 at 07:37 PM
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
-- Database: `api`
--

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `patient_ssn` varchar(255) NOT NULL,
  `doctor_nb` int(11) NOT NULL,
  `date` date NOT NULL,
  `overall_diagnosis` varchar(2000) NOT NULL,
  `prescription` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id`, `user_id`, `patient_ssn`, `doctor_nb`, `date`, `overall_diagnosis`, `prescription`) VALUES
(7, 1, '0000123456789', 100, '2017-04-07', 'A medical diagnosis is needed to establish the condition that is causing a person\'s signs and symptoms, and also to determine the necessary treatment. A diagnosis is typically obtained by a doctor or other healthcare provider and usually begins with a physical examination and an exploration of the patient\'s history.', 'As per Indian Medical Laws a valid prescription should have the following information : Name, qualification, address and registration number of the doctor. Name, age and gender of the patient. Date of consultation. Name of the Medication prescribed.'),
(8, 2, '0000123456789', 100, '2020-04-09', 'a definitive diagnosis of cancer is made via tissue examination by a pathologist. Principal diagnosis. The single medical diagnosis that is most relevant to the patient\'s chief complaint or need for treatment. Many patients have additional diagnoses.', 'What are the 7 parts of a prescription? Image result for doctor prescription example Every drug prescription consists of seven parts: the prescriber\'s information, the patient\'s information, the recipe (the medication, or Rx), the signature (the patient instructions or Sig), the dispensing instructions (how much medication to be dispensed to the patient or Disp), the number of refills (or Rf)');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `hospital_name` varchar(255) NOT NULL,
  `hospital_email` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `hospital_name`, `hospital_email`, `hash`) VALUES
(1, 'bekaa hospital', 'bekaa@hospital.com', 'd9fc3c259b64fe08a6ab527dabaf0b0a2d138c6cc3ee72f1f477e09a77941182'),
(2, 'chtaura', 'chtaura@hospital.com', 'd2bc488f8ad83bcbbc4285108856c88bbbf8cbc45b5b199e0af2deaf897014c8');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
