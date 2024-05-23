-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2023 at 11:28 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arogyadhamaapi`
--

-- --------------------------------------------------------

--
-- Table structure for table `accommodations`
--

CREATE TABLE `accommodations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accommodations`
--

INSERT INTO `accommodations` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Ashirwad', '', '1', '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(2, 'Maitri', '', '1', '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(3, 'Sheshadri Bhavan', '', '1', '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(4, 'Ashwini', '', '1', '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(5, 'Pushpa', '', '1', '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(6, 'Prema', '', '1', '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(7, 'Shradda', '', '1', '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(8, 'Medha', '', '1', '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(9, 'Dhriti', '', '1', '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(10, 'Krishna villa', '', '1', '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(11, 'Vatika', '', '1', '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(12, 'Astha', '', '1', '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `app_icones`
--

CREATE TABLE `app_icones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_icone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apptype` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `app_icones`
--

INSERT INTO `app_icones` (`id`, `app_type`, `app_title`, `app_description`, `app_icone`, `reference_id`, `apptype`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'treatmentchart', 'Treatment chart', 'treatment chart', '/images/icone/TreatmentChartIcon.png', '1', 1, 1, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(2, 'dietchart', 'Diet chart', 'Diet chart', '/images/icone/DietChartIcon.png', '2', 2, 1, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(3, 'casedetails', 'Case details', 'case details', '/images/icone/CaseDetailIcon.png', '3', 3, 1, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(4, 'dailychart', 'Daily report', 'daily report', '/images/icone/DailyReportIcon.png', '4', 4, 1, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(5, 'payment', 'Payment', 'payment', '/images/icone/PaymentIcon.png', '5', 5, 1, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(6, 'discharge', 'Discharge summary', 'Discharge summary', '/images/icone/DischargeIcon.png', '6', 6, 1, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `app_notifications`
--

CREATE TABLE `app_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) DEFAULT NULL,
  `receiver_id` bigint(20) DEFAULT NULL,
  `notification_type` bigint(20) DEFAULT NULL,
  `notification_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notification_message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notification_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creation_datetime` datetime DEFAULT NULL,
  `is_read` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `app_notification_titles`
--

CREATE TABLE `app_notification_titles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `notification_type` bigint(20) DEFAULT NULL,
  `notification_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `app_notification_titles`
--

INSERT INTO `app_notification_titles` (`id`, `notification_type`, `notification_title`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 3, 'Reminder', '1', NULL, '2023-09-01 06:32:23', '2023-09-01 06:32:23'),
(2, 4, 'Offers', '1', NULL, '2023-09-01 06:32:23', '2023-09-01 06:32:23'),
(3, 5, 'Event', '1', NULL, '2023-09-01 06:32:23', '2023-09-01 06:32:23');

-- --------------------------------------------------------

--
-- Table structure for table `app_setting_pages`
--

CREATE TABLE `app_setting_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `setting_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setting_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setting_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setting_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `app_setting_pages`
--

