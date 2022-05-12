-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2021 at 06:47 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leadercompetency`
--

-- --------------------------------------------------------

--
-- Table structure for table `aanswer`
--

CREATE TABLE `aanswer` (
  `ID` int(11) NOT NULL,
  `EmployeeID` varchar(255) NOT NULL,
  `A_QCode` varchar(255) NOT NULL,
  `TestID` int(11) NOT NULL,
  `Vote` varchar(255) NOT NULL,
  `DateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` varchar(255) NOT NULL DEFAULT 'Completed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aanswer`
--

INSERT INTO `aanswer` (`ID`, `EmployeeID`, `A_QCode`, `TestID`, `Vote`, `DateTime`, `Status`) VALUES
(132779, 'U00001', 'ASS 3020', 1, '1', '2021-06-30 07:47:15', 'Completed'),
(132780, 'U00001', 'ASS 3115', 1, '3', '2021-06-30 07:47:15', 'Completed'),
(132781, 'U00001', 'ASS 3400', 1, '6', '2021-06-30 07:47:15', 'Completed'),
(132782, 'U00001', 'ASS 4405', 1, '9', '2021-06-30 07:47:15', 'Completed'),
(132783, 'U00001', 'ASS 3780', 1, '5', '2021-06-30 07:47:15', 'Completed'),
(132784, 'U00001', 'ASS 3009', 6, '3', '2021-07-06 09:21:13', 'Completed'),
(132785, 'U00001', 'ASS 3020', 6, '3', '2021-07-06 09:21:13', 'Completed'),
(132786, 'U00001', 'ASS 3115', 6, '2', '2021-07-06 09:21:13', 'Completed'),
(132787, 'U00001', 'ASS 3400', 6, '9', '2021-07-06 09:21:13', 'Completed'),
(132788, 'U00001', 'ASS 4405', 6, '6', '2021-07-06 09:21:13', 'Completed'),
(132789, 'U00001', 'ASS 3780', 6, '8', '2021-07-06 09:21:13', 'Completed'),
(132790, 'U00001', 'ASS 5211', 6, '5', '2021-07-06 09:21:13', 'Completed'),
(132791, 'U00001', 'ASS 4001', 6, '3', '2021-07-06 09:21:13', 'Completed'),
(132792, 'U00001', 'ASS 4550', 6, '7', '2021-07-06 09:21:13', 'Completed'),
(132793, 'U00001', 'ASS 4508', 6, '4', '2021-07-06 09:21:13', 'Completed'),
(132794, 'U00001', 'ASS 4007', 6, '5', '2021-07-06 09:21:13', 'Completed'),
(132795, 'U00001', 'ASS 5005', 6, '5', '2021-07-06 09:21:13', 'Completed'),
(132796, 'U00001', 'ASS 4080', 6, '3', '2021-07-06 09:21:13', 'Completed'),
(132797, 'U00001', 'ASS 4570', 6, '2', '2021-07-06 09:21:13', 'Completed'),
(132798, 'U00001', 'ASS 4660', 6, '1', '2021-07-06 09:21:13', 'Completed'),
(132858, 'U00001', 'ASS 3115', 2, '2', '2021-07-09 15:19:52', 'Completed'),
(132859, 'U00001', 'ASS 3400', 2, '5', '2021-07-09 15:19:52', 'Completed'),
(132860, 'U00001', 'ASS 4405', 2, '9', '2021-07-09 15:19:52', 'Completed'),
(132861, 'U00001', 'ASS 3780', 2, '6', '2021-07-09 15:19:52', 'Completed'),
(132862, 'U00002', 'ASS 3001', 7, '3', '2021-07-09 15:22:19', 'Completed'),
(132863, 'U00002', 'ASS 3003', 7, '2', '2021-07-09 15:22:19', 'Completed'),
(132864, 'U00002', 'ASS 4007', 7, '4', '2021-07-09 15:22:19', 'Completed'),
(132865, 'U00002', 'ASS 5005', 7, '3', '2021-07-09 15:22:19', 'Completed'),
(132866, 'U00002', 'ASS 4570', 7, '5', '2021-07-09 15:22:19', 'Completed'),
(132867, 'U00002', 'ASS 4660', 7, '7', '2021-07-09 15:22:19', 'Completed'),
(132868, 'U00002', 'ASS 3000', 8, '5', '2021-07-09 15:25:39', 'Completed'),
(132869, 'U00002', 'ASS 3001', 8, '4', '2021-07-09 15:25:39', 'Completed'),
(132870, 'U00002', 'ASS 3003', 8, '5', '2021-07-09 15:25:39', 'Completed'),
(132871, 'U00002', 'ASS 3400', 8, '7', '2021-07-09 15:25:39', 'Completed'),
(132872, 'U00002', 'ASS 4508', 8, '4', '2021-07-09 15:25:39', 'Completed'),
(132873, 'U00002', 'ASS 4007', 8, '5', '2021-07-09 15:25:39', 'Completed'),
(132874, 'U00002', 'ASS 5020', 8, '6', '2021-07-09 15:25:39', 'Completed'),
(132875, 'U00002', 'ASS 4080', 8, '4', '2021-07-09 15:25:39', 'Completed'),
(132876, 'U00002', 'ASS 4570', 8, '5', '2021-07-09 15:25:39', 'Completed'),
(132877, 'U00002', 'ASS 4660', 8, '9', '2021-07-09 15:25:39', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `EmployeeID` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `IC` varchar(255) NOT NULL,
  `Contact_Number` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Date_of_Birth` date NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `Position` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`EmployeeID`, `Name`, `IC`, `Contact_Number`, `Gender`, `Date_of_Birth`, `Address`, `Email`, `Department`, `Position`, `image_url`) VALUES
('A00000', 'IT Department', '98-0729-08-5881', '011123456789', 'male', '1998-07-29', 'Masamah ', 'IT@gmail.com', 'IT', 'IT Admin', 'team-05.jpg'),
('A00001', 'System Admin', '', '', '', '0000-00-00', '', 'sa@ocean.umt.edu.my', 'PPBI', '', 'IMG20210204092254.jpg'),
('S00001', 'Tang Choon Yew', '', '', 'male', '0000-00-00', '', 'S00001@ocean.umt.edu.my', 'PPBI', '', ''),
('S00002', 'ABU', '', '', 'male', '0000-00-00', '', 'S00002@gmail.com', 'FTKKI', '', ''),
('U00001', 'Tang Choon Yew', '', '', 'male', '2021-04-22', '', 'U00001@ocean.umt.edu.my', 'PPBI', '', 'foto.jpg'),
('U00002', 'ALI', '', '', '', '0000-00-00', '', 'U00002@gmail.com', 'FTKKI', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `aquestion`
--

CREATE TABLE `aquestion` (
  `ID` int(11) NOT NULL,
  `AQuestion` varchar(255) NOT NULL,
  `A_QCode` varchar(255) NOT NULL,
  `Rating` int(11) NOT NULL,
  `CodeACompetency` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL DEFAULT 'Using'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aquestion`
--

INSERT INTO `aquestion` (`ID`, `AQuestion`, `A_QCode`, `Rating`, `CodeACompetency`, `Status`) VALUES
(1, 'Expresses oneself effectively both orally and in written form. \r\n      ', 'ASS 3000', 5, 'COM 3000', 'Using'),
(2, ' Skill fully settles differences by using a win-win approach in order to maintain relationships.  ', 'ASS 3001', 5, 'NEG 3000', 'Using'),
(15, ' I. Identifies and collects information relevant to the problem. \r\nII. Selects the best course of action by identifying all the alternatives and then makes a logical assumption. \r\n ', 'ASS 3003', 5, 'CPS 3000', 'Using'),
(16, ' Use Emotional Intelligence to identify, assess, and control the emotions of oneself and of others. \r\n  ', 'ASS 3005', 5, 'INS 3005', 'Using'),
(17, ' Stays current in terms of professional development. \r\n ', 'ASS 3006', 4, 'PRO 3006', 'Using'),
(19, ' Understands the viewpoint of higher management and effectively analyzes complex problems.  ', 'ASS 3008', 5, 'STP 3008', 'Using'),
(20, ' Prefers quick and approximate actions in many management situations. ', 'ASS 3009', 5, 'DEC 3009', 'Using'),
(21, '   I. Willingness to change to meet organizational \r\nneeds. \r\nII. Adapts to stressful situations.     ', 'ASS 3010', 4, 'FLE 3006', 'Using'),
(22, ' Uses appropriate interpersonal style to steer team members towards the goal. ', 'ASS 3020', 4, 'TEA 3002', 'Using'),
(23, '  Uses effective strategies to facilitate organizational \r\nchange initiatives and overcome resistance to change.  ', 'ASS 3115', 4, 'CMG 3010', 'Using'),
(25, '   Attracts, motivates, and develops employees. \r\n        ', 'ASS 3400', 10, 'LDE 3000', 'Using'),
(26, ' Networks with peers and associates to build a support \r\nbase.  ', 'ASS 4405', 10, 'BAR 3007', 'Using'),
(30, 'Tracks critical steps in projects to ensure they are completed on time.      ', 'ASS 3780', 8, 'PMG 4500', 'Using'),
(31, 'Facilitate self-directed and help with the informal learning of others. \r\n', 'ASS 5211', 10, 'ADL 3006', 'Using'),
(32, 'Determine stakeholders needs. ', 'ASS 4001', 5, 'CST 3007', 'Using'),
(33, 'Develops high-performance teams by establishing a spirit of cooperation and cohesion for achieving goals. ', 'ASS 4550', 10, 'CLT 3000', 'Using'),
(34, 'Develops ownership by bringing employees in on the decision making and planning process. ', 'ASS 4508', 5, 'IEIS 3500', 'Using'),
(35, 'Acts decisively and with fairness when dealing with problem employees.', 'ASS 4007', 5, 'CPE 3450', 'Using'),
(36, 'Displays warmth and a good sense of humors. ', 'ASS 5005', 5, 'PPE 4000', 'Using'),
(37, 'Behaviors and standards such as how you carry out your work and the way in which you handle certain situations.', 'ASS 5020', 10, 'MPE 3225', 'Using'),
(38, 'Encourage information sharing and partnership working, and actively encourage others to participate in the decision making process.', 'ASS 4080', 5, 'TBL 4001', 'Using'),
(39, 'I. Sharing your expertise with others. \r\nII. Listening and responding to questions effectively', 'ASS 4570', 5, 'CAM 3005', 'Using'),
(40, 'I. Provide retention and transfer of newly learned skills and knowledge. \r\nII. Plan and prepare for instruction. ', 'ASS 4660', 10, 'IST 3030', 'Using');

-- --------------------------------------------------------

--
-- Table structure for table `assignassuser`
--

CREATE TABLE `assignassuser` (
  `ID` int(11) NOT NULL,
  `TestID` int(11) NOT NULL,
  `Question_Code` varchar(255) NOT NULL,
  `CodeCompetency` varchar(255) NOT NULL,
  `EmployeeID` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL DEFAULT 'Pending',
  `Assign_Time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignassuser`
--

INSERT INTO `assignassuser` (`ID`, `TestID`, `Question_Code`, `CodeCompetency`, `EmployeeID`, `Status`, `Assign_Time`) VALUES
(319, 1, 'ASS 3020', 'TEA 3002', 'U00001', 'Complete', '2021-06-30 07:47:15'),
(320, 1, 'ASS 3115', 'CMG 3010', 'U00001', 'Complete', '2021-06-30 07:47:15'),
(321, 1, 'ASS 3400', 'LDE 3000', 'U00001', 'Complete', '2021-06-30 07:47:15'),
(322, 1, 'ASS 4405', 'BAR 3007', 'U00001', 'Complete', '2021-06-30 07:47:15'),
(323, 1, 'ASS 3780', 'PMG 4500', 'U00001', 'Complete', '2021-06-30 07:47:15'),
(338, 2, 'ASS 3115', 'CMG 3010', 'U00001', 'Complete', '2021-07-09 15:19:52'),
(339, 2, 'ASS 3400', 'LDE 3000', 'U00001', 'Complete', '2021-07-09 15:19:52'),
(340, 2, 'ASS 4405', 'BAR 3007', 'U00001', 'Complete', '2021-07-09 15:19:52'),
(341, 2, 'ASS 3780', 'PMG 4500', 'U00001', 'Complete', '2021-07-09 15:19:52'),
(342, 3, 'ASS 3009', 'DEC 3009', 'U00001', 'Remove', '2021-06-30 10:09:09'),
(343, 3, 'ASS 3010', 'FLE 3006', 'U00001', 'Remove', '2021-06-30 10:09:09'),
(344, 3, 'ASS 3020', 'TEA 3002', 'U00001', 'Remove', '2021-06-30 10:09:09'),
(345, 3, 'ASS 3115', 'CMG 3010', 'U00001', 'Remove', '2021-06-30 10:09:09'),
(346, 3, 'ASS 3400', 'LDE 3000', 'U00001', 'Remove', '2021-06-30 10:09:09'),
(347, 3, 'ASS 4405', 'BAR 3007', 'U00001', 'Remove', '2021-06-30 10:09:09'),
(348, 3, 'ASS 3780', 'PMG 4500', 'U00001', 'Remove', '2021-06-30 10:09:09'),
(349, 4, 'ASS 4405', 'BAR 3007', 'A00000', 'Pending', '2021-07-02 14:07:27'),
(350, 4, 'ASS 3780', 'PMG 4500', 'A00000', 'Pending', '2021-07-02 14:07:27'),
(351, 5, 'ASS 3780', 'PMG 4500', 'S00001', 'Pending', '2021-07-02 15:08:15'),
(352, 6, 'ASS 3009', 'DEC 3009', 'U00001', 'Complete', '2021-07-06 09:21:13'),
(353, 6, 'ASS 3020', 'TEA 3002', 'U00001', 'Complete', '2021-07-06 09:21:13'),
(354, 6, 'ASS 3115', 'CMG 3010', 'U00001', 'Complete', '2021-07-06 09:21:13'),
(355, 6, 'ASS 3400', 'LDE 3000', 'U00001', 'Complete', '2021-07-06 09:21:13'),
(356, 6, 'ASS 4405', 'BAR 3007', 'U00001', 'Complete', '2021-07-06 09:21:13'),
(357, 6, 'ASS 3780', 'PMG 4500', 'U00001', 'Complete', '2021-07-06 09:21:13'),
(358, 6, 'ASS 5211', 'ADL 3006', 'U00001', 'Complete', '2021-07-06 09:21:13'),
(359, 6, 'ASS 4001', 'CST 3007', 'U00001', 'Complete', '2021-07-06 09:21:13'),
(360, 6, 'ASS 4550', 'CLT 3000', 'U00001', 'Complete', '2021-07-06 09:21:13'),
(361, 6, 'ASS 4508', 'IEIS 3500', 'U00001', 'Complete', '2021-07-06 09:21:13'),
(362, 6, 'ASS 4007', 'CPE 3450', 'U00001', 'Complete', '2021-07-06 09:21:13'),
(363, 6, 'ASS 5005', 'PPE 4000', 'U00001', 'Complete', '2021-07-06 09:21:13'),
(364, 6, 'ASS 4080', 'TBL 4001', 'U00001', 'Complete', '2021-07-06 09:21:13'),
(365, 6, 'ASS 4570', 'CAM 3005', 'U00001', 'Complete', '2021-07-06 09:21:13'),
(366, 6, 'ASS 4660', 'IST 3030', 'U00001', 'Complete', '2021-07-06 09:21:13'),
(406, 7, 'ASS 3001', 'NEG 3000', 'U00002', 'Complete', '2021-07-09 15:22:19'),
(407, 7, 'ASS 3003', 'CPS 3000', 'U00002', 'Complete', '2021-07-09 15:22:19'),
(408, 7, 'ASS 4007', 'CPE 3450', 'U00002', 'Complete', '2021-07-09 15:22:19'),
(409, 7, 'ASS 5005', 'PPE 4000', 'U00002', 'Complete', '2021-07-09 15:22:19'),
(410, 7, 'ASS 4570', 'CAM 3005', 'U00002', 'Complete', '2021-07-09 15:22:19'),
(411, 7, 'ASS 4660', 'IST 3030', 'U00002', 'Complete', '2021-07-09 15:22:19'),
(412, 8, 'ASS 3000', 'COM 3000', 'U00002', 'Complete', '2021-07-09 15:25:39'),
(413, 8, 'ASS 3001', 'NEG 3000', 'U00002', 'Complete', '2021-07-09 15:25:39'),
(414, 8, 'ASS 3003', 'CPS 3000', 'U00002', 'Complete', '2021-07-09 15:25:39'),
(415, 8, 'ASS 3400', 'LDE 3000', 'U00002', 'Complete', '2021-07-09 15:25:39'),
(416, 8, 'ASS 4508', 'IEIS 3500', 'U00002', 'Complete', '2021-07-09 15:25:39'),
(417, 8, 'ASS 4007', 'CPE 3450', 'U00002', 'Complete', '2021-07-09 15:25:39'),
(418, 8, 'ASS 5020', 'MPE 3225', 'U00002', 'Complete', '2021-07-09 15:25:39'),
(419, 8, 'ASS 4080', 'TBL 4001', 'U00002', 'Complete', '2021-07-09 15:25:39'),
(420, 8, 'ASS 4570', 'CAM 3005', 'U00002', 'Complete', '2021-07-09 15:25:39'),
(421, 8, 'ASS 4660', 'IST 3030', 'U00002', 'Complete', '2021-07-09 15:25:39'),
(422, 9, 'ASS 3000', 'COM 3000', 'U00002', 'Pending', '2021-07-09 15:30:54'),
(423, 9, 'ASS 3001', 'NEG 3000', 'U00002', 'Pending', '2021-07-09 15:30:54'),
(424, 9, 'ASS 3003', 'CPS 3000', 'U00002', 'Pending', '2021-07-09 15:30:54'),
(425, 9, 'ASS 3005', 'INS 3005', 'U00002', 'Pending', '2021-07-09 15:30:54'),
(426, 9, 'ASS 3400', 'LDE 3000', 'U00002', 'Pending', '2021-07-09 15:30:54'),
(427, 9, 'ASS 3780', 'PMG 4500', 'U00002', 'Pending', '2021-07-09 15:30:54'),
(428, 9, 'ASS 4007', 'CPE 3450', 'U00002', 'Pending', '2021-07-09 15:30:54'),
(429, 9, 'ASS 5005', 'PPE 4000', 'U00002', 'Pending', '2021-07-09 15:30:54'),
(430, 9, 'ASS 4080', 'TBL 4001', 'U00002', 'Pending', '2021-07-09 15:30:54'),
(431, 9, 'ASS 4570', 'CAM 3005', 'U00002', 'Pending', '2021-07-09 15:30:54'),
(432, 9, 'ASS 4660', 'IST 3030', 'U00002', 'Pending', '2021-07-09 15:30:54');

-- --------------------------------------------------------

--
-- Table structure for table `assignsuperior`
--

CREATE TABLE `assignsuperior` (
  `ID` int(11) NOT NULL,
  `TestID` int(11) NOT NULL,
  `QuestionCode` varchar(255) NOT NULL,
  `CodeCompetency` varchar(255) NOT NULL,
  `EmployeeID` varchar(255) NOT NULL,
  `Candidate` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL DEFAULT 'Pending',
  `AssignDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignsuperior`
--

INSERT INTO `assignsuperior` (`ID`, `TestID`, `QuestionCode`, `CodeCompetency`, `EmployeeID`, `Candidate`, `Status`, `AssignDate`) VALUES
(122, 1, 'ASS 3020', 'TEA 3002', 'A00001', 'U00001', 'Complete', '2021-06-30 07:32:04'),
(123, 1, 'ASS 3115', 'CMG 3010', 'A00001', 'U00001', 'Complete', '2021-06-30 07:32:04'),
(124, 1, 'ASS 3400', 'LDE 3000', 'A00001', 'U00001', 'Complete', '2021-06-30 07:32:04'),
(125, 1, 'ASS 4405', 'BAR 3007', 'A00001', 'U00001', 'Complete', '2021-06-30 07:32:04'),
(126, 1, 'ASS 3780', 'PMG 4500', 'A00001', 'U00001', 'Complete', '2021-06-30 07:32:04'),
(141, 2, 'ASS 3115', 'CMG 3010', 'S00001', 'U00001', 'Complete', '2021-06-30 10:10:11'),
(142, 2, 'ASS 3400', 'LDE 3000', 'S00001', 'U00001', 'Complete', '2021-06-30 10:10:11'),
(143, 2, 'ASS 4405', 'BAR 3007', 'S00001', 'U00001', 'Complete', '2021-06-30 10:10:11'),
(144, 2, 'ASS 3780', 'PMG 4500', 'S00001', 'U00001', 'Complete', '2021-06-30 10:10:11'),
(145, 3, 'ASS 3009', 'DEC 3009', 'S00001', 'U00001', 'Remove', '2021-06-30 10:09:14'),
(146, 3, 'ASS 3010', 'FLE 3006', 'S00001', 'U00001', 'Remove', '2021-06-30 10:09:14'),
(147, 3, 'ASS 3020', 'TEA 3002', 'S00001', 'U00001', 'Remove', '2021-06-30 10:09:14'),
(148, 3, 'ASS 3115', 'CMG 3010', 'S00001', 'U00001', 'Remove', '2021-06-30 10:09:14'),
(149, 3, 'ASS 3400', 'LDE 3000', 'S00001', 'U00001', 'Remove', '2021-06-30 10:09:14'),
(150, 3, 'ASS 4405', 'BAR 3007', 'S00001', 'U00001', 'Remove', '2021-06-30 10:09:14'),
(151, 3, 'ASS 3780', 'PMG 4500', 'S00001', 'U00001', 'Remove', '2021-06-30 10:09:14'),
(152, 4, 'ASS 4405', 'BAR 3007', 'A00000', 'A00001', 'Pending', '2021-07-02 14:07:27'),
(153, 4, 'ASS 3780', 'PMG 4500', 'A00000', 'A00001', 'Pending', '2021-07-02 14:07:27'),
(154, 5, 'ASS 3780', 'PMG 4500', 'A00001', 'S00001', 'Pending', '2021-07-02 15:08:15'),
(155, 6, 'ASS 3009', 'DEC 3009', 'A00001', 'U00001', 'Complete', '2021-07-06 09:25:29'),
(156, 6, 'ASS 3020', 'TEA 3002', 'A00001', 'U00001', 'Complete', '2021-07-06 09:25:29'),
(157, 6, 'ASS 3115', 'CMG 3010', 'A00001', 'U00001', 'Complete', '2021-07-06 09:25:29'),
(158, 6, 'ASS 3400', 'LDE 3000', 'A00001', 'U00001', 'Complete', '2021-07-06 09:25:29'),
(159, 6, 'ASS 4405', 'BAR 3007', 'A00001', 'U00001', 'Complete', '2021-07-06 09:25:29'),
(160, 6, 'ASS 3780', 'PMG 4500', 'A00001', 'U00001', 'Complete', '2021-07-06 09:25:29'),
(161, 6, 'ASS 5211', 'ADL 3006', 'A00001', 'U00001', 'Complete', '2021-07-06 09:25:29'),
(162, 6, 'ASS 4001', 'CST 3007', 'A00001', 'U00001', 'Complete', '2021-07-06 09:25:29'),
(163, 6, 'ASS 4550', 'CLT 3000', 'A00001', 'U00001', 'Complete', '2021-07-06 09:25:29'),
(164, 6, 'ASS 4508', 'IEIS 3500', 'A00001', 'U00001', 'Complete', '2021-07-06 09:25:29'),
(165, 6, 'ASS 4007', 'CPE 3450', 'A00001', 'U00001', 'Complete', '2021-07-06 09:25:29'),
(166, 6, 'ASS 5005', 'PPE 4000', 'A00001', 'U00001', 'Complete', '2021-07-06 09:25:29'),
(167, 6, 'ASS 4080', 'TBL 4001', 'A00001', 'U00001', 'Complete', '2021-07-06 09:25:29'),
(168, 6, 'ASS 4570', 'CAM 3005', 'A00001', 'U00001', 'Complete', '2021-07-06 09:25:29'),
(169, 6, 'ASS 4660', 'IST 3030', 'A00001', 'U00001', 'Complete', '2021-07-06 09:25:29'),
(209, 7, 'ASS 3001', 'NEG 3000', 'S00002', 'U00002', 'Complete', '2021-07-09 15:21:54'),
(210, 7, 'ASS 3003', 'CPS 3000', 'S00002', 'U00002', 'Complete', '2021-07-09 15:21:54'),
(211, 7, 'ASS 4007', 'CPE 3450', 'S00002', 'U00002', 'Complete', '2021-07-09 15:21:54'),
(212, 7, 'ASS 5005', 'PPE 4000', 'S00002', 'U00002', 'Complete', '2021-07-09 15:21:54'),
(213, 7, 'ASS 4570', 'CAM 3005', 'S00002', 'U00002', 'Complete', '2021-07-09 15:21:54'),
(214, 7, 'ASS 4660', 'IST 3030', 'S00002', 'U00002', 'Complete', '2021-07-09 15:21:54'),
(215, 8, 'ASS 3000', 'COM 3000', 'S00002', 'U00002', 'Complete', '2021-07-09 15:26:14'),
(216, 8, 'ASS 3001', 'NEG 3000', 'S00002', 'U00002', 'Complete', '2021-07-09 15:26:14'),
(217, 8, 'ASS 3003', 'CPS 3000', 'S00002', 'U00002', 'Complete', '2021-07-09 15:26:14'),
(218, 8, 'ASS 3400', 'LDE 3000', 'S00002', 'U00002', 'Complete', '2021-07-09 15:26:14'),
(219, 8, 'ASS 4508', 'IEIS 3500', 'S00002', 'U00002', 'Complete', '2021-07-09 15:26:14'),
(220, 8, 'ASS 4007', 'CPE 3450', 'S00002', 'U00002', 'Complete', '2021-07-09 15:26:14'),
(221, 8, 'ASS 5020', 'MPE 3225', 'S00002', 'U00002', 'Complete', '2021-07-09 15:26:14'),
(222, 8, 'ASS 4080', 'TBL 4001', 'S00002', 'U00002', 'Complete', '2021-07-09 15:26:14'),
(223, 8, 'ASS 4570', 'CAM 3005', 'S00002', 'U00002', 'Complete', '2021-07-09 15:26:14'),
(224, 8, 'ASS 4660', 'IST 3030', 'S00002', 'U00002', 'Complete', '2021-07-09 15:26:14'),
(225, 9, 'ASS 3000', 'COM 3000', 'S00002', 'U00002', 'Pending', '2021-07-09 15:30:54'),
(226, 9, 'ASS 3001', 'NEG 3000', 'S00002', 'U00002', 'Pending', '2021-07-09 15:30:54'),
(227, 9, 'ASS 3003', 'CPS 3000', 'S00002', 'U00002', 'Pending', '2021-07-09 15:30:54'),
(228, 9, 'ASS 3005', 'INS 3005', 'S00002', 'U00002', 'Pending', '2021-07-09 15:30:54'),
(229, 9, 'ASS 3400', 'LDE 3000', 'S00002', 'U00002', 'Pending', '2021-07-09 15:30:54'),
(230, 9, 'ASS 3780', 'PMG 4500', 'S00002', 'U00002', 'Pending', '2021-07-09 15:30:54'),
(231, 9, 'ASS 4007', 'CPE 3450', 'S00002', 'U00002', 'Pending', '2021-07-09 15:30:54'),
(232, 9, 'ASS 5005', 'PPE 4000', 'S00002', 'U00002', 'Pending', '2021-07-09 15:30:54'),
(233, 9, 'ASS 4080', 'TBL 4001', 'S00002', 'U00002', 'Pending', '2021-07-09 15:30:54'),
(234, 9, 'ASS 4570', 'CAM 3005', 'S00002', 'U00002', 'Pending', '2021-07-09 15:30:54'),
(235, 9, 'ASS 4660', 'IST 3030', 'S00002', 'U00002', 'Pending', '2021-07-09 15:30:54');

-- --------------------------------------------------------

--
-- Table structure for table `background`
--

CREATE TABLE `background` (
  `ID` int(11) NOT NULL,
  `EmployeeID` varchar(255) NOT NULL,
  `Education1` varchar(255) NOT NULL,
  `Education2` varchar(255) NOT NULL,
  `Education3` varchar(255) NOT NULL,
  `School1` varchar(255) NOT NULL,
  `School2` varchar(255) NOT NULL,
  `School3` varchar(255) NOT NULL,
  `Field` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `background`
--

INSERT INTO `background` (`ID`, `EmployeeID`, `Education1`, `Education2`, `Education3`, `School1`, `School2`, `School3`, `Field`) VALUES
(2, 'A00000', 'Bachelor of Computer Science  (Software Engineering) With Honors', 'Diploma in Information Technology  (Programming)', 'SPM', 'Universiti Malaysia Terengganu', 'Politeknik Balik Pulau', 'SMK Seri Keledang', 'Web Technology, PHP'),
(3, 'A00001', '', '', '', '', '', '', ''),
(51, 'U00001', '', '', '', '', '', '', ''),
(52, 'S00001', '', '', '', '', '', '', ''),
(53, 'S00002', '', '', '', '', '', '', ''),
(54, 'U00002', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `competency`
--

CREATE TABLE `competency` (
  `ID` int(11) NOT NULL,
  `CodeCompetency` varchar(255) NOT NULL,
  `Competency` varchar(255) NOT NULL,
  `GroupCompetency` varchar(255) NOT NULL,
  `Weightcompetency` int(11) NOT NULL,
  `Status` varchar(255) NOT NULL DEFAULT 'Using'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `competency`
--

INSERT INTO `competency` (`ID`, `CodeCompetency`, `Competency`, `GroupCompetency`, `Weightcompetency`, `Status`) VALUES
(14, 'ADL 3006', 'Adult Learning ', 'Organization Competencies', 10, 'Using'),
(1, 'BAR 3007', 'Build appropriate relationships', 'Core Competencies', 5, 'Using'),
(21, 'CAM 3005', 'Coaching and Mentoring', 'Organization Competencies', 10, 'Using'),
(16, 'CLT 3000', 'Create and Lead Teams', 'Leading Other', 10, 'Using'),
(10, 'CMG 3010', 'Change Management', 'Core Competencies', 5, 'Using'),
(2, 'COM 3000', 'Basic Communication ', 'Core Competencies', 5, 'Using'),
(18, 'CPE 3450', 'Confronting Problem Employees', 'Leading Other', 10, 'Using'),
(3, 'CPS 3000', 'Creative Problem Solving', 'Core Competencies', 5, 'Using'),
(15, 'CST 3007', 'Consulting', 'Organization Competencies', 5, 'Using'),
(4, 'DEC 3009', 'Decisiveness', 'Core Competencies', 5, 'Using'),
(11, 'FLE 3006', 'Flexibility', 'Core Competencies', 5, 'Using'),
(17, 'IEIS 3500', 'Implement Employee Involvement Strategies', 'Leading Other', 15, 'Using'),
(5, 'INS 3005', 'Interpersonal Skills', 'Core Competencies', 5, 'Using'),
(20, 'IST 3030', 'Instruction', 'Organization Competencies', 10, 'Using'),
(12, 'LDE 3000', 'Leading Employees', 'Leading Other', 5, 'Using'),
(23, 'MPE 3225', 'Moral Principles and Ethical Standards', 'Organization Competencies', 20, 'Using'),
(6, 'NEG 3000', 'Negotiating', 'Core Competencies', 5, 'Using'),
(13, 'PMG 4500', 'Project Management', 'Leading Other', 15, 'Using'),
(19, 'PPE 4000', 'Putting People at Ease', 'Leading Other', 5, 'Using'),
(7, 'PRO 3006', 'Professionalism', 'Core Competencies', 5, 'Using'),
(8, 'STP 3008', 'Strategic Perspective', 'Core Competencies', 5, 'Using'),
(22, 'TBL 4001', 'Team Building', 'Organization Competencies', 10, 'Using'),
(9, 'TEA 3002', 'Teamwork', 'Core Competencies', 5, 'Using');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `ID` int(11) NOT NULL,
  `Department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`ID`, `Department`) VALUES
(2, 'FTKKI');

-- --------------------------------------------------------

--
-- Table structure for table `eanswer`
--

CREATE TABLE `eanswer` (
  `ID` int(11) NOT NULL,
  `EmployeeID` varchar(255) NOT NULL,
  `CandidateID` varchar(255) NOT NULL,
  `TestID` int(11) NOT NULL,
  `E_QCode` varchar(255) NOT NULL,
  `VoteE` varchar(255) NOT NULL,
  `DateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` varchar(255) NOT NULL DEFAULT 'Completed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eanswer`
--

INSERT INTO `eanswer` (`ID`, `EmployeeID`, `CandidateID`, `TestID`, `E_QCode`, `VoteE`, `DateTime`, `Status`) VALUES
(25, 'A00001', 'U00001', 1, 'ASS 3020', '3', '2021-06-30 07:32:04', 'Completed'),
(26, 'A00001', 'U00001', 1, 'ASS 3115', '2', '2021-06-30 07:32:04', 'Completed'),
(27, 'A00001', 'U00001', 1, 'ASS 3400', '8', '2021-06-30 07:32:04', 'Completed'),
(28, 'A00001', 'U00001', 1, 'ASS 4405', '6', '2021-06-30 07:32:04', 'Completed'),
(29, 'A00001', 'U00001', 1, 'ASS 3780', '8', '2021-06-30 07:32:04', 'Completed'),
(30, 'S00001', 'U00001', 2, 'ASS 3115', '4', '2021-06-30 10:10:11', 'Completed'),
(31, 'S00001', 'U00001', 2, 'ASS 3400', '7', '2021-06-30 10:10:11', 'Completed'),
(32, 'S00001', 'U00001', 2, 'ASS 4405', '8', '2021-06-30 10:10:11', 'Completed'),
(33, 'S00001', 'U00001', 2, 'ASS 3780', '3', '2021-06-30 10:10:11', 'Completed'),
(34, 'A00001', 'U00001', 6, 'ASS 3009', '2', '2021-07-06 09:25:29', 'Completed'),
(35, 'A00001', 'U00001', 6, 'ASS 3020', '3', '2021-07-06 09:25:29', 'Completed'),
(36, 'A00001', 'U00001', 6, 'ASS 3115', '2', '2021-07-06 09:25:29', 'Completed'),
(37, 'A00001', 'U00001', 6, 'ASS 3400', '7', '2021-07-06 09:25:29', 'Completed'),
(38, 'A00001', 'U00001', 6, 'ASS 4405', '6', '2021-07-06 09:25:29', 'Completed'),
(39, 'A00001', 'U00001', 6, 'ASS 3780', '5', '2021-07-06 09:25:29', 'Completed'),
(40, 'A00001', 'U00001', 6, 'ASS 5211', '5', '2021-07-06 09:25:29', 'Completed'),
(41, 'A00001', 'U00001', 6, 'ASS 4001', '2', '2021-07-06 09:25:29', 'Completed'),
(42, 'A00001', 'U00001', 6, 'ASS 4550', '4', '2021-07-06 09:25:29', 'Completed'),
(43, 'A00001', 'U00001', 6, 'ASS 4508', '5', '2021-07-06 09:25:29', 'Completed'),
(44, 'A00001', 'U00001', 6, 'ASS 4007', '5', '2021-07-06 09:25:29', 'Completed'),
(45, 'A00001', 'U00001', 6, 'ASS 5005', '2', '2021-07-06 09:25:29', 'Completed'),
(46, 'A00001', 'U00001', 6, 'ASS 4080', '5', '2021-07-06 09:25:29', 'Completed'),
(47, 'A00001', 'U00001', 6, 'ASS 4570', '2', '2021-07-06 09:25:29', 'Completed'),
(48, 'A00001', 'U00001', 6, 'ASS 4660', '6', '2021-07-06 09:25:29', 'Completed'),
(56, 'S00002', 'U00002', 7, 'ASS 3001', '3', '2021-07-09 15:21:54', 'Completed'),
(57, 'S00002', 'U00002', 7, 'ASS 3003', '4', '2021-07-09 15:21:54', 'Completed'),
(58, 'S00002', 'U00002', 7, 'ASS 4007', '5', '2021-07-09 15:21:54', 'Completed'),
(59, 'S00002', 'U00002', 7, 'ASS 5005', '3', '2021-07-09 15:21:54', 'Completed'),
(60, 'S00002', 'U00002', 7, 'ASS 4570', '2', '2021-07-09 15:21:54', 'Completed'),
(61, 'S00002', 'U00002', 7, 'ASS 4660', '9', '2021-07-09 15:21:54', 'Completed'),
(62, 'S00002', 'U00002', 8, 'ASS 3000', '4', '2021-07-09 15:26:14', 'Completed'),
(63, 'S00002', 'U00002', 8, 'ASS 3001', '5', '2021-07-09 15:26:14', 'Completed'),
(64, 'S00002', 'U00002', 8, 'ASS 3003', '3', '2021-07-09 15:26:14', 'Completed'),
(65, 'S00002', 'U00002', 8, 'ASS 3400', '9', '2021-07-09 15:26:14', 'Completed'),
(66, 'S00002', 'U00002', 8, 'ASS 4508', '4', '2021-07-09 15:26:14', 'Completed'),
(67, 'S00002', 'U00002', 8, 'ASS 4007', '5', '2021-07-09 15:26:14', 'Completed'),
(68, 'S00002', 'U00002', 8, 'ASS 5020', '8', '2021-07-09 15:26:14', 'Completed'),
(69, 'S00002', 'U00002', 8, 'ASS 4080', '2', '2021-07-09 15:26:14', 'Completed'),
(70, 'S00002', 'U00002', 8, 'ASS 4570', '3', '2021-07-09 15:26:14', 'Completed'),
(71, 'S00002', 'U00002', 8, 'ASS 4660', '10', '2021-07-09 15:26:14', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `equestion`
--

CREATE TABLE `equestion` (
  `ID` int(11) NOT NULL,
  `EQuestion` varchar(255) NOT NULL,
  `E_QCode` varchar(255) NOT NULL,
  `Rating` int(11) NOT NULL,
  `CodeECompetency` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL DEFAULT 'Using'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `equestion`
--

INSERT INTO `equestion` (`ID`, `EQuestion`, `E_QCode`, `Rating`, `CodeECompetency`, `Status`) VALUES
(1, ' Skill fully settles differences by using a win-win approach in order to maintain relationships.        ', 'EVA 3001', 5, 'NEG 3000', 'Using'),
(2, ' Expresses oneself effectively both orally and in written form. ', 'EVA 3000', 4, 'COM 3000', 'Using'),
(5, ' I. Identifies and collects information relevant to the problem. \r\nII. Selects the best course of action by identifying all the alternatives and then makes a logical assumption. ', 'EVA 3003', 4, 'CPS 3000', 'Using'),
(6, ' Use Emotional Intelligence to identify, assess, and control the emotions of oneself and of others. ', 'EVA 3005', 4, 'INS 3005', 'Using'),
(7, ' Stays current in terms of professional development. ', 'EVA 3006', 10, 'PRO 3006', 'Using'),
(9, ' Understands the viewpoint of higher management and effectively analyzes complex problems. ', 'EVA 3008', 10, 'STP 3008', 'Using'),
(10, ' Prefers quick and approximate actions in many management situations.    ', 'EVA 3009', 10, 'DEC 3009', 'Using');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `ID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Roles` varchar(255) NOT NULL,
  `Status` varchar(255) DEFAULT 'Activate'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID`, `username`, `Password`, `Roles`, `Status`) VALUES
(39, 'A00000', 'admin123', 'Superadmin', 'Activate'),
(66, 'A00001', 'admin123**', 'Admin', 'Activate'),
(117, 'U00001', 'U00001**', 'User', 'Activate'),
(118, 'S00001', '**S00001', 'Superior', 'Activate'),
(119, 'S00002', '**S00002', 'Superior', 'Activate'),
(120, 'U00002', 'U00002**', 'User', 'Activate');

-- --------------------------------------------------------

--
-- Table structure for table `report_assessment`
--

CREATE TABLE `report_assessment` (
  `ID` int(11) NOT NULL,
  `EmployeeID` varchar(255) NOT NULL,
  `Message` varchar(255) NOT NULL,
  `Level` varchar(255) NOT NULL,
  `Total_Assessment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `report_average`
--

CREATE TABLE `report_average` (
  `ID` int(11) NOT NULL,
  `EmployeeID` varchar(255) NOT NULL,
  `Message` varchar(255) NOT NULL,
  `Level` varchar(255) NOT NULL,
  `Total_Average` int(11) NOT NULL,
  `Recommend` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `report_evaluate`
--

CREATE TABLE `report_evaluate` (
  `ID` int(11) NOT NULL,
  `EmployeeID` varchar(255) NOT NULL,
  `CandidateID` varchar(255) NOT NULL,
  `Message` varchar(255) NOT NULL,
  `Level` varchar(255) NOT NULL,
  `Total_Evaluate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aanswer`
--
ALTER TABLE `aanswer`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `A_QCode` (`A_QCode`),
  ADD KEY `EmployeeID` (`EmployeeID`);

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`EmployeeID`);

--
-- Indexes for table `aquestion`
--
ALTER TABLE `aquestion`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `A_QCode` (`A_QCode`),
  ADD KEY `CodeACompetency` (`CodeACompetency`);

--
-- Indexes for table `assignassuser`
--
ALTER TABLE `assignassuser`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `EmployeeID` (`EmployeeID`),
  ADD KEY `Question_Code` (`Question_Code`),
  ADD KEY `CodeCompetency` (`CodeCompetency`);

--
-- Indexes for table `assignsuperior`
--
ALTER TABLE `assignsuperior`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `EmployeeID` (`EmployeeID`),
  ADD KEY `Candidate` (`Candidate`),
  ADD KEY `CodeCompetency` (`CodeCompetency`),
  ADD KEY `assignsuperior_ibfk_2` (`QuestionCode`);

--
-- Indexes for table `background`
--
ALTER TABLE `background`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `background_ibfk_1` (`EmployeeID`);

--
-- Indexes for table `competency`
--
ALTER TABLE `competency`
  ADD PRIMARY KEY (`CodeCompetency`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `eanswer`
--
ALTER TABLE `eanswer`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `E_QCode` (`E_QCode`),
  ADD KEY `CandidateID` (`CandidateID`);

--
-- Indexes for table `equestion`
--
ALTER TABLE `equestion`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `E_QCode` (`E_QCode`),
  ADD KEY `CodeECompetency` (`CodeECompetency`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `EmployeeID` (`username`);

--
-- Indexes for table `report_assessment`
--
ALTER TABLE `report_assessment`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `EmployeeID` (`EmployeeID`);

--
-- Indexes for table `report_average`
--
ALTER TABLE `report_average`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `report_average_ibfk_1` (`EmployeeID`);

--
-- Indexes for table `report_evaluate`
--
ALTER TABLE `report_evaluate`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `EmployeeID` (`EmployeeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aanswer`
--
ALTER TABLE `aanswer`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132878;

--
-- AUTO_INCREMENT for table `aquestion`
--
ALTER TABLE `aquestion`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `assignassuser`
--
ALTER TABLE `assignassuser`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=433;

--
-- AUTO_INCREMENT for table `assignsuperior`
--
ALTER TABLE `assignsuperior`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=236;

--
-- AUTO_INCREMENT for table `background`
--
ALTER TABLE `background`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `eanswer`
--
ALTER TABLE `eanswer`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `equestion`
--
ALTER TABLE `equestion`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `report_assessment`
--
ALTER TABLE `report_assessment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report_average`
--
ALTER TABLE `report_average`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report_evaluate`
--
ALTER TABLE `report_evaluate`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aanswer`
--
ALTER TABLE `aanswer`
  ADD CONSTRAINT `aanswer_ibfk_2` FOREIGN KEY (`A_QCode`) REFERENCES `aquestion` (`A_QCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `aanswer_ibfk_3` FOREIGN KEY (`EmployeeID`) REFERENCES `account` (`EmployeeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `aanswer_ibfk_4` FOREIGN KEY (`EmployeeID`) REFERENCES `eanswer` (`CandidateID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `aquestion`
--
ALTER TABLE `aquestion`
  ADD CONSTRAINT `aquestion_ibfk_1` FOREIGN KEY (`CodeACompetency`) REFERENCES `competency` (`CodeCompetency`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `assignassuser`
--
ALTER TABLE `assignassuser`
  ADD CONSTRAINT `assignassuser_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `account` (`EmployeeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assignassuser_ibfk_2` FOREIGN KEY (`Question_Code`) REFERENCES `aquestion` (`A_QCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assignassuser_ibfk_3` FOREIGN KEY (`CodeCompetency`) REFERENCES `competency` (`CodeCompetency`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `assignsuperior`
--
ALTER TABLE `assignsuperior`
  ADD CONSTRAINT `assignsuperior_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `account` (`EmployeeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assignsuperior_ibfk_2` FOREIGN KEY (`QuestionCode`) REFERENCES `aquestion` (`A_QCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assignsuperior_ibfk_3` FOREIGN KEY (`Candidate`) REFERENCES `account` (`EmployeeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assignsuperior_ibfk_4` FOREIGN KEY (`CodeCompetency`) REFERENCES `competency` (`CodeCompetency`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `background`
--
ALTER TABLE `background`
  ADD CONSTRAINT `background_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `account` (`EmployeeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `eanswer`
--
ALTER TABLE `eanswer`
  ADD CONSTRAINT `eanswer_ibfk_1` FOREIGN KEY (`E_QCode`) REFERENCES `aquestion` (`A_QCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `eanswer_ibfk_2` FOREIGN KEY (`CandidateID`) REFERENCES `account` (`EmployeeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `equestion`
--
ALTER TABLE `equestion`
  ADD CONSTRAINT `equestion_ibfk_1` FOREIGN KEY (`CodeECompetency`) REFERENCES `competency` (`CodeCompetency`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`username`) REFERENCES `account` (`EmployeeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `report_assessment`
--
ALTER TABLE `report_assessment`
  ADD CONSTRAINT `report_assessment_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `account` (`EmployeeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `report_average`
--
ALTER TABLE `report_average`
  ADD CONSTRAINT `report_average_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `account` (`EmployeeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `report_evaluate`
--
ALTER TABLE `report_evaluate`
  ADD CONSTRAINT `report_evaluate_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `account` (`EmployeeID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
