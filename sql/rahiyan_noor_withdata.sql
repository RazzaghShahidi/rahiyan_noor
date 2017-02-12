-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2017 at 12:28 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rahiyan_noor`
--

-- --------------------------------------------------------

--
-- Table structure for table `ammaliyat`
--

CREATE TABLE `ammaliyat` (
  `ammaliyat_id` int(11) NOT NULL,
  `ammaliyat_name` varchar(50) NOT NULL,
  `ammaliyat_start_date` varchar(10) DEFAULT NULL,
  `ammaliyat_end_date` varchar(10) DEFAULT NULL,
  `ammaliyat_operation_code` varchar(250) DEFAULT NULL,
  `ammaliyat_Strength` varchar(250) DEFAULT NULL,
  `ammaliyat_commander_name` varchar(50) DEFAULT NULL,
  `ammaliyat_description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ammaliyat`
--

INSERT INTO `ammaliyat` (`ammaliyat_id`, `ammaliyat_name`, `ammaliyat_start_date`, `ammaliyat_end_date`, `ammaliyat_operation_code`, `ammaliyat_Strength`, `ammaliyat_commander_name`, `ammaliyat_description`) VALUES
(11, 'فارسی', NULL, NULL, NULL, NULL, 'علی باقری', 'توضیحات'),
(12, 'ولفجر', NULL, NULL, NULL, NULL, 'علی باقری', 'توضیحات'),
(13, 'ثارالله', NULL, NULL, NULL, NULL, 'علی باقری', 'توضیحات'),
(17, 'دزفول', '1359/07/23', '1359/07/23', '-', 'ارتش', 'علی باقری', 'تثبیت پل نادری و عقب راندن دشمن از قسمتی از غرب کرخه'),
(21, 'شیرازیا', '1458/58/58', '1452/85/85', 'یا مهدی', '58نفر سپاه', 'علی باقری', 'یل');

-- --------------------------------------------------------

--
-- Table structure for table `ammaliyat_manategh`
--

CREATE TABLE `ammaliyat_manategh` (
  `id` int(11) NOT NULL,
  `ammaliyat_id` int(11) NOT NULL,
  `manategh_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ammaliyat_manategh`
--

INSERT INTO `ammaliyat_manategh` (`id`, `ammaliyat_id`, `manategh_id`) VALUES
(1, 9, 8),
(5, 11, 2),
(6, 11, 3),
(7, 11, 4),
(8, 12, 2),
(9, 12, 3),
(10, 12, 4),
(11, 13, 9),
(12, 17, 5),
(13, 17, 2),
(14, 20, 18),
(15, 20, 23),
(16, 21, 12),
(17, 21, 25);

-- --------------------------------------------------------

--
-- Table structure for table `manategh`
--

CREATE TABLE `manategh` (
  `manategh_id` int(11) NOT NULL,
  `manategh_name` varchar(50) NOT NULL,
  `manategh_description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manategh`
--

INSERT INTO `manategh` (`manategh_id`, `manategh_name`, `manategh_description`) VALUES
(2, 'کرخه', 'توضیحات'),
(3, 'شوش', 'توضیحات'),
(4, 'ابادان', 'توضیحات'),
(5, 'خرمشهر', 'توضیحات'),
(6, 'شلمچه', 'توضیحات'),
(8, 'فکه', 'توضیحات'),
(9, 'هورالعجم', 'توضیحات'),
(12, 'دهلران', 'شهر دهلران،مركز شهرستان دهلران است و در مسير جاده مهران- انديمشك واقع شده است.ارتش عراق پس از پيروزي انقلاب با سازماندهي افراد ضد انقلاب و نفوذ دادن برخي عناصر حاشيه نشين مرز به منطقه ايلام و با توسل به اقدامات رعب آور، كوشيد حاكميت نظام جمهوري اسلامي ايران را در اين مناطق تضعيف كند.اين تعرضات در شهريور 1359، افزايش يافت و در 31/6/1359 به هجوم سراسري سپاه سوم ارتش عراق به خاك دهلران انجاميد،دهلران از آغاز تا پايان جنگ بارها هدف تجاوز ارتش عراق قرار گرفت و هر بار آسيب بسياري ديد.شهر دهلران 4 مرتبه مورد اشغال عراق قرار گرفت.در حملات هوايي ارتش عراق،45 تن از ساكنان دهلران شهيد و 60 تن مجروح شدند.در مقابل،رزمندگان اسلام نيز با اجراي عمليات هاي متعدد، دشمن را سلب و مناطق تحت اشغال متجاوزين را آزاد كردند.دهلران شاهد دلاوري ها و فداكاري هاي مردان بزرگ بسياري بود و هنوز بر تارك شهر دهلران هنوز نام و تصوير مردان آسماني چون شهيدعبدالصالح امينيان،شهيد هدايت صحرايي و... به چشم مي خورد.در تاسوعاي 1381، پنج شهيد گمنام عمليات محرم در ورودي شرقي اين شهر به خاك سپرده شدند. '),
(13, 'شرهاني', 'در كيلومتر 45 جاده دهلران- انديمشك،در منتهی اليه جاده عين خوش – چم سري (جاده شهيد خرازي) و در نزديكي پاسگاه چم سري، منطقه شرهاني و يادمان عمليات محرم قرار دارد.اين يادمان در واقع مقر گروه تفحص لشگر 14 امام حسين (ع)اصفهان بود كه در اين منطقه و محدوده فكه شمالي و زبيدات عراق به تفحص شهدا مي پرداختند و شهداي تفحص شده را در معراج شهدي آن نگهداري كرده و سپس به معراج شهداي اهواز منتقل می كردند.در سال 1388 پيكر مطهر يك شهيد گمنام در اين محل به خاك سپرده شد كه امروز زيارتگاه زائران و كاروان هاي بازديد كننده از اين منطقه است.عمليات محرم در تاريخ 8/10/1361 توسط سپاه پاسداران انقلاب اسلامي با رمز «يا زينب(س)» در اين منطقه انجام گرفت،همچنين ارتش عراق در عمليات 21/4/67 در اين منطقه تعدادي از عزيزان ارتش جمهوري اسلامي ايران به شهادت رسيده و عده اي مفقود شدند. پل دويريج:در مسير جاده عين خوش به پاسگاه چم سري پلي به روي رود خانه دويريج قرار دارد كه در شب عمليات محرم بر اثر بارندگي شديد و جاري شدن سيلابي سهمگين، رودخانه دويرج به طور غير منتظره اي طغيان كرد كرد و 30 تن از رزمندگان لشگر 14 امام حسين (ع) را كه در كنار دويرج آماده عمليات شده بودند با خود برد.اين پل اكنون به نام شهداي عمليات محرم نام گرفته است. '),
(14, 'امام زاده عباس (ع)', 'دشت عباس در مسير دهلران – انديمشك و در غرب عين خوش قرار دارد.اين دشت منطقه وسيعي از غرب رودخانه كرخه تا حوالي سه راهي ابوغريب را شامل مي¬شود و به دليل وجود مدفن امام زاده عباس از نوادگان حضرت عباس (ع) در آن ، بدين نام معروف شده است. ارتش عراق پس از اشغال عين خوش به سوي دشت عباس حركت كرد و تيپ 42 لشگر 10 زرهي عراق در4/7/1359 در دشت عباس مستقر شد.دشت عباس حدود 18 ماه اشغال ماند،رزمندگان اسلام به ويژه گردان انصار لشگر 27 محمد رسول ا... (ص) به فرماندهي شهيد اسماعيل قهرماني در عمليات فتح المبين نبرد سختي در اطراف امام زاده عباس داشتند كه موفق شدند بسياري از تانك ها و نفر برهاي دشمن بعثي را منهدم و اراضي اطراف مرقد امام زاده را آزاد كنند.در سال 1364 ، شش شهيد گمنام عمليات فتح المبين توسط رزمندگان لشگر 58 ذوالفقار ارتش كشف و در قبرستان كنار امام زاده به خاك سپرده شدند كه امروز زيارتگاه اهالي منطقه و زائران راهيان نور مي باشد.'),
(15, 'دو كوهه', 'دو كوهه نام منطقه و پادگاني است كه در 4 كيلومتري شمال غربي شهر انديمشك و در مجاورت جاده انديمشك – خرم اباد قرار دارد.پادگان دو كوهه قبل از انقلاب يك پادگان پشتيباني براي لشگر 92 زرهي اهواز و مقرهاي نظامي جنوب غربي كشور در نظر گرفته شده بود،كه در بهمن ماه 1360 در اختيار تيپ تازه تأسيس محمد رسول ا... (ص) به فر ماندهي جاويد الاثر حاج احمد متوسليان قرار گرفت.اين پادگان عقبه يگان هاي عمل كننده در عمليات فتح المبين بود. لشگر 10 سيد الشهدا (عليه السلام) نيز در همين پادگان تشكيل و راه اندازي گرديد.امروز نام زیبای سردار بي نشان حاج احمد متوسليان بر تارك دو كوهه مي درخشد،حسينيه اش هنوز بوی عطر یاران آخر الزمانی امام حسین (علیه السلام) را دارد و صدای همت که تو را به اخلاص می خواند از آن به گوش می رسد. حسینیه گردان تخریب و قبرهای خالی محل مناجات و استغاثه ، یاد آور اخلاص تخریب چی هاست. در دو کوهه مردانی آسمانی همچون متوسلیان ، شهبازی ، همت ، چراغی ، کریمی ، دستواره ، وزوایی ، موحد دانش ، مهتدی ، سعید سلیمانی و بسیاری دیگر از یاران امام روح ا... زیسته اند. در طرفین حسینیه شهید همت دو کوهه 4 شهید گمنام آرمیده اند که زیارتگاه زائران و راهیان سرزمین نور شده اند. \r\n'),
(16, 'اندیمشک', 'اندیمشک شمالی ترین شهر استان خوزستان است و به دلیل آن که گلوگاه خوزستان محسوب می شود، از نظر نظامی اهمیت خاصی دارد . طولانی ترین بمباران تاریخ ایران نیز در 4 آذر ماه 1365 در این منطقه صورت گرفت و شهر اندیمشک ، ایستگاه راه آهن و حومه آن توسط 54 فروند از هواپیماهای دشمن بمباران شد و بیش از 300 نفر شهید و حدود 700 نفر مجروح شدند. اندیمشک در دوران دفاع مقدس میزبان رزمندگان از نقاط مختلف ایران اسلامی بوده است و همچون مادری آن ها را در آغوش می گرفت . معراج شهدای عملیات فتح المبین در این شهر قرار داشت. در تاریخ 13/12/1381 ، پیکرهای مطهر 5 شهید گمنام در ورودی جنوبی شهر دفن شدند و بر نورانیت این شهر افزودند. \r\n'),
(17, 'دزفول', 'دزفول در شمالی ترین استان خوزستان واقع شده است. این شهر در دوران دفاع مقدس 169 مرتبه مورد حمله موشکی قرار گرفت ؛ به طوری که در میان کشورهای حوزه خلیج فارس به « بلد الصواریخ» یعنی «شهر موشک ها » مشهور شد ، اما مردم دلیر و خون گرم دزفول شهر را ترک نکرده و در راه دفاع از میهن اسلامی و اهداف والای خود 2600 شهید تقدیم اسلام نمودند . این شهر پس از جنگ به پاس مقاومت هایشان ، به عنوان شهر نمونه انتخاب شد. پایگاه چهارم شکاری (پایگاه وحدتی) : این پایگاه با انجام 1515 سورتی پرواز برون مرزی در زمان دفاع مقدس و تقدیم 45 شهید ، جانباز و آزاده خلبان و بیش از 534 شهید ، جانباز و آزاده غیر خلبان در دوران پرافتخار دفاع مقدس درخشیده است پایگاه وحدتی شاهد حضور مردان بزرگی چون شهیدان عباس بابایی و حسین لشگری که از افتخارات نیروی هوایی ارتش جمهوری اسلامی ایران محسوب می شوند بوده است. این پایگاه در سال 1389 به یاد مردان آسمانی خود مفتخر به خاکسپاری یک شهید گمنام گردید. امامزاده سبز قبا : بقعه سبز قبا در کنار پل دزفول قرار دارد. بنا به روایت سید نعمت ا... شوشتری این امامزاده فرزند امام موسی کاظم (ع) می باشد. این امامزاده در ایام مقدس یکی از میعادگاه ها و محل های برگزاری نماز و دعاهای رزمندگان بود. \r\n'),
(18, 'فتح المبین', 'در شمال غربی شوش و در غرب رودخانه کرخه ؛ دشت فتح المبین قرار دارد که یادآور حماسه و عملیات پیروزمندانه فتح المبین و شهدای والا مقام این منطقه می باشد. این عملیات در تاریخ 2/1/1361 با رمز یا زهرا (س) و فرماندهی مشترک ارتش و سپاه در این منطقه انجام شد. در این یادمان که در 8 کیلومتری شهر شوش واقع شده است ، 8 شهید گمنام به خاک سپرده شده اند . دشمن بعثی در روزهای اولین جنگ تا پشت رودخانه کرخه پیشروی کرد و بر شهر شوش و جاده اندیمشک – اهواز مسلط شد. رزمندگان اسلام در این جبهه یک خط دفاعی شکل داده و عملیات امام مهدی (عج) را در روزهای پایانی سال 1360 طرح ریزی و با فرماندهی شهید مجید بقایی به اجرا در آورند. این رزمندگان که قصد رخنه به سنگرهای دشمن در منطقه را داشتند در این شیارها با سنگرهای کمین دشمن درگیر شده و تعداد زیادی از ایشان در این شیارها به شهادت رسیدند. سایت های 4 و 5 رادار : این منطقه در 18 کیلومتری غرب شهر شوش و در دامنه ارتفاعات ابو صلیبی خات قرار دارد . با اشغال غرب شوش این منطقه به تصرف بعث درآمد. صدامیان برای حملات موشکی و توپخانه به شهرهای شمال خوزستان از این سایت ها استفاده می نمود . رزمندگان اسلام برای آزاد سازی این سایت ها در عملیات فتح المبین نبرد جانانه ای انجام داده و مقاومت سرسختانه عراق را درهم شکستند بعد از عملیات تعدادی از فرماندهان ارشد عراق که در این شکستند. بعد از عملیات تعدادی از فرماندهان ارشد عراق که در این منطقه عقب نشینی کرده بودند به دستور صدام اعدام یا زندانی شدند. \r\n'),
(20, 'کانال کمیل و حنظله', 'در سال 1359 توسط دشمن و به دست مهندسان فرانسوی کانال به طول 90 کیلومتر و عرض 5 متر و ارتفاع 4 متر کاملا" حرفه ای و مهندسی شده حفر شد . این کانال در منطقه حمرین معروف به کانال حمرین و در منطقه شرهانی معروف به کانال شرهانی و کمیل و در خاک عراق معروف به کانال بجلیه است. این کانال منحصر به فرد و دارای چند سه راهی و چهار راهی می باشد که برای موانع و پیشروی رزمندگان اسلام حفر شده بود که سیصد نفر از گردان حنظله در یکی از کانال ها محاصره شدند و اکثراً با آتش مستقیم دشمن یا تشنگی مفرط به شهادت رسیدند . \r\n'),
(21, 'چزابه', 'تنگه چزابه منطقه ای است در شمال غربی شهر بستان که به علت قرار گیری در بین هور و تپه های رملی یک گلوگاه محسوب شده و به دلیل قرار داشتن در مسیر دستیابی به شهرهای بستان و سوسنگرد از موقعیت ویژه ای برخوردار است. چزابه یکی از 5 محور اصلی هجوم ارتش بعثی به خوزستان بود. در هجوم 31/6/1359 به چزابه ، با وجود مقاومت مدافعان اندک آن، ارتش عراق نتوانست موقعیت خود را تا 2/7/1359 در چزابه تثبیت کند. دشمن سرانجام در روز 3/7/1359 با عبور ازچزابه به طرف تپه های ا...کبر و بستان پیشروی کرد.از آن زمان چزابه در اشغال بود تا اینکه در 8/9/1360 در جریان عملیات طریق القدس آزاد شد. این منطقه همچنین شاهد رشادت و شهادت رزمندگان تیپ 57 حضرت ابوالفضل (ع) در عملیات والفجر 6 در اسفند سال 62 نیز بوده است. \r\n'),
(22, 'مناجات', 'توضیح'),
(23, 'فارسی', 'dfv'),
(25, 'بیت', 'توضیح مناطق');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `media_id` int(11) NOT NULL,
  `media_title` varchar(50) NOT NULL,
  `media_file_name` varchar(255) NOT NULL,
  `media_size` decimal(10,0) NOT NULL,
  `media_path` varchar(250) NOT NULL,
  `media_detail` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`media_id`, `media_title`, `media_file_name`, `media_size`, `media_path`, `media_detail`) VALUES
(1, 'عنوان', '2_-_Copy5', '284', 'C:/xampp/htdocs/rahiyan_noor/admin/uploads/2_-_Copy5.jpg', 'توضیحات'),
(3, 'عنوان', '28', '284', 'C:/xampp/htdocs/rahiyan_noor/admin/uploads/28.jpg', 'توضیح'),
(4, 'عنوان', '2_-_Copy6', '284', 'C:/xampp/htdocs/rahiyan_noor/admin/uploads/2_-_Copy6.jpg', 'j,qdo'),
(5, 'عنوان', '29', '284', 'C:/xampp/htdocs/rahiyan_noor/admin/uploads/29.jpg', 'j,qdo');

-- --------------------------------------------------------

--
-- Table structure for table `media_term`
--

CREATE TABLE `media_term` (
  `id` int(11) NOT NULL,
  `term_type` varchar(10) NOT NULL,
  `term_id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `media_term`
