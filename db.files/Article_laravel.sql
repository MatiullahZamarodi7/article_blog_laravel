-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 20, 2026 at 07:55 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Article_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL DEFAULT 'ahmasd',
  `content` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `slug`, `content`, `image`, `user_id`, `category_id`, `created_at`, `updated_at`) VALUES
(10, 'در مورد هک امینت', 'در مورد هک امینت', 'صفحه اصلی\r\nمقالات من\r\nدرباره ما\r\nتماس با ما\r\nعکس کاربر\r\nmatiullah\r\nنویسنده\r\n\r\n✏️\r\nایجاد مقاله جدید\r\nاطلاعات مقاله را در فرم زیر وارد کنید\r\n\r\n📝 عنوان مقاله * \r\nدر مورد هک امینت\r\n📁 دسته‌بندی * \r\nامنیت\r\n📝 عنوان مقاله * girl.jpg\r\n📄 محتوای مقاله * \r\nمتن مقاله خود را بنویسید...\r\nاز فرمت‌های HTML ساده می‌توانید استفاده کنید', '1781847147.png', 32, 4, '2026-06-18 07:33:55', '2026-06-19 01:02:27'),
(11, 'لارایویل', 'لارایول', 'فحه اصلی\r\nمقالات من\r\nدرباره ما\r\nتماس با ما\r\nعکس کاربر\r\nzamarodi\r\nنویسنده\r\n\r\n✏️\r\nایجاد مقاله جدید\r\nاطلاعات مقاله را در فرم زیر وارد کنید\r\n\r\n📝 عنوان مقاله * \r\nلارایول\r\n📁 دسته‌بندی * \r\nبرنامه‌نویسی\r\n📝 عنوان مقاله * 6bb1f0c8ba74334e533a804a799c264a.jpg\r\n📄 محتوای مقاله * \r\nمتن مقاله خود را بنویسید...\r\nاز فرمت‌های HTML ساده می‌توانید استفاده کنید', '1781847122.jpg', 33, 1, '2026-06-18 08:48:49', '2026-06-19 01:02:02'),
(12, 'ساخت سایت اموزشی', 'ساخت سایت اموزشی', 'صفحه اصلی\r\nمقالات من\r\nدرباره ما\r\nتماس با ما\r\nعکس کاربر\r\nzamarodi\r\nنویسنده\r\n\r\n✏️\r\nایجاد مقاله جدید\r\nاطلاعات مقاله را در فرم زیر وارد کنید\r\n\r\n📝 عنوان مقاله * \r\nساخت سایت اموزشی\r\n📁 دسته‌بندی * \r\nطراحی وب\r\n📝 عنوان مقاله * 1754830940562.jpg\r\n📄 محتوای مقاله * \r\nمتن مقاله خود را بنویسید...\r\nاز فرمت‌های HTML ساده می‌توانید استفاده کنید', '1781848054.jpg', 33, 2, '2026-06-19 01:17:34', '2026-06-19 01:17:34'),
(13, 'هوش مصنوعی در افغانستان', 'هوش مصنوعی در افغانستان', '✏️\r\nایجاد مقاله جدید\r\nاطلاعات مقاله را در فرم زیر وارد کنید\r\n\r\n📝 عنوان مقاله * \r\nهوش مصنوعی در افغانستان\r\n📁 دسته‌بندی * \r\nهوش مصنوعی\r\n📝 عنوان مقاله * FB_IMG_1754712504331.jpg\r\n📄 محتوای مقاله * \r\nمتن مقاله خود را بنویسید...\r\nاز فرمت‌های HTML ساده می‌توانید استفاده ک', '1781851027.jpg', 33, 3, '2026-06-19 02:06:03', '2026-06-19 02:07:07'),
(14, 'java script', 'java script', 'مقالات من\r\nدرباره ما\r\nتماس با ما\r\nعکس کاربر\r\nAdmin\r\nنویسنده\r\n\r\n✏️\r\nایجاد مقاله جدید\r\nاطلاعات مقاله را در فرم زیر وارد کنید\r\n\r\n📝 عنوان مقاله * \r\njava script\r\n📁 دسته‌بندی * \r\nبرنامه‌نویسی\r\n📝 عنوان مقاله * 1743683022414.jpg\r\n📄 محتوای مقاله * \r\nمتن مقاله خود را بنویسید...\r\nاز فرمت‌های HTML ساده می‌توانید استفاده کنید', '1781852110.jpg', 34, 1, '2026-06-19 02:25:10', '2026-06-19 02:25:10'),
(15, 'hack', 'hack', 'مقالات من\r\nدرباره ما\r\nتماس با ما\r\nعکس کاربر\r\nnazari\r\nنویسنده\r\n\r\n✏️\r\nایجاد مقاله جدید\r\nاطلاعات مقاله را در فرم زیر وارد کنید\r\n\r\n📝 عنوان مقاله * \r\nhack\r\n📁 دسته‌بندی * \r\nامنیت\r\n📝 عنوان مقاله * 1748947526679 - Copy.jpg\r\n📄 محتوای مقاله * \r\nمتن مقاله خود را بنویسید...\r\nاز فرمت‌های HTML ساده می‌توانید استفاده کنید', '1781880259.jpg', 35, 4, '2026-06-19 10:14:19', '2026-06-19 10:14:19'),
(16, 'اطلاعات امنیت', 'اطلاعات امنیت', 'الات من\r\nدرباره ما\r\nتماس با ما\r\nعکس کاربر\r\nAdmin\r\nنویسنده\r\n\r\n✏️\r\nایجاد مقاله جدید\r\nاطلاعات مقاله را در فرم زیر وارد کنید\r\n\r\n📝 عنوان مقاله * \r\nاطلاعات امنیت\r\n📁 دسته‌بندی * \r\nپایگاه داده\r\n📝 عنوان مقاله * 1744341400836.jpg\r\n📄 محتوای مقاله * \r\nمتن مقاله خود را بنویسید...\r\nاز فرمت‌های HTML ساده می‌توانید استفاده کنید', '1781941319.jpg', 34, 5, '2026-06-20 03:11:59', '2026-06-20 03:11:59');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `called_for_us`
--

