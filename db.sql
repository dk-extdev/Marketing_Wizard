-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Oct 21, 2017 at 07:55 AM
-- Server version: 5.6.36-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `marketing_wizard`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `number`, `email`, `address`, `created_at`, `updated_at`) VALUES
(1, '123456789', 'dk1986830@gmail.com', 'Moscow,Russia', NULL, '2017-10-10 11:51:28');

-- --------------------------------------------------------

--
-- Table structure for table `favicons`
--

CREATE TABLE IF NOT EXISTS `favicons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `favicons`
--

INSERT INTO `favicons` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'dfgfdg', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `footers`
--

CREATE TABLE IF NOT EXISTS `footers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `about_footer` text COLLATE utf8_unicode_ci NOT NULL,
  `left_footer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `right_footer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `footers`
--

INSERT INTO `footers` (`id`, `about_footer`, `left_footer`, `right_footer`, `created_at`, `updated_at`) VALUES
(1, '<p><strong style="margin: 0px; padding: 0px; font-family: ''Open Sans'', Arial, sans-serif; text-align: justify;">Lorem Ipsum</strong><span style="font-family: ''Open Sans'', Arial, sans-serif; text-align: justify;">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</span></p>', '<p>&copy;All Copyright Reserve By <a href="#">ConvergeBox</a></p>', '<p>Design and Develop By :&nbsp;<a href="#" target="_blank" rel="noopener noreferrer">ConvergeBox</a></p>', NULL, '2017-10-10 11:50:16');

-- --------------------------------------------------------

--
-- Table structure for table `logos`
--

CREATE TABLE IF NOT EXISTS `logos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `logos`
--

INSERT INTO `logos` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'logo.png', NULL, '2016-12-31 20:04:31');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_12_28_153738_create_categories_table', 1),
('2016_12_28_175414_create_products_table', 2),
('2016_12_29_092131_create_sub_categories_table', 3),
('2016_12_29_164241_create_questions_table', 4),
('2016_12_30_193903_add_time_to_subcategory', 5),
('2016_12_31_073901_create_currencies_table', 6),
('2016_12_31_134410_create_logos_table', 7),
('2016_12_31_150201_create_sliders_table', 8),
('2016_12_31_163941_create_offers_table', 9),
('2016_12_31_182509_create_histories_table', 10),
('2016_12_31_204306_create_partners_table', 11),
('2016_12_31_213316_create_social_icons_table', 12),
('2017_01_01_090912_create_contacts_table', 13),
('2017_01_01_132535_create_user_registrations_table', 14),
('2017_01_03_125601_create_about_uses_table', 15),
('2017_01_03_195121_create_exams_table', 16),
('2017_01_05_121539_create_titles_table', 17),
('2017_01_05_132208_create_footers_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_submits`
--

CREATE TABLE IF NOT EXISTS `password_submits` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `social_icons`
--

CREATE TABLE IF NOT EXISTS `social_icons` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `facebook` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `google_plus` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `linkedin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `youtube` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `social_icons`
--

INSERT INTO `social_icons` (`id`, `facebook`, `twitter`, `google_plus`, `linkedin`, `youtube`, `created_at`, `updated_at`) VALUES
(1, 'www.facebook.com/you', 'www.twitter/you', 'plus.google.com/you', 'www.linkedin/you', 'youtube.com/you', NULL, '2017-01-06 03:07:37');

-- --------------------------------------------------------

--
-- Table structure for table `titles`
--

CREATE TABLE IF NOT EXISTS `titles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `titles`
--

INSERT INTO `titles` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Marketing Wizard', NULL, '2017-10-10 11:49:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Danil', 'dk1986830@gmail.com', '$2y$10$GLqc1X/UNWW3kAy42zESuelBWeAIVeLgJRXIdzD/Y6vnnH0auRGGC', '123456789', 'y4GTKINwHVjhANZRe3pjKIGHd1uCZinBEijieV5Lku0k6fW6Lu2tDBruvfg3', NULL, '2017-10-21 18:28:22'),
(9, 'User 1', 'user1@mail.com', '$2y$10$GLqc1X/UNWW3kAy42zESuelBWeAIVeLgJRXIdzD/Y6vnnH0auRGGC', '123456789', 'paAAvC5DrDdNMXwpnOPTQmI7sVPdEnIRoXGiT8CZkMU0vN7xUCB76afVitOl', NULL, '2017-10-19 17:46:44'),
(10, 'User 2', 'user2@mail.com', '$2y$10$GLqc1X/UNWW3kAy42zESuelBWeAIVeLgJRXIdzD/Y6vnnH0auRGGC', '123456789', 'paAAvC5DrDdNMXwpnOPTQmI7sVPdEnIRoXGiT8CZkMU0vN7xUCB76afVitOl', NULL, '2017-10-19 17:46:44'),
(14, 'User 3', 'user3@mail.com', '$2y$10$GLqc1X/UNWW3kAy42zESuelBWeAIVeLgJRXIdzD/Y6vnnH0auRGGC', '123456789', 'paAAvC5DrDdNMXwpnOPTQmI7sVPdEnIRoXGiT8CZkMU0vN7xUCB76afVitOl', NULL, '2017-10-19 17:46:44');

