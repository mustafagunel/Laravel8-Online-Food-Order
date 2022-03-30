-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 30 Mar 2022, 20:46:59
-- Sunucu sürümü: 10.4.18-MariaDB
-- PHP Sürümü: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `database3`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `category`
--

INSERT INTO `category` (`id`, `title`, `keywords`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'İçecek', 'içecek', 'içecek kategori açıklama', NULL, 1, NULL, NULL),
(2, 'Yiyecek', 'Yiyecek', 'Yiyecek kategori açıklama', NULL, 1, NULL, NULL),
(3, 'Tatlı', 'tatlı', 'Tatlı kategori açıklama', NULL, 1, NULL, NULL),
(4, 'Menü', 'menü', 'Menü kategori açıklama', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `city`
--

INSERT INTO `city` (`id`, `name`) VALUES
(0, 'null'),
(1, 'adana'),
(2, 'adıyaman'),
(3, 'afyon'),
(4, 'ağrı'),
(5, 'amasya'),
(6, 'ankara'),
(7, 'antalya'),
(8, 'artvin'),
(9, 'aydın'),
(10, 'balıkesir'),
(11, 'bilecik'),
(12, 'bingöl'),
(13, 'bitlis'),
(14, 'bolu'),
(15, 'burdur'),
(16, 'bursa'),
(17, 'çanakkale'),
(18, 'çankırı'),
(19, 'çorum'),
(20, 'denizli'),
(21, 'diyarbakır'),
(22, 'edirne'),
(23, 'elazığ'),
(24, 'erzincan'),
(25, 'erzurum'),
(26, 'eskişehir'),
(27, 'gaziantep'),
(28, 'giresun'),
(29, 'gümüşhane'),
(30, 'hakkari'),
(31, 'hatay'),
(32, 'ısparta'),
(33, 'içel'),
(34, 'istanbul'),
(35, 'izmir'),
(36, 'kars'),
(37, 'kastamonu'),
(38, 'kayseri'),
(39, 'kırklareli'),
(40, 'kırşehir'),
(41, 'kocaeli'),
(42, 'konya'),
(43, 'kütahya'),
(44, 'malatya'),
(45, 'manisa'),
(46, 'kahramanmaraş'),
(47, 'mardin'),
(48, 'muğla'),
(49, 'muş'),
(50, 'nevşehir'),
(51, 'niğde'),
(52, 'ordu'),
(53, 'rize'),
(54, 'sakarya'),
(55, 'samsun'),
(56, 'siirt'),
(57, 'sinop'),
(58, 'sivas'),
(59, 'tekirdağ'),
(60, 'tokat'),
(61, 'trabzon'),
(62, 'tunceli'),
(63, 'şanlıurfa'),
(64, 'uşak'),
(65, 'van'),
(66, 'yozgat'),
(67, 'zonguldak'),
(68, 'aksaray'),
(69, 'bayburt'),
(70, 'karaman'),
(71, 'kırıkkale'),
(72, 'batman'),
(73, 'şırnak'),
(74, 'bartın'),
(75, 'ardahan'),
(76, 'ığdır'),
(77, 'yalova'),
(78, 'karabük'),
(79, 'kilis'),
(80, 'osmaniye'),
(81, 'düzce');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_12_28_233956_create_sessions_table', 1),
(7, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(8, '2021_11_21_124055_create_users_table', 1),
(9, '2021_11_21_142215_create_settings_table', 1),
(10, '2021_11_26_155422_create_restaurant', 2),
(11, '2021_11_30_192651_create_category', 3),
(12, '2021_11_30_192651_create_product', 4),
(13, '2021_12_16_191715_create_orders', 5),
(14, '2021_12_16_192909_create_orders_products', 6);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `address` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int(11) NOT NULL,
  `status` enum('preparing','complated','canceled','') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'preparing',
  `payment_type` enum('credit-cart','cash','','') COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orderPoint` int(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `restaurant_id`, `address`, `total`, `status`, `payment_type`, `note`, `ip`, `orderPoint`, `created_at`, `updated_at`) VALUES
(3, 40, 28, 'Yenişehir mah.', 74, 'complated', 'cash', 'note', '127.0.0.1', 0, '2021-12-30 17:07:15', '2021-12-30 17:07:15'),
(4, 40, 27, 'Yenişehir mah.', 25, 'complated', 'cash', 'note', '127.0.0.1', 3, '2022-01-06 09:59:45', '2022-01-06 09:59:45'),
(5, 40, 28, 'Yenişehir mah.', 104, 'complated', 'cash', 'note', '127.0.0.1', 1, '2022-01-06 09:59:58', '2022-01-06 09:59:58'),
(6, 40, 28, 'Yenişehir mah.', 67, 'complated', 'cash', 'note', '127.0.0.1', 4, '2022-01-12 07:42:19', '2022-01-12 07:42:19'),
(7, 40, 27, 'Yenişehir mah.', 25, 'preparing', 'cash', 'note', '127.0.0.1', 5, '2022-01-12 08:26:06', '2022-01-12 10:26:06'),
(8, 40, 27, 'Yenişehir mah. updated', 34, 'preparing', 'cash', 'note', '127.0.0.1', NULL, '2022-01-12 08:33:57', '2022-01-12 08:33:57'),
(9, 40, 28, 'Yenişehir mah. updated', 61, 'complated', 'cash', 'Lütfen sıcak gelsin.', '127.0.0.1', 10, '2022-01-13 15:08:55', '2022-01-13 15:08:55'),
(10, 40, 28, 'Yenişehir mah. updated', 96, 'complated', 'cash', NULL, '127.0.0.1', 10, '2022-01-13 15:11:25', '2022-01-13 15:11:25'),
(11, 40, 28, 'Yenişehir mah. updated', 61, 'complated', 'cash', NULL, '127.0.0.1', 1, '2022-01-13 15:11:49', '2022-01-13 15:11:49'),
(12, 40, 28, 'Yenişehir mah. updated', 121, 'complated', 'credit-cart', NULL, '127.0.0.1', 5, '2022-01-13 15:14:16', '2022-01-13 15:14:16'),
(13, 40, 28, 'Yenişehir mah. updated', 61, 'complated', 'cash', NULL, '127.0.0.1', NULL, '2022-01-13 15:40:21', '2022-01-13 15:40:21'),
(14, 45, 28, 'İsmail Necati Efendi KYK', 128, 'preparing', 'cash', 'not yok.', '127.0.0.1', NULL, '2022-01-18 04:47:57', '2022-01-18 04:47:57'),
(15, 40, 28, 'Yenişehir mah. updated', 105, 'complated', 'cash', 'Sipariş notum.', '127.0.0.1', 9, '2022-01-26 20:28:54', '2022-01-26 20:28:54'),
(16, 45, 28, 'İsmail Necati Efendi KYK', 34, 'preparing', 'cash', NULL, '127.0.0.1', NULL, '2022-02-07 17:21:26', '2022-02-07 17:21:26');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `orders_products`
--

CREATE TABLE `orders_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `price` double(8,2) NOT NULL,
  `amount` int(11) NOT NULL,
  `total` double(8,2) NOT NULL,
  `ip` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product`
--

CREATE TABLE `product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(10000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `detail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(8,2) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `product`
--

INSERT INTO `product` (`id`, `title`, `keywords`, `description`, `image`, `category_id`, `restaurant_id`, `detail`, `price`, `status`, `created_at`, `updated_at`) VALUES
(17, 'Çiğ Köfte 70gr', 'çiğ köfte', '70 gr etsiz çiğ köfte.', '1640888700.jpg', '2', 27, NULL, 7.99, 1, '2021-12-30 15:25:00', '2021-12-30 15:25:00'),
(18, 'Çiğ Köfte 100gr', 'çiğ köfte', '100 gr çiğ köfte dürüm.', '1640888747.jpg', '2', 27, NULL, 9.99, 1, '2021-12-30 15:25:47', '2021-12-30 15:25:47'),
(19, 'Ayran', 'ayran', '200gr Ayran', '1640888817.jpg', '1', 27, NULL, 3.50, 1, '2021-12-30 15:26:57', '2021-12-30 15:26:57'),
(20, 'Ayran 300gr', 'ayran, içecek', '300gr Ayran', '1640888860.jpg', '1', 27, NULL, 5.50, 1, '2021-12-30 15:27:40', '2021-12-30 15:27:40'),
(21, 'Ayran 1,5 Lt', 'ayran', '1,5 lt Ayran', '1640888908.jpg', '1', 27, NULL, 10.00, 1, '2021-12-30 15:28:28', '2021-12-30 15:28:28'),
(22, 'Profiterol', 'tatlı,profiterol', 'Profiterol tatlı.', '1640889017.jpg', '3', 27, NULL, 10.00, 1, '2021-12-30 15:30:17', '2021-12-30 15:30:17'),
(23, 'Adana Kebap', 'adana kebap, adana dürüm', 'Adana Kebap yanında pilav, közlenmiş biber ve domates ile servis edilir.', '1640891636.jpg', '2', 28, NULL, 30.00, 1, '2021-12-30 16:13:56', '2021-12-30 16:13:56'),
(24, 'Urfa Kebap', 'urfa kebap', 'Urfa Kebap yanında bulgur pilavı, közlenmiş biber ve domates ile servis edilir.', '1640891696.jpg', '2', 28, NULL, 30.00, 1, '2021-12-30 16:14:56', '2021-12-30 16:14:56'),
(25, 'Ayran 150ml', 'ayran, soğuk içecek', '150ml Ayran', '1640891724.jpg', '1', 28, NULL, 5.00, 1, '2021-12-30 16:15:24', '2021-12-30 16:15:24'),
(26, 'Ayran 300ml', 'ayran', '300ml Ayran', '1640891751.jpg', '1', 28, NULL, 8.00, 1, '2021-12-30 16:15:51', '2021-12-30 16:15:51'),
(27, 'Ayran 1,5 Lt', 'ayran', '1,5 Lt ayran', '1640891784.jpg', '1', 28, NULL, 12.00, 1, '2021-12-30 16:16:24', '2021-12-30 16:16:24'),
(28, 'Kola', 'coca cola, kola', '250ml Coca-Cola', '1640891833.jpg', '1', 28, NULL, 7.00, 1, '2021-12-30 16:17:13', '2021-12-30 16:17:13'),
(29, 'Fanta', 'fanta,gazlı içecek', '250ml Fanta', '1640891873.jpg', '1', 28, NULL, 7.00, 1, '2021-12-30 16:17:53', '2021-12-30 16:17:53'),
(30, 'Adana Kebap Menü', 'adana kebap, menü', 'Adana Kebap yanında pilav, közlenmiş biber, domates, 1,5 lt kola ve bir adet tatlı ile servis edilir.', '1641470772.jpg', '4', 28, NULL, 60.50, 1, '2022-01-06 09:06:12', '2022-01-06 09:06:12'),
(31, 'Çiğköfte Dürüm + Tatlı', 'çiğ köfte menü', '100 gr çiğ köfte dürüm + tatlı + 250ml ayran', '1641471045.jpg', '4', 27, NULL, 15.00, 1, '2022-01-06 09:10:45', '2022-01-06 09:10:45'),
(32, 'Kola 250ml', 'kola', '250ml Coca-Cola', '1642677039.jpg', '1', 29, NULL, 5.00, 1, '2022-01-20 08:10:39', '2022-01-20 08:10:39'),
(33, 'Whooper Menü', 'burger, hamburger,burger king', 'Big King® + Büyük Boy Patates + Kutu İçecek', '1642677454.png', '4', 29, NULL, 42.99, 1, '2022-01-20 08:17:34', '2022-01-20 08:17:34'),
(34, 'King Chicken Menü', 'king chicken menü,burger king', 'King Chicken® + Büyük Boy Patates + Kutu İçecek', '1642677529.png', '4', 29, NULL, 34.99, 1, '2022-01-20 08:18:49', '2022-01-20 08:18:49'),
(35, 'Seçilmiş Menü (3\'lü Whooper)', 'seçişmiş menü, whooper menü,burger king,burger', '3 Adet Whopper Jr.® + Büyük Boy Patates + 1 L. İçecek (Whopper Jr.® seçimleri için geçerlidir. Double Whopper Jr.® seçimlerinde 10 TL, Whopper® veya Plant Based Whopper® seçimlerinde 15 TL, Double Whopper® seçimlerinde 25 TL ve Triple Whopper® seçimlerinde 30 TL farkla', '1642677678.png', '4', 29, NULL, 68.99, 1, '2022-01-20 08:21:18', '2022-01-20 08:21:18');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `restaurant`
--

CREATE TABLE `restaurant` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ownerID` int(11) NOT NULL,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `town` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `point` float DEFAULT NULL,
  `pointQt` int(11) NOT NULL DEFAULT 10,
  `min_cart` float DEFAULT NULL,
  `serve_price` float DEFAULT NULL,
  `serve_time` int(11) DEFAULT NULL,
  `status` enum('pending','active','passive','closed') COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `restaurant`
--

INSERT INTO `restaurant` (`id`, `title`, `ownerID`, `keywords`, `description`, `image`, `type`, `detail`, `city`, `town`, `district`, `location`, `point`, `pointQt`, `min_cart`, `serve_price`, `serve_time`, `status`, `created_at`, `updated_at`) VALUES
(27, 'Komagene', 27, 'çip köfte, tatlı, içli köfte', 'Komagene Çiğköfte Restaurant Zincileri', '1640886508.png', NULL, NULL, '34', '449', NULL, NULL, 7.71429, 14, 20, 0, 20, 'active', '2021-12-29 21:00:00', '2021-12-29 21:00:00'),
(28, 'Aboov Kebap', 35, 'kebap,adana, urfa,lahmacun', 'Aboov Kebap dükkan açıklaması', '1640891520.jpg', NULL, NULL, '34', '449', NULL, NULL, 8.23529, 17, 30, 10, 35, 'active', '2021-12-29 21:00:00', '2021-12-29 21:00:00'),
(29, 'Burger King', 50, 'hamburger, fastfood,fast-food', 'Burger King - Ateş Seni Çağırıyor!', '1642676494.png', NULL, NULL, '34', '449', NULL, NULL, 10, 10, 30, 0, 30, 'active', '2022-01-19 21:00:00', '2022-01-19 21:00:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'restaurant');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tittle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtpserver` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtpemail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtppassword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtpport` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aboutus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `references` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ksozlesmesi` varchar(10000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `settings_2`
--

CREATE TABLE `settings_2` (
  `id` int(11) NOT NULL,
  `title` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `description` varchar(10000) COLLATE utf8_turkish_ci NOT NULL,
  `category` enum('sss','ksozlesmesi','','') COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `settings_2`
--

INSERT INTO `settings_2` (`id`, `title`, `description`, `category`) VALUES
(4, 'Yemek Diyarına nasıl üye olurum?', 'YemekDiyarı’na üye olmak \r\niçin önce Yemekdiyari.com web sitesi, mobil uygulamaları ya da mikro \r\nsitesinin Ana Sayfa’sına ya da internetten arama ya da reklam \r\nkampanyaları ile gelebileceğiniz Yemek/Marka Arama sayfalarına girmeniz \r\ngereklidir. Ana Sayfa ya da Yemek/Marka arama sayfası üzerinden Üye Ol \r\nbağlantısına tıklayarak, karşınıza çıkan yeni sayfada E-posta ile Üye Ol\r\n ya da Sosyal Ağ ile Üye Ol bağlantılarından herhangi biri altındaki \r\nformu doldurarak YemekDiyarı üyesi olabilirsiniz. YemekDiyarı üzerinden \r\ngerçekleşen işlemler mesafeli sözleşmeler yönetmeliği kapsamında \r\nsayılmamaktadır.', 'sss'),
(5, 'Yemekdiyari.com Kullanıcı Sistemi', 'Her Yemekdiyari.com kullanıcısı, \r\nkendisinin belirleyeceği bir “kullanıcı adı” veya e-posta adresi ile \r\n“şifre”ye sahip olur.\r\n    “Kullanıcı adı” e-posta adreslerinde olduğu gibi her üyeye özeldir \r\nve aynı kullanıcı adı farklı üyelere verilmez.\r\n    Her kullanıcının Yemekdiyari.com üyeliği gerektiren sistemlere \r\nbağlanabilmesi için kullanıcı adını veya kayıtlı e-posta adresi ile \r\nşifresini girmesi gereklidir. Bu işlem Yemekdiyari.com sistemine giriş \r\nyapmak şeklinde tanımlanmıştır. Kullanıcılar, diledikleri takdirde \r\nilgili kullanıcı sözleşmelerini onaylamak kaydıyla Yemekdiyari.com \r\nsistemine giriş yaptıkları kullanıcı adı veya e-posta adresi ve şifre \r\nile Yemekdiyari.com sistemine dahil diğer sitelere (Papyon.com gibi) de \r\ngiriş yapabilirler.\r\n    “Şifre” sadece ilgili kullanıcının bilgisi dâhilindedir. Kullanıcı \r\nşifresi unutulduğu takdirde Yemekdiyari.com, talep üzerine kullanıcının \r\nYemekdiyari.com sisteminde kayıtlı e-posta adresine yeni şifre \r\noluşturabilmek için bir bağlantı gönderecektir. Şifre\'nin belirlenmesi \r\nve korunması tamamıyla kullanıcının kendi sorumluluğundadır ve \r\nYemekdiyari.com şifre kullanımından doğacak problemlerden veya \r\noluşabilecek zararlardan kesinlikle sorumlu değildir.\r\n    Yemekdiyari.com kullanıcılarını Yemekdiyari.com’da kayıtlı \r\nadreslerinin bulunduğu bölgelerdeki ve sair şekilde yararlanabilecekleri\r\n promosyonlar ile Yemekdiyari.com sistemi dahilindeki yeni hizmet veya \r\nprojelerden e-posta yolu ile haberdar edebilecektir. Ayrıca \r\nYemekdiyari.com kullanıcılarına sosyal medya kanalları dahil olmak üzere\r\n kullanıcıların Yemekdiyari.com sistemi ile paylaştıkları her türlü \r\niletişim kanalı üzerinden ulaşabilir ve çeşitli promosyon, kampanya ve \r\nbenzer bilgileri paylaşabilecektir.\r\n    Kullanıcıların belirlemiş oldukları Yemekdiyari.com sisteminde \r\nkayıtlı isim, adres ve telefon numarası, siparişin daha çabuk ve doğru \r\nteslimi amacıyla siparişi teslim eden üye işyeri ile paylaşılacaktır.\r\n    Yemekdiyari.com, sisteminde kayıtlı isim, adres ve telefon \r\nnumarasının siparişi teslim eden üye işyeri ile paylaşılmasından dolayı \r\nkullanıcı ve üye işyeri arasında ortaya çıkabilecek her türlü problemden\r\n veya oluşabilecek zarardan kesinlikle sorumlu değildir.\r\n    Yemekdiyari.com sisteminin kullanılması ile oluşacak data ve \r\nverilerin tüm fikri haklarına sahiptir. Yemekdiyari.com, söz konusu \r\nbilgilerle kullanıcı üyelik bilgilerini açıklamadan demografik bilgiler \r\niçeren raporlar düzenleyebilir veya bu tarz bilgileri veya raporları \r\nkendisi kullanabilir ve bu rapor ve/veya istatistikleri iş ortakları ile\r\n üçüncü kişilerle bedelli veya bedelsiz paylaşabilir. Bu işlemler \r\nYemekdiyari.com Gizlilik Politikası hükümlerine aykırılık teşkil etmez.', 'sss');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `town`
--

CREATE TABLE `town` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `city_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `town`
--

INSERT INTO `town` (`id`, `name`, `city_id`) VALUES
(0, 'null', 0),
(1, 'aladağ', 1),
(2, 'ceyhan', 1),
(3, 'çukurova', 1),
(4, 'feke', 1),
(5, 'imamoğlu', 1),
(6, 'karaisalı', 1),
(7, 'karataş', 1),
(8, 'kozan', 1),
(9, 'pozantı', 1),
(10, 'saimbeyli', 1),
(11, 'sarıçam', 1),
(12, 'seyhan', 1),
(13, 'tufanbeyli', 1),
(14, 'yumurtalık', 1),
(15, 'yüreğir', 1),
(16, 'besni', 2),
(17, 'çelikhan', 2),
(18, 'gerger', 2),
(19, 'gölbaşı', 2),
(20, 'kahta', 2),
(21, 'merkez', 2),
(22, 'samsat', 2),
(23, 'sincik', 2),
(24, 'tut', 2),
(25, 'başmakçı', 3),
(26, 'bayat', 3),
(27, 'bolvadin', 3),
(28, 'çay', 3),
(29, 'çobanlar', 3),
(30, 'dazkırı', 3),
(31, 'dinar', 3),
(32, 'emirdağ', 3),
(33, 'evciler', 3),
(34, 'hocalar', 3),
(35, 'ihsaniye', 3),
(36, 'iscehisar', 3),
(37, 'kızılören', 3),
(38, 'merkez', 3),
(39, 'sandıklı', 3),
(40, 'sinanpaşa', 3),
(41, 'sultandağı', 3),
(42, 'şuhut', 3),
(43, 'diyadin', 4),
(44, 'doğubayazıt', 4),
(45, 'eleşkirt', 4),
(46, 'hamur', 4),
(47, 'merkez', 4),
(48, 'patnos', 4),
(49, 'taşlıçay', 4),
(50, 'tutak', 4),
(51, 'göynücek', 5),
(52, 'gümüşhacıköy', 5),
(53, 'hamamözü', 5),
(54, 'merkez', 5),
(55, 'merzifon', 5),
(56, 'suluova', 5),
(57, 'taşova', 5),
(58, 'akyurt', 6),
(59, 'altındağ', 6),
(60, 'ayaş', 6),
(61, 'bala', 6),
(62, 'beypazarı', 6),
(63, 'çamlıdere', 6),
(64, 'çankaya', 6),
(65, 'çubuk', 6),
(66, 'elmadağ', 6),
(67, 'etimesgut', 6),
(68, 'evren', 6),
(69, 'gölbaşı', 6),
(70, 'güdül', 6),
(71, 'haymana', 6),
(72, 'kahramankazan', 6),
(73, 'kalecik', 6),
(74, 'keçiören', 6),
(75, 'kızılcahamam', 6),
(76, 'mamak', 6),
(77, 'nallıhan', 6),
(78, 'polatlı', 6),
(79, 'pursaklar', 6),
(80, 'sincan', 6),
(81, 'şereflikoçhisar', 6),
(82, 'yenimahalle', 6),
(83, 'akseki', 7),
(84, 'aksu', 7),
(85, 'alanya', 7),
(86, 'demre', 7),
(87, 'döşemealtı', 7),
(88, 'elmalı', 7),
(89, 'finike', 7),
(90, 'gazipaşa', 7),
(91, 'gündoğmuş', 7),
(92, 'ibradı', 7),
(93, 'kaş', 7),
(94, 'kemer', 7),
(95, 'kepez', 7),
(96, 'konyaaltı', 7),
(97, 'korkuteli', 7),
(98, 'kumluca', 7),
(99, 'manavgat', 7),
(100, 'muratpaşa', 7),
(101, 'serik', 7),
(102, 'ardanuç', 8),
(103, 'arhavi', 8),
(104, 'borçka', 8),
(105, 'hopa', 8),
(106, 'kemalpaşa', 8),
(107, 'merkez', 8),
(108, 'murgul', 8),
(109, 'şavşat', 8),
(110, 'yusufeli', 8),
(111, 'bozdoğan', 9),
(112, 'buharkent', 9),
(113, 'çine', 9),
(114, 'didim', 9),
(115, 'efeler', 9),
(116, 'germencik', 9),
(117, 'incirliova', 9),
(118, 'karacasu', 9),
(119, 'karpuzlu', 9),
(120, 'koçarlı', 9),
(121, 'köşk', 9),
(122, 'kuşadası', 9),
(123, 'kuyucak', 9),
(124, 'nazilli', 9),
(125, 'söke', 9),
(126, 'sultanhisar', 9),
(127, 'yenipazar', 9),
(128, 'altıeylül', 10),
(129, 'ayvalık', 10),
(130, 'balya', 10),
(131, 'bandırma', 10),
(132, 'bigadiç', 10),
(133, 'burhaniye', 10),
(134, 'dursunbey', 10),
(135, 'edremit', 10),
(136, 'erdek', 10),
(137, 'gömeç', 10),
(138, 'gönen', 10),
(139, 'havran', 10),
(140, 'ivrindi', 10),
(141, 'karesi', 10),
(142, 'kepsut', 10),
(143, 'manyas', 10),
(144, 'marmara', 10),
(145, 'savaştepe', 10),
(146, 'sındırgı', 10),
(147, 'susurluk', 10),
(148, 'bozüyük', 11),
(149, 'gölpazarı', 11),
(150, 'inhisar', 11),
(151, 'merkez', 11),
(152, 'osmaneli', 11),
(153, 'pazaryeri', 11),
(154, 'söğüt', 11),
(155, 'yenipazar', 11),
(156, 'adaklı', 12),
(157, 'genç', 12),
(158, 'karlıova', 12),
(159, 'kiğı', 12),
(160, 'merkez', 12),
(161, 'solhan', 12),
(162, 'yayladere', 12),
(163, 'yedisu', 12),
(164, 'adilcevaz', 13),
(165, 'ahlat', 13),
(166, 'güroymak', 13),
(167, 'hizan', 13),
(168, 'merkez', 13),
(169, 'mutki', 13),
(170, 'tatvan', 13),
(171, 'dörtdivan', 14),
(172, 'gerede', 14),
(173, 'göynük', 14),
(174, 'kıbrıscık', 14),
(175, 'mengen', 14),
(176, 'merkez', 14),
(177, 'mudurnu', 14),
(178, 'seben', 14),
(179, 'yeniçağa', 14),
(180, 'ağlasun', 15),
(181, 'altınyayla', 15),
(182, 'bucak', 15),
(183, 'çavdır', 15),
(184, 'çeltikçi', 15),
(185, 'gölhisar', 15),
(186, 'karamanlı', 15),
(187, 'kemer', 15),
(188, 'merkez', 15),
(189, 'tefenni', 15),
(190, 'yeşilova', 15),
(191, 'büyükorhan', 16),
(192, 'gemlik', 16),
(193, 'gürsu', 16),
(194, 'harmancık', 16),
(195, 'inegöl', 16),
(196, 'iznik', 16),
(197, 'karacabey', 16),
(198, 'keles', 16),
(199, 'kestel', 16),
(200, 'mudanya', 16),
(201, 'mustafakemalpaşa', 16),
(202, 'nilüfer', 16),
(203, 'orhaneli', 16),
(204, 'orhangazi', 16),
(205, 'osmangazi', 16),
(206, 'yenişehir', 16),
(207, 'yıldırım', 16),
(208, 'ayvacık', 17),
(209, 'bayramiç', 17),
(210, 'biga', 17),
(211, 'bozcaada', 17),
(212, 'çan', 17),
(213, 'eceabat', 17),
(214, 'ezine', 17),
(215, 'gelibolu', 17),
(216, 'gökçeada', 17),
(217, 'lapseki', 17),
(218, 'merkez', 17),
(219, 'yenice', 17),
(220, 'atkaracalar', 18),
(221, 'bayramören', 18),
(222, 'çerkeş', 18),
(223, 'eldivan', 18),
(224, 'ılgaz', 18),
(225, 'kızılırmak', 18),
(226, 'korgun', 18),
(227, 'kurşunlu', 18),
(228, 'merkez', 18),
(229, 'orta', 18),
(230, 'şabanözü', 18),
(231, 'yapraklı', 18),
(232, 'alaca', 19),
(233, 'bayat', 19),
(234, 'boğazkale', 19),
(235, 'dodurga', 19),
(236, 'iskilip', 19),
(237, 'kargı', 19),
(238, 'laçin', 19),
(239, 'mecitözü', 19),
(240, 'merkez', 19),
(241, 'oğuzlar', 19),
(242, 'ortaköy', 19),
(243, 'osmancık', 19),
(244, 'sungurlu', 19),
(245, 'uğurludağ', 19),
(246, 'acıpayam', 20),
(247, 'babadağ', 20),
(248, 'baklan', 20),
(249, 'bekilli', 20),
(250, 'beyağaç', 20),
(251, 'bozkurt', 20),
(252, 'buldan', 20),
(253, 'çal', 20),
(254, 'çameli', 20),
(255, 'çardak', 20),
(256, 'çivril', 20),
(257, 'güney', 20),
(258, 'honaz', 20),
(259, 'kale', 20),
(260, 'merkezefendi', 20),
(261, 'pamukkale', 20),
(262, 'sarayköy', 20),
(263, 'serinhisar', 20),
(264, 'tavas', 20),
(265, 'bağlar', 21),
(266, 'bismil', 21),
(267, 'çermik', 21),
(268, 'çınar', 21),
(269, 'çüngüş', 21),
(270, 'dicle', 21),
(271, 'eğil', 21),
(272, 'ergani', 21),
(273, 'hani', 21),
(274, 'hazro', 21),
(275, 'kayapınar', 21),
(276, 'kocaköy', 21),
(277, 'kulp', 21),
(278, 'lice', 21),
(279, 'silvan', 21),
(280, 'sur', 21),
(281, 'yenişehir', 21),
(282, 'enez', 22),
(283, 'havsa', 22),
(284, 'ipsala', 22),
(285, 'keşan', 22),
(286, 'lalapaşa', 22),
(287, 'meriç', 22),
(288, 'merkez', 22),
(289, 'süloğlu', 22),
(290, 'uzunköprü', 22),
(291, 'ağın', 23),
(292, 'alacakaya', 23),
(293, 'arıcak', 23),
(294, 'baskil', 23),
(295, 'karakoçan', 23),
(296, 'keban', 23),
(297, 'kovancılar', 23),
(298, 'maden', 23),
(299, 'merkez', 23),
(300, 'palu', 23),
(301, 'sivrice', 23),
(302, 'çayırlı', 24),
(303, 'iliç', 24),
(304, 'kemah', 24),
(305, 'kemaliye', 24),
(306, 'merkez', 24),
(307, 'otlukbeli', 24),
(308, 'refahiye', 24),
(309, 'tercan', 24),
(310, 'üzümlü', 24),
(311, 'aşkale', 25),
(312, 'aziziye', 25),
(313, 'çat', 25),
(314, 'hınıs', 25),
(315, 'horasan', 25),
(316, 'ispir', 25),
(317, 'karaçoban', 25),
(318, 'karayazı', 25),
(319, 'köprüköy', 25),
(320, 'narman', 25),
(321, 'oltu', 25),
(322, 'olur', 25),
(323, 'palandöken', 25),
(324, 'pasinler', 25),
(325, 'pazaryolu', 25),
(326, 'şenkaya', 25),
(327, 'tekman', 25),
(328, 'tortum', 25),
(329, 'uzundere', 25),
(330, 'yakutiye', 25),
(331, 'alpu', 26),
(332, 'beylikova', 26),
(333, 'çifteler', 26),
(334, 'günyüzü', 26),
(335, 'han', 26),
(336, 'inönü', 26),
(337, 'mahmudiye', 26),
(338, 'mihalgazi', 26),
(339, 'mihalıççık', 26),
(340, 'odunpazarı', 26),
(341, 'sarıcakaya', 26),
(342, 'seyitgazi', 26),
(343, 'sivrihisar', 26),
(344, 'tepebaşı', 26),
(345, 'araban', 27),
(346, 'islahiye', 27),
(347, 'karkamış', 27),
(348, 'nizip', 27),
(349, 'nurdağı', 27),
(350, 'oğuzeli', 27),
(351, 'şahinbey', 27),
(352, 'şehitkamil', 27),
(353, 'yavuzeli', 27),
(354, 'alucra', 28),
(355, 'bulancak', 28),
(356, 'çamoluk', 28),
(357, 'çanakçı', 28),
(358, 'dereli', 28),
(359, 'doğankent', 28),
(360, 'espiye', 28),
(361, 'eynesil', 28),
(362, 'görele', 28),
(363, 'güce', 28),
(364, 'keşap', 28),
(365, 'merkez', 28),
(366, 'piraziz', 28),
(367, 'şebinkarahisar', 28),
(368, 'tirebolu', 28),
(369, 'yağlıdere', 28),
(370, 'kelkit', 29),
(371, 'köse', 29),
(372, 'kürtün', 29),
(373, 'merkez', 29),
(374, 'şiran', 29),
(375, 'torul', 29),
(376, 'çukurca', 30),
(377, 'derecik', 30),
(378, 'merkez', 30),
(379, 'şemdinli', 30),
(380, 'yüksekova', 30),
(381, 'altınözü', 31),
(382, 'antakya', 31),
(383, 'arsuz', 31),
(384, 'belen', 31),
(385, 'defne', 31),
(386, 'dörtyol', 31),
(387, 'erzin', 31),
(388, 'hassa', 31),
(389, 'iskenderun', 31),
(390, 'kırıkhan', 31),
(391, 'kumlu', 31),
(392, 'payas', 31),
(393, 'reyhanlı', 31),
(394, 'samandağ', 31),
(395, 'yayladağı', 31),
(396, 'aksu', 32),
(397, 'atabey', 32),
(398, 'eğirdir', 32),
(399, 'gelendost', 32),
(400, 'gönen', 32),
(401, 'keçiborlu', 32),
(402, 'merkez', 32),
(403, 'senirkent', 32),
(404, 'sütçüler', 32),
(405, 'şarkikaraağaç', 32),
(406, 'uluborlu', 32),
(407, 'yalvaç', 32),
(408, 'yenişarbademli', 32),
(409, 'akdeniz', 33),
(410, 'anamur', 33),
(411, 'aydıncık', 33),
(412, 'bozyazı', 33),
(413, 'çamlıyayla', 33),
(414, 'erdemli', 33),
(415, 'gülnar', 33),
(416, 'mezitli', 33),
(417, 'mut', 33),
(418, 'silifke', 33),
(419, 'tarsus', 33),
(420, 'toroslar', 33),
(421, 'yenişehir', 33),
(422, 'adalar', 34),
(423, 'arnavutköy', 34),
(424, 'ataşehir', 34),
(425, 'avcılar', 34),
(426, 'bağcılar', 34),
(427, 'bahçelievler', 34),
(428, 'bakırköy', 34),
(429, 'başakşehir', 34),
(430, 'bayrampaşa', 34),
(431, 'beşiktaş', 34),
(432, 'beykoz', 34),
(433, 'beylikdüzü', 34),
(434, 'beyoğlu', 34),
(435, 'büyükçekmece', 34),
(436, 'çatalca', 34),
(437, 'çekmeköy', 34),
(438, 'esenler', 34),
(439, 'esenyurt', 34),
(440, 'eyüpsultan', 34),
(441, 'fatih', 34),
(442, 'gaziosmanpaşa', 34),
(443, 'güngören', 34),
(444, 'kadıköy', 34),
(445, 'kağıthane', 34),
(446, 'kartal', 34),
(447, 'küçükçekmece', 34),
(448, 'maltepe', 34),
(449, 'pendik', 34),
(450, 'sancaktepe', 34),
(451, 'sarıyer', 34),
(452, 'silivri', 34),
(453, 'sultanbeyli', 34),
(454, 'sultangazi', 34),
(455, 'şile', 34),
(456, 'şişli', 34),
(457, 'tuzla', 34),
(458, 'ümraniye', 34),
(459, 'üsküdar', 34),
(460, 'zeytinburnu', 34),
(461, 'aliağa', 35),
(462, 'balçova', 35),
(463, 'bayındır', 35),
(464, 'bayraklı', 35),
(465, 'bergama', 35),
(466, 'beydağ', 35),
(467, 'bornova', 35),
(468, 'buca', 35),
(469, 'çeşme', 35),
(470, 'çiğli', 35),
(471, 'dikili', 35),
(472, 'foça', 35),
(473, 'gaziemir', 35),
(474, 'güzelbahçe', 35),
(475, 'karabağlar', 35),
(476, 'karaburun', 35),
(477, 'karşıyaka', 35),
(478, 'kemalpaşa', 35),
(479, 'kınık', 35),
(480, 'kiraz', 35),
(481, 'konak', 35),
(482, 'menderes', 35),
(483, 'menemen', 35),
(484, 'narlıdere', 35),
(485, 'ödemiş', 35),
(486, 'seferihisar', 35),
(487, 'selçuk', 35),
(488, 'tire', 35),
(489, 'torbalı', 35),
(490, 'urla', 35),
(491, 'akyaka', 36),
(492, 'arpaçay', 36),
(493, 'digor', 36),
(494, 'kağızman', 36),
(495, 'merkez', 36),
(496, 'sarıkamış', 36),
(497, 'selim', 36),
(498, 'susuz', 36),
(499, 'abana', 37),
(500, 'ağlı', 37),
(501, 'araç', 37),
(502, 'azdavay', 37),
(503, 'bozkurt', 37),
(504, 'cide', 37),
(505, 'çatalzeytin', 37),
(506, 'daday', 37),
(507, 'devrekani', 37),
(508, 'doğanyurt', 37),
(509, 'hanönü', 37),
(510, 'ihsangazi', 37),
(511, 'inebolu', 37),
(512, 'küre', 37),
(513, 'merkez', 37),
(514, 'pınarbaşı', 37),
(515, 'seydiler', 37),
(516, 'şenpazar', 37),
(517, 'taşköprü', 37),
(518, 'tosya', 37),
(519, 'akkışla', 38),
(520, 'bünyan', 38),
(521, 'develi', 38),
(522, 'felahiye', 38),
(523, 'hacılar', 38),
(524, 'incesu', 38),
(525, 'kocasinan', 38),
(526, 'melikgazi', 38),
(527, 'özvatan', 38),
(528, 'pınarbaşı', 38),
(529, 'sarıoğlan', 38),
(530, 'sarız', 38),
(531, 'talas', 38),
(532, 'tomarza', 38),
(533, 'yahyalı', 38),
(534, 'yeşilhisar', 38),
(535, 'babaeski', 39),
(536, 'demirköy', 39),
(537, 'kofçaz', 39),
(538, 'lüleburgaz', 39),
(539, 'merkez', 39),
(540, 'pehlivanköy', 39),
(541, 'pınarhisar', 39),
(542, 'vize', 39),
(543, 'akçakent', 40),
(544, 'akpınar', 40),
(545, 'boztepe', 40),
(546, 'çiçekdağı', 40),
(547, 'kaman', 40),
(548, 'merkez', 40),
(549, 'mucur', 40),
(550, 'başiskele', 41),
(551, 'çayırova', 41),
(552, 'darıca', 41),
(553, 'derince', 41),
(554, 'dilovası', 41),
(555, 'gebze', 41),
(556, 'gölcük', 41),
(557, 'izmit', 41),
(558, 'kandıra', 41),
(559, 'karamürsel', 41),
(560, 'kartepe', 41),
(561, 'körfez', 41),
(562, 'ahırlı', 42),
(563, 'akören', 42),
(564, 'akşehir', 42),
(565, 'altınekin', 42),
(566, 'beyşehir', 42),
(567, 'bozkır', 42),
(568, 'cihanbeyli', 42),
(569, 'çeltik', 42),
(570, 'çumra', 42),
(571, 'derbent', 42),
(572, 'derebucak', 42),
(573, 'doğanhisar', 42),
(574, 'emirgazi', 42),
(575, 'ereğli', 42),
(576, 'güneysınır', 42),
(577, 'hadim', 42),
(578, 'halkapınar', 42),
(579, 'hüyük', 42),
(580, 'ılgın', 42),
(581, 'kadınhanı', 42),
(582, 'karapınar', 42),
(583, 'karatay', 42),
(584, 'kulu', 42),
(585, 'meram', 42),
(586, 'sarayönü', 42),
(587, 'selçuklu', 42),
(588, 'seydişehir', 42),
(589, 'taşkent', 42),
(590, 'tuzlukçu', 42),
(591, 'yalıhüyük', 42),
(592, 'yunak', 42),
(593, 'altıntaş', 43),
(594, 'aslanapa', 43),
(595, 'çavdarhisar', 43),
(596, 'domaniç', 43),
(597, 'dumlupınar', 43),
(598, 'emet', 43),
(599, 'gediz', 43),
(600, 'hisarcık', 43),
(601, 'merkez', 43),
(602, 'pazarlar', 43),
(603, 'simav', 43),
(604, 'şaphane', 43),
(605, 'tavşanlı', 43),
(606, 'akçadağ', 44),
(607, 'arapgir', 44),
(608, 'arguvan', 44),
(609, 'battalgazi', 44),
(610, 'darende', 44),
(611, 'doğanşehir', 44),
(612, 'doğanyol', 44),
(613, 'hekimhan', 44),
(614, 'kale', 44),
(615, 'kuluncak', 44),
(616, 'pütürge', 44),
(617, 'yazıhan', 44),
(618, 'yeşilyurt', 44),
(619, 'ahmetli', 45),
(620, 'akhisar', 45),
(621, 'alaşehir', 45),
(622, 'demirci', 45),
(623, 'gölmarmara', 45),
(624, 'gördes', 45),
(625, 'kırkağaç', 45),
(626, 'köprübaşı', 45),
(627, 'kula', 45),
(628, 'salihli', 45),
(629, 'sarıgöl', 45),
(630, 'saruhanlı', 45),
(631, 'selendi', 45),
(632, 'soma', 45),
(633, 'şehzadeler', 45),
(634, 'turgutlu', 45),
(635, 'yunusemre', 45),
(636, 'afşin', 46),
(637, 'andırın', 46),
(638, 'çağlayancerit', 46),
(639, 'dulkadiroğlu', 46),
(640, 'ekinözü', 46),
(641, 'elbistan', 46),
(642, 'göksun', 46),
(643, 'nurhak', 46),
(644, 'onikişubat', 46),
(645, 'pazarcık', 46),
(646, 'türkoğlu', 46),
(647, 'artuklu', 47),
(648, 'dargeçit', 47),
(649, 'derik', 47),
(650, 'kızıltepe', 47),
(651, 'mazıdağı', 47),
(652, 'midyat', 47),
(653, 'nusaybin', 47),
(654, 'ömerli', 47),
(655, 'savur', 47),
(656, 'yeşilli', 47),
(657, 'bodrum', 48),
(658, 'dalaman', 48),
(659, 'datça', 48),
(660, 'fethiye', 48),
(661, 'kavaklıdere', 48),
(662, 'köyceğiz', 48),
(663, 'marmaris', 48),
(664, 'menteşe', 48),
(665, 'milas', 48),
(666, 'ortaca', 48),
(667, 'seydikemer', 48),
(668, 'ula', 48),
(669, 'yatağan', 48),
(670, 'bulanık', 49),
(671, 'hasköy', 49),
(672, 'korkut', 49),
(673, 'malazgirt', 49),
(674, 'merkez', 49),
(675, 'varto', 49),
(676, 'acıgöl', 50),
(677, 'avanos', 50),
(678, 'derinkuyu', 50),
(679, 'gülşehir', 50),
(680, 'hacıbektaş', 50),
(681, 'kozaklı', 50),
(682, 'merkez', 50),
(683, 'ürgüp', 50),
(684, 'altunhisar', 51),
(685, 'bor', 51),
(686, 'çamardı', 51),
(687, 'çiftlik', 51),
(688, 'merkez', 51),
(689, 'ulukışla', 51),
(690, 'akkuş', 52),
(691, 'altınordu', 52),
(692, 'aybastı', 52),
(693, 'çamaş', 52),
(694, 'çatalpınar', 52),
(695, 'çaybaşı', 52),
(696, 'fatsa', 52),
(697, 'gölköy', 52),
(698, 'gülyalı', 52),
(699, 'gürgentepe', 52),
(700, 'ikizce', 52),
(701, 'kabadüz', 52),
(702, 'kabataş', 52),
(703, 'korgan', 52),
(704, 'kumru', 52),
(705, 'mesudiye', 52),
(706, 'perşembe', 52),
(707, 'ulubey', 52),
(708, 'ünye', 52),
(709, 'ardeşen', 53),
(710, 'çamlıhemşin', 53),
(711, 'çayeli', 53),
(712, 'derepazarı', 53),
(713, 'fındıklı', 53),
(714, 'güneysu', 53),
(715, 'hemşin', 53),
(716, 'ikizdere', 53),
(717, 'iyidere', 53),
(718, 'kalkandere', 53),
(719, 'merkez', 53),
(720, 'pazar', 53),
(721, 'adapazarı', 54),
(722, 'akyazı', 54),
(723, 'arifiye', 54),
(724, 'erenler', 54),
(725, 'ferizli', 54),
(726, 'geyve', 54),
(727, 'hendek', 54),
(728, 'karapürçek', 54),
(729, 'karasu', 54),
(730, 'kaynarca', 54),
(731, 'kocaali', 54),
(732, 'pamukova', 54),
(733, 'sapanca', 54),
(734, 'serdivan', 54),
(735, 'söğütlü', 54),
(736, 'taraklı', 54),
(737, '19 mayıs', 55),
(738, 'alaçam', 55),
(739, 'asarcık', 55),
(740, 'atakum', 55),
(741, 'ayvacık', 55),
(742, 'bafra', 55),
(743, 'canik', 55),
(744, 'çarşamba', 55),
(745, 'havza', 55),
(746, 'ilkadım', 55),
(747, 'kavak', 55),
(748, 'ladik', 55),
(749, 'salıpazarı', 55),
(750, 'tekkeköy', 55),
(751, 'terme', 55),
(752, 'vezirköprü', 55),
(753, 'yakakent', 55),
(754, 'baykan', 56),
(755, 'eruh', 56),
(756, 'kurtalan', 56),
(757, 'merkez', 56),
(758, 'pervari', 56),
(759, 'şirvan', 56),
(760, 'tillo', 56),
(761, 'ayancık', 57),
(762, 'boyabat', 57),
(763, 'dikmen', 57),
(764, 'durağan', 57),
(765, 'erfelek', 57),
(766, 'gerze', 57),
(767, 'merkez', 57),
(768, 'saraydüzü', 57),
(769, 'türkeli', 57),
(770, 'akıncılar', 58),
(771, 'altınyayla', 58),
(772, 'divriği', 58),
(773, 'doğanşar', 58),
(774, 'gemerek', 58),
(775, 'gölova', 58),
(776, 'gürün', 58),
(777, 'hafik', 58),
(778, 'imranlı', 58),
(779, 'kangal', 58),
(780, 'koyulhisar', 58),
(781, 'merkez', 58),
(782, 'suşehri', 58),
(783, 'şarkışla', 58),
(784, 'ulaş', 58),
(785, 'yıldızeli', 58),
(786, 'zara', 58),
(787, 'çerkezköy', 59),
(788, 'çorlu', 59),
(789, 'ergene', 59),
(790, 'hayrabolu', 59),
(791, 'kapaklı', 59),
(792, 'malkara', 59),
(793, 'marmaraereğlisi', 59),
(794, 'muratlı', 59),
(795, 'saray', 59),
(796, 'süleymanpaşa', 59),
(797, 'şarköy', 59),
(798, 'almus', 60),
(799, 'artova', 60),
(800, 'başçiftlik', 60),
(801, 'erbaa', 60),
(802, 'merkez', 60),
(803, 'niksar', 60),
(804, 'pazar', 60),
(805, 'reşadiye', 60),
(806, 'sulusaray', 60),
(807, 'turhal', 60),
(808, 'yeşilyurt', 60),
(809, 'zile', 60),
(810, 'akçaabat', 61),
(811, 'araklı', 61),
(812, 'arsin', 61),
(813, 'beşikdüzü', 61),
(814, 'çarşıbaşı', 61),
(815, 'çaykara', 61),
(816, 'dernekpazarı', 61),
(817, 'düzköy', 61),
(818, 'hayrat', 61),
(819, 'köprübaşı', 61),
(820, 'maçka', 61),
(821, 'of', 61),
(822, 'ortahisar', 61),
(823, 'sürmene', 61),
(824, 'şalpazarı', 61),
(825, 'tonya', 61),
(826, 'vakfıkebir', 61),
(827, 'yomra', 61),
(828, 'çemişgezek', 62),
(829, 'hozat', 62),
(830, 'mazgirt', 62),
(831, 'merkez', 62),
(832, 'nazımiye', 62),
(833, 'ovacık', 62),
(834, 'pertek', 62),
(835, 'pülümür', 62),
(836, 'akçakale', 63),
(837, 'birecik', 63),
(838, 'bozova', 63),
(839, 'ceylanpınar', 63),
(840, 'eyyübiye', 63),
(841, 'halfeti', 63),
(842, 'haliliye', 63),
(843, 'harran', 63),
(844, 'hilvan', 63),
(845, 'karaköprü', 63),
(846, 'siverek', 63),
(847, 'suruç', 63),
(848, 'viranşehir', 63),
(849, 'banaz', 64),
(850, 'eşme', 64),
(851, 'karahallı', 64),
(852, 'merkez', 64),
(853, 'sivaslı', 64),
(854, 'ulubey', 64),
(855, 'bahçesaray', 65),
(856, 'başkale', 65),
(857, 'çaldıran', 65),
(858, 'çatak', 65),
(859, 'edremit', 65),
(860, 'erciş', 65),
(861, 'gevaş', 65),
(862, 'gürpınar', 65),
(863, 'ipekyolu', 65),
(864, 'muradiye', 65),
(865, 'özalp', 65),
(866, 'saray', 65),
(867, 'tuşba', 65),
(868, 'akdağmadeni', 66),
(869, 'aydıncık', 66),
(870, 'boğazlıyan', 66),
(871, 'çandır', 66),
(872, 'çayıralan', 66),
(873, 'çekerek', 66),
(874, 'kadışehri', 66),
(875, 'merkez', 66),
(876, 'saraykent', 66),
(877, 'sarıkaya', 66),
(878, 'sorgun', 66),
(879, 'şefaatli', 66),
(880, 'yenifakılı', 66),
(881, 'yerköy', 66),
(882, 'alaplı', 67),
(883, 'çaycuma', 67),
(884, 'devrek', 67),
(885, 'ereğli', 67),
(886, 'gökçebey', 67),
(887, 'kilimli', 67),
(888, 'kozlu', 67),
(889, 'merkez', 67),
(890, 'ağaçören', 68),
(891, 'eskil', 68),
(892, 'gülağaç', 68),
(893, 'güzelyurt', 68),
(894, 'merkez', 68),
(895, 'ortaköy', 68),
(896, 'sarıyahşi', 68),
(897, 'sultanhanı', 68),
(898, 'çıldır', 75),
(899, 'damal', 75),
(900, 'göle', 75),
(901, 'hanak', 75),
(902, 'merkez', 75),
(903, 'posof', 75),
(904, 'amasra', 74),
(905, 'kurucaşile', 74),
(906, 'merkez', 74),
(907, 'ulus', 74),
(908, 'beşiri', 72),
(909, 'gercüş', 72),
(910, 'hasankeyf', 72),
(911, 'kozluk', 72),
(912, 'merkez', 72),
(913, 'sason', 72),
(914, 'aydıntepe', 69),
(915, 'demirözü', 69),
(916, 'merkez', 69),
(917, 'akçakoca', 81),
(918, 'cumayeri', 81),
(919, 'çilimli', 81),
(920, 'gölyaka', 81),
(921, 'gümüşova', 81),
(922, 'kaynaşlı', 81),
(923, 'merkez', 81),
(924, 'yığılca', 81),
(925, 'aralık', 76),
(926, 'karakoyunlu', 76),
(927, 'merkez', 76),
(928, 'tuzluca', 76),
(929, 'eflani', 78),
(930, 'eskipazar', 78),
(931, 'merkez', 78),
(932, 'ovacık', 78),
(933, 'safranbolu', 78),
(934, 'yenice', 78),
(935, 'ayrancı', 70),
(936, 'başyayla', 70),
(937, 'ermenek', 70),
(938, 'kazımkarabekir', 70),
(939, 'merkez', 70),
(940, 'sarıveliler', 70),
(941, 'bahşılı', 71),
(942, 'balışeyh', 71),
(943, 'çelebi', 71),
(944, 'delice', 71),
(945, 'karakeçili', 71),
(946, 'keskin', 71),
(947, 'merkez', 71),
(948, 'sulakyurt', 71),
(949, 'yahşihan', 71),
(950, 'elbeyli', 79),
(951, 'merkez', 79),
(952, 'musabeyli', 79),
(953, 'polateli', 79),
(954, 'bahçe', 80),
(955, 'düziçi', 80),
(956, 'hasanbeyli', 80),
(957, 'kadirli', 80),
(958, 'merkez', 80),
(959, 'sumbas', 80),
(960, 'toprakkale', 80),
(961, 'beytüşşebap', 73),
(962, 'cizre', 73),
(963, 'güçlükonak', 73),
(964, 'idil', 73),
(965, 'merkez', 73),
(966, 'silopi', 73),
(967, 'uludere', 73),
(968, 'altınova', 77),
(969, 'armutlu', 77),
(970, 'çınarcık', 77),
(971, 'çiftlikköy', 77),
(972, 'merkez', 77),
(973, 'termal', 77);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` int(11) NOT NULL,
  `town` int(11) NOT NULL,
  `address` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `restaurant_id` int(11) DEFAULT NULL,
  `role` enum('user','admin','restaurant') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `token` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Tablo için indeksler `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Tablo için indeksler `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Tablo için indeksler `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Tablo için indeksler `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `settings_2`
--
ALTER TABLE `settings_2`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `town`
--
ALTER TABLE `town`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- Tablo için AUTO_INCREMENT değeri `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Tablo için AUTO_INCREMENT değeri `orders_products`
--
ALTER TABLE `orders_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Tablo için AUTO_INCREMENT değeri `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Tablo için AUTO_INCREMENT değeri `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `settings_2`
--
ALTER TABLE `settings_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `town`
--
ALTER TABLE `town`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=976;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
