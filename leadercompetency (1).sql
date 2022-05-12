-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2021 at 01:24 PM
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
  `Vote` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
('A00000', 'IT Department', '', '123456789', 'male', '0000-00-00', '', '', 'IT', 'IT Admin', '930734.png'),
('A00001', 'Ben', '960729-08-5853', '016-5385048', 'male', '1996-07-29', 'Taman Masamah', 'A00001@gmail.com', 'IT', 'IT Support', '384680.png'),
('A00002', 'Alex', '920729-08-5971', '018-5385048', 'male', '1992-07-29', 'Taman Tok Jembal', 'A00002@gmail.com', 'IT', 'Manager', 'IMG20210204092254.jpg'),
('A00004', 'James', '900728035859', '0175385048', 'male', '1990-07-28', 'Taman Besatri', 'A00004@gmail.com', 'IT', 'Superior', 'Capture1.PNG'),
('A00005', 'Jordan', '', '', 'male', '0000-00-00', '', 'Jordan@gmail.com', 'IT', '', ''),
('A00008', 'Wei Lun', '', '', 'male', '0000-00-00', '', 'A00008@gmail.com', 'IT', 'Trainee', ''),
('A00010', 'Eng Yeaw', '', '', 'male', '0000-00-00', '', 'A00010@gmail.com', 'IT', 'Trainer', '');

-- --------------------------------------------------------

--
-- Table structure for table `aquestion`
--

