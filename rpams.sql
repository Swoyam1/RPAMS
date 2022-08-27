-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2022 at 11:30 AM
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
-- Database: `rpams`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_notifications`
--

CREATE TABLE `admin_notifications` (
  `Notification_ID` bigint(20) NOT NULL,
  `Admin_ID` bigint(20) NOT NULL,
  `Subject` varchar(250) NOT NULL,
  `Content` varchar(250) NOT NULL,
  `Status` tinyint(1) NOT NULL DEFAULT 0,
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `Redirect_To` varchar(250) NOT NULL,
  `Pending_Application_Count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `drone_activity`
--

CREATE TABLE `drone_activity` (
  `Tracking_ID` bigint(255) NOT NULL,
  `User_ID` bigint(20) NOT NULL,
  `Drone_ID` varchar(50) NOT NULL,
  `Latitude` float(10,7) NOT NULL,
  `Longitude` float(10,7) NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `Flight_ID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drone_activity`
--

INSERT INTO `drone_activity` (`Tracking_ID`, `User_ID`, `Drone_ID`, `Latitude`, `Longitude`, `Timestamp`, `Flight_ID`) VALUES
(7, 1, '189CEB9BA20876', 27.7020664, 85.3311462, '2020-05-31 04:08:58', 50),
(8, 1, '189CEB9BA20876', 27.7021656, 85.3312454, '2020-05-31 04:09:00', 50),
(9, 1, '189CEB9BA20876', 27.7022667, 85.3313446, '2020-05-31 04:09:13', 50),
(10, 1, '189CEB9BA20876', 27.7023659, 85.3315430, '2020-05-31 04:09:28', 50),
(11, 1, '189CEB9BA20876', 27.7024670, 85.3317413, '2020-05-31 04:09:44', 50),
(12, 1, '189CEB9BA20876', 27.7020664, 85.3311462, '2020-05-31 04:10:17', 139),
(13, 1, '189CEB9BA20876', 27.7021656, 85.3313446, '2020-05-31 04:10:19', 139),
(14, 1, '189CEB9BA20876', 27.7022686, 85.3315430, '2020-05-31 04:10:24', 139),
(15, 1, '189CEB9BA20876', 27.7023697, 85.3317490, '2020-05-31 04:10:39', 139),
(16, 1, '189CEB9BA20876', 27.7024651, 85.3319473, '2020-05-31 04:10:54', 139),
(17, 1, '189CEB9BA20876', 27.7025661, 85.3321457, '2020-05-31 04:11:09', 139),
(18, 1, '189CEB9BA20876', 27.7026577, 85.3323441, '2020-05-31 04:11:24', 139),
(19, 1, '189CEB9BA20876', 27.6824055, 85.3573608, '2020-06-06 11:20:55', 140),
(20, 1, '189CEB9BA20876', 27.6824055, 85.3573608, '2020-06-06 11:21:34', 140),
(21, 1, '189CEB9BA208', 12.9801626, 79.1661301, '2022-08-27 09:15:17', 143),
(22, 1, '189CEB9BA208', 12.9801626, 79.1661301, '2022-08-27 09:15:19', 143),
(23, 1, '189CEB9BA208', 12.9801626, 79.1661301, '2022-08-27 09:15:26', 143),
(24, 1, '189CEB9BA208', 12.9801626, 79.1661301, '2022-08-27 09:15:53', 143),
(25, 1, '189CEB9BA208', 12.9801626, 79.1661301, '2022-08-27 09:15:56', 143),
(26, 1, '189CEB9BA208', 12.9801626, 79.1661301, '2022-08-27 09:16:18', 143),
(27, 1, '189CEB9BA208', 12.9801626, 79.1661301, '2022-08-27 09:16:28', 143),
(28, 1, '189CEB9BA208', 12.9801626, 79.1661301, '2022-08-27 09:17:49', 143),
(29, 1, '189CEB9BA208', 12.9801626, 79.1661301, '2022-08-27 09:17:49', 143),
(30, 1, '189CEB9BA208', 12.9801626, 79.1661301, '2022-08-27 09:17:49', 143),
(31, 1, '189CEB9BA208', 12.9801626, 79.1661301, '2022-08-27 09:17:49', 143),
(32, 1, '189CEB9BA208', 12.9801626, 79.1661301, '2022-08-27 09:17:49', 143),
(33, 1, '189CEB9BA208', 12.9801626, 79.1661301, '2022-08-27 09:17:56', 143),
(34, 1, '189CEB9BA208', 12.9801626, 79.1661301, '2022-08-27 09:18:11', 143),
(35, 1, '189CEB9BA208', 12.9801626, 79.1661301, '2022-08-27 09:18:26', 143),
(36, 1, '189CEB9BA208', 12.9801626, 79.1661301, '2022-08-27 09:18:41', 143),
(37, 1, '189CEB9BA208', 12.9801626, 79.1661301, '2022-08-27 09:18:56', 143),
(38, 1, '189CEB9BA208', 12.9801626, 79.1661301, '2022-08-27 09:19:11', 143),
(39, 1, '189CEB9BA208', 12.9801626, 79.1661301, '2022-08-27 09:20:17', 143),
(40, 1, '189CEB9BA208', 12.9801626, 79.1661301, '2022-08-27 09:20:18', 143),
(41, 1, '189CEB9BA208', 12.9801626, 79.1661301, '2022-08-27 09:20:18', 143),
(42, 1, '189CEB9BA208', 12.9801626, 79.1661301, '2022-08-27 09:20:18', 143),
(43, 1, '189CEB9BA208', 12.9801626, 79.1661301, '2022-08-27 09:20:28', 143);

-- --------------------------------------------------------

--
-- Table structure for table `drone_details`
--

CREATE TABLE `drone_details` (
  `User_ID` bigint(20) NOT NULL,
  `Drone_ID` varchar(50) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Nickname` varchar(100) NOT NULL,
  `Weight` int(11) NOT NULL,
  `Drone_UIN` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drone_details`
--

INSERT INTO `drone_details` (`User_ID`, `Drone_ID`, `Name`, `Nickname`, `Weight`, `Drone_UIN`) VALUES
(1, '189CEB9BA208', 'DJI Phantom 4 Pro', 'Mini s', 345, 'U0000'),
(1, '189CEB9BA20878', 'DJI Phantom 4 Pro', 'Mini Dr', 1338, 'U0000006');

-- --------------------------------------------------------

--
-- Table structure for table `flight_request`
--

CREATE TABLE `flight_request` (
  `Application_No` bigint(20) NOT NULL,
  `User_ID` bigint(20) NOT NULL,
  `Drone_ID` varchar(50) NOT NULL,
  `Zone_ID` bigint(20) NOT NULL,
  `Latitude` float(10,7) NOT NULL,
  `Longitude` float(10,7) NOT NULL,
  `Radius` int(11) NOT NULL,
  `Purpose` varchar(5000) NOT NULL,
  `Address` varchar(250) NOT NULL,
  `PIN_Code` varchar(10) NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` varchar(20) NOT NULL DEFAULT 'Processed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flight_request`
--

INSERT INTO `flight_request` (`Application_No`, `User_ID`, `Drone_ID`, `Zone_ID`, `Latitude`, `Longitude`, `Radius`, `Purpose`, `Address`, `PIN_Code`, `Timestamp`, `Status`) VALUES
(143, 1, '189CEB9BA208', 0, 12.9802933, 79.1666260, 1000, 't3', 'X5J8+4J Vellore, Tamil Nadu, India', '', '2022-08-27 09:15:08', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `green_zones`
--

CREATE TABLE `green_zones` (
  `Zone_ID` bigint(20) NOT NULL,
  `Latitude` float(10,7) NOT NULL,
  `Longitude` float(10,7) NOT NULL,
  `Radius` int(11) NOT NULL,
  `Category` varchar(250) NOT NULL,
  `Common_Name` varchar(250) NOT NULL,
  `Modified_By` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `green_zones`
--

INSERT INTO `green_zones` (`Zone_ID`, `Latitude`, `Longitude`, `Radius`, `Category`, `Common_Name`, `Modified_By`) VALUES
(1, 14.9991779, 74.3582153, 10000, 'Park', 'Anshi National Park', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `Notice_ID` bigint(250) NOT NULL,
  `Content` varchar(500) NOT NULL,
  `Link` varchar(500) NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Audience` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`Notice_ID`, `Content`, `Link`, `Timestamp`, `Audience`) VALUES
(1, 'Do & Don&apos;ts regarding operations of RPAS', 'https://digitalsky.dgca.gov.in/dos-donts', '2020-06-06 12:56:47', 'user'),
(2, 'Drone Ecosystem Policy Roadmap', 'https://www.civilaviation.gov.in/sites/default/files/Drone_Registration_Public_Notice_13012020.pdf', '2020-06-06 05:18:40', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `no_fly_zones`
--

CREATE TABLE `no_fly_zones` (
  `Zone_ID` bigint(20) NOT NULL,
  `Latitude` float(10,7) NOT NULL,
  `Longitude` float(10,7) NOT NULL,
  `Radius` int(11) NOT NULL,
  `Category` varchar(250) NOT NULL,
  `Common_Name` varchar(250) NOT NULL,
  `Modified_By` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `no_fly_zones`
--

INSERT INTO `no_fly_zones` (`Zone_ID`, `Latitude`, `Longitude`, `Radius`, `Category`, `Common_Name`, `Modified_By`) VALUES
(6, 28.5561790, 77.0999069, 5000, 'Airport', 'International Airport', 1),
(7, 12.9941874, 80.1708374, 5000, 'Airport', 'International Airport', 1),
(8, 22.6521168, 88.4462967, 5000, 'Airport', 'International Airport', 1),
(9, 17.2402630, 78.4293823, 5000, 'Airport', 'International Airport', 1),
(10, 19.0895596, 72.8656158, 5000, 'Airport', 'International Airport', 1),
(11, 13.1986351, 77.7065964, 5000, 'Airport', 'International Airport', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rpa_user_address`
--

CREATE TABLE `rpa_user_address` (
  `User_ID` int(11) NOT NULL,
  `Area` varchar(50) NOT NULL,
  `City` varchar(50) NOT NULL,
  `State` varchar(50) NOT NULL,
  `Country` varchar(50) NOT NULL,
  `PIN_Code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rpa_user_address`
--

INSERT INTO `rpa_user_address` (`User_ID`, `Area`, `City`, `State`, `Country`, `PIN_Code`) VALUES
(1, 'Katpadi', 'Vellore', 'Tamil Nadu', 'India', '632014');

-- --------------------------------------------------------

--
-- Table structure for table `rpa_user_details`
--

CREATE TABLE `rpa_user_details` (
  `User_ID` bigint(20) NOT NULL,
  `Full_Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phone_Number` bigint(10) NOT NULL,
  `Date_of_Birth` date NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `Nationality` varchar(255) NOT NULL,
  `Training_Status` varchar(20) NOT NULL,
  `Training_Certificate_Number` varchar(50) DEFAULT NULL,
  `Training_Certificate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rpa_user_details`
--

INSERT INTO `rpa_user_details` (`User_ID`, `Full_Name`, `Email`, `Phone_Number`, `Date_of_Birth`, `Gender`, `Nationality`, `Training_Status`, `Training_Certificate_Number`, `Training_Certificate`) VALUES
(1, 'Swoyam Pant', 'user@rpams.com', 9150468606, '2000-12-15', 'Male', 'India', 'Completed', '89BC0QR', '');

-- --------------------------------------------------------

--
-- Table structure for table `rpa_user_login_credentials`
--

CREATE TABLE `rpa_user_login_credentials` (
  `User_ID` bigint(20) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Sign_Up_DATETIME` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rpa_user_login_credentials`
--

INSERT INTO `rpa_user_login_credentials` (`User_ID`, `Email`, `password`, `Sign_Up_DATETIME`) VALUES
(1, 'user@rpams.com', '$2y$10$WWousKkFrGYHIac0mAZineiXTecJmRKu8ZODyXLHbDL/sPWMO6UPi', '2020-02-14 14:29:04');

-- --------------------------------------------------------

--
-- Table structure for table `temporary_no_fly_zones`
--

CREATE TABLE `temporary_no_fly_zones` (
  `Zone_ID` bigint(20) NOT NULL,
  `Latitude` float(10,7) NOT NULL,
  `Longitude` float(10,7) NOT NULL,
  `Radius` int(11) NOT NULL,
  `Category` varchar(250) NOT NULL,
  `Common_Name` varchar(250) NOT NULL,
  `Timestamp_From` timestamp NULL DEFAULT current_timestamp(),
  `Timestamp_To` timestamp NULL DEFAULT NULL,
  `Modified_By` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `temporary_no_fly_zones`
--

INSERT INTO `temporary_no_fly_zones` (`Zone_ID`, `Latitude`, `Longitude`, `Radius`, `Category`, `Common_Name`, `Timestamp_From`, `Timestamp_To`, `Modified_By`) VALUES
(1, 12.9996233, 77.5922318, 733, 'Government Office', 'Bangalore Palace', '2020-06-05 20:54:00', '2020-06-30 02:54:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_notifications`
--

CREATE TABLE `users_notifications` (
  `Notification_ID` bigint(20) NOT NULL,
  `User_ID` bigint(20) NOT NULL,
  `Subject` varchar(250) NOT NULL,
  `Content` varchar(250) NOT NULL,
  `Status` tinyint(1) NOT NULL DEFAULT 0,
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `Redirect_To` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_notifications`
--

INSERT INTO `users_notifications` (`Notification_ID`, `User_ID`, `Subject`, `Content`, `Status`, `Timestamp`, `Redirect_To`) VALUES
(1, 1, 'New Drone Registerd', 'A new drone was added to your account.', 1, '2020-05-23 04:18:54', 'users/drone.php'),
(2, 1, 'New Drone Registerd', 'A new drone was added to your account.', 1, '2020-05-23 04:20:28', 'users/drone.php'),
(3, 1, 'New Drone Registerd', 'A new drone was added to your account.', 1, '2020-05-23 04:26:43', 'users/drone.php'),
(4, 1, 'New Drone Registerd', 'A new drone was added to your account.', 1, '2020-05-23 07:42:03', 'users/drone.php'),
(5, 1, 'New Drone Registerd', 'A new drone was added to your account.', 1, '2020-05-23 08:14:20', 'users/drone.php'),
(6, 1, 'New Drone Registerd', 'A new drone was added to your account.', 1, '2020-05-23 11:12:02', 'users/drone.php'),
(7, 1, 'New Drone Registerd', 'A new drone was added to your account.', 1, '2020-05-23 11:12:53', 'users/drone.php'),
(8, 1, 'New Drone Registerd', 'A new drone was added to your account.', 1, '2020-05-23 11:14:57', 'users/drone.php'),
(9, 1, 'New Drone Registerd', 'A new drone was added to your account.', 1, '2020-05-23 11:17:25', 'users/drone.php'),
(10, 1, 'New Drone Registerd', 'A new drone was added to your account.', 1, '2020-05-23 11:17:48', 'users/drone.php'),
(11, 1, 'New Drone Registerd', 'A new drone was added to your account.', 1, '2020-05-23 11:22:55', 'users/drone.php'),
(12, 1, 'New Drone Registerd', 'A new drone was added to your account.', 1, '2020-05-23 11:24:08', 'users/drone.php'),
(13, 1, 'New Drone Registerd', 'A new drone was added to your account.', 1, '2020-05-23 11:24:41', 'users/drone.php'),
(14, 1, 'New Drone Registerd', 'A new drone was added to your account.', 1, '2020-05-23 11:32:00', 'users/drone.php'),
(15, 1, 'New Drone Registerd', 'A new drone was added to your account.', 1, '2020-05-23 11:33:18', 'users/drone.php'),
(16, 1, 'New Drone Registerd', 'A new drone was added to your account.', 1, '2020-05-23 11:51:41', 'users/drone.php'),
(17, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 14:18:09', 'users/application.php'),
(18, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 14:18:09', 'users/application.php'),
(19, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 14:18:09', 'users/application.php'),
(20, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 14:18:09', 'users/application.php'),
(21, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-24 14:19:09', 'users/application.php'),
(22, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 14:19:27', 'users/application.php'),
(23, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 14:19:27', 'users/application.php'),
(24, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 14:25:26', 'users/application.php'),
(25, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 14:25:27', 'users/application.php'),
(26, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 14:27:02', 'users/application.php'),
(27, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-24 14:30:24', 'users/application.php'),
(28, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 14:31:04', 'users/application.php'),
(29, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 14:31:15', 'users/application.php'),
(30, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 14:31:15', 'users/application.php'),
(31, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 14:31:15', 'users/application.php'),
(32, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-24 14:33:02', 'users/application.php'),
(33, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-24 14:33:18', 'users/application.php'),
(34, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 14:33:26', 'users/application.php'),
(35, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 14:33:31', 'users/application.php'),
(36, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 14:33:31', 'users/application.php'),
(37, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 15:53:48', 'users/application.php'),
(38, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 15:53:48', 'users/application.php'),
(39, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 15:53:48', 'users/application.php'),
(40, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-24 15:55:36', 'users/application.php'),
(41, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-24 15:55:52', 'users/application.php'),
(42, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 15:56:03', 'users/application.php'),
(43, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 15:56:08', 'users/application.php'),
(44, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 15:56:08', 'users/application.php'),
(45, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-24 15:59:19', 'users/application.php'),
(46, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-24 15:59:32', 'users/application.php'),
(47, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 15:59:44', 'users/application.php'),
(48, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 15:59:52', 'users/application.php'),
(49, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 15:59:53', 'users/application.php'),
(50, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-24 16:01:14', 'users/application.php'),
(51, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-24 16:01:26', 'users/application.php'),
(52, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 16:01:37', 'users/application.php'),
(53, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 16:02:05', 'users/application.php'),
(54, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 16:02:05', 'users/application.php'),
(55, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 16:02:05', 'users/application.php'),
(56, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 16:02:05', 'users/application.php'),
(57, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 16:02:05', 'users/application.php'),
(58, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 16:02:05', 'users/application.php'),
(59, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 16:02:06', 'users/application.php'),
(60, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-24 16:03:04', 'users/application.php'),
(61, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-24 16:03:27', 'users/application.php'),
(62, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 16:03:38', 'users/application.php'),
(63, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 16:03:47', 'users/application.php'),
(64, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 16:03:47', 'users/application.php'),
(65, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-24 16:18:37', 'users/application.php'),
(66, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-24 16:18:53', 'users/application.php'),
(67, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 16:24:57', 'users/application.php'),
(68, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 16:24:57', 'users/application.php'),
(69, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 16:24:57', 'users/application.php'),
(70, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 16:24:57', 'users/application.php'),
(71, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-24 16:29:28', 'users/application.php'),
(72, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 16:29:48', 'users/application.php'),
(73, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 16:29:49', 'users/application.php'),
(74, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 16:29:49', 'users/application.php'),
(75, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-24 16:31:17', 'users/application.php'),
(76, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-24 16:35:37', 'users/application.php'),
(77, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 16:35:51', 'users/application.php'),
(78, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 16:36:03', 'users/application.php'),
(79, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 16:36:03', 'users/application.php'),
(80, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-24 16:47:01', 'users/application.php'),
(81, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-24 16:47:12', 'users/application.php'),
(82, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 16:47:19', 'users/application.php'),
(83, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 16:47:23', 'users/application.php'),
(84, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 16:47:38', 'users/application.php'),
(85, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-24 16:50:32', 'users/application.php'),
(86, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-24 16:50:48', 'users/application.php'),
(87, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-24 16:51:06', 'users/application.php'),
(88, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 16:51:19', 'users/application.php'),
(89, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 16:51:33', 'users/application.php'),
(90, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 16:51:56', 'users/application.php'),
(91, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-24 16:55:16', 'users/application.php'),
(92, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-24 16:55:56', 'users/application.php'),
(93, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-24 16:55:58', 'users/application.php'),
(94, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-24 16:55:59', 'users/application.php'),
(95, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-24 16:55:59', 'users/application.php'),
(96, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 16:56:28', 'users/application.php'),
(97, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 16:56:53', 'users/application.php'),
(98, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 16:57:04', 'users/application.php'),
(99, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 16:57:12', 'users/application.php'),
(100, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 16:57:19', 'users/application.php'),
(101, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-24 16:57:24', 'users/application.php'),
(102, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-24 16:57:25', 'users/application.php'),
(103, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-24 16:57:26', 'users/application.php'),
(104, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-24 16:57:27', 'users/application.php'),
(105, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-24 16:57:28', 'users/application.php'),
(106, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 16:57:45', 'users/application.php'),
(107, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 16:57:50', 'users/application.php'),
(108, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 16:57:58', 'users/application.php'),
(109, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-24 16:59:53', 'users/application.php'),
(110, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-24 16:59:54', 'users/application.php'),
(111, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-24 16:59:55', 'users/application.php'),
(112, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 17:03:10', 'users/application.php'),
(113, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-24 17:03:13', 'users/application.php'),
(114, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-25 03:11:25', 'users/application.php'),
(115, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-25 03:11:28', 'users/application.php'),
(116, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 03:12:57', 'users/application.php'),
(117, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 03:12:59', 'users/application.php'),
(118, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 03:13:00', 'users/application.php'),
(119, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 03:13:01', 'users/application.php'),
(120, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-25 03:17:54', 'users/application.php'),
(121, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-25 03:17:59', 'users/application.php'),
(122, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-25 03:18:21', 'users/application.php'),
(123, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 03:19:59', 'users/application.php'),
(124, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 03:20:00', 'users/application.php'),
(125, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 03:20:01', 'users/application.php'),
(126, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-25 03:20:07', 'users/application.php'),
(127, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-25 03:20:10', 'users/application.php'),
(128, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-25 03:41:45', 'users/application.php'),
(129, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-25 03:41:55', 'users/application.php'),
(130, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 03:42:01', 'users/application.php'),
(131, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 03:42:01', 'users/application.php'),
(132, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 03:42:02', 'users/application.php'),
(133, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 03:42:02', 'users/application.php'),
(134, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-25 03:45:02', 'users/application.php'),
(135, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-25 03:45:48', 'users/application.php'),
(136, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-25 03:47:20', 'users/application.php'),
(137, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-25 03:47:27', 'users/application.php'),
(138, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-25 03:47:31', 'users/application.php'),
(139, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 03:48:09', 'users/application.php'),
(140, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 03:48:10', 'users/application.php'),
(141, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 03:48:11', 'users/application.php'),
(142, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 03:48:11', 'users/application.php'),
(143, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 03:48:12', 'users/application.php'),
(144, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-25 03:48:28', 'users/application.php'),
(145, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-25 03:48:31', 'users/application.php'),
(146, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 03:49:37', 'users/application.php'),
(147, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 03:49:37', 'users/application.php'),
(148, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-25 03:49:42', 'users/application.php'),
(149, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-25 03:49:46', 'users/application.php'),
(150, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 03:50:33', 'users/application.php'),
(151, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 03:50:34', 'users/application.php'),
(152, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-25 03:50:41', 'users/application.php'),
(153, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-25 03:51:04', 'users/application.php'),
(154, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 03:52:54', 'users/application.php'),
(155, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 03:52:55', 'users/application.php'),
(156, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-25 03:53:03', 'users/application.php'),
(157, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-25 03:53:27', 'users/application.php'),
(158, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-25 03:53:27', 'users/application.php'),
(159, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-25 03:53:27', 'users/application.php'),
(160, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-25 03:53:27', 'users/application.php'),
(161, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 04:06:36', 'users/application.php'),
(162, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 04:06:37', 'users/application.php'),
(163, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 04:06:37', 'users/application.php'),
(164, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 04:06:38', 'users/application.php'),
(165, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 04:06:38', 'users/application.php'),
(166, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-25 04:06:52', 'users/application.php'),
(167, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-25 04:07:09', 'users/application.php'),
(168, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 04:08:36', 'users/application.php'),
(169, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 04:08:37', 'users/application.php'),
(170, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-25 04:08:44', 'users/application.php'),
(171, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-25 04:08:48', 'users/application.php'),
(172, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-25 04:09:26', 'users/application.php'),
(173, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-25 04:09:31', 'users/application.php'),
(174, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 04:09:34', 'users/application.php'),
(175, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 04:09:34', 'users/application.php'),
(176, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 04:09:35', 'users/application.php'),
(177, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 04:09:35', 'users/application.php'),
(178, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-25 04:09:39', 'users/application.php'),
(179, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-25 04:09:43', 'users/application.php'),
(180, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-25 04:09:46', 'users/application.php'),
(181, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 04:09:51', 'users/application.php'),
(182, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 04:09:51', 'users/application.php'),
(183, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 04:09:52', 'users/application.php'),
(184, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-25 04:11:06', 'users/application.php'),
(185, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 04:28:50', 'users/application.php'),
(186, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-25 04:31:07', 'users/application.php'),
(187, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-25 04:31:07', 'users/application.php'),
(188, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-25 04:31:29', 'users/application.php'),
(189, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 04:52:03', 'users/application.php'),
(190, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 04:52:04', 'users/application.php'),
(191, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 04:52:04', 'users/application.php'),
(192, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-25 05:02:46', 'users/application.php'),
(193, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-25 05:03:00', 'users/application.php'),
(194, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-25 05:03:10', 'users/application.php'),
(195, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 05:03:25', 'users/application.php'),
(196, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 05:03:26', 'users/application.php'),
(197, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 05:03:27', 'users/application.php'),
(198, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-25 05:04:52', 'users/application.php'),
(199, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-25 05:05:02', 'users/application.php'),
(200, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-25 05:05:13', 'users/application.php'),
(201, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-25 05:14:35', 'users/application.php'),
(202, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 05:14:40', 'users/application.php'),
(203, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 05:14:40', 'users/application.php'),
(204, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 05:14:41', 'users/application.php'),
(205, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 05:14:41', 'users/application.php'),
(206, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-25 05:15:21', 'users/application.php'),
(207, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 05:15:29', 'users/application.php'),
(208, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-25 05:15:34', 'users/application.php'),
(209, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-25 05:15:47', 'users/application.php'),
(210, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-25 09:31:15', 'users/application.php'),
(211, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 09:31:30', 'users/application.php'),
(212, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 09:31:30', 'users/application.php'),
(213, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 09:31:31', 'users/application.php'),
(214, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 09:31:31', 'users/application.php'),
(215, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 09:31:32', 'users/application.php'),
(216, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-25 11:27:08', 'users/application.php'),
(217, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 11:27:54', 'users/application.php'),
(218, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-25 16:37:21', 'users/application.php'),
(219, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-25 16:37:52', 'users/application.php'),
(220, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-25 16:39:42', 'users/application.php'),
(221, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 16:39:56', 'users/application.php'),
(222, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 16:39:58', 'users/application.php'),
(223, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 16:40:00', 'users/application.php'),
(224, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-25 16:40:48', 'users/application.php'),
(225, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-25 17:17:46', 'users/application.php'),
(226, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2020-05-25 17:19:44', 'users/application.php'),
(227, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 17:22:22', 'users/application.php'),
(228, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 17:22:24', 'users/application.php'),
(229, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 17:22:26', 'users/application.php'),
(230, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 17:35:56', 'users/application.php'),
(231, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 17:36:00', 'users/application.php'),
(232, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 17:36:05', 'users/application.php'),
(233, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 17:44:10', 'users/application.php'),
(234, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 17:44:12', 'users/application.php'),
(235, 1, 'Flight Application Update!', 'Your flight application was approved.', 1, '2020-05-25 17:44:22', 'users/application.php'),
(236, 1, 'Flight Application Update!', 'Your flight application was approved.', 1, '2020-05-25 17:48:17', 'users/application.php'),
(237, 1, 'Flight Application Update!', 'Your flight application was rejected.', 1, '2020-05-25 17:48:56', 'users/application.php'),
(238, 1, 'Flight Application Update!', 'Your flight application was approved.', 1, '2020-05-25 17:54:26', 'users/application.php'),
(239, 1, 'Flight Application Update!', 'Your flight application was approved.', 1, '2020-05-25 17:54:41', 'users/application.php'),
(240, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 17:54:49', 'users/application.php'),
(241, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 17:54:50', 'users/application.php'),
(242, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 17:54:50', 'users/application.php'),
(243, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 17:54:51', 'users/application.php'),
(244, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 17:54:52', 'users/application.php'),
(245, 1, 'Flight Application Update!', 'Your flight application was approved.', 1, '2020-05-25 17:57:06', 'users/application.php'),
(246, 1, 'Flight Application Update!', 'Your flight application was rejected.', 1, '2020-05-25 17:57:44', 'users/application.php'),
(247, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 17:57:51', 'users/application.php'),
(248, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 17:57:51', 'users/application.php'),
(249, 1, 'Flight Application Update!', 'Your flight application was rejected.', 1, '2020-05-25 17:57:59', 'users/application.php'),
(250, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-25 17:58:03', 'users/application.php'),
(251, 1, 'Flight Application Update!', 'Your flight application was rejected.', 1, '2020-05-26 08:34:12', 'users/application.php'),
(252, 1, 'Flight Application Update!', 'Your flight application was rejected.', 1, '2020-05-26 08:35:42', 'users/application.php'),
(253, 1, 'Flight Application Update!', 'Your flight application was approved.', 1, '2020-05-26 08:39:45', 'users/application.php'),
(254, 1, 'Flight Application Update!', 'Your flight application was rejected.', 1, '2020-05-26 08:40:10', 'users/application.php'),
(255, 1, 'Flight Application Update!', 'Your flight application was approved.', 1, '2020-05-26 08:41:27', 'users/application.php'),
(256, 1, 'Flight Application Update!', 'Your flight application was approved.', 1, '2020-05-26 08:42:00', 'users/application.php'),
(257, 1, 'Flight Application Update!', 'Your flight application was approved.', 1, '2020-05-26 08:42:39', 'users/application.php'),
(258, 1, 'Flight Application Update!', 'Your flight application was rejected.', 1, '2020-05-26 08:47:15', 'users/application.php'),
(259, 1, 'Flight Application Update!', 'Your flight application was rejected.', 1, '2020-05-26 08:47:19', 'users/application.php'),
(260, 1, 'Flight Application Update!', 'Your flight application was rejected.', 1, '2020-05-26 08:47:22', 'users/application.php'),
(261, 1, 'Flight Application Update!', 'Your flight application was rejected.', 1, '2020-05-26 10:03:18', 'users/application.php'),
(262, 1, 'Flight Application Update!', 'Your flight application was rejected.', 1, '2020-05-26 10:06:28', 'users/application.php'),
(263, 1, 'Flight Application Update!', 'Your flight application was rejected.', 1, '2020-05-26 10:06:32', 'users/application.php'),
(264, 1, 'Flight Application Update!', 'Your flight application was rejected.', 1, '2020-05-26 10:06:35', 'users/application.php'),
(265, 1, 'Flight Application Update!', 'Your flight application was rejected.', 1, '2020-05-26 10:06:43', 'users/application.php'),
(266, 1, 'Flight Application Update!', 'Your flight application was rejected.', 1, '2020-05-26 10:06:49', 'users/application.php'),
(267, 1, 'Flight Application Update!', 'Your flight application was rejected.', 1, '2020-05-26 10:06:54', 'users/application.php'),
(268, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-26 10:07:41', 'users/application.php'),
(269, 1, 'Flight Application Update!', 'Your flight application was rejected.', 1, '2020-05-26 10:08:10', 'users/application.php'),
(270, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-26 10:10:15', 'users/application.php'),
(271, 1, 'Flight Application Update!', 'Your flight application was approved.', 1, '2020-05-26 10:11:29', 'users/application.php'),
(272, 1, 'Flight Application Update!', 'Your flight application was approved.', 1, '2020-05-26 10:29:41', 'users/application.php'),
(273, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-27 05:49:52', 'users/application.php'),
(274, 1, 'Flight Application Update!', 'Your flight application was approved.', 1, '2020-05-27 05:50:26', 'users/application.php'),
(275, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-05-30 08:18:09', 'users/application.php'),
(276, 1, 'Flight Application Update!', 'Your flight application was approved.', 1, '2020-05-30 08:18:40', 'users/application.php'),
(277, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2020-06-06 11:14:55', 'users/application.php'),
(278, 1, 'Flight Application Update!', 'Your flight application was approved.', 1, '2020-06-06 11:15:25', 'users/application.php'),
(279, 1, 'Flight application submitted!', 'Your flight application was submitted.', 1, '2022-08-27 08:32:43', 'users/application.php'),
(280, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2022-08-27 08:33:08', 'users/application.php'),
(281, 1, 'Flight application canceled!', 'Your flight application was canceled.', 1, '2022-08-27 08:33:18', 'users/application.php'),
(282, 1, 'Flight Application Update!', 'Your flight application was approved.', 0, '2022-08-27 08:35:19', 'users/application.php'),
(283, 1, 'Flight application submitted!', 'Your flight application was submitted.', 0, '2022-08-27 09:01:09', 'users/application.php'),
(284, 1, 'Flight Application Update!', 'Your flight application was approved.', 0, '2022-08-27 09:01:37', 'users/application.php'),
(285, 1, 'Flight application submitted!', 'Your flight application was submitted.', 0, '2022-08-27 09:14:49', 'users/application.php'),
(286, 1, 'Flight Application Update!', 'Your flight application was approved.', 0, '2022-08-27 09:15:08', 'users/application.php');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `drone_activity`
--
ALTER TABLE `drone_activity`
  ADD PRIMARY KEY (`Tracking_ID`);

--
-- Indexes for table `drone_details`
--
ALTER TABLE `drone_details`
  ADD PRIMARY KEY (`Drone_UIN`),
  ADD UNIQUE KEY `Drone_ID` (`Drone_ID`);

--
-- Indexes for table `flight_request`
--
ALTER TABLE `flight_request`
  ADD PRIMARY KEY (`Application_No`);

--
-- Indexes for table `green_zones`
--
ALTER TABLE `green_zones`
  ADD PRIMARY KEY (`Zone_ID`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`Notice_ID`);

--
-- Indexes for table `no_fly_zones`
--
ALTER TABLE `no_fly_zones`
  ADD PRIMARY KEY (`Zone_ID`);

--
-- Indexes for table `rpa_user_address`
--
ALTER TABLE `rpa_user_address`
  ADD PRIMARY KEY (`User_ID`);

--
-- Indexes for table `rpa_user_details`
--
ALTER TABLE `rpa_user_details`
  ADD PRIMARY KEY (`User_ID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `rpa_user_login_credentials`
--
ALTER TABLE `rpa_user_login_credentials`
  ADD PRIMARY KEY (`User_ID`),
  ADD UNIQUE KEY `email` (`Email`);

--
-- Indexes for table `temporary_no_fly_zones`
--
ALTER TABLE `temporary_no_fly_zones`
  ADD PRIMARY KEY (`Zone_ID`);

--
-- Indexes for table `users_notifications`
--
ALTER TABLE `users_notifications`
  ADD PRIMARY KEY (`Notification_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `drone_activity`
--
ALTER TABLE `drone_activity`
  MODIFY `Tracking_ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `flight_request`
--
ALTER TABLE `flight_request`
  MODIFY `Application_No` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `green_zones`
--
ALTER TABLE `green_zones`
  MODIFY `Zone_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `Notice_ID` bigint(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `no_fly_zones`
--
ALTER TABLE `no_fly_zones`
  MODIFY `Zone_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `rpa_user_login_credentials`
--
ALTER TABLE `rpa_user_login_credentials`
  MODIFY `User_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `temporary_no_fly_zones`
--
ALTER TABLE `temporary_no_fly_zones`
  MODIFY `Zone_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_notifications`
--
ALTER TABLE `users_notifications`
  MODIFY `Notification_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=287;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
