-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2025 at 11:29 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `minipp`
--

-- --------------------------------------------------------

--
-- Table structure for table `actors`
--

CREATE TABLE `actors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `birth_date` date DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `actors`
--

INSERT INTO `actors` (`id`, `name`, `birth_date`, `image`, `nationality`, `created_at`, `updated_at`) VALUES
(1, 'Marie mouh', '2025-05-21', '/img/actors/1746634818_Screenshot 2024-12-25 094455.png', 'sssss', '2025-05-07 15:20:18', '2025-05-07 15:20:18'),
(2, 'Mariam mouh', '2025-05-27', '/img/actors/1746635621_Screenshot 2025-02-13 170438.png', 'sssss', '2025-05-07 15:33:41', '2025-05-07 15:33:41'),
(3, 'Mariam mouh', '2025-05-27', '/img/actors/1746635755_Screenshot 2024-12-19 153347.png', 'sssss', '2025-05-07 15:35:55', '2025-05-07 15:35:55'),
(4, 'workd', '2025-05-27', '/img/actors/1746645339_Screenshot 2024-12-19 160924.png', 'sssss', '2025-05-07 18:15:39', '2025-05-07 18:15:39'),
(5, 'workd again', '2025-05-27', '/img/actors/1746645876_Screenshot 2025-02-13 170438.png', 'sssss', '2025-05-07 18:24:36', '2025-05-07 18:24:36');

-- --------------------------------------------------------

--
-- Table structure for table `actor_film`
--

CREATE TABLE `actor_film` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `actor_id` bigint(20) UNSIGNED NOT NULL,
  `film_id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `actor_film`
--

INSERT INTO `actor_film` (`id`, `actor_id`, `film_id`, `role`, `created_at`, `updated_at`) VALUES
(1, 1, 15, NULL, '2025-05-07 15:31:18', '2025-05-07 15:31:18'),
(2, 2, 16, NULL, '2025-05-07 18:16:29', '2025-05-07 18:16:29'),
(3, 4, 16, NULL, '2025-05-07 18:16:29', '2025-05-07 18:16:29'),
(4, 2, 17, NULL, '2025-05-07 18:25:13', '2025-05-07 18:25:13'),
(5, 4, 17, NULL, '2025-05-07 18:25:13', '2025-05-07 18:25:13');

-- --------------------------------------------------------

--
-- Table structure for table `actor_show`
--

