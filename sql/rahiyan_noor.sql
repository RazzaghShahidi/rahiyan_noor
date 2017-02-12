-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2017 at 09:39 PM
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
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `commander_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `detail` text CHARACTER SET utf8
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ammaliyat-manategh`
--

CREATE TABLE `ammaliyat-manategh` (
  `id` int(11) NOT NULL,
  `ammaliyat_id` int(11) NOT NULL,
  `manategh_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `manategh`
--

CREATE TABLE `manategh` (
  `manategh_id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `city` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `detail` text CHARACTER SET utf8
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `media_id` int(11) NOT NULL,
  `title` varchar(50) CHARACTER SET utf8 NOT NULL,
  `path` varchar(250) CHARACTER SET utf8 NOT NULL,
  `detail` text CHARACTER SET utf8
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `media_term`
--

CREATE TABLE `media_term` (
  `id` int(11) NOT NULL,
  `term_type` int(1) NOT NULL,
  `term_id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `meta`
--

CREATE TABLE `meta` (
  `id` int(11) NOT NULL,
  `title` varchar(50) CHARACTER SET utf8 NOT NULL,
  `media_id` int(11) DEFAULT NULL,
  `detail` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `meta_term`
--

CREATE TABLE `meta_term` (
  `id` int(11) NOT NULL,
  `meta_id` int(11) NOT NULL,
  `term_type` int(11) NOT NULL,
  `term_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `shahidan`
--

CREATE TABLE `shahidan` (
  `shahidan_id` int(11) DEFAULT NULL,
  `name` varchar(20) CHARACTER SET utf8 NOT NULL,
  `familly` varchar(20) CHARACTER SET utf8 NOT NULL,
  `birth_place` varchar(15) CHARACTER SET utf8 NOT NULL,
  `date_of_birth` varchar(15) CHARACTER SET utf8 NOT NULL,
  `date_of_deth` varchar(15) CHARACTER SET utf8 NOT NULL,
  `biography` text CHARACTER SET utf8,
  `will` text CHARACTER SET utf8,
  `picture` longblob
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ammaliyat`
--
ALTER TABLE `ammaliyat`
  ADD PRIMARY KEY (`ammaliyat_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `ammaliyat-manategh`
--
ALTER TABLE `ammaliyat-manategh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manategh`
--
ALTER TABLE `manategh`
  ADD PRIMARY KEY (`manategh_id`),
  ADD UNIQUE KEY `name` (`name`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meta_term`
--
ALTER TABLE `meta_term`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shahidan_ammaliyat`
--
ALTER TABLE `shahidan_ammaliyat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ammaliyat`
--
ALTER TABLE `ammaliyat`
  MODIFY `ammaliyat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ammaliyat-manategh`
--
ALTER TABLE `ammaliyat-manategh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `manategh`
--
ALTER TABLE `manategh`
  MODIFY `manategh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `media_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `media_term`
--
ALTER TABLE `media_term`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `meta`
--
ALTER TABLE `meta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `meta_term`
--
ALTER TABLE `meta_term`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shahidan_ammaliyat`
--
ALTER TABLE `shahidan_ammaliyat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
