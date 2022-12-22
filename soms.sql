-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2022 at 12:30 PM
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
  `display_image` varchar(250) NOT NULL,
  `publish_date` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp(),
  `last_updated` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `title`, `content`, `display_image`, `publish_date`, `created_by`, `updated_by`, `date_created`, `last_updated`) VALUES
(1, 'Orientation Program College of Education', 'An Orientation Program for COE First Year Students', 'Orientation Program College of Education-Display-Image-education-63975a2e73ca51.01924695.jpg', '2022-12-15', 31, NULL, '2022-12-13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `newsfeed`
--

CREATE TABLE `newsfeed` (
  `id` int(11) NOT NULL,
  `caption` varchar(250) NOT NULL,
  `display_image` varchar(250) NOT NULL,
  `publish_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp(),
  `last_updated` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newsfeed`
--

INSERT INTO `newsfeed` (`id`, `caption`, `display_image`, `publish_date`, `created_by`, `updated_by`, `date_created`, `last_updated`) VALUES
(1, 'Test Test 1 - Caption - Membership Drive', 'Test Test 1 - Caption - Membership Drive-Display-Image-membershipdrive-63a0b8b00b3e40.79121972.jpg', '2022-12-16 00:00:00', 33, NULL, '2022-12-20', NULL),
(2, 'test 1', 'test 1-Display-Image-education-63a0b978b9ccb1.03450613.jpg', '2022-12-24 00:00:00', 33, NULL, '2022-12-20', NULL),
(3, 'test 2', 'test 2-Display-Image-pic1-63a0b9bf1ea704.37137598.jpg', '2022-12-15 00:00:00', 33, NULL, '2022-12-20', NULL),
(4, 'test 3', 'test 3-Display-Image-test01-63a0ba4f935d43.16933874.jpg', '2022-12-31 00:00:00', 33, NULL, '2022-12-20', NULL),
(5, 'test', 'test-Display-Image-education-63a0c144d7c4c3.03992215.jpg', '2022-12-28 00:00:00', 33, NULL, '2022-12-20', NULL),
(6, 'test', 'test-Display-Image-membershipdrive-63a0c1c10011a5.11598020.jpg', '2022-12-24 00:00:00', 33, NULL, '2022-12-20', NULL),
(7, 'test 6', 'test 6-Display-Image-pic1-63a0c2176451a8.83879444.jpg', '2022-01-05 00:00:00', 33, NULL, '2022-12-20', NULL),
(8, 'test 7', 'test 7-Display-Image-test01-63a0c22d9224e5.11203159.jpg', '2022-02-10 00:00:00', 33, NULL, '2022-12-20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `id` int(11) NOT NULL,
  `org_classification_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `org_image` varchar(250) NOT NULL,
  `org_date_created` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `date_created` date DEFAULT current_timestamp(),
  `last_updated` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`id`, `org_classification_id`, `name`, `org_image`, `org_date_created`, `created_by`, `updated_by`, `date_created`, `last_updated`) VALUES
(1, 1, 'ISAT U Student Republic', '', '2022-01-25', 1, NULL, '2022-12-13', NULL),
(2, 2, 'Education Org', '', '2022-04-10', 1, NULL, '2022-12-21', NULL),
(3, 2, 'test', '', '2022-12-10', 1, NULL, '2022-12-21', NULL),
(4, 2, 'test 2', '', '2022-12-03', 1, NULL, '2022-12-21', NULL),
(5, 2, 'test 3', '', '2022-12-03', 1, NULL, '2022-12-21', NULL),
(6, 2, 'test 3', '', '2022-12-03', 1, NULL, '2022-12-21', NULL),
(7, 2, 'test 5', '', '2022-12-02', 1, NULL, '2022-12-21', NULL),
(8, 2, 'Education Org 2', 'Display-Image-education-63a1fa886e5990.40299236.jpg', '2022-04-28', 1, NULL, '2022-12-21', NULL),
(9, 2, 'Member Org', 'Display-Image-membershipdrive-63a1fab5a03b57.17964037.jpg', '2022-03-12', 1, NULL, '2022-12-21', NULL),
(10, 3, 'test 8', 'Display-Image-education-63a43f82da5d86.50622096.jpg', '2022-01-09', 1, 1, '2022-12-21', '2022-12-22');

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
  `date_created` date NOT NULL DEFAULT current_timestamp(),
  `last_updated` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organization_announcement`
--

INSERT INTO `organization_announcement` (`id`, `organization_id`, `announcement_id`, `created_by`, `updated_by`, `date_created`, `last_updated`) VALUES
(1, 1, 1, 31, NULL, '2022-12-13', NULL);

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
-- Table structure for table `organization_newsfeed`
--

CREATE TABLE `organization_newsfeed` (
  `id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `newsfeed_id` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp(),
  `last_updated` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organization_newsfeed`
--

INSERT INTO `organization_newsfeed` (`id`, `organization_id`, `newsfeed_id`, `created_by`, `updated_by`, `date_created`, `last_updated`) VALUES
(1, 1, 1, 33, NULL, '2022-12-20', NULL),
(2, 1, 2, 33, NULL, '2022-12-20', NULL),
(3, 1, 3, 33, NULL, '2022-12-20', NULL),
(4, 1, 4, 33, NULL, '2022-12-20', NULL),
(5, 1, 5, 33, NULL, '2022-12-20', NULL),
(6, 1, 6, 33, NULL, '2022-12-20', NULL),
(7, 1, 7, 33, NULL, '2022-12-20', NULL),
(8, 1, 8, 33, NULL, '2022-12-20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `middle_initial` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `contact` varchar(250) NOT NULL,
  `course_year` varchar(250) NOT NULL,
  `department` varchar(250) NOT NULL,
  `designation` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `date_created` date DEFAULT current_timestamp(),
  `last_updated` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_type_id`, `first_name`, `middle_initial`, `last_name`, `email`, `contact`, `course_year`, `department`, `designation`, `password`, `created_by`, `updated_by`, `date_created`, `last_updated`) VALUES
(1, 5, 'Super Admin First Name', 'Super Admin Middle Name', 'Super Admin Last Name', 'superadmin@gmail.com', '09999999999', '', 'superadmin01', '', '*13D15A370943B788A19C8726ED63C96DE8B09382', NULL, NULL, '2022-09-25', NULL),
(31, 4, 'Jm Jason', 'J', 'Fenequito', 'jason@gmail.com', '092985462233', '', '', '', '*EA30580A7C43FCE56FC7FBD35908187F59E90763', 1, NULL, '2022-12-13', NULL),
(32, 1, 'Jm', 'J', 'Jaena', 'jm@gmail.com', '09298545621221', 'BSE-4', 'Education', 'Member', '*BA15EDD3854F3E844838B9ED59C14EB6BE7424AC', 31, NULL, '2022-12-13', NULL),
(33, 3, 'Jay', 'F', 'Reyes', 'jayem@gmail.com', '0929856412333', 'BSE-2', 'Education', 'President', '*EA30580A7C43FCE56FC7FBD35908187F59E90763', 31, NULL, '2022-12-13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_organization`
--

CREATE TABLE `user_organization` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `date_joined` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp(),
  `last_updated` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_organization`
--

INSERT INTO `user_organization` (`id`, `user_id`, `organization_id`, `date_joined`, `created_by`, `updated_by`, `date_created`, `last_updated`) VALUES
(1, 31, 1, '2022-12-10', 1, NULL, '2022-12-13', NULL),
(2, 32, 1, '2022-03-05', 31, NULL, '2022-12-13', NULL),
(3, 33, 1, '2022-12-11', 31, NULL, '2022-12-13', NULL),
(4, 31, 2, '2022-12-01', 1, NULL, '2022-12-21', NULL),
(5, 31, 3, '2022-12-16', 1, NULL, '2022-12-21', NULL),
(6, 31, 4, '2022-12-15', 1, NULL, '2022-12-21', NULL),
(7, 31, 5, '2022-12-14', 1, NULL, '2022-12-21', NULL),
(8, 31, 6, '2022-12-14', 1, NULL, '2022-12-21', NULL),
(9, 31, 7, '2022-12-22', 1, NULL, '2022-12-21', NULL),
(10, 31, 8, '2022-12-09', 1, NULL, '2022-12-21', NULL),
(11, 31, 9, '2022-12-05', 1, NULL, '2022-12-21', NULL),
(12, 31, 10, '2022-12-15', 1, 1, '2022-12-21', '2022-12-22');

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
-- Indexes for table `newsfeed`
--
ALTER TABLE `newsfeed`
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
-- Indexes for table `organization_newsfeed`
--
ALTER TABLE `organization_newsfeed`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `newsfeed`
--
ALTER TABLE `newsfeed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `organization_announcement`
--
ALTER TABLE `organization_announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `organization_classification`
--
ALTER TABLE `organization_classification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `organization_newsfeed`
--
ALTER TABLE `organization_newsfeed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user_organization`
--
ALTER TABLE `user_organization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
