-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2019 at 08:26 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medimonicz`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `article_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `content` text COLLATE utf8_czech_ci,
  `url` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`article_id`, `title`, `content`, `url`, `description`, `date`) VALUES
(1, 'Informace pro pacienty', '<h3>Vážení rodiče,</h3>\r\n<p> </p>\r\n<p>V době od <strong>22.7.- 2.8.2019</strong> a dále od <strong>12.-23.8.2019</strong> bude ordinace zavřená z důvodu DOVOLENÉ.</p>\r\n<p>Zástup v případě potřeby bude zajištěn následovně:</p>\r\n<ul class=\"list-prepare\">\r\n<li><u>22.7.-2.8.2019:</u>\r\n<ul>\r\n<li><span class=\"red\" style=\"color: #e74c3c;\">MUDr. Šimonová</span> (Lesní 620/A, Milovice; tel.: 325 577 277, aktuální hodiny https://pediatrmilovice.webnode.cz/)</li>\r\n</ul>\r\n</li>\r\n<li><u>12.8-16.8.2019:</u>\r\n<ul>\r\n<li><span class=\"red\">MUDr. Čerňanská</span> (Okrsek 87/34, Lysá nad Labem, tel.: 325 551 988) ORDINAČNÍ HODINY O LETNÍCH PRÁZDNINÁCH-PŘEDEM VOLAT) (pondělí: 8:00-11:00; úterý: 7:30-11:00; středa: 7:30-9:30; čtvrtek: 7:30-12:00; pátek 7:30-12:00)</li>\r\n</ul>\r\n</li>\r\n<li><u>19.8-23.8.2019:</u>\r\n<ul>\r\n<li><span class=\"red\">MUDr. Dáňová</span> (Přemyslova 592/7, Lysá nad Labem, tel.: 325 551 988) ORDINAČNÍ HODINY O LETNÍCH PRÁZDNINÁCH – PŘEDEM VOLAT) (pondělí: 8:00-11:00; úterý: 8:00-11:00; středa: 12:00-15:00; čtvrtek: 8:00-12:00; pátek 8:00-12:00)</li>\r\n</ul>\r\n</li>\r\n</ul>\r\n<h4>Akutní případy ošetří:</h4>\r\n<p>Dětská ambulance v Nymburce (325 505 266) <br />Dětská pohotovost v Mladé Boleslavi (326 742 706)</p>\r\n<h4>POZOR</h4>\r\n<p><span class=\"red\">Potvrzení zdravotní způsobilosti</span> - na tábory, soustředění, zotavovací akce- <strong>může vystavit POUZE Váš registrující lékař.</strong><br />Zajistěte si jej proto s dostatečným předstihem!</p>\r\n<p> </p>\r\n<h4 class=\"center\">DĚKUJEME ZA POCHOPENÍ</h4>\r\n<p> </p>\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"schedule-tab\">\r\n<div class=\"col-md-12 col-sm-12\">\r\n<div class=\"time-info\">\r\n<h3>ORDINAČNÍ HODINY O LETNÍCH PRÁZDNINÁCH</h3>\r\n<table>\r\n<thead>\r\n<tr>\r\n<td>platí od 1.7.2019 do 30.8.2019</td>\r\n<td>NEMOCNÍ</td>\r\n<td>PRO ZVANÉ</td>\r\n<td>PREVENCE A OČKOVÁNÍ</td>\r\n</tr>\r\n</thead>\r\n<tbody>\r\n<tr>\r\n<td>PONDĚLÍ</td>\r\n<td>8:00 - 11:00</td>\r\n<td> </td>\r\n<td>12:00 - 14:00</td>\r\n</tr>\r\n<tr>\r\n<td>ÚTERÝ</td>\r\n<td>8:00 - 11:00</td>\r\n<td> </td>\r\n<td>12:00 - 14:00</td>\r\n</tr>\r\n<tr>\r\n<td>STŘEDA</td>\r\n<td>8:00 - 11:00</td>\r\n<td> </td>\r\n<td>12:00 - 14:00</td>\r\n</tr>\r\n<tr>\r\n<td>ČTVRTEK</td>\r\n<td>8:00 - 11:00</td>\r\n<td> </td>\r\n<td>12:00 - 14:00</td>\r\n</tr>\r\n<tr>\r\n<td>PÁTEK</td>\r\n<td>8:00 - 10:30</td>\r\n<td> </td>\r\n<td>11:00 - 12:00</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<p> </p>\r\n<h3 class=\"red center\">VESELÉ PRÁZDNINY!!!</h3>\r\n<div class=\"wrapper-img\"><img class=\"center\" src=\"http://medimoni.cz/images/mimoni.jpg\" /></div>\r\n<p> </p>\r\n<h3>Aktuální informace:</h3>\r\n<p> </p>\r\n<p>Od 1.3.2018 v naší ordinaci vyšetřujeme CRP z prstu a Streptest A.</p>\r\n<p>Od 12.3.2018 provádíme aplikaci náušnic pomocí STUDEX aplikátoru.</p>\r\n<p>Pro pacienty a ostatní návštěvníky je v naší ordinaci nově k dispozici připojení k internetu.</p>\r\n<p> </p>\r\n<h3>Vážení rodiče, milé děti</h3>\r\n<p class=\"sec-para\">Oznamujeme, že k 31.1.2018 ukončila svoji praxi MUDr. MATASOVÁ. Od 1.2.2018 ordinuje MUDr. NÝVLTOVÁ. V naší ordinaci zabezpečujeme léčebnou a preventivní péči o děti od narození do 19 let. Poskytujeme povinné i nadstandardní očkování.</p>\r\n<p>Máme smlouvu s těmito pojišťovnami: VZP, OZP, VoZP, ZP MVČR, ČPZP, RBP a ZPŠ.</p>\r\n<p> </p>\r\n<h3>Registrace nových pacientů</h3>\r\n<p> </p>\r\n<p class=\"center\"><strong>!!!Až do odvolání přijímáme nové pacienty!!!</strong></p>\r\n<p>Registraci je možné provést telefonicky v ordinačních hodinách. Mimo ordinační hodiny zasílejte, prosím, své žádosti o registraci na výše uvedený e-mail s přiloženým telefonickým kontaktem.</p>\r\n<p> </p>', 'informace', 'informace pro pacienty', NULL),
(2, 'Připravujeme', '<ul class=\"list-prepare\">\n<li class=\"\">Moderní diagnostická vyšetření:\n<ul class=\"list-prepare-2\">\n<li class=\"checked\">vyšetření C reaktivního proteinu (<strong>CRP</strong>) k rozlišení probíhající virové či bakteriální infekce</li>\n<li class=\"checked\">vyšetření <strong>Streptest</strong> k vyloučení/potvrzení streptokokové infekce v krku během několika málo minut</li>\n<li>vyšetření moči pomocí <strong>močového analyzátoru</strong></li>\n<li>vyšetření zraku přístrojem <strong>PlusOptix</strong>. Jedná se o screeningový autorefraktometr, který měří tupozrakost a refrakční vady u dětí od 6-ti měsíců věku. Je upraven tak, aby bylo možno bezkontaktně, rychle a zcela bezbolestně vyšetřit děti, které jsou na běžné vyšetření příliš malé, neposedné, a které nedokáží spolupracovat.</li>\n</ul>\n</li>\n<li class=\"checked\">Aplikace náušnic pomocí STUDEX aplikátoru.</li>\n<li class=\"checked\">Zapůjčení kojenecké váhy</li>\n<li class=\"checked\">Zapůjčení aerochamberu (pomůcka k efektivní inhalační léčbě zánětu průdušek)</li>\n</ul>', 'pripravujeme', 'pripravujeme', NULL),
(3, 'CENÍK VÝKONŮ NEHRAZENÝCH ZDRAVOTNÍMI POJIŠŤOVNAMI PLATNÝ K 1.2.2018', '<table class=\"table table-hover\">\n<tbody>\n<tr>\n<td>Přihláška do jeslí, MŠ, SŠ, VŠ - první</td>\n<td>100 Kč</td>\n</tr>\n<tr>\n<td>Přihláška do jeslí, MŠ, SŠ, VŠ – druhá a další</td>\n<td>50 Kč</td>\n</tr>\n<tr>\n<td>Posudek o zdrav. způsobilosti – pro potřeby školy, brigády</td>\n<td>100 Kč</td>\n</tr>\n<tr>\n<td>Posudek o zdrav. způsobilosti – zotavovací akce (škola v přírodě, letní tábor,…)</td>\n<td>100 Kč</td>\n</tr>\n<tr>\n<td>Posudek o zdravotní způsobilosti pro organizovaný sport</td>\n<td>100 Kč</td>\n</tr>\n<tr>\n<td>Výpis ze zdravotní dokumentace pro sportovního lékaře</td>\n<td>200 Kč</td>\n</tr>\n<tr>\n<td>Výpis ze zdravotní dokumentace</td>\n<td>200 Kč</td>\n</tr>\n<tr>\n<td>Řidičský průkaz</td>\n<td>400 Kč</td>\n</tr>\n<tr>\n<td>Potravinářský průkaz</td>\n<td>200 Kč</td>\n</tr>\n<tr>\n<td>Výpis pro pojišťovnu dle náročnosti</td>\n<td>150 - 300 Kč</td>\n</tr>\n<tr>\n<td>Vystavení nového očkovacího průkazu dle náročnosti</td>\n<td>100 - 300 Kč</td>\n</tr>\n<tr>\n<td>Aplikace nepovinného očkování</td>\n<td>200 Kč</td>\n</tr>\n<tr>\n<td>Aplikace náušnic nastřelením, včetně náušnic</td>\n<td>600 Kč</td>\n</tr>\n<tr>\n<td>Aplikace náušnic kanylou</td>\n<td>200 Kč</td>\n</tr>\n<tr>\n<td>Aplikace náušnic pomocí aplikátoru STUDEX</td>\n<td>300 Kč</td>\n</tr>\n<tr>\n<td>Aplikace náušnic kanylou</td>\n<td>300 Kč</td>\n</tr>\n<tr>\n<td>Náušnice z chirurgické oceli dle výběru</td>\n<td>150 - 350 Kč</td>\n</tr>\n<tr>\n<td>Vyšetření CRP (z prstu)</td>\n<td>150 Kč</td>\n</tr>\n<tr>\n<td>Vyšetření Streptest A</td>\n<td>150 Kč</td>\n</tr>\n</tbody>\n</table>', 'cenik', 'cenik', NULL),
(4, 'APLIKACE NÁUŠNIC', '<h3>Nastřelování náušnic</h3>\n<p>Metoda propíchnutí ucha pomocí setu od americké firmy STUDEX. Náušnice se již klasicky nenastřelují pistolí, ale uši se jemně propíchávají. Hrot jehly se nachází v těsné blízkosti ucha na rozdíl od jiných pistolí, což usnadňuje přesné zaměření vpichu. Nedochází k tzv. „výstřelu“, který je doprovázen nepříjemným zvukovým podnětem. Jedná se o téměř bezbolestné a tiché propíchnutí uší. Náušnice jsou hypoalergenní – z chirurgické oceli s nebo bez pozlacení, nejsou jednorázové, je možno je opakovaně nasazovat.</p>\n<h3>Kdy a v jakém věku náušnice nastřelit?</h3>\n<p>V kojeneckém věku doporučujeme aplikaci od 3. měsíce, minimálně 14 dnů po jakémkoliv očkování. Děti by měly být zdravé, neměly by být nachlazené nebo mít teplotu.</p>\n<h3>Jak se nástřel provádí?</h3>\n<p>Po označení místa budoucích dírek medicinálním fixem a dezinfekci se provede propíchnutí uší pomocí speciální propichovací pistole, která ucho rychle, šetrně a hlavně s minimální bolestivostí propíchne a zároveň náušnici nasadí a uzavře. Po propíchnutí ucho nekrvácí!</p>\n<h3>Ošetřování</h3>\n<p>Asi po dobu 14 dnů po nástřelu je třeba o nastřelené dírky pečovat a ošetřovat je. Vhodné je ošetření lihem na pupek po koupeli. Náušničkou pravidelně 2x denně pohybujte zepředu dozadu a pootočte. 3 dny minimalizujte styk pokožky s vodou (sprchování nevadí), na plavání můžete s děťátkem za týden.</p>\n<h3>Kdy lze provést výměnu nastřelených náušnic za vlastní?</h3>\n<p>Po úplném zhojení nastřelených dírek (přibližně za 6 - 8 týdnů) lze nastřelené náušnice vyměnit za jakékoliv náušnice jiné (nejlépe zlato, bílé zlato), které předem naložíte na 24 hodin do 60% lihu. Pokud si s výměnou nebudete vědět rady, pomůžeme vám.</p>\n<p> </p>\n<div class=\"col-md-12 col-sm-12\"><br /><hr class=\"botm-line\" /><img class=\"img-responsive img-nausnice\" src=\"images/7512-0100.jpg\" alt=\"\" /> <img class=\"img-responsive img-nausnice\" src=\"images/7512-0103.jpg\" alt=\"\" /> <img class=\"img-responsive img-nausnice\" src=\"images/7512-0204.jpg\" alt=\"\" /> <img class=\"img-responsive img-nausnice\" src=\"images/7512-6301.jpg\" alt=\"\" /> <img class=\"img-responsive img-nausnice\" src=\"images/7512-6399.jpg\" alt=\"\" /> <img class=\"img-responsive img-nausnice\" src=\"images/7512-6410.jpg\" alt=\"\" /> <img class=\"img-responsive img-nausnice\" src=\"images/7532-0300.jpg\" alt=\"\" />\n<div class=\"clearfix\"> </div>\n</div>', 'aplikace-nausnic', 'aplikace-nausnic', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE `days` (
  `days_id` int(11) NOT NULL,
  `day` varchar(255) COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`days_id`, `day`) VALUES
(1, 'Monday'),
(2, 'Tuesday'),
(3, 'Wednesday'),
(4, 'Thursday'),
(5, 'Friday');

-- --------------------------------------------------------

--
-- Table structure for table `hours`
--

CREATE TABLE `hours` (
  `hours_id` int(11) NOT NULL,
  `day` enum('Monday','Tuesday','Wednesday','Thursday','Friday') COLLATE utf8_czech_ci NOT NULL,
  `ill` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `for_invited` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `prevention_and_vaccination` varchar(255) COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Dumping data for table `hours`
--

INSERT INTO `hours` (`hours_id`, `day`, `ill`, `for_invited`, `prevention_and_vaccination`) VALUES
(1, 'Monday', '8:00 - 11:30', '11:30 - 12:30', '12:30 - 15:30'),
(2, 'Tuesday', '8:00 - 11:30', '11:30 - 12:30', '12:30 - 15:00'),
(3, 'Wednesday', '8:00 - 11:00', '11:00 - 12:00', '12:00 - 14:00'),
(4, 'Thursday', '13:00 - 16:00', '', '16:00 - 19:00'),
(5, 'Friday', '8:00 - 11:00', '', '11:00 - 12:30');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_czech_ci NOT NULL,
  `role` enum('member','admin') COLLATE utf8_czech_ci NOT NULL DEFAULT 'member'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `role`) VALUES
(1, 'admin', '$2y$10$PhukkgkbmPzgafZ.keZFQu9oGlxXvq1YYin4Q/oAgfwcXoT3gHtgK', 'admin'),
(2, 'member', '$2y$10$K0DcqqjCmWNvSbkATtc/O.mNSOYdyTdaUJA3j5ohovlRFgZLjuK/S', 'member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`article_id`),
  ADD UNIQUE KEY `url` (`url`);

--
-- Indexes for table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`days_id`);

--
-- Indexes for table `hours`
--
ALTER TABLE `hours`
  ADD PRIMARY KEY (`hours_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `days`
--
ALTER TABLE `days`
  MODIFY `days_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hours`
--
ALTER TABLE `hours`
  MODIFY `hours_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