CREATE TABLE `actor_show` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `actor_id` bigint(20) UNSIGNED NOT NULL,
  `show_id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `actor_show`
--

INSERT INTO `actor_show` (`id`, `actor_id`, `show_id`, `role`, `created_at`, `updated_at`) VALUES
(1, 1, 7, NULL, '2025-05-07 15:35:24', '2025-05-07 15:35:24'),
(2, 2, 7, NULL, '2025-05-07 15:35:24', '2025-05-07 15:35:24'),
(3, 1, 8, NULL, '2025-05-07 18:34:44', '2025-05-07 18:34:44'),
(4, 2, 8, NULL, '2025-05-07 18:34:44', '2025-05-07 18:34:44'),
(5, 4, 8, NULL, '2025-05-07 18:34:44', '2025-05-07 18:34:44');

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
-- Table structure for table `films`
--

CREATE TABLE `films` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `release_date` date NOT NULL,
  `genre` varchar(255) NOT NULL,
  `director` varchar(255) NOT NULL,
  `production_company` varchar(255) NOT NULL,
  `duration` time NOT NULL,
  `main_leads` varchar(255) NOT NULL,
  `plot_summary` text DEFAULT NULL,
  `rating` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `language` varchar(255) DEFAULT NULL,
  `poster` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `src` varchar(255) NOT NULL DEFAULT '/src/example.mp4'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`id`, `title`, `release_date`, `genre`, `director`, `production_company`, `duration`, `main_leads`, `plot_summary`, `rating`, `country`, `language`, `poster`, `created_at`, `updated_at`, `src`) VALUES
(1, 'The Shawshank Redemption', '1994-09-23', 'Drama', 'Frank Darabont', 'Castle Rock Entertainment', '00:01:42', 'Tim Robbins, Morgan Freeman', 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.', 'R', 'USA', 'English', '/img/films/the shawshank redemption.jpg', NULL, NULL, '/src/example.mp4'),
(2, 'Inception', '2010-07-16', 'Action, Adventure, Sci-Fi', 'Christopher Nolan', 'Warner Bros. Pictures', '00:01:48', 'Leonardo DiCaprio, Joseph Gordon-Levitt, Ellen Page', 'A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O.', 'PG-13', 'USA', 'English', '/img/films/inception.jpeg', NULL, NULL, '/src/example.mp4'),
(3, 'The Godfather', '1972-03-24', 'Crime, Drama', 'Francis Ford Coppola', 'Paramount Pictures', '00:00:00', 'Marlon Brando, Al Pacino, James Caan', 'The aging patriarch of an organized crime dynasty transfers control of his clandestine empire to his reluctant son.', 'R', 'USA', 'English', '/img/films/gf.jpeg', NULL, NULL, '/src/example.mp4'),
(4, 'The Dark Knight', '2008-07-18', 'Action, Crime, Drama', 'Christopher Nolan', 'Warner Bros. Pictures', '00:01:52', 'Christian Bale, Heath Ledger, Aaron Eckhart', 'When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, Batman must accept one of the greatest psychological and physical tests of his ability to fight injustice.', 'PG-13', 'USA', 'English', '/img/films/dk.jpeg', NULL, NULL, '/src/example.mp4'),
(5, 'Pulp Fiction', '1994-10-14', 'Crime, Drama', 'Quentin Tarantino', 'Miramax Films', '00:01:54', 'John Travolta, Uma Thurman, Samuel L. Jackson', 'The lives of two mob hitmen, a boxer, a gangster and his wife, and a pair of diner bandits intertwine in four tales of violence and redemption.', 'R', 'USA', 'English', '/img/films/pf.jpeg', NULL, NULL, '/src/example.mp4'),
(6, 'admin', '2025-05-16', 'x', 'ccc', 'ss', '15:30:00', 'ss', 'ddd', 'dd', 'dd', 'dd', 'dd', '2025-05-06 13:27:35', '2025-05-06 13:27:35', 'ed'),
(7, 'admin', '2025-05-16', 'x', 'ccc', 'ss', '00:00:00', 'ss', 'ddddddddd', 'dd', 'dd', 'dd', 'dd', '2025-05-06 15:30:28', '2025-05-06 15:30:28', 'ed'),
(8, 'admin', '2025-05-16', 'x', 'ccc', 'ss', '02:26:00', 'ss', 'ddddddddd', 'dd', 'dd', 'dd', 'dd', '2025-05-06 15:31:42', '2025-05-06 15:31:42', 'ed'),
(9, 'admin', '2025-05-12', 'x', 'ccc', 'ss', '00:05:00', 'ss', 'ggg', 'dd', 'dd', 'ss', '/img/films/1746550497_Screenshot 2025-02-13 170438.png', '2025-05-06 15:54:57', '2025-05-06 15:54:57', 'trailers/1746550497_FIFTH.mp4'),
(10, 'adminuuu', '2025-05-12', 'x', 'ccc', 'ss', '00:05:00', 'ss', 'hhhhhhh', 'dd', 'dd', 'ss', '/img/films/1746550780_Screenshot 2025-02-28 211550.png', '2025-05-06 15:59:40', '2025-05-06 15:59:40', 'trailers/1746550780_FIFTH.mp4'),
(11, 'adminuuurrr', '2025-05-12', 'x', 'ccc', 'ss', '00:05:00', 'ss', 'ffffff', 'dd', 'dd', 'ss', '/img/films/1746550902_Screenshot 2025-04-22 230929.png', '2025-05-06 16:01:42', '2025-05-06 16:01:42', 'trailers/1746550902_FINAL.mp4'),
(12, 'adminuuurrrtttttttttttt', '2025-05-12', 'x', 'ccc', 'ss', '00:05:00', 'ss', 'ggggggggg', 'dd', 'dd', 'ss', 'img/films/1746550982_gg.png', '2025-05-06 16:03:02', '2025-05-06 16:03:02', 'trailers/1746550982_FINAL.mp4'),
(13, 'last try', '2025-05-12', 'x', 'ccc', 'ss', '00:05:00', 'ss', 'dddddddddd', 'dd', 'dd', 'ss', '/img/films/1746551035_dot logo.png', '2025-05-06 16:03:55', '2025-05-06 16:03:55', 'trailers/1746551035_FIRST.mp4'),
(14, 'last try dd', '2025-05-12', 'x', 'ccc', 'ss', '00:05:00', '', 'ddd', 'dd', 'dd', 'ss', '/img/films/1746635429_Screenshot 2024-12-19 155515.png', '2025-05-07 15:30:29', '2025-05-07 15:30:29', 'trailers/1746635429_FIFTH.mp4'),
(15, 'last try dd', '2025-05-12', 'x', 'ccc', 'ss', '00:05:00', '', 'ddd', 'dd', 'dd', 'ss', '/img/films/1746635478_Screenshot 2024-12-19 155515.png', '2025-05-07 15:31:18', '2025-05-07 15:31:18', 'trailers/1746635478_FIFTH.mp4'),
(16, 'mmm', '2025-05-12', 'x', 'ccc', 'ss', '00:05:00', '', 'rrrrrrrrrr', 'dd', 'dd', 'ss', '/img/films/1746645389_Screenshot 2025-01-01 143628.png', '2025-05-07 18:16:29', '2025-05-07 18:16:29', 'trailers/1746645389_FIRST.mp4'),
(17, 'mmm', '2025-05-12', 'x', 'ccc', 'ss', '00:05:00', '', 'eeeeeeeeeee', 'dd', 'dd', 'ss', '/img/films/1746645913_Screenshot 2025-01-01 143623.png', '2025-05-07 18:25:13', '2025-05-07 18:25:13', 'trailers/1746645913_fourth.mp4');

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
(95, '2014_10_12_000000_create_users_table', 1),
(96, '2014_10_12_100000_create_password_resets_table', 1),
(97, '2019_08_19_000000_create_failed_jobs_table', 1),
(98, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(99, '2024_04_24_105112_create_todo_items_table', 1),
(100, '2024_04_24_180309_create_profiles_table', 1),
(101, '2024_04_25_171208_create_quizzes_table', 1),
(102, '2024_04_26_111839_create_film_table', 1),
(103, '2024_04_26_112503_create_show_table', 1),
(105, '2024_04_26_132508_create_watch_list_table', 2),
(106, '2025_05_05_182137_add_role_to_users_table', 3),
(107, '2025_05_06_221149_create_actors_table', 4),
(108, '2025_05_06_221614_create_actor_film_table', 4),
(109, '2025_05_06_235211_create_actor_show_table', 4);

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
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `bio` varchar(255) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `questions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`questions`)),
  `respond` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`respond`)),
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shows`
--

CREATE TABLE `shows` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `release_date` date NOT NULL,
  `genre` varchar(255) NOT NULL,
  `director` varchar(255) NOT NULL,
  `production_company` varchar(255) NOT NULL,
  `nbr_seasons` int(11) NOT NULL,
  `nbr_episodes` int(11) NOT NULL,
  `main_leads` varchar(255) NOT NULL,
  `plot_summary` text DEFAULT NULL,
  `rating` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `language` varchar(255) DEFAULT NULL,
  `poster` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shows`
