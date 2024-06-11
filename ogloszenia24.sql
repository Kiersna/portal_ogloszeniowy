-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2024 at 10:54 PM
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
-- Database: `ogloszenia24`
--

-- --------------------------------------------------------

--
-- Table structure for table `oferty`
--

CREATE TABLE `oferty` (
  `id` int(11) NOT NULL,
  `opis` varchar(100) NOT NULL,
  `data_utworzenia` date NOT NULL,
  `tytul` varchar(50) NOT NULL,
  `cena` float NOT NULL,
  `zdjecie_url` varchar(500) NOT NULL,
  `id_uzytkownika` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `oferty`
--

INSERT INTO `oferty` (`id`, `opis`, `data_utworzenia`, `tytul`, `cena`, `zdjecie_url`, `id_uzytkownika`) VALUES
(1, 'Sprzedam używany rower górski w dobrym stanie, prawie nowy.', '2023-06-01', 'Rower górski', 700, 'https://www.greenbike.pl/images/hexagon_black_white_graphite_glossy22.jpg', NULL),
(2, 'Komplet mebli ogrodowych, idealne na lato!', '2023-06-02', 'Meble ogrodowe', 1200, 'https://www.artbud.pl/userdata/public/gfx/135410/Meble-ogrodowe-parkowe-tarasowe-zestaw-na-plac-zabaw-stol-dwie-lawki-i-dwa-krzesla-Loft-XXL-ZO.jpg', NULL),
(3, 'Nowa konsola do gier z dwoma kontrolerami.', '2023-06-03', 'Konsola do gier', 1500, 'https://image.ceneostatic.pl/data/products/86467784/p-sony-playstation-5.jpg', NULL),
(4, 'Telewizor 55 cali, 4K, smart TV.', '2023-06-04', 'Telewizor 55 cali', 2000, 'https://sklep.audiocolor.pl/wp-content/uploads/2023/03/SAMSUNG-S90C-audiocolor-warszawa-1.png', NULL),
(5, 'Elegancki zegarek męski, wodoodporny.', '2023-06-05', 'Zegarek męski', 300, 'https://vivab2b.pl/img/products/55/94/24_max.jpg', NULL),
(6, 'Książka \"Władca Pierścieni\", trylogia w twardej oprawie.', '2023-06-06', 'Władca Pierścieni', 100, 'https://ecsmedia.pl/c/14702679941213326-jpg-gallery.big-iext41561989.jpg', NULL),
(7, 'Samochód rodzinny, mały przebieg, zadbany.', '2023-06-07', 'Samochód rodzinny', 35000, 'https://superauto.wpcdn.pl/articles/5ab1499fbec847c76310aed7b213cff2.jpg', NULL),
(8, 'Nowoczesny laptop z procesorem i7 i 16GB RAM.', '2023-06-08', 'Laptop i7', 4000, 'https://i5.walmartimages.com/seo/HP-15-6-Laptop-Intel-Core-i7-8GB-RAM-256GB-SSD-16GB-Optane-Carbon-Slate-Google-Classroom-Compatible_5f32d9ac-dc49-4aaa-8969-4136a64d4304.d9696e7c6e17940e437496ac3f87c276.jpeg', NULL),
(9, 'Kamera sportowa, idealna na wakacyjne przygody.', '2023-06-09', 'Kamera sportowa', 600, 'https://allegro.stati.pl/AllegroIMG/PRODUCENCI/GoPro/HERO11-Black/gopro-kamera-sportowa-hero11-black-widok-przod.jpg', NULL),
(10, 'Telefon komórkowy, model XYZ, jak nowy.', '2023-06-10', 'Telefon XYZ', 1500, 'https://a.allegroimg.com/s512/112e24/37cc7d054b4bb99046eb7c948354/TELEFON-KOMORKOWY-DLA-SENIORA-MYPHONE-Z-4G-LTE-EAN-GTIN-5902983622741', NULL),
(11, 'Skórzana kurtka damska, rozmiar M.', '2023-06-11', 'Skórzana kurtka', 250, 'https://tomskor.pl/9239-large_default/kurtka-skorzana-damska-charlotte-czarna.jpg', NULL),
(12, 'Elektryczna hulajnoga, zasięg do 30 km.', '2023-06-12', 'Hulajnoga elektryczna', 1200, 'https://www.geekbuying.pl/32775-large_default/terenowa-hulajnoga-elektryczna-iscooter-ix6-1000w.jpg', NULL),
(13, 'Słuchawki bezprzewodowe, idealne do biegania.', '2023-06-13', 'Słuchawki bezprzewodowe', 300, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQFTGyKU0pXJQysfqWj_Dm3eIQIM9MUP59GoQ&s', NULL),
(14, 'Robot kuchenny, wiele funkcji, używany.', '2023-06-14', 'Robot kuchenny', 400, 'https://www.clatronic.pl/72134/robot-kuchenny-mikser-planetarny-clatronic-km-3765-czerwony.jpg', NULL),
(15, 'Głośnik Bluetooth, wodoodporny.', '2023-06-15', 'Głośnik Bluetooth', 200, 'https://static1.buy-24.pl/pol_pl_Glosnik-Bluetooth-XERTMT-czarny-32_7.jpg', NULL),
(16, 'Zestaw do grillowania, nowy.', '2023-06-16', 'Zestaw do grillowania', 150, 'https://ecsmedia.pl/c/zestaw-do-grillowania-sztucce-do-grilla-5-czesci-b-iext108422298.jpg', NULL),
(17, 'Książka \"Harry Potter\", komplet 7 tomów.', '2023-06-17', 'Harry Potter', 350, 'https://ecsmedia.pl/c/pakiet-harry-potter-tom-1-7-b-iext146398176.jpg', NULL),
(18, 'Fotografia w ramce, pejzaż górski.', '2023-06-18', 'Fotografia pejzaż', 100, 'https://homedesigns.pl/userdata/public/gfx/38736/Pejzaz-gorski-z-lodka-Marian-Kaszuba.jpg', NULL),
(19, 'Łóżko małżeńskie, drewniane, z materacem.', '2023-06-19', 'Łóżko małżeńskie', 800, 'https://mks-meble.pl/50055-large_default/lozko-malzenskie-dwuosobowe-otolia-160x200-casablanca-20573.jpg', NULL),
(20, 'Szafka nocna, biała, nowoczesny design.', '2023-06-20', 'Szafka nocna', 200, 'https://lukmebel.pl/27392-large_default/szafka-nocna-cortado-gold-s54.jpg', NULL),
(21, 'fajny piesek rasowy', '0000-00-00', 'Dogi', 0, 'https://ocdn.eu/pulscms-transforms/1/_6rk9kpTURBXy9hMTZmOGFmZWU0ZTI2NjE4Y2FiYTE3Yzc2ZWQzOWFkMi5qcGeSkwXNBLDNAqSTCaY2ZjIwODgG3gABoTAB/shutterstock-8050477.jpeg', NULL),
(22, 'niespotkany zielony kot!!!', '0000-00-00', 'Zielony kot', 100000, 'https://ocdn.eu/pulscms-transforms/1/rQPk9kpTURBXy81NGUzMjMzMjU3MjE3YmJhMDVkYzVjNTFkY2IxNzQ2ZS5qcGeSlQMAIM0F-M0DXJMFzQSwzQJY3gABoTAB', NULL),
(24, 'super lego', '0000-00-00', 'lego', 300, 'https://www.lego.com/cdn/cs/set/assets/blt0254ea3dce736ea0/10305.png', 3);

-- --------------------------------------------------------

--
-- Table structure for table `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL,
  `Imie` varchar(50) NOT NULL,
  `Nazwisko` varchar(50) NOT NULL,
  `email` varchar(99) NOT NULL,
  `haslo` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `Imie`, `Nazwisko`, `email`, `haslo`) VALUES
(1, 'Dawid', 'Kier', 'dave@gmail.com', '$2y$10$sBoImwPtWHzk648cCeTMq.kdKhCz1pb4gZRVJOr7Gv0jNSTVTxbX2'),
(2, 'Mateusz', 'Ejdys', 'ejdys@gmail.com', '$2y$10$YrDR0oesteix622tesDHvu5kPo6JhY8fQHR2MU1mqSStHzvlr5nHi'),
(3, 'Kate', 'keatowa', 'kate@mail.com', '$2y$10$pDqFfLBOUp.0AU0PzImS1OoQI7a6XS0oMy6zk2MHqI95Mr/BOSQgW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `oferty`
--
ALTER TABLE `oferty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `oferty`
--
ALTER TABLE `oferty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
