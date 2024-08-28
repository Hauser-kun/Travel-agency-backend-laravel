-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 28, 2024 at 08:14 PM
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
-- Database: `pgd_guest`
--

-- --------------------------------------------------------

--
-- Table structure for table `articals`
--

CREATE TABLE `articals` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articals`
--

INSERT INTO `articals` (`id`, `title`, `details`, `description`, `slug`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, 'rider', 'Doctor', 'cats', 'Reprehenderit vel a', '1724702851.jpg', 0, '2024-08-26 13:40:13', '2024-08-26 14:22:38'),
(3, 'Eu tempora maiores o', 'Ipsa in voluptatem', 'Amet sed nostrud te', 'Mollitia in aperiam', '1724737029.jpg', 0, '2024-08-26 23:52:09', '2024-08-27 15:13:35'),
(4, 'this', 'is', 'dummy', 'test', '1724794277.jpg', 0, '2024-08-27 01:09:51', '2024-08-27 15:46:17'),
(7, 'Non nemo ipsum asper', 'Labore excepturi eos', 'Omnis aliqua Quisqu', 'Qui et non voluptas', '1724794401.jpg', 1, '2024-08-27 15:48:21', '2024-08-27 15:48:21'),
(8, 'Ut quia qui sed temp', 'Nisi quaerat consect', 'Fugit earum tempori', 'Accusantium repudian', '1724874814.jpg', 1, '2024-08-28 14:08:34', '2024-08-28 14:08:34'),
(9, 'Tempor itaque volupt', 'Omnis dolores rerum', 'Soluta minus volupta', 'Magni aperiam unde a', '1724874827.jpg', 1, '2024-08-28 14:08:47', '2024-08-28 14:08:47'),
(10, 'Elit et inventore s', 'Saepe tenetur ullam', 'Accusantium praesent', 'Voluptatum doloremqu', '1724875068.jpg', 1, '2024-08-28 14:12:48', '2024-08-28 14:12:48');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `details`, `description`, `slug`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Sunt non doloremque', 'Quam in asperiores a', 'Saepe beatae praesen', 'Alias aut ut et corp', '1724699398.jpg', 1, '2024-08-26 09:02:03', '2024-08-26 13:24:58'),
(6, 'rohan', 'Nostrum ex tempora q', 'Est temporibus aut i', 'Quisquam alias quas', '1724736987.jpg', 0, '2024-08-26 23:51:27', '2024-08-26 23:51:40'),
(7, 'this', 'is', 'dummy', 'test', '1724794238.jpg', 1, '2024-08-27 12:31:01', '2024-08-27 15:45:38'),
(8, 'Similique at eos es', 'Totam aut reiciendis', 'Aut veniam voluptas', 'Excepteur animi sit', '1724794424.jpg', 0, '2024-08-27 15:48:44', '2024-08-27 15:48:44'),
(9, 'Neque quis adipisici', 'Hic vitae delectus', 'Beatae et facilis ul', 'Harum est cumque fa', '1724852475.jpg', 1, '2024-08-28 07:56:15', '2024-08-28 07:56:15'),
(10, 'Aut non dolores mole', 'Pariatur Harum qui', 'Doloribus asperiores', 'Anim reprehenderit', '1724874698.jpg', 0, '2024-08-28 14:06:38', '2024-08-28 14:06:38'),
(11, 'Dolore provident pr', 'Ut pariatur Dolor d', 'Omnis aut tempora qu', 'In ea nihil sit even', '1724874733.jpg', 1, '2024-08-28 14:07:13', '2024-08-28 14:07:13'),
(12, 'Explicabo Sed ut ve', 'Necessitatibus esse', 'Cillum ratione quasi', 'Ex tempore odio vol', '1724875092.jpg', 1, '2024-08-28 14:13:12', '2024-08-28 14:13:12');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_08_25_152459_create_blogs_table', 1),
(6, '2024_08_25_152614_create_tour_packages_table', 1),
(7, '2024_08_25_152640_create_tour_places_table', 1),
(8, '2024_08_25_155550_create_articals_table', 1);

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
-- Table structure for table `tour_packages`
--

CREATE TABLE `tour_packages` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `period` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tour_packages`
--

INSERT INTO `tour_packages` (`id`, `title`, `location`, `period`, `details`, `description`, `price`, `slug`, `image`, `video`, `status`, `created_at`, `updated_at`) VALUES
(1, 'hauser', '703', '605', '733', 'Velit facilis moles', '932', '532', '1724741561.jpg', NULL, 1, '2024-08-27 01:07:41', '2024-08-27 16:40:44'),
(2, 'this', 'is', 'dummy', 'test', 'to', 'check', 'the', '1724794325.jpg', NULL, 1, '2024-08-27 01:12:17', '2024-08-27 15:47:23'),
(6, '440', '168', '923', '941', 'Et asperiores aut nu', '877', '330', '1724794372.jpg', NULL, 0, '2024-08-27 15:47:52', '2024-08-27 15:47:52'),
(7, '238', '472', '602', '156', 'Sunt delectus praes', '320', '353', '1724795866.jpg', NULL, 1, '2024-08-27 16:12:46', '2024-08-27 16:12:46');

