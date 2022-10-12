-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 12, 2022 at 10:27 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin-panel`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `image`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'AddWeb banner', '1664782834.png', '<p>This is a banner</p>', 'Active', '2022-10-03 02:10:34', '2022-10-07 08:12:25'),
(2, 'New banner', '1665139262.jpg', '<p>This is New Banner</p>', 'Active', '2022-10-07 05:11:02', '2022-10-07 05:11:02'),
(3, 'NEw New', '1665140869.jpeg', '<p>This is&nbsp;</p>', 'InActive', '2022-10-07 05:37:49', '2022-10-07 08:12:31');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contactinfo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `contactinfo`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Krishna Agarwal', 'krishna@gmail.com', '9876543210', 'This is a sample email.', '2022-09-30 02:45:39', '2022-09-30 02:49:14');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `departmentname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `departmentname`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Account Department', 'This is Account Department', 'Active', '2022-10-07 01:27:08', '2022-10-07 01:27:54'),
(2, 'HR', 'This is HR', 'InActive', '2022-10-07 05:47:44', '2022-10-07 05:47:44');

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
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `status`, `created_at`, `updated_at`) VALUES
(1, 'What are the Rules?', 'No Rules so far', 'Active', '2022-09-30 03:06:04', '2022-09-30 03:07:42'),
(2, 'New Faq', '<p><strong>This is a new FAQ.</strong></p>', 'InActive', '2022-10-07 06:23:02', '2022-10-07 06:23:02');

-- --------------------------------------------------------

--
-- Table structure for table `frameworks`
--

CREATE TABLE `frameworks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `frameworkname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `frameworks`
--

