-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 20, 2017 at 07:14 م
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elnour`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `name`) VALUES
(1, 'category one thing'),
(2, 'category two things');

-- --------------------------------------------------------

--
-- Table structure for table `dislikes`
--

CREATE TABLE `dislikes` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dislikes`
--

INSERT INTO `dislikes` (`id`, `post_id`, `user_id`) VALUES
(7, 3, 2),
(9, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `post_id`, `user_id`) VALUES
(1, 2, 1),
(6, 3, 1),
(9, 2, 2),
(10, 1, 2),
(11, 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_02_11_100143_create_articles_posts_tables', 1),
(4, '2017_02_11_104122_create_likes_dislikes_table', 1),
(5, '2017_02_14_110248_crete_viewers_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `article_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `article_id`, `user_id`, `title`, `image`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'title one test', 'Image_2017_02_14 11_02_13.png', '# heading\r\n\r\nshomthing', '2017-02-14 09:20:14', '2017-02-14 10:49:11'),
(2, 1, 1, 'Last testging', 'Image_2017_02_14 11_02_45.jpg', 'sdfdsfgsdgdfkglskadlj;fklask;fdds\r\nsdfkaljfkg;fs;lflmaas;dlgkldlskadfmsgmrkms;dfaks;fsad;lfa\r\n## heading', '2017-02-14 09:20:45', '2017-02-14 17:45:25'),
(3, 2, 1, 'Third', 'Image_2017_02_15 19_02_08.png', '# third test\r\n\r\ndfgdgdfhjghklkj\r\njjjjhjkfghjfhjfhjfj fjhfgh fghd gdfgh dfgh h dfhgd', '2017-02-15 17:49:09', '2017-02-15 17:49:09'),
(4, 1, 2, 'last testing for today', 'Image_2017_02_15 20_02_04.jpg', '# C creator \r\n\r\ndfgdfdfgnfhgd dghgdf gdsfgs gsdg\r\nfbd fgs s sghdsfghshd s ', '2017-02-15 18:57:04', '2017-02-15 18:57:04'),
(5, 1, 1, 'Shiko', 'Image_2017_02_16 10_02_46.png', '# Heading\r\n dfdssadfsdfasdf\r\n## asdasdas\r\n dsd as asda  as da s', '2017-02-16 08:13:47', '2017-02-16 08:13:47'),
(6, 2, 2, 'Last testing ever', 'Image_2017_02_17 09_02_26.jpg', '# Testing\r\n\r\n phpghpghg ghf g ds gfdsg dfgsdfgms dkg sfk sdf klsd sd smgsdfg.mds dn gs dsg \r\n sdfg dsfg fgm sdmfgdmfs, gfdsg ,dsgfdf,gms,dfmg s,mg dg ,dgm fsdg ', '2017-02-17 07:08:26', '2017-02-17 07:08:26'),
(7, 1, 1, 'Last tagingvvvv', 'Image_2017_02_20 11_02_23.png', '# dsfsfsdfsd\r\ndfsdfsdfdsfsdfss\r\n', '2017-02-20 09:09:23', '2017-02-20 09:09:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `activated`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Khaled AbdElRahim', 'khaled710017@gmail.com', '$2y$10$71GF.4mBRE9Bt4Y42Y0h5.1Xy3prBBQs82cMXSUTlpbR7gxFfUcW.', 1, 'hkT5j354dWiji3J5MURcgLLYfyVgcvspYdfnSrnVieXI1AO2aaEg4m5aVX5h', '2017-02-14 09:07:52', '2017-02-20 11:18:32'),
(2, 'admin', 'admin@test.com', '$2y$10$7BzMbHDezHXS53z/kp4iHufJ3/6.FNUcR8/pHN5l8vvRVa7b8VeDK', 1, 'WKRX7bjXi18ojL0cRc69O4cM7KOHYPnTx2woZPzeH6U1q2WkibaVSvfV6GQN', '2017-02-14 09:45:53', '2017-02-20 15:45:43'),
(3, 'lastTestEver', 'lastTestEver@test.com', '$2y$10$5LRiR8SScomU6xhGi8Bxi.SmSiYNlitv1ZfQN38gKfhPc/bci95I2', 1, 'GlbKvfrT5RclBhOGoL9ApkpXSqySCxOUxN4g2b6oQAymUrPAde0wwc3xJTYY', '2017-02-20 15:46:24', '2017-02-20 16:08:09');

-- --------------------------------------------------------

--
-- Table structure for table `user_activations`
--

CREATE TABLE `user_activations` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_activations`
--

INSERT INTO `user_activations` (`user_id`, `token`, `created_at`) VALUES
(1, '1534b398b874033bc9361a97b0b0e2700bc30fc8fa7bfee3d6374c54e176ae60', '2017-02-14 09:07:52'),
(2, '53214af392f8a4cf9bd81caa41d2c1bc6727b3e658a6d72e6db3866a8b47c5ed', '2017-02-14 09:45:53');

-- --------------------------------------------------------

--
-- Table structure for table `viewers`
--

CREATE TABLE `viewers` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `viewers`
--

INSERT INTO `viewers` (`id`, `post_id`, `user_id`) VALUES
(11, 2, 1),
(13, 3, 1),
(15, 2, 2),
(16, 1, 2),
(19, 5, 1),
(20, 5, 2),
(21, 3, 2),
(22, 6, 1),
(23, 6, 2),
(24, 7, 3),
(25, 2, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `articles_name_unique` (`name`);

--
-- Indexes for table `dislikes`
--
ALTER TABLE `dislikes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dislikes_post_id_foreign` (`post_id`),
  ADD KEY `dislikes_user_id_foreign` (`user_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_post_id_foreign` (`post_id`),
  ADD KEY `likes_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_article_id_foreign` (`article_id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_activations`
--
ALTER TABLE `user_activations`
  ADD KEY `user_activations_token_index` (`token`);

--
-- Indexes for table `viewers`
--
ALTER TABLE `viewers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `viewers_post_id_foreign` (`post_id`),
  ADD KEY `viewers_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dislikes`
--
ALTER TABLE `dislikes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `viewers`
--
ALTER TABLE `viewers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `dislikes`
--
ALTER TABLE `dislikes`
  ADD CONSTRAINT `dislikes_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `dislikes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`),
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `viewers`
--
ALTER TABLE `viewers`
  ADD CONSTRAINT `viewers_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `viewers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
