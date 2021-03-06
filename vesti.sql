-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 22, 2018 at 04:49 PM
-- Server version: 5.6.34
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vesti`
--
CREATE DATABASE IF NOT EXISTS `vesti` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `vesti`;

-- --------------------------------------------------------

--
-- Table structure for table `autor`
--

CREATE TABLE `autor` (
  `korisnicko_ime` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `lozinka` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ime` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefon` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `autor`
--

INSERT INTO `autor` (`korisnicko_ime`, `lozinka`, `ime`, `prezime`, `mail`, `telefon`, `admin`) VALUES
('admin', 'admin123', 'Main', 'Admin', 'zarkovic.dev@gmail.com', NULL, 1),
('ana', 'sifra', 'Ana', 'Tatjanic', NULL, NULL, 0),
('ivan', 'ivko', 'Ivan', 'Webmaster', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vest`
--

CREATE TABLE `vest` (
  `id` int(11) NOT NULL,
  `naslov` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sadrzaj` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `autor` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `datum` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vest`
--

INSERT INTO `vest` (`id`, `naslov`, `sadrzaj`, `autor`, `datum`) VALUES
(2, '', 'Sunny', 'ivan', '2020-04-12 00:00:00'),
(3, 'Pobuna gradjana iz cele Srbije jedini na??in da se spre??i iskopavanje litijuma', 'Potpredsednik Narodne stranke Miroslav Aleksi?? pozvao je danas gradjane iz cele Srbije da ???podignu glas??? protiv iskopavanja  litijuma koje u Loznici planira kompanija Rio Tinto, uz pomo?? ???re??ima predsednika Srbije Aleksandra Vu??i??a???, koji je ???odabrao strance i trovanje i razaranje Srbije umesto njihovog naroda???.', 'ivan', '2020-04-12 00:00:00'),
(6, 'Da li je ??vedska bila u pravu?', 'Slu??ati epidemiolo??ku struku u ??vedskoj zna??i kretati se bez maske u zatvorenim javnim prostorima, slobodno izlaziti u restorane, kafi??e i i??i u ??kolu.', 'ana', '0000-00-00 00:00:00'),
(16, 'Patrijarh srpski Porfirije: Odlo??ite usvajanje zakona u kojem se ne pominje AP Kosovo i Metohija', 'Patrijarh srpski Porfirije uputio je danas ministarki kulture Maji Gojkovi?? dopis kojim tra??i odlaganje usvajanja Zakona o kulturnom nasle??u.', 'ivan', '2020-04-16 00:00:00'),
(17, 'Peticiju protiv dolaska Rio Tinta potpisalo gotovo 90.000 ljudi', '', 'ana', '2020-04-16 00:00:00'),
(18, 'MAT: Rast cena u aprilu u Srbiji najve??i od 2017. godine', 'U Srbiji se u aprilu ove godine u odnosu na isti mesec 2020. godine ubrzala privredna aktivnost, ali i inflacija koja je bila 1,1 odsto jer je rast teku??ih potro??a??kih cena bio najve??i posle 2017. godine, saop??tili su danas autori mese??nika ???Makroekonomske analize i trendovi (MAT).', 'ivan', '2020-04-16 00:00:00'),
(19, 'Neka vest', 'Ona ima i sadrzaj', 'ana', '2020-04-16 00:00:00'),
(20, 'Najnovija vest', 'Sadrzaj najnovije vesti', 'ivan', '2020-04-22 00:00:00'),
(21, 'Zubenica: ???Ko je glavni investitor, odakle je novac do??ao, iz kojih fondova????', 'U novoj emisiji ???Rasprava???, autora Marka Jeremi??a, koja je premijerno prikazana 18. aprila na YT kanalu ???Novi sistem???, gostovao je politi??ki analiti??ar Mi??el Zubenica i tom prilikom rekao da opozicija mora da radi sama na sebi kao i da medijski prostor koji imaju na proopozicionim medijima koriste neadekvatno, s obzirom na to da i to vreme najvi??e tro??e pri??aju??i o Aleksandru Vu??i??u a ne o programima svojih partija. ', 'ivan', '2020-04-22 00:00:00'),
(22, 'Raste broj povredjenih u sukobima izraelske policije i Palestinaca u Jerusalimu', 'Izraelska policija sukobila se danas sa palestinskim demonstrantima na ??estom popri??tu nasilja, svetili??tu u Starom gradu u Jerusalimu.', 'ivan', '2020-04-22 00:00:00'),
(23, 'Kako u??ivati u kafi i ne ugroziti zdravlje', 'Kafu su iscelitelji u Africi i Arabiji koristili kao lek, a britanski lekari su u 16. veku tvrdili da ovaj napitak mo??e da izazove vrtoglavicu, malodu??nost i nesanicu, no ono ??to danas sigurno znamo je da u kafi treba u??ivati s merom.', 'ivan', '2020-04-22 00:00:00'),
(24, 'Nema??ki filozof odbio priznanje iz Ujedinjenih Arapskih Emirata', 'Jedan od najzna??ajnijih savremenih filozofa Jirgen Habermas, odbio je da primi priznanje ?????eik Zajed Book Award??? za li??nost godine u oblasti kulture, a koja je pod pokroviteljstvom ??eika Mohameda bin Zajeda, prestolonaslednika i de fakto vladara Ujedinjenih Arapskih Emirata.', 'ivan', '2020-04-22 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`korisnicko_ime`);

--
-- Indexes for table `vest`
--
ALTER TABLE `vest`
  ADD PRIMARY KEY (`id`),
  ADD KEY `autor` (`autor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `vest`
--
ALTER TABLE `vest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `vest`
--
ALTER TABLE `vest`
  ADD CONSTRAINT `autor` FOREIGN KEY (`autor`) REFERENCES `autor` (`korisnicko_ime`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
