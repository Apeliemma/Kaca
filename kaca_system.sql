-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 15, 2023 at 08:58 AM
-- Server version: 8.0.33-0ubuntu0.22.04.4
-- PHP Version: 8.1.21

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

-- --------------------------------------------------------

--
-- Table structure for table `aircraft`
--

CREATE TABLE `aircraft` (
  `id` bigint UNSIGNED NOT NULL,
  `property_model_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `model` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tail_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `serial_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `engine_model` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aircraft`
--

INSERT INTO `aircraft` (`id`, `property_model_id`, `user_id`, `model`, `tail_number`, `serial_number`, `engine_model`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 6, '369FF', '545', '0305FF', '250-C30', 1, '2022-06-17 05:29:50', '2022-06-17 05:29:50'),
(2, 1, 6, 'MD 546', '546', '2332', 'HD', 1, '2022-08-17 03:11:05', '2022-08-17 03:11:05'),
(3, 2, 6, 'MD 501', '501', 'sdd', 'md500', 1, '2022-08-23 03:17:24', '2022-08-23 03:17:24'),
(4, 2, 3, '360FF', '548', 'CND3434249', '250-C30', 1, '2022-12-16 03:37:25', '2022-12-16 03:37:25');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `_id`, `name`, `slug`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '9625d0ab-0dad-4179-b93a-b21c149ce1ba', 'Engine Spares', 'engine-spares', 3, '2022-04-25 09:59:38', '2022-04-25 09:59:48'),
(2, '1ab9fb1f-27ed-435a-8ce1-85bb7cb8c38a', 'AIRFRAME & ENGINES', 'airframe-engines', 1, '2023-07-16 09:23:52', '2023-07-16 09:23:52'),
(3, '4f064b25-26d4-439a-b62a-3199bbb3b8ff', 'ELECTRICAL & INSTRUMENTS', 'electrical-instruments', 1, '2023-07-16 09:23:52', '2023-07-16 09:23:52'),
(4, '45288ab1-184c-4f58-ac76-a275768dfb9b', 'AVIONICS', 'avionics', 1, '2023-07-16 09:23:52', '2023-07-16 09:23:52'),
(5, 'cd1ea476-d662-4cec-aa44-1ecafaeefefa', 'ARMAMENT', 'armament', 1, '2023-07-16 09:23:55', '2023-07-16 09:23:55'),
(6, 'ed60983e-6c52-4290-94c4-f63fbfd6fcc5', 'ALSE', 'alse', 1, '2023-07-16 09:32:29', '2023-07-16 09:32:29'),
(7, '76a879d8-b208-4e02-84c2-fbcc0ddd9844', 'SYSTEM USER ', 'system-user', 1, '2023-07-16 09:32:31', '2023-07-16 09:32:31'),
(8, 'c314864f-fec2-42a4-8b64-12a2fd6da432', 'SYETEM USER', 'syetem-user', 1, '2023-07-16 09:32:31', '2023-07-16 09:32:31'),
(9, '436b1804-a0f7-4dd2-a59c-7380e4cb006e', 'AIRFRAME AND ENGINE', 'airframe-and-engine', 1, '2023-07-16 09:32:31', '2023-07-16 09:32:31'),
(10, '3e73adaa-aa60-421c-aa06-881302e301c3', 'IT', 'it', 1, '2023-07-16 09:32:31', '2023-07-16 09:32:31'),
(11, '930bdef4-4415-4101-89f1-90c3c4df12ee', 'h', 'h', 1, '2023-07-16 09:32:31', '2023-07-16 09:32:31'),
(12, 'd5fac98e-44e7-41dc-be2b-bb9c41e1d7d8', 'N/A', 'na', 1, '2023-07-17 04:29:33', '2023-07-17 04:29:33'),
(13, 'b9133dd6-65a1-482a-8a2d-e2b9797d2379', 'AIRFRAME & ENGINE', 'airframe-engine', 1, '2023-07-17 04:29:34', '2023-07-17 04:29:34');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint UNSIGNED NOT NULL,
  `_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `_id`, `name`, `slug`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '9625e798-9bc4-4585-a311-0eb9d514136f', 'Aircraft', 'aircraft', 3, '2022-04-25 11:03:54', '2022-04-25 11:03:54'),
