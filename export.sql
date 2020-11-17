-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 17, 2020 at 07:12 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugas_kecerdasan_buatan`
--

-- --------------------------------------------------------

--
-- Table structure for table `ciri`
--

CREATE TABLE `ciri` (
  `ciri_id` int(11) NOT NULL,
  `ciri_ciri` varchar(100) NOT NULL,
  `ciri_bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ciri`
--

INSERT INTO `ciri` (`ciri_id`, `ciri_ciri`, `ciri_bobot`) VALUES
(1, 'Moncong runcing\r\n', 5),
(2, 'Bentuk wajah segitiga', 5),
(3, 'bulu kecokelatan\r\n', 5),
(4, 'badan ramping\r\n', 3),
(5, 'ekor panjang\r\n', 3),
(6, 'tanpa ekor\r\n', 5),
(7, 'bulu panjang\r\n', 1),
(8, 'bulu tahan air\r\n', 5),
(9, 'mata dominan orange\r\n', 5),
(10, 'badan besar\r\n', 3),
(11, 'ramah\r\n', 1),
(12, 'mata kebiruan\r\n', 3),
(13, 'bulu abu-abu\r\n', 3),
(14, 'senang bermain / aktif\r\n', 3),
(15, 'cepat beradaptasi\r\n', 3),
(16, 'tubuh panjang\r\n', 1),
(17, 'ukuran badan pendek\r\n', 3),
(18, 'mata besar membulat\r\n', 5),
(19, 'leher pendek / tebal\r\n', 3),
(20, 'wajah oval\r\n', 5),
(21, 'badan berotot\r\n', 5),
(22, 'ekor seperti kelinci', 5),
(23, 'ekor kemoceng\r\n', 5);

-- --------------------------------------------------------

--
-- Table structure for table `hub`
--

CREATE TABLE `hub` (
  `hub_id` int(11) NOT NULL,
  `hub_kucing` int(11) NOT NULL,
  `hub_ciri` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hub`
--

INSERT INTO `hub` (`hub_id`, `hub_kucing`, `hub_ciri`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `kucing`
--

CREATE TABLE `kucing` (
  `kucing_id` int(11) NOT NULL,
  `kucing_jenis` varchar(50) NOT NULL,
  `kucing_foto` varchar(100) NOT NULL,
  `kucing_deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kucing`
--

INSERT INTO `kucing` (`kucing_id`, `kucing_jenis`, `kucing_foto`, `kucing_deskripsi`) VALUES
(1, 'Abyssinian', 'Abyssinian.jpeg', 'Binatang bertubuh mini ini mirip dengan cougar berukuran kecil. Jenisnya yang mempunyai corak kemerah-merahan memiliki bulu yang mempesona.  Jika kamu mencari kucing yang terlihat mewah, kamu dapat mempertimbangkan jenis kucing abyssianian ini yang termasuk dalam aristocrats. Salah satu jenis kucing tertua yang dipercaya sebagian keturunan dari kucing suci di Mesir '),
(2, 'charteus', 'charteus.jpeg', 'Chartreux adalah kucing berbadan besar dan berotot dengan bulu yang pendek. Chartreux dikenal sebagai kucing dengan bulu pendek dua lapis yang berwarna biru. Bulunya ini tahan dengan air. Mata chartreux berbentuk oval dan berwarna tembaga. Chartreux wajahnya terlihat seperti tersenyum, karena chartreux memiliki struktur tengkorak dan rahang yang sedikit berbeda.'),
(3, 'Russian Blue', 'russian.jpeg', 'Kucing biru rusia merupakan kucing berambut pendek dengan warna bulu abu-abu kebiruan. Kucing ini biasanya bermata hijau. Kucing biru rusia telah digunakan secara terbatas untuk menciptakan ras kucing lain, seperti kucing Havana Brown atau mengubah ras kucing yang telah ada, seperti kucing nebelung.'),
(4, 'Korat', 'Korat.jpeg', 'Korat adalah ras kucing bertubuh sedang, dengan badannya yang kuat, berotot, ramping, dan panjang. Telinganya runcing ke atas. Warna bulunya hanya polos, dan tidak memiliki pola. Warna dasar bulu korat jarang ada pada ras kucing lainnya, kerena korat memiliki warna biru keabu-abuan. Selain itu, warna pada bulunya juga memilki alur dari bagian perut berwarna keabu-abuan, kemudian naik ke atas pada bagian punggung biasanya lebih gelap atau abu-abu pekat.'),
(5, 'Manx', 'Manx.jpeg', 'Manx dikenal sebagai kucing yang setia kepada satu orang (majikan) atau satu keluarga dan biasanya agak sulit untuk hidup beradaptasi dengan majikan atau keluarga lain, sehingga manx mendapat julukan one person cat atau one family cat'),
(6, 'Japanese Bobtail', 'jap.jpeg', 'Kucing ekor bundel jepang adalah salah satu ras kucing alami yang berasal dari Jepang. Kucing ekor bundel jepang sudah ada sejak ribuan abad yang lalu. Nama ras ini banyak disebutkan dan digambarkan dalam berbagai dokumen-dokumen kuno Jepang. Kucing ini dipercayai sebagai wujud asli dari Maneki Neko.'),
(7, 'Angora', 'Angora.jpeg', 'Anggora turki adalah salah satu ras kucing domestik alami tertua. Ras ini berasal dari Ankara, Turki. Kucing ini sangat populer dan terkenal di Indonesia. Secara sederhana, ras kucing ini juga dikenal sebagai anggora atau kucing ankara.'),
(8, 'persia', 'persia.jpeg', 'Kucing persia adalah ras kucing domestik berbulu panjang dengan karakter wajah bulat dan moncong pendek. Namanya mengacu pada Persia, nama lama Iran, di mana kucing serupa ditemukan. Sejak akhir abad 19, kucing jenis ini dikembangkan di Britania Raya dan Amerika Serikat usai Perang Dunia II.'),
(9, 'Domestik', 'domestik.jpeg', 'Kucing disebut juga kucing domestik atau kucing rumah adalah sejenis mamalia karnivora dari keluarga Felidae. Kata \"kucing\" biasanya merujuk kepada \"kucing\" yang telah dijinakkan, tetapi bisa juga merujuk kepada \"kucing besar\" seperti singa dan harimau. '),
(10, 'Ragdoll', 'Ragdoll.jpeg', 'Ragdoll adalah salah satu ras kucing terbesar di dunia yang telah diakui oleh Guinness World Records. Ragdoll awalnya dikembangkan oleh Ann Baker dari Amerika Serikat. '),
(11, 'Maine Coon', 'coon.jpeg', 'Maine coon adalah salah satu ras kucing tertua dan alami yang berasal dari Maine, Amerika Serikat. Ras ini dipercayai nenek moyangnya berasal dari ras anggora dan kucing hutan norwegia.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ciri`
--
ALTER TABLE `ciri`
  ADD PRIMARY KEY (`ciri_id`);

--
-- Indexes for table `hub`
--
ALTER TABLE `hub`
  ADD PRIMARY KEY (`hub_id`);

--
-- Indexes for table `kucing`
--
ALTER TABLE `kucing`
  ADD PRIMARY KEY (`kucing_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ciri`
--
ALTER TABLE `ciri`
  MODIFY `ciri_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `hub`
--
ALTER TABLE `hub`
  MODIFY `hub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kucing`
--
ALTER TABLE `kucing`
  MODIFY `kucing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
