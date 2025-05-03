-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 03, 2025 at 10:40 AM
-- Server version: 5.7.23-23
-- PHP Version: 8.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `viralqls_machines`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `description` text,
  `image_path` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `description`, `image_path`, `updated_at`) VALUES
(1, '<h2><strong>About&nbsp;</strong></h2><h2><strong>Shri Shyama Super Services</strong></h2><p><strong>Your Trusted Partner in Spring Machine Dealing and Spring Supplies Across India</strong></p><p>At <strong>Shri Shyama Super Services</strong>, we specialize in providing high-performance <strong>spring machines</strong> designed to meet the diverse needs of industries across India. Our offerings include a wide range of spring machines such as <strong>Spring Coiling Machines</strong>, <strong>Wire Forming Machines</strong>, <strong>Wire Bending Machines</strong>, <strong>Spring End Grinding Machines</strong>, and <strong>Furnaces</strong>. These machines are engineered for <strong>reliability, efficiency, and superior performance</strong> in industries like manufacturing, construction, automotive, and heavy-duty applications.</p><p>In addition to new spring machines, we also provide <strong>refurbished, renewed, and used</strong> versions of these machines, ensuring <strong>cost-effective solutions</strong> without compromising on quality. We are a trusted supplier of all types of springs, wireforms, and wire bends, offering industry-specific solutions that enhance productivity and reliability.</p>', '677e7e7caf7ae.png', '2025-03-04 08:05:47');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `text` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image_path`, `text`, `created_at`) VALUES
(10, '1737462288_CNC Spring Coiling Machine 0.11 (1).jpg', '', '2025-01-21 12:24:48'),
(11, '1737462408_CNC Spring Coiling Machine 0.111.jpg', '', '2025-01-21 12:26:48');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`) VALUES
(12, 'Spring end grinding machines', '2025-01-11 07:06:48'),
(13, 'Refurbished Machines', '2025-01-11 07:09:58'),
(14, 'Wire Bending machines', '2025-01-11 07:22:36'),
(15, 'Wire forming Machines', '2025-01-11 07:23:01'),
(16, 'Coiling Machines', '2025-01-11 07:23:23'),
(17, 'Heat treatment Equipments', '2025-01-21 12:56:33'),
(18, 'Conical Spring Supplier', '2025-03-01 09:51:52'),
(19, 'Compression Spring', '2025-03-01 10:03:44'),
(20, 'Side Stand Spring Supplier', '2025-03-01 10:04:38'),
(21, 'Torsion Spring Supplier', '2025-03-01 10:05:05'),
(22, 'Tension Spring Supplier', '2025-03-01 10:05:28'),
(23, 'Helical Spring Supplier', '2025-03-01 10:05:51'),
(24, 'Sheet Metal Spring Supplier', '2025-03-01 10:06:19'),
(25, 'Agriculture Spring Supplier', '2025-03-01 10:06:42'),
(26, 'Railway Spring Supplier', '2025-03-01 10:07:09'),
(27, 'Compression Spring Supplier', '2025-03-01 10:08:13');

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `machine_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`id`, `name`, `email`, `phone`, `message`, `machine_id`, `created_at`) VALUES
(16, 'Mike Milan Bonnet\r\n', ' check-message2652@gmail.com', '86936799936', 'Hi, \r\n \r\nCurious about how your website is performing? Discover its strengths and weaknesses with our Free SEO Check Tool! In just 2 minutes, you’ll get a detailed analysis of your website’s SEO health and actionable insights to help improve your rankings. \r\n \r\nTake the first step towards better performance and growth. \r\n \r\nRun Your Free SEO Check Now \r\nhttps://www.speed-seo.net/check-site-seo-score/ \r\n \r\nDon’t let overlooked SEO issues hold you back. Optimize your site today and stay ahead of the competition! \r\n \r\nBest regards, \r\n \r\n \r\nMike Milan Bonnet\r\n \r\nSpeed SEO \r\nWhatsapp us: https://www.speed-seo.net/whatsapp-with-us/ \r\ninfo@speed-seo.net', 0, '2025-02-16 20:34:58'),
(17, 'Mike Vincent De Smet\r\n', ' check-message5249@gmail.com', '84258512438', 'Hi there, \r\n \r\nWhile checking your shrishyamass.com for its ranks, I have noticed that there are some toxic links pointing towards it. \r\n \r\nGrab your free clean up and improve ranks in no time \r\nhttps://www.professionalseocleanup.com/ \r\n \r\nIt really works, get a free backlinks clean up with us today \r\n \r\nRegards \r\nMike Vincent De Smet\r\n \r\nWhatsapp: https://www.professionalseocleanup.com/whatsapp/ \r\nEmail us: info@professionalseocleanup.com', 0, '2025-02-19 01:18:15'),
(19, 'Mike Sander Nilsen\r\n', 'mike@monkeydigital.co', '85157248663', 'Dear Webmaster, \r\n \r\nI wanted to reach out with something that could seriously help your website’s reach. We work with a trusted ad network that allows us to deliver real, location-based social ads traffic for just $10 per 10,000 visits. \r\n \r\nThis isn\'t bot traffic—it’s actual users, tailored to your chosen market and niche. \r\n \r\nWhat you get: \r\n \r\n10,000+ real visitors for just $10 \r\nLocalized traffic for your chosen location \r\nScalability available based on your needs \r\nTrusted by SEO experts—we even use this for our SEO clients! \r\n \r\nInterested? Check out the details here: \r\nhttps://www.monkeydigital.co/product/country-targeted-traffic/ \r\n \r\nOr ask any questions on WhatsApp: \r\nhttps://monkeydigital.co/whatsapp-us/ \r\n \r\nLooking forward to helping you grow! \r\n \r\nBest, \r\nMike Sander Nilsen\r\n \r\nPhone/whatsapp: +1 (775) 314-7914', 0, '2025-02-23 21:41:31'),
(20, 'hi', 'hs@gmail.com', '787878678867', 'hi', 0, '2025-03-01 11:03:51'),
(26, 'Mike Filip Goossens\r\n', 'info@strictlydigital.net', '86114382384', 'Hi there, \r\n \r\nGetting some set of links pointing to shrishyamass.com might bring no value or worse for your site. \r\n \r\nIt really isn’t important the total external links you have, what is crucial is the number of keywords those websites rank for. \r\n \r\nThat is the critical thing. \r\nNot the meaningless Domain Authority or SEO score. \r\nThese can be faked easily. \r\nBUT the amount of ranking keywords the websites that point to your site have. \r\nThat’s what really matters. \r\n \r\nHave such links link to your domain and your rankings will skyrocket! \r\n \r\nWe are offering this exclusive SEO package here: \r\nhttps://www.strictlydigital.net/product/semrush-backlinks/ \r\n \r\nNeed more details, or want to know more, message us here: \r\nhttps://www.strictlydigital.net/whatsapp-us/ \r\n \r\nSincerely, \r\nMike Filip Goossens\r\n \r\nstrictlydigital.net \r\nPhone/WhatsApp: +1 (877) 566-3738', 0, '2025-03-09 08:52:54'),
(27, 'Test', 'Test@gmail.com', '9999999999', 'Test', 0, '2025-03-12 10:18:24'),
(28, 'Alex Amin', 'alexamin4x4@gmail.com', '85837991725', 'Greetings, \r\n \r\nI hope this message finds you well. We are seeking strategic business partners and individuals interested in collaborating on exclusive investment opportunities. We represent a network of high-net-worth individuals (HNWIs) from Ukraine, Russia, Africa and the Middle East \r\n \r\nGiven the nature of the funds, further details will be shared upon request including amount involved. If it interests you to collaborate with us at no risk, please feel free to reach out for a confidential discussion. \r\n \r\nLooking forward to your response. \r\n \r\nBest regards, \r\n \r\nAlex Amin \r\nEmail:alexanderamin@infinitycapitalinc.org', 0, '2025-03-17 20:20:23'),
(29, 'Lincolnamugh', 'nomin.momin+298f0@mail.ru', '83749487577', 'Nfwhdkjdwj rdqskwjfej wkdwodkwkifjejr okeowjrfiejfiej rowjedowkrfiejfi jrowkorwkjrfejfi jorkdworefoijfeijfowek okdwofjiejgierjfoe shrishyamass.com', 0, '2025-03-21 16:31:21'),
(30, 'Mike Harrv Fournier\r\n', 'info@professionalseocleanup.com', '83833728517', 'Hi there, \r\n \r\nWhile checking your shrishyamass.com for its ranks, I have noticed that \r\nthere are some toxic links pointing towards it. \r\n \r\nGrab your free clean up and improve ranks in no time \r\nhttps://www.professionalseocleanup.com/ \r\n \r\nAsk us how we do it: \r\nhttps://www.professionalseocleanup.com/whatsapp/ \r\n \r\nRegards \r\nMike Harrv Fournier\r\n \r\nPhone: +1 (855) 221-7591', 0, '2025-03-23 12:34:32'),
(31, 'MyName', 'dicuvnwf@testing-your-form.info', '+14 2402981466', 'hHIGkw IoJQJ CITcP wPZbIS KDaMP', 68, '2025-03-31 19:10:16'),
(32, 'Hello', 'oxmcezmc@testing-your-form.info', '+11 6112731', 'SQXLDVX dygrJ fUWB MRuS LXuO DwU', 69, '2025-03-31 19:10:16'),
(33, 'Hello', 'kognwxos@testing-your-form.info', '+89 36982949', 'aZAT tsXOYvXo bVHSjSF YOzh EWBH WNxzuy TzE', 72, '2025-03-31 19:10:16'),
(34, 'Hello', 'akgciywu@testing-your-form.info', '+20 28573009', 'UuEse yGWZCG GeZPI MVN', 71, '2025-03-31 19:10:16'),
(35, 'MyName', 'cahipvbn@testing-your-form.info', '+54 7728206789', 'BbJ BJxlXZV buEQlicG WYBlJH', 70, '2025-03-31 19:10:16'),
(36, 'John', 'xkarwyhh@testing-your-form.info', '+18 3754085', 'wypBBGAT mRxX yLkVQ qsL CcgrRu PREk WDhjaL', 67, '2025-03-31 19:10:16'),
(37, 'Mike Felix Simonson\r\n', 'info@speed-seo.net', '83658872114', 'Hi, \r\nWorried about hidden SEO issues on your website? Let us help — completely free. \r\nRun a 100% free SEO check and discover the exact problems holding your site back from ranking higher on Google. \r\n \r\nRun Your Free SEO Check Now \r\nhttps://www.speed-seo.net/check-site-seo-score/ \r\n \r\nOr chat with us and our agent will run the report for you: https://www.speed-seo.net/whatsapp-with-us/ \r\n \r\nBest regards, \r\n \r\n \r\nMike Felix Simonson\r\n \r\nSpeed SEO Digital \r\nEmail: info@speed-seo.net \r\nPhone/WhatsApp: +1 (833) 454-8622', 0, '2025-04-13 02:11:05'),
(38, 'Mike Florian Karlsson\r\n', 'mike@monkeydigital.co', '82487535153', 'Hello, \r\n \r\nI wanted to check in with something that could seriously help your website’s traffic. We work with a trusted ad network that allows us to deliver genuine, country-targeted social ads traffic for just $10 per 10,000 visits. \r\n \r\nThis isn\'t junk clicks—it’s actual users, tailored to your preferred location and niche. \r\n \r\nWhat you get: \r\n \r\n10,000+ high-quality visitors for just $10 \r\nGeo-targeted traffic for your chosen location \r\nLarger traffic packages available based on your needs \r\nTrusted by SEO experts—we even use this for our SEO clients! \r\n \r\nInterested? Check out the details here: \r\nhttps://www.monkeydigital.co/product/country-targeted-traffic/ \r\n \r\nOr ask any questions on WhatsApp: \r\nhttps://monkeydigital.co/whatsapp-us/ \r\n \r\nLet\'s get started today! \r\n \r\nBest, \r\nMike Florian Karlsson\r\n \r\nPhone/whatsapp: +1 (775) 314-7914', 0, '2025-04-14 09:54:56'),
(39, 'MyName', 'dtxsipln@testing-your-form.info', '+80 00793815', 'kGp HAq rgQC mOFflCHL yZFHjKtE QBWVkhF', 72, '2025-04-16 09:37:10'),
(40, 'Alice', 'kraoazut@testing-your-form.info', '+89 9273452', 'YFG aLxSapE MMXVfVx lKV ZDgYxMy', 68, '2025-04-16 09:37:10'),
(41, 'TestUser', 'keqrvvej@testing-your-form.info', '+42 542492131', 'OTengmGX LpwDZTP HpPV FVJpQ jxhgv', 71, '2025-04-16 09:37:10'),
(42, 'Alice', 'frglvolq@testing-your-form.info', '+62 8181193971', 'Dpw vQclsxRs GXuNMYzK KLzYmXw prtDCi', 69, '2025-04-16 09:37:10'),
(43, 'Alice', 'ddldmtue@testing-your-form.info', '+53 37091532', 'icN qdQBSL NJds vQexCpP', 70, '2025-04-16 09:37:10'),
(44, 'Hello', 'vykftvsu@testing-your-form.info', '+83 50648981', 'KDY zFDtwZRQ Ywbk UpijQbd AXktcinA', 67, '2025-04-16 09:37:10'),
(45, 'NAERTREGE239115NERTHRTYHR', 'muhfvmcp@bonjourfmail.com', '89586951834', 'MEYJYTJY239115MAERWETT', 0, '2025-04-21 20:04:32'),
(46, 'Mike Werner Evans\r\n', 'mike@monkeydigital.co', '84671343385', 'Hi, \r\n \r\nThis is Mike from Monkey Digital, \r\nI am reaching out to discuss a great business deal. \r\n \r\nHow would you like to place our promotions on your site and redirect via your custom affiliate link towards high-demand services from our business? \r\n \r\nThis way, you receive a 35% profit share, continuously from any transactions that are made from your audience. \r\n \r\nThink about it, most website owners need SEO, so this is a big opportunity. \r\n \r\nWe already have over 12,000 affiliates and our payments are paid out every month. \r\nIn the past month, we reached $27280 in payouts to our promoters. \r\n \r\nIf interested, kindly contact us here: \r\nhttps://monkeydigital.co/affiliates-whatsapp/ \r\n \r\nOr sign up today: \r\nhttps://www.monkeydigital.co/join-our-affiliate-program/ \r\n \r\nCheers, \r\nMike Werner Evans\r\n \r\nPhone/whatsapp: +1 (775) 314-7914', 0, '2025-04-23 20:43:06');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `short_description` text,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `title`, `short_description`, `image`, `created_at`) VALUES
(8, 'Spring Forming Machine', '', '6787a730ee18b.png', '2025-01-15 12:16:48'),
(9, 'Spring Coiling Machine', '', '6787a768b3e30.png', '2025-01-15 12:17:44'),
(15, 'Wire Bending Machine', '', '678f7acf9c305.jpg', '2025-01-21 10:45:35');

-- --------------------------------------------------------

--
-- Table structure for table `machines`
--

CREATE TABLE `machines` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `short_description` text,
  `image_path` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `machines`
--

INSERT INTO `machines` (`id`, `name`, `description`, `short_description`, `image_path`, `category_id`, `created_at`) VALUES
(39, 'Wire Straightening and Cutting Machine', '<p><strong>Specifications:</strong></p><ul><li><strong>Model:</strong> Not specified</li><li><strong>Power:</strong> 5.5kw</li><li><strong>Actual Energy Consumption:</strong> 3.0kw</li><li><strong>Input Voltage:</strong> 3P380V+Zero Line+50/60Hz</li><li><strong>Wire Feeding Motor:</strong> 2.3kw</li><li><strong>Cutting Motor:</strong> 1.0kw</li><li><strong>Straightening Motor:</strong> 2.2kw</li><li><strong>Wire Diameter:</strong> 2-6mm</li><li><strong>Max Cutting Speed:</strong> 130pcs/m</li><li><strong>Tolerance:</strong> ±0.5mm</li><li><strong>Cutting Length:</strong> Over 100mm</li><li><strong>Dimension:</strong> 1400<i>900</i>500 (mm)</li><li><strong>Packing Dimension:</strong> 1800<i>1300</i>1000 (mm)</li><li><strong>Weight:</strong> 430kg</li></ul>', 'Streamline your wire processing with our reliable  machine. Featuring precise controls and a durable design, it ensures efficient production and excellent results for various bending applications.', '67921a1acbea6_7_6_11zon.png', 12, '2025-01-23 10:29:46'),
(40, 'Flying Shear Straightening Machine', '<p><strong>Specifications:</strong></p><ul><li><strong>Model:</strong> JJ-FJ-F130, JJ-FJ-F240, JJ-FJ-F350</li><li><strong>Power:</strong> 6.7kw, 7.7kw, 12.1kw</li><li><strong>Input Voltage:</strong> 3P380V</li><li><strong>Wire Feeding Motor:</strong> 1.5kw, 1.5kw, 2.3kw</li><li><strong>Cutting Motor:</strong> 2.2kw, 2.2kw, 4.3kw</li><li><strong>Straightening Motor:</strong> 3.0kw, 4.0kw, 5.5kw</li><li><strong>Guide:</strong> Taiwan Shangyin</li><li><strong>Straightening Bearing:</strong> Imported from Japan</li><li><strong>Straightening Die:</strong> Alloy</li><li><strong>Wire Diameter:</strong> 1-3mm, 2-4mm, 3-5mm</li><li><strong>Max Cutting Speed:</strong> 350pcs/m</li><li><strong>Straightening speed:</strong> 100m/min</li><li><strong>Tolerance:</strong> ±0.5mm</li><li><strong>Cutting Length:</strong> Over 100mm</li><li><strong>Dimension:</strong> 1700<i>900</i>1450 (length<i>width</i>height)</li><li><strong>Weight:</strong> 950kg, 950kg, 960kg</li></ul>', 'The Flying Shear Straightening Machine is an advanced solution for precision metal processing, designed to quickly and efficiently cut and straighten metal bars, rods, and profiles. With high-speed shearing and straightening capabilities, it ensures smooth, high-quality outputs for a variety of industries, improving productivity and minimizing material waste.', '67921a9eb46ca_8_7_11zon.png', 17, '2025-01-23 10:31:58'),
(41, ' Flying Shear Straightening Machine', '<p><strong>Specifications:</strong></p><ul><li><strong>Model:</strong> JJ-FJ-F470, JJ-FJ-F580</li><li><strong>Power:</strong> 12.1/14.1 Kw, 14.1/18.3 KW</li><li><strong>Input Voltage:</strong> 3P380V</li><li><strong>Guide:</strong> Taiwan Shangyin</li><li><strong>Straightening Bearing:</strong> Imported from Japan</li><li><strong>Straightening Die:</strong> Alloy</li><li><strong>Wire Diameter:</strong> 4-7 mm, 5-8 mm</li><li><strong>Max Cutting Speed:</strong> 300pcs/m</li><li><strong>Straightening speed:</strong> 90m/min</li><li><strong>Tolerance:</strong> ±0.5mm</li><li><strong>Cutting Length:</strong> Over 100mm</li><li><strong>Dimension:</strong> 2150<i>1000</i>1450 (length<i>width</i>height)</li><li><strong>Weight:</strong> 1150kg, 1150kg</li></ul>', 'The Flying Shear Straightening Machine is a high-performance tool designed for fast and precise cutting and straightening of metal bars and rods. Ideal for industries requiring efficiency, it delivers smooth, accurate results while minimizing material waste and maximizing production speed.', '67921afd46937_9_8_11zon.png', 17, '2025-01-23 10:33:33'),
(48, 'Spring Coiling Machine', '<p><strong>Specifications:</strong></p><ul><li><strong>Model:</strong> SC-208, SC-212</li><li><strong>Axis:</strong> 2, 2</li><li><strong>Wire Diameter:</strong> 0.15-0.8 mm, 0.3-1.2 mm</li><li><strong>Max. Outside Diameter(MM):</strong> 20, 25</li><li><strong>Wire Feed Rollers Groups:</strong> 1, 2</li><li><strong>Wire Feeding Motor(KW):</strong> 0.75KW, 1.2KW</li><li><strong>Cam motor(KW):</strong> 0.75KW, 1.2KW</li><li><strong>Air Compressor:</strong> 5-6kg/cm, 5-6kg/cm</li><li><strong>Dimension(M):</strong> 0.8<i>0.7</i>1.5, 0.8<i>0.8</i>1.5</li><li><strong>Weight(KG):</strong> 400kg, 450kg</li></ul><p><strong>Additional Features:</strong></p><ul><li>Touch Screen Controller easy to operate</li><li>Length checking system inside is optional</li><li>A simple torsion spring device is optional</li></ul>', 'Explore our advanced Spring Coiling Machines, engineered for precision and high-speed production of coils. Ideal for manufacturing various types of springs, offering reliability and consistent performance for diverse industrial applications.', '67921f55512ce_18_15_11zon.png', 16, '2025-01-23 10:52:05'),
(49, 'Spring Coiling Machine', '<p><strong>Specifications:</strong></p><ul><li><strong>Model:</strong> SC-316, SC-320, SC-335</li><li><strong>Axis:</strong> 3, 3, 3</li><li><strong>Wire Diameter(MM):</strong> 0.4-1.6, 0.5-2.0, 1.5-3.5</li><li><strong>Max. Outside Diameter(MM):</strong> 38, 38, 50</li><li><strong>Wire Feed Rollers Groups:</strong> 2, 2, 2</li><li><strong>Wire Feeding Motor(KW):</strong> 1.8kw, 2.7kw, 5.5kw</li><li><strong>Cam motor(KW):</strong> 1.8kw, 2.7kw, 5.5kw</li><li><strong>Pitch Motor (KW):</strong> 0.4kw, 0.4kw, 1.0kw</li><li><strong>Compressor Air Pressure:</strong> 5-6 kg/cm, 5-6 kg/cm, 5-6 kg/cm</li><li><strong>Dimension(MM):</strong> 1100<i>1000</i>1800, 1100<i>1000</i>1800, 1300<i>1300</i>1900</li><li><strong>Weight(KG):</strong> 550, 550, 1000</li></ul><p><strong>Additional Features:</strong></p><ul><li>Length checking system inside is optional</li><li>Cam, wire feeding Axes can work both seperately &amp; synchronously</li></ul>', 'Get optimal performance with our Spring Coiling Machines, built for precise coil production and high efficiency. Perfect for creating custom springs across a range of industries with speed and reliability.', '67921ff7a7686_19_16_11zon.png', 16, '2025-01-23 10:54:47'),
(50, 'Spring Coiling Machine', '<p><strong>Specifications:</strong></p><ul><li><strong>Model:</strong> SC-416, SC-425, SC-435</li><li><strong>Axis Number:</strong> 4, 4, 4</li><li><strong>Wire Diameter(MM):</strong> 0.3-1.6mm, 1.0-2.5mm, 1.6-3.5mm</li><li><strong>Max Outside Diameter(MM):</strong> 30mm, 50mm, 65mm</li><li><strong>Wire Feed Rollers Groups:</strong> 2, 2, 2</li><li><strong>Feeding Motor:</strong> 2kw, 2.7kw, 4.5kw</li><li><strong>Cut Motor:</strong> 1kw, 1.2kw, 2.0kw</li><li><strong>OD Control Motor:</strong> 1kw, 1.2kw, 2.0kw</li><li><strong>Pitch Control Motor:</strong> 1kw, 1.2kw, 2.0kw</li><li><strong>Air Pressure:</strong> 4-6kg/cm, 4-6kg/cm, 4-6kg/cm</li><li><strong>Dimension(MM):</strong> 950<i>1100</i>1800, 1500<i>1270</i>2130, 1600<i>1450</i>2100</li><li><strong>Weight(KG):</strong> 700kgs, 1000kg, 1300kg</li></ul>', 'Enhance your production with our Spring Coiling Machines, designed for accuracy and durability. Perfect for high-quality spring manufacturing with fast setup and consistent results for various industrial applications.', '679220bb4588c_20_17_11zon.png', 16, '2025-01-23 10:58:03'),
(51, 'Spring Coiling Machine', '<p><strong>Specifications:</strong></p><ul><li><strong>Model:</strong> SC-560, SC-580, SC-5120</li><li><strong>Axis Number:</strong> 5, 5, 5</li><li><strong>Wire Diameter(MM):</strong> 3.0-6.0mm, 3.0-8.0mm, 6.0-12.0mm</li><li><strong>Max Outside Diameter(MM):</strong> 120mm, 120mm, 150mm</li><li><strong>Wire Feed Rollers Groups:</strong> 3, 4, 4</li><li><strong>Feeding Motor:</strong> 15kw, 30kw, 37kw</li><li><strong>Up Cut Motor:</strong> 2.7kw, 5.5kw, 7kw</li><li><strong>Lower Cut Motor:</strong> 2.7kw, 5.5kw, 7kw</li><li><strong>Pitch Control Motor:</strong> 2.7kw, 5.5kw, 4.5kw</li><li><strong>OD Motor:</strong> 2.7kw, 5.5kw, 7kw</li><li><strong>Air Pressure:</strong> 4-6kg/cm, 4-6kg/cm, 4-6kg/cm</li><li><strong>Size:</strong> 2150<i>1600</i>2300, 1440<i>2320</i>2400, 1900<i>3350</i>2300</li><li><strong>Weight:</strong> 5000kg, 7000kg, 12000kg</li></ul>', 'Maximize efficiency with our Spring Coiling Machines, engineered for precision in coil manufacturing. Achieve consistent quality and fast production for all types of springs across multiple industries.', '67922145444e7_21_18_11zon.png', 16, '2025-01-23 11:00:21'),
(52, 'Ring Making Machine', '<p><strong>Specifications:</strong></p><ul><li><strong>Model:</strong> AL-R6-300E, AL-R8-450E</li><li><strong>Wire Diameter:</strong> 1.5-6mm, 1.5-8mm<ul><li>Ø1.5-2.0mm, OD≤150mm, OD≤150mm</li><li>Ø2.0-2.5mm, OD≤200mm, OD≤200mm</li><li>Ø2.5-3.0mm, OD≤250mm, OD≤250mm</li><li>Ø3.0-6.0mm, OD≤300mm, OD≤450mm</li><li>Ø6.0-8.0mm, /, OD≤450mm</li></ul></li><li><strong>Max OD:</strong> 1.5-2.0mm, OD≤150mm, OD≤150mm<ul><li>Ø2.0-2.5mm, OD≤200mm, OD≤200mm</li><li>Ø2.5-3.0mm, OD≤250mm, OD≤250mm</li><li>Ø3.0-4.0mm, OD≤300mm, OD≤450mm</li><li>Ø4.0-6.0mm, OD≤300mm, OD≤450mm</li><li>Ø6.0-8.0mm, /, OD≤450mm</li></ul></li><li><strong>Min OD:</strong> 1.5-2.0mm, OD≥80mm, OD≥80mm<ul><li>Ø2.0-3.0mm, OD≥70mm, OD≥80mm</li><li>Ø3.0-4.0mm, OD≥80mm, OD≥80mm</li><li>Ø4.0-6.0mm, OD≥100mm, OD≥100mm</li><li>Ø6.0-8.0mm, /, OD≥150mm</li></ul></li><li><strong>OD Tolerance:</strong> ±0.2mm, ±0.2mm</li><li><strong>Air Pressure:</strong> 0.6-0.8Mpa, 0.6-0.8Mpa</li><li><strong>Air Consumption:</strong> 0.25 m³/min, 0.25 m³/min</li><li><strong>Voltage Supply:</strong> 2P 380V, 2P 380V</li><li><strong>Weight:</strong> 700KG, 1000KG</li><li><strong>Power:</strong> 15 (kva), 18 (kva)</li></ul>', 'Explore our Ring Making Machines, designed for precise and efficient production of high-quality rings. Perfect for various industrial applications, offering durability, speed, and consistent results.', '67922324822bd_22_19_11zon.png', 17, '2025-01-23 11:08:20'),
(53, 'Mold Forming Machine', '<p><strong>Specifications:</strong></p><ul><li><strong>Model:</strong> ALM-26T, ALM-36T</li><li><strong>Feeding Length:</strong> 200mm, 200mm</li><li><strong>Wire Hardness (CARBON):</strong> 80 (CARBON), 80 (CARBON)</li><li><strong>Steel Wire:</strong> 0.6-3.0mm, 1.4-4.5mm</li><li><strong>Plate Thickness:</strong> 0.3-1.5mm, 0.8-2.0mm</li><li><strong>Plate Width:</strong> 30mm, 35mm</li><li><strong>Punch Force:</strong> 12TON, 25TON</li><li><strong>Processing Speed:</strong> 200pcs/min, 150pcs/min</li><li><strong>Stamping Power of Mechanical Sliding Seat:</strong> 1800kg, 2500kg</li><li><strong>Total Motor Power:</strong> 7.5kw, 7.5kw</li><li><strong>Appearance Dimension:</strong> 2000<i>1000</i>2000mm, 2200<i>1000</i>2100mm</li><li><strong>Total mass of Complete Machine:</strong> 2600kg, 3500kg</li></ul>', 'Mold Forming Machines, built for precision and efficiency in creating high-quality molds. Ideal for various industries, providing consistent performance, durability, and fast production', '6792241920e9f_23_20_11zon.png', 17, '2025-01-23 11:12:25'),
(55, 'Furnace Machine', '<p>This machines likely belongs to a manufacturer or supplier specializing in industrial heating equipment.</p><p><strong>Key Information:</strong></p><ul><li><strong>Furnace Model:</strong> The sheet lists various furnace models, including RJC-206, RJC-210, RJC-215, RJC-315, RJC-320, RJC-420, RJC-425, and RJC-430.</li><li><strong>Dimensions:</strong> For each model, both outside and hearth dimensions are provided in millimeters. This includes length, width, and height.</li><li><strong>Power and Temperature:</strong> The sheet indicates the power consumption in kilowatts (kW) for each model. Additionally, it specifies the tempering temperature range and the minimum tempering time in minutes.</li><li><strong>Output and Weight:</strong> The sheet lists the output capacity of each furnace model in kilograms per hour (kg/h) and the weight of the furnace body in kilograms (kg).</li><li><strong>Diameter of Tempered Pieces:</strong> The sheet provides the diameter range for the pieces that can be tempered in each furnace model.</li></ul><p><strong>Overall, the image is a comprehensive guide for anyone looking to select a furnace model based on their specific requirements. It provides crucial information about size, power, temperature control, output capacity, and weight.</strong></p><p><strong>Additional Notes:</strong></p><ul><li>The image also includes a small photograph of a furnace, likely one of the models listed.</li><li>The sheet mentions that the parameters are subject to change without prior notice, so it\'s important to refer to the actual contract for the most up-to-date information.</li></ul>', 'Explore our Furnace Machines, designed for high-efficiency heating and temperature control. Perfect for various industrial applications, offering reliable performance, durability, and precise temperature regulation.', '67922b8c1c297_24_21_11zon.png', 17, '2025-01-23 11:44:12'),
(56, 'Buckle Making Machine', '<p><strong>Product:</strong> Buckle Making Machine</p><p><strong>Model:</strong> AL-SB3.5</p><p><strong>Specifications:</strong></p><ul><li><strong>Size:</strong> 1.5-3.5mm</li><li><strong>Strap Size:</strong> 12/16mm</li><li><strong>Feeding Length:</strong> 300mm</li><li><strong>Production Rate:</strong> 50-60/minute</li><li><strong>Motor Power:</strong> 2.2kw</li><li><strong>Size (L</strong><i><strong>W</strong></i><strong>H):</strong> 1700<i>600</i>1680</li><li><strong>Weight:</strong> 750.0KG</li></ul>', 'Our Buckle Making Machines, designed for precision and efficiency in producing high-quality buckles. Ideal for a variety of industries, offering durability, fast production, and consistent results.', '67922c52e0845_25_22_11zon.png', 17, '2025-01-23 11:47:30'),
(57, 'Spring Grinding Machine', '<p><strong>Product:</strong> Spring Grinding Machine</p><p><strong>Model:</strong> AL-G600-9B, AL-C250-12B, AL-G400-12B</p><p><strong>Specifications:</strong></p><ul><li><strong>Model:</strong> AL-G600-9B, AL-C250-12B, AL-G400-12B</li><li><strong>Specification of Grinding Wheel:</strong> 0450<i>65, 0660</i>100<i>0170, 0660</i>100*0170</li><li><strong>Diameter of feeding plate:</strong> 0740</li><li><strong>Diameter of the springs to be grinded:</strong> 01-09, 03-012, 03-012</li><li><strong>OD of the springs to be grinded:</strong> 020-0130, 020-0130</li><li><strong>Height of the springs to be grinded:</strong> 300-600, 20-250, 150-400</li><li><strong>Outside Dimensions:</strong> 2215<i>2000</i>2850, 2600<i>2100</i>2800, 2600<i>2100</i>3060</li><li><strong>Power Source:</strong> 3P380V AC 50HZ</li><li><strong>Net Weight of the machine:</strong> 4500, 5500, 6000</li></ul>', 'Enhance your spring manufacturing process with our Spring Grinding Machines, designed for precision grinding and smooth finishes. Ideal for achieving high-quality results, ensuring efficiency and consistency in spring production.', '67922d1141fef_26_23_11zon.png', 12, '2025-01-23 11:50:41'),
(58, 'Spring Grinding Machine', '<p><strong>Product:</strong> Spring Grinding Machine</p><p><strong>Model:</strong> AL-G180-6B, AL-G180-6B-S, AL-C250-9B, AL-C250-9B-S</p><p><strong>Specifications:</strong></p><ul><li><strong>Model:</strong> AL-G180-6B, AL-G180-6B-S, AL-C250-9B, AL-C250-9B-S</li><li><strong>Specification of Grinding Wheel:</strong> Ø400<i>55, Ø400</i>55<i>0203, Ø450</i>65, Ø450<i>65</i>050</li><li><strong>Diameter of feeding plate:</strong> 0580, 0420, 0740, 0580</li><li><strong>Diameter of the springs to be grinded:</strong> 00.8-06, 00.8-06, 01-09, 01-09</li><li><strong>OD of the springs to be grinded:</strong> 08-080, 08-080</li><li><strong>Height of the springs to be grinded:</strong> 10-180, 10-180, 20-250, 20-250</li><li><strong>Outside Dimensions:</strong> 2050<i>1660</i>2120, 2050<i>2060</i>2120, 2215<i>1900</i>2400, 2215<i>2265</i>2400</li><li><strong>Power Source:</strong> 3P380V AC 50HZ, 3P380V AC 50HZ, 3P380V AC 50HZ, 3P380V AC 50HZ</li><li><strong>Net Weight of the machine:</strong> 2200, 2500, 2800, 3500</li></ul>', 'Achieve precision and smooth finishes with our Spring Grinding Machines. Engineered for high efficiency and consistent quality, ideal for grinding springs to meet exact specifications in various industries.', '67922d9b3dce5_27_24_11zon.png', 12, '2025-01-23 11:52:59'),
(60, 'High Speed Full Protection Laser Cutting Machine', '<p><strong>Models:</strong></p><ul><li>LC-6025EPS</li><li>LC-8025EPS</li><li>LC-10025EPS</li><li>LC-12025EPS</li><li>LC-3015EPS</li><li>LC-4020EPS</li><li>LC-6015EPS</li><li>LC-6020EPS</li></ul><p><strong>Specifications:</strong></p><ul><li><strong>Working Area:</strong><ul><li>LC-6025EPS: 6050*2530mm</li><li>LC-8025EPS: 8050*2530mm</li><li>LC-10025EPS: 10050*2530mm</li><li>LC-12025EPS: 12050*2530mm</li><li>LC-3015EPS: 3050*1530mm</li><li>LC-4020EPS: 4050*2030mm</li><li>LC-6015EPS: 6050*1530mm</li><li>LC-6020EPS: 6050*2030mm</li></ul></li><li><strong>Power:</strong> 1000W/1500W/2000W/3000W/4000W/6000W/8000W/10000W/15000W/20000W/30000W</li><li><strong>Positioning Accuracy:</strong> ±0.03mm</li><li><strong>Repeated Positioning Accuracy:</strong> ±0.02mm</li><li><strong>Max. Moving Speed:</strong> 140m/min</li></ul>', 'Experience precision and speed with our High-Speed Full Protection Laser Cutting Machine. Designed for fast, accurate cutting with enhanced safety features, perfect for various industrial applications.', '67922efd3dbe7_30_26_11zon.png', 17, '2025-01-23 11:58:53'),
(62, 'WIRE BENDING MACHINE', '<p><strong>WB-3D908R</strong></p><p><strong>SPECIFICATION</strong></p><p><strong>Model:</strong> WB-3D908R</p><p><strong>Wire Diameter Range:</strong></p><ul><li>Soft Wire 600N/mm² (3.0mm-8.0mm)</li><li>Hard Wire 1900N/mm² (3.0mm-6.0mm)</li></ul><p><strong>Wire Feeding Servo Motor:</strong> 5.5KW <strong>Wire Rotary Servo Motor:</strong> 3.0KW <strong>Platform Lifting Servo Motor:</strong> 1.0KW <strong>Outter Bending Lifting Servo Motor:</strong> 1.0KW <strong>Inner Bending Lifting Servo Motor:</strong> 1.0KW <strong>Cutting Servo Motor:</strong> 2.0KW <strong>Inner Bending Servo Motor:</strong> 2.0KW <strong>Outter Bending Servo Motor:</strong> 2.0KW <strong>Left and Right Moving Servo Motor:</strong> 2.0KW <strong>Wire Feeding Accuracy:</strong> ±0.1mm <strong>Wire Feeding Roller Groups:</strong> 3 <strong>Wire Rotary Angle:</strong> 0°-360° <strong>Platform Lifting Range:</strong> +80mm -20mm <strong>Inner Bending Lifting Range:</strong> 0~+40mm <strong>Outter Bending Lifting Range:</strong> 0~+30mm <strong>Left and Right Moving Range:</strong> Left 40mm Right 40mm <strong>Dimensions:</strong> 3200<i>1950</i>1750mm <strong>Weight:</strong> ≈ 3500kgs</p><ul><li>Length checking system inside is optional</li><li>Cam, wire feeding Axes can work both separately &amp; synchronously</li></ul>', 'high-performance wire bending machines for precise and efficient wire forming. Perfect for various applications, these machines ensure accuracy and durability. Explore now!', '67923d6d7611a_3_1_11zon.png', 14, '2025-01-23 13:00:29'),
(63, 'Wire Bending Machine', '<p><strong>Model:</strong> WB-3D908R</p><p><strong>SPECIFICATION</strong></p><ul><li><strong>Model:</strong> WB-3D908R</li><li><strong>Wire Diameter Range:</strong><ul><li>Soft Wire 600N/mm² (3.0mm-8.0mm)</li><li>Hard Wire 1900N/mm² (3.0mm-6.0mm)</li></ul></li><li><strong>Wire Feeding Servo Motor:</strong> 5.5KW</li><li><strong>Wire Rotary Servo Motor:</strong> 3.0KW</li><li><strong>Platform Lifting Servo Motor:</strong> 1.0KW</li><li><strong>Outter Bending Lifting Servo Motor:</strong> 1.0KW</li><li><strong>Inner Bending Lifting Servo Motor:</strong> 1.0KW</li><li><strong>Cutting Servo Motor:</strong> 2.0KW</li><li><strong>Inner Bending Servo Motor:</strong> 2.0KW</li><li><strong>Outter Bending Servo Motor:</strong> 2.0KW</li><li><strong>Left and Right Moving Servo Motor:</strong> 2.0KW</li><li><strong>Wire Feeding Accuracy:</strong> ±0.1mm</li><li><strong>Wire Feeding Roller Groups:</strong> 3</li><li><strong>Wire Rotary Angle:</strong> 0°-360°</li><li><strong>Platform Lifting Range:</strong> +80mm -20mm</li><li><strong>Inner Bending Lifting Range:</strong> 0~+40mm</li><li><strong>Outter Bending Lifting Range:</strong> 0~+30mm</li><li><strong>Left and Right Moving Range:</strong> Left 40mm Right 40mm</li><li><strong>Dimensions:</strong> 3200<i>1950</i>1750mm</li><li><strong>Weight:</strong> ≈ 3500kgs</li></ul><p><strong>Additional Notes:</strong></p><ul><li>Length checking system inside is optional.</li><li>Cam, wire feeding Axes can work both separately &amp; synchronously.</li></ul>', 'high-performance wire bending machines for precise and efficient wire shaping. Ideal for industrial and manufacturing needs. Contact us today!', '679324700d861_3_2_11zon.png', 14, '2025-01-24 05:26:08'),
(64, 'Wire Bending Machine', '<p><strong>Model:</strong> WB-3D408R</p><p><strong>SPECIFICATION</strong></p><ul><li><strong>Soft Wire:</strong> 3.0-8.0mm</li><li><strong>Hard Wire:</strong> 3.0-5.0mm</li><li><strong>Axes:</strong> 3</li><li><strong>Bending Motor:</strong> 2.0kw</li><li><strong>Wire Feeding Motor:</strong> 2.7kw</li><li><strong>Head Rotary Motor:</strong> 2.0kw</li><li><strong>Air Compressor:</strong> 5-6kg/cm</li><li><strong>Dimensions(M):</strong> 2.4<i>1.4</i>1.7</li><li><strong>Weight:</strong> 1900kg</li></ul><p><strong>Additional Notes:</strong></p><ul><li>Head Rotary with 360 degree</li><li>800mm Big Working Area</li><li>Inner bending makes different R much easier</li><li>Wire straightener supports forward and backward motions</li></ul>', 'Explore top-quality wire bending machines for accurate and reliable wire shaping in various industries. Perfect for your manufacturing needs.', '679324d78d386_4_3_11zon.png', 14, '2025-01-24 05:27:51'),
(65, 'WIRE BENDING MACHINE', '<p><strong>Model:</strong> WB-3D413R, WB-3D416R</p><p><strong>SPECIFICATION</strong></p><ul><li><strong>Model:</strong> WB-3D413R, WB-3D416R</li><li><strong>Soft Wire:</strong> 4.0-13.0mm, 6.0-16.0mm</li><li><strong>Hard Wire:</strong> 4.0-8.0mm, 6.0-10.0mm</li><li><strong>Axes:</strong> 3</li><li><strong>Bending Motor:</strong> 4.5kw, 11kw</li><li><strong>Wire Feeding Motor:</strong> 4.5kw, 11kw</li><li><strong>Head Rotary Motor:</strong> 2.7kw, 11kw</li><li><strong>Air Compressor:</strong> 5-6kg/cm</li><li><strong>Dimensions(M):</strong> 2.9<i>1.7</i>1.8, 3.5<i>1.9</i>1.8</li><li><strong>Weight:</strong> 2400kg, 4000kg</li></ul><p><strong>Additional Notes:</strong></p><ul><li>Head Rotary with 360 degree</li><li>800mm Big Working Area</li><li>Inner bending makes different R much easier</li><li>Wire straightener supports forward and backward motions</li></ul>', 'Get efficient wire bending machines designed for precision and durability. Ideal for high-demand industrial applications.', '6793251c231b7_5_4_11zon.png', 14, '2025-01-24 05:29:00'),
(66, 'WIRE BENDING MACHINE', '<p><strong>Model:</strong> WB-2D206E, WB-2D208E, WB-2D210E, WB-2D212E</p><p><strong>SPECIFICATION</strong></p><ul><li><strong>Model:</strong> WB-2D206E, WB-2D208E, WB-2D210E, WB-2D212E</li><li><strong>Soft Wire:</strong> 2-6mm, 3-8mm, 4-10mm, 6-12mm</li><li><strong>Stainless Steel:</strong> 2-5mm, 3-6mm, 4-8mm, 6-10mm</li><li><strong>Rollers Groups:</strong> 3Groups, 3Groups, 5Groups, 5Groups</li><li><strong>Bending Accuracy:</strong> ±0.3mm, ±0.3mm, ±0.3mm, ±0.3mm</li><li><strong>Wire Feeding Accuracy:</strong> ±0.1mm, ±0.1mm, ±0.1mm, ±0.1mm</li><li><strong>Wire Feeding Servo Motor Power:</strong> 1.8kw, 2.4kw, 2.9kw, 7.5kw</li><li><strong>Wire Bending Servo Motor Power:</strong> 1.3kw, 1.8kw, 2.4kw, 2.4kw</li><li><strong>Cutting Servo Motor Power:</strong> 1.0kw, 1.0kw, 1.8kw, 2.4kw</li><li><strong>Inner bending Up &amp; Down Motor:</strong> 1.0kw</li><li><strong>Voltage:</strong> 3P380V, 3P380V, 3P380V, 3P380V</li><li><strong>Dimension:</strong> 2500<i>1200</i>1600mm, 2500<i>1200</i>1600mm, 3000<i>1200</i>1600mm, 3000<i>1200</i>1600mm</li><li><strong>Weight:</strong> 700kg, 700kg, 750kg, 750kg</li></ul>', 'Find advanced wire bending machines that ensure high precision and smooth performance for all your bending requirements.', '6793257ceaee4_6_5_11zon.png', 14, '2025-01-24 05:30:36'),
(67, 'Spring Forming Machine', '<p><strong>Model:</strong> WF-20, WF-35</p><p><strong>SPECIFICATION</strong></p><ul><li><strong>Model:</strong> WF-20, WF-35</li><li><strong>Wire Diameter:</strong> 0.3-2.5mm, 0.8-3.5mm</li><li><strong>Axis:</strong> 3-4, 3-4</li><li><strong>Max.Wire Feed Value:</strong> 9999.99mm, 9999.99mm</li><li><strong>Min.Wire Feed Value:</strong> 0.01mm, 0.01mm</li><li><strong>Rotary Quill Axis:</strong> 1.0KW, 1.0KW</li><li><strong>Cam Axis:</strong> 2.7KW, 5.5KW</li><li><strong>Wire Feeding Axis:</strong> 2.7KW, 5.5KW</li><li><strong>Spinner Axis(Optional):</strong> 0.4 KW, 1.0KW</li><li><strong>Air Compressor:</strong> 5-6kg/cm, 5-6kg/cm</li><li><strong>Probe:</strong> 4pcs, 4pcs</li><li><strong>Dimension(M):</strong> 1.4<i>0.7</i>1.6, 1.5<i>0.9</i>1.7</li><li><strong>Weight(KG):</strong> 750KG, 1500KG</li></ul><p><strong>Additional Notes:</strong></p><ul><li>WF-20/WF-35</li><li>Individual servo slides for easy setup and adjustment</li><li>Quick-release wire straighteners</li><li>Fast and stable wire feed box</li></ul>', 'high-quality Spring Forming Machines for precise wire shaping and customization. Enhance your production with reliable, efficient solutions.', '6793269e12250_12_9_11zon.png', 15, '2025-01-24 05:35:26'),
(68, 'Spring Forming Machine', '<p><strong>Model:</strong> WF-525R, WF-538R</p><p><strong>SPECIFICATION</strong></p><ul><li><strong>Model:</strong> WF-525R, WF-538R</li><li><strong>Wire Diameter:</strong> 0.5-2.5mm, 1.0-3.8mm</li><li><strong>Axis:</strong> 5-6, 5-6</li><li><strong>Max.Wire Feed Value:</strong> 9999.99mm, 9999.99mm</li><li><strong>Min.Wire Feed Value:</strong> 0.01mm, 0.01mm</li><li><strong>Wire Feed Rollers Groups:</strong> 3 Sets, 3 Sets</li><li><strong>Max.Wire Feed Speed:</strong> 100m/min, 80m/min</li><li><strong>Rotary Quill Axis:</strong> 0.4KW, 0.75KW</li><li><strong>Wire Rotary Axis:</strong> 2.0KW, 2.7KW</li><li><strong>Cam Axis:</strong> 2.7KW, 4.5KW</li><li><strong>Wire Feeding Axis:</strong> 2.7KW, 5.5KW</li><li><strong>Spinner Axis(Optional):</strong> 0.4KW, 1.0KW</li><li><strong>Air Compressor:</strong> 5-6kg/cm, 5-6kg/cm</li><li><strong>Probe:</strong> 4pcs, 4pcs</li><li><strong>Dimension(M):</strong> 1.3<i>1.1</i>1.7, 1.6<i>1.3</i>1.9</li><li><strong>Weight(KG):</strong> 1500KG, 2500KG</li></ul><p><strong>Additional Notes:</strong></p><ul><li>WF-525R/538R</li><li>Quick-release wire straighteners</li><li>Fast and stable rotary wire feed box</li><li>Economical for high-volume production</li></ul>', 'Upgrade your manufacturing with advanced Spring Forming Machines for accurate wire bending and shaping. Boost productivity today.', '679326fdea433_13_10_11zon.png', 15, '2025-01-24 05:37:01'),
(69, 'Spring Forming Machine', '<p><strong>Model:</strong> WF-1025</p><p><strong>SPECIFICATION</strong></p><ul><li><strong>Model:</strong> WF-1025</li><li><strong>Wire Diameter:</strong> 0.5 - 2.5 mm</li><li><strong>Axis:</strong> 10-11</li><li><strong>Max.Wire Feed Value:</strong> 9999.99 mm</li><li><strong>Min.Wire Feed Value:</strong> 0.01 mm</li><li><strong>Max.Wire Feed Speed:</strong> 100,000 mm/min</li><li><strong>Slide Axis (with brake):</strong> 7*0.75 kw</li><li><strong>Rotary Quill Axis:</strong> 1*0.4 kw</li><li><strong>Wire Feeding Axis:</strong> 12.7 KW</li><li><strong>Spinner Axis(Optional):</strong> 0.4 KW</li><li><strong>Free Arm Axis (Optional):</strong> 0.4 KW</li><li><strong>Air Compressor:</strong> 5-6kg/cm</li><li><strong>Probe:</strong> 4pcs</li><li><strong>Dimension(M):</strong> 1.4<i>1.1</i>1.7</li><li><strong>Weight(KG):</strong> 1100KG</li></ul><p><strong>Additional Notes:</strong></p><ul><li>WF-1025R</li><li>Individual servo slides for easy setup and adjustment</li><li>Quick-release wire straighteners</li><li>Fast and stable wire feed box</li></ul>', 'Achieve precision with Spring Forming Machines designed for custom wire forms. Reliable, durable, and efficient solutions for your business.', '67932768d9c7a_14_11_11zon.png', 15, '2025-01-24 05:38:48'),
(70, 'Spring Forming Machine', '<p><strong>Model:</strong> WF-1225R</p><p><strong>SPECIFICATION</strong></p><ul><li><strong>Model:</strong> WF-1225R</li><li><strong>Wire Diameter:</strong> 0.5-2.5mm</li><li><strong>Axis:</strong> 12-14</li><li><strong>Max.Wire Feed Value:</strong> 9999.99 mm</li><li><strong>Min.Wire Feed Value:</strong> 0.01mm</li><li><strong>Max.Wire Feed Speed:</strong> 100,000 mm/min</li><li><strong>Slide Axis (with brake):</strong> 8*1.2KW</li><li><strong>Rotary Quill Axis:</strong> 1*0.4KW</li><li><strong>Wire Rotary Axis:</strong> 1*2.0KW</li><li><strong>Wire Feeding Axis:</strong> 1*2.7KW</li><li><strong>Spinner Axis(Optional):</strong> 0.4KW</li><li><strong>Free Arm Axis (Optional):</strong> 0.4KW</li><li><strong>Air Compressor:</strong> 5-6kg/cm</li><li><strong>Probe:</strong> 4pcs</li><li><strong>Dimension(M):</strong> 1.7<i>1.5</i>1.7</li><li><strong>Weight(KG):</strong> 1500kg</li></ul><p><strong>Additional Notes:</strong></p><ul><li>WF-1225R</li><li>Individual servo slides for easy setup and adjustment</li><li>Quick-release wire straighteners</li><li>Fast and stable rotary wire feed box</li><li>Quill forward and backward is optional.</li></ul>', 'Maximize efficiency with top-tier Spring Forming Machines. Perfect for creating custom wire shapes with precision and speed.', '679327b7680af_15_12_11zon.png', 15, '2025-01-24 05:40:07'),
(71, 'Spring Forming Machine', '<p><strong>Model:</strong> WF-1245R</p><p><strong>SPECIFICATION</strong></p><ul><li><strong>Model:</strong> WF-1245R</li><li><strong>Wire Diameter:</strong> 1.0-4.5 mm</li><li><strong>Axis:</strong> 12-14</li><li><strong>Max.Wire Feed Value:</strong> 9999.99 mm</li><li><strong>Min.Wire Feed Value:</strong> 0.01 mm</li><li><strong>Max.Wire Feed Speed:</strong> 80000 mm/min</li><li><strong>Slide Axis (with brake):</strong> 8*2.0 kw</li><li><strong>Rotary Quill Axis:</strong> 1*1.0 kw</li><li><strong>Wire Rotary Axis:</strong> 1*2.7 kw</li><li><strong>Wire Feeding Axis:</strong> 1*7.5 kw</li><li><strong>Spinner Axis(Optional):</strong> 1.0 kw</li><li><strong>Free Arm Axis (Optional):</strong> 1.0 kw</li><li><strong>Air Compressor:</strong> 5-6 kg/cm</li><li><strong>Probe:</strong> 4 pcs</li><li><strong>Dimension(M):</strong> 2.2<i>2.0</i>2.1</li><li><strong>Weight(KG):</strong> 3000kg</li></ul><p><strong>Additional Notes:</strong></p><ul><li>Individual servo slides for easy setup and adjustment</li><li>Quick-release wire straighteners</li><li>Fast and stable rotary wire feed box</li><li>Quill forward and backward is optional.</li></ul>', 'Get superior wire bending and forming with Spring Forming Machines. Perfect for custom production needs, ensuring high-quality output.', '679328379645e_16_13_11zon.png', 15, '2025-01-24 05:42:15'),
(72, 'Spring Forming Machine', '<p><strong>Model:</strong> WF-1265R, WF-1280R</p><p><strong>SPECIFICATION</strong></p><ul><li><strong>Model:</strong> WF-1265R, WF-1280R</li><li><strong>Wire Diameter:</strong> 2.5-6.5 mm, 4.0-8.0 mm</li><li><strong>Axis:</strong> 12-14, 12-14</li><li><strong>Max.Wire Feed Value:</strong> 9999.99 mm, 9999.99 mm</li><li><strong>Min.Wire Feed Value:</strong> 0.01 mm, 0.01 mm</li><li><strong>Max.Wire Feed Speed:</strong> 30000 mm/min, 30000 mm/min</li><li><strong>Slide Axis (with brake):</strong> 8<i>1.45 kw, 8</i>1.55 kw</li><li><strong>Rotary Quill Axis:</strong> 1<i>1.2 kw, 1</i>2.0 kw</li><li><strong>Wire Rotary Axis:</strong> 1<i>4.5 kw, 1</i>7.5 kw</li><li><strong>Wire Feeding Axis:</strong> 1<i>15 kw, 1</i>20 kw</li><li><strong>Spinner Axis(Optional):</strong> 2.7 kw, 4.5 kw</li><li><strong>Air Compressor:</strong> 5-6 kg/cm, 5-6 kg/cm</li><li><strong>Probe:</strong> 4 pcs, 4 pcs</li><li><strong>Dimension(M):</strong> 3.6<i>2.1</i>2.1, 4.1<i>2.2</i>2.4</li><li><strong>Weight(KG):</strong> 6500kg, 8000kg</li></ul><p><strong>Additional Notes:</strong></p><ul><li>Individual servo slides for easy setup and adjustment</li><li>Quick-release wire straighteners</li><li>Fast and stable rotary wire feed box</li><li>Quill forward and backward is optional.</li></ul>', 'Enhance your production line with Spring Forming Machines. Reliable, fast, and designed for precise wire forming in various industries.', '6793288beaac1_17_14_11zon.png', 15, '2025-01-24 05:43:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `machines`
--
ALTER TABLE `machines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `machines`
--
ALTER TABLE `machines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `machines`
--
ALTER TABLE `machines`
  ADD CONSTRAINT `machines_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
