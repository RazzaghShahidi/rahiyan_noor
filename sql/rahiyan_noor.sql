-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2017 at 08:08 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rahiyan_noor`
--

-- --------------------------------------------------------

--
-- Table structure for table `ammaliyat`
--

CREATE TABLE `ammaliyat` (
  `ammaliyat_id` int(11) NOT NULL,
  `ammaliyat_name` varchar(50) NOT NULL,
  `ammaliyat_start_date` varchar(10) DEFAULT NULL,
  `ammaliyat_end_date` varchar(10) DEFAULT NULL,
  `ammaliyat_operation_code` varchar(250) DEFAULT NULL,
  `ammaliyat_Strength` varchar(250) DEFAULT NULL,
  `ammaliyat_commander_name` varchar(50) DEFAULT NULL,
  `ammaliyat_description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ammaliyat`
--

-- --------------------------------------------------------

--
-- Table structure for table `ammaliyat_manategh`
--

CREATE TABLE `ammaliyat_manategh` (
  `id` int(11) NOT NULL,
  `ammaliyat_id` int(11) NOT NULL,
  `manategh_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ammaliyat_manategh`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_sessions`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(40) COLLATE utf8_bin NOT NULL,
  `login` varchar(50) COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `login_attempts`
--

-- --------------------------------------------------------

--
-- Table structure for table `manategh`
--

CREATE TABLE `manategh` (
  `manategh_id` int(11) NOT NULL,
  `manategh_name` varchar(50) NOT NULL,
  `manategh_description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `media_id` int(11) NOT NULL,
  `media_title` varchar(50) NOT NULL,
  `media_file_name` varchar(255) NOT NULL,
  `media_file_ext` varchar(10) NOT NULL,
  `media_size` decimal(10,0) NOT NULL,
  `media_path` varchar(250) NOT NULL,
  `media_detail` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `media_term`
--

CREATE TABLE `media_term` (
  `id` int(11) NOT NULL,
  `term_type` varchar(10) NOT NULL,
  `term_id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `meta`
--

CREATE TABLE `meta` (
  `meta_id` int(11) NOT NULL,
  `meta_title` varchar(50) NOT NULL,
  `meta_file_name` varchar(255) DEFAULT NULL,
  `meta_file_ext` varchar(10) NOT NULL,
  `meta_size` decimal(10,0) NOT NULL,
  `meta_path` varchar(250) NOT NULL,
  `meta_detail` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `meta_term`
--

CREATE TABLE `meta_term` (
  `id` int(11) NOT NULL,
  `meta_id` int(11) NOT NULL,
  `term_type` varchar(11) NOT NULL,
  `term_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `shahidan`
--

CREATE TABLE `shahidan` (
  `shahidan_id` int(11) NOT NULL,
  `shahidan_name` varchar(20) NOT NULL,
  `shahidan_familly` varchar(20) NOT NULL,
  `shahidan_birth_place` varchar(15) NOT NULL,
  `shahidan_date_of_birth` varchar(15) NOT NULL,
  `shahidan_date_of_deth` varchar(15) NOT NULL,
  `shahidan_biography` text,
  `shahidan_will` text,
  `shahidan_picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `shahidan_ammaliyat`
--

CREATE TABLE `shahidan_ammaliyat` (
  `id` int(11) NOT NULL,
  `shahidan_id` int(11) NOT NULL,
  `ammaliyat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '1',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_reason` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `new_password_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `new_password_requested` datetime DEFAULT NULL,
  `new_email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `new_email_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `user_autologin`
--

CREATE TABLE `user_autologin` (
  `key_id` char(32) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE `user_profiles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `country` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ammaliyat`
--
ALTER TABLE `ammaliyat`
  ADD PRIMARY KEY (`ammaliyat_id`),
  ADD UNIQUE KEY `name` (`ammaliyat_name`);

--
-- Indexes for table `ammaliyat_manategh`
--
ALTER TABLE `ammaliyat_manategh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manategh`
--
ALTER TABLE `manategh`
  ADD PRIMARY KEY (`manategh_id`),
  ADD UNIQUE KEY `name` (`manategh_name`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`media_id`);

--
-- Indexes for table `media_term`
--
ALTER TABLE `media_term`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meta`
--
ALTER TABLE `meta`
  ADD PRIMARY KEY (`meta_id`);

--
-- Indexes for table `meta_term`
--
ALTER TABLE `meta_term`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shahidan`
--
ALTER TABLE `shahidan`
  ADD PRIMARY KEY (`shahidan_id`);

--
-- Indexes for table `shahidan_ammaliyat`
--
ALTER TABLE `shahidan_ammaliyat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_autologin`
--
ALTER TABLE `user_autologin`
  ADD PRIMARY KEY (`key_id`,`user_id`);

--
-- Indexes for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ammaliyat`
--
ALTER TABLE `ammaliyat`
  MODIFY `ammaliyat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `ammaliyat_manategh`
--
ALTER TABLE `ammaliyat_manategh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `manategh`
--
ALTER TABLE `manategh`
  MODIFY `manategh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `media_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `media_term`
--
ALTER TABLE `media_term`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `meta`
--
ALTER TABLE `meta`
  MODIFY `meta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `meta_term`
--
ALTER TABLE `meta_term`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shahidan`
--
ALTER TABLE `shahidan`
  MODIFY `shahidan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `shahidan_ammaliyat`
--
ALTER TABLE `shahidan_ammaliyat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
