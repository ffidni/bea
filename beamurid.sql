-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 27, 2024 at 08:11 AM
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
-- Database: `beamurid`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `avatar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_beasiswa`
--

CREATE TABLE `jenis_beasiswa` (
  `jenis_beasiswa_id` bigint UNSIGNED NOT NULL,
  `jenis_beasiswa` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `openAt` datetime NOT NULL,
  `endAt` timestamp NOT NULL,
  `deskripsi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_beasiswa`
--

INSERT INTO `jenis_beasiswa` (`jenis_beasiswa_id`, `jenis_beasiswa`, `keterangan`, `created_at`, `updated_at`, `openAt`, `endAt`, `deskripsi`) VALUES
(1, 'Beasiswa Jepang', 'Dapatkan beasiswa ke jepang di kota Tokyo dengan pilihan universitas bebas.', '2024-04-17 06:40:21', '2024-04-23 10:17:50', '2024-04-18 08:41:35', '2024-04-18 01:42:23', 'Dapatkan beasiswa ke jepang di kota Tokyo dengan pilihan universitas bebas.'),
(2, 'Beasiswa China', 'Dapatkan beasiswa di China di kota Beijing.', '2024-04-17 06:40:21', '2024-04-23 10:17:57', '2024-04-18 08:41:35', '2024-04-18 01:42:23', 'Dapatkan beasiswa di China di kota Beijing.'),
(3, 'Beasiswa Brazil', 'Beasiswa di kota Rio de Janeiro.', '2024-04-17 06:40:21', '2024-04-23 10:18:01', '2024-04-18 08:41:35', '2024-04-18 01:42:23', 'Beasiswa di kota Rio de Janeiro.'),
(4, 'Beasiswa KOMINFO', 'Dapatkan beasiswa dari KOMINFO untuk kamu yang ingin menggeluti bidang IT.', '2024-04-18 17:24:54', '2024-04-23 10:18:09', '2024-04-18 17:20:46', '2024-04-18 17:24:54', 'Dapatkan beasiswa dari KOMINFO untuk kamu yang ingin menggeluti bidang IT.'),
(5, 'Beasiswa UNSIL', 'Dapatkan kesempatan kuliah di UNSIL di prodi mana saja dengan waktu yang hanya terbatas!', '2024-04-18 17:24:54', '2024-04-23 10:18:07', '2024-04-18 17:20:46', '2024-04-18 17:24:54', 'Dapatkan kesempatan kuliah di UNSIL di prodi mana saja dengan waktu yang hanya terbatas!'),
(6, 'Beasiswa KEMENDIKBUD', 'Beasiswa tahunan yang diadakan oleh KEMENDIKBUD.', '2024-04-18 17:24:54', '2024-04-23 10:18:12', '2024-04-18 17:20:46', '2024-04-18 17:24:54', 'Beasiswa tahunan yang diadakan oleh KEMENDIKBUD.'),
(7, 'Beasiswa Korea', 'Dapatkan pengalaman terbang ke korea dan menggali ilmu di sana.', '2024-04-18 17:24:54', '2024-04-23 10:18:14', '2024-04-18 17:20:46', '2024-04-18 17:24:54', 'Dapatkan pengalaman terbang ke korea dan menggali ilmu di sana.'),
(8, 'Beasiswa ITB', 'ITB mengadakan program beasiswa terbatas pada tahun ini.', '2024-04-18 17:24:54', '2024-04-23 10:18:15', '2024-04-18 17:20:46', '2024-04-18 17:24:54', 'Dapatkan pengalaman terbang ke korea dan menggali ilmu di sana.'),
(9, 'Beasiswa BINUS', 'Selain mengadakan lomba dengan hadiah beasiswa, BINUS juga mengadakan pendaftaran beasiswa berdasarkan IPK.', '2024-04-18 17:24:54', '2024-04-23 10:18:17', '2024-04-18 17:20:46', '2024-04-18 17:24:54', 'Dapatkan pengalaman terbang ke korea dan menggali ilmu di sana.');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `mahasiswa_id` bigint UNSIGNED NOT NULL,
  `nim` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_mahasiswa` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('l','p') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `avatar` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`mahasiswa_id`, `nim`, `nama_mahasiswa`, `email`, `no_hp`, `jenis_kelamin`, `created_at`, `updated_at`, `avatar`) VALUES
(1, '12345678987', 'Muhammad Haikal', 'indiff@gmail.com', '085703325482', 'l', '2024-04-20 13:17:15', '2024-04-20 13:17:15', ''),
(2, '12345678454', 'Udin Sugeni', 'indiff2@gmail.com', '85703325481', 'p', '2024-04-23 08:57:03', '2024-04-23 08:57:03', ''),
(4, '456789112', 'Muhammad Haikal', 'indiff4@gmail.com', '85421231454', 'l', '2024-04-24 19:14:22', '2024-04-24 19:14:22', 'avatar/avatar_6629bc7e911e8.jpg'),
(7, '123132564', 'HAHAHA', 'mhs22@gmail.com', '021231564', 'l', '2024-04-26 18:43:49', '2024-04-26 18:57:15', 'avatar/avatar_662c585503530.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(40, '2024_04_17_032048_create_mahasiswa_table', 1),
(41, '2024_04_17_032058_create_transkip_nilai_table', 1),
(74, '2014_10_12_000000_create_users_table', 2),
(75, '2014_10_12_100000_create_password_reset_tokens_table', 2),
(76, '2019_08_19_000000_create_failed_jobs_table', 2),
(77, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(78, '2024_04_17_001_032048_create_mahasiswa_table', 2),
(79, '2024_04_17_002_032058_create_transkip_nilai_table', 2),
(80, '2024_04_17_003_054335_create_jenis_beasiswa_table', 2),
(81, '2024_04_17_004_054005_create_pendaftaran_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `pendaftaran_id` bigint UNSIGNED NOT NULL,
  `mahasiswa_id` bigint UNSIGNED NOT NULL,
  `jenis_beasiswa_id` bigint UNSIGNED NOT NULL,
  `semester` int NOT NULL,
  `ipk` double(8,2) NOT NULL,
  `berkas` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_ajuan` enum('verifing','verified','denied') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `photo` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`pendaftaran_id`, `mahasiswa_id`, `jenis_beasiswa_id`, `semester`, `ipk`, `berkas`, `status_ajuan`, `created_at`, `updated_at`, `keterangan`, `photo`) VALUES
