-- phpMyAdmin SQL Dump
-- version 4.4.15.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 19, 2017 at 09:28 PM
-- Server version: 5.7.11-log
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_nexteves_admin`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_district_list`()
BEGIN
SELECT 
    Fk_int_dtid AS dtid,
    vchr_dtshortname AS dtshortname,
    vchr_dtname
FROM
    db_nexteves_admin.tb_districts
WHERE
    chr_status = 'Y';
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_events_highlightsid_limited`(IN locid INT(10),IN lim INT(10))
BEGIN
SELECT 
    ed.Fk_int_eid as eid,int_location as locid
FROM
    db_nexteves_admin.tb_event_details ed
    left join tb_event_venue_details evd
    on ed.Fk_int_eid = evd.Fk_int_eid
    left join tb_locations
    on int_location = Fk_int_locid
WHERE
    ed.chr_status = 'Y' and int_location = locid
ORDER BY ed.Fk_int_eid DESC limit lim;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_nextorgid`()
BEGIN
SELECT MAX(Fk_int_orgid) + 1 as nxt_orgid FROM db_nexteves_admin.tb_organiser_details;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_organisation_details`(IN orgid INT(10))
BEGIN
SELECT 
    od.Fk_int_orgid AS orgid,
    vchr_org_name AS orgname,
    ltext_org_about AS about,
    vchr_dtname AS location,
    vchr_org_city AS city,
    vchr_org_place AS place,
    vchr_org_phone1 AS phone1,
    vchr_org_phone2 AS phone2,
    vchr_org_tollfree_phone AS tollfree,
    vchr_org_primary_email AS pemail,
    vchr_org_contact_person_name as cperson_name,
    vchr_org_contact_person_number as cperson_number,
    vchr_org_contact_person_email as cperson_email,
    vchr_website as website,
    vchr_link_fb AS fb,
    vchr_link_gplus AS gplus,
    vchr_link_pinterest AS pinterest,
    vchr_link_youtube AS youtube,
    vcrh_link_linkedin AS linkedin,
    vchr_link_gmap AS map,
    vchr_img_logo AS logo,
    vchr_img_banner AS banner
FROM
    db_nexteves_admin.tb_organiser_details od
        LEFT JOIN
    tb_districts l ON od.int_org_dt = l.Fk_int_dtid
        LEFT JOIN
    tb_organiser_other_links ool ON od.Fk_int_orgid = ool.Fk_int_orgid
        LEFT JOIN
    tb_organiser_images oi ON od.Fk_int_orgid = oi.Fk_int_orgid
WHERE
    od.Fk_int_orgid = orgid
        AND od.chr_status = 'Y';
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_organiser_upcoming_events`(IN orgid INT(10))
BEGIN
SELECT 
    Fk_ai_int_eid AS eid,
    vchr_title AS event_title,
    LEFT(ltext_events_details, 100) AS event_details,
    vchr_org_name AS org_name,
    vchr_org_place AS event_place,
    vchr_org_city AS event_city,
    CONCAT(date_events_start_date,
            ' ',
            date_events_start_time,
            ' ',
            DATE_FORMAT(date_events_start_date, '%W'),
            ' to ',
            date_events_end_date,
            ' ',
            date_events_end_time,
            ' ',
            DATE_FORMAT(date_events_end_date, '%W')) AS event_time,
    CONCAT('data/event_images/', vchr_eimage_1) AS eimg1,
    CONCAT('data/event_images/4x4/', vchr_eimage_2) AS eimg2,
    CONCAT('data/event_images/', vchr_eimage_3) AS eimg3,
    CONCAT('data/event_images/', vchr_eimage_4) AS eimg4,
    CONCAT('data/event_images/', vchr_eimage_5) AS eimg5
FROM
    tb_event_titles ti
        LEFT JOIN
    tb_organiser_details od ON ti.Fk_ai_int_eid = od.Fk_int_orgid
        LEFT JOIN
    tb_event_images i ON ti.Fk_ai_int_eid = i.Fk_int_eid
        LEFT JOIN
    tb_event_details ed ON ti.Fk_ai_int_eid = ed.Fk_int_eid
        LEFT JOIN
    tb_events_timing tm ON ti.Fk_ai_int_eid = tm.Fk_int_eid
        LEFT JOIN
    tb_event_organiser eo ON Fk_ai_int_eid = eo.Fk_int_eid
