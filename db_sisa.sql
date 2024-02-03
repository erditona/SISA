-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2024 at 02:11 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sisa`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `loctempatsampah`
--

CREATE TABLE `loctempatsampah` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namalokasi` varchar(255) NOT NULL,
  `alamatlokasi` varchar(255) NOT NULL,
  `jenislokasi` varchar(255) NOT NULL,
  `luaslokasi` varchar(255) NOT NULL,
  `kapasitaslokasi` varchar(255) NOT NULL,
  `radiuslokasi` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loctempatsampah`
--

INSERT INTO `loctempatsampah` (`id`, `namalokasi`, `alamatlokasi`, `jenislokasi`, `luaslokasi`, `kapasitaslokasi`, `radiuslokasi`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(10, 'TPS Sersan Bajuri', 'Jl. Sariwangi, Sarijadi, Kec. Sukasari, Kota Bandung, Jawa Barat 40151', 'TPS', '120', '150', '1000', '-6.855660837321332', '107.59211886201663', '2024-01-05 00:17:22', '2024-01-10 03:46:20'),
(11, 'TPA Sarimukti', 'Sarimukti, Kec. Cipatat, Kabupaten Bandung Barat, Jawa Barat 40554', 'TPA', '25', '2 Juta', '10000', '-6.800720643786334', '107.34932786339795', '2024-01-05 00:23:36', '2024-01-10 03:46:39'),
(18, 'TPS Sarimadu', 'Jl. Sariwangi, Sarijadi, Kec. Sukasari, Kota Bandung, Jawa Barat 40151', 'TPS', '250', '2', '100', '-6.888968790680634', '107.58111523188695', '2024-02-01 23:43:49', '2024-02-01 23:57:08'),
(19, 'TPS Salamun', 'Komplk. Aria Timur Kota Bandung, Jawa Barat 40151', 'TPS', '150', '20', '100', '-6.942599472709619', '107.6731692478186', '2024-02-01 23:44:40', '2024-02-01 23:56:47'),
(20, 'TPS Pasteur', 'Pasteur Belakang BBSPLGL Kota Bandung, Jawa Barat 40151', 'TPST', '300', '100', '20', '-6.893759841371997', '107.57958150827564', '2024-02-01 23:45:31', '2024-02-01 23:56:20'),
(21, 'TPS Jalan Ambon', 'JL. Pagalo Girang Kota Bandung, Jawa Barat 40151', 'TPS', '2000', '200', '100', '-6.954460325444777', '107.64764727921542', '2024-02-01 23:46:17', '2024-02-01 23:56:10'),
(22, 'TPS Baru', 'Jl. Cipaganti Belakang Hotel Kota Bandung, Jawa Barat 40151', 'TPST', '1000', '100', '100', '-6.903912392606602', '107.60314761890739', '2024-02-01 23:47:42', '2024-02-01 23:56:00'),
(23, 'TPS Gedebage', 'Jl. Gedebage', 'TPS', '250', '100', '100', '-6.933509541373213', '107.69685002701495', '2024-02-02 00:02:16', '2024-02-02 00:02:16');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_12_15_022108_create_loctempatsampah_table', 1),
(6, '2023_19_06_083306_create_sekolah_table', 1),
(7, '2023_12_16_042733_create_loctempatsampah_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namasekolah` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`id`, `namasekolah`, `alamat`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, 'TPA SARIMUKTI', 'Bandung', '-6.890808879920737', '107.59995360198863', '2023-12-14 23:30:10', '2023-12-15 00:15:50'),
(2, 'sas', 'sasa', '-6.888331413192927', '107.6134266554955', '2023-12-14 23:40:33', '2023-12-14 23:40:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Erdito Nausha Adam', 'erditonaushaadam@gmail.com', NULL, '$2y$10$iDAifkIfKfE00YJAdGnRk.tRPrEmJ/2RxN/WucEkqGftEJZ/0Fi6.', NULL, '2023-12-14 19:49:25', '2023-12-14 19:49:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `loctempatsampah`
--
ALTER TABLE `loctempatsampah`
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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loctempatsampah`
--
ALTER TABLE `loctempatsampah`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
