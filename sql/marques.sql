-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2017 at 09:11 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.5.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marques`
--

-- --------------------------------------------------------

--
-- Table structure for table `accidents`
--

CREATE TABLE `accidents` (
  `Id` int(11) NOT NULL,
  `SysDate` varchar(50) DEFAULT NULL,
  `Date` varchar(50) DEFAULT NULL,
  `Fleet` varchar(50) DEFAULT NULL,
  `Vehicle` varchar(50) DEFAULT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `Details` varchar(50) DEFAULT NULL,
  `Driver` varchar(50) DEFAULT NULL,
  `Injured` varchar(50) DEFAULT NULL,
  `Images` varchar(350) DEFAULT NULL,
  `EnteredBy` varchar(50) DEFAULT NULL,
  `DamageToVehicle` varchar(50) DEFAULT NULL,
  `ThirdPartyDamages` varchar(50) DEFAULT NULL,
  `Time` varchar(50) DEFAULT NULL,
  `Deaths` varchar(50) DEFAULT NULL,
  `Location` varchar(50) DEFAULT NULL,
  `StatusInjured` varchar(50) DEFAULT NULL,
  `Category` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accidents`
--

INSERT INTO `accidents` (`Id`, `SysDate`, `Date`, `Fleet`, `Vehicle`, `Type`, `Details`, `Driver`, `Injured`, `Images`, `EnteredBy`, `DamageToVehicle`, `ThirdPartyDamages`, `Time`, `Deaths`, `Location`, `StatusInjured`, `Category`) VALUES
(4, '2016-08-25 08:45:59', '2016-08-10 00:00:00', 'Container Carriers', 'KR6584', 'Machine', 'Face to face accident with van', 'Keith Nurega', '2', 'screen-shot-2015-08-23-at-4-47-09-pm-e1440373742135.jpg', 'Mark Antony', 'Buffer damaged', 'Windscreen damaged', '08:30:00', '0', 'K8 Highway', 'Minor bruises. Hospitalized', NULL),
(5, '2017-03-30 12:34:08', '2016-08-17 00:00:00', 'Container Carriers', 'KR6584', 'Trailers', 'Face to face hit with another vehicle', 'MARK MATTHEW', '1', 'Truck-Accident-Lawyer-Columbia-South-Carolina.jpg', 'Mark Antony', 'Front dents', 'Front section fully destroyed. Light post fallen', '09:00:00', '1', 'Manning Town', 'Hand broken. Legs wounded', 'Hand broken. Legs wounded');

-- --------------------------------------------------------

--
-- Table structure for table `carrierusers`
--