CREATE TABLE `aquestion` (
  `ID` int(11) NOT NULL,
  `AQuestion` varchar(255) NOT NULL,
  `A_QCode` varchar(255) NOT NULL,
  `Option1` varchar(255) NOT NULL,
  `Option2` varchar(255) NOT NULL,
  `Option3` varchar(255) NOT NULL,
  `Option4` varchar(255) NOT NULL,
  `Option5` varchar(255) NOT NULL,
  `CodeACompetency` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL DEFAULT 'Using'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aquestion`
--

INSERT INTO `aquestion` (`ID`, `AQuestion`, `A_QCode`, `Option1`, `Option2`, `Option3`, `Option4`, `Option5`, `CodeACompetency`, `Status`) VALUES
(1, 'Expresses oneself effectively both orally and in written form. \r\n', 'ASS 3000', '1', '2', '3', '4', '5', 'COM 3000', 'Using'),
(2, 'Skill fully settles differences by using a win-win approach in order to maintain relationships.', 'ASS 3001', '1', '2', '3', '4', '5', 'NEG 3000', 'Using'),
(15, 'I. Identifies and collects information relevant to the problem. \r\nII. Selects the best course of action by identifying all the alternatives and then makes a logical assumption. \r\n', 'ASS 3003', '1', '2', '3', '4', '5', 'CPS 3000', 'Using'),
(16, 'Use Emotional Intelligence to identify, assess, and control the emotions of oneself and of others. \r\n', 'ASS 3005', '1', '2', '3', '4', '5', 'INS 3005', 'Using'),
(17, 'Stays current in terms of professional development. \r\n', 'ASS 3006', '1', '2', '3', '4', '5', 'PRO 3006', 'Using'),
(18, 'Networks with peers and associates to build a support base.', 'ASS 3007', '1', '2', '3', '4', '5', 'BAR 3007', 'Using'),
(19, 'Understands the viewpoint of higher management and effectively analyzes complex problems. ', 'ASS 3008', '1', '2', '3', '4', '5', 'STP 3008', 'Using'),
(20, 'Prefers quick and approximate actions in many management situations.', 'ASS 3009', '1', '2', '3', '4', '5', 'DEC 3009', 'Using'),
(21, '  I. Willingness to change to meet organizational \r\nneeds. \r\nII. Adapts to stressful situations.    ', 'ASS 3010', '1', '2', '3', '4', '5', 'FLE 3006', 'Remove'),
(22, 'Uses appropriate interpersonal style to steer team members towards the goal.', 'ASS 3020', '1', '2', '3', '4', '5', 'TEA 3002', 'Using'),
(23, 'Uses effective strategies to facilitate organizational \r\nchange initiatives and overcome resistance to change.', 'ASS 3115', '1', '2', '3', '4', '5', 'CMG 3010', 'Using');

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
  `Muet` varchar(255) NOT NULL,
  `Level` varchar(255) NOT NULL,
  `Total_Average` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `competency`
--

CREATE TABLE `competency` (
  `ID` int(11) NOT NULL,
  `CodeCompetency` varchar(255) NOT NULL,
  `Competency` varchar(255) NOT NULL,
  `GroupCompetency` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL DEFAULT 'Using'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `competency`
--

INSERT INTO `competency` (`ID`, `CodeCompetency`, `Competency`, `GroupCompetency`, `Status`) VALUES
(1, 'BAR 3007', 'Build appropriate relationships ', 'Core Competencies', 'Using'),
(10, 'CMG 3010', 'Change Management', 'Core Competencies', 'Using'),
(2, 'COM 3000', 'Basic Communication ', 'Core Competencies', 'Using'),
(3, 'CPS 3000', 'Creative Problem Solving', 'Core Competencies', 'Using'),
(4, 'DEC 3009', 'Decisiveness', 'Core Competencies', 'Using'),
(11, 'FLE 3006', 'Flexibility', 'Organization Competencies', 'Using'),
(5, 'INS 3005', 'Interpersonal Skills', 'Core Competencies', 'Using'),
(6, 'NEG 3000', 'Negotiating', 'Core Competencies', 'Using'),
(7, 'PRO 3006', 'Professionalism', 'Core Competencies', 'Using'),
(8, 'STP 3008', 'Strategic Perspective', 'Core Competencies', 'Using'),
(9, 'TEA 3002', 'Teamwork', 'Core Competencies', 'Using');

-- --------------------------------------------------------

--
-- Table structure for table `eanswer`
--

CREATE TABLE `eanswer` (
  `ID` int(11) NOT NULL,
  `EmployeeID` varchar(255) NOT NULL,
  `CandidateID` varchar(255) NOT NULL,
  `E_QCode` varchar(255) NOT NULL,
  `Vote` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `equestion`
--

CREATE TABLE `equestion` (
  `ID` int(11) NOT NULL,
  `EQuestion` varchar(255) NOT NULL,
  `E_QCode` varchar(255) NOT NULL,
  `Option1` varchar(255) NOT NULL,
  `Option2` varchar(255) NOT NULL,
  `Option3` varchar(255) NOT NULL,
  `Option4` varchar(255) NOT NULL,
  `Option5` varchar(255) NOT NULL,
  `CodeECompetency` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL DEFAULT 'Using'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `equestion`
--

INSERT INTO `equestion` (`ID`, `EQuestion`, `E_QCode`, `Option1`, `Option2`, `Option3`, `Option4`, `Option5`, `CodeECompetency`, `Status`) VALUES
(1, 'Skill fully settles differences by using a win-win approach in order to maintain relationships.', 'EVA 3001', '1', '2', '3', '4', '5', 'NEG 3000', 'Using'),
(2, 'Expresses oneself effectively both orally and in written form.', 'EVA 3000', '1', '2', '3', '4', '5', 'COM 3000', 'Using'),
(5, 'I. Identifies and collects information relevant to the problem. \r\nII. Selects the best course of action by identifying all the alternatives and then makes a logical assumption.', 'EVA 3003', '1', '2', '3', '4', '5', 'CPS 3000', 'Using'),
(6, 'Use Emotional Intelligence to identify, assess, and control the emotions of oneself and of others.', 'EVA 3005', '1', '2', '3', '4', '5', 'INS 3005', 'Using'),
(7, 'Stays current in terms of professional development.', 'EVA 3006', '1', '2', '3', '4', '5', 'PRO 3006', 'Using'),
(8, 'Networks with peers and associates to build a support base', 'EVA 3007', '1', '2', '3', '4', '5', 'BAR 3007', 'Using'),
(9, 'Understands the viewpoint of higher management and effectively analyzes complex problems.', 'EVA 3008', '1', '2', '3', '4', '5', 'STP 3008', 'Using'),
(10, 'Prefers quick and approximate actions in many management situations.', 'EVA 3009', '1', '2', '3', '4', '5', 'DEC 3009', 'Using');

-- --------------------------------------------------------

--
-- Table structure for table `formula_assessment`
--

CREATE TABLE `formula_assessment` (
  `ID` int(11) NOT NULL,
  `Assessment_ID` varchar(255) NOT NULL,
  `Formula1` int(11) NOT NULL,
  `Formula2` int(11) NOT NULL,
  `Formula3` int(11) NOT NULL,
  `Formula4` int(11) NOT NULL,
  `Total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `formula_evaluate`
--

CREATE TABLE `formula_evaluate` (
  `ID` int(11) NOT NULL,
  `Evaluate_ID` varchar(255) NOT NULL,
  `Formula1` int(11) NOT NULL,
  `Formula2` int(11) NOT NULL,
  `Formula3` int(11) NOT NULL,
  `Formula4` int(11) NOT NULL,
  `Total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(37, 'A00001', '', '', 'Unactivate'),
(38, 'A00004', '**654', 'Superior', 'Activate'),
(39, 'A00000', 'admins', 'Superadmin', 'Activate'),
(40, 'A00002', '123', 'Admin', 'Activate'),
(42, 'A00005', '741**', 'Superior', 'Activate'),
(43, 'A00008', '852', 'User', 'Activate'),
(44, 'A00010', '963', 'User', 'Activate');

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
  ADD KEY `EmployeeID` (`EmployeeID`),
  ADD KEY `A_QCode` (`A_QCode`);

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
-- Indexes for table `eanswer`
--
ALTER TABLE `eanswer`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `E_QCode` (`E_QCode`);

--
-- Indexes for table `equestion`
--
ALTER TABLE `equestion`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `E_QCode` (`E_QCode`),
  ADD KEY `CodeECompetency` (`CodeECompetency`);

--
-- Indexes for table `formula_assessment`
--
ALTER TABLE `formula_assessment`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `formula_evaluate`
--
ALTER TABLE `formula_evaluate`
  ADD PRIMARY KEY (`ID`);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `aquestion`
--
ALTER TABLE `aquestion`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `background`
--
ALTER TABLE `background`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eanswer`
--
ALTER TABLE `eanswer`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `equestion`
--
ALTER TABLE `equestion`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `formula_assessment`
--
ALTER TABLE `formula_assessment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `formula_evaluate`
--
ALTER TABLE `formula_evaluate`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

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
  ADD CONSTRAINT `aanswer_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `account` (`EmployeeID`),
  ADD CONSTRAINT `aanswer_ibfk_2` FOREIGN KEY (`A_QCode`) REFERENCES `aquestion` (`A_QCode`);

--
-- Constraints for table `aquestion`
--
ALTER TABLE `aquestion`
  ADD CONSTRAINT `aquestion_ibfk_1` FOREIGN KEY (`CodeACompetency`) REFERENCES `competency` (`CodeCompetency`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `background`
--
ALTER TABLE `background`
  ADD CONSTRAINT `background_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `account` (`EmployeeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `eanswer`
--
ALTER TABLE `eanswer`
  ADD CONSTRAINT `eanswer_ibfk_1` FOREIGN KEY (`E_QCode`) REFERENCES `equestion` (`E_QCode`) ON DELETE CASCADE ON UPDATE CASCADE;

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
