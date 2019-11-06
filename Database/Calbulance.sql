-- MySQL dump 10.13  Distrib 5.7.27, for Linux (x86_64)
--
-- Host: localhost    Database: Calbulance
-- ------------------------------------------------------
-- Server version	5.7.27-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `AcceptedRequests`
--

DROP TABLE IF EXISTS `AcceptedRequests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `AcceptedRequests` (
  `AccReqRegID` bigint(20) NOT NULL AUTO_INCREMENT,
  `DateTime` datetime NOT NULL,
  `Hospital` varchar(50) NOT NULL,
  `Ambulance` varchar(50) NOT NULL,
  `Driver` varchar(50) NOT NULL,
  `PatientName` varchar(50) NOT NULL,
  `PatientAddress` varchar(50) NOT NULL,
  `Contact` varchar(50) NOT NULL,
  `RequestNo` varchar(50) NOT NULL,
  `Status` varchar(5) NOT NULL,
  PRIMARY KEY (`AccReqRegID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Ambulances`
--

DROP TABLE IF EXISTS `Ambulances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Ambulances` (
  `AmbRegID` bigint(20) NOT NULL AUTO_INCREMENT,
  `HospitalID` varchar(50) NOT NULL,
  `AmbID` varchar(50) NOT NULL,
  `AmbNo` varchar(50) NOT NULL,
  `AmbModel` varchar(50) NOT NULL,
  `AmbDes` text,
  PRIMARY KEY (`AmbRegID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Appointments`
--

DROP TABLE IF EXISTS `Appointments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Appointments` (
  `AppId` bigint(20) NOT NULL AUTO_INCREMENT,
  `clientID` varchar(50) NOT NULL,
  `HospitalId` varchar(25) NOT NULL,
  `DateTime` datetime NOT NULL,
  `PatientName` varchar(50) NOT NULL,
  `Address` varchar(70) NOT NULL,
  `Contact` varchar(30) NOT NULL,
  `Doctor` varchar(50) NOT NULL,
  `DoctorType` varchar(40) NOT NULL,
  `AppointmentDateTime` datetime NOT NULL,
  `Status` varchar(7) NOT NULL,
  PRIMARY KEY (`AppId`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Associations`
--

DROP TABLE IF EXISTS `Associations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Associations` (
  `RegID` bigint(20) NOT NULL AUTO_INCREMENT,
  `AmbulanceReg` bigint(20) NOT NULL,
  `DriverReg` bigint(20) NOT NULL,
  `Hospital` varchar(50) NOT NULL,
  PRIMARY KEY (`RegID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `DRIVERS`
--

DROP TABLE IF EXISTS `DRIVERS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `DRIVERS` (
  `RegID` bigint(20) NOT NULL AUTO_INCREMENT,
  `HospitalID` varchar(50) NOT NULL,
  `DriverName` varchar(50) NOT NULL,
  `Address` text NOT NULL,
  `DOB` datetime NOT NULL,
  `License` varchar(50) NOT NULL,
  `Contact` varchar(20) NOT NULL,
  `EID` varchar(50) NOT NULL,
  `IMG_Name` varchar(105) NOT NULL,
  `LICENSE_LOC` varchar(105) NOT NULL,
  PRIMARY KEY (`RegID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Doctors`
--

DROP TABLE IF EXISTS `Doctors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Doctors` (
  `RegNo` bigint(20) NOT NULL AUTO_INCREMENT,
  `HID` varchar(25) NOT NULL,
  `Name` varchar(70) NOT NULL,
  `Type` varchar(40) NOT NULL,
  PRIMARY KEY (`RegNo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `HospitalAuth`
--

DROP TABLE IF EXISTS `HospitalAuth`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `HospitalAuth` (
  `Sno` int(11) NOT NULL AUTO_INCREMENT,
  `RegNo` varchar(25) NOT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `AdminID` varchar(50) NOT NULL,
  `AdminPwd` varchar(50) NOT NULL,
  `Acc_Type` char(2) NOT NULL,
  `Permissions_Code` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`Sno`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Hospitals`
--

DROP TABLE IF EXISTS `Hospitals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Hospitals` (
  `RegNo` varchar(25) NOT NULL,
  `HName` varchar(50) NOT NULL,
  `RName` varchar(50) NOT NULL,
  `Owner` varchar(50) NOT NULL,
  `Year` int(11) NOT NULL,
  `Land_Area` varchar(30) NOT NULL,
  `Owner_Type` varchar(50) NOT NULL,
  `Address` text NOT NULL,
  `Count_Doctors` int(11) DEFAULT NULL,
  `Count_Nurses` int(11) DEFAULT NULL,
  `Count_Wardboys` int(11) DEFAULT NULL,
  `Count_AdmStaf` int(11) DEFAULT NULL,
  `Count_HKeep` int(11) DEFAULT NULL,
  `Count_OT` int(11) DEFAULT NULL,
  `Count_Gen` int(11) DEFAULT NULL,
  `Count_ICU` int(11) DEFAULT NULL,
  `Count_CCU` int(11) DEFAULT NULL,
  `Count_BBlock` int(11) DEFAULT NULL,
  `Contact` text NOT NULL,
  `Master_ID` char(50) NOT NULL,
  `Master_Pwd` varchar(50) NOT NULL,
  `Pos_Lat` double NOT NULL,
  `Pos_Lng` double NOT NULL,
  `Rating` float DEFAULT NULL,
  `WorkingHours` float DEFAULT NULL,
  `Website` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`RegNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Requests`
--

DROP TABLE IF EXISTS `Requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Requests` (
  `Req_Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `DateTime` datetime NOT NULL,
  `HospitalId` varchar(25) NOT NULL,
  `ClientId` varchar(50) NOT NULL,
  `PatientName` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `ContactNo` varchar(15) NOT NULL,
  PRIMARY KEY (`Req_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Users`
--

DROP TABLE IF EXISTS `Users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Users` (
  `Reg` bigint(20) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Contact` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`Reg`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-06  1:37:59
