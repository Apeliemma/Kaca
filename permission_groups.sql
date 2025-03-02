-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 05, 2023 at 04:33 PM
-- Server version: 8.0.33-0ubuntu0.22.04.2
-- PHP Version: 8.1.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kaca`
--

--
-- Dumping data for table `permission_groups`
--

INSERT INTO `permission_groups` (`id`, `_id`, `name`, `slug`, `description`, `permissions`, `user_id`, `is_default`, `created_at`, `updated_at`, `menu_item_permissions`) VALUES
(1, '960d657c-d0dd-45af-b3bd-1d9d8642b48f', 'Administrator', 'administrator', 'Covers the user admin', NULL, 1, 0, '2022-04-13 06:40:14', '2022-04-13 06:40:14', NULL),
(2, '982856bb-621d-4530-ac22-66400a17a397', 'Store QM', 'store-qm', 'QM permissions', '[\"view_dashboard\",\"supplier_management\",\"view_local_purchase_orders\",\"aircraft\",\"view_stock_movement\",\"issuing\",\"receiving\",\"reports\",\"spare_parts\",\"settings\"]', 1, 0, '2022-06-15 03:17:42', '2023-01-06 04:30:12', '[]'),
(3, '97630659-ef90-47b5-bec4-81d0c29205d9', 'OC store', 'oc-store', 'Officer Commanding Stores', '[\"view_dashboard\",\"view_stock_movement\",\"reports\",\"stocks\",\"officer_commanding\"]', 1, 0, '2022-06-15 03:18:02', '2022-09-30 02:27:21', '[\"ivLists\",\"rvLists\",\"nilStocks\",\"add_item\",\"units\"]'),
(4, '96a4675c-a373-4a59-a2bf-5e3f08fec656', 'CO Stores', 'co-stores', 'Commanding Officer', '[\"view_dashboard\",\"supplier_management\",\"view_local_purchase_orders\",\"receiving\",\"reports\",\"stocks\",\"settings\",\"commanding_officer\"]', 2, 0, '2022-06-27 08:12:17', '2022-06-27 08:15:29', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