--

INSERT INTO `shows` (`id`, `title`, `release_date`, `genre`, `director`, `production_company`, `nbr_seasons`, `nbr_episodes`, `main_leads`, `plot_summary`, `rating`, `country`, `language`, `poster`, `created_at`, `updated_at`) VALUES
(1, 'Breaking Bad', '2008-01-20', 'Crime, Drama, Thriller', 'Vince Gilligan', 'AMC Networks', 5, 62, 'Bryan Cranston, Aaron Paul, Anna Gunn', 'A high school chemistry teacher turned methamphetamine manufacturer partners with a former student to create and distribute crystal meth.', 'TV-MA', 'USA', 'English', '/img/shows/breakinBad.jpeg', '2024-04-26 17:38:44', '2024-04-26 17:38:44'),
(2, 'Game of Thrones', '2011-04-17', 'Action, Adventure, Drama', 'David Benioff, D.B. Weiss', 'HBO', 8, 73, 'Emilia Clarke, Peter Dinklage, Kit Harington', 'Nine noble families fight for control over the lands of Westeros, while an ancient enemy returns after being dormant for millennia.', 'TV-MA', 'USA', 'English', '/img/shows/got.jpeg', '2024-04-26 17:38:44', '2024-04-26 17:38:44'),
(3, 'Stranger Things', '2016-07-15', 'Drama, Fantasy, Horror', 'The Duffer Brothers', 'Netflix', 4, 34, 'Millie Bobby Brown, Finn Wolfhard, Winona Ryder', 'When a young boy disappears, his mother, a police chief, and his friends must confront terrifying supernatural forces in order to get him back.', 'TV-14', 'USA', 'English', '/img/shows/st.jpeg', '2024-04-27 17:22:22', '2024-04-27 17:22:22'),
(4, 'Friends', '1994-09-22', 'Comedy, Romance', 'David Crane, Marta Kauffman', 'Warner Bros. Television', 10, 236, 'Jennifer Aniston, Courteney Cox, Lisa Kudrow', 'Follows the personal and professional lives of six twenty to thirty-something-year-old friends living in Manhattan.', 'TV-14', 'USA', 'English', '/img/shows/friends.jpeg', '2024-04-27 17:22:22', '2024-04-27 17:22:22'),
(5, 'The Office', '2005-03-24', 'Comedy', 'Greg Daniels', 'NBCUniversal Television Distribution', 9, 201, 'Steve Carell, Rainn Wilson, John Krasinski', 'A mockumentary on a group of typical office workers, where the workday consists of ego clashes, inappropriate behavior, and tedium.', 'TV-14', 'USA', 'English', '/img/shows/office.jpeg', '2024-04-27 17:22:22', '2024-04-27 17:22:22'),
(6, 'admin', '2025-05-14', 'x', 'ccc', 'ss', 2, 3, 'ss', 'eeeeee', 'dd', 'ss', 'ss', '/img/shows/1746551198_Screenshot 2024-07-30 182315.png', '2025-05-06 16:06:38', '2025-05-06 16:06:38'),
(7, 'last try dd', '2025-05-12', 'x', 'ccc', 'ss', 12, 13, '', 'uuu', 'dd', 'dd', 'ss', '/img/shows/1746635724_Screenshot 2024-12-19 155515.png', '2025-05-07 15:35:24', '2025-05-07 15:35:24'),
(8, 'last try dd', '2025-05-12', 'x', 'ccc', 'ss', 12, 13, '', 'sssssssssss', 'dd', 'dd', 'ss', '/img/shows/1746646484_Screenshot 2024-12-19 155120.png', '2025-05-07 18:34:44', '2025-05-07 18:34:44');