CREATE TABLE `called_for_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `descriptions` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `called_for_us`
--

INSERT INTO `called_for_us` (`id`, `name`, `email`, `title`, `descriptions`, `created_at`, `updated_at`, `user_id`) VALUES
(5, 'Admin', 'admin@gmail.com', 'fdsdsfdsa', 'ی\r\nمقالات من\r\nدرباره ما\r\nتماس با ما\r\nعکس کاربر\r\nAdmin\r\nنویسنده\r\n📞 تماس با ما\r\nخوشحال می‌شویم نظرات و پیشنهادات شما را بشنویم\r\n\r\nنام و نام خانوادگی\r\nAdmin\r\nایمیل\r\nadmin@gmail.com\r\nموضوع\r\nfdsdsfdsa\r\nپیام شما\r\nمتن پیام خود را بنویسید...\r\nلطفاً پیام خود را بنویسید (حداقل ۱۰ کاراکتر)\r\nارسال پیام\r\n📱\r\n۰۹۱۲-۱۲۳-۴۵۶۷\r\n✉️\r\ninfo@example.com\r\n📍\r\nتهران، خیابان آزادی، پلاک ۱۲۳\r\nلورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است\r\n\r\nلینک های سریع\r\nصفحه اصلی\r\nمقالات\r\nدرباره ما\r\nتماس با ما\r\nعضویت در خبرنامه\r\nثبت نام کنید و آخرین نکات را از طریق ایمیل دریافت کنید ، جهت ثبت نام فقط کافی ست که آدرس ایمیل را در کادر زیر وارد نمایید\r\n\r\nآدرس ایمیل', '2026-06-20 07:58:59', '2026-06-20 07:58:59', 34),
(6, 'Admin', 'admin@gmail.com', 'کار کردن با شما', 'صفحه اصلی\r\nمقالات من\r\nدرباره ما\r\nتماس با ما\r\nعکس کاربر\r\nAdmin\r\nنویسنده\r\n📞 تماس با ما\r\nخوشحال می‌شویم نظرات و پیشنهادات شما را بشنویم\r\n\r\nنام و نام خانوادگی\r\nAdmin\r\nایمیل\r\nadmin@gmail.com\r\nموضوع\r\nکار کردن با شما\r\nپیام شما\r\nمتن پیام خود را بنویسید...\r\nارسال پیام\r\n📱\r\n۰۹۱۲-۱۲۳-۴۵۶۷\r\n✉️\r\ninfo@example.com\r\n📍\r\nتهران، خیابان آزادی، پلاک ۱۲۳\r\nلورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است\r\n\r\nلینک های سریع\r\nصفحه اصلی\r\nمقالات\r\nدرباره ما\r\nتماس با ما\r\nعضویت در خبرنامه\r\nثبت نام کنید و آخرین نکات را از طریق ایمیل دریافت کنید ، جهت ثبت نام فقط کافی ست که آدرس ایمیل را در کادر زیر وارد نمایید\r\n\r\nآدرس ایمیل', '2026-06-20 08:09:28', '2026-06-20 08:09:28', 34),
(7, 'rafiullah', 'rafiullah@gmail.com', 'باید پوهنتون بند شود', 'من\r\nدرباره ما\r\nتماس با ما\r\nعکس کاربر\r\nrafiullah\r\nنویسنده\r\n📞 تماس با ما\r\nخوشحال می‌شویم نظرات و پیشنهادات شما را بشنویم\r\n\r\nنام و نام خانوادگی\r\nrafiullah\r\nایمیل\r\nrafiullah@gmail.com\r\nموضوع\r\nباید پوهنتون بند شود\r\nپیام شما\r\nمتن پیام خود را بنویسید...\r\nارسال پیام\r\n📱\r\n۰۹۱۲-۱۲۳-۴۵۶۷\r\n✉️\r\ninfo@example.com\r\n📍\r\nتهران، خیابان آزادی، پلاک ۱۲۳\r\nلورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است\r\n\r\nلینک های سریع\r\nصفحه اصلی\r\nمقالات\r\nدرباره ما\r\nتماس با ما\r\nعضویت در خبرنامه\r\nثبت نام کنید و آخرین نکات را از طریق ایمیل دریافت کنید ، جهت ثبت نام فقط کافی ست که آدرس ایمیل را در کادر زیر وارد نمایید\r\n\r\nآدرس ایمیل', '2026-06-20 08:40:09', '2026-06-20 08:40:09', 33),
(8, 'rafiullah', 'rafiullah@gmail.com', 'کورس ها باید بند شود', 'عکس کاربر\r\nrafiullah\r\nنویسنده\r\n📞 تماس با ما\r\nخوشحال می‌شویم نظرات و پیشنهادات شما را بشنویم\r\n\r\nنام و نام خانوادگی\r\nrafiullah\r\nایمیل\r\nrafiullah@gmail.com\r\nموضوع\r\nکورس ها باید بند شود\r\nپیام شما\r\nمتن پیام خود را بنویسید...\r\nارسال پیام\r\n📱\r\n۰۹۱۲-۱۲۳-۴۵۶۷\r\n✉️\r\ninfo@example.com\r\n📍\r\nتهران، خیابان آزادی، پلاک ۱۲۳\r\nلورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است', '2026-06-20 08:44:12', '2026-06-20 11:58:52', 33),
(9, 'rafiullah', 'rafiullah@gmail.com', 'موضوع', 'لبسشب\r\n📞 تماس با ما\r\nخوشحال می‌شویم نظرات و پیشنهادات شما را بشنویم\r\n\r\nنام و نام خانوادگی\r\nrafiullah\r\nایمیل\r\nrafiullah@gmail.com\r\nموضوع\r\nموضوع\r\nپیام شما\r\nلبسشب\r\nلطفاً پیام خود را بنویسید (حداقل ۱۰ کاراکتر)\r\nارسال پیام\r\n📱\r\n۰۹۱۲-۱۲۳-۴۵۶۷\r\n✉️\r\ninfo@example.com\r\n📍\r\nتهران، خیابان آزادی، پلاک ۱۲۳\r\nلورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است لورم ایپسوم متن ساختگی با تولید سادگی', '2026-06-20 08:45:16', '2026-06-20 08:45:16', 33);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'برنامه‌نویسی', 'برنامه‌نویسی', NULL, NULL),
(2, 'طراحی وب', 'طراحی وب', NULL, NULL),
(3, 'هوش مصنوعی', 'هوش مصنوعی', NULL, NULL),
(4, 'امنیت', 'امنیت', NULL, NULL),
(5, 'پایگاه داده', 'پایگاه داده', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` varchar(255) NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` smallint(5) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_06_14_173047_create_categories_table', 1),
(5, '2026_06_14_173059_create_articles_table', 1),
(7, '2026_06_20_081320_add_about_to_users_table', 2),
(8, '2026_06_20_114257_create_called_for_us_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('IpBta454O402PuVOGct4vleQcsQ8EHVn6yFiT7bO', 33, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJmenpPNEY3MEpwMWl6R0hIRXhQT2RHZVNXNXRIRnZFdGRmQ2w5anlsIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9zaW5nbGVQYWdlXC8xNSIsInJvdXRlIjoic2luZ2xlUGFnZSJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjozM30=', 1781973423),
('w0TOqZGr5vNtW3GS1h1aW0y3C3onZSGputE5jzm6', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.121.0 Chrome/142.0.7444.265 Electron/39.8.8 Safari/537.36', 'eyJfdG9rZW4iOiJDVnBEeUdUSG1vdkRmNWpuOWZLU0ZFVGIwb1RHcHdZWHpnbjFlTm9PIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwIiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1781969736);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `about` text DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `about`, `email`, `password`, `role`, `image`, `created_at`, `updated_at`) VALUES
(27, 'Noemy Feest', 'اگر در زمان طراحی از متون معنادار (مثل اخبار یا مقالات) استفاده شود، چشم بیننده ناخودآگاه به سمت خواندن مطالب جلب می‌گردد و از ارزیابی کیفیت طراحی، فونت‌ها و رنگ‌ها غافل می‌شود. لورم ایپسوم با توضیح نرمال حروف، ظاهری کاملاً طبیعی به پاراگراف‌ها می‌دهد بدون اینکه ذهن را درگیر متن کند.', 'ykreiger@example.com', '$2y$12$cDaSdPSXfkGaELUS02fyVuV4MHeiQEUrreGdq6tHRXJ6Dkui5VpY.', 'user', NULL, '2026-06-16 08:58:21', '2026-06-16 08:58:21'),
(28, 'Tressa Nicolas', 'اگر در زمان طراحی از متون معنادار (مثل اخبار یا مقالات) استفاده شود، چشم بیننده ناخودآگاه به سمت خواندن مطالب جلب می‌گردد و از ارزیابی کیفیت طراحی، فونت‌ها و رنگ‌ها غافل می‌شود. لورم ایپسوم با توضیح نرمال حروف، ظاهری کاملاً طبیعی به پاراگراف‌ها می‌دهد بدون اینکه ذهن را درگیر متن کند.', 'kaela16@example.org', '$2y$12$cDaSdPSXfkGaELUS02fyVuV4MHeiQEUrreGdq6tHRXJ6Dkui5VpY.', 'user', NULL, '2026-06-16 08:58:21', '2026-06-16 08:58:21'),
(29, 'Florida Kreiger', 'اگر در زمان طراحی از متون معنادار (مثل اخبار یا مقالات) استفاده شود، چشم بیننده ناخودآگاه به سمت خواندن مطالب جلب می‌گردد و از ارزیابی کیفیت طراحی، فونت‌ها و رنگ‌ها غافل می‌شود. لورم ایپسوم با توضیح نرمال حروف، ظاهری کاملاً طبیعی به پاراگراف‌ها می‌دهد بدون اینکه ذهن را درگیر متن کند.', 'travon.schoen@example.org', '$2y$12$cDaSdPSXfkGaELUS02fyVuV4MHeiQEUrreGdq6tHRXJ6Dkui5VpY.', 'user', NULL, '2026-06-16 08:58:21', '2026-06-16 08:58:21'),
(30, 'Mckayla Runolfsson', 'اگر در زمان طراحی از متون معنادار (مثل اخبار یا مقالات) استفاده شود، چشم بیننده ناخودآگاه به سمت خواندن مطالب جلب می‌گردد و از ارزیابی کیفیت طراحی، فونت‌ها و رنگ‌ها غافل می‌شود. لورم ایپسوم با توضیح نرمال حروف، ظاهری کاملاً طبیعی به پاراگراف‌ها می‌دهد بدون اینکه ذهن را درگیر متن کند.', 'vonrueden.karley@example.com', '$2y$12$cDaSdPSXfkGaELUS02fyVuV4MHeiQEUrreGdq6tHRXJ6Dkui5VpY.', 'user', NULL, '2026-06-16 08:58:21', '2026-06-16 08:58:21'),
(32, 'matiullah zamarodi', 'اگر در زمان طراحی از متون معنادار (مثل اخبار یا مقالات) استفاده شود، چشم بیننده ناخودآگاه به سمت خواندن مطالب جلب می‌گردد و از ارزیابی کیفیت طراحی، فونت‌ها و رنگ‌ها غافل می‌شود. لورم ایپسوم با توضیح نرمال حروف، ظاهری کاملاً طبیعی به پاراگراف‌ها می‌دهد بدون اینکه ذهن را درگیر متن کند.', 'matiullahzamarodi@gmail.com', '$2y$12$0Ai7TAKUJgu1xTB6Bv37uemmeZF/2NcezBm.IZBiH4ZT9g5T.LlVS', 'user', '1781852203.jpg', '2026-06-18 07:21:31', '2026-06-19 02:26:44'),
(33, 'rafiullah', 'اگر در زمان طراحی از متون معنادار (مثل اخبار یا مقالات) استفاده شود، چشم بیننده ناخودآگاه به سمت خواندن مطالب جلب می‌گردد و از ارزیابی کیفیت طراحی، فونت‌ها و رنگ‌ها غافل می‌شود. لورم ایپسوم با توضیح نرمال حروف، ظاهری کاملاً طبیعی به پاراگراف‌ها می‌دهد بدون اینکه ذهن را درگیر متن کند.', 'rafiullah@gmail.com', '$2y$12$BVo6JmvC0Ii.wVVPowBl6.E6wkLl1GU0hzCn9Fi1R4/RczAuXRIgm', 'admin', '1781852348.jpg', '2026-06-18 08:47:32', '2026-06-19 02:29:09'),
(34, 'Admin', 'اگر در زمان طراحی از متون معنادار (مثل اخبار یا مقالات) استفاده شود، چشم بیننده ناخودآگاه به سمت خواندن مطالب جلب می‌گردد و از ارزیابی کیفیت طراحی، فونت‌ها و رنگ‌ها غافل می‌شود. لورم ایپسوم با توضیح نرمال حروف، ظاهری کاملاً طبیعی به پاراگراف‌ها می‌دهد بدون اینکه ذهن را درگیر متن کند.', 'admin@gmail.com', '$2y$12$jqlCsQyHKIAv1LDo/REssuqpGyW2P.dW1tgCcZB8HPxoAvnVpTnAy', 'admin', '1781852045.jpg', '2026-06-19 02:24:05', '2026-06-19 02:24:05'),
(35, 'nazari', 'اگر در زمان طراحی از متون معنادار (مثل اخبار یا مقالات) استفاده شود، چشم بیننده ناخودآگاه به سمت خواندن مطالب جلب می‌گردد و از ارزیابی کیفیت طراحی، فونت‌ها و رنگ‌ها غافل می‌شود. لورم ایپسوم با توضیح نرمال حروف، ظاهری کاملاً طبیعی به پاراگراف‌ها می‌دهد بدون اینکه ذهن را درگیر متن کند.', 'nazari@gmail.com', '$2y$12$1q2ABLr.XyN5qf2zaYQ8he64xwlGNtvr0dFe0feEzhDCs.YMlwJpa', 'admin', '1781880195.jpg', '2026-06-19 10:13:16', '2026-06-19 10:13:16'),
(36, 'azad', 'ویرایش پروفایل  اطلاعات خود را به‌روز کنید  نام کامل azad در مورد خود azad  در مورد خود آدرس ایمیل ••••• تکرار کلمه عبور No file chosen ایا اکانت دارین؟ورود با اکانت آدرس ایمیل azad1@gmail.com validation.unique رمز عبور ••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••  برای تغییر، رمز جدید وارد کنید اطلاعات با موفقیت به‌روز شد!', 'azad1@gmail.com', '$2y$12$nLdJGUdDLrXsU8oiOVi43uQzrrsxuYM5ZZocjJnEDW0wy0MuRjOni', 'user', '1781944726.jpg', '2026-06-20 04:03:38', '2026-06-20 04:08:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `articles_slug_unique` (`slug`),
  ADD KEY `articles_user_id_foreign` (`user_id`),
  ADD KEY `articles_category_id_foreign` (`category_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `called_for_us`
--
ALTER TABLE `called_for_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  ADD KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `called_for_us`
--
ALTER TABLE `called_for_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `articles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
