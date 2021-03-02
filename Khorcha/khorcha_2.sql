-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2021 at 08:09 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `khorcha_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `earns`
--

CREATE TABLE `earns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `earncategory_id` int(11) NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `creator` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `earns`
--

INSERT INTO `earns` (`id`, `earncategory_id`, `details`, `amount`, `date`, `creator`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Riyad first payment course fee', '5000', '2021-02-04', 'Al-Mohasin Mollah', 1, '2021-02-05 11:01:56', '2021-02-08 08:00:34'),
(2, 2, 'Course fee from students', '12000', '2021-01-20', 'Al-Mohasin Mollah', 1, '2021-02-05 11:03:15', '2021-02-08 07:49:43'),
(4, 2, 'Personal Portfolio', '13000', '2021-02-02', 'Al-Mohasin Mollah', 1, '2021-02-05 12:28:37', '2021-02-08 07:47:19'),
(8, 8, 'details', '14000', '2021-01-27', 'Al-Mohasin Mollah', 0, '2021-02-06 10:06:22', '2021-02-06 16:20:07'),
(9, 9, 'Restaurant website', '45000', '2021-01-26', 'Al-Mohasin Mollah', 1, '2021-02-06 16:17:11', '2021-02-08 07:48:05'),
(10, 1, 'Student & project', '23000', '2021-02-04', 'Al-Mohasin Mollah', 1, '2021-02-06 16:29:07', '2021-02-08 07:48:20'),
(11, 1, 'a website design', '8000', '2021-02-08', 'Al-Mohasin Mollah', 1, '2021-02-08 07:43:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `earn_categories`
--

CREATE TABLE `earn_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creator` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `earn_categories`
--

INSERT INTO `earn_categories` (`id`, `name`, `remarks`, `creator`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Web Design', 'Web Design course fee from Student', 'Al-Mohasin Mollahh', '1', '2021-02-04 10:21:48', NULL),
(2, 'Web Development', 'Web Development course fee from Student', 'Al-Mohasin Mollahh', '1', '2021-02-04 10:26:07', NULL),
(3, 'Graphics Design', 'Graphics Design course fee from Student', 'Al-Mohasin Mollah', '1', '2021-02-04 10:58:14', '2021-02-06 11:18:18'),
(4, 'Web Development-3', 'Web Development course fee from Student-3', 'Al-Mohasin Mollah', '0', '2021-02-04 11:03:26', '2021-02-04 23:10:20'),
(6, 'earn-2', 'earn-1 remarks-2', 'Al-Mohasin Mollah', '0', '2021-02-05 00:06:56', '2021-02-05 07:48:34'),
(8, 'eCommerce', 'Making eCommerce website', 'Al-Mohasin Mollah', '1', '2021-02-06 10:05:44', NULL),
(9, 'Python Development', 'Python Django project from client', 'Al-Mohasin Mollah', '1', '2021-02-06 16:14:57', NULL),
(10, 'Java', 'Java programming', 'Al-Mohasin Mollah', '1', '2021-02-06 16:18:55', NULL);

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
-- Table structure for table `logos`
--

CREATE TABLE `logos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_11_01_092337_create_roles_table', 1),
(5, '2020_11_09_150829_create_logos_table', 1),
(6, '2021_02_04_125154_create_earn_categories_table', 2),
(7, '2021_02_05_101526_create_paid_categories_table', 3),
(8, '2021_02_05_155120_create_earns_table', 4),
(9, '2021_02_06_082637_create_paids_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `paids`
--

CREATE TABLE `paids` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `paidcategory_id` int(11) NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `creator` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paids`
--

INSERT INTO `paids` (`id`, `paidcategory_id`, `details`, `amount`, `date`, `creator`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Details here --2', '5000', '2021-01-01', 'Al-Mohasin Mollah', 1, '2021-02-06 02:30:02', NULL),
(2, 9, 'buying rice', '2000', '2021-02-13', 'Al-Mohasin Mollah', 1, '2021-02-06 02:46:26', '2021-02-06 16:21:36'),
(3, 7, 'rent', '8000', '2021-01-30', 'Al-Mohasin Mollah', 1, '2021-02-06 03:05:05', NULL),
(4, 10, 'Buy Mobile phone', '11000', '2021-02-03', 'Al-Mohasin Mollah', 1, '2021-02-06 03:06:11', NULL),
(7, 12, 'buy Fruits', '1200', '2021-02-09', 'Al-Mohasin Mollah', 0, '2021-02-06 15:43:33', '2021-02-06 15:44:47'),
(8, 1, 'Java trainer', '15000', '2021-02-05', 'Al-Mohasin Mollah', 1, '2021-02-06 16:27:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `paid_categories`
--

CREATE TABLE `paid_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creator` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paid_categories`
--

INSERT INTO `paid_categories` (`id`, `name`, `remarks`, `creator`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Teachers Salary', 'Trainer', 'Al-Mohasin Mollah', '1', '2021-02-05 04:40:25', NULL),
(2, 'Electrician', 'Pay for office Electrical work', 'Al-Mohasin Mollah', '1', '2021-02-05 04:42:00', NULL),
(4, 'paid-22', 'remark-22', 'Al-Mohasin Mollah', '0', '2021-02-05 05:17:51', '2021-02-05 08:09:05'),
(5, 'paid-333', 'remark-2333', 'Al-Mohasin Mollah', '0', '2021-02-05 05:18:00', '2021-02-05 08:15:33'),
(7, 'House Rent', 'Paid for House rent', 'Al-Mohasin Mollah', '1', '2021-02-06 02:38:43', NULL),
(8, 'Security Guard', 'Monthly pay for Security guard salary', 'Al-Mohasin Mollah', '1', '2021-02-06 02:39:51', NULL),
(9, 'Meal', 'The cost of meal', 'Al-Mohasin Mollah', '1', '2021-02-06 02:42:23', NULL),
(10, 'Practical things', 'Buying various practical items', 'Al-Mohasin Mollah', '1', '2021-02-06 02:45:19', NULL),
(11, 'App Develop', 'Mobile app develop payment', 'Al-Mohasin Mollah', '1', '2021-02-06 11:53:34', NULL),
(12, 'Vegetables', 'All Vegetables for Meal', 'Al-Mohasin Mollah', '1', '2021-02-06 11:54:38', NULL),
(13, 'Mobile bill', 'All members mobile bill', 'Al-Mohasin Mollah', '1', '2021-02-06 11:55:43', '2021-02-06 15:41:08');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Superadmin', 1, '2020-12-31 18:00:00', NULL),
(2, 'Admin', 1, '2020-12-31 18:00:00', NULL),
(3, 'Editor', 1, '2020-12-31 18:00:00', NULL),
(4, 'Author', 1, '2020-12-31 18:00:00', NULL),
(5, 'User', 1, '2020-12-31 18:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.png',
  `role_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '5',
  `status` int(11) NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `photo`, `role_id`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Superadmin', 'superadmin@dm.com', NULL, 'avatar.png', '1', 18, '2021-01-08 13:49:07', '$2y$10$9SYaOJikrPCXgrVa4xyC/OHbqGRM.KRM/TdbiNhpqupgE5b6/1Xqi', NULL, '2021-01-08 13:49:07', NULL, NULL),
(11, 'Al-Mohasin Mollah', 'almohasinmollah1983@gmail.com', '0176678888', 'user_11.png', '1', 17, '2021-02-01 18:00:00', '$2y$10$w9xWlvbQM5sF04ogTbyqburA0o1o8OHVFJsNynMMd2L1ynW/1GBEK', NULL, '2021-02-04 05:56:53', '2021-02-04 05:56:54', NULL),
(13, 'Tamim Mahathir', 'tamim@dm.com', '0176678888', 'user_13.JPG', '4', 13, '2021-02-04 06:38:01', '$2y$10$dVDkWiAgNAZDG1DE7JtxP.yTGJWMd5PmSoAdc4sy1RBA8QNU6lnUK', NULL, '2021-02-04 06:38:01', '2021-02-04 06:38:01', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `earns`
--
ALTER TABLE `earns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `earn_categories`
--
ALTER TABLE `earn_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `logos`
--
ALTER TABLE `logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paids`
--
ALTER TABLE `paids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paid_categories`
--
ALTER TABLE `paid_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_role_name_unique` (`role_name`);

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
-- AUTO_INCREMENT for table `earns`
--
ALTER TABLE `earns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `earn_categories`
--
ALTER TABLE `earn_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logos`
--
ALTER TABLE `logos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `paids`
--
ALTER TABLE `paids`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `paid_categories`
--
ALTER TABLE `paid_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