INSERT INTO `app_setting_pages` (`id`, `setting_title`, `setting_description`, `setting_icon`, `setting_type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Notifications', 'Notifications', '/images/icone/Notification.png', '1', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30'),
(2, 'Privacy', 'Ayurveda Nemo enim ipsam voluptatem quia sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Ayurveda Nemo enim ipsam voluptatem quia sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt', '/images/icone/privacy_icon.png', '2', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30'),
(3, 'About Us', 'Ayurveda Nemo enim ipsam voluptatem quia sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Ayurveda Nemo enim ipsam voluptatem quia sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt', '/images/icone/About_us.png', '2', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30'),
(4, 'Share app', 'Share app', '/images/icone/Share_app.png', '3', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30');

-- --------------------------------------------------------

--
-- Table structure for table `case_details`
--

CREATE TABLE `case_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `user_visit_id` bigint(20) DEFAULT NULL,
  `doctor_id` bigint(20) DEFAULT NULL,
  `ipsection_id` bigint(20) DEFAULT NULL,
  `chief_complaints` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medical_history` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `final_diagnosis` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shortname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `shortname`, `name`, `phone_code`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'AF', 'Afghanistan', '+93', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(2, 'AL', 'Albania', '+355', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(3, 'DJ', 'Algeria', '+213', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(4, 'AS', 'American Samoa', '+1684', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(5, 'AD', 'Andorra', '+376', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(6, 'AO', 'Angola', '+244', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(7, 'AI', 'Anguilla', '+1264', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(8, 'AQ', 'Antarctica', '+0', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(9, 'AG', 'Antigua And Barbuda', '+1268', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(10, 'AR', 'Argentina', '+54', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(11, 'AM', 'Armenia', '+374', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(12, 'AW', 'Aruba', '+297', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(13, 'AU', 'Australia', '+61', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(14, 'AT', 'Austria', '+43', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(15, 'AZ', 'Azerbaijan', '+994', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(16, 'BS', 'Bahamas The', '+1242', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(17, 'BH', 'Bahrain', '+973', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(18, 'BD', 'Bangladesh', '+880', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(19, 'BB', 'Barbados', '+1246', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(20, 'BY', 'Belarus', '+375', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(21, 'BE', 'Belgium', '+32', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(22, 'BZ', 'Belize', '+501', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(23, 'BJ', 'Benin', '+299', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(24, 'BM', 'Bermuda', '+1441', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(25, 'BT', 'Bhutan', '+975', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(26, 'BO', 'Bolivia', '+591', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(27, 'BA', 'Bosnia and Herzegovina', '+387', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(28, 'Bw', 'Botswana', '+267', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(29, 'BV', 'Bouvet Island', '+0', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(30, 'BR', 'Brazil', '+55', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(31, 'IO', 'British Indian Ocean Territory', '+246', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(32, 'BN', 'Brunei', '+673', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(33, 'BG', 'Bulgaria', '+359', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(34, 'BF', 'Burkina Faso', '+226', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(35, 'BI', 'Burundi', '+257', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(36, 'KH', 'Cambodia', '+855', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(37, 'CM', 'Cameroon', '+237', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(38, 'CA', 'Canada', '+1', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(39, 'CV', 'Cape Verde', '+238', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(40, 'KY', 'Cayman Islands', '+1345', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(41, 'CF', 'Central African Republic', '+236', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(42, 'TD', 'Chad', '+235', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(43, 'CL', 'Chile', '+56', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(44, 'CN', 'China', '+86', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(45, 'CX', 'Christmas Island', '+61 ', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(46, 'CC', 'Cocos', '+672', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(47, 'CO', 'Colombia', '+57', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(48, 'KM', 'Comoros', '+269', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(49, 'CG', 'Republic Of The Congo', '+242', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(50, 'CD', 'Democratic Republic Of The Congo', '+242', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(51, 'CK', 'Cook Islands', '+682 ', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(52, 'CR', 'Costa Rica', '+506 ', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(53, 'CI', 'Cote D\'Ivoire (Ivory Coast)', '+225', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(54, 'HR', 'Croatia', '+385 ', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(55, 'CU', 'Cuba', '+53 ', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(56, 'CY', 'Cyprus', '+357 ', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(57, 'CZ', 'Czech Republic', '+420', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(58, 'DK', 'Denmark', '+45', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(59, 'DJ', 'Djibouti', '+253', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(60, 'DM', 'Dominica', '+1767', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(61, 'DO', 'Dominican Republic', '+1809', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(62, 'TP', 'East Timor', '+670', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(63, 'EC', 'Ecuador', '+593', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(64, 'EG', 'Egypt', '+20', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(65, 'SV', 'El Salvador', '+503', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(66, 'GQ', 'Equatorial Guinea', '+240', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(67, 'ER', 'Eritrea', '+291', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(68, 'EE', 'Estonia', '+372', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(69, 'ET', 'Ethiopia', '+251', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(70, 'XA', 'External Territories of Australia', '+61', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(71, 'FK', 'Falkland Islands', '+500', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(72, 'FO', 'Faroe Islands', '+298', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(73, 'FJ', 'Fiji Islands', '+679', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(74, 'FI', 'Finland', '+358', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(75, 'FR', 'France', '+33', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(76, 'GF', 'French Guiana', '+594', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(77, 'PF', 'French Polynesia', '+689', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(78, 'TF', 'French Southern Territories', '+0', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(79, 'GA', 'Gabon', '+241', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(80, 'GM', 'Gambia The', '+220', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(81, 'GE', 'Georgia', '+995', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(82, 'DE', 'Germany', '+49', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(83, 'GH', 'Ghana', '+233', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(84, 'GI', 'Gibraltar', '+350', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(85, 'GR', 'Greece', '+30', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(86, 'GL', 'Greenland', '+299', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(87, 'GD', 'Grenada', '+1473', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(88, 'GP', 'Guadeloupe', '+590', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(89, 'GU', 'Guam', '+1671', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(90, 'GT', 'Guatemala', '+502', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(91, 'XU', 'Guernsey and Alderney', '+44', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(92, 'GN', 'Guinea', '+224', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(93, 'GW', 'Guinea-Bissau', '+245', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(94, 'GY', 'Guyana', '+592', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(95, 'HT', 'Haiti', '+509', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(96, 'HM', 'Heard and McDonald Islands', '+0', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(97, 'HN', 'Honduras', '+504', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(98, 'HK', 'Hong Kong S.A.R.', '+852', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(99, 'HU', 'Hungary', '+36', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(100, 'IS', 'Iceland', '+354', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(101, 'IN', 'India', '+91', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(102, 'ID', 'Indonesia', '+62', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(103, 'IR', 'Iran', '+98', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(104, 'IQ', 'Iraq', '+964', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(105, 'IE', 'Ireland', '+353', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(106, 'IL', 'Israel', '+972', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(107, 'IT', 'Italy', '+39', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(108, 'JM', 'Jamaica', '+1876', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(109, 'JP', 'Japan', '+81', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(110, 'XJ', 'Jersey', '+44', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(111, 'JO', 'Jordan', '+962', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(112, 'KZ', 'Kazakhstan', '+7', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(113, 'KE', 'Kenya', '+254', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(114, 'KI', 'Kiribati', '+686', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(115, 'KP', 'Korea North', '+850', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(116, 'KR', 'Korea South', '+82', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(117, 'KW', 'Kuwait', '+965', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(118, 'KG', 'Kyrgyzstan', '+996', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(119, 'LA', 'Laos', '+856', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(120, 'LV', 'Latvia', '+371', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(121, 'LB', 'Lebanon', '+961', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(122, 'LS', 'Lesotho', '+266', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(123, 'LR', 'Liberia', '+231', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(124, 'LY', 'Libya', '+218', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(125, 'LI', 'Liechtenstein', '+423', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(126, 'LT', 'Lithuania', '+370', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(127, 'LU', 'Luxembourg', '+352', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(128, 'MO', 'Macau S.A.R.', '+853', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(129, 'MK', 'Macedonia', '+389', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(130, 'MG', 'Madagascar', '+261', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(131, 'MW', 'Malawi', '+265', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(132, 'MY', 'Malaysia', '+60', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(133, 'MV', 'Maldives', '+960', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(134, 'ML', 'Mali', '+223', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(135, 'MT', 'Malta', '+356', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(136, 'XM', 'Man (Isle of)', '+44', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(137, 'MH', 'Marshall Islands', '+692', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(138, 'MQ', 'Martinique', '+596', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(139, 'MR', 'Mauritania', '+222', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(140, 'MU', 'Mauritius', '+230', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(141, 'YT', 'Mayotte', '+269', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(142, 'MX', 'Mexico', '+52', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(143, 'FM', 'Micronesia', '+691', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(144, 'MD', 'Moldova', '+373', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(145, 'MC', 'Monaco', '+377', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(146, 'MN', 'Mongolia', '+976', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(147, 'MS', 'Montserrat', '+1664', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(148, 'MA', 'Morocco', '+212', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(149, 'MZ', 'Mozambique', '+258', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(150, 'MM', 'Myanmar', '+95', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(151, 'NA', 'Namibia', '+264', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(152, 'NR', 'Nauru', '+674', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(153, 'NP', 'Nepal', '+977', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(154, 'AN', 'Netherlands Antilles', '+599', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(155, 'NL', 'Netherlands The', '+31', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(156, 'NC', 'New Caledonia', '+687', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(157, 'NZ', 'New Zealand', '+64', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(158, 'NI', 'Nicaragua', '+505', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(159, 'NE', 'Niger', '+227', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(160, 'NG', 'Nigeria', '+234', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(161, 'NU', 'Niue', '+683', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(162, 'NF', 'Norfolk Island', '+672', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(163, 'MP', 'Northern Mariana Islands', '+1670', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(164, 'NO', 'Norway', '+47', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(165, 'OM', 'Oman', '+968', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(166, 'PK', 'Pakistan', '+92', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(167, 'PW', 'Palau', '+680', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(168, 'PS', 'Palestinian Territory Occupied', '+970', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(169, 'PA', 'Panama', '+507', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(170, 'PG', 'Papua new Guinea', '+675', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(171, 'PY', 'Paraguay', '+595', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(172, 'PE', 'Peru', '+51', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(173, 'PH', 'Philippines', '+63', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(174, 'PN', 'Pitcairn Island', '+0', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(175, 'PL', 'Poland', '+48', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(176, 'PT', 'Portugal', '+351', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(177, 'PR', 'Puerto Rico', '+1787', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(178, 'QA', 'Qatar', '+974', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(179, 'RE', 'Reunion', '+262', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(180, 'RO', 'Romania', '+40', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(181, 'RU', 'Russia', '+70', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(182, 'RW', 'Rwanda', '+250', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(183, 'SH', 'Saint Helena', '+290', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(184, 'KN', 'Saint Kitts And Nevis', '+1869', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(185, 'LC', 'Saint Lucia', '+1758', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(186, 'PM', 'Saint Pierre and Miquelon', '+508', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(187, 'VC', 'Saint Vincent And The Grenadines', '+1784', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(188, 'WS', 'Samoa', '+684', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(189, 'SM', 'San Marino', '+378', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(190, 'ST', 'Sao Tome and Principe', '+239', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(191, 'SA', 'Saudi Arabia', '+966', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(192, 'SN', 'Senegal', '+221', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(193, 'RS', 'Serbia', '+381', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(194, 'SC', 'Seychelles', '+248', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(195, 'SL', 'Sierra Leone', '+232', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(196, 'SG', 'Singapore', '+65', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(197, 'SK', 'Slovakia', '+421', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(198, 'SI', 'Slovenia', '+386', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(199, 'XG', 'Smaller Territories of the UK', '+44', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(200, 'SB', 'Solomon Islands', '+677', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(201, 'SO', 'Somalia', '+252', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(202, 'ZA', 'South Africa', '+27', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(203, 'GS', 'South Georgia', '+0', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(204, 'SS', 'South Sudan', '+211', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(205, 'ES', 'Spain', '+34', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(206, 'LK', 'Sri Lanka', '+94', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(207, 'SD', 'Sudan', '+249', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(208, 'SR', 'Suriname', '+597', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(209, 'SJ', 'Svalbard And Jan Mayen Islands', '+47', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(210, 'SZ', 'Swaziland', '+268', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(211, 'SE', 'Sweden', '+46', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(212, 'CH', 'Switzerland', '+41', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(213, 'SY', 'Syria', '+963', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(214, 'TW', 'Taiwan', '+886', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(215, 'TJ', 'Tajikistan', '+992', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(216, 'TZ', 'Tanzania', '+255', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(217, 'TH', 'Thailand', '+66', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(218, 'TG', 'Togo', '+228', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(219, 'TK', 'Tokelau', '+690', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(220, 'TO', 'Tonga', '+676', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(221, 'TT', 'Trinidad And Tobago', '+1868', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(222, 'TN', 'Tunisia', '+216', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(223, 'TR', 'Turkey', '+90', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(224, 'TM', 'Turkmenistan', '+7370', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(225, 'TC', 'Turks And Caicos Islands', '+1649', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(226, 'TV', 'Tuvalu', '+688', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(227, 'UG', 'Uganda', '+256', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(228, 'UA', 'Ukraine', '+380', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(229, 'AE', 'United Arab Emirates', '+971', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(230, 'GB', 'United Kingdom', '+44', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(231, 'US', 'United States', '+1', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(232, 'UM', 'United States Minor Outlying Islands', '+1', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(233, 'UY', 'Uruguay', '+598', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(234, 'UZ', 'Uzbekistan', '+998', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(235, 'VU', 'Vanuatu', '+678', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(236, 'VA', 'Vatican City State (Holy See)', '+39', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(237, 'VE', 'Venezuela', '+58', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(238, 'VN', 'Vietnam', '+84', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(239, 'VG', 'Virgin Islands (British)', '+1284', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(240, 'VI', 'Virgin Islands (US)', '+1340', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(241, 'WF', 'Wallis And Futuna Islands', '+681', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(242, 'EH', 'Western Sahara', '+212', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(243, 'YE', 'Yemen', '+967', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(244, 'YU', 'Yugoslavia', '+38', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(245, 'ZM', 'Zambia', '+260', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(246, 'ZW', 'Zimbabwe', '+263', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `description`, `icon`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Yoga', NULL, '/images/icone/icon.png', '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(2, 'Ayurvedha', NULL, '/images/icone/icon.png', '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(3, 'Naturopathy', NULL, '/images/icone/icon.png', '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(4, 'Physiotheraphy', NULL, '/images/icone/icon.png', '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(5, 'Acupuncture', NULL, '/images/icone/icon.png', '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(6, 'Counseling', NULL, '/images/icone/icon.png', '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(7, 'Diet', NULL, '/images/icone/icon.png', '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `discharges`
--

CREATE TABLE `discharges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `doctor_id` bigint(20) DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discharged_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_id` bigint(20) DEFAULT NULL,
  `section_id` bigint(20) DEFAULT NULL,
  `is_counseler` bigint(20) NOT NULL DEFAULT 0,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `profile_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `user_id`, `firstname`, `lastname`, `email`, `mobile_no`, `department_id`, `section_id`, `is_counseler`, `status`, `profile_photo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'Dr. Sharad', '', 'sharad@gmail.com', '', 1, 1, 0, '1', NULL, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(2, 3, 'Dr. Ankita', '', 'ankita@gmail.com', '', 1, 3, 0, '1', NULL, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(3, 4, 'Dr.Promila', '', 'promila@gmail.com', '', 1, 3, 0, '1', NULL, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(4, 5, 'Dr. Arundhati', '', 'arundhati@gmail.com', '', 1, 4, 0, '1', NULL, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(5, 6, 'Dr. Padmimi', '', 'padmimi@gmail.com', '', 1, 5, 0, '1', NULL, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(6, 7, 'Dr.Vidyashree', '', 'vidyashree@gmail.com', '', 1, 6, 0, '1', NULL, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(7, 8, 'Dr. Shrigowri', '', 'shrigowri@gmail.com', '', 1, 7, 0, '1', NULL, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(8, 9, 'Dr.Reshma', '', 'reshma@gmail.com', '', 1, 1, 0, '1', NULL, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(9, 10, 'Dr. Nibedita', '', 'nibedita@gmail.com', '', 1, 9, 0, '1', NULL, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(10, 11, 'Dr. Champa', '', 'champa@gmail.com', '', 2, 1, 0, '1', NULL, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(11, 12, 'Dr. Abhiram', '', 'abhiram@gmail.com', '', 2, 1, 0, '1', NULL, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(12, 13, 'Dr. Roopa', '', 'roopa@gmail.com', '', 2, 2, 0, '1', NULL, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(13, 14, 'Dr. Dhanya', '', 'dhanya@gmail.com', '', 2, 2, 0, '1', NULL, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(14, 15, 'Dr. Anagha', '', 'anagha@gmail.com', '', 2, 3, 0, '1', NULL, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(15, 16, 'Dr. Narayan', 'Moss', 'narayanmoss@gmail.com', '', 2, 3, 0, '1', NULL, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(16, 17, 'Dr. Ramya', 'R V', 'ramyarv@gmail.com', '', 2, 4, 0, '1', NULL, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(17, 18, 'Dr. Anju', '', 'anju@gmail.com', '', 2, 4, 0, '1', NULL, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(18, 19, 'Dr. Shriram', '', 'shriram@gmail.com', '', 2, 5, 0, '1', NULL, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(19, 20, 'Dr. Asharani', '', 'asharani@gmail.com', '', 2, 5, 0, '1', NULL, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(20, 21, 'Dr. Aishwarya', '', 'aishwarya@gmail.com', '', 2, 5, 0, '1', NULL, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(21, 22, 'Dr.Harish', 'Gopal', 'harishgopal@gmail.com', '', 2, 6, 0, '1', NULL, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(22, 23, 'Dr. Yashbir', '', 'yashbir@gmail.com', '', 2, 6, 0, '1', NULL, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(23, 24, 'Dr. Shubharani', '', 'shubharani@gmail.com', '', 2, 7, 0, '1', NULL, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(24, 25, 'Dr. Mohan', '', 'mohan@gmail.com', '', 2, 7, 0, '1', NULL, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(25, 26, 'Dr. Keerthi', '', 'keerthi@gmail.com', '', 2, 7, 0, '1', NULL, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(26, 27, 'Dr.Yashashvini', '', 'yashashvini@gmail.com', '', 2, 8, 0, '1', NULL, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(27, 28, 'Dr. Ramyashree', '', 'ramyashree@gmail.com', '', 2, 9, 0, '1', NULL, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(28, 29, 'Dr.Bhavya', '', 'bhavya@gmail.com', '', 2, 10, 0, '1', NULL, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(29, 30, 'Dr.Divyashree', '', 'divyashree@gmail.com', '', 3, 3, 0, '1', NULL, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(30, 31, 'Dr. Ranjita', '', 'ranjita@gmail.com', '', 3, 3, 0, '1', NULL, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(31, 32, 'Dr. Swati', 'P S', 'swatisp@gmail.com', '', 3, 4, 0, '1', NULL, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(32, 33, 'Dr. Ritesh', '', 'ritesh@gmail.com', '', 3, 5, 0, '1', NULL, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(33, 34, 'Dr. Prasanna', '', 'prasanna@gmail.com', '', 3, 6, 0, '1', NULL, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(34, 35, 'Dr.Swathi', 'B S', 'swathibs@gmail.com', '', 3, 6, 0, '1', NULL, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(35, 36, 'Dr. Jincy', '', 'jincy@gmail.com', '', 3, 7, 0, '1', NULL, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(36, 37, 'Dr.Titty', '', 'titty@gmail.com', '', 3, 10, 0, '1', NULL, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(37, 38, 'Dr. Pranab', 'Das', 'pranabdas@gmail.com', '', 5, 11, 0, '1', NULL, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(38, 39, 'Dr.Prashant ', '', 'prashant@gmail.com', '', 4, 11, 0, '1', NULL, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(39, 40, 'Dr.Jishnu', '', 'jishnu@gmail.com', '', 4, 11, 0, '1', NULL, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expertises`
--

CREATE TABLE `expertises` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `expertise_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expertise_short_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expertise_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_id` bigint(20) DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `department_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Breakfast', 7, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(2, 'Juices', 7, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(3, 'Lunch', 7, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(4, 'Snacks', 7, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(5, 'Dinner', 7, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `interns`
--

CREATE TABLE `interns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_id` bigint(20) DEFAULT NULL,
  `section_id` bigint(20) DEFAULT NULL,
  `doctor_id` bigint(20) DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `profile_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `interns`
--

INSERT INTO `interns` (`id`, `user_id`, `firstname`, `lastname`, `email`, `mobile_no`, `department_id`, `section_id`, `doctor_id`, `status`, `profile_photo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 41, 'Akarsh', '', 'akarsh@gmail.com', '', 1, 1, 0, '1', NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(2, 42, 'Anushree', '', 'anushree@gmail.com', '', 1, 1, 0, '1', NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(3, 43, 'Apoorva', '', 'apoorva@gmail.com', '', 1, 1, 0, '1', NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(4, 44, 'Lavanya', '', 'lavanya@gmail.com', '', 1, 1, 0, '1', NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(5, 45, 'Barvesh', 'Affiya', 'barveshaffiya@gmail.com', '', 1, 2, 0, '1', NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(6, 46, 'Basaw', 'Jyoti', 'basawjyoti@gmail.com', '', 1, 2, 0, '1', NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(7, 47, 'Bhuvanisha', '', 'bhuvanisha@gmail.com', '', 1, 2, 0, '1', NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(8, 48, 'Madhura', '', 'madhura@gmail.com', '', 1, 2, 0, '1', NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(9, 49, 'Anil', '', 'anil@gmail.com', '', 2, 3, 0, '1', NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(10, 50, 'Chandana K', '', 'chandanak@gmail.com', '', 2, 3, 0, '1', NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(11, 51, 'Chandana A', '', 'chandanaa@gmail.com', '', 2, 3, 0, '1', NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(12, 52, 'Gomathi', '', 'gomathi@gmail.com', '', 2, 3, 0, '1', NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(13, 53, 'Suhapriya', '', 'suhapriya@gmail.com', '', 2, 4, 0, '1', NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(14, 54, 'Abhinaya', '', 'abhinaya@gmail.com', '', 2, 4, 0, '1', NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(15, 55, 'Sibana', '', 'sibana@gmail.com', '', 2, 4, 0, '1', NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(16, 56, 'Vishal', '', 'vishal@gmail.com', '', 2, 4, 0, '1', NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(17, 57, 'Manasi', '', 'manasi@gmail.com', '', 3, 5, 0, '1', NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(18, 58, 'Neha', '', 'neha@gmail.com', '', 3, 5, 0, '1', NULL, '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(19, 59, 'Geethanjali', '', 'geethanjali@gmail.com', '', 3, 5, 0, '1', NULL, '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(20, 60, 'Manik', '', 'manik@gmail.com', '', 3, 5, 0, '1', NULL, '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(21, 61, 'Niharika', '', 'niharika@gmail.com', '', 3, 6, 0, '1', NULL, '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(22, 62, 'Nirupama', '', 'nirupama@gmail.com', '', 3, 6, 0, '1', NULL, '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(23, 63, 'Rushika', '', 'rushika@gmail.com', '', 3, 6, 0, '1', NULL, '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(24, 64, 'Sahana', '', 'sahana@gmail.com', '', 3, 6, 0, '1', NULL, '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(25, 65, 'Nivedhitha', '', 'nivedhitha@gmail.com', '', 4, 7, 0, '1', NULL, '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(26, 66, 'Payal', '', 'payal@gmail.com', '', 4, 7, 0, '1', NULL, '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(27, 67, 'Yamini', '', 'yamini@gmail.com', '', 4, 7, 0, '1', NULL, '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(28, 68, 'Suprita', '', 'suprita@gmail.com', '', 4, 7, 0, '1', NULL, '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(29, 69, 'Prarthana', '', 'prarthana@gmail.com', '', 4, 8, 0, '1', NULL, '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(30, 70, 'Rabia', '', 'rabia@gmail.com', '', 4, 8, 0, '1', NULL, '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(31, 71, 'Nidhila', '', 'nidhila@gmail.com', '', 4, 8, 0, '1', NULL, '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(32, 72, 'Vivek', 'Chand', 'vivekchand@gmail.com', '', 4, 8, 0, '1', NULL, '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(33, 73, 'Drishti', '', 'drishti@gmail.com', '', 5, 9, 0, '1', NULL, '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(34, 74, 'Shubra', '', 'shubra@gmail.com', '', 5, 9, 0, '1', NULL, '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(35, 75, 'Ananth', '', 'ananth@gmail.com', '', 5, 9, 0, '1', NULL, '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(36, 76, 'Aishwarya', 'B R', 'aishwaryabr@gmail.com', '', 5, 9, 0, '1', NULL, '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(37, 77, 'Shushmitha', '', 'shushmitha@gmail.com', '', 5, 10, 0, '1', NULL, '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(38, 78, 'Varshini', '', 'varshini@gmail.com', '', 5, 10, 0, '1', NULL, '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(39, 79, 'Vinay', '', 'vinay@gmail.com', '', 5, 10, 0, '1', NULL, '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(40, 80, 'Raveena', '', 'raveena@gmail.com', '', 5, 10, 0, '1', NULL, '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(41, 81, 'Yamuna', '', 'yamuna@gmail.com', '', 1, 11, 0, '1', NULL, '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(42, 82, 'Mamatha', '', 'mamatha@gmail.com', '', 1, 11, 0, '1', NULL, '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(43, 83, 'Dharmaraj', '', 'dharmaraj@gmail.com', '', 1, 11, 0, '1', NULL, '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(44, 84, 'Rajeswari', '', 'rajeswari@gmail.com', '', 1, 11, 0, '1', NULL, '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shortname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language_flag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `shortname`, `language_flag`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Kannada', 'kn', '1', 'Pararthana Hall (Section-D)', '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(2, 'Hindi', 'hi', '2', 'Sadapruma Hall (Section-B)', '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(3, 'English', 'eng', '3', 'Sampurna Hall (Section-E)', '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(93, '2014_10_12_000000_create_users_table', 1),
(94, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(95, '2014_10_12_100000_create_password_resets_table', 1),
(96, '2019_08_19_000000_create_failed_jobs_table', 1),
(97, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(98, '2023_04_01_101051_create_users_roles_table', 1),
(99, '2023_04_21_111344_create_roles_table', 1),
(100, '2023_04_21_111846_create_permissions_table', 1),
(101, '2023_04_25_072232_create_users_permissions_table', 1),
(102, '2023_04_25_073336_create_accommodations_table', 1),
(103, '2023_04_25_092354_create_discharges_table', 1),
(104, '2023_04_25_093316_create_app_notifications_table', 1),
(105, '2023_04_25_094426_create_languages_table', 1),
(106, '2023_04_25_095158_create_expertises_table', 1),
(107, '2023_04_25_095837_create_more_settings_table', 1),
(108, '2023_04_25_100942_create_more_setting_locales_table', 1),
(109, '2023_04_25_101541_create_states_table', 1),
(110, '2023_04_25_101947_create_sliders_table', 1),
(111, '2023_04_26_063932_create_user_otps_table', 1),
(112, '2023_04_29_060050_create_notifications_table', 1),
(113, '2023_04_29_072212_create_jobs_table', 1),
(114, '2023_05_08_053712_create_payments_table', 1),
(115, '2023_05_13_073528_create_app_icones_table', 1),
(116, '2023_05_23_065427_create_case_details_table', 1),
(117, '2023_05_29_045913_create_user_treatment_pdfuploads_table', 1),
(118, '2023_05_30_045721_create_app_notification_titles_table', 1),
(119, '2023_06_02_054013_create_doctors_table', 1),
(120, '2023_06_02_054254_create_interns_table', 1),
(121, '2023_06_02_054659_create_therapists_table', 1),
(122, '2023_06_02_054941_create_user_social_accounts_table', 1),
(123, '2023_06_02_055705_create_departments_table', 1),
(124, '2023_06_02_060039_create_sections_table', 1),
(125, '2023_06_02_060419_create_therapies_table', 1),
(126, '2023_06_02_061632_create_groups_table', 1),
(127, '2023_06_02_062643_create_user_device_tokens_table', 1),
(128, '2023_06_02_064010_create_venues_table', 1),
(129, '2023_06_02_065149_create_user_visits_table', 1),
(130, '2023_06_02_070643_create_user_dailycharts_table', 1),
(131, '2023_06_02_071731_create_user_daily_reports_table', 1),
(132, '2023_06_02_123941_create_patient_profiles_table', 1),
(133, '2023_06_15_132612_add_department_to_payments_table', 1),
(134, '2023_06_15_142138_add_is_default_to_user_dailycharts_table', 1),
(135, '2023_06_20_172825_create_app_setting_pages_table', 1),
(136, '2023_06_23_103327_create_paymen_modes_table', 1),
(137, '2023_07_19_133132_add_height_to_user_daily_reports_table', 1),
(138, '2023_08_04_113836_create_countries_table', 1),
(139, '2023_08_10_130105_create_patient_default_daily_charts_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `more_settings`
--

CREATE TABLE `more_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `setting_id` bigint(20) DEFAULT NULL,
  `setting_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setting_type` tinyint(4) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT NULL,
  `is_locked` tinyint(4) DEFAULT NULL,
  `setting_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setting_locked_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` tinyint(4) DEFAULT NULL,
  `text_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creation_datetime` datetime DEFAULT NULL,
  `setting_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `more_tag_id` tinyint(4) DEFAULT NULL,
  `parent_setting_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `more_setting_locales`
--

CREATE TABLE `more_setting_locales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `more_settings_locale_id` tinyint(4) DEFAULT NULL,
  `setting_id` bigint(20) DEFAULT NULL,
  `language_id` bigint(20) DEFAULT NULL,
  `setting_name_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_default_daily_charts`
--

CREATE TABLE `patient_default_daily_charts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `therapy_name` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_id` bigint(20) DEFAULT NULL,
  `group_id` bigint(20) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `therapist_id` bigint(20) NOT NULL DEFAULT 0,
  `section_id` bigint(20) NOT NULL DEFAULT 0,
  `is_default` bigint(20) NOT NULL DEFAULT 0,
  `is_language` bigint(20) NOT NULL DEFAULT 0,
  `default_venue` bigint(20) NOT NULL DEFAULT 0,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` bigint(20) DEFAULT NULL,
  `app_type` int(11) NOT NULL DEFAULT 0,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_default_daily_charts`
--

INSERT INTO `patient_default_daily_charts` (`id`, `therapy_name`, `department_id`, `group_id`, `start_time`, `end_time`, `therapist_id`, `section_id`, `is_default`, `is_language`, `default_venue`, `description`, `order`, `app_type`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'OM meditation', 1, 0, '05:20:00', '05:50:00', 0, 0, 1, 1, 0, '', 1, 1, '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(2, 'Special Technique', 1, 0, '06:00:00', '06:55:00', 0, 0, 1, 1, 0, '', 2, 2, '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(3, 'Maitri Milan', 1, 0, '07:00:00', '08:00:00', 0, 0, 1, 0, 12, '', 3, 3, '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(4, 'Breakfast', 7, 1, '08:00:00', '08:50:00', 0, 0, 1, 0, 11, '', 4, 4, '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(5, 'Parameters & Consultation', 6, 0, '09:00:00', '10:00:00', 0, 0, 1, 1, 0, '', 5, 5, '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(6, 'Lecture', 1, 0, '10:10:00', '10:50:00', 0, 0, 1, 1, 0, '', 6, 6, '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(7, 'Pranayama', 1, 0, '11:00:00', '11:50:00', 0, 0, 1, 1, 0, '', 7, 7, '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(8, 'Special Technique', 1, 0, '12:00:00', '13:00:00', 0, 0, 1, 1, 0, '', 8, 8, '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(9, 'Lunch', 7, 3, '13:00:00', '14:00:00', 0, 0, 1, 0, 11, '', 9, 9, '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(10, 'Cyclic Meditation', 1, 0, '15:00:00', '15:50:00', 0, 0, 1, 1, 0, '', 10, 10, '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(11, 'Special Technique', 1, 0, '16:00:00', '17:00:00', 0, 0, 1, 1, 0, '', 11, 11, '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(12, 'Kashayam', 7, 4, '17:00:00', '17:10:00', 0, 0, 1, 0, 11, '', 12, 12, '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(13, 'Tuning to nature', 0, 0, '17:15:00', '18:00:00', 0, 0, 1, 0, 13, '', 13, 13, '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(14, 'Bhajan', 1, 0, '18:00:00', '18:25:00', 0, 0, 1, 0, 12, '', 14, 14, '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(15, 'Trataka', 1, 0, '18:30:00', '19:30:00', 0, 0, 1, 1, 0, '', 15, 15, '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(16, 'Normal Dinner', 7, 5, '19:30:00', '20:20:00', 0, 0, 1, 0, 11, '', 16, 16, '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(17, 'Happy Assembly (Wednesday, Friday & Sunday)', 0, 0, '20:30:00', '21:00:00', 0, 0, 1, 0, 8, '', 17, 16, '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `patient_profiles`
--

CREATE TABLE `patient_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whats_no` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_id` bigint(20) DEFAULT NULL,
  `section_id` bigint(20) DEFAULT NULL,
  `language_id` tinyint(4) DEFAULT NULL,
  `accomudation_id` bigint(20) DEFAULT NULL,
  `department_status` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `department_active_date` datetime DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` bigint(20) DEFAULT NULL,
  `gender` bigint(20) DEFAULT NULL,
  `profile_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_profiles`
--

INSERT INTO `patient_profiles` (`id`, `user_id`, `full_name`, `email`, `mobile`, `whats_no`, `department_id`, `section_id`, `language_id`, `accomudation_id`, `department_status`, `department_active_date`, `address`, `address2`, `city`, `state`, `pincode`, `country_id`, `age`, `gender`, `profile_photo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 85, 'Ankit', 'ankitkumar@gmail.com', '8845345678', '8845345678', 2, 2, 2, 2, '0', NULL, 'Mohali', 'phase 5 mohali #1999', 'mohali', 'Punjab', '160059', '101', 23, 1, NULL, '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(2, 86, 'Ramesh', 'ramesh@gmail.com', '8845345665', '8845345665', 3, 3, 3, 3, '0', NULL, 'Mohali punjab', 'phase 5 mohali #1999', 'mohali', 'Punjab', '160034', '101', 32, 1, NULL, '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(3, 87, 'Suraj', 'suraj@gmail.com', '8845345619', '8845345619', 4, 4, 1, 2, '2', NULL, 'Mohali', 'phase 5 mohali #1999', 'mohali', 'Punjab', '160010', '101', 25, 1, NULL, '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(4, 88, 'Umesh', 'umesh@gmail.com', '8845345622', '8845345622', 1, 2, 2, 2, '1', '2023-09-01 12:02:30', 'Mohali', 'phase 5 mohali #1999', 'mohali', 'Punjab', '160059', '101', 23, 1, NULL, '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(5, 89, 'Rohan', 'rohan@gmail.com', '8845345644', '8845345644', 3, 7, 2, 3, '1', '2023-09-01 12:02:30', 'Delhi', 'phase 5 mohali #1999', 'mohali', 'Delhi', '160059', '101', 23, 1, NULL, '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(6, 90, 'Manoj', 'manoj@gmail.com', '8845345630', '8845345630', 5, 6, 1, 2, '1', '2023-09-01 12:02:30', 'Mohali', 'phase 5 mohali #1999', 'mohali', 'Punjab', '160059', '101', 23, 1, NULL, '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(7, 91, 'Dinesh', 'dinesh@gmail.com', '8845345615', '8845345615', 4, 4, 3, 3, '1', '2023-09-01 12:02:30', 'Patna', 'phase 5 mohali #1999', 'mohali', 'Punjab', '854326', '101', 29, 1, NULL, '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(8, 92, 'Rohit', 'rohit@gmail.com', '8845345655', '8845345655', 3, 3, 2, 3, '1', '2023-09-01 12:02:30', 'Lucknow', 'phase 5 mohali #1999', 'mohali', 'Punjab', '160059', '101', 27, 1, NULL, '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(8,2) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recept_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approve_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved_on` timestamp NOT NULL DEFAULT '2023-09-01 06:32:06',
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `department_id` bigint(20) DEFAULT NULL,
  `accommodation_id` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paymen_modes`
--

CREATE TABLE `paymen_modes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paymen_modes`
--

INSERT INTO `paymen_modes` (`id`, `name`, `description`, `icon`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Cash', NULL, NULL, '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(2, 'Debit cards', NULL, NULL, '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(3, 'Credit cards', NULL, NULL, '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(4, 'Mobile payments', NULL, NULL, '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(5, 'UPI', NULL, NULL, '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `permission_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT 0,
  `created_by` bigint(20) NOT NULL DEFAULT 0,
  `updated_by` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `permission_name`, `permission_slug`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Add user', 'add-user', 1, 1, '2023-09-01 06:32:29', '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(2, 'Update user', 'update-user', 1, 1, '2023-09-01 06:32:29', '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(3, 'Delete user', 'delete-user', 1, 1, '2023-09-01 06:32:29', '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(4, 'View user', 'view-user', 1, 1, '2023-09-01 06:32:29', '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(5, 'Add chart', 'add-chart', 1, 1, '2023-09-01 06:32:29', '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(6, 'Update chart', 'update-chart', 1, 1, '2023-09-01 06:32:29', '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(7, 'Delete chart', 'delete-chart', 1, 1, '2023-09-01 06:32:29', '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(8, 'View chart', 'view-chart', 1, 1, '2023-09-01 06:32:29', '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 1, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(2, 'Doctor', 1, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(3, 'Intern', 1, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(4, 'Patient', 1, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `description`, `icon`, `status`, `order`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Neurology', 'Neurology', '/images/icone/icon.png', '1', 1, '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(2, 'Oncology', 'Oncology', '/images/icone/icon.png', '1', 1, '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(3, 'Pulmonology', 'Pulmonology', '/images/icone/icon.png', '1', 1, '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(4, 'Cardilogy', 'Cardilogy', '/images/icone/icon.png', '1', 1, '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(5, 'Psychiatry', 'Physiotherapy', '/images/icone/icon.png', '1', 1, '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(6, 'Rheumatology', 'Rheumatology', '/images/icone/icon.png', '1', 1, '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(7, 'Spinal Disorders', 'Spinal Disorders', '/images/icone/icon.png', '1', 1, '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(8, 'Metabolic Disorders', 'Metabolic Disorders', '/images/icone/icon.png', '1', 1, '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(9, 'Gastroenterology', 'Gastroenterology', '/images/icone/icon.png', '1', 1, '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(10, 'Endocrinology', 'Endocrinology', '/images/icone/icon.png', '1', 1, '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(11, 'Promotion Of Positive Health', 'Physiotherapy', '/images/icone/icon.png', '1', 1, '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_type` int(11) NOT NULL DEFAULT 0,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slider_type`, `title`, `description`, `images`, `other`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Free medical camp', 'Free medical camps are events where healthcare professionals and volunteers offer medical services, consultations, and treatment to people who cannot afford to pay for medical care', 'admin/assets/img/slider/medical_camp.png', 'Neurology', 1, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(2, 1, 'Get Set to Get Fit', 'summer holidays around corner! Much awaited break for the children. Would you consider a unique summer camp for your teenage children aged between 10 to 15 years ?', 'admin/assets/img/slider/get_set.png', 'Free saminar in campus', 1, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(3, 1, 'World wide health seminar', 'There are many health seminars that take place worldwide, covering a wide range of topics related to health and wellness', 'admin/assets/img/slider/world_wide.png', 'World Seminar Health', 1, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(4, 1, 'Yoga compitation in the campus', 'Yoga is primarily a practice for personal growth and development, and while there may be yoga competitions or events that focus on performance, the traditional principles of yoga do not encourage competition', 'admin/assets/img/slider/yoga.png', 'Yoga', 1, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `state_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `state_name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ANDHRA PRADESH', 1, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(2, 'ASSAM', 1, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(3, 'ARUNACHAL PRADESH', 1, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(4, 'BIHAR', 1, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(5, 'GUJRAT', 1, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(6, 'HARYANA', 1, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(7, 'HIMACHAL PRADESH', 1, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(8, 'JAMMU & KASHMIR', 1, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(9, 'KARNATAKA', 1, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(10, 'KERALA', 1, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(11, 'MADHYA PRADESH', 1, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(12, 'MAHARASHTRA', 1, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(13, 'MANIPUR', 1, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(14, 'MEGHALAYA', 1, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(15, 'MIZORAM', 1, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(16, 'NAGALAND', 1, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(17, 'ORISSA', 1, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(18, 'PUNJAB', 1, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(19, 'RAJASTHAN', 1, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(20, 'SIKKIM', 1, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(21, 'TAMIL NADU', 1, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(22, 'TRIPURA', 1, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(23, 'UTTAR PRADESH', 1, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(24, 'WEST BENGAL', 1, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(25, 'DELHI', 1, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(26, 'GOA', 1, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(27, 'PONDICHERY', 1, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(28, 'LAKSHDWEEP', 1, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(29, 'DAMAN & DIU', 1, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(30, 'DADRA & NAGAR', 1, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(31, 'CHANDIGARH', 1, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(32, 'ANDAMAN & NICOBAR', 1, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(33, 'UTTARANCHAL', 1, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(34, 'JHARKHAND', 1, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(35, 'CHATTISGARH', 1, '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `therapies`
--

CREATE TABLE `therapies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `therapy_name` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_id` bigint(20) DEFAULT NULL,
  `group_id` bigint(20) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `therapist_id` bigint(20) NOT NULL DEFAULT 0,
  `section_id` bigint(20) NOT NULL DEFAULT 0,
  `is_default` bigint(20) NOT NULL DEFAULT 0,
  `is_language` bigint(20) NOT NULL DEFAULT 0,
  `default_venue` bigint(20) NOT NULL DEFAULT 0,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` bigint(20) DEFAULT NULL,
  `app_type` int(11) NOT NULL DEFAULT 0,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `therapies`
--

INSERT INTO `therapies` (`id`, `therapy_name`, `department_id`, `group_id`, `start_time`, `end_time`, `therapist_id`, `section_id`, `is_default`, `is_language`, `default_venue`, `description`, `order`, `app_type`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Cold Underwater Massage', 3, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 1, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(2, 'Neutral Underwater Massage', 3, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 2, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(3, 'Cold Hip Bath', 3, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 3, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(4, 'Cold Hip Bath', 3, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 4, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(5, 'Hot Hip Bath', 3, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 5, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(6, 'Neutral Hip Bath', 3, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 6, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(7, 'Cold Spinal Bath', 3, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 7, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(8, 'Hot Spinal Bath', 3, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 8, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(9, 'Warm Spinal Bath', 3, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 9, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(10, 'Cold Spinal Spray', 3, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 10, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(11, 'Hot Spinal Spray', 3, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 11, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(12, 'Warm Spinal Spray', 3, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 12, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(13, 'Cold Foot Bath', 3, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 13, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(14, 'Hot Foot Bath', 3, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 14, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(15, 'Warm Foot Bath', 3, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 15, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(16, 'Cold Foot And Arm Bath', 3, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 16, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(17, 'Hot Foot And Arm Bath', 3, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 17, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(18, 'Warm Foot And Arm Bath', 3, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 18, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(19, 'Cold Circular Jet', 3, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 19, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(20, 'Douches', 3, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 20, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(21, 'Cold Immersion Bath', 3, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 21, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(22, 'Neutral Immersion Bath', 3, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 22, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(23, 'Hot Immersion Bath', 3, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 23, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(24, 'Steam Bath', 3, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 24, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(25, 'Sauna Bath', 3, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 25, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(26, 'Atapasnan', 3, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 26, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(27, 'Full Mud Bath', 3, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 27, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(28, 'Local Mud Apllication', 3, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 28, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(29, 'Mud Pack To Eye', 3, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 29, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(30, 'Mud Pack To Abdomen', 3, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 30, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(31, 'Ganji Turmeric Bath', 3, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 31, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(32, 'Local Application of Ganji Turmeric', 3, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 32, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(33, 'Mustard Pack', 3, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 33, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(34, 'Gastro Hepatic Pack', 3, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 34, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(35, 'Full Body Massage', 3, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 35, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(36, 'Leg Pack', 3, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 36, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(37, 'Throat Pack', 3, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 37, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(38, 'Arm Pack', 3, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 38, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(39, 'Salt Glow Massage', 3, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 39, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(40, 'Neutral Enema', 3, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 40, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(41, 'Cold Enema', 3, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 41, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(42, 'Neem Enema', 3, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 42, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(43, 'Oil Enema', 3, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 43, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(44, 'Sitz bath', 3, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 44, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(45, 'Sponge Bath', 3, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 45, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(46, 'Vibro Massage', 3, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 46, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(47, 'Partial Massage', 3, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 47, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(48, 'Hot Sand Fomentation', 3, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 48, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(49, 'Facial Steam', 3, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 49, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(50, 'Ice Massage', 3, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 50, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(51, 'Affusion', 3, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 51, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(52, 'Local Compresses', 3, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 52, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(53, 'Local Steam', 3, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 53, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(54, 'Colon Hydrotherapy', 3, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 54, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(55, 'Kidney Pack', 3, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 55, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(56, 'Oil application to whole body', 3, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 56, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(57, 'Ginger turmeric application', 3, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 57, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(58, 'Local oil application', 3, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 58, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(59, 'Infrared Radiation', 3, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 59, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(60, 'Vamana', 2, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 60, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(61, 'Virechana', 2, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 61, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(62, 'Yoga basti', 2, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 62, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(63, 'Kala basti', 2, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 63, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(64, 'Karma basti', 2, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 64, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(65, 'Matrabasti', 2, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 65, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(66, 'Nasya', 2, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 66, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(67, 'Sarvangaabhyanga', 2, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 67, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(68, 'Ekangaabhyanga', 2, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 68, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(69, 'Patrapindasweda', 2, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 69, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(70, 'Shashtikashaalipindasweda', 2, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 70, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(71, 'Churnapindasweda', 2, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 71, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(72, 'Valukasweda', 2, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 72, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(73, 'Udwartana', 2, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 73, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(74, 'Nadisweda', 2, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 74, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(75, 'Avagahasweda', 2, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 75, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(76, 'Ishtikaswedana', 2, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 76, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(77, 'Pattasweda', 2, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 77, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(78, 'Shirodhara', 2, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 78, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(79, 'Takradhara', 2, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 79, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(80, 'Sarvangadhara', 2, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 80, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(81, 'Ekangadhara', 2, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 81, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(82, 'Seka', 2, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 82, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(83, 'Lepa', 2, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 83, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(84, 'Pichu', 2, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 84, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(85, 'Talam', 2, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 85, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(86, 'Kati basti', 2, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 86, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(87, 'Janu basti', 2, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 87, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(88, 'Greevabasti', 2, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 88, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(89, 'Kasherukabasti', 2, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 89, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(90, 'Prushtabasti', 2, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 90, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(91, 'Nabhimandalabasti', 2, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 91, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(92, 'Shirobasti', 2, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 92, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(93, 'Netra tarpana', 2, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 93, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(94, 'Netra Seka', 2, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 94, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(95, 'Bidalaka', 2, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 95, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(96, 'Neurology Yoga Special Technique', 1, 0, '06:00:00', '06:50:00', 0, 1, 0, 1, 0, '', 96, 2, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(97, 'Oncology Yoga Special Technique', 1, 0, '06:00:00', '06:50:00', 0, 2, 0, 1, 0, '', 97, 2, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(98, 'Pulmonology Yoga Special Technique', 1, 0, '06:00:00', '06:50:00', 0, 3, 0, 1, 0, '', 98, 2, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(99, 'Cardiology Yoga Special Technique', 1, 0, '06:00:00', '06:50:00', 0, 4, 0, 1, 0, '', 99, 2, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(100, 'Psychiatry Yoga Special Technique', 1, 0, '06:00:00', '06:50:00', 0, 5, 0, 1, 0, '', 100, 2, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(101, 'Rheumatology Yoga Special Technique', 1, 0, '06:00:00', '06:50:00', 0, 6, 0, 1, 0, '', 101, 2, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(102, 'Spinal Disorders Yoga Special Technique', 1, 0, '06:00:00', '06:50:00', 0, 7, 0, 1, 0, '', 102, 2, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(103, 'Metabolic disorders Yoga Special Technique', 1, 0, '06:00:00', '06:50:00', 0, 8, 0, 1, 0, '', 103, 2, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(104, 'Gasroenerelogy Yoga Special Technique', 1, 0, '06:00:00', '06:50:00', 0, 9, 0, 1, 0, '', 104, 2, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(105, 'Menstrual disorder Yoga Special Technique', 1, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 105, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(106, 'Pregancy Yoga Special Technique', 1, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 106, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(107, 'Endocrinology Yoga Special Technique', 1, 0, '06:00:00', '06:50:00', 0, 10, 0, 1, 0, '', 107, 2, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(108, 'Promotion of positive health Yoga Special Technique', 1, 0, '06:00:00', '06:50:00', 0, 11, 0, 0, 0, '', 108, 2, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(109, 'OM meditation', 1, 0, '05:20:00', '05:50:00', 0, 0, 1, 1, 0, '', 109, 1, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(110, 'Maitri Milan', 1, 0, '07:00:00', '08:00:00', 0, 0, 1, 0, 12, '', 110, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(111, 'IAYT Lecture', 1, 0, '10:10:00', '10:50:00', 0, 0, 1, 1, 0, '', 111, 1, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(112, 'Pranayama', 1, 0, '11:00:00', '11:50:00', 0, 0, 1, 1, 0, '', 112, 1, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(113, 'Pranic energiazation Technique', 1, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 113, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(114, 'Cyclic Meditation', 1, 0, '15:00:00', '15:50:00', 0, 0, 1, 1, 0, '', 114, 1, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(115, 'Bhajan', 1, 0, '18:00:00', '18:25:00', 0, 0, 1, 0, 12, '', 115, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(116, 'Mind Sound Resonence Technique', 1, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 116, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(117, 'Trataka', 1, 0, '18:30:00', '19:30:00', 0, 0, 1, 1, 0, '', 117, 1, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(118, 'Sleep Special Technique', 1, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 118, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(119, 'Chair Breathing Practice', 1, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 119, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(120, 'Headache special technique', 1, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 120, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(121, 'Voice culture', 1, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 121, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(122, 'Jala Neti', 1, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 122, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(123, 'Sutra Neti', 1, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 123, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(124, 'Vaman Dhouti', 1, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 124, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(125, 'Laghu shank Prakshalana', 1, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 125, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(126, 'Acupuncture', 5, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 126, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(127, 'Electro Acupuncture', 5, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 127, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(128, 'Acupressure', 5, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 128, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(129, 'Cupping', 5, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 129, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(130, 'Cupping Massage', 5, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 130, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(131, 'Auriculotherapy', 5, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 131, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(132, 'Moxibustion', 5, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 132, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(133, 'Muscle Stimulator', 4, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 133, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(134, 'Traction', 4, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 134, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(135, 'Tread mill', 4, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 135, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(136, 'Squeezing ball', 4, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 136, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(137, 'SWD', 4, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 137, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(138, 'PEG board', 4, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 138, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(139, 'Marine Wheel', 4, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 139, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(140, 'T Pulley', 4, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 140, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(141, 'Ankle pressure', 4, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 141, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(142, 'Physio Ball', 4, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 142, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(143, 'Gait training', 4, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 143, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(144, 'Quadriceps chair', 4, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 144, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(145, 'Cycle', 4, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 145, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(146, 'Dumble', 4, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 146, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(147, 'T band', 4, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 147, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(148, 'Finger gripping excercise', 4, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 4, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(149, 'Tilt table', 4, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 148, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(150, 'Wax Therapy', 4, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 149, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(151, 'Shortwave Diathermy SWD', 4, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 150, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(152, 'Moist Heat', 4, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 151, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(153, 'Ultra Sound therapy UST', 4, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 152, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(154, 'Interferential Therapy IFT', 4, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 153, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(155, 'TENS', 4, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 154, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(156, 'Cryotherapy', 4, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 155, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(157, 'Electrical Stimulation', 4, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 156, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(158, 'Intermittent Cervical Traction', 4, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 157, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(159, 'Intermittent Lumbar Traction', 4, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 158, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(160, 'Continuos Passive motion Device', 4, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 159, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(161, 'Breathing exercises', 4, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 160, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(162, 'Chest percussions', 4, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 161, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(163, 'Passive exercises Stretching', 4, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 162, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(164, 'Active exercises Stretching', 4, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 163, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(165, 'Manual joint Mobilization', 4, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 164, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(166, 'Shoulder Rehabilitation', 4, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 165, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(167, 'Hand Rehabilitation', 4, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 166, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(168, 'Walking aids Rehabilitation', 4, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 167, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(169, 'Balance', 4, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 168, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(170, 'Neuro Developmental Therapy NDT', 4, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 169, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(171, 'Posture and ergonomics', 4, 0, NULL, NULL, 0, 0, 0, 0, 0, '', 170, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(172, 'Parameters & Consultation', 6, 0, '09:00:00', '10:00:00', 0, 0, 1, 1, 0, '', 171, 1, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(173, 'Tuning to nature', 0, 0, '17:15:00', '18:00:00', 0, 0, 1, 0, 13, '', 171, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(174, 'Happy Assembly (Wednesday, Friday & Sunday)', 0, 0, '20:30:00', '21:00:00', 0, 0, 1, 0, 8, '', 172, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(175, 'Neurology Yoga Special Technique', 1, 0, '12:00:00', '13:00:00', 0, 1, 0, 1, 0, '', 173, 2, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(176, 'Oncology Yoga Special Technique', 1, 0, '12:00:00', '13:00:00', 0, 2, 0, 1, 0, '', 174, 2, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(177, 'Pulmonology Yoga Special Technique', 1, 0, '12:00:00', '13:00:00', 0, 3, 0, 1, 0, '', 175, 2, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(178, 'Cardiology Yoga Special Technique', 1, 0, '12:00:00', '13:00:00', 0, 4, 0, 1, 0, '', 176, 2, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(179, 'Psychiatry Yoga Special Technique', 1, 0, '12:00:00', '13:00:00', 0, 5, 0, 1, 0, '', 177, 2, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(180, 'Rheumatology Yoga Special Technique', 1, 0, '12:00:00', '13:00:00', 0, 6, 0, 1, 0, '', 178, 2, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(181, 'Spinal Disorders Yoga Special Technique', 1, 0, '12:00:00', '13:00:00', 0, 7, 0, 1, 0, '', 179, 2, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(182, 'Metabolic disorders Yoga Special Technique', 1, 0, '12:00:00', '13:00:00', 0, 8, 0, 1, 0, '', 180, 2, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(183, 'Gasroenerelogy Yoga Special Technique', 1, 0, '12:00:00', '13:00:00', 0, 9, 0, 1, 0, '', 181, 2, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(184, 'Endocrinology Yoga Special Technique', 1, 0, '12:00:00', '13:00:00', 0, 10, 0, 1, 0, '', 182, 2, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(185, 'Promotion of positive health Yoga Special Technique', 1, 0, '12:00:00', '13:00:00', 0, 11, 0, 1, 0, '', 183, 2, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(186, 'Neurology Yoga Special Technique', 1, 0, '16:00:00', '17:00:00', 0, 1, 0, 1, 0, '', 184, 2, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(187, 'Oncology Yoga Special Technique', 1, 0, '16:00:00', '17:00:00', 0, 2, 0, 1, 0, '', 185, 2, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(188, 'Pulmonology Yoga Special Technique', 1, 0, '16:00:00', '17:00:00', 0, 3, 0, 1, 0, '', 186, 2, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(189, 'Cardiology Yoga Special Technique', 1, 0, '16:00:00', '17:00:00', 0, 4, 0, 1, 0, '', 187, 2, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(190, 'Psychiatry Yoga Special Technique', 1, 0, '16:00:00', '17:00:00', 0, 5, 0, 1, 0, '', 188, 2, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(191, 'Rheumatology Yoga Special Technique', 1, 0, '16:00:00', '17:00:00', 0, 6, 0, 1, 0, '', 189, 2, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(192, 'Spinal Disorders Yoga Special Technique', 1, 0, '16:00:00', '17:00:00', 0, 7, 0, 1, 0, '', 190, 2, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(193, 'Metabolic disorders Yoga Special Technique', 1, 0, '16:00:00', '17:00:00', 0, 8, 0, 1, 0, '', 191, 2, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(194, 'Gasroenerelogy Yoga Special Technique', 1, 0, '16:00:00', '17:00:00', 0, 9, 0, 1, 0, '', 192, 2, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(195, 'Endocrinology Yoga Special Technique', 1, 0, '16:00:00', '17:00:00', 0, 10, 0, 1, 0, '', 193, 2, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(196, 'Promotion of positive health Yoga Special Technique', 1, 0, '16:00:00', '17:00:00', 0, 11, 0, 1, 0, '', 194, 2, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(197, 'Normal Diet', 7, 1, NULL, NULL, 0, 0, 0, 0, 11, '', 195, 3, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(198, 'Kichidi', 7, 1, NULL, NULL, 0, 0, 0, 0, 11, '', 196, 3, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(199, 'Fruits', 7, 1, NULL, NULL, 0, 0, 0, 0, 11, '', 197, 3, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(200, 'Boiled Vegetable', 7, 1, NULL, NULL, 0, 0, 0, 0, 11, '', 198, 3, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(201, 'Rava/ Rice ganji', 7, 1, NULL, NULL, 0, 0, 0, 0, 11, '', 199, 3, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(202, 'Others', 7, 1, NULL, NULL, 0, 0, 0, 0, 11, '', 200, 3, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(203, 'Ash Gourd', 7, 2, NULL, NULL, 0, 0, 0, 0, 11, '', 201, 3, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(204, 'Juice', 7, 2, NULL, NULL, 0, 0, 0, 0, 11, '', 202, 3, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(205, 'Sprouts Juice', 7, 2, NULL, NULL, 0, 0, 0, 0, 11, '', 203, 3, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(206, 'Barley Water', 7, 2, NULL, NULL, 0, 0, 0, 0, 11, '', 204, 3, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(207, 'Carrot Juice', 7, 2, NULL, NULL, 0, 0, 0, 0, 11, '', 205, 3, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(208, 'Bitter gourd', 7, 2, NULL, NULL, 0, 0, 0, 0, 11, '', 206, 3, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(209, 'Juice', 7, 2, NULL, NULL, 0, 0, 0, 0, 11, '', 207, 3, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(210, 'Lemon Honey', 7, 2, NULL, NULL, 0, 0, 0, 0, 11, '', 208, 3, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(211, 'Juice', 7, 2, NULL, NULL, 0, 0, 0, 0, 11, '', 209, 3, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(212, 'Cucumber', 7, 2, NULL, NULL, 0, 0, 0, 0, 11, '', 210, 3, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(213, 'Juice', 7, 2, NULL, NULL, 0, 0, 0, 0, 11, '', 211, 3, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(214, 'Beetroot Juice', 7, 2, NULL, NULL, 0, 0, 0, 0, 11, '', 212, 3, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(215, 'Watermelon', 7, 2, NULL, NULL, 0, 0, 0, 0, 11, '', 213, 3, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(216, 'Papaya', 7, 2, NULL, NULL, 0, 0, 0, 0, 11, '', 214, 3, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(217, 'Plantain Pith', 7, 2, NULL, NULL, 0, 0, 0, 0, 11, '', 215, 3, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(218, 'Juice', 7, 2, NULL, NULL, 0, 0, 0, 0, 11, '', 216, 3, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(219, 'Boiled Apple', 7, 2, NULL, NULL, 0, 0, 0, 0, 11, '', 217, 3, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(220, 'Others', 7, 2, NULL, NULL, 0, 0, 0, 0, 11, '', 218, 3, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(221, 'Boiled Diet +Boiled Vegetable+Butter milk +Fruits', 7, 3, NULL, NULL, 0, 0, 0, 0, 11, '', 219, 3, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(222, 'Raw Diet + Butter Milk', 7, 3, NULL, NULL, 0, 0, 0, 0, 11, '', 220, 3, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(223, 'Rava or Raice ganji', 7, 3, NULL, NULL, 0, 0, 0, 0, 11, '', 221, 3, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(224, 'Kichidi', 7, 3, NULL, NULL, 0, 0, 0, 0, 11, '', 222, 3, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(225, 'Others', 7, 3, NULL, NULL, 0, 0, 0, 0, 11, '', 223, 3, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(226, ' Barley water', 7, 4, NULL, NULL, 0, 0, 0, 0, 11, '', 224, 3, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(227, 'Veg Soup', 7, 4, NULL, NULL, 0, 0, 0, 0, 11, '', 225, 3, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(228, 'Kashayam', 7, 4, '17:00:00', '17:10:00', 0, 0, 1, 0, 11, '', 226, 3, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(229, 'Boiled Diet+Boiled Vegetable+Butter Milk+Fruits', 7, 5, NULL, NULL, 0, 0, 0, 0, 11, '', 227, 3, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(230, ' Raw Diet + Butter Milk', 7, 5, NULL, NULL, 0, 0, 0, 0, 11, '', 228, 3, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(231, ' Rava/ Rice ganji', 7, 5, NULL, NULL, 0, 0, 0, 0, 11, '', 229, 3, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(232, 'Kichidi', 7, 5, NULL, NULL, 0, 0, 0, 0, 11, '', 230, 3, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(233, 'Others', 7, 5, NULL, NULL, 0, 0, 0, 0, 11, '', 231, 3, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(234, 'Normal Breakfast', 7, 1, '08:00:00', '08:50:00', 0, 0, 1, 0, 11, '', 232, 3, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(235, 'Normal Lunch', 7, 3, '13:00:00', '14:00:00', 0, 0, 1, 0, 11, '', 233, 3, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(236, 'Normal Dinner', 7, 5, '19:30:00', '20:20:00', 0, 0, 1, 0, 11, '', 234, 3, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `therapists`
--

CREATE TABLE `therapists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_id` bigint(20) DEFAULT NULL,
  `section_id` bigint(20) DEFAULT NULL,
  `is_counseler` bigint(20) NOT NULL DEFAULT 0,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `therapists`
--

INSERT INTO `therapists` (`id`, `firstname`, `lastname`, `email`, `mobile_no`, `department_id`, `section_id`, `is_counseler`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Param', '', '', '', 0, 1, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(2, 'Bikas Purohit', '', '', '', 0, 2, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(3, 'Sidhanagaraj', '', '', '', 0, 3, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(4, 'Soudhamini', '', '', '', 0, 3, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(5, 'Shankar', '', '', '', 0, 4, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(6, 'Jalandhar', '', '', '', 0, 5, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(7, 'Tankeshwar', '', '', '', 0, 6, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(8, 'Surajit', '', '', '', 0, 7, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(9, 'Devendra', '', '', '', 0, 8, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(10, 'Sonu Mourya', '', '', '', 0, 9, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(11, 'Dipen', '', '', '', 4, 9, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(12, 'Ranjit', '', '', '', 4, 9, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(13, 'Aditya', '', '', '', 4, 9, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(14, 'Rita', '', '', '', 4, 9, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(15, 'Pinky', '', '', '', 4, 9, 0, '1', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` bigint(20) NOT NULL DEFAULT 0,
  `social_account_enabled` bigint(20) DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `profile_complete` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile_no`, `password`, `role`, `social_account_enabled`, `status`, `is_active`, `profile_complete`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Dr Umasankar', 'admin@gmail.com', NULL, '$2y$10$R1KGpZDt6poQ0oqorAG3/u2ige9db7gDnmveRe6PYCw47T8IERgb.', 1, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(2, 'Dr. Sharad', 'sharad@gmail.com', NULL, '$2y$10$43tqe.omgrzIV8ZZK91IFedy1HCplhxn75GKYSRAC27CryC0pzFLG', 2, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(3, 'Dr. Ankita', 'ankita@gmail.com', NULL, '$2y$10$fuqXI5zTaeK1/I0l3.UBRO.dn45BxqF3AJGpgDxbIwsbOCrG8iH1W', 2, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(4, 'Dr.Promila', 'promila@gmail.com', NULL, '$2y$10$AHCO7hpDrdZEInP.vPTAuuwWgqvjHqve4F358JT8BbEjjm158UwOy', 2, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(5, 'Dr. Arundhati', 'arundhati@gmail.com', NULL, '$2y$10$d/HrxZXwNpZcEtrQ98pIc.3EkV8UfzQ2MpLZfR1of5KXkNQI2rJhC', 2, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(6, 'Dr. Padmimi', 'padmimi@gmail.com', NULL, '$2y$10$kMErPCAvNlTPBWpfYtFrBeFrcmajsqpOvtHpOZ2.lhA.qObkdYZXS', 2, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(7, 'Dr.Vidyashree', 'vidyashree@gmail.com', NULL, '$2y$10$LUoF6V.50T.Y4WOVY006xe32DF/x/6t6tDAFRRuM/zdMhkLcc6Nz2', 2, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(8, 'Dr. Shrigowri', 'shrigowri@gmail.com', NULL, '$2y$10$nK3G8JV14ftm5IS/d08.V.tMMHrRoJ0G43vK8.U0OmHW2D8883BZK', 2, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(9, 'Dr.Reshma', 'reshma@gmail.com', NULL, '$2y$10$eiI/6.x6hWUlPCsrwQJ8z.sFKkdLj8XK/HwJeJ1oUuPg4q0e7lbK2', 2, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(10, 'Dr. Nibedita', 'nibedita@gmail.com', NULL, '$2y$10$izbhyHYhJuioGoiAihCC8e4fwDtNh.hQYacvKJnRaTgKsX7PUyHBW', 2, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(11, 'Dr. Champa', 'champa@gmail.com', NULL, '$2y$10$j3HImk6UUtFnWBf0ENPczu8k/yrUG.F.7tlW1wGwRh9ZbdF5a0IWm', 2, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(12, 'Dr. Abhiram', 'abhiram@gmail.com', NULL, '$2y$10$ChBZSRrK6jXhEIoOLcAo0uPyqeU7hGHgjpyiCySPbZ5Iw7rO2046K', 2, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(13, 'Dr. Roopa', 'roopa@gmail.com', NULL, '$2y$10$M/PeVpKBDOXlRiX7VzJBje7GEcCTgPwjAQWrguPu0pImonBgal1yW', 2, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(14, 'Dr. Dhanya', 'dhanya@gmail.com', NULL, '$2y$10$iqBk0VjTD5m56.kZG1yg6u/7xzwUS6Di5j3Yi4tOiTFScIqlywdZO', 2, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(15, 'Dr. Anagha', 'anagha@gmail.com', NULL, '$2y$10$9tMfD.FeX2grBXmWdWinl.g7YUs5H3ikd4/1PgDf01YoOm7cvXUKq', 2, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(16, 'Dr. Narayan Moss', 'narayanmoss@gmail.com', NULL, '$2y$10$VvavoP5cMIps918qzskG4O4LcnK86OqMY6IjeUOIQqGwXEfJ6krgS', 2, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(17, 'Dr. Ramya R V', 'ramyarv@gmail.com', NULL, '$2y$10$TeIAsNd6PmFkJeQx2Pqc1ujLiaYSO8S80qAxyI6v78UqimX1L/9Ni', 2, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(18, 'Dr. Anju', 'anju@gmail.com', NULL, '$2y$10$GTKWmNB00qDs8Ussyf0Fce7PuJ3QoN4dtuNKfYwAnnKdfBx21yOoG', 2, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(19, 'Dr. Shriram', 'shriram@gmail.com', NULL, '$2y$10$tiUt9.miS3rlueKb2yIdle7.4dxnx/fXY864R3bqnF/7PnPRRxoLC', 2, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(20, 'Dr. Asharani', 'asharani@gmail.com', NULL, '$2y$10$tN.XvONBfRR.UZgap6Qd3e1lUqrDeRlJ0oZg63op7c823z7wNdd6S', 2, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(21, 'Dr. Aishwarya', 'aishwarya@gmail.com', NULL, '$2y$10$LyLWLwWcIAxPmabOI9iIFOMpA8LzmvtaOVYw04xJsxnO.U5y0bPPu', 2, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(22, 'Dr. Harish Gopal', 'harishgopal@gmail.com', NULL, '$2y$10$W94JLCM.lU2Xho9lbPIL/e08lFS0ekJEDQkwPCIXOEMDx.RvEXeTa', 2, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(23, 'Dr. Yashbir', 'yashbir@gmail.com', NULL, '$2y$10$VDtlIBwlCg01hRcCRUHCHOemSa11RD1LPxhod5yjYjX3s9HO8lNuO', 2, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(24, 'Dr. Shubharani', 'shubharani@gmail.com', NULL, '$2y$10$AdBxWqdQN8NWmQg5zIXtzeGpD1WXi4iRBq0O7FkqdMXiQYk2cMC3C', 2, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(25, 'Dr. Mohan', 'mohan@gmail.com', NULL, '$2y$10$dlUOXOFSX5rjtfWtUbqj1uIMmIa5JGtYL5zFjIpQr8KpZlXLNDV96', 2, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(26, 'Dr. Keerthi', 'keerthi@gmail.com', NULL, '$2y$10$Ugjo8DCCL.30T/FpkSbH3OrrOyWmhf1aP/O..SDpoeH7vdffK/fiK', 2, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(27, 'Dr. Yashashvini', 'yashashvini@gmail.com', NULL, '$2y$10$L9CAlQs9NgL/eKh1Av7v6u4JBTfkAZVnMr.IqUSZft9ttLC1LlA5y', 2, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(28, 'Dr. Ramyashree', 'ramyashree@gmail.com', NULL, '$2y$10$rxiwKVtxGfQRYBbQ50KZQuSaPd3vTXu8ySRbA99dOlpz3Kai/4PQK', 2, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(29, 'Dr. Bhavya', 'bhavya@gmail.com', NULL, '$2y$10$pEkmiSTuJCGqpGjsROPdUu..MuT0UBEromFZhwUDIgd/v0eUKTwrW', 2, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(30, 'Dr. Divyashree', 'divyashree@gmail.com', NULL, '$2y$10$byhMu99VkU9Ttvpsd1lQUO7Q6CadfXhewq3wD7nw3R8JjJ.nF5CHq', 2, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(31, 'Dr. Ranjita', 'ranjita@gmail.com', NULL, '$2y$10$j5jdl6C0FKFwzgM19vOFA.e8hiIJ0OmmGYyc1mzlod8nwXqmsUyKe', 2, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(32, 'Dr. Swati P S', 'swatisp@gmail.com', NULL, '$2y$10$D/dUkFjz4NbgeMSyzk5m7.qqcm/EPCmCUjP6jaDKTpuqxQa5h5oqa', 2, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(33, 'Dr. Ritesh', 'ritesh@gmail.com', NULL, '$2y$10$XIVSWFsJbxKBHhUT8cV1QubALrEyytTMP62/ebI.D6Qz7xy/etnOm', 2, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(34, 'Dr. Prasanna', 'prasanna@gmail.com', NULL, '$2y$10$.awR4glz3QKD3F7rWR4Ixe0xjoNyMSTb5cxaLV5/FuAn3Np1.VrD2', 2, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(35, 'Dr. Swathi B S', 'swathibs@gmail.com', NULL, '$2y$10$YQsf4i7qzNfePDn.nWGn0uRo4yJbdEDCH3Nvb/iSnsZffaHpu9ydG', 2, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(36, 'Dr. Jincy', 'jincy@gmail.com', NULL, '$2y$10$eG3cXI29c5T2ExrP08.IGugKHzzgPQSaswciQbL3y0bbhvJG6rHU.', 2, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(37, 'Dr. Titty', 'titty@gmail.com', NULL, '$2y$10$E5wNinmdZr4N5knOPwjZT.OYsqj7HXV2ZXb4/iigJLp19Si0i8E.u', 2, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(38, 'Dr. Pranab Das', 'pranabdas@gmail.com', NULL, '$2y$10$BSCnwxSb3Sdemdndif10neKqv/4beOva0ziMF4KZSPKnw4RL6JvuS', 2, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(39, 'Dr. Prashant', 'prashant@gmail.com', NULL, '$2y$10$IhIPLavjPJ2fVPDoupWMAeJs/3CIgrYhsrNBivGAztkiSXoMLL0v2', 2, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(40, 'Dr. Jishnu', 'jishnu@gmail.com', NULL, '$2y$10$MsR5xvFWG.JwMe23CIAhzO35nG.6YK1NQupVqGleKgHle55.X0fKG', 2, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(41, 'Akarsh', 'akarsh@gmail.com', NULL, '$2y$10$ixXRAMtzkK/96qnrZVtN3OI8bDdQwhwHdzYMc5O3Of1bNYExFPkee', 3, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(42, 'Anushree', 'anushree@gmail.com', NULL, '$2y$10$6Q1xALAEmwYz7jIc1R3kL.yoetQfZJIxS8XFP/u3BHgMaKPHi8UfO', 3, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(43, 'Apoorva', 'apoorva@gmail.com', NULL, '$2y$10$eW0D5DhT/2kzOFoRZCUrn.CDiD.5tG22SU9gvEB6xE9MdhQvye2oe', 3, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(44, 'Lavanya', 'lavanya@gmail.com', NULL, '$2y$10$0ObjOpPv2VH9fEZ/ozkAWeJEFf1fTcXzq5AN827kwJS4b3ftC.tmi', 3, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(45, 'Barvesh', 'barveshaffiya@gmail.com', NULL, '$2y$10$Z2orbk8PNc19fuaFPhf8HeCD2Uv.o1z76VAFxmqIZMD7tQ5ST3iHK', 3, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(46, 'Basaw', 'basawjyoti@gmail.com', NULL, '$2y$10$52YFtUppyaFbRioyvJCwLe2Qx8RH6AJ7LfhJNUVumk5H9f2MGq4Zq', 3, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(47, 'Bhuvanisha', 'bhuvanisha@gmail.com', NULL, '$2y$10$bOxLC479Hps4dy6wa0T2N.p/QQfJ34w61dJ4fgxB6b9cn/rjADSNe', 3, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(48, 'Madhura', 'madhura@gmail.com', NULL, '$2y$10$SIFCNCXWO2EpTx4dvbqbdOAJrYNxU/rR82u96AZ5jX6yCma16NRny', 3, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(49, 'Anil', 'anil@gmail.com', NULL, '$2y$10$W37AY..0rqrD3.Le8rvqyOW1eW1DsMsRvu.jMYNG8J7zfXxW4fhsC', 3, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(50, 'Chandana K', 'chandanak@gmail.com', NULL, '$2y$10$G123WEei5mX8WMfkXja2eeE1e4QCJOTM3.eSSZPpbHjARkzL4SlAu', 3, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(51, 'Chandana A', 'chandanaa@gmail.com', NULL, '$2y$10$NYpgGaxWtFwsPPWflc2EA.wR3FF34cloGOcNmccH03VYTOaVHMS6W', 3, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(52, 'Gomathi', 'gomathi@gmail.com', NULL, '$2y$10$iTrQAJPKPUMBQYAep15ehexJN7Z.26bUuWjZgecvrzk8fwvw34bwu', 3, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(53, 'Suhapriya', 'suhapriya@gmail.com', NULL, '$2y$10$K34.54VIT4PB80b/bjV64e2rZsUFGW5MZivHw0aj8flCBfaPXvRMO', 3, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(54, 'Abhinaya', 'abhinaya@gmail.com', NULL, '$2y$10$aQK8RXu/8XqV12Ic9L2JbOFjOiO0Gp86U2GQWBH7r4SObwIehWSdG', 3, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(55, 'Sibana', 'sibana@gmail.com', NULL, '$2y$10$6fFRifC7ns1aN4sQ5/uSreSP7cU0vECaOjIW.GySAFULZSVA.Ia2K', 3, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(56, 'Vishal', 'vishal@gmail.com', NULL, '$2y$10$wnmhHoJ2.xTjfXmeZS1h6ujWbjpihWWSXWparrZKmNDvNZhaUB.e6', 3, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(57, 'Manasi', 'manasi@gmail.com', NULL, '$2y$10$htkMiCYtBDzDFUtzkxI3KeL5Oim7yeKm/csTghJCcQLX4RV13Nd8S', 3, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(58, 'Neha', 'neha@gmail.com', NULL, '$2y$10$CfZOW0i/DcRFf3m2LPwnJ.PqvoUK1iBndRUmQfNM/9ZMbTKS8BRYG', 3, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(59, 'Geethanjali', 'geethanjali@gmail.com', NULL, '$2y$10$ABJlde/r75CGSFHda.c6DeRMmxEZJjmgLLrqzlhRBgbpMXQ01ReDO', 3, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(60, 'Manik', 'manik@gmail.com', NULL, '$2y$10$2SiQJiGdfVULrYyPuCeyz.gzJ5ddkiLkKAz8oN.8a1orQuStchJhu', 3, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(61, 'Niharika', 'niharika@gmail.com', NULL, '$2y$10$RUyQbTbYW./vTkSFg7accecx3fzGeSiiYV0p3wSIH6nrWzKuFn1uu', 3, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(62, 'Nirupama', 'nirupama@gmail.com', NULL, '$2y$10$FH1PmrLnFND2kuowjkZRreBX9/jddtxYCpb.nzatkiTW8o1wD7bD2', 3, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(63, 'Rushika', 'rushika@gmail.com', NULL, '$2y$10$zhUsobciOsEPK5ZjzXbyt.0n9QqsGyEOGpDnR.L1KhQ3QC7Rd3Bea', 3, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(64, 'Sahana', 'sahana@gmail.com', NULL, '$2y$10$/4MAe7zqcSojNnmrcsk9WuyHwQdoe70nu40AoBSTApLUQ/cnpP/jK', 3, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(65, 'Nivedhitha', 'nivedhitha@gmail.com', NULL, '$2y$10$qUNzuv4QwvSj7oKh7gUz/ueSktcgNDm3HmN0CW4X6o1INaBSU7HF2', 3, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(66, 'Payal', 'payal@gmail.com', NULL, '$2y$10$rVLos6/qp.Wm4baZNlIzjuPNB..7oA2pRz6jFjJmseH/mQd0C.HoC', 3, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(67, 'Yamini', 'yamini@gmail.com', NULL, '$2y$10$DOO.ml5nf91vXVnM6.S9yetaTEinyGDBD.o5BCtyLSi1XnAsHEJDS', 3, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(68, 'Suprita', 'suprita@gmail.com', NULL, '$2y$10$7g9K7tHjlOSVq74y6TR4iOxpMev4fygERHeMwC84yh3SBwd0zmbQi', 3, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(69, 'Prarthana', 'prarthana@gmail.com', NULL, '$2y$10$hx.sbI5QnTt5m4kEfeY6aeFB8MHWSMSWFN6d/OCg9dwjNbJS3AHf.', 3, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(70, 'Rabia', 'rabia@gmail.com', NULL, '$2y$10$Be2lzYWFlrASNDhLaprdC.v3.rnsDGk7YIR/NooFSKsYEkmQBLMtO', 3, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(71, 'Nidhila', 'nidhila@gmail.com', NULL, '$2y$10$KHPljVsOjACV2XtswOWcle8W63ba8fCwGIn9fxZiPcnB6JVKxZTSe', 3, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(72, 'Vivek', 'vivekchand@gmail.com', NULL, '$2y$10$SLxA9IaKdzaZEkQE4gAyoOzyG6P7VH9r2TLTb1Z48hpYtggQklxrK', 3, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(73, 'Drishti', 'drishti@gmail.com', NULL, '$2y$10$clH7AS4OLaLU.WYQsSWvQeu9Kw3J/fRuLmbM3F1GJCI/wAZy0PNe2', 3, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(74, 'Shubra', 'shubra@gmail.com', NULL, '$2y$10$cD/Gev1NQPpa3HqbOEJzgOphp821TYpwhIgTyO953XHh7xsZaTo2a', 3, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(75, 'Ananth', 'ananth@gmail.com', NULL, '$2y$10$TFU2GKrjTYYesnFyqcjtHOB2GDn9l/CQqBUrmgSDIgN6m3UWwy2z2', 3, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(76, 'Aishwarya', 'aishwaryabr@gmail.com', NULL, '$2y$10$SdY.IV5VDdrA6UVrdHdxy.Ds389l6lReriBQJcmm/yeK9TWP94792', 3, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(77, 'Shushmitha', 'shushmitha@gmail.com', NULL, '$2y$10$SmL17XU7ek.DpKqcmgxElu.1AB/HzqKm8acMl9WML9rw.sTwAZx46', 3, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(78, 'Varshini', 'varshini@gmail.com', NULL, '$2y$10$IRQcZxTXZgOJ6PDqh1ca6OdmCduJdcfTvsXePKfeXnS9Kev7XVMz.', 3, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(79, 'Vinay', 'vinay@gmail.com', NULL, '$2y$10$85WkzB641cI.IiuaP0ez/OAASsko5BBw/ynGhCUsz25CBGkshGuvS', 3, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(80, 'Raveena', 'raveena@gmail.com', NULL, '$2y$10$OCGJ17cTI1cs/bJgDRYtw.xgqV5QuGkMhRPDPT6tcVvQslZai/GRK', 3, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(81, 'Yamuna', 'yamuna@gmail.com', NULL, '$2y$10$dxLHhQIFvuLaC3TbJJbVAOIwdP.H4SASW.58REnuYOywS0BD635/O', 3, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(82, 'Mamatha', 'mamatha@gmail.com', NULL, '$2y$10$ZrSomM.JVBy02RsgOp/GTucFa2/jlFjqQoqrsZ6pN0lKwjWeaqVUy', 3, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(83, 'Dharmaraj', 'dharmaraj@gmail.com', NULL, '$2y$10$E29fINHJa.StOVrtxBN9xeqHA17K/iP6m/msDSI2ixFeSYGobZbOi', 3, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(84, 'Rajeswari', 'rajeswari@gmail.com', NULL, '$2y$10$v4s6fkdAsKuvSb2aR2p4KeCli5oNSthpDxak5dEZg8HTL4YSiHoYe', 3, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(85, 'Ankit', 'ankit@gmail.com', NULL, '$2y$10$WA2Y5IB2mGHVVG4MNGzGe.P98qM5AiIStsMvLgoQcOmrv3bQU1x1K', 4, NULL, '0', '1', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(86, 'Ramesh', 'ramesh@gmail.com', NULL, '$2y$10$AynlBn3AbFJD5zv41gaZF.Rf3Lv60YMu5OhzIVvZJ6KtbFcddvCAG', 4, NULL, '0', '1', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(87, 'suraj', 'suraj@gmail.com', NULL, '$2y$10$i5Elrc1kSpsznGt6Y9bnK.pwt9ElnuTkXUiEl2EkAIbMioUKasTjW', 4, NULL, '0', '1', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(88, 'Umesh', 'umesh@gmail.com', NULL, '$2y$10$LAgA7zr.WAwfkGFW3GEocuZsb8I79t72i7XmI721w82uogo/CoW4a', 4, NULL, '0', '1', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(89, 'Rohan', 'rohan@gmail.com', NULL, '$2y$10$oxKeqsNZ88Bqiqn78k4aTurZBYcNFEfqgWlTtgaAmVvnigJyaHt7m', 4, NULL, '0', '1', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(90, 'Manoj', 'manoj@gmail.com', NULL, '$2y$10$AAVQNaCEqVI3fukPsmXzbe/Ll00b5R4DvreooVGiXVGHe/UCGYI7G', 4, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(91, 'Dinesh', 'dinesh@gmail.com', NULL, '$2y$10$2weWu0tsyym62jAC3OxNbO/cu3SDWyYCijVJhFef8XGJ2Zk90H33G', 4, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL),
(92, 'Rothit', 'rohit@gmail.com', NULL, '$2y$10$D/9QZd1vSDFhfPXK7KRYEOWlyJCaqZWlzx2qPDY5wTKvNf706WUnW', 4, NULL, '0', '0', '0', NULL, NULL, '2023-09-01 06:32:29', '2023-09-01 06:32:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_permissions`
--

CREATE TABLE `users_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_permissions`
--

INSERT INTO `users_permissions` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-09-01 06:32:29', '2023-09-01 06:32:29'),
(2, 1, 2, '2023-09-01 06:32:29', '2023-09-01 06:32:29'),
(3, 1, 3, '2023-09-01 06:32:29', '2023-09-01 06:32:29'),
(4, 1, 4, '2023-09-01 06:32:29', '2023-09-01 06:32:29'),
(5, 1, 5, '2023-09-01 06:32:29', '2023-09-01 06:32:29'),
(6, 1, 6, '2023-09-01 06:32:29', '2023-09-01 06:32:29'),
(7, 1, 7, '2023-09-01 06:32:29', '2023-09-01 06:32:29'),
(8, 1, 8, '2023-09-01 06:32:29', '2023-09-01 06:32:29'),
(9, 2, 1, '2023-09-01 06:32:29', '2023-09-01 06:32:29'),
(10, 2, 2, '2023-09-01 06:32:29', '2023-09-01 06:32:29'),
(11, 3, 4, '2023-09-01 06:32:29', '2023-09-01 06:32:29'),
(12, 4, 2, '2023-09-01 06:32:29', '2023-09-01 06:32:29');

-- --------------------------------------------------------

--
-- Table structure for table `users_roles`
--

CREATE TABLE `users_roles` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_roles`
--

INSERT INTO `users_roles` (`user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-09-01 06:32:29', '2023-09-01 06:32:29'),
(2, 2, '2023-09-01 06:32:29', '2023-09-01 06:32:29'),
(3, 3, '2023-09-01 06:32:29', '2023-09-01 06:32:29'),
(4, 4, '2023-09-01 06:32:29', '2023-09-01 06:32:29');

-- --------------------------------------------------------

--
-- Table structure for table `user_dailycharts`
--

CREATE TABLE `user_dailycharts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) DEFAULT NULL,
  `user_visit_id` bigint(20) DEFAULT NULL,
  `department_id` bigint(20) DEFAULT NULL,
  `daily_notes` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `therapy_id` bigint(20) DEFAULT NULL,
  `doctor_id` bigint(20) DEFAULT NULL,
  `intern_id` bigint(20) DEFAULT NULL,
  `venue_id` bigint(20) DEFAULT NULL,
  `is_cancel` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `is_default` bigint(20) NOT NULL DEFAULT 0,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_dailycharts`
--

INSERT INTO `user_dailycharts` (`id`, `patient_id`, `user_visit_id`, `department_id`, `daily_notes`, `date`, `start_time`, `end_time`, `therapy_id`, `doctor_id`, `intern_id`, `venue_id`, `is_cancel`, `is_default`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 93, 1, 3, 'This is test therapy', '2023-09-01', '11:00:00', '12:00:00', 37, 3, 5, 5, '0', 0, '1', NULL, '2023-09-01 06:32:30', '2023-09-01 06:32:30'),
(2, 92, 3, 5, 'This is test therapy', '2023-09-01', '11:30:00', '12:30:00', 129, 3, 6, 7, '0', 0, '1', NULL, '2023-09-01 06:32:30', '2023-09-01 06:32:30'),
(3, 91, 2, 1, 'This is test therapy', '2023-09-01', '12:00:00', '13:00:00', 121, 3, 4, 1, '0', 0, '1', NULL, '2023-09-01 06:32:30', '2023-09-01 06:32:30'),
(4, 93, 1, 3, 'Add this therapy', '2023-09-01', '14:00:00', '14:30:00', 50, 7, 2, 5, '0', 0, '1', NULL, '2023-09-01 06:32:30', '2023-09-01 06:32:30'),
(5, 92, 3, 2, 'This is test', '2023-09-01', '14:30:00', '15:00:00', 92, 6, 3, 5, '0', 0, '1', NULL, '2023-09-01 06:32:30', '2023-09-01 06:32:30'),
(6, 91, 2, 4, 'New therapy', '2023-09-01', '15:00:00', '16:00:00', 150, 3, 5, 6, '0', 0, '1', NULL, '2023-09-01 06:32:30', '2023-09-01 06:32:30'),
(7, 93, 1, 7, 'Add this in diet', '2023-09-01', '13:00:00', '14:00:00', 222, 10, 7, 11, '0', 0, '1', NULL, '2023-09-01 06:32:30', '2023-09-01 06:32:30'),
(8, 93, 1, 7, 'Add juse in diet', '2023-09-01', '10:00:00', '10:30:00', 210, 10, 7, 11, '0', 0, '1', NULL, '2023-09-01 06:32:30', '2023-09-01 06:32:30');

-- --------------------------------------------------------

--
-- Table structure for table `user_daily_reports`
--

CREATE TABLE `user_daily_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bp_up` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bp_down` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pulse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `respiratory_rate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `user_visit_id` bigint(20) DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_device_tokens`
--

CREATE TABLE `user_device_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `device_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `version` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notification_ison` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_otps`
--

CREATE TABLE `user_otps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `otp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expire_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_social_accounts`
--

CREATE TABLE `user_social_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `provider_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_treatment_pdfuploads`
--

CREATE TABLE `user_treatment_pdfuploads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `treatment_pdf` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_visits`
--

CREATE TABLE `user_visits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) DEFAULT NULL,
  `doctor_id` bigint(20) DEFAULT NULL,
  `date` date NOT NULL,
  `notes` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_visits`
--

INSERT INTO `user_visits` (`id`, `patient_id`, `doctor_id`, `date`, `notes`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 93, 3, '2023-09-01', 'New patient critical condition', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(2, 91, 4, '2023-09-01', 'New patient improve', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL),
(3, 92, 6, '2023-09-01', 'New patient good condition', '1', '2023-09-01 06:32:30', '2023-09-01 06:32:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `venues`
--

CREATE TABLE `venues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_id` bigint(20) DEFAULT NULL,
  `language_id` bigint(20) DEFAULT NULL,
  `therapy_id` bigint(20) DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `venues`
--

INSERT INTO `venues` (`id`, `name`, `department_id`, `language_id`, `therapy_id`, `status`, `longitude`, `latitude`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Sampurna Hall (Section-E)', 1, 3, 0, '1', '76.77746870244451', '30.735125027530405', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(2, 'Sadapruma Hall (Section-B)', 1, 2, 0, '1', '76.71145257449126', '30.71187679481849', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(3, 'Pararthana Hall (Section-D)', 1, 1, 0, '1', '76.77589538994967', '30.761117190398622', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(4, 'Surabhi', 2, 0, 0, '1', '76.61772546692016', '30.73283162350087', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(5, 'Surabhi', 3, 0, 0, '1', '76.61772546692016', '30.73283162350087', '2023-09-01 06:32:22', '2023-09-01 06:32:22', NULL),
(6, 'Amrutam', 4, 0, 0, '1', '76.66167077742969', '30.695641050988275', '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(7, 'Amrutam', 5, 0, 0, '1', '76.66167077742969', '30.695641050988275', '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(8, 'Sampurna Hall (Section-E)', 6, 3, 0, '1', '76.77746870244451', '30.735125027530405', '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(9, 'Sadapruma Hall (Section-B)', 6, 2, 0, '1', '76.71145257449126', '30.71187679481849', '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(10, 'Pararthana Hall (Section-D)', 6, 1, 0, '1', '76.77589538994967', '30.761117190398622', '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(11, 'Annapurna Dining Hall', 7, 0, 0, '1', '76.78252038133087', '30.709810579160344', '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(12, 'Shruti Mandir', 0, 0, 0, '1', '76.80964287766096', '30.75201162741615', '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL),
(13, 'Inside the Campus', 0, 0, 0, '1', '76.80105980920207', '30.711286452004064', '2023-09-01 06:32:23', '2023-09-01 06:32:23', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accommodations`
--
ALTER TABLE `accommodations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_icones`
--
ALTER TABLE `app_icones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_notifications`
--
ALTER TABLE `app_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_notification_titles`
--
ALTER TABLE `app_notification_titles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_setting_pages`
--
ALTER TABLE `app_setting_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `case_details`
--
ALTER TABLE `case_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discharges`
--
ALTER TABLE `discharges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expertises`
--
ALTER TABLE `expertises`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interns`
--
ALTER TABLE `interns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `more_settings`
--
ALTER TABLE `more_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `more_setting_locales`
--
ALTER TABLE `more_setting_locales`
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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `patient_default_daily_charts`
--
ALTER TABLE `patient_default_daily_charts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_profiles`
--
ALTER TABLE `patient_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_profiles_user_id_foreign` (`user_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymen_modes`
--
ALTER TABLE `paymen_modes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `therapies`
--
ALTER TABLE `therapies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `therapists`
--
ALTER TABLE `therapists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobile_no_unique` (`mobile_no`);

--
-- Indexes for table `users_permissions`
--
ALTER TABLE `users_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`);

--
-- Indexes for table `user_dailycharts`
--
ALTER TABLE `user_dailycharts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_daily_reports`
--
ALTER TABLE `user_daily_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_device_tokens`
--
ALTER TABLE `user_device_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_otps`
--
ALTER TABLE `user_otps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_social_accounts`
--
ALTER TABLE `user_social_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_treatment_pdfuploads`
--
ALTER TABLE `user_treatment_pdfuploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_visits`
--
ALTER TABLE `user_visits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `venues`
--
ALTER TABLE `venues`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accommodations`
--
ALTER TABLE `accommodations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `app_icones`
--
ALTER TABLE `app_icones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `app_notifications`
--
ALTER TABLE `app_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_notification_titles`
--
ALTER TABLE `app_notification_titles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `app_setting_pages`
--
ALTER TABLE `app_setting_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `case_details`
--
ALTER TABLE `case_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `discharges`
--
ALTER TABLE `discharges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `expertises`
--
ALTER TABLE `expertises`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `interns`
--
ALTER TABLE `interns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `more_settings`
--
ALTER TABLE `more_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `more_setting_locales`
--
ALTER TABLE `more_setting_locales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_default_daily_charts`
--
ALTER TABLE `patient_default_daily_charts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `patient_profiles`
--
ALTER TABLE `patient_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paymen_modes`
--
ALTER TABLE `paymen_modes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `therapies`
--
ALTER TABLE `therapies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=237;

--
-- AUTO_INCREMENT for table `therapists`
--
ALTER TABLE `therapists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `users_permissions`
--
ALTER TABLE `users_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_dailycharts`
--
ALTER TABLE `user_dailycharts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_daily_reports`
--
ALTER TABLE `user_daily_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_device_tokens`
--
ALTER TABLE `user_device_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_otps`
--
ALTER TABLE `user_otps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_social_accounts`
--
ALTER TABLE `user_social_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_treatment_pdfuploads`
--
ALTER TABLE `user_treatment_pdfuploads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_visits`
--
ALTER TABLE `user_visits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `venues`
--
ALTER TABLE `venues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `patient_profiles`
--
ALTER TABLE `patient_profiles`
  ADD CONSTRAINT `patient_profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users_permissions`
--
ALTER TABLE `users_permissions`
  ADD CONSTRAINT `users_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