(4, 2, 8, 2, 4.00, 'berkas/berkas_66277d89198ce.jpg', 'verifing', '2024-04-23 02:21:13', '2024-04-23 02:21:13', NULL, 'avatar/photo_66277d891a702.jpg'),
(8, 1, 5, 4, 4.00, 'berkas/berkas_662c6ae626d3d.jpg', 'denied', '2024-04-26 20:03:02', '2024-04-27 03:06:07', 'Berkasnya kurang lengkap, tolong daftar kembali', 'avatar/photo_662c6ae628841.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transkip_nilai`
--

CREATE TABLE `transkip_nilai` (
  `nilai_id` bigint UNSIGNED NOT NULL,
  `mahasiswa_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nilai_semester1` float DEFAULT NULL,
  `nilai_semester2` float DEFAULT NULL,
  `nilai_semester3` float DEFAULT NULL,
  `nilai_semester4` float DEFAULT NULL,
  `nilai_semester5` float DEFAULT NULL,
  `nilai_semester6` float DEFAULT NULL,
  `nilai_semester7` float DEFAULT NULL,
  `nilai_semester8` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transkip_nilai`
--

INSERT INTO `transkip_nilai` (`nilai_id`, `mahasiswa_id`, `created_at`, `updated_at`, `nilai_semester1`, `nilai_semester2`, `nilai_semester3`, `nilai_semester4`, `nilai_semester5`, `nilai_semester6`, `nilai_semester7`, `nilai_semester8`) VALUES
(1, 1, '2024-04-22 04:13:48', '2024-04-22 04:13:48', 4, 4, 4, 4, 4, 4, 4, 2),
(2, 2, '2024-04-23 08:58:02', '2024-04-23 08:58:02', 4, 4, 4, 2, 2, 3, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mahasiswa_id` int DEFAULT NULL,
  `admin_id` int DEFAULT NULL,
  `status` enum('verifing','verified') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'verifing'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `mahasiswa_id`, `admin_id`, `status`) VALUES
(1, NULL, 'asdasddsa', NULL, '2024-04-24 17:38:21', '2024-04-26 18:51:54', 3, NULL, 'verifing'),
(2, NULL, '$2y$10$/qH.SsAB8nLjizz5rdAu.Of4/nqncnerohusf/TapNjWxc/TfF6HS', NULL, '2024-04-24 19:14:22', '2024-04-24 19:14:22', 4, NULL, 'verifing'),
(3, NULL, '$2y$10$oKTKBkcAvo5UmqnT3XOJyeIe0.M977z2PcAcBPGzfW1BPJqULZFVK', NULL, '2024-04-26 18:40:11', '2024-04-26 18:40:11', 5, NULL, 'verifing'),
(4, NULL, '$2y$10$CDCPW/UpmCmDoddqraA/yOLNLpRP1j4pZx7HTXFP4v8MV2pXl0wF6', NULL, '2024-04-26 18:40:48', '2024-04-26 18:40:48', 6, NULL, 'verifing'),
(5, NULL, 'asdasddsa', NULL, '2024-04-26 18:43:49', '2024-04-26 18:57:15', 7, NULL, 'verifing');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jenis_beasiswa`
--
ALTER TABLE `jenis_beasiswa`
  ADD PRIMARY KEY (`jenis_beasiswa_id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`mahasiswa_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`pendaftaran_id`),
  ADD KEY `pendaftaran_mahasiswa_id_foreign` (`mahasiswa_id`),
  ADD KEY `pendaftaran_jenis_beasiswa_id_foreign` (`jenis_beasiswa_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `transkip_nilai`
--
ALTER TABLE `transkip_nilai`
  ADD PRIMARY KEY (`nilai_id`),
  ADD KEY `transkip_nilai_mahasiswa_id_foreign` (`mahasiswa_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_beasiswa`
--
ALTER TABLE `jenis_beasiswa`
  MODIFY `jenis_beasiswa_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `mahasiswa_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `pendaftaran_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transkip_nilai`
--
ALTER TABLE `transkip_nilai`
  MODIFY `nilai_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `pendaftaran_jenis_beasiswa_id_foreign` FOREIGN KEY (`jenis_beasiswa_id`) REFERENCES `jenis_beasiswa` (`jenis_beasiswa_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pendaftaran_mahasiswa_id_foreign` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`mahasiswa_id`) ON DELETE CASCADE;

--
-- Constraints for table `transkip_nilai`
--
ALTER TABLE `transkip_nilai`
  ADD CONSTRAINT `transkip_nilai_mahasiswa_id_foreign` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`mahasiswa_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