INSERT INTO `frameworks` (`id`, `frameworkname`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ASP.Net', 'InActive', '2022-10-03 06:38:45', '2022-10-03 06:38:57'),
(2, 'Laravel', 'Active', '2022-10-03 06:39:07', '2022-10-03 06:39:07'),
(3, 'Wordpress', 'Active', '2022-10-03 06:39:20', '2022-10-07 08:18:13'),
(4, 'AWS', 'InActive', '2022-10-03 06:39:29', '2022-10-03 06:39:29'),
(5, 'MySQL', 'InActive', '2022-10-03 06:39:39', '2022-10-11 03:03:10');

-- --------------------------------------------------------

--
-- Table structure for table `industries`
--

CREATE TABLE `industries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `industryname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `industries`
--

INSERT INTO `industries` (`id`, `industryname`, `status`, `created_at`, `updated_at`) VALUES
(1, 'E-Learning', 'InActive', '2022-10-03 06:06:34', '2022-10-03 06:08:47'),
(2, 'eCommerce', 'Active', '2022-10-03 06:09:28', '2022-10-03 06:09:28'),
(3, 'Travel', 'Active', '2022-10-03 06:09:40', '2022-10-03 06:09:40'),
(4, 'Job Portal', 'InActive', '2022-10-03 06:09:57', '2022-10-03 06:09:57'),
(5, 'Restaurant', 'InActive', '2022-10-07 04:27:02', '2022-10-07 08:18:00');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_09_28_115825_create_user_managers_table', 2),
(6, '2022_09_29_111215_create_banners_table', 3),
(7, '2022_09_29_121523_create_banners_table', 4),
(8, '2022_09_29_131801_create_user_managers_table', 5),
(9, '2022_09_29_132054_create_usermanagers_table', 6),
(10, '2022_09_29_132433_create_usermanagers_table', 7),
(11, '2022_09_30_075519_create_contacts_table', 8),
(12, '2022_09_30_082039_create_faqs_table', 9),
(13, '2022_09_30_105317_create_pages_table', 10),
(14, '2022_10_03_074622_create_pages_table', 11),
(15, '2022_10_03_075422_create_pages_table', 12),
(16, '2022_10_03_081406_create_pages_table', 13),
(17, '2022_10_03_111141_create_indutsries_table', 14),
(18, '2022_10_03_111919_create_industries_table', 15),
(19, '2022_10_03_114030_create_technologies_table', 16),
(20, '2022_10_03_115726_create_frameworks_table', 17),
(21, '2022_10_06_072311_create_portfolios_table', 18),
(22, '2022_10_06_075517_create_portfolios_table', 19),
(23, '2022_10_07_063334_create_departments_table', 20),
(24, '2022_10_07_064803_create_departments_table', 21),
(25, '2022_10_07_065959_create_teams_table', 22),
(26, '2022_10_07_070053_create_roles_table', 23),
(27, '2022_10_07_073105_create_resources_table', 24);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `body`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'About Us', '<p><strong>What is W3Schools?&nbsp;</strong></p><p>We create simplified and interactive learning experiences.&nbsp;</p><p>Learning web development should be easy to understand and available for everyone, everywhere!&nbsp;</p><p>W3Schools is a school for web developers, covering all the aspects of web development:&nbsp;</p><ol><li>HTML Tutorial</li><li>CSS Tutorial</li><li>JavaScript Tutorial</li><li>PHP Tutorial</li><li>SQL Tutorial</li><li>Python Tutorial</li><li>Java Tutorial</li><li>C Tutorial</li><li>C++ Tutorial</li><li>C# Tutorial</li><li>R Tutorial</li><li>Bootstrap Tutorial</li><li>jQuery Tutorial</li><li>React Tutorial</li><li>XML Tutorial</li><li>W3.CSS Tutorial</li><li>And Much More ...</li></ol><p>W3Schools was created in 1998, and derives its name from the World Wide Web (WWW) but is not affiliated with the W3C.&nbsp;</p><p>&nbsp;</p><p><strong>Easy Learning&nbsp;</strong></p><p>W3Schools has focus on simplicity.&nbsp;</p><p>W3Schools practice easy learning.&nbsp;</p><p>W3Schools uses simple code examples and simple illustrations of how to use it.&nbsp;</p><p>W3Schools\' tutorials start from basic level and move all the way up to professional references.&nbsp;</p><p>&nbsp;</p><p><strong>Try It Yourself&nbsp;</strong></p><p>W3schools presents thousands of code examples.&nbsp;</p><p>By using our online editor, Try it Yourself, you can edit examples and execute computer code experimentally, to see what works and what does not, before implementing it.&nbsp;</p><p>&nbsp;</p><p><strong>W3Schools is Free&nbsp;</strong></p><p>W3Schools is, and will always be, a completely free developers resource.&nbsp;</p><p>&nbsp;</p><p><strong>You Can Help&nbsp;</strong></p><p>Many people work very hard to ensure w3schools remains useful, updated, and interesting.&nbsp;</p><p>If you find an error, or a broken link, please tell us about it.&nbsp;</p><p>Use the link \"REPORT ERROR\" at the bottom of each page.&nbsp;</p><p>&nbsp;</p><p><strong>Add a Link to Us&nbsp;</strong></p><p>If you want others to discover W3schools, please add a link to us.&nbsp;</p><p>To add a simple text link, insert the following HTML code on your site:&nbsp;</p><p>&lt;a href=\"https://www.w3schools.com/\"&gt;W3Schools.com&lt;/a&gt;</p><p>If you want to link with a banner, please choose from: Banners and Buttons&nbsp;</p><p>&nbsp;</p><p><strong>W3Schools Demographics&nbsp;</strong></p><figure class=\"table\"><table><tbody><tr><td><strong>Origin</strong></td><td><strong>Percent</strong></td></tr><tr><td>Asia</td><td>38%</td></tr><tr><td>Americas</td><td>30%</td></tr><tr><td>Europe</td><td>27%</td></tr><tr><td>Africa</td><td>3%</td></tr><tr><td>Oceania</td><td>2%</td></tr></tbody></table></figure><p>&nbsp;</p><p><strong>Source: </strong>Google Analytics</p>', 'about-us', 'Active', '2022-10-03 02:52:34', '2022-10-03 07:01:19');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', '$2y$10$R6g2C55ws5E8MXBqE8pgTuqhmX6ThDpf0VeLH7LEUbJzxzFU1/LcS', '2022-10-07 00:54:14');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `technology` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `framework` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `links` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `technology`, `framework`, `project_name`, `project_duration`, `team_size`, `description`, `links`, `status`, `created_at`, `updated_at`) VALUES
(1, 'PHP', 'Laravel', 'Admin Panel', '2 Weeks', '3', 'This is an Admin Panel', 'http://localhost:8000/', 'Active', '2022-10-07 06:40:10', '2022-10-10 04:24:09'),
(2, 'Database', 'MySQL', 'Admin case Study', '2 Weeks', '3', 'This is a case Study', 'http://localhost:8000/portfolios', 'Active', '2022-10-10 06:02:46', '2022-10-11 01:49:09');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `industries` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `technologies` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `frameworks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateofjoin` date NOT NULL,
  `dateofbirth` date NOT NULL,
  `personalinfo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `documents` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`id`, `name`, `industries`, `technologies`, `frameworks`, `department`, `role`, `team`, `dateofjoin`, `dateofbirth`, `personalinfo`, `documents`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Aakash', 'E-Learning', 'PHP', 'Laravel', 'HR', 'Developer', 'Techno Savvy Team', '2022-10-10', '1992-11-05', 'Personal Info', '1665467790.pptx', 'Personal Info', 'Active', '2022-10-11 00:26:30', '2022-10-11 00:26:30'),
(2, 'Krishna', 'Job Portal', 'PHP', 'Wordpress', 'Account Department', 'Developer', 'Techno Savvy Team', '2022-02-15', '1996-12-23', 'Personal Info', '1665474870.pptx', 'Good', 'Active', '2022-10-11 02:24:30', '2022-10-11 02:24:30');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rolename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `rolename`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Developer', 'This is developer', 'Active', '2022-10-07 01:46:19', '2022-10-07 08:18:32');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teamname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `teamname`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Techno Savvy Team', 'Developer\'s Team', 'Active', '2022-10-07 01:53:38', '2022-10-07 01:55:04');

-- --------------------------------------------------------

--
-- Table structure for table `technologies`
--

CREATE TABLE `technologies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `technologyname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `technologies`
--

INSERT INTO `technologies` (`id`, `technologyname`, `status`, `created_at`, `updated_at`) VALUES
(1, '.Net', 'InActive', '2022-10-03 06:21:52', '2022-10-03 06:25:21'),
(2, 'PHP', 'Active', '2022-10-03 06:25:30', '2022-10-03 06:25:30'),
(3, 'Database', 'Active', '2022-10-03 06:25:50', '2022-10-03 06:25:50'),
(4, 'OpenSource', 'Active', '2022-10-03 06:26:01', '2022-10-03 06:26:01'),
(5, 'CRM', 'InActive', '2022-10-03 06:26:13', '2022-10-03 06:26:13'),
(6, 'Cloud', 'InActive', '2022-10-03 06:26:24', '2022-10-03 06:26:24');

-- --------------------------------------------------------

--
-- Table structure for table `usermanagers`
--

CREATE TABLE `usermanagers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_pic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Verification` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `usermanagers`
--

INSERT INTO `usermanagers` (`id`, `first_name`, `last_name`, `email`, `contact`, `profile_pic`, `address`, `password`, `Status`, `Verification`, `created_at`, `updated_at`) VALUES
(1, 'Ronak', 'Jain', 'ronakjain@gmail.com', '9876543210', '1664782794.jpg', 'Jaipur', '12345678', 'Active', 'Verified', '2022-10-03 02:09:36', '2022-10-03 02:09:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$S7klI6FKSzbh8rdnzTjQzestYnaSrMAptSTPEpcrp9/aYLa3CNBiK', NULL, '2022-09-28 02:50:41', '2022-09-28 02:50:41'),
(2, 'Kaushal', 'kaushal@addwebsolution.in', NULL, '$2y$10$2SdG2iTrSaH81Ti/KdXwUuk6dE4DRcYaFbFcILi7frnWGNpsC7CL.', NULL, '2022-10-10 05:39:30', '2022-10-10 05:39:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frameworks`
--
ALTER TABLE `frameworks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industries`
--
ALTER TABLE `industries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
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
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `technologies`
--
ALTER TABLE `technologies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usermanagers`
--
ALTER TABLE `usermanagers`
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
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `frameworks`
--
ALTER TABLE `frameworks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `industries`
--
ALTER TABLE `industries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `technologies`
--
ALTER TABLE `technologies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `usermanagers`
--
ALTER TABLE `usermanagers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
