-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2022 at 03:36 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `psycho`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('manage-admin', '1', 1639386205),
('manage-view', '1', 1639444095);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('manage-admin', 1, NULL, NULL, NULL, 1626569834, 1626572398),
('manage-view', 1, NULL, NULL, NULL, 1626569834, 1626572398);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_import`
--

CREATE TABLE `data_import` (
  `id` int(11) NOT NULL,
  `can_name` varchar(80) DEFAULT NULL,
  `can_ic` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1637642218),
('m130524_201442_init', 1637642223),
('m190124_110200_add_verification_token_column_to_user_table', 1637642223);

-- --------------------------------------------------------

--
-- Table structure for table `psy_answers`
--

CREATE TABLE `psy_answers` (
  `id` int(11) NOT NULL,
  `can_id` int(11) NOT NULL COMMENT 'user_id',
  `bat_id` int(11) NOT NULL,
  `column1` varchar(225) NOT NULL,
  `column2` varchar(225) NOT NULL,
  `column3` varchar(225) NOT NULL,
  `column4` varchar(225) NOT NULL,
  `status` smallint(6) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  `answer_status` tinyint(1) NOT NULL,
  `answer_status2` tinyint(2) NOT NULL,
  `overall_status` tinyint(1) NOT NULL,
  `answer_last_saved` varchar(8) NOT NULL,
  `question_last_saved` int(11) NOT NULL,
  `answer_last_saved2` varchar(8) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `q1` tinyint(1) NOT NULL DEFAULT -1,
  `q2` tinyint(1) NOT NULL DEFAULT -1,
  `q3` tinyint(1) NOT NULL DEFAULT -1,
  `q4` tinyint(1) NOT NULL DEFAULT -1,
  `q5` tinyint(1) NOT NULL DEFAULT -1,
  `q6` tinyint(1) NOT NULL DEFAULT -1,
  `q7` tinyint(1) NOT NULL DEFAULT -1,
  `q8` tinyint(1) NOT NULL DEFAULT -1,
  `q9` tinyint(1) NOT NULL DEFAULT -1,
  `q10` tinyint(1) NOT NULL DEFAULT -1,
  `q11` tinyint(1) NOT NULL DEFAULT -1,
  `q12` tinyint(1) NOT NULL DEFAULT -1,
  `q13` tinyint(1) NOT NULL DEFAULT -1,
  `q14` tinyint(1) NOT NULL DEFAULT -1,
  `q15` tinyint(1) NOT NULL DEFAULT -1,
  `q16` tinyint(1) NOT NULL DEFAULT -1,
  `q17` tinyint(1) NOT NULL DEFAULT -1,
  `q18` tinyint(1) NOT NULL DEFAULT -1,
  `q19` tinyint(1) NOT NULL DEFAULT -1,
  `q20` tinyint(1) NOT NULL DEFAULT -1,
  `q21` tinyint(1) NOT NULL DEFAULT -1,
  `q22` tinyint(1) NOT NULL DEFAULT -1,
  `q23` tinyint(1) NOT NULL DEFAULT -1,
  `q24` tinyint(1) NOT NULL DEFAULT -1,
  `q25` tinyint(1) NOT NULL DEFAULT -1,
  `q26` tinyint(1) NOT NULL DEFAULT -1,
  `q27` tinyint(1) NOT NULL DEFAULT -1,
  `q28` tinyint(1) NOT NULL DEFAULT -1,
  `q29` tinyint(1) NOT NULL DEFAULT -1,
  `q30` tinyint(1) NOT NULL DEFAULT -1,
  `q31` tinyint(1) NOT NULL DEFAULT -1,
  `q32` tinyint(1) NOT NULL DEFAULT -1,
  `q33` tinyint(1) NOT NULL DEFAULT -1,
  `q34` tinyint(1) NOT NULL DEFAULT -1,
  `q35` tinyint(1) NOT NULL DEFAULT -1,
  `q36` tinyint(1) NOT NULL DEFAULT -1,
  `q37` tinyint(1) NOT NULL DEFAULT -1,
  `q38` tinyint(1) NOT NULL DEFAULT -1,
  `q39` tinyint(1) NOT NULL DEFAULT -1,
  `q40` tinyint(1) NOT NULL DEFAULT -1,
  `q41` tinyint(1) NOT NULL DEFAULT -1,
  `q42` tinyint(1) NOT NULL DEFAULT -1,
  `q43` tinyint(1) NOT NULL DEFAULT -1,
  `q44` tinyint(1) NOT NULL DEFAULT -1,
  `q45` tinyint(1) NOT NULL DEFAULT -1,
  `q46` tinyint(1) NOT NULL DEFAULT -1,
  `q47` tinyint(1) NOT NULL DEFAULT -1,
  `q48` tinyint(1) NOT NULL DEFAULT -1,
  `q49` tinyint(1) NOT NULL DEFAULT -1,
  `q50` tinyint(1) NOT NULL DEFAULT -1,
  `q51` tinyint(1) NOT NULL DEFAULT -1,
  `q52` tinyint(1) NOT NULL DEFAULT -1,
  `q53` tinyint(1) NOT NULL DEFAULT -1,
  `q54` tinyint(1) NOT NULL DEFAULT -1,
  `q55` tinyint(1) NOT NULL DEFAULT -1,
  `q56` tinyint(1) NOT NULL DEFAULT -1,
  `q57` tinyint(1) NOT NULL DEFAULT -1,
  `q58` tinyint(1) NOT NULL DEFAULT -1,
  `q59` tinyint(1) NOT NULL DEFAULT -1,
  `q60` tinyint(1) NOT NULL DEFAULT -1,
  `q61` tinyint(1) NOT NULL DEFAULT -1,
  `q62` tinyint(1) NOT NULL DEFAULT -1,
  `q63` tinyint(1) NOT NULL DEFAULT -1,
  `q64` tinyint(1) NOT NULL DEFAULT -1,
  `q65` tinyint(1) NOT NULL DEFAULT -1,
  `q66` tinyint(1) NOT NULL DEFAULT -1,
  `q67` tinyint(1) NOT NULL DEFAULT -1,
  `q68` tinyint(1) NOT NULL DEFAULT -1,
  `q69` tinyint(1) NOT NULL DEFAULT -1,
  `q70` tinyint(1) NOT NULL DEFAULT -1,
  `q71` tinyint(1) NOT NULL DEFAULT -1,
  `q72` tinyint(1) NOT NULL DEFAULT -1,
  `q73` tinyint(1) NOT NULL DEFAULT -1,
  `q74` tinyint(1) NOT NULL DEFAULT -1,
  `q75` tinyint(1) NOT NULL DEFAULT -1,
  `q76` tinyint(1) NOT NULL DEFAULT -1,
  `q77` tinyint(1) NOT NULL DEFAULT -1,
  `q78` tinyint(1) NOT NULL DEFAULT -1,
  `q79` tinyint(1) NOT NULL DEFAULT -1,
  `q80` tinyint(1) NOT NULL DEFAULT -1,
  `q81` tinyint(1) NOT NULL DEFAULT -1,
  `q82` tinyint(1) NOT NULL DEFAULT -1,
  `q83` tinyint(1) NOT NULL DEFAULT -1,
  `q84` tinyint(1) NOT NULL DEFAULT -1,
  `q85` tinyint(1) NOT NULL DEFAULT -1,
  `q86` tinyint(1) NOT NULL DEFAULT -1,
  `q87` tinyint(1) NOT NULL DEFAULT -1,
  `q88` tinyint(1) NOT NULL DEFAULT -1,
  `q89` tinyint(1) NOT NULL DEFAULT -1,
  `q90` tinyint(1) NOT NULL DEFAULT -1,
  `q91` tinyint(1) NOT NULL DEFAULT -1,
  `q92` tinyint(1) NOT NULL DEFAULT -1,
  `q93` tinyint(1) NOT NULL DEFAULT -1,
  `q94` tinyint(1) NOT NULL DEFAULT -1,
  `q95` tinyint(1) NOT NULL DEFAULT -1,
  `q96` tinyint(1) NOT NULL DEFAULT -1,
  `q97` tinyint(1) NOT NULL DEFAULT -1,
  `q98` tinyint(1) NOT NULL DEFAULT -1,
  `q99` tinyint(1) NOT NULL DEFAULT -1,
  `q100` tinyint(1) NOT NULL DEFAULT -1,
  `q101` tinyint(1) NOT NULL DEFAULT -1,
  `q102` tinyint(1) NOT NULL DEFAULT -1,
  `q103` tinyint(1) NOT NULL DEFAULT -1,
  `q104` tinyint(1) NOT NULL DEFAULT -1,
  `q105` tinyint(1) NOT NULL DEFAULT -1,
  `q106` tinyint(1) NOT NULL DEFAULT -1,
  `q107` tinyint(1) NOT NULL DEFAULT -1,
  `q108` tinyint(1) NOT NULL DEFAULT -1,
  `q109` tinyint(1) NOT NULL DEFAULT -1,
  `q110` tinyint(1) NOT NULL DEFAULT -1,
  `q111` tinyint(1) NOT NULL DEFAULT -1,
  `q112` tinyint(1) NOT NULL DEFAULT -1,
  `q113` tinyint(1) NOT NULL DEFAULT -1,
  `q114` tinyint(1) NOT NULL DEFAULT -1,
  `q115` tinyint(1) NOT NULL DEFAULT -1,
  `q116` tinyint(1) NOT NULL DEFAULT -1,
  `q117` tinyint(1) NOT NULL DEFAULT -1,
  `q118` tinyint(1) NOT NULL DEFAULT -1,
  `q119` tinyint(1) NOT NULL DEFAULT -1,
  `q120` tinyint(1) NOT NULL DEFAULT -1,
  `biz_idea` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `psy_answers`
--

INSERT INTO `psy_answers` (`id`, `can_id`, `bat_id`, `column1`, `column2`, `column3`, `column4`, `status`, `finished_at`, `answer_status`, `answer_status2`, `overall_status`, `answer_last_saved`, `question_last_saved`, `answer_last_saved2`, `created_at`, `updated_at`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`, `q11`, `q12`, `q13`, `q14`, `q15`, `q16`, `q17`, `q18`, `q19`, `q20`, `q21`, `q22`, `q23`, `q24`, `q25`, `q26`, `q27`, `q28`, `q29`, `q30`, `q31`, `q32`, `q33`, `q34`, `q35`, `q36`, `q37`, `q38`, `q39`, `q40`, `q41`, `q42`, `q43`, `q44`, `q45`, `q46`, `q47`, `q48`, `q49`, `q50`, `q51`, `q52`, `q53`, `q54`, `q55`, `q56`, `q57`, `q58`, `q59`, `q60`, `q61`, `q62`, `q63`, `q64`, `q65`, `q66`, `q67`, `q68`, `q69`, `q70`, `q71`, `q72`, `q73`, `q74`, `q75`, `q76`, `q77`, `q78`, `q79`, `q80`, `q81`, `q82`, `q83`, `q84`, `q85`, `q86`, `q87`, `q88`, `q89`, `q90`, `q91`, `q92`, `q93`, `q94`, `q95`, `q96`, `q97`, `q98`, `q99`, `q100`, `q101`, `q102`, `q103`, `q104`, `q105`, `q106`, `q107`, `q108`, `q109`, `q110`, `q111`, `q112`, `q113`, `q114`, `q115`, `q116`, `q117`, `q118`, `q119`, `q120`, `biz_idea`) VALUES
(10, 4688, 1, '22', 'Male', 'UMK', 'Kelantan', 0, NULL, 0, 0, 0, '', 0, NULL, 0, 0, 1, 1, 1, -1, -1, -1, -1, -1, -1, -1, -1, 1, -1, 1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, 1, -1, -1, 1, -1, -1, -1, -1, -1, -1, -1, -1, 1, 1, 1, -1, -1, 1, -1, -1, -1, -1, 1, -1, 1, -1, 1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, 1, -1, 1, -1, 1, -1, -1, -1, -1, -1, -1, 1, -1, 1, -1, -1, 1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, 1, 1, 1, 1, 1, 1, 1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, 1, NULL),
(36, 4693, 1, '23', 'Male', 'UMK', 'Kelantan', 0, NULL, 0, 0, 0, '', 0, NULL, 0, 0, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, NULL),
(39, 4697, 1, '21', 'Female', 'UiTM', 'Terengganu', 0, NULL, 0, 0, 0, '', 0, NULL, 0, 0, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, NULL),
(40, 4698, 1, '22', 'Male', 'UMK', 'Selangor', 0, NULL, 0, 0, 0, '', 0, NULL, 0, 0, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, NULL),
(41, 4699, 1, '', '', '', '', 0, NULL, 0, 0, 0, '', 0, NULL, 0, 0, -1, -1, -1, 1, -1, 1, 1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, NULL),
(42, 4700, 3, '', '', '', '', 0, NULL, 0, 0, 0, '', 0, NULL, 0, 0, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `psy_batch`
--

CREATE TABLE `psy_batch` (
  `id` int(11) NOT NULL,
  `bat_text` varchar(100) NOT NULL,
  `bat_show` int(11) NOT NULL,
  `allow_register` tinyint(1) NOT NULL,
  `column1` varchar(225) NOT NULL,
  `column2` varchar(225) NOT NULL,
  `column3` varchar(225) NOT NULL,
  `column4` varchar(225) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `psy_batch`
--

INSERT INTO `psy_batch` (`id`, `bat_text`, `bat_show`, `allow_register`, `column1`, `column2`, `column3`, `column4`, `start_date`, `end_date`) VALUES
(1, 'PTPTN-2021', 1, 1, 'Age', 'Gender', 'Education', 'State', '2021-12-21', '2021-12-31'),
(3, 'PTPTN-2022', 0, 0, '', '', '', '', NULL, NULL),
(8, 'PTPTN-2023', 0, 0, '', '', '', '', NULL, NULL),
(9, 'PTPTN-2026', 0, 0, '', '', '', '', NULL, NULL),
(11, 'PTPTN-2019', 0, 1, '', '', '', '', '2021-12-21', '2021-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `psy_demographic`
--

CREATE TABLE `psy_demographic` (
  `id` int(11) NOT NULL,
  `bat_id` int(11) NOT NULL,
  `column_id` int(11) NOT NULL,
  `demo_value` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `psy_demographic`
--

INSERT INTO `psy_demographic` (`id`, `bat_id`, `column_id`, `demo_value`) VALUES
(57, 1, 3, 'UMK'),
(58, 1, 3, 'UiTM'),
(59, 1, 4, 'Kelantan'),
(60, 1, 4, 'Terengganu'),
(61, 1, 4, 'Selangor');

-- --------------------------------------------------------

--
-- Table structure for table `psy_domain`
--

CREATE TABLE `psy_domain` (
  `id` int(11) NOT NULL,
  `bat_id` int(11) NOT NULL,
  `grade_cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `psy_domain`
--

INSERT INTO `psy_domain` (`id`, `bat_id`, `grade_cat`) VALUES
(240, 1, 1),
(241, 1, 3),
(242, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `psy_grade_cat`
--

CREATE TABLE `psy_grade_cat` (
  `id` int(11) NOT NULL,
  `gcat_text` varchar(200) NOT NULL,
  `gcat_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `psy_grade_cat`
--

INSERT INTO `psy_grade_cat` (`id`, `gcat_text`, `gcat_order`) VALUES
(1, 'Enterprise', 1),
(2, 'Social', 2),
(3, 'Investigate', 4),
(4, 'Artistic', 5),
(5, 'Conventional', 6),
(6, 'Realistic', 3);

-- --------------------------------------------------------

--
-- Table structure for table `psy_question`
--

CREATE TABLE `psy_question` (
  `que_id` int(11) NOT NULL,
  `que_text` varchar(200) DEFAULT NULL,
  `que_text_bi` varchar(255) DEFAULT NULL,
  `display_cat` tinyint(1) DEFAULT NULL,
  `grade_cat` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `psy_question`
--

INSERT INTO `psy_question` (`que_id`, `que_text`, `que_text_bi`, `display_cat`, `grade_cat`) VALUES
(1, 'Membaiki alat-alat elektrik', 'Repair electronic devices', 1, 1),
(2, 'Membaiki alat-alat mekanik', 'Repair mechanics devices', 1, 1),
(3, 'Membuat benda-benda daripada kayu', 'Build up from wood', 1, 1),
(4, 'Memandu trak atau traktor', 'Drive truck or tractor', 1, 1),
(5, 'Mengikuti kursus Lukisan Mekanik', 'Attend mechanic paint course', 1, 1),
(6, 'Menggunakan alatan kerja logam dan mesin', 'Use metal and machinery equipment', 1, 1),
(7, 'Mengubahsuai enjin kereta atau motosikal', 'Modify car or motorcycle engines', 1, 1),
(8, 'Mengikuti kursus Seni Perusahaan', 'Enrol in Industrial Art Course', 1, 1),
(9, 'Mengikuti kursus Kerja Kayu', 'Enrol in Woodwork Course', 1, 1),
(10, 'Mengikuti kursus Auto Mekanik', 'Enrol in Mechanical Automotive Course', 1, 1),
(11, 'Membaca buku atau majalah Sains', 'Read book or magazine on Science', 1, 2),
(12, 'Bekerja dalam makmal penyelidikan', 'Work in Research Laboratory', 1, 2),
(13, 'Membuat kerja projek Sains', 'Work on Scientific Project', 1, 2),
(14, 'Mereka cipta model roket', 'Invent rocket model', 1, 2),
(15, 'Bekerja menggunakan alatan kimia', 'Work using Chemical Apparatus', 1, 2),
(16, 'Membaca subjek-subjek tertentu yang khusus', 'Read on certain specific subjects', 1, 2),
(17, 'Mengikuti kursus Fizik', 'Enrol in Physic courses', 1, 2),
(18, 'Mengikuti kursus Kimia', 'Enrol in Chemistry courses', 1, 2),
(19, 'Mengikuti kursus Geometri', 'Enrol in Geometry courses', 1, 2),
(20, 'Mengikuti kursus Biologi', 'Enrol in Biology course', 1, 2),
(21, 'Melakar, melukis atau mewarnakan', 'Scatch, draw or paintings', 1, 3),
(22, 'Menonton lakonan atau drama', 'Watch plays or drama', 1, 3),
(23, 'Mereka bentuk perabot atau bangunan', 'Design furniture or buildings', 1, 3),
(24, 'Bermain alat muzik dalam kumpulan muzik atau orchestra', 'Play musical instruments in bands or orchestra', 1, 3),
(25, 'Berlatih menggunakan alat muzik', 'Practice using musical instruments', 1, 3),
(26, 'Menghadiri pertunjukan pentas atau muzik', 'Watch stage or musical shows', 1, 3),
(27, 'Mencipta potret atau foto', 'Draw portrait or photos', 1, 3),
(28, 'Membaca buku-buku lakonan', 'Read books on plays', 1, 3),
(29, 'Membaca atau menulis sajak', 'Recite or write poems', 1, 3),
(30, 'Mengikuti kursus Seni Lukis', 'Enrol in Art course', 1, 3),
(31, 'Menulis surat kepada kawan', 'Write letters to friends', 1, 4),
(32, 'Menghadiri perjumpaan agama', 'Go to religious gatherings', 1, 4),
(33, 'Menganggotai kelab sosial', 'Join social clubs', 1, 4),
(34, 'Menolong orang yang mempunyai masalah peribadi', 'Help people having personal problems', 1, 4),
(35, 'Mengajar kanak-kanak', 'Teach children', 1, 4),
(36, 'Menghadiri majlis parti', 'Go to party', 1, 4),
(37, 'Menari', 'Dance', 1, 4),
(38, 'Menghadiri mesyuarat atau persidangan', 'Attend meetings or conferences', 1, 4),
(39, 'Menghadiri temasya sukan', 'Attend Sports Activities', 1, 4),
(40, 'Memulakan persahabatan', 'Starts Friendship', 1, 4),
(41, 'Mempengaruhi orang lain', 'Influence others', 1, 5),
(42, 'Berbincang mengenai politik', 'Discuss about politics', 1, 5),
(43, 'Menguruskan perniagaan sendiri', 'Manage own business', 1, 5),
(44, 'Menghadiri persidangan', 'Attend conferences', 1, 5),
(45, 'Memberi ceramah', 'Deliver talks', 1, 5),
(46, 'Menjadi pemimpin sebarang kumpulan', 'Become leaders of any groups', 1, 5),
(47, 'Menyelia kerja-kerja orang lain', 'Supervise others\' work ', 1, 5),
(48, 'Menemui orang-orang penting', 'Meet Very Important People', 1, 5),
(49, 'Mengetuai kumpulan dalam mencapai suatu matlamat', 'Lead groups to achieve certain', 1, 5),
(50, 'Mengambil bahagian dalam kempen politik', 'Participate in political campaigns', 1, 5),
(51, 'Menaip bahan-bahan bertulis atau surat', 'Type written materials or letters', 1, 6),
(52, 'Mengira angka-angka dalam urusan perniagaan atau menyimpan kira-kira', 'Calculate numerical digits in business or book keeping', 1, 6),
(53, 'Menggunakan mesin perniagaan', 'Using business machines', 1, 6),
(54, 'Menyimpan rekod belanja perniagaan', 'Keep business expenditure  record', 1, 6),
(55, 'Mengikuti kursus komputer', 'Enrol in Computer course', 1, 6),
(56, 'Mengikuti kursus perniagaan', 'Enrol in business course', 1, 6),
(57, 'Mengikuti kursus Simpan Kira', 'Enrol in Book Keeping course', 1, 6),
(58, 'Mengikuti kursus Matematik Perdagangan', 'Enrol in Mathematical Commerce', 1, 6),
(59, 'Menyimpan surat-surat, laporan-laporan, dan rekod dalam fail', 'Filing records', 1, 6),
(60, 'Menulis bil-bil dan surat-surat perniagaan', 'Write bills and business letters', 1, 6),
(61, 'Menggunakan jangka voltan', 'Use volt meter', 2, 1),
(62, 'Melaraskan karburetor', 'Carburettor Tuning', 2, 1),
(63, 'Menggunakan alatan elektrik logam di bengkel seperti gerudi elektrik', 'Use metal electrical equipment in workshop such as electric drills', 2, 1),
(64, 'Mengolah perabot atau barang-barang daripada kayu', 'Make furniture or woodwork', 2, 1),
(65, 'Membaca blueprints atau polisi syarikat atau kerajaan', 'Read  government or companies  blueprints or policies', 2, 1),
(66, 'Membaiki kerosakan elektrik yang mudah', 'Repair simple electrical faulty', 2, 1),
(67, 'Membaiki alat perabot', 'Repair furniture', 2, 1),
(68, 'Membuat lukisan mekanik', 'Mechanical drawing', 2, 1),
(69, 'Membaiki kerosakan radio atau TV yang mudah', 'Repair minor radio or TV faulty', 2, 1),
(70, 'Membaiki kerosakan paip yang mudah', 'Repair minor pipes faulty', 2, 1),
(71, 'Memahami fungsi tiub hampa gas', 'Understand vacuum tube functions', 2, 2),
(72, 'Menamakan tiga jenis makanan yang mempunyai kandungan protein yang tinggi', 'Name three types of high protein food', 2, 2),
(73, 'Memahami \'separuh hayat\' dalam unsur radioaktif', 'Understand \'semi-live\' in radioactive elements', 2, 2),
(74, 'Menggunakan jadual logaritma', 'Use logarithms table', 2, 2),
(75, 'Menggunakan mesinkira untuk mendarab dan membahagi', 'Use calculator for multiplication and division', 2, 2),
(76, 'Menggunakan mikroskop', 'Use microscope', 2, 2),
(77, 'Mengecam tiga gugusan bintang-bintang', 'Recognize three group of stars', 2, 2),
(78, 'Menerangkan fungsi-fungsi darah putih', 'Explain functions of white blood cells', 2, 2),
(79, 'Mentafsir formula kimia yang mudah', 'Interpret simple formula in Chemistry', 2, 2),
(80, 'Memahami mengapa satelit buatan manusia tidak jatuh ke bumi', 'Understand why man made satellit never falls to the earth', 2, 2),
(81, 'Menyanyi dalam bahagian-dua atau bahagian-empat dalam kumpulan nyanyian beramai-ramai', 'Sing in duet of group of four in choir', 2, 3),
(82, 'Melakukan persembahan muzik berseorangan', 'Perform solo musical show', 2, 3),
(83, 'Berlakon dalam sebuah lakonan', 'Act in a play', 2, 3),
(84, 'Membaca sambil menterjemah', 'Read and translate', 2, 3),
(85, 'Menterjemah gerak-geri tarian moden atau balet', 'Translate movements in modern dance or ballet', 2, 3),
(86, 'Melukis gambar manusia sehingga dapat dikenali', 'Draw human photos to be recognized', 2, 3),
(87, 'Mencipta lukisan ataupun ukiran', 'Create drawings or carvings', 2, 3),
(88, 'Membuat barang-barang daripada tembikar', 'Make things from pottery', 3, 3),
(89, 'Mencipta pakaian, poster ataupun perabot', 'Create costumes', 3, 3),
(90, 'Menulis cerita ataupun sajak yang baik', 'Write good poems or stories', 3, 3),
(91, 'Menerangkan sesuatu dengan jelas', 'Explain clearly about something', 3, 4),
(92, 'Bekerjasama atau bekerja dengan orang lain', 'Collaborate or work with others', 3, 4),
(93, 'Melayan tetamu dengan baik', 'Serve guests kindly', 3, 4),
(94, 'Mengajar kanak-kanak', 'Teach children', 3, 4),
(95, 'Merancang hiburan bagi majlis tertentu', 'Plan entertainment for certain occasion', 3, 4),
(96, 'Menolong orang dalam kesusahan ataupun kesedihan', 'Help people in need or sadness', 3, 4),
(97, 'Menjadi pembantu sukarela di hospital, klinik ataupun di rumah orang-orang tua', 'Become a voluntary assistant in hospitals or in old folks homes', 3, 4),
(98, 'Merancang aktiviti-aktiviti amal sekolah', 'Plan entertainment for certain occasion', 3, 4),
(99, 'Meramal personaliti dengan baik', 'Interpret personaly well', 3, 4),
(100, 'Melayan orang yang lebih tua daripada saya dengan baik', 'Serves an elder person than me well', 3, 4),
(101, 'Menyelia kerja-kerja orang lain', 'Supervise others work', 3, 5),
(102, 'Membuat orang lain bekerja mengikut cara saya', 'Ensure others work like me', 3, 5),
(103, 'Mempunyai semangat dan daya tenaga tinggi', 'Have high spirit and strength', 3, 5),
(104, 'Menjadi jurujual yang cemerlang', 'Become an excellent salesperson', 3, 5),
(105, 'Mewakili kumpulan mengemukakan cadangan ataupun aduan kepada pihak berkuasa', 'Represent a group to suggest or lodge report to authorized bodies', 3, 5),
(106, 'Memenangi hadiah untuk kerja-kerja sebagai jurujual ataupun pemimpin', 'Win rewards for jobs as salesperson or as leaders', 3, 5),
(107, 'Mengelola kelab, pertubuhan ataupun kumpulan', 'Organize clubs', 3, 5),
(108, 'Memulakan perniagaan sendiri', 'Starts own business', 3, 5),
(109, 'Menjadi pemimpin berjaya', 'Become a successful leader', 3, 5),
(110, 'Menjadi pendebat yang baik', 'Become a good debater', 3, 5),
(111, 'Mengendalikan mesin fotostat ataupun mesin campur', 'Handle photocopy machine or mixer', 3, 6),
(112, 'Menulis trengkas', 'Write shorthands', 3, 6),
(113, 'Menyimpan surat-surat ataupun bahan-bahan bertulis dalam fail', 'Keep letters or written materials in files', 3, 6),
(114, 'Memegang jawatan di dalam pejabat', 'Holds posts in the office', 3, 6),
(115, 'Menulis rekod simpan kira', 'Book keeping', 3, 6),
(116, 'Menggunakan mesin taip atau computer', 'Use type writer or computer', 3, 6),
(117, 'Membuat banyak kerja bertulis dalam masa yang singkat', 'Do written work within a short time', 3, 6),
(118, 'Menggunakan mesin kira.', 'Use calculator', 3, 6),
(119, 'Menggunakan alat memproses data yang mudah.', 'Use simple data processing tools', 3, 6),
(120, 'Menyimpan rekod bayaran atau jualan dengan rapi', 'Keep payment or sales records neatly', 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `psy_question_cat`
--

CREATE TABLE `psy_question_cat` (
  `cat_id` int(11) NOT NULL,
  `cat_text` varchar(200) NOT NULL,
  `cat_text_bi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `psy_question_cat`
--

INSERT INTO `psy_question_cat` (`cat_id`, `cat_text`, `cat_text_bi`) VALUES
(1, 'Tandakan YA pada perkara yang anda SUKA lakukan', 'Tick YES for the actions that you LIKE'),
(2, 'Tandakan YA pada bidang kecekapan yang INGIN anda miliki', 'Tick YES for the expertise that you want to OBTAIN'),
(3, 'Tandakan YA pada aktiviti yang anda PERCAYA anda dapat mempelajarinya', 'Tick YES for activity that you BELIEVE you can learn');

-- --------------------------------------------------------

--
-- Table structure for table `psy_setting`
--

CREATE TABLE `psy_setting` (
  `id` int(11) NOT NULL,
  `setting_item` varchar(300) NOT NULL,
  `setting_num` int(11) NOT NULL,
  `setting_text` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `psy_setting`
--

INSERT INTO `psy_setting` (`id`, `setting_item`, `setting_num`, `setting_text`) VALUES
(1, 'showing batch', 1, ''),
(2, 'Open Inteview', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `psy_zone`
--

CREATE TABLE `psy_zone` (
  `zone_id` int(11) NOT NULL,
  `zone_text` varchar(100) NOT NULL,
  `zone_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `psy_zone`
--

INSERT INTO `psy_zone` (`zone_id`, `zone_text`, `zone_order`) VALUES
(1, 'Pantai Timur (Kelantan)', 1),
(2, 'Utara (Kedah)', 2),
(3, 'Tengah (Kuala Lumpur)', 3),
(4, 'Selatan (Johor)', 4),
(5, 'NA - Online', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL COMMENT 'auto incrementing user_id of each user, unique index',
  `session_id` varchar(48) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'stores session cookie id to prevent session concurrency',
  `username` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'user''s name, unique',
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `matric_no` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `program` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `password_hash` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'user''s password in salted and hashed format',
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `can_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `department` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `can_batch` int(11) NOT NULL DEFAULT 0,
  `can_zone` int(11) NOT NULL DEFAULT 0,
  `finished_at` int(11) DEFAULT NULL,
  `answer_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=not started, 1=started,3=submited',
  `answer_status2` tinyint(2) NOT NULL DEFAULT 0,
  `overall_status` tinyint(1) NOT NULL DEFAULT 0,
  `answer_last_saved` varchar(8) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `question_last_saved` int(11) NOT NULL DEFAULT 1,
  `answer_last_saved2` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_active` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'user''s activation status',
  `user_deleted` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'user''s deletion status',
  `user_account_type` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'user''s account type (basic, premium, etc)',
  `user_has_avatar` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1 if user has a local avatar, 0 if not',
  `user_remember_me_token` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'user''s remember-me cookie token',
  `user_creation_timestamp` bigint(20) DEFAULT NULL COMMENT 'timestamp of the creation of user''s account',
  `user_suspension_timestamp` bigint(20) DEFAULT NULL COMMENT 'Timestamp till the end of a user suspension',
  `user_last_login_timestamp` bigint(20) DEFAULT NULL COMMENT 'timestamp of user''s last login',
  `user_failed_logins` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'user''s failed login attempts',
  `user_last_failed_login` int(10) DEFAULT NULL COMMENT 'unix timestamp of last failed login attempt',
  `user_activation_hash` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'user''s email verification hash string',
  `user_password_reset_hash` char(40) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'user''s password reset code',
  `user_password_reset_timestamp` bigint(20) DEFAULT NULL COMMENT 'timestamp of the password reset request',
  `user_provider_type` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `session_id`, `username`, `auth_key`, `matric_no`, `program`, `password_hash`, `password_reset_token`, `email`, `status`, `can_name`, `department`, `can_batch`, `can_zone`, `finished_at`, `answer_status`, `answer_status2`, `overall_status`, `answer_last_saved`, `question_last_saved`, `answer_last_saved2`, `created_at`, `updated_at`, `verification_token`, `user_active`, `user_deleted`, `user_account_type`, `user_has_avatar`, `user_remember_me_token`, `user_creation_timestamp`, `user_suspension_timestamp`, `user_last_login_timestamp`, `user_failed_logins`, `user_last_failed_login`, `user_activation_hash`, `user_password_reset_hash`, `user_password_reset_timestamp`, `user_provider_type`) VALUES
(1, '4lg2e2i5hk8af4tj7afhd0k6lj', 'admin', '', NULL, '0', '$2y$13$5jwVMf2PeCPvVfS3tTRFq.XVCcA9sVyVdX/zr4SqjQSk.OQAedSfq', NULL, '', 10, 'Admin', NULL, 1, 0, NULL, 0, 0, 0, '00:00', 120, NULL, 0, 0, NULL, 1, 0, 7, 0, NULL, 1626588811, NULL, 1637826828, 0, NULL, NULL, NULL, NULL, 'DEFAULT'),
(4688, '0uuu0qnb2qmivl962ac4m1ejha', '940821036159', '', NULL, '0', NULL, NULL, '', 10, 'Fakhrul Iqram Bin Rafien', 'test', 1, 0, 1638071893, 3, 0, 3, '12:15', 120, NULL, 0, 1639379103, NULL, 0, 0, 1, 0, NULL, NULL, NULL, 1637638122, 0, NULL, NULL, NULL, NULL, NULL),
(4693, NULL, '940821036111', '', NULL, '0', NULL, NULL, '', 10, 'Hakimi Bin Ab Rahman', 'Sales And Marketing', 1, 0, NULL, 0, 0, 0, '0', 1, NULL, 1638863479, 1638863479, NULL, 0, 0, 1, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(4697, NULL, '960821036111', '', NULL, '0', NULL, NULL, '', 10, 'Azman Bin Abd Rahman', NULL, 1, 0, NULL, 0, 0, 0, '0', 1, NULL, 1639359924, 1639359924, NULL, 0, 0, 1, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(4698, NULL, '960821036159', '', NULL, '0', NULL, NULL, '', 10, 'Hafizz Bin Hishamuddin', NULL, 1, 0, NULL, 0, 0, 0, '0', 1, NULL, 1639359924, 1639359924, NULL, 0, 0, 1, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(4699, NULL, '940821036112', '', NULL, '0', NULL, NULL, '', 10, 'Mohd Ali', NULL, 1, 0, NULL, 0, 0, 0, '0', 1, NULL, 1639378299, 1639378299, NULL, 0, 0, 1, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(4700, NULL, '940821036116', '', NULL, '0', NULL, NULL, '', 10, 'Second Seller', NULL, 1, 0, NULL, 0, 0, 0, '0', 1, NULL, 1639379265, 1639379265, NULL, 0, 0, 1, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `auth_assignment_user_id_idx` (`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `data_import`
--
ALTER TABLE `data_import`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `can_ic` (`can_ic`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `psy_answers`
--
ALTER TABLE `psy_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `psy_batch`
--
ALTER TABLE `psy_batch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `psy_demographic`
--
ALTER TABLE `psy_demographic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `psy_domain`
--
ALTER TABLE `psy_domain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `psy_grade_cat`
--
ALTER TABLE `psy_grade_cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `psy_question`
--
ALTER TABLE `psy_question`
  ADD PRIMARY KEY (`que_id`);

--
-- Indexes for table `psy_question_cat`
--
ALTER TABLE `psy_question_cat`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `psy_setting`
--
ALTER TABLE `psy_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `psy_zone`
--
ALTER TABLE `psy_zone`
  ADD PRIMARY KEY (`zone_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_import`
--
ALTER TABLE `data_import`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `psy_answers`
--
ALTER TABLE `psy_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `psy_batch`
--
ALTER TABLE `psy_batch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `psy_demographic`
--
ALTER TABLE `psy_demographic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `psy_domain`
--
ALTER TABLE `psy_domain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;

--
-- AUTO_INCREMENT for table `psy_grade_cat`
--
ALTER TABLE `psy_grade_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `psy_question`
--
ALTER TABLE `psy_question`
  MODIFY `que_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `psy_question_cat`
--
ALTER TABLE `psy_question_cat`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `psy_setting`
--
ALTER TABLE `psy_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `psy_zone`
--
ALTER TABLE `psy_zone`
  MODIFY `zone_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index', AUTO_INCREMENT=4701;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
