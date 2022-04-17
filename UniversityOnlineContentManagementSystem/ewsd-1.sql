-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 25, 2020 at 06:47 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ewsd`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `article_id` bigint(20) UNSIGNED NOT NULL,
  `magazine_id` bigint(20) UNSIGNED NOT NULL,
  `file_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `article_photo_url_1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `article_photo_url_2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `article_photo_url_3` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `StudentGUID` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT 0,
  `staff_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`article_id`, `magazine_id`, `file_url`, `article_photo_url_1`, `article_photo_url_2`, `article_photo_url_3`, `student_id`, `StudentGUID`, `is_approved`, `staff_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'article1.jpg', '', '', '', 1, '', 1, 3, '2020-09-28 16:50:32', '2020-09-28 16:58:10', NULL),
(2, 2, 'EWSD_GP.docx', '', '', '', 1, '', 1, 2, NULL, NULL, NULL),
(4, 2, 'MOscow. rules 2bg.docx', '', '', '', 1, '', 0, 3, NULL, NULL, NULL),
(13, 1, 'RDBMS Documentation.docx', 'Img/_0_CzlwuQTCmGD3a9KY.jpg', 'Img/_0_CzlwuQTCmGD3a9KY.jpg', 'Img/_0_CzlwuQTCmGD3a9KY.jpg', 2, '{F49AA5A3-0222-1A0C-9939-44DA98CDBB58}', 1, NULL, '2020-10-25 05:55:27', '2020-10-25 06:06:59', NULL),
(14, 1, 'EWSD_courseworks_coursework_2019_2020_Term_1_Level_6_COMP1640-CW.doc', 'articlephoto.jpg', 'Screen Shot 2020-10-19 at 6.39.12 PM.png', 'Screen Shot 2020-10-20 at 9.58.42 PM.png', 5, '{3726048C-A672-1F8A-1BC7-34870F9AF7C3}', 1, NULL, '2020-10-25 12:17:00', NULL, NULL),
(15, 3, 'EWSD_GP.docx', '2-2-sonic-the-hedgehog-png-11.png', '4-white-rose-png-image-flower-white-rose-png-picture.png', '4-2-smiling-face-with-sunglasses-cool-emoji-png.png', 16, '{E4D4D098-B0ED-0B16-F693-B03CCF273A05}', 1, NULL, '2020-10-25 15:51:00', NULL, NULL),
(16, 4, 'EWSD_courseworks_coursework_2019_2020_Term_1_Level_6_COMP1640-CW.doc', '4-2-smiling-face-with-sunglasses-cool-emoji-png.png', '2-2-sonic-the-hedgehog-png-11.png', '2-2-sonic-the-hedgehog-png-11 (1).png', 16, '{E4D4D098-B0ED-0B16-F693-B03CCF273A05}', 0, NULL, '2020-10-25 15:56:00', NULL, NULL),
(18, 1, '5-white-rose-png-image-flower-white-rose-png-picture_800x800.png', '2-2-sonic-the-hedgehog-png-11 (1).png', '20-white-rose-png-image-flower-white-rose-png-picture.png', '7-2-sonic-the-hedgehog-png-2_800x800.png', 16, '{E4D4D098-B0ED-0B16-F693-B03CCF273A05}', 1, NULL, '2020-10-25 16:22:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` bigint(20) UNSIGNED NOT NULL,
  `article_id` bigint(20) UNSIGNED NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `article_id`, `body`, `staff_id`, `created_at`, `deleted_at`) VALUES
