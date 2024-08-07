-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 24, 2023 at 04:15 AM
-- Server version: 10.2.44-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prilude_jali`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun_pengembang`
--

CREATE TABLE `akun_pengembang` (
  `id_akun_pengembang` int(11) NOT NULL,
  `nama_pengguna` varchar(30) NOT NULL,
  `kata_kunci` varchar(100) NOT NULL,
  `nama_perusahaan` varchar(50) DEFAULT NULL,
  `alamat_perusahaan` varchar(50) DEFAULT NULL,
  `no_telepon` varchar(15) DEFAULT NULL,
  `alamat_email` varchar(50) DEFAULT NULL,
  `tanggal_didaftarkan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun_pengembang`
--

INSERT INTO `akun_pengembang` (`id_akun_pengembang`, `nama_pengguna`, `kata_kunci`, `nama_perusahaan`, `alamat_perusahaan`, `no_telepon`, `alamat_email`, `tanggal_didaftarkan`) VALUES
(1, 'priludestudio', '$2y$10$S9mTm67TPkDdotGeJKdUVOBQ2.L0j8XdaeqlmTI4/HasqHQ5y6HPu', 'PT. Prilude Digital Indonesia', 'Perum Bumi Citra Permai Blok A No. 17', '02653168504', 'taofik.muhammad@gmail.com', '2023-02-06');

-- --------------------------------------------------------

--
-- Table structure for table `alamat_awal`
--

CREATE TABLE `alamat_awal` (
  `id_alamat_awal` int(11) NOT NULL,
  `id_transaksi` varchar(113) NOT NULL,
  `judul_alamat_awal` varchar(100) DEFAULT NULL,
  `alamat_awal` varchar(200) DEFAULT NULL,
  `catatan_alamat_awal` varchar(150) DEFAULT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alamat_awal`
--

INSERT INTO `alamat_awal` (`id_alamat_awal`, `id_transaksi`, `judul_alamat_awal`, `alamat_awal`, `catatan_alamat_awal`, `latitude`, `longitude`) VALUES
(132, 'MAM2306130001', 'Jalan Cibungkul', 'Jl. Cibungkul No.6, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', 'hah', -7.2723623246091, 108.18828597665),
(133, 'KUR2306140001', 'Jalan Padasuka', 'Jl. Padasuka No.7, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', NULL, -7.2752843545273, 108.18894747645),
(134, 'KUR2306140002', 'Jalan Padasuka', 'Jl. Padasuka No.7, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', NULL, -7.2752843545273, 108.18894747645),
(135, 'MAM2306140002', 'Jalan Padasuka', 'P5FQ+CXG, Jl. Padasuka, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', NULL, -7.276255477946, 108.19005187601),
(136, 'KUR2306140003', 'Prilude Studio', 'Perum Bumi Citra Permai Blok A No. 17, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', NULL, -7.2752486, 108.1890419),
(137, 'KUR2306140004', 'Prilude Studio', 'Perum Bumi Citra Permai Blok A No. 17, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', NULL, -7.2752486, 108.1890419),
(138, 'MOB2306140005', 'Jalan Padasuka', 'Jl. Padasuka No.7, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', NULL, -7.2752195020323, 108.18893842399),
(139, 'MOT2306140006', 'Jalan Padasuka', 'Jl. Padasuka No.7, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', NULL, -7.2752218300708, 108.18893540651),
(140, 'MAM2306140007', 'Jalan Padasuka', 'Jl. Padasuka No.7, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', NULL, -7.2752223, 108.1889357),
(141, 'KUR2306140008', 'Jalan Padasuka', 'Jl. Padasuka No.7, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', NULL, -7.2752191, 108.1889504),
(142, 'KUR2306140009', 'Jalan Padasuka', 'Jl. Padasuka No.7, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', NULL, -7.2752191, 108.1889504),
(143, 'MOT2306140010', 'Sukamajukaler', 'P59P+3C Sukamajukaler, Tasikmalaya Regency, West Java, Indonesia', NULL, -7.2822783916537, 108.18605102599),
(144, 'MOT2306140011', 'Sukamajukaler', 'P59P+3C Sukamajukaler, Tasikmalaya Regency, West Java, Indonesia', NULL, -7.2822787242254, 108.18605873734),
(145, 'MAM2306140012', 'Sukamajukaler', 'P59P+3C Sukamajukaler, Tasikmalaya Regency, West Java, Indonesia', NULL, -7.2822786, 108.1860588),
(146, 'MOT2306140013', 'Sukamajukaler', 'P59P+8CC, Sukamajukaler, Indihiang, Tasikmalaya Regency, West Java 46151, Indonesia', NULL, -7.2815696808269, 108.18561784923),
(147, 'MOB2306140014', 'Sukamajukaler', 'P59P+3C Sukamajukaler, Tasikmalaya Regency, West Java, Indonesia', NULL, -7.2822810522272, 108.18605337292),
(148, 'MOB2306140015', 'Sukamajukaler', 'P59P+3C Sukamajukaler, Tasikmalaya Regency, West Java, Indonesia', NULL, -7.2822734030783, 108.18604633212),
(149, 'MOB2306140016', 'Sukamajukaler', 'P59P+8CC, Sukamajukaler, Indihiang, Tasikmalaya Regency, West Java 46151, Indonesia', NULL, -7.2815929608812, 108.18562857807),
(150, 'MOB2306140017', 'Sawit', '8C2P+C8C, Sawit, Darangdan, Purwakarta Regency, West Java 41163, Indonesia', NULL, -6.6991631758805, 107.43546299636),
(151, 'KUR2306140018', 'Sukamajukaler', 'P59P+3C Sukamajukaler, Tasikmalaya Regency, West Java, Indonesia', NULL, -7.2836818419795, 108.18709876388),
(152, 'KUR2306140019', 'Prilude Studio', 'Perum Bumi Citra Permai Blok A No. 17, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', NULL, -7.2752486, 108.1890419),
(153, 'MOT2306140021', 'Jalan Letnan Harun', 'Jl. Letnan Harun No.99, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', NULL, -7.2880601131577, 108.19515042007),
(154, 'MOT2306150001', 'Sukamajukaler', 'P5HR+43X, Sukamajukaler, Indihiang, Tasikmalaya Regency, West Java 46151, Indonesia', NULL, -7.2721335101727, 108.1903834641),
(155, 'MOT2306210001', 'Sukamajukaler', 'P59P+4F Sukamajukaler, Tasikmalaya Regency, West Java, Indonesia', NULL, -7.2822098818808, 108.18614054471),
(156, 'MOT2306210002', 'Jalan Padasuka', 'Jl. Padasuka No.7, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', NULL, -7.2752304770706, 108.18904906511),
(157, 'MOT2306210003', 'Jalan Padasuka', 'Jl. Padasuka No.7, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', NULL, -7.2752224952246, 108.18902559578),
(158, 'MOB2306210002', 'Jalan Padasuka', 'Jl. Padasuka No.7, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', NULL, -7.275229146763, 108.1890450418),
(159, 'MOT2306210021', 'Jalan Letnan Harun', 'Jl. Letnan Harun No.99, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', NULL, -7.2880601131577, 108.19515042007),
(160, 'MOT2306210022', 'Jalan Letnan Harun', 'Jl. Letnan Harun No.99, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', NULL, -7.28806, 108.1951533),
(161, 'MOB2306210023', 'Jalan Letnan Harun', 'Jl. Letnan Harun No.99, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', NULL, -7.2880614434273, 108.19514974952),
(162, 'MOT2306210024', 'Mulyasari', 'J6JJ+27P, Mulyasari, Tamansari, Tasikmalaya Regency, West Java 46196, Indonesia', NULL, -7.3700234661717, 108.23071885854),
(163, 'MOT2306210025', 'Mulyasari', 'J6HJ+HPM, Mulyasari, Tamansari, Tasikmalaya Regency, West Java 46196, Indonesia', 'okeh', -7.3710735195488, 108.23147591203),
(164, 'MOT2306210026', 'Jalan Padasuka', 'Jl. Padasuka No.7, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', NULL, -7.275216841417, 108.18894714117),
(165, 'MOB2306210027', 'Jalan Padasuka', 'Jl. Padasuka No.7, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', NULL, -7.2752308096475, 108.18904168904),
(166, 'MOT2306210027', 'Jalan Padasuka', 'Jl. Padasuka No.7, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', NULL, -7.2752311422244, 108.18904772401),
(167, 'MOT2306220001', 'Jalan Padasuka', 'Jl. Padasuka No.7, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', NULL, -7.2752311422244, 108.18904604763),
(168, 'MOT2306220002', 'Grand Ciomas Asri Blok A3', '9QQ6+8M, Jl. Raya Grand Ciomas Asri, Pagelaran, Kec. Ciomas Perumahan Grand Ciomas Asri Blok A3a, Kabupaten Bogor, Jawa Barat 16610, Indonesia', NULL, -6.6117421, 106.7617195),
(169, 'MOT2306220003', 'Jalan Villa Ciomas', 'Jl. Villa Ciomas No.7, Ciomas Rahayu, Kec. Ciomas, Kabupaten Bogor, Jawa Barat 16610, Indonesia', 'blok b3', -6.5978770555115, 106.76690932363),
(170, 'KUR2306220004', 'Jalan Padasuka', 'Jl. Padasuka No.7, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', NULL, -7.2752165, 108.188948),
(172, 'MAM2306220005', 'Jalan Padasuka', 'Jl. Padasuka No.7, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', NULL, -7.2752166, 108.1889483),
(173, 'MOT2306220006', 'Mulyasari', 'J6HJ+CQ4, Mulyasari, Tamansari, Tasikmalaya Regency, West Java 46196, Indonesia', 'UMTaS', -7.3712055241829, 108.23155201972),
(174, 'MOB2306220007', 'Mulyasari', 'J6HJ+HPM, Mulyasari, Tamansari, Tasikmalaya Regency, West Java 46196, Indonesia', NULL, -7.3710425965432, 108.23147054762),
(175, 'MOB2306220008', 'Mulyasari', 'J6HJ+HPM, Mulyasari, Tamansari, Tasikmalaya Regency, West Java 46196, Indonesia', NULL, -7.3710728545379, 108.23147255927),
(176, 'MOT2306220004', 'Jalan Padasuka', 'Jl. Padasuka No.7, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', NULL, -7.2752268187245, 108.18904336542),
(177, 'MOT2306220005', 'Jalan Raya Rajapolah - Tasikmalaya', 'Jl. Raya Rajapolah - Tasikmalaya No.10, Mekarwangi, Kec. Cisayong, Kabupaten Tasikmalaya, Jawa Barat 46153, Indonesia', NULL, -7.2753925, 108.1887583),
(178, 'MOB2306220006', 'Prilude Studio', 'Perum Bumi Citra Permai Blok A No. 17, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', NULL, -7.2752486, 108.1890419),
(179, 'MOT2306220007', 'Sukamahi', 'P5C8+5R3, Sukamahi, Sukaratu, Tasikmalaya Regency, West Java 46415, Indonesia', NULL, -7.2795715825172, 108.16689301282),
(180, 'MOT2306220008', 'Sukamahi', 'P5C8+5R3, Sukamahi, Sukaratu, Tasikmalaya Regency, West Java 46415, Indonesia', NULL, -7.2795715825172, 108.16689301282),
(181, 'MOT2306220009', 'Sukamajukidul', 'P56W+M4Q, Sukamajukidul, Indihiang, Tasikmalaya Regency, West Java 46151, Indonesia', NULL, -7.2883484489986, 108.19515075535),
(182, 'MOT2306220010', 'Sukamajukidul', 'P58P+R86, Sukamajukidul, Indihiang, Tasikmalaya Regency, West Java 46151, Indonesia', NULL, -7.2829704728018, 108.18595044315),
(183, 'MOT2306220011', 'Sukamajukaler', 'P59P+3C Sukamajukaler, Tasikmalaya Regency, West Java, Indonesia', NULL, -7.2822720727916, 108.186105676),
(184, 'MOB2306220012', 'Jalan Padasuka', 'Jl. Padasuka No.7, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', NULL, -7.2752294793399, 108.18904303014),
(185, 'MOB2306220013', 'Jalan Padasuka', 'Jl. Padasuka No.7, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', NULL, -7.2752294793399, 108.18904303014),
(186, 'MOT2306220014', 'Jalan Padasuka', 'Jl. Padasuka No.7, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', NULL, -7.2752294793399, 108.18904303014),
(187, 'MOT2306230001', 'Sukamajukaler', 'P59P+3C Sukamajukaler, Tasikmalaya Regency, West Java, Indonesia', NULL, -7.2822813847989, 108.18605002016),
(188, 'MOT2306230002', 'Jalan R.E. Martadinata', 'Jl. R.E. Martadinata No.272 D, Panyingkiran, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', NULL, -7.3059598628749, 108.2078332454),
(189, 'MOT2306230003', 'Jalan Insinyur Haji Juanda', 'Jl. Insinyur H. Juanda No.90, Sukamulya, Kec. Bungursari, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', NULL, -7.3103638550343, 108.20125546306),
(190, 'MOT2306230004', 'Grand Ciomas Asri Blok A3', '9QQ6+8M, Jl. Raya Grand Ciomas Asri, Pagelaran, Kec. Ciomas Perumahan Grand Ciomas Asri Blok A3a, Kabupaten Bogor, Jawa Barat 16610, Indonesia', NULL, -6.6117421, 106.7617195),
(191, 'MOT2306230023', 'Jalan RE Martadinata', 'Jl. RE Martadinata No.232, Panyingkiran, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', NULL, -7.3090103711641, 108.20923067629),
(192, 'MOT2306230024', 'Jalan Padasuka', 'Jl. Padasuka No.127, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', NULL, -7.2758301128442, 108.18999253213),
(193, 'MOT2306240001', 'Jalan Letnan Harun', 'Jl. Letnan Harun No.99, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', NULL, -7.28806, 108.1951533),
(194, 'MOT2306240002', 'Jalan Padasuka', 'Jl. Padasuka No.7, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', NULL, -7.2752294793399, 108.18904940039),
(195, 'MOT2306240003', 'Jalan Padasuka', 'Jl. Padasuka No.7, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', NULL, -7.275216841417, 108.1889494881),
(196, 'MOT2306240004', 'Jalan Padasuka', 'Jl. Padasuka No.7, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', NULL, -7.2752298119168, 108.18904671818),
(197, 'MOT2306240005', 'Jalan Padasuka', 'Jl. Padasuka No.7, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', NULL, -7.2752414521086, 108.1889944151),
(198, 'MOT2306240006', 'Jalan Padasuka', 'Jl. Padasuka No.7, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', NULL, -7.2752171739939, 108.1889494881),
(199, 'MOB2306240007', 'Jalan Padasuka', 'Jl. Padasuka No.7, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', NULL, -7.2752171739939, 108.1889494881),
(200, 'MOT2306240008', 'Manggungjaya', 'Perum puri duta legok ringgit, Manggungjaya, Kec. Rajapolah, Kabupaten Tasikmalaya, Jawa Barat 46155, Indonesia', NULL, -7.2178305497808, 108.19110949597);

-- --------------------------------------------------------

--
-- Table structure for table `alamat_pengguna`
--

CREATE TABLE `alamat_pengguna` (
  `id_alamat_pengguna` int(11) NOT NULL,
  `nama_alamat` varchar(100) NOT NULL,
  `alamat_lengkap` text NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `id_pengguna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alamat_pengguna`
--

INSERT INTO `alamat_pengguna` (`id_alamat_pengguna`, `nama_alamat`, `alamat_lengkap`, `latitude`, `longitude`, `id_pengguna`) VALUES
(5, 'Dunia Bibit', 'Jl. Padasuka No.123, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151', -7.2762201, 108.1901985, 28),
(6, 'Jalan Padasuka', 'P5FQ+CXG, Jl. Padasuka, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', -7.276255477946, 108.19005187601, 2),
(7, 'Jalan Letnan Harun', 'Jl. Letnan Harun No.99, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', -7.2880601131577, 108.19515042007, 2),
(8, 'Sukamajukaler', 'P5HR+43X, Sukamajukaler, Indihiang, Tasikmalaya Regency, West Java 46151, Indonesia', -7.2721335101727, 108.1903834641, 2),
(9, 'Jalan Padasuka', 'P5FR+W4P, Jl. Padasuka, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', -7.2752484362236, 108.18904202431, 2),
(10, 'Sukamajukaler', 'P59P+4F Sukamajukaler, Tasikmalaya Regency, West Java, Indonesia', -7.2822098818808, 108.18614054471, 28),
(11, 'Muhammadiyah University of Tasikmalaya', 'Jl. Tamansari No.KM 2,5, Mulyasari, Kec. Tamansari, Kab. Tasikmalaya, Jawa Barat 46196, Indonesia', -7.3703298, 108.2311796, 45),
(12, 'Jalan Padasuka', 'Jl. Padasuka No.7, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', -7.275216841417, 108.18894714117, 45),
(13, 'Kecamatan Cisayong', 'kp.Sindangelet 46153, Sukaraharja, Kec. Cisayong, Kabupaten Tasikmalaya, Jawa Barat 46153, Indonesia', -7.2627822832595, 108.17877754569, 45),
(14, 'Terminal Indihiang', 'Sukamajukidul, Indihiang, Tasikmalaya Regency, West Java 46151, Indonesia', -7.2911499, 108.1920647, 2),
(15, 'Nusawangi', 'Q53G+9QM, Nusawangi, Cisayong, Tasikmalaya Regency, West Java 46153, Indonesia', -7.2463568848408, 108.17726075649, 45),
(16, 'Sukasukur', 'P5JF+FQ Sukasukur, Tasikmalaya Regency, West Java, Indonesia', -7.2688449549277, 108.17448567599, 45),
(17, 'Mulyasari', 'J6HJ+HPM, Mulyasari, Tamansari, Tasikmalaya Regency, West Java 46196, Indonesia', -7.3710728545379, 108.23147255927, 28),
(18, 'Sukamahi', 'P5C8+5R3, Sukamahi, Sukaratu, Tasikmalaya Regency, West Java 46415, Indonesia', -7.2795715825172, 108.16689301282, 9),
(19, 'Jalan Raya Rajapolah - Tasikmalaya', 'Jl. Raya Rajapolah - Tasikmalaya No.10, Mekarwangi, Kec. Cisayong, Kabupaten Tasikmalaya, Jawa Barat 46153, Indonesia', -7.257766856455, 108.18640977144, 9),
(20, 'Jalan Raya Rajapolah - Tasikmalaya', 'Jl. Raya Rajapolah - Tasikmalaya No.10, Mekarwangi, Kec. Cisayong, Kabupaten Tasikmalaya, Jawa Barat 46153, Indonesia', -7.2753925, 108.1887583, 9),
(21, 'Sukamajukidul', 'P56W+M4Q, Sukamajukidul, Indihiang, Tasikmalaya Regency, West Java 46151, Indonesia', -7.2883484489986, 108.19515075535, 28),
(22, 'Sukamajukidul', 'P58P+R86, Sukamajukidul, Indihiang, Tasikmalaya Regency, West Java 46151, Indonesia', -7.2829704728018, 108.18595044315, 28),
(23, 'Sukamajukaler', 'P59P+3C Sukamajukaler, Tasikmalaya Regency, West Java, Indonesia', -7.2822813847989, 108.18605002016, 28),
(24, 'Jalan Cikaret', 'P5CX+2V9, Jl. Cikaret, Sukamulya, Kec. Cihaurbeuti, Kabupaten Ciamis, Jawa Barat 46262, Indonesia', -7.2797525025709, 108.19893836975, 45),
(25, 'Terminal indihiang Tasikmalaya', 'Terminal, Sukamajukidul, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', -7.2916864, 108.1913489, 2),
(26, 'Sukaraharja', 'kp.babakanjawa desa, P5RG+6XQ, Sukaraharja, Kec. Cisayong, Kabupaten Tasikmalaya, Jawa Barat 46153, Indonesia', -7.2583485557068, 108.17837789655, 45),
(27, 'Jalan R.E. Martadinata', 'Jl. R.E. Martadinata No.272 D, Panyingkiran, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', -7.3059598628749, 108.2078332454, 28),
(28, 'Jalan Insinyur Haji Juanda', 'Jl. Insinyur H. Juanda No.90, Sukamulya, Kec. Bungursari, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', -7.3103638550343, 108.20125546306, 28),
(29, 'Jalan R.E. Martadinata', 'Jl. R.E. Martadinata No.272 D, Panyingkiran, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', -7.3059598628749, 108.2078332454, 28),
(30, 'Grand Ciomas Asri Blok A3', '9QQ6+8M, Jl. Raya Grand Ciomas Asri, Pagelaran, Kec. Ciomas Perumahan Grand Ciomas Asri Blok A3a, Kabupaten Bogor, Jawa Barat 16610, Indonesia', -6.6117421, 106.7617195, 34),
(31, 'Botani Square Mall Bogor', 'Jl. Raya Pajajaran No.40, Tugu Kujang, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 16127, Indonesia', -6.6015853, 106.8067991, 34),
(32, 'Jalan Villa Ciomas', 'Jl. Villa Ciomas No.7, Ciomas Rahayu, Kec. Ciomas, Kabupaten Bogor, Jawa Barat 16610, Indonesia', -6.5978770555115, 106.76690932363, 45),
(33, 'Jalan Harmonis', 'Jl. Harmonis No.1, RT.04/RW.04, Loji, Kec. Bogor Bar., Kota Bogor, Jawa Barat 16117, Indonesia', -6.5854112937259, 106.76869835705, 45),
(34, 'Mesjid Annur Blok P Villa Ciomas Indah', 'Jl. Murai Raya I Jl. Villa Ciomas No.Desa, Ciomas Rahayu, Kec. Ciomas, Kabupaten Bogor, Jawa Barat 16610, Indonesia', -6.5913894, 106.7648251, 34),
(35, 'Jalan Padasuka', 'Jl. Padasuka No.127, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', -7.2758301128442, 108.18999253213, 2),
(36, 'Jalan Nasional III', 'Jl. Nasional III No.105, Sukahaji, Kec. Cihaurbeuti, Kabupaten Ciamis, Jawa Barat 46262, Indonesia', -7.270632910281, 108.19957640022, 45),
(37, 'Cijulang', 'P5RV+JPG, Cijulang, Cihaurbeuti, Ciamis Regency, West Java 46262, Indonesia', -7.2599559574467, 108.19396421313, 45),
(38, 'Manggungjaya', 'Perum puri duta legok ringgit, Manggungjaya, Kec. Rajapolah, Kabupaten Tasikmalaya, Jawa Barat 46155, Indonesia', -7.2178305497808, 108.19110949597, 28);

-- --------------------------------------------------------

--
-- Table structure for table `alamat_tujuan`
--

CREATE TABLE `alamat_tujuan` (
  `id_alamat_tujuan` int(11) NOT NULL,
  `tujuan_ke` tinyint(2) NOT NULL,
  `id_transaksi` varchar(13) NOT NULL,
  `judul_alamat_tujuan` varchar(100) NOT NULL,
  `alamat_tujuan` varchar(200) NOT NULL,
  `catatan_alamat_tujuan` varchar(100) NOT NULL,
  `jarak` float NOT NULL,
  `harga` int(11) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alamat_tujuan`
--

INSERT INTO `alamat_tujuan` (`id_alamat_tujuan`, `tujuan_ke`, `id_transaksi`, `judul_alamat_tujuan`, `alamat_tujuan`, `catatan_alamat_tujuan`, `jarak`, `harga`, `latitude`, `longitude`) VALUES
(142, 0, 'MAM2306130001', 'Rumah Makan Ampera', 'Jl. HZ. Mustofa No.169, Nagarawangi, Kec. Cihideung, Kab. Tasikmalaya, Jawa Barat 46124', 'hah', 0, 72500, -7.333301, 108.219207),
(143, 0, 'KUR2306140001', 'Jalan Parakanyasag', 'P629+QRM, Jl. Parakanyasag, Parakannyasag, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', '', 5.33, 35000, -7.2976239842467, 108.21958869696),
(144, 0, 'KUR2306140002', 'Jalan Parakanyasag', 'P629+QRM, Jl. Parakanyasag, Parakannyasag, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', '', 5.33, 35000, -7.2976239842467, 108.21958869696),
(145, 0, 'MAM2306140002', 'Rumah Makan Ampera', 'Jl. HZ. Mustofa No.169, Nagarawangi, Kec. Cihideung, Kab. Tasikmalaya, Jawa Barat 46124', '', 0, 90000, -7.333301, 108.219207),
(146, 0, 'KUR2306140003', 'Terminal Indihiang Tasikmalaya', 'terminal bis, Jl. Letnan Harun No.4, Indihiang, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', '', 3.281, 14000, -7.2911164, 108.1920092),
(147, 0, 'KUR2306140004', 'Terminal Indihiang', 'Sukamajukidul, Indihiang, Tasikmalaya Regency, West Java 46151, Indonesia', '', 3.281, 14000, -7.2911499, 108.1920647),
(148, 0, 'MOB2306140005', 'Jatihurip', 'kp cireungit, P5QJ+JVX, Jatihurip, Kec. Cisayong, Kabupaten Tasikmalaya, Jawa Barat 46153, Indonesia', '', 2.841, 10000, -7.2605995151922, 108.18212259561),
(149, 0, 'MOT2306140006', 'Sukamahi', 'P5C8+5R3, Sukamahi, Sukaratu, Tasikmalaya Regency, West Java 46415, Indonesia', '', 4.234, 8000, -7.2795715825172, 108.16689301282),
(150, 0, 'MAM2306140007', 'Rumah Makan Ampera', 'Jl. HZ. Mustofa No.169, Nagarawangi, Kec. Cihideung, Kab. Tasikmalaya, Jawa Barat 46124', '', 0, 116000, -7.333301, 108.219207),
(151, 0, 'KUR2306140008', 'Jalan Padasuka', 'Jl. Padasuka No.7, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', '', 0, 12000, -7.2752191, 108.1889504),
(152, 0, 'KUR2306140009', 'Nusawangi', 'Q53G+9QM, Nusawangi, Cisayong, Tasikmalaya Regency, West Java 46153, Indonesia', '', 4.626, 28000, -7.2463568848408, 108.17726075649),
(153, 0, 'MOT2306140010', 'Jalan Sukaratu', 'P57P+8CJ, Jl. Sukaratu, Sukamajukidul, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', '', 0.69, 7000, -7.286630736203, 108.18605203182),
(154, 0, 'MOT2306140011', 'Jalan Sukaratu', 'P57P+8CJ, Jl. Sukaratu, Sukamajukidul, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', '', 0.722, 7000, -7.2866363898668, 108.18635713309),
(155, 0, 'MAM2306140012', 'Rumah Makan Ampera', 'Jl. HZ. Mustofa No.169, Nagarawangi, Kec. Cihideung, Kab. Tasikmalaya, Jawa Barat 46124', '', 0, 103000, -7.333301, 108.219207),
(156, 0, 'MOT2306140013', 'Sukamajukaler', 'P59P+3C Sukamajukaler, Tasikmalaya Regency, West Java, Indonesia', '', 0.127, 7000, -7.2822757310802, 108.18604733795),
(157, 0, 'MOB2306140014', 'Sukamajukidul', 'P57P+79V, Sukamajukidul, Indihiang, Tasikmalaya Regency, West Java 46151, Indonesia', '', 0.706, 10000, -7.2866546811314, 108.18588774651),
(158, 0, 'MOB2306140015', 'Jalan Gunung Manggu', 'P57P+PF5, Jl. Gn. Manggu, Sukamajukidul, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', '', 0.621, 10000, -7.2859705873266, 108.18616401404),
(159, 0, 'MOB2306140016', 'Sukamajukaler', 'P59P+3C Sukamajukaler, Tasikmalaya Regency, West Java, Indonesia', '', 0.127, 10000, -7.2822756, 108.1860466),
(160, 0, 'MOB2306140017', 'Jalan Ir. Haji Juanda', 'Jl. Ir. H. Juanda Desa No.10a, Mekargalih, Kec. Jatiluhur, Kabupaten Purwakarta, Jawa Barat 14150, Indonesia', '', 21.784, 0, -6.5358975380849, 107.41900227964),
(161, 0, 'KUR2306140018', 'Sukamajukidul', 'P58P+FQQ, Sukamajukidul, Indihiang, Tasikmalaya Regency, West Java 46151, Indonesia', '', 0.346, 12000, -7.2866054609995, 108.18600408733),
(162, 0, 'KUR2306140019', 'Terminal indihiang Tasikmalaya', 'Terminal, Sukamajukidul, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', '', 3.036, 12000, -7.2916864, 108.1913489),
(163, 0, 'MOT2306140021', 'Dunia Bibit', 'Jl. Padasuka No.123, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151', '', 2.357, 7000, -7.2762201, 108.1901985),
(164, 0, 'MOT2306150001', 'Jalan Padasuka', 'P5FR+W4P, Jl. Padasuka, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', '', 0.663, 7000, -7.2752484362236, 108.18904202431),
(166, 0, 'MOT2306210001', 'Dunia Bibit', 'Jl. Padasuka No.123, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151', '', 1.376, 7000, -7.2762201, 108.1901985),
(167, 0, 'MOT2306210002', 'Sukasukur', 'P5JF+FQ Sukasukur, Tasikmalaya Regency, West Java, Indonesia', '', 3.094, 19000, -7.2688449549277, 108.17448567599),
(168, 0, 'MOT2306210003', 'Jalan Raya Rajapolah - Tasikmalaya', 'Jl. Raya Rajapolah - Tasikmalaya No.10, Mekarwangi, Kec. Cisayong, Kabupaten Tasikmalaya, Jawa Barat 46153, Indonesia', '', 2.457, 15000, -7.257766856455, 108.18640977144),
(169, 0, 'MOB2306210002', 'Muhammadiyah University of Tasikmalaya', 'Jl. Tamansari No.KM 2,5, Mulyasari, Kec. Tamansari, Kab. Tasikmalaya, Jawa Barat 46196, Indonesia', '', 15.222, 38000, -7.3703298, 108.2311796),
(170, 0, 'MOT2306210021', 'Jalan Padasuka', 'P5FQ+CXG, Jl. Padasuka, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', '', 2.348, 14000, -7.276255477946, 108.19005187601),
(171, 0, 'MOT2306210022', 'Jalan Padasuka', 'P5FR+W4P, Jl. Padasuka, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', '', 2.548, 15000, -7.2752484362236, 108.18904202431),
(172, 0, 'MOB2306210023', 'Jalan Padasuka', 'P5FQ+CXG, Jl. Padasuka, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', '', 2.347, 12000, -7.276255477946, 108.19005187601),
(173, 0, 'MOT2306210024', 'Mulyasari', 'J6HJ+HPM, Mulyasari, Tamansari, Tasikmalaya Regency, West Java 46196, Indonesia', '', 0.247, 5000, -7.3710733, 108.2314791),
(174, 0, 'MOT2306210025', 'Jalan Tamansari', 'J6GJ+WX2, Jl. Tamansari, Mulyasari, Kec. Tamansari, Kab. Tasikmalaya, Jawa Barat 46196, Indonesia', 'okeh', 0.334, 5000, -7.3729771090162, 108.23225408792),
(175, 0, 'MOT2306210026', 'Kecamatan Cisayong', 'kp.Sindangelet 46153, Sukaraharja, Kec. Cisayong, Kabupaten Tasikmalaya, Jawa Barat 46153, Indonesia', '', 2.661, 16000, -7.2627822832595, 108.17877754569),
(176, 0, 'MOB2306210027', 'Sukamajukidul', 'P58P+M42, Sukamajukidul, Indihiang, Tasikmalaya Regency, West Java 46151, Indonesia', '', 1.389, 10000, -7.283168685178, 108.18538583815),
(177, 0, 'MOT2306210027', 'Jalan Cibungkul', 'P5HM+JCH, Jl. Cibungkul, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', '', 2.186, 13000, -7.269816092275, 108.18325582892),
(178, 0, 'MOT2306220001', 'Sukasukur', 'P5MM+2X2, Sukasukur, Cisayong, Tasikmalaya Regency, West Java, Indonesia', '', 1.88, 11000, -7.2670609834534, 108.18308249116),
(179, 0, 'MOT2306220002', 'Botani Square Mall Bogor', 'Jl. Raya Pajajaran No.40, Tugu Kujang, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 16127, Indonesia', '', 9.535, 28000, -6.6015853, 106.8067991),
(180, 0, 'MOT2306220003', 'Jalan Harmonis', 'Jl. Harmonis No.1, RT.04/RW.04, Loji, Kec. Bogor Bar., Kota Bogor, Jawa Barat 16117, Indonesia', 'blok b3', 3.573, 11000, -6.5854112937259, 106.76869835705),
(181, 0, 'KUR2306220004', 'Sukaraharja', 'kp.babakanjawa desa, P5RG+6XQ, Sukaraharja, Kec. Cisayong, Kabupaten Tasikmalaya, Jawa Barat 46153, Indonesia', '', 2.883, 30000, -7.2583485557068, 108.17837789655),
(182, 0, 'MAM2306220005', 'Rumah Makan Ampera', 'Jl. HZ. Mustofa No.169, Nagarawangi, Kec. Cihideung, Kab. Tasikmalaya, Jawa Barat 46124', '', 0, 89500, -7.333301, 108.219207),
(183, 0, 'MOT2306220006', 'Jalan Noenoeng Tisnasaputra', 'J6RH+H3P, Jl. Noenoeng Tisnasaputra, Kahuripan, Kec. Tawang, Kab. Tasikmalaya, Jawa Barat 46115, Indonesia', 'UMTaS', 1.765, 10000, -7.3581129335729, 108.2281479612),
(184, 0, 'MOB2306220007', 'Jalan Letjen Mashudi', 'J6H9+3XQ, Jl. Letjen Mashudi, Mulyasari, Kec. Tamansari, Kab. Tasikmalaya, Jawa Barat 46182, Indonesia', '', 1.739, 11000, -7.3721395306586, 108.21998901665),
(185, 0, 'MOB2306220008', 'Dunia Bibit', 'Jl. Padasuka No.123, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151', '', 14.913, 37000, -7.2762201, 108.1901985),
(186, 0, 'MOT2306220004', 'Jalan Sukadana', 'Jl. Sukadana No.112, Sukasukur, Kec. Cisayong, Kabupaten Tasikmalaya, Jawa Barat 46153, Indonesia', '', 2.436, 15000, -7.2667885979237, 108.1789374724),
(187, 0, 'MOT2306220005', 'Jalan Raya Rajapolah - Tasikmalaya', 'Jl. Raya Rajapolah - Tasikmalaya No.10, Mekarwangi, Kec. Cisayong, Kabupaten Tasikmalaya, Jawa Barat 46153, Indonesia', '', 0, 5000, -7.257766856455, 108.18640977144),
(188, 0, 'MOB2306220006', 'Perum Mutiara Citra Indihiang', 'Jl. Gn. Manggu, Sukamajukidul, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', '', 1.519, 11000, -7.2821148, 108.1855223),
(189, 0, 'MOT2306220007', 'Sukamahi', 'P5C8+5R3, Sukamahi, Sukaratu, Tasikmalaya Regency, West Java 46415, Indonesia', '', 0, 5000, -7.2795715825172, 108.16689301282),
(190, 0, 'MOT2306220008', 'Sukamahi', 'P5C8+5R3, Sukamahi, Sukaratu, Tasikmalaya Regency, West Java 46415, Indonesia', '', 0, 5000, -7.2795715825172, 108.16689301282),
(191, 0, 'MOT2306220009', 'Dunia Bibit', 'Jl. Padasuka No.123, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151', '', 2.15, 13000, -7.2762201, 108.1901985),
(192, 0, 'MOT2306220010', 'Dunia Bibit', 'Jl. Padasuka No.123, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151', '', 1.246, 6000, -7.2762201, 108.1901985),
(193, 0, 'MOT2306220011', 'Dunia Bibit', 'Jl. Padasuka No.123, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151', '', 1.361, 7000, -7.2762201, 108.1901985),
(194, 0, 'MOB2306220012', 'Sukahaji', 'P5GX+5JW, Sukahaji, Cihaurbeuti, Ciamis Regency, West Java 46262, Indonesia', '', 4.431, 16000, -7.2740421781873, 108.19822221994),
(195, 0, 'MOB2306220013', 'Sukamulya', 'P6C2+27M, Sukamulya, Cihaurbeuti, Ciamis Regency, West Java 46262, Indonesia', '', 3.618, 15000, -7.2794006396053, 108.20091918111),
(196, 0, 'MOT2306220014', 'Jalan Cikaret', 'P5CX+2V9, Jl. Cikaret, Sukamulya, Kec. Cihaurbeuti, Kabupaten Ciamis, Jawa Barat 46262, Indonesia', '', 3.642, 23000, -7.2797525025709, 108.19893836975),
(197, 0, 'MOT2306230001', 'Dunia Bibit', 'Jl. Padasuka No.123, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151', '', 1.355, 7000, -7.2762201, 108.1901985),
(198, 0, 'MOT2306230002', 'Dunia Bibit', 'Jl. Padasuka No.123, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151', '', 4.426, 28000, -7.2762201, 108.1901985),
(199, 0, 'MOT2306230003', 'Jalan R.E. Martadinata', 'Jl. R.E. Martadinata No.272 D, Panyingkiran, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', '', 1.166, 6000, -7.3059598628749, 108.2078332454),
(200, 0, 'MOT2306230004', 'Mesjid Annur Blok P Villa Ciomas Indah', 'Jl. Murai Raya I Jl. Villa Ciomas No.Desa, Ciomas Rahayu, Kec. Ciomas, Kabupaten Bogor, Jawa Barat 16610, Indonesia', '', 2.897, 10000, -6.5913894, 106.7648251),
(201, 0, 'MOT2306230023', 'Dunia Bibit', 'Jl. Padasuka No.123, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151', '', 4.736, 31000, -7.2762201, 108.1901985),
(202, 0, 'MOT2306230024', 'Prilude Studio', 'Perum Bumi Citra Permai Blok A No. 17, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', '', 0.153, 5000, -7.2752486, 108.1890419),
(203, 0, 'MOT2306240001', 'Jalan Brigjend Wasita Kusumah', 'Jl. Brigjend Wasita Kusumah No.5, Sukamajukidul, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', '', 0.671, 5000, -7.2876713417013, 108.19538645446),
(204, 0, 'MOT2306240002', 'Jalan Nasional III', 'Jl. Nasional III No.105, Sukahaji, Kec. Cihaurbeuti, Kabupaten Ciamis, Jawa Barat 46262, Indonesia', '', 4.642, 30000, -7.270632910281, 108.19957640022),
(205, 0, 'MOT2306240003', 'Jalan Sukamaju Sukahurip Cihaurbeuti', 'Jl. Sukamaju Sukahurip Cihaurbeuti No.32, Sukamulya, Kec. Cihaurbeuti, Kabupaten Ciamis, Jawa Barat 46262, Indonesia', '', 3.886, 25000, -7.2757097201464, 108.20465851575),
(206, 0, 'MOT2306240004', 'Cijulang', 'P5RV+JPG, Cijulang, Cihaurbeuti, Ciamis Regency, West Java 46262, Indonesia', '', 6.312, 42000, -7.2599559574467, 108.19396421313),
(207, 0, 'MOT2306240005', 'Jalan Bojong Kupa', 'P5HJ+QQC, Jl. Bojong Kupa, Sukamajukaler, Kec. Cisayong, Kab. Tasikmalaya, Jawa Barat 46151, Indonesia', '', 1.592, 9000, -7.2704277081774, 108.18203240633),
(208, 0, 'MOT2306240006', 'Sukasukur', 'P5HH+43 Sukasukur, Tasikmalaya Regency, West Java, Indonesia', '', 0, 0, -7.2722449241934, 108.17770533264),
(209, 0, 'MOB2306240007', 'Sukasukur', 'P5HH+43 Sukasukur, Tasikmalaya Regency, West Java, Indonesia', '', 3.002, 14000, -7.2722449241934, 108.17770533264),
(210, 0, 'MOT2306240008', 'Dunia Bibit', 'Jl. Padasuka No.123, Sukamajukaler, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46151', '', 6.965, 46000, -7.2762201, 108.1901985);

-- --------------------------------------------------------

--
-- Table structure for table `aplikasi`
--

CREATE TABLE `aplikasi` (
  `id_aplikasi` char(2) NOT NULL,
  `nama_aplikasi` varchar(50) NOT NULL,
  `paket` varchar(50) NOT NULL,
  `platform` enum('ios','android','web') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aplikasi`
--

INSERT INTO `aplikasi` (`id_aplikasi`, `nama_aplikasi`, `paket`, `platform`) VALUES
('01', 'Konsumen Android', '-', 'android'),
('02', 'Mitra Android', '-', 'android');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id_bank` int(11) NOT NULL,
  `kode_bank` varchar(5) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id_bank`, `kode_bank`, `logo`, `nama_bank`, `keterangan`) VALUES
(1, 'BCA', 'https://raw.githubusercontent.com/unoia/banks-logo/master/svg/bca-label.svg', 'Bank BCA', ''),
(2, 'BNI', 'https://raw.githubusercontent.com/unoia/banks-logo/master/svg/bni.svg', 'Bank BNI', ''),
(3, 'BMR', 'https://raw.githubusercontent.com/unoia/banks-logo/master/svg/mandiri.svg', 'Bank Mandiri', ''),
(4, 'BRI', 'https://raw.githubusercontent.com/unoia/banks-logo/master/svg/bri.svg', 'Bank BRI', ''),
(5, 'BSI', 'https://raw.githubusercontent.com/unoia/banks-logo/master/svg/bsi-mark.svg', 'Bank BSI', ''),
(6, 'BTPN', 'https://raw.githubusercontent.com/unoia/banks-logo/master/svg/btpn.svg', 'Bank BTPN', ''),
(7, 'BKPN', 'https://raw.githubusercontent.com/unoia/banks-logo/master/svg/bukopin.svg', 'Bank Bukopin', '');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id_banner` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `waktu_dibuat` datetime NOT NULL,
  `waktu_diperbaharui` datetime NOT NULL,
  `konten` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `id_posisi_banner` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id_banner`, `judul`, `waktu_dibuat`, `waktu_diperbaharui`, `konten`, `gambar`, `id_pengguna`, `id_posisi_banner`) VALUES
(2, 'Uji Coba Banner', '2023-04-01 03:50:15', '2023-06-08 04:29:56', '<p>Ujicoba untuk upload banner...</p>', 'jm5lD0nfQQPx5CofQQ9lql0CREPyCxhEuMt7Kg9P.png', 1, '00'),
(3, 'Promo Lebaran', '2023-04-17 04:34:27', '2023-04-17 04:34:27', 'Dapatkan diskon 10% di hari raya.', 'jmaVVc52X14rXwO4kO8UVFt5Bl1xTFUcPOTtRPTj.png', 1, '11'),
(4, 'Promo Ramadhan', '2023-04-17 04:35:09', '2023-04-17 04:35:09', '-', 'PSHW7aW0PHU90NGuJQrR5oOhfSIxJNRPZQ4mZYjN.png', 1, '11');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `info_mitra`
--

CREATE TABLE `info_mitra` (
  `id_info_mitra` int(11) NOT NULL,
  `id_jenis_kendaraan` int(11) NOT NULL,
  `plat_nomor` varchar(32) NOT NULL,
  `foto_stnk` varchar(128) NOT NULL,
  `foto_sim` varchar(128) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `kelurahan` varchar(128) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `id_status_mitra` char(2) DEFAULT NULL,
  `id_kota_layanan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info_mitra`
--

INSERT INTO `info_mitra` (`id_info_mitra`, `id_jenis_kendaraan`, `plat_nomor`, `foto_stnk`, `foto_sim`, `alamat`, `kelurahan`, `latitude`, `longitude`, `id_pengguna`, `id_kecamatan`, `id_status_mitra`, `id_kota_layanan`) VALUES
(1, 1, 'B 1234 XYZ', 'foto_stnk.jpg', 'foto_sim.jpg', 'Indihiang', 'Sukamajukaler', -7.27908, 108.18873, 38, 1, '02', NULL),
(2, 1, 'W 1234 AB', 'foto_stnk.jpg', 'foto_sim.jpg', 'Indihiang', 'Sukamajukaler', -7.32167, 108.200248, 31, 1, NULL, NULL),
(3, 1, 'L 1234 UV', 'foto_stnk.jpg', 'foto_sim.jpg', 'Indihiang', 'Sukamajukaler', -7.293433, 108.200202, 30, 1, NULL, NULL),
(4, 1, 'H 1234 IJ', 'foto_stnk.jpg', 'foto_sim.jpg', 'Indihiang', 'Sukamajukaler', -7.292982, 108.192317, 34, 1, NULL, NULL),
(5, 1, 'Z 1401 lC', 'H9eLjp9sXmWdIrjciMXD6kIBHnvBKnGv0jAe8jZb.png', 'H9eLjp9sXmWdIrjciMXD6kIBHnvBKnGv0jAe8jZb.png', 'Indihiang', 'Panyingkiran', -7.2176742075302, 108.19112700445, 4, 1, '11', 1),
(6, 1, 'asd', 'bknBPOxnWwlTRMaITE2oRebfNOsOStKdrbFKRTG3.png', 'bknBPOxnWwlTRMaITE2oRebfNOsOStKdrbFKRTG3.png', 'asd', 'ads', 0, 0, 41, 1, '02', 1),
(7, 1, 'B 123 MLK', 'foto.jpg', 'foto.jpg', 'Indonesia', '-', -7.2752312, 108.1890331, 2, 1, '02', 1),
(8, 2, 'asd', 'fkZ6FVVT7e3UNvBDLVtnQsEV4Tcej4msM0UchR0u.jpg', 'fkZ6FVVT7e3UNvBDLVtnQsEV4Tcej4msM0UchR0u.jpg', 'asd', 'asd', -7.275217, 108.1889505, 42, 1, '11', 1),
(9, 1, 'b450m sg', 'QCdYaCbVwU7nh24IHeWyNFby2XMG9kCu92AZWucF.png', 'QCdYaCbVwU7nh24IHeWyNFby2XMG9kCu92AZWucF.png', 'perum bumi citra permai', '-', -7.275195, 108.18926, 44, 1, '11', 1),
(10, 1, 'B 1234 XYZ', 'foto_stnk.jpg', 'foto_sim.jpg', 'Indihiang', 'Sukamajukaler', -7.28806, 108.19515333333, 47, 1, '11', 1),
(11, 2, 'Z3254Hg', '5fA9qAebGQslkuvO8ACDVvsNmadi1243xQrlrRfl.jpg', '5fA9qAebGQslkuvO8ACDVvsNmadi1243xQrlrRfl.jpg', 'perumahan grand ciomas asri blok c no 22 ciomas', 'tes', -7.2752225, 108.1889397, 48, 1, '11', 1),
(12, 1, 'F 9350 UCR', 'tPFRW9V9oXTjd8dZdXGUTDPhnM7VCmKvEboMsGS5.jpg', 'tPFRW9V9oXTjd8dZdXGUTDPhnM7VCmKvEboMsGS5.jpg', 'perumahan grand ciomas asri blok c no 22 ciomas bogor', 'ciomas', -6.6121407, 106.7623788, 51, 1, '11', 3);

-- --------------------------------------------------------

--
-- Table structure for table `jalur_pendaftaran`
--

CREATE TABLE `jalur_pendaftaran` (
  `id_jalur_pendaftaran` char(2) NOT NULL,
  `jalur_pendaftaran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jalur_pendaftaran`
--

INSERT INTO `jalur_pendaftaran` (`id_jalur_pendaftaran`, `jalur_pendaftaran`) VALUES
('01', 'Akun JALI'),
('02', 'Akun Google');

-- --------------------------------------------------------

--
-- Table structure for table `jam_operasional`
--

CREATE TABLE `jam_operasional` (
  `id_jam_operasional` int(11) NOT NULL,
  `nomor_hari` tinyint(1) NOT NULL,
  `jam_buka` char(5) NOT NULL,
  `jam_tutup` char(5) NOT NULL,
  `id_restoran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jam_operasional`
--

INSERT INTO `jam_operasional` (`id_jam_operasional`, `nomor_hari`, `jam_buka`, `jam_tutup`, `id_restoran`) VALUES
(1, 1, '09:00', '15:00', 2),
(2, 4, '08.00', '22.00', 3),
(3, 5, '08.00', '22.00', 3),
(4, 6, '08.00', '22.00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `jarak_tarif`
--

CREATE TABLE `jarak_tarif` (
  `id_jarak_tarif` int(11) NOT NULL,
  `jarak_tarif` int(11) NOT NULL,
  `keterangan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jarak_tarif`
--

INSERT INTO `jarak_tarif` (`id_jarak_tarif`, `jarak_tarif`, `keterangan`) VALUES
(1, 1, '0-1km'),
(2, 2, 'Diatas 1km');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kendaraan`
--

CREATE TABLE `jenis_kendaraan` (
  `id_jenis_kendaraan` int(11) NOT NULL,
  `ikon` text NOT NULL,
  `jenis_kendaraan` varchar(32) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `berat_maksimal` tinyint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_kendaraan`
--

INSERT INTO `jenis_kendaraan` (`id_jenis_kendaraan`, `ikon`, `jenis_kendaraan`, `keterangan`, `berat_maksimal`) VALUES
(1, '-', 'Motor', '-', 0),
(2, '-', 'Mobil', '-', 0);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pengguna`
--

CREATE TABLE `jenis_pengguna` (
  `id_jenis_pengguna` char(2) NOT NULL,
  `jenis_pengguna` varchar(30) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `akses_ke_web` enum('ya','tidak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_pengguna`
--

INSERT INTO `jenis_pengguna` (`id_jenis_pengguna`, `jenis_pengguna`, `keterangan`, `akses_ke_web`) VALUES
('00', 'Super Administrator', 'Dia yang memiliki hak untuk mengelola seluruh data pada sistem JALI', 'ya'),
('01', 'Admin Kota', 'Pengelola suatu wilayah/kota layanan', 'ya'),
('11', 'Konsumen', 'Memiliki akses ke aplikasi konsumen', 'tidak'),
('12', 'Mitra', 'Memiliki akses ke aplikasi mitra/driver', 'tidak');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_promo`
--

CREATE TABLE `jenis_promo` (
  `id_jenis_promo` char(2) NOT NULL,
  `jenis_promo` varchar(50) NOT NULL,
  `keterangan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_promo`
--

INSERT INTO `jenis_promo` (`id_jenis_promo`, `jenis_promo`, `keterangan`) VALUES
('01', 'Potongan - Persentase', 'Promo dalam bentuk pemotongan harga yang dihitung berdasrakan persentase dari harga jual'),
('02', 'Potongan - Nilai Pasti', 'Promo dalam bentuk pemotongan harga dengan nilai pasti dalam bentuk rupiah'),
('03', 'Cashback - Persentase', 'Promo dalam bentuk pengembalian saldo yang dihitung berdasrakan persentase dari harga jual'),
('04', 'Cashback - Nilai Pasti', 'Promo dalam bentuk pengembalian saldo dengan nilai pasti dalam bentuk rupiah');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_tarif`
--

CREATE TABLE `jenis_tarif` (
  `id_jenis_tarif` int(11) NOT NULL,
  `jenis_tarif` varchar(30) NOT NULL,
  `keterangan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_tarif`
--

INSERT INTO `jenis_tarif` (`id_jenis_tarif`, `jenis_tarif`, `keterangan`) VALUES
(1, 'Sibuk', 'Tarif Sibuk'),
(2, 'Normal', 'Tarif Normal');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_menu`
--

CREATE TABLE `kategori_menu` (
  `id_kategori_menu` int(11) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `id_restoran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_menu`
--

INSERT INTO `kategori_menu` (`id_kategori_menu`, `kategori`, `id_restoran`) VALUES
(1, 'Makanan', 1),
(2, 'Makanan', 2),
(3, 'Minuman', 1),
(4, 'Minuman', 2),
(5, 'Gurame Bakar', 3);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_restoran`
--

CREATE TABLE `kategori_restoran` (
  `id_kategori_restoran` int(11) NOT NULL,
  `foto_kategori` varchar(100) NOT NULL,
  `kategori_restoran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_restoran`
--

INSERT INTO `kategori_restoran` (`id_kategori_restoran`, `foto_kategori`, `kategori_restoran`) VALUES
(2, 'pkxSzj3hHxIXbsB5kf0Ghzh0qNxA3lMvw9i62h4T.png', 'Ramen dan Mie'),
(3, 'Ju7ls3fy2ZpGtHTEO2UN704mSG9MQDdv7S9EIVr2.png', 'Pizza'),
(4, 'ya7SCOmkTxMqXQKGO9bQI3uWNDuglAh6XiVFJQTQ.png', 'Burger'),
(5, 'GaFvPXkiYCtLxbKM7t4kxyCKqG12islm2UGWUHJ9.png', 'Aneka Nasi'),
(7, 'XmlGV6DppY0JJtFamwUFoytDuNiq5zw945zjqiKh.jpg', 'Buah');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_restoran_restoran`
--

CREATE TABLE `kategori_restoran_restoran` (
  `id` int(11) NOT NULL,
  `id_kategori_restoran` int(11) NOT NULL,
  `id_restoran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_restoran_restoran`
--

INSERT INTO `kategori_restoran_restoran` (`id`, `id_kategori_restoran`, `id_restoran`) VALUES
(2, 2, 1),
(3, 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_status_transaksi`
--

CREATE TABLE `kategori_status_transaksi` (
  `id_kategori_status_transaksi` char(2) NOT NULL,
  `kategori_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_status_transaksi`
--

INSERT INTO `kategori_status_transaksi` (`id_kategori_status_transaksi`, `kategori_status`) VALUES
('01', 'Keranjang'),
('02', 'Berjalan'),
('03', 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `nama_kecamatan` varchar(128) NOT NULL,
  `id_kota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `nama_kecamatan`, `id_kota`) VALUES
(1, 'Indihiang', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id_kota` int(11) NOT NULL,
  `nama_kota` varchar(30) NOT NULL,
  `id_provinsi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id_kota`, `nama_kota`, `id_provinsi`) VALUES
(1, 'Kota Tasikmalaya', 1),
(2, 'Kab Tasikmalaya', 1),
(4, 'Kabupaten Bogor', 1),
(6, 'Bogor Kota', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kota_layanan`
--

CREATE TABLE `kota_layanan` (
  `id_kota_layanan` int(11) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kota_layanan`
--

INSERT INTO `kota_layanan` (`id_kota_layanan`, `id_kota`, `latitude`, `longitude`) VALUES
(1, 1, -7.326326, 108.220557),
(2, 2, -7.350008, 108.110356),
(3, 4, -6.602218, 106.765326),
(5, 6, -6.5074502, 106.6946003);

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` int(11) NOT NULL,
  `ikon` varchar(100) NOT NULL,
  `nama_singkat` char(3) NOT NULL,
  `nama_layanan` varchar(30) NOT NULL,
  `deskripsi` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `ikon`, `nama_singkat`, `nama_layanan`, `deskripsi`) VALUES
(1, '-', 'MOT', 'Jali Mot', ''),
(2, '-', 'MOB', 'Jali Mob', ''),
(3, '', 'KUR', 'Jali Kurir', ''),
(4, '', 'MAM', 'Jali Mami', '');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `gambar_menu` varchar(100) NOT NULL,
  `nama_menu` varchar(150) NOT NULL,
  `deskripsi` varchar(150) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `harga_promo` int(11) DEFAULT NULL,
  `id_restoran` int(11) NOT NULL,
  `id_kategori_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `gambar_menu`, `nama_menu`, `deskripsi`, `harga_jual`, `harga_promo`, `id_restoran`, `id_kategori_menu`) VALUES
(1, 'NTRcsB0tQiwzP9d2K9l4Hxc6bUaucBwEQcqjZzEq.jpg', 'Babat', 'Babat', 24000, 0, 1, 1),
(2, 'NTRcsB0tQiwzP9d2K9l4Hxc6bUaucBwEQcqjZzEq.jpg', 'Burger', '-', 24000, 1000, 2, 1),
(3, 'NTRcsB0tQiwzP9d2K9l4Hxc6bUaucBwEQcqjZzEq.jpg', 'Gurame Bakar', 'Gurame Bakar', 54000, 0, 3, 5),
(4, 'SIDadGuoEhpVI3VKy4hYmZZeKbcwBHcBLPc9hAx2.jpg', 'asd', 'asd', 1500, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `metode_pembayaran`
--

CREATE TABLE `metode_pembayaran` (
  `id_metode_pembayaran` char(2) NOT NULL,
  `ikon` varchar(100) NOT NULL,
  `nama_metode` varchar(50) NOT NULL,
  `keterangan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `metode_pembayaran`
--

INSERT INTO `metode_pembayaran` (`id_metode_pembayaran`, `ikon`, `nama_metode`, `keterangan`) VALUES
('01', '-', 'Tunai', '-'),
('02', '-', 'Transfer Bank', '-');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penarikan`
--

CREATE TABLE `penarikan` (
  `id_penarikan` int(11) NOT NULL,
  `waktu_permintaan` datetime NOT NULL,
  `waktu_selesai` datetime NOT NULL,
  `nominal` int(11) NOT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  `id_pengguna_verifikator` int(11) DEFAULT NULL,
  `id_rekening_bank_pengguna` int(11) DEFAULT NULL,
  `id_status_transaksi` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan`
--

CREATE TABLE `pengaturan` (
  `kode_pengaturan` varchar(100) NOT NULL,
  `nilai` text NOT NULL,
  `keterangan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengaturan`
--

INSERT INTO `pengaturan` (`kode_pengaturan`, `nilai`, `keterangan`) VALUES
('ADMIN_FEE', '20', 'Persentase bagi hasil admin dan mitra, nilai yang tertulis adalah nilai bagi hasil untuk aplikator. Sedangkan untuk mitra adalah 100 dikurangi nilai'),
('ADMIN_FEE_TOPUP', '1000', 'Admin fee topup Saldo'),
('MAX_DRIVER_SEARCH_LENGTH', '20', 'Jarak maksimum pencarian mitra driver (dalam KM)'),
('MAX_RESTO_SEARCH_LENGTH', '20', 'Jarak maksimum pencarian restoran (dalam KM)');

-- --------------------------------------------------------

--
-- Table structure for table `pengelola_kota`
--

CREATE TABLE `pengelola_kota` (
  `id_pengelola_kota` int(11) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `waktu_ditetapkan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `foto_profile` varchar(100) DEFAULT NULL,
  `alamat_email` varchar(50) NOT NULL,
  `no_handphone` varchar(15) NOT NULL,
  `kata_kunci` varchar(100) NOT NULL,
  `waktu_daftar` datetime NOT NULL,
  `terakhir_login` datetime DEFAULT NULL,
  `firebase_id_token` varchar(200) DEFAULT NULL,
  `id_jenis_pengguna` char(2) NOT NULL,
  `id_jalur_pendaftaran` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_lengkap`, `foto_profile`, `alamat_email`, `no_handphone`, `kata_kunci`, `waktu_daftar`, `terakhir_login`, `firebase_id_token`, `id_jenis_pengguna`, `id_jalur_pendaftaran`) VALUES
(1, 'Super Administrator', 'bxs37lo1KCaSXiRTnBvOgpeTTftBcbzExbCFIfB7.jpg', 'admin@gmail.com', '0858824536', '$2y$10$YaOTLQfHaaq6.BzIAIAsv.2P9xlBkFGLUViYWfrjZlBWMv4LI.uHa', '2023-01-26 02:14:21', '2023-06-24 03:30:15', '', '00', '01'),
(2, 'Nailul Ngafwa', 'https://is3.cloudhost.id/prilude/images/profile/vI6Rzj12nZ2CQcP3xe4flD6SlFQ6VQr54FJDOweq.jpg', 'konsumen@gmail.com', '085882', '$2y$10$YaOTLQfHaaq6.BzIAIAsv.2P9xlBkFGLUViYWfrjZlBWMv4LI.uHa', '2023-01-26 02:14:21', '2023-06-24 10:53:34', 'cxJMju97Sbqkct7aq2hE5Q:APA91bFpqhVQe1kD9yDVOsCUH_3eS_0k5yaLb_JU-fX9WGeN0JPyKmFRE8vl6gCi_9RADo2jkF0Pxj8HRlBdfm0kPfEZL29SvbnVzU2KS7tez3eB9-a3UMVad5YaVvUJOpOlAATxCTse', '11', '01'),
(4, 'Taofik Mitra', 'https://is3.cloudhost.id/prilude/images/profile/Oe397tIumEUZNJXegWm11yKT5Cl9o0hkrnaNuWuq.jpg', 'taofik.muhammad@umtas.ac.id', '082120009498', '$2y$10$2Rllw/Vep3FbnABBY3ZL1erTeujIHV3YwplhyFWi59oWqNFxCmaSK', '2023-02-08 23:20:13', '2023-06-24 09:25:23', 'fKHaVEexSQeO5D7I_Mdmqp:APA91bHPKlw0yC0iSZzi6qGkOIHGz9YpJtyZWeHYRvKmYTi9GDZAsTg3RaFyqgpWbOJJRWXxo0OZvWIAaNHSHccNRHTAK5DQk4pAQtVYrWKv9kTKKfmAOJRpLd2KKEhyAZsHlk8jwDyR', '12', NULL),
(5, '', NULL, 'taofik.muhammad@umtas.com', '082120009497', '$2y$10$U3RwOXG9S2kMr0z0Y0LmOutwSg.NXBBVE7sW.PKQH5n0ToIO/KzmG', '2023-02-08 23:23:40', NULL, '', '00', NULL),
(6, '', NULL, 'taofik@priludestudio.com', '085720052309', '$2y$10$kloklJwu0aMNJnK0dN3EoOMkVyUgyTv9/JVZU4aYO13Yt9nG9wBmS', '2023-02-09 03:34:03', NULL, '', '11', '01'),
(7, '', NULL, 'lukmanaditiya@gmail.com', 'Lukman Aditiya', '$2y$10$2FwHFnsP6v2BAMinuYYOP.xF5gyNnd.7Q6r4ihNAksgFJ2mGMRsNO', '2023-02-09 05:43:48', NULL, '', '11', '01'),
(9, 'Lukman Aditiya Bot', 'https://is3.cloudhost.id/prilude/images/profile/5SWB4qwYHbh28mgMib7dT38SaNbpEgug1YxcCHb8.jpg', 'lukman.adty.bot@gmail.com', '0895103963', '$2y$10$uQNYvttQbmRloH.SJtmn8.BcpA33Nz3yQfE2a9oYAFTLInzWYmI1.', '2023-02-09 06:32:54', '2023-06-22 15:29:28', 'fkKD5URYQ9uN90NcHJ_wfx:APA91bG_DhEt9I03mM_SlXz6DvV20l0CQ4UpODgen4JUTD1BgD9vkD54cYlfaPi5y--pWx5RcdzwqmGXX093V-us5ChNrvOwdXuGZkiQFuTdkyftHPpuf8MdzjQW10_MFjM_rYjk93hv', '11', '01'),
(10, '', NULL, 'lukman2@gmail.com', '08956', '$2y$10$9HSEhx/FlaPgFSi9Crv1dOn5PYQgqxbYqecmuTzJe5IPxZz4esl4u', '2023-02-09 06:35:05', NULL, '', '11', '01'),
(11, '', NULL, 'lukman3@gmail.com', '089', '$2y$10$uU65QUpdZlQaHCX8PqERk.BKDLxXNmlsfYLAHnPpUo.bYuo1W0xr2', '2023-02-09 06:37:31', NULL, '', '11', '01'),
(13, '', NULL, 'asd@gmail.com', '08984561', '$2y$10$xNBZA76aslaal8CrTopHOO4Gvo3Cg4XDcyopI4Nwcmv6fPWhB.kfy', '2023-02-09 08:09:01', NULL, '', '11', '01'),
(14, '', NULL, 'david@gmail.com', '085720052308', '$2y$10$FWi6EdMxbNOYFOUJlwYItuzgaL2/inIzOv09Ly3fakRmICNW8Ic72', '2023-02-09 08:52:31', NULL, '', '11', '01'),
(15, '', NULL, 'lukmanadty@gmail.com', '089789', '$2y$10$cdQmeqxKVgmcvpL23iyL3O4BzjrzD.k6stLVWoOMJy.pkuG4Po/9C', '2023-02-09 09:02:15', NULL, '', '11', '01'),
(16, '', NULL, 'lukman1212@gmail.com', '08789', '$2y$10$n96McpBXHeiz7b40R4cl/eV837Zi4lpBaGPnpujAtI1YX1YBXzWO2', '2023-02-09 09:07:19', NULL, '', '11', '01'),
(17, '', NULL, 'lukman321@gmail.com', '08456', '$2y$10$2lN5T1yriX.gQO3P4oU92Owgtzts9YwJEtpSN5gcwRYZsEJ663qrq', '2023-02-09 09:10:36', NULL, '', '11', '01'),
(18, '', NULL, 'taofik@prilude.com', '081111111111', '$2y$10$0I0QA0my.8q88uPjkTkdIOIL1F/2KaWLAGgMEM/e8hRLVsWFN9L.G', '2023-02-09 10:02:10', NULL, '', '11', '01'),
(19, 'Lukman ADitiya', NULL, 'lukman.das@gmail.com', '08546', '$2y$10$VaREMAphgpr8.cTdN6ughOAJI9WCVZjpPf3O4gGFKS/Nka5iG9Efa', '2023-02-10 07:47:49', NULL, '', '11', '01'),
(20, 'Lukan', NULL, 'lukman.asdd@gmail.com', '0854379', '$2y$10$SwVH3Qk5no0fk9kevSTVw.q3kTFIq/XxzJpOdEfB9GFPaWAb3aaZy', '2023-02-10 07:48:59', NULL, '', '11', '01'),
(21, 'Lukman Aditiya', NULL, 'lukman.asdke@gmail.com', '0851324', '$2y$10$yhsV425uRD3piEreEEwLz.nPKtGmnpd0uAs5jzf0JuQqe/CfqklMy', '2023-02-10 07:52:07', NULL, '', '11', '01'),
(22, 'Lukman ADitiya', NULL, 'lukman.dassdkj@gmail.com', '057134', '$2y$10$aw7OTTimGbQgGOgDC8nh7.lmqb4DkxFC0g8eKf87ddd99DuGM2v02', '2023-02-10 07:54:45', NULL, '', '11', '01'),
(23, 'Lukman ADitiya', NULL, 'lukman.asdkje@gmail.com', '022137', '$2y$10$I./Hfn2139Z0FA7j4hSLueFYTplQVeWi2Evo20196a8W8lOuRDMG.', '2023-02-10 07:58:57', NULL, '', '11', '01'),
(24, 'Lukman ADitiya', NULL, 'lukman.dsakhen@gmail.com', '0851348', '$2y$10$Tm41eK4y3RppBQUo1itrKeahbzSEyf/65vxUj1mPJtvLeV9B5.AJG', '2023-02-10 08:01:07', NULL, '', '11', '01'),
(25, 'Testing', NULL, 'ujicoba@gmail.com', '08111787878', '$2y$10$BvGLlwK.UhyK6eq0C3bKJe1yruY.79Rvuw7BOcdoXJVGH5F9GxeBa', '2023-02-10 23:48:44', NULL, '', '11', '01'),
(27, 'Titin Suritin', NULL, 'titin.suritin@gmail.com', '08123123123', '$2y$10$YIdScDYWQpbp2V2W.Alze.S1ivDE0vitkbvLqWlz0g7noMtkifWxK', '2023-02-11 04:25:44', NULL, '', '11', '01'),
(28, 'Taofik Muhammad', 'https://is3.cloudhost.id/prilude/images/profile/N2vmqZWsbSqsEEjWLyoJtCSyanGeEaR9b3IIddaT.jpg', 'taofik.muhammad@gmail.com', '082120009499', '$2y$10$E53wiFBGj6Ji51ymwEtb/.LMm7fBzLUAeJRoYpSSSL4cdrm8EyyKG', '2023-02-11 07:34:20', '2023-06-24 10:40:33', 'flnkR8M4S2qujYD4dKDye-:APA91bG9jp5QOQU4WkDX0p2Ls9idiQrOwl74LqG_A2dV0J7oA38Buk0YUe7zhcHSVOC796BbNZUrphs2vZsa5KTmC1coewZNiwBxKq8b0dRwONlIpvvuIwzP5IOmb2-Vo8l_4FpnkQqu', '11', '01'),
(29, 'Nailul Ngafwa', NULL, 'nailulforbusiness@gmail.com', '085882453027', '$2y$10$fvDsLPJxV3MWgZ6pX3z8YOA5x/TnAKv5sqGwZdUX.XMXW2xu8tpTi', '2023-02-13 02:10:24', NULL, '', '11', '01'),
(30, 'Fajar Nugraha', NULL, 'fajar.nugraha@gmail.com', '0810000000', '$2y$10$CllaNbfzZGo86.ODeVnUJOwE9wd1pOZE9JEqa9ji5kDfll10RPG3S', '2023-02-13 03:07:26', NULL, 'drHR3VCPRI-j5M9TPDxvnu:APA91bHsEYU_J2aiwrgxQpRyOMag9C7yqixoyieBuNgjGMOhoTkaUgCr5R6koGTmgv7cfKLMEVcDN9Da7V-JB7o8fXAJ-Vp6_1Cc53lVQRBYs_w6pETcHrsWxfBYkTS4vTOIYPWvoHO5', '11', '01'),
(31, 'Lukman', NULL, 'lukman@gmail.com', '08231', '$2y$10$S9mTm67TPkDdotGeJKdUVOBQ2.L0j8XdaeqlmTI4/HasqHQ5y6HPu', '2023-02-13 09:31:53', '2023-02-13 09:31:53', 'drHR3VCPRI-j5M9TPDxvnu:APA91bHsEYU_J2aiwrgxQpRyOMag9C7yqixoyieBuNgjGMOhoTkaUgCr5R6koGTmgv7cfKLMEVcDN9Da7V-JB7o8fXAJ-Vp6_1Cc53lVQRBYs_w6pETcHrsWxfBYkTS4vTOIYPWvoHO5', '11', '01'),
(32, 'Dini Rafuani Pratiwi', NULL, 'dinirafuanipratiwi@gmail.com', '089610214788', '$2y$10$elbSFMBM3pOgH89mIo6SweTHsDYuk4LKZqci2GDjzUITRp.iVDW7C', '2023-02-17 23:45:27', NULL, '', '11', '01'),
(33, 'Ade Arief', NULL, 'crusades0110@gmail.com', '082134728273', '$2y$10$BK/Ydtiu9tqVox5/.NPMV.IkY5OE6Oc9MisXBmoMO3PNaeXbuRFYe', '2023-02-21 01:44:28', NULL, 'drHR3VCPRI-j5M9TPDxvnu:APA91bHsEYU_J2aiwrgxQpRyOMag9C7yqixoyieBuNgjGMOhoTkaUgCr5R6koGTmgv7cfKLMEVcDN9Da7V-JB7o8fXAJ-Vp6_1Cc53lVQRBYs_w6pETcHrsWxfBYkTS4vTOIYPWvoHO5', '11', '01'),
(34, 'Joko setiawan', NULL, 'joko_setia_wan@yahoo.com', '08974129777', '$2y$10$jB3AQwzFzDg3DMKnIuVT4ubHIjpNJgdIeTW94VysXB2XX/8dvw4bi', '2023-02-21 04:35:15', '2023-06-23 16:06:15', 'ctzcctJuQ9W6MMD91_8amC:APA91bG910on32zWS7K1K_Gaeacqk_G18CxMrhFKzeVgQ4JNgtNEox3aak8eJYn1iO22QtDBXIh1zNP3_4eOA9QC9RAayEUdyqkMhLX_eqzkINiu0sf8N0uqVgUlyvUm_LBtjQvMAc7d', '11', '01'),
(35, 'leo', NULL, 'anabiaindonesia@gmail.com', '08362726362', '$2y$10$i21NUCTQpDYU/KBoYLrAuOnGZU3uRexkHXTvkKU/cKmSS9R/FB2NO', '2023-03-10 02:05:14', NULL, '', '11', '01'),
(37, 'new', NULL, 'pti@umtas.ac.id', '08271627262', '$2y$10$TW0Hxyb0L1vOEOdfqD/qL.wMmoLs9XbRzeY1hOqUDFA41kgpHHGoS', '2023-03-28 13:51:07', '2023-03-31 13:32:52', 'dCD_19IPTnq_pOa2crUAoJ:APA91bEZF32fnJ2wUDJQy-vEUu9eb4Wkdj1Ae3P6PTBVnLDtGdNz9O1tUCUAbAh89am91z4PWj4s_X3RSXrdrojdhiVq-4_jN_C8Dhq2CTcj9f6azAGgtjWuBkIcOYAzAciKzQ_xZIVA', '11', '01'),
(38, 'Alfa Mitra', 'OYHNKKhaZbMap4lPWN1pqqklyGLdTTZCSFmNdkQh.png', 'alfa@gmail.com', '085664996321', '$2y$10$HmP67M9zkNW13tKMCumZa.5K7PO.7Q0.FRyRhRhLVPMsG8/qBouee', '2023-03-31 13:25:56', '2023-05-31 17:44:21', 'cfBgr8IGQOuHqx0mNGTyEP:APA91bFjIJI3TiUzmO1ePXkE6lJLoVt3f3NQeBUNfptnA069U_j3BKb7-mxFCze8dYNG_fCh5sQvIwEDnwa2ny778PM5mNNwBT4qKSFlhTCuiyKa2qDqjN3jVYjhntJXo-vprV5anFWq', '11', '01'),
(39, 'Nailul Ngafwa', NULL, 'nailul@gmail.com', '089646375', '$2y$10$YaOTLQfHaaq6.BzIAIAsv.2P9xlBkFGLUViYWfrjZlBWMv4LI.uHa', '2023-03-31 14:40:11', '2023-03-31 14:41:54', 'cd5LynAaRJG9lgAiRI-tKw:APA91bHE6DrmLLgvqqSews17KKMUsvuyVizlWDCU3kkrWdinQfdVBoJW4Piy-pbKzsOWzBf0NSww4qltSe9y76DmSSBAcrhlkuYqrnhIIs8uT08ic3SU8ulIrq1YlGiHTFEHzTEUfn4e', '11', '01'),
(41, 'Mitra Lukman', '', 'mitralukman@gmail.com', '0895789', '$2y$10$EYZyy.9ecLDnZR0aA3OE2.O87N4mdFEf/HxOhWxK5QoMB7k/ziQMG', '2023-05-10 04:52:22', NULL, '', '12', '01'),
(42, 'lukman mitra', 'vC0L5K1FBi0O2fmxTjcoiYtzMDJ3KoBzJj7jBLZO.jpg', 'lukmanmitra@gmail.com', '089510396303', '$2y$10$/LRDAY7RuuNnw740nAiSuO/S6fp4UvQFLbBnGxpj0BijaCs0GADwu', '2023-05-17 05:42:32', '2023-06-22 15:09:07', 'e7iC9zEyRyOjijuDzBDuDH:APA91bH_qqoUdegogAXImpCZUEaIfCF019wgljAjVi6786iZWYzE7RUuIW4OVFh_ogIuY4Jy2qgDyrr6S0AfPs8iGBSg5EUQuu4mg2q61tATr_abPSPqfutM1947epS2WGzuu3lMcMIE', '12', '01'),
(43, 'konsumen prilude 2', NULL, 'konsumenprilude2@gmail.com', '08123456789012', '$2y$10$YFDdc.GPufXSMQ/3A/OZm.t7o8N105Dsq70PTohBRDPp27vaYLnO.', '2023-05-19 07:53:37', '2023-05-20 10:28:02', 'cDBD3XeWT_KgihA_o4GlFw:APA91bF0KNAoAsh1Qwx9IgGzal3iilJXeYTCZM4xYsK4bvDsU5xD58a_FPR5Ihy7ohB2WsOMAxVU58UyP7ISQXAwlhgjsK13Qq5hkItVJt8MHnPwb_Hw2OxGHWRzAyui4mybGBsL-fxM', '11', '01'),
(44, 'Saya Mitra', NULL, 'mitra@gmail.com', '0858', '$2y$10$jzp9UqHeiVdSnXOf8Z7Fgulnyb6.QLl82XcwAup6d.izNsioar1Cu', '2023-05-23 05:52:27', '2023-06-23 17:24:33', 'f6CkM2qiShCywXKtX997uE:APA91bHlE-bTP4xjLmD1aHaJJXox5UdULaYa2FgcDS3kyBvYiI3hQSE0NBqPt0f-ipMVjGDtL-V87zBZ3ZQP_TMTG1GwWXPvYi7tBnZ1Mg3PynfrdClyfs6vVuIsMjDC68D7Sh1Jv7Nh', '12', '01'),
(45, 'Mahmud Syah', NULL, 'mahmudsyah@gmail.com', '0812345678901', '$2y$10$nL79MwaTy3IFOo75u0aHGOF5cSLjccuCBlhfCVu/EHAgVjcKtm7n6', '2023-05-24 16:41:12', '2023-06-24 10:40:39', 'emUweYisSqqWPD5-WhZVWu:APA91bESnkm-kh5R0xP8YqF42fv6YjkhPB24-rPdD_rtlczK6neUsOVMomV9VxMNK4gNAbCFO4nGGKbV9vsoWN4N045WdvF3HfSfoU_kZQRNu-SAiM8svqNEBHUZMNIdYEAeTv5EiEGX', '11', '01'),
(47, 'Ade Arief Mitra', 'ewPEwBtaUO2N9aaXsDzDnAoSTDsvpM0rMsyj9riE.jpg', 'ade.arief@gmail.com', '082123456789', '$2y$10$iVRsiIUvZQUxNDxv8pjbLeN3DLsf834Py6yY5yboegXWM4pfVMjcW', '2023-05-30 02:49:29', '2023-06-24 10:54:47', 'evddABbwRXGXs9qHpyYAM_:APA91bFL1ShndeOHf0e5u0CZU0UNMS5CHHmOA8Buc6Vy-xL2K12E2YkN9B9VMz42llDf1eqxKvK3w4M8ROCZJsLqCfhTkYrb6jZX4LUGWC8ccqZYV_9Zu2IOLGIz5rLqlqIpi_xmCj7r', '12', '01'),
(48, 'mitra bot', '', 'mitrabot@gmail.com', '08234567890123', '$2y$10$OW1hM4xPvFsz8hdcT3dTzuF0fJWd1tSSNMxoN1DClHeY1G/UYs02e', '2023-05-30 06:05:59', '2023-06-10 13:46:01', 'eC0G9jkEREmMzNZIizb8Wd:APA91bH3tLKwiEeQTUufsN3CzUTq6Vb-uWoTGg2hX1bbxBd9x7amHUTagW4R7a-qMtkuJZxaucRUXNLjj9rM80ycWPEvY1iH83VBFdVPvLWjaxxJG-z_rhVuqkzCu1Guod1YBMtusYHB', '12', '01'),
(49, 'dfs', '', 'hhds@gmail.com', '08435435345', '$2y$10$BIdGjn4mZsfBB0XfYCSFPez2GfDyZZCqmBWanSOQT00kgEPbX.pPK', '2023-06-03 02:39:09', NULL, '', '12', '01'),
(50, 'admin kota', '', 'adminkota@gmail.com', '0812345678903', '$2y$10$.Fb67KI.aLv4woobiN8zkOvRKJ0UADllT4XROZHnVD7uOE3g7XA6G', '2023-06-20 01:46:58', '2023-06-20 01:47:14', '', '01', '01'),
(51, 'jolhy', '', 'jolhy.setia.wan@gmail.com', '08987111186', '$2y$10$9gsWY2aubnG1UJhQ3UeJe.4TBg0B61TVd0WsJ.1W3aEscBdbIFzbC', '2023-06-22 04:28:54', '2023-06-23 15:38:52', 'fBn_zKV1Tp-lE-Vs12LuDU:APA91bGl41OT0cTTfYXKgTVq6DXF6MW3M-P0GW7n0Kuu8wEXz2u65_sA81-aiOUQRPzO65qHHZJ0nENoNJaqPKALxvQlULGUFf-ZAOX6cRU_TTe3nIZx-0DsSZC7aR1-YohK2VjcvzpE', '12', '01');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\AkunPengembang', 1, 'token', '8bad6756b7b8c8accb3bd25ea10a10da4b3961fbc05811aaf2f46ffc65746a99', '[\"*\"]', NULL, '2023-02-07 19:49:10', '2023-02-07 19:49:10'),
(2, 'App\\Models\\AkunPengembang', 1, 'token', 'dc60817255210ddfa7e3f9fc43334a0548651fec49aaa7d911448de27cd4db51', '[\"*\"]', NULL, '2023-02-07 20:05:52', '2023-02-07 20:05:52'),
(3, 'App\\Models\\AkunPengembang', 1, 'token', '723392ce0f0c80754169e361d74447d4655467e7ba7b39f488c23e19b210bd33', '[\"*\"]', NULL, '2023-02-07 20:05:58', '2023-02-07 20:05:58'),
(4, 'App\\Models\\AkunPengembang', 1, 'token', '43dd2b588101ba05e1354aecbbd36c9ea5c653806956daf9a01a64f278178de5', '[\"*\"]', NULL, '2023-02-07 20:09:38', '2023-02-07 20:09:38'),
(5, 'App\\Models\\AkunPengembang', 1, 'token', 'a5c9fab3a91396e3d65726bc81db8dc48ee59785b19881616310b583af1261e6', '[\"*\"]', '2023-02-08 20:53:51', '2023-02-07 20:12:41', '2023-02-08 20:53:51'),
(6, 'App\\Models\\User', 2, 'token', 'd7a176e09ad19f3b9e421a01d8645ea6f168c50b44eb752c5776f63a329a6fb1', '[\"*\"]', NULL, '2023-02-07 20:13:35', '2023-02-07 20:13:35'),
(7, 'App\\Models\\User', 2, 'token', '397637cfee37edf8215ab06ab49f4cd013f462d45fae1340b5f7b1fb8b940e17', '[\"*\"]', NULL, '2023-02-07 20:14:47', '2023-02-07 20:14:47'),
(8, 'App\\Models\\AkunPengembang', 1, 'token', 'e9e4f4851d1240c31a00d7dc294db6f8ecd0385b5bd1ea5485bdc8902fdd9c0b', '[\"*\"]', '2023-03-30 04:58:38', '2023-02-07 23:22:09', '2023-03-30 04:58:38'),
(9, 'App\\Models\\User', 2, 'token', '28a758255838e2df047cbd1e99a45dfd3a830f0589f866816ad65f43d7a451f9', '[\"*\"]', NULL, '2023-02-07 23:25:44', '2023-02-07 23:25:44'),
(10, 'App\\Models\\User', 2, 'token', 'f16c62a4613f4a9b34e4ce008a4760f1b3c2b19f77e67966c899168dca68c71a', '[\"*\"]', NULL, '2023-02-07 23:29:08', '2023-02-07 23:29:08'),
(11, 'App\\Models\\User', 2, 'token', '3137a1f2d99074a799cbb5ad79473c3a759ca0503576c8e898e1c4c687576fa1', '[\"*\"]', NULL, '2023-02-07 23:34:39', '2023-02-07 23:34:39'),
(12, 'App\\Models\\User', 2, 'token', '8be134dc73d740de8782bf0bb96cf080ddea3b98a5fb0bfc674b668e1d44c1fd', '[\"*\"]', NULL, '2023-02-08 00:33:41', '2023-02-08 00:33:41'),
(13, 'App\\Models\\User', 2, 'token', '186b0dbf2a7595024c89ddb0b341d34d65fc39126b9e1f96c9f6e09a71cb7cd6', '[\"*\"]', NULL, '2023-02-08 00:33:47', '2023-02-08 00:33:47'),
(14, 'App\\Models\\User', 2, 'token', '0cb6fe42ded99953f776109d241b8735a1b21bd47325a824e3fd4f3b72b1fbb5', '[\"*\"]', NULL, '2023-02-08 00:35:12', '2023-02-08 00:35:12'),
(15, 'App\\Models\\User', 2, 'token', '2c36a805dd2e3b444bc1736ac3eb9901bb92dd8f9204fc0d7bc127dd6f28c0ec', '[\"*\"]', NULL, '2023-02-08 00:36:01', '2023-02-08 00:36:01'),
(16, 'App\\Models\\User', 2, 'token', '96138a75f83d7aa5cad7295027ff0dad8e2ac28f439294071704e4a1f32d76c9', '[\"*\"]', NULL, '2023-02-08 00:37:46', '2023-02-08 00:37:46'),
(17, 'App\\Models\\User', 2, 'token', '4bfb1934f2ffccab56f3dbd22bbc61893990694950878c856a109a58ce15b25a', '[\"*\"]', NULL, '2023-02-08 00:39:26', '2023-02-08 00:39:26'),
(18, 'App\\Models\\User', 2, 'token', '71ce4cf4ca7c3a2a927c121b74d7efd40467235415f3134718dad370a4817876', '[\"*\"]', NULL, '2023-02-08 00:39:43', '2023-02-08 00:39:43'),
(19, 'App\\Models\\User', 2, 'token', '087910a23922351272643c263e85624c9ba38bec257d38ed336d77167e47be95', '[\"*\"]', NULL, '2023-02-08 00:40:01', '2023-02-08 00:40:01'),
(20, 'App\\Models\\User', 2, 'token', '9e5115f816bec788be53b453b91b64a7d097d899eb49980b86050e43c9155642', '[\"*\"]', NULL, '2023-02-08 00:40:20', '2023-02-08 00:40:20'),
(21, 'App\\Models\\User', 2, 'token', '2d802befb2927d219bb44afce4815d6db4acee9b01d708f4747f77cfedfc6be1', '[\"*\"]', NULL, '2023-02-08 00:40:32', '2023-02-08 00:40:32'),
(22, 'App\\Models\\User', 2, 'token', 'e1de4ed2bed70cbfbaa50c7768bf532ccb2f486912ff17682350e747dfde8e28', '[\"*\"]', NULL, '2023-02-08 00:41:08', '2023-02-08 00:41:08'),
(23, 'App\\Models\\User', 2, 'token', 'de3db4cf752f6f1144d772a077fc40b1a53eb87263d6e28df1c3637b2fc167be', '[\"*\"]', NULL, '2023-02-08 00:42:12', '2023-02-08 00:42:12'),
(24, 'App\\Models\\User', 2, 'token', '1930cb9aeefedd5de1b936ab9c606c80f909d4ba958a89d7e730df552c089b51', '[\"*\"]', NULL, '2023-02-08 00:43:15', '2023-02-08 00:43:15'),
(25, 'App\\Models\\AkunPengembang', 1, 'token', '508cad16efd610aeee5ed55066536b4474a023979f8a6baae6dcbb0f8ecb778d', '[\"*\"]', '2023-02-08 16:19:30', '2023-02-08 16:14:57', '2023-02-08 16:19:30'),
(26, 'App\\Models\\AkunPengembang', 1, 'token', 'b267038229630e2d0657acf1680f2be066f7f734ce1af0e54b04c6aeea801a1a', '[\"*\"]', '2023-02-08 20:34:17', '2023-02-08 16:19:40', '2023-02-08 20:34:17'),
(27, 'App\\Models\\User', 2, 'token', 'f80ca1a92bc1fd099d0c1feda1a037309e3ffa72ebb8608ce3fed262072d5d67', '[\"*\"]', NULL, '2023-02-08 16:24:48', '2023-02-08 16:24:48'),
(28, 'App\\Models\\User', 3, 'token', 'f194715cf6013b1f185e2488162272d37c59405c08eb97248b8213cd04c6c6fd', '[\"*\"]', NULL, '2023-02-08 16:59:11', '2023-02-08 16:59:11'),
(29, 'App\\Models\\User', 3, 'token', 'f373201e7f92f8f121afde6843b300e36bb4fd75f1a851fded754e2cd9ca995c', '[\"*\"]', NULL, '2023-02-08 17:01:25', '2023-02-08 17:01:25'),
(30, 'App\\Models\\User', 2, 'token', '1926ca34c0e469bc33c6b88690748745ef4c19eb03a84d81c984b30f7bb96910', '[\"*\"]', NULL, '2023-02-08 18:57:28', '2023-02-08 18:57:28'),
(31, 'App\\Models\\User', 3, 'token', '5d4538942b0a816b58248dd5123e969e77e921254f59c0373cdb41447038580e', '[\"*\"]', NULL, '2023-02-08 19:02:56', '2023-02-08 19:02:56'),
(32, 'App\\Models\\User', 3, 'token', '5e4ff4b08fb6ec96337c3e7391213da37f3cceffb6c9bc51eb2a4b776d28a54d', '[\"*\"]', NULL, '2023-02-08 19:03:00', '2023-02-08 19:03:00'),
(33, 'App\\Models\\User', 3, 'token', '6163413a9e0a025d9d6dd2eee2fa96760c25dfdd00de728695786447a846ff13', '[\"*\"]', NULL, '2023-02-08 19:06:05', '2023-02-08 19:06:05'),
(34, 'App\\Models\\User', 3, 'token', '2369d7f5af7ebc18f13af3bb875fae9e77304f8f0a12befd69f470413a0df64d', '[\"*\"]', NULL, '2023-02-08 19:19:29', '2023-02-08 19:19:29'),
(35, 'App\\Models\\User', 3, 'token', 'ffc9c88f4c5d9a643fe58b18f15ba983a29ba28b15326976e2f034c4157271c1', '[\"*\"]', NULL, '2023-02-08 19:59:53', '2023-02-08 19:59:53'),
(36, 'App\\Models\\User', 3, 'token', 'a25c691f2e36dab907aab98d80496242c19efce65c554e61a4d03d6eb91670af', '[\"*\"]', NULL, '2023-02-08 20:06:08', '2023-02-08 20:06:08'),
(37, 'App\\Models\\User', 3, 'token', '8a7a9d6f7512ff3e678981583b9a41d197f1df70cf3fb88c73b38f8b48162af6', '[\"*\"]', NULL, '2023-02-08 20:09:03', '2023-02-08 20:09:03'),
(38, 'App\\Models\\User', 3, 'token', '5e8d5295411af409baaf1bf42e1f590d80f7e50df1d73e970395984ba38e2acc', '[\"*\"]', NULL, '2023-02-08 20:10:56', '2023-02-08 20:10:56'),
(39, 'App\\Models\\User', 2, 'token', '01287a03e505de32e25c179c095000d6acb309e15916ffe198c4e4134aef15d5', '[\"*\"]', NULL, '2023-02-08 20:17:39', '2023-02-08 20:17:39'),
(40, 'App\\Models\\User', 3, 'token', '30e727ea8b8c74d452a176c621c1c5619293b74055991c41c455cb3f9f27f460', '[\"*\"]', NULL, '2023-02-08 20:23:25', '2023-02-08 20:23:25'),
(41, 'App\\Models\\User', 3, 'token', '3ee4d8d40eef38b0bf4f2cc0b9962a5c568e03c98e98ee3dcc8e2d7380e8a5d1', '[\"*\"]', NULL, '2023-02-08 20:53:51', '2023-02-08 20:53:51'),
(42, 'App\\Models\\User', 2, 'token', 'd2a1ba997baaccc970c17409349482ea563c75ba69eac2999a3142c133043860', '[\"*\"]', NULL, '2023-02-08 21:26:19', '2023-02-08 21:26:19'),
(43, 'App\\Models\\User', 3, 'token', '995f4af3032b8d5f7cc9892403c9f47384c60cf7cae963596b762424294fa834', '[\"*\"]', NULL, '2023-02-08 22:11:18', '2023-02-08 22:11:18'),
(44, 'App\\Models\\AkunPengembang', 1, 'token', '040783b32c783355588eef901d6edb210d2d7054ccce98cbe2a76c1e3975ef4b', '[\"*\"]', '2023-02-09 04:18:54', '2023-02-08 22:30:00', '2023-02-09 04:18:54'),
(45, 'App\\Models\\User', 2, 'token', 'a036a37b3da3eb7ab3a52e272adc61d295fcbcd2561462c5cd01f4300801f140', '[\"*\"]', NULL, '2023-02-08 22:35:34', '2023-02-08 22:35:34'),
(46, 'App\\Models\\User', 2, 'token', '7b1601ca72ea0511856245a3ea2e8227babdc066b80ba97cdc4b6ad320e3dd2f', '[\"*\"]', NULL, '2023-02-08 22:42:02', '2023-02-08 22:42:02'),
(47, 'App\\Models\\User', 11, 'token', 'd676d84cf3e8cad19ad0ea06523a6e52fc8eec95c3f8098565871f7c9c913fd7', '[\"*\"]', NULL, '2023-02-08 23:38:44', '2023-02-08 23:38:44'),
(48, 'App\\Models\\User', 3, 'token', '768a5cc552b113cbc6a35c86a5dc8b6eb85c0e7c0821bae47a6ca58a9ebc6888', '[\"*\"]', NULL, '2023-02-09 02:38:48', '2023-02-09 02:38:48'),
(49, 'App\\Models\\User', 2, 'token', 'c29154eb174ddf4cffa217367933e24462dcfd85add56a447b0af59d921d1f9d', '[\"*\"]', NULL, '2023-02-09 02:42:13', '2023-02-09 02:42:13'),
(50, 'App\\Models\\User', 2, 'token', '27f9687529bc9aa1181dd5fb11776b00645c264e24e963b931aaf1157592d8c2', '[\"*\"]', NULL, '2023-02-09 02:57:26', '2023-02-09 02:57:26'),
(51, 'App\\Models\\User', 2, 'token', 'f7b967ed4a0c9a8189730317917ffd15d4f97e16226babbe2923b71be256768a', '[\"*\"]', NULL, '2023-02-09 02:58:59', '2023-02-09 02:58:59'),
(52, 'App\\Models\\User', 3, 'token', 'a826e12f3c7ab220b0fb70fda36058aa4cd3a562d82fa898eb9d4ee3e07badcb', '[\"*\"]', NULL, '2023-02-09 03:00:38', '2023-02-09 03:00:38'),
(53, 'App\\Models\\User', 2, 'token', '607df9612bc0bbdce4c61ec2092d6ed6963434fffacb2c6e035240a4b70d79c8', '[\"*\"]', NULL, '2023-02-09 03:01:04', '2023-02-09 03:01:04'),
(54, 'App\\Models\\User', 18, 'token', '3c7bb6883d838b7f5c1a1897975492c631fc8080ddcea3b8c2562d369a14bc29', '[\"*\"]', NULL, '2023-02-09 03:03:20', '2023-02-09 03:03:20'),
(55, 'App\\Models\\User', 2, 'token', 'f74b9c8195e31b7b6a802835e1a8bcb0d17628d212001c3334b77fa65bffed3b', '[\"*\"]', NULL, '2023-02-09 03:06:59', '2023-02-09 03:06:59'),
(56, 'App\\Models\\User', 2, 'token', 'b201a3d970155899980c1750e8d2c8931fb5935ce246db6f058de68dd5175e11', '[\"*\"]', NULL, '2023-02-09 03:07:20', '2023-02-09 03:07:20'),
(57, 'App\\Models\\User', 2, 'token', 'c2e72668c2c1822af1c33078b5d36786efb954029f3a07a09d8208b8c82d99d1', '[\"*\"]', NULL, '2023-02-09 03:12:11', '2023-02-09 03:12:11'),
(58, 'App\\Models\\User', 3, 'token', '659a093001cfb1fe394ffbf5f06b869beb644038ee5ef70e9382df15f84073b3', '[\"*\"]', NULL, '2023-02-09 03:12:23', '2023-02-09 03:12:23'),
(59, 'App\\Models\\User', 2, 'token', '335b0f73b2279412ed355602dc268ec82b3ddfe2913240ea73c0f7083146281a', '[\"*\"]', NULL, '2023-02-09 03:15:24', '2023-02-09 03:15:24'),
(60, 'App\\Models\\AkunPengembang', 1, 'token', 'fc2f6ea329ab80f6136b2bc571d3fc761f44ba1740350fb17b56557d0b9eaea6', '[\"*\"]', '2023-02-09 04:23:36', '2023-02-09 04:22:11', '2023-02-09 04:23:36'),
(61, 'App\\Models\\AkunPengembang', 1, 'token', 'd2a057745bc7d06e94cb7c502ba00133f7b004f136ecefab0b16adecd9ddbda3', '[\"*\"]', '2023-02-09 19:33:07', '2023-02-09 19:20:51', '2023-02-09 19:33:07'),
(62, 'App\\Models\\AkunPengembang', 1, 'token', 'a6332074175bb2410a25ca1c2706a2c7d7d9df97d94dea020e88bf31c1873c95', '[\"*\"]', '2023-02-09 20:52:32', '2023-02-09 20:24:32', '2023-02-09 20:52:32'),
(63, 'App\\Models\\User', 17, 'token', 'e1d3e562792b504281723b27bffb517c1b079ad17647067df6d85e0405148329', '[\"*\"]', NULL, '2023-02-09 20:25:34', '2023-02-09 20:25:34'),
(64, 'App\\Models\\AkunPengembang', 1, 'token', '6a44dc86ff66df90c34222fe2d41ccc80e556953ed0a8d0d5688f256145da0d6', '[\"*\"]', '2023-02-10 01:01:06', '2023-02-10 00:09:54', '2023-02-10 01:01:06'),
(65, 'App\\Models\\AkunPengembang', 1, 'token', 'a7a0fd2beb5e55933f65955acd6441920adef2104ae22b937a482c087bd55e38', '[\"*\"]', '2023-02-10 00:22:34', '2023-02-10 00:21:51', '2023-02-10 00:22:34'),
(66, 'App\\Models\\User', 22, 'token', '63469ffc72c28b372a7f28d5fbfc6df82d165897045aab24e7e0632be6518761', '[\"*\"]', NULL, '2023-02-10 00:54:45', '2023-02-10 00:54:45'),
(67, 'App\\Models\\AkunPengembang', 1, 'token', '5737b9eb3e6742daf0bc24f31b73ff21696e8fadc93115653f0a314c55c894de', '[\"*\"]', '2023-02-10 16:49:16', '2023-02-10 16:47:37', '2023-02-10 16:49:16'),
(68, 'App\\Models\\User', 26, 'token', 'ce7f4ddc034276ea7659d8723a5c4fbe565bedb0f228127f8898e70a681b6fa9', '[\"*\"]', NULL, '2023-02-10 16:53:31', '2023-02-10 16:53:31'),
(69, 'App\\Models\\AkunPengembang', 1, 'token', '3117ca695b90a42cb6d89aee3e920b6f4b84e2d0c3c0aaf4df0bbabf33677988', '[\"*\"]', '2023-02-12 18:13:26', '2023-02-12 18:10:23', '2023-02-12 18:13:26'),
(70, 'App\\Models\\User', 28, 'token', '0e8057ce7a8c6f5301fa5adac0d9a27f42f000679ff573e15fd210d51997d677', '[\"*\"]', NULL, '2023-02-12 18:10:43', '2023-02-12 18:10:43'),
(71, 'App\\Models\\User', 29, 'token', 'ce1b03a921c4d1d1abc080fea3d3eeda09ec076f61456edd58574b8a267080c3', '[\"*\"]', NULL, '2023-02-12 19:24:06', '2023-02-12 19:24:06'),
(72, 'App\\Models\\AkunPengembang', 1, 'token', '956d1ee8a72f28976f726e52796edeb299d70e56cdcdc8d42dec72e0e587fc74', '[\"*\"]', '2023-06-24 03:54:50', '2023-02-13 20:53:03', '2023-06-24 03:54:50'),
(73, 'App\\Models\\User', 28, 'token', '03e2295cb25b5df893ace4912baeba2cebe7b3746af4c3443c140681ca6f355d', '[\"*\"]', NULL, '2023-02-13 20:54:16', '2023-02-13 20:54:16'),
(74, 'App\\Models\\AkunPengembang', 1, 'token', 'a28ce277c92654f5613ae6ec50fd8102604179662fcc07722335b153c267362b', '[\"*\"]', '2023-02-14 04:16:23', '2023-02-14 04:15:20', '2023-02-14 04:16:23'),
(75, 'App\\Models\\AkunPengembang', 1, 'token', '3ffb3bfee115aaf1ee2f511a0b0d2ed6bab19c43e1780f6ef92783934304c9e8', '[\"*\"]', '2023-02-15 19:09:54', '2023-02-14 19:37:14', '2023-02-15 19:09:54'),
(76, 'App\\Models\\AkunPengembang', 1, 'token', '60e4a4b34ed71317c7da97c6d6515f3e1002e7403c27478cc06503db7512bd7e', '[\"*\"]', '2023-02-19 19:30:35', '2023-02-15 19:16:51', '2023-02-19 19:30:35'),
(77, 'App\\Models\\User', 9, 'token', '4ddeb04a2a5e2a52138fd760b94eaaf325b3c204e4be9f2e7b5b72a5fd9dc58c', '[\"*\"]', NULL, '2023-02-15 19:17:56', '2023-02-15 19:17:56'),
(78, 'App\\Models\\User', 9, 'token', '4597f10ba8787466e506c89bf0ddff774a14361e4e1d68fab940ca6d1d3fcb28', '[\"*\"]', NULL, '2023-02-16 00:39:15', '2023-02-16 00:39:15'),
(79, 'App\\Models\\User', 9, 'token', '530cad6d160b37f2a2d4b4e480414a1a42f2897d08962889034a67d23b047c73', '[\"*\"]', NULL, '2023-02-16 01:32:40', '2023-02-16 01:32:40'),
(80, 'App\\Models\\User', 28, 'token', 'c2eedaf21894b1aa6ffde77daae212b9467b17afa936783ef5a5eb5911bfb2c5', '[\"*\"]', NULL, '2023-02-16 02:51:57', '2023-02-16 02:51:57'),
(81, 'App\\Models\\User', 9, 'token', '04c41e023c6831ee6622e3f7005ea9fc175b0b816db2f413332904ae073e496b', '[\"*\"]', NULL, '2023-02-16 18:58:02', '2023-02-16 18:58:02'),
(82, 'App\\Models\\User', 28, 'token', 'cf9b8acfed8538cdd27bc3b0860f1352760917b9bd206d9e1849131b760ddeba', '[\"*\"]', NULL, '2023-02-17 16:02:53', '2023-02-17 16:02:53'),
(83, 'App\\Models\\User', 28, 'token', 'd1cf0e0d25598af3b34e32020ce5086f3795327a604cd4e6a4cda8e800e686aa', '[\"*\"]', NULL, '2023-02-17 16:28:03', '2023-02-17 16:28:03'),
(84, 'App\\Models\\User', 28, 'token', 'ff5bd0eb7f50c750bd411c3c61804f29e1a0992446316f6db59dfbdfe2cb6508', '[\"*\"]', NULL, '2023-02-17 16:29:08', '2023-02-17 16:29:08'),
(85, 'App\\Models\\User', 28, 'token', '5f3129a4b2cacf000792770a08c37e095d333d73a117bbfc3e1c231f385f9166', '[\"*\"]', NULL, '2023-02-17 16:43:23', '2023-02-17 16:43:23'),
(86, 'App\\Models\\User', 32, 'token', '7f62dccb477b5425a8da053f2fa412236dbc4250bcf0659ef8f87acac9456f0f', '[\"*\"]', NULL, '2023-02-17 16:45:51', '2023-02-17 16:45:51'),
(87, 'App\\Models\\User', 9, 'token', '1212cd41112db7b6cfec1bbd3626b0e218349c57936eb62fa62142aeff96c495', '[\"*\"]', NULL, '2023-02-19 19:30:35', '2023-02-19 19:30:35'),
(88, 'App\\Models\\User', 9, 'token', 'f33e8856dcaae45a4bd6223e1319facc03c651d9f5ccb75bdf44be6bd587dcbb', '[\"*\"]', NULL, '2023-02-20 03:49:09', '2023-02-20 03:49:09'),
(89, 'App\\Models\\User', 28, 'token', 'd2ae70f61009a1727410eb54e675dc991e2ec6c89cdd9eabba7ce0e32ba8e285', '[\"*\"]', NULL, '2023-02-20 03:49:38', '2023-02-20 03:49:38'),
(90, 'App\\Models\\User', 28, 'token', 'e9a3d5ad8b7fee880582fc16dd054d10e706fa5ad7d7814ffc1d911a5a8b2f92', '[\"*\"]', NULL, '2023-02-20 04:05:48', '2023-02-20 04:05:48'),
(91, 'App\\Models\\User', 33, 'token', '13711cbac6a7785dc97925736304756afc4ade0872c3adab1b1e9e41469bf15c', '[\"*\"]', NULL, '2023-02-20 18:44:42', '2023-02-20 18:44:42'),
(92, 'App\\Models\\User', 34, 'token', '9c14666d7f316d83fff98b39301eed1f1e3282932ef1d7c40638a65c599f6175', '[\"*\"]', NULL, '2023-02-20 21:35:33', '2023-02-20 21:35:33'),
(93, 'App\\Models\\AkunPengembang', 1, 'token', '63756edb6d1dbb13123d6181130bdbea90929e41bbe1a71e323f7e5a07a083e2', '[\"*\"]', '2023-03-24 20:38:25', '2023-02-21 19:21:49', '2023-03-24 20:38:25'),
(94, 'App\\Models\\User', 9, 'token', '3cd21f55f51872e313f7fcb8089cd3ca7f1785050e59147656b24f9c37c9db75', '[\"*\"]', NULL, '2023-02-21 19:39:20', '2023-02-21 19:39:20'),
(95, 'App\\Models\\User', 9, 'token', '7b0441830004b5d0e6229697edd2ce063b1b1682d3801f647db3be584fed6db1', '[\"*\"]', NULL, '2023-02-21 20:45:37', '2023-02-21 20:45:37'),
(96, 'App\\Models\\User', 9, 'token', '3e24cd62342b4a6063ad44719382cf2f97576c05ec1d7ab4cfc1827cb263a048', '[\"*\"]', NULL, '2023-02-21 20:47:43', '2023-02-21 20:47:43'),
(97, 'App\\Models\\User', 9, 'token', 'f325ec73e5ea3f13036033a54fd3f6e2482385f6c0f74c3d6b6f56e0231947c5', '[\"*\"]', NULL, '2023-02-21 20:50:08', '2023-02-21 20:50:08'),
(98, 'App\\Models\\User', 9, 'token', '95694a2ec094a50952185641201f1c473e4fca54b868eb414dd0e4a7522b9904', '[\"*\"]', NULL, '2023-02-21 20:51:57', '2023-02-21 20:51:57'),
(99, 'App\\Models\\User', 9, 'token', '4c6ac1d955c6178d01f9cc59bcaa5a52336ada5f15acd1403fe788d59b2ebfef', '[\"*\"]', NULL, '2023-02-21 21:05:11', '2023-02-21 21:05:11'),
(100, 'App\\Models\\User', 9, 'token', '2503348923452dc19903418574a6976ba0b7895cfad62565dc4c874bdb70abd5', '[\"*\"]', NULL, '2023-02-21 21:07:54', '2023-02-21 21:07:54'),
(101, 'App\\Models\\User', 9, 'token', 'd43ff0aa81f0abc6c388f2eaf8a52305b3034c42435d1c4547ccfd2172414f67', '[\"*\"]', NULL, '2023-02-21 21:11:54', '2023-02-21 21:11:54'),
(102, 'App\\Models\\User', 9, 'token', '8bfbb1e88efc5c8cf0455f973f546b0c1b1a2c8cfa290d46956ae3091854749e', '[\"*\"]', NULL, '2023-02-21 21:18:12', '2023-02-21 21:18:12'),
(103, 'App\\Models\\User', 9, 'token', '86a09a9d39919b35809fd8eea5f7fe7cc79f7aa1eba754df482c7a9906327242', '[\"*\"]', NULL, '2023-02-21 21:19:45', '2023-02-21 21:19:45'),
(104, 'App\\Models\\User', 9, 'token', '05a2e1472fa85ef49b227912f8db0b34d427bb7dc23f0bb0876ad89701edee0d', '[\"*\"]', NULL, '2023-02-21 21:26:10', '2023-02-21 21:26:10'),
(105, 'App\\Models\\User', 9, 'token', 'cfc809499ca08bc29edff7d0575c2670a4abc84a7a043102b6598a7471bdb263', '[\"*\"]', NULL, '2023-02-21 21:28:08', '2023-02-21 21:28:08'),
(106, 'App\\Models\\User', 9, 'token', 'e6146a90678bbde12e4d07b3b2df72ae633f993161d7d3450bbe78c8fc6000ef', '[\"*\"]', NULL, '2023-02-21 21:43:47', '2023-02-21 21:43:47'),
(107, 'App\\Models\\User', 9, 'token', 'cb499f6f78e81ed1b91658a650e20a095ea8c7a457e10b402008c36fea9248fe', '[\"*\"]', NULL, '2023-02-21 21:45:36', '2023-02-21 21:45:36'),
(108, 'App\\Models\\User', 9, 'token', '88c3bf7e8cb1b83aa63a8a235e83285f3acbde9f75801a526d1ea61e09266a45', '[\"*\"]', NULL, '2023-02-21 22:34:11', '2023-02-21 22:34:11'),
(109, 'App\\Models\\User', 9, 'token', '0d4d682de3ed48fd1400dc78920c44d48220a357bc9b8e2b6dbfd7d42a775814', '[\"*\"]', NULL, '2023-02-21 22:34:27', '2023-02-21 22:34:27'),
(110, 'App\\Models\\User', 9, 'token', '4dc7809e74155e4483f14c7f7b25b8aaab3fdc20e245092a2675879321c37983', '[\"*\"]', NULL, '2023-02-21 22:36:32', '2023-02-21 22:36:32'),
(111, 'App\\Models\\User', 9, 'token', '1ed315a198d8d55466d071d63c890aeef121b519b0ba685a28d67dace229ff00', '[\"*\"]', NULL, '2023-02-21 22:40:27', '2023-02-21 22:40:27'),
(112, 'App\\Models\\User', 9, 'token', 'acedd4353094f80c945bf4a6b17ca223837b4b9cc062d754f9960fe007d5b103', '[\"*\"]', NULL, '2023-02-21 23:19:01', '2023-02-21 23:19:01'),
(113, 'App\\Models\\User', 28, 'token', '21574872b1e872f1f981ef88db2a166a71c71eb5442f46257243eebba6ca1fe3', '[\"*\"]', NULL, '2023-02-22 02:18:31', '2023-02-22 02:18:31'),
(114, 'App\\Models\\User', 9, 'token', '6264a9aae74fccbb4a83095b1a35841ea6180e8d02610aec589fdc5351ab85e8', '[\"*\"]', '2023-03-17 19:25:09', '2023-02-22 18:58:17', '2023-03-17 19:25:09'),
(115, 'App\\Models\\User', 28, 'token', '5796ad93ce5947126231e959cfabb7c60968ab6044b7d1bc8bf7d33c0a8b8de6', '[\"*\"]', NULL, '2023-02-22 19:06:20', '2023-02-22 19:06:20'),
(116, 'App\\Models\\User', 9, 'token', '85591ab588020647e7fc094f420ddc8d909b472af26d14599b89ce4dbe5f2023', '[\"*\"]', NULL, '2023-02-22 20:58:11', '2023-02-22 20:58:11'),
(117, 'App\\Models\\AkunPengembang', 1, 'token', 'c2f11b76a6e349805eefef6f7e599362317af8829b20ad566cfda0112e7ca25a', '[\"*\"]', '2023-02-22 21:05:56', '2023-02-22 20:59:43', '2023-02-22 21:05:56'),
(118, 'App\\Models\\User', 9, 'token', '26865597b1744e697c4e17f5c5951889dd1f05ed4b5358372856647c0251684e', '[\"*\"]', NULL, '2023-02-22 21:00:26', '2023-02-22 21:00:26'),
(119, 'App\\Models\\User', 9, 'token', '5521a1d5d6713e1de0b15cb640ec9087053ccfa6573174825ee69637bfb92732', '[\"*\"]', NULL, '2023-02-22 21:04:58', '2023-02-22 21:04:58'),
(120, 'App\\Models\\User', 9, 'token', 'a2f0ee7bc0d3562eec6c66b3bc4363cac30b9d46692c3938385c83c009e25778', '[\"*\"]', NULL, '2023-02-22 21:07:38', '2023-02-22 21:07:38'),
(121, 'App\\Models\\User', 33, 'token', 'b5a9e7e7c3f648cb0a20676027a773be7e85794b38a6b4022d6c8ce500ffb061', '[\"*\"]', NULL, '2023-02-22 21:10:36', '2023-02-22 21:10:36'),
(122, 'App\\Models\\User', 33, 'token', '7fde0e35e4f2d7b290978bffa2d6ceee10be34e4180c122ba62e53d66ee7a441', '[\"*\"]', NULL, '2023-02-22 21:11:09', '2023-02-22 21:11:09'),
(123, 'App\\Models\\User', 33, 'token', '8de8c3ca8d8ff26ee868db6f9610c973d140f7ac0c3511d4757113492c73186c', '[\"*\"]', NULL, '2023-02-22 21:11:53', '2023-02-22 21:11:53'),
(124, 'App\\Models\\User', 9, 'token', 'a267f1ccb4f5666ed75d824e22c270d3e431f6e2ad5494c36327bb7bf5956e55', '[\"*\"]', NULL, '2023-02-22 21:13:36', '2023-02-22 21:13:36'),
(125, 'App\\Models\\User', 33, 'token', 'd5ac6434ac1f440d66b58b767f778ed8b7c527e47dca50e5bb555898247e62e2', '[\"*\"]', NULL, '2023-02-22 21:16:01', '2023-02-22 21:16:01'),
(126, 'App\\Models\\User', 9, 'token', 'd7d098aa01ffe1a064aac476b6d349975e678417749594fab08f828bff0007a8', '[\"*\"]', NULL, '2023-02-22 21:19:49', '2023-02-22 21:19:49'),
(127, 'App\\Models\\User', 33, 'token', '9bbb62107d0e72af3c3df80f1ff069bca12c7ebb48b7c50a15271dc998dc1350', '[\"*\"]', NULL, '2023-02-22 21:20:28', '2023-02-22 21:20:28'),
(128, 'App\\Models\\User', 9, 'token', 'b705b071b918b0c14f8fdceb23fdd9961ad3af36302e2df00e6a21bc36cf170c', '[\"*\"]', NULL, '2023-02-22 21:24:17', '2023-02-22 21:24:17'),
(129, 'App\\Models\\User', 28, 'token', 'a66db07c3724db43cf6c75f1c88c5640acc3b69050e7bb72336aab79650a76b6', '[\"*\"]', NULL, '2023-02-22 22:37:47', '2023-02-22 22:37:47'),
(130, 'App\\Models\\User', 28, 'token', '581672b6a9cf9bf38094f8c3163dc404e1b965d014bc391f254fda57ddfd81c8', '[\"*\"]', NULL, '2023-02-22 22:41:16', '2023-02-22 22:41:16'),
(131, 'App\\Models\\User', 28, 'token', '5b26403feabefad35a0b084b6eca84fcf7902f2fdf6cddb74d8e1817f94373be', '[\"*\"]', NULL, '2023-02-22 22:42:50', '2023-02-22 22:42:50'),
(132, 'App\\Models\\User', 33, 'token', 'eda51e77c99c32bcced6649360bfc505979c06527530bca30536256bae643b50', '[\"*\"]', NULL, '2023-02-22 22:54:11', '2023-02-22 22:54:11'),
(133, 'App\\Models\\User', 28, 'token', '80bf80880d7bd7a28e36521fad8ec0f1bdfbf348cf6670f86b7fa52aabd40c02', '[\"*\"]', NULL, '2023-02-22 23:55:20', '2023-02-22 23:55:20'),
(134, 'App\\Models\\User', 9, 'token', 'b6037865fe10def1f36061e84b00f4aab9c662afa238a9a7a01f5a4f5fcae6dc', '[\"*\"]', NULL, '2023-02-23 00:06:24', '2023-02-23 00:06:24'),
(135, 'App\\Models\\User', 28, 'token', 'bb5e90dda803a14546675f451ceaacfbdd7aca3e65a198a740fd2660c64e31b7', '[\"*\"]', NULL, '2023-02-23 17:20:07', '2023-02-23 17:20:07'),
(136, 'App\\Models\\AkunPengembang', 1, 'token', '2ebed8674ec8c188834c81a0d1d1e76166b40d753672343c390a6a92e1db681f', '[\"*\"]', NULL, '2023-02-23 19:25:17', '2023-02-23 19:25:17'),
(137, 'App\\Models\\AkunPengembang', 1, 'token', 'f530ecec16b135df5c6fcd1526c74a0019d7ce77a12fe21a469f6ecba0190597', '[\"*\"]', NULL, '2023-02-23 20:04:59', '2023-02-23 20:04:59'),
(138, 'App\\Models\\User', 28, 'token', '0a8802b3640e6e6340d5984cb8478bf283679542b5c1015f539381b1f20d3c45', '[\"*\"]', NULL, '2023-02-24 20:14:27', '2023-02-24 20:14:27'),
(139, 'App\\Models\\User', 28, 'token', '1c23dcbace6fc8823af645d087e10b6429d67b4eadea165902d04c6fd8edc935', '[\"*\"]', NULL, '2023-02-26 20:42:33', '2023-02-26 20:42:33'),
(140, 'App\\Models\\AkunPengembang', 1, 'token', 'c09bbb49e3ae36ef181a7c3c664e652a05f9044c31e107a2aff2b31058a998c7', '[\"*\"]', '2023-05-31 09:18:01', '2023-02-27 06:29:15', '2023-05-31 09:18:01'),
(141, 'App\\Models\\User', 28, 'token', '93907381be410791dbfd2602aff1b4f7609e556e9229f7c868a8be7e0de94163', '[\"*\"]', NULL, '2023-02-27 21:39:46', '2023-02-27 21:39:46'),
(142, 'App\\Models\\User', 28, 'token', 'd2aae807ad8eafbc454f31cd64c2249e44d15adb2c5f1bdfdd54b5f29bd34e0a', '[\"*\"]', NULL, '2023-02-28 01:33:08', '2023-02-28 01:33:08'),
(143, 'App\\Models\\User', 28, 'token', '7623db1f12af0d38f50b80db7bc6d51ccec4bd349582991a332e85ecd443d978', '[\"*\"]', NULL, '2023-02-28 03:24:15', '2023-02-28 03:24:15'),
(144, 'App\\Models\\User', 28, 'token', '51d5cdcbdfed7d11e40bb8dd3f24dbfca1907a73a6c79f883a59fd8d336fefc1', '[\"*\"]', NULL, '2023-02-28 05:07:08', '2023-02-28 05:07:08'),
(145, 'App\\Models\\User', 28, 'token', 'd40b72bb8b3b471f2495c388908a5503bf9fc5dba66c10c527434e002f1a0983', '[\"*\"]', '2023-03-07 20:55:53', '2023-03-06 17:53:50', '2023-03-07 20:55:53'),
(146, 'App\\Models\\User', 2, 'token', 'a7d0107f99ec2ed279ddfe9f85aadb36aaddd7942d3250a5bff02f9b124cf112', '[\"*\"]', NULL, '2023-03-06 18:42:38', '2023-03-06 18:42:38'),
(147, 'App\\Models\\User', 2, 'token', '0692fb4550f79f929ccc72836c1660d183191805830706742130ac593b63d67f', '[\"*\"]', NULL, '2023-03-06 18:58:06', '2023-03-06 18:58:06'),
(148, 'App\\Models\\User', 2, 'token', '50668b70249b12573d7410250661d83c9bf2780a2f9ce50803064c63215e0887', '[\"*\"]', NULL, '2023-03-07 02:09:04', '2023-03-07 02:09:04'),
(149, 'App\\Models\\User', 2, 'token', 'a54acf5bbb4c635e6b8e8ef5d06c571628223b34c9633c70e7c37026be428eec', '[\"*\"]', '2023-03-09 02:51:59', '2023-03-07 19:36:50', '2023-03-09 02:51:59'),
(150, 'App\\Models\\User', 2, 'token', '9fa94ccbc60ac7ab9f49d7fd2b1b8d5d0f7778b2b00e2cbf9df98d0d72d00bbd', '[\"*\"]', NULL, '2023-03-07 20:31:18', '2023-03-07 20:31:18'),
(151, 'App\\Models\\User', 28, 'token', '2f910ebe1f7b0a7d03a11bd1be7ac2e5a63339fb1d21e734c48f6e31aae53d5e', '[\"*\"]', '2023-03-10 22:46:51', '2023-03-07 21:15:04', '2023-03-10 22:46:51'),
(152, 'App\\Models\\User', 2, 'token', 'c9c3244ba7df1e86cbb267adf968997aec69aa8349c1aec96278f7bd085ef12d', '[\"*\"]', '2023-03-08 01:22:46', '2023-03-07 21:57:58', '2023-03-08 01:22:46'),
(153, 'App\\Models\\User', 33, 'token', '885f860cd3316ff73643957e5715cfb1e11fe52f36f4971095747ba4b5183e05', '[\"*\"]', '2023-03-09 19:04:45', '2023-03-07 22:07:45', '2023-03-09 19:04:45'),
(154, 'App\\Models\\User', 2, 'token', '5d196c919f34d84623be0cb26c3f4000c1b9f00e1d34b08ec22f7482333b1099', '[\"*\"]', '2023-03-09 03:18:31', '2023-03-08 01:23:08', '2023-03-09 03:18:31'),
(155, 'App\\Models\\User', 35, 'token', '2dbb94225200aa8c09b98523965b0732aacc4384e202c473055df098644cb310', '[\"*\"]', '2023-03-09 19:08:54', '2023-03-09 19:05:27', '2023-03-09 19:08:54'),
(156, 'App\\Models\\User', 35, 'token', '11c9a021ca0db6574cdc28f66b569690294ec009e344dce06b64ba755529609a', '[\"*\"]', '2023-03-09 20:14:52', '2023-03-09 19:09:45', '2023-03-09 20:14:52'),
(157, 'App\\Models\\AkunPengembang', 1, 'token', 'f51ffcb9db31452968974aa507ac3de1769389597c8edaee8f5695cb245681f3', '[\"*\"]', '2023-06-24 03:53:39', '2023-03-10 18:49:34', '2023-06-24 03:53:39'),
(158, 'App\\Models\\User', 2, 'token', 'bb229637ee663359e5b718eb0f7a366462001751fe7e6834dbcddbe2dcb8fde3', '[\"*\"]', '2023-03-10 20:17:25', '2023-03-10 19:01:24', '2023-03-10 20:17:25'),
(159, 'App\\Models\\User', 2, 'token', '178db6baa599bedb4bf51583aa0919c1cb08ad206ec51b156656fcc402184908', '[\"*\"]', '2023-03-10 19:14:06', '2023-03-10 19:11:45', '2023-03-10 19:14:06'),
(160, 'App\\Models\\User', 2, 'token', '0d6b2617d19e309c4cb499f7e946191c45e854f6a975e73c48bf336eb882282b', '[\"*\"]', '2023-03-20 21:58:44', '2023-03-10 20:20:35', '2023-03-20 21:58:44'),
(161, 'App\\Models\\User', 2, 'token', 'ea546f88fe2615e690a39dcea4d9fa57bc814d9043fcb44f76585d187bb5ca85', '[\"*\"]', '2023-03-21 04:54:48', '2023-03-10 22:54:58', '2023-03-21 04:54:48'),
(162, 'App\\Models\\User', 35, 'token', '532bf8456c5014645348b1410ee239c1afc601c3035c49d1789e93a1bf94c2ad', '[\"*\"]', '2023-03-10 23:00:47', '2023-03-10 23:00:11', '2023-03-10 23:00:47'),
(163, 'App\\Models\\User', 2, 'token', '2d1e266c0c5ff06a7f48ba600f663072ad5e19625ef9e7d9260187d62dcc9d8b', '[\"*\"]', '2023-05-06 12:31:33', '2023-03-11 18:56:24', '2023-05-06 12:31:33'),
(164, 'App\\Models\\User', 2, 'token', 'da4cc68fd606534a57c2da65e83b040fd0e45e924d91594e0ae7db443c1bc4f0', '[\"*\"]', NULL, '2023-03-16 21:01:16', '2023-03-16 21:01:16'),
(165, 'App\\Models\\User', 9, 'token', 'feee47781cd72f23500a9b6bffbf6fe26898295e0ef8df963e3c7a2978ccb66f', '[\"*\"]', '2023-03-24 09:55:02', '2023-03-17 19:25:39', '2023-03-24 09:55:02'),
(166, 'App\\Models\\User', 28, 'token', '1b020619f515afa3c911688ef0fcf12d313a07c45aa385618151410da1dd5743', '[\"*\"]', '2023-03-24 23:07:17', '2023-03-20 17:28:52', '2023-03-24 23:07:17'),
(167, 'App\\Models\\AkunPengembang', 1, 'token', 'a34cd66279f85430fbe262f91ef1cb79fe69b6f87149d87e9fe5a38bd916450d', '[\"*\"]', '2023-05-31 03:15:10', '2023-03-20 19:11:45', '2023-05-31 03:15:10'),
(168, 'App\\Models\\User', 9, 'token', 'bcf870ebd03a2c866d390c03b321a91d8fdc6cb9360c22b656de08e3efd6f745', '[\"*\"]', NULL, '2023-03-20 19:12:21', '2023-03-20 19:12:21'),
(169, 'App\\Models\\User', 2, 'token', 'd746ba92bb20921eec90a0bc6e207cc6b6c41b2da72718c40d92e0d3edd90a77', '[\"*\"]', '2023-03-20 22:51:39', '2023-03-20 22:32:44', '2023-03-20 22:51:39'),
(170, 'App\\Models\\User', 2, 'token', '86894fc541d43561c81899652e2b9ff233f697598d8cacc1116f85c76fa86a27', '[\"*\"]', '2023-03-20 22:53:15', '2023-03-20 22:53:14', '2023-03-20 22:53:15'),
(171, 'App\\Models\\User', 2, 'token', 'c3567938f2316395765e280569cef2b2c8ea6e0a2513cacaa21765c2aec392f7', '[\"*\"]', '2023-03-24 00:57:19', '2023-03-20 23:23:58', '2023-03-24 00:57:19'),
(172, 'App\\Models\\User', 2, 'token', 'c6b91736cdd9553d1ee5b7eaeeadabc228b54283b283271e688e6c7777130938', '[\"*\"]', NULL, '2023-03-24 06:28:14', '2023-03-24 06:28:14'),
(173, 'App\\Models\\User', 9, 'token', '345573709eb7943a16445059a23ad1ce48d5f828ce3eee933f07517032dd3128', '[\"*\"]', '2023-03-25 00:08:00', '2023-03-24 09:57:00', '2023-03-25 00:08:00'),
(174, 'App\\Models\\User', 2, 'token', '9914c2a33d6c75ff8718973b8f8a3e3b752a5a2a20dc38b2cb111adcbd390bdb', '[\"*\"]', NULL, '2023-03-24 20:35:13', '2023-03-24 20:35:13'),
(175, 'App\\Models\\User', 28, 'token', '0e55625a783aca3c1dc1100a66b14c7c6b719ad55c0d61fb07848d62652f8517', '[\"*\"]', '2023-03-28 02:28:35', '2023-03-24 23:39:14', '2023-03-28 02:28:35'),
(176, 'App\\Models\\User', 2, 'token', 'df4fe8d984c6c6ee2682cf11c31630eea9dddde88f84211535528e3f67546eeb', '[\"*\"]', '2023-03-28 05:40:02', '2023-03-26 20:18:28', '2023-03-28 05:40:02'),
(177, 'App\\Models\\User', 2, 'token', '4da2ef91357df969a4fe5d4deee3de04f2baa8926ed5dfd2125598ea8651c342', '[\"*\"]', '2023-03-29 07:38:44', '2023-03-28 03:23:37', '2023-03-29 07:38:44'),
(178, 'App\\Models\\User', 2, 'token', '122775b919a4e15d8f8922101d035815ebe474a226f41a08a8c0641947d69c15', '[\"*\"]', '2023-03-28 06:50:42', '2023-03-28 04:25:46', '2023-03-28 06:50:42'),
(179, 'App\\Models\\User', 28, 'token', '58215daf079dac781e4aba523d8b5efa9d0a7beb281d3d3a0ff7132e631f1532', '[\"*\"]', '2023-03-28 08:22:10', '2023-03-28 05:39:58', '2023-03-28 08:22:10'),
(180, 'App\\Models\\User', 36, 'token', '8bf639400cb4002c8b265719be54662cda1974a6b17b0977dc94a07479992b74', '[\"*\"]', '2023-03-28 09:51:41', '2023-03-28 05:44:32', '2023-03-28 09:51:41'),
(181, 'App\\Models\\User', 2, 'token', '0a1ddf05bcb2790fd91161c4b4501b5b55f443971368a138533b314d5a23e264', '[\"*\"]', '2023-03-28 07:11:59', '2023-03-28 06:08:08', '2023-03-28 07:11:59'),
(182, 'App\\Models\\User', 37, 'token', '0bb42d660ad494cab436fd74dd7e952c8ad1bac1787e776e2709b31a6451d811', '[\"*\"]', '2023-03-31 06:33:05', '2023-03-28 06:51:16', '2023-03-31 06:33:05'),
(183, 'App\\Models\\User', 2, 'token', 'f4e5d790aae92b74b7550bf13ba27429c9a71e696f4d8823c373d0850934b6af', '[\"*\"]', '2023-03-31 05:29:05', '2023-03-28 07:21:54', '2023-03-31 05:29:05'),
(184, 'App\\Models\\User', 2, 'token', 'b038222a30b6ba850d9b38255b3c742fd4ad02863065e57b0fa174eb630aa060', '[\"*\"]', '2023-06-21 09:42:41', '2023-03-28 07:57:15', '2023-06-21 09:42:41'),
(185, 'App\\Models\\User', 2, 'token', '9666f86ccfdbea168bd751a5ae6a4c08b88298e6de0135142dd57f052c3e121b', '[\"*\"]', NULL, '2023-03-28 09:51:56', '2023-03-28 09:51:56'),
(186, 'App\\Models\\User', 2, 'token', '288e5a9f3ef3397d32e66262ffcdd43d307f7a1bc689fc2a0051ab482400ac03', '[\"*\"]', NULL, '2023-03-28 09:52:04', '2023-03-28 09:52:04'),
(187, 'App\\Models\\User', 2, 'token', '2918db15870e428a7f7503cd2b9503ef7a0305a5f42def146caabfad4d85d62e', '[\"*\"]', NULL, '2023-03-28 09:52:21', '2023-03-28 09:52:21'),
(188, 'App\\Models\\User', 2, 'token', '4de9de9cbaef588437c73bca5045e9bd739c3e343413a19fc9760d6ca0919285', '[\"*\"]', NULL, '2023-03-28 09:52:34', '2023-03-28 09:52:34'),
(189, 'App\\Models\\User', 2, 'token', 'bf82a49d869bca82f30def74255ae58bf711bd513fe87348b7a91ed21999cd87', '[\"*\"]', NULL, '2023-03-28 09:53:05', '2023-03-28 09:53:05'),
(190, 'App\\Models\\User', 2, 'token', '072a233407be9fe9beda1bd3a9b99cc504d6be183eddeec97d5099aff3462a64', '[\"*\"]', NULL, '2023-03-28 09:53:37', '2023-03-28 09:53:37'),
(191, 'App\\Models\\User', 2, 'token', '66f0fc5644f8f658401adb195adf49f6c02594fe96a16063bf110a99c1d48680', '[\"*\"]', NULL, '2023-03-28 09:54:22', '2023-03-28 09:54:22'),
(192, 'App\\Models\\User', 2, 'token', '5c99424aa5150cf983e5368f72a2b843323adbeaa2c3f4b9d9df1847ad29ddb7', '[\"*\"]', NULL, '2023-03-28 09:58:34', '2023-03-28 09:58:34'),
(193, 'App\\Models\\User', 2, 'token', '2bfc3aa9379a7eb2e79c5b70c6b6054e901664856c364b4eec32dca46c19c1c1', '[\"*\"]', NULL, '2023-03-28 09:59:16', '2023-03-28 09:59:16'),
(194, 'App\\Models\\User', 2, 'token', 'f3ff31b682c336a863d6775cb73d1724c8b26d0ca13e61acb8e7d90db203f8c5', '[\"*\"]', NULL, '2023-03-28 09:59:18', '2023-03-28 09:59:18'),
(195, 'App\\Models\\User', 2, 'token', 'ff52ad0fbd3b29437022fb73e30a8904ae17ec1d1dc23ac5ab5987fd4e185b7b', '[\"*\"]', NULL, '2023-03-28 09:59:38', '2023-03-28 09:59:38'),
(196, 'App\\Models\\User', 2, 'token', 'b489838798373718022747278661a6d44f24bb3ce263b8162577d80dcfd64171', '[\"*\"]', NULL, '2023-03-28 10:00:20', '2023-03-28 10:00:20'),
(197, 'App\\Models\\User', 2, 'token', 'adcf4e55b2c6ff477f36f46c1d429da8d3fd2a82a3f5297759fe2d4ba1505412', '[\"*\"]', NULL, '2023-03-28 10:00:57', '2023-03-28 10:00:57'),
(198, 'App\\Models\\User', 2, 'token', 'bb08a53072cefbbdb41bb1ac3a4d007def0a2c8fb2f4304284f5020f0bc3bc7f', '[\"*\"]', NULL, '2023-03-28 10:01:14', '2023-03-28 10:01:14'),
(199, 'App\\Models\\User', 2, 'token', '0ae783ccd2321df1669ff4e953cce5c4a1816a46626e6c804556c83279a77396', '[\"*\"]', NULL, '2023-03-28 10:01:36', '2023-03-28 10:01:36'),
(200, 'App\\Models\\User', 2, 'token', '1f5a2bc59c16370a89bac7d2ef6b5609baec2b385e2ca0adb446f245d5b1fa89', '[\"*\"]', '2023-04-18 04:25:46', '2023-03-28 10:03:11', '2023-04-18 04:25:46'),
(201, 'App\\Models\\User', 28, 'token', '3bdec4b31fbb3ce7ac484e3f759777d1205bd50d5dbba15529a8c5e734408e8d', '[\"*\"]', '2023-03-29 03:23:09', '2023-03-29 03:18:08', '2023-03-29 03:23:09'),
(202, 'App\\Models\\User', 28, 'token', '39b2a9d3219e3b23d95e7062f8ba2528cdaf2e2fad521fb13bee4400dfff3720', '[\"*\"]', '2023-03-30 05:07:52', '2023-03-29 04:47:18', '2023-03-30 05:07:52'),
(203, 'App\\Models\\User', 2, 'token', '57f95d36e71532ce9b60e399126d404be6deb947a158e203534a5034ae727765', '[\"*\"]', '2023-03-31 05:42:22', '2023-03-31 05:30:29', '2023-03-31 05:42:22'),
(204, 'App\\Models\\User', 2, 'token', 'da5bc7fe49b2debad0a993f41689778ca0ae739075fa4cfda5970fcffaa54b04', '[\"*\"]', '2023-04-03 06:45:05', '2023-03-31 05:46:34', '2023-04-03 06:45:05'),
(205, 'App\\Models\\User', 38, 'token', '7c78fffc9b9f9e15af8aaffdb9664863343317edaf8ec30c90ce4a2920eaef89', '[\"*\"]', '2023-03-31 06:27:18', '2023-03-31 06:26:50', '2023-03-31 06:27:18'),
(206, 'App\\Models\\User', 38, 'token', 'c6717d7f48770da0df0e092754a372c75019e8f38fba968cef0b591d86d05300', '[\"*\"]', '2023-03-31 06:40:02', '2023-03-31 06:27:55', '2023-03-31 06:40:02'),
(207, 'App\\Models\\User', 2, 'token', '9d59265cc3a6a40803cc18f892209821fefd96c47553d98c6cb22779dccf15d7', '[\"*\"]', '2023-03-31 06:31:32', '2023-03-31 06:29:03', '2023-03-31 06:31:32'),
(208, 'App\\Models\\User', 2, 'token', 'd690e839154b0a8ab8ebc4f820aca80bb6d745aea5ac43d8506d5adf265ff96a', '[\"*\"]', '2023-03-31 07:37:24', '2023-03-31 06:33:22', '2023-03-31 07:37:24'),
(209, 'App\\Models\\User', 39, 'token', 'ef120d9556c8b982910c2e7f6870e1b8c205e61d4f66909479f9e2618691ab35', '[\"*\"]', '2023-03-31 07:44:01', '2023-03-31 07:41:53', '2023-03-31 07:44:01'),
(210, 'App\\Models\\AkunPengembang', 1, 'token', 'ad98c077010c44a726c5c8c4f7ece77f2a2bd4ca1b8bd2d1adffcc4898e70f1c', '[\"*\"]', NULL, '2023-04-01 03:03:27', '2023-04-01 03:03:27'),
(211, 'App\\Models\\AkunPengembang', 1, 'token', '9266630ba50e772177e02dad6e2a57a7cce134ac8084ff59d10e786c6494e86e', '[\"*\"]', '2023-05-30 04:59:09', '2023-04-01 03:09:22', '2023-05-30 04:59:09'),
(212, 'App\\Models\\AkunPengembang', 1, 'token', '63f857f29c5ea33a7959220b93828d6a3e617b459a7fd9506863d078e65c54ed', '[\"*\"]', '2023-04-01 03:13:06', '2023-04-01 03:11:56', '2023-04-01 03:13:06'),
(213, 'App\\Models\\User', 38, 'token', 'bd3b5d202fcbe55bab6c03fa92e2636e965b9b43b2692f5fa98b214ce7b54808', '[\"*\"]', '2023-05-31 11:41:47', '2023-04-03 03:49:46', '2023-05-31 11:41:47'),
(214, 'App\\Models\\User', 38, 'token', 'acd4422a84d4be808cee3dfc3ad3325e9540e58854683d5296be6cfbd99256fd', '[\"*\"]', '2023-05-17 02:51:08', '2023-04-03 06:47:19', '2023-05-17 02:51:08'),
(215, 'App\\Models\\User', 28, 'token', '931d6bd87400f31523d5782474cbbf46774dea88555517a03ff783e5a51ce86f', '[\"*\"]', '2023-05-01 23:05:25', '2023-04-04 23:31:49', '2023-05-01 23:05:25'),
(216, 'App\\Models\\User', 2, 'token', 'adddddabb621fa3f5acfa0d59b7dfb987de64acbc00d53f7b9f6f09333e13b40', '[\"*\"]', '2023-05-30 02:58:35', '2023-04-18 04:27:21', '2023-05-30 02:58:35'),
(217, 'App\\Models\\User', 28, 'token', '9f04348358540fecf29b57d1c5835aa4e301a3c77c4febf49af2e7ea9cff36b0', '[\"*\"]', '2023-05-03 07:40:40', '2023-05-01 23:05:50', '2023-05-03 07:40:40'),
(218, 'App\\Models\\User', 2, 'token', '44b7f5ab0c8a4446902e69cabddbf4ce36bc06788460719ec53f2455a9cd0ea2', '[\"*\"]', NULL, '2023-05-02 08:58:58', '2023-05-02 08:58:58'),
(219, 'App\\Models\\User', 2, 'token', 'c9fcf4ca8a84e0ed845c3b4fe6c36721b7053cfe43ddf6a589a3a39c416020d1', '[\"*\"]', NULL, '2023-05-02 09:43:48', '2023-05-02 09:43:48'),
(220, 'App\\Models\\User', 2, 'token', '4f113b51a3d88fcdecf563d12352349ad5f423f2ce713a1b54b3e54a46b7c484', '[\"*\"]', NULL, '2023-05-02 10:00:38', '2023-05-02 10:00:38'),
(221, 'App\\Models\\User', 2, 'token', '040e0126fb1a81ac6ea146cc536230d3d02c24649cabc8ce8c5d3826b4806e8c', '[\"*\"]', NULL, '2023-05-02 10:29:17', '2023-05-02 10:29:17'),
(222, 'App\\Models\\User', 2, 'token', '80bd29b0ab1897f87fd3f22f88d8b6d07ab1a99d4c922c7d6bf699aaf8cf2414', '[\"*\"]', NULL, '2023-05-02 10:29:59', '2023-05-02 10:29:59'),
(223, 'App\\Models\\User', 2, 'token', 'a4eb9f2bfc7c417eb273f3f3420edb30946823b4ea3b8ffe0b9a6c30827a73e0', '[\"*\"]', NULL, '2023-05-02 10:30:06', '2023-05-02 10:30:06'),
(224, 'App\\Models\\User', 2, 'token', '798950210c1609abfef99c96c5439ec64830396278e8eadf91eea77b6497d782', '[\"*\"]', NULL, '2023-05-02 10:30:08', '2023-05-02 10:30:08'),
(225, 'App\\Models\\User', 2, 'token', '2f7af8b7482b81d8f0ab027e3c424b68a4751ef9672131de096356acdc929cd5', '[\"*\"]', '2023-05-02 10:30:55', '2023-05-02 10:30:41', '2023-05-02 10:30:55'),
(226, 'App\\Models\\User', 2, 'token', '77ad3e4b65b4b826f7bd3b28f1b66143058f86688e41b8895cd858b4d4fa70cd', '[\"*\"]', NULL, '2023-05-02 10:30:55', '2023-05-02 10:30:55'),
(227, 'App\\Models\\User', 28, 'token', '6af13902813371b21fc5698d921bc1f43840bf7750631143413c7a09ab015c44', '[\"*\"]', '2023-05-10 00:23:30', '2023-05-04 03:29:55', '2023-05-10 00:23:30'),
(228, 'App\\Models\\User', 4, 'token', 'f85f8b8aa617e535df62a7cbc2a32f9e7ea4c69549f6d09a92b0159791891b8d', '[\"*\"]', '2023-05-10 00:21:20', '2023-05-10 00:14:54', '2023-05-10 00:21:20'),
(229, 'App\\Models\\User', 2, 'token', 'ce7e603a7823eb11f37034efdf7c3a7df3818382be9d69e21feb6d8cd91d1d7f', '[\"*\"]', '2023-05-11 02:16:20', '2023-05-10 01:36:49', '2023-05-11 02:16:20'),
(230, 'App\\Models\\User', 28, 'token', '8d00eedeb6b2c47073c30bc9f9894131461eff659d02f25433e4fd238c202d77', '[\"*\"]', NULL, '2023-05-10 04:45:57', '2023-05-10 04:45:57'),
(231, 'App\\Models\\User', 28, 'token', 'e6eeb383cf278ed1098c839f031a471a4c6bf162d2e70c8233e3416842cf4451', '[\"*\"]', '2023-06-19 01:53:28', '2023-05-10 04:46:34', '2023-06-19 01:53:28'),
(232, 'App\\Models\\User', 4, 'token', 'd1977753881834da048112ef8965753386765059819fd58d4b91ade3f38c66a2', '[\"*\"]', '2023-05-15 07:18:49', '2023-05-10 07:59:40', '2023-05-15 07:18:49'),
(233, 'App\\Models\\User', 2, 'token', '6f7a2033a01adca577be2e778fbf7e0cdbc53c3a2d610f9541ee92a2d2c01ab8', '[\"*\"]', '2023-05-16 10:02:22', '2023-05-11 02:05:47', '2023-05-16 10:02:22'),
(234, 'App\\Models\\User', 2, 'token', '38b6d9043e6bd7814fc096a04e18d131f1d51bda9571bb5be69c9a24b0b554b5', '[\"*\"]', '2023-05-15 07:04:09', '2023-05-15 07:01:01', '2023-05-15 07:04:09'),
(235, 'App\\Models\\User', 28, 'token', 'a985d3de92766b2e44a388ccac555e15ed6a4f89cb5d71c48c7d4e38899424ac', '[\"*\"]', NULL, '2023-05-15 07:17:40', '2023-05-15 07:17:40'),
(236, 'App\\Models\\User', 4, 'token', '51654d714e7cdd20e7d8b2b032456da56ff483c942f28638fad23c57a2ccb179', '[\"*\"]', '2023-05-15 13:01:49', '2023-05-15 07:19:29', '2023-05-15 13:01:49'),
(237, 'App\\Models\\User', 28, 'token', '956009b8eb6cad13f913cd00d27800c3418a4ce3bb1a41d58c3ecb03bcc55358', '[\"*\"]', '2023-05-25 02:45:40', '2023-05-15 07:20:03', '2023-05-25 02:45:40'),
(238, 'App\\Models\\User', 2, 'token', '7b26c5e7f5a19d34a0f036bf7fd0f3da8f61f282e93796d15ed8ca75d6951e2b', '[\"*\"]', '2023-05-15 13:01:54', '2023-05-15 10:20:31', '2023-05-15 13:01:54'),
(239, 'App\\Models\\User', 28, 'token', '4ac740e4475e7cf9a2895bd86f6cbcb374db0a6f58f2d3adde52321b9e15804e', '[\"*\"]', '2023-05-16 07:04:14', '2023-05-16 03:21:26', '2023-05-16 07:04:14'),
(240, 'App\\Models\\User', 4, 'token', '8bcf300ece8e664d5725fee99b508684c83cc48a3379bb283c58cc14dcc38d70', '[\"*\"]', '2023-05-16 08:12:54', '2023-05-16 07:00:39', '2023-05-16 08:12:54'),
(241, 'App\\Models\\User', 2, 'token', 'c511b9482c87444138bdffe681a40e73b07dabe7bafada030b423c9b0d02fe7d', '[\"*\"]', '2023-05-16 08:04:58', '2023-05-16 07:10:40', '2023-05-16 08:04:58'),
(242, 'App\\Models\\User', 28, 'token', '9bf0b2cc8f6b5a2601a8737f7343391dd6a71180f699f1a5705dabd690c83794', '[\"*\"]', '2023-05-17 02:50:28', '2023-05-17 02:50:15', '2023-05-17 02:50:28'),
(243, 'App\\Models\\User', 4, 'token', 'd31c254908d1ca722ca8cf2fd6a8c007e5847a10e66087e09ed388c4f2341556', '[\"*\"]', '2023-05-17 02:55:30', '2023-05-17 02:54:27', '2023-05-17 02:55:30'),
(244, 'App\\Models\\User', 4, 'token', '5b5bfafc0fffe08f15c817df4f607db786c73660604e820c873f0021bb5e8f07', '[\"*\"]', '2023-05-17 03:02:16', '2023-05-17 03:02:12', '2023-05-17 03:02:16'),
(245, 'App\\Models\\User', 4, 'token', '0453e60d2599375a5c8c76cd9a716cb96e9b1d512ca46cfdc65928a217bd2076', '[\"*\"]', '2023-05-23 05:49:02', '2023-05-17 03:06:07', '2023-05-23 05:49:02'),
(246, 'App\\Models\\User', 42, 'token', 'a50dba5b1d671b57d96c0341308f1892334558879b45715eb975a090ea4f7713', '[\"*\"]', '2023-05-17 05:43:36', '2023-05-17 05:43:31', '2023-05-17 05:43:36'),
(247, 'App\\Models\\User', 42, 'token', 'f19832370de202c3c2d1f7509abed3b9134753e49b463cd3d1b7d3a8e960e94e', '[\"*\"]', '2023-05-20 03:35:42', '2023-05-17 05:58:29', '2023-05-20 03:35:42'),
(248, 'App\\Models\\User', 43, 'token', '449cd5c3ab96b5e2fff63f85d27097b912f5ba7fa5bdcd089e9da6904ae89ba0', '[\"*\"]', '2023-05-20 03:28:36', '2023-05-19 00:54:01', '2023-05-20 03:28:36'),
(249, 'App\\Models\\User', 42, 'token', 'dfe5b6e7682430433b17977f2a45e491c191bf6ae545ab30eec2b9cf8dc61934', '[\"*\"]', '2023-05-19 08:19:49', '2023-05-19 02:46:22', '2023-05-19 08:19:49'),
(250, 'App\\Models\\User', 44, 'token', 'dfe25aa1d9b0c027aaca02852c9adee6cb7f5cd1d803d99c0d0a9eb61f635b23', '[\"*\"]', '2023-05-23 15:25:12', '2023-05-23 05:54:25', '2023-05-23 15:25:12'),
(251, 'App\\Models\\User', 2, 'token', 'f484ae114251da4586e8bc7aea10b9b5826c750593938966b7428d6d5582580b', '[\"*\"]', '2023-05-24 02:07:57', '2023-05-23 15:00:48', '2023-05-24 02:07:57'),
(252, 'App\\Models\\User', 44, 'token', 'ac2df8533d42b0e4e9fb795d5710793f956d4b3e3be8989dccc22b943d420bca', '[\"*\"]', '2023-05-29 12:58:55', '2023-05-23 15:07:16', '2023-05-29 12:58:55'),
(253, 'App\\Models\\User', 44, 'token', '3ed81174edeb582c3fd667bad12001db066f228bcc6be08828d335d3e365e2d5', '[\"*\"]', '2023-05-24 02:28:34', '2023-05-24 02:27:13', '2023-05-24 02:28:34'),
(254, 'App\\Models\\User', 44, 'token', '076572dc8f7c94bb48cb7100fbc59fd34a563f9696d1623c10abfb77dcde192a', '[\"*\"]', '2023-05-24 02:57:47', '2023-05-24 02:57:44', '2023-05-24 02:57:47'),
(255, 'App\\Models\\User', 2, 'token', 'c5b4305eacbb12bed51db867a8575dabe586abc39039cb651f2f39c36325867c', '[\"*\"]', '2023-05-24 03:00:09', '2023-05-24 02:57:58', '2023-05-24 03:00:09'),
(256, 'App\\Models\\User', 44, 'token', '6ce381448ecdb7afc8df993b34421de0ca8b2c82682774ba08e18d542b04b54d', '[\"*\"]', '2023-05-24 04:23:39', '2023-05-24 04:19:19', '2023-05-24 04:23:39'),
(257, 'App\\Models\\User', 44, 'token', '9c5b8c2808c5bc0530e108d8215de2f548f555a15ec099c8a05829be084841ad', '[\"*\"]', '2023-05-24 09:44:05', '2023-05-24 07:42:02', '2023-05-24 09:44:05'),
(258, 'App\\Models\\User', 2, 'token', '792ee8866cd99fcb45a76816850b12e8cb4299a91a4317517b4ec402f9658627', '[\"*\"]', '2023-05-24 08:53:57', '2023-05-24 08:49:18', '2023-05-24 08:53:57'),
(259, 'App\\Models\\User', 45, 'token', 'f86b8f44e87de95137b842fb0d2a8253c61ed654118ecfc1e360d7771232c828', '[\"*\"]', '2023-05-24 09:47:26', '2023-05-24 09:41:33', '2023-05-24 09:47:26'),
(260, 'App\\Models\\User', 44, 'token', '11d2958c8bb071923426d67c202805caa84d224905113d20737183597f3e401e', '[\"*\"]', '2023-05-27 09:05:26', '2023-05-24 09:46:11', '2023-05-27 09:05:26'),
(261, 'App\\Models\\User', 2, 'token', '3611f703dcc84bfa14b160966a23cf96b36cdd318a679bc62f5fec4629fb90da', '[\"*\"]', '2023-05-25 08:36:43', '2023-05-25 02:32:52', '2023-05-25 08:36:43'),
(262, 'App\\Models\\User', 28, 'token', '9e3b7ab508a719e7e78449b99c3842017bec4467393c50d1c3d90be01ec9a965', '[\"*\"]', '2023-05-25 04:28:51', '2023-05-25 02:46:19', '2023-05-25 04:28:51'),
(263, 'App\\Models\\User', 4, 'token', '3810d4984d005eb50bfc98cbb911ecac55cc3790db3bb6d2d684764355c606dd', '[\"*\"]', '2023-06-14 05:14:14', '2023-05-25 02:48:08', '2023-06-14 05:14:14'),
(264, 'App\\Models\\AkunPengembang', 1, 'token', '0a75f5a6cbb2d2c9931ee6a2b08e088b83d1d6cff6159893586b99a64a653236', '[\"*\"]', '2023-06-22 08:29:52', '2023-05-25 04:50:53', '2023-06-22 08:29:52'),
(265, 'App\\Models\\User', 9, 'token', 'd7da3e8db5f29e39737b87592ce6e444986c4e83f7c3f1f3ac37bb5a99b8f454', '[\"*\"]', '2023-05-25 06:37:44', '2023-05-25 06:03:13', '2023-05-25 06:37:44'),
(266, 'App\\Models\\User', 9, 'token', '4485a53e36ab08256d1419765911804382b7b514fa394d1d7b2ee11c6a75fa10', '[\"*\"]', '2023-05-25 09:34:14', '2023-05-25 07:45:05', '2023-05-25 09:34:14'),
(267, 'App\\Models\\User', 28, 'token', 'a65ce14d94443434ef7ec99b6558aa436331c8cd4d0ee1169692f334fe8562e8', '[\"*\"]', '2023-05-25 12:05:59', '2023-05-25 12:05:10', '2023-05-25 12:05:59'),
(268, 'App\\Models\\User', 9, 'token', 'eaa47f7ed8495be561b700fc0a928b427a9edd44aea65e64aab99cc537c2bb7d', '[\"*\"]', '2023-05-31 01:58:06', '2023-05-26 04:15:43', '2023-05-31 01:58:06'),
(269, 'App\\Models\\User', 28, 'token', 'bead9ebe524b42a30dbc8c9da080cc3be275a63f799c556e0bc2b791aea6dc4f', '[\"*\"]', '2023-05-29 01:31:36', '2023-05-27 09:04:35', '2023-05-29 01:31:36'),
(270, 'App\\Models\\User', 9, 'token', '6e56a3db6b43b728d7aab3ac679f125f02c110ee266bb278089325152f8c63df', '[\"*\"]', '2023-05-27 10:11:02', '2023-05-27 10:10:53', '2023-05-27 10:11:02'),
(271, 'App\\Models\\User', 28, 'token', '6890ef69c44144229f4329aa296912ac8ef8feed615d44408e3cf86b694518b7', '[\"*\"]', '2023-05-29 01:34:05', '2023-05-29 01:33:57', '2023-05-29 01:34:05'),
(272, 'App\\Models\\User', 9, 'token', 'c5a01af72d07ac08053fed34f4ea5a654f931ad026b0af00b2c56d5b51fad030', '[\"*\"]', '2023-05-29 12:17:19', '2023-05-29 08:24:19', '2023-05-29 12:17:19'),
(273, 'App\\Models\\User', 9, 'token', '3e963bbf5d2cd3460dcb96cdb834531df4b2f5a82537f16eddf755e5dba54db6', '[\"*\"]', '2023-05-29 12:12:58', '2023-05-29 08:29:18', '2023-05-29 12:12:58'),
(274, 'App\\Models\\User', 42, 'token', '535901930ff2c4228330d3c090aa54f1adf7db79f5cc931af1b76a858494f70a', '[\"*\"]', '2023-05-30 06:07:28', '2023-05-29 08:42:17', '2023-05-30 06:07:28'),
(275, 'App\\Models\\User', 44, 'token', 'db887f1c63a89f1e44de89d5f88f2ef976cf398a62eba612c6b3a486e3a8028d', '[\"*\"]', '2023-05-29 13:48:56', '2023-05-29 13:01:14', '2023-05-29 13:48:56'),
(276, 'App\\Models\\User', 44, 'token', 'e582fe7779e45b39031217369cc83036aa99ea43d0979325ca0cefb773428ba6', '[\"*\"]', '2023-06-23 10:24:34', '2023-05-29 13:57:33', '2023-06-23 10:24:34'),
(277, 'App\\Models\\User', 2, 'token', '6a116cb425bf39b76cd2cdfd9458ba4fa28ffd99f1dbd75356e81eac956a0ceb', '[\"*\"]', '2023-05-29 14:41:56', '2023-05-29 14:40:42', '2023-05-29 14:41:56'),
(278, 'App\\Models\\User', 44, 'token', '6406bea8351eb40207df55e6134af4ee9281cd83eedf645a3d45b1be8a0e4936', '[\"*\"]', '2023-05-30 03:10:21', '2023-05-29 14:41:25', '2023-05-30 03:10:21'),
(279, 'App\\Models\\User', 28, 'token', '0fffbe61c43499e64cc105ff28043aedcb97f4ab02ebc636276e774aab7e056c', '[\"*\"]', '2023-05-30 01:35:25', '2023-05-30 01:34:49', '2023-05-30 01:35:25'),
(280, 'App\\Models\\User', 45, 'token', 'a67e9c753015d4ccacc123501ea2450ec917912a80243f764b5de0ce9e6cb50a', '[\"*\"]', '2023-05-30 02:06:42', '2023-05-30 01:57:45', '2023-05-30 02:06:42');
INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(281, 'App\\Models\\User', 4, 'token', 'a86de4a3cfda2fe9f97e49c543a4893fcc85a0a87519d802d4671f2ca1d7b991', '[\"*\"]', '2023-05-30 01:59:10', '2023-05-30 01:58:50', '2023-05-30 01:59:10'),
(282, 'App\\Models\\User', 28, 'token', '597a156bb5aba931d252c5e00504d4f26fbe7e970fe7a29182317e3416d613a7', '[\"*\"]', '2023-05-30 02:13:05', '2023-05-30 02:01:16', '2023-05-30 02:13:05'),
(283, 'App\\Models\\User', 45, 'token', '51d326e66829d32b1be79c98a45b378f7cc071e75ae77746145d867dcb80fd81', '[\"*\"]', '2023-05-30 02:07:59', '2023-05-30 02:06:57', '2023-05-30 02:07:59'),
(284, 'App\\Models\\User', 45, 'token', '96bac6ab781fb2b928fbb3938c41d2eaae3cc31e4873f0ef8264041f104aaed1', '[\"*\"]', '2023-05-30 02:17:01', '2023-05-30 02:09:49', '2023-05-30 02:17:01'),
(285, 'App\\Models\\User', 2, 'token', '223c8587d4b7cd994578e5aca369ec15dff9d0315ed533fc719650370ea9ab6d', '[\"*\"]', '2023-05-30 03:01:28', '2023-05-30 03:01:24', '2023-05-30 03:01:28'),
(286, 'App\\Models\\User', 44, 'token', '7658d82efcc87c1d0dae350fe43c0708bca8c79a1b671a1b80d9b6e0e5b1ff4f', '[\"*\"]', '2023-05-30 03:10:47', '2023-05-30 03:10:43', '2023-05-30 03:10:47'),
(287, 'App\\Models\\User', 47, 'token', '5e3512b99e0bec8ded408c156427fc2bbc3205282a8c91de9fd98e0dc50eeb33', '[\"*\"]', '2023-05-30 06:13:33', '2023-05-30 03:45:58', '2023-05-30 06:13:33'),
(288, 'App\\Models\\User', 28, 'token', '632234f49353eed89845ff8ff3be649b0e5625aa8c103bd6b47e52c2498be763', '[\"*\"]', '2023-05-30 04:11:28', '2023-05-30 03:59:00', '2023-05-30 04:11:28'),
(289, 'App\\Models\\User', 44, 'token', '7eb99edd9d4ef25dbd94cd2325f756d26e3ac3ae9fc23817af092a9e35a965ae', '[\"*\"]', '2023-06-22 11:51:06', '2023-05-30 04:47:04', '2023-06-22 11:51:06'),
(290, 'App\\Models\\User', 2, 'token', '7d3964258c0c00f24cc1faac70c878f4bec0cd0edc7358d36f2a8ece75151ca4', '[\"*\"]', '2023-06-24 03:53:38', '2023-05-30 05:21:33', '2023-06-24 03:53:38'),
(291, 'App\\Models\\User', 2, 'token', '17695f45c70d4969692794ee229ad5ca778e57317e0f5212b87d4313f79a4339', '[\"*\"]', '2023-05-30 06:02:45', '2023-05-30 05:57:28', '2023-05-30 06:02:45'),
(292, 'App\\Models\\User', 28, 'token', '59da80451c0e498fd2ff812ba90073034a81f2cc401d211816781eb91c2d8e1d', '[\"*\"]', '2023-05-30 06:01:17', '2023-05-30 06:01:11', '2023-05-30 06:01:17'),
(293, 'App\\Models\\User', 45, 'token', 'b93be84f1b309fdc077deb1b537b538bf747bf14e2aba01603f2c514605381b3', '[\"*\"]', '2023-05-30 06:11:30', '2023-05-30 06:04:35', '2023-05-30 06:11:30'),
(294, 'App\\Models\\User', 48, 'token', 'd3cb406e6f370537037878f56c89600fd74632d6d37c89282311529fcca11889', '[\"*\"]', '2023-05-30 06:13:48', '2023-05-30 06:10:01', '2023-05-30 06:13:48'),
(295, 'App\\Models\\User', 28, 'token', 'a46f028d3a24be739fc15186115a3f57a5cdf87f0c658fe5998d52fbff9a398d', '[\"*\"]', '2023-05-30 06:47:59', '2023-05-30 06:20:56', '2023-05-30 06:47:59'),
(296, 'App\\Models\\User', 47, 'token', '31f71fa745e1ea0c4b460330498ca20c98d0ee01d8a880bcf5be9c3a11ffdb74', '[\"*\"]', '2023-05-30 07:30:50', '2023-05-30 07:07:49', '2023-05-30 07:30:50'),
(297, 'App\\Models\\User', 48, 'token', 'e44a2bfd87134bc2d6a8c68e013c02f215230373217e7e803b674e4bace152e5', '[\"*\"]', '2023-05-30 07:26:01', '2023-05-30 07:13:03', '2023-05-30 07:26:01'),
(298, 'App\\Models\\User', 2, 'token', '2675b04562043c951d8ed9717d7a03213b7f667e3621e64c7bd88bd4cb214456', '[\"*\"]', '2023-05-30 08:41:08', '2023-05-30 07:29:35', '2023-05-30 08:41:08'),
(299, 'App\\Models\\User', 2, 'token', '0698febfeb0edf97d1b2d9893ad4db1a3d046a5811b62e8cda0e9959aa14dbd9', '[\"*\"]', '2023-05-30 09:13:54', '2023-05-30 08:54:00', '2023-05-30 09:13:54'),
(300, 'App\\Models\\User', 4, 'token', '5bc2b7fe3dc13ff519eb07cf2e71fb98248ba747183ece2ba87f3c4b5e95423e', '[\"*\"]', '2023-05-30 09:08:37', '2023-05-30 09:06:11', '2023-05-30 09:08:37'),
(301, 'App\\Models\\User', 47, 'token', '8380ae202c9137b899cc58115d190d3d5a8a64b8ba65620f49d3c8b274297506', '[\"*\"]', '2023-05-30 10:08:36', '2023-05-30 09:28:16', '2023-05-30 10:08:36'),
(302, 'App\\Models\\User', 42, 'token', '982adceadea4a6aca4a5846a53fcfc3d28fc62a7d72e928effbc2c3a04be8517', '[\"*\"]', '2023-05-30 10:19:59', '2023-05-30 09:55:54', '2023-05-30 10:19:59'),
(303, 'App\\Models\\User', 2, 'token', 'c3bd64ed960e7ee221fef67e4845fb4d03693eccf968d0b78a5f248e0a9d7d99', '[\"*\"]', '2023-05-30 10:50:11', '2023-05-30 10:12:51', '2023-05-30 10:50:11'),
(304, 'App\\Models\\User', 42, 'token', 'c1e27d764b45f128ea481587f090cbbd69eb73355d2f61688e7f61eba3891168', '[\"*\"]', '2023-05-30 11:54:20', '2023-05-30 10:20:23', '2023-05-30 11:54:20'),
(305, 'App\\Models\\User', 47, 'token', '7e76d82e90be616dbc51ef17e6e0041765bb918c28b792d7cd731a257c97ddcd', '[\"*\"]', '2023-05-30 13:17:02', '2023-05-30 10:22:45', '2023-05-30 13:17:02'),
(306, 'App\\Models\\User', 42, 'token', 'b821043be3201a1beeb61579ce9e64c1e24ef474749bea5a7190a2221e0edbb4', '[\"*\"]', '2023-05-30 10:39:13', '2023-05-30 10:38:35', '2023-05-30 10:39:13'),
(307, 'App\\Models\\User', 4, 'token', 'b9c535e284cbd6a8631b216b8cc51c02b2b52d226373e5d612fade420ebee3ac', '[\"*\"]', '2023-05-30 11:08:47', '2023-05-30 11:08:44', '2023-05-30 11:08:47'),
(308, 'App\\Models\\User', 2, 'token', '6bff9eba4494f8df7cc32f94c991416ae8ad5c221be18e19df7538b3b2cf8ce0', '[\"*\"]', '2023-05-30 11:26:29', '2023-05-30 11:26:25', '2023-05-30 11:26:29'),
(309, 'App\\Models\\User', 4, 'token', '665813b59d4d9e2d4d5e3523d68752b865686b8d4114e18ac13b15094b83d0e6', '[\"*\"]', '2023-05-30 12:13:12', '2023-05-30 12:13:07', '2023-05-30 12:13:12'),
(310, 'App\\Models\\User', 28, 'token', '82aa98786fc04e5942d87019d610d76cef30910e3ac15987d9f96abda98c55a9', '[\"*\"]', '2023-05-30 12:15:11', '2023-05-30 12:14:47', '2023-05-30 12:15:11'),
(311, 'App\\Models\\User', 4, 'token', '53f0e749bd28813731a39c77daa2b02195d76c65f4688502f1d47e07b4b3e5c7', '[\"*\"]', '2023-05-30 12:54:18', '2023-05-30 12:16:15', '2023-05-30 12:54:18'),
(312, 'App\\Models\\User', 2, 'token', '841723cafeb0b355ee22048355d151f162a04dd32d19d6580899313648403803', '[\"*\"]', '2023-05-31 01:47:17', '2023-05-30 13:16:11', '2023-05-31 01:47:17'),
(313, 'App\\Models\\User', 47, 'token', '5e1b8b13d56284ca3c68c6c1c69658049bb03847a05102921912e0deebd37814', '[\"*\"]', '2023-05-31 03:41:45', '2023-05-30 13:17:36', '2023-05-31 03:41:45'),
(314, 'App\\Models\\User', 28, 'token', 'f3f316a4c54dd404809bb7fb2acddb43e0370ffceaac3ce05e2a68b0a4a540aa', '[\"*\"]', '2023-05-31 03:22:15', '2023-05-31 00:38:40', '2023-05-31 03:22:15'),
(315, 'App\\Models\\User', 47, 'token', '48d4eb0c9600677e0a0f1da34c835f75edd9ffe2846b01d5b6ba01f5dabd8e0c', '[\"*\"]', '2023-05-31 01:54:10', '2023-05-31 01:34:24', '2023-05-31 01:54:10'),
(316, 'App\\Models\\User', 45, 'token', 'b8cf4e21979cd164117ae0700dc4c0d715b3a8c97a7632021fc4f7c0011f44e9', '[\"*\"]', '2023-05-31 01:44:44', '2023-05-31 01:35:17', '2023-05-31 01:44:44'),
(317, 'App\\Models\\User', 9, 'token', 'e2974740a14bdbfa317edc27b877ea71e144c9ea3bb36193db05f607978426e6', '[\"*\"]', '2023-05-31 01:48:17', '2023-05-31 01:47:27', '2023-05-31 01:48:17'),
(318, 'App\\Models\\User', 9, 'token', 'd6c19cc521c9b2c6ca637addec83543227c3f0ddcdb1b8470f768637d159780a', '[\"*\"]', '2023-05-31 01:56:46', '2023-05-31 01:50:49', '2023-05-31 01:56:46'),
(319, 'App\\Models\\User', 28, 'token', '7261ec53bf598fe60b4ff97a1ec3c4f4d870ef00a451495dac9cfd9feb2568ed', '[\"*\"]', '2023-05-31 01:59:24', '2023-05-31 01:57:17', '2023-05-31 01:59:24'),
(320, 'App\\Models\\User', 28, 'token', '222f8042140cfaae833726b43bc12e137f497e606039c87e891d9decb5878669', '[\"*\"]', '2023-06-07 02:46:27', '2023-05-31 01:58:35', '2023-06-07 02:46:27'),
(321, 'App\\Models\\User', 28, 'token', 'c72595fc9492a1057b84f40152d845363c631e6108f6ed59b859a5b0418da1bd', '[\"*\"]', '2023-05-31 02:27:15', '2023-05-31 02:27:10', '2023-05-31 02:27:15'),
(322, 'App\\Models\\User', 45, 'token', '6a0a47de754e8a3cd01843e422c65c30391cae5031eae1330cbedc0b106d98ef', '[\"*\"]', '2023-05-31 03:09:02', '2023-05-31 03:06:54', '2023-05-31 03:09:02'),
(323, 'App\\Models\\User', 28, 'token', '918ebb52596bba691c3ce5c0ac4a55c305548c84fc4b6a4fef63b1d6a0f38f2e', '[\"*\"]', '2023-05-31 03:10:22', '2023-05-31 03:09:28', '2023-05-31 03:10:22'),
(324, 'App\\Models\\User', 47, 'token', '77a444a3d61d2d122ac11b1b42608d9ca22603ade9b0d24ebe73ff1bebe08c71', '[\"*\"]', '2023-05-31 03:30:38', '2023-05-31 03:24:30', '2023-05-31 03:30:38'),
(325, 'App\\Models\\User', 4, 'token', 'bc33d2fc2ad1e72c3191a7809714a76f4e1450937abf4e640db6efe05156fa13', '[\"*\"]', '2023-05-31 05:20:31', '2023-05-31 03:43:56', '2023-05-31 05:20:31'),
(326, 'App\\Models\\User', 42, 'token', 'dce308a27dd4b49e77f5142ab9e92746bfbd3c0cad27bd9f9ef0762645dd9ce4', '[\"*\"]', '2023-05-31 04:48:26', '2023-05-31 04:06:07', '2023-05-31 04:48:26'),
(327, 'App\\Models\\User', 47, 'token', '9bdac27d3c21154d32e4016ad066bbfe7d6a520ffccbf483d485a90b4629a476', '[\"*\"]', '2023-05-31 06:52:56', '2023-05-31 05:37:01', '2023-05-31 06:52:56'),
(328, 'App\\Models\\User', 45, 'token', 'fd99e7f19baa9af549ee1a162f157c1f20b3cafb2e159a65504b9ca136fb0d42', '[\"*\"]', '2023-05-31 05:40:24', '2023-05-31 05:38:38', '2023-05-31 05:40:24'),
(329, 'App\\Models\\User', 47, 'token', '6b26820d5ebfd4a2be3a61600cfa9eec81bf2236ed2286998de4f78a6c98cefd', '[\"*\"]', '2023-05-31 07:04:25', '2023-05-31 07:01:43', '2023-05-31 07:04:25'),
(330, 'App\\Models\\User', 45, 'token', '0fa1231415dfbac1123941826ae52413042eea6590001c3c782350540a519a7d', '[\"*\"]', '2023-05-31 07:04:45', '2023-05-31 07:01:58', '2023-05-31 07:04:45'),
(331, 'App\\Models\\User', 2, 'token', '7ee7c7e3c837b5479581f3a363f3f155a434665e30e08af8e10e9fe37976f030', '[\"*\"]', '2023-05-31 07:56:06', '2023-05-31 07:46:07', '2023-05-31 07:56:06'),
(332, 'App\\Models\\User', 47, 'token', 'f5fe1b85bae8179de1a359a33b6636e136233d90a0f8a277fb33abc3cc4ebee8', '[\"*\"]', '2023-05-31 09:01:45', '2023-05-31 09:01:17', '2023-05-31 09:01:45'),
(333, 'App\\Models\\User', 47, 'token', '489247706041b7fe15938d872964a1896199abcec94fdcc96dfde3e84a0e45ab', '[\"*\"]', '2023-06-01 08:35:17', '2023-05-31 09:02:09', '2023-06-01 08:35:17'),
(334, 'App\\Models\\User', 44, 'token', '2ffb2e4b189ab1ed08222179309ab5fcdf75fbe48e72b4f0ec76fccb3b8dd0c1', '[\"*\"]', '2023-06-01 06:34:36', '2023-05-31 11:43:36', '2023-06-01 06:34:36'),
(335, 'App\\Models\\User', 2, 'token', 'c98643170d8971766d8a169462c6b235b57cf4fbe051d7837d2f8f3564429513', '[\"*\"]', '2023-06-23 10:28:17', '2023-05-31 12:45:51', '2023-06-23 10:28:17'),
(336, 'App\\Models\\User', 2, 'token', '0506faba2b86a8e9fa0da88471939c525d9643991a228114bf11e7f5acebb717', '[\"*\"]', '2023-06-01 06:54:34', '2023-06-01 03:01:05', '2023-06-01 06:54:34'),
(337, 'App\\Models\\User', 34, 'token', 'd759d33aa2d83f3012b9a9a4497cf3776d4108b176d677495262194018e71685', '[\"*\"]', '2023-06-21 08:01:46', '2023-06-02 00:16:10', '2023-06-21 08:01:46'),
(338, 'App\\Models\\User', 9, 'token', 'd46b8d0c7b02fe5e5f5b66ee593cbb2b8f188ba9e02f0b213f889f2ee65b33dc', '[\"*\"]', '2023-06-07 02:48:34', '2023-06-07 02:46:58', '2023-06-07 02:48:34'),
(339, 'App\\Models\\User', 9, 'token', '8d24f9ebbb4efaaa7137ec03a5788bce235cd2ec38e73df6547b4428c58edbe3', '[\"*\"]', '2023-06-20 10:13:57', '2023-06-07 03:06:07', '2023-06-20 10:13:57'),
(340, 'App\\Models\\User', 9, 'token', '9416ae36f3a9b999c1be42b9fe89e3c934efb0ef11d40a16b7e14fd92014165f', '[\"*\"]', '2023-06-08 04:41:37', '2023-06-08 04:40:01', '2023-06-08 04:41:37'),
(341, 'App\\Models\\User', 42, 'token', 'a6f13a8f97a5ee3fe89cb1cd37d5876fbf5340835a6dbd367d0f9a2710b87fc9', '[\"*\"]', '2023-06-08 04:42:16', '2023-06-08 04:40:51', '2023-06-08 04:42:16'),
(342, 'App\\Models\\User', 45, 'token', '2845d39fc5190e2f963b45370e2012bd53a9152c9de2cc1194ded5705f3604e1', '[\"*\"]', '2023-06-12 01:56:29', '2023-06-09 02:46:16', '2023-06-12 01:56:29'),
(343, 'App\\Models\\User', 47, 'token', 'bc3f33449f216a641f173b6cebd0d678fe5bdcd72d30c374e4a011c48a9a7ebc', '[\"*\"]', '2023-06-13 03:57:43', '2023-06-09 02:51:46', '2023-06-13 03:57:43'),
(344, 'App\\Models\\User', 42, 'token', '613efcf01e9e5c007ea5562b513ade500ab6c5721d11b64039124a4e0f66b63a', '[\"*\"]', '2023-06-10 06:24:05', '2023-06-09 04:10:21', '2023-06-10 06:24:05'),
(345, 'App\\Models\\User', 4, 'token', 'b673ecacfa355e73c06e0ced5e99627881690a66b3f65bb5890041d02e4bc02a', '[\"*\"]', '2023-06-12 11:07:56', '2023-06-10 06:26:13', '2023-06-12 11:07:56'),
(346, 'App\\Models\\User', 48, 'token', 'dfa346a98592c1a768d7c2f512d7be0621a79476ef8c773f54a937fb2ddc9f9c', '[\"*\"]', '2023-06-10 06:46:31', '2023-06-10 06:46:00', '2023-06-10 06:46:31'),
(347, 'App\\Models\\User', 42, 'token', '06a5af8dbd89780a6cb08316613d00fab7729a8456cbcbd7dcff20d50861ccbe', '[\"*\"]', '2023-06-10 06:54:37', '2023-06-10 06:46:59', '2023-06-10 06:54:37'),
(348, 'App\\Models\\User', 4, 'token', '9774d4837efbcd107462b851b76ae3806d281ab01e499d1411596e353ed326d5', '[\"*\"]', '2023-06-10 07:14:08', '2023-06-10 07:13:39', '2023-06-10 07:14:08'),
(349, 'App\\Models\\User', 9, 'token', '5a1442116f0dc11d4c1a013bec21a1c97534727b7fcb11b81da1d90dcb0a5a6d', '[\"*\"]', '2023-06-21 03:20:21', '2023-06-12 02:12:47', '2023-06-21 03:20:21'),
(350, 'App\\Models\\User', 9, 'token', 'bedb98d90934da698db6712317585a6cc7765080f3b77ceb740c0b1a12e5e782', '[\"*\"]', '2023-06-12 07:09:07', '2023-06-12 03:14:05', '2023-06-12 07:09:07'),
(351, 'App\\Models\\User', 45, 'token', '797b24328e1a547e354b6e9a1d9eb0da7f141207371427a069b40f66405c657a', '[\"*\"]', '2023-06-13 03:08:31', '2023-06-12 03:41:48', '2023-06-13 03:08:31'),
(352, 'App\\Models\\User', 9, 'token', 'eddf841eec26d8dd5b456995f8fb9461506adcd9c9cf5fcc55e1578e11630daa', '[\"*\"]', '2023-06-12 07:28:46', '2023-06-12 07:22:45', '2023-06-12 07:28:46'),
(353, 'App\\Models\\User', 42, 'token', '00a57175ff2b1def18a0a907bfad83aa2cbb5e1913fe946e0d1a218338cec9ba', '[\"*\"]', '2023-06-21 06:36:15', '2023-06-12 07:23:47', '2023-06-21 06:36:15'),
(354, 'App\\Models\\User', 9, 'token', '1bb504783e9b1ee05575bcde05708297b7d18781e5d3b6d9d364a63adc01e659', '[\"*\"]', '2023-06-12 10:04:07', '2023-06-12 10:02:07', '2023-06-12 10:04:07'),
(355, 'App\\Models\\User', 45, 'token', '629a8331cea5a206ba814367ad6831f67d9e3ff974f0923f2237899b6956213e', '[\"*\"]', '2023-06-13 03:22:05', '2023-06-13 03:14:09', '2023-06-13 03:22:05'),
(356, 'App\\Models\\User', 45, 'token', '71f4ccc531e0150a4ff5ba640f78575921267254b05ff6c4190412ce47dcd95d', '[\"*\"]', '2023-06-22 12:15:06', '2023-06-13 09:41:57', '2023-06-22 12:15:06'),
(357, 'App\\Models\\User', 4, 'token', '0a9584f9a4131e6273359c2fe33ac909a0393f4b7904e297154660ce198272b9', '[\"*\"]', '2023-06-15 23:24:05', '2023-06-14 05:15:32', '2023-06-15 23:24:05'),
(358, 'App\\Models\\User', 28, 'token', '943620c2b973c537b1d347ff7fa59b62cdd7490a493e7eef006da990ed030a6a', '[\"*\"]', '2023-06-21 04:06:36', '2023-06-21 01:51:14', '2023-06-21 04:06:36'),
(359, 'App\\Models\\User', 9, 'token', '5a4945cf9f362dcd173f2fce9ab384c01324627dd85aa92bfbc47a1108174c91', '[\"*\"]', '2023-06-21 03:25:33', '2023-06-21 03:22:20', '2023-06-21 03:25:33'),
(360, 'App\\Models\\User', 47, 'token', '702de189c862833a6e40c62534197c7ea8816c4959e8c48f6c05cfb90c2dee38', '[\"*\"]', '2023-06-21 04:08:57', '2023-06-21 03:50:51', '2023-06-21 04:08:57'),
(361, 'App\\Models\\User', 28, 'token', '27747da58006f96b24286054b45ec1f06953d5528346cdfd491beb029292f29d', '[\"*\"]', '2023-06-21 04:12:40', '2023-06-21 04:07:37', '2023-06-21 04:12:40'),
(362, 'App\\Models\\User', 9, 'token', 'cd347b5b0bb12bbd756bf123af27a213f84d1e5724c0f2b3f2c9f2266412586c', '[\"*\"]', '2023-06-22 04:09:35', '2023-06-21 05:28:31', '2023-06-22 04:09:35'),
(363, 'App\\Models\\User', 4, 'token', '8afbdd859df30915b6704b3be7a2a413dd30f6e4c5d51f8e3eb1e2c4bc11ec04', '[\"*\"]', '2023-06-21 08:16:07', '2023-06-21 05:44:38', '2023-06-21 08:16:07'),
(364, 'App\\Models\\User', 28, 'token', 'b3d0a6808398f363a89eb2f8402aefeee6f47e9f2b86391916b6cbf1a431b7db', '[\"*\"]', '2023-06-21 08:32:32', '2023-06-21 08:32:14', '2023-06-21 08:32:32'),
(365, 'App\\Models\\User', 28, 'token', 'd1a2d422ed3b0019ef9ad318cf233db853a8863b6d538231f2ed3785563fcf71', '[\"*\"]', '2023-06-21 09:49:22', '2023-06-21 08:42:16', '2023-06-21 09:49:22'),
(366, 'App\\Models\\User', 45, 'token', '0bdbc85e1cf805e64598adfa6bf8724c63472636549a02dee529d8d242347e79', '[\"*\"]', '2023-06-21 09:37:21', '2023-06-21 08:47:13', '2023-06-21 09:37:21'),
(367, 'App\\Models\\User', 28, 'token', '7f6f581a2a584e583048dba14db17e0d50bac0c736479d80e985ff73e5733e03', '[\"*\"]', '2023-06-21 10:02:09', '2023-06-21 10:02:05', '2023-06-21 10:02:09'),
(368, 'App\\Models\\User', 4, 'token', 'bc469ca0f673f9351f494cdc25e59f81194e00bcd8f9c4dcaf52687933fae2be', '[\"*\"]', '2023-06-22 07:07:54', '2023-06-21 10:14:17', '2023-06-22 07:07:54'),
(369, 'App\\Models\\User', 45, 'token', '219d8ad58bee7beb69bfea7ffa8c5b1af3a9a8d2f750c1de52f4f40cb0aa307d', '[\"*\"]', '2023-06-21 10:28:10', '2023-06-21 10:15:56', '2023-06-21 10:28:10'),
(370, 'App\\Models\\User', 45, 'token', '25fff9a7f1510987391bd40eba03801748ae292f7f606caa5bc543d3501cb535', '[\"*\"]', '2023-06-22 08:09:09', '2023-06-21 10:40:39', '2023-06-22 08:09:09'),
(371, 'App\\Models\\User', 47, 'token', '69f0143e2140aed67cedbb9701a22254e6128a9453ba5e7378e3bbd38e3ee707', '[\"*\"]', '2023-06-22 01:24:22', '2023-06-21 10:44:07', '2023-06-22 01:24:22'),
(372, 'App\\Models\\User', 42, 'token', '5a776298e49201fff318142843b9a9c2261766ac45a9247a2a40d7d79105f469', '[\"*\"]', '2023-06-22 08:18:12', '2023-06-22 02:02:59', '2023-06-22 08:18:12'),
(373, 'App\\Models\\User', 47, 'token', 'a046c5d85fffe94f961f2121ab16c15646e1f1e74d4c9b89b729fa850771a9ae', '[\"*\"]', '2023-06-22 05:33:50', '2023-06-22 02:48:32', '2023-06-22 05:33:50'),
(374, 'App\\Models\\User', 9, 'token', 'dce12e361715d6b0f7a078e50e897a3ebcdb5f9ddde329f164ff700152589486', '[\"*\"]', '2023-06-22 08:45:02', '2023-06-22 04:09:54', '2023-06-22 08:45:02'),
(375, 'App\\Models\\User', 34, 'token', '987eece01d0f4a33a44977fae3d20494a766595ddf64c66ca8e7ef4f94e03b8b', '[\"*\"]', '2023-06-22 05:28:45', '2023-06-22 04:38:42', '2023-06-22 05:28:45'),
(376, 'App\\Models\\User', 51, 'token', 'f6f55340e8d13326b1555bc3505d92d34ffeb9836117c9366dd2c7046b0a0ecd', '[\"*\"]', '2023-06-22 05:37:31', '2023-06-22 04:40:38', '2023-06-22 05:37:31'),
(377, 'App\\Models\\User', 47, 'token', '134b1318020ff4642761a414a25fca777aa703cd91dab5e89a399a6ac37d78fb', '[\"*\"]', '2023-06-22 08:14:22', '2023-06-22 06:18:47', '2023-06-22 08:14:22'),
(378, 'App\\Models\\User', 28, 'token', '3121702e0a23199f30bcc1b424d63dd67ed83db69facff112feb28578d5a8dda', '[\"*\"]', '2023-06-22 08:14:29', '2023-06-22 07:05:56', '2023-06-22 08:14:29'),
(379, 'App\\Models\\User', 4, 'token', '56cb6a9bc5219cf5eb0c9af07f760136eb57d57c32ab9318e1152eb35d3ffddc', '[\"*\"]', '2023-06-22 07:18:09', '2023-06-22 07:16:13', '2023-06-22 07:18:09'),
(380, 'App\\Models\\User', 9, 'token', '9582beba82a17ba9e3d926d7cc823bddd8bd7b8a48225501d0403f2a79523d86', '[\"*\"]', '2023-06-22 08:29:56', '2023-06-22 07:54:03', '2023-06-22 08:29:56'),
(381, 'App\\Models\\User', 42, 'token', 'a6715334616b7bc01ca5f50f7ef28ef7aa2382f87bfff7251b792f7f1989bfba', '[\"*\"]', '2023-06-22 08:02:44', '2023-06-22 07:58:47', '2023-06-22 08:02:44'),
(382, 'App\\Models\\User', 45, 'token', '491240d618e575fd2d52f64e0eb5394e319a75d6d10e86e8ff83e1e3a4d367bf', '[\"*\"]', '2023-06-22 08:17:21', '2023-06-22 08:09:49', '2023-06-22 08:17:21'),
(383, 'App\\Models\\User', 28, 'token', 'b16b541f8c4d99cc6185837b94c4723bc01834717cd13bd3b5cb126d40397ff5', '[\"*\"]', '2023-06-22 09:10:01', '2023-06-22 09:04:33', '2023-06-22 09:10:01'),
(384, 'App\\Models\\User', 47, 'token', 'c6b5b0bb769b06fe971ec3294e8163fc2201cda1a77f2973cad84b997552bd17', '[\"*\"]', '2023-06-22 10:20:13', '2023-06-22 09:05:04', '2023-06-22 10:20:13'),
(385, 'App\\Models\\User', 28, 'token', '6c3528caa4602c9371af73d3981f72b4c26158bb8d50c525156a4b082d754c01', '[\"*\"]', '2023-06-23 03:37:16', '2023-06-22 11:39:03', '2023-06-23 03:37:16'),
(386, 'App\\Models\\User', 4, 'token', '173353d35a8bc4a7c62ed4ef4a422d4f203902c5e68ac270b1d20e4904d93111', '[\"*\"]', '2023-06-22 11:39:59', '2023-06-22 11:39:57', '2023-06-22 11:39:59'),
(387, 'App\\Models\\User', 47, 'token', '6847fc8083fe6492a4ff12fffab1652c5a7c4c7ac834aca1faa9e11e8f2fe298', '[\"*\"]', '2023-06-22 11:45:26', '2023-06-22 11:42:14', '2023-06-22 11:45:26'),
(388, 'App\\Models\\User', 47, 'token', '63567cf02d9c91519168e3f2aaa43e33a728d44d498c493fdd4933da4f3bdd60', '[\"*\"]', '2023-06-24 03:54:50', '2023-06-22 11:51:29', '2023-06-24 03:54:50'),
(389, 'App\\Models\\User', 47, 'token', 'f9695f482ecf032885c8ac32715684294b721db4a00c9dde8b6a6b5e1bd7d089', '[\"*\"]', '2023-06-22 12:13:49', '2023-06-22 12:09:08', '2023-06-22 12:13:49'),
(390, 'App\\Models\\User', 45, 'token', '9689bfb6392eb3f20050891ed395ea990f54428d87d7e161dee6d83f060d45db', '[\"*\"]', '2023-06-24 03:40:43', '2023-06-22 12:15:53', '2023-06-24 03:40:43'),
(391, 'App\\Models\\User', 4, 'token', 'f2bd4e83463d0d3020dc1fdbc7cda566c2118e1a057a6232555fdbcf11697593', '[\"*\"]', '2023-06-22 12:21:10', '2023-06-22 12:18:30', '2023-06-22 12:21:10'),
(392, 'App\\Models\\User', 4, 'token', '270ce4fc592a74ac48e81a16108b1562cd55a523ad7eaa8de5ac6d9dc3032c64', '[\"*\"]', '2023-06-22 12:31:55', '2023-06-22 12:22:21', '2023-06-22 12:31:55'),
(393, 'App\\Models\\User', 4, 'token', '57af7ddf8e99ea016fc02e95569f8be41347f3d8f7e32ed295a6b745770855df', '[\"*\"]', '2023-06-23 05:56:40', '2023-06-22 12:33:31', '2023-06-23 05:56:40'),
(394, 'App\\Models\\User', 4, 'token', 'ad7aadc46becd1d6a644e81f30d7b3fe9a2edb8e2aa7acc67a8646c5263d936c', '[\"*\"]', '2023-06-24 02:30:52', '2023-06-23 03:52:40', '2023-06-24 02:30:52'),
(395, 'App\\Models\\User', 28, 'token', 'd73250b93b2aa43744a4135a1be23addfc824942539af4fcaca914a6f40e95a0', '[\"*\"]', '2023-06-23 09:43:20', '2023-06-23 04:01:11', '2023-06-23 09:43:20'),
(396, 'App\\Models\\User', 47, 'token', 'ec312edd2d627a9413f22a676079813f4778efe08f43e674b8034f6e0249187a', '[\"*\"]', '2023-06-24 03:42:30', '2023-06-23 05:56:59', '2023-06-24 03:42:30'),
(397, 'App\\Models\\User', 34, 'token', '658b914a8d8fbc7e701b62ede4ad0111734d00d602f577977aa74b380fad1c77', '[\"*\"]', '2023-06-23 09:06:16', '2023-06-23 06:28:10', '2023-06-23 09:06:16'),
(398, 'App\\Models\\User', 51, 'token', 'e8cc65a46890c40a55e8151c565fbe30515dc646e35019d5cbec00932e88a4f4', '[\"*\"]', '2023-06-23 09:06:41', '2023-06-23 06:44:38', '2023-06-23 09:06:41'),
(399, 'App\\Models\\User', 28, 'token', '0de16871a2ae38b74c929e6e23fa047f1d01c34b66d6e437969bcb8e3deca70b', '[\"*\"]', '2023-06-23 09:49:16', '2023-06-23 09:48:37', '2023-06-23 09:49:16'),
(400, 'App\\Models\\User', 28, 'token', '7fc38a410e2936e314182e6c89c85f177488a17f80ee2ccd9c7a41c4c37e94e7', '[\"*\"]', '2023-06-23 11:37:32', '2023-06-23 09:50:12', '2023-06-23 11:37:32'),
(401, 'App\\Models\\User', 45, 'token', '0f9b6d4c3de14c7128b5d180de6451537dcaec3ca94cef53ef0f7ae66fcc2046', '[\"*\"]', '2023-06-24 03:28:21', '2023-06-24 02:24:09', '2023-06-24 03:28:21'),
(402, 'App\\Models\\User', 28, 'token', 'ac58b827d58997d900446a47fd2814c1d0ee365cf2953d8fe8f5cf3cf137db97', '[\"*\"]', '2023-06-24 03:42:40', '2023-06-24 03:40:32', '2023-06-24 03:42:40');

-- --------------------------------------------------------

--
-- Table structure for table `posisi_banner`
--

CREATE TABLE `posisi_banner` (
  `id_posisi_banner` char(2) NOT NULL,
  `posisi` varchar(50) NOT NULL,
  `gambar` varchar(150) NOT NULL,
  `keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posisi_banner`
--

INSERT INTO `posisi_banner` (`id_posisi_banner`, `posisi`, `gambar`, `keterangan`) VALUES
('00', 'Halaman Utama', '-', 'Terletak pada halaman utama aplikasi'),
('11', 'Jali Mami', '', 'Terletak pada halaman utama Jali Mami');

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE `promo` (
  `id_promo` int(11) NOT NULL,
  `kode_promo` varchar(50) NOT NULL,
  `judul_promo` varchar(150) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `penjelasan` text NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `nilai` float NOT NULL,
  `status` enum('0','1') NOT NULL,
  `kuota` int(3) NOT NULL,
  `sisa_kuota` int(3) NOT NULL,
  `id_jenis_promo` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promo`
--

INSERT INTO `promo` (`id_promo`, `kode_promo`, `judul_promo`, `gambar`, `penjelasan`, `tanggal_mulai`, `tanggal_selesai`, `nilai`, `status`, `kuota`, `sisa_kuota`, `id_jenis_promo`) VALUES
(1, 'PUASA', 'Lebih hemat saat awal puasa', 'bfMSbluHLljMHLXHFXJjjpavtjKrzBOqoy4NVHVQ.jpg', 'Lebih hemat saat awal puasa', '2023-03-20', '2023-04-01', 3, '1', 100, 40, '01');

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `id_provinsi` int(11) NOT NULL,
  `nama_provinsi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES
(1, 'Jawa Barat');

-- --------------------------------------------------------

--
-- Table structure for table `rekening_bank`
--

CREATE TABLE `rekening_bank` (
  `id_rekening_bank` int(11) NOT NULL,
  `id_bank` int(11) NOT NULL,
  `no_rekening` varchar(15) NOT NULL,
  `nama_pemilik` varchar(50) NOT NULL,
  `cabang` varchar(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekening_bank`
--

INSERT INTO `rekening_bank` (`id_rekening_bank`, `id_bank`, `no_rekening`, `nama_pemilik`, `cabang`, `keterangan`) VALUES
(1, 1, '05121212', 'Taofik Muhammad', 'Tasikmalaya', '-');

-- --------------------------------------------------------

--
-- Table structure for table `rekening_bank_pengguna`
--

CREATE TABLE `rekening_bank_pengguna` (
  `id_rekening_bank_pengguna` int(11) NOT NULL,
  `id_bank` int(11) NOT NULL,
  `no_rekening` varchar(20) NOT NULL,
  `nama_pemilik` varchar(50) NOT NULL,
  `cabang` varchar(100) NOT NULL,
  `id_pengguna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `restoran`
--

CREATE TABLE `restoran` (
  `id_restoran` int(11) NOT NULL,
  `foto_restoran` varchar(100) NOT NULL,
  `nama_restoran` varchar(150) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `waktu_ditambahkan` datetime NOT NULL,
  `id_status_restoran` char(2) NOT NULL,
  `id_pengguna_pemilik` int(11) DEFAULT NULL,
  `id_kota_layanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restoran`
--

INSERT INTO `restoran` (`id_restoran`, `foto_restoran`, `nama_restoran`, `alamat`, `latitude`, `longitude`, `waktu_ditambahkan`, `id_status_restoran`, `id_pengguna_pemilik`, `id_kota_layanan`) VALUES
(1, 'qi9HedXnfJmJAY5N4AJNbi45brTEmLk0rd9GQoDI.jpg', 'Rumah Makan Ampera', 'Jl. HZ. Mustofa No.169, Nagarawangi, Kec. Cihideung, Kab. Tasikmalaya, Jawa Barat 46124', -7.333301, 108.219207, '2023-04-26 06:36:07', '11', 28, 1),
(2, '62RgwYTusWjj3Xkn7HWHDaAa3O8aXnRBv6XfQHZA.jpg', 'McDonalds, Juanda', 'Jl. HZ. Mustofa No.169, Nagarawangi, Kec. Cihideung, Kab. Tasikmalaya, Jawa Barat 46124', -7.333301, 108.219207, '2023-04-18 02:32:21', '11', 2, 1),
(3, '9LqbyyChfoYJKxk8hyhIFxcZGlGOXtrAEaJmK1z3.jpg', 'Pojok Kuliner Villa Ciomas', 'Jl. Villa Ciomas No.11, Ciomas Rahayu, Kec. Ciomas, Kabupaten Bogor, Jawa Barat 16610', -6.5975979, 106.76372, '2023-05-31 10:33:09', '11', 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `rincian_menu`
--

CREATE TABLE `rincian_menu` (
  `id_rincian_menu` int(11) NOT NULL,
  `id_menu` int(11) DEFAULT NULL,
  `id_transaksi` varchar(13) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `qty` tinyint(3) NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rincian_menu`
--

INSERT INTO `rincian_menu` (`id_rincian_menu`, `id_menu`, `id_transaksi`, `nama_menu`, `harga`, `qty`, `sub_total`) VALUES
(67, 4, 'MAM2306130001', 'asd', 1500, 1, 1500),
(71, 1, 'MAM2306140002', 'Babat', 24000, 1, 24000),
(74, 1, 'MAM2306140007', 'Babat', 24000, 2, 48000),
(77, 1, 'MAM2306140012', 'Babat', 24000, 1, 24000),
(90, 4, 'MAM2306220005', 'asd', 1500, 1, 1500);

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_saldo`
--

CREATE TABLE `riwayat_saldo` (
  `id_riwayat_saldo` int(11) NOT NULL,
  `nominal` float NOT NULL,
  `sisa_saldo` float NOT NULL,
  `waktu_perubahan` datetime NOT NULL,
  `jenis_transaksi` enum('masuk','keluar') NOT NULL,
  `catatan_transaksi` varchar(50) NOT NULL,
  `id_saldo` int(11) NOT NULL,
  `id_pengguna_pelaku` int(11) NOT NULL COMMENT 'Siapa yang melakukan tindakan perubahan saldo? ',
  `id_layanan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riwayat_saldo`
--

INSERT INTO `riwayat_saldo` (`id_riwayat_saldo`, `nominal`, `sisa_saldo`, `waktu_perubahan`, `jenis_transaksi`, `catatan_transaksi`, `id_saldo`, `id_pengguna_pelaku`, `id_layanan`) VALUES
(1, 10000, 10000, '2023-03-27 02:08:10', 'masuk', 'Penambahan Dana Oleh Admin: admin@gmail.com', 2, 1, NULL),
(2, 30000, 40000, '2023-04-06 01:22:51', 'masuk', 'Penambahan Dana Oleh Admin: Super Administrator', 2, 1, NULL),
(3, 15000, 15000, '2023-05-10 04:50:01', 'masuk', 'Penambahan Dana Oleh Admin: Super Administrator', 11, 1, NULL),
(4, 15000, 15000, '2023-05-10 04:50:31', 'masuk', 'Penambahan Dana Oleh Admin: Super Administrator', 12, 1, NULL),
(5, 15000, 15000, '2023-05-10 04:52:58', 'masuk', 'Penambahan Dana Oleh Admin: Super Administrator', 13, 1, NULL),
(6, 10000, 10000, '2023-05-10 04:54:33', 'masuk', 'Penambahan Dana Oleh Admin: Super Administrator', 14, 1, NULL),
(7, 11000, -1000, '2023-05-10 04:54:45', 'keluar', 'Pengurangan Dana Oleh Admin: Super Administrator', 14, 1, NULL),
(8, 300000, 340000, '2023-05-11 03:11:37', 'masuk', 'diterima Oleh Admin', 2, 1, NULL),
(9, 50000, 50000, '2023-05-19 01:57:21', 'masuk', 'diterima Oleh Admin', 15, 1, NULL),
(10, 300000, 300000, '2023-06-10 08:37:02', 'masuk', 'diterima Oleh Admin', 17, 1, NULL),
(11, 20000, 120000, '2023-06-12 03:46:20', 'masuk', 'diterima Oleh Admin', 18, 1, NULL),
(12, 10000, 18000, '2023-06-12 09:49:25', 'masuk', 'diterima Oleh Admin', 1, 1, NULL),
(13, 10000, 9000, '2023-06-12 11:05:23', 'masuk', 'diterima Oleh Admin', 14, 1, NULL),
(14, 50000, 53000, '2023-06-13 09:49:50', 'masuk', 'diterima Oleh Admin', 17, 1, NULL),
(15, 300000, 359100, '2023-06-15 03:19:04', 'masuk', 'diterima Oleh Admin', 17, 1, NULL),
(16, 100000, 100000, '2023-06-21 00:41:20', 'masuk', 'diterima Oleh Admin', 21, 1, NULL),
(17, 300000, 300000, '2023-06-21 03:57:09', 'masuk', 'Penambahan Dana Oleh Admin: Super Administrator', 19, 1, NULL),
(18, 200000, 207500, '2023-06-21 05:47:23', 'masuk', 'Penambahan Dana Oleh Admin: Super Administrator', 18, 1, NULL),
(19, 100000, 109000, '2023-06-21 05:49:27', 'masuk', 'Penambahan Dana Oleh Admin: Super Administrator', 14, 1, NULL),
(20, 200000, 200000, '2023-06-21 05:55:16', 'masuk', 'Penambahan Dana Oleh Admin: Super Administrator', 16, 1, NULL),
(21, 14000, 253700, '2023-06-22 10:44:55', 'keluar', 'Transaksi Jali Kurir', 17, 44, 3),
(22, 22400, 276100, '2023-06-22 10:46:07', 'masuk', 'Transaksi Jali Kurir', 17, 44, 3),
(23, 15200, 291300, '2023-06-22 10:47:31', 'masuk', 'Transaksi Jali Mot', 17, 44, 1),
(24, 100000, 100000, '2023-06-22 04:34:58', 'masuk', 'Penambahan Dana Oleh Admin: Super Administrator', 22, 1, NULL),
(25, 500000, 572500, '2023-06-22 06:23:42', 'masuk', 'Penambahan Dana Oleh Admin: Super Administrator', 18, 1, NULL),
(26, 29600, 169000, '2023-06-22 14:18:07', 'masuk', 'Transaksi Jali Mob', 14, 4, 2),
(27, 54400, 254400, '2023-06-22 14:43:06', 'masuk', 'Transaksi Jali Mami', 16, 42, 4),
(28, 6400, 260800, '2023-06-22 14:43:38', 'masuk', 'Transaksi Jali Mot', 16, 42, 1),
(29, 12000, 272800, '2023-06-22 14:55:48', 'masuk', 'Transaksi Jali Mot', 16, 42, 1),
(30, 4000, 276800, '2023-06-22 15:05:54', 'masuk', 'Transaksi Jali Mot', 16, 42, 1),
(31, 12000, 264800, '2023-06-22 15:18:10', 'keluar', 'Transaksi Jali Mob', 16, 42, 2),
(32, 10400, 328800, '2023-06-22 16:08:58', 'masuk', 'Transaksi Jali Mot', 19, 47, 1),
(33, 4800, 333600, '2023-06-22 18:45:21', 'masuk', 'Transaksi Jali Mot', 19, 47, 1),
(34, 5600, 339200, '2023-06-22 19:13:41', 'masuk', 'Transaksi Jali Mot', 19, 47, 1),
(35, 10000, 280000, '2023-06-23 03:46:19', 'masuk', 'diterima Oleh Admin', 2, 1, NULL),
(36, 5600, 174600, '2023-06-23 11:02:42', 'masuk', 'Transaksi Jali Mot', 14, 4, 1),
(37, 18400, 193000, '2023-06-23 11:03:16', 'masuk', 'Transaksi Jali Mot', 14, 4, 1),
(38, 9600, 348800, '2023-06-23 12:57:36', 'masuk', 'Transaksi Jali Kurir', 19, 47, 3),
(39, 24000, 372800, '2023-06-23 12:58:03', 'masuk', 'Transaksi Jali Kurir', 19, 47, 3),
(40, 22400, 215400, '2023-06-23 13:08:09', 'masuk', 'Transaksi Jali Mot', 14, 4, 1),
(41, 6000, 209400, '2023-06-23 13:15:38', 'keluar', 'Transaksi Jali Mot', 14, 4, 1),
(42, 22400, 122400, '2023-06-23 15:41:55', 'masuk', 'Transaksi Jali Mot', 22, 51, 1),
(43, 8800, 131200, '2023-06-23 15:43:35', 'masuk', 'Transaksi Jali Mot', 22, 51, 1),
(44, 10000, 123200, '2023-06-23 15:53:44', 'keluar', 'Transaksi Jali Mot', 22, 51, 1),
(45, 300000, 299000, '2023-06-23 09:29:06', 'masuk', 'diterima Oleh Admin', 1, 1, NULL),
(46, 72800, 300000, '2023-06-23 10:25:14', 'keluar', 'Pengurangan Dana Oleh Admin: Super Administrator', 19, 1, NULL),
(47, 5000, 296000, '2023-06-23 17:26:39', 'keluar', 'Transaksi Jali Mot', 19, 47, 1),
(48, 24000, 233400, '2023-06-24 09:26:58', 'masuk', 'Transaksi Jali Mot', 14, 4, 1),
(49, 33600, 267000, '2023-06-24 09:30:50', 'masuk', 'Transaksi Jali Mot', 14, 4, 1),
(50, 36800, 332800, '2023-06-24 10:42:28', 'masuk', 'Transaksi Jali Mot', 19, 47, 1);

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_topup_saldo`
--

CREATE TABLE `riwayat_topup_saldo` (
  `id_riwayat_topup_saldo` int(11) NOT NULL,
  `waktu_perubahan` datetime NOT NULL,
  `catatan` varchar(150) NOT NULL,
  `id_topup_saldo` varchar(15) NOT NULL,
  `id_status_transaksi` char(2) NOT NULL,
  `id_pengguna_pengubah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riwayat_topup_saldo`
--

INSERT INTO `riwayat_topup_saldo` (`id_riwayat_topup_saldo`, `waktu_perubahan`, `catatan`, `id_topup_saldo`, `id_status_transaksi`, `id_pengguna_pengubah`) VALUES
(1, '2023-05-10 06:55:48', 'Permintaan topup saldo', 'TOP2305100001', '12', 28),
(2, '2023-05-10 06:56:26', 'Upload bukti topup saldo', 'TOP2305100001', '13', 28),
(3, '2023-05-10 10:27:25', 'diterima Oleh Admin', '1', '24', 1),
(4, '2023-05-11 07:05:10', 'Permintaan topup saldo', 'TOP2305110001', '12', 28),
(5, '2023-05-11 07:05:31', 'Upload bukti topup saldo', 'TOP2305110001', '13', 28),
(6, '2023-05-11 00:08:33', 'diterima Oleh Admin', 'TOP2305110001', '24', 1),
(7, '2023-05-11 00:21:11', 'diterima Oleh Admin', 'TOP2305110001', '24', 1),
(8, '2023-05-11 03:11:36', 'diterima Oleh Admin', 'TOP2305100001', '24', 1),
(9, '2023-05-19 08:56:08', 'Permintaan topup saldo', 'TOP2305190001', '12', 43),
(10, '2023-05-19 08:56:37', 'Upload bukti topup saldo', 'TOP2305190001', '13', 43),
(11, '2023-05-19 01:57:21', 'diterima Oleh Admin', 'TOP2305190001', '24', 1),
(12, '2023-05-31 08:45:57', 'Permintaan topup saldo', 'TOP2305310001', '12', 2),
(13, '2023-05-31 08:46:40', 'Upload bukti topup saldo', 'TOP2305310001', '13', 2),
(14, '2023-06-05 17:34:15', 'Permintaan topup saldo', 'TOP2306050001', '12', 28),
(15, '2023-06-10 14:48:16', 'Permintaan topup saldo', 'TOP2306100001', '12', 44),
(16, '2023-06-10 14:48:51', 'Permintaan topup saldo', 'TOP2306100002', '12', 2),
(17, '2023-06-10 15:09:54', 'Permintaan topup saldo', 'TOP2306100003', '12', 44),
(18, '2023-06-10 15:14:33', 'Permintaan topup saldo', 'TOP2306100004', '12', 44),
(19, '2023-06-10 15:35:37', 'Upload bukti topup saldo', 'TOP2306100004', '13', 44),
(20, '2023-06-10 08:37:01', 'diterima Oleh Admin', 'TOP2306100004', '24', 1),
(31, '2023-06-12 10:14:22', 'Permintaan topup saldo', 'TOP2306120009', '12', 9),
(32, '2023-06-12 03:14:40', 'Upload bukti topup saldo', 'TOP2306120009', '13', 9),
(33, '2023-06-12 10:42:47', 'Permintaan topup saldo', 'TOP2306120010', '12', 45),
(34, '2023-06-12 03:43:09', 'Upload bukti topup saldo', 'TOP2306120010', '13', 45),
(35, '2023-06-12 03:46:19', 'diterima Oleh Admin', 'TOP2306120010', '24', 1),
(36, '2023-06-12 16:48:24', 'Permintaan topup saldo', 'TOP2306120011', '12', 2),
(37, '2023-06-12 16:48:33', 'Upload bukti topup saldo', 'TOP2306120011', '13', 2),
(38, '2023-06-12 09:49:24', 'diterima Oleh Admin', 'TOP2306120011', '24', 1),
(39, '2023-06-12 17:31:08', 'Permintaan topup saldo', 'TOP2306120012', '12', 4),
(40, '2023-06-12 18:03:48', 'Permintaan topup saldo', 'TOP2306120013', '12', 4),
(41, '2023-06-12 11:04:03', 'Upload bukti topup saldo', 'TOP2306120013', '13', 4),
(42, '2023-06-12 11:05:22', 'diterima Oleh Admin', 'TOP2306120013', '24', 1),
(43, '2023-06-13 16:48:31', 'Permintaan topup saldo', 'TOP2306130001', '12', 44),
(44, '2023-06-13 09:48:48', 'Upload bukti topup saldo', 'TOP2306130001', '13', 44),
(45, '2023-06-13 09:49:49', 'diterima Oleh Admin', 'TOP2306130001', '24', 1),
(46, '2023-06-15 10:18:15', 'Permintaan topup saldo', 'TOP2306150001', '12', 44),
(47, '2023-06-15 03:18:26', 'Upload bukti topup saldo', 'TOP2306150001', '13', 44),
(48, '2023-06-15 03:19:03', 'diterima Oleh Admin', 'TOP2306150001', '24', 1),
(49, '2023-06-21 07:33:56', 'Permintaan topup saldo', 'TOP2306210001', '12', 34),
(50, '2023-06-21 07:40:29', 'Upload bukti topup saldo', 'TOP2306210001', '13', 34),
(51, '2023-06-21 00:41:20', 'diterima Oleh Admin', 'TOP2306210001', '24', 1),
(52, '2023-06-21 09:24:04', 'Permintaan topup saldo', 'TOP2306210002', '12', 28),
(53, '2023-06-21 10:00:37', 'Permintaan topup saldo', 'TOP2306210003', '12', 2),
(54, '2023-06-21 10:16:25', 'Permintaan topup saldo', 'TOP2306210004', '12', 2),
(55, '2023-06-21 03:16:58', 'Upload bukti topup saldo', 'TOP2306210004', '13', 2),
(56, '2023-06-21 10:21:36', 'Permintaan topup saldo', 'TOP2306210005', '12', 2),
(57, '2023-06-21 10:24:42', 'Permintaan topup saldo', 'TOP2306210006', '12', 2),
(58, '2023-06-21 03:24:59', 'Upload bukti topup saldo', 'TOP2306210006', '13', 2),
(59, '2023-06-21 10:31:18', 'Permintaan topup saldo', 'TOP2306210007', '12', NULL),
(60, '2023-06-21 10:43:13', 'Permintaan topup saldo', 'TOP2306210008', '12', 2),
(61, '2023-06-21 10:47:53', 'Upload bukti topup saldo', 'TOP2306210008', '13', 2),
(62, '2023-06-21 10:51:20', 'Permintaan topup saldo', 'TOP2306210009', '12', 2),
(63, '2023-06-21 10:51:31', 'Upload bukti topup saldo', 'TOP2306210009', '13', 2),
(64, '2023-06-21 10:52:02', 'Permintaan topup saldo', 'TOP2306210010', '12', 47),
(65, '2023-06-21 03:52:31', 'Upload bukti topup saldo', 'TOP2306210010', '13', 47),
(66, '2023-06-21 10:55:43', 'Permintaan topup saldo', 'TOP2306210011', '12', 47),
(67, '2023-06-21 03:56:14', 'Upload bukti topup saldo', 'TOP2306210011', '13', 47),
(68, '2023-06-21 11:09:57', 'Permintaan topup saldo', 'TOP2306210012', '12', 28),
(69, '2023-06-21 11:10:09', 'Upload bukti topup saldo', 'TOP2306210012', '13', 28),
(70, '2023-06-23 10:37:00', 'Permintaan topup saldo', 'TOP2306230001', '12', 28),
(71, '2023-06-23 10:37:12', 'Upload bukti topup saldo', 'TOP2306230001', '13', 28),
(72, '2023-06-23 10:37:25', 'Permintaan topup saldo', 'TOP2306230002', '12', 4),
(73, '2023-06-23 03:37:36', 'Upload bukti topup saldo', 'TOP2306230002', '13', 4),
(74, '2023-06-23 03:46:16', 'diterima Oleh Admin', 'TOP2306230001', '24', 1),
(75, '2023-06-23 16:25:46', 'Permintaan topup saldo', 'TOP2306230003', '12', 2),
(76, '2023-06-23 16:26:07', 'Upload bukti topup saldo', 'TOP2306230003', '13', 2),
(77, '2023-06-23 09:29:06', 'diterima Oleh Admin', 'TOP2306230003', '24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_transaksi`
--

CREATE TABLE `riwayat_transaksi` (
  `id_riwayat_transaksi` int(11) NOT NULL,
  `waktu` datetime NOT NULL,
  `id_status_transaksi` char(2) NOT NULL,
  `id_transaksi` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `saldo`
--

CREATE TABLE `saldo` (
  `id_saldo` int(11) NOT NULL,
  `nominal` float NOT NULL,
  `waktu_perubahan` datetime NOT NULL,
  `catatan_perubahan` varchar(50) NOT NULL,
  `id_pengguna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saldo`
--

INSERT INTO `saldo` (`id_saldo`, `nominal`, `waktu_perubahan`, `catatan_perubahan`, `id_pengguna`) VALUES
(1, 299000, '2023-06-23 09:29:06', 'diterima Oleh Admin', 2),
(2, 199000, '2023-06-24 10:41:42', 'Pengurangan saldo otomatis melalui sistem', 28),
(3, 0, '2023-03-08 05:07:47', '', 33),
(4, 0, '2023-03-10 02:05:28', '', 35),
(5, 999856000, '2023-06-22 15:05:32', 'Pengurangan saldo otomatis melalui sistem', 9),
(8, 100000, '2023-03-28 06:54:13', '', 37),
(9, 0, '2023-03-31 13:26:52', '', 38),
(10, 100000, '2023-03-31 14:41:55', '', 39),
(11, 15000, '2023-05-10 04:50:01', 'Penambahan Dana Oleh Admin: Super Administrator', 1),
(12, 15000, '2023-05-10 04:50:31', 'Penambahan Dana Oleh Admin: Super Administrator', 10),
(13, 15000, '2023-05-10 04:52:58', 'Penambahan Dana Oleh Admin: Super Administrator', 41),
(14, 267000, '2023-06-24 09:30:50', 'Penambahan saldo otomatis melalui sistem', 4),
(15, 50000, '2023-05-19 01:57:21', 'diterima Oleh Admin', 43),
(16, 264800, '2023-06-22 15:18:10', 'Pengurangan saldo otomatis melalui sistem', 42),
(17, 291300, '2023-06-22 10:47:31', 'Penambahan saldo otomatis melalui sistem', 44),
(18, 447500, '2023-06-24 09:30:42', 'Pengurangan saldo otomatis melalui sistem', 45),
(19, 332800, '2023-06-24 10:42:28', 'Penambahan saldo otomatis melalui sistem', 47),
(20, 0, '2023-05-30 13:10:03', '', 48),
(21, 72000, '2023-06-22 11:59:04', 'Pengurangan saldo otomatis melalui sistem', 34),
(22, 123200, '2023-06-23 15:53:44', 'Pengurangan saldo otomatis melalui sistem', 51);

-- --------------------------------------------------------

--
-- Table structure for table `status_jenis_tarif`
--

CREATE TABLE `status_jenis_tarif` (
  `id_status_jenis_tarif` int(11) NOT NULL,
  `id_kota_layanan` int(11) NOT NULL,
  `id_jenis_tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_jenis_tarif`
--

INSERT INTO `status_jenis_tarif` (`id_status_jenis_tarif`, `id_kota_layanan`, `id_jenis_tarif`) VALUES
(1, 1, 2),
(2, 2, 1),
(3, 5, 2),
(4, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `status_mitra`
--

CREATE TABLE `status_mitra` (
  `id_status_mitra` char(2) NOT NULL,
  `status_mitra` varchar(30) NOT NULL,
  `keterangan` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_mitra`
--

INSERT INTO `status_mitra` (`id_status_mitra`, `status_mitra`, `keterangan`) VALUES
('00', 'Belum Aktif', 'Mitra baru didaftarkan, dan belum diaktifasi'),
('01', 'Suspend', 'Status kemitraan ditangguhkan dikarenakan beberapa pelanggaran kebijakan'),
('02', 'Tidak Aktif', 'Mitra mematikan layanan'),
('11', 'Aktif', 'Mitra aktif, dan siap menerima pesanan'),
('12', 'Bertugas', 'Mitra sedang bertugas');

-- --------------------------------------------------------

--
-- Table structure for table `status_resto`
--

CREATE TABLE `status_resto` (
  `id_status_resto` char(2) NOT NULL,
  `status` varchar(20) NOT NULL,
  `keterangan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_resto`
--

INSERT INTO `status_resto` (`id_status_resto`, `status`, `keterangan`) VALUES
('00', 'Belum Aktif', 'Restoran baru saja didaftarkan, dan masih belum bisa digunakan'),
('01', 'Suspend', 'Restoran ditutup sementara dikarenakan telah melakukan beberapa pelanggaran'),
('02', 'Tutup', 'Restoran tutup karena berapa diluar jam operasional atau dimatikan manual oleh admin'),
('11', 'Aktif', 'Restoran Aktif dan siap menerima pesanan');

-- --------------------------------------------------------

--
-- Table structure for table `status_transaksi`
--

CREATE TABLE `status_transaksi` (
  `id_status_transaksi` char(2) NOT NULL,
  `status` varchar(30) NOT NULL,
  `keterangan` varchar(150) NOT NULL,
  `id_kategori_status_transaksi` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_transaksi`
--

INSERT INTO `status_transaksi` (`id_status_transaksi`, `status`, `keterangan`, `id_kategori_status_transaksi`) VALUES
('00', 'Keranjang', 'Pesanan masih dalam keranjang belanja', '01'),
('10', 'Mencari Driver', 'Sistem sedang mencari driver', '02'),
('11', 'Mitra Menuju Tempatmu', 'Mitra dalam perjalanan ke tempat konsumen', '02'),
('12', 'Menunggu Pembayaran', 'Menunggu pembayaran oleh User', '02'),
('13', 'Menunggu Verifikasi', 'Menunggu verifikasi pembayaran oleh Admin', '02'),
('14', 'Dalam Perjalanan', 'Konsumen dan mitra dalam perjalanan ke tujuan akhir', '02'),
('21', 'Dibatalkan Konsumen', 'Konsumen membatalkan transaksi', '03'),
('22', 'Dibatalkan Mitra', 'Mitra melakukan pembatalan transaksi', '03'),
('23', 'Dibatalkan Sistem', 'Transaksi secara otomatis dibatalkan', '03'),
('24', 'Topup Selesai', 'Topup selesai dilakukan', '03'),
('25', 'Selesai', 'Transaksi Selesai', '03');

-- --------------------------------------------------------

--
-- Table structure for table `tarif`
--

CREATE TABLE `tarif` (
  `id_tarif` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `id_jenis_tarif` int(11) NOT NULL,
  `id_layanan` int(11) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `id_jarak_tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tarif`
--

INSERT INTO `tarif` (`id_tarif`, `harga`, `id_jenis_tarif`, `id_layanan`, `id_kota`, `id_jarak_tarif`) VALUES
(1, 5000, 2, 1, 1, 1),
(2, 7000, 2, 1, 1, 2),
(3, 10000, 2, 2, 1, 1),
(4, 2000, 2, 2, 1, 2),
(5, 12000, 2, 3, 1, 1),
(6, 10000, 2, 3, 1, 2),
(7, 12000, 1, 3, 2, 1),
(8, 10000, 1, 3, 2, 2),
(9, 2900, 2, 1, 1, 1),
(10, 5000, 2, 1, 2, 1),
(11, 5000, 2, 1, 4, 1),
(12, 5000, 2, 1, 6, 1),
(13, 7000, 2, 1, 2, 2),
(14, 2700, 2, 1, 4, 2),
(15, 2700, 2, 1, 6, 2),
(16, 5000, 1, 1, 1, 1),
(17, 5000, 1, 1, 2, 1),
(18, 5000, 2, 1, 4, 1),
(19, 5000, 2, 1, 6, 1),
(20, 2000, 1, 1, 1, 2),
(21, 2000, 1, 1, 2, 2),
(22, 2700, 2, 1, 4, 2),
(23, 2700, 2, 1, 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `topup_saldo`
--

CREATE TABLE `topup_saldo` (
  `id_topup_saldo` varchar(15) NOT NULL,
  `waktu_permintaan` datetime NOT NULL,
  `waktu_selesai` datetime DEFAULT NULL,
  `nominal` float NOT NULL,
  `biaya_admin` float NOT NULL,
  `bukti_pembayaran` varchar(150) DEFAULT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  `id_pengguna_verifikator` int(11) DEFAULT NULL,
  `id_status_transaksi` char(2) DEFAULT NULL,
  `id_rekening_bank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topup_saldo`
--

INSERT INTO `topup_saldo` (`id_topup_saldo`, `waktu_permintaan`, `waktu_selesai`, `nominal`, `biaya_admin`, `bukti_pembayaran`, `id_pengguna`, `id_pengguna_verifikator`, `id_status_transaksi`, `id_rekening_bank`) VALUES
('1', '2023-04-06 01:19:37', '2023-05-10 10:27:25', 10000, 1000, 'asd', 5, 1, '00', NULL),
('TOP2305100001', '2023-05-10 06:55:48', '2023-05-11 03:11:36', 300000, 1000, '05102023065626scaled_IMG-20230509-WA0013.jpg', 28, 1, '24', 1),
('TOP2305110001', '2023-05-11 07:05:10', '2023-05-11 00:21:11', 20000, 1000, '05112023070531scaled_IMG-20230509-WA0013.jpg', 28, 1, '24', 1),
('TOP2305190001', '2023-05-19 08:56:08', '2023-05-19 01:57:21', 50000, 1000, '05192023085637scaled_Screenshot_2023-05-19-07-55-43-883_com.priludestudio.jali.konsumen.jpg', 43, 1, '24', 1),
('TOP2305310001', '2023-05-31 08:45:57', NULL, 300000, 1000, '05312023084640scaled_IMG_20230418_113705.jpg', 2, NULL, '13', 1),
('TOP2306050001', '2023-06-05 17:34:15', NULL, 10000, 1000, NULL, 28, NULL, '12', 1),
('TOP2306100001', '2023-06-10 14:48:16', NULL, 200000, 1000, NULL, 44, NULL, '12', 1),
('TOP2306100002', '2023-06-10 14:48:51', NULL, 300000, 1000, NULL, 2, NULL, '12', 1),
('TOP2306100003', '2023-06-10 15:09:54', NULL, 300000, 1000, NULL, 44, NULL, '12', 1),
('TOP2306100004', '2023-06-10 15:14:33', '2023-06-10 08:37:01', 300000, 1000, '06102023153537scaled_IMG_20230525_171507.jpg', 44, 1, '24', 1),
('TOP2306120009', '2023-06-12 10:14:22', NULL, 10000, 1000, '06122023031440scaled_Screenshot_20230606-121654.jpg', 9, NULL, '13', 1),
('TOP2306120010', '2023-06-12 10:42:47', '2023-06-12 03:46:18', 20000, 1000, '06122023034309scaled_Screenshot_2023-06-10-19-21-39-034_com.bca.jpg', 45, 1, '24', 1),
('TOP2306120011', '2023-06-12 16:48:24', '2023-06-12 09:49:24', 10000, 1000, '06122023164833scaled_IMG_20230525_171507.jpg', 2, 1, '24', 1),
('TOP2306120012', '2023-06-12 17:31:08', NULL, 10000, 1000, NULL, 4, NULL, '12', 1),
('TOP2306120013', '2023-06-12 18:03:48', '2023-06-12 11:05:22', 10000, 1000, '06122023110403scaled_IMG_20230501_112716_011.jpg', 4, 1, '24', 1),
('TOP2306130001', '2023-06-13 16:48:31', '2023-06-13 09:49:49', 50000, 1000, '06132023094848scaled_IMG-20230603-WA0000.jpg', 44, 1, '24', 1),
('TOP2306150001', '2023-06-15 10:18:15', '2023-06-15 03:19:03', 300000, 1000, '06152023031826scaled_IMG_20230525_171507.jpg', 44, 1, '24', 1),
('TOP2306210001', '2023-06-21 07:33:56', '2023-06-21 00:41:20', 100000, 1000, '06212023074029scaled_IMG-20230619-WA0000.jpg', 34, 1, '24', 1),
('TOP2306210002', '2023-06-21 09:24:04', NULL, 10000, 1000, NULL, 28, NULL, '12', 1),
('TOP2306210003', '2023-06-21 10:00:37', NULL, 10000, 1000, NULL, 2, NULL, '12', 1),
('TOP2306210004', '2023-06-21 10:16:25', NULL, 10000, 1000, '06212023031658scaled_IMG_20230525_171507.jpg', 2, NULL, '13', 1),
('TOP2306210005', '2023-06-21 10:21:36', NULL, 10000, 1000, NULL, 2, NULL, '12', 1),
('TOP2306210006', '2023-06-21 10:24:42', NULL, 10000, 1000, '06212023032459scaled_IMG_20230525_171507.jpg', 2, NULL, '13', 1),
('TOP2306210007', '2023-06-21 10:31:18', NULL, 10000, 1000, NULL, NULL, NULL, '12', 1),
('TOP2306210008', '2023-06-21 10:43:13', NULL, 10000, 1000, 'https://is3.cloudhost.id/prilude/images/topup/06212023104753scaled_IMG_20230525_171507.jpg', 2, NULL, '13', 1),
('TOP2306210009', '2023-06-21 10:51:20', NULL, 10000, 1000, 'https://is3.cloudhost.id/prilude/images/topup/06212023105131scaled_IMG_20230525_171507.jpg', 2, NULL, '13', 1),
('TOP2306210010', '2023-06-21 10:52:02', NULL, 200000, 1000, '06212023035231scaled_Screenshot_2023-06-21-10-06-21-949_com.priludestudio.jali.konsumen.jpg', 47, NULL, '13', 1),
('TOP2306210011', '2023-06-21 10:55:43', NULL, 100000, 1000, '06212023035614scaled_Screenshot_2023-06-21-09-16-10-738_com.priludestudio.jali.konsumen.jpg', 47, NULL, '13', 1),
('TOP2306210012', '2023-06-21 11:09:57', NULL, 10000, 1000, 'https://is3.cloudhost.id/prilude/images/topup/06212023111009scaled_Screenshot_20230621-104959.jpg', 28, NULL, '13', 1),
('TOP2306230001', '2023-06-23 10:37:00', '2023-06-23 03:46:14', 10000, 1000, 'https://is3.cloudhost.id/prilude/images/topup/06232023103712scaled_Screenshot_20230623-094336.jpg', 28, 1, '24', 1),
('TOP2306230002', '2023-06-23 10:37:25', NULL, 100000, 1000, '06232023033736scaled_Screenshot_2023-06-23-09-35-44-374_com.priludestudio.amggo.mitra.jpg', 4, NULL, '13', 1),
('TOP2306230003', '2023-06-23 16:25:46', '2023-06-23 09:29:06', 300000, 1000, 'https://is3.cloudhost.id/prilude/images/topup/06232023162607scaled_IMG_20230525_171507.jpg', 2, 1, '24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(13) NOT NULL,
  `waktu_pemesanan` datetime NOT NULL,
  `waktu_selesai` datetime NOT NULL,
  `jarak` int(3) NOT NULL,
  `id_layanan` int(11) DEFAULT NULL,
  `biaya_perjalanan` float NOT NULL,
  `sub_total_harga` float NOT NULL,
  `diskon` float NOT NULL,
  `total_harga` float NOT NULL,
  `bagi_hasil_mitra` float NOT NULL,
  `penghasilan_bersih` float NOT NULL,
  `id_status_transaksi` char(2) DEFAULT NULL,
  `id_pengguna_pemesan` int(11) DEFAULT NULL,
  `id_pengguna_mitra` int(11) DEFAULT NULL,
  `id_promo` int(11) DEFAULT NULL,
  `id_metode_pembayaran` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `waktu_pemesanan`, `waktu_selesai`, `jarak`, `id_layanan`, `biaya_perjalanan`, `sub_total_harga`, `diskon`, `total_harga`, `bagi_hasil_mitra`, `penghasilan_bersih`, `id_status_transaksi`, `id_pengguna_pemesan`, `id_pengguna_mitra`, `id_promo`, `id_metode_pembayaran`) VALUES
('KUR2306140001', '2023-06-14 09:08:18', '2023-06-14 09:08:18', 5, 3, 35000, 35000, 0, 35000, 28000, 7000, '10', 9, NULL, NULL, '02'),
('KUR2306140002', '2023-06-14 09:08:47', '2023-06-14 09:08:47', 5, 3, 35000, 35000, 0, 35000, 28000, 7000, '10', 9, NULL, NULL, '02'),
('KUR2306140003', '2023-06-14 09:37:23', '2023-06-14 09:37:23', 3, 3, 14000, 14000, 0, 14000, 11200, 2800, '10', 2, NULL, NULL, '02'),
('KUR2306140004', '2023-06-14 09:38:02', '2023-06-14 09:38:02', 3, 3, 14000, 14000, 0, 14000, 11200, 2800, '25', 2, 44, NULL, '01'),
('KUR2306140008', '2023-06-14 10:27:02', '2023-06-14 10:27:02', 0, 3, 12000, 12000, 0, 12000, 9600, 2400, '21', 45, NULL, NULL, '02'),
('KUR2306140009', '2023-06-14 10:39:50', '2023-06-14 10:39:50', 5, 3, 28000, 28000, 0, 28000, 22400, 5600, '25', 45, 44, NULL, '02'),
('KUR2306140018', '2023-06-14 13:25:52', '2023-06-14 13:25:52', 0, 3, 12000, 12000, 0, 12000, 9600, 2400, '21', 28, NULL, NULL, '02'),
('KUR2306140019', '2023-06-14 13:45:21', '2023-06-14 13:45:21', 3, 3, 12000, 12000, 0, 12000, 9600, 2400, '25', 2, 47, NULL, '02'),
('KUR2306140020', '2023-06-21 15:08:30', '2023-06-21 15:08:30', 2, 3, 12000, 12000, 0, 12000, 9600, 2400, '00', 2, NULL, NULL, '02'),
('KUR2306220004', '2023-06-22 13:16:22', '2023-06-22 13:16:22', 3, 3, 30000, 30000, 0, 30000, 24000, 6000, '25', 45, 47, NULL, '02'),
('MAM2306130001', '2023-06-13 17:16:10', '2023-06-13 17:16:10', 0, 4, 71000, 1500, 0, 72500, 56800, 15700, '25', 45, 44, NULL, '01'),
('MAM2306140002', '2023-06-14 09:14:45', '2023-06-14 09:14:45', 0, 4, 66000, 24000, 0, 90000, 52800, 37200, '25', 2, 44, NULL, '01'),
('MAM2306140007', '2023-06-14 09:59:35', '2023-06-14 09:59:35', 0, 4, 68000, 48000, 0, 116000, 54400, 61600, '25', 9, 42, NULL, '02'),
('MAM2306140012', '2023-06-14 11:55:33', '2023-06-14 11:55:33', 0, 4, 79000, 24000, 0, 103000, 63200, 39800, '21', 28, NULL, NULL, '02'),
('MAM2306220005', '2023-06-22 13:24:10', '2023-06-22 13:24:10', 0, 4, 88000, 1500, 0, 89500, 70400, 19100, '10', 45, NULL, NULL, '02'),
('MOB2306140005', '2023-06-14 09:56:24', '2023-06-14 09:56:24', 3, 2, 10000, 10000, 0, 10000, 8000, 2000, '10', 9, NULL, NULL, '02'),
('MOB2306140014', '2023-06-14 12:16:46', '2023-06-14 12:16:46', 1, 2, 10000, 10000, 0, 10000, 8000, 2000, '21', 28, NULL, NULL, '02'),
('MOB2306140015', '2023-06-14 12:19:24', '2023-06-14 12:19:24', 1, 2, 10000, 10000, 0, 10000, 8000, 2000, '21', 28, NULL, NULL, '02'),
('MOB2306140016', '2023-06-14 12:20:52', '2023-06-14 12:20:52', 0, 2, 10000, 10000, 0, 10000, 8000, 2000, '21', 28, NULL, NULL, '02'),
('MOB2306140017', '2023-06-14 12:22:20', '2023-06-14 12:22:20', 22, 2, 0, 0, 0, 0, 0, 0, '21', 28, NULL, NULL, '02'),
('MOB2306210002', '2023-06-21 12:48:29', '2023-06-21 12:48:29', 15, 2, 38000, 38000, 0, 38000, 30400, 7600, '25', 45, 4, NULL, '02'),
('MOB2306210023', '2023-06-21 15:10:10', '2023-06-21 15:10:10', 2, 2, 12000, 12000, 0, 12000, 9600, 2400, '25', 2, 42, NULL, '01'),
('MOB2306210027', '2023-06-21 17:17:11', '2023-06-21 17:17:11', 1, 2, 10000, 10000, 0, 10000, 8000, 2000, '11', 45, 4, NULL, '02'),
('MOB2306220006', '2023-06-22 15:14:16', '2023-06-22 15:14:16', 2, 2, 11000, 11000, 0, 11000, 8800, 2200, '21', 28, NULL, NULL, '02'),
('MOB2306220007', '2023-06-22 14:07:20', '2023-06-22 14:07:20', 2, 2, 11000, 11000, 0, 11000, 8800, 2200, '21', 28, NULL, NULL, '02'),
('MOB2306220008', '2023-06-22 14:17:39', '2023-06-22 14:17:39', 15, 2, 37000, 37000, 0, 37000, 29600, 7400, '25', 28, 4, NULL, '02'),
('MOB2306220012', '2023-06-22 19:17:19', '2023-06-22 19:17:19', 4, 2, 16000, 16000, 0, 16000, 12800, 3200, '21', 45, NULL, NULL, '02'),
('MOB2306220013', '2023-06-22 19:19:20', '2023-06-22 19:19:20', 4, 2, 15000, 15000, 0, 15000, 12000, 3000, '11', 45, 4, NULL, '02'),
('MOB2306240007', '2023-06-24 10:28:17', '2023-06-24 10:28:17', 3, 2, 14000, 14000, 0, 14000, 11200, 2800, '10', 45, NULL, NULL, '02'),
('MOT2306140006', '2023-06-14 09:57:23', '2023-06-14 09:57:23', 4, 1, 8000, 8000, 0, 8000, 6400, 1600, '25', 9, 42, NULL, '02'),
('MOT2306140010', '2023-06-14 11:19:54', '2023-06-14 11:19:54', 1, 1, 7000, 7000, 0, 7000, 5600, 1400, '21', 28, NULL, NULL, '02'),
('MOT2306140011', '2023-06-14 11:54:53', '2023-06-14 11:54:53', 1, 1, 7000, 7000, 0, 7000, 5600, 1400, '21', 28, NULL, NULL, '01'),
('MOT2306140013', '2023-06-14 12:16:17', '2023-06-14 12:16:17', 0, 1, 7000, 7000, 0, 7000, 5600, 1400, '21', 28, NULL, NULL, '02'),
('MOT2306140021', '2023-06-14 18:08:35', '2023-06-14 18:08:35', 2, 1, 7000, 7000, 0, 7000, 5600, 1400, '25', 2, 44, NULL, '01'),
('MOT2306150001', '2023-06-15 10:27:25', '2023-06-15 10:27:25', 1, 1, 7000, 7000, 0, 7000, 5600, 1400, '25', 2, 44, NULL, '02'),
('MOT2306210001', '2023-06-21 10:49:15', '2023-06-21 10:49:15', 1, 1, 7000, 7000, 0, 7000, 5600, 1400, '25', 28, 47, NULL, '02'),
('MOT2306210002', '2023-06-21 14:48:53', '2023-06-21 14:48:53', 3, 1, 19000, 19000, 0, 19000, 15200, 3800, '25', 45, 44, NULL, '02'),
('MOT2306210003', '2023-06-22 14:54:41', '2023-06-22 14:54:41', 2, 1, 15000, 15000, 0, 15000, 12000, 3000, '25', 9, 42, NULL, '02'),
('MOT2306210021', '2023-06-21 15:08:53', '2023-06-21 15:08:53', 2, 1, 14000, 14000, 0, 14000, 11200, 2800, '11', 2, 44, NULL, '01'),
('MOT2306210022', '2023-06-23 16:32:04', '2023-06-23 16:32:04', 3, 1, 15000, 15000, 0, 15000, 12000, 3000, '21', 2, NULL, NULL, '02'),
('MOT2306210024', '2023-06-21 16:48:37', '2023-06-21 16:48:37', 0, 1, 5000, 5000, 0, 5000, 4000, 1000, '21', 28, NULL, NULL, '02'),
('MOT2306210025', '2023-06-21 16:49:06', '2023-06-21 16:49:06', 0, 1, 5000, 5000, 0, 5000, 4000, 1000, '21', 28, NULL, NULL, '02'),
('MOT2306210026', '2023-06-21 17:45:24', '2023-06-21 17:45:24', 3, 1, 16000, 16000, 0, 16000, 12800, 3200, '25', 45, 47, NULL, '02'),
('MOT2306210027', '2023-06-21 17:48:36', '2023-06-21 17:48:36', 2, 1, 13000, 13000, 0, 13000, 10400, 2600, '21', 45, NULL, NULL, '01'),
('MOT2306220001', '2023-06-22 09:49:33', '2023-06-22 09:49:33', 2, 1, 11000, 11000, 0, 11000, 8800, 2200, '11', 45, 47, NULL, '02'),
('MOT2306220002', '2023-06-22 11:56:00', '2023-06-22 11:56:00', 10, 1, 28000, 28000, 0, 28000, 22400, 5600, '25', 34, 51, NULL, '02'),
('MOT2306220003', '2023-06-22 12:32:43', '2023-06-22 12:32:43', 4, 1, 11000, 11000, 0, 11000, 8800, 2200, '25', 45, 51, NULL, '02'),
('MOT2306220004', '2023-06-22 15:00:58', '2023-06-22 15:00:58', 2, 1, 15000, 15000, 0, 15000, 12000, 3000, '21', 45, 42, NULL, '02'),
('MOT2306220005', '2023-06-22 15:04:50', '2023-06-22 15:04:50', 0, 1, 5000, 5000, 0, 5000, 4000, 1000, '25', 9, 42, NULL, '02'),
('MOT2306220006', '2023-06-22 14:06:35', '2023-06-22 14:06:35', 2, 1, 10000, 10000, 0, 10000, 8000, 2000, '21', 28, NULL, NULL, '02'),
('MOT2306220007', '2023-06-22 15:26:53', '2023-06-22 15:26:53', 0, 1, 5000, 5000, 0, 5000, 4000, 1000, '10', 9, NULL, NULL, '02'),
('MOT2306220008', '2023-06-22 15:29:52', '2023-06-22 15:29:52', 0, 1, 5000, 5000, 0, 5000, 4000, 1000, '10', 9, NULL, NULL, '02'),
('MOT2306220009', '2023-06-22 16:06:43', '2023-06-22 16:06:43', 2, 1, 13000, 13000, 0, 13000, 10400, 2600, '25', 28, 47, NULL, '02'),
('MOT2306220010', '2023-06-22 18:43:27', '2023-06-22 18:43:27', 1, 1, 6000, 6000, 0, 6000, 4800, 1200, '25', 28, 47, NULL, '02'),
('MOT2306220011', '2023-06-22 19:10:03', '2023-06-22 19:10:03', 1, 1, 7000, 7000, 0, 7000, 5600, 1400, '25', 28, 47, NULL, '02'),
('MOT2306220014', '2023-06-22 19:28:06', '2023-06-22 19:28:06', 4, 1, 23000, 23000, 0, 23000, 18400, 4600, '25', 45, 4, NULL, '02'),
('MOT2306230001', '2023-06-23 11:01:38', '2023-06-23 11:01:38', 1, 1, 7000, 7000, 0, 7000, 5600, 1400, '25', 28, 4, NULL, '02'),
('MOT2306230002', '2023-06-23 13:06:42', '2023-06-23 13:06:42', 4, 1, 28000, 28000, 0, 28000, 22400, 5600, '25', 28, 4, NULL, '02'),
('MOT2306230003', '2023-06-23 13:14:47', '2023-06-23 13:14:47', 1, 1, 6000, 6000, 0, 6000, 4800, 1200, '25', 28, 4, NULL, '01'),
('MOT2306230004', '2023-06-23 15:52:17', '2023-06-23 15:52:17', 3, 1, 10000, 10000, 0, 10000, 8000, 2000, '25', 34, 51, NULL, '01'),
('MOT2306230023', '2023-06-23 18:35:55', '2023-06-23 18:35:55', 5, 1, 31000, 31000, 0, 31000, 24800, 6200, '21', 28, NULL, NULL, '02'),
('MOT2306230024', '2023-06-23 17:25:51', '2023-06-23 17:25:51', 0, 1, 5000, 5000, 0, 5000, 4000, 1000, '25', 2, 47, NULL, '01'),
('MOT2306240001', '2023-06-24 09:08:20', '2023-06-24 09:08:20', 1, 1, 5000, 5000, 0, 5000, 4000, 1000, '10', 2, NULL, NULL, '01'),
('MOT2306240002', '2023-06-24 09:26:21', '2023-06-24 09:26:21', 5, 1, 30000, 30000, 0, 30000, 24000, 6000, '25', 45, 4, NULL, '02'),
('MOT2306240003', '2023-06-24 09:28:02', '2023-06-24 09:28:02', 4, 1, 25000, 25000, 0, 25000, 20000, 5000, '21', 45, NULL, NULL, '02'),
('MOT2306240004', '2023-06-24 09:30:01', '2023-06-24 09:30:01', 6, 1, 42000, 42000, 0, 42000, 33600, 8400, '25', 45, 4, NULL, '02'),
('MOT2306240005', '2023-06-24 10:18:12', '2023-06-24 10:18:12', 2, 1, 9000, 9000, 0, 9000, 7200, 1800, '10', 45, NULL, NULL, '02'),
('MOT2306240006', '2023-06-24 10:28:13', '2023-06-24 10:28:13', 0, 1, 0, 0, 0, 0, 0, 0, '00', 45, NULL, NULL, '02'),
('MOT2306240008', '2023-06-24 10:41:19', '2023-06-24 10:41:19', 7, 1, 46000, 46000, 0, 46000, 36800, 9200, '25', 28, 47, NULL, '02');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_restoran`
--

CREATE TABLE `transaksi_restoran` (
  `id_transaksi_restoran` int(11) NOT NULL,
  `id_transaksi` varchar(13) NOT NULL,
  `id_restoran` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_restoran`
--

INSERT INTO `transaksi_restoran` (`id_transaksi_restoran`, `id_transaksi`, `id_restoran`) VALUES
(27, 'MAM2306130001', 1),
(28, 'MAM2306140002', 1),
(29, 'MAM2306140007', 1),
(30, 'MAM2306140012', 1),
(32, 'MAM2306220005', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `id_ulasan` int(11) NOT NULL,
  `id_transaksi` varchar(13) NOT NULL,
  `nilai_bintang` tinyint(1) NOT NULL,
  `judul_ulasan` varchar(150) NOT NULL,
  `ulasan` text NOT NULL,
  `waktu_ulasan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ulasan`
--

INSERT INTO `ulasan` (`id_ulasan`, `id_transaksi`, `nilai_bintang`, `judul_ulasan`, `ulasan`, `waktu_ulasan`) VALUES
(12, 'MAM2306140002', 5, 'sangat cepat', '-', '2023-06-15 10:20:16'),
(13, 'MOT2306140021', 5, 'seperti biasa Langganan driver gwejh', '-', '2023-06-15 10:22:06'),
(14, 'MOT2306210001', 2, 'Hmmm', 'Testing', '2023-06-21 11:08:23'),
(15, 'MOT2306210026', 5, 'oy', '-', '2023-06-21 17:47:57'),
(16, 'MOT2306220002', 5, 'oke', '-', '2023-06-23 15:42:24'),
(17, 'MOT2306230004', 5, 'good', '-', '2023-06-23 15:54:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun_pengembang`
--
ALTER TABLE `akun_pengembang`
  ADD PRIMARY KEY (`id_akun_pengembang`);

--
-- Indexes for table `alamat_awal`
--
ALTER TABLE `alamat_awal`
  ADD PRIMARY KEY (`id_alamat_awal`),
  ADD KEY `fk_transaksi_alamat_awal` (`id_transaksi`);

--
-- Indexes for table `alamat_pengguna`
--
ALTER TABLE `alamat_pengguna`
  ADD PRIMARY KEY (`id_alamat_pengguna`),
  ADD KEY `fk_alamat_pengguna_pengguna` (`id_pengguna`);

--
-- Indexes for table `alamat_tujuan`
--
ALTER TABLE `alamat_tujuan`
  ADD PRIMARY KEY (`id_alamat_tujuan`),
  ADD KEY `fk_alamat_tujuan_transaksi` (`id_transaksi`);

--
-- Indexes for table `aplikasi`
--
ALTER TABLE `aplikasi`
  ADD PRIMARY KEY (`id_aplikasi`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id_banner`),
  ADD KEY `fk_banner_pengguna` (`id_pengguna`),
  ADD KEY `fk_banner_posisi_banner` (`id_posisi_banner`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `info_mitra`
--
ALTER TABLE `info_mitra`
  ADD PRIMARY KEY (`id_info_mitra`),
  ADD KEY `fk_id_jenis_kendaraan` (`id_jenis_kendaraan`),
  ADD KEY `fk_id_pengguna` (`id_pengguna`),
  ADD KEY `fk_id_kecamatan` (`id_kecamatan`),
  ADD KEY `fk_info_mitra_status` (`id_status_mitra`),
  ADD KEY `fk_info_mitra_kota_layanan` (`id_kota_layanan`);

--
-- Indexes for table `jalur_pendaftaran`
--
ALTER TABLE `jalur_pendaftaran`
  ADD PRIMARY KEY (`id_jalur_pendaftaran`);

--
-- Indexes for table `jam_operasional`
--
ALTER TABLE `jam_operasional`
  ADD PRIMARY KEY (`id_jam_operasional`),
  ADD KEY `fk_jam_operasional_restoran` (`id_restoran`);

--
-- Indexes for table `jarak_tarif`
--
ALTER TABLE `jarak_tarif`
  ADD PRIMARY KEY (`id_jarak_tarif`);

--
-- Indexes for table `jenis_kendaraan`
--
ALTER TABLE `jenis_kendaraan`
  ADD PRIMARY KEY (`id_jenis_kendaraan`);

--
-- Indexes for table `jenis_pengguna`
--
ALTER TABLE `jenis_pengguna`
  ADD PRIMARY KEY (`id_jenis_pengguna`);

--
-- Indexes for table `jenis_promo`
--
ALTER TABLE `jenis_promo`
  ADD PRIMARY KEY (`id_jenis_promo`);

--
-- Indexes for table `jenis_tarif`
--
ALTER TABLE `jenis_tarif`
  ADD PRIMARY KEY (`id_jenis_tarif`);

--
-- Indexes for table `kategori_menu`
--
ALTER TABLE `kategori_menu`
  ADD PRIMARY KEY (`id_kategori_menu`),
  ADD KEY `fk_kategori_menu_restoran` (`id_restoran`);

--
-- Indexes for table `kategori_restoran`
--
ALTER TABLE `kategori_restoran`
  ADD PRIMARY KEY (`id_kategori_restoran`);

--
-- Indexes for table `kategori_restoran_restoran`
--
ALTER TABLE `kategori_restoran_restoran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kategori_kategori` (`id_kategori_restoran`),
  ADD KEY `fk_kategori_restoran` (`id_restoran`);

--
-- Indexes for table `kategori_status_transaksi`
--
ALTER TABLE `kategori_status_transaksi`
  ADD PRIMARY KEY (`id_kategori_status_transaksi`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`),
  ADD KEY `fk_id_kota` (`id_kota`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`),
  ADD KEY `fk_kota_provinsi` (`id_provinsi`);

--
-- Indexes for table `kota_layanan`
--
ALTER TABLE `kota_layanan`
  ADD PRIMARY KEY (`id_kota_layanan`),
  ADD KEY `fk_kota_layanan_kota` (`id_kota`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `fk_menu_restoran` (`id_restoran`),
  ADD KEY `fk_menu_kategori_menu` (`id_kategori_menu`);

--
-- Indexes for table `metode_pembayaran`
--
ALTER TABLE `metode_pembayaran`
  ADD PRIMARY KEY (`id_metode_pembayaran`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `penarikan`
--
ALTER TABLE `penarikan`
  ADD PRIMARY KEY (`id_penarikan`),
  ADD KEY `fk_penarikan_pengguna` (`id_pengguna`),
  ADD KEY `fk_penarikan_pengguna_verifikator` (`id_pengguna_verifikator`),
  ADD KEY `fk_penarikan_status_transaksi` (`id_status_transaksi`),
  ADD KEY `fk_penarikan_rekening_bank_pengguna` (`id_rekening_bank_pengguna`);

--
-- Indexes for table `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`kode_pengaturan`);

--
-- Indexes for table `pengelola_kota`
--
ALTER TABLE `pengelola_kota`
  ADD PRIMARY KEY (`id_pengelola_kota`),
  ADD KEY `fk_pengelola_kota_kota` (`id_kota`),
  ADD KEY `fk_pengelola_kota_pengguna` (`id_pengguna`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD KEY `fk_pengguna_jalur_pendaftaran` (`id_jalur_pendaftaran`),
  ADD KEY `fk_pengguna_jenis_pengguna` (`id_jenis_pengguna`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posisi_banner`
--
ALTER TABLE `posisi_banner`
  ADD PRIMARY KEY (`id_posisi_banner`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`id_promo`),
  ADD KEY `fk_promo_jenis_promo` (`id_jenis_promo`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- Indexes for table `rekening_bank`
--
ALTER TABLE `rekening_bank`
  ADD PRIMARY KEY (`id_rekening_bank`),
  ADD KEY `fk_rekening_bank_bank` (`id_bank`);

--
-- Indexes for table `rekening_bank_pengguna`
--
ALTER TABLE `rekening_bank_pengguna`
  ADD PRIMARY KEY (`id_rekening_bank_pengguna`),
  ADD KEY `fk_rekening_bank_pengguna_pengguna` (`id_pengguna`),
  ADD KEY `fk_rekening_bank_pengguna_bank` (`id_bank`);

--
-- Indexes for table `restoran`
--
ALTER TABLE `restoran`
  ADD PRIMARY KEY (`id_restoran`),
  ADD KEY `fk_restoran_status_restoran` (`id_status_restoran`),
  ADD KEY `fk_restoran_pengguna` (`id_pengguna_pemilik`),
  ADD KEY `fk_restoran_kota_layanan` (`id_kota_layanan`);

--
-- Indexes for table `rincian_menu`
--
ALTER TABLE `rincian_menu`
  ADD PRIMARY KEY (`id_rincian_menu`),
  ADD KEY `fk_rincian_menu_menu` (`id_menu`),
  ADD KEY `fk_rincian_menu_transaksi` (`id_transaksi`);

--
-- Indexes for table `riwayat_saldo`
--
ALTER TABLE `riwayat_saldo`
  ADD PRIMARY KEY (`id_riwayat_saldo`),
  ADD KEY `fk_riwayat_saldo_pelaku` (`id_pengguna_pelaku`),
  ADD KEY `fk_riwayat_saldo_saldo` (`id_saldo`),
  ADD KEY `fk_riwayat_saldo_layanan` (`id_layanan`);

--
-- Indexes for table `riwayat_topup_saldo`
--
ALTER TABLE `riwayat_topup_saldo`
  ADD PRIMARY KEY (`id_riwayat_topup_saldo`),
  ADD KEY `fk_riwayat_topup_saldo_topup_saldo` (`id_topup_saldo`),
  ADD KEY `fk_riwayat_topup_saldo_status_transaksi` (`id_status_transaksi`),
  ADD KEY `fk_riwayat_topu_saldo_pengguna` (`id_pengguna_pengubah`);

--
-- Indexes for table `riwayat_transaksi`
--
ALTER TABLE `riwayat_transaksi`
  ADD PRIMARY KEY (`id_riwayat_transaksi`),
  ADD KEY `fk_riwayat_transaksi_transaksi` (`id_transaksi`),
  ADD KEY `fk_riwayat_transaksi_status` (`id_status_transaksi`);

--
-- Indexes for table `saldo`
--
ALTER TABLE `saldo`
  ADD PRIMARY KEY (`id_saldo`),
  ADD KEY `fk_saldo_pengguna` (`id_pengguna`);

--
-- Indexes for table `status_jenis_tarif`
--
ALTER TABLE `status_jenis_tarif`
  ADD PRIMARY KEY (`id_status_jenis_tarif`),
  ADD KEY `fk_status_jenis_tarif_kota_layanan` (`id_kota_layanan`),
  ADD KEY `fk_status_jenis_tarif_jenis_tarif` (`id_jenis_tarif`);

--
-- Indexes for table `status_mitra`
--
ALTER TABLE `status_mitra`
  ADD PRIMARY KEY (`id_status_mitra`);

--
-- Indexes for table `status_resto`
--
ALTER TABLE `status_resto`
  ADD PRIMARY KEY (`id_status_resto`);

--
-- Indexes for table `status_transaksi`
--
ALTER TABLE `status_transaksi`
  ADD PRIMARY KEY (`id_status_transaksi`),
  ADD KEY `fk_status_transaksi_kategori` (`id_kategori_status_transaksi`);

--
-- Indexes for table `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`id_tarif`),
  ADD KEY `fk_tarif_jenis_tarif` (`id_jenis_tarif`),
  ADD KEY `fk_tarif_layanan` (`id_layanan`),
  ADD KEY `fk_tarif_kota` (`id_kota`),
  ADD KEY `fk_tarif_jarak_tarif` (`id_jarak_tarif`);

--
-- Indexes for table `topup_saldo`
--
ALTER TABLE `topup_saldo`
  ADD PRIMARY KEY (`id_topup_saldo`),
  ADD KEY `fk_topu_saldo_pengguna_admin` (`id_pengguna`),
  ADD KEY `fk_topup_saldo_status` (`id_status_transaksi`),
  ADD KEY `fk_topup_saldo_rekening_bank` (`id_rekening_bank`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `fk_transaksi_layanan` (`id_layanan`),
  ADD KEY `fk_transaksi_status` (`id_status_transaksi`),
  ADD KEY `fk_transaksi_pemesan` (`id_pengguna_pemesan`),
  ADD KEY `fk_transaksi_mitra` (`id_pengguna_mitra`),
  ADD KEY `fk_transaksi_promo` (`id_promo`),
  ADD KEY `id_metode_pembayaran` (`id_metode_pembayaran`) USING BTREE;

--
-- Indexes for table `transaksi_restoran`
--
ALTER TABLE `transaksi_restoran`
  ADD PRIMARY KEY (`id_transaksi_restoran`),
  ADD KEY `fk_transaksi_restoran_transaksi` (`id_transaksi`),
  ADD KEY `fk_transaksi_restoran_restoran` (`id_restoran`);

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id_ulasan`),
  ADD KEY `fk_ulasan_transaksi` (`id_transaksi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun_pengembang`
--
ALTER TABLE `akun_pengembang`
  MODIFY `id_akun_pengembang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `alamat_awal`
--
ALTER TABLE `alamat_awal`
  MODIFY `id_alamat_awal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `alamat_pengguna`
--
ALTER TABLE `alamat_pengguna`
  MODIFY `id_alamat_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `alamat_tujuan`
--
ALTER TABLE `alamat_tujuan`
  MODIFY `id_alamat_tujuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id_banner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `info_mitra`
--
ALTER TABLE `info_mitra`
  MODIFY `id_info_mitra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jam_operasional`
--
ALTER TABLE `jam_operasional`
  MODIFY `id_jam_operasional` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jarak_tarif`
--
ALTER TABLE `jarak_tarif`
  MODIFY `id_jarak_tarif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jenis_kendaraan`
--
ALTER TABLE `jenis_kendaraan`
  MODIFY `id_jenis_kendaraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jenis_tarif`
--
ALTER TABLE `jenis_tarif`
  MODIFY `id_jenis_tarif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori_menu`
--
ALTER TABLE `kategori_menu`
  MODIFY `id_kategori_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kategori_restoran`
--
ALTER TABLE `kategori_restoran`
  MODIFY `id_kategori_restoran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kategori_restoran_restoran`
--
ALTER TABLE `kategori_restoran_restoran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id_kota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kota_layanan`
--
ALTER TABLE `kota_layanan`
  MODIFY `id_kota_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `penarikan`
--
ALTER TABLE `penarikan`
  MODIFY `id_penarikan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengelola_kota`
--
ALTER TABLE `pengelola_kota`
  MODIFY `id_pengelola_kota` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=403;

--
-- AUTO_INCREMENT for table `promo`
--
ALTER TABLE `promo`
  MODIFY `id_promo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `id_provinsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rekening_bank`
--
ALTER TABLE `rekening_bank`
  MODIFY `id_rekening_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rekening_bank_pengguna`
--
ALTER TABLE `rekening_bank_pengguna`
  MODIFY `id_rekening_bank_pengguna` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `restoran`
--
ALTER TABLE `restoran`
  MODIFY `id_restoran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rincian_menu`
--
ALTER TABLE `rincian_menu`
  MODIFY `id_rincian_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `riwayat_saldo`
--
ALTER TABLE `riwayat_saldo`
  MODIFY `id_riwayat_saldo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `riwayat_topup_saldo`
--
ALTER TABLE `riwayat_topup_saldo`
  MODIFY `id_riwayat_topup_saldo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `riwayat_transaksi`
--
ALTER TABLE `riwayat_transaksi`
  MODIFY `id_riwayat_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `saldo`
--
ALTER TABLE `saldo`
  MODIFY `id_saldo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `status_jenis_tarif`
--
ALTER TABLE `status_jenis_tarif`
  MODIFY `id_status_jenis_tarif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tarif`
--
ALTER TABLE `tarif`
  MODIFY `id_tarif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `transaksi_restoran`
--
ALTER TABLE `transaksi_restoran`
  MODIFY `id_transaksi_restoran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id_ulasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alamat_awal`
--
ALTER TABLE `alamat_awal`
  ADD CONSTRAINT `fk_transaksi_alamat_awal` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `alamat_pengguna`
--
ALTER TABLE `alamat_pengguna`
  ADD CONSTRAINT `fk_alamat_pengguna_pengguna` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `alamat_tujuan`
--
ALTER TABLE `alamat_tujuan`
  ADD CONSTRAINT `fk_alamat_tujuan_transaksi` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `banner`
--
ALTER TABLE `banner`
  ADD CONSTRAINT `fk_banner_pengguna` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_banner_posisi_banner` FOREIGN KEY (`id_posisi_banner`) REFERENCES `posisi_banner` (`id_posisi_banner`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `info_mitra`
--
ALTER TABLE `info_mitra`
  ADD CONSTRAINT `fk_id_jenis_kendaraan` FOREIGN KEY (`id_jenis_kendaraan`) REFERENCES `jenis_kendaraan` (`id_jenis_kendaraan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_kecamatan` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_pengguna` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_info_mitra_kota_layanan` FOREIGN KEY (`id_kota_layanan`) REFERENCES `kota_layanan` (`id_kota_layanan`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_info_mitra_status` FOREIGN KEY (`id_status_mitra`) REFERENCES `status_mitra` (`id_status_mitra`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `jam_operasional`
--
ALTER TABLE `jam_operasional`
  ADD CONSTRAINT `fk_jam_operasional_restoran` FOREIGN KEY (`id_restoran`) REFERENCES `restoran` (`id_restoran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kategori_menu`
--
ALTER TABLE `kategori_menu`
  ADD CONSTRAINT `fk_kategori_menu_restoran` FOREIGN KEY (`id_restoran`) REFERENCES `restoran` (`id_restoran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kategori_restoran_restoran`
--
ALTER TABLE `kategori_restoran_restoran`
  ADD CONSTRAINT `fk_kategori_kategori` FOREIGN KEY (`id_kategori_restoran`) REFERENCES `kategori_restoran` (`id_kategori_restoran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kategori_restoran` FOREIGN KEY (`id_restoran`) REFERENCES `restoran` (`id_restoran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD CONSTRAINT `fk_id_kota` FOREIGN KEY (`id_kota`) REFERENCES `kota` (`id_kota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kota`
--
ALTER TABLE `kota`
  ADD CONSTRAINT `fk_kota_provinsi` FOREIGN KEY (`id_provinsi`) REFERENCES `provinsi` (`id_provinsi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kota_layanan`
--
ALTER TABLE `kota_layanan`
  ADD CONSTRAINT `fk_kota_layanan_kota` FOREIGN KEY (`id_kota`) REFERENCES `kota` (`id_kota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `fk_menu_kategori_menu` FOREIGN KEY (`id_kategori_menu`) REFERENCES `kategori_menu` (`id_kategori_menu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_menu_restoran` FOREIGN KEY (`id_restoran`) REFERENCES `restoran` (`id_restoran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penarikan`
--
ALTER TABLE `penarikan`
  ADD CONSTRAINT `fk_penarikan_pengguna` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_penarikan_pengguna_verifikator` FOREIGN KEY (`id_pengguna_verifikator`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_penarikan_rekening_bank_pengguna` FOREIGN KEY (`id_rekening_bank_pengguna`) REFERENCES `rekening_bank_pengguna` (`id_rekening_bank_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_penarikan_status_transaksi` FOREIGN KEY (`id_status_transaksi`) REFERENCES `status_transaksi` (`id_status_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengelola_kota`
--
ALTER TABLE `pengelola_kota`
  ADD CONSTRAINT `fk_pengelola_kota_kota` FOREIGN KEY (`id_kota`) REFERENCES `kota` (`id_kota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pengelola_kota_pengguna` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `fk_pengguna_jalur_pendaftaran` FOREIGN KEY (`id_jalur_pendaftaran`) REFERENCES `jalur_pendaftaran` (`id_jalur_pendaftaran`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pengguna_jenis_pengguna` FOREIGN KEY (`id_jenis_pengguna`) REFERENCES `jenis_pengguna` (`id_jenis_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `promo`
--
ALTER TABLE `promo`
  ADD CONSTRAINT `fk_promo_jenis_promo` FOREIGN KEY (`id_jenis_promo`) REFERENCES `jenis_promo` (`id_jenis_promo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rekening_bank`
--
ALTER TABLE `rekening_bank`
  ADD CONSTRAINT `fk_rekening_bank_bank` FOREIGN KEY (`id_bank`) REFERENCES `bank` (`id_bank`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rekening_bank_pengguna`
--
ALTER TABLE `rekening_bank_pengguna`
  ADD CONSTRAINT `fk_rekening_bank_pengguna_bank` FOREIGN KEY (`id_bank`) REFERENCES `bank` (`id_bank`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rekening_bank_pengguna_pengguna` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `restoran`
--
ALTER TABLE `restoran`
  ADD CONSTRAINT `fk_restoran_kota_layanan` FOREIGN KEY (`id_kota_layanan`) REFERENCES `kota_layanan` (`id_kota_layanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_restoran_pengguna` FOREIGN KEY (`id_pengguna_pemilik`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_restoran_status_restoran` FOREIGN KEY (`id_status_restoran`) REFERENCES `status_resto` (`id_status_resto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rincian_menu`
--
ALTER TABLE `rincian_menu`
  ADD CONSTRAINT `fk_rincian_menu_menu` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rincian_menu_transaksi` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `riwayat_saldo`
--
ALTER TABLE `riwayat_saldo`
  ADD CONSTRAINT `fk_riwayat_saldo_layanan` FOREIGN KEY (`id_layanan`) REFERENCES `layanan` (`id_layanan`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_riwayat_saldo_pelaku` FOREIGN KEY (`id_pengguna_pelaku`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_riwayat_saldo_saldo` FOREIGN KEY (`id_saldo`) REFERENCES `saldo` (`id_saldo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `riwayat_topup_saldo`
--
ALTER TABLE `riwayat_topup_saldo`
  ADD CONSTRAINT `fk_riwayat_topup_saldo_pengguna` FOREIGN KEY (`id_pengguna_pengubah`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_riwayat_topup_saldo_status_transaksi` FOREIGN KEY (`id_status_transaksi`) REFERENCES `status_transaksi` (`id_status_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_riwayat_topup_saldo_topup` FOREIGN KEY (`id_topup_saldo`) REFERENCES `topup_saldo` (`id_topup_saldo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `riwayat_transaksi`
--
ALTER TABLE `riwayat_transaksi`
  ADD CONSTRAINT `fk_riwayat_transaksi_status` FOREIGN KEY (`id_status_transaksi`) REFERENCES `status_transaksi` (`id_status_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_riwayat_transaksi_transaksi` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `saldo`
--
ALTER TABLE `saldo`
  ADD CONSTRAINT `fk_saldo_pengguna` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `status_jenis_tarif`
--
ALTER TABLE `status_jenis_tarif`
  ADD CONSTRAINT `fk_status_jenis_tarif_jenis_tarif` FOREIGN KEY (`id_jenis_tarif`) REFERENCES `jenis_tarif` (`id_jenis_tarif`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_status_jenis_tarif_kota_layanan` FOREIGN KEY (`id_kota_layanan`) REFERENCES `kota_layanan` (`id_kota_layanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `status_transaksi`
--
ALTER TABLE `status_transaksi`
  ADD CONSTRAINT `fk_status_transaksi_kategori` FOREIGN KEY (`id_kategori_status_transaksi`) REFERENCES `kategori_status_transaksi` (`id_kategori_status_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tarif`
--
ALTER TABLE `tarif`
  ADD CONSTRAINT `fk_tarif_jarak_tarif` FOREIGN KEY (`id_jarak_tarif`) REFERENCES `jarak_tarif` (`id_jarak_tarif`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tarif_jenis_tarif` FOREIGN KEY (`id_jenis_tarif`) REFERENCES `jenis_tarif` (`id_jenis_tarif`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tarif_kota` FOREIGN KEY (`id_kota`) REFERENCES `kota` (`id_kota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tarif_layanan` FOREIGN KEY (`id_layanan`) REFERENCES `layanan` (`id_layanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `topup_saldo`
--
ALTER TABLE `topup_saldo`
  ADD CONSTRAINT `fk_topu_saldo_pengguna_admin` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_topup_saldo_pengguna` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_topup_saldo_rekening_bank` FOREIGN KEY (`id_rekening_bank`) REFERENCES `rekening_bank` (`id_rekening_bank`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_topup_saldo_status` FOREIGN KEY (`id_status_transaksi`) REFERENCES `status_transaksi` (`id_status_transaksi`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_metode_pembayaran` FOREIGN KEY (`id_metode_pembayaran`) REFERENCES `metode_pembayaran` (`id_metode_pembayaran`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transaksi_layanan` FOREIGN KEY (`id_layanan`) REFERENCES `layanan` (`id_layanan`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transaksi_mitra` FOREIGN KEY (`id_pengguna_mitra`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transaksi_pemesan` FOREIGN KEY (`id_pengguna_pemesan`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transaksi_promo` FOREIGN KEY (`id_promo`) REFERENCES `promo` (`id_promo`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transaksi_status` FOREIGN KEY (`id_status_transaksi`) REFERENCES `status_transaksi` (`id_status_transaksi`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `transaksi_restoran`
--
ALTER TABLE `transaksi_restoran`
  ADD CONSTRAINT `fk_transaksi_restoran_restoran` FOREIGN KEY (`id_restoran`) REFERENCES `restoran` (`id_restoran`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transaksi_restoran_transaksi` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD CONSTRAINT `fk_ulasan_transaksi` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