(2, '24677543-c8ca-49f4-a9be-2bf05a5e3afb', 'AIRFRAME & ENGINES', 'airframe-engines', 1, '2023-07-16 09:23:52', '2023-07-16 09:23:52'),
(3, '78c558b2-1a7a-4011-bb1b-e9f2972da425', 'ELECTRICAL & INSTRUMENTS', 'electrical-instruments', 1, '2023-07-16 09:23:52', '2023-07-16 09:23:52'),
(4, '5b5ae37d-2f53-4183-af31-5ea3e6708ca0', 'AVIONICS', 'avionics', 1, '2023-07-16 09:23:52', '2023-07-16 09:23:52'),
(5, '3f57887d-81a3-4b71-ba75-d1623f680ce4', 'ARMAMENT', 'armament', 1, '2023-07-16 09:23:55', '2023-07-16 09:23:55'),
(6, 'cc227971-e4c5-4fee-9ff6-7057c8dbea91', 'ALSE', 'alse', 1, '2023-07-16 09:32:29', '2023-07-16 09:32:29'),
(7, '94118d60-b5e4-4f60-8a48-f5f90b60cf46', 'SYSTEM USER ', 'system-user', 1, '2023-07-16 09:32:31', '2023-07-16 09:32:31'),
(8, 'f4346cf0-955f-4a3d-8c37-238b02f589e6', 'SYETEM USER', 'syetem-user', 1, '2023-07-16 09:32:31', '2023-07-16 09:32:31'),
(9, 'ed01ae69-8a49-46ce-8435-676656eb7997', 'AIRFRAME AND ENGINE', 'airframe-and-engine', 1, '2023-07-16 09:32:31', '2023-07-16 09:32:31'),
(10, '3d0d4ac7-5076-4abb-8da6-1b1f97ab38b1', 'IT', 'it', 1, '2023-07-16 09:32:31', '2023-07-16 09:32:31'),
(11, '11b506ee-b3c5-48f7-928c-bcbc64e22927', 'h', 'h', 1, '2023-07-16 09:32:31', '2023-07-16 09:32:31'),
(12, 'c4658f5f-00c8-4abb-9fc1-91ce07f8ffb2', 'N/A', 'na', 1, '2023-07-17 04:29:33', '2023-07-17 04:29:33'),
(13, 'f7867275-c0a9-41ce-97df-6946432d1d1d', 'AIRFRAME & ENGINE', 'airframe-engine', 1, '2023-07-17 04:29:34', '2023-07-17 04:29:34');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint UNSIGNED NOT NULL,
  `_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `_id`, `name`, `slug`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'f859d921-3dfa-4be0-9fae-cb4a3d758358', 'AA1A1', 'aa1a1', 1, '2022-04-25 10:43:42', '2022-08-23 03:26:10'),
(2, '5b25a144-97d9-4a2e-8f0d-e266be7c72c4', 'AA1A2', 'aa1a2', 1, '2022-08-23 03:26:23', '2022-08-23 03:26:23'),
(3, 'b06abde1-c1d2-4832-bef5-ef3646d98ebd', 'AA1A3', 'aa1a3', 1, '2022-08-23 03:26:47', '2022-08-23 03:26:47'),
(4, 'fa0039c7-7a06-4fdc-bce5-752bd8112297', 'AA1A4', 'aa1a4', 1, '2022-08-23 03:26:54', '2022-08-23 03:26:54'),
(5, '3f04de00-88a0-4ef7-aa51-4e90c1bed2ae', 'AA1A5', 'aa1a5', 1, '2022-08-23 03:27:05', '2022-08-23 03:27:05'),
(6, 'dc898bd0-2519-41cd-bc49-f8798f56c777', 'AA1B9', 'aa1b9', 1, NULL, NULL),
(7, 'b0f24e73-87a1-4aec-ae37-ede1c0378912', 'AA1B7', 'aa1b7', 1, NULL, NULL),
(8, '4d4a6c2e-3d7a-4ca8-836d-539ba819aaf7', 'AA1A8', 'aa1a8', 1, NULL, NULL),
(9, '702532f4-4d91-4cf2-a13e-de5294a4b8bf', 'AA1A10', 'aa1a10', 1, NULL, NULL),
(10, '8d9001d5-5dd1-415b-965b-6c25fc4e3977', 'AA1A6', 'aa1a6', 1, NULL, NULL),
(11, '92cf2467-0f0b-4bd6-85fb-28445d0e4362', 'AA1A9', 'aa1a9', 1, NULL, NULL),
(12, 'b803b34d-4f93-4e59-9fb6-7cd74ba4bf73', 'AA1A7', 'aa1a7', 1, NULL, NULL),
(13, '1242ebd3-6545-4afe-8963-b8d4a88b4333', 'AA1B8', 'aa1b8', 1, NULL, NULL),
(14, '2bb062cd-7ccf-4f5d-bcea-06fcb47b0c52', 'AA1D10', 'aa1d10', 1, NULL, NULL),
(15, 'df878324-e7e2-4fa6-93a9-95830aa40af9', 'AA1D4', 'aa1d4', 1, NULL, NULL),
(16, '7773ec3f-0eab-4135-b3e3-3e50c2a0c9a4', 'BB1E5', 'bb1e5', 1, NULL, NULL),
(17, '59d32227-257f-4eb8-a854-996385f6f96c', 'AA1D9', 'aa1d9', 1, NULL, NULL),
(18, 'abe62113-55bb-42f4-bcb8-88cfaeac4cf0', 'BB1D1', 'bb1d1', 1, NULL, NULL),
(19, '8b24d579-3e6e-4d2f-8c27-92740bbecb9f', 'AA1D6', 'aa1d6', 1, NULL, NULL),
(20, '736fe036-5d69-4418-9fb7-aeb3384408c4', 'AA1D1', 'aa1d1', 1, NULL, NULL),
(21, '4bd2a5ba-4067-402d-b81a-da4cfd6553b0', 'AA1D5', 'aa1d5', 1, NULL, NULL),
(22, '2602ef59-86a6-4e34-bae6-26ca983de616', 'AA1D8', 'aa1d8', 1, NULL, NULL),
(23, 'c21575f3-98a6-4e18-9a6e-fb28c812e71c', 'AA1D2', 'aa1d2', 1, NULL, NULL),
(24, '536c2362-f191-4f44-96d7-7dbd66e2faf4', 'BB1D4', 'bb1d4', 1, NULL, NULL),
(25, '65212c74-774a-470f-b8d6-1b59028baaee', 'BB1D2', 'bb1d2', 1, NULL, NULL),
(26, 'f5507a16-022b-4697-b118-0918c2026d03', 'AA1D7', 'aa1d7', 1, NULL, NULL),
(27, '0563313a-7ec8-408f-84b1-f65c764176b0', 'BB2B6', 'bb2b6', 1, NULL, NULL),
(28, '7338ab02-19ca-4cea-8bc0-15093948e334', 'AA1D3', 'aa1d3', 1, NULL, NULL),
(29, 'd70dd01d-d54e-425c-a924-15d9eace7d8b', 'AA1E3', 'aa1e3', 1, NULL, NULL),
(30, '5ac4207b-55fe-456e-8076-ccd59b1f5cf9', 'AA1F2', 'aa1f2', 1, NULL, NULL),
(31, '9f589e5a-1d36-47d9-ae20-11a5b470d93f', 'AA1E1', 'aa1e1', 1, NULL, NULL),
(32, 'c9dffd09-9fa2-4ff1-8fae-769803699e75', 'AA1E8', 'aa1e8', 1, NULL, NULL),
(33, '9797789a-1090-4efb-9dc7-bc50c4fc18af', 'AA1E6', 'aa1e6', 1, NULL, NULL),
(34, 'e8a4026e-a497-45c6-879b-0efa45f43f46', 'BB1C4', 'bb1c4', 1, NULL, NULL),
(35, 'e735bc03-05f0-405d-ab61-2eee2429f70b', 'AA1E7', 'aa1e7', 1, NULL, NULL),
(36, '51ed740e-e1dc-4811-8ca9-0390c28cc2af', 'AA1E5', 'aa1e5', 1, NULL, NULL),
(37, '03de6883-fb1f-4b47-96e4-b9a6178e9631', 'BB1E4', 'bb1e4', 1, NULL, NULL),
(38, '84d98889-d160-448e-ab40-cb129398ee8a', 'BB1C5', 'bb1c5', 1, NULL, NULL),
(39, 'd76edc9f-31df-4380-a136-00a8b090a865', 'BB1D5', 'bb1d5', 1, NULL, NULL),
(40, 'aee186d6-b91d-4074-8b94-22aac736a14f', 'AA1F4', 'aa1f4', 1, NULL, NULL),
(41, 'e51ce346-c2df-4111-bf05-7ad536a2e009', 'AA1E9', 'aa1e9', 1, NULL, NULL),
(42, '75c2414c-649d-42de-92f8-a9dd35d64ae9', 'BB1E3', 'bb1e3', 1, NULL, NULL),
(43, 'ee010c1a-0871-40ee-93a0-47aa1a096aba', 'AA1E4', 'aa1e4', 1, NULL, NULL),
(44, 'ddaea30f-4426-4a12-9e3c-470175e1c4f1', 'AA1F1', 'aa1f1', 1, NULL, NULL),
(45, 'e6792845-7093-4b50-9b79-f23cb2cb4ccb', 'BB1B5', 'bb1b5', 1, NULL, NULL),
(46, '85ee7444-da4f-423a-992f-968c67df93f3', 'BB2E5', 'bb2e5', 1, NULL, NULL),
(47, '97167b05-1ae2-4944-936b-2fcbe90e8604', 'BB1B10', 'bb1b10', 1, NULL, NULL),
(48, '266c3eaa-3974-4238-a874-9c9b5dc3c62c', 'BB1E2', 'bb1e2', 1, NULL, NULL),
(49, 'defac909-0fbd-4ea6-9fe8-22e2d3fd30ef', 'AA3C1', 'aa3c1', 1, NULL, NULL),
(50, '9938373a-7b20-4fc5-9689-fb282cfbe5dc', 'AA4F3', 'aa4f3', 1, NULL, NULL),
(51, '8053ced2-a7b0-4828-a5dd-e6495029b1ee', 'BB3C6', 'bb3c6', 1, NULL, NULL),
(52, 'c75680d5-cd19-4a2f-9fea-092b0a65729e', 'BB2C1', 'bb2c1', 1, NULL, NULL),
(53, 'afb54d08-4b57-43f6-a9e9-d63894be728d', 'AA4F2', 'aa4f2', 1, NULL, NULL),
(54, 'd358533d-1e00-40b5-9022-fbe91ebd25d6', 'AA1F3', 'aa1f3', 1, NULL, NULL),
(55, '4c9f8fd8-68c7-4601-b2c4-b4c3874d4482', 'BB1A6', 'bb1a6', 1, NULL, NULL),
(56, '90677734-e919-41b8-a031-0ba310490f53', 'BB4B5', 'bb4b5', 1, NULL, NULL),
(57, 'bd44384e-4834-48e3-aadc-09e731554000', 'AA1E2', 'aa1e2', 1, NULL, NULL),
(58, '6eac193b-2903-4a1c-9b89-12568a1e6441', 'BB1B9', 'bb1b9', 1, NULL, NULL),
(59, '098888e7-00d2-4794-90a7-93ab915fc773', 'BB1C8', 'bb1c8', 1, NULL, NULL),
(60, 'ec315852-f0c3-496f-a00c-73a9761a188c', 'BB1B8', 'bb1b8', 1, NULL, NULL),
(61, '2c0a31b7-8e0c-4826-8656-2c423e4dc82e', 'BB1B6', 'bb1b6', 1, NULL, NULL),
(62, '9fd0d113-64e0-4632-9094-42dc8b494a5a', 'BB1B7', 'bb1b7', 1, NULL, NULL),
(63, 'a3a7ea34-f314-44e5-9ddf-83ab2feb7ff9', 'AA2A3', 'aa2a3', 1, NULL, NULL),
(64, 'c75b035f-59cd-43e9-b2f4-b0b1b9ebdefb', 'BB1C2', 'bb1c2', 1, NULL, NULL),
(65, '0c7fb99d-2408-4551-9ab4-bdeb164203fc', 'BB1C7', 'bb1c7', 1, NULL, NULL),
(66, 'a84385c3-a9ab-4288-8889-cfadd7f15970', 'BB4E2', 'bb4e2', 1, NULL, NULL),
(67, '7caf00fc-66a8-463c-b59a-cab963062a3b', 'BB1C6', 'bb1c6', 1, NULL, NULL),
(68, '108e236b-2307-4c3f-809c-8ccf26c119d5', 'BBC3', 'bbc3', 1, NULL, NULL),
(69, '8088cc77-79ff-481e-a86e-94aefba41157', 'BB1C1', 'bb1c1', 1, NULL, NULL),
(70, '51d79c91-9983-483f-aa15-8989c0571c23', 'BB1E1', 'bb1e1', 1, NULL, NULL),
(71, 'd2387720-4574-4be8-a3f0-116f66f687db', 'BB3B5', 'bb3b5', 1, NULL, NULL),
(72, '4825adf9-72ed-4376-9a6f-39b6c9f2db72', 'BB1B3', 'bb1b3', 1, NULL, NULL),
(73, 'f93bfbc2-5676-44c1-ac55-acb5eb078b26', 'BB1B4', 'bb1b4', 1, NULL, NULL),
(74, 'c8004a32-fb9f-4352-beb6-3003ec835c48', 'BB1B2', 'bb1b2', 1, NULL, NULL),
(75, 'fabdada0-c45f-44a4-be26-1b26cc383552', 'BB1C3', 'bb1c3', 1, NULL, NULL),
(76, '555125cf-a551-47b0-b51b-79c03d43596a', 'DD3B1', 'dd3b1', 1, NULL, NULL),
(77, '28c53d3f-c0df-40c4-83be-6c3f6dbe7f22', 'BB3B4', 'bb3b4', 1, NULL, NULL),
(78, 'ea52f00c-67cc-429f-baf3-cc8a0ed67c04', 'BB1B1', 'bb1b1', 1, NULL, NULL),
(79, '76dc1275-5960-4859-ac00-898ff7212f50', 'AA2A5', 'aa2a5', 1, NULL, NULL),
(80, '17f52b9d-34c2-4fcf-9755-3da223d80f73', 'AA2A2', 'aa2a2', 1, NULL, NULL),
(81, 'f001e929-7214-4470-87a9-d2bbad744b96', 'BB3C3', 'bb3c3', 1, NULL, NULL),
(82, '6927826d-f120-4ec5-a3d0-92b34de7a725', 'BB3B1', 'bb3b1', 1, NULL, NULL),
(83, '252f1240-b89f-40ce-a292-5aa2c587b1fb', 'AA2A1', 'aa2a1', 1, NULL, NULL),
(84, '76a5b0ff-afe9-4bc8-bd7d-c64fe54c57cf', 'AA2A7', 'aa2a7', 1, NULL, NULL),
(85, 'a9e1aceb-2964-4e5e-b557-cb13a39e94ef', 'AA2A6', 'aa2a6', 1, NULL, NULL),
(86, '22c714df-c5d5-4400-a3a7-7623bc5423cf', 'AA2A8', 'aa2a8', 1, NULL, NULL),
(87, '4b32b6c7-bd48-48b9-9105-f244fcc61f81', 'AA2A9', 'aa2a9', 1, NULL, NULL),
(88, '528073fc-34c4-4c87-b3ab-9637a6e9d533', 'BB3C4', 'bb3c4', 1, NULL, NULL),
(89, '5f7f21d1-3416-4db2-9c36-2491e350e495', 'AA3C2', 'aa3c2', 1, NULL, NULL),
(90, '1944ec26-17bd-423c-958b-1621781f2520', 'DD2A1', 'dd2a1', 1, NULL, NULL),
(91, '1992e930-5222-450d-abdb-7a0fbff2e089', 'AA2A4', 'aa2a4', 1, NULL, NULL),
(92, '75dab76a-c31d-41ee-884c-88cf29440fa1', 'BB2C6', 'bb2c6', 1, NULL, NULL),
(93, 'fb2996bb-78f3-44c5-93fc-c6cafd8f81e7', 'BB2B3', 'bb2b3', 1, NULL, NULL),
(94, 'b91a2829-7028-4665-b194-ea10b52efbe5', 'BB2C5', 'bb2c5', 1, NULL, NULL),
(95, 'f7101437-9c01-41ad-97c7-19c59e193aa0', 'BB2C9', 'bb2c9', 1, NULL, NULL),
(96, '74fcfba6-b9ad-4f3f-abfc-3794304430bb', 'DD1A1', 'dd1a1', 1, NULL, NULL),
(97, '1781191d-086b-431a-83d6-5dd06fa3475e', 'AA2C1', 'aa2c1', 1, NULL, NULL),
(98, '07b6fbb7-8543-473f-bfdb-bae1b4db1d5b', 'AA2B4', 'aa2b4', 1, NULL, NULL),
(99, 'e83dda8f-83ec-478c-a9dd-25127d9a59fb', 'BB2C10', 'bb2c10', 1, NULL, NULL),
(100, '81d5d94a-ba35-40cb-8dd0-fb79534d1551', 'BB2B4', 'bb2b4', 1, NULL, NULL),
(101, 'a4687f18-0ece-4a85-aad8-230048e8de5d', 'AA2B2', 'aa2b2', 1, NULL, NULL),
(102, '3442b968-9749-4cea-9a85-88d72b7ccbe7', 'BB2C4', 'bb2c4', 1, NULL, NULL),
(103, '2ff0b59e-e9dc-46a3-9a7d-00112ae0a2fc', 'BB2C2', 'bb2c2', 1, NULL, NULL),
(104, '3d709635-0174-4f4f-ab58-d6dc2f309ab0', 'BB2B5', 'bb2b5', 1, NULL, NULL),
(105, '85e3732e-1a86-481c-86aa-45bbd9e7cb0c', 'AA2B9', 'aa2b9', 1, NULL, NULL),
(106, '27006e8d-e07c-4508-9ea2-04fbe62c4e36', 'AA2B3', 'aa2b3', 1, NULL, NULL),
(107, '2582d98b-48b5-4742-ad89-9e4f4ebf4ad4', 'AA2C6', 'aa2c6', 1, NULL, NULL),
(108, '135445ae-fb4b-41b4-983b-9b84c4c7ef6b', 'AA2B7', 'aa2b7', 1, NULL, NULL),
(109, '685a5b1e-6031-4d10-90cf-ceb321508290', 'AA2B10', 'aa2b10', 1, NULL, NULL),
(110, '2450d7c4-3047-467b-93cb-d96bb7360fc2', 'BB2B2', 'bb2b2', 1, NULL, NULL),
(111, 'eaeabe13-9cbe-466d-872a-da95f042009f', 'AA2F1', 'aa2f1', 1, NULL, NULL),
(112, '8ea3a1be-6fba-4a0d-8f72-d85c2d6cb15e', 'DD2B1', 'dd2b1', 1, NULL, NULL),
(113, '6712c18d-bd36-45ce-abc3-32b7aee88b4a', 'BB2C8', 'bb2c8', 1, NULL, NULL),
(114, '39c2a12a-48f1-4b1c-a0e7-c3b2e093e44a', 'DD3B2', 'dd3b2', 1, NULL, NULL),
(115, '2d627944-59ef-40c4-b025-86b68690d89a', 'BB3B2', 'bb3b2', 1, NULL, NULL),
(116, '23ce56b5-ed07-412e-9123-c197465641b9', 'AA1E10', 'aa1e10', 1, NULL, NULL),
(117, '8b54f83f-5818-475c-b2da-dd62241f9e7e', 'BB2C7', 'bb2c7', 1, NULL, NULL),
(118, '9c39b168-3606-49a8-aea1-c00fc06cae97', 'AA2B8', 'aa2b8', 1, NULL, NULL),
(119, '561288ae-5b52-4fd1-adaf-ec62302a6378', 'DD3A1', 'dd3a1', 1, NULL, NULL),
(120, '934a0716-3f50-4f59-8c67-2639238a8972', 'AA2C10', 'aa2c10', 1, NULL, NULL),
(121, 'f7bdcd41-f02a-4615-bac0-4f99bee0b35a', 'AA2C3', 'aa2c3', 1, NULL, NULL),
(122, 'eea8bb49-30c7-435d-835a-86ee795ace65', 'AA2C7', 'aa2c7', 1, NULL, NULL),
(123, '3cdf91bc-3b89-45b5-9f22-c58ab7ad3b67', 'AA4B7', 'aa4b7', 1, NULL, NULL),
(124, '170ae11d-f717-4283-9a7a-1f55e3b56f41', 'AA2B6', 'aa2b6', 1, NULL, NULL),
(125, '84710f4f-fd6c-43b0-8c0b-a9928458f800', 'BB2D2', 'bb2d2', 1, NULL, NULL),
(126, '97932d33-2205-4a1c-b788-5d423240e8be', 'BB2D9', 'bb2d9', 1, NULL, NULL),
(127, '082ce697-01e9-4cd5-86b1-88aad4542f72', 'AA2D9', 'aa2d9', 1, NULL, NULL),
(128, 'f332ca35-4dc6-42e8-87b7-78c812695c3a', 'AA2C9', 'aa2c9', 1, NULL, NULL),
(129, '6bc9694a-29d9-4c04-823e-fd09466f5c6c', 'BB2D7', 'bb2d7', 1, NULL, NULL),
(130, '918cb1cd-f8e9-4ec8-b048-2de5e5e5d7a1', 'AA2D1', 'aa2d1', 1, NULL, NULL),
(131, '84ff95d8-be07-4764-97c7-47ce96bbfcf2', 'AA2D5', 'aa2d5', 1, NULL, NULL),
(132, '596755c6-d8db-4ef6-9ed8-63b52b5145a5', 'BB2D3', 'bb2d3', 1, NULL, NULL),
(133, 'b9174c3b-69fe-4960-b447-2c4c3f995712', 'BB2D10', 'bb2d10', 1, NULL, NULL),
(134, '4f93d399-2fcd-494c-8341-ae4b462fa3e0', 'BB2D6', 'bb2d6', 1, NULL, NULL),
(135, 'dd408718-f3f8-40b5-a91f-6753011a1336', 'AA2B1', 'aa2b1', 1, NULL, NULL),
(136, '0360a989-92fe-42f8-af51-a923cec0c524', 'AA2D4', 'aa2d4', 1, NULL, NULL),
(137, '937e4484-671c-49a9-93c1-e79fd30b9245', 'AA2D6', 'aa2d6', 1, NULL, NULL),
(138, '35e48acd-6580-498b-a4af-67c6886e4855', 'BB2D1', 'bb2d1', 1, NULL, NULL),
(139, '5e58b702-e61f-499a-87de-ab6f5391fbdb', 'BB2D5', 'bb2d5', 1, NULL, NULL),
(140, 'dda75e6c-2912-4517-a0a8-bc2c823e7dae', 'BB4C1', 'bb4c1', 1, NULL, NULL),
(141, 'd31742d0-c04c-4799-83e3-c4f3cc5e03c4', 'AA2D8', 'aa2d8', 1, NULL, NULL),
(142, '51c80a27-1ad6-4566-b0ff-0d965f5fd44c', 'AA2D2', 'aa2d2', 1, NULL, NULL),
(143, '034689df-90a5-4574-ac9e-d9563d18543f', 'AA2D7', 'aa2d7', 1, NULL, NULL),
(144, 'b5e70f0a-d8d6-43ba-9081-492040a80d55', 'BB2D8', 'bb2d8', 1, NULL, NULL),
(145, '7b1fa588-1fe7-4e13-aa44-c411de3337cd', 'BB2D4', 'bb2d4', 1, NULL, NULL),
(146, 'd3eb96ca-3fdb-4ba6-9e4f-1bcee7533025', 'BAY 06', 'bay-06', 1, NULL, NULL),
(147, '226b6073-01fc-4e47-bf7c-a84f14c8b2bc', 'AA2D3', 'aa2d3', 1, NULL, NULL),
(148, '67579613-591c-4056-8072-c7c1a5fbf354', 'DD4C2', 'dd4c2', 1, NULL, NULL),
(149, '609d9ba8-e6f5-4031-819e-392b21a3a082', 'BB2A3', 'bb2a3', 1, NULL, NULL),
(150, '6b429aaa-0424-4b58-a767-f83978259b68', 'DD2D5', 'dd2d5', 1, NULL, NULL),
(151, '258c29f8-8951-4718-89b0-7d6fe209c6a1', 'AA2F3', 'aa2f3', 1, NULL, NULL),
(152, 'd1c8acd4-990c-4e18-815a-683e924a5516', 'AA2E5', 'aa2e5', 1, NULL, NULL),
(153, 'f5c16709-21cc-4982-8773-4e2e39a4c525', 'AA2G2', 'aa2g2', 1, NULL, NULL),
(154, 'c94a8c98-292e-4521-87ba-25ce1dc62af5', 'BAY01', 'bay01', 1, NULL, NULL),
(155, '4a6b3ef3-f7e9-4d28-b9be-0d91e6d53fe4', 'BB3D5', 'bb3d5', 1, NULL, NULL),
(156, 'ea30459b-4298-4ed1-9f29-657cde28331f', 'BAY02', 'bay02', 1, NULL, NULL),
(157, 'a336dba5-f93f-461c-be90-d31f12b11e6b', 'AA2E1', 'aa2e1', 1, NULL, NULL),
(158, '1aaaf042-8c67-42e9-82f6-ad29efef73e6', 'BB1D6', 'bb1d6', 1, NULL, NULL),
(159, 'c77ec681-734b-4a7d-be3c-80570748d8c7', 'AA2F4', 'aa2f4', 1, NULL, NULL),
(160, '48eb0975-209d-4108-9101-b07a7ff3c7b4', 'BB1D9', 'bb1d9', 1, NULL, NULL),
(161, '3d8485de-c26b-45a8-9d56-4a0a59f6de78', 'AA4E5', 'aa4e5', 1, NULL, NULL),
(162, 'aceeecbb-52d0-4e3c-997b-1a99dc293708', 'AA2G1', 'aa2g1', 1, NULL, NULL),
(163, '03a45307-f416-44e3-8b61-ee1be774de03', 'AA2E8', 'aa2e8', 1, NULL, NULL),
(164, 'f0d8fc38-8dd2-44cd-a002-8925e71e0361', 'AA2F2', 'aa2f2', 1, NULL, NULL),
(165, '659ea463-26cc-44fc-a604-b00ac10aad94', 'BB3B3', 'bb3b3', 1, NULL, NULL),
(166, 'c22e68c7-9186-4a8a-8cae-68254d9d6ad1', 'BB3C7', 'bb3c7', 1, NULL, NULL),
(167, '142469f8-5b43-4bef-8fe1-51812397c1aa', 'AA3E3', 'aa3e3', 1, NULL, NULL),
(168, '363fee7e-e7c0-4ebf-b6da-6f93613a2577', 'BB3E5', 'bb3e5', 1, NULL, NULL),
(169, 'ed95a410-2f98-4e06-8799-01eea18dc483', 'BB4C5', 'bb4c5', 1, NULL, NULL),
(170, '362eaaa2-3c0a-4450-b561-6a560d35ab49', 'AA2G4', 'aa2g4', 1, NULL, NULL),
(171, '197e001b-d548-492d-9d30-a74c5daa77c2', 'AA2F5', 'aa2f5', 1, NULL, NULL),
(172, '81ad38d4-8eb4-48e3-9d60-7a3c18cdbc81', 'BB3C5', 'bb3c5', 1, NULL, NULL),
(173, '8aff06a1-4911-42d4-8c7e-c3b7c9e6c6ae', 'AA2G3', 'aa2g3', 1, NULL, NULL),
(174, '4fede9e3-3d70-46ac-8bdb-b2a5166e7cf5', 'AA2E3', 'aa2e3', 1, NULL, NULL),
(175, '7ffecc36-50c3-4b4b-a3c9-7e0353cd0694', 'AA2E2', 'aa2e2', 1, NULL, NULL),
(176, '91911a62-4818-4872-9c33-26f2bf5867ee', 'AA3D4', 'aa3d4', 1, NULL, NULL),
(177, '71250386-3841-4255-89d2-265e3ef88e11', 'AA3D5', 'aa3d5', 1, NULL, NULL),
(178, 'a2c61b30-c90e-4fd3-99f5-b6ba5cfa991d', 'BB1A1', 'bb1a1', 1, NULL, NULL),
(179, 'fbf7936c-be2b-44fe-8d49-3443cd8003e2', 'AA2E7', 'aa2e7', 1, NULL, NULL),
(180, '25c3b774-7f1d-4953-9fef-ea1ce9bf0d4f', 'AA2E6', 'aa2e6', 1, NULL, NULL),
(181, '21afc0bf-1209-4f66-b7f0-b0409ac35e60', 'AA2E4', 'aa2e4', 1, NULL, NULL),
(182, '26bee62a-a0c9-461e-8a5e-316261374fa4', 'BB3D4', 'bb3d4', 1, NULL, NULL),
(183, 'b25eed75-36ed-41b2-93b7-3102383c8637', 'AA4E3', 'aa4e3', 1, NULL, NULL),
(184, 'cff5cdd8-f434-45f5-b2f9-80b5a7ef6e77', 'BB3D1', 'bb3d1', 1, NULL, NULL),
(185, '1eddef45-6dd5-42a5-9979-0538b2ff4ca0', 'BB3D3', 'bb3d3', 1, NULL, NULL),
(186, 'ba6d5c48-dd36-4832-8cb1-53acfb265c41', 'AA4E4', 'aa4e4', 1, NULL, NULL),
(187, '7ee738a4-ef5e-4598-a57d-74510bfbef20', 'AA4F1', 'aa4f1', 1, NULL, NULL),
(188, 'fcc957c9-f532-48d9-8bbe-7faabd4619d5', 'BB3D2', 'bb3d2', 1, NULL, NULL),
(189, '46cb820b-3f61-4345-911e-354ec03d6181', 'AA4E2', 'aa4e2', 1, NULL, NULL),
(190, 'be6154c3-301e-47a8-b59c-72c6d4ed31d0', 'BB1A5', 'bb1a5', 1, NULL, NULL),
(191, 'dd4fffc3-1e29-43e6-b6e4-d20700449819', 'AA4C10', 'aa4c10', 1, NULL, NULL),
(192, '23596611-b025-4130-8f23-f90a9e79d65f', 'BB3E3', 'bb3e3', 1, NULL, NULL),
(193, '5f23c3b6-eca6-4ab9-9138-f9309865ed16', 'BB1A4', 'bb1a4', 1, NULL, NULL),
(194, 'e83cb994-373a-4c25-b8fa-9d4aca22f9ad', 'AA4C8', 'aa4c8', 1, NULL, NULL),
(195, '43b6b857-9b96-46f6-a9f4-a930d6d9be7b', 'AA4C9', 'aa4c9', 1, NULL, NULL),
(196, 'bcbd5ebd-138a-4476-a481-7ef013baa28a', 'AA4C6', 'aa4c6', 1, NULL, NULL),
(197, '52486536-9856-4edc-885b-4d1c7d213877', 'AA4C7', 'aa4c7', 1, NULL, NULL),
(198, '42db62e7-7834-4996-b9ad-010bbaa8b397', 'BB1D10', 'bb1d10', 1, NULL, NULL),
(199, '8a436bb4-d461-4b8e-8047-e99d418b41e9', 'BB3C9', 'bb3c9', 1, NULL, NULL),
(200, 'be322687-1067-49f6-afbd-57710c60f240', 'BB3C2', 'bb3c2', 1, NULL, NULL),
(201, '826b0373-451d-45cb-8c7b-693bd59dd40e', 'BB1A2', 'bb1a2', 1, NULL, NULL),
(202, 'ce075ba1-98a1-4fb8-9c8f-38b2a26352ca', 'BB3E2', 'bb3e2', 1, NULL, NULL),
(203, 'f2d046e4-eace-4823-8829-77dae8801d0d', 'BB1A3', 'bb1a3', 1, NULL, NULL),
(204, '338761a3-d5c6-4450-8aed-73d85bb51f9d', 'AA4C4', 'aa4c4', 1, NULL, NULL),
(205, 'd96ac0b5-83ac-4af5-ba36-ffa80dae9b47', 'BB4C3', 'bb4c3', 1, NULL, NULL),
(206, 'f5bbb50b-a234-4fee-a8c3-e7098219269c', 'BB4C4', 'bb4c4', 1, NULL, NULL),
(207, 'bf26254d-672c-41da-a786-6777b7b57a6f', 'BB3E1', 'bb3e1', 1, NULL, NULL),
(208, 'ff27774c-a1e5-407c-bc60-2b9a6af18c7b', 'BB3E4', 'bb3e4', 1, NULL, NULL),
(209, '7d1d6f5d-6265-41a1-a988-3f335c6ba246', 'BAY5', 'bay5', 1, NULL, NULL),
(210, '0dec1fc7-95dd-40d0-9df5-0a2215980b37', 'AA3D1', 'aa3d1', 1, NULL, NULL),
(211, 'cb4a62d5-83a0-46d1-a669-80180e692c54', 'AA3D2', 'aa3d2', 1, NULL, NULL),
(212, '91786db0-febb-47fc-8dd7-e284f39363e5', 'BB1D7', 'bb1d7', 1, NULL, NULL),
(213, 'd9859c7b-a532-4b08-8bab-fa7f8893bab5', 'AA3F1', 'aa3f1', 1, NULL, NULL),
(214, 'b440b9a7-ba2a-4aa5-8357-6ff2ddb683bb', 'AA3C8', 'aa3c8', 1, NULL, NULL),
(215, 'f0823fff-7db5-4f8f-90e9-6db304f5ca0e', 'AA3G1', 'aa3g1', 1, NULL, NULL),
(216, 'a8c5846d-cdf3-4f14-9dda-cb705a9c93ac', 'AA3C9', 'aa3c9', 1, NULL, NULL),
(217, '656ce70e-c759-413e-8d28-df1e8ac99e7b', 'AA4D1', 'aa4d1', 1, NULL, NULL),
(218, 'f5096cbf-4e9e-4631-80a4-1b85ab338508', 'AA3E1', 'aa3e1', 1, NULL, NULL),
(219, 'ab7ba452-b58e-42f3-abbb-62b60a52dbf5', 'AA3C6', 'aa3c6', 1, NULL, NULL),
(220, '12c176aa-9ab1-4a6a-a6ee-8cc153c0c976', 'AA3B1', 'aa3b1', 1, NULL, NULL),
(221, 'c9b8dbf2-e0f6-4b89-97a4-59ad864ba2f6', 'AA3A1', 'aa3a1', 1, NULL, NULL),
(222, '9d356837-90c0-44b8-b929-5e44c6527116', 'AA3F3', 'aa3f3', 1, NULL, NULL),
(223, '67ca1e4a-63d8-43a4-b0d0-1da99cdb8376', 'AA3F4', 'aa3f4', 1, NULL, NULL),
(224, '6fcb8726-8b53-468c-bf96-5dadf943828d', 'FLOOR', 'floor', 1, NULL, NULL),
(225, '9c7ab097-63fe-492d-98b1-9b4e6b4dc89b', 'AA3F2', 'aa3f2', 1, NULL, NULL),
(226, '66105959-4d8b-4ec8-a692-9a5ec0bc43a6', 'AA3D3', 'aa3d3', 1, NULL, NULL),
(227, 'a0b11c9d-04c2-4151-a504-3a028ca839e5', 'AA3B2', 'aa3b2', 1, NULL, NULL),
(228, 'c7c69297-1ce2-40a5-964f-1d490546761f', 'AA3C7', 'aa3c7', 1, NULL, NULL),
(229, '133303db-078b-4804-bd97-b37ad85b572b', 'AA3C4', 'aa3c4', 1, NULL, NULL),
(230, '8dc8508b-929e-431f-9ce3-9301d7373c0f', 'AA2C8', 'aa2c8', 1, NULL, NULL),
(231, '49cf551c-78e1-499b-b014-ebe4f1cdec02', 'AA3C10', 'aa3c10', 1, NULL, NULL),
(232, 'b9356dc6-bfc9-4a33-9b08-153ca7ccb814', 'BAY03', 'bay03', 1, NULL, NULL),
(233, '9c5c2aeb-c7b4-463d-9233-26929ae703b8', 'AA3B4', 'aa3b4', 1, NULL, NULL),
(234, '5e447342-5b76-4672-9911-95c99080b611', 'AA1C1', 'aa1c1', 1, NULL, NULL),
(235, '929f7a9f-f00b-4d78-a45f-f8989ca91877', 'AA1B1', 'aa1b1', 1, NULL, NULL),
(236, 'e8cfd282-b44f-4bde-8385-c1315cbd3581', 'AA1B2', 'aa1b2', 1, NULL, NULL),
(237, '49c1c6b7-017b-499e-9319-ed7ec9af3194', 'BB1D3', 'bb1d3', 1, NULL, NULL),
(238, 'cc001561-7058-4cda-b360-9ee9457deaa6', 'AA1B5', 'aa1b5', 1, NULL, NULL),
(239, '1b9472e9-57fa-471e-87a8-2f9614001ab4', 'AA1C9', 'aa1c9', 1, NULL, NULL),
(240, '98ba7d7e-ea52-4a87-991d-112b64ca8d7b', 'AA1C3', 'aa1c3', 1, NULL, NULL),
(241, '7236a29c-0d92-4566-91b1-14901df078d1', 'AA1B4', 'aa1b4', 1, NULL, NULL),
(242, 'e7c1f547-933f-43d8-8d45-59f7101f6ca7', 'AA1C8', 'aa1c8', 1, NULL, NULL),
(243, 'ab90f72c-b2d4-45b0-8958-c687013072cb', 'AA1C10', 'aa1c10', 1, NULL, NULL),
(244, 'b48635d5-2a82-41bc-aae2-93e9f4d5fffe', 'AA1C4', 'aa1c4', 1, NULL, NULL),
(245, '8a5ec390-7f78-4bc5-8778-13bcfe39c44c', 'AA1C5', 'aa1c5', 1, NULL, NULL),
(246, '5f434420-9d74-4a6d-9aa1-94fdefa2ce0d', 'AA1B3', 'aa1b3', 1, NULL, NULL),
(247, 'b8fdba2d-9501-43b8-bbd0-5e76803714be', 'AA2C5', 'aa2c5', 1, NULL, NULL),
(248, 'd52fd64c-5313-4a88-864a-d8e47c7556c6', 'AA1B6', 'aa1b6', 1, NULL, NULL),
(249, '241597cf-ef4a-47be-ab9d-78f948efc228', 'AA1C2', 'aa1c2', 1, NULL, NULL),
(250, 'a640e848-b393-47f4-ac72-aba17e86edcb', 'AA1C6', 'aa1c6', 1, NULL, NULL),
(251, 'b0ad9017-54dd-45a0-a4d2-da028c99768c', 'AA1C7', 'aa1c7', 1, NULL, NULL),
(252, '1b16423b-a335-4e05-8ac9-3c8a2ecb1d8c', 'BB2A2', 'bb2a2', 1, NULL, NULL),
(253, '4542c839-4923-4c5e-8deb-a28297f284e9', 'BB3A1', 'bb3a1', 1, NULL, NULL),
(254, 'b98aa853-54f9-48dc-9314-8687902d2f52', 'AA1G1', 'aa1g1', 1, NULL, NULL),
(255, '423f9164-5187-4663-bbd3-b74de29fd401', 'BB4B4', 'bb4b4', 1, NULL, NULL),
(256, 'ce74683a-4952-4dc0-9f02-8217fe96359e', 'CC1D1', 'cc1d1', 1, NULL, NULL),
(257, '5acf316c-32a7-4db4-afe3-b242f55ffe4c', 'BB4A1', 'bb4a1', 1, NULL, NULL),
(258, 'b52e3730-3691-44ac-9578-1199e89a09cc', 'AA4F5', 'aa4f5', 1, NULL, NULL),
(259, '2db851bb-84a8-4f9d-837b-dd130e3b53cf', 'AA4F4', 'aa4f4', 1, NULL, NULL),
(260, 'f4f8d88b-b518-4318-a2fa-0d36e38a63fd', 'BB2A1', 'bb2a1', 1, NULL, NULL),
(261, 'b2bf4698-8006-43ac-a327-4845d4ef098c', 'AA4B4', 'aa4b4', 1, NULL, NULL),
(262, 'b0ae7037-44b0-457f-800c-92adc69e56b4', 'POL STORE', 'pol-store', 1, NULL, NULL),
(263, '8d5eb3a9-9e8c-414f-889e-ff9871abe195', 'AA4C2', 'aa4c2', 1, NULL, NULL),
(264, '74fef721-3f4b-4529-ae66-0f0f62839c7e', 'AA4C5', 'aa4c5', 1, NULL, NULL),
(265, '2bb16756-672e-4c90-96a8-08096246f075', 'AA4C1', 'aa4c1', 1, NULL, NULL),
(266, '85c05709-3efc-4caf-8d11-57c31eb191bc', 'AA4A1', 'aa4a1', 1, NULL, NULL),
(267, '8b429461-9b00-4367-b563-79b1c5e5ce50', 'AA4A2', 'aa4a2', 1, NULL, NULL),
(268, 'f457025d-89cd-4275-8828-8ccfea537894', 'AA4B1', 'aa4b1', 1, NULL, NULL),
(269, 'df4dd094-1205-418e-83a5-7dd932cff66b', 'AA4B3', 'aa4b3', 1, NULL, NULL),
(270, '1c4d0482-6aca-41bc-a845-a38a87181302', 'AA4B6', 'aa4b6', 1, NULL, NULL),
(271, 'e7414481-e959-454e-8d94-6c71c996432b', 'AA4A4', 'aa4a4', 1, NULL, NULL),
(272, '4a150fce-07f8-4132-b599-1f54bc2f6517', 'BB1D8', 'bb1d8', 1, NULL, NULL),
(273, 'da9e8955-c287-428d-b42f-60e9b8221fe2', 'AA4C3', 'aa4c3', 1, NULL, NULL),
(274, '40f7947b-19f9-4215-9669-c6d4eb55df17', 'BB4B2', 'bb4b2', 1, NULL, NULL),
(275, 'e2f65223-33d1-4ac9-bbf3-fda637155532', 'NOT RECEIVED', 'not-received', 1, NULL, NULL),
(276, 'c1c64fe0-e2aa-47ee-97da-0aa17fad9a70', 'AA3C5', 'aa3c5', 1, NULL, NULL),
(277, 'a8981406-59e8-44dd-974a-0aa2f81879c6', 'AA4E1', 'aa4e1', 1, NULL, NULL),
(278, '9046283b-3a33-4578-bd47-57506f4905d6', 'BB2B1', 'bb2b1', 1, NULL, NULL),
(279, '7eaa20e9-23fc-416b-b9da-698d1f6380ab', 'AA2C4', 'aa2c4', 1, NULL, NULL),
(280, '921a2efc-2768-495b-964e-3ec05262b606', 'BB3C1', 'bb3c1', 1, NULL, NULL),
(281, '62776bcd-1568-4cdb-8863-787c3a8c8bdf', 'BB2C3', 'bb2c3', 1, NULL, NULL),
(282, '3a9d0153-2fd6-4ef7-bfcb-444512bd8e02', 'AA4D2', 'aa4d2', 1, NULL, NULL),
(283, '63ae20a5-26fb-4978-a8e5-de4f82950ffa', 'AA4D5', 'aa4d5', 1, NULL, NULL),
(284, 'b37da198-c3ec-4287-a29f-c9735083f1d4', 'BB4D1', 'bb4d1', 1, NULL, NULL),
(285, '5cd1d312-5d2f-4725-820f-26d14c15ff78', 'BB4B1', 'bb4b1', 1, NULL, NULL),
(286, 'a02839ec-3310-41bb-bf87-b409ce4a7cbe', 'CC4C1', 'cc4c1', 1, NULL, NULL),
(287, '9103509c-501a-44f1-aa6b-195094fc6b25', 'CC3C2', 'cc3c2', 1, NULL, NULL),
(288, '9248a028-abf0-4db9-ad63-c51a5d00692a', 'BB4D3', 'bb4d3', 1, NULL, NULL),
(289, '9b9a73cc-7774-4016-97f3-a6feba60b09a', 'BB1C9', 'bb1c9', 1, NULL, NULL),
(290, '4bd1caad-7e1f-4613-9e75-03dc81b1807e', 'ARMAMENT', 'armament', 1, NULL, NULL),
(291, 'd7003c86-cf77-440c-9cce-aa47e21bc6ed', 'DD1B1', 'dd1b1', 1, NULL, NULL),
(292, '2e79afc4-e3bf-4c77-9c33-10fb85d75d56', 'DD1B2', 'dd1b2', 1, NULL, NULL),
(293, 'cc096d2e-d0ad-47aa-9f7a-c25d91c1707c', 'BB2E9', 'bb2e9', 1, NULL, NULL),
(294, '873dc882-bb62-469a-87b5-2c57da104d27', 'BB2B7', 'bb2b7', 1, NULL, NULL),
(295, 'e418d7be-392e-42fe-9c0e-d558fdb008b2', 'BB3D8', 'bb3d8', 1, NULL, NULL),
(296, 'f75486c7-a78a-4116-bdfb-c88f169936c0', 'CC2B2', 'cc2b2', 1, NULL, NULL),
(297, '81d0f831-1fad-40da-b319-dcb6c6f039af', 'AA4F8', 'aa4f8', 1, NULL, NULL),
(298, '2d5483a9-e3c1-418a-a03a-08fc43eb24eb', 'BB4D2', 'bb4d2', 1, NULL, NULL),
(299, 'c5a4c56a-bee4-4700-b339-1433ef98481e', 'AA4E6', 'aa4e6', 1, NULL, NULL),
(300, '6ff260fd-d64e-44b4-855b-836b96d55a2d', 'BB2B9', 'bb2b9', 1, NULL, NULL),
(301, '66c4a4a0-c04c-4a10-a5a7-1de53a974de8', 'CC2B3', 'cc2b3', 1, NULL, NULL),
(302, 'ce72898e-31fa-413a-a517-5f77d38fa496', 'AA4D7', 'aa4d7', 1, NULL, NULL),
(303, '5f003416-f23a-4852-8f53-4f8591ad67d9', 'BB2B8', 'bb2b8', 1, NULL, NULL),
(304, 'cb5af788-6cf1-4a35-9d69-8642d0c44af7', 'BB3B9', 'bb3b9', 1, NULL, NULL),
(305, 'a2e2a909-e6a3-49d3-8df3-14127b309936', 'AA3B3', 'aa3b3', 1, NULL, NULL),
(306, 'f7ab6216-8ea1-4ef4-a14f-7afab3c69ffc', 'CC2C1', 'cc2c1', 1, NULL, NULL),
(307, 'd49cf51f-2d16-4c6b-9445-c860631768b2', 'CC3C1', 'cc3c1', 1, NULL, NULL),
(308, '7b19f706-74c0-4e6b-b2ae-513e67e12f4a', 'BB3B10', 'bb3b10', 1, NULL, NULL),
(309, '796cc848-0335-4803-85b1-ddb9f91068b6', 'CC1C3', 'cc1c3', 1, NULL, NULL),
(310, '5978b9c9-17fa-458f-9b3c-8a92f78f2d7d', 'AA4A3', 'aa4a3', 1, NULL, NULL),
(311, '826bbb61-cc21-4b61-8fa7-5b00d10faed2', 'CC2B1', 'cc2b1', 1, NULL, NULL),
(312, '1d2d58b6-30e4-4295-ab20-781b9edf2a8e', 'BB1A9', 'bb1a9', 1, NULL, NULL),
(313, 'ab08b2f3-4869-4786-b150-d275b4011e04', 'AA3A2', 'aa3a2', 1, NULL, NULL),
(314, '599b1ed2-d4d2-4a3b-8c2b-599db5789865', 'BB3D7', 'bb3d7', 1, NULL, NULL),
(315, '268c4e96-4518-4f84-bed1-cb1a919baf50', 'AA4F7', 'aa4f7', 1, NULL, NULL),
(316, '6f6a84c4-e1bc-4d9e-802f-00183a8d1af7', 'BB3D9', 'bb3d9', 1, NULL, NULL),
(317, '5d79124a-b326-47f0-a631-9c6ad88a46b0', 'BB4D4', 'bb4d4', 1, NULL, NULL),
(318, '3ee9448b-47a8-4172-aafb-c3c4b7b241ec', 'CC1C2', 'cc1c2', 1, NULL, NULL),
(319, '38a9f173-d322-4d08-8971-2f1e4e705345', 'CC2C2', 'cc2c2', 1, NULL, NULL),
(320, '4f814eb8-b7c7-4455-853a-a52fd677f08a', 'BB4D5', 'bb4d5', 1, NULL, NULL),
(321, '5a8af3fb-362a-4259-b918-1792afb9c372', 'CC1C1', 'cc1c1', 1, NULL, NULL),
(322, 'ccf73b34-b28c-4eae-9a74-e36e78c49ba2', 'BB3B7', 'bb3b7', 1, NULL, NULL),
(323, '969bf923-350e-4e4c-a766-a690f5c7e064', 'BB3B8', 'bb3b8', 1, NULL, NULL),
(324, '16492f58-a8c8-4563-b425-63570adf3018', 'BB1A8', 'bb1a8', 1, NULL, NULL),
(325, 'f03dda00-f07a-4950-aa67-88618f8ed0f5', 'AA4D3', 'aa4d3', 1, NULL, NULL),
(326, '7716ecbb-ead6-4996-b7cd-0ca957f62508', 'AA4E8', 'aa4e8', 1, NULL, NULL),
(327, '8411c8e8-d0ff-4ede-a603-1054351de1e3', 'BB2E8', 'bb2e8', 1, NULL, NULL),
(328, 'dd8ef424-a325-473d-a839-b1b50645e0f4', 'CC4B1', 'cc4b1', 1, NULL, NULL),
(329, 'd99a8d63-285f-4db1-a039-737dfb1924c7', 'CC4C2', 'cc4c2', 1, NULL, NULL),
(330, 'db74cf3c-f749-4267-b557-069fbfd1abe6', 'BB3C8', 'bb3c8', 1, NULL, NULL),
(331, '0d0a1ae6-a7d1-4cb7-829f-0c0a8080d8c6', 'CC3B1', 'cc3b1', 1, NULL, NULL),
(332, '3b3c1eb2-03a3-4262-a031-c4c48e496d58', 'BB1A7', 'bb1a7', 1, NULL, NULL),
(333, '52bbbbaa-9e73-4ee8-89f6-925504c44792', 'BB4E1', 'bb4e1', 1, NULL, NULL),
(334, 'e1daf7ef-b3fb-4a92-ae3f-72b4704f49d6', 'AA2F6', 'aa2f6', 1, NULL, NULL),
(335, 'b26c67cb-79a5-4ba1-83f8-e6dc1e307420', 'BB1E8', 'bb1e8', 1, NULL, NULL),
(336, '1c1d1def-8404-4cc7-b377-ec0d1552004f', 'BB1E9', 'bb1e9', 1, NULL, NULL),
(337, '8c3057da-5159-47f4-9e91-a2efc45e6623', 'BB1E7', 'bb1e7', 1, NULL, NULL),
(338, 'f798807a-84c5-45ad-8a5b-4cf3fd5daa65', 'BB1E6', 'bb1e6', 1, NULL, NULL),
(339, '6c1a0a01-c2e1-4ba6-9e51-89617a3dac04', 'BB2E7', 'bb2e7', 1, NULL, NULL),
(340, '91524c05-a2f2-482b-8804-61091afb8453', 'BB 1A 9', 'bb-1a-9', 1, NULL, NULL),
(341, '26995141-d35e-482e-a6d0-6bf08e43acc0', 'BB 1A 10', 'bb-1a-10', 1, NULL, NULL),
(342, 'd4234f5a-869d-434f-a810-f77434777879', 'BB 2E 5', 'bb-2e-5', 1, NULL, NULL),
(343, 'a5a8c6f5-fb7d-4c0a-9707-679f627d636e', 'BB 2E 4', 'bb-2e-4', 1, NULL, NULL),
(344, 'be09cb0d-b013-473d-a72f-72cd7e7d3c50', 'BB 2E 3', 'bb-2e-3', 1, NULL, NULL),
(345, '04457bd2-4b67-486c-bc82-b1877b7a8eec', 'BB 2E 2', 'bb-2e-2', 1, NULL, NULL),
(346, '948e0c2f-60e0-4717-bcb2-38b0ae8aab40', 'BB 2E 1', 'bb-2e-1', 1, NULL, NULL),
(347, 'ef12ed9a-3179-45de-9e94-f7db8d5254e6', 'BB 1C 10', 'bb-1c-10', 1, NULL, NULL),
(348, '0461a97b-37b7-4fb7-a995-3e306171bc0c', 'CAGE   B', 'cage-b', 1, NULL, NULL),
(349, '15295bd7-ccc0-4120-876c-75641ad75d93', 'BB3E 10', 'bb3e-10', 1, NULL, NULL),
(350, '7318fd1a-8270-4cce-bd81-96835d15f9e9', 'BB3E 9', 'bb3e-9', 1, NULL, NULL),
(351, '71305a22-53b8-4787-a9e7-87264c8ba251', 'BB3E 6', 'bb3e-6', 1, NULL, NULL),
(352, '9dad074e-b9f0-4ee0-8bd7-d6efbb872526', 'BB3E 3', 'bb3e-3', 1, NULL, NULL),
(353, '369ba293-a84f-4f47-aebf-e6abed4a4a4d', 'BB4E 4', 'bb4e-4', 1, NULL, NULL),
(354, '8b3e8f9c-6281-4c64-b69f-11a2e4c5c5bb', 'BB4E', 'bb4e', 1, NULL, NULL),
(355, '99b2fc06-b0d0-4fa7-b698-8e007ec2444a', 'BB4E 2', 'bb4e-2', 1, NULL, NULL),
(356, 'd6f30381-e4c1-47e5-95a3-003ca669da70', 'AA1C 6', 'aa1c-6', 1, NULL, NULL),
(357, '75fac79a-73a5-45b8-a7bf-a45189aceef1', 'BAY  01', 'bay-01', 1, NULL, NULL),
(358, '3401ae0a-83ed-4ec2-80a7-2df8bdb24aa7', 'BB2A8', 'bb2a8', 1, NULL, NULL),
(359, 'b9a00973-f541-4ab7-8d3d-25178b89e880', 'BB 2A 5', 'bb-2a-5', 1, NULL, NULL),
(360, '868b416e-3d5d-4668-aa0f-96a21c2da184', 'BB2A 7', 'bb2a-7', 1, NULL, NULL),
(361, 'd65b388f-85c2-42c7-9da9-19e4a3228445', 'BB2A 6', 'bb2a-6', 1, NULL, NULL),
(362, 'a8efd39f-8eff-4477-944a-1f53c7c265ba', 'BB2A4', 'bb2a4', 1, NULL, NULL),
(363, '3a0dcd4a-ce27-4049-be65-f6f09dd36714', 'CC1A2', 'cc1a2', 1, NULL, NULL),
(364, '2b19056d-eeed-47a2-9312-5792b641d53e', 'CC1A1', 'cc1a1', 1, NULL, NULL),
(365, '97fc9ebe-70c3-4600-b49b-0664036f3eee', 'CC2D5', 'cc2d5', 1, NULL, NULL),
(366, 'f7b8284c-ab7a-40e1-af19-a50eea41a105', 'CC3C5', 'cc3c5', 1, NULL, NULL),
(367, '577ad8da-e730-4a31-8b16-59d4a2b95299', 'CC3C4', 'cc3c4', 1, NULL, NULL),
(368, '73ec2727-4f26-4286-9a26-f2c31defc09c', 'CC1B3', 'cc1b3', 1, NULL, NULL),
(369, '48a9b37e-8042-40dc-ad51-47b808983549', 'CC2D1', 'cc2d1', 1, NULL, NULL),
(370, 'b022fa01-7ae5-49f6-99cf-ec000cc1adb5', 'CC2D2', 'cc2d2', 1, NULL, NULL),
(371, '735a22b1-a997-4bc3-b352-97e8ff7fad18', 'CC1D3', 'cc1d3', 1, NULL, NULL),
(372, '1f421777-6e0a-471d-a3b7-c40c17a1cdf3', 'CC3C3', 'cc3c3', 1, NULL, NULL),
(373, '2143d7ab-415b-445b-b60e-955109f67727', 'CC1D2', 'cc1d2', 1, NULL, NULL),
(374, 'bc69401b-67dd-4598-a087-57f4c5dedad1', 'CC2D4', 'cc2d4', 1, NULL, NULL),
(375, 'bb779ea2-7a1d-47d5-bb9c-3b17b54fb1a9', 'CC2D3', 'cc2d3', 1, NULL, NULL),
(376, '96b4d9f9-0589-4293-99ac-11dd32006874', 'AA2B5', 'aa2b5', 1, NULL, NULL),
(377, '270f3aff-5395-42a0-b03d-10f3180fb631', 'AA 2F 5', 'aa-2f-5', 1, NULL, NULL),
(378, '242c73a3-0832-40d0-95ae-1add3c67d332', 'AA 2F 2', 'aa-2f-2', 1, NULL, NULL),
(379, '1fdb854e-88fb-401d-a360-9b79dc130c63', 'AA 4E 2', 'aa-4e-2', 1, NULL, NULL),
(380, 'd7cd1e1d-b478-4603-aed1-b881fc4e8368', 'AA 3C 5', 'aa-3c-5', 1, NULL, NULL),
(381, 'f80fecc5-79ff-4c65-8868-9d3b73093beb', 'AA 3C 6', 'aa-3c-6', 1, NULL, NULL),
(382, '2a3d51e9-ede0-4ec7-9088-fd2bef3a6e91', 'BB 3C 2', 'bb-3c-2', 1, NULL, NULL),
(383, 'b43f34ff-919f-4b57-b976-74a856b4a5cc', 'BB 3B 6', 'bb-3b-6', 1, NULL, NULL),
(384, '894560ff-1c96-4053-8a49-427a7a972725', 'BB 4C 4', 'bb-4c-4', 1, NULL, NULL),
(385, '2572ee23-111d-4a32-89ab-e1e6c226a898', 'BB 3D 10', 'bb-3d-10', 1, NULL, NULL),
(386, 'ed42cf7d-6bac-422b-b68c-c623a08b3702', 'BB 3D 4', 'bb-3d-4', 1, NULL, NULL),
(387, 'e60c6640-dc97-4bce-bf95-dcc9c0166127', 'BB 3D 5', 'bb-3d-5', 1, NULL, NULL),
(388, '01d60e32-45a5-45c2-81ad-ae9abb10c924', 'DD 4C1', 'dd-4c1', 1, NULL, NULL),
(389, '60fe12c8-0f1b-4357-84db-d02ca260a5e5', 'BAY 02', 'bay-02', 1, NULL, NULL),
(390, '22d7c2a7-390a-4791-a6b3-f33d1ff298ee', 'CC3D 1', 'cc3d-1', 1, NULL, NULL),
(391, 'face7644-8416-4b23-98c8-543b3b7a2e8a', 'CC 3D 1', 'cc-3d-1', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` bigint UNSIGNED NOT NULL,
  `log_type_id` int NOT NULL,
  `user_id` int NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `log_types`
