-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2022 at 06:21 PM
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
  `article_image` varchar(250) NOT NULL,
  `publish_date` varchar(250) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp(),
  `last_updated` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `title`, `content`, `display_image`, `article_image`, `publish_date`, `created_by`, `updated_by`, `date_created`, `last_updated`) VALUES
(3, 'test 22', 'test content 33', 'Display-Image-6334a929e079c1.60067002.jpg', 'Article-Image-6334a929e110f6.46758885.png', '25 September, 2022', 2, NULL, '2022-09-29', NULL),
(4, 'health human services', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure do', 'Display-Image-6334b02c474105.82024940.jpg', 'Article-Image-6334b02c4761b2.20128121.jpg', '17 September, 2022', 7, NULL, '2022-09-29', NULL),
(5, 'Education Title', 'About Education Content Test', 'Display-Image-63370ff7b4acb6.11605582.jpg', '', '30 September, 2022', 2, NULL, '2022-09-30', NULL),
(6, 'Education Department 101', 'Education Department 101 Content Test', 'Education Department 101-Display-Image-education-633711eeae5312.81285935.jpg', '', '20 September, 2022', 2, NULL, '2022-09-30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `id` int(11) NOT NULL,
  `org_classification_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `org_date_created` varchar(250) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `date_created` date DEFAULT current_timestamp(),
  `last_updated` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`id`, `org_classification_id`, `name`, `org_date_created`, `created_by`, `updated_by`, `date_created`, `last_updated`) VALUES
(1, 1, 'ISAT U Student Republic', '2022-08-01', 1, 1, '2022-09-25', '2022-09-25'),
(2, 2, 'Arkitekton', '2022-09-01', 1, 1, '2022-09-25', '2022-09-25'),
(3, 3, 'AWANA Youth', '0000-00-00', 1, NULL, '2022-09-26', NULL),
(4, 4, 'Human Services Society', '0000-00-00', 1, NULL, '2022-09-26', NULL),
(5, 1, 'The Technovator', '10 September, 2022', 1, NULL, '2022-09-30', NULL);

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
(3, 1, 3, 2, NULL, '2022-09-29', NULL),
(4, 4, 4, 7, NULL, '2022-09-29', NULL),
(5, 3, 5, 2, NULL, '2022-09-30', NULL),
(6, 3, 6, 2, NULL, '2022-09-30', NULL);

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
(2, 3, 'jay', 'm', 'fene', 'jay@gmail.com', '09999999999', 'BSIT', 'Computer Studies', '', '*EA30580A7C43FCE56FC7FBD35908187F59E90763', NULL, NULL, '2022-09-25', NULL),
(3, 3, 'Kez', 'B', 'Bas', 'kez@gmail.com', '09999999999', 'BSIT', 'Computer Studies', '', '*71C518C3B3BDD3E5E6A1D98787EDCC9ED292AF3B', 1, 1, '2022-09-25', '2022-09-25'),
(4, 3, 'Mark', '', 'Reyes', 'mark@gmail.com', '09999999999', 'BSN', 'Nursing', '', '*96D592D14E05091084B2187F633224876FE9AC5A', 1, 1, '2022-09-25', '2022-09-25'),
(5, 4, 'John', 'J', 'Doe', 'john@gmail.com', '09295653332', '', '', '', '*F56D958B200BBD61D744C0252471FF53D1F25D10', 1, 1, '2022-09-26', '2022-09-25'),
(6, 4, 'Clark', '', 'Johnson', 'clark@gmail.com', '0829556333', '', '', '', '*380E33C22EBB8AEC77584E48E22709623F29D867', 1, 1, '2022-09-26', '2022-09-25'),
(7, 4, 'kenneth', 'u', 'chu', 'kenneth@gmail.com', '0999999999999', '', '', '', '*87B73B999204041AAFFEC1615D7DD83622E97273', 1, NULL, '2022-09-28', NULL),
(8, 4, 'John', 'e', 'Reyes', 'john@gmail.com', '09929996522', '', '', '', '*F56D958B200BBD61D744C0252471FF53D1F25D10', 1, NULL, '2022-09-28', NULL),
(16, 1, 'jm', 'j', 'fenequito', 'jm@gmail.com', '099999999999', 'BSN - 1', 'nursing', '', '*BA15EDD3854F3E844838B9ED59C14EB6BE7424AC', 2, NULL, '2022-09-28', NULL),
(17, 3, 'Kaye', 'D', 'Reyes', 'kaye@gmail.com', '099852233333', 'BSM - 4', 'Medicine', 'President', '*47C4B8220BBD0113BFA4B3E5B4BEFDD5CEAF3A62', 2, NULL, '2022-09-29', NULL),
(18, 3, 'Jed', 'M', 'Tan', 'tan@gmail.com', '092985456666', 'BSIT - 3', 'Cmputer Studies', 'Vice President', '*4A0F0D71387803E38E8C71153BC536A310B54AA2', 2, NULL, '2022-09-29', NULL),
(19, 4, 'Arthur', 'D', 'Dragon', 'arthur@gmail.com', '092653332255', '', '', '', '*D6B3F83FA8D9F2E8316CE8851A036CCDEB0A4FAB', 1, NULL, '2022-09-30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_organization`
--

CREATE TABLE `user_organization` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `date_joined` varchar(250) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp(),
  `last_updated` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_organization`
--

INSERT INTO `user_organization` (`id`, `user_id`, `organization_id`, `date_joined`, `created_by`, `updated_by`, `date_created`, `last_updated`) VALUES
(1, 2, 1, '2022-09-08', 1, 1, '2022-09-25', '2022-09-25'),
(2, 3, 1, '2022-09-03', 1, 1, '2022-09-25', '2022-09-25'),
(3, 4, 2, '2022-09-06', 1, 1, '2022-09-25', '2022-09-25'),
(4, 2, 3, '0000-00-00', 1, NULL, '2022-09-26', NULL),
(5, 7, 4, '0000-00-00', 1, NULL, '2022-09-26', NULL),
(6, 7, 1, '0000-00-00', 1, NULL, '2022-09-28', NULL),
(7, 8, 2, '0000-00-00', 1, NULL, '2022-09-28', NULL),
(10, 16, 1, '0000-00-00', 2, NULL, '2022-09-28', NULL),
(11, 17, 1, '10 September, 2022', 2, NULL, '2022-09-29', NULL),
(12, 18, 1, '20 September, 2022', 2, NULL, '2022-09-29', NULL),
(13, 19, 5, '7 September, 2022', 1, NULL, '2022-09-30', NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `organization_announcement`
--
ALTER TABLE `organization_announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `organization_classification`
--
ALTER TABLE `organization_classification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_organization`
--
ALTER TABLE `user_organization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
