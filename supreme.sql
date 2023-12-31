-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 25 2023 г., 07:30
-- Версия сервера: 5.7.33
-- Версия PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `supreme`
--

-- --------------------------------------------------------

--
-- Структура таблицы `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `brands`
--

INSERT INTO `brands` (`id`, `slug`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'espresso-blends', 'Espresso Blends', '2023-09-26 02:23:16', '2023-09-26 02:23:16', NULL),
(2, 'single-origin-espresso', 'Single Origin Espresso', '2023-09-26 02:24:33', '2023-09-26 02:24:33', NULL),
(3, 'single-origin-filter', 'Single Origin Filter', '2023-09-26 02:24:59', '2023-09-26 02:24:59', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `slug`, `title`, `created_at`, `updated_at`, `deleted_at`, `parent_id`) VALUES
(1, 'coffee', 'Coffee', '2023-09-26 05:43:49', '2023-09-26 05:43:49', NULL, 0),
(2, 'equipment', 'Equipment', '2023-09-26 05:43:49', '2023-09-26 05:43:49', NULL, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `coffees`
--

CREATE TABLE `coffees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coffee_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coffee_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `grind_id` int(11) DEFAULT NULL,
  `weight_id` int(11) DEFAULT NULL,
  `coffee_desc` text COLLATE utf8mb4_unicode_ci,
  `coffee_about` text COLLATE utf8mb4_unicode_ci,
  `coffee_aroma` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coffee_finish` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coffee_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'media/product/coffee.jpg',
  `coffee_status` int(11) NOT NULL DEFAULT '0',
  `coffee_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coffee_price` int(11) DEFAULT NULL,
  `coffee_home` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `coffee_taste` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coffee_acidity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coffee_body` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coffee_dise` int(11) DEFAULT NULL,
  `coffee_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coffee_yield` int(11) DEFAULT NULL,
  `coffee_temp` int(11) DEFAULT NULL,
  `amount` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `coffees`
--

INSERT INTO `coffees` (`id`, `coffee_slug`, `coffee_title`, `category_id`, `brand_id`, `grind_id`, `weight_id`, `coffee_desc`, `coffee_about`, `coffee_aroma`, `coffee_finish`, `coffee_image`, `coffee_status`, `coffee_code`, `coffee_price`, `coffee_home`, `created_at`, `updated_at`, `deleted_at`, `coffee_taste`, `coffee_acidity`, `coffee_body`, `coffee_dise`, `coffee_time`, `coffee_yield`, `coffee_temp`, `amount`) VALUES
(1, 'supreme-blend', 'Supreme Blend', 1, 1, 1, 2, NULL, '<p>Supreme is our signature espresso blend enjoyed all across New Zealand. This coffee is our most complex in terms of blend makeup and contains a range of origins, varietals, and processing methods. Supreme displays a full-bodied richness, a crisp, cradling acidity, and lingering cocoa finish. The blend is based around a combination of Central American coffees which provide the core flavour elements and refined acidity. To this we add from a seasonal selection of coffees to keep Supreme tasting great year-round.</p>', 'Caramel, Malt, Toast', 'Malt & Chocolate Wheatens', 'media/product/1778264018813245.png', 1, 'SBE250', 12, 1, '2023-09-26 06:56:38', '2023-10-20 00:49:01', NULL, 'Milk Chocolate & Citrus | Sweet & Complex', 'Refined & Cradling', 'Smooth & Creamy', 18, '28-32', 36, 94, -1),
(2, 'brazil-blend', 'Brazil Blend', 1, 1, 1, 2, NULL, '<p>A blend of several excellent Brazils, roasted medium-dark to give a milk chocolate cup, a smooth silky body and a long finish. Lower in acidity, Brazil Blend makes plush espresso and mixes well in milk drinks. The farms contributing to this blend are of the new breed in Brazil, a country better known for quantity over quality agriculture. These farms have adopted a quality-focused, low yield approach with environmental concerns to the fore, and are showing the rest of the local industry that this is indeed a sustainable and profitable business model</p>', 'Dark Chocolate, Cedar, Almond', 'Peanut Slab', 'media/product/1778269869005585.png', 1, 'BBS250', 12, 1, '2023-09-26 19:37:58', '2023-10-20 00:19:12', NULL, 'Chocolate & Hazelnut | Smooth & Rich', 'Citric & Malic', 'Soft & Silky', 18, '28-32', 36, 94, 0),
(3, 'boxer-blend', 'Boxer Blend', 1, 1, 1, 2, NULL, '<p>A Brazil-based blend designed with the espresso drinker in mind. With its distinctive dark chocolate notes, full body and pleasant finish, the Boxer blend makes gutsy milk drinks, and hefty espresso. The Brazil base provides Boxer with its delicious chocolatey flavours while the Central American and Asia Pacific coffees help impart a balanced acidity with a maple syrup sweetness</p>', 'Dark Cocoa, Spice, Cedar', 'Malt & Chocolate', 'media/product/1778264463302660.png', 1, 'BB250', 12, 1, '2023-09-26 19:37:58', '2023-10-20 00:28:14', NULL, 'Dark Chocolate & Malt Biscuits | Full & Bold', 'Balanced', 'Viscous', 18, '28-32', 36, 94, -4),
(4, 'no.7-blend', 'No.7 Blend', 1, 1, 1, 2, NULL, '<p>No. 7, our darkest roast, used to go by the name of Caramel. Its new name is derived from our original shop and roastery at 7 Woodward St, where Coffee Supreme began in 1993, and where it is one of the last remaining menu items from that era. No. 7 is a changing blend of high-grown coffees that are dense enough to handle the very dark roast profile. It’s suitable either on its own for those that like a smoky, low-acid, “old world” cup, or as a seasoning element for adding a deeper, darker taste to one of our other coffees</p>', 'Smoky, Burnt Sugar', 'Smoky & Long', 'media/product/1778264584830518.png', 1, 'N7B250', 12, 1, '2023-09-27 05:14:22', '2023-10-20 00:45:37', NULL, 'Malt & Cocoa | Dark & Toasty', 'Soft & Muted', 'Melted Butter & Cream', 18, '28-32', 36, 94, -1),
(5, 'am:pm-blend', 'AM:PM Blend', 1, 1, 1, 2, NULL, '<p>If you’re after a coffee for morning times and night times, first coffee of the day and fourth coffee of the day, AM:PM (thanks for the name, Dan Purnell) is for you. Made up of a perfectly balanced 50:50 split of Supreme Blend and Brazil Decaf, this is a coffee for all the time, time after time</p>', 'Smoky, Burnt Sugar', 'Smoky & Long', 'media/product/1778264669031292.png', 1, 'AMPMB250', 12, 1, '2023-09-27 05:14:22', '2023-10-03 10:49:25', NULL, '50% Supreme Blend & 50% Brazil Decaf', NULL, NULL, 18, '28-32', 36, 94, 1),
(6, 'gift-bags-espresso', 'Gift Bags Espresso', 1, 1, 1, 2, NULL, '<p>We know, buying gifts can be a chore, and sometimes chocolates or wine feels too uninspired. So now, we’ve made it nice and easy for you to gift a bag of coffee for every occasion. Whether it’s your second cousin\'s birthday or your uncle’s fifth wedding, we’ve got you. Maybe you’ve got a mate going through a rough patch and you just want to send them a little something to help smooth the way. And, as our parents have always told us, a thank you goes a long way</p>', 'Caramel, Malt, Toast', 'Malt & Chocolate Wheatens', 'media/product/1778264716734717.png', 1, 'GBE250', 13, 0, '2023-09-27 05:33:52', '2023-10-05 11:09:53', '2023-10-05 11:09:53', 'A coffee for every occasion', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(7, 'colambia-tolima-organic', 'Colombia Tolima Organic', 1, 2, 2, 2, NULL, '<p>The department of Tolima is located in the central-western region of the Cordillera de los Andes. Here you\'ll find a small community of farmers who are committed to producing quality coffee while working to minimize the environmental impacts of their coffee production. The cherries are carefully hand-select for optimum ripeness. From there, the cherries are then meticulously washed and dried to create this delicious Biogro certified organic coffee</p>', 'Toasted Almond', 'Toffee Brittle', 'media/product/1778264803315658.png', 1, 'CTOE250', 12, 1, '2023-09-27 05:43:41', '2023-10-13 11:42:29', NULL, 'Plum & Dark Chocolate | Balanced & Sweet', NULL, NULL, NULL, NULL, NULL, NULL, 5),
(8, 'ethiopia-guji-espresso', 'Ethiopia Guji Espresso', 1, 2, 1, 2, NULL, '<p>We’re excited to be able to deliver new Ethiopian coffees with more traceability to their specific growing regions. Previously categorized as a sub-region of larger Sidamo, Guji has now been granted its own designation as a region capable of producing coffees with distinct and unique flavour profiles. This washed Guji espresso delivers all the great characteristics we know and love about Ethiopian coffee. Expect a perfumed citrus aroma with sweet fruit tones, a silky chocolate body and a refreshing lime marmalade finish</p>', 'Lime, Jasmine, Cocoa', 'Lime Marmalade', 'media/product/1778264839467300.png', 1, 'EGEE250', 12, 1, '2023-09-27 05:33:52', '2023-09-28 02:18:25', NULL, 'Milk Chocolate & Berries | Floral & Balanced', 'Crisp, Citric', 'Silky', 18, '28-32', 36, 94, 1),
(9, 'indonesia-mt-raung-washed', 'indonesia mt raung washed', 1, 2, 2, 2, NULL, '<p>A fully washed Arabica from Indonesia; one of the first “new world” homes of coffee. Our Mt. Raung Java has a heavy, creamy body, a soft cradling acidity and pleasant sweetness. It has a familiar Indonesian earthy complexity but is delivered very cleanly, with toast and baker’s chocolate notes to boot. A big, confident coffee best made as espresso but can also be used in a plunger</p>', 'Deep, Earthy, Toast, Cocoa', 'Baker\'s Chocolate', 'media/product/1778264893207961.png', 1, 'IMRWE250', 12, 1, '2023-09-27 05:43:56', '2023-10-20 00:49:01', NULL, 'Cocoa & Tobacco | Earthy & Deep', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(10, 'organic-blend', 'Organic Blend', 1, 1, 1, 2, NULL, '<p>A beautifully balanced blend combining BioGro certified organic coffees \r\nfrom Colombia’s Tolima region. The small community of farmers here are \r\ncommitted to producing quality organic coffee. The coffee cherries are \r\ncarefully hand-selected for optimum ripeness, before being meticulously \r\nwashed and dried. Displaying smooth notes of plum and dark chocolate, \r\nour Organic Blend delivers a lively acidity and full-bodied cup<br></p>', 'Toasted Almond', 'Toffee Brittle', 'media/product/1778734081836645.png', 1, 'OBS250', 12, 1, '2023-10-03 10:17:53', '2023-10-03 10:17:53', NULL, 'Plum & Dark Chocolate | Balanced & Sweet', 'Citric', 'Smooth', 18, '28-32', 36, 94, 1),
(11, 'indonesia-sibalanga', 'Indonesia Sibalanga', 1, 2, 1, 2, NULL, '<p>Hailing from the mountains of Northern Sumatra is, Indonesia Sibalanga, a\r\n coffee that is carefully hand-picked, sorted and wet-hulled by local \r\nproducers. Wet-hulling is a typical process in Indonesia where the \r\ncoffee skins and most of the flesh is removed almost immediately after \r\nharvesting. This process kickstarts the fermentation straightaway \r\nimplementing big, bold and juicy flavours. This espresso pours thick and\r\n smooth, with notes of bittersweet chocolate and citrus<br></p>', 'Cocoa', 'Lime', 'media/product/1778887276173389.png', 1, 'ISE250', 12, 1, '2023-10-05 04:18:22', '2023-10-05 04:18:41', NULL, 'Bittersweet Chocolate & Citrus Fruit | Thick & Smooth', 'Citric', 'Smooth', 18, '28-32', 36, 94, 1),
(12, 'brazil-swiss-water-decaf', 'Brazil Swiss Water Decaf', 1, 2, 1, 2, NULL, '<p>Coming from the largest coffee-producing nation in the world, this \r\nBrazilian decaf uses the Swiss Water decaffeination method which is a \r\n100% chemical-free process. Using pure water, the caffeine in coffee \r\nbeans is gently removed until they are 99.9% caffeine-free, without \r\ncompromising the coffee’s unique body, flavour and aroma \r\ncharacteristics.<br></p>', 'Malt, Toast, Hazelnut, Caramel', 'Clean', 'media/product/1778889115347914.png', 1, 'BSWD250', 12, 1, '2023-10-05 04:42:03', '2023-10-05 04:42:08', NULL, 'Cocoa & Caramel | Smooth & Creamy', 'Soft', 'Thickened Cream', 18, '28-32', 36, 94, 1),
(13, 'brazil-bob-o-link', 'Brazil Bob-o-Link', 1, 3, 1, 2, NULL, '<p>Our Bob-o-link coffees are created under the guidance of our friends at \r\nFazenda Ambiental Fortaleza. FAF is proving year after year that a \r\nquality-driven, low volume approach with a focus on the environment and \r\nfarm health is a sustainable and profitable business model. They have \r\ngrown this vision with surrounding smallholders under the Bob-o-link \r\nbanner for some years now<br></p>', 'Cocoa, Fresh Bread, Hazelnut', 'Lingering Dutch Cocoa', 'media/product/1778890222282272.jpg', 1, 'BBL250', 12, 1, '2023-10-05 04:59:56', '2023-10-05 05:00:00', NULL, 'Caramel & Hazelnut | Buttery & Nutty', 'Fat & Buttery', 'Lightly Citric', NULL, NULL, NULL, NULL, 1),
(14, 'ethiopia-guji-filter', 'Ethiopia Guji Filter', 1, 3, 1, 2, NULL, '<p>We’re excited to be able to deliver new Ethiopian coffees with more \r\ntraceability to their specific growing regions. Previously categorized \r\nas a sub-region of larger Sidamo, Guji has now been granted its own \r\ndesignation as a region capable of producing coffees with distinct and \r\nunique flavour profiles. This washed Guji filter delivers all the great \r\ncharacteristics we know and love about Ethiopian coffee. Expect crisp \r\nacidity with floral berry and stone fruit notes, balanced by a smooth \r\nchocolatey body and lingering baking spice finish<br></p>', 'Floral, Chocolate, Apple Blossom', 'Baking Spice & Red Currant', 'media/product/1778891235869387.png', 1, 'EGF250', 12, 1, '2023-10-05 05:22:43', '2023-10-05 05:19:09', NULL, 'Milk Chocolate & Berries | Floral & Balanced', 'Crisp', 'Smooth', NULL, NULL, NULL, NULL, 1),
(15, 'colombia-huila-decaf', 'Colombia Huila Decaf', 1, 3, 1, 2, NULL, '<p>Coffee can be decaffeinated in multiple ways and this one uses an \r\nespecially delicious process. The caffeine is extracted from the coffee \r\nusing a natural by-product of sugar cane and water. This avoids \r\nexcessive temperatures seen in other decaffeination processes and leaves\r\n an enhanced sweetness. The resulting coffee is not only 97% \r\ncaffeine-free but also fruity, juicy and delicious. Enjoy smooth caramel\r\n flavours, balanced by sweet citrus notes with not even a hint of \r\ndecaf-fy-ness. If you’re looking for something a little darker, or to run through your espresso machine, our trusty <a href=\"https://coffeesupreme.com/products/brazil-swiss-water-decaf\" rel=\"noopener noreferrer\" target=\"_blank\">Brazil Swiss Water Decaf</a> is the one for you.</p>', 'Caramel', 'Easy', 'media/product/1778892195409324.png', 1, 'CHD250', 12, 1, '2023-10-05 05:52:42', '2023-10-05 05:52:48', NULL, 'Citrus Fruits & Caramel | Smooth & Easy', 'Citric', 'Smooth', NULL, NULL, NULL, NULL, 1),
(16, 'Brazil-fazenda-jaguara', 'Brazil Fazenda Jaguara', 1, 3, 1, 2, NULL, '<p>Established back in 2001, Fazenda Jaguara is owned and operated by \r\nhusband and wife, Andre Luiz Garcia and Natalia Moreira Brito. We\'ve had\r\n the pleasure of working with Andre and Natalia for over ten years, and \r\nhave a soft spot for the coffees they produce. After \r\nselective handpicking, Fazenda Jaguara is carefully and slowly dried on \r\nraised beds, which lends a hand to its fruity and flavoursome profile. \r\nNotes of cocoa and peach meet a floral aroma that will have you reaching\r\n for another round. Best enjoyed black through any filter device<br></p>', 'Floral', 'Milk Chocolate', 'media/product/1778895740114370.png', 1, 'BFJ250', 12, 1, '2023-10-05 06:28:11', '2023-10-05 06:28:16', NULL, 'Cocoa & Peach | Smooth & Creamy', 'Citric', 'Smooth', NULL, NULL, NULL, NULL, 1),
(18, NULL, 'Kenya Kayu', 1, 3, 1, 2, NULL, '<p>Nestled in the slopes of the Aberdare Range in Muranga County is the \r\nKayu Coffee Factory. This region has it all – rich, vibrant red soils, \r\nbuckets of rainfall, and high-up altitudes that treat the coffee \r\ncherries just right. Kenya Kayu’s sweet peach and nougat notes bring \r\ndelight to every mouthful. Enjoy a lingering cocoa finish which will \r\nhave you coming back for more<br></p>', 'Sweet', 'Cocoa', 'media/product/1779026397108161.png', 1, 'KK250', 19, 1, '2023-10-06 12:03:03', '2023-10-06 12:03:03', NULL, 'Peach & Nougat | Smooth & Lingering', 'Malic', 'Smooth', NULL, NULL, NULL, NULL, 1),
(19, NULL, 'Guatemala La Libertad', 1, 3, 1, 2, NULL, '<p>High up in the western highlands of Huehuetenango, Guatemala, you’ll \r\nfind La Libertad. Founded in 1958 by Jorge Vides, Finca La Bolsa led the\r\n way for coffee cultivation in the region, now known for its top-quality\r\n beans. Jorge, a doctor and respected farmer, passed away in 1995. \r\nToday, his daughter Maria and grandson Renardo continue his legacy, \r\nfocusing on community support, sustainability, and producing complex \r\ncoffee</p><p>The region is known for its high altitude, plentiful rainfall, lush \r\nshade and moderate temperatures, which all lend a hand to help grow \r\nexceptional coffee. With vibrant flavours of red apple and caramel, this\r\n coffee is one not to miss. Enjoy a crisp citric acidity complemented by\r\n a bittersweet chocolate finish<br></p>', 'Cedar', 'Bittersweet Chocolate', 'media/product/1779026760090206.png', 1, 'GLL250', 17, 1, '2023-10-06 12:08:49', '2023-10-06 12:08:49', NULL, 'Red Apple & Caramel | Complex & Creamy', 'Citric', 'Creamy', NULL, NULL, NULL, NULL, 1),
(20, 'big-joe-filter-blend', 'Big Joe Filter Blend', 1, 3, 1, 2, NULL, '<p>Everyone loves Big Joe, they’re always up for a good time. Comprising \r\ntwo delicious single-origins from Africa, Big Joe is for easy drinking, \r\nall year-round</p><p>Big Joe, just like the name suggests, is big in flavour. This filter \r\nblend is syrupy smooth, with delicate stone fruit and rich chocolate \r\nflavours. Big Joe is friends with nearly everyone too, but gets along \r\nbest with your plunger, Chemex, AeroPress, Moccamaster and cone filter, \r\nbut probably not your espresso machine<br></p>', 'Chocolate Milk', 'Dark Chocolate & Citrus', 'media/product/1779027132875275.png', 1, 'BJFB250', 16, 1, '2023-10-06 12:14:44', '2023-10-13 04:10:32', NULL, 'Chocolate & Stone Fruit | Smooth & Juicy', 'Delicate Citrus', 'Full', NULL, NULL, NULL, NULL, 1),
(21, NULL, 'Colombia Decaf Filter', 1, 3, 1, 2, NULL, '<p>Decaf isn\'t a dirty word here at Supreme. If you ever doubted it, we \r\nencourage you to give it a whirl. Coffee can be decaffeinated in \r\nmultiple ways and this one is an especially delicious process. The \r\ncaffeine is extracted from the coffee using a natural by-product of \r\nsugar cane and water. This avoids excessive temperatures seen in other \r\ndecaffeination processes and leaves an enhanced sweetness. The resulting\r\n coffee is not only 97% caffeine-free but also fruity, juicy and \r\ndelicious. Smooth chocolate and berry flavours meet a balanced citrus \r\nacidity with not even a hint of “decafyness”. Perfect for filter, this \r\ndecaf has a smooth body and a sweet cherry finish<br></p>', 'Flourless Orange Cake', 'Brown Sugar', 'media/product/1779027450503623.png', 1, 'CDF250', 15, 1, '2023-10-06 12:19:47', '2023-10-06 12:19:47', NULL, 'Orange & Carob | Sweet & Syrupy', 'Citric', 'Soft', NULL, NULL, NULL, NULL, 1),
(22, NULL, 'Rwanda Kibirizi', 1, 3, 1, 2, NULL, '<p>Hailing from Rwanda, Kibirizi is produced by a community of 975 local \r\nfarmers who deliver freshly hand picked cherries to the washing station \r\ndaily – ensuring the finest quality in every batch. Boasting jammy fruit\r\n notes, a sweet aroma and tart acidity, Kibirizi holds all of the \r\ncharacteristics we know and love about Rwandan coffees</p><p>Like much of Rwanda, \'the land of a thousand hills\', the terrain where \r\nKibirizi is grown is mountainous, rugged and exceptionally beautiful. \r\nRich volcanic soils, plentiful sunshine, and tropical rainfall provide \r\nexceptional conditions for this delicious drop. If bright, clean and \r\nsweet coffees are your kind of thing, Kibrizi is for you<br></p>', 'Sweet', 'Sweet', 'media/product/1779035321764240.png', 1, 'RK250', 15, 1, '2023-10-06 14:24:54', '2023-10-06 14:24:54', NULL, 'Red Apple & Panela | Sweet & Syrupy', 'Tarty', 'Syrupy', NULL, NULL, NULL, NULL, 1),
(23, 'nicaragua-la-huella', 'Nicaragua La Huella', 1, 3, 1, 2, NULL, '<p>After working with the Mierisch family for the past 14 years (and \r\ncounting), we\'re excited to welcome Nicaragua La Huella to our offering.\r\n After being discovered on the back of a truck for its unique genetics, \r\nthe Miersch family have done a bloody good job refining La Huella into a\r\n stellar drop. This coffee delivers a delightful experience of orange \r\nand brown sugar notes, complemented by a crisp citric acidity and sweet \r\nfinish<br></p>', 'Milk Chocolate', 'Brown Sugar', 'media/product/1779036759777356.png', 1, 'NLH250', 19, 1, '2023-10-06 14:47:45', '2023-10-23 05:11:02', NULL, 'Orange & Brown Sugar | Buttery & Sweet', 'Citrus', 'Mouth Coating', NULL, NULL, NULL, NULL, 2),
(24, 'colombia-la-granada', 'Colombia La Granada', 1, 3, 1, 2, NULL, '<p>La Granada hails from the family that was the first ever to produce the \r\npink bourbon variety in Colombia. Known as \'the godfather\', Snr Gabriel \r\nCastaño discovered a small grove of trees bearing distinctly \r\npink-coloured cherries— where a natural mutation between the red and \r\nyellow bourbon cherries had occurred. Now prized as a variety known for \r\nits sweetness and complex fruit flavour profile, La Granada doesn\'t \r\ndisappoint. With notes of brown sugar and honey, this delicious filter \r\nwill have you refilling your cup in no time<br></p>', 'Sweet', 'Clean', 'media/product/1779036993517016.png', 1, 'CLG250', 20, 1, '2023-10-06 14:51:28', '2023-10-18 04:39:47', NULL, 'Brown Sugar & Honey | Silky & Sweet', 'Orange', 'Silky', NULL, NULL, NULL, NULL, 3),
(25, 'holiday-blend-espresso', 'Holiday Blend Espresso', 1, 1, 1, 2, NULL, '<p>Nestled amidst the aromatic hills, we invite you to step into the world of Coffee Supreme Resort, where the sun is always shining, Piña Coladas flow endlessly and a sun lounger by the pool awaits, just for you. Let your imagination run free, escape the daily grind and embrace the extraordinary whimsy of life that’s Holiday Blend. </p><p>Comprising two delicious coffees from Kenya and Guatemala, Holiday Blend is crafted to bring that timeless resort feeling to your cup — It\'s more than just coffee; it\'s an escape to paradise. This sunkissed, clear-sky coffee will take you where you need to go. Overflowing with festive flavours of luscious milk chocolate and succulent cherries, Holiday Blend is a one-way ticket to a destination where the breeze is forever salty while guaranteeing an unforgettable, everlasting finish. </p><p>Sit back, relax and enjoy your Holiday.</p><p>Download your print–ready Holiday Blend Espresso tasting card <br><br><br><br></p>', 'Salty sea breeze', 'Endless', 'media/product/1780155132857989.png', 1, 'HBE250', 14, 1, '2023-10-18 23:03:49', '2023-10-23 05:10:55', NULL, 'Chocolate & Cherries | Clean & Smooth', 'The season’s first dip', 'Sunblocked & tanned', 18, '28-32sec', 36, 94, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `countries`
--

INSERT INTO `countries` (`id`, `country_title`, `created_at`, `updated_at`) VALUES
(1, 'New Zealand', NULL, NULL),
(2, 'Australia', NULL, NULL),
(3, 'Japan', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `equipments`
--

CREATE TABLE `equipments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `equipment_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `equipment_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `firma_id` int(11) DEFAULT NULL,
  `equipment_desc` text COLLATE utf8mb4_unicode_ci,
  `equipment_about` text COLLATE utf8mb4_unicode_ci,
  `equipment_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'media/product/empty-image.png',
  `equipment_status` int(11) NOT NULL DEFAULT '0',
  `equipment_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `equipment_price` int(11) DEFAULT NULL,
  `equipment_home` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `amount` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `equipments`