--

CREATE TABLE `log_types` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lpos`
--

CREATE TABLE `lpos` (
  `id` bigint UNSIGNED NOT NULL,
  `number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_id` bigint UNSIGNED DEFAULT NULL,
  `delivery_date` datetime DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` date DEFAULT NULL,
  `reference` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `type` enum('lpo','overseas') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'lpo',
  `store_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lpos`
--

INSERT INTO `lpos` (`id`, `number`, `supplier_id`, `delivery_date`, `user_id`, `status`, `created_at`, `updated_at`, `date`, `reference`, `type`, `store_id`) VALUES
(1, '#232', 1, '2023-08-25 00:00:00', 3, 0, '2023-08-08 03:43:29', '2023-08-08 03:43:29', '2023-08-10', 'LPO Number : #232<br/>Delivery Note : test delivery<br/>Invoice Number : werw<br/>', 'lpo', 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2020_11_02_210257_create_permission_groups_table', 2),
(6, '2022_04_14_093013_create_notifications_table', 3),
(7, '2022_04_19_092633_create_log_types_table', 4),
(8, '2022_04_19_093407_create_logs_table', 4),
(10, '2022_04_20_060741_create_properties_table', 5),
(11, '2022_04_20_080753_create_property_models_table', 6),
(12, '2022_04_22_085534_create_suppliers_table', 7),
(13, '2022_04_25_124833_create_categories_table', 8),
(14, '2022_04_25_133219_create_locations_table', 9),
(16, '2022_04_25_134953_create_departments_table', 10),
(17, '2022_04_28_080701_create_spare_parts_table', 11),
(24, '2022_05_12_071444_update_spare_parts_add_property_model_id', 12),
(25, '2022_05_16_084116_create_lpos_table', 12),
(26, '2022_06_07_072525_create_stores_table', 13),
(27, '2022_06_07_074139_update_spare_parts_table_add_store_id', 14),
(28, '2022_06_14_122150_update_users_table_add_store_id', 15),
(30, '2022_06_14_210649_create_stocks_table', 16),
(33, '2022_06_16_082750_update_stocks_table_add_fields', 17),
(34, '2022_06_17_075530_create_aircraft_table', 17),
(35, '2022_06_21_131957_update_stocks_table_add_remarks', 18),
(37, '2022_07_20_042715_update_lpos_table_add_spare_part_id', 19),
(42, '2022_07_28_130149_update_spare_parts_table_add_svc_and_unsv', 20),
(43, '2022_07_28_130300_update_stocks_table_add_state_column', 20),
(45, '2022_08_04_120053_update_lpos_table_rename_spare_part_id_to_stock_id', 21),
(48, '2022_08_04_122246_update_stocks_table_add_lpo_id', 22),
(49, '2022_08_05_075020_update_lpos_table_add_lpo_date', 22),
(51, '2022_08_20_145729_update_stocks_table_add_store_id', 23),
(55, '2022_08_21_081414_create_record_of_vouchers_table', 24),
(58, '2022_08_29_075138_create_stock_record_sheets_table', 25),
(59, '2022_08_31_030553_update_stocks_table_add_supplier_id', 26),
(60, '2022_09_19_200141_update_permission_groups_table_add_menu_item_permissions', 27),
(61, '2022_12_05_081526_update_record_of_vouchers_table_add_technician_id', 28),
(63, '2022_12_09_074326_update_lpos_table_add_reference', 29),
(65, '2022_12_09_084105_update_users_table_add_department_id', 30),
(66, '2023_01_06_082029_update_lpos_table_add_type', 31),
(68, '2023_01_19_075212_update_stocks_table_add_department_id', 32),
(69, '2023_02_07_231805_update_stocks_table_add_mo_id', 33),
(70, '2023_06_12_074854_update_lpos_table_add_store_id', 34),
(71, '2023_06_12_084822_update_spare_parts_table_drop_columns', 34),
(72, '2023_06_12_102954_create_store_parts_table', 34);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint UNSIGNED NOT NULL,
  `data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('327493ec-cb4b-4fd1-b586-0d04260c5477', 'App\\Notifications\\SmartNotification', 'App\\Models\\User', 3, '{\"sender\":null,\"subject\":\"Book has Paid\",\"message\":\"Testing notification\"}', NULL, '2023-01-17 03:35:37', '2023-01-17 03:35:37'),
('b7387d1e-ac4b-4738-8c9c-68ea44e95374', 'App\\Notifications\\SmartNotification', 'App\\Models\\User', 3, '{\"sender\":null,\"subject\":\"Book has Paid\",\"message\":\"Testing notification for the users\"}', NULL, '2023-01-17 03:47:50', '2023-01-17 03:47:50'),
('c144e9e1-2144-4b42-bd72-65177a8fe003', 'App\\Notifications\\SmartNotification', 'App\\Models\\User', 3, '{\"sender\":null,\"subject\":\"Book has Paid\",\"message\":\"Testing notification\"}', NULL, '2023-01-17 03:47:19', '2023-01-17 03:47:19');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_groups`
--

CREATE TABLE `permission_groups` (
  `id` bigint UNSIGNED NOT NULL,
  `_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `permissions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `user_id` int NOT NULL,
  `is_default` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `menu_item_permissions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_groups`
--

INSERT INTO `permission_groups` (`id`, `_id`, `name`, `slug`, `description`, `permissions`, `user_id`, `is_default`, `created_at`, `updated_at`, `menu_item_permissions`) VALUES
(1, '960d657c-d0dd-45af-b3bd-1d9d8642b48f', 'Administrator', 'administrator', 'Covers the user admin', NULL, 1, 0, '2022-04-13 06:40:14', '2022-04-13 06:40:14', NULL),
(2, '99d6c471-dac7-43ad-8874-8980af2d26e2', 'Store QM', 'store-qm', 'QM permissions', '[\"view_dashboard\",\"supplier_management\",\"view_local_purchase_orders\",\"aircraft\",\"view_stock_movement\",\"issuing\",\"receiving\",\"spare_parts\",\"reports\",\"settings\",\"store_qm\"]', 1, 0, '2022-06-15 03:17:42', '2023-08-08 03:42:58', '[]'),
(3, '97630659-ef90-47b5-bec4-81d0c29205d9', 'OC store', 'oc-store', 'Officer Commanding Stores', '[\"view_dashboard\",\"view_stock_movement\",\"reports\",\"stocks\",\"officer_commanding\"]', 1, 0, '2022-06-15 03:18:02', '2022-09-30 02:27:21', '[\"ivLists\",\"rvLists\",\"nilStocks\",\"add_item\",\"units\"]'),
(4, '96a4675c-a373-4a59-a2bf-5e3f08fec656', 'CO Stores', 'co-stores', 'Commanding Officer', '[\"view_dashboard\",\"supplier_management\",\"view_local_purchase_orders\",\"receiving\",\"reports\",\"stocks\",\"settings\",\"commanding_officer\"]', 2, 0, '2022-06-27 08:12:17', '2022-06-27 08:15:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` bigint UNSIGNED NOT NULL,
  `_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `user_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `_id`, `name`, `slug`, `description`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '961b4af9-aa7a-459c-b3f0-980b08dfd529', 'Helicopters', 'helicopters', 'This is used to manage the property we havef', 1, '2022-04-20 03:21:10', '2022-04-20 04:27:41');

-- --------------------------------------------------------

--
-- Table structure for table `property_models`
--

CREATE TABLE `property_models` (
  `id` bigint UNSIGNED NOT NULL,
  `property_id` bigint UNSIGNED NOT NULL,
  `_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_models`
--

INSERT INTO `property_models` (`id`, `property_id`, `_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, '961b6fab-7e29-4bf9-bae2-991d3c54b858', 'MD 530F', 'MD530F helicpoter model', '2022-04-20 06:10:17', '2022-04-20 06:10:17'),
(2, 1, '9716a68f-05ef-466d-b205-350142543f1d', 'MD 500', 'MD 500', '2022-08-23 03:16:34', '2022-08-23 03:16:34');

-- --------------------------------------------------------

--
-- Table structure for table `record_of_vouchers`
--

CREATE TABLE `record_of_vouchers` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `vnumber` int UNSIGNED NOT NULL,
  `entry_type` enum('rvstore','ivstore','ivtech','rvtech','rv','iv') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_id` bigint UNSIGNED DEFAULT NULL,
  `supplier_id` bigint UNSIGNED DEFAULT NULL,
  `aircraft_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `technician_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `record_of_vouchers`
--

INSERT INTO `record_of_vouchers` (`id`, `user_id`, `vnumber`, `entry_type`, `store_id`, `supplier_id`, `aircraft_id`, `created_at`, `updated_at`, `technician_id`) VALUES
(1, 3, 1, 'rv', NULL, 1, NULL, '2023-08-08 03:53:47', '2023-08-08 03:53:47', NULL),
(2, 3, 1, 'ivtech', NULL, NULL, 2, '2023-08-13 06:06:30', '2023-08-13 06:06:30', 4),
(3, 3, 2, 'iv', NULL, 1, NULL, '2023-08-13 17:00:07', '2023-08-13 17:00:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `spare_parts`
--

CREATE TABLE `spare_parts` (
  `id` bigint UNSIGNED NOT NULL,
  `part_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `serial_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `unit_of_account` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` bigint UNSIGNED DEFAULT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `warranty_date` datetime DEFAULT NULL,
  `expiry_date` datetime DEFAULT NULL,
  `reorder_level` int DEFAULT NULL,
  `remarks` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `control_level` int NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `property_model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spare_parts`
--

INSERT INTO `spare_parts` (`id`, `part_number`, `serial_number`, `description`, `unit_of_account`, `department_id`, `category_id`, `warranty_date`, `expiry_date`, `reorder_level`, `remarks`, `control_level`, `status`, `user_id`, `created_at`, `updated_at`, `property_model_id`) VALUES
(1, 'PRT45345H', '0', 'Part for Aircraft', 'single', 3, 4, NULL, NULL, 20, NULL, 4, 0, 3, '2023-08-08 03:40:09', '2023-08-08 03:40:09', 2);

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint UNSIGNED NOT NULL,
  `spare_part_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL DEFAULT '0',
  `entry_type` enum('IV','RV') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'RV',
  `reference` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `issue_status` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `receive_status` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `issue_type` enum('NML','TL') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NML',
  `voucher` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_issued` enum('store','technician','supplier') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'store',
  `issued_by` int DEFAULT NULL,
  `issued_to` int DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `received_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `aircraft_id` bigint UNSIGNED DEFAULT NULL,
  `mo_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `remarks` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `state` enum('serviceable','unserviceable') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'serviceable',
  `lpo_id` int UNSIGNED DEFAULT NULL,
  `store_id` int UNSIGNED DEFAULT NULL,
  `record_of_voucher_id` int UNSIGNED DEFAULT NULL,
  `supplier_id` bigint UNSIGNED DEFAULT NULL,
  `department_id` bigint UNSIGNED DEFAULT NULL,
  `quantity_requested` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `spare_part_id`, `quantity`, `entry_type`, `reference`, `reason`, `issue_status`, `receive_status`, `issue_type`, `voucher`, `account_issued`, `issued_by`, `issued_to`, `date`, `received_by`, `created_at`, `updated_at`, `aircraft_id`, `mo_id`, `user_id`, `remarks`, `state`, `lpo_id`, `store_id`, `record_of_voucher_id`, `supplier_id`, `department_id`, `quantity_requested`) VALUES
(1, 1, 30, 'RV', NULL, 'purchase', 0, 4, 'NML', NULL, 'store', 1, NULL, '2023-08-08 06:53:47', 3, '2023-08-08 03:43:44', '2023-08-08 03:53:47', NULL, NULL, 3, NULL, 'serviceable', 1, 1, 1, 1, NULL, 0),
(2, 1, 3, 'IV', 'test', 'Maintenance', 5, 0, 'NML', NULL, 'technician', 3, 4, '2023-08-13 09:17:21', 4, '2023-08-08 08:45:23', '2023-08-13 06:17:21', 2, 6, 4, NULL, 'serviceable', NULL, 1, 2, NULL, 9, 3),
(3, 1, 1, 'RV', NULL, 'maintenance', 0, 2, 'NML', NULL, 'store', 4, NULL, NULL, NULL, '2023-08-13 06:38:06', '2023-08-13 16:59:52', 1, NULL, 4, NULL, 'unserviceable', NULL, NULL, NULL, NULL, NULL, 0),
(4, 1, 2, 'RV', NULL, 'maintenance', 0, 4, 'NML', NULL, 'store', 4, NULL, '2023-08-13 10:11:37', 3, '2023-08-13 06:56:44', '2023-08-13 07:11:37', 2, NULL, 4, NULL, 'unserviceable', NULL, 1, 2, NULL, NULL, 0),
(5, 1, 2, 'IV', 'maintenance', 'repair', 5, 0, 'NML', NULL, 'supplier', 3, 1, '2023-08-13 20:00:07', NULL, '2023-08-13 16:58:57', '2023-08-13 17:00:07', NULL, NULL, 3, NULL, 'unserviceable', NULL, 1, 3, NULL, NULL, 0),
(6, 1, 3, 'IV', NULL, 'reconfiguration', 4, 0, 'NML', NULL, 'supplier', NULL, 2, NULL, NULL, '2023-08-14 05:53:56', '2023-08-14 06:28:48', NULL, NULL, 3, NULL, 'serviceable', NULL, 1, NULL, NULL, NULL, 0),
(7, 1, 3, 'IV', NULL, 'testing', 3, 0, 'NML', NULL, 'supplier', NULL, 2, NULL, NULL, '2023-08-14 06:25:32', '2023-08-14 06:25:32', NULL, NULL, 3, NULL, 'serviceable', NULL, 1, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `stock_record_sheets`
--

CREATE TABLE `stock_record_sheets` (
  `id` bigint UNSIGNED NOT NULL,
  `stock_id` int NOT NULL,
  `user_id` int NOT NULL,
  `balance_in_stock` int NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stock_record_sheets`
--

INSERT INTO `stock_record_sheets` (`id`, `stock_id`, `user_id`, `balance_in_stock`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 30, 30, '2023-08-08 03:53:47', '2023-08-08 03:53:47'),
(2, 2, 3, 30, 3, '2023-08-13 06:06:30', '2023-08-13 06:06:30'),
(3, 2, 3, 27, 3, '2023-08-13 06:06:37', '2023-08-13 06:06:37'),
(4, 2, 3, 24, 3, '2023-08-13 06:07:33', '2023-08-13 06:07:33'),
(5, 2, 3, 21, 3, '2023-08-13 06:15:30', '2023-08-13 06:15:30'),
(6, 2, 3, 18, 3, '2023-08-13 06:17:21', '2023-08-13 06:17:21'),
(7, 4, 3, 2, 2, '2023-08-13 07:11:37', '2023-08-13 07:11:37'),
(8, 5, 3, 2, 2, '2023-08-13 17:00:07', '2023-08-13 17:00:07');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `status` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `name`, `slug`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'QM Tech Store', 'qm-tech-store', 3, 1, '2022-06-07 04:40:35', '2022-06-07 04:40:35'),
(2, 'ASSD Store', 'assd-store', 3, 1, '2022-09-30 02:21:57', '2022-09-30 02:21:57');

-- --------------------------------------------------------

--
-- Table structure for table `store_parts`
--

CREATE TABLE `store_parts` (
  `id` bigint UNSIGNED NOT NULL,
  `spare_part_id` bigint UNSIGNED NOT NULL,
  `store_id` bigint UNSIGNED NOT NULL,
  `quantity` double NOT NULL DEFAULT '0',
  `svc_quantity` double NOT NULL DEFAULT '0',
  `unsvc_quantity` double NOT NULL DEFAULT '0',
  `location_id` int DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `store_parts`
--

INSERT INTO `store_parts` (`id`, `spare_part_id`, `store_id`, `quantity`, `svc_quantity`, `unsvc_quantity`, `location_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 15, 15, 0, 9, 3, '2023-08-08 03:53:47', '2023-08-13 17:00:07');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint UNSIGNED NOT NULL,
  `_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `user_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `_id`, `name`, `email`, `phone`, `location`, `address`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '961f75cd-8a45-40ac-9f96-fbbfdcc2fd74', 'CISMIC Innovation', 'cismic@mod.go.ke', '+254712676789', 'Kilimani', '3089 Nairobi', 3, '2022-04-22 06:07:50', '2022-04-22 06:10:45'),
(2, '96f2645e-bf0b-462a-8e62-f3201b9a5f38', 'Bata Kenya', 'info@bata.co.ke', '+254712676789', 'Limuru', 'Nairobi', 3, '2022-08-05 02:41:32', '2022-08-05 02:41:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rank` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `permission_group_id` int DEFAULT NULL,
  `department_id` bigint UNSIGNED DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL,
  `created_by` bigint UNSIGNED NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `store_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `_id`, `full_name`, `email`, `phone`, `service_number`, `rank`, `role`, `username`, `email_verified_at`, `permission_group_id`, `department_id`, `password`, `status`, `created_by`, `remember_token`, `created_at`, `updated_at`, `store_id`) VALUES
(1, '97ec0407-8f14-4b22-bb99-f3c6633315d7', 'Paxton', 'paxton@gmail.com', '+254712676789', '129162', 'LT', 'technician', 'Thoya', '2022-04-12 07:39:48', NULL, NULL, '$2y$10$ZRXKjG8qzlDyBksqZ9NXa.mqYr7u3C702wotHJbGuiZBFlJd5LNzC', 1, 2, 'tdXzdrhrZgU0zKUa2GvFIEeXadJgtWjXXk8D81FTQkeieN7ZEDKfqEANbIgp', '2022-04-12 04:39:48', '2022-12-07 04:49:16', NULL),
(2, '961baacd-944c-40cf-b6cd-bef88ddca302', 'IDDI Rashid', 'iddi@gmail.com', '+254712676789', '131980', 'SGT', 'admin', 'iddi', NULL, NULL, NULL, '$2y$10$4lj01JSU1dFEiguIB9hT6uTcaC9PHISRm0rD5Wp3zL9Dy/BA2EFma', 1, 1, NULL, '2022-04-20 08:55:38', '2022-10-01 05:34:12', NULL),
(3, '961babac-86e7-42b7-b0f5-8b89a6ee1a41', 'Paul Ndungu', 'leviskapkory@gmail.com', '+254712676789', '121345', 'SSGT', 'store', 'Ndungu', NULL, 2, NULL, '$2y$10$BUJktBLFRKhnui/KKA5uHOQW1C14PZazylVTpCAs0v2GRyCq8u9Ly', 1, 1, NULL, '2022-04-20 08:58:04', '2022-10-01 05:34:12', 1),
(4, '96899d83-b0b2-40e0-b4d8-fa9cad4332b5', 'technician', 'technician@yahoo.com', '0745678980', '123000', 'CPL', 'technician', 'ORUTA', NULL, NULL, NULL, '$2y$10$GA.Ag94bHonPoeQPAOi.g.NygvXWa22PMIIpb1SlX.C7nOxQhWGxi', 1, 2, NULL, '2022-06-14 00:39:33', '2022-10-01 05:34:12', NULL),
(5, '973339e0-be2c-4aa2-bc83-dbf69443ad40', 'officer commanding', 'oc@test.com', '0745678980', '234590', 'MAJ', 'store', 'Ajuoga', NULL, 3, NULL, '$2y$10$knBITK7T3PPdRMrVBZYwPux65MiYVUPE8UYsBm5NeGiuPu8e.tuQS', 1, 1, NULL, '2022-06-14 00:40:26', '2022-10-01 05:34:13', 1),
(6, '96899e19-5c2b-4b1c-8e63-f265c7748005', 'kemboi', 'kemboi@test.com', '0745678989', '340000', 'LT', 'mo', 'kemboi', NULL, NULL, NULL, '$2y$10$kkvdEfpQrQZvhyG9n3.ESOao.KUbfw8MMxX8EywGHxUXXl/gk9zsu', 1, 2, NULL, '2022-06-14 00:41:11', '2022-10-01 05:34:13', NULL),
(7, '973323b2-70f9-4423-a84b-2d68887ae436', 'ollela brian', 'info@cassavahub.com', '0745678980', '131989', 'SGT', 'store', 'ollela', NULL, 2, NULL, '$2y$10$RHrS7jpDrsg1SDl8ZCIa1.BpJHwMxR9ANDYkjWVz8JZ/oKt7yzKge', 1, 1, NULL, '2022-09-06 07:09:40', '2022-10-01 05:34:13', 2),
(8, '97f02506-8018-4bb5-9960-8c07fe244904', 'AK Kwemoi', NULL, '0767567844', '131988', 'LT', 'technician', 'kwemoi', NULL, NULL, 1, '$2y$10$aWFR7jl5XoATADhQTK192OODqGRpMBqxTEir8GMwz0vhqPJtP0XXO', 1, 2, NULL, '2022-12-09 06:04:51', '2022-12-09 06:04:51', NULL),
(9, '97f0256f-d2ee-470a-8c30-bd226d92e448', 'BL Test', 'bl@test.com', '0786789098', '23453', 'SGT', 'technician', 'testtech', NULL, NULL, 1, '$2y$10$4rk5TibcXNRoV5oIx.NZpuRVaFHIW9XaUlMtbUb8NVpeA.fOH0/8m', 1, 2, NULL, '2022-12-09 06:06:00', '2022-12-09 06:06:00', NULL),
(12, '97f02635-fbba-495a-ba21-0098dc85447c', 'F P Ogolla', 'ogolla@check.com', '0756789098', '131982', 'LT', 'admin', 'ogolla', NULL, NULL, NULL, '$2y$10$I0YcB68OPhgWq0HK/UGBqe5cNQqzSPzOxyxrEEOhfFwS929CGTGyq', 1, 2, NULL, '2022-12-09 06:08:10', '2022-12-09 06:08:10', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aircraft`
--
ALTER TABLE `aircraft`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_types`
--
ALTER TABLE `log_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lpos`
--
ALTER TABLE `lpos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permission_groups`
--
ALTER TABLE `permission_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_models`
--
ALTER TABLE `property_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `record_of_vouchers`
--
ALTER TABLE `record_of_vouchers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spare_parts`
--
ALTER TABLE `spare_parts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_record_sheets`
--
ALTER TABLE `stock_record_sheets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_parts`
--
ALTER TABLE `store_parts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_service_number_unique` (`service_number`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users__id_index` (`_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aircraft`
--
ALTER TABLE `aircraft`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=392;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log_types`
--
ALTER TABLE `log_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lpos`
--
ALTER TABLE `lpos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `permission_groups`
--
ALTER TABLE `permission_groups`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `property_models`
--
ALTER TABLE `property_models`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `record_of_vouchers`
--
ALTER TABLE `record_of_vouchers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `spare_parts`
--
ALTER TABLE `spare_parts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `stock_record_sheets`
--
ALTER TABLE `stock_record_sheets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `store_parts`
--
ALTER TABLE `store_parts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