WHERE
    eo.Fk_int_orgid = orgid and date_events_start_date > now();
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_orgdreg_insert`(IN orgname VARCHAR(100) , IN about LONGTEXT , IN blgname VARCHAR(100), IN city VARCHAR(100) , IN dtid INT(10) , IN stid INT(10) , IN ntnid INT(10) , IN catid INT(10), IN phone1 VARCHAR(15) , IN phone2 VARCHAR(15) , IN tollfree VARCHAR(15) , IN pemail VARCHAR(100) , IN web VARCHAR(100) , IN cpname VARCHAR(100) , IN cpphone VARCHAR(15) , IN cpemail VARCHAR(100) , IN fb VARCHAR(200) , IN youtube VARCHAR(200) , IN twitter VARCHAR(200) , IN gplus VARCHAR(200) , IN pinterest VARCHAR(200) , IN linkedin VARCHAR(200) , IN gmap LONGTEXT , IN fname VARCHAR(150) , IN fname1 VARCHAR(150))
BEGIN
INSERT INTO `db_nexteves_admin`.`tb_organiser_details` (`vchr_org_name`, `ltext_org_about`, `vchr_org_buiding_name`,`vchr_org_place`, `vchr_org_city`, `int_org_dt`, `int_org_state`, `int_org_nation`, `int_org_type`, `vchr_org_phone1`, `vchr_org_phone2`, `vchr_org_tollfree_phone`, `vchr_org_primary_email`,`vchr_website`, `vchr_org_contact_person_name`, `vchr_org_contact_person_number`, `vchr_org_contact_person_email`) VALUES (orgname,about,blgname,city,city,dtid,stid,ntnid,catid,phone1,phone2,tollfree,pemail,web,cpname,cpphone,cpemail);
INSERT INTO `db_nexteves_admin`.`tb_organiser_other_links` (`Fk_int_orgid`, `vchr_link_fb`, `vchr_link_youtube`, `vchr_link_twitter`, `vchr_link_gplus`, `vchr_link_pinterest`, `vcrh_link_linkedin`, `vchr_link_gmap`) VALUES ((SELECT MAX(Fk_int_orgid) AS last_orgid FROM db_nexteves_admin.tb_organiser_details) , fb , youtube , twitter , gplus , pinterest , linkedin , gmap);
INSERT INTO `db_nexteves_admin`.`tb_organiser_images` (`Fk_int_orgid`, `vchr_img_logo`, `vchr_img_banner`) VALUES ((SELECT MAX(Fk_int_orgid) AS last_orgid FROM db_nexteves_admin.tb_organiser_details) , fname , fname1); 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_search_events_list`(IN eid longtext)
BEGIN
SELECT 
    Fk_ai_int_eid AS eid,
    vchr_title AS event_title,
    LEFT(ltext_events_details, 100) AS event_details,
    vchr_org_name AS org_name,
    vchr_org_place AS event_place,
    vchr_org_city AS event_city,
    CONCAT(date_events_start_date,
            ' ',
            date_events_start_time,
            ' ',
            DATE_FORMAT(date_events_start_date, '%W'),
            ' to ',
            date_events_end_date,
            ' ',
            date_events_end_time,
            ' ',
            DATE_FORMAT(date_events_end_date, '%W')) AS event_time,
    CONCAT('data/event_images/', vchr_eimage_1) AS eimg1,
    CONCAT('data/event_images/', vchr_eimage_2) AS eimg2,
    CONCAT('data/event_images/', vchr_eimage_3) AS eimg3,
    CONCAT('data/event_images/', vchr_eimage_4) AS eimg4,
    CONCAT('data/event_images/', vchr_eimage_5) AS eimg5
FROM
    tb_event_titles ti
        LEFT JOIN
    tb_organiser_details od ON ti.Fk_ai_int_eid = od.Fk_int_orgid
        LEFT JOIN
    tb_event_images i ON ti.Fk_ai_int_eid = i.Fk_int_eid
        LEFT JOIN
    tb_event_details ed ON ti.Fk_ai_int_eid = ed.Fk_int_eid
        LEFT JOIN
    tb_events_timing tm ON ti.Fk_ai_int_eid = tm.Fk_int_eid
WHERE
    `Fk_ai_int_eid` IN (eid);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_districts`
--

CREATE TABLE IF NOT EXISTS `tb_districts` (
  `Fk_int_dtid` int(11) NOT NULL,
  `vchr_dtname` varchar(45) NOT NULL,
  `vchr_dtshortname` varchar(45) NOT NULL,
  `chr_status` char(1) NOT NULL DEFAULT 'Y',
  `ts_updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ts_updated_by` varchar(45) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_districts`
--