--

INSERT INTO `equipments` (`id`, `equipment_slug`, `equipment_title`, `category_id`, `subcategory_id`, `firma_id`, `equipment_desc`, `equipment_about`, `equipment_image`, `equipment_status`, `equipment_code`, `equipment_price`, `equipment_home`, `created_at`, `updated_at`, `deleted_at`, `amount`) VALUES
(1, 'chemex-coffee-maker-classic-series', 'Chemex Coffee Maker - Classic Series', 2, 5, 2, 'An elegant pour-over style glass coffee maker', '<p>The Chemex Coffee Maker brews an exceptionally clean cup of coffee without imparting any flavours of its own. It’s the classic paper-filter manual brewing device</p><p>Made from thermally resistant glass and fastened with a polished wood collar and tie, the Chemex Coffee Maker is the embodiment of elegant simplicity</p><p>Not Microwave or Dishwasher Safe</p><p>Sizes: 3, 6, 8, 10 cups</p>', 'media/product/1779752442309298.png', 1, 'CCM-CS', 60, 1, '2023-10-14 14:36:09', '2023-10-14 12:23:13', NULL, 1),
(2, 'moccamaster-kbg-select', 'Moccamaster KBG Select', 2, 6, 3, 'The latest and greatest Moccamaster Filter Machine', '<p>Moccamaster coffee machines have been handmade in The Netherlands by Technivorm since 1964. While other filter machines roll the dice when it comes to the coffee they produce, the Moccamaster is certified by the Specialty Coffee Association of Europe (SCAE), the Specialty Coffee Association of America (SCAA) and the European Coffee Brewing Centre (ECBC) to brew within industry recognised parameters</p><p>This model features an intelligent hotplate with automatic temperature settings for brewing and holding temperatures. A duel element with a switch to select a half pot or full pot of coffee, ensuring a consistent brew on each setting. Plus automatic drip-stop when the jug is removed</p><p>Guaranteed for 5 years (1 year for commercial use) by Technivorm</p><p>This machine is ideal for home or small office use and features:<br>- Brew time 5-6 minutes<br>\r\n- Aluminium housing<br>- Illuminated on/off switch<br>- Copper boiling element with double safety guard<br>- Automatically switches off power to the boiling element when the water reservoir is empty<br>- Automatically switches off hotplate after 40 minutes (switch on again for another 40-minute cycle)<br>- Mixing lid for a homogenous brew 9 hole spray head for efficient wetting of the coffee grounds<br>- Two temperature settings for warming plate</p><p>Capacity 1.25L</p><p>Dimensions W-D-H (mm): 325 x 170 x 355</p><p>Requires paper filters, sold separately here. One pack included to get you started</p><p>Moccamaster User Guide and Manual</p>', 'media/product/1779752512565362.png', 1, 'MKS', 615, 1, '2023-10-14 14:45:25', '2023-10-14 12:24:20', NULL, 1),
(3, NULL, 'AeroPress', 2, 5, 6, 'The dynamic coffee press', '<p>Developed by record breaking frisbee developer Alan Adler, the AeroPress is that brewer everyone wants. The AeroPress’ dynamic brewing process gives unique cup unlike any other method. A favourite amongst coffee fanatics.</p><p>Includes a pack of filters to get you started.</p><p>Top shelf dishwasher safe.</p><p>Extra Aeropress Filters also available <br><br></p>', 'media/product/1779748337476092.png', 1, 'AP', 75, 1, '2023-10-14 11:17:59', '2023-10-14 11:17:59', NULL, 1),
(4, NULL, 'Moccamaster Spare Thermal Carafe', 2, 6, 3, 'Spare yourself with a backup carafe', '<p>Grab yourself one of these glass lined, stainless steel beauty’s if you\'re in need of a replacement carafe for your </p><p>The Moccamaster Spare Thermal Carafe from Technivorm keeps brewed coffee at the optimal temperature without resulting in any burnt flavors. With a capacity of 1.25 litres it’s the perfect choice for the office or when entertaining large groups at home.</p><p>Moccamaster Glass Lined Carafe Manual.<br><br></p>', 'media/product/1779752809177380.jpg', 1, 'MSTC', 150, 1, '2023-10-14 12:29:03', '2023-10-14 12:29:03', NULL, 1),
(5, NULL, 'Rancilio Silvia V6 M', 2, 7, 4, 'A cafe-quality espresso machine for home', '<p>The Silvia is the single boiler domestic espresso machine for anyone looking to upgrade from an entry-level model. Now in its 6th version, Rancilio first introduced the Silvia in 1998, and they have been perfecting it ever since.</p><p>From the commercial grade port-a-filter, to the full brass boiler, the Silvia V6 M is a well-built, reliable, no frills machine. You won\'t find any superfluous extras on the Silvia, but it lacks none of the important components for great home espresso. You can also hone your latte art skills as the Silvia produces generous, consistent steam pressure.</p><p>Finish your setup with a milk jug and knock box</p><p>Rancilio Silvia product manual<br><br></p>', 'media/product/1779763710118891.png', 1, 'RSV6M', 1355, 1, '2023-10-14 15:22:19', '2023-10-14 15:22:19', NULL, 1),
(6, 'fellow-opus-conical-burr-grinder', 'Fellow Opus Conical Burr Grinder', 2, 8, 7, 'A powerful all-purpose grinder', '<p>Designed to do it all while keeping your countertop classy, Opus includes a volumetric dosing lid to measure beans, a spouted catch for mess-free transitions, anti-static technology to minimize retention, and a grind guide so you’re never lost.</p><p>Features:<br>• 41+ precision settings with intuitive grind guide&nbsp;<br>• Anti-static technology;<br>• C6-40 Burly Burrs™: 6-blade 40 mm conical burrs&nbsp;<br>• 6 Nm of torque&nbsp;<br>• 350 RPM burr speed&nbsp;<br>• Timed autostop&nbsp;<br>• Magnetic catch cup;<br>• Low grind retention;<br>• 110 gram capacity;<br>• Single dose loading for maximum freshness;<br>• Spouted catch for easy transitions;<br>• Compact height and footprint</p><p>Opus Grind Guide</p>', 'media/product/1779764281592408.png', 1, 'FOCG', 399, 1, '2023-10-14 15:31:24', '2023-10-14 15:32:57', NULL, 1),
(7, NULL, 'Stanley Pour Over Coffee Filter', 2, 9, 1, 'Make really good coffee wherever you are', '<p>For those who take their outdoors coffees seriously, the&nbsp;Stanley Pour Over is for you. It features an easy to clean&nbsp;filter that you can use, remove and reuse again, meaning no&nbsp;disposable filters are needed. Just spoon in your favourite&nbsp;Coffee Supreme coffee, fill with hot water, and let the pour&nbsp;over do the rest. Designed to work best with the Stanley Camp Mug and Bottles.</p><p>18/8 stainless steel, BPA-free<br>Stainless steel, easy-clean filter<br>No disposable filters needed<br>Dishwasher safe<br>Weight 8.22g<br>Dimensions 14.7cm L x 11.43cm W x 12.4cm H</p>', 'media/product/1779764733347799.png', 1, 'SPOCF', 55, 1, '2023-10-14 15:38:35', '2023-10-14 15:38:35', NULL, 1),
(8, 'aeropress-go', 'AeroPress Go', 2, 5, 6, 'Delicious coffee, quickly', '<p>The AeroPress Go travel brewer - the ultimate brewer among travellers.</p><p>The AeroPress Go was developed with portability in mind. With a smaller form factor than the classic Aeropress, and a nifty travel case that doubles as a mug, the Aeropress Go can be taken anywhere. Throw it in your tramping bag, glove box or picnic basket to take great coffee wherever you\'re going.</p><p>Includes a pack of filters to get you started.</p><p>Top shelf dishwasher safe.</p><p>Extra AeroPress filters also available <br><br></p>', 'media/product/1780064195098445.png', 1, 'APG', 70, 1, '2023-10-17 12:17:57', '2023-10-17 22:58:24', NULL, 1),
(9, 'bialetti-moka-express-stovetop-black', 'Bialetti Moka Express Stovetop Black', 2, 5, 8, 'An iconic classic, now in black', '<p>The Bialetti Stovetop Moka Express is our go-to for making fresh Italian style coffee at home. Its recognisable, iconic and classic design has made itself a staple in kitchens worldwide since 1933. </p><p>The Bialetti Moka Express is easy to use and produces rich, full-bodied coffee in minutes. Simply add water, your favourite Supreme coffee, seal tightly, and place over heat.</p><p>Features:<br>Suitable for gas and electric stovetops<br>Flip top lid with easy-clasp knob<br>Food-grade aluminum alloy<br>Heat resistant, black plastic handle</p>Available in two sizes in black on 3 and 6 cups<p></p><p>Want to use it on an induction cooktop? Grab your Bialetti Induction Plate <br><br><br></p>', 'media/product/1780065190266753.png', 1, 'BMESB', 75, 1, '2023-10-17 23:14:13', '2023-10-17 23:19:54', NULL, 1),
(10, NULL, 'Bialetti Moka Express Stovetop Silver', 2, 5, 8, 'You can’t beat the classics', '<p>The Bialetti Moka Express Stovetop is our go-to for making fresh Italian-style coffee at home. Invented in the roaring 20s, and mastered by 1933, Alfonso Bialetti\'s stovetop espresso machine gave the world a way to enjoy \"in casa un espresso come al bar” (“An espresso in the home just like one in the bar.”)</p><p>The Bialetti Moka Express Stovetop is easy to use and produces rich, full-bodied coffee in minutes. Simply add water, your favourite Coffee Supreme, seal tightly, and place overheat.</p><p>Features:<br>• &nbsp;Suitable for gas and electric stovetops<br>• &nbsp;Flip-top lid with easy-clasp knob<br>• &nbsp;Food-grade aluminum alloy<br>• &nbsp;Heat resistant, black plastic handle<br>• &nbsp;Available in three sizes in classic silver or black</p><p>Want to use it on an induction cooktop? Grab your Bialetti Induction Plate </p><p>Siza: 3, 6 and 9 cups<br><br><br></p>', 'media/product/1780073851923799.png', 1, 'BBMESS', 75, 1, '2023-10-18 01:31:53', '2023-10-18 01:31:53', NULL, 1),
(11, NULL, 'Gold Coffee Filter', 2, 5, 9, 'Fresh taste with no waste', '<p>This is as easy as it gets for great coffee making.</p><p>The magic of the Gold Coffee filter lies in its gold plated micro foil metal filter. This reusable beauty allows coffee to develop its full flavour without influencing the taste during the filtration process. Perfect for those who do not want to compromise on taste while wanting as little fuss as possible.</p><p>The Gold Coffee filter offers convenience and consistency every time you brew your coffee.<br></p>', 'media/product/1780074146875637.png', 1, 'GCF', 45, 1, '2023-10-18 01:36:35', '2023-10-18 01:36:35', NULL, 1),
(12, NULL, 'Chemex Paper Filters', 2, 10, 2, NULL, '<p>The magic behind the Chemex taste lies in these special filters. By only allowing aromatic coffee oils and caffeine to pass through, the filter paper ensures a clean tasting coffee minus the bitter elements. Approximately 100 filters per box.</p><p>Two filter options available:<br>• FP-2 - for the 3 cup Chemex (CM-1C)<br>• FS-100 - for the 6,8, and 10 cup Chemex (CM-6A, CM-8A, CM-10A)</p><p>Brewing Tip: rinse each filter thoroughly just before use to help minimise paper taint.<br></p>', 'media/product/1780074873216591.png', 1, 'CPF', 17, 1, '2023-10-18 01:48:07', '2023-10-18 01:48:07', NULL, 1),
(13, NULL, 'Hario V60 Paper Filters', 2, 10, 5, NULL, '<p>Paper filter pack for the Hario V60 Ceramic Cone range</p><p>Our marvellous Hario V60 Coffee Dripper series uses particular paper filters to achieve an excellent and consistent quality of extraction. These filters come in packs of 40 or 100 and are designed for a single use.</p><p>Two sizes available:<br>1 Cup: Matches the Hario V60 01<br>2 Cup: Matches the Hario V60 02</p><p>Brewing Tip: rinse each filter thoroughly just before use to help minimise paper taint.<br></p>', 'media/product/1780075525401366.png', 1, 'HV60PF', 11, 1, '2023-10-18 01:58:29', '2023-10-18 01:58:29', NULL, 1),
(14, 'hario-v40-paper-filters', 'Hario V40 Paper Filters', 2, 10, 5, NULL, '<p>Paper filter pack for the Hario V60 Ceramic Cone range</p><p>Our marvellous Hario V40 Coffee Dripper series uses particular paper filters to achieve an excellent and consistent quality of extraction. These filters come in packs of 40 or 100 and are designed for a single use.</p><p>Two sizes available:<br>1 Cup: Matches the Hario V40 01<br>2 Cup: Matches the Hario V40 02</p><p>Brewing Tip: rinse each filter thoroughly just before use to help minimise paper taint.</p>', 'media/product/1780083535491666.png', 1, 'HV40PF', 10, 1, '2023-10-18 04:05:48', '2023-10-18 04:07:05', NULL, 1),
(15, NULL, 'Stanley Camp Mug', 2, 9, 1, 'The Stanley mug will keep your coffee hotter longer', 'Stanley’s Camp Mug is double-wall vacuum insulated, so your favourite drinks stay hot or cold for longer. The secure press-fit TritanTM lid also prevents splashes so you can sip easy in the kitchen, on the job, or around the campfire.<p></p><p>350ml<br>1.5 hours hot<br>3 hours cold<br>15 hours iced<br>18/8 stainless steel, BPA-free<br>Dishwasher safe<br>Weight:300g<br>Dimensions: 120L x 102W x 109H mm</p>', 'media/product/1780084263963540.png', 1, 'SCM', 55, 1, '2023-10-18 04:17:23', '2023-10-18 04:17:23', NULL, 1),
(16, 'stanley-classic-flask-1-9l', 'Stanley Classic Flask 1.9L', 2, 9, 1, 'Keep you favourite beverage hot or cold', '<p>This bottle is built big for all your big adventures. Stanley’s signature vacuum insulation will keep your coffee hot and your iced drinks cold for up to two days. The folding handle allows you to take it anywhere — and prevents it from rolling around in the back of your truck, boat or trailer. It’s also leakproof, packable and easy-to-pour, which makes it a welcome companion on any trip.</p><p>1900ml<br>45 hours hot<br>48 hours cold<br>8 days iced<br>Leakproof and packable<br>18/8 stainless steel, BPA-free<br>Dishwasher safe<br>Weight: 2.50<br>Dimensions: 4.50L x 5.50W x 14.60H in</p>', 'media/product/1780084520017276.png', 1, 'SCF19', 120, 1, '2023-10-18 04:21:27', '2023-10-18 04:46:19', NULL, 3),
(17, 'moccamaster-kbt741-thermal', 'Moccamaster KBT741 Thermal', 2, 6, 3, NULL, '<p>Moccamaster coffee machines have been handmade in The Netherlands by Technivorm since 1964. While other filter machines roll the dice when it comes to the coffee they produce, the Moccamaster is certified by the Specialty Coffee Association of Europe (SCAE), the Specialty Coffee Association of America (SCAA) and the European Coffee Brewing Centre (ECBC) to brew within industry recognised parameters.</p><p>Featuring a thermal carafe which keeps freshly brewed coffee hot for up to 2 hours and an automatic drip-stop. For best results, we recommend you preheat the thermal carafe before brewing and to brew a full carafe to get the correct temperature. Spare carafes also </p><p>This machine is ideal for the office or workplace use and features:<br>- Brew time 5-6 minutes<br>- Aluminium housing<br>- Illuminated on/off switch<br>- Copper boiling element with double safety guard<br>- Automatically switches off power to the boiling element when water reservoir is empty<br>- Mixing lid for a homogenous brew<br>- 9 hole spray head for efficient wetting of the coffee grounds</p><p>Capacity 1.25 liters<br>Measurements W-D H (mm): 325 x 172 x 389<br>Extra filter papers sold separately here. One pack included to get you started.</p><p>Moccamaster User Guide and Manual.</p><p>Color: black</p>', 'media/product/1780085158555294.png', 1, 'MMKBT741', 625, 1, '2023-10-18 04:31:36', '2023-10-18 04:37:22', NULL, 5),
(18, 'keepcup-brew', 'KeepCup Brew', 2, 11, 10, NULL, '<p>The Keep Cup Brew is made from fully tempered soda lime glass - a reusable, durable, bold solution to environmental impact issues. The Changemakers Brew series offers a wide array of colour combinations, to suit all tastes - colours for all! The polypropylene lid and glass cup offer a 100% recyclable solution, and can handle being tossed into any bag, backpack or tote.</p><p>For best results, hand-wash only.</p><p>Three sizes available:<br>XS 170mls / 6oz (limited colours available)<br>Small 227mls / 8oz<br>Medium 340mls / 12oz</p><p>Color: Nitro</p>', 'media/product/1780158519540694.png', 1, 'KCB', 23, 1, '2023-10-18 23:57:39', '2023-10-18 23:57:39', NULL, 1),
(19, 'keepcup-longplay', 'KeepCup Longplay', 2, 11, 10, NULL, '<p>For those who are last to leave the party.</p><p>The Keepcup LongPlay series cups are made from toughened soda lime glass, protected by a durable, clear plastic booster - keeping your hots hot and those cold drinks cooler, for longer.</p><p>Dishwasher safe, but for best results hand wash.</p><p>One size available: Large 454mls / 16oz</p><p>Color: Bland<br></p>', 'media/product/1780161600718538.png', 1, 'KCL', 27, 1, '2023-10-19 00:46:37', '2023-10-19 00:46:37', NULL, 1),
(20, 'keepcup-thermal', 'KeepCup Thermal', 2, 11, 10, NULL, '<p>Press fit lid, lovely to drink from lid on or off. Double wall stainless steel. Vacuum sealed thermal insulation. Drafted vessel for easy pour.</p><p>For best results, hand-wash only.</p><p>Three sizes available:<br>XS 177mls / 6oz<br>Medium 340mls / 12oz<br>Large 454ml / 16oz</p><p>Color: Alder<br></p>', 'media/product/1780162239835895.png', 1, 'KCT', 45, 1, '2023-10-19 00:56:47', '2023-10-19 00:56:47', NULL, 1),
(21, 'hario-coffee-grinder-skerton', 'Hario Coffee Grinder - Skerton+', 2, 8, 5, 'An hand-powered coffee grinder from Hario', '<p>Sporting a detachable glass base that doubles as a storage container for ground coffee, this grinder brings you a blackout-proof solution to all your grinding needs.</p><p>Uses adjustable conical ceramic burrs. Suitable for grinding coffee for filter brewing methods.</p><p>Hario Manual.<br></p>', 'media/product/1780162616378009.png', 1, 'HCGS', 70, 1, '2023-10-19 01:02:46', '2023-10-19 01:02:46', NULL, 1),
(22, 'porlex-coffee-grinder-ii', 'Porlex Coffee Grinder II', 2, 8, 11, 'A portable, hard-wearing coffee grinder', '<p>The Porlex\'s ceramic burrs, stainless steel body and compactness make it an excellent hardy travel companion.</p><p>Available in two sizes, the Porlex Mini Hand Grinder II grinds up to 20g of coffee beans at a time, while the Porlex Tall Hand Grinder II is capable of grinding a full 40g.</p><p>The sharp ceramic burrs produce consistent uniform grounds suitable for your Hario V60, espresso machine, and everything in between. Beneath the burrs you’ll find the grind adjustment wingnut, offering over 12 grind settings — right for damn fine, left for a bit more coarse. And with a 15cm handle, there’s just the right amount of leverage to make grinding a breeze.</p><p>Size: Mini<br></p>', 'media/product/1780163216159544.png', 1, 'PCGII', 120, 1, '2023-10-19 01:12:18', '2023-10-19 01:12:18', NULL, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `firmas`
--

CREATE TABLE `firmas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `firmas`
--

INSERT INTO `firmas` (`id`, `slug`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 'Stanlay', '2023-10-12 14:20:29', '2023-10-12 14:20:29', NULL),
(2, NULL, 'Chemex', '2023-10-12 14:25:37', '2023-10-12 14:25:37', NULL),
(3, NULL, 'Technivorm', '2023-10-12 23:52:02', '2023-10-12 23:52:02', NULL),
(4, NULL, 'Rancilio', '2023-10-12 23:52:55', '2023-10-12 23:52:55', NULL),
(5, NULL, 'Hario', '2023-10-12 23:53:35', '2023-10-12 23:53:35', NULL),
(6, NULL, 'AeroPress', '2023-10-14 11:12:32', '2023-10-14 11:12:32', NULL),
(7, NULL, 'Fellow', '2023-10-14 15:24:33', '2023-10-14 15:24:33', NULL),
(8, NULL, 'Bialetti Industrie', '2023-10-17 23:09:01', '2023-10-17 23:09:01', NULL),
(9, NULL, 'Ezicaf', '2023-10-18 01:34:56', '2023-10-18 01:34:56', NULL),
(10, 'keepcups', 'KeepCups', '2023-10-18 23:53:25', '2023-10-18 23:53:25', NULL),
(11, 'porlex', 'Porlex', '2023-10-19 01:09:27', '2023-10-19 01:09:27', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `grinds`
--

CREATE TABLE `grinds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `grinds`
--

INSERT INTO `grinds` (`id`, `slug`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'whole-beans', 'Whole Beans', '2023-09-26 04:53:42', '2023-09-26 04:53:42', NULL),
(2, 'espresso', 'Espresso', '2023-09-26 04:54:49', '2023-09-26 04:54:49', NULL),
(3, 'stovetop', 'Stovetop', '2023-09-26 04:55:23', '2023-09-26 04:55:23', NULL),
(4, 'plunger', 'Plunger', '2023-09-26 04:55:59', '2023-09-26 04:55:59', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_09_26_043733_create_roles_table', 1),
(6, '2023_09_26_053738_create_categories_table', 2),
(7, '2023_09_26_071210_create_brands_table', 3),
(8, '2023_09_26_095000_create_grinds_table', 4),
(9, '2023_09_26_103240_create_weights_table', 5),
(10, '2023_09_26_112200_create_coffees_table', 6),
(11, '2023_09_26_173219_add_taste_coffees_table', 7),
(12, '2023_09_26_173947_modify_user_table', 8),
(14, '2023_10_02_064605_create_wishlists_table', 9),
(15, '2023_10_04_113349_add_field_to_coffees_table', 10),
(18, '2023_10_05_064732_create_order_items_table', 11),
(19, '2023_10_05_064930_create_orders_table', 11),
(20, '2023_10_06_062321_add_filds_to_users_table', 12),
(21, '2023_10_08_155250_create_rubrics_table', 13),
(25, '2023_10_08_155257_create_posts_table', 14),
(27, '2023_10_11_042621_create_towns_table', 16),
(28, '2023_10_11_043119_create_countries_table', 17),
(29, '2023_10_10_173503_create_teams_table', 18),
(32, '2023_10_12_182342_create_firmas_table', 19),
(33, '2023_10_13_051802_add_fild-to-categories-table', 20),
(35, '2023_10_13_052558_create_sub_categories_table', 21),
(37, '2023_10_13_082852_add_amount_to_coffees_table', 22),
(38, '2023_10_14_114238_create_equipments_table', 23),
(39, '2023_10_14_114240_add_amount_to_equipments_table', 24),
(41, '2023_10_14_114250_add_equipment_id_to_wishlists_table', 25),
(42, '2023_10_19_083603_create_subscribers_table', 26);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_delivery` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_status` int(11) NOT NULL DEFAULT '0',
  `order_total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` int(11) NOT NULL,
  `coffee_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coffee_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coffee_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coffee_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coffee_weight` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coffee_grind` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coffee_qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coffee_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rubric_id` int(11) DEFAULT NULL,
  `post_bern` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_content` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `post_slug`, `post_title`, `post_image`, `rubric_id`, `post_bern`, `post_content`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '15-minutes-with-clementine-of-some-things-i-like-to-cook', '15 MINUTES WITH CLEMENTINE OF SOME THINGS I LIKE TO COOK', 'media/post/1779279654912426.jpg', 4, '23.09.2021', '<p>Meet Clementine Day, a Melbourne-based, self-taught cook. She runs Some Things I Like To Cook, an evolving project that celebrates the joy of food, drawing a meaningful connection between food, people and play</p>\r\n            <p>We\'re big fans of Clementine\'s relaxed and unfussy approach, which empowers even the most inexperienced of cooks to create memorable experiences based around the simple act of eating and entertaining. She is passionate about encouraging others to have fun and trust their intuition in the kitchen, and her candid refreshing approach to recipe writing feels like having a supportive best friend alongside as your cooking companion</p>\r\n            <p>We recently reached out to hear all about Clementine\'s cooking journey, and how it came to be. While we were at it, we even managed to snag her Coffee, Chocolate & Hazelnut Cake recipe that uses yours truly</p>\r\n            <p><i>Q: Hey Clem, tell us about yourself and Some Things I Like To Cook?</i></p>\r\n            <p>Hi! Well, I’m a self-taught cook living on Wurundjeri land in Naarm (Melbourne). I work in design education during the 9-5 and share recipes via my project Some Things I Like to Cook in all of my other waking hours. Some Things I Like to Cook is an evolving food project that has many iterations. Most actively — sharing recipes and food tidbits via Instagram, but also in the form of a monthly newsletter, a self-published cookbook and some future dining projects are in the works, too</p>\r\n            <p><i>Q: What led you to start Some Things I Like To Cook and your cookbook Coming Together?</i></p>\r\n            <p>I’ve always been very drawn to cooking and food, in general, but as someone who doesn’t enjoy cooking under pressure, I never really knew where I could fit into the food world. Working in a commercial kitchen or in catering wasn’t going to work for me and I think I just kind of accepted that I didn’t have a place in it. Last year, when the world turned upside down and I found myself working from home, I started sharing lots of what I was cooking on Instagram. After realising I should probably give my friends and family the choice to ‘opt-in’, I created a separate page called Some Things I Like to Cook and it really just took off from there</p>\r\n            <p>After months and months in a long lockdown, the thing I was missing the most was being around a dinner table with my friends and sharing food, wine and laughs. I decided to create a little self-published cookbook called Coming Together that was all about celebrating being back together, once we emerged from lockdown late last year. The book follows six long lunches I had at friends houses, the recipes of the food I cooked (including a contributed recipe from each of my friends), playlists and wine pairings and was honestly such a pleasure to create, albeit a huge learning curve</p>\r\n            <p><i>Q: What’s something we’ll always find in your fridge?</i></p>\r\n            <p>So many things! My fridge is always so packed but you’ll always, always find pickles! A great snack and an essential thing to always have on hand</p>\r\n            <p><i>Q: What are your top 3 favourite cookbooks?</i></p>\r\n            <p>Samin Nosrat’s Salt Fat Acid Heat is essential reading for anyone wanting to cook from a book. I really love all of the River Cafe cookbooks, too - such great simple fare. And lastly, Niki Segnit’s The Flavour Thesaurus is a really good one for when you lose inspiration</p>\r\n            <p><i>Q: Who and what do you look to for inspiration?</i></p>\r\n            <p>I get most of my inspiration at the farmers market. I love trying varieties of things that I’ve never seen before and produce that is in season or particularly beautiful, that’s generally where I start. I often buy things without having any dishes in mind, and then I just feel it out in the kitchen</p>\r\n<p>For me cooking is really intuitive and therapeutic, so I kind of just make it up as I go - some good tunes in the background and a glass of wine in hand are mandatory. I am often really inspired by growers, I think their approach to food and the way they handle produce is so beautiful. I grow what I can in my (very small) garden, but I have nothing on some of the wonderful people that I am privileged enough to get produce from</p>\r\n            <p><i>Q: What’s your coffee setup at home</i></p>\r\n            <p>I’m all about filter coffee. I have always had a really low tolerance for caffeine and when I discovered filter coffee it completely changed my relationship with it. I just find the flavours so much more delicate, and fruity floral notes really shine in filter coffee, as well as it being a little more mellow for my sensitive tum</p>\r\n            <p><i>Q: Got a favourite Supreme coffee?</i></p>\r\n            <p>I really like to dip my toe into different varieties each time I buy. Key descriptors I look for are: floral, stone fruits, cherry. At the moment we have the Ethiopia Lalesa filter roast which is *chefs kiss</p>\r\n            <p><i>Q: Smooth or crunchy?</i></p>\r\n            <p>If we’re talking peanut butter I’m crunchy ALLLLL the way</p>\r\n            <p><i>Q: If you could cook a long lunch for anyone, who would it be and why?</i></p>\r\n            <p>At the moment, as silly as this may sound, my Mum. I haven’t seen her much at all over the past 18 months and I miss her so much. All I want to do, when we can again, is cook a long lunch for us and catch up on everything we’ve missed</p>\r\n            <p><i>Q: We bet you’ve got a good list of local spots up your sleeve. Where are your favourite places in Melbourne to eat/drink/takeaway?</i></p>\r\n            <p>Okay! This is serious business</p>\r\n            <ul>\r\n                <li>Hope St Radio</li>\r\n                <li>Carlton Wine Room</li>\r\n                <li>Neighbourhood Wine</li>\r\n                <li>Bar Liberty</li>\r\n                <li>Waxflower Bar</li>\r\n                <li>Florian Eatery</li>\r\n                <li>Monforte Viennoiserie</li>\r\n                <li>Oven St Bakery</li>\r\n                <li>La Pinta</li>\r\n                <li>Juanitos for a sandwich</li>\r\n                <li>& so much more</li>\r\n            </ul>\r\n            <p><i>Q: What’s on the horizon for you and Some Things I Like To Cook?</i></p>\r\n            <p>At the moment, I have the last run of my book Coming Together available for preorder — so I’ll be dispatching all of those soon. But I’m also working on a few ticketed dinner projects for over the summer. Lots of fun things in the works</p>\r\n            <p>Keep up to date with Clementine:</p>\r\n            <p>@somethingsiliketocook</p>\r\n            <p>www.somethingsiliketocook.com.au</p>', '2021-09-23 06:09:41', '2023-10-09 07:08:28', NULL),
(2, 'coffee-chocolate-hazelnut-cake-by-clementine-day', 'Coffee, Chocolate & Hazelnut Cake by Clementine Day', 'media/post/1779279713473595.jpg', 6, '24.09.2021', '<p>Coffee cake is perfect for breakfast, perfect for afternoon tea, perfect in any situation where you need a little pep-up. This one has chocolate and hazelnuts and cardamom and cinnamon and is everything you (I) want a coffee cake to be. This recipe makes enough buttercream for a generous topping if you leave the cake single layered (as pictured) or will also give you enough should you wish to slice your cake in half horizontally and layer it with the buttercream instead. Both are good. You can use plain flour and 1 teaspoon baking soda, along with 1 teaspoon of baking powder if you don’t have self-raising flour. Feel free to use Instant coffee in both the cake and the buttercream, just keep the liquid amounts the same</p>\r\n            <p>Ingredients:</p>\r\n            <ul>\r\n                <li>50g roasted hazelnuts</li>\r\n                <li>150g unsalted butter, softened</li>\r\n                <li>200g caster sugar</li>\r\n                <li>2 eggs</li>\r\n                <li>1 teaspoon vanilla paste or extract</li>\r\n                <li>215g self-raising flour</li>\r\n                <li>1 tablespoon finely ground coffee beans</li>\r\n                <li>0.5 teaspoon ground cardamom</li>\r\n                <li>Pinch of salt</li>\r\n                <li>100g sour cream</li>\r\n                <li>70ml strong espresso, cooled completely</li>\r\n                <li>90g dark chocolate, chopped into shavings</li>\r\n            </ul>\r\n            <p>Method:</p>\r\n            <p>Firstly, preheat your oven to 170 C and grease and line a 20cm cake tin</p>\r\n            <p>Make sure you’ve roasted your hazelnuts. Simply weigh out 50g hazelnuts and place whole on a baking sheet and roast in the oven for 10-15 minutes until darkened and smelling nice and nutty</p>\r\n            <p>In a food processor, blitz your hazelnuts until they form a fine mealy crumb</p>\r\n            <p>Add your flour, cinnamon, cardamom, finely ground coffee, pinch of salt and ground roasted hazelnuts to a medium sized bowl and combine</p>\r\n            <p>In a stand mixer fitted with a paddle attachment, or using electric beaters, cream butter and sugar together for 5-7 minutes, scraping down the sides a couple of times, until really pale and fluffy</p><p>Add in vanilla, followed by one of your eggs and beat really well. Then add your second egg, and beat again until well combined</p>\r\n            <p>Remove the bowl from your stand mixer and add in half of your dry ingredients. Fold in using a wooden spoon or spatula, it will seem a bit too thick here but don’t be alarmed</p>\r\n            <p>Now add your sour cream and fold again until well combined. Then the last half of your dry ingredients go in - fold until combined. Again, it will seem too thick, but it’s perfect</p>\r\n            <p>Lastly, add your strong espresso and chopped chocolate. Fold one last time until everything is nicely combined and dollop batter into your prepared cake tin. Smooth out the top and place in centre position in the oven for 55-65 minutes, or until a cake tester or knife comes out clean when poked into the middle</p>\r\n            <p>When ready, remove the cake from the oven and leave for 5 minutes in the tin before removing and leaving to cool completely on a wire rack</p>\r\n            <p>Once the cake is completely cooled, prepare your buttercream</p>\r\n            <p>Add your softened butter to a stand mixer with a paddle attachment. Beat until smooth and a few shades paler, approximately 5 minutes</p>\r\n            <p>Add in half of your icing sugar and beat slowly until combined. Increase the speed and beat for about 3 minutes, then add the remaining icing sugar and repeat</p>\r\n            <p>Pour in coffee and cream and beat slowly until combined. Increase the speed and beat for a further 3-5 minutes, until nice and smooth and a pale coffee colour</p>\r\n            <p>Depending on the room temperature when you make this, you may find you need to add a little more cream to get the desired consistency, just be mindful not to make it too wet</p>\r\n            <p>Spread your coffee buttercream all over the top of your cake and decorate however you like, some extra roasted hazelnuts, whole or chopped, scattered over the top is a delicious addition</p>\r\n            <p>Keep up to date with Clementine:</p>\r\n            <p>@somethingsiliketocook</p>\r\n            <p>www.somethingsiliketocook.com.au</p>', '2021-09-24 16:24:27', '2023-10-09 07:09:24', NULL),
(3, 'our-partnership-with-the-mental-health-foundation', 'Our Partnership with the Mental Health Foundation', 'media/post/1779279727846998.jpg', 2, '25.09.2021', '<p>We often say great things happen over a cup of coffee. Sometimes it’s about connecting with a friend or colleague and creating space for conversations about mental health and wellbeing. That’s why it felt right to partner with the Mental Health Foundation of New Zealand</p>\r\n            <p>Coffee brings people together, that’s one of our favourite things about it — it’s social. The simple act of asking someone to catch up and kōrero over a coffee could be all it takes to help them. Coffee is very ritualistic and can help form the basis of routine check-ins with the people in our lives. We’re thrilled to support the Mental Health Foundation’s ongoing great work, whether it be fundraising, encouraging conversations about mental health, and of course, taking care of their office coffee</p>\r\n            <p>Next week (27th - 3rd October), we’ll be celebrating Mental Health Awareness Week, and we’ve got the perfect new coffee to help prompt that conversation with the people nearest to you</p>\r\n<p>100% of the proceeds of this coffee (Nicaragua, La Huella) will be donated to the Mental Health Foundation. This year’s theme is Take Time to Kōrero, Mā te kōrero, ka ora, and we couldn’t think of a better way to connect with someone than over a cuppa</p>\r\n            <p>Each year, the MHF launches a challenge each day during Mental Health Awareness Week. We’re encouraging our team to get involved and we would love to see you do the same. Keep an eye on our Instagram stories to see what each day entails</p>\r\n            <p>If your coffee supplies are ample and it’s not quite time for a top up but you’d like to make a donation, you can do so directly through our Coffee Supreme page here</p>\r\n            <p>Take time to Kōrero. A little chat can go a long way</p>', '2021-09-25 17:14:47', '2023-10-09 07:09:38', NULL),
(5, NULL, 'Tree Planting with Trees That Count', 'media/post/1779271391330837.jpg', 2, NULL, '<p>As we flip our calendars over to September, we know two things: top up your antihistamine prescription and get ready for asparagus season, spring is here. The best bit? Summer is only three months away... Yet, we still find ourselves reminiscing about the summer past and the fun we had on the Cheers Tour</p><p>The Cheers Tour saw us travelling around the North Island for eight weeks. We gave out coffees, visited customers and got to visit some pretty special spots (if you haven’t been to the Te Waihou Walkway, you’re sleeping). We also had that rather large spinning wheel, which saw us dishing our prizes from Whittaker’s, Fix & Fogg & Graze. In our eyes, the jackpot was the donations toTrees That Count — to everyone who “won” a donation, you helped us raise $2,500. This translates to 311 trees. And recently, we got to plant these trees</p><p>A couple of weekends back, a few of the Wellington team headed out to Makara Valley, where they met with the Makaracarpas — a community group who work to improve water quality and biodiversity in the rural catchment west of Wellington. Armed with fresh enthusiasm and coffee and bacon and egg pie (nice one, Amelia), our team joined a few other locals, wielding spades and bamboo stakes to get a grand total of 600+ trees into the ground</p><p>The plot of land that we were planting on, runs along the stream in the Makara valley and is being reverted back to forestlands, after years of serving as both farmland and a golf course. The new owners of the land are keen to help restore the natural diversity, provide green corridors for bird life, and improve water quality that feeds the estery down stream. All of which we think is pretty neat</p><p>It was super rewarding work, and we’re looking forward to driving through the valley in the years to come and being able to say ‘yeah, I planted those trees’. A massive cheers to Trees That Count, the work that do is amazing and we’re looking forward to working more with them in the future to see more trees planted around our beautiful country</p>', '2023-10-09 04:57:07', '2023-10-09 04:57:07', NULL),
(6, NULL, 'The Year Of Challenge', 'media/post/1779344394668893.jpg', 1, NULL, '<p>A piece by Hannah Hofmann,&nbsp;a member of our Melbourne team and&nbsp;green bean buyer</p><p>It’s the time of year that we start to plan our green coffee purchasing for the coming year. While Brazil and \r\nColombia are currently exporting their recent crop, in East Africa and Central America new season harvesting will begin soon. It is a timely moment to reflect on what 2020 has meant for our partners at origin</p><p>It has without a doubt been one of the most challenging years in recent decades. That fact is universal and the global nature of the pandemic is really what has impacted our industry so significantly. In a normal year, if one consumer market slows, another might be buoyed, allowing for surplus green coffee to be exported to a different customer in a different market</p><p>However, In March 2020 when Covid began to escalate, many roasters over the world were forced to reduce their purchasing volumes. In multiple cases what this has meant is that coffees that would normally have been sold on the specialty market had to be sold as commercial grades fetching lower prices than they might have normally, or perhaps weren’t able to be sold at all. Leftover, ageing coffee remaining in a country places a big risk to quality for the coming season, with the possibility that older coffees can be slipped in with fresh coffees hoping buyers won’t notice. For us, in a year where we can’t do our regular origin visits, we will be relying heavily on our long-term supply partnerships to navigate such challenges as these, coming up to the new season</p><p>Fortunately, coffee has largely been viewed as ‘essential’; in most producing countries it is the livelihood of the population, and in consuming countries, it is, well, arguably our life-blood. While restrictions have hampered the normal logistical flow of export and shipping, causing bottlenecks in dry mills and a shortage of containers and shipping space, there has still been movement of coffee. We have been fortunate to receive our containers in reasonable time and certainly with our expected level of quality</p><p>Delayed shipments can have a significant impact at farm level. The knock-on effect of reduced or delayed income in one season can put a significant strain on cash-flow normally used to invest back into the farm in ways like fertilisers to support good maturation for the next harvest or paying for manual labour on the farm; pruning, clearing and new planting among other aspects of farm management. While we can generalise about the effects of Covid globally, it is also the sharing of personal stories that help us to understand the day to day implications for our partners at origin</p><p>In Brazil, our great friend, producer and supply partner Natalia has described 2020 as ‘The Year of Challenge’. Natalia produces and exports her own coffee. This year the biggest focus for her family has been at the farm, managing new plantations and negotiating a short, but very high volume picking season all while navigating covid restrictions. This year Natalia chose to employ some workers from the Northern part of Brazil, where unemployment was high and people have a reputation for good, hard work. These pickers travel many hours from home to the farm, two weeks in advance of starting work, to complete 15 days of self-isolation (and a negative test) before starting in the field</p><p>At La Soledad in Guatemala, Raul and Jose have been planning logistics for hosting pickers for the coming season, starting in a couple of months. With distancing restrictions still in place, they are planning to construct extra accommodation to provide extra distancing measures, and they will need to build hand-washing facilities around the farm. They are predicting increased costs of providing transportation and food to their seasonal workers and will plan accordingly</p><p>In Colombia, producers have begun selling coffee in ways they hadn’t ever before, selling cherry picked straight off the tree or partially dried, to local buyers instead of the usual ‘dry parchment’ product</p><p>Of course, the pandemic has also impacted on currencies around the world and therefore on internal markets. In recent months, both Brazil and Colombia, the world’s largest coffee-producing countries, have been experiencing record high exchange rates with the USD. This pushes up the internal price of commercial-grade coffees, forcing coffee exporters focussed on quality and sustainable pricing, such as Azahar Coffee in Colombia, to suddenly compete with local buyers of regular-grade coffees</p><p>We know that our close supply relationships built over the years will certainly show mutual value for us and our partners at origin in such a critical year as this. We are confident that the suppliers we work with really know the profiles and qualities of coffee we like to buy. We have every trust that our supply lines remain secure and are grateful for the flexibility and compassion shown to us in recent months. In turn, we aim to provide the value of loyalty and commitment to paying the right price coming into the new season</p><p>The reality for all of us is that we don’t know what 2021 will bring, as government subsidies reduce for both individuals and businesses, and the pandemic ebbs and flows in waves around the world. However, we have all been trained this year in navigating the unexpected! We’re ready to support the industry in any and every way we can think of; both our supply partners at origin and our wholesale and retail customers here at home. We’ll roll with the punches and can’t wait to bring more fantastic coffees and celebrate the hard work and dedication that our friends at origin have put in</p>', '2023-10-10 00:17:29', '2023-10-10 00:17:29', NULL),
(7, NULL, 'Tales of Rwanda with Heath Cater', 'media/post/1779344922483028.jpg', 1, NULL, '<p>If you\'ve had the honour of meeting Heath Cater, you\'ll know he\'s a bit of a legend. He\'s our GOD (Group Operation Director) and has been with Supreme for 22 years. He\'s also a member of our green buying team. Heath\'s been visiting Rwanda and hanging out with the growers for years, so we asked him to pen some insights for us. Over to Heath...</p><p>They call Rwanda the land of 1000 hills. It’s a beautiful place, even majestical some would say. It’s truly one of the most scenic countries I have visited to source green coffee. Rwanda’s beauty is not restricted to the coffee farms — the amazingly manicured tea plantations, that cover the winding hills for as far as the eye can see, play an integral role too</p><p>However the land has not always known beauty, Rwanda has a very checkered past, culminating with the Rwandan genocide of 1994. Many movies and written pieces about this dark time in Rwanda’s history make for sobering viewing and reading. Personally, for me, I am in awe of how positive, friendly and welcoming the Rwandan people are, considering the tragedies they have been faced with, and the strides the country has made since this time</p><p>Rwandan coffee began to gain importance after international taste tests pronounced it among the best in the world. Now, Rwanda earns revenue from coffee and tea exports</p><p>Gitesi is a private washing station owned and run by Alexis and Aime Gahizi, a father and son duo. Located in the Gitesi Sector of Western Rwanda, the washing station was built in 2005 and began processing coffee in 2006</p><p>‘What’s a washing station?’ I hear you asking… Well, it can get very complicated but in short, washing stations act as a delivery point for coffee cherry. The coffee is weighed in cherry form and this is the initial way to determine payment for the farmers. This process alone has multiple steps: a machine removes the cherry from the outside of the coffee bean, the beans are then floated to remove substandard coffee, next, is the fermentation stage and then onto a drying bed before it is packed and sent to the mill for processing</p><p>Coffee Supreme have been buying coffee from Rwanda for six years. I’ve been lucky enough to head over there three times. We look forward to buying and receiving our Rwandan coffees every year. These are a crucial component of our blends and a much-awaited single origin coffee too</p><p>The Gitesi Project was started four years ago by Tim Williams of Bureaux Collective in Melbourne, in partnership with Alexis and Aime Gahizi (the owners of the Gitesi Washing Station). Pretty promptly, Tim invited us to take part in the project, naturally, we jumped at it. There were many reasons we were excited to be involved, but one of the biggest attractions was the out of the box approach to helping communities in the area</p><p>Let us unpack this a little for you. The idea behind the Gitesi Project is to raise money to buy cows for coffee producers — we’ll get onto the benefits of the cows in a minute. Roasters around Australia and New Zealand are approached to be involved, they then roast, pack and sell the coffee and all of the proceeds go back to the Gitesi community. It helps that the coffee is delicious, but it\'s about way more than the coffee</p><p>Let’s talk about the cows. In the last four years, 54 families have been provided with a cow, a shelter for the cow, and additionally, their vet costs have been covered. On top of this, 100 families have been able to afford health insurance. Over time the aim of the Project is to reduce the reliance of the household’s financial wellbeing on coffee. The cows also provide benefits in many other ways. First, the unpredictability of coffee has less of an effect on each family’s wellbeing, because protein and nutrition can be sourced through milk from the cows. Furthermore, not only are families less affected, instead, their general wellbeing improves, as they have constant access to vital nutrients. Secondly, Tim hopes to see an increase in the incomes of cow-owning households, as excess milk is sold and becomes a secondary income stream</p><p>This an amazing project that provides us with clear positive changes to an entire community. It\'s a pleasure for us to give a small amount of time and effort, which in turn allow us to see huge benefits</p>', '2023-10-10 00:25:52', '2023-10-10 00:25:52', NULL),
(8, NULL, 'Dani’s Holiday Cold Brew Recipe', 'media/post/1779349234870110.jpg', 1, NULL, '<p>Cold brew — your best mate on a scorcher of a day. We asked Dani at Coffee Supreme Abbotsford, to share her Holiday cold brew recipe with us. It’s easy and it’s delicious</p><p>What you need<br>\r\n- Your favourite coffee beans. We recommend Holiday Blend<br>\r\n- A vessel. Could be a beautiful Hario cold brewer, could be your trusty French Press, could be a Pyrex<br>\r\n- A filter of some sort. You’ll need to separate the coffee grinds from the brew after extraction and before consumption. No one literally wants to eat coffee for breakfast...<br>\r\n- Water - tap water is absolutely fine. But, if you’re feeling fancy, bottled distilled water<br>\r\n- Optional, a grinder. We’re after a coarser grind, filter to plunger grind (think rock salt)</p><p>The ratio 1:15 for ready-to-drink cold brew. That’s 67g of coffee to 1 litre of water. If you’re after something punchier, try 1:12 or 1:10</p><p>If you’re wanting to make more of a concentrate you could make a 1:5 brew, 200g coffee to 1 litre water. It\'s great for things like espresso martinis (are we still drinking those?) at the beach when the Linea Mini had to stay home</p><p><b>Method</b></p><p>Place the ground coffee in your vessel, pour in all of the cold water; covering the grinds evenly. If you’ve got a bit of extra time up your sleeves, you can pop in a dash (50g) of boiling water to “bloom” the coffee. This brings out some flavour notes that only release from hot extraction</p><p>Get in there with a spoon and agitate those grinds, making sure they are fully saturated</p><p>Leave to extract at room temp for 12-24 hours. Then, remove your coffee grinds and pop it in the fridge to chill or serve with ice immediately. Cold brew will happily sit in your fridge for 5 days, but I doubt it’ll last that long</p>\r\n<p>If you’re tight on time or always have a cup or two left, here’s another method: brew your coffee however you normally make it and pop it in the fridge. Works a treat</p>', '2023-10-10 01:34:25', '2023-10-10 01:34:25', NULL),
(9, '2reports-from-the-field-augusto-borges-ferreira-of-capadocia-coffee', 'Reports From The Field — Augusto Borges Ferreira of Capadócia Coffee', 'media/post/1779351602437255.jpg', 1, NULL, '<p>For our second episode of Reports From The Field we’ve got Augusto Borges of Capadócia Coffee. Augusto is a fourth-generation coffee farmer from the Mantiqera de Minas region of Brazil, who’s known to produce some of the region’s best coffee. We’ve been working with Augusto for over five years and each year, his coffees are a highlight on our menu. At the moment, they feature strongly in each of our core blends: Supreme, Brazil and Boxer. Not only does Augusto produce delicious coffee, but he also has a strong interest in creating a better future for the generations to come, evident through a recent project where he converted his dry mill to solar power. Somehow, amongst his busy schedule, Augusto has written us a first-hand account of what it’s like growing coffee in Brazil in 2022. We think it’s a really great read, pop the kettle on</p>\r\n\r\n<p>Hello, friends of Coffee Supreme, my name is Augusto Borges, today I will tell you a little bit about our history and the main challenges in the production of specialty coffee here in Brazil</p>\r\n\r\n<p>I\'m from the fourth generation of coffee growing in our family and the only one who has continued in coffee growing on both sides of my family. We\'ve lived on the farm since 2007 and in 2010, we started working with specialty coffee, changing and breaking family paradigms. Because by the way, no one knew what specialty coffee was. Our property was called Fazenda Fortaleza until 2013 but there were a lot of farms with the same name, so we decided to change it to Capadócia — we like flying a lot and the hot air balloons that you often see in Cappadocia, inspire us</p>\r\n\r\n<p>When you drink a small cup of specialty coffee you can feel how great this coffee world is. In recent years the farm has grown more than 100%, with all the money we earn, we reinvest in the property by increasing production and making new partners. In this journey, our first challenge was to choose our partners, so that was our main challenge: we want to produce, but to whom are we going to sell?</p>\r\n\r\n<p>Partnerships like the one we have with Coffee Supreme have helped us to produce quality coffee because it means we practically have a guaranteed sale. We have been working with Coffee Supreme since 2017 and this year, we will celebrate five years of our partnership. This consistency in the relationship is one of the main things for the sustainability of production</p>\r\n\r\n<p>In coffee growing, there are three major challenges: our first challenge today is climate change — it has drastically interfered with production. The second challenge is the high fertiliser costs. Brazil is not self-sufficient in fertilisers; we depend on the import of fertilisers from the rest of the world. The third challenge is labour, it’s scarce and few people want to work in the field</p>\r\n\r\n<p>To overcome these challenges, we have adopted sustainable practices to reduce the impact on the environment. These problems will not be solved overnight but in the long term, for the next generations</p>\r\n\r\n<p>We have already adopted more ecological measures (such as solar panels) in the production of coffee that have given good results. In the case of fertiliser, our property has increasingly invested in compound fertiliser, which is made right here in Brazil using cow and chicken manure. We now have more options, but we have also been faced with high costs</p>\r\n\r\n<p>Speaking a little bit now about the rural exodus, the lack of labour, I have shown my son that coffee growing is viable and sustainable. When we talk about sustainability we are not only talking about the environment but also economic, social and environmental sustainability. It’s about having access to schools, to the internet, and how to have a good car to be able to take a ride with the family. We need to have a good house to be able to live on the farm, coffee production has brought this sustainability</p>\r\n\r\n<p>Today, our greatest pleasure in working with coffee beyond production is meeting people around the world. I never imagined being able to travel and make friends worldwide. Coffee has brought us relationships that we have never expected. Today we can talk to our partners on the other side of the world at any time. The speed of information and transparency connected us, made us closer. Coffee brings you that, these stories, these relationships and it\'s a motivation for us to produce even more, here at Capadócia</p>\r\n\r\n<p>We are launching a project to plant trees, we have to be not only a coffee producer but also a water producer because water is life. We need to teach this to the next generations, we have to preserve the environment, we have to align coffee production with forest production, we have to produce forests, produce water, and produce oxygen</p>\r\n\r\n<p>Today we are getting to know the world through coffee, something that my father and grandparents did not have the opportunity to do so. I’m showing this to my son, he is starting to participate in the coffee events here in Brazil, showing this road of the coffee farm, the special way of specialty coffee, so it will encourage him to stay here at Capadócia</p>', '2023-10-10 02:12:03', '2023-10-10 02:28:15', NULL),
(10, 'on-the-road-part-one', 'On The Road – Part One', 'media/post/1780165460290807.jpg', 3, NULL, '<p>We reckon the old adage, ‘what happens on tour, stays on tour’ is pretty boring. And, as we hit the two-week milestone of our eight-week road trip, we thought it was about time we fill you in on the details. </p><p>But, first, we should probably introduce you to the faces of the Tour. Hannah and Soph (that’s me), are the girls behind the wheel, well not collectively, but I do make for a pretty good co-pilot — need water? Consider this the hydration station. Getting sleepy? Fatboy Slim on full blast coming right up. </p><p>Introducing, Hannah Dellow.</p><p><i>Q: Day job?</i><br>Hannah: Director of Opium Entertainment.</p><p><i>Q: Favourite beach?</i><br>Hannah: I’m not fussy, as long as I can swim, but Ohope Beach has a bit of nostalgia for me.</p><p><i>Q: Most played road trip song?</i><br>Hannah: Been enjoying a bit of Parallel Dance Ensemble.</p><p><i>Q: Favourite road trip snack?</i><br>Hannah: Proper Crisps, dangerously good.</p><p>And me, Sophie Evans.</p><p><i>Q: Day job?</i><br>Soph: Marketing Manager at Coffee Supreme.</p><p><i>Q: Favourite beach?</i><br>Soph: Same as Han, I’m not fussy. But I did just spend two weeks learning to surf at Oceans Beach in Whangarei Heads, which was pretty special.</p><p><i>Q: Most played road trip song?</i><br>Soph: Into The Mystic, Van Morrison.</p><p><i>Q: Favourite road trip snack?</i><br>Soph: Roadside stone fruit.</p><p>On Tuesday 5th Jan, Doug and I scooped our Toyota Fortuner from Rutherford &amp; Bond (cheers to Toyota for getting the wheels spinning on this whole thing) and packed (read: crammed) the caravan full. We thought we were doing a good job, but the look on Fraser’s, our head roaster, face told us differently. With a little help from Fras, who couldn’t stand to watch our cowboyish behaviour any longer, we were good to go. Doug and I took a moment to stop, cheers our coffees and take a breath as we headed for Martinborough Top 10. We were stoked. </p><p>We had made it about 500 metres down the road when the beeping started — we’d loaded the back seat so heavily that the seat belt sensors registered that three humans had joined us for the trip. With another swift unpack, repack and cheers, we hit the road for real this time and made it over the Remutakas.</p><p>After an awesome first stop at Martinborough Top 10 (Cheers to Frank and Lisa), we proceeded to cross Masterton, Hastings, Havelock North, Taihape, Taupo, Turangi, Te Awamutu, Cambridge, Hamilton, Tauranga and Mount Maunganui off our list. After our stint in Hawke’s Bay, Doug tapped out and Hannah subbed in. </p><p>We’ve served over 1,000 cups of coffee, given away around 100 blocks of Whittaker’s, jars of Fix &amp; Fogg and bags of Skinny Dipped Almonds and made heaps of people’s days with the spinning wheel. It’s been smooth sailing, other than driving from Taihape to Taupo with the caravan break on, breaking the generator and locking the keys in the caravan outside New World Turangi. </p><p>That’s it from me, it’s 27 degrees at Waihi Beach and the ocean (and my last pack of Coromandel Smoked Mussels) are calling. </p><p>Stay posted with our travels on Instagram and we’ll catch you back here in a couple of weeks. <br><br><br><br><br><br></p>', '2023-10-19 01:34:22', '2023-10-19 01:47:58', NULL),
(11, 'on-the-road-part-two-three', 'On The Road – Part Two & Three', 'media/post/1780166128439022.jpg', 3, NULL, '<p>Hello, again.</p><p>A fair bit has happened since I last checked in — we’ve visited Hahei, Whitianga and Thames, Hannah finally checked ‘go north of Auckland’ off her bucket list when we graced Warkworth and Matakana with our presence, we traversed the motorways of Auckland for two weeks, had a short pitstop in Waiuku, and then, following the change in Alert Levels, made our way back to Wellington with our final meal of the road trip being a kebab in Bulls — delectabull, am I right?</p><p>If you’re more of a numbers person, that’s: 47 stops,&nbsp;2,000 cups of coffee served, 1 generator break down, 1,500-ish spins on the wheel, 1 mild concussion,&nbsp;Numerous good swims, 200 blocks of Whittaker’s, jars of Fix &amp; Fogg and bags of Skinny Dipped Almonds given out, 1 portrait of Doug &amp; Soph drawn (we welcome more), $1250 in the pool for Trees That Count, Too many mentions of ‘I’d be lost without this reverse camera’ from Hannah, 1 wasp trapped in Soph’s shorts</p><p>While we’re gutted that we had to cancel the Northland and Manawatū-Whanganui legs of our trip due to Covid, we realise how incredibly lucky we are to have been able to spend the past seven weeks driving around the North Island and spending time with you all.</p><p>For the next two weeks, the caravan will be popping up around the capital city. If you’re yet to come and visit, clear your calendar and have a look at the itinerary. Our final stop of the Cheers Tour will be at Wellington’s beloved, Newtown Festival. Come on down, it’s always a treat</p><p>See you out there.</p>', '2023-10-19 01:58:35', '2023-10-19 02:07:02', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', NULL, NULL),
(2, 'Author', 'author', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `rubrics`
--

CREATE TABLE `rubrics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rubric_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rubric_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `rubrics`
--

INSERT INTO `rubrics` (`id`, `rubric_slug`, `rubric_title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'coffee', 'Coffee', '2023-10-08 16:10:38', '2023-10-08 16:10:38', NULL),
(2, 'community', 'Community', '2023-10-08 16:10:38', '2023-10-08 16:10:38', NULL),
(3, 'events', 'Events', '2023-10-08 16:10:38', '2023-10-08 16:10:38', NULL),
(4, 'interviews', 'Interviews', '2023-10-08 16:10:38', '2023-10-08 16:10:38', NULL),
(5, 'products', 'Products', '2023-10-08 16:13:51', '2023-10-08 16:13:51', NULL),
(6, 'recipes', 'Recipes', '2023-10-08 16:13:51', '2023-10-08 16:13:51', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `subscribers`
--

INSERT INTO `subscribers` (`id`, `user_id`, `user_name`, `user_email`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Admin', 'admin@gmail.com', '2023-10-19 04:08:11', '2023-10-20 01:07:48', '2023-10-20 01:07:48'),
(2, 5, 'Mixail', 'wd-asha@bk.ru', '2023-10-19 05:45:53', '2023-10-19 06:49:12', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL DEFAULT '0',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `slug`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 2, NULL, 'Manual Brewing', '2023-10-13 02:00:32', '2023-10-13 02:00:32', NULL),
(6, 2, NULL, 'Filter Machines', '2023-10-13 02:01:02', '2023-10-13 02:01:02', NULL),
(7, 2, NULL, 'Espresso Machines', '2023-10-13 02:01:42', '2023-10-13 02:01:42', NULL),
(8, 2, NULL, 'Grinders', '2023-10-13 02:02:17', '2023-10-13 02:02:17', NULL),
(9, 2, NULL, 'Accessories', '2023-10-13 02:04:57', '2023-10-13 02:04:57', NULL),
(10, 2, NULL, 'Filter Papers', '2023-10-18 01:42:46', '2023-10-18 01:42:46', NULL),
(11, 2, 'keepcups', 'KeepCups', '2023-10-18 23:34:48', '2023-10-18 23:34:48', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `team_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `town_id` int(11) DEFAULT NULL,
  `team_dept` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `team_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'media/team/empty-image.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `teams`
--

INSERT INTO `teams` (`id`, `team_slug`, `team_title`, `country_id`, `town_id`, `team_dept`, `team_image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, NULL, 'Alice Rison', 1, 1, 'Tech Dept', 'media/team/1779435420990441.jpg', '2023-10-11 00:24:18', '2023-10-11 00:24:18', NULL),
(3, NULL, 'Jason Pipi', 1, 2, 'Technical Dept', 'media/team/1779436031759450.jpg', '2023-10-11 00:34:01', '2023-10-11 00:34:01', NULL),
(4, NULL, 'Steve McGregor', 1, 3, 'Sales Dept', 'media/team/1779436407304535.jpg', '2023-10-11 00:39:59', '2023-10-11 00:39:59', NULL),
(5, NULL, 'Stephanie Moore', 1, 1, 'Customer Care', 'media/team/1779436745017958.jpg', '2023-10-11 00:45:21', '2023-10-11 00:45:21', NULL),
(6, NULL, 'Neave Griffin', 1, 1, 'Customer Care', 'media/team/1779436815248421.jpg', '2023-10-11 00:46:28', '2023-10-11 00:46:28', NULL),
(7, NULL, 'Chris Thompson', 1, 1, 'Sales Dept', 'media/team/1779436894982516.jpg', '2023-10-11 00:47:44', '2023-10-11 00:47:44', NULL),
(8, NULL, 'Cara McDonnell', 2, 4, 'Account Manager', 'media/team/1779437006324155.jpg', '2023-10-11 00:49:30', '2023-10-11 00:49:30', NULL),
(9, NULL, 'Angus Short', 2, 4, 'Account Manager', 'media/team/1779437056678721.jpg', '2023-10-11 00:50:18', '2023-10-11 00:50:18', NULL),
(10, NULL, 'Jaylan Martin', 2, 4, 'Account Manager', 'media/team/1779437101705193.jpg', '2023-10-11 00:51:01', '2023-10-11 00:51:01', NULL),
(11, NULL, 'Liz Wood', 2, 4, 'Tech & Despatch Dept', 'media/team/1779437155795128.jpg', '2023-10-11 00:51:53', '2023-10-11 00:51:53', NULL),
(12, NULL, 'Ash Pearce', 2, 1, 'Marketing & E-commerce', 'media/team/1779437216716873.jpg', '2023-10-11 00:52:51', '2023-10-11 00:52:51', NULL),
(13, NULL, 'Andy Craig', 2, 1, 'Technical Dept', 'media/team/1779437261500502.jpg', '2023-10-11 00:53:33', '2023-10-11 00:53:33', NULL),
(14, NULL, 'Hiroki & Tomoko Matsumoto', 3, 5, 'Coffee Supreme Japan', 'media/team/1779437323283793.jpg', '2023-10-11 00:54:32', '2023-10-11 00:54:32', NULL),
(15, 'matt-lynch', 'Matt Lynch', 3, 5, 'Roasting Dept', 'media/team/1779437359691440.jpg', '2023-10-11 00:55:07', '2023-10-11 01:15:07', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `towns`
--

CREATE TABLE `towns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `town_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `towns`
--

INSERT INTO `towns` (`id`, `town_title`, `created_at`, `updated_at`) VALUES
(1, 'Wellington', NULL, NULL),
(2, 'Auckland', NULL, NULL),
(3, 'Christchurch', NULL, NULL),
(4, 'Melbourne', NULL, NULL),
(5, 'Tokyo', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '2',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `birthday_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apartment_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `role_id`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `birthday_user`, `shipping_user`, `apartment_user`, `phone_user`) VALUES
(1, 'Admin', 1, 'admin@gmail.com', NULL, '$2y$10$tg.HO8ix/nzkkwa.c0GjSezqXqpzb6BUxKQ9rioosNLeYdJl/WuzG', NULL, '2023-09-25 09:53:03', '2023-10-18 01:13:41', NULL, '11.11.1965', 'Челябинская обл., Аша', 'Ленина, 48-60', '89043000734'),
(2, 'Author', 2, 'szn-asha@bk.ru', NULL, '$2y$10$1Wn81Wj.OZjPkaCOigW5aOGtBoKUWF8TIE0xJeRVqeIRlNB.akTdu', NULL, '2023-09-25 09:53:10', '2023-10-13 13:49:56', NULL, '11.11.1965', 'Челябинская обл., Аша', 'Ленина, 48-60', '89043000734'),
(3, 'User', 2, 'user@gmail.com', NULL, '$2y$10$ZzaIOUkMcUkfUR8R8wa3yu3rJCrJJuTCfcisy2oU2JczBOynNchpi', NULL, '2023-09-26 00:24:39', '2023-10-24 23:24:19', NULL, NULL, NULL, NULL, NULL),
(5, 'Mixail', 2, 'wd-asha@bk.ru', NULL, '$2y$10$UrFFGohX1PECajpOn7t/3eeitHKkiVxYPHVgnVbwGWlC5F8//iF66', 'L7ILgxHD78HnATIVQ5eWzh9bDZ1l1I35HjfYZm8HI8wQG2almjsxLoSWO0lA', '2023-10-15 13:27:55', '2023-10-17 05:19:55', NULL, '01.01.1980', 'Омск', 'Чкалова, 122', '89043000722');

-- --------------------------------------------------------

--
-- Структура таблицы `weights`
--

CREATE TABLE `weights` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `weights`
--

INSERT INTO `weights` (`id`, `slug`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '150', '150', '2023-09-26 05:35:36', '2023-09-26 05:35:36', NULL),
(2, '250', '250', '2023-09-26 05:36:17', '2023-09-26 05:36:17', NULL),
(3, '500', '500', '2023-09-26 05:36:34', '2023-09-26 05:36:34', NULL),
(4, '1000', '1000', '2023-09-26 05:36:49', '2023-09-26 05:36:49', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coffee_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `equipment_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `coffee_id`, `created_at`, `updated_at`, `deleted_at`, `equipment_id`) VALUES
(26, '1', '3', '2023-10-15 11:08:54', '2023-10-15 11:08:54', NULL, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `coffees`
--
ALTER TABLE `coffees`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `equipments`
--
ALTER TABLE `equipments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `firmas`
--
ALTER TABLE `firmas`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `grinds`
--
ALTER TABLE `grinds`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `rubrics`
--
ALTER TABLE `rubrics`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscribers_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `towns`
--
ALTER TABLE `towns`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Индексы таблицы `weights`
--
ALTER TABLE `weights`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `coffees`
--
ALTER TABLE `coffees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `equipments`
--
ALTER TABLE `equipments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `firmas`
--
ALTER TABLE `firmas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `grinds`
--
ALTER TABLE `grinds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `rubrics`
--
ALTER TABLE `rubrics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `towns`
--
ALTER TABLE `towns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `weights`
--
ALTER TABLE `weights`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `subscribers`
--
ALTER TABLE `subscribers`
  ADD CONSTRAINT `subscribers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
