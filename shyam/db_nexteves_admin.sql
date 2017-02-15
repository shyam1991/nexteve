-- phpMyAdmin SQL Dump
-- version 4.4.15.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 02, 2017 at 09:07 PM
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_organisation_details`(IN orgid INT(10))
BEGIN
SELECT 
    od.Fk_int_orgid AS orgid,
    vchr_org_name AS orgname,
    ltext_org_about AS about,
    vchr_loc_name AS location,
    vchr_org_city AS city,
    vchr_org_place AS place,
    vchr_org_phone1 AS phone1,
    vchr_org_phone2 AS phone2,
    vchr_org_helpline_phone AS phone3,
    vchr_org_tollfree_phone AS tollfree,
    vchr_org_primary_email AS pemail,
    vchr_org_secondary_email AS semail,
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
    tb_locations l ON od.int_org_loc = l.Fk_int_locid
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
  `vchr_org_name` varchar(150) NOT NULL,
  `ltext_org_about` longtext,
  `vchr_org_place` varchar(150) NOT NULL,
  `vchr_org_city` varchar(150) NOT NULL,
  `int_org_loc` int(10) NOT NULL,
  `int_org_state` int(10) NOT NULL,
  `int_org_nation` int(10) NOT NULL,
  `int_org_type` int(10) NOT NULL,
  `vchr_org_phone1` varchar(150) NOT NULL,
  `vchr_org_phone2` varchar(150) DEFAULT NULL,
  `vchr_org_helpline_phone` varchar(150) DEFAULT NULL,
  `vchr_org_tollfree_phone` varchar(150) DEFAULT NULL,
  `vchr_org_primary_email` varchar(150) NOT NULL,
  `vchr_org_secondary_email` varchar(150) DEFAULT NULL,
  `vchr_org_contact_person_name` varchar(150) NOT NULL,
  `vchr_org_contact_person_number` varchar(150) NOT NULL,
  `vchr_org_contact_person_email` varchar(150) NOT NULL,
  `vchr_website` varchar(255) DEFAULT NULL,
  `chr_status` char(1) NOT NULL DEFAULT 'Y',
  `ts_updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `int_updated_by` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_organiser_details`
--

INSERT INTO `tb_organiser_details` (`Fk_int_orgid`, `vchr_org_name`, `ltext_org_about`, `vchr_org_place`, `vchr_org_city`, `int_org_loc`, `int_org_state`, `int_org_nation`, `int_org_type`, `vchr_org_phone1`, `vchr_org_phone2`, `vchr_org_helpline_phone`, `vchr_org_tollfree_phone`, `vchr_org_primary_email`, `vchr_org_secondary_email`, `vchr_org_contact_person_name`, `vchr_org_contact_person_number`, `vchr_org_contact_person_email`, `vchr_website`, `chr_status`, `ts_updated_on`, `int_updated_by`) VALUES
(1001, 'ARMC IVF', 'ARMC was founded in June 2009 by establishing its first ever day care fertility centre at Kozhikode, Kerala, India. IVF-ICSI has been a part of the services provided by this centre since its conception. As Managing director of ARMC IVF group of Fertility centers, Dr.K.U.Kunjimoideen leads the team of doctors, scientists, nurses and administration staff that are dedicated to ensuring that all couples are given the very best chance of achieving a pregnancy. As leaders in the field of reproductive medicine, our doctors offer the most advanced treatments available in a warm, friendly atmosphere. Because we understand that each of our couples is facing their own unique issues and challenges, we strive to provide compassionate care that is customized to their needs and goals. We provide a wide range of treatment options including Intrauterine Insemination (IUI), In-Vitro Fertilization (IVF), Intra Cytoplasmic Sperm Injection (ICSI) programs, Intracytoplasmic Morphologically selected Sperm Injection (IMSI), and Laser assisted hatching and level 3 fetal anomaly-scanning facilities. At each of our seven locations patients can expect to receive the highest quality infertility treatment from our caring professionals. We are committed to uphold our ethical policy of not doing any sort of donor programs as infertility treatment.', 'PUTHIYARA', 'KOZHIKODE', 11, 13, 356, 1, '04952724101', '04952724102', '9995271664', '1800 3000 3110', 'info@armicvf.com', 'contacts@armcivf.com', 'ARUN', '8129436464', 'itadmin@armcivf.com', 'http://www.armcivf.com', 'Y', '2016-12-20 16:08:24', 0),
(1002, 'ESQUIRE COMPUTERS', NULL, 'PUTHIYARA', 'KOZHIKODE', 11, 13, 356, 3, '0495272727', '0495272727', '8129436464', '180030003110', 'info@esquiercomputer.com', 'cotacts@esquire.com', 'Habeeb', '9447520986', 'habeeb@esquire.com', 'www.esquire.com', 'Y', '2016-12-22 22:09:48', 0);

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
(1001, 'https://pbs.twimg.com/profile_images/471945697210560512/BqVhtMyv.jpeg', 'http://www.ivf-clinic-india.com/pics/s3.jpg', 'Y', NULL);

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
(1001, 'https://www.facebook.com/ivfarmc', NULL, 'https://twitter.com/ARMC_IVF', 'https://plus.google.com/110241732669936942727', NULL, NULL, 'https://www.google.com/maps/embed/v1/place?q=ARMC+IVF+Fertility+Centre,+Kannur,+Kerala,+India&key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU', 'Y', NULL);

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
  ADD PRIMARY KEY (`Fk_int_orgid`);

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
