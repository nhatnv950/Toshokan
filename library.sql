-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2017 at 01:01 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(225) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(225) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `lend`
--

CREATE TABLE `lend` (
  `id` int(6) NOT NULL,
  `book_id` int(6) NOT NULL,
  `book_title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `lend_time` date NOT NULL,
  `user_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `lend`
--

INSERT INTO `lend` (`id`, `book_id`, `book_title`, `lend_time`, `user_id`) VALUES
(47, 37, '', '2013-10-23', 1),
(48, 37, '', '2013-10-23', 2),
(49, 37, '', '2013-10-23', 3),
(50, 26, '', '2013-10-23', 3),
(51, 2, '', '2013-10-23', 3),
(58, 39, '', '2013-12-05', 4),
(59, 41, '', '2013-12-05', 4),
(60, 37, '', '2013-12-05', 4),
(66, 41, '', '2014-01-03', 2),
(67, 41, '', '2014-10-27', 7),
(77, 54, '', '2014-11-04', 7),
(79, 58, '', '2014-12-12', 6),
(84, 68, '', '2016-11-12', 60),
(85, 66, '', '2016-11-12', 60);

-- --------------------------------------------------------

--
-- Table structure for table `ninki`
--

CREATE TABLE `ninki` (
  `id` int(11) NOT NULL,
  `ninki_images` varchar(255) NOT NULL,
  `ninki_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ninki`
--

INSERT INTO `ninki` (`id`, `ninki_images`, `ninki_name`) VALUES
(64, 'Building.jpg', 'Building'),
(75, 'keizai1.jpg', '「学力」の経済学 '),
(77, 'sogaku.png', '商学への招待');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(225) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(225) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(225) COLLATE utf8_bin DEFAULT NULL,
  `tel` varchar(225) COLLATE utf8_bin DEFAULT NULL,
  `address` varchar(225) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `email`, `tel`, `address`) VALUES
(27, 'xiguangjie', 'b59c67bf196a4758191e42f76670ceba', '1258328066@yahoo.co.jp', '080****9889', '東京都江東区亀戸1－2－2'),
(60, 'xigua', 'b59c67bf196a4758191e42f76670ceba', '12331@qq.com', '1232431', '1212222');

-- --------------------------------------------------------

--
-- Table structure for table `yx_books`
--

CREATE TABLE `yx_books` (
  `id` int(6) NOT NULL,
  `name` varchar(20) CHARACTER SET utf8 NOT NULL,
  `price` int(11) NOT NULL,
  `images` text COLLATE utf8_bin NOT NULL,
  `detail` text COLLATE utf8_bin NOT NULL,
  `uploadtime` datetime NOT NULL,
  `type` varchar(10) CHARACTER SET utf8 NOT NULL,
  `total` int(11) DEFAULT NULL,
  `leave_number` int(11) DEFAULT NULL,
  `writer` text COLLATE utf8_bin NOT NULL,
  `publisher` text COLLATE utf8_bin NOT NULL,
  `ISBN` text COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `yx_books`
--

INSERT INTO `yx_books` (`id`, `name`, `price`, `images`, `detail`, `uploadtime`, `type`, `total`, `leave_number`, `writer`, `publisher`, `ISBN`) VALUES
(64, 'Building', 1500, 'Building.jpg', 'Brought to you by the authors and editors that created the Minecrafter and Minecrafter 2.0 Advanced guide books, The Big Book of Building features more of everything—more mods, more mining, more mobs, and more Minecraft! Up to date for the 2014 holiday season', '2016-11-08 10:02:22', '技術', 0, 0, 'Steve', 'Mark', '1212-454-4545'),
(65, '１級簿記', 1400, 'boki.jpg', '日商簿記検定に最も近いテキスト。過去問題が３回分ついて試験対策もバッチリ。平成２８年６月試験から新試験範囲へ！', '2016-11-08 10:06:30', '商学', 3, 3, '田中', '山田', '121-454-454-454'),
(71, '日本語能力試験n1', 1500, 'n1.jpg', '新しい日本語能力試験に対応した予想模擬試験を2回分収録しました。別冊には2色の詳しい解答解説つき。巻頭には出題形式に変更がある問題を中心に、新試験の傾向と対策をわかりやすく徹底解説しています。', '2016-11-20 12:03:00', '語学', 2, 2, 'JLPT', 'JLPT', '4545-787-4788'),
(72, 'CAD利用技術者試験', 2200, 'cad.jpg', '本書は「CAD利用技術者試験1級［機械］」の対策書です。経験豊かな著者が、JISをはじめとする必要な知識と技術を丁寧に解説しています。「筆記」「実技」の両試験に対応し、本書があれば、合格に近づくための実力を確実に身に付けることができます。巻末には詳しい解説付きの過去問題を直近2年分（4回分）掲載。 ダウンロードサイトからは、さらに2年分（4回分）の過去問題と', '2016-11-20 12:04:06', '技術', 3, 3, 'ソフトバンク', '日本ソフトウエア研究所', '45-787-78778'),
(62, 'C#プログラン', 2000, 'c..jpg', '1977年北海道大学大学院修士課程修了。北海道大学工学部応用物理学科助手。1987年工学博士。職業訓練大学校(現職業能力開発総合大学校)情報工学科勤務。2005年職業能力開発総合大学校情報システム工学科教授。現在、電子情報システム工学科教授。専門は音声信号処理、ディジタル信号処理、DSP応用(本データはこの書籍が刊行された当時に掲載されていたものです)', '2016-11-08 09:57:29', 'プログラミング', 1, 3, '森川　赤司', '紀伊国屋', '1211-4544-45'),
(73, 'TOEIC700点以上', 1700, 'toeic.jpg', 'TOEIC形式の問題集は種々ありますが、この新公式問題集は公式ということもあって、最も本番に即したものになっています。語彙や表現なども似通ったものが多く、受験で言うところの過去問のようなものと考えて差し支えありません。とくにリスニングの再現度は高く、事前にこれをやっておくのとそうでないのとでは大きな差があると思います。', '2016-11-20 12:06:43', '語学', 4, 4, 'Smith', 'John', '454-4545-454877'),
(74, 'javaee', 1800, 'javaee.jpg', 'JavaEE7準拠。ショッピングサイトや業務システムで使われるJavaEE学習書の決定版!やさしいコトバで「わかる」説明。専門用語を知らなくても安心。本当に動く、試して学べる、豊富な例題。はじめてでもできるシステム開発のやり方。', '2016-11-20 12:09:41', 'プログラミング', 5, 5, '木村', '埼玉', '4454-78787-787'),
(75, '「学力」の経済学 ', 2500, 'keizai1.jpg', '「データ」に基づき教育を経済学的な手法で分析する教育経済学は、 「成功する教育・子育て」についてさまざまな貴重な知見を積み上げてきた。 そしてその知見は、「教育評論家」や「子育てに成功した親」が個人の経験から述べる主観的な意見よりも、 よっぽど価値がある―むしろ、「知っておかないともったいないこと」ですらあるだろう。 本書は、「ゲームが子どもに与える影響」か', '2016-11-20 12:12:06', '経済', 3, 3, '山田', '鈴木', '44454-778-5656'),
(76, '経営学の基本', 2600, 'keei.jpg', '第１章　企業システムとはー企業とその仕組みについて理解する／第２章　経営戦略とはー売上アップ・利益アップを狙うために／第３章　経営組織とはービジネスを行う実践部隊／第４章　経営管理とはー経営戦略の実行と評価／第５章　経営課題とはー生き残るために解決すべきこと／第６章　マネジメントとはー成果を上げて社会に貢献するために', '2016-11-20 12:14:55', '経済', 3, 3, '加藤', '森', '155-4877-7878'),
(77, '商学への招待', 1800, 'sogaku.png', '商学の考え方を学べる入門書。会社・金融の制度からｅコマースまで、初学者に必要かつ十分な事項を厳選し、身近なトピックを使ってわかりやすく解説する。【「TRC MARC」の商品解説】', '2016-11-20 12:17:16', '商学', 2, 2, '石原 武政', '原', '155-748787-787');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lend`
--
ALTER TABLE `lend`
  ADD PRIMARY KEY (`id`,`user_id`);

--
-- Indexes for table `ninki`
--
ALTER TABLE `ninki`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yx_books`
--
ALTER TABLE `yx_books`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lend`
--
ALTER TABLE `lend`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT for table `ninki`
--
ALTER TABLE `ninki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `yx_books`
--
ALTER TABLE `yx_books`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