-- --------------------------------------------------------

--
-- Table structure for table `user_videos`
--

CREATE TABLE IF NOT EXISTS `user_videos` (
  `user_video_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `url` text,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_video_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `user_videos`
--

INSERT INTO `user_videos` (`user_video_id`, `user_id`, `title`, `created_at`, `updated_at`, `url`, `status`) VALUES
(1, 1, 'fsdfds1', '2017-10-18 14:47:38', '2017-10-18 14:47:40', 'google.com', 'Completed'),
(2, 1, 'fsdfds2', '2017-10-18 14:47:38', '2017-10-18 14:47:40', 'google.com', 'Rendering'),
(3, 2, 'fsdfds20', '2017-10-18 14:47:38', '2017-10-18 14:47:40', 'google.com', 'Queued'),
(4, 3, 'fsdfds26', '2017-10-18 14:47:38', '2017-10-18 14:47:40', 'google.com', 'Rendering'),
(5, 1, 'fsdfds3', '2017-10-18 14:47:38', '2017-10-18 14:47:40', 'google.com', 'Queued'),
(6, 2, '22', '2017-10-18 14:47:38', '2017-10-18 14:47:40', 'google.com', 'Completed'),
(7, 1, 'fsdfds4', '2017-10-18 14:47:38', '2017-10-18 14:47:40', 'google.com', 'Completed'),
(8, 3, 'fsdfds27', '2017-10-18 14:47:38', '2017-10-18 14:47:40', 'google.com', 'Completed'),
(9, 2, 'fsdfds23', '2017-10-18 14:47:38', '2017-10-18 14:47:40', 'google.com', 'Rendering'),
(10, 1, 'fsdfds5', '2017-10-18 14:47:38', '2017-10-18 14:47:40', 'google.com', 'Completed'),
(11, 3, 'fsdfds28', '2017-10-18 14:47:38', '2017-10-18 14:47:40', 'google.com', 'Queued'),
(12, 3, '33', '2017-10-18 14:47:38', '2017-10-18 14:47:40', 'google.com', 'Completed'),
(13, 2, 'fsdfds24', '2017-10-18 14:47:38', '2017-10-18 14:47:40', 'google.com', 'Completed'),
(14, 1, 'fsdfds123', '2017-10-18 14:47:38', '2017-10-18 14:47:40', 'google.com', 'Completed'),
(15, 2, 'fsdfds25', '2017-10-18 14:47:38', '2017-10-18 14:47:40', 'google.com', 'Queued'),
(16, 3, 'fsdfds31', '2017-10-18 14:47:38', '2017-10-18 14:47:40', 'google.com', 'Rendering'),
(17, 1, 'fsdfds6', '2017-10-18 14:47:38', '2017-10-18 14:47:40', 'google.com', 'Completed'),
(18, 1, 'fsdfds7', '2017-10-18 14:47:38', '2017-10-18 14:47:40', 'google.com', 'Rendering'),
(19, 1, 'fsdfds8', '2017-10-18 14:47:38', '2017-10-18 14:47:40', 'google.com', 'Rendering'),
(20, 1, 'fsdfds9', '2017-10-18 14:47:38', '2017-10-18 14:47:40', 'google.com', 'Rendering'),
(21, 1, 'fsdfds11', '2017-10-18 14:47:38', '2017-10-18 14:47:40', 'google.com', 'Queued'),
(22, 1, 'fsdfds12', '2017-10-18 14:47:38', '2017-10-18 14:47:40', 'google.com', 'Queued'),
(23, 1, 'fsdfds14', '2017-10-18 14:47:38', '2017-10-18 14:47:40', 'google.com', 'Queued'),
(24, 1, 'fsdfds15', '2017-10-18 14:47:38', '2017-10-18 14:47:40', 'google.com', 'Rendering'),
(25, 1, 'fsdfds16', '2017-10-18 14:47:38', '2017-10-18 14:47:40', 'google.com', 'Rendering'),
(26, 1, 'fsdfds17', '2017-10-18 14:47:38', '2017-10-18 14:47:40', 'google.com', 'Rendering'),
(27, 1, 'fsdfds18', '2017-10-18 14:47:38', '2017-10-18 14:47:40', 'google.com', 'Rendering'),
(28, 1, 'fsdfds19', '2017-10-18 14:47:38', '2017-10-18 14:47:40', 'google.com', 'Completed');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
