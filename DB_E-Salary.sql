-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 11, 2017 at 11:05 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-salary`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `pegawai_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`pegawai_id`, `tanggal`, `jam`) VALUES
(2, '2017-01-03', '00:58:22'),
(2, '2017-11-02', '03:31:44'),
(2, '2017-11-04', '15:25:56'),
(2, '2017-11-05', '14:53:55'),
(2, '2017-11-07', '06:21:56'),
(2, '2017-11-08', '11:27:34'),
(2, '2017-11-09', '00:32:10'),
(2, '2017-11-10', '11:50:51'),
(2, '2017-11-15', '13:08:11'),
(2, '2017-11-21', '05:23:47'),
(2, '2017-12-04', '23:36:51'),
(2, '2017-12-05', '12:37:52'),
(2, '2017-12-10', '17:47:29'),
(2, '2017-12-11', '09:07:53'),
(5, '2017-11-02', '03:49:29'),
(5, '2017-11-04', '15:26:03'),
(5, '2017-11-07', '06:59:17'),
(10, '2017-11-04', '15:26:13'),
(10, '2017-11-07', '09:17:46'),
(10, '2017-11-09', '18:35:39'),
(16, '2017-11-07', '09:24:01'),
(16, '2017-11-10', '11:13:05'),
(16, '2017-12-05', '15:55:01'),
(16, '2017-12-09', '19:08:18'),
(18, '2017-11-07', '09:24:10'),
(21, '2017-11-15', '23:16:44'),
(28, '2017-11-23', '12:26:03');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `gaji` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `nama`, `gaji`) VALUES
(2, 'staff', 2000000),
(3, 'it security', 9000000);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `lahir` date NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jabatan` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama`, `lahir`, `no_telp`, `alamat`, `jabatan`, `email`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'coba aaa', '1997-02-03', '081611633050', 'DFhh Fhafkasd;f', 2, 'asf@aa.com', '2017-10-27 17:47:51', '2017-11-09 04:39:55', NULL),
(5, 'asdfa afasdf', '2017-11-30', '9303013819', 'adfa', 3, 'masdfkasjfs@adf.csq', '2017-11-01 09:33:26', '2017-11-06 16:16:41', NULL),
(10, 'coba asfe', '2000-11-30', '9303013819', 'adfa', 2, 'masdfkasjfs@adf.csq', '2017-11-01 09:50:19', '2017-11-08 01:57:03', NULL),
(16, 'viji vuji', '2017-11-05', '9382381128', 'Dafa asdfal', 2, 'masdfkasjfs@adf.csq', '2017-11-05 01:41:02', '2017-11-05 01:41:02', NULL),
(18, 'Ita tala', '2017-11-19', '9372378', 'kljoij sfkjijsfasf', 3, 'ita@tala.com', '2017-11-05 01:42:53', '2017-11-05 01:42:53', NULL),
(21, 'Hola ha', '2017-12-07', '920128319', 'Ffkjaf ae', 3, 'hola@hola.com', '2017-11-06 10:06:38', '2017-11-06 10:06:38', NULL),
(24, 'Testing ah', '2000-12-12', '039883821', 'Kidklajd', 3, 'testing@testing.com', '2017-11-06 10:12:41', '2017-11-06 10:12:41', NULL),
(26, 'Halo Bandung', '1999-11-07', '0928398842834', 'Dlkaif afjasfj', 2, 'gila@gila.com', '2017-11-06 19:27:41', '2017-11-06 19:28:25', NULL),
(28, 'Ei adka', '1997-11-09', '09371983781', 'Kida adskfja adsfio', 3, 'ei@adka.com', '2017-11-09 04:39:26', '2017-11-09 04:39:26', NULL),
(29, 'Moham Ali', '1997-12-04', '93283297313', 'Wadfa adsfijijdalkf', 2, 'moham@moham.com', '2017-12-04 09:42:06', '2017-12-04 09:42:06', NULL),
(31, 'DIadfakj asdfaje', '1997-05-14', '9283982382', 'Lid adsfii dasfklajad', 3, 'dsfja@uga.com', '2017-12-05 02:23:36', '2017-12-05 02:23:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
('admin', '$2y$10$L9uhdmoR71MqM1U9OjQDXO5q8Bz2Dik8RjET9D/RaxSeDb2maoXcO', 'Mr0UQHlwqggxnUhiRdCNpwTCzxkyl96ZJcY9VYLVgrCw95ja4MyY32ZDttMY', '2017-10-27 10:28:00', '2017-10-27 10:28:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`pegawai_id`,`tanggal`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jabatan` (`jabatan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_ibfk_1` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`jabatan`) REFERENCES `jabatan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
