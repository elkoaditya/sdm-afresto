-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2021 at 03:27 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smk_smg7n`
--

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `icon`, `tujuan`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Home', 'home', '/admin/home', 'admin', '2021-11-06 00:56:07', '2021-11-06 00:56:07'),
(2, 'Kategori', 'layers', '/admin/kategori', 'admin', '2021-11-06 00:56:07', '2021-11-06 00:56:07'),
(3, 'Users', 'people', '/admin/users', 'admin', '2021-11-06 00:56:07', '2021-11-06 00:56:07'),
(4, 'Home', 'home', '/sdm/home', 'sdm', '2021-11-06 00:56:07', '2021-11-06 00:56:07'),
(5, 'Sertifikasi', 'developer_board', '/sdm/sertifikasi', 'sdm', '2021-11-06 00:56:07', '2021-11-06 00:56:07');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