(4, 1, 'good to go', 3, '2020-09-28 17:02:39', NULL),
(5, 16, 'ko my ko loe lee bl', 1, NULL, NULL),
(6, 16, 'lee bl pyn pyin mad a low', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `faculty_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`faculty_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin Department', '2020-09-28 16:35:18', '2020-09-28 16:35:18'),
(2, 'Business School', '2020-09-28 16:35:30', '2020-09-28 16:35:30'),
(3, 'Faculty of Education, Health and Human Sciences', '2020-09-28 16:35:41', '2020-09-28 16:35:41'),
(4, 'Faculty of Engineering and Science', '2020-09-28 16:35:52', '2020-09-28 16:36:02'),
(5, 'Faculty of Liberal Arts and Sciences', '2020-09-28 16:36:16', '2020-09-28 16:36:16');

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

CREATE TABLE `genders` (
  `gender_id` int(11) NOT NULL,
  `gender_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genders`
--

INSERT INTO `genders` (`gender_id`, `gender_name`) VALUES
(1, 'Male'),
(2, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `magazines`
--

CREATE TABLE `magazines` (
  `magazine_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `academic_year` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `new_articles` int(11) NOT NULL,
  `closure_date` date NOT NULL,
  `final_closure_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `magazines`
--

INSERT INTO `magazines` (`magazine_id`, `name`, `description`, `img_url`, `staff_id`, `academic_year`, `new_articles`, `closure_date`, `final_closure_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2020 Annual Magazine', 'blah blah blah', 'image1.jpg', 1, '2020-2021', 1, '2020-10-30', '2020-10-31', '2020-10-28 16:47:55', '2020-09-28 16:47:55', NULL),
(2, '2019 magazine', 'lorem', 'image2.jpg', 2, '2019', 1, '2020-10-07', '2020-10-14', NULL, NULL, NULL),
(3, 'the title', 'something cool', 'image3.jpg', 1, '2019', 1, '2020-10-08', '2020-10-27', '2020-10-27 17:38:00', '2020-10-24 17:38:00', NULL),
(4, 'the title', 'something cool', 'image4.jpg', 1, '2019', 1, '2020-10-08', '2020-10-27', '2020-10-27 17:39:23', '2020-10-24 17:39:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `name`) VALUES
(1, 'Admin'),
(4, 'Guest'),
(3, 'Marketing Coordinator'),
(2, 'Marketing Manager');

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faculty_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `profile_img_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`staff_id`, `name`, `username`, `email`, `password`, `faculty_id`, `role_id`, `profile_img_url`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Super User', 'super_user', 'super@ewsd.com', '123456', 1, 1, '/storage/profile/admin.jpg', '2020-09-28 16:37:37', '2020-09-28 16:37:37', '2020-09-28 16:37:37'),
(2, 'Steve', 'steve', 'steve@ewsd.com', '123456', 2, 2, '/storage/profile/steve.jpg', '2020-09-28 16:38:47', '2020-09-28 16:38:47', NULL),
(3, 'Jack', 'jack', 'jack@ewsd.com', '123456', 3, 3, '/storage/profile/jack.jpg', '2020-09-28 16:40:07', '2020-09-28 16:40:07', NULL),
(4, 'Guest1', 'guest1', 'guest1@ewsd.com', '123456', 4, 4, NULL, '2020-09-28 16:45:16', '2020-09-28 16:45:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faculty_id` bigint(20) UNSIGNED NOT NULL,
  `profile_img_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_id_img_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT 0,
  `dob` date NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `StudentGUID` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `name`, `username`, `email`, `password`, `faculty_id`, `profile_img_url`, `student_id_img_url`, `is_approved`, `dob`, `address`, `gender_id`, `created_at`, `updated_at`, `deleted_at`, `StudentGUID`) VALUES
(1, 'John', 'john', 'john@ewsd.com', '123456', 2, 'profile1.jpg', 'profile1.jpg', 1, '2000-01-01', 'address', 1, '2020-09-28 16:44:02', '2020-09-28 16:44:02', NULL, ''),
(2, 'SuanNyan', 'Suan123', 'suan@gmail.com', '123456', 1, 'black.jpg', 'Img/_20200323_163857.jpg', 1, '2000-02-01', 'Yangon', 1, '2020-10-24 23:21:41', '2020-10-25 05:10:37', NULL, '{F49AA5A3-0222-1A0C-9939-44DA98CDBB58}'),
(3, 'John', 'John1', 'johnfghsfth@gmail.com', '123456', 3, 'images/StudentImages/_20200323_163857.jpg', 'images/StudentidImages/_627x627-SftwareDev-Feature-HUSS.jpg', 0, '2020-10-07', 'Yangon', 1, '2020-10-24 23:23:14', NULL, NULL, '{0E160DA6-DEAF-BAAB-18E6-2146D5DF4521}'),
(4, 'Juan', 'Juan123', 'juan@gmail.com', '123456', 2, 'Img/_BlogGraphic_1000_PlanBox_2-1.png', 'Img/_1200px-Iterative_development_model.svg.png', 0, '2020-06-23', 'Yangon', 1, '2020-10-24 23:38:33', NULL, NULL, '{444C4B2A-155A-70FA-B6D8-C07B03563ED6}'),
(5, 'Arkar', 'arkar01', 'arkar20011@gmail.com', '123456', 1, 'profile2.jpg', 'profile2.jpg', 1, '1999-10-05', 'Tamwe', 1, '2020-10-25 06:18:00', NULL, NULL, '{3726048C-A672-1F8A-1BC7-34870F9AF7C3}'),
(16, 'Arkar Phyo', 'phyo01', 'arkarphyo@gmail.com', '123456', 3, '73723-emoticon-smiley-sticker-honda-up-amaze-thumbs.png', 'apple-computer-devices-electronics-265658.jpg', 1, '2020-10-22', 'fvdsg', 1, '2020-10-25 10:09:00', '2020-10-25 15:45:00', NULL, '{E4D4D098-B0ED-0B16-F693-B03CCF273A05}');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_id`),
  ADD KEY `articles_student_id_foreign` (`student_id`),
  ADD KEY `articles_magazine_id_foreign` (`magazine_id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comments_article_id_foreign` (`article_id`),
  ADD KEY `comments_staff_id_foreign` (`staff_id`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`gender_id`);

--
-- Indexes for table `magazines`
--
ALTER TABLE `magazines`
  ADD PRIMARY KEY (`magazine_id`),
  ADD KEY `magazines_staff_id_foreign` (`staff_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`staff_id`),
  ADD UNIQUE KEY `staffs_username_unique` (`username`),
  ADD UNIQUE KEY `staffs_email_unique` (`email`),
  ADD KEY `staffs_faculty_id_foreign` (`faculty_id`),
  ADD KEY `staffs_role_id_foreign` (`role_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `students_username_unique` (`username`),
  ADD UNIQUE KEY `students_email_unique` (`email`),
  ADD KEY `students_faculty_id_foreign` (`faculty_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `article_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `faculty_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `gender_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `magazines`
--
ALTER TABLE `magazines`
  MODIFY `magazine_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `staff_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staffs` (`staff_id`),
  ADD CONSTRAINT `articles_magazine_id_foreign` FOREIGN KEY (`magazine_id`) REFERENCES `magazines` (`magazine_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `articles_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`article_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staffs` (`staff_id`) ON DELETE CASCADE;

--
-- Constraints for table `magazines`
--
ALTER TABLE `magazines`
  ADD CONSTRAINT `magazines_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staffs` (`staff_id`) ON DELETE CASCADE;

--
-- Constraints for table `staffs`
--
ALTER TABLE `staffs`
  ADD CONSTRAINT `staffs_faculty_id_foreign` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`faculty_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `staffs_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_faculty_id_foreign` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`faculty_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
