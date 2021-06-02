-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 02, 2021 at 12:46 PM
-- Server version: 5.7.34-0ubuntu0.18.04.1
-- PHP Version: 7.4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobportel`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `jobapplied` (IN `user_id` INT(13))  BEGIN
SELECT jobs.title,jobs.description,jobs.skills,jobs.experiance,applies.created_at FROM applies INNER JOIN jobs ON applies.job_id =jobs.id WHERE applies.user_id=user_id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `applies`
--

CREATE TABLE `applies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `employer_id` int(11) DEFAULT NULL,
  `heading` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_letter` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applies`
--

INSERT INTO `applies` (`id`, `job_id`, `user_id`, `employer_id`, `heading`, `cover_letter`, `created_at`, `updated_at`) VALUES
(1, 2, 13, NULL, 'Lorem ipsum dolor sit amet', '<p>consectetur adipiscing elit. Nullam sem turpis, feugiat sed egestas a, egestas id felis. Nunc luctus lorem eu ante mollis accumsan. Quisque placerat mauris quis nulla ultrices, ut laoreet nisl consectetur. Cras eros elit, finibus commodo accumsan id, euismod sed leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras a consectetur leo, vitae venenatis magna. Cras commodo magna et mi ornare elementum. In eu metus porttitor, blandit metus eu, faucibus metus. Etiam venenatis imperdiet leo, in posuere ex interdum vitae. Sed imperdiet neque nec urna euismod rutrum. Proin dapibus turpis ut feugiat varius. Nam vitae auctor nisi. Sed nec tristique lectus.</p>', '2021-06-02 00:36:08', NULL),
(2, 8, 13, 14, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris rutrum sed nibh porta imperdiet. Nullam blandit congue ipsum blandit', '<p>&nbsp;consectetur adipiscing elit. Nullam sem turpis, feugiat sed egestas a, egestas id felis. Nunc luctus lorem eu ante mollis accumsan. Quisque placerat mauris quis nulla ultrices, ut laoreet nisl consectetur. Cras eros elit, finibus commodo accumsan id, euismod sed leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras a consectetur leo, vitae venenatis magna. Cras commodo magna et mi ornare elementum. In eu metus porttitor, blandit metus eu, faucibus metus. Etiam venenatis imperdiet leo, in posuere ex interdum vitae. Sed imperdiet neque nec urna euismod rutrum. Proin dapibus turpis ut feugiat varius. Nam vitae auctor nisi. Sed nec tristique lectus.</p>', '2021-06-02 01:36:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `skills` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experiance` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `description`, `skills`, `experiance`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'Html developer', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sit amet sapien non erat hendrerit mattis. Ut risus sapien, sodales sed neque non, varius lobortis eros. Vivamus gravida finibus nunc, tempor dictum elit. Curabitur ut dictum ex. Donec eleifend condimentum enim, et hendrerit ex scelerisque at. Morbi aliquam luctus libero, vitae viverra nulla egestas consequat. Pellentesque nec lectus auctor, ullamcorper sapien ornare, viverra augue. 2', 'HTML,CSS', 2, NULL, '2021-05-30 18:30:00', NULL),
(3, 'Java Developer', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sit amet sapien non erat hendrerit mattis. Ut risus sapien, sodales sed neque non, varius lobortis eros. Vivamus gravida finibus nunc, tempor dictum elit. Curabitur ut dictum ex. Donec eleifend condimentum enim, et hendrerit ex scelerisque at. Morbi aliquam luctus libero, vitae viverra nulla egestas consequat. Pellentesque nec lectus auctor, ullamcorper sapien ornare, viverra augue.', 'Java Script,C++', 4, NULL, '2021-05-30 18:30:00', NULL),
(4, 'Test job', 'abc', 'CSS,Java Script', 10, NULL, '2021-05-31 18:30:00', NULL),
(5, 'Urgent Opening for UI Developer for Bangalore (WFH till covid) Location', 'Job description;\r\n\r\n\r\nREQUIRED SKILLS ReactJS, Typescript, CSS Preprocessor such as SASS/SCSS\r\n\r\nROLE DESCRIPTION\r\n- Responsible for building front end web application components\r\n- Understands Modular design and how to build and develop design systems\r\n- Should have knowledge of modern API frameworks such as GraphQL or REST\r\n- Optional/Bonus: Experience deploying a web application using AWS services such as Cloudfront or Fargate\"\r\nIf interested please fill following details & revert back with your updated cv at nehag@futuresoftindia.com\r\n\r\nName as per PAN Card\r\nTotal Experience:\r\nRelevant Experience:\r\nCTC:\r\nECTC:\r\nNP:\r\nLocation:\r\nReason for job change:\r\nPan Card No.\r\n\r\n\r\nThanks & Regards,\r\nNeha Gautam\r\nFutureSoft India Private Limited\r\nB-131, 3rd Floor, Sector-2, Noida-201301\r\n(Email) nehag@futuresoftindia.com\r\nWebsite- http://www.Futuresoftindia.com', 'HTML,CSS,Java Script', 3, 15, '2021-06-01 18:30:00', NULL),
(6, 'Looking for Node JS Developer-Bangalore-C2H', 'Hi,\r\n\r\nWe are looking below JD:\r\n\r\nNode JS Developer\r\n\r\nExp:3-5 Years\r\nMode: Contract 2 Hire\r\nLocation: Bangalore\r\n\r\nif your profile matches above JD, please send your updated profile along with below details.\r\n\r\nRegards,\r\nAshok Babu', 'PHP,C++', 2, 15, '2021-06-01 18:30:00', NULL),
(7, 'Lorem ipsum dolor sit amet', 'Maecenas nunc nisi, egestas vel ipsum at, venenatis sollicitudin risus. Morbi aliquet scelerisque pulvinar. Pellentesque iaculis erat eu accumsan convallis. Vestibulum efficitur hendrerit odio eleifend tincidunt. Aliquam non finibus velit. Pellentesque maximus metus id sapien facilisis, at dignissim felis fringilla. Ut ullamcorper, enim ac finibus ullamcorper, ipsum lectus egestas tortor, id interdum arcu massa vitae augue. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vivamus malesuada hendrerit tempor. Morbi accumsan bibendum lorem, sit amet volutpat justo ultricies sit amet. Proin tristique aliquet leo non dignissim. Phasellus semper ante cursus aliquam tincidunt. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec iaculis est sit amet pharetra posuere.', 'Java Script', 2, 14, '2021-06-01 18:30:00', NULL),
(8, 'accumsan convallis. Vestibulum efficitur hendrerit odio eleifend tincidunt. Aliquam non finibus velit.', 'sapien facilisis, at dignissim felis fringilla. Ut ullamcorper, enim ac finibus ullamcorper, ipsum lectus egestas tortor, id interdum arcu massa vitae augue. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vivamus malesuada hendrerit tempor. Morbi accumsan bibendum lorem, sit amet volutpat justo ultricies sit amet. Proin tristique aliquet leo non dignissim. Phasellus semper ante cursus aliquam tincidunt. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec iaculis est sit amet pharetra posuere.', 'HTML,CSS', 1, 14, '2021-06-01 18:30:00', NULL);

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
(3, '2021_05_31_174941_create_jobs_table', 2),
(4, '2021_06_01_072025_create_profile_table', 3),
(5, '2021_06_01_114509_create_applies_table', 4);

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
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `skills` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resume` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `skills`, `experience`, `resume`, `age`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'null', '1', '1622578979.pdf', 24, 13, '2021-06-01 03:12:32', '2021-06-01 14:52:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `user_type`, `username`, `company_name`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Prakash', '', 'pp@yopmail.com', NULL, '$2y$10$GwsT16j15iClstREsTjuBOsvpoycVd7ma2hxu05FOk6PNk.VN9u32', NULL, NULL, NULL, NULL, '2021-05-31 03:05:04', '2021-05-31 03:05:04'),
(11, 'Prasun', 'Rakshit', 'rajuramji566@gmail.com', NULL, '$2y$10$O1ddgE4P7IqQZDb0Msc41.YR5Nz98dQvHw/RpBwOpavIcR7AL0QL.', '1', 'rkashit12', 'Wipro', NULL, '2021-05-31 12:07:27', '2021-05-31 12:07:27'),
(13, 'prakash', 'Prakamanick', 'prakashmca577@gmail.com', '2021-06-01 00:36:19', '$2y$10$R6Ky7WfZui7WGXpsNZ1jkOFGXrZVNXAL5/G9Zk0Dp5RxxB/nwtsxm', '2', 'prakashmca577', NULL, NULL, '2021-06-01 00:45:52', '2021-06-01 00:46:19'),
(14, 'employer', 'test', 'employer@yomail.com', '2021-06-01 16:09:20', '$2y$10$viC8I0rwU3q9od8tX4EGI.Yo6yIaOOxdnc9sC6Cvm.wF6YnKmL3bO', '1', 'employer@123', 'Neosoft', NULL, '2021-06-01 10:39:03', '2021-06-01 10:39:03'),
(15, 'Prasun', 'Rakshit', 'prasun566rk@gmail.com', '2021-06-02 05:39:08', '$2y$10$RGmAEgguaeCT6BbNBfcLwOW.IpeIiOg6W/gdR0zdomR7p8tNTxIfK', '1', 'prasun56', 'CTS', NULL, '2021-06-02 00:07:38', '2021-06-02 00:07:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applies`
--
ALTER TABLE `applies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
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
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applies`
--
ALTER TABLE `applies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
