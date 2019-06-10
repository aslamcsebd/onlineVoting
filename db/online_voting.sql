-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2019 at 02:05 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_voting`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'admin@123');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_request`
--

CREATE TABLE `candidate_request` (
  `id` int(30) NOT NULL,
  `election_date` varchar(50) NOT NULL,
  `NID_No` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `election_type` varchar(100) NOT NULL,
  `party_name` varchar(100) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidate_request`
--

INSERT INTO `candidate_request` (`id`, `election_date`, `NID_No`, `name`, `photo`, `election_type`, `party_name`, `status`) VALUES
(10, '2019-06-17', '1987060320190616', 'Jamal Uddin', 'profile_picture/voter/voter.jpg', 'presidential_election', 'Bangladesh Awami League', 1),
(13, '2019-06-17', '1987060320190647', 'RahimKhan', 'profile_picture/voter/voter.jpg', 'presidential_election', 'National Party', 1),
(14, '2019-06-17', '1990061920190646', 'Rasel', 'profile_picture/voter/voter.jpg', 'presidential_election', 'Bangladesh Awami League', 1),
(15, '2019-06-25', '1988080220190613', 'Riaz', 'profile_picture/voter/voter.jpg', 'national_parliament_election', 'Bangladesh Nationalist Party - BNP', 0),
(16, '2019-06-26', '1988080220190613', 'Rahim', 'profile_picture/voter/voter.jpg', 'upazila_parishad_election', 'Bangladesh Nationalist Party - BNP', 0);

-- --------------------------------------------------------

--
-- Table structure for table `city_corporation_election`
--

CREATE TABLE `city_corporation_election` (
  `id` int(50) NOT NULL,
  `title` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `details` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city_corporation_election`
--

INSERT INTO `city_corporation_election` (`id`, `title`, `date`, `details`) VALUES
(3, 'The Presidential Election, published in the voter list of 2018', '2019-06-05', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

-- --------------------------------------------------------

--
-- Table structure for table `city_corporation_election_low`
--

CREATE TABLE `city_corporation_election_low` (
  `id` int(30) NOT NULL,
  `title` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `details` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city_corporation_election_low`
--

INSERT INTO `city_corporation_election_low` (`id`, `title`, `date`, `details`) VALUES
(1, 'The Presidential election_low, published in the voter list of 2018', '2019-06-05', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

-- --------------------------------------------------------

--
-- Table structure for table `elections`
--

CREATE TABLE `elections` (
  `id` int(30) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elections`
--

INSERT INTO `elections` (`id`, `name`) VALUES
(1, 'presidential_election'),
(2, 'national_parliament_election'),
(3, 'city_corporation_election'),
(4, 'zilla_parishad_election'),
(5, 'upazila_parishad_election'),
(6, 'municipality_election'),
(7, 'union_parishad_election');

-- --------------------------------------------------------

--
-- Table structure for table `elections_low`
--

CREATE TABLE `elections_low` (
  `id` int(30) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elections_low`
--

INSERT INTO `elections_low` (`id`, `name`) VALUES
(1, 'presidential_election_low'),
(2, 'national_parliament_election_low'),
(3, 'city_corporation_election_low'),
(4, 'zilla_parishad_election_low'),
(5, 'upazila_parishad_election_low'),
(6, 'municipality_election_low'),
(7, 'union_parishad_election_low');

-- --------------------------------------------------------

--
-- Table structure for table `election_session`
--

CREATE TABLE `election_session` (
  `id` int(30) NOT NULL,
  `election_date` date NOT NULL,
  `election_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `election_session`
--

INSERT INTO `election_session` (`id`, `election_date`, `election_type`) VALUES
(1, '2019-06-17', 'presidential_election');

-- --------------------------------------------------------

--
-- Table structure for table `election_winner`
--

CREATE TABLE `election_winner` (
  `id` int(11) NOT NULL,
  `election_id` int(11) NOT NULL,
  `election_name` varchar(255) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `candidate_name` varchar(255) NOT NULL,
  `party_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `election_winner`
--

INSERT INTO `election_winner` (`id`, `election_id`, `election_name`, `candidate_id`, `candidate_name`, `party_name`) VALUES
(1, 1, 'Parliament Election-2019', 14, 'Noor Mohammed Anik', 'Bangladesh Awami League'),
(2, 3, 'City Corporation Election-2019', 13, 'Anik Khan', 'National Party');

-- --------------------------------------------------------

--
-- Table structure for table `municipality_election`
--

CREATE TABLE `municipality_election` (
  `id` int(50) NOT NULL,
  `title` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `details` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `municipality_election`
--

INSERT INTO `municipality_election` (`id`, `title`, `date`, `details`) VALUES
(3, 'The Presidential Election, published in the voter list of 2018', '2019-06-05', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(4, 'The Presidential Election, published in the voter list of 2019', '2019-06-13', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(5, 'The Presidential Election, published in the voter list of 2018', '2019-06-05', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(6, 'The Presidential Election, published in the voter list of 2019', '2019-06-13', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

-- --------------------------------------------------------

--
-- Table structure for table `municipality_election_low`
--

CREATE TABLE `municipality_election_low` (
  `id` int(30) NOT NULL,
  `title` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `details` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `municipality_election_low`
--

INSERT INTO `municipality_election_low` (`id`, `title`, `date`, `details`) VALUES
(1, 'The Presidential election_low, published in the voter list of 2018', '2019-06-05', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(2, 'The Presidential election_low, published in the voter list of 2019', '2019-06-13', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(3, 'The Presidential election_low, published in the voter list of 2018', '2019-06-05', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(4, 'The Presidential election_low, published in the voter list of 2019', '2019-06-13', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

-- --------------------------------------------------------

--
-- Table structure for table `national_parliament_election`
--

CREATE TABLE `national_parliament_election` (
  `id` int(50) NOT NULL,
  `title` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `details` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `national_parliament_election`
--

INSERT INTO `national_parliament_election` (`id`, `title`, `date`, `details`) VALUES
(3, 'The Presidential Election, published in the voter list of 2018', '2019-06-05', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(4, 'The Presidential Election, published in the voter list of 2019', '2019-06-13', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(5, 'Nation election', '2019-06-20', 'election');

-- --------------------------------------------------------

--
-- Table structure for table `national_parliament_election_low`
--

CREATE TABLE `national_parliament_election_low` (
  `id` int(30) NOT NULL,
  `title` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `details` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `national_parliament_election_low`
--

INSERT INTO `national_parliament_election_low` (`id`, `title`, `date`, `details`) VALUES
(1, 'jhjhj', '2019-06-02', 'hjhjhj'),
(2, '1', '2019-06-02', '1');

-- --------------------------------------------------------

--
-- Table structure for table `online_election`
--

CREATE TABLE `online_election` (
  `election_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `date` varchar(255) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `online_election`
--

INSERT INTO `online_election` (`election_id`, `title`, `type`, `details`, `date`, `status`) VALUES
(1, 'Parliament Election-2019', 'national_parliament_election', 'Details About Parliament Election-2019', '2019-06-25', 1),
(2, 'City Corporation Election-2019', 'city_corporation_election', 'City Corporation Election-2019', '2019-06-26', 2),
(3, 'City Corporation Election-2019', 'city_corporation_election', 'City Corporation Election-2019', '2019-06-30', 2),
(4, 'fgfhfh', 'presidential_election', 'ffhfh', '2021-10-21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `online_election_candidate`
--

CREATE TABLE `online_election_candidate` (
  `id` int(11) NOT NULL,
  `election_id` int(11) NOT NULL,
  `election_name` varchar(255) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `candidate_name` varchar(255) NOT NULL,
  `party_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `online_election_candidate`
--

INSERT INTO `online_election_candidate` (`id`, `election_id`, `election_name`, `candidate_id`, `candidate_name`, `party_name`) VALUES
(4, 1, 'Parliament Election-2019', 10, 'Jamal Uddin', 'Bangladesh Awami League'),
(5, 1, 'Parliament Election-2019', 13, 'Anik Khan', 'National Party'),
(6, 1, 'Parliament Election-2019', 10, 'Jamal Uddin', 'Bangladesh Awami League'),
(7, 1, 'Parliament Election-2019', 10, 'Jamal Uddin', 'Bangladesh Awami League');

-- --------------------------------------------------------

--
-- Table structure for table `political_parties`
--

CREATE TABLE `political_parties` (
  `id` int(30) NOT NULL,
  `date` date NOT NULL,
  `party_name` varchar(50) NOT NULL,
  `symbol_name` varchar(30) NOT NULL,
  `symbol` varchar(100) NOT NULL,
  `president_name` varchar(50) NOT NULL,
  `president_photo` varchar(100) NOT NULL,
  `secretary_general` varchar(50) NOT NULL,
  `secretary_photo` varchar(100) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `political_parties`
--

INSERT INTO `political_parties` (`id`, `date`, `party_name`, `symbol_name`, `symbol`, `president_name`, `president_photo`, `secretary_general`, `secretary_photo`, `contact`, `email`, `address`) VALUES
(1, '2008-10-20', 'Liberal Democratic Party', 'Umbrella', 'profile_picture/political_party/Chhata.PNG', 'Doctor Oli Ahmad, Bir Bikram', 'profile_picture/political_party/Oli.jpg', 'Doctor Redwan Ahmed', 'profile_picture/political_party/Redwan.jpg', '01979-411308', 'ldp@gmail.com', '29 / B, Morning Post Tower (3rd Floor), East Panthapath, Thana-Tejgaon C / A, Dhaka-1208'),
(2, '2008-11-03', 'Bangladesh Awami League', 'Boat', 'profile_picture/political_party/nouka.PNG', 'Sheikh Hasina MP', 'profile_picture/political_party/Shekh Hasina.jpg', 'Obaidul Quader MP', 'profile_picture/political_party/Obaidul Kader.jpg', '01671-575446', 'alparty1949@gmail.com', '23, Bangabandhu Avenue, Ramna, Dhaka. President Office, House-51 / A, Road-3 / A, Dhanmondi A / A, Dhaka.'),
(3, '2008-11-03', 'Bangladesh Nationalist Party - BNP', 'Rice pine', 'profile_picture/political_party/dhaner sis.PNG', 'Begum Khaleda Zia', 'profile_picture/political_party/Khaleda Zia.jpg', 'Mirza Fakhrul Islam Alamgir', 'profile_picture/political_party/Mirza Fakrul.jpg', '01720385491', 'bnpcentral@gmail.com', 'Central Office 28/1, Nayapaltan (VIP Road), Dhaka-1000'),
(4, '2008-11-03', 'National Party', 'Plow', 'profile_picture/political_party/nagol.PNG', 'Hussein Muhammad Ershad', 'profile_picture/political_party/HM Ershad.jpg', '', 'profile_picture/political_party/', '01711662888', 'press.jatiyoparty@gmail.com', '66, Pioneer Road, Kakrail, Dhaka-1000'),
(5, '2008-11-09', 'Bangladesh Jatiya Party-BJP', 'Cart', 'profile_picture/political_party/gorur gari.PNG', 'Barrister Andalov Rahman', 'profile_picture/political_party/Partho.jpg', '', 'profile_picture/political_party/', '', 'admin@gmail.com', '50, DIT Extension Road, Estuaryview (5th Floor), Naya Paltan, Dhaka-1000\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `presidential_election`
--

CREATE TABLE `presidential_election` (
  `id` int(50) NOT NULL,
  `title` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `details` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `presidential_election`
--

INSERT INTO `presidential_election` (`id`, `title`, `date`, `details`) VALUES
(3, 'The Presidential Election, published in the voter list of 2018', '2019-06-05', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(5, 'Title', '2019-06-24', 'Presidential Election 2019');

-- --------------------------------------------------------

--
-- Table structure for table `presidential_election_low`
--

CREATE TABLE `presidential_election_low` (
  `id` int(30) NOT NULL,
  `title` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `details` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `presidential_election_low`
--

INSERT INTO `presidential_election_low` (`id`, `title`, `date`, `details`) VALUES
(1, 'Law', '2019-06-10', 'Law Details');

-- --------------------------------------------------------

--
-- Table structure for table `sub_admin`
--

CREATE TABLE `sub_admin` (
  `id` int(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_admin`
--

INSERT INTO `sub_admin` (`id`, `email`, `password`) VALUES
(1, 'subadmin@gmail.com', 'subadmin@123');

-- --------------------------------------------------------

--
-- Table structure for table `union_parishad_election`
--

CREATE TABLE `union_parishad_election` (
  `id` int(50) NOT NULL,
  `title` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `details` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `union_parishad_election`
--

INSERT INTO `union_parishad_election` (`id`, `title`, `date`, `details`) VALUES
(3, 'The Presidential Election, published in the voter list of 2018', '2019-06-05', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(4, 'The Presidential Election, published in the voter list of 2019', '2019-06-13', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(5, 'The Presidential Election, published in the voter list of 2018', '2019-06-05', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(6, 'The Presidential Election, published in the voter list of 2019', '2019-06-13', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

-- --------------------------------------------------------

--
-- Table structure for table `union_parishad_election_low`
--

CREATE TABLE `union_parishad_election_low` (
  `id` int(30) NOT NULL,
  `title` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `details` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `union_parishad_election_low`
--

INSERT INTO `union_parishad_election_low` (`id`, `title`, `date`, `details`) VALUES
(2, 'The Presidential election_low, published in the voter list of 2019', '2019-06-13', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(3, 'The Presidential election_low, published in the voter list of 2018', '2019-06-05', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(4, 'The Presidential election_low, published in the voter list of 2019', '2019-06-13', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(5, 'add more', '2019-06-04', 'add more');

-- --------------------------------------------------------

--
-- Table structure for table `upazila_parishad_election`
--

CREATE TABLE `upazila_parishad_election` (
  `id` int(50) NOT NULL,
  `title` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `details` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upazila_parishad_election`
--

INSERT INTO `upazila_parishad_election` (`id`, `title`, `date`, `details`) VALUES
(3, 'The Presidential Election, published in the voter list of 2018', '2019-06-05', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(4, 'The Presidential Election, published in the voter list of 2019', '2019-06-13', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(5, 'The Presidential Election, published in the voter list of 2018', '2019-06-05', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(6, 'The Presidential Election, published in the voter list of 2019', '2019-06-13', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

-- --------------------------------------------------------

--
-- Table structure for table `upazila_parishad_election_low`
--

CREATE TABLE `upazila_parishad_election_low` (
  `id` int(30) NOT NULL,
  `title` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `details` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upazila_parishad_election_low`
--

INSERT INTO `upazila_parishad_election_low` (`id`, `title`, `date`, `details`) VALUES
(1, 'The Presidential election_low, published in the voter list of 2018', '2019-06-05', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(2, 'The Presidential election_low, published in the voter list of 2019', '2019-06-13', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(3, 'The Presidential election_low, published in the voter list of 2018', '2019-06-05', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(4, 'The Presidential election_low, published in the voter list of 2019', '2019-06-13', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(5, '555', '2019-06-04', '5555');

-- --------------------------------------------------------

--
-- Table structure for table `voter_info`
--

CREATE TABLE `voter_info` (
  `id` int(30) NOT NULL,
  `dob` date NOT NULL,
  `NID_No` varchar(50) NOT NULL,
  `secret_code` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `father` varchar(50) NOT NULL,
  `mother` varchar(50) NOT NULL,
  `contact` int(50) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `blood_Group` varchar(30) NOT NULL,
  `address` varchar(500) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voter_info`
--

INSERT INTO `voter_info` (`id`, `dob`, `NID_No`, `secret_code`, `name`, `email`, `father`, `mother`, `contact`, `gender`, `blood_Group`, `address`, `photo`, `status`) VALUES
(3, '0000-00-00', '1988080220190613', '147852369', 'Rahim', 'rahim@gmail.com', 'Father', 'Mother', 1680607293, 'Male', 'B-', 'Dhaka', 'profile_picture/voter/voter.jpg', 1),
(4, '1988-10-06', '1987060320190614', '0275c754', 'Kabir', 'kabir@gmail.com', 'Father', 'Mother', 1680607293, 'Male', 'A+', 'agrabad', 'profile_picture/voter/voter.jpg', 0),
(5, '1985-10-06', '1968060220190617', 'd0275fdd', 'Kobir', 'kobir@gmail.com', 'Father', 'Mother', 1680607293, 'Male', 'O+', 'agrabad', 'profile_picture/voter/voter.jpg', 0),
(6, '1983-10-06', '1986060320190618', '02987ec2', 'Sifat', 'sifat@gmail.com', 'Father', 'Mother', 1680607293, 'Male', 'O+', 'Chittagong', 'profile_picture/voter/voter.jpg', 0),
(20, '1980-10-06', '1988080220190615', '0274dc10', 'Rahim', 'rahim@gmail.com', 'Father', 'Mother', 1680607293, 'Male', 'B-', 'Dhaka', 'profile_picture/voter/voter.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vote_count`
--

CREATE TABLE `vote_count` (
  `id` int(11) NOT NULL,
  `election_id` varchar(255) NOT NULL,
  `candidate_id` varchar(255) NOT NULL,
  `voter_nid` varchar(255) NOT NULL,
  `voter_secret_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vote_count`
--

INSERT INTO `vote_count` (`id`, `election_id`, `candidate_id`, `voter_nid`, `voter_secret_code`) VALUES
(5, '1', '10', '1990061920190646', '1212');

-- --------------------------------------------------------

--
-- Table structure for table `zilla_parishad_election`
--

CREATE TABLE `zilla_parishad_election` (
  `id` int(50) NOT NULL,
  `title` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `details` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zilla_parishad_election`
--

INSERT INTO `zilla_parishad_election` (`id`, `title`, `date`, `details`) VALUES
(3, 'The Presidential Election, published in the voter list of 2018', '2019-06-05', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(4, 'The Presidential Election, published in the voter list of 2019', '2019-06-13', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

-- --------------------------------------------------------

--
-- Table structure for table `zilla_parishad_election_low`
--

CREATE TABLE `zilla_parishad_election_low` (
  `id` int(30) NOT NULL,
  `title` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `details` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zilla_parishad_election_low`
--

INSERT INTO `zilla_parishad_election_low` (`id`, `title`, `date`, `details`) VALUES
(1, 'The Presidential election_low, published in the voter list of 2018', '2019-06-05', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(2, 'The Presidential election_low, published in the voter list of 2019', '2019-06-13', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(3, '333', '2019-06-11', '333'),
(4, '44', '2019-05-28', '444');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidate_request`
--
ALTER TABLE `candidate_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city_corporation_election`
--
ALTER TABLE `city_corporation_election`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city_corporation_election_low`
--
ALTER TABLE `city_corporation_election_low`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `elections`
--
ALTER TABLE `elections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `election_session`
--
ALTER TABLE `election_session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `election_winner`
--
ALTER TABLE `election_winner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `municipality_election`
--
ALTER TABLE `municipality_election`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `municipality_election_low`
--
ALTER TABLE `municipality_election_low`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `national_parliament_election`
--
ALTER TABLE `national_parliament_election`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `national_parliament_election_low`
--
ALTER TABLE `national_parliament_election_low`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `online_election`
--
ALTER TABLE `online_election`
  ADD PRIMARY KEY (`election_id`);

--
-- Indexes for table `online_election_candidate`
--
ALTER TABLE `online_election_candidate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `political_parties`
--
ALTER TABLE `political_parties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `presidential_election`
--
ALTER TABLE `presidential_election`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `presidential_election_low`
--
ALTER TABLE `presidential_election_low`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_admin`
--
ALTER TABLE `sub_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `union_parishad_election`
--
ALTER TABLE `union_parishad_election`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `union_parishad_election_low`
--
ALTER TABLE `union_parishad_election_low`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upazila_parishad_election`
--
ALTER TABLE `upazila_parishad_election`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upazila_parishad_election_low`
--
ALTER TABLE `upazila_parishad_election_low`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voter_info`
--
ALTER TABLE `voter_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vote_count`
--
ALTER TABLE `vote_count`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zilla_parishad_election`
--
ALTER TABLE `zilla_parishad_election`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zilla_parishad_election_low`
--
ALTER TABLE `zilla_parishad_election_low`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `candidate_request`
--
ALTER TABLE `candidate_request`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `city_corporation_election`
--
ALTER TABLE `city_corporation_election`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `city_corporation_election_low`
--
ALTER TABLE `city_corporation_election_low`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `elections`
--
ALTER TABLE `elections`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `election_session`
--
ALTER TABLE `election_session`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `election_winner`
--
ALTER TABLE `election_winner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `municipality_election`
--
ALTER TABLE `municipality_election`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `municipality_election_low`
--
ALTER TABLE `municipality_election_low`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `national_parliament_election`
--
ALTER TABLE `national_parliament_election`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `national_parliament_election_low`
--
ALTER TABLE `national_parliament_election_low`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `online_election`
--
ALTER TABLE `online_election`
  MODIFY `election_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `online_election_candidate`
--
ALTER TABLE `online_election_candidate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `political_parties`
--
ALTER TABLE `political_parties`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `presidential_election`
--
ALTER TABLE `presidential_election`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `presidential_election_low`
--
ALTER TABLE `presidential_election_low`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_admin`
--
ALTER TABLE `sub_admin`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `union_parishad_election`
--
ALTER TABLE `union_parishad_election`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `union_parishad_election_low`
--
ALTER TABLE `union_parishad_election_low`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `upazila_parishad_election`
--
ALTER TABLE `upazila_parishad_election`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `upazila_parishad_election_low`
--
ALTER TABLE `upazila_parishad_election_low`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `voter_info`
--
ALTER TABLE `voter_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `vote_count`
--
ALTER TABLE `vote_count`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `zilla_parishad_election`
--
ALTER TABLE `zilla_parishad_election`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `zilla_parishad_election_low`
--
ALTER TABLE `zilla_parishad_election_low`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
