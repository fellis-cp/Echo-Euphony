-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2023 at 09:51 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_panel`
--

CREATE TABLE `admin_panel` (
  `id` int(11) NOT NULL,
  ` nama_awal` varchar(50) NOT NULL,
  `nama_akhir` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin_panel`
--

INSERT INTO `admin_panel` (`id`, ` nama_awal`, `nama_akhir`, `email`, `password`) VALUES
(1, 'Admin', 'admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(60) NOT NULL,
  `deskripsi_produk` longtext NOT NULL,
  `harga_produk` varchar(11) NOT NULL,
  `gambar_produk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `nama_produk`, `deskripsi_produk`, `harga_produk`, `gambar_produk`) VALUES
(86, 'Moondrop Aria 2021', 'Driver Unit : LCP liquid crystal diaphragm-10mm diameter double cavity magnetic Diaphragm Dynamic unit\r\nHeadphone Socket : 0.78pin\r\nSensitivity : 122dB/Vrms (@1kHz)\r\nFrequency response : 5Hz-36000Hz\r\nEffective frequency response : 20Hz~20000Hz\r\n<a href=\"https://www.tokopedia.com/csi-zone/moondrop-aria-2-aria-ii-ceramic-diaphragm-driver-in-ear-monitor?extParam=ivf%3Dfalse%26src%3Dsearch\"> Klik Disini Untuk Membeli Produk</a>\r\n', '1.436.000', 'store/moondrop_aria 2021.png'),
(87, '64 Audio U12t', 'Driver Type/Count: Twelve precision balanced armature drivers\r\nDriver Configuration: 1 tia high, 1 high-mid, 6 mid, 4 low\r\nFrequency Response: 10Hz – 20kHz\r\nSensitivity: 108db dB/mW\r\nImpedance: 12.6 +1/-2 Ω from 10Hz – 20kHz\r\nCrossover: Integrated 4-way passive crossover\r\nIsolation : -20dB w/ m20 module, -15dB w/ m15 module\r\n<a href=\"https://www.tokopedia.com/beyondthemusic/64audio-u12t-universal-iem?utm_source=google&utm_medium=organic&utm_campaign=pdp-seo\">Klik Disini Untuk Membeli Produk</a>', '32.500.000', 'store/64audio_u12t.jpg'),
(88, 'iBaso Dc03 Pro ', 'DAC: CS43131*2 Dual DACs.\r\nTHD+N: -111dB(32Ω load), -114dB(300Ω load).\r\nOUtput Level: 2Vrms(300Ω), 1.77Vrms(32Ω).\r\nFrequency response: 20Hz-40kHz.\r\nNoise floor: <0.9u.\r\nSNR:127dB.\r\nOutput impedance: <0.12Ω.\r\nOutput Power: 98mW@32Ω.\r\nSupported Decoding: 32-Bit/384kHz PCM and Native DSD256.\r\nWeight: 10.5g.\r\nDimensions: 49.4x21x8mm.\r\n<a href=\"https://www.tokopedia.com/stuffnco/ibasso-dc03-pro-dual-cs43131-dac-dongle-type-c-3-5mm-android-pc-ios-biru?extParam=ivf%3Dfalse%26src%3Dsearch\">Klik Disini Untuk Membeli Produk</a>', '879.000', 'store/ibaso.jpg'),
(89, 'FiiO Q11', 'Input: USB\r\nOutput: Jack 3.5mm & Jack 4.4mm\r\nDAC / ADC Chip: CS43198\r\nMax sampling rate: 384kHz & DSD256\r\nColor: Black\r\nClass: Class D / T\r\nNetworking: No\r\nRemote Control: No\r\n3.5mm+4.4mm outputs\r\n650mW output power\r\n<a href=\"https://www.tokopedia.com/csi-zone/fiio-q11-portable-hi-fi-dac-and-headphone-earphone-amplifier\">Klik Disini Untuk Membeli Produk</a>\r\n', '1.450.000', 'store/fioo q11.jpg'),
(90, 'Moondrop Joker', 'Diaphragm: Partially Rigid Composite Diaphragm\r\nFrequency Response Range: 15Hz- 22kHz\r\nEffective Frequency Response Range: 20Hz-20kHz (IEC60318-4, -3dB)\r\nSensitivity: 106dB/Vrms (@1kHz)\r\nImpedance: 68Ω±15% (@1kHz)\r\nCable Jack: 3.5mm\r\nPlug: 3.5mm Stereo Jack Plug\r\n<a href=\" https://www.tokopedia.com/csi-zone/moondrop-joker-50mm-dynamic-driver-professional-closed-back-headphone?extParam=ivf%3Dfalse%26src%3Dsearch\">Klik Disini Untuk Membeli Produk</a>\r\n', '1.228.000', 'store/moondrop_joker.jpeg'),
(91, 'Tangzu Princess Chang Le ', 'Driver Configuration: 6mm Dynamic Driver Unit\r\nTotal Harmonic Distortion: <0.5%\r\nSensitivity: 95.5dB+1dB (1kHz)\r\nLeft-Right Balance: 1dB (1kHz)\r\nImpedance: 16ohm\r\nFrequency Range: 20Hz-20kHz\r\nCable Material: Oxygen-Free Copper Silver-Plated Wire\r\nCable Length: 1.2m ±5%\r\nHeadphone Plug: 3.5mm\r\n<a href=\"https://www.tokopedia.com/csi-zone/tangzu-princess-chang-le-changle-6mm-driver-in-ear-monitor-with-mic?extParam=cmp%3D1%26ivf%3Dfalse%26src%3Dsearch\">Klik Disini Untuk Membeli Produk</a>\r\n', '147.800', 'store/princes_changle.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `f_name`, `l_name`, `email`, `password`) VALUES
(35, 'user', 'user', 'user@gmail.com', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_panel`
--
ALTER TABLE `admin_panel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_panel`
--
ALTER TABLE `admin_panel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
