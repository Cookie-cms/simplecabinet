-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 09, 2023 at 04:48 PM
-- Server version: 8.0.35-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sitetest`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `hwids` (
    `id` bigint(20) NOT NULL,
    `publickey` blob,
    `hwDiskId` varchar(255) DEFAULT NULL,
    `baseboardSerialNumber` varchar(255) DEFAULT NULL,
    `graphicCard` varchar(255) DEFAULT NULL,
    `displayId` blob,
    `bitness` int(11) DEFAULT NULL,
    `totalMemory` bigint(20) DEFAULT NULL,
    `logicalProcessors` int(11) DEFAULT NULL,
    `physicalProcessors` int(11) DEFAULT NULL,
    `processorMaxFreq` bigint(11) DEFAULT NULL,
    `battery` tinyint(1) NOT NULL DEFAULT "0",
    `banned` tinyint(1) NOT NULL DEFAULT "0"
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    ALTER TABLE `hwids`
    ADD PRIMARY KEY (`id`),
    ADD UNIQUE KEY `publickey` (`publickey`(255));
    ALTER TABLE `hwids`
    MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
    ALTER TABLE `users`
    ADD CONSTRAINT `users_hwidfk` FOREIGN KEY (`hwidId`) REFERENCES `hwids` (`id`);
--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
