-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2025 at 06:44 PM
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
-- Database: `laravel_demo_2`
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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

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
(14, 'App\\Models\\User', 3, 'vito t1 5g', '9cab2f82aa2e366fce08da40bfd5fb7cc04cd8ec92768ee87d9698e604fbfb00', '[\"*\"]', '2024-11-01 13:21:14', '2024-11-01 14:21:01', '2024-11-01 13:21:01', '2024-11-01 13:21:14'),
(15, 'App\\Models\\User', 3, 'vito t1 5g', 'ceb29f7cc868aee495afc6f136e92710469027e3f1c95009fedfb0e67fee5941', '[\"*\"]', '2025-01-20 07:31:08', '2025-01-20 08:30:21', '2025-01-20 07:30:22', '2025-01-20 07:31:08');

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

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `firstname`, `lastname`, `email`, `gender`, `phone`, `updated_at`, `created_at`) VALUES
(1, 'Kaushal', 'Kapadiya', 'kaushal@gmail.com', 'm', '9505458058', '2024-08-27 06:27:45', '2024-08-27 06:27:45'),
(2, 'Dharmik', 'Kapadiya', 'kaushal@gmail.com', 'm', '9505458058', '2024-08-27 06:27:45', '2024-08-27 06:27:45'),
(3, 'Rohit', 'Sharma', 'kaushal@gmail.com', 'm', '9505458058', '2024-08-27 06:27:45', '2024-08-27 06:27:45'),
(4, 'Anushka', 'Sharma', 'kaushal@gmail.com', 'f', '9505458058', '2024-08-27 06:27:45', '2024-08-27 06:27:45'),
(5, 'Virat', 'Kohli', 'kaushal@gmail.com', 'm', '9505458058', '2024-08-27 06:27:45', '2024-08-27 06:27:45'),
(6, 'Amisha', 'Patel', 'kaushal@gmail.com', 'f', '9505458058', '2024-08-27 06:27:45', '2024-08-27 06:27:45'),
(7, 'Urvashi', 'Routela', 'kaushal@gmail.com', 'f', '9505458058', '2024-08-27 06:27:45', '2024-08-27 06:27:45'),
(8, 'Kaushal', 'Kapadiya', 'kaushal@gmail.com', 'm', '9505458058', '2024-08-27 06:27:45', '2024-08-27 06:27:45'),
(9, 'Kaushal', 'Kapadiya', 'kaushal@gmail.com', 'm', '9505458058', '2024-08-27 06:27:45', '2024-08-27 06:27:45'),
(10, 'Kaushal', 'Kapadiya', 'kaushal@gmail.com', 'm', '9505458058', '2024-08-27 06:27:45', '2024-08-27 06:27:45'),
(11, 'Kaushal', 'Kapadiya', 'kaushal@gmail.com', 'm', '9505458058', '2024-08-27 06:27:45', '2024-08-27 06:27:45'),
(12, 'Kaushal', 'Kapadiya', 'kaushal@gmail.com', 'm', '9505458058', '2024-08-27 06:27:45', '2024-08-27 06:27:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `user_type` enum('superadmin','admin','user') NOT NULL DEFAULT 'user',
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `profile_photo` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_type`, `firstname`, `lastname`, `email`, `email_verified_at`, `profile_photo`, `password`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'superadmin', 'Admin', '', 'admin@adminmail.com', NULL, '', '$2a$12$6rLFfiuczGOMmzU71.a6xeu9xtcrDxDsR86k41CiUUztdgvM9TTDG', NULL, NULL, '2025-01-26 17:56:33', '2025-01-26 17:56:37'),
(2, NULL, 'user', 'Kaushal', 'Kapadiya', 'kaushalkapadiya33@gmail.com', NULL, '', '$2y$10$bTZZjyXZ73V7GwovK.82U.G.trBg9TYgRlixCvgRSZnch8PZwbNOy', NULL, NULL, '2024-11-01 11:34:28', '2024-11-01 11:34:28'),
(3, NULL, 'user', 'Kaushal', 'Kapadiya', 'kaushalkapadiya34@gmail.com', NULL, '', '$2y$10$bTZZjyXZ73V7GwovK.82U.G.trBg9TYgRlixCvgRSZnch8PZwbNOy', NULL, NULL, '2024-11-01 11:34:28', '2024-11-01 11:34:28'),
(5, 'kaushal', 'user', 'Kaushal', 'Kanabar', 'kaushalkapadiya@gmail.com', NULL, 'kaushal.jpg', '$2y$10$lce50ICVlxMApjskTSOdAO78HxmObfkEnrygdnMVshfEJsT1Rki8S', NULL, NULL, '2025-01-26 17:56:00', '2025-01-26 17:56:08'),
(7, NULL, 'user', 'John', 'Doe', 'john.doe@example.com', NULL, '', '', NULL, NULL, '2025-01-28 19:12:00', '2025-01-28 19:12:00'),
(8, NULL, 'user', 'Jane', 'Smith', 'jane.smith@example.com', NULL, '', '', NULL, NULL, '2025-01-28 19:12:00', '2025-01-28 19:12:00'),
(9, NULL, 'user', 'Michael', 'Brown', 'michael.brown@example.com', NULL, '', '', NULL, NULL, '2025-01-28 19:12:00', '2025-01-28 19:12:00'),
(10, NULL, 'user', 'Emily', 'Johnson', 'emily.johnson@example.com', NULL, '', '', NULL, NULL, '2025-01-28 19:12:00', '2025-01-28 19:12:00'),
(11, NULL, 'user', 'Chris', 'Williams', 'chris.williams@example.com', NULL, '', '', NULL, NULL, '2025-01-28 19:12:00', '2025-01-28 19:12:00'),
(12, NULL, 'user', 'Sarah', 'Jones', 'sarah.jones@example.com', NULL, '', '', NULL, NULL, '2025-01-28 19:12:00', '2025-01-28 19:12:00'),
(13, NULL, 'user', 'Daniel', 'Miller', 'daniel.miller@example.com', NULL, '', '', NULL, NULL, '2025-01-28 19:12:00', '2025-01-28 19:12:00'),
(14, NULL, 'user', 'Sophia', 'Davis', 'sophia.davis@example.com', NULL, '', '', NULL, NULL, '2025-01-28 19:12:00', '2025-01-28 19:12:00'),
(15, NULL, 'user', 'Matthew', 'Garcia', 'matthew.garcia@example.com', NULL, '', '', NULL, NULL, '2025-01-28 19:12:00', '2025-01-28 19:12:00'),
(16, NULL, 'user', 'Olivia', 'Martinez', 'olivia.martinez@example.com', NULL, '', '', NULL, NULL, '2025-01-28 19:12:00', '2025-01-28 19:12:00'),
(17, NULL, 'user', 'David', 'Hernandez', 'david.hernandez@example.com', NULL, '', '', NULL, NULL, '2025-01-28 19:12:00', '2025-01-28 19:12:00'),
(18, NULL, 'user', 'Emma', 'Lopez', 'emma.lopez@example.com', NULL, '', '', NULL, NULL, '2025-01-28 19:12:00', '2025-01-28 19:12:00'),
(19, NULL, 'user', 'Andrew', 'Gonzalez', 'andrew.gonzalez@example.com', NULL, '', '', NULL, NULL, '2025-01-28 19:12:00', '2025-01-28 19:12:00'),
(20, NULL, 'user', 'Ava', 'Wilson', 'ava.wilson@example.com', NULL, '', '', NULL, NULL, '2025-01-28 19:12:00', '2025-01-28 19:12:00'),
(21, NULL, 'user', 'Joshua', 'Anderson', 'joshua.anderson@example.com', NULL, '', '', NULL, NULL, '2025-01-28 19:12:00', '2025-01-28 19:12:00'),
(22, NULL, 'user', 'Mia', 'Thomas', 'mia.thomas@example.com', NULL, '', '', NULL, NULL, '2025-01-28 19:12:00', '2025-01-28 19:12:00'),
(23, NULL, 'user', 'Ryan', 'Taylor', 'ryan.taylor@example.com', NULL, '', '', NULL, NULL, '2025-01-28 19:12:00', '2025-01-28 19:12:00'),
(24, NULL, 'user', 'Isabella', 'Moore', 'isabella.moore@example.com', NULL, '', '', NULL, NULL, '2025-01-28 19:12:00', '2025-01-28 19:12:00'),
(25, NULL, 'user', 'James', 'White', 'james.white@example.com', NULL, '', '', NULL, NULL, '2025-01-28 19:12:00', '2025-01-28 19:12:00'),
(26, NULL, 'user', 'Charlotte', 'Harris', 'charlotte.harris@example.com', NULL, '', '', NULL, NULL, '2025-01-28 19:12:00', '2025-01-28 19:12:00'),
(27, NULL, 'user', 'Alexander', 'Clark', 'alexander.clark@example.com', NULL, '', '', NULL, NULL, '2025-01-28 19:12:00', '2025-01-28 19:12:00'),
(28, NULL, 'user', 'Amelia', 'Lewis', 'amelia.lewis@example.com', NULL, '', '', NULL, NULL, '2025-01-28 19:12:00', '2025-01-28 19:12:00'),
(29, NULL, 'user', 'Ethan', 'Young', 'ethan.young@example.com', NULL, '', '', NULL, NULL, '2025-01-28 19:12:00', '2025-01-28 19:12:00'),
(30, NULL, 'user', 'Abigail', 'Hall', 'abigail.hall@example.com', NULL, '', '', NULL, NULL, '2025-01-28 19:12:00', '2025-01-28 19:12:00'),
(31, NULL, 'user', 'Noah', 'Allen', 'noah.allen@example.com', NULL, '', '', NULL, NULL, '2025-01-28 19:12:00', '2025-01-28 19:12:00'),
(32, NULL, 'user', 'Chloe', 'Scott', 'chloe.scott@example.com', NULL, '', '', NULL, NULL, '2025-01-28 19:12:00', '2025-01-28 19:12:00'),
(33, NULL, 'user', 'Liam', 'King', 'liam.king@example.com', NULL, '', '', NULL, NULL, '2025-01-28 19:12:00', '2025-01-28 19:12:00'),
(34, NULL, 'user', 'Ella', 'Green', 'ella.green@example.com', NULL, '', '', NULL, NULL, '2025-01-28 19:12:00', '2025-01-28 19:12:00'),
(35, NULL, 'user', 'Benjamin', 'Baker', 'benjamin.baker@example.com', NULL, '', '', NULL, NULL, '2025-01-28 19:12:00', '2025-01-28 19:12:00'),
(36, NULL, 'user', 'Grace', 'Adams', 'grace.adams@example.com', NULL, '', '', NULL, NULL, '2025-01-28 19:12:00', '2025-01-28 19:12:00'),
(37, NULL, 'user', 'Jackson', 'Nelson', 'jackson.nelson@example.com', NULL, '', '', NULL, NULL, '2025-01-28 19:12:00', '2025-01-28 19:12:00'),
(38, NULL, 'user', 'Hannah', 'Hill', 'hannah.hill@example.com', NULL, '', '', NULL, NULL, '2025-01-28 19:12:00', '2025-01-28 19:12:00'),
(39, NULL, 'user', 'Samuel', 'Ramirez', 'samuel.ramirez@example.com', NULL, '', '', NULL, NULL, '2025-01-28 19:12:00', '2025-01-28 19:12:00'),
(40, NULL, 'user', 'Lily', 'Campbell', 'lily.campbell@example.com', NULL, '', '', NULL, NULL, '2025-01-28 19:12:00', '2025-01-28 19:12:00'),
(41, NULL, 'user', 'Logan', 'Mitchell', 'logan.mitchell@example.com', NULL, '', '', NULL, NULL, '2025-01-28 19:12:00', '2025-01-28 19:12:00'),
(42, NULL, 'user', 'Sofia', 'Perez', 'sofia.perez@example.com', NULL, '', '', NULL, NULL, '2025-01-28 19:12:00', '2025-01-28 19:12:00'),
(43, NULL, 'user', 'Jacob', 'Roberts', 'jacob.roberts@example.com', NULL, '', '', NULL, NULL, '2025-01-28 19:12:00', '2025-01-28 19:12:00'),
(44, NULL, 'user', 'Avery', 'Carter', 'avery.carter@example.com', NULL, '', '', NULL, NULL, '2025-01-28 19:12:00', '2025-01-28 19:12:00'),
(45, NULL, 'user', 'Elijah', 'Phillips', 'elijah.phillips@example.com', NULL, '', '', NULL, NULL, '2025-01-28 19:12:00', '2025-01-28 19:12:00'),
(46, NULL, 'user', 'Aria', 'Evans', 'aria.evans@example.com', NULL, '', '', NULL, NULL, '2025-01-28 19:12:00', '2025-01-28 19:12:00'),
(47, NULL, 'user', 'Henry', 'Turner', 'henry.turner@example.com', NULL, '', '', NULL, NULL, '2025-01-28 19:12:00', '2025-01-28 19:12:00'),
(48, NULL, 'user', 'Scarlett', 'Torres', 'scarlett.torres@example.com', NULL, '', '', NULL, NULL, '2025-01-28 19:12:00', '2025-01-28 19:12:00'),
(49, NULL, 'user', 'Owen', 'Parker', 'owen.parker@example.com', NULL, '', '', NULL, NULL, '2025-01-28 19:12:00', '2025-01-28 19:12:00'),
(50, NULL, 'user', 'Penelope', 'Collins', 'penelope.collins@example.com', NULL, '', '', NULL, NULL, '2025-01-28 19:12:00', '2025-01-28 19:12:00'),
(51, NULL, 'user', 'Lucas', 'Edwards', 'lucas.edwards@example.com', NULL, '', '', NULL, NULL, '2025-01-28 19:12:00', '2025-01-28 19:12:00'),
(52, NULL, 'user', 'Victoria', 'Stewart', 'victoria.stewart@example.com', NULL, '', '', NULL, NULL, '2025-01-28 19:12:00', '2025-01-28 19:12:00'),
(53, NULL, 'user', 'Carter', 'Morris', 'carter.morris@example.com', NULL, '', '', NULL, NULL, '2025-01-28 19:12:00', '2025-01-28 19:12:00'),
(54, NULL, 'user', 'Layla', 'Bell', 'layla.bell@example.com', NULL, '', '', NULL, NULL, '2025-01-28 19:12:00', '2025-01-28 19:12:00'),
(55, NULL, 'user', 'Wyatt', 'Rivera', 'wyatt.rivera@example.com', NULL, '', '', NULL, NULL, '2025-01-28 19:12:00', '2025-01-28 19:12:00'),
(56, NULL, 'user', 'Zoe', 'Lee', 'zoe.lee@example.com', NULL, '', '', NULL, NULL, '2025-01-28 19:12:00', '2025-01-28 19:12:00');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
