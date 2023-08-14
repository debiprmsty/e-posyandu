-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2023 at 05:10 PM
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
-- Database: `db_posyandu`
--

-- --------------------------------------------------------

--
-- Table structure for table `balitas`
--

CREATE TABLE `balitas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_orangtua` bigint(20) UNSIGNED NOT NULL,
  `id_dusun` bigint(20) UNSIGNED NOT NULL,
  `nik_balita` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_balita` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `balitas`
--

INSERT INTO `balitas` (`id`, `id_orangtua`, `id_dusun`, `nik_balita`, `nama_balita`, `tanggal_lahir`, `jenis_kelamin`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '3436434', 'Sri Mustri Ningsih Astiti', '2023-08-31', 'Perempuan', '2023-08-08 22:52:49', '2023-08-08 22:50:48'),
(6, 9, 6, '15626738281990', 'Ketut Sri Diana Lestari', '2022-05-09', 'Perempuan', '2023-08-09 17:43:17', '2023-08-09 17:43:17'),
(7, 1, 2, '156265617175267', 'Lanang Bramanta', '2020-07-24', 'Laki-Laki', '2023-08-09 17:44:19', '2023-08-09 17:44:19');

-- --------------------------------------------------------

--
-- Table structure for table `bulans`
--

CREATE TABLE `bulans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_bulan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bulans`
--

INSERT INTO `bulans` (`id`, `nama_bulan`, `created_at`, `updated_at`) VALUES
(1, 'Januari', '2023-08-06 16:17:55', '2023-08-06 16:17:55'),
(2, 'Februari', '2023-08-06 16:18:42', '2023-08-06 16:18:42'),
(3, 'Maret', '2023-08-06 16:23:41', '2023-08-06 16:23:41'),
(4, 'April', '2023-08-06 16:24:21', '2023-08-06 16:24:21'),
(5, 'Mei', '2023-08-06 16:24:21', '2023-08-06 16:24:21'),
(6, 'Juni', '2023-08-06 16:24:21', '2023-08-06 16:24:21'),
(7, 'Juli', '2023-08-06 16:24:21', '2023-08-06 16:24:21'),
(8, 'Agustus', '2023-08-06 16:24:21', '2023-08-06 16:24:21'),
(9, 'September', '2023-08-06 16:24:21', '2023-08-06 16:24:21'),
(10, 'Oktober', '2023-08-06 16:24:21', '2023-08-06 16:24:21'),
(11, 'November', '2023-08-06 16:24:21', '2023-08-06 16:24:21'),
(12, 'Desember', '2023-08-06 16:24:21', '2023-08-06 16:24:21');

-- --------------------------------------------------------

--
-- Table structure for table `dusuns`
--

CREATE TABLE `dusuns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_dusun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dusuns`
--

INSERT INTO `dusuns` (`id`, `nama_dusun`, `created_at`, `updated_at`) VALUES
(2, 'Dusun Galiran', '2023-08-08 00:34:59', '2023-08-08 00:34:59'),
(5, 'Dusun Jehem Kaja', '2023-08-08 04:32:25', '2023-08-08 20:51:51'),
(6, 'Dusun Jehem Kelod', '2023-08-08 04:32:32', '2023-08-08 04:32:32'),
(7, 'Dusun Kaulan Dewa', '2023-08-08 04:32:49', '2023-08-09 04:57:29'),
(11, 'Dusun Kelempung', '2023-08-08 17:42:05', '2023-08-08 17:42:05'),
(14, 'Dusun Sama Griya', '2023-08-08 20:52:26', '2023-08-08 20:52:26'),
(15, 'Dusun Sama Undisan', '2023-08-08 20:52:51', '2023-08-08 20:52:51'),
(16, 'Dusun Tingkad Batu', '2023-08-08 20:53:10', '2023-08-08 20:53:10'),
(18, 'Dusun Pasekan', '2023-08-08 20:53:23', '2023-08-08 20:53:23'),
(19, 'Dusun Pembungan', '2023-08-08 20:53:45', '2023-08-08 20:53:45'),
(20, 'Dusun Tambahan Bakas', '2023-08-08 20:55:13', '2023-08-08 20:55:13'),
(21, 'Dusun Tambahan Kelod', '2023-08-08 20:55:24', '2023-08-08 20:55:24'),
(22, 'Dusun Tambahan Tengah', '2023-08-08 22:35:50', '2023-08-08 22:35:50'),
(23, 'Dusun Antugan', '2023-08-09 04:57:19', '2023-08-09 04:57:19');

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
-- Table structure for table `keterangans`
--

CREATE TABLE `keterangans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `label_keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keterangans`
--

