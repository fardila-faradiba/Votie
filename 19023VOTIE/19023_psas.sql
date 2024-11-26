-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 26, 2024 at 07:27 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `19023_psas`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'pass');

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int NOT NULL,
  `name` text COLLATE utf8mb4_general_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `number` int NOT NULL,
  `pict` varchar(1000) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `vote_count` int NOT NULL,
  `visi` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `misi` longtext COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `name`, `class`, `number`, `pict`, `description`, `vote_count`, `visi`, `misi`) VALUES
(1, 'Udi Ananda Pratama & Annisa Putri', 'XI RPL & X MPLB', 1, 'K1.jpg', 'Calon Kandidat Ketua OSIS Nomor 1 Periode 2024 / 2025', 15, 'Mewujudkan OSIS SMKN 1 Bawang yang inovatif, dan berkarakter, berlandaskan semangat kolaborasi untuk menciptakan lingkungan sekolah yang progresif dan adaptif terhadap perkembangan teknologi', '1. Meningkatkan sikap spiritual dengan mengamalkan ajaran agama dan menjunjung tinggi sikap toleransi\r\n\r\n2. Mengajak seluruh siswa untuk berpartisipasi aktif dalam kegiatan OSIS untuk mengembangkan potensi kreatif melalui program-program berbasis teknologi, seni, dan ilmu pengetahuan\r\n\r\n3. Menciptakan ruang diskusi yang inklusif antara siswa, guru, dan masyarakat sekolah untuk menyelesaikan masalah bersama serta memperkuat hubungan sosial di era digital\r\n\r\n4. Mengoptimalkan penggunaan teknologi dalam berbagai program OSIS untuk memperluas jangkauan partisipasi siswa\r\n\r\n5. Melibatkan OSIS dalam aktivitas/praktik sosial yang berbasis lingkungan dan kemanusiaan, serta memberikan dukungan terhadap isu-isu global'),
(2, 'Raihan Zahroni & Yu\'one Syafa Ariiqo', 'XI MPLB & X AP', 2, 'K2.jpg', 'Calon Kandidat Ketua OSIS Nomor 2 Periode 2024/2025', 103, 'Terwujudnya OSIS SMK Negeri 1 Bawang sebagai organisasi yang relevan, inspiratif, bersinergi, dan progresif, serta optimis dalam mewadahi aspirasi siswa dengan menjunjung birokrasi yang terintegritas', '1. Meningkatkan ketaqwaan terhadap Tuhan Yang Maha Esa.\r\n\r\n2. Menerima serta merealisasikan aspirasi siswa dengan landasan tinggi nilai persaudaraan\r\n\r\n3. Mewujudkan siswa SMK Negeri 1 Bawang yang bersinergi guna terciptanya sumber daya yang inspiratif dan kompeten\r\n\r\n4. Menjaga konsistensi sekolah yang inklusif melalui sikap optimis dengan menumbuhkan rasa sosial yang tinggi antar warga sekolah\r\n\r\n5. Menciptakan organisasi yang SMART (Sigap, Menarik, Antusias, Rajin, dan Telitil\r\n\r\n6. Menyelaraskan interkoneksi dalam sektor internal dan eksternal dengan produktif guna mengoptimalkan seluruh program kerja yang progresif'),
(3, 'Riski Maulidana S & Givanny Assifa', 'XI RPL 3', 3, 'K3.jpg', 'Calon Kandidat Ketua OSIS Nomor 3 Periode 2024/2025', 35, 'Terwujudnya OSIS SMKN 1 Bawang sebagai organisasi yang komunikatif serta kreatif untuk menampung aspirasi sebagai tolak ukur program kerja', '1. Meningkatkan Iman serta Ketaqwaan terhadap tuhan yang maha esa\r\n\r\n2. Menjalin hubungan harmonis terhadap pihak yang terlibat dalam program osis\r\n\r\n3. Menyampaikan aspirasi siswa dengan menjadikan osis sebagai wadah penerima aspirasi melalui komunikasi\r\n\r\n4. Membentuk persaudaraan antar anggota osis guna meminimalisir senioritas\r\n\r\n5. Menciptakan program kerja baru sebagai inovasi\r\n\r\n6. Menjalin kerjasama yang baik antar organisasi maupun ekstrakurikuler di SMKN 1 Bawang');

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE `voters` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nisn` int NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `ready` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`id`, `name`, `class`, `nisn`, `password`, `ready`) VALUES
(1, 'Bayu Candra Yudistira', 'X PPLG 2', 51507, '051507', 1),
(3, 'Candra Liao', 'X TJKT 1', 211528, '211528', 1),
(4, 'Nazwa Putri Tania', 'X PPLG 2', 12345, '12345', 1);

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `nisn` varchar(20) NOT NULL,
  `candidate_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`nisn`, `candidate_id`) VALUES
('1234', 1),
('4545', 1),
('343', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voters`
--
ALTER TABLE `voters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`nisn`,`candidate_id`),
  ADD KEY `candidate_id` (`candidate_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `voters`
--
ALTER TABLE `voters`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `votes_ibfk_1` FOREIGN KEY (`candidate_id`) REFERENCES `candidates` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
