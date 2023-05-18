create database cvdb;
use cvdb;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Permisos para los Admin y usuarios
CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `permission` varchar(255) CHARACTER SET latin1 NOT NULL,
  `createuser` varchar(255) DEFAULT NULL,
  `deleteuser` varchar(255) DEFAULT NULL,
  `createbid` varchar(255) DEFAULT NULL,
  `updatebid` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `permissions` (`id`, `permission`, `createuser`, `deleteuser`, `createbid`, `updatebid`) VALUES
(1, 'Superuser', '1', '1', '1', '1'),
(2, 'Admin', '1', NULL, '1', '1'),
(3, 'User', NULL, NULL, '1', '1');

-- --------------------------------------------------------

--
-- Estructura de la Tabla `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `Staffid` varchar(255) DEFAULT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Status` int(11) NOT NULL DEFAULT 1,
  `Photo` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT 'avatar15.jpg',
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbladmin` (`ID`, `Staffid`, `AdminName`, `UserName`, `FirstName`, `LastName`, `MobileNumber`, `Email`, `Status`, `Photo`, `Password`, `AdminRegdate`) VALUES
(2, 'C001', 'Admin', 'admin', 'John', 'Smith ', 770546590, 'john@gmail.com', 1, 'face19.jpg', '81dc9bdb52d04dc20036dbd8313ed055', '2020-07-21 10:18:39'),
(9, 'C002', 'Admin', 'tom', 'Agaba', 'tom', 757537271, 'tom@gmail.com', 1, 'pic_3.jpg', '25d55ad283aa400af464c76d713c07ad', '2020-08-21 07:08:48'),
(29, 'C003', 'User', 'owen', 'Thomas', 'Owen', 770546999, 'owen@gmail.com', 1, 'avatar15.jpg', '81dc9bdb52d04dc20036dbd8313ed055', '2021-07-20 22:36:02');

-- --------------------------------------------------------

--
-- Estructura de la Tabla `visitante`
--

CREATE TABLE `tblvisitor` (
  `ID` int(5) NOT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(8) DEFAULT NULL,
  `Address` varchar(250) DEFAULT NULL,
  `WhomtoMeet` varchar(120) DEFAULT NULL,
  `Deptartment` varchar(120) DEFAULT NULL,
  `ReasontoMeet` varchar(120) DEFAULT NULL,
  `EnterDate` timestamp NULL DEFAULT current_timestamp(),
  `remark` varchar(255) DEFAULT NULL,
  `outtime` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tblvisitor` (`ID`, `FullName`, `Email`, `MobileNumber`, `Address`, `WhomtoMeet`, `Deptartment`, `ReasontoMeet`, `EnterDate`, `remark`, `outtime`) VALUES
(15, 'John Simith', 'john@gmail.com', 12345678, 'Puno', 'Manager', 'ICT', 'project representation', '2023-03-20 22:17:40', NULL, NULL),
(16, 'Don Williams', 'williams@gmail.com', 77054688, 'Kampala Road', 'CEO', 'Finance', 'Payments', '2023-03-20 22:18:59', NULL, NULL),
(17, 'Andrea Gloria', 'gloria@gmail.com', 77054666, 'California', 'Manager', 'ICT', 'project representation', '2023-03-20 22:20:03', 'Representation done', '2023-04-20 22:20:58'),
(18, 'Gerald Morgan', 'gerald@gmail.com', 77054659, 'Puno', 'Manager', 'ICT', 'To do System updates', '2023-03-20 22:27:44', NULL, NULL);

--
-- Indexes para tablas que se van importar con Inser Into
--

--
-- Indexes para tabla `permisos`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes para tabla `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes para tabla `tblvisitante`
--
ALTER TABLE `tblvisitor`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT para dumped tables
--

--
-- AUTO_INCREMENT para tabla `permisos`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT para tabla `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT para tabla `tblvisitante`
--
ALTER TABLE `tblvisitor`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