INSERT INTO `tb_districts` (`Fk_int_dtid`, `vchr_dtname`, `vchr_dtshortname`, `chr_status`, `ts_updated_on`, `ts_updated_by`) VALUES
(1, '	Thiruvananthapuram', 'TV', 'Y', '2017-02-17 13:35:00', '0'),
(2, 'Kollam', 'KL', 'Y', '2017-02-17 13:35:00', '0'),
(3, 'Pathanamthitta', 'PT', 'Y', '2017-02-17 13:35:00', '0'),
(4, 'Alappuzha', 'AL', 'Y', '2017-02-17 13:35:00', '0'),
(5, 'Kottayam', 'KT', 'Y', '2017-02-17 13:35:00', '0'),
(6, 'Idukki', 'ID', 'Y', '2017-02-17 13:35:00', '0'),
(7, 'Ernakulam', 'ER', 'Y', '2017-02-17 13:35:00', '0'),
(8, 'Thrissur', 'TS', 'Y', '2017-02-17 13:35:00', '0'),
(9, 'Palakkad', 'PL', 'Y', '2017-02-17 13:35:00', '0'),
(10, 'Malappuram', 'MA', 'Y', '2017-02-17 13:35:00', '0'),
(11, 'Kozhikode', 'KZ', 'Y', '2017-02-17 13:35:00', '0'),
(12, 'Wayanad', 'WA', 'Y', '2017-02-17 13:35:00', '0'),
(13, 'Kannur', 'KN', 'Y', '2017-02-17 13:35:00', '0'),
(14, 'Kasaragod', 'KS', 'Y', '2017-02-17 13:35:00', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_events_maps`
--

CREATE TABLE IF NOT EXISTS `tb_events_maps` (
  `Fk_int_eid` int(10) NOT NULL,
  `ltext_events_map_embedded` longtext NOT NULL,
  `chr_status` char(1) NOT NULL DEFAULT 'Y',
  `ts_updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `int_updated_by` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_events_maps`
--

INSERT INTO `tb_events_maps` (`Fk_int_eid`, `ltext_events_map_embedded`, `chr_status`, `ts_updated_on`, `int_updated_by`) VALUES
(1001, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3913.090414693499!2d75.7900479502454!3d11.254758991958782!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba659445f3d4cff%3A0x4c60b40c007cc0e7!2sARMC!5e0!3m2!1sen!2sin!4v1482229705877', 'Y', '2016-12-20 15:59:09', 0),
(1002, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3913.090414693499!2d75.7900479502454!3d11.254758991958782!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba659445f3d4cff%3A0x4c60b40c007cc0e7!2sARMC!5e0!3m2!1sen!2sin!4v1482229705877', 'Y', '2016-12-22 22:11:40', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_events_timing`
--

CREATE TABLE IF NOT EXISTS `tb_events_timing` (
  `Fk_int_eid` int(10) NOT NULL,
  `date_events_start_date` date NOT NULL,
  `date_events_start_time` time NOT NULL,
  `date_events_end_date` date NOT NULL,
  `date_events_end_time` time NOT NULL,
  `int_days` int(10) NOT NULL DEFAULT '1',
  `chr_status` char(1) NOT NULL DEFAULT 'Y',
  `ts_updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `int_updated_by` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_events_timing`
--

INSERT INTO `tb_events_timing` (`Fk_int_eid`, `date_events_start_date`, `date_events_start_time`, `date_events_end_date`, `date_events_end_time`, `int_days`, `chr_status`, `ts_updated_on`, `int_updated_by`) VALUES
(1001, '2017-01-31', '14:00:00', '2017-01-31', '20:00:00', 1, 'Y', '2016-12-20 14:27:26', 0),
(1002, '2016-12-31', '20:00:00', '2017-01-01', '00:30:00', 1, 'Y', '2016-12-22 22:12:58', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_event_categories_list`
--

CREATE TABLE IF NOT EXISTS `tb_event_categories_list` (
  `Fk_int_ecid` int(10) NOT NULL,
  `vchr_event_category` varchar(45) NOT NULL,
  `chr_status` char(1) NOT NULL DEFAULT 'Y',
  `ts_updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `int_updated_on` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_event_categories_list`
--

INSERT INTO `tb_event_categories_list` (`Fk_int_ecid`, `vchr_event_category`, `chr_status`, `ts_updated_on`, `int_updated_on`) VALUES
(1, 'HEALTH CARE', 'Y', '2016-12-20 16:15:39', 0),
(2, 'BUSINESS', 'Y', '2016-12-20 16:18:19', 0),
(3, 'COMPUTER SHOPE', 'Y', '2016-12-22 22:08:07', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_event_details`
--

CREATE TABLE IF NOT EXISTS `tb_event_details` (
  `Fk_int_eid` int(10) NOT NULL,
  `ltext_events_details` longtext NOT NULL,
  `chr_status` char(1) NOT NULL DEFAULT 'Y',
  `ts_updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `int_updated_by` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_event_details`
--

INSERT INTO `tb_event_details` (`Fk_int_eid`, `ltext_events_details`, `chr_status`, `ts_updated_on`, `int_updated_by`) VALUES
(1001, 'Contecting event with dinner', 'Y', '2016-12-22 22:13:26', 0),
(1002, 'Banquite with dinner', 'Y', '2016-12-22 22:13:43', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_event_images`
--

CREATE TABLE IF NOT EXISTS `tb_event_images` (
  `Fk_int_eid` int(11) NOT NULL,
  `vchr_eimage_1` varchar(200) DEFAULT NULL,
  `vchr_eimage_2` varchar(200) DEFAULT NULL,
  `vchr_eimage_3` varchar(200) DEFAULT NULL,
  `vchr_eimage_4` varchar(200) DEFAULT NULL,
  `vchr_eimage_5` varchar(200) DEFAULT NULL,
  `chr_status` char(1) DEFAULT 'Y',
  `ts_upadted_on` datetime NOT NULL,
  `int_updated_by` int(10) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_event_images`
--

INSERT INTO `tb_event_images` (`Fk_int_eid`, `vchr_eimage_1`, `vchr_eimage_2`, `vchr_eimage_3`, `vchr_eimage_4`, `vchr_eimage_5`, `chr_status`, `ts_upadted_on`, `int_updated_by`) VALUES
(1001, '1001_new_year_image1.jpg', '4x4.jpg', NULL, NULL, NULL, 'Y', '2016-12-24 11:22:50', 0),
(1002, '1002_new-year_image1.jpg', NULL, NULL, NULL, NULL, 'Y', '2016-12-24 12:25:09', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_event_organiser`
--

CREATE TABLE IF NOT EXISTS `tb_event_organiser` (
  `Fk_int_eid` int(10) NOT NULL,
  `Fk_int_orgid` int(10) NOT NULL,
  `chr_status` char(1) NOT NULL DEFAULT 'Y',
  `ts_updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `int_updated_by` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_event_organiser`
--

INSERT INTO `tb_event_organiser` (`Fk_int_eid`, `Fk_int_orgid`, `chr_status`, `ts_updated_on`, `int_updated_by`) VALUES
(1001, 1001, 'Y', '2016-12-20 15:54:19', 0),
(1002, 1002, 'Y', '2016-12-22 22:12:07', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_event_titles`
--

CREATE TABLE IF NOT EXISTS `tb_event_titles` (
  `Fk_ai_int_eid` int(10) NOT NULL,
  `vchr_title` varchar(200) NOT NULL,
  `chr_status` char(1) NOT NULL DEFAULT 'Y',
  `ts_created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `int_created_by` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=1003 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_event_titles`
--

INSERT INTO `tb_event_titles` (`Fk_ai_int_eid`, `vchr_title`, `chr_status`, `ts_created_on`, `int_created_by`) VALUES
(1001, 'Happy New Year Eve Party', 'Y', '2016-12-20 14:25:42', 0),
(1002, 'New Year Night', 'Y', '2016-12-22 22:11:10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_event_venue_details`
--

CREATE TABLE IF NOT EXISTS `tb_event_venue_details` (
  `Fk_int_eid` int(10) NOT NULL,
  `vchr_venue_place` varchar(100) NOT NULL,
  `vchr_venue_city` varchar(100) DEFAULT NULL,
  `int_location` int(10) NOT NULL,
  `chr_status` char(1) NOT NULL DEFAULT 'Y',
  `ts_updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `int_updated_by` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_event_venue_details`
--

INSERT INTO `tb_event_venue_details` (`Fk_int_eid`, `vchr_venue_place`, `vchr_venue_city`, `int_location`, `chr_status`, `ts_updated_on`, `int_updated_by`) VALUES
(1001, 'ARMC IVF', 'PUTHIYARA', 11, 'Y', '2016-12-20 15:53:47', 0),
(1002, 'THE RAVIZ RESORT', 'Opp New Bustand', 11, 'Y', '2016-12-22 22:14:22', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_locations`
--

CREATE TABLE IF NOT EXISTS `tb_locations` (
  `Fk_int_locid` int(10) NOT NULL,
  `vchr_loc_name` varchar(100) NOT NULL,
  `chr_loc_shortname` char(10) DEFAULT NULL,
  `chr_status` char(1) NOT NULL DEFAULT 'Y',
  `ts_updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `int_updated_on` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_locations`
--

INSERT INTO `tb_locations` (`Fk_int_locid`, `vchr_loc_name`, `chr_loc_shortname`, `chr_status`, `ts_updated_on`, `int_updated_on`) VALUES
(1, 'THIRUVANANTHAPURAM', 'TV', 'Y', '2016-12-20 14:41:54', 0),
(2, 'KOLLAM', 'KL', 'Y', '2016-12-20 14:41:54', 0),
(3, 'PATHANAMTHITTA', 'PT', 'Y', '2016-12-20 14:41:54', 0),
(4, 'ALAPPUZHA', 'AL', 'Y', '2016-12-20 14:41:54', 0),
(5, 'KOTTAYAM', 'KT', 'Y', '2016-12-20 14:41:54', 0),
(6, 'IDUKKI', 'ID', 'Y', '2016-12-20 14:41:54', 0),
(7, 'ERNAKULAM', 'ER', 'Y', '2016-12-20 14:41:54', 0),
(8, 'THRISSUR', 'TR', 'Y', '2016-12-20 14:41:54', 0),
(9, 'PALAKKAD', 'PL', 'Y', '2016-12-20 14:41:54', 0),
(10, 'MALAPPURAM', 'MA', 'Y', '2016-12-20 14:41:54', 0),
(11, 'KOZHIKODE', 'KZ', 'Y', '2016-12-20 14:41:54', 0),
(12, 'WAYANAD', 'WA', 'Y', '2016-12-20 14:41:54', 0),
(13, 'KANNUR', 'KN', 'Y', '2016-12-20 14:41:54', 0),
(14, 'KASARGOD', 'KS', 'Y', '2016-12-20 14:41:54', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_login_credentials`
--

CREATE TABLE IF NOT EXISTS `tb_login_credentials` (
  `FK_int_userid` int(10) NOT NULL,
  `vchr_username` varchar(150) NOT NULL,
  `vchr_password` varchar(255) NOT NULL,
  `chr_status` char(1) NOT NULL DEFAULT 'Y',
  `ts_updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ts_updated_by` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_login_credentials`
--

INSERT INTO `tb_login_credentials` (`FK_int_userid`, `vchr_username`, `vchr_password`, `chr_status`, `ts_updated_on`, `ts_updated_by`) VALUES
(1001, 'arunas', 'e10adc3949ba59abbe56e057f20f883e', 'Y', '2016-12-20 14:23:37', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_nations`
--

CREATE TABLE IF NOT EXISTS `tb_nations` (
  `Fk_int_nationid` int(10) NOT NULL,
  `vchr_nation_name` varchar(150) NOT NULL,
  `chr_short_name` char(3) NOT NULL,
  `chr_status` char(1) NOT NULL DEFAULT 'Y',
  `ts_updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `int_updated_by` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_nations`
--

INSERT INTO `tb_nations` (`Fk_int_nationid`, `vchr_nation_name`, `chr_short_name`, `chr_status`, `ts_updated_on`, `int_updated_by`) VALUES
(356, 'INDIA', 'IND', 'Y', '2016-12-20 15:36:50', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_organiser_details`
--

CREATE TABLE IF NOT EXISTS `tb_organiser_details` (
  `Fk_int_orgid` int(10) NOT NULL,
  `vchr_org_name` varchar(150) DEFAULT NULL,
  `ltext_org_about` longtext,
  `vchr_org_buiding_name` varchar(150) DEFAULT NULL,
  `vchr_org_place` varchar(150) DEFAULT NULL,
  `vchr_org_city` varchar(150) DEFAULT NULL,
  `int_org_dt` int(10) DEFAULT NULL,
  `int_org_state` int(10) DEFAULT NULL,
  `int_org_nation` int(10) DEFAULT NULL,
  `int_org_type` int(10) DEFAULT NULL,
  `vchr_org_phone1` varchar(150) DEFAULT NULL,
  `vchr_org_phone2` varchar(150) DEFAULT NULL,
  `vchr_org_tollfree_phone` varchar(150) DEFAULT NULL,
  `vchr_org_primary_email` varchar(150) NOT NULL,
  `vchr_website` varchar(100) DEFAULT NULL,
  `vchr_org_contact_person_name` varchar(150) DEFAULT NULL,
  `vchr_org_contact_person_number` varchar(150) DEFAULT NULL,
  `vchr_org_contact_person_email` varchar(150) DEFAULT NULL,
  `chr_status` char(1) DEFAULT 'Y',
  `ts_updated_on` datetime DEFAULT CURRENT_TIMESTAMP,
  `int_updated_by` int(10) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=1011 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_organiser_details`
--

INSERT INTO `tb_organiser_details` (`Fk_int_orgid`, `vchr_org_name`, `ltext_org_about`, `vchr_org_buiding_name`, `vchr_org_place`, `vchr_org_city`, `int_org_dt`, `int_org_state`, `int_org_nation`, `int_org_type`, `vchr_org_phone1`, `vchr_org_phone2`, `vchr_org_tollfree_phone`, `vchr_org_primary_email`, `vchr_website`, `vchr_org_contact_person_name`, `vchr_org_contact_person_number`, `vchr_org_contact_person_email`, `chr_status`, `ts_updated_on`, `int_updated_by`) VALUES
(1001, 'Armc ivf', 'ARMC was founded in June 2009 by establishing its first ever day care fertility centre at Kozhikode, Kerala, India. IVF-ICSI has been a part of the services provided by this centre since its conception. As Managing director of ARMC IVF group of Fertility centers, Dr.K.U.Kunjimoideen leads the team of doctors, scientists, nurses and administration staff that are dedicated to ensuring that all couples are given the very best chance of achieving a pregnancy.\r\nAs leaders in the field of reproductive medicine, our doctors offer the most advanced treatments available in a warm, friendly atmosphere. Because we understand that each of our couples is facing their own unique issues and challenges, we strive to provide compassionate care that is customized to their needs and goals. We provide a wide range of treatment options including Intrauterine Insemination (IUI), In-Vitro Fertilization (IVF), Intra Cytoplasmic Sperm Injection (ICSI) programs, Intracytoplasmic Morphologically selected Sperm Injection (IMSI), and Laser assisted hatching and level 3 fetal anomaly-scanning facilities.\r\nAt each of our seven locations patients can expect to receive the highest quality infertility treatment from our caring professionals. We are committed to uphold our ethical policy of not doing any sort of donor programs as infertility treatment', 'BMT CENTRE', 'Puthiyara', 'Puthiyara', 11, 14, 356, 1, '9447520986', '04952722222', '180030008383', 'itadmin@armcivf.com', 'www.armcivf.com', 'Arun', '9447520986', 'itadmin@armcivf.com', 'Y', '2017-02-18 23:06:45', 0),
(1002, 'Quick Heal Technologies ', 'Quick Heal Technologies Ltd. (Formerly Known as Quick Heal Technologies Pvt. Ltd.) is one of the leading IT security solutions company. Each Quick Heal product is designed to simplify IT security management across the length and depth of devices and on multiple platforms. They are customized to suit consumers, small businesses, Government establishments and corporate houses.', 'LFC Rd', 'Kaloor', 'Kaloor', 7, 14, 356, 1, '9447520986', '04952722222', '180030008383', 'itadmin@armcivf.com', 'www.quickheal.co.in', 'Mr.Rasheed', '9387589400', 'abdul.rasheed@sequirite.com', 'Y', '2017-02-19 01:52:06', 0),
(1003, 'Esquire Computers', 'Esquire computers ', 'Esquire Juction', 'Puthiyara', 'Puthiyara', 11, 14, 356, 1, '9447520986', '8129436464', '180030008383', 'info@esquirecomputers.com', 'www.esquirecomputers.com', 'Arun', '9447520986', 'itadmin@armcivf.com', 'Y', '2017-02-19 13:08:50', 0),
(1004, 'Esquire Computers', 'Esquire computers ', 'Esquire Juction', 'Puthiyara', 'Puthiyara', 11, 14, 356, 1, '9447520986', '8129436464', '180030008383', 'info@esquirecomputers.com', 'www.esquirecomputers.com', 'Arun', '9447520986', 'itadmin@armcivf.com', 'Y', '2017-02-19 13:18:16', 0),
(1005, 'Esquire Computers', 'Esquire computers ', 'Esquire Juction', 'Puthiyara', 'Puthiyara', 11, 14, 356, 1, '9447520986', '8129436464', '180030008383', 'info@esquirecomputers.com', 'www.esquirecomputers.com', 'Arun', '9447520986', 'itadmin@armcivf.com', 'Y', '2017-02-19 13:23:37', 0),
(1006, 'Esquire Computers', 'Esquire computers ', 'Esquire Juction', 'Puthiyara', 'Puthiyara', 11, 14, 356, 1, '9447520986', '8129436464', '180030008383', 'info@esquirecomputers.com', 'www.esquirecomputers.com', 'Arun', '9447520986', 'itadmin@armcivf.com', 'Y', '2017-02-19 13:28:55', 0),
(1007, 'Esquire Computers', 'Esquire computers ', 'Esquire Juction', 'Puthiyara', 'Puthiyara', 11, 14, 356, 1, '9447520986', '8129436464', '180030008383', 'info@esquirecomputers.com', 'www.esquirecomputers.com', 'Arun', '9447520986', 'itadmin@armcivf.com', 'Y', '2017-02-19 13:47:55', 0),
(1008, 'Esquire Computers', 'Esquire computers ', 'Esquire Juction', 'Puthiyara', 'Puthiyara', 11, 14, 356, 1, '9447520986', '8129436464', '180030008383', 'info@esquirecomputers.com', 'www.esquirecomputers.com', 'Arun', '9447520986', 'itadmin@armcivf.com', 'Y', '2017-02-19 14:06:05', 0),
(1009, 'Esquire Computers', 'Esquire computers ', 'Esquire Juction', 'Puthiyara', 'Puthiyara', 11, 14, 356, 1, '9447520986', '8129436464', '180030008383', 'info@esquirecomputers.com', 'www.esquirecomputers.com', 'Arun', '9447520986', 'itadmin@armcivf.com', 'Y', '2017-02-19 14:20:08', 0),
(1010, 'Armc ivf', 'baofjsaodfjlskdfjsalkfjsadlf;', 'BMT CENTRE', 'Puthiyara', 'Puthiyara', 10, 14, 356, 1, '9447520986', '04952722222', '180030008383', 'itadmin@armcivf.com', 'www.armcivf.com', 'Arun', '9447520986', 'itadmin@armcivf.com', 'Y', '2017-02-19 14:21:49', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_organiser_images`
--

CREATE TABLE IF NOT EXISTS `tb_organiser_images` (
  `Fk_int_orgid` int(10) NOT NULL,
  `vchr_img_logo` varchar(255) DEFAULT NULL,
  `vchr_img_banner` varchar(255) DEFAULT NULL,
  `chr_status` char(1) NOT NULL DEFAULT 'Y',
  `ts_updated_on` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_organiser_images`
--

INSERT INTO `tb_organiser_images` (`Fk_int_orgid`, `vchr_img_logo`, `vchr_img_banner`, `chr_status`, `ts_updated_on`) VALUES
(1001, 'armc-logo.png', 'armc-banner.jpg', 'Y', NULL),
(1002, '1002quickheal-logo.png', '1002quickheal-banner.jpg', 'Y', NULL),
(1003, '1003armc-logo.png', '1003armc-banner.jpg', 'Y', NULL),
(1004, '1004armc-logo.png', '1004armc-banner.jpg', 'Y', NULL),
(1005, '1005armc-logo.png', '1005armc-banner.jpg', 'Y', NULL),
(1006, '1006armc-logo.png', '1006armc-banner.jpg', 'Y', NULL),
(1007, '1007armc-logo.png', '1007armc-banner.jpg', 'Y', NULL),
(1008, '1008armc-logo.png', '10083-BodyPart_d9c065a6-7572-4e74-bcc2-b60d80c0da61.doc', 'Y', NULL),
(1009, '1009armc-logo.png', '1009armc-banner.jpg', 'Y', NULL),
(1010, '1010armc-logo.png', '1010armc-banner.jpg', 'Y', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_organiser_other_links`
--

CREATE TABLE IF NOT EXISTS `tb_organiser_other_links` (
  `Fk_int_orgid` int(10) NOT NULL,
  `vchr_link_fb` varchar(255) DEFAULT NULL,
  `vchr_link_youtube` varchar(255) DEFAULT NULL,
  `vchr_link_twitter` varchar(255) DEFAULT NULL,
  `vchr_link_gplus` varchar(255) DEFAULT NULL,
  `vchr_link_pinterest` varchar(255) DEFAULT NULL,
  `vcrh_link_linkedin` varchar(255) DEFAULT NULL,
  `vchr_link_gmap` varchar(255) DEFAULT NULL,
  `chr_status` char(1) NOT NULL DEFAULT 'Y',
  `ts_updated_on` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_organiser_other_links`
--

INSERT INTO `tb_organiser_other_links` (`Fk_int_orgid`, `vchr_link_fb`, `vchr_link_youtube`, `vchr_link_twitter`, `vchr_link_gplus`, `vchr_link_pinterest`, `vcrh_link_linkedin`, `vchr_link_gmap`, `chr_status`, `ts_updated_on`) VALUES
(1001, 'https://www.facebook.com/ivfarmc', 'https://www.youtube.com/user/armcivf14', 'https://twitter.com/ARMC_IVF', 'https://plus.google.com/110241732669936942727/posts', '', 'https://www.linkedin.com/home?trk=nav_responsive_tab_home', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1001751.1461335582!2d75.23193926562497!3d11.254759!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba659445f3d4cff%3A0x4c60b40c007cc0e7!2sARMC!5e0!3m2!1sen!2sin!4v1487440378419', 'Y', NULL),
(1002, 'https://www.facebook.com/quickhealav', 'https://www.youtube.com/user/quickheal', 'https://twitter.com/quickheal', 'https://plus.google.com/+quickheal', '', 'https://www.linkedin.com/company/quick-heal-technologies-pvt--ltd-?trk=parent_company_logo', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15716.956743026814!2d76.291132!3d9.997091!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xfc7d5a3dd13bf8eb!2sQuick+Heal+Security+Simplified+-+Safenet+Systems+And+Services!5e0!3m2!1sen!2sin!4v1487448143865', 'Y', NULL),
(1003, 'https://www.facebook.com/quickhealav', 'https://www.youtube.com/user/quickheal', 'https://twitter.com/quickheal', 'https://plus.google.com/+quickheal', 'pin link', 'https://www.linkedin.com/company/quick-heal-technologies-pvt--ltd-?trk=parent_company_logo', 'flksdjflsdjflksadf', 'Y', NULL),
(1004, 'https://www.facebook.com/quickhealav', 'https://www.youtube.com/user/quickheal', 'https://twitter.com/quickheal', 'https://plus.google.com/+quickheal', 'pin link', 'https://www.linkedin.com/company/quick-heal-technologies-pvt--ltd-?trk=parent_company_logo', 'flksdjflsdjflksadf', 'Y', NULL),
(1005, 'https://www.facebook.com/quickhealav', 'https://www.youtube.com/user/quickheal', 'https://twitter.com/quickheal', 'https://plus.google.com/+quickheal', 'pin link', 'https://www.linkedin.com/company/quick-heal-technologies-pvt--ltd-?trk=parent_company_logo', 'flksdjflsdjflksadf', 'Y', NULL),
(1006, 'https://www.facebook.com/quickhealav', 'https://www.youtube.com/user/quickheal', 'https://twitter.com/quickheal', 'https://plus.google.com/+quickheal', 'pin link', 'https://www.linkedin.com/company/quick-heal-technologies-pvt--ltd-?trk=parent_company_logo', 'flksdjflsdjflksadf', 'Y', NULL),
(1007, 'https://www.facebook.com/quickhealav', 'https://www.youtube.com/user/quickheal', 'https://twitter.com/quickheal', 'https://plus.google.com/+quickheal', 'pin link', 'https://www.linkedin.com/company/quick-heal-technologies-pvt--ltd-?trk=parent_company_logo', 'flksdjflsdjflksadf', 'Y', NULL),
(1008, 'https://www.facebook.com/quickhealav', 'https://www.youtube.com/user/quickheal', 'https://twitter.com/quickheal', 'https://plus.google.com/+quickheal', 'pin link', 'https://www.linkedin.com/company/quick-heal-technologies-pvt--ltd-?trk=parent_company_logo', 'flksdjflsdjflksadf', 'Y', NULL),
(1009, 'https://www.facebook.com/quickhealav', 'https://www.youtube.com/user/quickheal', 'https://twitter.com/quickheal', 'https://plus.google.com/+quickheal', 'pin link', 'https://www.linkedin.com/company/quick-heal-technologies-pvt--ltd-?trk=parent_company_logo', 'flksdjflsdjflksadf', 'Y', NULL),
(1010, 'fblink', 'https://www.youtube.com/user/quickheal', 'twitter link', 'gplus link', 'pin link', 'https://www.linkedin.com/company/quick-heal-technologies-pvt--ltd-?trk=parent_company_logo', 'kdjflksadjflsakdfj', 'Y', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_states`
--

CREATE TABLE IF NOT EXISTS `tb_states` (
  `Fk_int_stateid` int(10) NOT NULL,
  `vchr_state_name` varchar(150) DEFAULT NULL,
  `chr_state_shortname` char(5) DEFAULT NULL,
  `chr_status` char(1) NOT NULL DEFAULT 'Y',
  `ts_updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `int_updated_by` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_states`
--

INSERT INTO `tb_states` (`Fk_int_stateid`, `vchr_state_name`, `chr_state_shortname`, `chr_status`, `ts_updated_on`, `int_updated_by`) VALUES
(13, 'KERALA', 'KL', 'Y', '2016-12-20 15:09:32', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ticket_category`
--

CREATE TABLE IF NOT EXISTS `tb_ticket_category` (
  `Fk_int_ticket_typeid` int(10) NOT NULL,
  `vchr_ticket_type` varchar(100) NOT NULL,
  `chr_status` char(1) NOT NULL DEFAULT 'Y',
  `ts_updated_on` datetime NOT NULL,
  `int_updated_by` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_ticket_category`
--

INSERT INTO `tb_ticket_category` (`Fk_int_ticket_typeid`, `vchr_ticket_type`, `chr_status`, `ts_updated_on`, `int_updated_by`) VALUES
(1, 'Platinum', 'Y', '2017-01-13 21:31:46', 0),
(2, 'Gold', 'Y', '2017-01-13 21:31:46', 0),
(3, 'Silver', 'Y', '2017-01-13 21:31:46', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ticket_charges`
--

CREATE TABLE IF NOT EXISTS `tb_ticket_charges` (
  `Fk_int_eid` int(10) NOT NULL,
  `Fk_int_ticket_typeid` int(5) NOT NULL,
  `chr_status` char(1) NOT NULL DEFAULT 'Y',
  `ts_updated_on` datetime NOT NULL,
  `int_updated_by` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_districts`
--
ALTER TABLE `tb_districts`
  ADD PRIMARY KEY (`Fk_int_dtid`);

--
-- Indexes for table `tb_events_maps`
--
ALTER TABLE `tb_events_maps`
  ADD PRIMARY KEY (`Fk_int_eid`);

--
-- Indexes for table `tb_events_timing`
--
ALTER TABLE `tb_events_timing`
  ADD PRIMARY KEY (`Fk_int_eid`);

--
-- Indexes for table `tb_event_categories_list`
--
ALTER TABLE `tb_event_categories_list`
  ADD PRIMARY KEY (`Fk_int_ecid`);

--
-- Indexes for table `tb_event_details`
--
ALTER TABLE `tb_event_details`
  ADD PRIMARY KEY (`Fk_int_eid`);

--
-- Indexes for table `tb_event_images`
--
ALTER TABLE `tb_event_images`
  ADD PRIMARY KEY (`Fk_int_eid`);

--
-- Indexes for table `tb_event_organiser`
--
ALTER TABLE `tb_event_organiser`
  ADD PRIMARY KEY (`Fk_int_eid`);

--
-- Indexes for table `tb_event_titles`
--
ALTER TABLE `tb_event_titles`
  ADD PRIMARY KEY (`Fk_ai_int_eid`);

--
-- Indexes for table `tb_event_venue_details`
--
ALTER TABLE `tb_event_venue_details`
  ADD PRIMARY KEY (`Fk_int_eid`);

--
-- Indexes for table `tb_locations`
--
ALTER TABLE `tb_locations`
  ADD PRIMARY KEY (`Fk_int_locid`);

--
-- Indexes for table `tb_login_credentials`
--
ALTER TABLE `tb_login_credentials`
  ADD PRIMARY KEY (`FK_int_userid`);

--
-- Indexes for table `tb_nations`
--
ALTER TABLE `tb_nations`
  ADD PRIMARY KEY (`Fk_int_nationid`);

--
-- Indexes for table `tb_organiser_details`
--
ALTER TABLE `tb_organiser_details`
  ADD PRIMARY KEY (`Fk_int_orgid`);

--
-- Indexes for table `tb_organiser_images`
--
ALTER TABLE `tb_organiser_images`
  ADD PRIMARY KEY (`Fk_int_orgid`,`chr_status`);

--
-- Indexes for table `tb_organiser_other_links`
--
ALTER TABLE `tb_organiser_other_links`
  ADD PRIMARY KEY (`Fk_int_orgid`),
  ADD UNIQUE KEY `Fk_int_orgid_UNIQUE` (`Fk_int_orgid`);

--
-- Indexes for table `tb_states`
--
ALTER TABLE `tb_states`
  ADD PRIMARY KEY (`Fk_int_stateid`);

--
-- Indexes for table `tb_ticket_category`
--
ALTER TABLE `tb_ticket_category`
  ADD PRIMARY KEY (`Fk_int_ticket_typeid`);

--
-- Indexes for table `tb_ticket_charges`
--
ALTER TABLE `tb_ticket_charges`
  ADD KEY `Fk_ticket_charges_int_eid_idx` (`Fk_int_eid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_districts`
--
ALTER TABLE `tb_districts`
  MODIFY `Fk_int_dtid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tb_event_categories_list`
--
ALTER TABLE `tb_event_categories_list`
  MODIFY `Fk_int_ecid` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_event_titles`
--
ALTER TABLE `tb_event_titles`
  MODIFY `Fk_ai_int_eid` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1003;
--
-- AUTO_INCREMENT for table `tb_locations`
--
ALTER TABLE `tb_locations`
  MODIFY `Fk_int_locid` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tb_organiser_details`
--
ALTER TABLE `tb_organiser_details`
  MODIFY `Fk_int_orgid` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1011;
--
-- AUTO_INCREMENT for table `tb_ticket_category`
--
ALTER TABLE `tb_ticket_category`
  MODIFY `Fk_int_ticket_typeid` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_ticket_charges`
--
ALTER TABLE `tb_ticket_charges`
  ADD CONSTRAINT `Fk_ticket_charges_int_eid` FOREIGN KEY (`Fk_int_eid`) REFERENCES `tb_event_details` (`Fk_int_eid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
