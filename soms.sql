-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2022 at 06:15 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soms`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `content` varchar(250) NOT NULL,
  `images` varchar(250) NOT NULL,
  `announcement_date` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `last_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `id` int(11) NOT NULL,
  `org_classification_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `org_date_created` datetime NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT current_timestamp(),
  `last_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`id`, `org_classification_id`, `name`, `org_date_created`, `created_by`, `updated_by`, `date_created`, `last_updated`) VALUES
(1, 1, 'ISAT U Student Republic', '2022-08-01 20:07:07', 1, 1, '2022-09-25 20:07:07', '2022-09-25 14:06:42'),
(2, 2, 'Arkitekton', '2022-09-01 21:25:09', 1, 1, '2022-09-25 21:25:09', '2022-09-25 15:25:09'),
(3, 3, 'AWANA Youth', '0000-00-00 00:00:00', 1, NULL, '2022-09-26 02:18:51', NULL),
(4, 4, 'Human Services Society', '0000-00-00 00:00:00', 1, NULL, '2022-09-26 02:26:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `organization_announcement`
--

CREATE TABLE `organization_announcement` (
  `id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `announcement_id` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `last_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `organization_classification`
--

CREATE TABLE `organization_classification` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organization_classification`
--

INSERT INTO `organization_classification` (`id`, `name`) VALUES
(1, 'Major'),
(2, 'Minor'),
(3, 'Special Interest or Advocacy Clubs'),
(4, 'New Organizations');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `middle_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `contact` varchar(250) NOT NULL,
  `course` varchar(250) NOT NULL,
  `year` varchar(250) NOT NULL,
  `department` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT current_timestamp(),
  `last_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_type_id`, `first_name`, `middle_name`, `last_name`, `email`, `contact`, `course`, `year`, `department`, `password`, `created_by`, `updated_by`, `date_created`, `last_updated`) VALUES
(1, 5, 'Super Admin First Name', 'Super Admin Middle Name', 'Super Admin Last Name', 'superadmin@gmail.com', '09999999999', '', '', 'superadmin01', '*13D15A370943B788A19C8726ED63C96DE8B09382', NULL, NULL, '2022-09-25 18:04:10', NULL),
(2, 3, 'jay', 'm', 'fene', 'jay@gmail.com', '09999999999', 'BSIT', '1', 'Computer Studies', '*EA30580A7C43FCE56FC7FBD35908187F59E90763', NULL, NULL, '2022-09-25 18:31:00', NULL),
(3, 3, 'Kez', 'B', 'Bas', 'kez@gmail.com', '09999999999', 'BSIT', '2', 'Computer Studies', '*71C518C3B3BDD3E5E6A1D98787EDCC9ED292AF3B', 1, 1, '2022-09-25 21:22:10', '2022-09-25 15:22:10'),
(4, 3, 'Mark', '', 'Reyes', 'mark@gmail.com', '09999999999', 'BSN', '3', 'Nursing', '*96D592D14E05091084B2187F633224876FE9AC5A', 1, 1, '2022-09-25 21:31:36', '2022-09-25 15:31:36'),
(5, 4, 'John', 'J', 'Doe', 'john@gmail.com', '09295653332', '', '', '', '*F56D958B200BBD61D744C0252471FF53D1F25D10', 1, 1, '2022-09-26 01:12:25', '2022-09-25 19:12:25'),
(6, 4, 'Clark', '', 'Johnson', 'clark@gmail.com', '0829556333', '', '', '', '*380E33C22EBB8AEC77584E48E22709623F29D867', 1, 1, '2022-09-26 02:24:27', '2022-09-25 20:24:27');

-- --------------------------------------------------------

--
-- Table structure for table `user_organization`
--

CREATE TABLE `user_organization` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `date_joined` datetime NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `last_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_organization`
--

INSERT INTO `user_organization` (`id`, `user_id`, `organization_id`, `date_joined`, `created_by`, `updated_by`, `date_created`, `last_updated`) VALUES
(1, 2, 1, '2022-09-08 21:21:45', 1, 1, '2022-09-25 20:07:32', '2022-09-25 14:07:16'),
(2, 3, 1, '2022-09-03 21:23:49', 1, 1, '2022-09-25 21:23:49', '2022-09-25 15:23:49'),
(3, 4, 2, '2022-09-06 21:33:05', 1, 1, '2022-09-25 21:33:05', '2022-09-25 15:33:05'),
(4, 5, 3, '0000-00-00 00:00:00', 1, NULL, '2022-09-26 02:18:51', NULL),
(5, 6, 4, '0000-00-00 00:00:00', 1, NULL, '2022-09-26 02:26:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `name`) VALUES
(1, 'Member'),
(2, 'Officer'),
(3, 'Admin'),
(4, 'Adviser'),
(5, 'Superadmin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organization_announcement`
--
ALTER TABLE `organization_announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organization_classification`
--
ALTER TABLE `organization_classification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_organization`
--
ALTER TABLE `user_organization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `organization_announcement`
--
ALTER TABLE `organization_announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `organization_classification`
--
ALTER TABLE `organization_classification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_organization`
--
ALTER TABLE `user_organization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
