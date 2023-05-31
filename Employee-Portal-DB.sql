-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2022 at 05:41 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `employeeportaldb`
--
CREATE DATABASE IF NOT EXISTS `employeeportaldb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `employeeportaldb`;

-- --------------------------------------------------------

--
-- Table structure for table `audit_logs`
--

DROP TABLE IF EXISTS `audit_logs`;
CREATE TABLE `audit_logs` (
  `id` int(11) NOT NULL,
  `dtime` varchar(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `form` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `audit_logs`
--

INSERT INTO `audit_logs` (`id`, `dtime`, `uname`, `form`) VALUES
(31, '08/16/2022 13:52:03', 'JDelaCruz', 'Edited Foodpanda Account'),
(32, '08/16/2022 13:52:35', 'JDelaCruz', 'Edited Foodpanda Account'),
(33, '08/16/2022 13:59:32', 'JDelaCruz', 'Edited Employee Retirement Program'),
(34, '08/22/2022 10:53:44', 'JDelaCruz', 'List of Activities and Events'),
(35, '08/22/2022 11:15:57', 'JDelaCruz', 'List of Activities and Events'),
(36, '08/22/2022 11:26:38', 'JDelaCruz', 'List of Activities and Events'),
(37, '08/22/2022 11:27:28', 'JDelaCruz', 'List of Activities and Events'),
(38, '08/22/2022 11:36:02', 'JDelaCruz', 'List of Activities and Events'),
(39, '08/22/2022 11:36:39', 'JDelaCruz', 'List of Activities and Events'),
(40, '08/22/2022 11:38:58', 'JDelaCruz', 'List of Activities and Events'),
(41, '08/22/2022 11:41:46', 'JDelaCruz', 'List of Activities and Events'),
(42, '08/22/2022 11:42:12', 'JDelaCruz', 'List of Activities and Events'),
(43, '08/22/2022 12:05:50', 'JDelaCruz', 'Edited Post-Event Surveys'),
(44, '08/22/2022 12:08:01', 'JDelaCruz', 'Edited Post-Event Surveys'),
(45, '08/22/2022 12:08:01', 'JDelaCruz', 'Edited Post-Event Surveys'),
(46, '08/22/2022 13:11:30', 'JDelaCruz', 'List of Activities and Events'),
(47, '08/22/2022 13:11:57', 'JDelaCruz', 'List of Activities and Events'),
(48, '08/22/2022 14:32:25', 'JDelaCruz', 'Edited Activities and Events'),
(49, '08/22/2022 15:35:06', 'JDelaCruz', 'Edited Post-Event Surveys'),
(50, '08/22/2022 15:35:37', 'JDelaCruz', 'Edited Post-Event Surveys'),
(51, '08/22/2022 15:37:00', 'JDelaCruz', 'Edited Post-Event Surveys'),
(52, '08/22/2022 15:37:31', 'JDelaCruz', 'Edited Post-Event Surveys'),
(53, '08/22/2022 15:37:50', 'JDelaCruz', 'Edited Post-Event Surveys'),
(54, '08/22/2022 15:39:04', 'JDelaCruz', 'Edited Post-Event Surveys'),
(55, '08/22/2022 15:40:00', 'JDelaCruz', 'Edited Post-Event Surveys'),
(56, '08/22/2022 15:40:51', 'JDelaCruz', 'Edited Post-Event Surveys'),
(57, '08/22/2022 15:41:03', 'JDelaCruz', 'Edited Post-Event Surveys'),
(58, '08/22/2022 15:43:03', 'JDelaCruz', 'Edited Post-Event Surveys'),
(59, '08/22/2022 15:43:11', 'JDelaCruz', 'Edited Post-Event Surveys'),
(60, '08/22/2022 15:43:14', 'JDelaCruz', 'Edited Post-Event Surveys'),
(61, '08/22/2022 15:43:29', 'JDelaCruz', 'Edited Post-Event Surveys'),
(62, '08/22/2022 15:43:41', 'JDelaCruz', 'Edited Post-Event Surveys'),
(63, '08/22/2022 15:45:47', 'JDelaCruz', 'Edited Post-Event Surveys'),
(64, '08/22/2022 15:47:47', 'JDelaCruz', 'Edited Post-Event Surveys'),
(65, '08/22/2022 15:49:28', 'JDelaCruz', 'Edited Post-Event Surveys'),
(66, '08/22/2022 15:49:44', 'JDelaCruz', 'Edited Post-Event Surveys'),
(67, '08/22/2022 15:50:30', 'JDelaCruz', 'Edited Post-Event Surveys'),
(68, '08/22/2022 15:50:52', 'JDelaCruz', 'Edited Post-Event Surveys'),
(69, '08/22/2022 15:55:53', 'JDelaCruz', 'Edited Post-Event Surveys'),
(70, '08/23/2022 14:36:26', 'JDelaCruz', 'Edited Post-Event Surveys'),
(71, '08/23/2022 14:39:04', 'JDelaCruz', 'Edited Post-Event Surveys'),
(72, '08/23/2022 14:41:04', 'JDelaCruz', 'Edited Post-Event Surveys'),
(73, '08/23/2022 14:42:29', 'JDelaCruz', 'Edited Post-Event Surveys'),
(74, '08/23/2022 14:42:46', 'JDelaCruz', 'Edited Post-Event Surveys'),
(75, '08/23/2022 14:43:09', 'JDelaCruz', 'Edited Post-Event Surveys'),
(76, '08/23/2022 14:43:16', 'JDelaCruz', 'Edited Post-Event Surveys'),
(77, '08/23/2022 14:43:33', 'JDelaCruz', 'Edited Post-Event Surveys'),
(78, '08/23/2022 14:45:18', 'JDelaCruz', 'Edited Post-Event Surveys'),
(79, '08/23/2022 14:45:28', 'JDelaCruz', 'Edited Post-Event Surveys'),
(80, '08/23/2022 14:46:05', 'JDelaCruz', 'Edited Post-Event Surveys'),
(81, '08/23/2022 14:46:46', 'JDelaCruz', 'Edited Post-Event Surveys'),
(82, '08/23/2022 14:46:58', 'JDelaCruz', 'Edited Post-Event Surveys'),
(83, '08/23/2022 14:47:37', 'JDelaCruz', 'Edited Post-Event Surveys'),
(84, '08/23/2022 14:47:58', 'JDelaCruz', 'Edited Post-Event Surveys'),
(85, '08/23/2022 14:48:14', 'JDelaCruz', 'Edited Post-Event Surveys'),
(86, '08/23/2022 14:48:37', 'JDelaCruz', 'Edited Post-Event Surveys'),
(87, '08/23/2022 14:48:57', 'JDelaCruz', 'Edited Post-Event Surveys'),
(88, '08/23/2022 14:49:17', 'JDelaCruz', 'Edited Post-Event Surveys'),
(89, '08/23/2022 14:51:12', 'JDelaCruz', 'Edited Post-Event Surveys'),
(90, '08/23/2022 14:51:14', 'JDelaCruz', 'Edited Post-Event Surveys'),
(91, '08/23/2022 14:51:17', 'JDelaCruz', 'Edited Post-Event Surveys'),
(92, '08/23/2022 14:51:59', 'JDelaCruz', 'Edited Post-Event Surveys'),
(93, '08/23/2022 14:52:06', 'JDelaCruz', 'Edited Post-Event Surveys'),
(94, '08/23/2022 14:52:08', 'JDelaCruz', 'Edited Post-Event Surveys'),
(95, '08/23/2022 14:52:19', 'JDelaCruz', 'Edited Post-Event Surveys'),
(96, '08/23/2022 14:52:22', 'JDelaCruz', 'Edited Post-Event Surveys'),
(97, '08/23/2022 14:52:26', 'JDelaCruz', 'Edited Post-Event Surveys'),
(98, '08/23/2022 14:53:16', 'JDelaCruz', 'Edited Post-Event Surveys'),
(99, '08/23/2022 14:53:43', 'JDelaCruz', 'Edited Post-Event Surveys'),
(100, '08/23/2022 14:56:28', 'JDelaCruz', 'Edited Post-Event Surveys'),
(101, '08/23/2022 14:56:59', 'JDelaCruz', 'Edited Post-Event Surveys'),
(102, '08/23/2022 15:25:23', 'JDelaCruz', ''),
(103, '08/23/2022 15:26:01', 'JDelaCruz', ''),
(104, '08/23/2022 15:26:04', 'JDelaCruz', ''),
(105, '08/23/2022 15:30:31', 'JDelaCruz', ''),
(106, '08/23/2022 15:30:35', 'JDelaCruz', ''),
(107, '08/23/2022 15:30:48', 'JDelaCruz', ''),
(108, '08/23/2022 15:30:59', 'JDelaCruz', ''),
(109, '08/23/2022 15:31:07', 'JDelaCruz', ''),
(110, '08/23/2022 15:35:29', 'JDelaCruz', ''),
(111, '08/23/2022 15:35:31', 'JDelaCruz', ''),
(112, '08/23/2022 15:40:06', 'JDelaCruz', ''),
(113, '08/23/2022 15:42:33', 'JDelaCruz', ''),
(114, '08/23/2022 15:42:59', 'JDelaCruz', ''),
(115, '08/23/2022 15:43:04', 'JDelaCruz', 'Edited Post-Event Surveys'),
(116, '08/23/2022 15:43:11', 'JDelaCruz', 'Edited Post-Event Surveys'),
(117, '08/23/2022 15:43:24', 'JDelaCruz', 'Edited Post-Event Surveys'),
(118, '08/23/2022 15:43:37', 'JDelaCruz', ''),
(119, '08/23/2022 15:47:18', 'JDelaCruz', 'Deleted EventEvent 4'),
(120, '08/23/2022 15:47:49', 'JDelaCruz', 'Deleted Event Event 3'),
(121, '08/23/2022 15:53:18', 'JDelaCruz', 'Edited Activities and Events'),
(122, '08/23/2022 15:53:52', 'JDelaCruz', 'Edited Activities and Events'),
(123, '08/23/2022 15:54:17', 'JDelaCruz', 'Edited Activities and Events'),
(124, '08/23/2022 15:57:36', 'JDelaCruz', 'Edited Activities and Events'),
(125, '08/23/2022 15:58:33', 'JDelaCruz', 'Edited Activities and Events'),
(126, '08/23/2022 16:01:16', 'JDelaCruz', 'Edited Activities and Events'),
(127, '08/23/2022 16:01:32', 'JDelaCruz', 'Edited Activities and Events'),
(128, '08/23/2022 16:02:59', 'JDelaCruz', 'Edited Activities and Events'),
(129, '08/23/2022 16:03:24', 'JDelaCruz', 'Edited Activities and Events'),
(130, '08/23/2022 16:03:40', 'JDelaCruz', 'Edited Activities and Events'),
(131, '08/23/2022 16:03:43', 'JDelaCruz', 'Edited Activities and Events'),
(132, '08/23/2022 16:04:00', 'JDelaCruz', 'Edited Activities and Events'),
(133, '08/23/2022 16:42:13', 'JDelaCruz', 'Edited Activities and Events'),
(134, '08/23/2022 16:42:24', 'JDelaCruz', 'Edited Activities and Events'),
(135, '08/23/2022 16:43:07', 'JDelaCruz', 'Edited Activities and Events'),
(136, '08/23/2022 16:45:58', 'JDelaCruz', 'Edited Activities and Events'),
(137, '08/23/2022 16:46:01', 'JDelaCruz', 'Edited Activities and Events'),
(138, '08/23/2022 16:46:32', 'JDelaCruz', 'Edited Activities and Events'),
(139, '08/23/2022 16:54:42', 'JDelaCruz', 'Edited Activities and Events'),
(140, '08/23/2022 17:03:58', 'JDelaCruz', 'Edited Activities and Events'),
(141, '08/23/2022 17:04:46', 'JDelaCruz', 'Edited Activities and Events'),
(142, '08/23/2022 17:06:25', 'JDelaCruz', 'Edited Activities and Events'),
(143, '08/23/2022 17:08:30', 'JDelaCruz', 'Edited Activities and Events'),
(144, '08/23/2022 17:13:55', 'JDelaCruz', 'Edited Activities and Events'),
(145, '08/23/2022 17:19:20', 'JDelaCruz', 'Edited Activities and Events'),
(146, '08/23/2022 17:21:19', 'JDelaCruz', 'Edited Activities and Events'),
(147, '08/23/2022 17:21:29', 'JDelaCruz', 'Edited Activities and Events'),
(148, '08/23/2022 17:22:15', 'JDelaCruz', 'Edited Activities and Events'),
(149, '08/23/2022 17:24:07', 'JDelaCruz', 'Edited Activities and Events'),
(150, '08/23/2022 17:24:23', 'JDelaCruz', 'Edited Activities and Events'),
(151, '08/23/2022 17:26:57', 'JDelaCruz', 'Edited Activities and Events'),
(152, '08/23/2022 17:28:39', 'JDelaCruz', 'Edited Activities and Events'),
(153, '08/23/2022 17:28:56', 'JDelaCruz', 'Edited Activities and Events'),
(154, '08/23/2022 17:29:18', 'JDelaCruz', 'Edited Activities and Events'),
(155, '08/23/2022 17:29:53', 'JDelaCruz', 'Edited Activities and Events'),
(156, '08/23/2022 17:29:55', 'JDelaCruz', 'Edited Activities and Events'),
(157, '08/23/2022 17:30:44', 'JDelaCruz', 'Edited Activities and Events'),
(158, '08/23/2022 17:30:56', 'JDelaCruz', 'Edited Activities and Events'),
(159, '08/23/2022 17:31:06', 'JDelaCruz', 'Edited Activities and Events'),
(160, '08/23/2022 17:31:08', 'JDelaCruz', 'Edited Activities and Events'),
(161, '08/23/2022 17:31:18', 'JDelaCruz', 'Edited Activities and Events'),
(162, '08/24/2022 08:18:51', 'JDelaCruz', 'Edited Activities and Events'),
(163, '08/24/2022 08:19:39', 'JDelaCruz', 'Edited Activities and Events'),
(164, '08/24/2022 08:19:45', 'JDelaCruz', 'Edited Activities and Events'),
(165, '08/24/2022 08:20:14', 'JDelaCruz', 'Edited Activities and Events'),
(166, '08/24/2022 08:21:00', 'JDelaCruz', 'Edited Activities and Events'),
(167, '08/24/2022 08:22:57', 'JDelaCruz', 'Edited Activities and Events'),
(168, '08/24/2022 08:23:35', 'JDelaCruz', 'Edited Activities and Events'),
(169, '08/24/2022 08:24:14', 'JDelaCruz', 'Edited Activities and Events'),
(170, '08/24/2022 08:24:59', 'JDelaCruz', 'Deleted Event: How not to be a horndog'),
(171, '08/24/2022 08:25:04', 'JDelaCruz', 'Deleted Event: How not to be a horndog'),
(172, '08/24/2022 08:25:08', 'JDelaCruz', 'Deleted Event: How not to be a horndog'),
(173, '08/24/2022 08:25:21', 'JDelaCruz', 'Deleted Event: How not to be a horndog'),
(174, '08/24/2022 08:25:22', 'JDelaCruz', 'Deleted Event: How not to be a horndog'),
(175, '08/24/2022 08:25:22', 'JDelaCruz', 'Deleted Event: How not to be a horndog'),
(176, '08/24/2022 08:25:22', 'JDelaCruz', 'Deleted Event: How not to be a horndog'),
(177, '08/24/2022 08:25:26', 'JDelaCruz', 'Deleted Event: How not to be a horndog'),
(178, '08/24/2022 08:26:01', 'JDelaCruz', 'Deleted Event: How not to be a horndog'),
(179, '08/24/2022 08:26:15', 'JDelaCruz', 'Deleted Event: Event 1'),
(180, '08/24/2022 08:27:14', 'JDelaCruz', 'Deleted Event: How not to be a horndog'),
(181, '08/24/2022 08:27:28', 'JDelaCruz', 'Deleted Event: How not to be a horndog'),
(182, '08/24/2022 08:27:31', 'JDelaCruz', 'Deleted Event: How not to be a horndog'),
(183, '08/24/2022 08:27:34', 'JDelaCruz', 'Deleted Event: How not to be a horndog'),
(184, '08/24/2022 08:27:37', 'JDelaCruz', 'Deleted Event: How to be a Programmer 101'),
(185, '08/24/2022 08:30:06', 'JDelaCruz', 'Edited Activities and Events'),
(186, '08/24/2022 08:43:29', 'JDelaCruz', 'Edited Activities and Events'),
(187, '08/24/2022 08:43:36', 'JDelaCruz', 'Edited Activities and Events'),
(188, '08/24/2022 08:44:24', 'JDelaCruz', 'Edited Activities and Events'),
(189, '08/24/2022 08:44:33', 'JDelaCruz', 'Deleted Event: How to be a'),
(190, '08/24/2022 08:44:36', 'JDelaCruz', 'Deleted Event: How to be a'),
(191, '08/24/2022 08:44:39', 'JDelaCruz', 'Deleted Event: How to be a'),
(192, '08/24/2022 08:44:54', 'JDelaCruz', 'Edited Activities and Events'),
(193, '08/24/2022 08:45:00', 'JDelaCruz', 'Edited Activities and Events'),
(194, '08/24/2022 08:45:03', 'JDelaCruz', 'Edited Activities and Events'),
(195, '08/24/2022 08:46:12', 'JDelaCruz', 'Edited Activities and Events'),
(196, '08/24/2022 08:48:25', 'JDelaCruz', 'Edited Activities and Events'),
(197, '08/24/2022 09:21:07', 'JDelaCruz', 'Edited Activities and Events'),
(198, '08/24/2022 09:26:29', 'JDelaCruz', 'Edited Activities and Events'),
(199, '08/24/2022 09:33:23', 'JDelaCruz', 'Edited Activities and Events'),
(200, '08/24/2022 09:33:58', 'JDelaCruz', 'Edited Activities and Events'),
(201, '08/24/2022 09:34:26', 'JDelaCruz', 'Edited Activities and Events'),
(202, '08/24/2022 09:34:27', 'JDelaCruz', 'Edited Activities and Events'),
(203, '08/24/2022 09:34:28', 'JDelaCruz', 'Edited Activities and Events'),
(204, '08/24/2022 09:34:28', 'JDelaCruz', 'Edited Activities and Events'),
(205, '08/24/2022 09:34:28', 'JDelaCruz', 'Edited Activities and Events'),
(206, '08/24/2022 09:34:29', 'JDelaCruz', 'Edited Activities and Events'),
(207, '08/24/2022 09:34:29', 'JDelaCruz', 'Edited Activities and Events'),
(208, '08/24/2022 09:37:31', 'JDelaCruz', 'Edited Activities and Events'),
(209, '08/24/2022 09:38:27', 'JDelaCruz', 'Edited Activities and Events'),
(210, '08/24/2022 09:40:00', 'JDelaCruz', 'Edited Post-Event Surveys'),
(211, '08/24/2022 10:41:58', 'JDelaCruz', 'Edited Post-Event Surveys'),
(212, '08/24/2022 10:43:24', 'JDelaCruz', 'Edited Post-Event Surveys'),
(213, '08/24/2022 10:45:37', 'JDelaCruz', 'Deleted Event: Mid-Year Town Hall'),
(214, '08/24/2022 10:46:03', 'JDelaCruz', 'Deleted Event: Mid-Year Town Hall'),
(215, '08/24/2022 10:49:42', 'JDelaCruz', 'Edited Post-Event Surveys'),
(216, '08/24/2022 10:50:24', 'JDelaCruz', 'Edited Post-Event Surveys'),
(217, '08/24/2022 10:50:32', 'JDelaCruz', 'Edited Post-Event Surveys'),
(218, '08/24/2022 10:50:41', 'JDelaCruz', 'Edited Post-Event Surveys'),
(219, '08/24/2022 10:54:06', 'JDelaCruz', 'Deleted Event: How to be a '),
(220, '08/24/2022 10:54:13', 'JDelaCruz', 'Deleted Event: How to be a Programmer 101'),
(221, '08/24/2022 13:20:59', 'JDelaCruz', 'Edited Post-Event Surveys'),
(222, '08/24/2022 13:21:14', 'JDelaCruz', 'Edited Post-Event Surveys'),
(223, '08/24/2022 13:21:20', 'JDelaCruz', 'Edited Post-Event Surveys'),
(224, '08/24/2022 13:22:14', 'JDelaCruz', 'Deleted Event: '),
(225, '08/24/2022 13:25:29', 'JDelaCruz', 'Deleted Event: Mid-Year Town Hall'),
(226, '08/24/2022 13:26:58', 'JDelaCruz', 'Deleted Event: Mid-Year Town Hall'),
(227, '08/24/2022 13:27:19', 'JDelaCruz', 'Deleted Event: Mid-Year Town Hall'),
(228, '08/24/2022 13:35:34', 'JDelaCruz', 'Deleted Event: Mid-Year Town Hall'),
(229, '08/24/2022 13:36:58', 'JDelaCruz', 'Edited Post-Event Surveys'),
(230, '08/24/2022 13:38:05', 'JDelaCruz', 'Deleted Event: Mid-Year Town Hall'),
(231, '08/24/2022 13:43:43', '', 'Deleted Event: asdas'),
(232, '08/24/2022 13:43:52', '', 'Deleted Event: asdasd'),
(233, '08/24/2022 13:44:04', '', 'Edited Post-Event Surveys'),
(234, '08/24/2022 13:50:03', '', 'Deleted Event: 123123123'),
(235, '08/24/2022 13:50:50', '', 'Deleted Event: 12312'),
(236, '08/24/2022 15:19:05', 'JDelaCruz', 'Edited Requests'),
(237, '08/24/2022 15:43:43', 'JDelaCruz', 'Edited List of OSH Programs and Activites'),
(238, '08/24/2022 15:44:08', 'JDelaCruz', 'Edited List of OSH Programs and Activites'),
(239, '08/24/2022 15:44:23', 'JDelaCruz', 'Edited List of OSH Programs and Activites'),
(240, '08/24/2022 15:44:36', 'JDelaCruz', 'Edited List of OSH Programs and Activites'),
(241, '08/24/2022 15:44:46', 'JDelaCruz', 'Edited List of OSH Programs and Activites'),
(242, '08/24/2022 15:44:59', 'JDelaCruz', 'Edited List of OSH Programs and Activites'),
(243, '08/24/2022 15:45:05', 'JDelaCruz', 'Edited List of OSH Programs and Activites'),
(244, '08/24/2022 15:45:20', 'JDelaCruz', 'Edited List of OSH Programs and Activites'),
(245, '08/24/2022 15:45:30', 'JDelaCruz', 'Edited List of OSH Programs and Activites'),
(246, '08/24/2022 15:45:42', 'JDelaCruz', 'Edited List of OSH Programs and Activites'),
(247, '08/24/2022 15:45:49', 'JDelaCruz', 'Edited List of OSH Programs and Activites'),
(248, '08/24/2022 15:45:54', 'JDelaCruz', 'Edited List of OSH Programs and Activites'),
(249, '08/24/2022 15:46:02', 'JDelaCruz', 'Edited List of OSH Programs and Activites'),
(250, '08/24/2022 15:46:25', 'JDelaCruz', 'Edited List of OSH Programs and Activites'),
(251, '08/24/2022 15:46:39', 'JDelaCruz', 'Edited List of OSH Programs and Activites'),
(252, '08/24/2022 15:51:23', 'JDelaCruz', 'Edited List of OSH Programs and Activites'),
(253, '08/24/2022 15:51:32', 'JDelaCruz', 'Edited List of OSH Programs and Activites'),
(254, '08/24/2022 15:51:58', 'JDelaCruz', 'Edited List of OSH Programs and Activites'),
(255, '08/24/2022 15:53:10', 'JDelaCruz', 'Edited List of OSH Programs and Activites'),
(256, '08/24/2022 15:55:27', 'JDelaCruz', 'Deleted Event: Ado'),
(257, '08/24/2022 15:57:17', 'JDelaCruz', 'Deleted Event: Ado'),
(258, '08/24/2022 15:57:47', 'JDelaCruz', 'Deleted Event: Ado'),
(259, '08/24/2022 15:59:34', 'JDelaCruz', 'Deleted Event: Ado'),
(260, '08/24/2022 16:04:47', 'JDelaCruz', 'Deleted Event: Ado'),
(261, '08/24/2022 16:05:16', 'JDelaCruz', 'Edited List of OSH Programs and Activites'),
(262, '08/24/2022 17:06:37', 'JDelaCruz', 'Edited List of Open Requisitions'),
(263, '08/24/2022 17:07:09', 'JDelaCruz', 'Edited List of Open Requisitions'),
(264, '08/24/2022 17:10:00', 'JDelaCruz', 'Edited List of Open Requisitions'),
(265, '08/24/2022 17:10:39', 'JDelaCruz', 'Edited List of Open Requisitions'),
(266, '08/24/2022 17:13:48', 'JDelaCruz', 'Deleted Position: Web Developer Associate'),
(267, '08/24/2022 17:14:00', 'JDelaCruz', 'Deleted Position: Web Developer Associate'),
(268, '08/25/2022 08:57:06', 'JDelaCruz', 'Edited List of Intern Positions'),
(269, '08/25/2022 09:00:37', 'JDelaCruz', 'Edited List of Intern Positions'),
(270, '08/25/2022 09:00:47', 'JDelaCruz', 'Deleted Position: Web Developer Intern'),
(271, '08/25/2022 09:10:04', 'JDelaCruz', 'Edited Leave'),
(272, '08/25/2022 09:11:08', 'JDelaCruz', 'Edited Leave'),
(273, '08/25/2022 09:12:59', 'JDelaCruz', 'Edited HMO'),
(274, '08/25/2022 09:15:33', 'JDelaCruz', 'Edited Leave'),
(275, '08/25/2022 09:15:45', 'JDelaCruz', 'Edited Leave'),
(276, '08/25/2022 09:15:53', 'JDelaCruz', 'Edited Leave'),
(277, '08/25/2022 09:16:02', 'JDelaCruz', 'Edited Leave'),
(278, '08/25/2022 09:16:38', 'JDelaCruz', 'Edited Leave'),
(279, '08/25/2022 09:17:01', 'JDelaCruz', 'Edited Leave'),
(280, '08/25/2022 09:31:13', 'JDelaCruz', 'Edited Post-Event Surveys'),
(281, '08/25/2022 09:32:12', 'JDelaCruz', 'Edited Post-Event Surveys'),
(282, '08/25/2022 09:32:20', 'JDelaCruz', 'Edited Post-Event Surveys'),
(283, '08/25/2022 09:33:48', 'JDelaCruz', 'Edited Post-Event Surveys'),
(284, '08/25/2022 09:36:19', 'JDelaCruz', 'Edited Post-Event Surveys'),
(285, '08/25/2022 09:37:29', 'JDelaCruz', 'Deleted Event: voldemort'),
(286, '08/25/2022 09:37:50', 'JDelaCruz', 'Edited Activities and Events'),
(287, '08/25/2022 09:43:10', 'JDelaCruz', 'Edited Activities and Events'),
(288, '08/25/2022 09:43:17', 'JDelaCruz', 'Edited Post-Event Surveys'),
(289, '08/25/2022 16:54:55', 'JDelaCruz', 'Edited HMO'),
(290, '08/25/2022 16:54:58', 'JDelaCruz', 'Edited HMO'),
(291, '08/25/2022 16:55:34', 'JDelaCruz', 'Edited HMO'),
(292, '08/25/2022 20:37:32', 'JDelaCruz', 'Edited Technology Request Form'),
(293, '08/25/2022 21:14:29', 'JDelaCruz', 'Edited IT Security Awareness'),
(294, '08/25/2022 21:16:43', 'JDelaCruz', 'Edited IT Security Awareness'),
(295, '08/25/2022 21:16:56', 'JDelaCruz', 'Edited IT Security Awareness'),
(296, '08/25/2022 21:17:39', 'JDelaCruz', 'Edited IT Security Awareness'),
(297, '08/25/2022 21:17:51', 'JDelaCruz', 'Edited IT Security Awareness'),
(298, '08/25/2022 21:18:30', 'JDelaCruz', 'Edited IT Security Awareness'),
(299, '08/25/2022 21:20:51', 'JDelaCruz', 'Edited IT Security Awareness'),
(300, '08/25/2022 21:22:46', 'JDelaCruz', 'Edited IT Security Awareness'),
(301, '08/25/2022 21:29:05', 'JDelaCruz', 'Edited IT Security Awareness'),
(302, '08/25/2022 21:32:03', 'JDelaCruz', 'Edited IT Security Awareness'),
(303, '08/25/2022 21:36:18', 'JDelaCruz', 'Edited IT Security Awareness'),
(304, '08/25/2022 21:38:41', 'JDelaCruz', 'Edited IT Security Awareness'),
(305, '08/25/2022 21:39:51', 'JDelaCruz', 'Edited IT Security Awareness'),
(306, '08/25/2022 21:41:27', 'JDelaCruz', 'Edited Technology Request Form'),
(307, '08/25/2022 21:41:38', 'JDelaCruz', 'Edited BYOD Request Form'),
(308, '08/25/2022 22:10:01', 'JDelaCruz', 'Edited Foodpanda Account'),
(309, '08/25/2022 22:10:23', 'JDelaCruz', 'Edited Foodpanda Account'),
(310, '08/25/2022 22:10:40', 'JDelaCruz', 'Edited Foodpanda Account'),
(311, '08/25/2022 22:11:12', 'JDelaCruz', 'Edited Foodpanda Account'),
(312, '08/25/2022 22:12:15', 'JDelaCruz', 'Edited Foodpanda Account'),
(313, '08/25/2022 22:16:09', 'JDelaCruz', 'Edited Foodpanda Account'),
(314, '08/25/2022 22:16:21', 'JDelaCruz', 'Edited Foodpanda Account'),
(315, '08/25/2022 22:16:26', 'JDelaCruz', 'Edited Foodpanda Account'),
(316, '08/25/2022 22:17:12', 'JDelaCruz', 'Edited Foodpanda Account'),
(317, '08/25/2022 22:18:52', 'JDelaCruz', 'Edited Foodpanda Account'),
(318, '08/25/2022 22:20:12', 'JDelaCruz', 'Edited Foodpanda Account'),
(319, '08/25/2022 22:41:01', 'JDelaCruz', 'Edited Post-Event Surveys'),
(320, '08/25/2022 22:41:49', 'JDelaCruz', 'Deleted Event: Saruei Live Stream!!!!'),
(321, '08/25/2022 22:42:48', 'JDelaCruz', 'Edited Activities and Events'),
(322, '08/25/2022 22:42:57', 'JDelaCruz', 'Deleted Event: Saruei Live Stream!!!!!'),
(323, '08/25/2022 22:44:37', 'JDelaCruz', 'Edited Activities and Events'),
(324, '08/25/2022 22:46:06', 'JDelaCruz', 'Edited Activities and Events'),
(325, '08/25/2022 22:46:30', 'JDelaCruz', 'Edited Post-Event Surveys'),
(326, '08/25/2022 22:46:47', 'JDelaCruz', 'Edited Post-Event Surveys'),
(327, '08/31/2022 13:02:53', 'JDelaCruz', 'Edited Employee Retirement Program'),
(328, '08/31/2022 13:03:35', 'JDelaCruz', 'Edited Employee Retirement Program'),
(329, '08/31/2022 13:04:22', 'JDelaCruz', 'Edited Employee Retirement Program'),
(330, '08/31/2022 13:04:27', 'JDelaCruz', 'Edited Employee Retirement Program'),
(331, '08/31/2022 13:06:01', 'JDelaCruz', 'Edited Employee Retirement Program'),
(332, '08/31/2022 13:06:34', 'JDelaCruz', 'Edited Employee Retirement Program'),
(333, '08/31/2022 13:06:47', 'JDelaCruz', 'Edited Employee Retirement Program'),
(334, '08/31/2022 13:07:01', 'JDelaCruz', 'Edited Employee Retirement Program'),
(335, '08/31/2022 13:07:32', 'JDelaCruz', 'Edited Employee Retirement Program'),
(336, '08/31/2022 13:08:08', 'JDelaCruz', 'Edited Employee Retirement Program'),
(337, '08/31/2022 13:08:20', 'JDelaCruz', 'Edited Employee Retirement Program'),
(338, '08/31/2022 13:08:56', 'JDelaCruz', 'Edited Employee Retirement Program'),
(339, '08/31/2022 13:10:52', 'JDelaCruz', 'Edited Employee Retirement Program'),
(340, '08/31/2022 13:11:25', 'JDelaCruz', 'Edited Employee Retirement Program'),
(341, '08/31/2022 13:11:33', 'JDelaCruz', 'Edited Payroll Adjustment Form'),
(342, '08/31/2022 13:11:45', 'JDelaCruz', 'Edited Payroll Adjustment Form'),
(343, '08/31/2022 13:12:01', 'JDelaCruz', 'Edited Payroll Adjustment Form'),
(344, '08/31/2022 13:12:08', 'JDelaCruz', 'Edited Payroll Adjustment Form'),
(345, '08/31/2022 13:12:12', 'JDelaCruz', 'Edited Payroll Adjustment Form'),
(346, '08/31/2022 13:12:17', 'JDelaCruz', 'Edited Payroll Adjustment Form'),
(347, '08/31/2022 13:12:36', 'JDelaCruz', 'Edited Payroll Adjustment Form'),
(348, '08/31/2022 13:12:49', 'JDelaCruz', 'Edited Payroll Adjustment Form'),
(349, '08/31/2022 13:13:15', 'JDelaCruz', 'Edited Payroll Adjustment Form'),
(350, '08/31/2022 13:13:18', 'JDelaCruz', 'Edited Payroll Adjustment Form'),
(351, '08/31/2022 13:13:45', 'JDelaCruz', 'Edited Employee Retirement Program'),
(352, '08/31/2022 13:13:55', 'JDelaCruz', 'Edited Employee Retirement Program'),
(353, '08/31/2022 13:14:05', 'JDelaCruz', 'Edited Employee Retirement Program'),
(354, '08/31/2022 13:15:33', 'JDelaCruz', 'Edited Employee Retirement Program'),
(355, '08/31/2022 13:17:15', 'JDelaCruz', 'Edited Employee Retirement Program'),
(356, '08/31/2022 13:18:59', 'JDelaCruz', 'Edited Employee Retirement Program'),
(357, '08/31/2022 13:20:19', 'JDelaCruz', 'Edited Employee Retirement Program'),
(358, '08/31/2022 13:20:25', 'JDelaCruz', 'Edited Employee Retirement Program'),
(359, '08/31/2022 13:21:10', 'JDelaCruz', 'Edited Employee Retirement Program'),
(360, '08/31/2022 13:29:05', 'JDelaCruz', 'Edited Employee Retirement Program'),
(361, '08/31/2022 13:29:09', 'JDelaCruz', 'Edited Employee Retirement Program'),
(362, '08/31/2022 13:30:00', 'JDelaCruz', 'Edited Employee Retirement Program'),
(363, '08/31/2022 13:30:32', 'JDelaCruz', 'Edited Employee Retirement Program'),
(364, '08/31/2022 13:30:38', 'JDelaCruz', 'Edited Employee Retirement Program'),
(365, '08/31/2022 13:30:54', 'JDelaCruz', 'Edited Employee Retirement Program'),
(366, '08/31/2022 13:32:21', 'JDelaCruz', 'Edited Employee Retirement Program'),
(367, '08/31/2022 13:35:33', 'JDelaCruz', 'Edited Payroll Adjustment Form'),
(368, '08/31/2022 13:36:36', 'JDelaCruz', 'Edited Payroll Adjustment Form'),
(369, '08/31/2022 13:38:12', 'JDelaCruz', 'Edited Payroll Adjustment Form'),
(370, '08/31/2022 13:38:28', 'JDelaCruz', 'Edited Employee Retirement Program'),
(371, '08/31/2022 13:38:56', 'JDelaCruz', 'Edited Payroll Adjustment Form'),
(372, '08/31/2022 13:39:06', 'JDelaCruz', 'Edited Payroll Adjustment Form'),
(373, '08/31/2022 13:39:18', 'JDelaCruz', 'Edited Payroll Adjustment Form'),
(374, '08/31/2022 13:44:02', 'JDelaCruz', 'Edited Request for Office Equipment Purchase'),
(375, '08/31/2022 13:44:37', 'JDelaCruz', 'Edited Request for Office Equipment Purchase'),
(376, '08/31/2022 13:45:01', 'JDelaCruz', 'Edited Request for Office Equipment Purchase'),
(377, '08/31/2022 13:45:25', 'JDelaCruz', 'Edited Request for Office Equipment Purchase'),
(378, '08/31/2022 13:45:36', 'JDelaCruz', 'Edited Request for Office Equipment Purchase'),
(379, '08/31/2022 13:45:58', 'JDelaCruz', 'Edited Request for Office Equipment Purchase'),
(380, '08/31/2022 13:46:12', 'JDelaCruz', 'Edited Request for Office Equipment Purchase'),
(381, '08/31/2022 13:46:51', 'JDelaCruz', 'Edited Request for Supply Purchase'),
(382, '08/31/2022 13:48:57', 'JDelaCruz', 'Edited Request for Office Equipment Purchase'),
(383, '08/31/2022 13:50:10', 'JDelaCruz', 'Edited Request of Employee Records'),
(384, '08/31/2022 14:35:49', 'JDelaCruz', 'Edited List of OSH Programs and Activites'),
(385, '08/31/2022 14:37:34', 'JDelaCruz', 'Edited List of OSH Programs and Activites'),
(386, '08/31/2022 14:39:55', 'JDelaCruz', 'Deleted Event: How to be a first-aider'),
(387, '08/31/2022 14:40:07', 'JDelaCruz', 'Edited List of OSH Programs and Activites'),
(388, '08/31/2022 14:41:51', 'JDelaCruz', 'Edited List of OSH Programs and Activites'),
(389, '08/31/2022 14:42:23', 'JDelaCruz', 'Deleted Event: How to be a first-aider'),
(390, '08/31/2022 14:42:33', 'JDelaCruz', 'Edited List of OSH Programs and Activites'),
(391, '08/31/2022 14:42:50', 'JDelaCruz', 'Deleted Event: How to be a first-aider'),
(392, '08/31/2022 14:43:00', 'JDelaCruz', 'Edited List of OSH Programs and Activites'),
(393, '08/31/2022 14:44:24', 'JDelaCruz', 'Edited List of OSH Programs and Activites'),
(394, '08/31/2022 14:44:55', 'JDelaCruz', 'Edited List of OSH Programs and Activites'),
(395, '08/31/2022 15:03:26', 'JDelaCruz', 'Edited List of Open Requisitions'),
(396, '08/31/2022 15:03:32', 'JDelaCruz', 'Deleted Position: Position New'),
(397, '08/31/2022 15:05:07', 'JDelaCruz', 'Edited List of Open Requisitions'),
(398, '08/31/2022 15:05:16', 'JDelaCruz', 'Edited List of Open Requisitions'),
(399, '08/31/2022 15:05:21', 'JDelaCruz', 'Deleted Position: Position New'),
(400, '08/31/2022 15:58:55', 'JDelaCruz', 'Edited List of Open Requisitions'),
(401, '08/31/2022 15:59:04', 'JDelaCruz', 'Deleted Position: aaaa'),
(402, '08/31/2022 15:59:24', 'JDelaCruz', 'Edited List of Open Requisitions'),
(403, '08/31/2022 16:01:31', 'JDelaCruz', 'Deleted Position: aaaa'),
(404, '08/31/2022 16:01:40', 'JDelaCruz', 'Edited List of Open Requisitions'),
(405, '08/31/2022 23:57:24', 'JDelaCruz', 'Edited Payreto Store'),
(406, '08/31/2022 23:57:25', 'JDelaCruz', 'Edited Payreto Store'),
(407, '08/31/2022 23:57:25', 'JDelaCruz', 'Edited Payreto Store'),
(408, '09/01/2022 00:04:35', 'JDelaCruz', 'Edited Payreto Store'),
(409, '09/01/2022 00:04:58', 'JDelaCruz', 'Edited Payreto Store'),
(410, '09/01/2022 00:05:00', 'JDelaCruz', 'Edited Payreto Store'),
(411, '09/01/2022 00:13:19', 'JDelaCruz', 'Edited Activities and Events'),
(412, '09/01/2022 00:13:25', 'JDelaCruz', 'Deleted Event: aaa'),
(413, '09/01/2022 00:14:23', 'JDelaCruz', 'Edited Activities and Events'),
(414, '09/01/2022 00:18:49', 'JDelaCruz', 'Edited Activities and Events'),
(415, '09/01/2022 00:22:13', 'JDelaCruz', 'Edited Activities and Events'),
(416, '09/01/2022 00:22:19', 'JDelaCruz', 'Edited Activities and Events'),
(417, '09/01/2022 00:22:56', 'JDelaCruz', 'Deleted Event: aaa'),
(418, '09/01/2022 00:23:11', 'JDelaCruz', 'Edited Post-Event Surveys'),
(419, '09/01/2022 00:24:30', 'JDelaCruz', 'Deleted Event: How to train your cat to play Jazzsds'),
(420, '09/01/2022 00:25:09', 'JDelaCruz', 'Edited Company Policies and Procedures'),
(421, '09/01/2022 00:32:08', 'JDelaCruz', 'Edited instructional Design'),
(422, '09/01/2022 00:35:38', 'JDelaCruz', 'Deleted Position: aaaa'),
(423, '09/01/2022 00:35:40', 'JDelaCruz', 'e_referral'),
(424, '09/01/2022 00:35:47', 'JDelaCruz', 'e_referral'),
(425, '09/01/2022 00:36:08', 'JDelaCruz', 'e_referral'),
(426, '09/01/2022 00:36:15', 'JDelaCruz', 'e_referral'),
(427, '09/01/2022 00:36:24', 'JDelaCruz', 'Edited List of Open Requisitions'),
(428, '09/01/2022 00:38:03', 'JDelaCruz', 'Deleted Position: aaa'),
(429, '09/01/2022 00:38:11', 'JDelaCruz', 'Edited List of Open Requisitions'),
(430, '09/01/2022 00:38:21', 'JDelaCruz', 'Deleted Position: sadd'),
(431, '09/01/2022 00:40:38', 'JDelaCruz', 'Edited List of Open Requisitions'),
(432, '09/01/2022 00:40:41', 'JDelaCruz', 'Deleted Position: aaa'),
(433, '09/01/2022 01:11:28', 'JDelaCruz', 'Edited List of Intern Positions'),
(434, '09/01/2022 01:11:32', 'JDelaCruz', 'Deleted Position: asd'),
(435, '09/01/2022 01:11:53', 'JDelaCruz', 'Edited List of Intern Positions'),
(436, '09/01/2022 01:11:58', 'JDelaCruz', 'Deleted Position: ss'),
(437, '09/01/2022 01:24:24', 'JDelaCruz', 'Edited Requests'),
(438, '09/01/2022 01:24:27', 'JDelaCruz', 'Edited Expense Reimbursement Form'),
(439, '09/01/2022 01:27:27', 'JDelaCruz', 'Edited Business Continuity Plan'),
(440, '09/01/2022 01:27:31', 'JDelaCruz', 'Edited Business Continuity Plan'),
(441, '09/01/2022 01:45:24', 'JDelaCruz', 'Edited Payroll Adjustment Form'),
(442, '09/01/2022 01:45:27', 'JDelaCruz', 'Editted Schedule Concerns'),
(443, '09/01/2022 01:48:19', 'JDelaCruz', 'Edited Technology Request Form'),
(444, '09/01/2022 01:48:21', 'JDelaCruz', 'Edited Technology Request Form'),
(445, '09/01/2022 01:48:26', 'JDelaCruz', 'Edited Technology Request Form'),
(446, '09/01/2022 01:48:30', 'JDelaCruz', 'Edited Technology Request Form'),
(447, '09/01/2022 01:48:37', 'JDelaCruz', 'Editted Schedule Concerns'),
(448, '09/01/2022 01:48:41', 'JDelaCruz', 'Edited IT Security Awareness'),
(449, '09/01/2022 14:21:35', 'JDelaCruz', 'Edited Activities and Events'),
(450, '09/02/2022 11:07:24', 'JDelaCruz', 'Edited Expense Reimbursement Form'),
(451, '09/02/2022 11:07:50', 'JDelaCruz', 'Edited Expense Reimbursement Form'),
(452, '09/02/2022 11:08:17', 'JDelaCruz', 'Edited Expense Reimbursement Form'),
(453, '09/02/2022 11:08:24', 'JDelaCruz', 'Edited Expense Reimbursement Form'),
(454, '09/02/2022 11:09:02', 'JDelaCruz', 'Edited Expense Reimbursement Form'),
(455, '09/02/2022 11:09:21', 'JDelaCruz', 'Edited Expense Reimbursement Form'),
(456, '09/02/2022 11:10:36', 'JDelaCruz', 'Edited Expense Reimbursement Form'),
(457, '09/02/2022 11:10:42', 'JDelaCruz', 'Edited Expense Reimbursement Form'),
(458, '09/02/2022 11:10:49', 'JDelaCruz', 'Edited Expense Reimbursement Form'),
(459, '09/02/2022 11:10:56', 'JDelaCruz', 'Edited Expense Reimbursement Form'),
(460, '09/02/2022 11:11:43', 'JDelaCruz', 'Edited Expense Reimbursement Form'),
(461, '09/02/2022 11:33:53', 'JDelaCruz', 'Edited BYOD Request Form'),
(462, '09/02/2022 11:34:39', 'JDelaCruz', 'Edited BYOD Request Form'),
(463, '09/02/2022 13:02:57', 'JDelaCruz', 'Edited Requests'),
(464, '09/02/2022 13:03:35', 'JDelaCruz', 'Edited Requests'),
(465, '09/02/2022 13:04:00', 'JDelaCruz', 'Edited Requests'),
(466, '09/02/2022 13:04:13', 'JDelaCruz', 'Edited Requests'),
(467, '09/02/2022 13:41:14', 'JDelaCruz', 'Edited Leave'),
(468, '09/02/2022 13:44:23', 'JDelaCruz', 'Edited Leave'),
(469, '09/02/2022 13:45:23', 'JDelaCruz', 'Edited Leave'),
(470, '09/02/2022 13:45:56', 'JDelaCruz', 'Edited Leave'),
(471, '09/02/2022 13:48:26', 'JDelaCruz', 'Edited Leave'),
(472, '09/02/2022 15:24:12', 'JDelaCruz', 'Edited Activities and Events'),
(473, '09/02/2022 15:26:11', 'JDelaCruz', 'Edited List of OSH Programs and Activites'),
(474, '09/02/2022 15:26:32', 'JDelaCruz', 'Edited List of OSH Programs and Activites'),
(475, '09/05/2022 09:50:59', 'JDelaCruz', 'Edited List of Open Requisitions'),
(476, '09/05/2022 09:51:23', 'JDelaCruz', 'Deleted Position: Web Developer Associate2'),
(477, '09/05/2022 10:05:15', 'JDelaCruz', 'Edited HMO'),
(478, '09/05/2022 10:32:39', 'JDelaCruz', 'Edited HMO'),
(479, '09/05/2022 10:35:53', 'JDelaCruz', 'Edited HMO'),
(480, '09/05/2022 11:00:48', 'JDelaCruz', 'Edited Activities and Events'),
(481, '09/05/2022 11:01:13', 'JDelaCruz', 'Deleted Event: sdsd'),
(482, '09/05/2022 11:03:05', 'JDelaCruz', 'Edited Activities and Events'),
(483, '09/05/2022 11:09:41', 'JDelaCruz', 'Edited HMO'),
(484, '09/05/2022 11:19:10', 'JDelaCruz', 'Edited Activities and Events'),
(485, '09/05/2022 11:19:53', 'JDelaCruz', 'Edited Post-Event Surveys'),
(486, '09/05/2022 11:20:24', 'JDelaCruz', 'Deleted Event: Sample Event'),
(487, '09/05/2022 11:21:20', 'JDelaCruz', 'Edited List of Open Requisitions'),
(488, '09/06/2022 10:06:28', 'JDelaCruz', 'Edited Post-Event Surveys'),
(489, '09/06/2022 11:48:19', 'JDelaCruz', 'Deleted Position: Operations Manager'),
(490, '09/06/2022 11:48:41', 'JDelaCruz', 'Edited List of Intern Positions'),
(491, '09/06/2022 11:48:55', 'JDelaCruz', 'Edited List of Open Requisitions'),
(492, '09/06/2022 14:42:18', 'JDelaCruz', ''),
(493, '09/06/2022 14:42:35', 'JDelaCruz', 'asdfDeleted user: '),
(494, '09/06/2022 14:43:07', 'JDelaCruz', ''),
(495, '09/06/2022 14:43:32', 'JDelaCruz', 'Deleted user: 123'),
(496, '09/06/2022 14:46:08', 'JDelaCruz', ''),
(497, '09/06/2022 14:51:56', 'asdfasdf', 'Added user: asdfasdf'),
(498, '09/06/2022 14:52:09', 'fasdfasdfas', 'Added user: fasdfasdfas'),
(499, '09/06/2022 14:52:37', 'JDelaCruz', ''),
(500, '09/06/2022 14:52:55', 'JDelaCruz', ''),
(501, '09/06/2022 15:00:30', 'JDelaCruz', ''),
(502, '09/06/2022 15:02:32', 'JDelaCruz', ''),
(503, '09/06/2022 15:03:53', '', 'Edited user: '),
(504, '09/06/2022 15:05:32', 'JDelaCruz', 'Edited user: fasdfasdfasdf'),
(505, '09/06/2022 15:07:07', 'JDelaCruz', ''),
(506, '09/06/2022 15:07:45', 'JDelaCruz', ''),
(507, '09/06/2022 15:08:09', 'JDelaCruz', ''),
(508, '09/06/2022 15:09:33', 'JDelaCruz', ''),
(509, '09/06/2022 15:11:27', 'JDelaCruz', ''),
(510, '09/06/2022 15:14:17', 'JDelaCruz', ''),
(511, '09/06/2022 15:15:13', 'JDelaCruz', 'Edited List of Open Requisitions'),
(512, '09/06/2022 15:18:12', 'JDelaCruz', 'Deleted Position: Talent Acquisition Manager'),
(513, '09/06/2022 15:20:03', 'JDelaCruz', 'Added user: dddddd'),
(514, '09/06/2022 15:20:10', 'JDelaCruz', ''),
(515, '09/06/2022 15:21:27', 'JDelaCruz', ''),
(516, '09/06/2022 15:25:27', 'JDelaCruz', 'Deleted user: ddddd'),
(517, '09/06/2022 15:25:40', 'JDelaCruz', 'Edited user: fasdfasdfasdf'),
(518, '09/06/2022 15:26:38', 'JDelaCruz', ''),
(519, '09/06/2022 15:26:47', 'JDelaCruz', ''),
(520, '09/06/2022 15:27:43', 'JDelaCruz', ''),
(521, '09/06/2022 15:30:23', 'JDelaCruz', ''),
(522, '09/06/2022 15:31:10', 'JDelaCruz', 'Deleted user: fasdfasdfas'),
(523, '09/06/2022 15:31:29', 'JDelaCruz', ''),
(524, '09/06/2022 15:35:23', 'JDelaCruz', 'Reset password of user: asdfasdfasdfasdf'),
(525, '09/06/2022 15:36:23', 'JDelaCruz', 'Added user: asdfasdfa'),
(526, '09/06/2022 15:36:43', 'JDelaCruz', 'Edited user: asdfasdfa'),
(527, '09/06/2022 15:36:53', 'JDelaCruz', 'asdfsafd'),
(528, '09/06/2022 15:37:28', 'JDelaCruz', 'Reset password of user: asdfasdfasdfasdf'),
(529, '09/06/2022 15:37:40', 'JDelaCruz', 'Deleted user: asdfasdf'),
(530, '09/06/2022 15:37:47', 'JDelaCruz', 'Deleted user: aasdf'),
(531, '09/07/2022 13:19:29', 'JDelaCruz', 'Edited Activities and Events'),
(532, '09/07/2022 13:19:51', 'JDelaCruz', 'Edited Activities and Events'),
(533, '09/07/2022 13:20:01', 'JDelaCruz', 'Edited Activities and Events'),
(534, '09/07/2022 13:20:07', 'JDelaCruz', 'Edited Activities and Events'),
(535, '09/07/2022 13:20:26', 'JDelaCruz', 'Edited Activities and Events'),
(536, '09/07/2022 13:20:37', 'JDelaCruz', 'Edited Activities and Events'),
(537, '09/07/2022 13:22:35', 'JDelaCruz', 'Edited Activities and Events'),
(538, '09/07/2022 13:22:45', 'JDelaCruz', 'Edited Activities and Events'),
(539, '09/07/2022 13:23:18', 'JDelaCruz', 'Edited Activities and Events'),
(540, '09/07/2022 13:31:06', 'JDelaCruz', 'Edited Activities and Events'),
(541, '09/07/2022 13:33:25', 'JDelaCruz', 'Edited Activities and Events'),
(542, '09/07/2022 13:33:38', 'JDelaCruz', 'Edited Activities and Events'),
(543, '09/07/2022 13:53:20', 'JDelaCruz', 'Edited Activities and Events'),
(544, '09/07/2022 13:53:38', 'JDelaCruz', ''),
(545, '09/07/2022 13:54:21', 'JDelaCruz', 'Edited Activities and Events'),
(546, '09/07/2022 13:56:48', 'JDelaCruz', ''),
(547, '09/07/2022 13:57:09', 'JDelaCruz', 'Edited Activities and Events'),
(548, '09/07/2022 13:57:43', 'JDelaCruz', ''),
(549, '09/07/2022 14:00:07', 'JDelaCruz', 'Edited Activities and Events'),
(550, '09/07/2022 14:01:49', 'JDelaCruz', ''),
(551, '09/07/2022 14:02:48', 'JDelaCruz', 'Edited Activities and Events'),
(552, '09/07/2022 14:05:49', 'JDelaCruz', ''),
(553, '09/07/2022 14:06:04', 'JDelaCruz', ''),
(554, '09/07/2022 14:06:27', 'JDelaCruz', ''),
(555, '09/07/2022 14:06:40', 'JDelaCruz', ''),
(556, '09/07/2022 14:09:52', 'JDelaCruz', 'Deleted Event: TestImg'),
(557, '09/07/2022 14:10:12', 'JDelaCruz', 'Edited Activities and Events'),
(558, '09/07/2022 14:10:29', 'JDelaCruz', 'Edited Activities and Events'),
(559, '09/07/2022 14:10:35', 'JDelaCruz', 'Deleted Event: TestImg'),
(560, '09/07/2022 14:11:02', 'JDelaCruz', 'Deleted Event: '),
(561, '09/07/2022 14:11:28', 'JDelaCruz', 'Deleted Event: Sample Event'),
(562, '09/07/2022 14:12:14', 'JDelaCruz', 'Deleted Event: Event 3'),
(563, '09/07/2022 14:22:56', 'JDelaCruz', 'Edited Activities and Events'),
(564, '09/07/2022 14:35:16', 'JDelaCruz', 'Deleted Event: TestImg'),
(565, '09/08/2022 08:50:53', 'JDelaCruz', 'Reset password of user: mhikko.ilaganmhikko.ilagan@payreto.com'),
(566, '09/08/2022 08:51:00', 'JDelaCruz', 'Edited user: mhikko.ilagan@payreto.com'),
(567, '09/08/2022 08:51:12', 'JDelaCruz', 'Edited user: mhikko.ilagan@payreto.com'),
(568, '09/08/2022 08:51:40', 'JDelaCruz', 'Edited user: mhikko.ilagan@payreto.com'),
(569, '09/08/2022 09:02:43', 'JDelaCruz', 'Added user: psmichaelcastillo.payretointern@gmail.com'),
(570, '09/08/2022 13:31:44', 'mhikko.ilagan', 'Edited user: mhikko.ilagan@payreto.com'),
(571, '09/08/2022 13:36:50', 'mhikko.ilagan', 'Edited user: awsdf'),
(572, '09/08/2022 13:37:58', 'mhikko.ilagan', 'Edited user: awsdf'),
(573, '09/08/2022 13:38:40', 'mhikko.ilagan', 'Edited user: awsdf'),
(574, '09/08/2022 13:38:49', 'mhikko.ilagan', 'Edited user: asdf'),
(575, '09/08/2022 13:38:58', 'mhikko.ilagan', 'Edited user: asdf'),
(576, '09/08/2022 13:39:12', 'mhikko.ilagan', 'Edited user: asdf'),
(577, '09/08/2022 13:40:50', 'mhikko.ilagan', 'Edited user: asdf'),
(578, '09/08/2022 13:47:18', 'mhikko.ilagan', 'Edited user: asdf'),
(579, '09/08/2022 13:47:27', 'mhikko.ilagan', 'Edited user: asdf'),
(580, '09/08/2022 13:47:46', 'mhikko.ilagan', 'Edited user: 2'),
(581, '09/08/2022 13:47:56', 'mhikko.ilagan', 'Deleted user: 1'),
(582, '09/08/2022 14:11:30', 'mhikko.ilagan', 'Added user: asdf'),
(583, '09/08/2022 14:12:09', 'mhikko.ilagan', 'Added user: asdf'),
(584, '09/08/2022 14:12:42', 'mhikko.ilagan', 'Added user: asdf'),
(585, '09/08/2022 14:13:53', 'mhikko.ilagan', 'Added user: asdf'),
(586, '09/08/2022 14:14:16', 'mhikko.ilagan', 'Deleted user: mike.castillo'),
(587, '09/08/2022 14:14:33', 'mhikko.ilagan', 'Added user: juan.delacruz@payreto.com'),
(588, '09/08/2022 14:15:03', 'mhikko.ilagan', 'Added user: aawdf'),
(589, '09/08/2022 14:17:41', 'mhikko.ilagan', 'Deleted user: mike.castillo'),
(590, '09/08/2022 14:33:05', 'mhikko.ilagan', 'Added user: asdfasdf'),
(591, '09/08/2022 14:33:26', 'mhikko.ilagan', 'Deleted user: mike.castillo'),
(592, '09/08/2022 14:33:48', 'mhikko.ilagan', 'Added user: psmichaelcastillo.payretointern@gmail.com'),
(593, '09/08/2022 14:33:57', 'mhikko.ilagan', 'Added user: psmichaelcastillo.payretointern@gmail.com'),
(594, '09/08/2022 14:34:48', 'mhikko.ilagan', 'Added user: psmichaelcastillo.payretointern@gmail.com'),
(595, '09/08/2022 14:35:04', 'mhikko.ilagan', 'Added user: asdfas'),
(596, '09/08/2022 14:36:21', 'mhikko.ilagan', 'Added user: psmichaelcastillo.payretointern@gmail.com'),
(597, '09/08/2022 14:36:33', 'mhikko.ilagan', 'Deleted user: sdfa'),
(598, '09/08/2022 14:36:50', 'mhikko.ilagan', 'Added user: asdfasdfasd'),
(599, '09/08/2022 14:37:53', 'mhikko.ilagan', 'Deleted user: mike.castillo'),
(600, '09/08/2022 14:38:06', 'mhikko.ilagan', 'Added user: asdfsa'),
(601, '09/08/2022 14:38:16', 'mhikko.ilagan', 'Deleted user: mike.castillo'),
(602, '09/08/2022 14:38:51', 'mhikko.ilagan', 'Added user: asdfas'),
(603, '09/08/2022 14:38:57', 'mhikko.ilagan', 'Deleted user: mike.castillo'),
(604, '09/08/2022 14:39:18', 'mhikko.ilagan', 'Added user: asdfsadf'),
(605, '09/08/2022 14:39:25', 'mhikko.ilagan', 'Deleted user: mike.castillo'),
(606, '09/08/2022 14:42:12', 'mhikko.ilagan', 'Added user: asdf'),
(607, '09/08/2022 14:42:42', 'mhikko.ilagan', 'Added user: asdf'),
(608, '09/08/2022 14:42:49', 'mhikko.ilagan', 'Deleted user: mike.castillo'),
(609, '09/08/2022 14:43:05', 'mhikko.ilagan', 'Added user: asdf'),
(610, '09/08/2022 14:43:20', 'mhikko.ilagan', 'Added user: asdf'),
(611, '09/08/2022 14:43:36', 'mhikko.ilagan', 'Added user: asdf'),
(612, '09/08/2022 14:43:51', 'mhikko.ilagan', 'Added user: asdfasdf'),
(613, '09/08/2022 14:43:57', 'mhikko.ilagan', 'Deleted user: mike.castillo'),
(614, '09/08/2022 14:45:11', 'mhikko.ilagan', 'Deleted user: mike.castillo'),
(615, '09/08/2022 14:45:32', 'mhikko.ilagan', 'Added user: asdfas'),
(616, '09/08/2022 14:45:50', 'mhikko.ilagan', 'Added user: psmichaelcastillo.payretointern@gmail.com'),
(617, '09/08/2022 14:46:51', 'mhikko.ilagan', 'Added user: psmichaelcastillo.payretointern@gmail.com'),
(618, '09/08/2022 14:47:08', 'mhikko.ilagan', 'Added user: asdf'),
(619, '09/08/2022 14:47:15', 'mhikko.ilagan', 'Deleted user: mike.castillo'),
(620, '09/08/2022 14:47:20', 'mhikko.ilagan', 'Deleted user: mike.castillo'),
(621, '09/08/2022 14:47:47', 'mhikko.ilagan', 'Edited user: mhikko.ilagan.@sample.com'),
(622, '09/08/2022 14:48:08', 'mhikko.ilagan', 'Added user: asdfasdf'),
(623, '09/08/2022 14:48:15', 'mhikko.ilagan', 'Deleted user: mike.castillo'),
(624, '09/09/2022 08:58:36', 'JDelaCruz', 'Edited user: mhikko.ilagan.@sample.com'),
(625, '09/09/2022 08:59:48', 'JDelaCruz', 'Edited user: mhikko.ilagan@portal.com'),
(626, '09/09/2022 09:05:51', 'JDelaCruz', 'Edited Activities and Events'),
(627, '09/09/2022 09:05:59', 'JDelaCruz', 'Edited Activities and Events'),
(628, '09/09/2022 09:10:42', 'JDelaCruz', 'Edited Activities and Events'),
(629, '09/09/2022 09:14:40', 'JDelaCruz', 'Edited Activities and Events'),
(630, '09/09/2022 09:15:18', 'JDelaCruz', 'Edited Activities and Events'),
(631, '09/09/2022 09:15:57', 'JDelaCruz', 'Edited Activities and Events'),
(632, '09/09/2022 09:16:57', 'JDelaCruz', 'Edited Activities and Events'),
(633, '09/09/2022 09:19:50', 'JDelaCruz', 'Edited Activities and Events'),
(634, '09/09/2022 09:20:28', 'JDelaCruz', 'Edited Activities and Events'),
(635, '09/09/2022 09:25:02', 'JDelaCruz', 'Edited Activities and Events'),
(636, '09/09/2022 09:26:28', 'JDelaCruz', 'Edited Activities and Events'),
(637, '09/09/2022 09:26:51', 'JDelaCruz', 'Edited Activities and Events'),
(638, '09/09/2022 09:27:37', 'JDelaCruz', 'Edited Activities and Events'),
(639, '09/09/2022 09:27:46', 'JDelaCruz', 'Edited Activities and Events'),
(640, '09/09/2022 09:28:38', 'JDelaCruz', 'Edited Activities and Events'),
(641, '09/09/2022 09:31:34', 'JDelaCruz', 'Edited Foodpanda Account'),
(642, '09/09/2022 09:34:01', 'JDelaCruz', 'Edited Foodpanda Account'),
(643, '09/09/2022 09:35:11', 'JDelaCruz', 'Edited Foodpanda Account'),
(644, '09/09/2022 09:36:37', 'JDelaCruz', 'Edited Activities and Events'),
(645, '09/09/2022 09:39:28', 'JDelaCruz', 'Edited Company Policies and Procedures'),
(646, '09/09/2022 09:39:46', 'JDelaCruz', 'Edited Company Policies and Procedures'),
(647, '09/09/2022 09:39:51', 'JDelaCruz', 'Edited Company Policies and Procedures'),
(648, '09/09/2022 09:41:10', 'JDelaCruz', 'Edited Company Policies and Procedures'),
(649, '09/09/2022 09:50:49', 'JDelaCruz', 'Edited Employee Handbook'),
(650, '09/09/2022 09:51:12', 'JDelaCruz', 'Edited Employee Handbook'),
(651, '09/09/2022 09:51:20', 'JDelaCruz', 'Edited Employee Handbook'),
(652, '09/09/2022 09:51:49', 'JDelaCruz', 'Edited Employee Handbook'),
(653, '09/09/2022 09:51:59', 'JDelaCruz', 'Edited Employee Handbook'),
(654, '09/09/2022 09:52:04', 'JDelaCruz', 'Edited Employee Handbook'),
(655, '09/09/2022 09:52:27', 'JDelaCruz', 'Edited Employee Handbook'),
(656, '09/09/2022 09:52:45', 'JDelaCruz', 'Edited Employee Handbook'),
(657, '09/09/2022 09:53:43', 'JDelaCruz', 'Edited Employee Handbook'),
(658, '09/09/2022 09:54:07', 'JDelaCruz', 'Edited Employee Handbook'),
(659, '09/09/2022 09:55:34', 'JDelaCruz', 'Edited Employee Handbook'),
(660, '09/09/2022 09:55:39', 'JDelaCruz', 'Edited Employee Handbook'),
(661, '09/09/2022 09:56:22', 'JDelaCruz', 'Edited Employee Handbook'),
(662, '09/09/2022 09:56:47', 'JDelaCruz', 'Edited Code of Conduct'),
(663, '09/09/2022 10:41:42', 'JDelaCruz', 'Edited Performance Management'),
(664, '09/09/2022 10:42:18', 'JDelaCruz', 'Edited Code of Conduct'),
(665, '09/09/2022 10:44:49', 'JDelaCruz', 'Edited Incident Report Form'),
(666, '09/09/2022 10:45:28', 'JDelaCruz', 'Edited Post-Event Surveys'),
(667, '09/09/2022 10:45:39', 'JDelaCruz', 'Edited Payreto Store'),
(668, '09/09/2022 10:47:32', 'JDelaCruz', 'Edited Employee Concerns'),
(669, '09/09/2022 10:47:37', 'JDelaCruz', 'Edited Request for Certificate of Employment'),
(670, '09/09/2022 10:56:45', 'JDelaCruz', 'Edited instructional Design'),
(671, '09/09/2022 10:57:27', 'JDelaCruz', 'Edited instructional Design'),
(672, '09/09/2022 10:57:31', 'JDelaCruz', 'Edited Internal Training Request'),
(673, '09/09/2022 10:57:35', 'JDelaCruz', 'Edited Training Request'),
(674, '09/09/2022 10:57:40', 'JDelaCruz', 'Edited LMS Support'),
(675, '09/09/2022 10:58:18', 'JDelaCruz', 'Edited LMS Support'),
(676, '09/09/2022 11:01:11', 'JDelaCruz', 'Edited instructional Design'),
(677, '09/09/2022 11:07:17', 'JDelaCruz', 'Edited Multimedia and Communications Support'),
(678, '09/09/2022 11:08:40', 'JDelaCruz', 'Edited Foodpanda Account'),
(679, '09/09/2022 11:08:47', 'JDelaCruz', 'Edited Request for Certificate of Employment'),
(680, '09/09/2022 11:09:14', 'JDelaCruz', 'Edited Request for Certificate of Employment'),
(681, '09/09/2022 11:16:21', 'JDelaCruz', 'Edited Post-Event Surveys'),
(682, '09/09/2022 11:17:10', 'JDelaCruz', 'Edited Post-Event Surveys'),
(683, '09/09/2022 11:17:16', 'JDelaCruz', 'Edited Post-Event Surveys'),
(684, '09/09/2022 11:54:01', 'JDelaCruz', 'Edited Leave'),
(685, '09/09/2022 12:00:51', 'JDelaCruz', 'Edited HMO'),
(686, '09/09/2022 12:01:20', 'JDelaCruz', 'Edited Leave'),
(687, '09/09/2022 12:01:42', 'JDelaCruz', 'Edited Leave'),
(688, '09/09/2022 12:04:09', 'JDelaCruz', 'Edited Leave'),
(689, '09/09/2022 12:10:29', 'JDelaCruz', 'Edited Employee Retirement Program'),
(690, '09/09/2022 12:13:34', 'JDelaCruz', 'Edited Employee Retirement Program'),
(691, '09/09/2022 12:14:37', 'JDelaCruz', 'Edited Payroll Dispute Inquiry'),
(692, '09/09/2022 12:26:15', 'JDelaCruz', 'Edited Payroll Adjustment Form'),
(693, '09/09/2022 12:26:22', 'JDelaCruz', 'Edited Payroll Dispute Inquiry'),
(694, '09/09/2022 12:27:47', 'JDelaCruz', 'Edited Payroll Adjustment Form'),
(695, '09/09/2022 12:27:54', 'JDelaCruz', 'Edited Payroll Dispute Inquiry'),
(696, '09/09/2022 12:30:53', 'JDelaCruz', 'Edited Payroll Dispute Inquiry'),
(697, '09/09/2022 12:31:01', 'JDelaCruz', 'Edited Payroll Dispute Inquiry'),
(698, '09/09/2022 12:31:52', 'JDelaCruz', 'Edited Update of Employee Records'),
(699, '09/09/2022 12:31:59', 'JDelaCruz', 'Edited Request of Employee Records'),
(700, '09/09/2022 12:32:03', 'JDelaCruz', 'Edited Request for Supply Purchase'),
(701, '09/09/2022 12:32:07', 'JDelaCruz', 'Edited Request for Office Equipment Purchase'),
(702, '09/09/2022 12:44:07', 'JDelaCruz', 'Edited Update of Employee Records'),
(703, '09/09/2022 12:45:01', 'JDelaCruz', 'Edited Request of Employee Records'),
(704, '09/09/2022 12:47:47', 'JDelaCruz', 'Edited Payroll Adjustment Form'),
(705, '09/09/2022 12:49:05', 'JDelaCruz', 'Edited Employee Retirement Program'),
(706, '09/09/2022 12:50:51', 'JDelaCruz', 'Edited Employee Retirement Program'),
(707, '09/09/2022 12:51:01', 'JDelaCruz', 'Edited Employee Retirement Program'),
(708, '09/09/2022 12:51:45', 'JDelaCruz', 'Edited Payroll Adjustment Form'),
(709, '09/09/2022 12:53:02', 'JDelaCruz', 'Edited Payroll Adjustment Form'),
(710, '09/09/2022 12:53:47', 'JDelaCruz', 'Edited Payroll Adjustment Form'),
(711, '09/09/2022 12:53:55', 'JDelaCruz', 'Edited Payroll Dispute Inquiry'),
(712, '09/09/2022 12:54:04', 'JDelaCruz', 'Edited Update of Employee Records'),
(713, '09/09/2022 12:54:12', 'JDelaCruz', 'Edited Request of Employee Records'),
(714, '09/09/2022 12:54:29', 'JDelaCruz', 'Edited Request for Supply Purchase'),
(715, '09/09/2022 12:54:30', 'JDelaCruz', 'Edited Request for Supply Purchase'),
(716, '09/09/2022 12:54:36', 'JDelaCruz', 'Edited Request for Office Equipment Purchase'),
(717, '09/09/2022 12:54:43', 'JDelaCruz', 'Edited Request for Office Equipment Purchase'),
(718, '09/09/2022 12:54:47', 'JDelaCruz', 'Edited Request for Supply Purchase'),
(719, '09/09/2022 12:54:51', 'JDelaCruz', 'Edited Request of Employee Records'),
(720, '09/09/2022 12:54:55', 'JDelaCruz', 'Edited Update of Employee Records'),
(721, '09/09/2022 12:54:59', 'JDelaCruz', 'Edited Payroll Dispute Inquiry'),
(722, '09/09/2022 12:55:04', 'JDelaCruz', 'Edited Update of Employee Records'),
(723, '09/09/2022 12:55:09', 'JDelaCruz', 'Edited Payroll Dispute Inquiry'),
(724, '09/09/2022 12:55:14', 'JDelaCruz', 'Edited Payroll Dispute Inquiry'),
(725, '09/09/2022 12:55:18', 'JDelaCruz', 'Edited Payroll Adjustment Form'),
(726, '09/09/2022 12:56:28', 'JDelaCruz', 'Edited Update of Employee Records'),
(727, '09/09/2022 13:03:08', 'JDelaCruz', 'Edited Payroll Dispute Inquiry');
INSERT INTO `audit_logs` (`id`, `dtime`, `uname`, `form`) VALUES
(728, '09/09/2022 13:58:54', 'mhikko.ilagan', 'Reset password of user: mike.castillopsmichaelcastillo.payretointern@gmail.com'),
(729, '09/12/2022 09:59:54', 'mike.castillo', 'Added user: test4.intern@gmail.com'),
(730, '09/12/2022 11:06:11', 'mike.castillo', 'Deleted user: test4'),
(731, '09/12/2022 11:07:38', 'mike.castillo', 'Edited Activities and Events'),
(732, '09/12/2022 11:08:12', 'mike.castillo', 'Deleted Event: Saruei Live Stream!!!!!'),
(733, '09/12/2022 11:08:31', 'mike.castillo', 'Deleted Event: P'),
(734, '09/12/2022 11:08:59', 'mike.castillo', 'Edited Post-Event Surveys'),
(735, '09/12/2022 11:09:56', 'mike.castillo', 'Added user: Richmond@sample.com'),
(736, '09/12/2022 11:16:39', 'mike.castillo', 'Edited Foodpanda Account'),
(737, '09/12/2022 13:05:28', 'mike.castillo', 'Added user: drake.jordan@sample.com'),
(738, '09/12/2022 13:07:27', 'mike.castillo', 'Edited Technology Request Form'),
(739, '09/12/2022 13:22:19', 'drake.jordan', 'Edited Technology Request Form'),
(740, '09/12/2022 13:23:58', 'drake.jordan', 'Edited Technology Request Form'),
(741, '09/12/2022 13:24:02', 'drake.jordan', 'Edited Technology Request Form'),
(742, '09/12/2022 13:24:05', 'drake.jordan', 'Edited Technology Request Form'),
(743, '09/12/2022 13:24:07', 'drake.jordan', 'Edited Technology Request Form'),
(744, '09/12/2022 13:24:09', 'drake.jordan', 'Edited Technology Request Form'),
(745, '09/12/2022 13:24:34', 'drake.jordan', 'Edited Technology Request Form'),
(746, '09/12/2022 13:24:38', 'drake.jordan', 'Edited Technology Request Form'),
(747, '09/12/2022 13:25:21', 'drake.jordan', 'Edited Technology Request Form'),
(748, '09/12/2022 13:25:25', 'drake.jordan', 'Edited BYOD Request Form'),
(749, '09/12/2022 13:25:27', 'drake.jordan', 'Edited IT Security Awareness'),
(750, '09/13/2022 09:57:40', 'JDelaCruz', 'Added user: psmichaelgoyon.payretointern@gmail.com'),
(751, '09/13/2022 10:02:50', 'mj.goyon', 'Deleted user: test3'),
(752, '09/13/2022 10:03:11', 'mj.goyon', 'Edited user: psmichaelcastillo.payretointern@gmail.com'),
(753, '09/13/2022 10:04:07', 'mj.goyon', 'Added user: pat.gonzales@payreto.com'),
(754, '09/13/2022 10:05:54', 'patrick.gonzales', 'Edited instructional Design'),
(755, '09/13/2022 11:33:44', 'mj.goyon', 'Added user: jae.sangalang@payreto.com'),
(756, '09/13/2022 11:35:39', 'jae.sangalang', 'Edited Requests'),
(757, '09/13/2022 11:37:27', 'jae.sangalang', 'Edited List of OSH Programs and Activites'),
(758, '09/13/2022 11:39:03', 'jae.sangalang', 'Edited List of OSH Programs and Activites'),
(759, '09/13/2022 11:39:29', 'jae.sangalang', 'Deleted Event: Event 1'),
(760, '09/13/2022 13:08:10', 'mj.goyon', 'Added user: pat.tria@payreto.com'),
(761, '09/13/2022 13:10:50', 'patrick.tria', 'e_referral'),
(762, '09/13/2022 13:11:44', 'patrick.tria', 'Edited List of Open Requisitions'),
(763, '09/13/2022 13:12:30', 'patrick.tria', 'Edited List of Open Requisitions'),
(764, '09/13/2022 13:12:46', 'patrick.tria', 'Deleted Position: Operations Manager'),
(765, '09/13/2022 13:26:21', 'mj.goyon', 'Reset password of user: jae.sangalangjae.sangalang@payreto.com'),
(766, '09/20/2022 12:01:56', 'mike.castillo', 'Edited HMO'),
(767, '09/20/2022 12:03:54', 'mike.castillo', 'Edited Leave'),
(768, '09/20/2022 17:34:53', 'mike.castillo', 'Edited user: Richmond@sample.com'),
(769, '09/21/2022 12:23:42', 'mike.castillo', 'Edited List of OSH Programs and Activites'),
(770, '09/21/2022 12:24:12', 'mike.castillo', 'Edited List of OSH Programs and Activites'),
(771, '09/21/2022 12:24:22', 'mike.castillo', 'Edited List of OSH Programs and Activites'),
(772, '09/21/2022 12:26:46', 'mike.castillo', 'Edited List of OSH Programs and Activites');

-- --------------------------------------------------------

--
-- Table structure for table `ebp_leave`
--

DROP TABLE IF EXISTS `ebp_leave`;
CREATE TABLE `ebp_leave` (
  `l_leave` varchar(25) NOT NULL,
  `content` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ebp_leave`
