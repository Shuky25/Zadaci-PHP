-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2022 at 09:30 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum_c`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `ime` varchar(50) NOT NULL,
  `prezime` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`email`, `password`, `ime`, `prezime`) VALUES
('bilja.djokic@gmail.com', '123', 'Bilja', 'Prodanovic'),
('vojin@gmail.com', 'vojin123', 'Vojin', 'Sundovic');

-- --------------------------------------------------------

--
-- Table structure for table `teme`
--

CREATE TABLE `teme` (
  `id` int(11) NOT NULL,
  `naziv_teme` varchar(50) NOT NULL,
  `opis_teme` text NOT NULL,
  `datum_kreiranja` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teme`
--

INSERT INTO `teme` (`id`, `naziv_teme`, `opis_teme`, `datum_kreiranja`, `email`) VALUES
(1, '', '', '08:45:38 15.11.2022', ''),
(2, 'Naslov 2', '', '08:47:57 15.11.2022', ''),
(3, 'Naslov 3', '', '08:49:29 15.11.2022', ''),
(4, 'Naslov 4', 'Konacno bi trebalo da radi', '08:50:50 15.11.2022', 'vojin@gmail.com'),
(5, 'Kako ne unositi podatke ponovo u input polje?', 'Šundović će da objasni za 5.', '08:57:57 15.11.2022', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `teme`
--
ALTER TABLE `teme`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `teme`
--
ALTER TABLE `teme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