-- --------------------------------------------------------

--
-- Table structure for table `todo_items`
--

CREATE TABLE `todo_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `content` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(3, 'Marie mouh', 'chqtgsbt@gmail.com', NULL, '$2y$10$13UE6y/steIaGN8aXXYOae/i8wG7H38cqTGUN11jbNpqqwiaTEwba', NULL, '2025-03-12 16:55:39', '2025-05-06 15:55:39', 'user'),
(14, 'fatima Annaji', 'FatimaAnnvaji7@gmail.com', NULL, '$2y$10$vXGEU5P4V36AjdRWeFcDU.HfMrZOrEB9yqNNbgqXdQfQLELqcX2Py', NULL, '2025-05-05 17:26:24', '2025-05-05 17:26:24', 'admin'),
(15, 'Marie mouh', 'chqtgbt@gmail.com', NULL, '$2y$10$13UE6y/steIaGN8aXXYOae/i8wG7H38cqTGUN11jbNpqqwiaTEwba', NULL, '2025-05-06 15:55:39', '2025-05-06 15:55:39', 'user'),
(17, 'Marie mouh', 'chqtgbrrrrrrt@gmail.com', NULL, '$2y$10$/UgQKn2ikaDapOpx5jZ43ehgO/2.HlArhtkUcURsIq2pMannWHo/u', NULL, '2025-05-07 15:32:07', '2025-05-07 15:32:07', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `watch_lists`
--

CREATE TABLE `watch_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `film_id` bigint(20) UNSIGNED DEFAULT NULL,
  `show_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date_watching` datetime NOT NULL,
  `rating_user` int(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `actor_film`
--
ALTER TABLE `actor_film`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `actor_film_actor_id_film_id_unique` (`actor_id`,`film_id`),
  ADD KEY `actor_film_film_id_foreign` (`film_id`);

--
-- Indexes for table `actor_show`
--
ALTER TABLE `actor_show`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `actor_show_actor_id_show_id_unique` (`actor_id`,`show_id`),
  ADD KEY `actor_show_show_id_foreign` (`show_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `films`
--
ALTER TABLE `films`
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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quizzes_user_id_foreign` (`user_id`);

--
-- Indexes for table `shows`
--
ALTER TABLE `shows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `todo_items`
--
ALTER TABLE `todo_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `todo_items_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `watch_lists`
--
ALTER TABLE `watch_lists`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`film_id`),
  ADD UNIQUE KEY `user_id_2` (`user_id`,`show_id`),
  ADD KEY `watch_lists_film_id_foreign` (`film_id`),
  ADD KEY `watch_lists_show_id_foreign` (`show_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actors`
--
ALTER TABLE `actors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `actor_film`
--
ALTER TABLE `actor_film`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `actor_show`
--
ALTER TABLE `actor_show`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `films`
--
ALTER TABLE `films`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shows`
--
ALTER TABLE `shows`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `todo_items`
--
ALTER TABLE `todo_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `watch_lists`
--
ALTER TABLE `watch_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `actor_film`
--
ALTER TABLE `actor_film`
  ADD CONSTRAINT `actor_film_actor_id_foreign` FOREIGN KEY (`actor_id`) REFERENCES `actors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `actor_film_film_id_foreign` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `actor_show`
--
ALTER TABLE `actor_show`
  ADD CONSTRAINT `actor_show_actor_id_foreign` FOREIGN KEY (`actor_id`) REFERENCES `actors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `actor_show_show_id_foreign` FOREIGN KEY (`show_id`) REFERENCES `shows` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_id_foreign` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD CONSTRAINT `quizzes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `todo_items`
--
ALTER TABLE `todo_items`
  ADD CONSTRAINT `todo_items_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `watch_lists`
--
ALTER TABLE `watch_lists`
  ADD CONSTRAINT `watch_lists_film_id_foreign` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `watch_lists_show_id_foreign` FOREIGN KEY (`show_id`) REFERENCES `shows` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `watch_lists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
