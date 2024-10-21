-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2024 at 03:23 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pwl_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS failed_jobs;
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
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS migrations;
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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_09_11_013656_create_m_level_table', 1),
(6, '2024_09_11_020149_create_m_kategori_table', 2),
(7, '2024_09_11_020211_create_m_supplier_table', 2),
(8, '2024_09_11_025157_create_m_level_table', 3),
(9, '2024_09_11_025236_create_m_kategori_table', 3),
(10, '2024_09_11_025240_create_m_supplier_table', 3),
(11, '2024_09_11_102426_create_m_user_table', 4),
(12, '2024_09_11_124058_create_t_penjualan_table', 5),
(13, '2024_09_11_130606_create_m_barang_table', 6),
(14, '2024_09_11_131419_create_t_penjualan_table', 7),
(15, '2024_09_11_133140_create_t_penjualan_detail_table', 8),
(16, '2024_09_11_133839_create_t_stok_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `m_barang`
--

DROP TABLE IF EXISTS m_barang;
CREATE TABLE `m_barang` (
  `barang_id` bigint(20) UNSIGNED NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `barang_kode` varchar(10) NOT NULL,
  `barang_nama` varchar(100) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_barang`
--

INSERT INTO `m_barang` (`barang_id`, `kategori_id`, `barang_kode`, `barang_nama`, `harga_beli`, `harga_jual`, `created_at`, `updated_at`) VALUES
(1, 2, 'CVC', 'Honda Civic', 375000000, 425000000, NULL, NULL),
(2, 2, 'CRV', 'Honda CR-V', 450000000, 475000000, NULL, NULL),
(3, 2, 'PCX', 'Honda PCX', 60000000, 70000000, NULL, NULL),
(4, 2, 'CBR', 'Honda CBR500R', 160000000, 170000000, NULL, NULL),
(5, 2, 'JZZ', 'Honda Jazz', 225000000, 300000000, NULL, NULL),
(6, 3, 'NSC', 'Nescafe', 32500, 40000, NULL, NULL),
(7, 3, 'KKT', 'KitKat', 27000, 30000, NULL, NULL),
(8, 3, 'MLO', 'Milo', 50000, 60000, NULL, NULL),
(9, 3, 'NST', 'Nestea Lemon Tea', 60000, 65000, NULL, NULL),
(10, 3, 'NPL', 'Nestle Pure Life', 50000, 52000, NULL, NULL),
(11, 4, 'MCB', 'MacBook Air M2', 20000000, 21000000, NULL, NULL),
(12, 4, 'IPD', 'iPad Pro', 17800000, 18000000, NULL, NULL),
(13, 4, 'IPH', 'Iphone 15 Pro', 18000000, 19000000, NULL, NULL),
(14, 4, 'AW9', 'Apple Watch Series 9', 8000000, 8500000, NULL, NULL),
(15, 4, 'APP', 'AirPods Pro Gen 2', 4000000, 4500000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_kategori`
--

DROP TABLE IF EXISTS m_kategori;
CREATE TABLE `m_kategori` (
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `kategori_kode` varchar(10) NOT NULL,
  `kategori_nama` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_kategori`
--

INSERT INTO `m_kategori` (`kategori_id`, `kategori_kode`, `kategori_nama`, `created_at`, `updated_at`) VALUES
(1, 'PKN', 'Pakaian', NULL, NULL),
(2, 'KDN', 'Kendaraan', NULL, NULL),
(3, 'FNB', 'Food & Beverages', NULL, NULL),
(4, 'GDT', 'Gadget', NULL, NULL),
(5, 'HNB', 'Health & Beauty', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_level`
--

DROP TABLE IF EXISTS m_level;
CREATE TABLE `m_level` (
  `level_id` bigint(20) UNSIGNED NOT NULL,
  `level_kode` varchar(10) NOT NULL,
  `level_nama` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_level`
--

INSERT INTO `m_level` (`level_id`, `level_kode`, `level_nama`, `created_at`, `updated_at`) VALUES
(1, 'ADM', 'Administrator', NULL, NULL),
(2, 'MNG', 'Manager', NULL, NULL),
(3, 'STF', 'Staff/Kasir', NULL, NULL),
(4, 'CUS', 'Pelanggan', '2024-09-14 03:59:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_supplier`
--

DROP TABLE IF EXISTS m_supplier;
CREATE TABLE `m_supplier` (
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `supplier_kode` varchar(10) NOT NULL,
  `supplier_name` varchar(100) NOT NULL,
  `supplier_alamat` varchar(225) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_supplier`
--

INSERT INTO `m_supplier` (`supplier_id`, `supplier_kode`, `supplier_name`, `supplier_alamat`, `created_at`, `updated_at`) VALUES
(1, 'HND', 'Honda', 'Jakarta', NULL, NULL),
(2, 'NST', 'Nestle', 'Surabaya', NULL, NULL),
(3, 'APL', 'Apple', 'Jakarta', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_user`
--

DROP TABLE IF EXISTS m_user;
CREATE TABLE `m_user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `level_id` bigint(20) UNSIGNED NOT NULL,
  `image` LONGBLOB NULL DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_user`
--

INSERT INTO `m_user` (`user_id`, `level_id`, `image`, `username`, `nama`, `password`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'admin', 'Administrator', '$2y$12$z3b3567nVdnR2cJyRKhAcu3iJSXsLucCzDo3xBjLmuqUr8gSsTI.G', NULL, '2024-10-08 20:47:36'),
(2, 2, NULL, 'manager', 'Manager', '$2y$12$FhQmFBRvJheyfTGkzHQB4uoi.ai4gnarXVbJcWUXKD9tAOku84mpi', NULL, NULL),
(3, 3, NULL, 'staff', 'Staff/Kasir', '$2y$12$UFwcSe3c56w6gbGij4Qa/uJQ6tfL4.jtGdfAoEzIItBnnWbMAgZVS', NULL, '2024-10-08 20:48:04'),
(11, 2, NULL, 'manager_dua', 'Manager 2', '$2y$12$DKitKKoAmYT2r7kS0crn3uFZOry46alr6xSVyHGM7K5wKUbwWFn56', '2024-09-17 17:43:38', '2024-09-17 17:43:38'),
(12, 2, NULL, 'manager22', 'Manager Dua Dua', '$2y$12$K6OeIwOVOxyFjMLkndUKdewb5NQG.3.eUHjHjm4X84Dw3hEhz/fWO', '2024-09-19 22:41:48', '2024-09-19 22:41:48'),
(13, 2, NULL, 'manager33', 'Manager Tiga TIga', '$2y$12$PxbqS.N8G08pYm3mloscUOdorj4TcJxomg0HY/fqO2edJxNqOyyVa', '2024-09-19 23:01:23', '2024-09-19 23:01:23'),
(14, 2, NULL, 'manager45', 'Manager44', '$2y$12$22RViaAFiBIhCI/ZuM694.w4pgLv9JkG5x8kFAitlp4rtBRIe5eqi', '2024-09-20 08:48:56', '2024-09-20 08:48:56'),
(15, 2, NULL, 'manager12', 'Manager11', '$2y$12$gpiRvv.Sc/bsk4rjVD20Geob4fuhq5sY9XNo9Zb8bISqb3PLB/.g.', '2024-09-20 08:51:06', '2024-09-20 08:51:06'),
(24, 2, NULL, 'm123', 'Fa\'iz', '$2y$12$cB1VdeNIzPBokTc.UPJp8OOI9rxEY6f2ByIobu2Rw.RIyOsp7RK4e', '2024-10-01 20:56:51', '2024-10-08 20:47:50'),
(26, 1, NULL, 'MasAdmin', 'paes', '$2y$12$nNDqR1Xt5vn5aqDAQr32WukWQzlHrCxBqDYuPTRuOXcvcRpttfc1S', '2024-10-08 19:09:40', '2024-10-08 19:09:40'),
(27, 4, NULL, 'MbahMase', 'Mbah Ian', '$2y$12$3IaNnqfwLNdaN0x9wPPVkOLzx0/rG7c.24m94pxbLgGu5RgUISani', '2024-10-08 20:48:59', '2024-10-08 20:48:59'),
(28, 2, NULL, 'PakManager', 'Pak Paes', '$2y$12$P4K4sEolTrSzm7rsdUa1Ge55wlBiDZsL0wpAghaGiwwITH1WWrD5G', '2024-10-08 21:05:04', '2024-10-08 21:05:04'),
(29, 3, NULL, 'PendudukBumi', 'Manusia Purba', '$2y$12$homjVnaT/5YAEGdnQTMApezHX6GpCuXcCX3byl3JYgyhQNKibU29y', '2024-10-08 21:06:02', '2024-10-08 21:10:10'),
(30, 1, NULL, 'MbaAdmin', 'Shan', '$2y$12$vaobZUWaJLtJcLY0cetzu.DBWTSF.P47XJkWQxalGfdkUkyfMCpZ2', '2024-10-15 08:47:10', '2024-10-15 08:47:10'),
(31, 1, NULL, 'MbaAdmin123', 'Shannon', '$2y$12$TsXyHs81yrRTw3YmRmtYoeRQQMNWYC4n4jsnSAjFWZgzo/bJqUreu', '2024-10-15 08:48:58', '2024-10-15 08:48:58'),
(32, 2, NULL, 'MasMana', 'Mana', '$2y$12$1F2I1cLDyHB9xehq.7KvFelnMCerY6iegOrSaOsW6OYyNT.LkXATu', '2024-10-15 08:51:36', '2024-10-15 08:51:36'),
(33, 2, NULL, 'MasMana123', 'MasMana', '$2y$12$ZwTqM8XVaoCUOb0bKhYl2.vm82yhV85wLCtTb9QdMVjjRG7pExvge', '2024-10-15 08:52:24', '2024-10-15 08:52:24'),
(34, 3, NULL, 'Mastah', 'Ian', '$2y$12$zaenClvgHS6CrHNCL71FMOZZ2MOv/MVA3XAb6DRUTmkDtbnL/bOWu', '2024-10-15 08:54:13', '2024-10-15 08:54:13'),
(35, 3, NULL, 'Mastah123', 'Ian123', '$2y$12$UiwIRff.zmS3TNPZLhOQdea/aVwa2K9q/TSob90ZYQtobuMnW2aPK', '2024-10-15 09:00:07', '2024-10-15 09:00:07'),
(36, 4, NULL, 'MasCus', 'Wildan', '$2y$12$i1JQaqDFBiggkFSjS7fTtOlgzabfGmrzpbne4s2va9vs9424dOvsy', '2024-10-15 18:06:55', '2024-10-15 18:06:55'),
(37, 4, NULL, 'MasCUh', 'Ryan', '$2y$12$T5c3N6Whwkh0dWILO4SbNO/LSm63AIq0CKViS5Df9mJBnvpT9pDt.', '2024-10-15 18:10:34', '2024-10-15 18:10:34');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS password_reset_tokens;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS personal_access_tokens;
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
-- Table structure for table `t_penjualan`
--

DROP TABLE IF EXISTS t_penjualan;
CREATE TABLE `t_penjualan` (
  `penjualan_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `pembeli` varchar(50) NOT NULL,
  `penjualan_kode` varchar(20) NOT NULL,
  `penjualan_tanggal` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_penjualan`
--

INSERT INTO `t_penjualan` (`penjualan_id`, `user_id`, `pembeli`, `penjualan_kode`, `penjualan_tanggal`, `created_at`, `updated_at`) VALUES
(1, 1, 'Fahmi', 'KD_1', '2024-11-01 00:00:00', NULL, NULL),
(2, 2, 'Faiz', 'KD_2', '2024-11-01 00:00:00', NULL, NULL),
(3, 1, 'Ian', 'KD_3', '2024-11-01 00:00:00', NULL, NULL),
(4, 3, 'Rio', 'KD_4', '2024-11-02 00:00:00', NULL, NULL),
(5, 2, 'Alex', 'KD_5', '2024-11-02 00:00:00', NULL, NULL),
(6, 3, 'Hasan', 'KD_6', '2024-11-03 00:00:00', NULL, NULL),
(7, 2, 'Abi', 'KD_7', '2024-11-03 00:00:00', NULL, NULL),
(8, 2, 'Abiyu', 'KD_8', '2024-11-03 00:00:00', NULL, NULL),
(9, 3, 'Fabian', 'KD_9', '2024-11-03 00:00:00', NULL, NULL),
(10, 1, 'Atha', 'KD_10', '2024-11-04 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_penjualan_detail`
--

DROP TABLE IF EXISTS t_penjualan_detail;
CREATE TABLE `t_penjualan_detail` (
  `detail_id` bigint(20) UNSIGNED NOT NULL,
  `penjualan_id` bigint(20) UNSIGNED NOT NULL,
  `barang_id` bigint(20) UNSIGNED NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_penjualan_detail`
--

INSERT INTO `t_penjualan_detail` (`detail_id`, `penjualan_id`, `barang_id`, `harga`, `jumlah`, `created_at`, `updated_at`) VALUES
(1, 1, 15, 4500000, 1, NULL, NULL),
(2, 1, 13, 38000000, 2, NULL, NULL),
(3, 2, 11, 21000000, 1, NULL, NULL),
(4, 1, 3, 70000000, 1, NULL, NULL),
(5, 2, 1, 425000000, 1, NULL, NULL),
(6, 2, 14, 8500000, 1, NULL, NULL),
(7, 3, 5, 300000000, 1, NULL, NULL),
(8, 3, 12, 18000000, 1, NULL, NULL),
(9, 3, 9, 130000, 2, NULL, NULL),
(10, 4, 10, 260000, 5, NULL, NULL),
(11, 4, 15, 4500000, 1, NULL, NULL),
(12, 4, 11, 21000000, 1, NULL, NULL),
(13, 5, 4, 17000000, 1, NULL, NULL),
(14, 5, 1, 425000000, 1, NULL, NULL),
(15, 1, 13, 38000000, 2, NULL, NULL),
(16, 6, 8, 120000, 2, NULL, NULL),
(17, 6, 7, 90000, 3, NULL, NULL),
(18, 6, 14, 8500000, 1, NULL, NULL),
(19, 7, 1, 850000000, 2, NULL, NULL),
(20, 7, 4, 340000000, 2, NULL, NULL),
(21, 7, 13, 19000000, 1, NULL, NULL),
(22, 8, 12, 18000000, 1, NULL, NULL),
(23, 8, 6, 80000, 2, NULL, NULL),
(24, 8, 13, 45000000, 5, NULL, NULL),
(25, 9, 2, 70000000, 1, NULL, NULL),
(26, 9, 15, 18000000, 4, NULL, NULL),
(27, 9, 10, 520000, 10, NULL, NULL),
(28, 10, 14, 42500000, 5, NULL, NULL),
(29, 10, 2, 475000000, 1, NULL, NULL),
(30, 10, 5, 300000000, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_stok`
--

DROP TABLE IF EXISTS t_stok;
CREATE TABLE `t_stok` (
  `stok_id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `barang_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `stok_tanggal` datetime NOT NULL,
  `stok_jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_stok`
--

INSERT INTO `t_stok` (`stok_id`, `supplier_id`, `barang_id`, `user_id`, `stok_tanggal`, `stok_jumlah`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, '2024-10-22 00:00:00', 5, NULL, NULL),
(2, 1, 2, 2, '2024-10-22 00:00:00', 5, NULL, NULL),
(3, 1, 3, 2, '2024-10-23 00:00:00', 5, NULL, NULL),
(4, 1, 4, 2, '2024-10-24 00:00:00', 4, NULL, NULL),
(5, 1, 5, 2, '2024-10-25 00:00:00', 4, NULL, NULL),
(6, 2, 6, 1, '2024-10-27 00:00:00', 15, NULL, NULL),
(7, 2, 7, 3, '2024-10-27 00:00:00', 20, NULL, NULL),
(8, 2, 8, 3, '2024-10-27 00:00:00', 12, NULL, NULL),
(9, 2, 9, 1, '2024-10-28 00:00:00', 19, NULL, NULL),
(10, 2, 10, 1, '2024-10-28 00:00:00', 30, NULL, NULL),
(11, 3, 11, 1, '2024-10-30 00:00:00', 7, NULL, NULL),
(12, 3, 12, 1, '2024-10-30 00:00:00', 10, NULL, NULL),
(13, 3, 13, 1, '2024-10-30 00:00:00', 13, NULL, NULL),
(14, 3, 14, 2, '2024-10-31 00:00:00', 20, NULL, NULL),
(15, 3, 15, 2, '2024-10-31 00:00:00', 22, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS users;
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
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_barang`
--
ALTER TABLE `m_barang`
  ADD PRIMARY KEY (`barang_id`),
  ADD UNIQUE KEY `m_barang_barang_kode_unique` (`barang_kode`),
  ADD KEY `m_barang_kategori_id_index` (`kategori_id`);

--
-- Indexes for table `m_kategori`
--
ALTER TABLE `m_kategori`
  ADD PRIMARY KEY (`kategori_id`),
  ADD UNIQUE KEY `m_kategori_kategori_kode_unique` (`kategori_kode`);

--
-- Indexes for table `m_level`
--
ALTER TABLE `m_level`
  ADD PRIMARY KEY (`level_id`),
  ADD UNIQUE KEY `m_level_level_kode_unique` (`level_kode`);

--
-- Indexes for table `m_supplier`
--
ALTER TABLE `m_supplier`
  ADD PRIMARY KEY (`supplier_id`),
  ADD UNIQUE KEY `m_supplier_supplier_kode_unique` (`supplier_kode`);

--
-- Indexes for table `m_user`
--
ALTER TABLE `m_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `m_user_username_unique` (`username`),
  ADD KEY `m_user_level_id_index` (`level_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `t_penjualan`
--
ALTER TABLE `t_penjualan`
  ADD PRIMARY KEY (`penjualan_id`),
  ADD UNIQUE KEY `t_penjualan_penjualan_kode_unique` (`penjualan_kode`),
  ADD KEY `t_penjualan_user_id_index` (`user_id`);

--
-- Indexes for table `t_penjualan_detail`
--
ALTER TABLE `t_penjualan_detail`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `t_penjualan_detail_penjualan_id_index` (`penjualan_id`),
  ADD KEY `t_penjualan_detail_barang_id_index` (`barang_id`);

--
-- Indexes for table `t_stok`
--
ALTER TABLE `t_stok`
  ADD PRIMARY KEY (`stok_id`),
  ADD KEY `t_stok_supplier_id_index` (`supplier_id`),
  ADD KEY `t_stok_barang_id_index` (`barang_id`),
  ADD KEY `t_stok_user_id_index` (`user_id`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `m_barang`
--
ALTER TABLE `m_barang`
  MODIFY `barang_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `m_kategori`
--
ALTER TABLE `m_kategori`
  MODIFY `kategori_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `m_level`
--
ALTER TABLE `m_level`
  MODIFY `level_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `m_supplier`
--
ALTER TABLE `m_supplier`
  MODIFY `supplier_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `m_user`
--
ALTER TABLE `m_user`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_penjualan`
--
ALTER TABLE `t_penjualan`
  MODIFY `penjualan_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `t_penjualan_detail`
--
ALTER TABLE `t_penjualan_detail`
  MODIFY `detail_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `t_stok`
--
ALTER TABLE `t_stok`
  MODIFY `stok_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `m_barang`
--
ALTER TABLE `m_barang`
  ADD CONSTRAINT `m_barang_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `m_kategori` (`kategori_id`);

--
-- Constraints for table `m_user`
--
ALTER TABLE `m_user`
  ADD CONSTRAINT `m_user_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `m_level` (`level_id`);

--
-- Constraints for table `t_penjualan`
--
ALTER TABLE `t_penjualan`
  ADD CONSTRAINT `t_penjualan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `m_user` (`user_id`);

--
-- Constraints for table `t_penjualan_detail`
--
ALTER TABLE `t_penjualan_detail`
  ADD CONSTRAINT `t_penjualan_detail_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `m_barang` (`barang_id`),
  ADD CONSTRAINT `t_penjualan_detail_penjualan_id_foreign` FOREIGN KEY (`penjualan_id`) REFERENCES `t_penjualan` (`penjualan_id`);

--
-- Constraints for table `t_stok`
--
ALTER TABLE `t_stok`
  ADD CONSTRAINT `t_stok_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `m_barang` (`barang_id`),
  ADD CONSTRAINT `t_stok_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `m_supplier` (`supplier_id`),
  ADD CONSTRAINT `t_stok_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `m_user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