--

INSERT INTO `media_term` (`id`, `term_type`, `term_id`, `media_id`) VALUES
(7, 'manategh', 3, 4),
(8, 'ammaliyat', 11, 4),
(9, 'shahidan', 4, 4),
(10, 'manategh', 3, 5),
(11, 'ammaliyat', 11, 5),
(12, 'shahidan', 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `meta`
--

CREATE TABLE `meta` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `media_id` int(11) DEFAULT NULL,
  `detail` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `meta_term`
--

CREATE TABLE `meta_term` (
  `id` int(11) NOT NULL,
  `meta_id` int(11) NOT NULL,
  `term_type` int(11) NOT NULL,
  `term_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `shahidan`
--

CREATE TABLE `shahidan` (
  `shahidan_id` int(11) NOT NULL,
  `shahidan_name` varchar(20) NOT NULL,
  `shahidan_familly` varchar(20) NOT NULL,
  `shahidan_birth_place` varchar(15) NOT NULL,
  `shahidan_date_of_birth` varchar(15) NOT NULL,
  `shahidan_date_of_deth` varchar(15) NOT NULL,
  `shahidan_biography` text,
  `shahidan_will` text,
  `shahidan_picture` longblob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shahidan`
--

INSERT INTO `shahidan` (`shahidan_id`, `shahidan_name`, `shahidan_familly`, `shahidan_birth_place`, `shahidan_date_of_birth`, `shahidan_date_of_deth`, `shahidan_biography`, `shahidan_will`, `shahidan_picture`) VALUES
(4, 'مسعود', 'باقری', 'تهران', '1338/08/08', '1388/08/24', 'زندگی نامه', 'وصیت', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shahidan_ammaliyat`
--

CREATE TABLE `shahidan_ammaliyat` (
  `id` int(11) NOT NULL,
  `shahidan_id` int(11) NOT NULL,
  `ammaliyat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shahidan_ammaliyat`
--

INSERT INTO `shahidan_ammaliyat` (`id`, `shahidan_id`, `ammaliyat_id`) VALUES
(7, 4, 17),
(8, 4, 11),
(9, 4, 12);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(1, 'razagh', '1211258', 'r.sh92@yahoo.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ammaliyat`
--
ALTER TABLE `ammaliyat`
  ADD PRIMARY KEY (`ammaliyat_id`),
  ADD UNIQUE KEY `name` (`ammaliyat_name`);

--
-- Indexes for table `ammaliyat_manategh`
--
ALTER TABLE `ammaliyat_manategh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manategh`
--
ALTER TABLE `manategh`
  ADD PRIMARY KEY (`manategh_id`),
  ADD UNIQUE KEY `name` (`manategh_name`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`media_id`);

--
-- Indexes for table `media_term`
--
ALTER TABLE `media_term`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meta`
--
ALTER TABLE `meta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meta_term`
--
ALTER TABLE `meta_term`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shahidan`
--
ALTER TABLE `shahidan`
  ADD PRIMARY KEY (`shahidan_id`);

--
-- Indexes for table `shahidan_ammaliyat`
--
ALTER TABLE `shahidan_ammaliyat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ammaliyat`
--
ALTER TABLE `ammaliyat`
  MODIFY `ammaliyat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `ammaliyat_manategh`
--
ALTER TABLE `ammaliyat_manategh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `manategh`
--
ALTER TABLE `manategh`
  MODIFY `manategh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `media_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `media_term`
--
ALTER TABLE `media_term`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `meta`
--
ALTER TABLE `meta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `meta_term`
--
ALTER TABLE `meta_term`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shahidan`
--
ALTER TABLE `shahidan`
  MODIFY `shahidan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `shahidan_ammaliyat`
--
ALTER TABLE `shahidan_ammaliyat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
