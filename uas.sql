-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2024 at 11:48 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_game`
--

CREATE TABLE `tb_game` (
  `id_game` int(11) NOT NULL,
  `banner` varchar(1000) DEFAULT NULL,
  `cover` varchar(1000) DEFAULT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` int(50) NOT NULL,
  `current_free` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_game`
--

INSERT INTO `tb_game` (`id_game`, `banner`, `cover`, `title`, `description`, `price`, `current_free`) VALUES
(1, '', 'https://media.discordapp.net/attachments/1065122549253558313/1199803877097230397/valorant.jpeg?ex=65c3df6f&is=65b16a6f&hm=fbcc89bda0755294adc31cc91a7d775a069d134cf4b43ac10cf283803997b7d2&=&format=webp&width=445&height=593', 'VALORANT', 'VALORANT adalah game tembak-menembak taktis tempat kamu dan 4 rekan tim berhadapan dengan 5 Agen lain dalam baku tembak berbekal satu nyawa per ronde untuk jadi yang pertama memenangkan 13 ronde! ', 0, 0),
(2, '', 'https://media.discordapp.net/attachments/1188764715799826482/1199750228513935441/WhatsApp_Image_2024-01-24_at_22.30.42_756b0d5c.jpg?ex=65c3ad78&is=65b13878&hm=f46cd327034a17006b88da33e7850ac45872b69d79e56d73cb99eb30bd5e6e13&=&format=webp&width=447&height=671', 'Elden Ring', 'Cerita game ini berlatar di dunia Land Between, di mana pemain harus mengumpulkan semua Great Rune untuk menyatukannya kembali menjadi Elden Ring dan menjadi Elden Lord.', 749000, 1),
(3, '', 'https://cdn.discordapp.com/attachments/1188764715799826482/1199750417815441488/WhatsApp_Image_2024-01-24_at_22.47.47_8a50ea86.jpg?ex=65c3ada5&is=65b138a5&hm=ab0be49e2d508db43227eea4a5bf9fccb0b755d5d099b8db2405276d1890632b&', 'Avatar Pandora', 'Game ini berlatar di dunia fiksi Pandora dan berpusat pada karakter Na’vi yang dibesarkan oleh Resources Development Administration (RDA) sebagai tentara. Setelah 15 tahun, karakter Na’vi tersebut terbangun di sebuah fasilitas terbengkalai dan harus memimpin suku-suku Na’vi untuk melawan RDA yang mencoba mengeksploitasi sumber daya alam di Frontier Barat', 1199000, 1),
(4, 'https://media.discordapp.net/attachments/1065122549253558313/1199807853653917696/g1.jpg?ex=65c3e323&is=65b16e23&hm=89acbf6f3974c327ad01e9be7fb3ce6924e77fa912e3c1ead3438ccbaf73fec1&=&format=webp', '', 'Cyberpunk 2077', '', 0, 1),
(5, 'https://media.discordapp.net/attachments/1065122549253558313/1199807851250585661/g3.png?ex=65c3e323&is=65b16e23&hm=bf1a772a1e5692b2b3ecae3b473b63c6cffc5e14021372ac437f79b5df9ba250&=&format=webp&quality=lossless&width=801&height=451', '', 'Divinity: Original Sin II', '', 0, 1),
(6, 'https://media.discordapp.net/attachments/1065122549253558313/1199807852278186044/g8.jpg?ex=65c3e323&is=65b16e23&hm=64f94b6533411dae0d0dd4add6c41a7ecaf977fead857ef774af5782997226dc&=&format=webp&width=801&height=438', '', 'The Witcher 3: Wild Hunt', '', 0, 1),
(8, '', 'https://cdn.discordapp.com/attachments/1188764715799826482/1199752700590559322/WhatsApp_Image_2024-01-24_at_22.32.56_2e0c3358.jpg?ex=65c3afc6&is=65b13ac6&hm=04207a83973ec48d4b63c2d9bb05b5a3adae84421ac4624deb7a6fe998882116&', 'Red Redemption II', 'Cerita game ini berlatar pada tahun 1899 dalam representasi fiksi dari Amerika Serikat Barat dan berpusat pada Arthur Morgan dan anggota geng Van der Linde. Arthur harus menghadapi kemunduran sambil mencoba bertahan melawan pasukan pemerintah, geng rival, dan musuh-musuh lainnya.', 699000, 0),
(9, '', 'https://cdn.discordapp.com/attachments/1188764715799826482/1199752828806250566/WhatsApp_Image_2024-01-24_at_22.48.46_b87e0aa7.jpg?ex=65c3afe4&is=65b13ae4&hm=1b488cbae9288f7eb0aed95ec344fcc21205cd01d99a62fa5f7ba7c14e4ffda6&', 'Fortnite', 'Game ini memiliki dunia terbuka yang memungkinkan pemain untuk menjelajahi kota fiksi Los Santos dan pedesaan terbuka San Andreas dengan kendaraan atau jalan kaki. Elemen gameplay termasuk tembak-menembak, perampokan, menunggang kuda, berinteraksi dengan karakter non-pemain, dan mempertahankan peringkat kehormatan karakter melalui pilihan dan perbuatan moral. Sistem “buronan”', 0, 0),
(10, 'https://media.discordapp.net/attachments/1065122549253558313/1200013263442812988/capsule_616x353.jpg?ex=65c4a271&is=65b22d71&hm=b8b9a0fd642819e458b74e8ea6f047100c4a0a78b9919330641d4d22f3e291c3&=&format=webp', '', 'Infinifactory', '', 0, 0),
(11, 'https://media.discordapp.net/attachments/1065122549253558313/1200013263681896489/header.jpg?ex=65c4a271&is=65b22d71&hm=18a61b874176ab6fd738382ef36ec69da62c111325207cae44602c3ca88ef493&=&format=webp', '', 'LOVE', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_keranjang`
--

CREATE TABLE `tb_keranjang` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `keranjang` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_keranjang`
--

INSERT INTO `tb_keranjang` (`id_user`, `username`, `keranjang`) VALUES
(4, 'admin', '{\"games\":[{\"game_title\":\"Red Redemption II\"},{\"game_title\":\"Elden Ring\"},{\"game_title\":\"Avatar Pandora\"}]}');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 1),
(2, 'user', 'user', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_game`
--
ALTER TABLE `tb_game`
  ADD PRIMARY KEY (`id_game`);

--
-- Indexes for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_game`
--
ALTER TABLE `tb_game`
  MODIFY `id_game` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
