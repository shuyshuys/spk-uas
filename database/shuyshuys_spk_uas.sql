-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 20, 2024 at 05:53 AM
-- Server version: 10.6.16-MariaDB-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shuyshuys_spk_uas`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatifs`
--

CREATE TABLE `alternatifs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alternatifs`
--

INSERT INTO `alternatifs` (`id`, `nama`, `keterangan`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Jira', 'Jira is a proprietary product developed by Atlassian that allows bug tracking, issue tracking and agile project management. Jira is used by a large number of clients and users globally for project, time, requirements, task, bug, change, code, test, release, sprint management.', 1, '2024-11-02 10:37:59', '2024-11-02 10:37:59'),
(2, 'Open Project', 'OpenProject is project management software for cloud and on-premises based companies with a focus on transparency and data sovereignty. OpenProject is open source software, released under the GNU Version 3. OpenProject is available as a free, community edition and a commercial, enterprise edition. ', 1, '2024-11-02 10:38:25', '2024-11-02 10:38:25'),
(3, 'Taiga', 'Taiga is a free and open-source project management system for startups, agile developers, and designers. Its frontend is written in AngularJS and CoffeeScript; backend, in Django and Python. Taiga is released under the AGPL-3.0-or-later license.', 1, '2024-11-02 10:39:02', '2024-11-02 10:39:02'),
(4, 'ANU', 'ANU', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `alternatif_kriterias`
--

CREATE TABLE `alternatif_kriterias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alternatif_id` bigint(20) UNSIGNED NOT NULL,
  `kriteria_id` bigint(20) UNSIGNED NOT NULL,
  `nilai` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alternatif_kriterias`
--

INSERT INTO `alternatif_kriterias` (`id`, `alternatif_id`, `kriteria_id`, `nilai`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 70, '2024-11-04 15:14:12', '2024-11-04 15:37:58'),
(2, 1, 5, 50, '2024-11-04 15:14:30', '2024-11-04 15:16:36'),
(3, 1, 2, 80, '2024-11-04 15:14:51', '2024-11-04 15:14:51'),
(4, 1, 4, 60, '2024-11-04 15:15:07', '2024-11-04 15:15:07'),
(5, 1, 3, 50, '2024-11-04 15:15:13', '2024-11-04 15:38:13'),
(6, 2, 1, 50, '2024-11-04 15:17:02', '2024-11-04 15:17:02'),
(7, 2, 5, 60, '2024-11-04 15:17:13', '2024-11-04 15:17:13'),
(8, 2, 2, 82, '2024-11-04 15:17:23', '2024-11-04 15:17:23'),
(9, 2, 4, 70, '2024-11-04 15:17:42', '2024-11-04 15:17:42'),
(10, 2, 3, 80, '2024-11-04 15:17:57', '2024-11-04 15:38:33'),
(11, 4, 1, 85, '2024-11-04 15:35:28', '2024-11-04 15:35:28'),
(12, 4, 5, 55, '2024-11-04 15:35:43', '2024-11-04 15:35:43'),
(13, 4, 2, 80, '2024-11-04 15:35:59', '2024-11-04 15:36:19'),
(14, 4, 4, 75, '2024-11-04 15:36:39', '2024-11-04 15:36:39'),
(15, 4, 3, 70, '2024-11-04 15:36:48', '2024-11-04 15:36:48'),
(16, 3, 1, 82, '2024-11-04 15:37:05', '2024-11-04 15:37:05'),
(17, 3, 5, 70, '2024-11-04 15:37:17', '2024-11-04 15:37:17'),
(18, 3, 2, 65, '2024-11-04 15:37:31', '2024-11-04 15:37:31'),
(19, 3, 4, 85, '2024-11-04 15:37:38', '2024-11-04 15:37:38'),
(20, 3, 3, 75, '2024-11-04 15:37:45', '2024-11-04 15:37:45');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('356a192b7913b04c54574d18c28d46e6395428ab', 'i:1;', 1730737106),
('356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1730737106;', 1730737106),
('a17961fa74e9275d529f489537f179c05d50c2f3', 'i:3;', 1733123808),
('a17961fa74e9275d529f489537f179c05d50c2f3:timer', 'i:1733123806;', 1733123807),
('cc06e17d061e69c5cf3f52ae9696c40b8a6e0de6', 'i:1;', 1732094623),
('cc06e17d061e69c5cf3f52ae9696c40b8a6e0de6:timer', 'i:1732094623;', 1732094623);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `hasils`
--

CREATE TABLE `hasils` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `t` varchar(255) DEFAULT NULL,
  `ci` varchar(255) DEFAULT NULL,
  `ri` varchar(255) DEFAULT NULL,
  `hasil` enum('Konsisten','Tidak Konsisten') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hasils`
--

INSERT INTO `hasils` (`id`, `user_id`, `t`, `ci`, `ri`, `hasil`, `created_at`, `updated_at`) VALUES
(1, 1, '6.0579', '0.0116', '0.0093', 'Konsisten', NULL, NULL),
(2, 2, '5.0457', '0.0114', '1.12', 'Konsisten', NULL, NULL),
(3, 3, '0', '0', '0', 'Tidak Konsisten', '2024-11-04 20:10:14', '2024-11-04 20:10:14');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `konsistensi_rasios`
--

CREATE TABLE `konsistensi_rasios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `n` int(11) NOT NULL,
  `rasio_konsistensi` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `konsistensi_rasios`
--

INSERT INTO `konsistensi_rasios` (`id`, `n`, `rasio_konsistensi`, `created_at`, `updated_at`) VALUES
(3, 0, 0, '2024-11-04 11:53:55', '2024-11-04 11:53:55'),
(4, 2, 0, '2024-11-04 14:23:27', '2024-11-04 14:23:27'),
(5, 3, 0.58, '2024-11-04 14:23:37', '2024-11-04 14:23:37'),
(6, 4, 0.9, '2024-11-04 14:23:44', '2024-11-04 14:23:44'),
(7, 5, 1.12, '2024-11-04 14:23:50', '2024-11-04 14:23:50'),
(8, 6, 1.24, '2024-11-04 14:23:59', '2024-11-04 14:23:59'),
(9, 7, 1.32, '2024-11-04 14:24:05', '2024-11-04 14:24:05'),
(10, 8, 1.41, '2024-11-04 14:24:12', '2024-11-04 14:24:12'),
(11, 9, 1.45, '2024-11-04 14:24:28', '2024-11-04 14:24:28'),
(12, 10, 1.49, '2024-11-04 14:24:36', '2024-11-04 14:24:36');

-- --------------------------------------------------------

--
-- Table structure for table `kriterias`
--

CREATE TABLE `kriterias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `bobot` float NOT NULL,
  `jenis_kriteria` enum('benefit','cost') NOT NULL,
  `keterangan` text NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kriterias`
--

INSERT INTO `kriterias` (`id`, `nama`, `bobot`, `jenis_kriteria`, `keterangan`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Tugas', 5, 'cost', '<p>Keterangan Tugas</p>', 1, '2024-11-02 10:27:42', '2024-11-02 14:15:25'),
(2, 'Kolaborasi', 2, 'benefit', 'keterangan Collaboration', 1, '2024-11-02 10:28:15', '2024-11-02 14:05:03'),
(3, 'Esensial', 3, 'benefit', 'keterangan Projects', 1, '2024-11-02 13:28:34', '2024-11-04 14:33:16'),
(4, 'Pengadaan', 2, 'benefit', '<p>Keterangan Pengadaan</p>', 1, NULL, NULL),
(5, 'Sumber Daya', 5, 'cost', '<p>siaksa</p>', 1, '2024-12-02 14:18:41', '2024-12-02 14:18:41');

-- --------------------------------------------------------

--
-- Table structure for table `matriks_keputusans`
--

CREATE TABLE `matriks_keputusans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nilai` decimal(16,14) NOT NULL,
  `kriteria_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `matriks_keputusans`
--

INSERT INTO `matriks_keputusans` (`id`, `nilai`, `kriteria_id`, `user_id`, `created_at`, `updated_at`) VALUES
(21, '0.34274000000000', 1, 1, '2024-11-04 14:15:39', '2024-11-04 14:15:39'),
(22, '0.34274000000000', 5, 1, '2024-11-04 14:15:57', '2024-11-04 14:15:57'),
(23, '0.12947000000000', 2, 1, '2024-11-04 14:16:11', '2024-11-04 14:16:11'),
(24, '0.12947000000000', 7, 1, '2024-11-04 14:16:20', '2024-11-04 14:16:20'),
(25, '0.05558000000000', 3, 1, '2024-11-04 14:16:35', '2024-11-04 14:16:35');

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
(12, '0001_01_01_000000_create_users_table', 1),
(13, '0001_01_01_000001_create_cache_table', 1),
(14, '0001_01_01_000002_create_jobs_table', 1),
(15, '2024_11_02_124836_create_kriterias_table', 1),
(16, '2024_11_02_124837_create_alternatifs_table', 1),
(17, '2024_11_02_124838_create_matriks_keputusans_table', 1),
(18, '2024_11_02_124839_create_perbandingan_kriterias_table', 1),
(19, '2024_11_02_124840_create_konsistensi_rasios_table', 1),
(21, '2024_11_02_215740_change_nilai_to_float_in_matriks_keputusans_table', 2),
(22, '0001_01_01_000000_create_users_table', 1),
(23, '0001_01_01_000001_create_cache_table', 1),
(24, '0001_01_01_000002_create_jobs_table', 1),
(25, '2024_11_02_124836_create_kriterias_table', 1),
(26, '2024_11_02_124837_create_alternatifs_table', 1),
(27, '2024_11_02_124838_create_matriks_keputusans_table', 1),
(28, '2024_11_02_124839_create_perbandingan_kriterias_table', 1),
(29, '2024_11_02_124840_create_konsistensi_rasios_table', 1),
(30, '2024_11_02_215740_change_nilai_to_float_in_matriks_keputusans_table', 1),
(31, '2024_11_04_065901_add_n_to_konsistensi_rasios_table', 1),
(32, '2024_11_04_072235_add_profile_picture_to_users_table', 1),
(33, '2024_11_04_095414_create_hasils_table', 1),
(34, '2024_11_04_141047_delete_alternatif_id_from_matriks_keputusans_table', 3),
(36, '2024_11_04_145733_create_alternatif_kriterias_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `perbandingan_kriterias`
--

CREATE TABLE `perbandingan_kriterias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nilai_perbandingan` double NOT NULL,
  `kriteria1_id` bigint(20) UNSIGNED NOT NULL,
  `kriteria2_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perbandingan_kriterias`
--

INSERT INTO `perbandingan_kriterias` (`id`, `nilai_perbandingan`, `kriteria1_id`, `kriteria2_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2024-11-02 14:03:07', '2024-11-06 05:03:45'),
(2, 0.2, 5, 1, '2024-11-02 14:06:50', '2024-11-26 01:23:29'),
(3, 1, 2, 1, '2024-11-02 14:07:05', '2024-11-26 01:23:23'),
(4, 0.33, 4, 1, '2024-11-02 14:07:24', '2024-11-26 01:23:27'),
(5, 0.33, 3, 1, '2024-11-02 14:07:33', '2024-11-26 01:23:25'),
(6, 5, 1, 5, '2024-11-02 14:07:47', '2024-11-26 01:23:22'),
(7, 1, 5, 5, '2024-11-02 14:08:03', '2024-11-02 14:08:03'),
(8, 5, 2, 5, '2024-11-02 14:08:23', '2024-11-26 01:23:25'),
(9, 3, 4, 5, '2024-11-02 14:08:32', '2024-11-26 01:23:29'),
(10, 3, 3, 5, '2024-11-02 14:08:44', '2024-11-26 01:23:27'),
(11, 1, 1, 2, '2024-11-02 14:10:25', '2024-11-26 01:23:21'),
(12, 0.2, 5, 2, '2024-11-02 14:10:37', '2024-11-26 01:23:30'),
(13, 1, 2, 2, '2024-11-02 14:10:46', '2024-11-02 14:10:46'),
(14, 0.33, 4, 2, '2024-11-02 14:11:02', '2024-11-26 01:23:28'),
(15, 0.33, 3, 2, '2024-11-02 14:11:12', '2024-11-26 01:23:26'),
(16, 3, 1, 4, '2024-11-02 14:11:44', '2024-11-26 01:23:22'),
(17, 0.33, 5, 4, '2024-11-02 14:12:02', '2024-11-02 14:12:02'),
(18, 3, 2, 4, '2024-11-02 14:12:15', '2024-11-26 01:23:24'),
(19, 1, 4, 4, '2024-11-02 14:12:28', '2024-11-02 14:12:28'),
(20, 1, 3, 4, '2024-11-02 14:12:52', '2024-11-26 01:23:26'),
(21, 3, 1, 3, '2024-11-02 14:13:38', '2024-11-26 01:23:21'),
(22, 0.33, 5, 3, '2024-11-02 14:13:57', '2024-11-26 01:23:30'),
(23, 3, 2, 3, '2024-11-02 14:14:07', '2024-11-26 01:23:24'),
(24, 1, 4, 3, '2024-11-02 14:14:19', '2024-11-26 01:23:28'),
(25, 1, 3, 3, '2024-11-02 14:14:37', '2024-11-02 14:14:37');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('ux01MzlOHXVaXG1Gh0fjRsg3nizQ3WCahOBy2GH3', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiejF4SjdmSEdmMUdKNDc0NEhUaGtnSTJzWkdublYzZlpOUkhMc2dFbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wZXJiYW5kaW5nYW4ta3JpdGVyaWEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1734673379);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `role` enum('admin','user_input','viewer') NOT NULL DEFAULT 'user_input',
  `profile_picture` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `username`, `password`, `remember_token`, `role`, `profile_picture`, `created_at`, `updated_at`) VALUES
(1, 'Ahmad Yazid Isnandar', 'admin@gmail.com', NULL, '129', '$2y$12$C70It5g5097W.pko8OcD8u9fb3SKjAufG0n192oxJuHrKnqow2uBG', '', 'admin', '/assets/images/user/pp.jpg', '2024-11-02 10:11:24', '2024-11-02 10:11:24'),
(2, 'Dimas Fajri Pamungkas', '21082010058@student.upnjatim.ac.id', NULL, '058', '$2y$12$C70It5g5097W.pko8OcD8u9fb3SKjAufG0n192oxJuHrKnqow2uBG', NULL, 'admin', '/assets/images/user/1.jpg', '2024-11-04 19:56:39', '2024-11-04 19:56:39'),
(3, 'Jonathan Devrinno', '21082010204@student.upnjatim.ac.id', NULL, '204', '$2y$12$C70It5g5097W.pko8OcD8u9fb3SKjAufG0n192oxJuHrKnqow2uBG', NULL, 'admin', '/assets/images/user/user-1.jpg', '2024-11-03 20:08:58', '2024-11-03 20:08:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatifs`
--
ALTER TABLE `alternatifs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alternatif_kriterias`
--
ALTER TABLE `alternatif_kriterias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hasils`
--
ALTER TABLE `hasils`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `konsistensi_rasios`
--
ALTER TABLE `konsistensi_rasios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriterias`
--
ALTER TABLE `kriterias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matriks_keputusans`
--
ALTER TABLE `matriks_keputusans`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `perbandingan_kriterias`
--
ALTER TABLE `perbandingan_kriterias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `alternatifs`
--
ALTER TABLE `alternatifs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `alternatif_kriterias`
--
ALTER TABLE `alternatif_kriterias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hasils`
--
ALTER TABLE `hasils`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `konsistensi_rasios`
--
ALTER TABLE `konsistensi_rasios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kriterias`
--
ALTER TABLE `kriterias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `matriks_keputusans`
--
ALTER TABLE `matriks_keputusans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `perbandingan_kriterias`
--
ALTER TABLE `perbandingan_kriterias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