INSERT INTO `keterangans` (`id`, `label_keterangan`, `nama_keterangan`, `created_at`, `updated_at`) VALUES
(1, 'N', 'Naik', '2023-08-06 16:15:45', '2023-08-06 16:15:45'),
(2, 'T', 'Turun', '2023-08-06 16:16:13', '2023-08-06 16:16:13'),
(3, 'TT', 'Tetap', '2023-08-06 16:16:50', '2023-08-06 16:16:50'),
(4, '0', 'Tidak Ada Keterangan', '2023-08-13 14:29:46', '2023-08-13 14:29:46');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_07_28_110023_create_dusuns_table', 1),
(6, '2023_07_28_110658_create_orang_tuas_table', 1),
(7, '2023_07_28_110730_create_balitas_table', 1),
(8, '2023_07_28_110800_create_bulans_table', 1),
(9, '2023_07_28_110813_create_keterangans_table', 1),
(10, '2023_07_28_122030_create_penimbangans_table', 1),
(11, '2023_08_12_105436_create_penimbangans_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orang_tuas`
--

CREATE TABLE `orang_tuas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_dusun` bigint(20) UNSIGNED NOT NULL,
  `nik_bapak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik_ibu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_bapak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ibu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orang_tuas`
--

INSERT INTO `orang_tuas` (`id`, `id_dusun`, `nik_bapak`, `nik_ibu`, `nama_bapak`, `nama_ibu`, `created_at`, `updated_at`) VALUES
(1, 2, '1242342534543', '123131345454', 'Lanang Surya Darma', 'Luh Debi Pramesty', '2023-08-08 05:10:58', '2023-08-08 22:22:34'),
(9, 6, '125526267152671', '156152516525165', 'Kadek Sandiarta', 'Luh Sariasih', '2023-08-09 17:41:11', '2023-08-09 17:41:11'),
(10, 2, '1425617172672718', '1331425262736617', 'Made Lanang Putra', 'Nengah Sri Mustika Ningsih', '2023-08-09 17:42:14', '2023-08-09 17:42:14');

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
-- Table structure for table `penimbangans`
--

CREATE TABLE `penimbangans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_balita` bigint(20) UNSIGNED NOT NULL,
  `id_dusun` bigint(20) UNSIGNED NOT NULL,
  `id_keterangan` bigint(20) UNSIGNED DEFAULT 4,
  `tgl_timbangan` date NOT NULL,
  `berat_badan` double NOT NULL,
  `tinggi_badan` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penimbangans`
--

INSERT INTO `penimbangans` (`id`, `id_balita`, `id_dusun`, `id_keterangan`, `tgl_timbangan`, `berat_badan`, `tinggi_badan`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 2, '2023-08-02', 10.5, 120.5, '2023-08-12 11:01:36', '2023-08-12 11:01:36'),
(2, 6, 6, 3, '2023-08-12', 23.5, 10.5, '2023-08-12 11:01:36', '2023-08-12 11:01:36'),
(3, 7, 2, 1, '2023-08-12', 14.8, 120.5, '2023-08-12 11:07:00', '2023-08-12 11:07:00'),
(5, 7, 2, 4, '2023-08-13', 12.8, 112.5, '2023-08-13 14:32:52', '2023-08-13 14:32:52');

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Indexes for table `balitas`
--
ALTER TABLE `balitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `balitas_id_orangtua_foreign` (`id_orangtua`),
  ADD KEY `balitas_id_dusun_foreign` (`id_dusun`);

--
-- Indexes for table `bulans`
--
ALTER TABLE `bulans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dusuns`
--
ALTER TABLE `dusuns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `keterangans`
--
ALTER TABLE `keterangans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orang_tuas`
--
ALTER TABLE `orang_tuas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orang_tuas_id_dusun_foreign` (`id_dusun`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `penimbangans`
--
ALTER TABLE `penimbangans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penimbangans_id_balita_foreign` (`id_balita`),
  ADD KEY `penimbangans_id_dusun_foreign` (`id_dusun`),
  ADD KEY `penimbangans_id_keterangan_foreign` (`id_keterangan`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `balitas`
--
ALTER TABLE `balitas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bulans`
--
ALTER TABLE `bulans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `dusuns`
--
ALTER TABLE `dusuns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keterangans`
--
ALTER TABLE `keterangans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orang_tuas`
--
ALTER TABLE `orang_tuas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `penimbangans`
--
ALTER TABLE `penimbangans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `balitas`
--
ALTER TABLE `balitas`
  ADD CONSTRAINT `balitas_id_dusun_foreign` FOREIGN KEY (`id_dusun`) REFERENCES `dusuns` (`id`),
  ADD CONSTRAINT `balitas_id_orangtua_foreign` FOREIGN KEY (`id_orangtua`) REFERENCES `orang_tuas` (`id`);

--
-- Constraints for table `orang_tuas`
--
ALTER TABLE `orang_tuas`
  ADD CONSTRAINT `orang_tuas_id_dusun_foreign` FOREIGN KEY (`id_dusun`) REFERENCES `dusuns` (`id`);

--
-- Constraints for table `penimbangans`
--
ALTER TABLE `penimbangans`
  ADD CONSTRAINT `penimbangans_id_balita_foreign` FOREIGN KEY (`id_balita`) REFERENCES `balitas` (`id`),
  ADD CONSTRAINT `penimbangans_id_dusun_foreign` FOREIGN KEY (`id_dusun`) REFERENCES `dusuns` (`id`),
  ADD CONSTRAINT `penimbangans_id_keterangan_foreign` FOREIGN KEY (`id_keterangan`) REFERENCES `keterangans` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
