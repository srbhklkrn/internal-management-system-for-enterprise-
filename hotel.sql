-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2016 at 02:17 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `adult_partner`
--

CREATE TABLE IF NOT EXISTS `adult_partner` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `adult_gender` varchar(10) NOT NULL,
  `adult_mobile` int(10) NOT NULL,
  `adult_age` int(2) NOT NULL,
  `adult_relation` varchar(10) NOT NULL,
  `adult_id_image` varchar(200) DEFAULT NULL,
  `adult_id_type` varchar(20) NOT NULL,
  `adult_id_number` varchar(30) NOT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `adult_partner`
--

INSERT INTO `adult_partner` (`id`, `booking_id`, `first_name`, `last_name`, `adult_gender`, `adult_mobile`, `adult_age`, `adult_relation`, `adult_id_image`, `adult_id_type`, `adult_id_number`, `title`) VALUES
(4, 23892, 'S', 'S', 'Male', 12313, 12, 'dfsfsd', 'uploads/adult_id_img/S_12313.jpg', 'Driving Licence', '1234567', 'Mr.'),
(5, 23892, 'Saurabh', 'Kulkarni', 'Male', 2147483647, 12, 'dfsfsd', 'uploads/adult_id_img/Saurabh_2147483647.jpg', 'Aadhar Card', '1234567', 'Mr.');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE IF NOT EXISTS `bookings` (
  `id` int(11) NOT NULL,
  `id_item` int(20) NOT NULL DEFAULT '0',
  `the_date` date NOT NULL DEFAULT '0000-00-00',
  `id_state` int(11) NOT NULL DEFAULT '0',
  `id_booking` int(10) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bookings_admin_users`
--

CREATE TABLE IF NOT EXISTS `bookings_admin_users` (
  `id` int(11) NOT NULL,
  `level` tinyint(1) NOT NULL DEFAULT '2',
  `username` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `state` tinyint(1) NOT NULL DEFAULT '1',
  `date_visit` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `visits` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bookings_admin_users`
--

INSERT INTO `bookings_admin_users` (`id`, `level`, `username`, `password`, `state`, `date_visit`, `visits`) VALUES
(1, 1, 'admin', 'fe01ce2a7fbac8fafaed7c982a04e229', 1, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bookings_config`
--

CREATE TABLE IF NOT EXISTS `bookings_config` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `num_months` tinyint(3) NOT NULL DEFAULT '3',
  `default_lang` varchar(6) NOT NULL DEFAULT 'en',
  `theme` varchar(50) NOT NULL DEFAULT 'default',
  `start_day` enum('mon','sun') NOT NULL DEFAULT 'sun',
  `date_format` enum('us','eu') NOT NULL DEFAULT 'eu',
  `click_past_dates` enum('on','off') NOT NULL DEFAULT 'off',
  `cal_url` varchar(255) NOT NULL DEFAULT '',
  `local_path` varchar(255) NOT NULL DEFAULT '/calendar',
  `version` varchar(10) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bookings_config`
--

INSERT INTO `bookings_config` (`id`, `title`, `num_months`, `default_lang`, `theme`, `start_day`, `date_format`, `click_past_dates`, `cal_url`, `local_path`, `version`) VALUES
(1, 'Availability Calendar', 3, 'en', 'default', 'sun', 'eu', 'off', '/ac', '/calendar', 'v3.03.09');

-- --------------------------------------------------------

--
-- Table structure for table `bookings_items`
--

CREATE TABLE IF NOT EXISTS `bookings_items` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL DEFAULT '1',
  `id_ref_external` int(11) NOT NULL COMMENT 'link to external db table',
  `desc_en` varchar(100) NOT NULL DEFAULT '',
  `desc_es` varchar(100) NOT NULL DEFAULT '',
  `list_order` int(11) NOT NULL DEFAULT '0',
  `state` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bookings_items`
--

INSERT INTO `bookings_items` (`id`, `id_user`, `id_ref_external`, `desc_en`, `desc_es`, `list_order`, `state`) VALUES
(1, 1, 0, 'Demo Item', 'Demo', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bookings_last_update`
--

CREATE TABLE IF NOT EXISTS `bookings_last_update` (
  `id` int(10) NOT NULL,
  `id_item` int(10) NOT NULL DEFAULT '0',
  `date_mod` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bookings_states`
--

CREATE TABLE IF NOT EXISTS `bookings_states` (
  `id` int(11) NOT NULL,
  `desc_en` varchar(100) NOT NULL DEFAULT '',
  `desc_es` varchar(100) NOT NULL DEFAULT '',
  `code` varchar(10) NOT NULL DEFAULT '',
  `state` tinyint(1) NOT NULL DEFAULT '1',
  `list_order` int(11) NOT NULL DEFAULT '0',
  `class` varchar(30) NOT NULL DEFAULT '',
  `show_in_key` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bookings_states`
--

INSERT INTO `bookings_states` (`id`, `desc_en`, `desc_es`, `code`, `state`, `list_order`, `class`, `show_in_key`) VALUES
(1, 'Booked', 'Reservado', 'b', 1, 0, 'booked', 1),
(2, 'Booked am', 'Reservado am', 'b_am', 1, 1, 'booked_am', 1),
(3, 'Booked pm', 'Reservado pm', 'b_pm', 1, 2, 'booked_pm', 1),
(4, 'Provisional', 'Provisional', 'pr', 1, 3, 'booked_pr', 1),
(5, 'Provisional am', 'Provisional am', 'pr_am', 1, 4, 'booked_pr_am', 1),
(6, 'Provisional pm', 'Provisional pm', 'pr_pm', 1, 5, 'booked_pr_pm', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE IF NOT EXISTS `contact_us` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `message` text,
  `verifyCode` varchar(50) NOT NULL,
  `created_date` varchar(15) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `first_name`, `last_name`, `city`, `country`, `email`, `phone`, `message`, `verifyCode`, `created_date`) VALUES
(38, 'Sam', 'QWERTY', 'Navi Mumbai', 'India', 'saurabhkulkarni2010@hotmail.com', '09029792183', 'w', '', '2016-04-17');

-- --------------------------------------------------------

--
-- Table structure for table `create_bookings`
--

CREATE TABLE IF NOT EXISTS `create_bookings` (
  `id` int(11) NOT NULL,
  `booking_id` int(10) DEFAULT NULL,
  `check_in` date DEFAULT NULL,
  `checkin_time` time DEFAULT NULL,
  `check_out` date DEFAULT NULL,
  `checkout_time` time DEFAULT NULL,
  `room_type` varchar(50) DEFAULT NULL,
  `rate` int(10) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `booking_status` varchar(25) DEFAULT NULL,
  `stay_charges` double DEFAULT NULL,
  `gender_1` varchar(10) DEFAULT NULL,
  `primary_mobile` varchar(13) DEFAULT NULL,
  `primary_email` varchar(50) DEFAULT NULL,
  `id_type` varchar(25) DEFAULT NULL,
  `id_number` varchar(15) DEFAULT NULL,
  `id_image` varchar(500) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `primary_address` text,
  `city` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `country` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `zip_code` int(10) DEFAULT NULL,
  `created_date` varchar(10) DEFAULT NULL,
  `room_number` int(10) DEFAULT NULL,
  `adult` int(2) DEFAULT NULL,
  `child` int(2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `create_bookings`
--

INSERT INTO `create_bookings` (`id`, `booking_id`, `check_in`, `checkin_time`, `check_out`, `checkout_time`, `room_type`, `rate`, `title`, `first_name`, `last_name`, `booking_status`, `stay_charges`, `gender_1`, `primary_mobile`, `primary_email`, `id_type`, `id_number`, `id_image`, `dob`, `primary_address`, `city`, `country`, `zip_code`, `created_date`, `room_number`, `adult`, `child`) VALUES
(65, 4024, '2016-03-31', '04:15:00', '2016-04-28', '04:15:00', 'Standard', 800, 'Mr.', 'Dell', 'Samsung', 'CHECK OUT', 22400, 'Male', '9015879999', 's@g.com', 'Passport', '12345678', 'uploads/id_images/Dell_9015879999.jpg', '2016-02-24', '302, Dattatrya APT. CHS. Plot E-62,\r\nSector 3, Belpada ,Kharghar, Navi Mumbai', 'Navi Mumbai', 'India', 410210, '2016-04-07', 302, NULL, NULL),
(67, 23892, '2016-02-18', '12:30:00', '2016-02-29', '12:30:00', 'Deluxe', 900, 'Mr.', 'Sony', 'Ex', 'CHECK OUT', 9900, 'Male', '1234567', 's@g.com', 'Passport', '12345678', 'uploads/id_images/Sony_1234567.jpg', '2016-02-09', '302, Dattatrya APT. CHS. Plot E-62,\r\nSector 3, Belpada ,Kharghar, Navi Mumbai', 'Navi Mumbai', 'India', 410210, '2016-04-08', 303, NULL, NULL),
(100, 47440, NULL, '11:55:00', NULL, '11:55:00', 'Standard', 800, 'Mr.', 'Sameer', 'Joshi', 'CHECK IN', NULL, '0', '09029792183', 'saurabhkulkarni2010@hotmail.com', 'Passport', 'DFR123456', 'uploads/id_images/Sameer_09029792183.jpg', '2016-04-27', '302, Dattatrya APT. CHS. Plot E-62, Sector 3, Belpada ,Kharghar, Navi Mumbai', 'Navi Mumbai', 'India', 410210, '2016-04-17', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id` int(11) NOT NULL,
  `created_on` date DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `home_page_img`
--

CREATE TABLE IF NOT EXISTS `home_page_img` (
  `id` int(11) NOT NULL,
  `img_1_name` varchar(50) DEFAULT NULL,
  `photo_1_text` text,
  `photo_1_subtext` text,
  `photo_1` varchar(500) DEFAULT NULL,
  `img_2_name` varchar(50) DEFAULT NULL,
  `photo_2_text` text,
  `photo_2_subtext` text,
  `photo_2` varchar(500) DEFAULT NULL,
  `img_3_name` varchar(50) DEFAULT NULL,
  `photo_3_text` text,
  `photo_3_subtext` text,
  `photo_3` varchar(500) DEFAULT NULL,
  `img_4_name` varchar(50) DEFAULT NULL,
  `photo_4_text` text,
  `photo_4_subtext` text,
  `photo_4` varchar(500) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `home_page_img`
--

INSERT INTO `home_page_img` (`id`, `img_1_name`, `photo_1_text`, `photo_1_subtext`, `photo_1`, `img_2_name`, `photo_2_text`, `photo_2_subtext`, `photo_2`, `img_3_name`, `photo_3_text`, `photo_3_subtext`, `photo_3`, `img_4_name`, `photo_4_text`, `photo_4_subtext`, `photo_4`) VALUES
(9, 'hotel1', 'i can''t imagine a better hotel', 'This is simply the best hotel you Can imagine. Everybody is so friendly and unbelievable friendly', 'uploads/hotel-home-img/hotel1.jpg', 'hotel2', 'Magic Stay in Mumbai', 'Just spent a magical 4 days in Mumbai at Berge Hotel', 'uploads/hotel-home-img/hotel2.jpg', 'golden', 'GOLDEN DRAGON', 'This illustrious restaurant is famous for its delectable Sichuan and Cantonese cuisines, and its unique live kitchen.', 'uploads/hotel-home-img/golden.jpg', 'masala2', 'MASALA KRAFT', 'Indulge in contemporary Indian cuisine with live cooking stations, innovative Masala Medley cocktails and local Bombay Tiffins.', 'uploads/hotel-home-img/masala2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_facilities`
--

CREATE TABLE IF NOT EXISTS `hotel_facilities` (
  `id` int(11) NOT NULL,
  `airport` varchar(50) NOT NULL,
  `babysit` varchar(50) NOT NULL,
  `bar` varchar(50) NOT NULL,
  `nearbeach` varchar(50) NOT NULL,
  `parking` varchar(50) NOT NULL,
  `conference` varchar(50) NOT NULL,
  `elevator` varchar(50) NOT NULL,
  `entertainment` varchar(50) NOT NULL,
  `gym` varchar(50) NOT NULL,
  `safe` varchar(50) NOT NULL,
  `internet` varchar(50) NOT NULL,
  `laundry` varchar(50) NOT NULL,
  `moneyexchange` varchar(50) NOT NULL,
  `smoking` varchar(50) NOT NULL,
  `spa` varchar(50) NOT NULL,
  `pool` varchar(50) NOT NULL,
  `ac` varchar(50) NOT NULL,
  `pets` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hotel_info`
--

CREATE TABLE IF NOT EXISTS `hotel_info` (
  `id` int(11) NOT NULL,
  `hotel_address` text,
  `phone1` varchar(20) DEFAULT NULL,
  `phone2` varchar(20) DEFAULT NULL,
  `phone3` varchar(20) DEFAULT NULL,
  `phone4` varchar(20) DEFAULT NULL,
  `contact_email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hotel_info`
--

INSERT INTO `hotel_info` (`id`, `hotel_address`, `phone1`, `phone2`, `phone3`, `phone4`, `contact_email`) VALUES
(1, 'Bandra Worli Sea Link, Worli,Mumbai-12', '+11 (0) 200 1111 001', '+11 (0) 200 1111 002', '+11 (0) 200 1111 003', '+11 (0) 200 1111 004', 'support@theberg.com');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE IF NOT EXISTS `invoices` (
  `id` int(11) NOT NULL,
  `final_amount` double DEFAULT NULL,
  `rate` int(10) DEFAULT NULL,
  `invoice_no` int(11) DEFAULT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `stay_charges` int(11) DEFAULT NULL,
  `room_number` varchar(50) DEFAULT NULL,
  `service_charge` double DEFAULT NULL,
  `service_tax` double DEFAULT NULL,
  `luxury_tax` double DEFAULT NULL,
  `swach_bharat_cess` double DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `payment` enum('Credit Card','Debit Card','Online','Cash') DEFAULT NULL,
  `check_in` date DEFAULT NULL,
  `check_out` date DEFAULT NULL,
  `primary_address` text,
  `city` text,
  `country` text,
  `zip_code` int(10) DEFAULT NULL,
  `room_type` varchar(50) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `primary_email` varchar(50) DEFAULT NULL,
  `primary_mobile` varchar(15) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `final_amount`, `rate`, `invoice_no`, `booking_id`, `first_name`, `last_name`, `stay_charges`, `room_number`, `service_charge`, `service_tax`, `luxury_tax`, `swach_bharat_cess`, `discount`, `payment`, `check_in`, `check_out`, `primary_address`, `city`, `country`, `zip_code`, `room_type`, `created_date`, `primary_email`, `primary_mobile`) VALUES
(9, 12208, 900, 44074, 23892, 'Sony', 'Ex', 9900, '303', 6.8, 8.4, 10, 2.5, 500, 'Cash', '2016-02-18', '2016-02-29', '302, Dattatrya APT. CHS. Plot E-62,\r\nSector 3, Belpada ,Kharghar, Navi Mumbai', 'Navi Mumbai', 'India', 410210, 'Deluxe', '2016-04-08 18:07:56', 's@g.com', '1234567'),
(10, 11115, 900, 4415, 23892, 'Sony', 'Ex', 9900, '303', 3, 1, 6, 2, NULL, 'Credit Card', '2016-02-18', '2016-02-29', '302, Dattatrya APT. CHS. Plot E-62,\r\nSector 3, Belpada ,Kharghar, Navi Mumbai', 'Navi Mumbai', 'India', 410210, 'Deluxe', '2016-04-14 18:26:59', 's@g.com', '1234567'),
(11, 1010, NULL, 90508, 9755, 'QW', 'EW', 900, '', 3, 1, 6, 2, NULL, 'Credit Card', '2016-04-16', '2016-04-17', '302, Dattatrya APT. CHS. Plot E-62, Sector 3, Belpada ,Kharghar, Navi Mumbai', 'Navi Mumbai', 'India', 410210, 'Deluxe', '2016-04-15 14:11:43', 'saurabhkulkarni2010@hotmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `kid_partner`
--

CREATE TABLE IF NOT EXISTS `kid_partner` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `kid_name` varchar(50) NOT NULL,
  `k_gender` varchar(10) NOT NULL,
  `k_age` int(2) NOT NULL,
  `k_relation` varchar(20) NOT NULL,
  `k_id_image` varchar(200) NOT NULL,
  `k_id_type` varchar(30) NOT NULL,
  `k_id_number` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kid_partner`
--

INSERT INTO `kid_partner` (`id`, `booking_id`, `kid_name`, `k_gender`, `k_age`, `k_relation`, `k_id_image`, `k_id_type`, `k_id_number`) VALUES
(1, 23892, 'ASk DF', 'Male', 4, 'asdfgh', 'uploads/kid_id_img/ASk DF_23892.jpg', 'Aadhar Card', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1438249616),
('m130524_201442_init', 1438249619);

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE IF NOT EXISTS `partners` (
  `id` int(11) NOT NULL,
  `create_bookings_id` int(11) NOT NULL,
  `adult_name` varchar(50) NOT NULL,
  `adult_gender` varchar(10) NOT NULL,
  `adult_mobile` int(13) DEFAULT NULL,
  `adult_age` int(2) DEFAULT NULL,
  `adult_relation` varchar(25) NOT NULL,
  `adult_id_image` varchar(500) NOT NULL,
  `adult_id_type` varchar(25) NOT NULL,
  `adult_id_number` varchar(15) NOT NULL,
  `k_name` varchar(50) DEFAULT NULL,
  `k_gender` varchar(25) NOT NULL,
  `k_age` int(2) DEFAULT NULL,
  `k_relation` varchar(25) NOT NULL,
  `k_id_image` varchar(500) NOT NULL,
  `k_id_type` varchar(25) NOT NULL,
  `k_id_number` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE IF NOT EXISTS `restaurant` (
  `id` int(11) NOT NULL,
  `booking_id` int(10) NOT NULL,
  `room_no` int(5) NOT NULL,
  `order_date_time` datetime NOT NULL,
  `dish_item` varchar(50) NOT NULL,
  `dish_cost` double NOT NULL,
  `total_cost` double NOT NULL,
  `tax` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`id`, `booking_id`, `room_no`, `order_date_time`, `dish_item`, `dish_cost`, `total_cost`, `tax`) VALUES
(1, 90645, 133, '0000-00-00 00:00:00', 'xyz', 12345, 36, 10);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_menu`
--

CREATE TABLE IF NOT EXISTS `restaurant_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(500) NOT NULL,
  `rate` double DEFAULT NULL,
  `logo` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restaurant_menu`
--

INSERT INTO `restaurant_menu` (`id`, `menu`, `rate`, `logo`) VALUES
(1, 'malai kofta', 130, ''),
(2, 'tea', 10, ''),
(3, 'hakka noodles', 90, '');

-- --------------------------------------------------------

--
-- Table structure for table `room_amenities`
--

CREATE TABLE IF NOT EXISTS `room_amenities` (
  `id` int(11) NOT NULL,
  `room_type` varchar(40) CHARACTER SET latin1 NOT NULL,
  `room_no` int(5) NOT NULL,
  `tv` varchar(3) CHARACTER SET latin1 NOT NULL,
  `balcony` varchar(3) CHARACTER SET latin1 NOT NULL,
  `phone` varchar(3) CHARACTER SET latin1 NOT NULL,
  `ac` varchar(3) CHARACTER SET latin1 NOT NULL,
  `breakfast` varchar(3) CHARACTER SET latin1 NOT NULL,
  `dinner` varchar(3) CHARACTER SET latin1 NOT NULL,
  `lunch` varchar(3) CHARACTER SET latin1 NOT NULL,
  `wifi` varchar(3) CHARACTER SET latin1 NOT NULL,
  `safe` varchar(3) CHARACTER SET latin1 NOT NULL,
  `indoor_bar` varchar(3) CHARACTER SET latin1 NOT NULL,
  `extra_bed` varchar(3) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `room_rates`
--

CREATE TABLE IF NOT EXISTS `room_rates` (
  `id` int(20) NOT NULL,
  `room_type` varchar(50) NOT NULL,
  `default_price` int(4) NOT NULL DEFAULT '0',
  `extra_beds_charges` int(5) NOT NULL,
  `price_monday` int(4) DEFAULT '0',
  `price_tuesday` int(4) DEFAULT '0',
  `price_wednesday` int(4) DEFAULT '0',
  `price_thursday` int(4) DEFAULT '0',
  `price_friday` int(4) DEFAULT '0',
  `price_saturday` int(4) DEFAULT '0',
  `price_sunday` int(4) DEFAULT '0',
  `tax` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `room_types`
--

CREATE TABLE IF NOT EXISTS `room_types` (
  `id` int(11) NOT NULL,
  `room_id` int(5) DEFAULT NULL,
  `room_type` varchar(40) DEFAULT NULL,
  `total_count` int(5) DEFAULT NULL,
  `total_booked` int(10) DEFAULT NULL,
  `total_remain` int(10) DEFAULT NULL,
  `rate` int(5) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `extra_beds` int(3) DEFAULT NULL,
  `images` varchar(500) DEFAULT NULL,
  `status` enum('Functional','Non-Functional','','') DEFAULT NULL,
  `adults_count` int(3) DEFAULT NULL,
  `child_count` int(3) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room_types`
--

INSERT INTO `room_types` (`id`, `room_id`, `room_type`, `total_count`, `total_booked`, `total_remain`, `rate`, `description`, `extra_beds`, `images`, `status`, `adults_count`, `child_count`) VALUES
(8, 200, 'Deluxe', 15, 1, 14, 900, 'better', NULL, 'uploads/room_img/30.jpg;uploads/room_img/300.jpg;uploads/room_img/bb11.jpg;', '', NULL, NULL),
(10, 300, 'Standard', 5, 7, -2, 800, '<p><u><em><strong>Awesome</strong></em> Rooms with greate luxuary&nbsp;</u></p>\r\n', 0, 'uploads/room_img/bb9.jpg;uploads/room_img/bb10.jpg;', 'Functional', 3, 1),
(11, 100, 'AC', 10, 15, -5, 1300, '<p><span style="color:#00FF00"><u><em><strong><span style="background-color:#0000FF">WOW</span></strong></em></u></span></p>\r\n', NULL, 'uploads/room_img/bb6.jpg;uploads/room_img/bb7.jpg;uploads/room_img/bb8.jpg;', '', NULL, NULL),
(12, 1200, 'Pent House', 5, NULL, 5, 1500, '<p>bla bla bla</p>\r\n', 1, 'uploads/room_img/executive_suite1.jpg;uploads/room_img/executive_suite2.jpg;', 'Functional', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE IF NOT EXISTS `tax` (
  `id` int(11) NOT NULL,
  `service_charge` double NOT NULL,
  `service_tax` double NOT NULL,
  `luxury_tax` double DEFAULT NULL,
  `swach_bharat_cess` double DEFAULT NULL,
  `tax_category` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tax`
--

INSERT INTO `tax` (`id`, `service_charge`, `service_tax`, `luxury_tax`, `swach_bharat_cess`, `tax_category`) VALUES
(2, 6.8, 8.4, 10, 2.5, 'Category 1'),
(3, 3, 1, 6, 2, 'Category 2');

-- --------------------------------------------------------

--
-- Table structure for table `twitter`
--

CREATE TABLE IF NOT EXISTS `twitter` (
  `id` int(11) NOT NULL,
  `twitter_link` text
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `twitter`
--

INSERT INTO `twitter` (`id`, `twitter_link`) VALUES
(1, '<blockquote class="twitter-tweet tw-align-center" data-cards="hidden" data-lang="en-gb"><p lang="en" dir="ltr">Fall foliage &amp; snow-capped peaks: Isn&#39;t <a href="https://twitter.com/DenaliNPS">@DenaliNPS</a> spectacular? Pic by Michel Hersen <a href="https://twitter.com/hashtag/Alaska?src=hash">#Alaska</a> <a href="http://t.co/LOTJsl6iK1">pic.twitter.com/LOTJsl6iK1</a></p>&mdash; US Dept of Interior (@Interior) <a href="https://twitter.com/Interior/status/651780213496545280">7 October 2015</a></blockquote>\r\n<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>'),
(2, '<blockquote class="twitter-tweet  tw-align-center" data-cards="hidden" data-lang="en-gb"><p lang="en" dir="ltr">Fall <a href="https://twitter.com/GrandTetonNPS">@GrandTetonNPS</a> looks something like this: Beautiful! Pic by Ed Cooper <a href="https://twitter.com/hashtag/Wyoming?src=hash">#Wyoming</a> <a href="http://t.co/29HJQma7Jp">pic.twitter.com/29HJQma7Jp</a></p>&mdash; US Dept of Interior (@Interior) <a href="https://twitter.com/Interior/status/653229520015749121">11 October 2015</a></blockquote>\r\n<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>'),
(4, '<blockquote class="twitter-tweet tw-align-center" data-lang="en-gb"><p lang="en" dir="ltr">the fact ashton bought a hotel room for a fan who was stranded shows how much he cares hes so genuine and has a heart of gold</p>&mdash; em (@auhstralian) <a href="https://twitter.com/auhstralian/status/721669784174104577">17 April 2016</a></blockquote>\r\n<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'hllEhwCvoZecXp_CSRy3yXD8Cf-eIoFT', '$2y$13$jfEK0Ab4XcoJjiOQTQcaIuU.gaGjwNLexere9ZsQWBm9IZFBOgju2', NULL, 'saurabhkulkarni.be@gmail.com', 10, 1438249656, 1438249656);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adult_partner`
--
ALTER TABLE `adult_partner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_item` (`id_item`),
  ADD KEY `id_state` (`id_state`);

--
-- Indexes for table `bookings_admin_users`
--
ALTER TABLE `bookings_admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings_config`
--
ALTER TABLE `bookings_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings_items`
--
ALTER TABLE `bookings_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_ref_external` (`id_ref_external`);

--
-- Indexes for table `bookings_last_update`
--
ALTER TABLE `bookings_last_update`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_item` (`id_item`);

--
-- Indexes for table `bookings_states`
--
ALTER TABLE `bookings_states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `create_bookings`
--
ALTER TABLE `create_bookings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `booking_id` (`booking_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_page_img`
--
ALTER TABLE `home_page_img`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_facilities`
--
ALTER TABLE `hotel_facilities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_id` (`id`);

--
-- Indexes for table `hotel_info`
--
ALTER TABLE `hotel_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kid_partner`
--
ALTER TABLE `kid_partner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `create_bookings_id` (`create_bookings_id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indexes for table `restaurant_menu`
--
ALTER TABLE `restaurant_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_amenities`
--
ALTER TABLE `room_amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_rates`
--
ALTER TABLE `room_rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_types`
--
ALTER TABLE `room_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_id` (`id`);

--
-- Indexes for table `tax`
--
ALTER TABLE `tax`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `twitter`
--
ALTER TABLE `twitter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adult_partner`
--
ALTER TABLE `adult_partner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bookings_admin_users`
--
ALTER TABLE `bookings_admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bookings_config`
--
ALTER TABLE `bookings_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bookings_items`
--
ALTER TABLE `bookings_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bookings_last_update`
--
ALTER TABLE `bookings_last_update`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bookings_states`
--
ALTER TABLE `bookings_states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `create_bookings`
--
ALTER TABLE `create_bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `home_page_img`
--
ALTER TABLE `home_page_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `hotel_facilities`
--
ALTER TABLE `hotel_facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hotel_info`
--
ALTER TABLE `hotel_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `kid_partner`
--
ALTER TABLE `kid_partner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `restaurant_menu`
--
ALTER TABLE `restaurant_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `room_amenities`
--
ALTER TABLE `room_amenities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `room_rates`
--
ALTER TABLE `room_rates`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `room_types`
--
ALTER TABLE `room_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tax`
--
ALTER TABLE `tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `twitter`
--
ALTER TABLE `twitter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `partners`
--
ALTER TABLE `partners`
  ADD CONSTRAINT `partners_ibfk_1` FOREIGN KEY (`create_bookings_id`) REFERENCES `create_bookings` (`booking_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
