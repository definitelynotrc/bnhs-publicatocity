-- phpMyAdmin SQL Dump

-- version 5.2.0

-- https://www.phpmyadmin.net/

--

-- Host: 127.0.0.1

-- Generation Time: Apr 22, 2023 at 02:08 PM

-- Server version: 10.4.24-MariaDB

-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */

;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */

;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */

;

/*!40101 SET NAMES utf8mb4 */

;

--

-- Database: `bnhs_publicatocity`

--

CREATE DATABASE
    IF NOT EXISTS `bnhs_publicatocity` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

USE `bnhs_publicatocity`;

-- --------------------------------------------------------

--

-- Table structure for table `announcement`

--

CREATE TABLE
    `announcement` (
        `id` int(11) NOT NULL,
        `title` varchar(255) NOT NULL,
        `description` text DEFAULT NULL,
        `created_at` datetime NOT NULL DEFAULT current_timestamp(),
        `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------

--

-- Table structure for table `event`

--

CREATE TABLE `EVENT`(`ID` INT(11) NOT NULL, `EVENT_NAME` 
TEXT NOT NULL, `ASSIGNED_DATE` 
	date NOT NULL,
	`created_at` datetime NOT NULL DEFAULT current_timestamp(),
	`updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
	) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
	-- --------------------------------------------------------
	--
	-- Table structure for table `users`
	--
	CREATE TABLE
	    `users` (
	        `id` int(11) NOT NULL,
	        `username` varchar(255) NOT NULL,
	        `password` varchar(255) NOT NULL,
	        `email` varchar(255) NOT NULL,
	        `first_name` varchar(255) DEFAULT NULL,
	        `last_name` varchar(255) DEFAULT NULL,
	        `profile_pic_url` text DEFAULT NULL
	    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
	-- --------------------------------------------------------
	--
	-- Table structure for table `user_gallery`
	--
	CREATE TABLE
	    `user_gallery` (
	        `id` int(11) NOT NULL,
	        `gallery_url` varchar(255) NOT NULL,
	        `user` int(11) NOT NULL,
	        `created_at` datetime NOT NULL DEFAULT current_timestamp(),
	        `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
	    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
	--
	-- Indexes for dumped tables
	--
	--
	-- Indexes for table `announcement`
	--
	ALTER TABLE `announcement` ADD PRIMARY KEY (`id`);
	--
	-- Indexes for table `event`
	--
	ALTER TABLE `event` ADD PRIMARY KEY (`id`);
	--
	-- Indexes for table `users`
	--
	ALTER TABLE `users`
	ADD PRIMARY KEY (`id`),
	ADD
	    UNIQUE KEY `username_index` (`username`);
	--
	-- Indexes for table `user_gallery`
	--
	ALTER TABLE
	    `user_gallery`
	ADD PRIMARY KEY (`id`),
	ADD
	    KEY `user_gallery_ibfk_1` (`user`);
	--
	-- AUTO_INCREMENT for dumped tables
	--
	--
	-- AUTO_INCREMENT for table `announcement`
	--
	ALTER TABLE
	    `announcement` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
	--
	-- AUTO_INCREMENT for table `event`
	--
	ALTER TABLE
	    `event` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
	--
	-- AUTO_INCREMENT for table `users`
	--
	ALTER TABLE
	    `users` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
	    AUTO_INCREMENT = 31;
	--
	-- AUTO_INCREMENT for table `user_gallery`
	--
	ALTER TABLE
	    `user_gallery` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
	--
	-- Constraints for dumped tables
	--
	--
	-- Constraints for table `user_gallery`
	--
	ALTER TABLE
	    `user_gallery`
	ADD
	    CONSTRAINT `user_gallery_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
	COMMIT;
