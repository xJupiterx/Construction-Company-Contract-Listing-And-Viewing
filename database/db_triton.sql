-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2022 at 05:23 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_triton`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(11) NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `client_address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `client_cpno` varchar(255) NOT NULL,
  `client_email` varchar(255) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `cp_cpno` varchar(255) NOT NULL,
  `cp_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `client_name`, `client_address`, `city`, `client_cpno`, `client_email`, `contact_person`, `cp_cpno`, `cp_email`) VALUES
(1, 'Jupiter', 'Gentri', 'Cavite', '09456423123', 'jupiter@gmail.com', 'Beerus', '09635423328', 'beerus@gmail.com'),
(2, 'Champa', 'Javalera', 'Cavite', '09451235744', 'champa@gmail.com', 'Hestia', '09454321124', 'hestia@gmail.com'),
(3, 'Jhay Peter', 'Javalera', 'Cavite', '09987654321', 'peter@gmail.com', 'Champa', '09123456789', 'champa@gmail.com'),
(4, 'sample', 'sample_address', 'cavite', '09546124454', 'clientsample@gmail.com', 'Sample Contact Person', '09545642136', 'jhonpeterjamiladan@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `owner_name` varchar(255) NOT NULL,
  `payment_name` varchar(255) NOT NULL,
  `payment_cost` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`owner_name`, `payment_name`, `payment_cost`, `payment_id`) VALUES
('c1_lastname, c1_firstname', 'Bahay Kubo', 1000000, 1),
('sample_ln, sample_fn', 'Sample Project', 1000000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `payment_list`
--

CREATE TABLE `payment_list` (
  `payment_name` varchar(255) NOT NULL,
  `payment1` int(11) NOT NULL,
  `p1_date` varchar(255) NOT NULL,
  `payment2` int(11) NOT NULL,
  `p2_date` varchar(255) NOT NULL,
  `payment3` int(11) NOT NULL,
  `p3_date` varchar(255) NOT NULL,
  `payment4` int(11) NOT NULL,
  `p4_date` varchar(255) NOT NULL,
  `payment5` int(11) NOT NULL,
  `p5_date` varchar(255) NOT NULL,
  `payment6` int(11) NOT NULL,
  `p6_date` varchar(255) NOT NULL,
  `payment7` int(11) NOT NULL,
  `p7_date` varchar(255) NOT NULL,
  `payment8` int(11) NOT NULL,
  `p8_date` varchar(255) NOT NULL,
  `payment9` int(11) NOT NULL,
  `p9_date` varchar(255) NOT NULL,
  `payment10` int(11) NOT NULL,
  `p10_date` varchar(255) NOT NULL,
  `payment11` int(11) NOT NULL,
  `p11_date` varchar(255) NOT NULL,
  `payment12` int(11) NOT NULL,
  `p12_date` varchar(255) NOT NULL,
  `payment13` int(11) NOT NULL,
  `p13_date` varchar(255) NOT NULL,
  `payment14` int(11) NOT NULL,
  `p14_date` varchar(255) NOT NULL,
  `payment15` int(11) NOT NULL,
  `p15_date` varchar(255) NOT NULL,
  `payment16` int(11) NOT NULL,
  `p16_date` varchar(255) NOT NULL,
  `payment17` int(11) NOT NULL,
  `p17_date` varchar(255) NOT NULL,
  `payment18` int(11) NOT NULL,
  `p18_date` varchar(255) NOT NULL,
  `payment19` int(11) NOT NULL,
  `p19_date` varchar(255) NOT NULL,
  `payment20` int(11) NOT NULL,
  `p20_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_list`
--

INSERT INTO `payment_list` (`payment_name`, `payment1`, `p1_date`, `payment2`, `p2_date`, `payment3`, `p3_date`, `payment4`, `p4_date`, `payment5`, `p5_date`, `payment6`, `p6_date`, `payment7`, `p7_date`, `payment8`, `p8_date`, `payment9`, `p9_date`, `payment10`, `p10_date`, `payment11`, `p11_date`, `payment12`, `p12_date`, `payment13`, `p13_date`, `payment14`, `p14_date`, `payment15`, `p15_date`, `payment16`, `p16_date`, `payment17`, `p17_date`, `payment18`, `p18_date`, `payment19`, `p19_date`, `payment20`, `p20_date`) VALUES
('Bahay Kubo', 10000, '2022-04-24', 20000, '2022-04-24', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, ''),
('Sample Project', 100000, '2022-04-25', 400000, '2022-04-25', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `project_id` int(11) NOT NULL,
  `owner_name` varchar(255) NOT NULL,
  `proj_name` varchar(255) NOT NULL,
  `proj_address` varchar(255) NOT NULL,
  `proj_type` varchar(255) NOT NULL,
  `proj_desc` text NOT NULL,
  `budget` varchar(255) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `cp_cpno` varchar(255) NOT NULL,
  `cp_email` varchar(255) NOT NULL,
  `ce_name` varchar(255) NOT NULL,
  `ce_cpno` varchar(255) NOT NULL,
  `ce_email` varchar(255) NOT NULL,
  `a_name` varchar(255) NOT NULL,
  `a_cpno` varchar(255) NOT NULL,
  `a_email` varchar(255) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_cpno` varchar(255) NOT NULL,
  `c_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `owner_name`, `proj_name`, `proj_address`, `proj_type`, `proj_desc`, `budget`, `start_date`, `end_date`, `contact_person`, `cp_cpno`, `cp_email`, `ce_name`, `ce_cpno`, `ce_email`, `a_name`, `a_cpno`, `a_email`, `c_name`, `c_cpno`, `c_email`) VALUES
(1, 'c1_lastname, c1_firstname', 'Sample Project Name1', 'Sample Project Address1', 'Sample Project Address1', 'Sample General Description1', '1000000', '2022-01-01', '2023-01-01', 'Sample of Contact Person1', '09123456789', 'contactperson1@gmail.com', 'Sample Civil Engineer Name1', '09099090904', 'civilenginee1r@gmail.com', 'Sample Architect Name1', '09654213248', 'architect1@gmail.com', 'Sample Contractor Name1', 'Sample Project Address1', 'Sample Project Address1'),
(2, 'sample_ln, sample_fn', 'Sample Project Name 2', 'Sample Project Address 2', 'Sample Type of Project 2', 'Sample General Description 2', '1000000', '2022-01-01', '2023-01-01', 'Sample of Contact Person 2', '09876543210', 'contactperson2@gmail.com', 'Sample Civil Engineer Name 2', '09099090904', 'civilengineer2@gmail.com', 'Sample Architect Name 2', '09654213248', 'architect2@gmail.com', 'Sample Contractor Name 2', '09897451321', 'contractor2@gmail.com'),
(3, 'sample_lastname, sample_firstname', 'Sample Name3', 'Sample Address3', 'Sample Address3', 'Sample Description3', '2000000', '2022-01-01', '2025-01-01', 'Sample Contact3', '0954654512142', 'sample3@gmail.com', 'sample name 3', '096545421452', 'samplece3@gmail.com', 'sample architect', '09513272114', 'sample_a@gmail.com', 'sample contractor 3', 'Sample Address3', 'samplecontractor@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `cpno` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `accesslevel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`lastname`, `firstname`, `middlename`, `cpno`, `username`, `email`, `password`, `accesslevel`) VALUES
('Lastname', 'Firstname', 'Middlename', '09123456789', 'admin', 'sample_admin@gmail.com', '1234', 'ADMIN'),
('c1_lastname', 'c1_firstname', 'c1_middlename', '09987654321', 'client1', 'client1@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'CLIENT'),
('sample_ln', 'sample_fn', 'sample_mn', '09098765432', 'client2', 'client2@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'CLIENT'),
('sample_lastname', 'sample_firstname', 'sample_middlename', '0999999944', 'client3', 'client3@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'CLIENT');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
