-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2020 at 10:27 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `advice_group`
--

CREATE TABLE `advice_group` (
  `id` int(11) NOT NULL,
  `log_id` int(11) DEFAULT NULL,
  `advice_group_name` varchar(255) NOT NULL,
  `advice` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advice_group`
--

INSERT INTO `advice_group` (`id`, `log_id`, `advice_group_name`, `advice`, `status`) VALUES
(2, NULL, 'ad', 'ffa', 0),
(3, NULL, 'abcsdssds', 'adcss', 0),
(4, 55, 'ajjukanu', 'sadsadsfsf', 1),
(5, 55, 'ajy', 'ajy', 1),
(6, 55, 'ad', 'scs', 1),
(7, 55, 'sdadd', 'sdafd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `diet_group`
--

CREATE TABLE `diet_group` (
  `id` int(11) NOT NULL,
  `log_id` int(11) DEFAULT NULL,
  `diet_group_name` varchar(255) NOT NULL,
  `diet` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diet_group`
--

INSERT INTO `diet_group` (`id`, `log_id`, `diet_group_name`, `diet`, `status`) VALUES
(2, NULL, 'aay1', 'sadad', 0),
(3, NULL, 'aSD', 'SDSA', 0),
(4, NULL, 'SADSDSA', 'ABC', 0),
(7, 55, 'scds', 'sds  dfd  ffdfs', 1),
(8, 55, 'dcfsd', 'sdsadajaya', 1),
(9, 55, 'dff', 'dgsg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` bigint(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_educaton` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medical_reg_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `speciality` int(11) DEFAULT NULL,
  `year_of_experience` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patients_per_hour` int(11) DEFAULT NULL,
  `fees` int(11) NOT NULL,
  `gender` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `days` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `number`, `email`, `main_educaton`, `medical_reg_no`, `speciality`, `year_of_experience`, `patients_per_hour`, `fees`, `gender`, `image`, `days`, `from_time`, `to_time`, `status`, `created_at`, `updated_at`) VALUES
(55, 'ajay', 9303119152, 'admin@gmail.com', NULL, '42525', 1, NULL, NULL, 300, 1, NULL, NULL, NULL, NULL, 1, '2020-05-18 05:48:18', '2020-05-18 05:48:18'),
(56, 'doctor 2', 9303119151, 'admin@matrimonial.com', 'sdgsdg', '42525', 1, NULL, 12, 400, 1, NULL, NULL, NULL, NULL, 1, '2020-05-21 13:24:36', '2020-05-21 13:24:36');

-- --------------------------------------------------------

--
-- Table structure for table `login_creates`
--

CREATE TABLE `login_creates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` bigint(20) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` int(11) DEFAULT NULL,
  `type` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `login_creates`
--

INSERT INTO `login_creates` (`id`, `log_id`, `name`, `number`, `email`, `password`, `designation`, `type`, `status`, `created_at`, `updated_at`) VALUES
(3, 0, 'emp1ajay1', 9303119152, 'admin@gmail.com', '12345678', NULL, 3, 1, '2020-05-07 00:10:29', '2020-05-09 06:38:30'),
(4, 0, 'Bank', 9303119151, 'admin@gmail.com', '12345678', NULL, 1, 1, '2020-05-07 00:35:53', '2020-05-07 00:35:53'),
(6, 0, 'admin', 1234567890, 'admin@gmail.com', '12345678', NULL, 1, 1, '2020-05-08 06:35:46', '2020-05-08 06:35:46'),
(7, 55, 'ajay', 9303119152, 'admin@gmail.com', '9303119152', NULL, 3, 1, '2020-05-18 05:48:18', '2020-05-18 05:48:18'),
(8, 56, 'doctor 2', 9303119151, 'admin@matrimonial.com', '9303119151', NULL, 3, 1, '2020-05-21 13:24:36', '2020-05-21 13:24:36');

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`id`, `name`, `status`) VALUES
(1, 'medicines1', 1),
(2, 'medicine2zv', 1),
(6, 'ajaykant', 1),
(7, 'xdvx', 1);

-- --------------------------------------------------------

--
-- Table structure for table `medi_group`
--

CREATE TABLE `medi_group` (
  `id` int(11) NOT NULL,
  `log_id` int(11) DEFAULT NULL,
  `medi_group_name` varchar(255) NOT NULL,
  `medicines` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medi_group`
--

INSERT INTO `medi_group` (`id`, `log_id`, `medi_group_name`, `medicines`, `status`) VALUES
(8, NULL, 'abc', 'cda', 0),
(9, 55, 'vxgf', 'dfg', 1),
(10, 55, 'vxgf', 'dfgajay', 1),
(17, 55, 'vxgf', 'dfgajay', 1),
(18, 55, 'vxgfkant', 'dfgfdafdsgd', 1),
(19, 55, 'medi1', 'abc cda   bha', 1),
(20, 55, 'medi1', 'abc cda', 1),
(21, 55, 'vxgf', 'dfgdfd', 1),
(22, 55, 'vxgf', 'dfgajuuuuuu', 1),
(23, 55, 'vxgf', 'dfgajgggggggggg', 1),
(24, 55, 'tet hiv', 'sahdksa dsfdjf dfsjfjd dsjfjd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `medi_info`
--

CREATE TABLE `medi_info` (
  `id` int(11) NOT NULL,
  `log_id` int(11) DEFAULT NULL,
  `medi_name` int(11) NOT NULL,
  `medi_when` int(11) DEFAULT NULL,
  `medi_freq` int(11) DEFAULT NULL,
  `medi_dur` varchar(255) DEFAULT NULL,
  `medi_days` int(11) DEFAULT NULL,
  `medi_instr` int(11) DEFAULT NULL,
  `medi_alter` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medi_info`
--

INSERT INTO `medi_info` (`id`, `log_id`, `medi_name`, `medi_when`, `medi_freq`, `medi_dur`, `medi_days`, `medi_instr`, `medi_alter`, `status`, `createdat`) VALUES
(2, 55, 6, 5, 3, '1333', 3, 2, '2', 1, '2020-05-28 07:33:43'),
(3, 55, 1, 1, 2, '3', 3, 1, '3', 1, '2020-05-28 07:52:29');

-- --------------------------------------------------------

--
-- Table structure for table `medi_time`
--

CREATE TABLE `medi_time` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medi_time`
--

INSERT INTO `medi_time` (`id`, `name`, `status`) VALUES
(1, 'breakfast', 1),
(2, 'lunch', 1),
(3, 'diner', 1),
(4, '4 time', 1),
(5, '6 time', 1),
(6, 'ajayvcbxfsdjgsnjgnjs', 1);

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
(4, '2020_05_06_034804_create_login_creates_table', 1),
(6, '2020_05_10_050814_create_doctors_table', 2),
(7, '2020_05_11_124002_create_schedule', 3);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `log_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `type` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `sex` int(11) NOT NULL,
  `dob` date DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `pincode` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `id_type` int(11) NOT NULL,
  `id_number` varchar(255) DEFAULT NULL,
  `service` int(11) DEFAULT NULL,
  `doctor` int(11) DEFAULT NULL,
  `fees` varchar(255) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `log_id`, `date`, `type`, `name`, `phone`, `email`, `sex`, `dob`, `age`, `address`, `city`, `pincode`, `image`, `id_type`, `id_number`, `service`, `doctor`, `fees`, `amount`, `time`, `status`, `created_at`, `updated_at`) VALUES
(1, 55, '2020-05-29', 1, 'ajay', '1234567890', NULL, 1, '1989-11-05', '31', 'jabalpur', 'jabalpur', 482001, NULL, 1, '423235', NULL, NULL, NULL, NULL, NULL, 4, '2020-05-29 03:53:36', '2020-05-29 03:53:36'),
(3, 55, '2020-05-29', 1, 'admin', '4252454646', NULL, 1, '3455-12-03', '-1435', NULL, 'jabapur', 482001, 'Untitled.png', 1, '423235', NULL, NULL, NULL, NULL, NULL, 4, '2020-05-29 04:25:37', '2020-05-29 04:25:37'),
(4, 55, '2020-05-31', 2, 'admin', '1323244343', NULL, 1, '1999-11-11', '20', 'jabalpur', 'jabapur', 482001, 'chicago.jpg', 2, '423235', 11, 55, '300', NULL, NULL, 1, '2020-05-30 23:23:09', '2020-05-30 23:23:09'),
(5, 55, '2020-05-31', 1, 'admin', '1443513524', NULL, 1, '1999-12-03', '21', 'jabalpur', 'jabalpur', 482001, NULL, 1, '423235', 11, 55, '300', NULL, NULL, 1, '2020-05-30 23:28:47', '2020-05-30 23:28:47');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doc_id` int(11) NOT NULL,
  `days` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `doc_id`, `days`, `from_time`, `to_time`, `created_at`, `updated_at`) VALUES
(8, 13, '1,2,3,4,5,6,7', '2:00 PM', '1:00 PM', NULL, NULL),
(13, 12, '1,2,3,4,5,6,7', '11:00 AM', '11:00 AM', NULL, NULL),
(17, 56, '5,6,7', '10:00 AM', '12:00 PM', NULL, NULL),
(18, 56, '5', '2:00 PM', '5:00 PM', NULL, NULL),
(20, 12, '1,2,4', '2:00 PM', '1:00 PM', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `fees_amount` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `fees_amount`, `status`, `created_at`, `updated_at`) VALUES
(11, 'normal', '1000', 0, '2020-05-20 13:21:35', '2020-05-20 22:54:52'),
(13, 'Gernal', '3500', 0, '2020-05-20 13:21:35', '2020-05-20 22:55:35'),
(21, 'admin', '20', 1, '2020-05-20 22:59:51', '2020-05-20 22:59:51'),
(23, 'admin', '200', 1, '2020-05-21 06:48:49', '2020-05-21 06:49:02'),
(24, 'camp', '20', 1, '2020-06-01 00:41:03', '2020-06-01 00:41:03');

-- --------------------------------------------------------

--
-- Table structure for table `test_group`
--

CREATE TABLE `test_group` (
  `id` int(11) NOT NULL,
  `log_id` int(11) DEFAULT NULL,
  `group_name` varchar(255) NOT NULL,
  `test` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_group`
--

INSERT INTO `test_group` (`id`, `log_id`, `group_name`, `test`, `status`) VALUES
(4, NULL, 'group1', 'test1', 0),
(5, 2, 'group2', 'test2', 0),
(6, 2, 'rinku', 'test', 0),
(7, NULL, 'group1', 'test1  sefsd', 1),
(9, NULL, 'group3', 'test3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vital`
--

CREATE TABLE `vital` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vital`
--

INSERT INTO `vital` (`id`, `name`, `status`) VALUES
(4, 'ajju', 0),
(11, 'KML', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advice_group`
--
ALTER TABLE `advice_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diet_group`
--
ALTER TABLE `diet_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_creates`
--
ALTER TABLE `login_creates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medi_group`
--
ALTER TABLE `medi_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medi_info`
--
ALTER TABLE `medi_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medi_time`
--
ALTER TABLE `medi_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_group`
--
ALTER TABLE `test_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vital`
--
ALTER TABLE `vital`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advice_group`
--
ALTER TABLE `advice_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `diet_group`
--
ALTER TABLE `diet_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `login_creates`
--
ALTER TABLE `login_creates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `medi_group`
--
ALTER TABLE `medi_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `medi_info`
--
ALTER TABLE `medi_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `medi_time`
--
ALTER TABLE `medi_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `test_group`
--
ALTER TABLE `test_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `vital`
--
ALTER TABLE `vital`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
