-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2022 at 12:28 AM
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
  `doctor_nb` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `overall_diagnosis` varchar(10000) NOT NULL,
  `prescription` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id`, `user_id`, `patient_ssn`, `doctor_nb`, `date`, `overall_diagnosis`, `prescription`) VALUES
(1, 2, '000047359813', '7832675362', '2022-04-23', 'hhhhhhhh', 'hhhhhhhhhhhhhhh'),
(2, 2, '000047359813', '7832675362', '2022-04-23', 'As they rounded a bend in the path that ran beside the river, Lara recognized the silhouette of a fig tree atop a nearby hill. The weather was hot and the days were long. The fig tree was in full leaf, but not yet bearing fruit.\nSoon Lara spotted other landmarks—an outcropping of limestone beside the path that had a silhouette like a man’s face, a marshy spot beside the river where the waterfowl were easily startled, a tall tree that looked like a man with his arms upraised. They were drawing near to the place where there was an island in the river. The island was a good spot to make camp. They would sleep on the island tonight.\nLara had been back and forth along the river path many times in her short life. Her people had not created the path—it had always been there, like the river—but their deerskin-shod feet and the wooden wheels of their handcarts kept the path well worn. Lara’s people were salt traders, and their livelihood took them on a continual journey.\nAt the mouth of the river, the little group of half a dozen intermingled families gathered salt from the great salt beds beside the sea. They groomed and sifted the salt and loaded it into handcarts. When the carts were full, most of the group would stay behind, taking shelter amid rocks and simple lean-tos, while a band of fifteen or so of the heartier members set out on the path that ran alongside the river.\nWith their precious cargo of salt, the travelers crossed the coastal lowlands and traveled toward the mountains. But Lara’s people never reached the mountaintops; they traveled only as far as the foothills. Many people lived in the forests and grassy meadows of the foothills, gathered in small villages. In return for salt, these people would give Lara’s people dried meat, animal skins, cloth spun from wool, clay pots, needles and scraping tools carved from bone, and little toys made of wood.', 'Their bartering done, Lara and her people would travel back down the river path to the sea. The cycle would begin again.\nIt had always been like this. Lara knew no other life. She traveled back and forth, up and down the river path. No single place was home. She liked the seaside, where there was always fish to eat, and the gentle lapping of the waves lulled her to sleep at night. She was less fond of the foothills, where the path grew steep, the nights could be cold, and views of great distances made her dizzy. She felt uneasy in the villages, and was often shy around strangers. The path itself was where she felt most at home. She loved the smell of the river on a hot day, and the croaking of frogs at night. Vines grew amid the lush foliage along the river, with berries that were good to eat. Even on the hottest day, sundown brought a cool breeze off the water, which sighed and sang amid the reeds and tall grasses.\nOf all the places along the path, the area they were approaching, with the island in the river, was Lara’s favorite.\nThe terrain along this stretch of the river was mostly flat, but in the immediate vicinity of the island, the land on the sunrise side was like a rumpled cloth, with hills and ridges and valleys. Among Lara’s people, there was a wooden baby’s crib, suitable for strapping to a cart, that had been passed down for generations. The island was shaped like that crib, longer than it was wide and pointed at the upriver end, where the flow had eroded both banks. The island was like a crib, and the group of hills on the sunrise side of the river were like old women mantled in heavy cloaks gathered to have a look at the baby in the crib—that was how Lara’s father had once described the lay of the land.\nLarth spoke like that all the time, conjuring images of giants and monsters in the landscape. He could perceive the spirits, called numina, that dwelled in rocks and trees. Sometimes he could speak to them and hear what they had to say. The river was h');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
