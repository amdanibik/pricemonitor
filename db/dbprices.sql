-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2021 at 05:08 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `faun5825_price`
--
CREATE DATABASE IF NOT EXISTS `faun5825_price` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `faun5825_price`;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `links_id` int(11) NOT NULL,
  `namec` text NOT NULL,
  `email` text NOT NULL,
  `comment` text NOT NULL,
  `tanggal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `links_id`, `namec`, `email`, `comment`, `tanggal`) VALUES
(1, 2, 'Amdanibik', 'amdan@gmail.com', 'Mantap', '2021-07-31'),
(2, 4, 'dani', 'dani@gmail.com', 'Mantap\r\n', '2021-07-31');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `links_id` int(11) NOT NULL,
  `price` varchar(20) NOT NULL,
  `tanggal` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `links_id`, `price`, `tanggal`) VALUES
(1, 1, '<!-- -->719100', '2021-07-31 04:27:12'),
(2, 1, '<!-- -->719100', '2021-07-31 04:27:47'),
(3, 2, '<!-- -->1899000', '2021-07-31 04:30:50'),
(4, 3, '<!-- -->891100', '2021-07-31 04:31:10'),
(5, 4, '<!-- -->79600', '2021-07-31 04:31:26');

-- --------------------------------------------------------

--
-- Table structure for table `downvote`
--

CREATE TABLE `downvote` (
  `id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `ip` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `downvote`
--

INSERT INTO `downvote` (`id`, `comment_id`, `ip`) VALUES
(1, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id` int(11) NOT NULL,
  `link` text NOT NULL,
  `namelink` varchar(100) NOT NULL,
  `price` varchar(50) NOT NULL,
  `descri` text NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `link`, `namelink`, `price`, `descri`, `img`) VALUES
(1, 'https://fabelio.com/ip/sofa-ottoman-bran?fabric_color=15155', 'Sofa Ottoman Bran', '<!-- -->719100', 'Momen bersantai bersama orang-orang terdekat akan menjadi semakin berharga dengan kehadiran Kursi Ottoman Bran.\r\n\r\n', 'b/a/bangkuo_kursi_ottoman_bran_black_elodie_2a_2-1_hires_1.jpg'),
(2, 'https://fabelio.com/ip/meja-tamu-chloe-set-3-new', 'Meja Tamu Chloe - Set of 3', '<!-- -->1899000', 'Meja Tamu Chloe berangkat dari gaya Skandinavia yang tidak hanya simpel, tapi juga memiliki sentuhan desain yang unik sehingga dapat memberikan suasana baru yang menarik pada ruangan sekaligus fungsional.', 'e/d/edt1_18.jpg'),
(3, 'https://fabelio.com/ip/kursi-kantor-fitto-black', 'Kursi Kantor Fitto - Black', '<!-- -->891100', 'Memilih desain minimalis untuk ruang kerja memang menjadi pertimbangan sebagian orang. Jika Anda termasuk salah satunya, Fitto Office Chair selalu siap menyempurnakan working space pribadi Anda.', 'f/a/far-002-k02-1_black__1_1_1.jpg'),
(4, 'https://fabelio.com/ip/hiasan-dinding-bellagio', 'Hiasan Dinding Bellagio', '<!-- -->79600', 'Buat ruangan terasa lebih hangat dengan dekorasi yang unik, namun tetap dapat membaur dengan baik bersama dekorasi lainnya seperti Hiasan Dinding Bellagio.', 'h/i/hiasand_bellagio_a_21_hires.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `upvote`
--

CREATE TABLE `upvote` (
  `id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `ip` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `upvote`
--

INSERT INTO `upvote` (`id`, `comment_id`, `ip`) VALUES
(1, 2, ''),
(2, 2, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `downvote`
--
ALTER TABLE `downvote`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upvote`
--
ALTER TABLE `upvote`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `downvote`
--
ALTER TABLE `downvote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `upvote`
--
ALTER TABLE `upvote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
