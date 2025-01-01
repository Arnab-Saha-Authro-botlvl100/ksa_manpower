-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3380
-- Generation Time: Jul 22, 2023 at 03:15 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `embassy-solution`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `passport_number` varchar(255) NOT NULL,
  `passport_issue_date` date NOT NULL,
  `passport_expire_date` date NOT NULL,
  `date_of_birth` date NOT NULL,
  `place_of_birth` varchar(255) NOT NULL,
  `father` varchar(255) NOT NULL,
  `mother` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `married` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `medical_center` varchar(255) NOT NULL,
  `medical_issue_date` date NOT NULL,
  `medical_expire_date` date NOT NULL,
  `driving_licence` varchar(255) NOT NULL,
  `police` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_delete` int(10) NOT NULL,
  `agency` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `name`, `passport_number`, `passport_issue_date`, `passport_expire_date`, `date_of_birth`, `place_of_birth`, `father`, `mother`, `religion`, `married`, `gender`, `address`, `medical_center`, `medical_issue_date`, `medical_expire_date`, `driving_licence`, `police`, `created_at`, `updated_at`, `is_delete`, `agency`) VALUES
(1, 'reer', '4', '2023-06-16', '2023-06-30', '2023-06-01', 'ere,ttyt', 'Mohammed shaha alam', 'alamtaz begum', 'muslim', 'Married', NULL, 'badnikathi', 'dr ere wewaa', '2023-06-10', '2023-06-24', '3', '2', '2023-06-23 04:53:59', '2023-06-23 04:53:59', 0, ''),
(2, 'demo', '1', '2023-06-02', '2023-06-30', '2021-02-02', 'ere,ttyt', 'Mohammed shaha alam', 'alamtaz begum', 'muslim', 'Married', NULL, 'badnikathi', 'dr ere wewaa', '2023-06-03', '2023-07-07', '154', '21', '2023-06-23 04:57:24', '2023-06-23 04:57:24', 0, ''),
(4, 'test 2', '1234', '2023-07-03', '2023-07-06', '2023-07-01', 'Kisorgonj iii', 'test dad', 'test mom', 'testing', 'none', NULL, 'merul', 'foridpur', '2023-07-05', '2023-07-29', '333', '122', '2023-07-02 08:08:47', '2023-07-02 09:24:24', 0, ''),
(6, 'test 2', '923456', '2023-07-01', '2033-07-01', '2020-01-28', 'Bandarban', 'demo', 'demo 6', 'testing', 'none', NULL, 'demo address', 'foridpur', '2023-07-21', '2023-07-29', '4', '1', '2023-07-04 11:17:04', '2023-07-04 11:17:04', 0, 'sam@gmail.com'),
(10, 'Md. Alamin Hossain', 'f1229O82', '2023-07-07', '2033-07-07', '2019-01-02', 'Dinajpur', 'sonimullah', 'rokaiye', 'Muslim', 'Married', NULL, 'merul badda', 'foridpur', '2023-07-08', '2023-07-29', '190y76f3', 'dd234bx', '2023-07-06 06:09:20', '2023-07-06 06:09:20', 0, 'sam@gmail.com'),
(11, 'Sobuj Das', 'A03550722', '2022-04-25', '2032-04-25', '1999-02-20', 'Feni', 'Haradhan', 'Maya', 'Muslim', 'Married', 'Male', 'Fakirhat, Feni, Bangladesh', 'Nova Medical', '2023-07-01', '2023-09-01', 'DL1234', 'XD1520D', '2023-07-13 06:40:34', '2023-07-13 06:47:33', 0, 'habib@gmail.com'),
(13, 'aaaa', 'ss132322', '2023-07-08', '2033-07-07', '2023-07-01', 'Bhola', 'Haradhan Das', 'Maya Rani', 'Choose...', 'Married', 'Male', 'californiya, USA', 'Nova Medical', '2023-07-27', '2023-07-22', 'DL1234', 'qwe121', '2023-07-13 07:44:30', '2023-07-13 07:44:30', 0, 'sam@gmail.com'),
(15, 'AAAA', '12AA', '2023-01-07', '1970-01-01', '2023-07-01', 'BARISAL', 'HARADHAN', 'MAYA', 'MUSLIM', 'Unmarried', 'MALE', 'DHAKA', 'NOVA', '1970-01-01', '1970-01-01', 'DL1234', 'AA', '2023-07-13 07:55:02', '2023-07-18 13:03:58', 0, 'sam@gmail.com'),
(16, 'ALAMIN', 'F1229O828', '2023-07-21', '2033-07-20', '2023-07-12', 'BARISAL', 'TEST DAD', 'TEST MOM', 'MUSLIM', 'Married', 'MALE', 'BANGLADESH', 'FORIDPUR', '2023-07-21', '2023-07-29', '190Y76F3', 'DD234BX', '2023-07-18 11:37:02', '2023-07-18 11:37:02', 0, 'sam@gmail.com'),
(19, 'MD. ALAMIN HOSSAIN', 'F1219O828', '1970-01-01', '2033-12-07', '2023-07-29', 'CHANDPUR', 'DEMO', 'WWW', 'MUSLIM', 'Married', 'MALE', 'MERUL BADDA', 'FORIDPUR', '1970-01-01', '1970-01-01', '190Y76F3', 'DD234BX', '2023-07-18 12:33:36', '2023-07-18 12:33:36', 0, 'sam@gmail.com'),
(34, 'JONY', 'QQQQQQQQQ', '1970-01-01', '1970-01-01', '2023-07-21', 'BOGRA', 'TEST DAD', 'TEST MOM', 'NON MUSLIM', 'Unmarried', 'FEMALE', 'BANGLADESH', 'FORIDPUR', '1970-01-01', '1970-01-01', '190Y76F3', 'DD234BX', '2023-07-20 01:07:42', '2023-07-20 01:07:42', 0, 'sam@gmail.com');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_23_091055_create_candidates_table', 1),
(6, '2023_06_23_115133_create_visa_table', 2);

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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `licence_name` varchar(100) NOT NULL,
  `arabic_name` varchar(100) NOT NULL,
  `rl_no` varchar(10) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `office_address` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `embassy_man_name` varchar(50) DEFAULT NULL,
  `embassy_man_phone` varchar(50) DEFAULT NULL,
  `updated_at` varchar(100) NOT NULL,
  `created_at` varchar(100) NOT NULL,
  `is_delete` int(10) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `licence_name`, `arabic_name`, `rl_no`, `phone`, `office_address`, `email`, `password`, `embassy_man_name`, `embassy_man_phone`, `updated_at`, `created_at`, `is_delete`, `role`) VALUES
(14, 'sfasfifaasf', '', '12121', '01609317035', 'badnikathi', 'sallusoft166@gmail.com', 'eyJpdiI6IlJjbzhzeGVWdnMyTU9NMjNtTFlkcVE9PSIsInZhbHVlIjoiNEJWMTdNS2Z3ZlV0ZkFKcGJxRzVWZz09IiwibWFjIjoiNDUyNjFkOWE1Y2JmNTczNjkxY2IyM2MwYjFjYjViNDJlMTg1YzgwNmFiZGUyNzU2MDE3YmY2ZmU4MGQ1ZjdiYiIsInRhZyI6IiJ9', '', '', '2023-06-22 14:37:55', '2023-06-22 14:37:55', 0, 'user'),
(15, 'sdf', '', '22', '01609317035', 'badnikathi', 'shakil@gmail.com', 'eyJpdiI6IlN6clhadDJTN1laZDJybmh1SnBacXc9PSIsInZhbHVlIjoiY0JHaTNEQ1c2Nk80d3QzMnVaU1RzQT09IiwibWFjIjoiZmViZmViZTU3OGY1YzY2NWY3Njc4NzcxMWQ5NDJjNTNlNGNjZTFjMjZlN2NlMTJiZjNhMzY1NjYyMzM0MTUyNSIsInRhZyI6IiJ9', '', '', '2023-06-23 08:42:26', '2023-06-23 08:42:26', 0, 'user'),
(16, 'demo1', 'mmmm', '1234', '01817470168', 'saa', 'sam@gmail.com', 'eyJpdiI6IkI1ZGtSdFF2bC8rUENYRDdaMmI3L2c9PSIsInZhbHVlIjoieDRTQkwwM2U5M1ZvUzlFU0dxQzUvZz09IiwibWFjIjoiODQ0ZWE1Yjg2ODk2MTc0M2RiYzJlYzg0MzhiNGE4ZWZlMjUxYTgxMDdjYWQxZDdiMzVkN2NlNTlhMzVhZGRkYyIsInRhZyI6IiJ9', 'test', '0999999', '2023-07-20 12:32:29', '2023-06-24 18:42:55', 0, 'user'),
(17, 'admin1', '', '01', '11', 'aerear', 'admin@gmail.com', 'eyJpdiI6InhEWFRIS2lxQ0I4azdkT0NYbExtaHc9PSIsInZhbHVlIjoiM0U5RVZGK0Z5QVRKM09CazBzcHJ6Zz09IiwibWFjIjoiZjRjZDdlZDUzYTBiODUyZTQwNDgyNGUwYTdkZDJhM2IwMTdkMTdlNjIzM2QwMTQwMTRhNDZmNzU4MzFmODdjYiIsInRhZyI6IiJ9', '', '', '2023-07-13 05:56:12', '2023-07-13 05:56:12', 0, 'admin'),
(18, 'HABIB iNTERNATIONAL', '', '806', '11', 'jobidar paalace', 'habib@gmail.com', 'eyJpdiI6ImEzK2ZUZDZzK1JubWNsS2hCeTNZWVE9PSIsInZhbHVlIjoiWDBLYXg4bWdOTVQwUXRkYmJEY0RaQT09IiwibWFjIjoiZmYyMzk2OTc5MTg3ZjViZjZjYjg4OGU1NzcwYmRmNTZlN2QyY2M0NWE3ODZkNGYwYjM1ZWViZjJjODg0MzFiOSIsInRhZyI6IiJ9', 'Shakil', '89898', '2023-07-13 12:33:18', '2023-07-13 12:28:35', 0, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `licence_name_arabic` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `rl_no` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `office_address` varchar(100) DEFAULT NULL,
  `embassy_man_phone` varchar(50) DEFAULT NULL,
  `embassy_man_name` varchar(100) DEFAULT NULL,
  `is_delete` int(10) DEFAULT NULL,
  `role` varchar(10) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `licence_name_arabic`, `email`, `email_verified_at`, `password`, `rl_no`, `phone`, `office_address`, `embassy_man_phone`, `embassy_man_name`, `is_delete`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'arnab saha', 'لوحة المفاتيح العربية', 'arnab1056@gmail.com', NULL, '$2y$10$rQ1dUfTbopAJNYdEgxzezO/A5IBPfaIjVMgzCFEzF1DxzXJtYISpW', 'ffrer', '01817470168', 'hura', '7877', 'opo', 0, 'user', NULL, '2023-07-06 00:16:08', '2023-07-06 01:17:46'),
(2, 'demo', NULL, 'demo@gmail.com', NULL, '$2y$10$gKvxFD6vTSKHzHinXfOOzeLPMrY13Kd29iPvoXcS0Zw4TMn7PSeBe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-06 00:27:29', '2023-07-06 00:27:29'),
(3, 'sam', 'لوحة المفاتيح العربية', 'sam@gmail.com', NULL, '$2y$10$3XXjtqvfri7/31g1KU.CW.V172ToZmDhhLyRqHGZGunNo27e.yHVq', '1234', '01817470168', 'hura', '7877', 'opo', 0, 'user', NULL, '2023-07-06 00:56:13', '2023-07-06 01:20:31'),
(4, 'sallu', 'لوحة المفاتيح العربية', 'sallu@gmail.com', NULL, '$2y$10$jMsxXYMBiqyxlPxZYJaivuUSj.HqUTVblX0douYIMZ.DhG4Xas84.', 'ffrer', '01817470168', 'hura', '7877', 'opo', 0, 'admin', NULL, '2023-07-06 02:39:41', '2023-07-06 02:42:43');

-- --------------------------------------------------------

--
-- Table structure for table `visas`
--

CREATE TABLE `visas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `visa_no` varchar(255) NOT NULL,
  `spon_id` varchar(50) NOT NULL,
  `candidate_id` bigint(20) UNSIGNED NOT NULL,
  `visa_date` date DEFAULT NULL,
  `visa_date2` varchar(50) NOT NULL,
  `salary` varchar(255) NOT NULL,
  `spon_name_arabic` varchar(255) NOT NULL,
  `spon_name_english` varchar(255) NOT NULL,
  `prof_name_arabic` varchar(255) NOT NULL,
  `prof_name_english` varchar(255) NOT NULL,
  `mofa_no` varchar(255) NOT NULL,
  `mofa_date` date NOT NULL,
  `okala_no` varchar(255) NOT NULL,
  `musaned_no` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visas`
--

INSERT INTO `visas` (`id`, `visa_no`, `spon_id`, `candidate_id`, `visa_date`, `visa_date2`, `salary`, `spon_name_arabic`, `spon_name_english`, `prof_name_arabic`, `prof_name_english`, `mofa_no`, `mofa_date`, `okala_no`, `musaned_no`, `created_at`, `updated_at`) VALUES
(1, '7', '', 1, '2023-06-01', '', '100000', 'eee', 'okok', 'vvv', 'hh', 'wee', '2023-06-09', 'ere', 'xxx', '2023-06-26 10:29:17', '2023-06-26 10:29:17'),
(3, '6', '', 2, '2023-06-02', '', '35000', 'eee', 'okok', 'vvv', 'hh', 'wee', '2023-06-29', 'ere', 'xxx', '2023-06-26 11:57:59', '2023-06-26 11:57:59'),
(4, '278', '', 4, '2023-07-29', '', '40000', 'eee gt mm', 'okok yuyu fr', 'vvv dede ty', 'hh trese op', 'wee yuy', '2023-07-28', 'ere5455', 'xxx433', '2023-07-02 08:33:38', '2023-07-03 02:48:05'),
(5, '78909', '', 6, '2023-07-07', '', '35000', 'eee', 'okok', 'vvv', 'hh trese ui', 'wee yuy', '2023-07-26', 'ere', 'xxx4338', '2023-07-04 11:40:22', '2023-07-04 11:40:22'),
(8, 'c1o92jj', 'c90aa2387', 10, '2023-07-08', '', '100000', 'الهريفي', 'Al harifi', 'Driver', 'سائق', 'V23o90U', '2023-07-22', '0uCy45', 'xx238J87', '2023-07-06 06:15:55', '2023-07-06 06:15:55'),
(10, '1303181528', '7032835733', 11, '2023-07-07', '', '1000', 'مؤسسة اضاءة المركبه للتجارة', 'Vehicle Lighting Trading Est', 'عامل تحميل وتنزيل', 'Upload and download agent', 'E25874234', '2023-07-13', '102030', '232122', '2023-07-13 06:44:59', '2023-07-13 06:44:59'),
(11, 'C1792JJ', 'C9RTA1387', 13, NULL, '1443-07-06', '350000', 'الهريفي', 'AL HARIFI', 'سائق', 'hh trese ui', 'V23O90U', '2023-07-21', '0UCY45', 'XXX433', '2023-07-18 13:23:40', '2023-07-18 13:47:58'),
(12, 'C1792JJ', 'C9RTA1387', 15, NULL, '1443-07-07', '35000', 'EEE', 'OKOK', 'سائق', 'HH TRESE', 'WEE YUY', '2023-07-22', 'ERE5455', 'XXX4338', '2023-07-19 13:31:41', '2023-07-19 13:31:41'),
(13, 'C1O92JJ', 'C9RTA1387', 16, NULL, '', '100000', 'الهريفي', 'AL HARIFI', 'سائق', 'سائق', 'WEE YUY', '2023-07-29', '0UCY45', 'XXX4338', '2023-07-19 13:33:52', '2023-07-19 13:33:52'),
(14, 'C1792JJ', 'C9RTA1387', 34, NULL, '1443-07-06', '40000', 'الهريفي', 'AL HARIFI', 'سائق', 'HH TRESE', 'V23O90U', '2023-07-29', '0UCY45', 'XXX4338', '2023-07-20 01:26:07', '2023-07-20 01:26:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `passport_number` (`passport_number`) USING BTREE;

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
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visas`
--
ALTER TABLE `visas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `visas`
--
ALTER TABLE `visas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `visas`
--
ALTER TABLE `visas`
  ADD CONSTRAINT `visa_candidate_id_foreign` FOREIGN KEY (`candidate_id`) REFERENCES `candidates` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