-- --------------------------------------------------------

--
-- Table structure for table `tour_places`
--

CREATE TABLE `tour_places` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `period` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` tinytext COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tour_places`
--

INSERT INTO `tour_places` (`id`, `title`, `location`, `period`, `details`, `description`, `price`, `slug`, `image`, `video`, `status`, `created_at`, `updated_at`) VALUES
(1, 'hauser', 'this', 'is', 'dummy', 'details', '36060', 'sligist', '1724797640.jpg', NULL, 1, '2024-08-27 16:13:34', '2024-08-27 16:42:32'),
(4, 'wizer', 'locaios', '22', 'no details', 'description is good for the sale', '449-22', '46425/9', '1724797711.jpg', NULL, 0, '2024-08-27 16:43:31', '2024-08-27 16:43:40'),
(5, '537', '727', '815', '8', 'Neque minim commodo', '173', '603', '1724874979.jpg', NULL, 0, '2024-08-28 14:11:19', '2024-08-28 14:11:19'),
(6, '750', '940', '979', '666', 'Cupiditate quaerat a', '569', '577', '1724874996.jpg', NULL, 1, '2024-08-28 14:11:36', '2024-08-28 14:11:36'),
(7, '63', '412', '776', '386', 'Consequatur Et mole', '211', '60', '1724875009.jpg', NULL, 0, '2024-08-28 14:11:49', '2024-08-28 14:11:49'),
(8, '740', '324', '914', '574', 'Facere nisi aliquam', '69', '449', '1724875023.jpg', NULL, 1, '2024-08-28 14:12:03', '2024-08-28 14:12:03'),
(9, '93', '105', '664', '746', 'Eos quidem minus nos', '633', '254', '1724875040.jpg', NULL, 0, '2024-08-28 14:12:20', '2024-08-28 14:12:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'shyam', 'shyam@gmail.com', NULL, '$2y$10$rBqCvQu87HNj8c/POQqKpOJMQCUIauT6hxSWFIQQnBpE4koCB/Jn2', 'admin', NULL, '2024-08-28 13:05:54', '2024-08-28 13:05:54'),
(7, 'admin', 'admin@gmail.com', NULL, '$2y$10$7VtuZJqQ6UpQIyz/GjHsl.cuMIEPV4ujOckLQdwzqlEW6gb7Nx9Y6', 'admin', NULL, '2024-08-28 13:15:55', '2024-08-28 13:15:55'),
(9, 'users', 'user@gmail.com', NULL, '$2y$10$cforUGwrmGukx1CE7DZ9KuUOCPJHF982eVTJ4A5nvcZkwZrXDtIAa', 'user', NULL, '2024-08-28 13:45:53', '2024-08-28 13:54:22'),
(10, 'Sybil Lowery', 'cumigejid@mailinator.com', NULL, '$2y$10$ziZYAftbJbiEZBlTuZ6kQeC3QkVoYHGdJ4pkTT8rHyRINJbVir.xe', 'user', NULL, '2024-08-28 14:14:22', '2024-08-28 14:14:22'),
(11, 'Jermaine Burch', 'tyguxaryr@mailinator.com', NULL, '$2y$10$JYugGpjogZ2ihwTzgRrQ/OPAY.JevpfWdHClygouG8bq2yqCMCIDi', 'admin', NULL, '2024-08-28 14:14:32', '2024-08-28 14:14:32'),
(12, 'Morgan Jenkins', 'zojyvogumu@mailinator.com', NULL, '$2y$10$WQ0J4lhIrkqwXQI1xLcuOOJ423XPJQGkeFt2VEH.OUcdnqjrwhgLC', 'admin', NULL, '2024-08-28 14:14:40', '2024-08-28 14:14:40'),
(13, 'Mari Powers', 'wyce@mailinator.com', NULL, '$2y$10$4IXC1uOsSC.tKsWEFszOxOwOTMSJq6DjGIQvV1kf5mNfQGNn56GQC', 'user', NULL, '2024-08-28 14:14:47', '2024-08-28 14:14:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articals`
--
ALTER TABLE `articals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tour_packages`
--
ALTER TABLE `tour_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_places`
--
ALTER TABLE `tour_places`
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
-- AUTO_INCREMENT for table `articals`
--
ALTER TABLE `articals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tour_packages`
--
ALTER TABLE `tour_packages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tour_places`
--
ALTER TABLE `tour_places`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
