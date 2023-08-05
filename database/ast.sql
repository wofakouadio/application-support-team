-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 05, 2023 at 08:52 PM
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
-- Database: `ast`
--

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
(20, '2023_08_03_202735_create_teams_table', 1),
(43, '2014_10_12_000000_create_users_table', 2),
(44, '2014_10_12_100000_create_password_reset_tokens_table', 2),
(45, '2014_10_12_100000_create_password_resets_table', 2),
(46, '2019_08_19_000000_create_failed_jobs_table', 2),
(47, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(48, '2023_08_03_202735_create_tasks_table', 2);

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
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `remarks` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `user_id`, `name`, `description`, `status`, `remarks`, `created_at`, `updated_at`) VALUES
(2, 4, 'PELLENTESQUE COMMODO EROS A', 'Nulla porta dolor. Suspendisse feugiat. Vivamus laoreet. Donec vitae orci sed dolor rutrum auctor. Suspendisse pulvinar, augue ac venenatis condimentum, sem libero volutpat nibh, nec pellentesque velit pede quis nunc.\r\n\r\nNunc sed turpis. Etiam ultricies nisi vel augue. Mauris turpis nunc, blandit et, volutpat molestie, porta ut, ligula. Curabitur at lacus ac velit ornare lobortis. Aliquam lobortis.\r\n\r\nAenean vulputate eleifend tellus. Suspendisse feugiat. Ut tincidunt tincidunt erat. Fusce ac felis sit amet ligula pharetra condimentum. Fusce fermentum odio nec arcu.\r\n\r\nDuis lobortis massa imperdiet quam. Pellentesque posuere. Cras ultricies mi eu turpis hendrerit fringilla. Morbi vestibulum volutpat enim. Donec posuere vulputate arcu.\r\n\r\nFusce vel dui. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Cras id dui. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Ut leo.', 1, 'Nullam cursus lacinia erat. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Integer ante arcu, accumsan a, consectetuer eget, posuere ut, mauris. Praesent turpis. Fusce fermentum.', '2023-08-05 09:36:20', '2023-08-05 09:51:52'),
(3, 4, 'VIVAMUS CONSECTETUER HENDRERIT LACUS', 'Curabitur ullamcorper ultricies nisi. Vestibulum fringilla pede sit amet augue. In auctor lobortis lacus. Ut varius tincidunt libero. Pellentesque libero tortor, tincidunt et, tincidunt eget, semper nec, quam.\r\n\r\nIn dui magna, posuere eget, vestibulum et, tempor auctor, justo. Curabitur ullamcorper ultricies nisi. Nulla sit amet est. Integer ante arcu, accumsan a, consectetuer eget, posuere ut, mauris. Vestibulum eu odio.\r\n\r\nNullam vel sem. Curabitur vestibulum aliquam leo. Proin magna. Sed mollis, eros et ultrices tempus, mauris ipsum aliquam libero, non adipiscing dolor urna a orci. Suspendisse nisl elit, rhoncus eget, elementum ac, condimentum eget, diam.\r\n\r\nAenean vulputate eleifend tellus. Vestibulum dapibus nunc ac augue.. Nulla facilisi. Sed aliquam ultrices mauris.\r\n\r\nAenean posuere, tortor sed cursus feugiat, nunc augue blandit nunc, eu sollicitudin urna dolor sagittis lacus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Suspendisse faucibus, nunc et pellentesque egestas, lacus ante convallis tellus, vitae iaculis lacus elit id tortor. Donec vitae orci sed dolor rutrum auctor. Phasellus volutpat, metus eget egestas mollis, lacus lacus blandit dui, id egestas quam mauris ut lacus.', 0, NULL, '2023-08-05 09:49:54', '2023-08-05 09:49:54'),
(4, 4, 'TEST USER ONE', 'Quisque id mi. Nulla consequat massa quis enim. Phasellus dolor. Quisque libero metus, condimentum nec, tempor a, commodo mollis, magna. Morbi vestibulum volutpat enim.', 2, 'Quisque id mi. Fusce commodo aliquam arcu. Praesent metus tellus, elementum eu, semper a, adipiscing nec, purus. Nullam quis ante. Etiam sollicitudin, ipsum eu pulvinar rutrum, tellus ipsum laoreet sapien, quis venenatis ante odio sit amet eros.', '2023-08-05 09:55:03', '2023-08-05 09:56:10'),
(5, 2, 'FRANCIS BENNETT ACTIVITY FOR TODAY', 'lkhsapdfps fspofa spojsadpofsjapofe fpospofs;fd safpojsdf[sa lkhsapdfps fspofa spojsadpofsjapofe fpospofs;fd safpojsdf[salkhsapdfps fspofa spojsadpofsjapofe fpospofs;fd safpojsdf[salkhsapdfps fspofa spojsadpofsjapofe fpospofs;fd safpojsdf[salkhsapdfps fspofa spojsadpofsjapofe fpospofs;fd safpojsdf[salkhsapdfps fspofa spojsadpofsjapofe fpospofs;fd safpojsdf[sa', 2, 'Anonymous please... \r\nAbout the Vjay & Small dzick issue... \r\nAunte Abena,  I\'m a guy in my mid 20s and I\'ve got a lot of ladies falling for me without me proposing to them. I don\'t see myself as a handsome guy though but the ladies  really compliment me. I usually get free meat to chop but I\'m really focused in my life so ignore them. Maybe I\'m naughty guy that\'s why 😅they fall for me.\r\nI posted a picture of me on my WhatsApp status one day bi and right there and then this area beautiful lady called me on video call. I am a Naughty guy so our chat was centered on Naughtiness. There nuh this lady just removed her dress showing me her nice round pointed boobies OMG😓 This lady\'s brezz aroused me like a  magic. There nuh the spirit of Joseph don vanish from my body. We planned a match for the following day.\r\nWe met and started ki$$ing and touching ourselves since we were already in the mood to accept this special gift. As I started to undress her nuh naa I saw her wearing red pants OMG😓😅 I said in my head this \'girl is a witch🙄, How could she know my favorite pants color?\' 😂... \r\nThis girl has the  tightest and neatest pu$$y among all the ladies I have met in my life. Even though she\'s given birth before, she is really really sweet and not any foul smell, she smells good down there. As for li€king deɛ I rewarded her for that 😋 I had to li€k her saa until she begged me to use my Adam\'s stick. What  a neatness!!! Madam gye wo✌️. I really enjoyed her. \r\nAfter the match, I had to put pressure on my girlfriend to return home since she had been away for some months else Madam Sweet P go scatter our relationship...\r\nI like to learn so I asked her what\'s the secret of her tight, neat and sweet pu$$y.\r\nThis is her secret, she  adds lime water &warm water to wash her pu$$y every 3 days when she\'s going to bath.\r\nI thanked her for that knowledge and I sent this secret to my girlfriend. Since then I have  never cheated on her again...\r\nHallelujah 🙌', '2023-08-05 10:21:08', '2023-08-05 19:40:34'),
(6, 2, 'TITLE SECOND TEST', 'this second test is to check the dashboard analytics records', 0, NULL, '2023-08-05 20:40:59', '2023-08-05 20:40:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marital_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` tinyint NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `dob`, `gender`, `marital_status`, `email`, `email_verified_at`, `password`, `user_type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super', 'Admin', '1980-11-04', 'male', 'divorced', 'admin@mail.com', NULL, '$2y$10$sEIlfLXWfxqXCxLDPGmYOO9uh3xSnplHcAO9JyaBymx5nDGIdtERq', 1, NULL, '2023-08-05 09:32:48', '2023-08-05 09:32:48'),
(2, 'FRANCIS', 'BENNETT', '2023-08-05', 'male', 'married', 'francisbennett@mail.com', NULL, '$2y$10$4ciHAEf5hq8KX/HR1ZhU3./Ps5Z0khTnNI5wVKY05RQJKnhX4ljEC', 0, NULL, '2023-08-05 09:34:19', '2023-08-05 09:34:19'),
(3, 'SONIA', 'SONOU', '2023-07-30', 'male', 'single', 'soniasonou@mail.com', NULL, '$2y$10$YZOPBq10rbUQBQCRHbUTfO/6pwtws2vcMfMA0mW0bM0Eww3MBAf4u', 0, NULL, '2023-08-05 09:34:43', '2023-08-05 09:34:43'),
(4, 'JOHN', 'DOE', '2023-08-05', 'male', 'divorced', 'johndoe@mail.com', NULL, '$2y$10$0McF7mjeY8.R89tqR4486O4dxrMxVmyKCX.hkOhVDs12d1xGLRTB6', 0, NULL, '2023-08-05 09:35:06', '2023-08-05 09:35:06');

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
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_user_id_foreign` (`user_id`);

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