CREATE TABLE `carrierusers` (
  `ID` int(11) NOT NULL,
  `username` varchar(300) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `fullname` varchar(300) DEFAULT NULL,
  `groupid` varchar(300) DEFAULT NULL,
  `active` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `carrierusers`
--

INSERT INTO `carrierusers` (`ID`, `username`, `password`, `email`, `fullname`, `groupid`, `active`) VALUES
(5, 'Manager', 'c963aaa9c595d42374231143aaf804e3', 'manager@gmail.com', 'Brian Thomas', 'manager', 1),
(6, 'Admin', '21232f297a57a5a743894a0e4a801fc3', 'adminfleetco@gmails.com', 'Mark Croos', 'Admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `carrier_uggroups`
--

CREATE TABLE `carrier_uggroups` (
  `GroupID` int(11) NOT NULL,
  `Label` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `carrier_uggroups`
--

INSERT INTO `carrier_uggroups` (`GroupID`, `Label`) VALUES
(1, 'manager'),
(2, 'user'),
(3, 'viewer');

-- --------------------------------------------------------

--
-- Table structure for table `carrier_ugmembers`
--

CREATE TABLE `carrier_ugmembers` (
  `UserName` varchar(300) NOT NULL,
  `GroupID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `carrier_ugmembers`
--

INSERT INTO `carrier_ugmembers` (`UserName`, `GroupID`) VALUES
('Admin', -1),
('Admin', 1),
('Admin', 2),
('Admin', 3),
('Manager', 1),
('Manager', 2),
('Manager', 3),
('User', 2),
('Vishan', -1),
('Vishan', 1),
('Vishan', 2),
('Vishan', 3);

-- --------------------------------------------------------

--
-- Table structure for table `carrier_ugrights`
--

CREATE TABLE `carrier_ugrights` (
  `TableName` varchar(300) NOT NULL,
  `GroupID` int(11) NOT NULL,
  `AccessMask` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `carrier_ugrights`
--

INSERT INTO `carrier_ugrights` (`TableName`, `GroupID`, `AccessMask`) VALUES
('accidents', -1, 'AEDSPI'),
('accidents', 1, 'AEDSP'),
('accidents', 2, 'AESP'),
('accidents', 3, 'SP'),
('accidents Chart', -1, 'S'),
('accidents-report', -1, 'AEDSPI'),
('accidents-report', 1, 'SP'),
('accidents-report', 2, 'SP'),
('accidents-report', 3, 'SP'),
('admin_members', -1, 'ADESPIM'),
('admin_rights', -1, 'ADESPIM'),
('admin_users', -1, 'ADESPIM'),
('availability', -1, 'ASPI'),
('carrierusers', -1, 'ADESPIM'),
('creategrn', -2, 'ASP'),
('creategrn', -1, 'ADESPIM'),
('creategrn', 1, 'AEDSP'),
('creategrn', 2, 'ASP'),
('creategrn', 3, 'SP'),
('creategrn-addnew', -1, 'AEDSPI'),
('creategrn-disposal', -1, 'AEDSPI'),
('creategrn-disposal', 1, 'AEDSP'),
('creategrn-disposal', 2, 'AESP'),
('creategrn-disposal', 3, 'SP'),
('creategrn-disposal-rebuild', -1, 'AEDSPI'),
('creategrn-disposal-rebuild', 1, 'AEDSP'),
('creategrn-disposal-rebuild', 2, 'AESP'),
('creategrn-disposal-rebuild', 3, 'SP'),
('creategrn-issue', -1, 'AEDSPI'),
('creategrn-issue', 1, 'AEDSP'),
('creategrn-issue', 2, 'AESP'),
('creategrn-issue', 3, 'SP'),
('creategrn-issue-price', -1, 'AEDSPI'),
('creategrn-issue-price', 1, 'AEDSP'),
('creategrn-issue-price', 2, 'ASP'),
('creategrn-issue-rebuilt', -1, 'AEDSPI'),
('creategrn-issue-rebuilt', 1, 'AEDSP'),
('creategrn-issue-rebuilt', 2, 'AESP'),
('creategrn-issue-rebuilt', 3, 'SP'),
('creategrn-issue-rebuilt-use', -1, 'AEDSPI'),
('creategrn-issueofrebuild', -1, 'AEDSPI'),
('creategrn-issueofrebuiltyres', -1, 'AEDSPI'),
('creategrn-issuetorebuild', -1, 'AEDSPI'),
('creategrn-issuetorebuild', 1, 'AEDSP'),
('creategrn-issuetorebuild', 2, 'AESP'),
('creategrn-issuetorebuild', 3, 'SP'),
('creategrn-new', -1, 'AEDSPI'),
('creategrn-new', 1, 'AEDSP'),
('creategrn-new', 2, 'ASP'),
('creategrn-purchase', -1, 'AEDSPI'),
('creategrn-quick', -1, 'ASPI'),
('creategrn-rebuilt-issue', -1, 'AEDSPI'),
('creategrn-receipt', -1, 'ASPI'),
('creategrn-receive', -1, 'AEDSPI'),
('creategrn-receive', 1, 'AEDSP'),
('creategrn-receive', 2, 'AESP'),
('creategrn-receive', 3, 'SP'),
('creategrn-receive-rebuilt', -1, 'AEDSPI'),
('creategrn-receiveafterrebuild', -1, 'AEDSPI'),
('creategrn-receiveafterrebuild', 1, 'AEDSP'),
('creategrn-receiveafterrebuild', 2, 'AESP'),
('creategrn-receiveafterrebuild', 3, 'SP'),
('creategrn-removal', -1, 'AEDSPI'),
('creategrn-remove', -1, 'AEDSPI'),
('creategrn-remove', 1, 'AEDSP'),
('creategrn-remove', 2, 'AESP'),
('creategrn-remove', 3, 'SP'),
('creategrn-remove-other', -1, 'AEDSPI'),
('creategrn-remove-other', 1, 'AEDSP'),
('creategrn-remove-other', 2, 'AESP'),
('creategrn-remove-other', 3, 'SP'),
('creategrn-stock-balance', -1, 'SP'),
('creategrn-stock-balance', 1, 'SP'),
('creategrn-stock-balance', 2, 'SP'),
('creategrn-stock-balance', 3, 'SP'),
('creategrn-used', -1, 'AEDSPI'),
('creategrn-used', 1, 'AEDSP'),
('creategrn-used', 2, 'ASP'),
('creategrn1', -1, 'ASPI'),
('creategrn11', -1, 'ASPI'),
('Dashboard', -1, 'S'),
('fleettype', -1, 'AEDSPI'),
('fleettype', 1, 'ADESP'),
('fleettype', 2, 'AESP'),
('fleettype', 3, 'SP'),
('fuelmaster', -1, 'AEDSPI'),
('fuelmaster', 1, 'AEDSP'),
('fuelmaster', 2, 'AESP'),
('fuelmaster', 3, 'SP'),
('fuelmaster Chart', -1, 'S'),
('fuelmaster Chart', 1, 'S'),
('fuelmaster Chart', 2, 'S'),
('fuelmaster Chart', 3, 'S'),
('fuelmaster-avg', -1, 'AEDSPI'),
('fuelmaster-report', -1, 'SP'),
('fuelmaster-reporting', -1, 'SP'),
('fuelmaster-reports', -1, 'SP'),
('fuelmaster-reports', 1, 'SP'),
('fuelmaster-reports', 2, 'SP'),
('fuelmaster-reports', 3, 'SP'),
('fuelmaster-view', -1, 'AEDSPI'),
('fuelmaster1', -1, 'AEDSPI'),
('fuelprices', -1, 'AEDSPI'),
('fuelprices', 1, 'ADESP'),
('fuelprices', 2, 'AESP'),
('fuelprices', 3, 'SP'),
('fuelstationmaster', -1, 'AEDSPI'),
('fuelstationmaster', 1, 'ADESP'),
('fuelstationmaster', 2, 'AESP'),
('fuelstationmaster', 3, 'SP'),
('generalmaster', -1, 'AEDSPI'),
('home', -1, 'AEDSPI'),
('insurance-payments', -1, 'AEDSPI'),
('insurance-payments', 1, 'AEDSP'),
('insurance-payments', 2, 'AESP'),
('insurance-payments', 3, 'SP'),
('insurance-payments-report', -1, 'SP'),
('insuranceclaims', -1, 'AEDSPI'),
('insuranceclaims', 1, 'AEDSP'),
('insuranceclaims', 2, 'AESP'),
('insuranceclaims', 3, 'SP'),
('insuranceclaims-report', -1, 'SP'),
('insurancecompany', -1, 'AEDSPI'),
('insurancecompany', 1, 'ADESP'),
('insurancecompany', 2, 'AESP'),
('insurancecompany', 3, 'SP'),
('inventorymaster', -2, 'ASP'),
('inventorymaster', -1, 'ADESPIM'),
('inventorymaster', 1, 'ADESP'),
('inventorymaster', 2, 'AESP'),
('inventorymaster', 3, 'SP'),
('inventorymaster Chart', -1, 'S'),
('inventorymaster Report', -1, 'SP'),
('inventorymaster-max', -1, 'AEDSPI'),
('inventorymaster-pricing', -1, 'M'),
('inventorymaster-qty', -1, 'M'),
('maintenenace', -1, 'SP'),
('maintenenace', 1, 'ADESP'),
('maintenenace', 2, 'AESP'),
('maintenenace', 3, 'SP'),
('maintenenace Chart', -1, 'S'),
('maintenenace Chart', 1, 'S'),
('maintenenace Chart', 2, 'S'),
('maintenenace Chart', 3, 'S'),
('maintenenace Comp', -1, 'S'),
('maintenenace-accident-repair', -1, 'AEDSPI'),
('maintenenace-accident-repair', 1, 'AEDSP'),
('maintenenace-accident-repair', 2, 'AESP'),
('maintenenace-accident-repair', 3, 'SP'),
('maintenenace-accidentrepair', -1, 'AEDSPI'),
('maintenenace-general-repair', -1, 'AEDSPI'),
('maintenenace-general-repair', 1, 'AEDSP'),
('maintenenace-general-repair', 2, 'AESP'),
('maintenenace-general-repair', 3, 'SP'),
('maintenenace-generalrepair', -1, 'AEDSPI'),
('maintenenace-other-maintain', -1, 'AEDSPI'),
('maintenenace-other-maintain', 1, 'AEDSP'),
('maintenenace-other-maintain', 2, 'AESP'),
('maintenenace-regularservice', -1, 'AEDSPI'),
('maintenenace-regularservice', 1, 'AEDSP'),
('maintenenace-regularservice', 2, 'AESP'),
('maintenenace-regularservice', 3, 'SP'),
('maintenenace-report', -1, 'SPI'),
('maintenenace-report', 1, 'SP'),
('maintenenace-report', 2, 'SP'),
('maxprice', -1, 'AEDSPI'),
('otherrenewal', -1, 'AEDSP'),
('otherrenewal', 1, 'AEDSP'),
('otherrenewal', 2, 'AESP'),
('otherrenewal', 3, 'SP'),
('OtherRenewals', -1, 'AEDSPI'),
('RenewalsMaster', -1, 'AEDSPI'),
('rnewalmastertable', -1, 'AEDSP'),
('rnewalmastertable', 1, 'AEDSP'),
('rnewalmastertable', 2, 'AESP'),
('rnewalmastertable', 3, 'SP'),
('servicetypemaster', -1, 'AEDSPI'),
('servicetypemaster', 1, 'ADESP'),
('servicetypemaster', 2, 'AESP'),
('servicetypemaster', 3, 'SP'),
('stockissues', -1, 'AEDSPI'),
('stockissues', 1, 'AEDSP'),
('stockissues', 2, 'ASP'),
('suppliermaster', -1, 'AEDSPI'),
('suppliermaster', 1, 'ADESP'),
('suppliermaster', 2, 'AESP'),
('suppliermaster', 3, 'SP'),
('usedornew', -1, 'AEDSPI'),
('vehiclemaster', -1, 'AEDSPI'),
('vehiclemaster', 1, 'ADESP'),
('vehiclemaster', 2, 'AESP'),
('vehiclemaster', 3, 'SP'),
('vehiclemaster-fullcost', -1, 'SP'),
('vehiclemaster-insu', -1, 'AEDSPI'),
('vehiclemaster-new', -1, 'AEDSPI'),
('vehiclemaster-report', -1, 'AEDSPI'),
('vehiclemaster-report', 1, 'SP'),
('vehiclemaster-report', 2, 'SP'),
('vehiclemaster-report', 3, 'SP'),
('vehicletype', -1, 'AEDSPI'),
('vehicletype', 1, 'ADESP'),
('vehicletype', 2, 'AESP'),
('vehicletype', 3, 'SP');

-- --------------------------------------------------------

--
-- Table structure for table `creategrn`
--

CREATE TABLE `creategrn` (
  `ID` int(11) NOT NULL,
  `ItemCode` varchar(50) DEFAULT NULL,
  `Brand` varchar(50) DEFAULT NULL,
  `Description` varchar(50) DEFAULT NULL,
  `Supplier` varchar(50) DEFAULT NULL,
  `Quantity` varchar(50) DEFAULT NULL,
  `RemovedFrom` varchar(50) DEFAULT NULL,
  `SystemDate` varchar(50) DEFAULT NULL,
  `GRNDate` varchar(50) DEFAULT NULL,
  `EnteredBy` varchar(50) DEFAULT NULL,
  `ApprovedBy` varchar(50) DEFAULT NULL,
  `UnitPrice` varchar(50) DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `RefNumber` varchar(50) DEFAULT NULL,
  `CurrentStock` varchar(50) DEFAULT NULL,
  `Fleet` varchar(50) DEFAULT NULL,
  `PriceLink` varchar(50) DEFAULT NULL,
  `Cost` varchar(50) DEFAULT NULL,
  `Remarks` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `creategrn`
--

INSERT INTO `creategrn` (`ID`, `ItemCode`, `Brand`, `Description`, `Supplier`, `Quantity`, `RemovedFrom`, `SystemDate`, `GRNDate`, `EnteredBy`, `ApprovedBy`, `UnitPrice`, `Status`, `RefNumber`, `CurrentStock`, `Fleet`, `PriceLink`, `Cost`, `Remarks`) VALUES
(212, '2666TW', 'Ceat', 'Tyres', 'Kushi Tyres', '23', NULL, '2016-08-25 07:26:18', '2016-08-02 00:00:00', 'Mark Antony', NULL, '25', 'Purchase', '538', NULL, 'Cargo Carriers', NULL, '575', NULL),
(213, '5116519X', 'Toyota', 'Oil Filter', 'Meiken Traders', '11', NULL, '2016-08-25 07:26:56', '2016-08-04 00:00:00', 'Mark Antony', NULL, '360', 'Purchase', '8767', NULL, 'Cargo Carriers', NULL, '3960', NULL),
(214, '2666TW', 'Ceat', 'Tyres', 'Kushi Tyres', '231', NULL, '2016-08-25 07:27:20', '2016-08-26 00:00:00', 'Mark Antony', NULL, '12.50', 'Purchase', '7788', NULL, 'Cement Carriers', NULL, '2887.5', NULL),
(215, '54646G', 'Honda', 'Air Filter', 'Antony''s Hardwares', '8', NULL, '2016-08-25 07:27:53', '2016-08-16 00:00:00', 'Mark Antony', NULL, '125', 'Purchase', '768', NULL, 'Container Carriers', NULL, '1000', NULL),
(216, '5116519X', 'Toyota', 'Oil Filter', 'Meiken Traders', '25', NULL, '2016-08-25 07:28:11', '2016-08-11 00:00:00', 'Mark Antony', NULL, '35', 'Purchase', '587', NULL, 'Container Carriers', NULL, '875', NULL),
(217, 'SQ234', 'Caltex', 'Motor Oil', 'NKS Motor Spares', '5', NULL, '2016-08-25 07:28:45', '2016-08-09 00:00:00', 'Mark Antony', NULL, '235', 'Purchase', '28776', NULL, 'Cement Carriers', NULL, '1175', NULL),
(218, '54646G', 'Honda', 'Air Filter', 'Antony''s Hardwares', '12', NULL, '2016-08-25 07:29:27', '2016-08-10 00:00:00', 'Mark Antony', NULL, '75', 'Purchase', '868', NULL, 'Cargo Carriers', NULL, '900', NULL),
(219, '5116519X', 'Toyota', 'Oil Filter', 'Meiken Traders', '-10', 'BF1470', '2016-08-25 08:04:03', '2016-08-09 00:00:00', 'Mark Antony', NULL, '35', 'Issue', NULL, '27', 'Cargo Carriers', '5116519X', NULL, ''),
(220, 'SQ234', 'Caltex', 'Motor Oil', 'NKS Motor Spares', '-2', 'WK5874', '2016-08-25 08:04:43', '2016-08-09 00:00:00', 'Mark Antony', NULL, '235', 'Issue', NULL, '4', 'Cargo Carriers', 'SQ234', NULL, ''),
(221, '5116519X', 'Toyota', 'Oil Filter', 'Meiken Traders', '-18', 'KR6584', '2016-08-25 08:09:01', '2016-08-09 00:00:00', 'Mark Antony', NULL, '35', 'Issue', NULL, '26', 'Container Carriers', '5116519X', NULL, ''),
(222, '2666TW', 'Ceat', 'Tyres', 'Kushi Tyres', '-112', 'EF4771', '2016-08-25 08:09:39', '2016-08-03 00:00:00', 'Mark Antony', NULL, '12.50', 'Issue', NULL, '254', 'Cement Carriers', '2666TW', NULL, ''),
(223, '54646G', 'Honda', 'Air Filter', 'Antony''s Hardwares', '-2', 'KI5455', '2016-08-25 08:10:08', '2016-08-02 00:00:00', 'Mark Antony', NULL, '75', 'Issue', NULL, '20', 'Container Carriers', '54646G', NULL, ''),
(224, '2666TW', 'Ceat', 'Tyres', 'Kushi Tyres', '1', 'WK5874', '2016-08-25 08:12:54', '2016-08-10 00:00:00', 'Mark Antony', NULL, '0', 'Removal', NULL, NULL, 'Cargo Carriers', NULL, '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `name`, `phone`, `details`, `date_added`) VALUES
(1, 'MARK MATTHEW', '0717481820', '768900987tr53', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `fleettype`
--

CREATE TABLE `fleettype` (
  `Id` int(11) NOT NULL,
  `FleetType` varchar(50) DEFAULT NULL,
  `In-Charge` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fleettype`
--

INSERT INTO `fleettype` (`Id`, `FleetType`, `In-Charge`) VALUES
(1, 'Container Carriers', 'Daniel Thomas'),
(2, 'Cement Carriers', 'David Brian'),
(7, 'Cargo Carriers', 'Frank Anderson');

-- --------------------------------------------------------

--
-- Table structure for table `fuelmaster`
--

CREATE TABLE `fuelmaster` (
  `Id` int(11) NOT NULL,
  `fuel_date` date DEFAULT NULL,
  `vehicle` varchar(50) DEFAULT NULL,
  `meter_read` varchar(50) DEFAULT NULL,
  `litre_pump` varchar(50) DEFAULT NULL,
  `litre_price` varchar(50) DEFAULT NULL,
  `fuel_station` varchar(50) DEFAULT NULL,
  `fill_type` varchar(50) DEFAULT NULL,
  `last_mileage` varchar(50) DEFAULT NULL,
  `driver` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fuelmaster`
--

INSERT INTO `fuelmaster` (`Id`, `fuel_date`, `vehicle`, `meter_read`, `litre_pump`, `litre_price`, `fuel_station`, `fill_type`, `last_mileage`, `driver`) VALUES
(59, '2016-08-17', 'KI5455', '26752', '36', '45', 'Kiaco Fuel Station', 'Container Carriers', '26250', 'Kumar Sedhi'),
(60, '2016-08-22', 'KI5455', '27124', '41', '45', 'SK Fuel Station', 'Container Carriers', '26752', 'Kumar Sedhi'),
(61, '2017-02-01', 'BF1470', '234567', '134556', '24', 'Maua Shell', NULL, '134444', 'MARK MATTHEW');

-- --------------------------------------------------------

--
-- Table structure for table `fuelprices`
--

CREATE TABLE `fuelprices` (
  `Id` int(11) NOT NULL,
  `FuelType` varchar(50) DEFAULT NULL,
  `PricePerLiter` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fuelprices`
--

INSERT INTO `fuelprices` (`Id`, `FuelType`, `PricePerLiter`) VALUES
(1, 'Diesel', '30'),
(2, 'Petrol', '45');

-- --------------------------------------------------------

--
-- Table structure for table `fuelstationmaster`
--

CREATE TABLE `fuelstationmaster` (
  `Id` int(11) NOT NULL,
  `FuelStation` varchar(50) DEFAULT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `ContactNumber` varchar(50) DEFAULT NULL,
  `Deposit` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fuelstationmaster`
--

INSERT INTO `fuelstationmaster` (`Id`, `FuelStation`, `Address`, `ContactNumber`, `Deposit`) VALUES
(1, 'Kiaco Fuel Station', '25E Main Street', '+516546416', '500000'),
(3, 'Maua Shell', 'MAUA SHELL PETROL STATION', '254717481820', '8000'),
(4, 'KENOL MURANG''A', 'EASTWOOD APARTMENTS\r\nUPPERHILL ROAD', '254567890123', '4000');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `insurance-payments`
--

CREATE TABLE `insurance-payments` (
  `Id` int(11) NOT NULL,
  `SysDate` varchar(50) DEFAULT NULL,
  `Fleet` varchar(50) DEFAULT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `VehicleNo` varchar(50) DEFAULT NULL,
  `RenewalDueDate` varchar(50) DEFAULT NULL,
  `Premium` varchar(50) DEFAULT NULL,
  `Cost` varchar(50) DEFAULT NULL,
  `PaymentVoucher` varchar(50) DEFAULT NULL,
  `EnteredBy` varchar(50) DEFAULT NULL,
  `DateofPayment` varchar(50) DEFAULT NULL,
  `Insurer` varchar(50) DEFAULT NULL,
  `Date` varchar(50) DEFAULT NULL,
  `From` varchar(50) DEFAULT NULL,
  `To` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `insurance-payments`
--

INSERT INTO `insurance-payments` (`Id`, `SysDate`, `Fleet`, `Type`, `VehicleNo`, `RenewalDueDate`, `Premium`, `Cost`, `PaymentVoucher`, `EnteredBy`, `DateofPayment`, `Insurer`, `Date`, `From`, `To`) VALUES
(5, '2016-08-25 08:58:29', 'Cement Carriers', 'Machine', 'SK3266', '22 June', '3650', NULL, '2578', 'Mark Antony', '2016-08-23 00:00:00', 'Allianz Insurance', NULL, '2016-08-09 00:00:00', '2017-08-23 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `insuranceclaims`
--

CREATE TABLE `insuranceclaims` (
  `Id` int(11) NOT NULL,
  `SysDate` varchar(50) DEFAULT NULL,
  `Fleet` varchar(50) DEFAULT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `VehicleNo` varchar(50) DEFAULT NULL,
  `AccidentDate` varchar(50) DEFAULT NULL,
  `Claim` varchar(50) DEFAULT NULL,
  `EnteredBy` varchar(50) DEFAULT NULL,
  `ReceiptNo` varchar(50) DEFAULT NULL,
  `Remarks` varchar(50) DEFAULT NULL,
  `insurer` varchar(50) DEFAULT NULL,
  `Date` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `insuranceclaims`
--

INSERT INTO `insuranceclaims` (`Id`, `SysDate`, `Fleet`, `Type`, `VehicleNo`, `AccidentDate`, `Claim`, `EnteredBy`, `ReceiptNo`, `Remarks`, `insurer`, `Date`) VALUES
(6, '2016-08-25 09:18:17', 'Cement Carriers', 'Machine', 'SK3266', '4', '2500', 'Mark Antony', '558', '', 'AIA Insurance Plc', '2016-08-18 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `insurancecompany`
--

CREATE TABLE `insurancecompany` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `ContactName` varchar(50) DEFAULT NULL,
  `ContactNo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `insurancecompany`
--

INSERT INTO `insurancecompany` (`Id`, `Name`, `ContactName`, `ContactNo`) VALUES
(1, 'Allianz Insurance', 'Ajmal Nsheed', '+289124656'),
(2, 'AIA Insurance Plc', 'Arundhi Roy', '+54665699');

-- --------------------------------------------------------

--
-- Table structure for table `inventorymaster`
--

CREATE TABLE `inventorymaster` (
  `Id` int(11) NOT NULL,
  `ItemID` varchar(50) DEFAULT NULL,
  `Brand` varchar(50) DEFAULT NULL,
  `Description` varchar(50) DEFAULT NULL,
  `Supplier` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inventorymaster`
--

INSERT INTO `inventorymaster` (`Id`, `ItemID`, `Brand`, `Description`, `Supplier`) VALUES
(1, 'SQ234', 'Caltex', 'Motor Oil', 'NKS Motor Spares'),
(2, '54646G', 'Honda', 'Air Filter', 'Antony''s Hardwares'),
(5, '5116519X', 'Toyota', 'Oil Filter', 'Meiken Traders'),
(6, '2666TW', 'Ceat', 'Tyres', 'Kushi Tyres');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `supplier` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `item_name`, `brand`, `price`, `supplier`, `description`) VALUES
(1, 'TYRES', 'HANCOOK', 234500, 'KAMUKUNJI', 'BLAH BLAH SITAKI KUSIKIA, what do you.....');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `maintenenace`
--

CREATE TABLE `maintenenace` (
  `Id` int(11) NOT NULL,
  `Fleet` varchar(50) DEFAULT NULL,
  `Vehicle` varchar(50) DEFAULT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `Supplier` varchar(50) DEFAULT NULL,
  `Cost` varchar(50) DEFAULT NULL,
  `Remarks` varchar(50) DEFAULT NULL,
  `RefNo` varchar(50) DEFAULT NULL,
  `SysDate` varchar(50) DEFAULT NULL,
  `Date` varchar(50) DEFAULT NULL,
  `EnteredBy` varchar(50) DEFAULT NULL,
  `Approval` varchar(50) DEFAULT NULL,
  `MeterReading` varchar(50) DEFAULT NULL,
  `AccidentRef` varchar(50) DEFAULT NULL,
  `PaymentVoucher` varchar(50) DEFAULT NULL,
  `MaintType` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `maintenenace`
--

INSERT INTO `maintenenace` (`Id`, `Fleet`, `Vehicle`, `Type`, `Supplier`, `Cost`, `Remarks`, `RefNo`, `SysDate`, `Date`, `EnteredBy`, `Approval`, `MeterReading`, `AccidentRef`, `PaymentVoucher`, `MaintType`) VALUES
(23, 'Cargo Carriers', 'BF1470', 'Lorry', 'Kushi Tyres', '2500', NULL, 'Ref:OqMyW', '2017-03-30 14:42:16', '2016-11-22 00:00:00', 'Brian Thomas', '', '25402', '', '5455', 'Full Service'),
(24, 'Container Carriers', 'KR6584', 'Machine', 'Meiken Traders', '2540', '', '6554', '2016-11-22 12:37:32', '2016-11-08 00:00:00', 'Brian Thomas', NULL, '25466', NULL, '545', 'Lub Service');

-- --------------------------------------------------------

--
-- Table structure for table `otherrenewal`
--

CREATE TABLE `otherrenewal` (
  `ID` int(11) NOT NULL,
  `Fleet` varchar(50) DEFAULT NULL,
  `VehicleNo` varchar(50) DEFAULT NULL,
  `VehicleType` varchar(50) DEFAULT NULL,
  `PaymentType` varchar(50) DEFAULT NULL,
  `PaymentDate` varchar(50) DEFAULT NULL,
  `Cost` varchar(50) DEFAULT NULL,
  `SystemDate` varchar(50) DEFAULT NULL,
  `EnteredBy` varchar(50) DEFAULT NULL,
  `PeriodFrom` varchar(50) DEFAULT NULL,
  `PeriodTo` varchar(50) DEFAULT NULL,
  `PaymentRef` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `otherrenewal`
--

INSERT INTO `otherrenewal` (`ID`, `Fleet`, `VehicleNo`, `VehicleType`, `PaymentType`, `PaymentDate`, `Cost`, `SystemDate`, `EnteredBy`, `PeriodFrom`, `PeriodTo`, `PaymentRef`) VALUES
(2, 'Cement Carriers', 'SK3266', 'Machine', 'Emission Test', '2016-08-17 00:00:00', '2500', '2016-08-25 09:11:44', 'Mark Antony', '2016-08-16 00:00:00', '2017-08-16 00:00:00', '6336');

-- --------------------------------------------------------

--
-- Table structure for table `repair`
--

CREATE TABLE `repair` (
  `id` int(11) NOT NULL,
  `vehicle` varchar(255) NOT NULL,
  `part` varchar(255) NOT NULL,
  `cost` int(245) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `enteredBy` varchar(255) NOT NULL,
  `Details` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rnewalmastertable`
--

CREATE TABLE `rnewalmastertable` (
  `ID` int(11) NOT NULL,
  `Renewal` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rnewalmastertable`
--

INSERT INTO `rnewalmastertable` (`ID`, `Renewal`) VALUES
(1, 'Fitness Certificate'),
(2, 'Port Permit'),
(3, 'Emission Test');

-- --------------------------------------------------------

--
-- Table structure for table `servicetypemaster`
--

CREATE TABLE `servicetypemaster` (
  `Id` int(11) NOT NULL,
  `Type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `servicetypemaster`
--

INSERT INTO `servicetypemaster` (`Id`, `Type`) VALUES
(1, 'Full Service'),
(2, 'Lub Service'),
(3, 'Mechanical Service'),
(7, 'Other Maintenance');

-- --------------------------------------------------------

--
-- Table structure for table `suppliermaster`
--

CREATE TABLE `suppliermaster` (
  `Id` int(11) NOT NULL,
  `SupplierName` varchar(50) DEFAULT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `ContactPerson` varchar(50) DEFAULT NULL,
  `Telephone` varchar(50) DEFAULT NULL,
  `Remarks` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `suppliermaster`
--

INSERT INTO `suppliermaster` (`Id`, `SupplierName`, `Address`, `ContactPerson`, `Telephone`, `Remarks`) VALUES
(1, 'NKS Motor Spares', '546 Maek Aveneue', 'Davis Khan', '+3296656565', ''),
(2, 'Kushi Tyres', 'Jumaira Terras', 'Melani Hans', '+6521799196', ''),
(3, 'Meiken Traders', '245E Meinx Road', 'Anil Gupta', '+5665786786', ''),
(5, 'Alois', 'algomi-tech', NULL, '254567890123', 'test datas');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1488609427, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(2, '::1', 'janedoe@jane.com', '$2y$08$cqNG.KsQgiKo6Z3VMJTyKOn9aC/QhyeoCsq9aS5aDYc/io8HvcVz.', NULL, 'janedoe@jane.com', NULL, NULL, NULL, NULL, 1486899556, NULL, 1, 'Jane', 'Doe', 'ICT', '25472408567');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `vehiclemaster`
--

CREATE TABLE `vehiclemaster` (
  `ID` int(11) NOT NULL,
  `RegNo` varchar(50) DEFAULT NULL,
  `Fleet` varchar(50) DEFAULT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `RegDate` varchar(50) DEFAULT NULL,
  `Cost` varchar(50) DEFAULT NULL,
  `DriverAsigned` varchar(50) DEFAULT NULL,
  `Make` varchar(50) DEFAULT NULL,
  `Model` varchar(50) DEFAULT NULL,
  `InsuranceDue` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vehiclemaster`
--

INSERT INTO `vehiclemaster` (`ID`, `RegNo`, `Fleet`, `Type`, `RegDate`, `Cost`, `DriverAsigned`, `Make`, `Model`, `InsuranceDue`) VALUES
(3, 'BF1470', 'Cargo Carriers', 'Lorry', '2011-04-04 00:00:00', '658000', 'Antony Croos', 'Nissan', 'KMX4018E', '15 Jan'),
(5, 'KR6584', 'Container Carriers', 'Machine', '2014-04-09 00:00:00', '685000', 'Keith Nurega', 'Isuzu', 'UPS40185', '30 April'),
(7, 'KI5455', 'Container Carriers', 'Machine', '2015-04-04 00:00:00', '485000', 'Kumar Sedhi', 'Tata', 'NERS4018', '01 Jan'),
(9, 'KCH218P', NULL, 'LORRY', '02/01/2017', '3000000', 'KALULU MWIRICHIA', 'ISUZU', 'FHR', '10 SEP'),
(10, 'KCH218P', NULL, 'GH3254', '01/29/2017', '1200000', 'KALULU MWIRICHIA', 'ISUZU', 'FHR', '02/10/2017');

-- --------------------------------------------------------

--
-- Table structure for table `vehicletype`
--

CREATE TABLE `vehicletype` (
  `id` int(11) NOT NULL,
  `VehicleType` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vehicletype`
--

INSERT INTO `vehicletype` (`id`, `VehicleType`) VALUES
(1, 'Machine'),
(2, 'Trailers'),
(3, 'Lorry'),
(4, 'Tankers'),
(6, 'SUV');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accidents`
--
ALTER TABLE `accidents`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `carrierusers`
--
ALTER TABLE `carrierusers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `carrier_uggroups`
--
ALTER TABLE `carrier_uggroups`
  ADD PRIMARY KEY (`GroupID`);

--
-- Indexes for table `carrier_ugmembers`
--
ALTER TABLE `carrier_ugmembers`
  ADD PRIMARY KEY (`UserName`(50),`GroupID`);

--
-- Indexes for table `carrier_ugrights`
--
ALTER TABLE `carrier_ugrights`
  ADD PRIMARY KEY (`TableName`(50),`GroupID`);

--
-- Indexes for table `creategrn`
--
ALTER TABLE `creategrn`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fleettype`
--
ALTER TABLE `fleettype`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `fuelmaster`
--
ALTER TABLE `fuelmaster`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `fuelprices`
--
ALTER TABLE `fuelprices`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `fuelstationmaster`
--
ALTER TABLE `fuelstationmaster`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insurance-payments`
--
ALTER TABLE `insurance-payments`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `insuranceclaims`
--
ALTER TABLE `insuranceclaims`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `insurancecompany`
--
ALTER TABLE `insurancecompany`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `inventorymaster`
--
ALTER TABLE `inventorymaster`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maintenenace`
--
ALTER TABLE `maintenenace`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `otherrenewal`
--
ALTER TABLE `otherrenewal`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `repair`
--
ALTER TABLE `repair`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rnewalmastertable`
--
ALTER TABLE `rnewalmastertable`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `servicetypemaster`
--
ALTER TABLE `servicetypemaster`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `suppliermaster`
--
ALTER TABLE `suppliermaster`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `vehiclemaster`
--
ALTER TABLE `vehiclemaster`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `vehicletype`
--
ALTER TABLE `vehicletype`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accidents`
--
ALTER TABLE `accidents`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `carrierusers`
--
ALTER TABLE `carrierusers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `carrier_uggroups`
--
ALTER TABLE `carrier_uggroups`
  MODIFY `GroupID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `creategrn`
--
ALTER TABLE `creategrn`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;
--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `fleettype`
--
ALTER TABLE `fleettype`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `fuelmaster`
--
ALTER TABLE `fuelmaster`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `fuelprices`
--
ALTER TABLE `fuelprices`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `fuelstationmaster`
--
ALTER TABLE `fuelstationmaster`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `insurance-payments`
--
ALTER TABLE `insurance-payments`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `insuranceclaims`
--
ALTER TABLE `insuranceclaims`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `insurancecompany`
--
ALTER TABLE `insurancecompany`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `inventorymaster`
--
ALTER TABLE `inventorymaster`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `maintenenace`
--
ALTER TABLE `maintenenace`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `otherrenewal`
--
ALTER TABLE `otherrenewal`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `repair`
--
ALTER TABLE `repair`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rnewalmastertable`
--
ALTER TABLE `rnewalmastertable`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `servicetypemaster`
--
ALTER TABLE `servicetypemaster`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `suppliermaster`
--
ALTER TABLE `suppliermaster`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `vehiclemaster`
--
ALTER TABLE `vehiclemaster`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `vehicletype`
--
ALTER TABLE `vehicletype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
