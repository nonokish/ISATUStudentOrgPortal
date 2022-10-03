-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2022 at 01:02 PM
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
(1, 'Education Drive', 'Education Drive Content Test', 'Education Drive-Display-Image-education-6339d2fb4e71e8.01579817.jpg', '2022-10-15', 1, NULL, '2022-10-03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `id` int(11) NOT NULL,
  `org_classification_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `org_date_created` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `date_created` date DEFAULT current_timestamp(),
  `last_updated` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`id`, `org_classification_id`, `name`, `org_date_created`, `created_by`, `updated_by`, `date_created`, `last_updated`) VALUES
(2, 1, 'ISAT U Student Council', '2022-10-08', 1, NULL, '2022-10-03', NULL);

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
(1, 2, 1, 1, NULL, '2022-10-03', NULL);

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
(20, 4, 'John', 'D', 'Robert', 'john@gmail.com', '09298575663', '', '', '', '*F56D958B200BBD61D744C0252471FF53D1F25D10', 1, NULL, '2022-10-03', NULL);

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
(2, 20, 2, '2022-10-03', 1, NULL, '2022-10-03', NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_organization`
--
ALTER TABLE `user_organization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