--

INSERT INTO `ebp_leave` (`l_leave`, `content`) VALUES
('anniversary', 'Sample4'),
('battered', 'Sample7'),
('bereavement', 'Sample11'),
('client_holiday', 'Sample12'),
('emergency', 'Sample3'),
('maternity', 'Sample5'),
('paternity', 'Sample6'),
('service_incentive', 'Sample13'),
('sick', 'Sample2'),
('solo', 'Sample9'),
('special_benefit', 'Sample10'),
('vacation', 'Sample11111111111'),
('without_pay', 'Sample8');

-- --------------------------------------------------------

--
-- Table structure for table `empportcredentials`
--

DROP TABLE IF EXISTS `empportcredentials`;
CREATE TABLE `empportcredentials` (
  `ID` int(4) NOT NULL,
  `uname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `FN` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `LN` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `department` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `admin` tinyint(3) NOT NULL,
  `admin_oa` tinyint(2) NOT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `empportcredentials`
--

INSERT INTO `empportcredentials` (`ID`, `uname`, `FN`, `LN`, `role`, `location`, `department`, `email`, `password`, `admin`, `admin_oa`, `img`) VALUES
(1, 'JDelaCruz', 'Juan', 'Dela Cruz', 'Web Developer', 'Manila', 'PSD', 'juan.delacruz@payreto.com', '$2y$10$1gISqHUqtMPgQ/fJJfxdqeHXEcNAVwuYlLwG7ULx/O0xMh0Zhza3u', 1, 1, 'ahnyeoseop.jpg'),
(2, 'juanitadc', 'Juanita', 'Dela Cruz', 'Talent Acquisition Intern', 'Manila', 'People Services Department', 'juanita.delacruz@payreto.com', '$2y$09$aq8C8XypiK/jR2a2xgtwwuRfLDqdofDe4hQc83JPirigW05JSMIJa', 3, 0, 'image0.jpeg'),
(3, 'jdoe', 'John', 'Doe', 'IT Helpdesk Intern', 'Manila', 'People Services Department', 'john.doe@payreto.com', '$2y$10$hTb9qv5Eb6k5tuqUfxO0OeGHUgkn7NzWjipFXvvIUg7VFxlfac77a', 6, 0, 'Wev deb.png'),
(10, 'test', 'test', 'test', 'test@payreto.com', 'test', 'test', 'test@payreto.com', '$2y$10$XDFkAq8I.oS0ff7NSSPWd.WbuG84MEn.IL1aHfP7b6JTNOjH4.geO', 2, 0, 'avatar_default.png'),
(11, 'test2', 'test2', 'test2', 'test2@payreto.com', 'test', 'test', 'test2@payreto.com', '$2y$10$cc5GRw2iEqM.Hgea8V41Weryc3Vxu8KO8lsuXCTYCS145iK2TmSVC', 4, 0, 'avatar_default.png'),
(34, 'mhikko.ilagan', 'Mhikko', 'Ilagan', 'VP People Services', 'Metro Manila', 'People Services Department', 'mhikko.ilagan@portal.com', '$2y$10$n6dbJuy6IOvTBDI23oWhkeLQNdK9a8txauCivGrNrqIrlYaMSPAHi', 7, 1, 'Mhikko-Ilagan-1-min-683x1024.jpg'),
(35, 'mike.castillo', 'Michael', 'Castillo', 'Web Developer Intern', 'Quezon City', 'People Services Department', 'psmichaelcastillo.payretointern@gmail.com', '$2y$10$UCS2PtyV9h/iCQMy6GQOAepvD/WAlpe63nGxmPLtHLmwj46YFWhLu', 7, 1, 'mock-up (15).png'),
(62, 'Richmond.Estella', 'Rich', 'Mond', 'P&#039;Management', 'Manila', 'People Services Department', 'Richmond@sample.com', '$2y$10$Nbqv3eaxPcDqsq5USLtjm.RWpe8YYOsVaHUm3BTBKg1b/78qjziZm', 0, 0, 'avatar_default.png'),
(63, 'drake.jordan', 'Drake', 'Jordan', 'IT Helpdesk Intern', 'Manila', 'IT Helpdesk', 'drake.jordan@sample.com', '$2y$10$rt0m0mUwDeMLPrxZ3VKE0uYCiyuM.vfHhK6y5otJLs9eZABHQAk3q', 6, 0, 'avatar_default.png'),
(64, 'mj.goyon', 'Michael Joseph', 'Goyon', 'Web Dev Intern', 'Manila', 'People Services Department', 'psmichaelgoyon.payretointern@gmail.com', '$2y$10$Frf0zd38nkRk0hx0.q9BRul99y5fkpaXf00SqbRYgCF07pandi6Ga', 7, 1, '3.png'),
(65, 'patrick.gonzales', 'Patrick', 'Gonzales', 'Intern', 'Manila', 'People Services Department', 'pat.gonzales@payreto.com', '$2y$10$jGLfqzVLzjq4o6fgoBvC7u.U2VFW9UKYGcVM8iKGLtAFSHivtcqaS', 2, 0, 'avatar_default.png'),
(66, 'jae.sangalang', 'Jae', 'Sangalang', 'Intern', 'Manila', 'People Services Department', 'jae.sangalang@payreto.com', '$2y$10$iyaNYDI.yepNk4O9gNpqNuu8coi.zlDDpQs7sumDxR.A6f3L804rm', 4, 0, 'avatar_default.png'),
(67, 'patrick.tria', 'Patrick', 'Tria', 'Intern', 'Manila', 'People Services Department', 'pat.tria@payreto.com', '$2y$10$a30jB.YkAczOYCKGcxUWbe8rlKkjmj93TxzdMnRUAlkSrJ9QjPs2u', 3, 0, 'avatar_default.png');

-- --------------------------------------------------------

--
-- Table structure for table `events_activities`
--

DROP TABLE IF EXISTS `events_activities`;
CREATE TABLE `events_activities` (
  `e_id` int(50) NOT NULL,
  `e_name` varchar(255) NOT NULL,
  `e_team` varchar(255) NOT NULL,
  `e_date` varchar(255) NOT NULL,
  `e_content` varchar(5000) NOT NULL,
  `e_poster` varchar(255) NOT NULL,
  `e_posted` varchar(255) NOT NULL,
  `e_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events_activities`
--

INSERT INTO `events_activities` (`e_id`, `e_name`, `e_team`, `e_date`, `e_content`, `e_poster`, `e_posted`, `e_img`) VALUES
(19, 'How to be a &amp;quot;Programmer&amp;quot; 101', 'P&amp;#039;Sol Deez Nuts', '2022-08-25', 'asdasd&amp;quot;asd&amp;quot;asdad&amp;#039;&amp;#039;asdasd&amp;quot;&amp;#039;&amp;#039;Asdasdasd', 'JDelaCruz', '08/24/2022', '../people_management/assets/files/image222s.jpg'),
(21, 'meep morp', 'P&amp;#039;Solutions', '2022-08-26', 'meeeeeeeeeeeeeeeeep', 'JDelaCruz', '08/25/2022', ''),
(24, 'How to train your cat to play jazz', 'P&amp;#039;Solutions', '2022-09-10', 'Just ask it to play you some jazz, it works 11/10', 'JDelaCruz', '08/25/2022', '../people_management/assets/files/b9a72495a57000f0c38f32fcebca8726_400x400.jpeg'),
(27, 'Ben &amp;amp; Ben Live @ Payreto Office Penthouse B!', 'People Admin', '2022-09-09', 'OH EM GEE \r\n\r\nThey&amp;#039;re going to be like, so live at that time. \r\n\r\nI cannot believe it, like, Oh Em Geeeee!!!', 'JDelaCruz', '09/01/2022', ''),
(28, 'Patrick Tria, EXPOSED! Click here to know more!', 'P&amp;#039;Solutions', '2022-09-10', 'Asdfsdfsdfs\r\naSDFSDFSdfS\r\nSDFSFSdf\r\nSDfsDFsdFsdF\r\nSDFsDfsdfSdf\r\nSDFdsFsdfsDF\r\nScandal', 'JDelaCruz', '09/02/2022', '../people_management/assets/files/image0.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `e_admin`
--

DROP TABLE IF EXISTS `e_admin`;
CREATE TABLE `e_admin` (
  `id` varchar(50) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `e_admin`
--

INSERT INTO `e_admin` (`id`, `link`) VALUES
('adjustment', ''),
('concerns_ph', ''),
('concerns_pi', ''),
('concerns_sss', ''),
('contribution_ph', ''),
('contribution_pi', ''),
('contribution_sss', ''),
('dispute', ''),
('e_purchase', ''),
('health', ''),
('hmo', ''),
('holidays', ''),
('loan_pi', ''),
('loan_sss', ''),
('maternity', ''),
('mp2', ''),
('ot', ''),
('retirement', ''),
('r_records', ''),
('shift', ''),
('s_purchase', ''),
('time', ''),
('u_records', '');

-- --------------------------------------------------------

--
-- Table structure for table `health_maintenance`
--

DROP TABLE IF EXISTS `health_maintenance`;
CREATE TABLE `health_maintenance` (
  `hmo_id` varchar(25) NOT NULL,
  `content` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `health_maintenance`
--

INSERT INTO `health_maintenance` (`hmo_id`, `content`) VALUES
('cancellation', 'Content'),
('concerns', 'Content'),
('coverage', 'Content'),
('dclinics', 'Content'),
('dental', 'Content'),
('enrollment', 'Content'),
('hospitals', 'Content'),
('insurance', 'Content'),
('mclinics', 'Content'),
('medicalre', 'Content'),
('medicinere', 'Content'),
('optical', 'Content'),
('physical', 'Content'),
('principal', 'Content');

-- --------------------------------------------------------

--
-- Table structure for table `intern_positions`
--

DROP TABLE IF EXISTS `intern_positions`;
CREATE TABLE `intern_positions` (
  `i_id` int(10) NOT NULL,
  `i_pos` varchar(255) NOT NULL,
  `i_num` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `intern_positions`
--

INSERT INTO `intern_positions` (`i_id`, `i_pos`, `i_num`) VALUES
(1, 'Talent Acquisition Intern', 3),
(2, 'Learning and Development Intern', 2),
(3, 'Marketing and Research Intern', 5),
(4, 'Sales and Support Intern', 5),
(5, 'Bespoke Process Intern', 5);

-- --------------------------------------------------------

--
-- Table structure for table `it_helpdesk`
--

DROP TABLE IF EXISTS `it_helpdesk`;
CREATE TABLE `it_helpdesk` (
  `id` varchar(50) NOT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `it_helpdesk`
--

INSERT INTO `it_helpdesk` (`id`, `link`) VALUES
('awareness', 'assets/files/2021_Payreto_Security_Awareness_Training.pdf'),
('byod', 'assets/files/BYOD_FORM.pdf'),
('technology', '../it_helpdesk/assets/files/Technology_Request_Form_-_2019.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `open_requisitions`
--

DROP TABLE IF EXISTS `open_requisitions`;
CREATE TABLE `open_requisitions` (
  `r_id` int(50) NOT NULL,
  `r_pos` varchar(255) NOT NULL,
  `r_num` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `open_requisitions`
--

INSERT INTO `open_requisitions` (`r_id`, `r_pos`, `r_num`) VALUES
(1, 'Accountant', 5),
(2, 'Account Manager - Payments', 5),
(3, 'Accounts Receivable Associate', 5),
(4, 'Business Development Associate', 5),
(5, 'Company Nurse', 5),
(6, 'Data Analyst', 5),
(7, 'HR Generalist', 5),
(8, 'IT Helpdesk Associate', 5),
(9, 'IT Helpdesk Specialist', 5),
(10, 'Marketing Project Coordinator', 5),
(11, 'Operations Manager - Bespoke Finance', 5),
(12, 'Operations Manager - Bespoke Payments', 5),
(13, 'Service Delivery Assistant', 5),
(14, 'Talent Acquisition Specialist', 5),
(15, 'Technical Support Representative', 5);

-- --------------------------------------------------------

--
-- Table structure for table `osh_programs`
--

DROP TABLE IF EXISTS `osh_programs`;
CREATE TABLE `osh_programs` (
  `o_id` int(50) NOT NULL,
  `o_name` varchar(255) NOT NULL,
  `o_date` varchar(255) NOT NULL,
  `o_desc` varchar(10000) NOT NULL,
  `o_poster` varchar(255) NOT NULL,
  `o_posted` varchar(255) NOT NULL,
  `o_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `osh_programs`
--

INSERT INTO `osh_programs` (`o_id`, `o_name`, `o_date`, `o_desc`, `o_poster`, `o_posted`, `o_img`) VALUES
(2, 'Ado', '2022-08-25', 'ADO IS MY ALL-TIME FAVOURITE JP SINGER &amp;lt;3', 'JDelaCruz', '08/24/2022', '../people_support/assets/files/image0.jpeg'),
(3, 'Hellnah', '2022-09-01', 'asdfasdfasdfasdfasf', 'JDelaCruz', '08/31/2022', ''),
(5, 'YipYap', '2022-09-02', 'asdf', 'JDelaCruz', '08/31/2022', ''),
(8, 'How to be a first-aider', '2022-09-01', 'asdfasdf', 'JDelaCruz', '08/31/2022', ''),
(9, 'fuyioh?', '2022-09-01', 'Fuyioh!!!!', 'JDelaCruz', '08/31/2022', ''),
(10, 'UwU', '2022-09-16', 'asdfasdfasdfasdfsf\r\nasdf\r\nasd\r\nfasd\r\nfasd\r\nf\r\nasdf\r\nasdf\r\nasd\r\nfasd\r\nfasd\r\nfas\r\nf', 'JDelaCruz', '09/02/2022', '');

-- --------------------------------------------------------

--
-- Table structure for table `post_event`
--

DROP TABLE IF EXISTS `post_event`;
CREATE TABLE `post_event` (
  `p_id` int(20) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_event`
--

INSERT INTO `post_event` (`p_id`, `p_name`, `p_link`) VALUES
(29, 'Saruei Live Stream!!!!', 'https://forms.gle/hkEEqVguVLJQr9Qy7'),
(30, 'How to train your cat to play Jazz', 'https://forms.gle/hkEEqVguVLJQr9Qy7'),
(34, 'Mid-Year Town Hall', 'https://forms.gle/hkEEqVguVLJQr9Qy7'),
(35, 'Survey Time!!', 'somesurveylink.com.ph/whatthehell?'),
(36, 'Pmanagement Event Post-survey', 'https://forms.gle/hkEEqVguVLJQr9Qy7');

-- --------------------------------------------------------

--
-- Table structure for table `p_acquisition`
--

DROP TABLE IF EXISTS `p_acquisition`;
CREATE TABLE `p_acquisition` (
  `id` varchar(255) NOT NULL,
  `link` varchar(2500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p_acquisition`
--

INSERT INTO `p_acquisition` (`id`, `link`) VALUES
('concerns', 'https://docs.google.com/forms/d/e/1FAIpQLSeN2mNyNMMrsT23wm9DYadypFQ3QgL-ulAJX0pISN5X-cDNWQ/viewform?usp=sf_link'),
('e_referral', 'https://docs.google.com/forms/d/e/1FAIpQLSd9fkAUFlNldTFK_TURevrXghbbVSJGp3jXJKO6NXO2NuWJ-w/viewform?pli=1&pli=1&pli=1'),
('i_referral', ''),
('i_submission', ''),
('recruitment', 'https://docs.google.com/forms/d/e/1FAIpQLSeN2mNyNMMrsT23wm9DYadypFQ3QgL-ulAJX0pISN5X-cDNWQ/viewform?usp=sf_link'),
('request_id', ''),
('requirement', ''),
('update_id', '');

-- --------------------------------------------------------

--
-- Table structure for table `p_development`
--

DROP TABLE IF EXISTS `p_development`;
CREATE TABLE `p_development` (
  `id` varchar(50) NOT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p_development`
--

INSERT INTO `p_development` (`id`, `link`) VALUES
('account', 'https://docs.google.com/forms/d/e/1FAIpQLSf4p7JkmMjSlaKGaMKyYPv9EGPOYPDL2-qUVJlVPsqFwybL4Q/viewform?pli=1'),
('ad', ''),
('course', ''),
('external', ''),
('instructional', 'https://docs.google.com/forms/d/e/1FAIpQLSd9fkAUFlNldTFK_TURevrXghbbVSJGp3jXJKO6NXO2NuWJ-w/alreadyresponded?pli=1&pli=1'),
('internal', ''),
('multimedia', ''),
('playbook', '');

-- --------------------------------------------------------

--
-- Table structure for table `p_management`
--

DROP TABLE IF EXISTS `p_management`;
CREATE TABLE `p_management` (
  `id` varchar(50) NOT NULL,
  `link` varchar(2500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p_management`
--

INSERT INTO `p_management` (`id`, `link`) VALUES
('certificate', 'https://forms.gle/JkPPtUffq5T6wWrG6'),
('concerns', ''),
('conduct', ''),
('eventform', ''),
('foodpanda1', 'assets/img/foodpanda.png'),
('foodpanda2', 'Richmond Estella'),
('foodpanda3', 'richmond.estella@payreto.com'),
('handbook', 'assets/files/Payreto_Employee_Handbook_2020.pdf'),
('imbursement', 'https://forms.gle/b5VMmguPtKwaKgSG8'),
('incident', 'assets/files/Incident_Report_Template.pdf'),
('nomination', 'https://forms.gle/b5VMmguPtKwaKgSG8'),
('performance', 'assets/files/Performance_EvalForm.pdf'),
('policy', ''),
('rewards', ' https://forms.gle/5LAFo6ahbd3DNTYi8');

-- --------------------------------------------------------

--
-- Table structure for table `p_support`
--

DROP TABLE IF EXISTS `p_support`;
CREATE TABLE `p_support` (
  `id` varchar(50) NOT NULL,
  `link` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p_support`
--

INSERT INTO `p_support` (`id`, `link`, `type`) VALUES
('bcp', 'https://docs.google.com/document/d/1CkCucxn1YzoSQlYDFlHR7TwsPWEjKVUvEqH6bUXlGe4/edit', 0),
('bcp_i', '', 0),
('bcp_t', 'assets/img/BCP_Teams_Org_Chart.svg, assets/img/Emergency_Management_Team.svg, assets/img/Communications_Team.svg, assets/img/Emergency_Response_Team.svg, assets/img/Human_Resource_Recovery_Team.svg, assets/img/Administration_Recovery_Team.svg, assets/img/IT_Disaster_Recovery_Team.svg', 1),
('call', '', 0),
('committee', '', 0),
('delivery', '', 0),
('escape', 'assets/img/EscapePlan_15th.png, assets/img/EscapePlan_GF.png, assets/img/EscapePlan_Outside.png', 1),
('food', 'https://docs.google.com/forms/d/e/1FAIpQLSd9fkAUFlNldTFK_TURevrXghbbVSJGp3jXJKO6NXO2NuWJ-w/viewform?pli=1&pli=1&pli=1', 0),
('health', '', 0),
('incident', '', 0),
('load', '', 0),
('medicine', '', 0),
('nurse', '', 0),
('osh', '', 0),
('parking', 'Earl', 0),
('parking2', 'earl.estioco@payreto.com', 0),
('reimbursement', 'assets/files/Admin_Expense_Reimbursement_Form_April_12_2022.pdf', 1),
('repair', 'https://docs.google.com/forms/d/e/1FAIpQLSdSnsQ6rkCjcO-KK9DEZteBBIxbFBCgoNbwa6co50-1XCGmEg/viewform', 0),
('room', '', 0),
('supply', 'assets/files/pricelist-31.pdf', 1),
('transpo', '', 0),
('workplace', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audit_logs`
--
ALTER TABLE `audit_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ebp_leave`
--
ALTER TABLE `ebp_leave`
  ADD PRIMARY KEY (`l_leave`);

--
-- Indexes for table `empportcredentials`
--
ALTER TABLE `empportcredentials`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `EMAIL` (`email`);

--
-- Indexes for table `events_activities`
--
ALTER TABLE `events_activities`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `e_admin`
--
ALTER TABLE `e_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `health_maintenance`
--
ALTER TABLE `health_maintenance`
  ADD PRIMARY KEY (`hmo_id`);

--
-- Indexes for table `intern_positions`
--
ALTER TABLE `intern_positions`
  ADD PRIMARY KEY (`i_id`);

--
-- Indexes for table `it_helpdesk`
--
ALTER TABLE `it_helpdesk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `open_requisitions`
--
ALTER TABLE `open_requisitions`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `osh_programs`
--
ALTER TABLE `osh_programs`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `post_event`
--
ALTER TABLE `post_event`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `p_acquisition`
--
ALTER TABLE `p_acquisition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p_development`
--
ALTER TABLE `p_development`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p_management`
--
ALTER TABLE `p_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p_support`
--
ALTER TABLE `p_support`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audit_logs`
--
ALTER TABLE `audit_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=773;

--
-- AUTO_INCREMENT for table `empportcredentials`
--
ALTER TABLE `empportcredentials`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `events_activities`
--
ALTER TABLE `events_activities`
  MODIFY `e_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `intern_positions`
--
ALTER TABLE `intern_positions`
  MODIFY `i_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `open_requisitions`
--
ALTER TABLE `open_requisitions`
  MODIFY `r_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `osh_programs`
--
ALTER TABLE `osh_programs`
  MODIFY `o_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `post_event`
--
ALTER TABLE `post_event`
  MODIFY `p_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;
