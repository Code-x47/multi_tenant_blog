-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2025 at 07:47 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multi_tenant_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_04_04_174826_create_tenants_table', 1),
(5, '2025_04_04_174846_create_posts_table', 1),
(6, '2025_04_05_062850_remove_user_id_from_tenants_table', 2),
(7, '2025_04_05_072210_add_tenant_id_to_users_table', 3),
(8, '2025_04_05_072259_add_status_to_users_table', 4),
(9, '2025_04_05_072340_create_tenants_table', 4),
(10, '2025_04_06_044749_remove_tenant_id_from_users_table', 5),
(11, '2025_04_06_050149_add_tenant_name_to_users', 6),
(12, '2025_04_06_050250_add_subdomain_to_users', 7),
(13, '2025_04_06_050336_add_user_id_to_tenants', 7),
(14, '2025_04_07_184232_make_tenant_name_nullable_in_users_table', 8),
(15, '2025_04_07_184622_make_subdomain_nullable_in_users_table', 9),
(16, '2025_04_07_221044_create_posts_table', 10),
(17, '2025_04_08_055230_create_personal_access_tokens_table', 11);

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
(1, 'App\\Models\\User', 7, 'API Token', 'b1a053b596aad1bc9f1bf27122d8b1a0846a3e372ea67ddcf6d74a0bb272bd88', '[\"*\"]', NULL, NULL, '2025-04-08 14:01:54', '2025-04-08 14:01:54'),
(3, 'App\\Models\\User', 7, 'API Token', '83104074b6c75bb7fa2e3f13491fede5e55ff6fda26d09a516e88b4e21385868', '[\"*\"]', '2025-04-08 14:58:08', NULL, '2025-04-08 14:45:17', '2025-04-08 14:58:08'),
(5, 'App\\Models\\User', 7, 'API Token', 'b10c6f2e58b387bfd76ef601a9172b0dac956f756d0fd7c0f260919c3d6b407c', '[\"*\"]', NULL, NULL, '2025-04-08 15:00:00', '2025-04-08 15:00:00'),
(11, 'App\\Models\\User', 9, 'API Token', '437bf3a220c3ecc4008458d5e08aadde07b9c1f0ddde0dc4fabd90e0e9b938f9', '[\"*\"]', NULL, NULL, '2025-04-08 17:16:31', '2025-04-08 17:16:31'),
(13, 'App\\Models\\User', 7, 'API Token', '34ad10d00f4ae85acb24e3e4405f97e3491c11a3fbd1100551bd271e7a0023f8', '[\"*\"]', NULL, NULL, '2025-04-08 17:47:59', '2025-04-08 17:47:59'),
(15, 'App\\Models\\User', 7, 'API Token', 'a16e2444aa420c5f987353d9a5e55dde0228f3862d3bd6c623919b5fbec23384', '[\"*\"]', NULL, NULL, '2025-04-08 18:21:19', '2025-04-08 18:21:19');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tenant_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `user_id`, `tenant_id`, `created_at`, `updated_at`) VALUES
(1, 'Tech Update', 'You Can Connect Your phone camera wirelessly for streaming on V-Mix.', 8, 6, '2025-04-08 05:13:14', '2025-04-09 12:50:30'),
(2, 'Tech Updates', 'Easy Worship Has Released Its Newest version with great updates.', 8, 6, '2025-04-08 05:14:12', '2025-04-08 05:14:12'),
(3, 'Laravel Updates', 'React Js seems to have become more popular than Vue Js and Livewire. Devs Are Advised to learn React Js for a higher job prospect.', 7, 5, '2025-04-08 05:30:17', '2025-04-08 05:30:17'),
(5, 'Tech Update', 'React Js seems to have become more popular than Vue Js and Livewire. Devs Are Advised to learn React Js for a higher job prospect.', 7, 5, '2025-04-09 08:19:54', '2025-04-09 08:19:54'),
(11, 'I am A super User', 'It Feel Good To Here', 14, 9, '2025-04-09 09:18:47', '2025-04-09 09:18:47');

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
('Dw1AKq1AkO5gQljHCIB3TkONNeDc8NLDjAa3eWJL', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaTF2TGZ6ajFTYXZkU3llQWtmaHdEVUNwQWpLMzVHZ1BlVDNxeE5zTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c2VybG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjQ6ImRhdGEiO3M6MjA6Imdvc3NpcG1pbGxAZ21haWwuY29tIjt9', 1744211516),
('lZfpdaoG4gQXQh2tMDH5nxHuqg08ty0CnqqP8ZAW', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidXdPM3JHR29qcUc3TWNIMnIzZXZGTlRlaFh3ZmN6RDVpVW9ZSVpoYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c2VybG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjQ6ImRhdGEiO3M6MTU6ImFkbWluQGdtYWlsLmNvbSI7fQ==', 1744179624);

-- --------------------------------------------------------

--
-- Table structure for table `tenants`
--

CREATE TABLE `tenants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tenant_name` varchar(255) NOT NULL,
  `subdomain` varchar(255) NOT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tenants`
--

INSERT INTO `tenants` (`id`, `tenant_name`, `subdomain`, `status`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'user_1', 'user_1_company', 'pending', '2025-04-05 15:19:49', '2025-04-05 15:19:49', NULL),
(2, 'User_2', 'User_2 Blogs', 'pending', '2025-04-06 10:58:12', '2025-04-06 10:58:12', NULL),
(3, 'User_3', 'User_3 Blogs', 'pending', '2025-04-06 11:04:17', '2025-04-06 11:04:17', NULL),
(4, 'User_4', 'User_4 Blogs', 'approved', '2025-04-06 11:16:52', '2025-04-06 11:25:31', NULL),
(5, 'User_5', 'User_5 Gists', 'approved', '2025-04-06 12:27:22', '2025-04-09 07:37:31', 7),
(6, 'User_6 Pro', 'user_6 Pro Services', 'approved', '2025-04-08 04:20:06', '2025-04-09 07:37:01', 8),
(7, 'User_7', 'User_7 Blogs', 'approved', '2025-04-08 04:22:30', '2025-04-09 12:53:44', 12),
(9, 'super_user_inc', 'super_user_inc', 'approved', '2025-04-09 09:17:36', '2025-04-09 09:17:36', 14);

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
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `tenant_name` varchar(255) DEFAULT NULL,
  `subdomain` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`, `status`, `tenant_name`, `subdomain`) VALUES
(7, 'user5', 'user5@gmail.com', NULL, '$2y$12$8.vySiH5gnDztnufWBUjy.Tbz4uQoqdwvtbuSrkmRlwBmeC1eQ3qu', 'user', NULL, '2025-04-06 12:25:28', '2025-04-09 07:37:31', 'approved', 'User_5', 'User_5 Gists'),
(8, 'User6', 'user6@gmail.com', NULL, '$2y$12$7qwXsPxXxZB5JLDSqs5gJuQc/l4t/.B.TRL0Xje6rjW5T3sZyNlCu', 'user', NULL, '2025-04-06 12:29:11', '2025-04-09 07:37:01', 'approved', 'User_6 Pro', 'user_6 Pro Services'),
(9, 'Admin', 'admin@gmail.com', NULL, '$2y$12$NoSY9lesk4OVc3YnykiMSuZ/DGYwx2d2L7.jnsP4NB2yW99QqNUq.', 'admin', NULL, '2025-04-08 01:54:37', '2025-04-08 01:57:15', 'approved', NULL, NULL),
(12, 'User7', 'user7@gmail.com', NULL, '$2y$12$kGgVvn9EQL1VsYJJw1m2ke8fO5VqPRt6W0kdpzrlcgRWsMZLi5LJy', 'user', NULL, '2025-04-08 04:21:46', '2025-04-09 12:53:44', 'approved', 'User_7', 'User_7 Blogs'),
(14, 'super_user', 'super_user@gmail.com', NULL, '$2y$12$tKoL5Xeg71JC/Gl8JRz01OeK.xG1sTRZujkxnQ.OTqFJDU3W0ZWMy', 'user', NULL, '2025-04-09 09:17:08', '2025-04-09 09:17:36', 'approved', 'super_user_inc', 'super_user_inc'),
(15, 'Random User', 'randomuser@gmail.com', NULL, '$2y$12$p6VaZ8RmgcaPFoodADDd1esEx4b1IaZ9nZ4iklC/29Aue0TfeqlYm', 'user', NULL, '2025-04-09 20:43:55', '2025-04-09 20:43:55', 'pending', 'RandomUsers_Assoc', 'RandomUsers_Assoc'),
(16, 'Gossip Mill', 'gossipmill@gmail.com', NULL, '$2y$12$Vr7Xxo5zsKQYpqkic8V9f.gPi1Coe3HPyS4qa0aALJOnxJTjK74f.', 'user', NULL, '2025-04-09 20:49:42', '2025-04-09 20:49:42', 'pending', 'Gossip Mill', 'Gossip Mill');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`),
  ADD KEY `posts_tenant_id_foreign` (`tenant_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tenants`
--
ALTER TABLE `tenants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tenants_subdomain_unique` (`subdomain`),
  ADD KEY `tenants_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_subdomain_unique` (`subdomain`);

--
-- AUTO_INCREMENT for dumped tables
--

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tenants`
--
ALTER TABLE `tenants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `tenants` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tenants`
--
ALTER TABLE `tenants`
  ADD CONSTRAINT `tenants_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
