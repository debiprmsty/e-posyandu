-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Agu 2023 pada 18.48
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

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
-- Struktur dari tabel `balitas`
--

CREATE TABLE `balitas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_orangtua` bigint(20) UNSIGNED NOT NULL,
  `id_dusun` bigint(20) UNSIGNED NOT NULL,
  `nik_balita` varchar(255) NOT NULL DEFAULT '0',
  `nama_balita` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `balitas`
--

INSERT INTO `balitas` (`id`, `id_orangtua`, `id_dusun`, `nik_balita`, `nama_balita`, `tanggal_lahir`, `jenis_kelamin`, `created_at`, `updated_at`) VALUES
(12, 18, 7, '5106036912180002', 'I Dewa A. Ayu Sinta Ari Yanti', '2018-12-29', 'Perempuan', '2023-08-19 23:23:30', '2023-08-19 23:23:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bulans`
--

CREATE TABLE `bulans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_bulan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bulans`
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
-- Struktur dari tabel `dusuns`
--

CREATE TABLE `dusuns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_dusun` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dusuns`
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
(20, 'Dusun Tambahan Bakas', '2023-08-08 20:55:13', '2023-08-08 20:55:13'),
(21, 'Dusun Tambahan Kelod', '2023-08-08 20:55:24', '2023-08-08 20:55:24'),
(22, 'Dusun Tambahan Tengah', '2023-08-08 22:35:50', '2023-08-08 22:35:50'),
(23, 'Dusun Antugan', '2023-08-09 04:57:19', '2023-08-09 04:57:19'),
(24, 'Dusun Pembungan', '2023-08-19 21:31:29', '2023-08-19 21:31:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `keterangans`
--

CREATE TABLE `keterangans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `label_keterangan` varchar(255) NOT NULL,
  `nama_keterangan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `keterangans`
--

INSERT INTO `keterangans` (`id`, `label_keterangan`, `nama_keterangan`, `created_at`, `updated_at`) VALUES
(1, 'N', 'Naik', '2023-08-06 16:15:45', '2023-08-06 16:15:45'),
(2, 'T', 'Turun', '2023-08-06 16:16:13', '2023-08-06 16:16:13'),
(3, 'TT', 'Tetap', '2023-08-06 16:16:50', '2023-08-06 16:16:50'),
(4, '0', 'Tidak Ada Keterangan', '2023-08-13 14:29:46', '2023-08-13 14:29:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
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
-- Struktur dari tabel `orang_tuas`
--

CREATE TABLE `orang_tuas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_dusun` bigint(20) UNSIGNED NOT NULL,
  `nik_bapak` varchar(255) NOT NULL DEFAULT '0',
  `nik_ibu` varchar(255) NOT NULL DEFAULT '0',
  `nama_bapak` varchar(255) DEFAULT NULL,
  `nama_ibu` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `orang_tuas`
--

INSERT INTO `orang_tuas` (`id`, `id_dusun`, `nik_bapak`, `nik_ibu`, `nama_bapak`, `nama_ibu`, `created_at`, `updated_at`) VALUES
(13, 11, '0', '0', 'Putu Agastia', 'Made Sri Yuliantari', '2023-08-19 22:54:33', '2023-08-19 22:54:33'),
(14, 14, '0', '0', 'Putu Darmayasa', 'Alit Juita Santi', '2023-08-19 22:55:49', '2023-08-19 22:55:49'),
(15, 20, '0', '0', 'Dewa Agung Gede Putra', 'Kadek Sulasih', '2023-08-19 22:57:11', '2023-08-19 22:57:11'),
(16, 6, '0', '510603560882001', NULL, 'Ni Kadek Rusmini', '2023-08-19 23:08:15', '2023-08-19 23:08:15'),
(18, 7, '0', '0', NULL, 'Dewa Ayu Okta Diantini', '2023-08-19 23:21:34', '2023-08-19 23:21:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penimbangans`
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
-- Dumping data untuk tabel `penimbangans`
--

INSERT INTO `penimbangans` (`id`, `id_balita`, `id_dusun`, `id_keterangan`, `tgl_timbangan`, `berat_badan`, `tinggi_badan`, `created_at`, `updated_at`) VALUES
(49, 12, 7, 4, '2023-08-10', 13.9, 102.6, '2023-08-19 23:42:08', '2023-08-19 23:42:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `balitas`
--
ALTER TABLE `balitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `balitas_id_orangtua_foreign` (`id_orangtua`),
  ADD KEY `balitas_id_dusun_foreign` (`id_dusun`);

--
-- Indeks untuk tabel `bulans`
--
ALTER TABLE `bulans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dusuns`
--
ALTER TABLE `dusuns`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `keterangans`
--
ALTER TABLE `keterangans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orang_tuas`
--
ALTER TABLE `orang_tuas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orang_tuas_id_dusun_foreign` (`id_dusun`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `penimbangans`
--
ALTER TABLE `penimbangans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penimbangans_id_balita_foreign` (`id_balita`),
  ADD KEY `penimbangans_id_dusun_foreign` (`id_dusun`),
  ADD KEY `penimbangans_id_keterangan_foreign` (`id_keterangan`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `balitas`
--
ALTER TABLE `balitas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `bulans`
--
ALTER TABLE `bulans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `dusuns`
--
ALTER TABLE `dusuns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `keterangans`
--
ALTER TABLE `keterangans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `orang_tuas`
--
ALTER TABLE `orang_tuas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `penimbangans`
--
ALTER TABLE `penimbangans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `balitas`
--
ALTER TABLE `balitas`
  ADD CONSTRAINT `balitas_id_dusun_foreign` FOREIGN KEY (`id_dusun`) REFERENCES `dusuns` (`id`),
  ADD CONSTRAINT `balitas_id_orangtua_foreign` FOREIGN KEY (`id_orangtua`) REFERENCES `orang_tuas` (`id`);

--
-- Ketidakleluasaan untuk tabel `orang_tuas`
--
ALTER TABLE `orang_tuas`
  ADD CONSTRAINT `orang_tuas_id_dusun_foreign` FOREIGN KEY (`id_dusun`) REFERENCES `dusuns` (`id`);

--
-- Ketidakleluasaan untuk tabel `penimbangans`
--
ALTER TABLE `penimbangans`
  ADD CONSTRAINT `penimbangans_id_balita_foreign` FOREIGN KEY (`id_balita`) REFERENCES `balitas` (`id`),
  ADD CONSTRAINT `penimbangans_id_dusun_foreign` FOREIGN KEY (`id_dusun`) REFERENCES `dusuns` (`id`),
  ADD CONSTRAINT `penimbangans_id_keterangan_foreign` FOREIGN KEY (`id_keterangan`) REFERENCES `keterangans` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
