-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2021 at 07:51 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pwoods`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_page_contents`
--

CREATE TABLE `about_page_contents` (
  `id` int(11) NOT NULL,
  `about_content` text DEFAULT NULL,
  `about_banner_image` varchar(100) DEFAULT NULL,
  `about_content_image` varchar(100) DEFAULT NULL,
  `director_content` text DEFAULT NULL,
  `director_image` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about_page_contents`
--

INSERT INTO `about_page_contents` (`id`, `about_content`, `about_banner_image`, `about_content_image`, `director_content`, `director_image`, `created_at`) VALUES
(1, '<p><strong>What matters most to you when choosing an interior design company to transform your home? Whether it&rsquo;s inspirational creativity, fine craftsmanship and attention to detail, or the meticulous professionalism needed to see a big project though to successful completion, you&rsquo;ve just found everything you&rsquo;re looking for&hellip;</strong></p>\r\n\r\n<p>Pwoods Interior has been offering clients timeless design solutions for more than 3 years.&nbsp; We always wanted our clients to deserve the smartest solutions and hence we make sure to provide them with the latest in furnishings for homes or officers, including innovative custom furnishings, window treatments, lighting, accessories and unique artwork by local artists.&nbsp; Offering a highly personalised bespoke service, we place great importance and commitment to building strong client relationships, tailoring our process to meet each client&rsquo;s needs, delivering a full interior architecture, furniture design and turn-key styling service from inception to completion.</p>', 'cta_1614577317.jpg', '002_1614577278.jpg', '<h2>ANIL P N</h2>', '327A9253_1615266918.jpg', '2021-01-24 01:06:12');

-- --------------------------------------------------------

--
-- Table structure for table `about_page_partners`
--

CREATE TABLE `about_page_partners` (
  `id` int(11) NOT NULL,
  `partners_title` varchar(50) DEFAULT NULL,
  `partners_content` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about_page_partners`
--

INSERT INTO `about_page_partners` (`id`, `partners_title`, `partners_content`, `created_at`) VALUES
(1, 'Our Valuable Creative Partners.', '<p>Our Valuable Creative Partners.</p>', '2021-01-24 01:20:29');

-- --------------------------------------------------------

--
-- Table structure for table `contact_page_contents`
--

CREATE TABLE `contact_page_contents` (
  `id` int(11) NOT NULL,
  `contact_banner_image` varchar(100) DEFAULT NULL,
  `contact_content` text DEFAULT NULL,
  `contact_phone` varchar(50) DEFAULT NULL,
  `contact_email` varchar(50) DEFAULT NULL,
  `contact_address` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_page_contents`
--

INSERT INTO `contact_page_contents` (`id`, `contact_banner_image`, `contact_content`, `contact_phone`, `contact_email`, `contact_address`, `created_at`) VALUES
(3, 'banner_1611449219.jpg', '<p>We&#39;d love to hear from you!</p>', '+91-9656149062, +91-9778049196', 'pwoodsinterior@gmail.com', '<p>First floor, VMC Complex,</p>\r\n\r\n<p>Near Federal Bank, Ottupara</p>\r\n\r\n<p>Wadakkanchery, Thrissur</p>', '2021-01-24 00:43:50');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `footer_settings`
--

CREATE TABLE `footer_settings` (
  `id` int(20) NOT NULL,
  `fb_link` varchar(100) DEFAULT NULL,
  `insta_link` varchar(100) DEFAULT NULL,
  `twitter_link` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `footer_settings`
--

INSERT INTO `footer_settings` (`id`, `fb_link`, `insta_link`, `twitter_link`, `created_at`) VALUES
(1, 'https://www.facebook.com/Pwoods-Interior-655651794632614/', 'https://www.instagram.com/p/CIiF0oMATl0/?igshid=1qkv17wtnivny', 'https://twitter.com/', '2021-03-09 03:45:33');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int(11) NOT NULL,
  `image_title` varchar(100) DEFAULT NULL,
  `image_name` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `image_title`, `image_name`, `status`, `created_at`) VALUES
(5, 'INTERIOR', '133554924_1509592439238541_6724042930866315316_o_1615458959.jpg', 1, '2021-01-24 12:23:00'),
(6, 'Exterior', '69471284_1112314122299710_4779446328612618240_o_1615458991.jpg', 1, '2021-01-24 12:23:21'),
(7, 'Renovation', '134442015_1510125235851928_8666336553581088215_o (1)_1615459022.jpg', 1, '2021-01-24 12:23:34'),
(8, 'INTERIOR', '69411642_1112310128966776_3600089124205232128_o_1615459049.jpg', 1, '2021-01-24 12:23:51'),
(9, 'INTERIOR', '69885316_1112311198966669_4219410703775170560_o_1615459085.jpg', 1, '2021-03-01 05:57:37'),
(10, 'INTERIOR', '69319256_1112309745633481_8612104757915418624_o - Copy_1615459683.jpg', 1, '2021-03-11 10:48:03'),
(11, 'Exterior', '138262982_1519319381599180_5477727539902514562_n_1618037274.jpg', 1, '2021-04-10 06:47:22'),
(12, 'Furniture Manufacturing', '132915194_1509592335905218_2235304341508619851_n_1618550105.jpg', 1, '2021-04-16 05:15:08');

-- --------------------------------------------------------

--
-- Table structure for table `home_page_about_sections`
--

CREATE TABLE `home_page_about_sections` (
  `id` int(11) NOT NULL,
  `about_content` text DEFAULT NULL,
  `about_image` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home_page_about_sections`
--

INSERT INTO `home_page_about_sections` (`id`, `about_content`, `about_image`, `created_at`) VALUES
(9, '<p><strong>What matters most to you when choosing an interior design company to transform your home? Whether it&rsquo;s inspirational creativity, fine craftsmanship and attention to detail, or the meticulous professionalism needed to see a big project though to successful completion, you&rsquo;ve just found everything you&rsquo;re looking for&hellip;</strong></p>\r\n\r\n<p>Pwoods Interior has been offering clients timeless design solutions for more than 3 years.&nbsp; We always wanted our clients to deserve the smartest solutions and hence we make sure to provide them with the latest in furnishings for homes or officers, including innovative custom furnishings, window treatments, lighting, accessories and unique artwork by local artists.&nbsp; Offering a highly personalised bespoke service, we place great importance and commitment to building strong client relationships, tailoring our process to meet each client&rsquo;s needs, delivering a full interior architecture, furniture design and turn-key styling service from inception to completion...</p>\r\n\r\n<p><strong>OUR VISION</strong></p>\r\n\r\n<p>Our vision is to be the number one interior design company in the Malabar region. We are passionate about creating good designs and bring our personalised style to every project we do. We always make sure that our clients are happy with everything before proceeding...</p>\r\n\r\n<p><strong>OUR MISSION</strong></p>\r\n\r\n<p>Our mission is to provide a personalised interior design services for residential and commercial properties that is both personal and cost-effective. Projects will be delivered on time and on budget with an unsurpassed attention to detail...</p>\r\n\r\n<p>&nbsp;</p>\r\n<gdiv></gdiv>', '002_1615223705.jpg', '2021-03-08 17:15:06');

-- --------------------------------------------------------

--
-- Table structure for table `home_page_banner_images`
--

CREATE TABLE `home_page_banner_images` (
  `id` int(11) NOT NULL,
  `first_banner_image_name` varchar(100) DEFAULT NULL,
  `second_banner_image_name` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home_page_banner_images`
--

INSERT INTO `home_page_banner_images` (`id`, `first_banner_image_name`, `second_banner_image_name`, `created_at`) VALUES
(2, '001_1614575642.jpg', '002_1614575642.jpg', '2021-03-01 05:14:02');

-- --------------------------------------------------------

--
-- Table structure for table `home_page_contact_banner_sections`
--

CREATE TABLE `home_page_contact_banner_sections` (
  `id` int(50) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home_page_contact_banner_sections`
--

INSERT INTO `home_page_contact_banner_sections` (`id`, `title`, `content`, `created_at`) VALUES
(1, 'Test Test', '<p>Test Content</p>', '2021-04-18');

-- --------------------------------------------------------

--
-- Table structure for table `home_page_project_sections`
--

CREATE TABLE `home_page_project_sections` (
  `id` int(11) NOT NULL,
  `project_content` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home_page_project_sections`
--

INSERT INTO `home_page_project_sections` (`id`, `project_content`, `created_at`) VALUES
(2, '<p><strong>COMPLETE HOME INTERIOR AND EXTERIOR...</strong></p>\r\n\r\n<p>Take advantage of our interior and exterior design services and create your dream living room, dining room, bed room or kitchen. Our experienced interior designers can also help you pick the perfect home accessories to decorate your space and reflect your personality.</p>', '2021-01-26 07:29:55');

-- --------------------------------------------------------

--
-- Table structure for table `home_page_testimonials`
--

CREATE TABLE `home_page_testimonials` (
  `id` int(11) NOT NULL,
  `author_name` varchar(100) DEFAULT NULL,
  `author_designation` varchar(100) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home_page_testimonials`
--

INSERT INTO `home_page_testimonials` (`id`, `author_name`, `author_designation`, `content`, `status`, `created_at`) VALUES
(3, 'ADAM SMITH', 'LOREM IPSUM', '<p>Projects scelerisque the nibhse drana moss pulvinar laoreet. Nulla molestie finibus dignissim. Nunc ultrices odio mauris fermentum the gravida varius ex lacnia. Proin dictum nisl orci drana compani eu scelerisque risus feugiat sit amet. Vestibulum condimentum tempoeu the venenatis.</p>\r\n<gdiv></gdiv>', 1, '2021-01-24 16:50:16'),
(4, 'JOHN DOE', 'LOREM IPSUM', '<p>Projects scelerisque the nibhse drana moss pulvinar laoreet. Nulla molestie finibus dignissim. Nunc ultrices odio mauris fermentum the gravida varius ex lacnia. Proin dictum nisl orci drana compani eu scelerisque risus feugiat sit amet. Vestibulum condimentum tempoeu the venenatis.</p>\r\n<gdiv></gdiv>', 1, '2021-01-24 16:51:08');

-- --------------------------------------------------------

--
-- Table structure for table `login_activities`
--

CREATE TABLE `login_activities` (
  `id` int(11) NOT NULL,
  `user_id` int(128) DEFAULT NULL,
  `user_agent` varchar(128) NOT NULL,
  `ip_address` varchar(128) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_03_21_112007_create_projects_table', 2),
(5, '2020_03_21_114320_create_clients_table', 2),
(6, '2020_03_21_115730_create_staffs_table', 2),
(7, '2020_03_21_121635_create_work_infos_table', 2),
(8, '2020_03_21_122455_create_modules_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `project_name` varchar(100) DEFAULT NULL,
  `project_content` text DEFAULT NULL,
  `project_year` varchar(50) DEFAULT NULL,
  `project_company` varchar(100) DEFAULT NULL,
  `project_location` varchar(100) DEFAULT NULL,
  `project_banner_image` varchar(100) DEFAULT NULL,
  `project_category` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `project_image_1` varchar(100) DEFAULT NULL,
  `project_image_2` varchar(100) DEFAULT NULL,
  `project_image_3` varchar(100) DEFAULT NULL,
  `project_image_4` varchar(100) DEFAULT NULL,
  `project_image_5` varchar(100) DEFAULT NULL,
  `project_image_6` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_name`, `project_content`, `project_year`, `project_company`, `project_location`, `project_banner_image`, `project_category`, `created_at`, `project_image_1`, `project_image_2`, `project_image_3`, `project_image_4`, `project_image_5`, `project_image_6`) VALUES
(4, 'Mr.DANNI', '<p>Interior and Exterior works</p>', '2019', 'PWOODS INTERIOR', 'Ponnani', '69471284_1112314122299710_4779446328612618240_o_1615456494.jpg', 'interior', '2021-01-24 11:29:45', '04_1611487783.jpg', '05_1611487784.jpg', '3_1611487784.jpg', '02_1611487784.jpg', '69469582_1112310072300115_7535311759083569152_o_1615456608.jpg', '69495655_1112309805633475_9152826589132619776_o_1615456608.jpg'),
(5, 'Er. Samith Chandran & Dr. Anusree', '<p>Renovation project - Interior and exterior</p>', '2020', 'PWOODS INTERIOR', 'Alathur, Palakkad-Kerala', 'as_1615457276.jpg', 'interior', '2021-01-24 11:30:56', '1_1615457668.jpg', '129738784_1493722194158899_9111277704767378661_o_1615457800.jpg', '129978212_1493722350825550_6741297168509569929_o_1615457812.jpg', '130007565_1493722310825554_4832018372212782061_o_1615457831.jpg', '06_1611487855.jpg', '130541152_1493722390825546_7253636230141038733_o_1615458269.jpg'),
(6, 'Mr.Joshy', '<p>Renovation Project - Interior and Exterior</p>', '2020', 'PWOODS INTERIOR', 'Ponnani', '134442015_1510125235851928_8666336553581088215_o (1)_1615458514.jpg', 'interior', '2021-03-01 05:55:20', '133554924_1509592439238541_6724042930866315316_o_1615458575.jpg', '133284731_1509592309238554_6880610518362869504_o_1615458576.jpg', '132915194_1509592335905218_2235304341508619851_o_1615458602.jpg', '132868287_1509591979238587_3930659544824189952_o_1615458602.jpg', '133112743_1509592259238559_8267916716359792108_o_1615458603.jpg', '134067670_1509592252571893_8502463766337779615_o_1615458603.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `project_page_contents`
--

CREATE TABLE `project_page_contents` (
  `id` int(50) NOT NULL,
  `contents` text DEFAULT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_page_contents`
--

INSERT INTO `project_page_contents` (`id`, `contents`, `created_at`) VALUES
(1, '<p><strong>Our vision is to be the number one interior design company in the Malabar region. We are passionate about creating good designs and bring our personalised style to every project we do. We always make sure that our clients are happy with everything before proceeding.</strong></p>\r\n\r\n<p>Pwoods Interior has been offering clients timeless design solutions for more than 3 years. We always wanted our clients to deserve the smartest solutions and hence we make sure to provide them with the latest in furnishings for homes or officers, including innovative custom furnishings, window treatments, lighting, accessories and unique artwork by local artists. Offering a highly personalised bespoke service, we place great importance and commitment to building strong client relationships, tailoring our process to meet each client&rsquo;s needs, delivering a full interior architecture, furniture design and turn-key styling service from inception to completion</p>', '2021-04-18');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `main_title` varchar(100) DEFAULT NULL,
  `banner_image` varchar(100) DEFAULT NULL,
  `first_content_title` varchar(100) DEFAULT NULL,
  `first_content` text DEFAULT NULL,
  `second_content_title` varchar(100) DEFAULT NULL,
  `second_content` text DEFAULT NULL,
  `second_content_image` varchar(100) DEFAULT NULL,
  `feature_image_title_1` varchar(100) DEFAULT NULL,
  `feature_image_name_1` varchar(100) DEFAULT NULL,
  `feature_image_title_2` varchar(100) DEFAULT NULL,
  `feature_image_name_2` varchar(100) DEFAULT NULL,
  `feature_image_title_3` varchar(100) DEFAULT NULL,
  `feature_image_name_3` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `main_title`, `banner_image`, `first_content_title`, `first_content`, `second_content_title`, `second_content`, `second_content_image`, `feature_image_title_1`, `feature_image_name_1`, `feature_image_title_2`, `feature_image_name_2`, `feature_image_title_3`, `feature_image_name_3`, `created_at`) VALUES
(5, 'Interior Design', '69572354_1112312305633225_4379393244799172608_o_1615365421.jpg', 'Constructing future Conserving Relations', '<p><strong>COMPLETE HOME INTERIOR</strong></p>\r\n\r\n<p>Take advantage of our interior design services and create your dream living room, dining room, bed room or kitchen. Our experienced interior designers can also help you pick the perfect home accessories to decorate your space and reflect your personality.</p>\r\n\r\n<p><strong>CURTAIN &amp; BLINDS</strong></p>\r\n\r\n<p>Whether you are looking for machine or hand finished curtains, our team will deliver them to your desired style, offering different looks to suit your needs. Our handpicked manufacturers also offer a wide range of blinds, manual or motorized, to suit any window.</p>\r\n\r\n<p><strong>WALLPAPER &amp; TEXTURE PAINT</strong></p>\r\n\r\n<p>Stylish, modern and utterly versatile, our wallpapers and texture paints work perfectly in their own right as well as coordinating perfectly with your interior design. We pride ourselves on creating beautifully designed spaces that reflect your own personality and needs.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', 'Modular Kitchen', '<p>Start celebrating the joy of cooking with your family in a space that is designed to pamper the comforts of convenience while keeping the international aesthetics.</p>\r\n\r\n<p>Colours,Textures,&nbsp;Utility &amp; Space. These elements can be blended in countless ways, customised to any requirement and executed to absolute perfection..</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', '69437158_1112313742299748_1287282817658519552_o_1615366298.jpg', 'Curtains and Blinds', 'living-room-fire-place-curtains-blinds-e1540043981519_1615367694.jpg', 'Decorative Items', 'WhatsApp Image 2020-10-01 at 4.53.21 PM_1615367750.jpeg', 'Ceiling works', 'Ceiling Designs_1615368050.jpg', '2021-01-24 14:35:26'),
(6, 'Exterior Design', '69471284_1112314122299710_4779446328612618240_o_1615373792.jpg', 'Constructing future Conserving Relations', '<p>Your desired garden design doesn&rsquo;t have to be a dream any longer. Make your vision a reality by hiring landscaping professionals from us in Kerala. We are domestic garden landscape gardening is as good as its owner thinks it is. Take note, we can work with your existing garden, or remove it all and start from scratch.</p>\r\n\r\n<p>We have always tried to keep up our standards and rise to the expectations of our clients.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', 'LANDSCAPING', '<p>Your desired garden design doesn&rsquo;t have to be a dream any longer. Make your vision a reality by hiring landscaping professionals from us in Kerala. We are domestic garden landscape gardening is as good as its owner thinks it is. Take note, we can work with your existing garden, or remove it all and start from scratch.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', 'WhatsApp Image 2021-03-10 at 1.56.22 PM (1)_1615373793.jpeg', 'Exterior', '69524159_1112313988966390_5616238118312083456_o_1615373896.jpg', 'Landscaping', '69665302_1112309712300151_5644468053585428480_o_1615374671.jpg', 'Landscaping', 'WhatsApp Image 2021-03-10 at 1.56.20 PM (2)_1615374672.jpeg', '2021-01-24 14:36:53'),
(7, 'Furniture Manufacturing', 'FB_IMG_1552709210432_1615375023.jpg', 'Constructing future Conserving Relations', '<p>We offer bespoke and luxury designs combining classic influences with a contemporary edge. According to our customer requirements we manufacture and deliver furniture&rsquo;s within 20 to 25 days. Create the best comfortable living space with Pwoods Interior.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', 'Furniture Manufacturing', '<p>Furnitures area&nbsp;play a vital role in making every room special. A well-arranged room with a cluster of units attracts everyone&rsquo;s eyes.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', '69469582_1112310072300115_7535311759083569152_o - Copy_1615456233.jpg', 'Furniture', '133284731_1509592309238554_6880610518362869504_o_1615456233.jpg', 'Furniture', '2_1615456234.jpg', 'Furniture', '03_1611501897.jpg', '2021-01-24 14:38:14');

-- --------------------------------------------------------

--
-- Table structure for table `services_main_contents`
--

CREATE TABLE `services_main_contents` (
  `id` int(11) NOT NULL,
  `main_title` varchar(100) DEFAULT NULL,
  `main_content` text DEFAULT NULL,
  `banner_image` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services_main_contents`
--

INSERT INTO `services_main_contents` (`id`, `main_title`, `main_content`, `banner_image`, `created_at`) VALUES
(6, 'We Provide...', '<p><strong>COMPLETE HOME INTERIOR</strong></p>\r\n\r\n<p>Take advantage of our interior design services and create your dream living room, dining room, bed room or kitchen. Our experienced interior designers can also help you pick the perfect home accessories to decorate your space and reflect your personality.</p>\r\n\r\n<p><strong>CURTAIN &amp; BLINDS</strong></p>\r\n\r\n<p>Whether you are looking for machine or hand finished curtains, our team will deliver them to your desired style, offering different looks to suit your needs. Our handpicked manufacturers also offer a wide range of blinds, manual or motorized, to suit any window.</p>\r\n\r\n<p><strong>WALLPAPER &amp; TEXTURE PAINT</strong></p>\r\n\r\n<p>Stylish, modern and utterly versatile, our wallpapers and texture paints work perfectly in their own right as well as coordinating perfectly with your interior design. We pride ourselves on creating beautifully designed spaces that reflect your own personality and needs.</p>\r\n\r\n<p><strong>STEEL WORK</strong></p>\r\n\r\n<p>We&rsquo;re skilled in the manufacture, installation and of all models of steel handrails for both domestic and commercial projects. We are committed to provide high level of customer services and our skilled craftsmen can fabricate and install all designs of steel handrails to a very high standard.</p>\r\n\r\n<p><strong>CCTV INSTALLATION</strong></p>\r\n\r\n<p>Pwoods gives you complete business and home security services to deter intruders. We offer all range of CCTV solutions. Keep up-to-date with the latest technological advancements we make sure your premises are protected by the very best solutions available.</p>\r\n\r\n<p><strong>LANDSCAPING</strong></p>\r\n\r\n<p>Your desired garden design doesn&rsquo;t have to be a dream any longer. Make your vision a reality by hiring landscaping professionals from us in Kerala. We are domestic garden landscape gardening is as good as its owner thinks it is. Take note, we can work with your existing garden, or remove it all and start from scratch.</p>\r\n\r\n<p><strong>COMMERCIAL INTERIOR</strong></p>\r\n\r\n<p>Pwoods interior will provide you the most complete professional Office &amp; Shop interior design services. We undertake projects of all sizes and our expertly trained teams will work with you to ensure that your plans will come to fruition.</p>\r\n\r\n<p><strong>FURNITURE MANUFACTURING</strong></p>\r\n\r\n<p>We offer bespoke and luxury designs combining classic influences with a contemporary edge. According to our customer requirements we manufacture and deliver furniture&rsquo;s within 20 to 25 days. Create the best comfortable living space with Pwoods Interior.</p>', '002_1614577519.jpg', '2021-01-23 10:33:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_image` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `profile_image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@woods.com', NULL, '$2y$10$YICwjn3aj00EVzV7ewT/TeJSnvw9smDS9lzF9mglwJTeVTIM3gBUa', '', NULL, '2020-03-21 04:52:00', '2020-03-21 04:52:00'),
(9, 'Test User', 'testuser@test.com', NULL, '$2y$10$KumTZ0htX/DVCGsj5xGSBuQB8CAO93ATH2pqMJwsMcA8YKEw4zclO', '', NULL, '2020-05-04 21:26:45', '2020-05-04 21:26:45'),
(10, 'ImgTest', 'imgtest@test.com', NULL, '$2y$10$f6J1Y/U4jtie2pUn9KtIIeRDZSkMA2sRnp4QDwFhjQ3EBhRUwIMce', 'under1.jpg.1588649324.jpeg', NULL, '2020-05-04 21:58:44', '2020-05-04 21:58:44'),
(11, 'UTest', 'test456@tres.com', NULL, '$2y$10$Sd9UAAD.le4hAT4ZTHMBO.rBobFAXgtmHtjpxe/mWYti3u4CuQJOu', 'under1.jpg.1588649894.jpeg', NULL, '2020-05-04 22:08:15', '2020-05-04 22:08:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_page_contents`
--
ALTER TABLE `about_page_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_page_partners`
--
ALTER TABLE `about_page_partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_page_contents`
--
ALTER TABLE `contact_page_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer_settings`
--
ALTER TABLE `footer_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_page_about_sections`
--
ALTER TABLE `home_page_about_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_page_banner_images`
--
ALTER TABLE `home_page_banner_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_page_contact_banner_sections`
--
ALTER TABLE `home_page_contact_banner_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_page_project_sections`
--
ALTER TABLE `home_page_project_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_page_testimonials`
--
ALTER TABLE `home_page_testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_activities`
--
ALTER TABLE `login_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_page_contents`
--
ALTER TABLE `project_page_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_main_contents`
--
ALTER TABLE `services_main_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_page_contents`
--
ALTER TABLE `about_page_contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `about_page_partners`
--
ALTER TABLE `about_page_partners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_page_contents`
--
ALTER TABLE `contact_page_contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `footer_settings`
--
ALTER TABLE `footer_settings`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `home_page_about_sections`
--
ALTER TABLE `home_page_about_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `home_page_banner_images`
--
ALTER TABLE `home_page_banner_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `home_page_contact_banner_sections`
--
ALTER TABLE `home_page_contact_banner_sections`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_page_project_sections`
--
ALTER TABLE `home_page_project_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `home_page_testimonials`
--
ALTER TABLE `home_page_testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login_activities`
--
ALTER TABLE `login_activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `project_page_contents`
--
ALTER TABLE `project_page_contents`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `services_main_contents`
--
ALTER TABLE `services_main_contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
