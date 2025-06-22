-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2025 at 01:04 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cmpsys2`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int(11) NOT NULL,
  `uuid` text DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  `subject` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `techie_id` bigint(20) DEFAULT NULL,
  `status` enum('open','inprogress','unavailable','resolved','closed') NOT NULL DEFAULT 'open',
  `deleted_at` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `uuid`, `user_id`, `subject`, `description`, `techie_id`, `status`, `deleted_at`, `updated_at`, `created_at`) VALUES
(1, NULL, 58, 'My complaint', 'here v r', 60, 'resolved', NULL, '2025-06-22 06:58:10', '2025-06-21 12:01:35'),
(2, NULL, 58, 'My complaint', 'here v r', NULL, 'open', NULL, '2025-06-21 12:02:03', '2025-06-21 12:02:03'),
(3, NULL, 58, 'My complaint', 'here v r', NULL, 'open', '2025-06-22 09:12:35', '2025-06-22 09:12:35', '2025-06-21 12:02:03'),
(4, NULL, 58, 'My complaint', 'here v r', NULL, 'open', NULL, '2025-06-21 12:02:03', '2025-06-21 12:02:03'),
(5, NULL, 63, 'AC not working', 'flights AC not working', NULL, 'open', NULL, '2025-06-22 10:44:26', '2025-06-22 10:44:26'),
(6, NULL, 63, 'AC not working', 'Engines make noise', NULL, 'open', NULL, '2025-06-22 10:46:16', '2025-06-22 10:45:16');

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
(5, '2024_05_18_082127_create_jobs_table', 2);

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

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(16, 'App\\Models\\User', 58, '', '2b21037321d3ac93b90fbbbffbfa7a3567c39333026bddb5f2ae8fc59df9c03a', '[\"*\"]', NULL, NULL, '2025-06-21 05:26:27', '2025-06-21 05:26:27'),
(17, 'App\\Models\\User', 58, '', '9ebf31b3baf3532f4b3b8b30f655c0fbd145d36679bc49cd946e9862c6bff0a7', '[\"*\"]', '2025-06-21 06:32:03', NULL, '2025-06-21 05:39:13', '2025-06-21 06:32:03'),
(18, 'App\\Models\\User', 58, '', '473806771ba6824b2b1d94ea4bac34d86f54b4fb6c2b4a352993b1186b9d75d4', '[\"*\"]', NULL, NULL, '2025-06-21 05:49:57', '2025-06-21 05:49:57'),
(19, 'App\\Models\\User', 58, '', '2504e3c22ebcd4653cc85a6cd2e76acb843ac5d90af316c3825f0c25f1dbbc2d', '[\"*\"]', '2025-06-21 09:02:31', NULL, '2025-06-21 08:15:21', '2025-06-21 09:02:31'),
(20, 'App\\Models\\User', 58, '', '16fe1c93f746e0fc2146d618edb4e239d09f345c6c41f7e5014242d974bdaf84', '[\"*\"]', '2025-06-21 10:27:23', NULL, '2025-06-21 09:44:44', '2025-06-21 10:27:23'),
(21, 'App\\Models\\User', 58, '', '1378fc36551fa29bf716552885cd9a0bdd1306a11218683656455dd93dcc9848', '[\"*\"]', NULL, NULL, '2025-06-21 10:58:14', '2025-06-21 10:58:14'),
(22, 'App\\Models\\User', 58, '', 'a60769f510619ddf5c7b664b384b5128c14b70c59f9748a5c2cba44ac827b130', '[\"*\"]', '2025-06-22 00:01:31', NULL, '2025-06-21 23:29:13', '2025-06-22 00:01:31'),
(23, 'App\\Models\\User', 58, '', '5be85184c4c08a8e8f66af49e8662c7e5373e954f5a2acf8fdfba52234ad2ca9', '[\"*\"]', '2025-06-22 01:21:41', NULL, '2025-06-22 01:18:57', '2025-06-22 01:21:41'),
(24, 'App\\Models\\User', 60, '', '2648f56fc730eb72b6acdb0856d3324f713e18c061343cd918a554be9d7fc694', '[\"*\"]', '2025-06-22 01:29:18', NULL, '2025-06-22 01:22:28', '2025-06-22 01:29:18'),
(25, 'App\\Models\\User', 60, '', '128429dabe6f89202b1f2df9eefb17b67a5e776b214e31d7e3211b443853325d', '[\"*\"]', '2025-06-22 03:21:02', NULL, '2025-06-22 02:37:49', '2025-06-22 03:21:02'),
(26, 'App\\Models\\User', 1, '', '21bbf6fae877ac3ac2e599677df64ad3099a18447fbabf96ad4d4cfbc22dc475', '[\"*\"]', '2025-06-22 03:43:32', NULL, '2025-06-22 03:22:02', '2025-06-22 03:43:32'),
(27, 'App\\Models\\User', 58, '', 'b769024907c022297862e3b4883dbbab2d2e0f9fd7df0a9fd090a3506f1db8b5', '[\"*\"]', '2025-06-22 04:16:40', NULL, '2025-06-22 03:44:35', '2025-06-22 04:16:40'),
(28, 'App\\Models\\User', 63, '', '5869300c6485515470cddc478349f081ef2db5b92e8858f66c7376b88ea847b1', '[\"*\"]', '2025-06-22 05:16:54', NULL, '2025-06-22 05:13:20', '2025-06-22 05:16:54');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` enum('m','f') NOT NULL,
  `phone` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `user_type` enum('superadmin','admin','user','techie') NOT NULL DEFAULT 'user',
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uuid`, `name`, `user_type`, `firstname`, `lastname`, `email`, `email_verified_at`, `password`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'admin', 'Admin', '', 'admin@adminmail.com', NULL, '$2y$10$rnk6rjzCZxHiM4yYSUCgwei.864hhVLGL548Bla3A.mROOiCclbzO', NULL, NULL, '2025-06-21 05:22:59', '2025-06-21 05:22:59'),
(58, NULL, NULL, 'user', 'Kaushal', 'Kapadiya', 'kaushalkapadiya@gmail.com', NULL, '$2y$10$rnk6rjzCZxHiM4yYSUCgwei.864hhVLGL548Bla3A.mROOiCclbzO', NULL, NULL, '2025-06-21 05:22:59', '2025-06-21 05:22:59'),
(59, NULL, NULL, 'user', 'Rohit', 'Sharma', 'rohit@gmail.com', NULL, '$2y$10$rnk6rjzCZxHiM4yYSUCgwei.864hhVLGL548Bla3A.mROOiCclbzO', NULL, NULL, '2025-06-21 05:22:59', '2025-06-21 05:22:59'),
(60, NULL, NULL, 'techie', 'Virat', 'Kohli', 'virat@gmail.com', NULL, '$2y$10$rnk6rjzCZxHiM4yYSUCgwei.864hhVLGL548Bla3A.mROOiCclbzO', NULL, NULL, '2025-06-21 05:22:59', '2025-06-21 05:22:59'),
(62, NULL, 'Rishabh', 'techie', 'Rishabh', 'Pant', 'pant@gmail.com', NULL, '$2y$10$rnk6rjzCZxHiM4yYSUCgwei.864hhVLGL548Bla3A.mROOiCclbzO', NULL, NULL, '2025-06-21 05:22:59', '2025-06-21 05:22:59'),
(63, NULL, NULL, 'user', 'Nora', 'Fatehi', 'nora@gmail.com', NULL, '$2y$10$HAJebQ2UiyJQwMJ2GSg8tOz0DJLIviH6xaz1263uiJaQceEmupd..', NULL, NULL, '2025-06-22 05:12:58', '2025-06-22 05:12:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

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
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
