-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2025 at 09:04 AM
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
-- Database: `db_perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `umur` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id`, `nama`, `alamat`, `no_hp`, `umur`) VALUES
(9, 'Yenita ', 'Tlogosari', '083854408716', 21),
(10, 'sasa', 'rogojampi', '7236478234234', 20),
(11, 'Riski', 'Genteng', '023478236427273', 22),
(13, 'Tegar', 'bwi', '09234927348263', 67),
(14, 'Avta', 'tegalsari', '12837812337', 19);

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `cover_buku` varchar(255) NOT NULL,
  `nama_buku` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `tahun_terbit` year(4) NOT NULL,
  `sinopsis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `cover_buku`, `nama_buku`, `penulis`, `penerbit`, `tahun_terbit`, `sinopsis`) VALUES
(1, 'bumi.jpg', 'Bumi Manusia', 'Pramoedya Ananta Toer', 'Gramedia Pustaka Utama. ', '2014', 'Bumi Manusia adalah novel karya Pramoedya Ananta Toer yang bercerita tentang kehidupan Minke, seorang pemuda pribumi pada masa penjajahan Belanda. Sementara itu, Bumi adalah novel karya Tere Liye yang bercerita tentang petualangan tiga remaja yang menyelamatkan Bumi dari ancaman klan-klan jahat'),
(3, 'pelangi pergi.jpeg', 'Pulang Pergi', 'Tere Liye', 'Sabak Grip Nusantara', '2001', 'Novel yang berjudul Pulang-Pergi merupakan cerita fiksi yang dibumbui dengan aksi dan kriminal. Sekitar 80% di dalam novel ini berisi perkelahian dan sisanya ada sedikit humor dan romantis. Penulis novel Pulang-Pergi yaitu Darwis atau yang lebih dikenal dengan nama pena Tere Liye. Ia lahir pada tanggal 21 Mei 1979 di Lahat, Sumatera Selatan. Pria lulusan Fakultas Ekonomi Universitas Indonesia ini sempat bekerja sebagai akuntan sebelum menjadi penulis. Sudah banyak karya-karya yang ditulis oleh Tere Liye dan Pulang-Pergi menjadi salah satu novel yang paling banyak disukai oleh para penggemar Tere Liye. '),
(4, 'laut.jpg', 'Laut Bercerita', 'Laila S Chudori', 'Keputusan Penerbit Gramedia (KPG)', '2017', 'Novel ini mengangkat tema persahabatan, percintaan, kekeluargaan, dan rasa kehilangan. Dengan berlatarkan waktu di tahun 90-an dan 2000, novel ini mampu membius para pembacanya untuk menerobos ruang masa lalu dan kembali melihat peristiwa yang terjadi di tahun yang bersangkutan. Dengan kata lain, novel ini mengingatkan para pembacanya akan era-era reformasi di tahun 1998 yang bernas akan kepahitan dan kekejaman bagi para pembela rakyat. '),
(5, 'alpha.jpg', 'The Alpha Girls Guide', 'Henry Manampiring', 'Gagas Media', '2020', 'Bab pertama pada buku ini menjelaskan apa itu alpha female. Seperti yang sudah diuraikan pada paragraf di atas, alpha girl merupakan perempuan-perempuan yang berada di puncak karena prestasi serta attitude-nya. Mereka percaya diri dan mengoptimalkan potensinya dengan baik.  Bab kedua membahas mengenai alpha student, bagaimana seorang alpha girl berperilaku sebagai seorang pelajar. Bab ini menyinggung mengapa perempuan harus berpendidikan tinggi. Bagian paling favorit dalam bab ini adalah, “Nggak ada yang lebih bego dari mementingkan cowok di atas pendidikan/ilmu. Ilmu tidak akan selingkuh atau minta putus. Ilmu tidak akan minta kawin lagi, atau minta cerai. Ilmu akan selalu ikut kamu.”  Bab ketiga yaitu the alpha friend, bagaimana seorang alpha girl berteman. Bab ini mengajarkan agar seorang alpha girl menolak untuk dimanipulasi teman dan juga menolak untuk memanipulasi teman, say no to gosip! Bab keempat membahas mengenai the alpha lover, bagaimana seorang alpha girl saat pacaran, saat patah hati, mengenali karakteristik lelaki, serta topik menikah.  Bab kelima yaitu the alpha worker, bagaimana seorang alpha professional berperilaku di pekerjaan dan kantor, apa yang perlu dilakukan saat pertama memulai bekerja. Bagian yang paling saya sukai dari bab kelima ini adalah “nilai/IPK itu penting,” banyak motivator yang berkata bahwa nilai IPK tidak penting dan tidak menjamin sukses. Benar, IPK tidak menjamin sukses jika kita memilih menjadi seorang pengusaha/enterpreneur. Namun, beda lagi ketika kita ingin bekerja di perusahaan yang bagus, IPK akan sangat membantu perjalanan karir kita. Jadi, secara tidak langsung, IPK juga berperan dalam proses kesuksesan kita.  Memasuki bab keenam yaitu the alpha look, bagaimana seorang alpha girl merawat penampilan dirinya. Penampilan memang bukan penentu sukses terpenting, namun tidak bisa diabaikan juga. Tampil menariklah untuk diri sendiri terlebih dahulu, baru untuk orang lain. Selanjutnya bab ketujuh membahas mengenai the alpha care, bagaimana seorang alpha girl membawa dampak positif bagi orang lain. Kejarlah ilmu, prestasi, keahlian, dan segala kemampuan, bukan untuk dirimu sendiri, tapi kelak agar bisa membantu orang lain.  Bab kedelapan adalah meet the alpha female, penulis menemui dan mewawancarai alpha female Indonesia yaitu Najwa Shihab dan Alanda Kariza. Pada bab ini diulas bagaimana kisah hidup mereka, apa rahasia keberhasilan mereka, siapa inspirasi mereka, serta pesan mereka untuk para perempuan. Bab terakhir yaitu your alpha future, bahwa kitalah yang harus memulai perjalanan untuk menjadi alpha future. It’s not only about your Alpha Future. It’s also OUR Alpha Future.'),
(7, 'laskar.jpg', 'Laskar Pelangi', 'Andrea Hirata', 'Bentang Pustaka', '2005', 'Bangunan itu nyaris rubuh. Dindingnya miring bersangga sebalok kayu. Atapnya bocor di mana-mana. Tetapi, berpasang-pasang mata mungil menatap penuh harap. Hendak ke mana lagikah mereka harus bersekolah selain tempat itu? Tak peduli seberat apa pun kondisi sekolah itu, sepuluh anak dari keluarga miskin itu tetap bergeming. Di dada mereka, telah menggumpal tekad untuk maju.”  Begitu banyak hal menakjubkan yang terjadi dalam masa kecil para anggota Laskar Pelangi. Sebelas orang anak Melayu Belitong yang luar biasa ini tak menyerah walau keadaan tak bersimpati pada mereka. Tengoklah Lintang, seorang kuli kopra cilik yang genius dan dengan senang hati bersepeda 80 kilometer pulang pergi untuk memuaskan dahaganya akan ilmu bahkan terkadang hanya untuk menyanyikan padamu negeri di akhir jam sekolah atau Mahar, seorang pesuruh tukang parut kelapa sekaligus seniman dadakan yang imajinatif, tak logis, kreatif, dan sering diremehkan sahabat-sahabatnya, namun berhasil mengangkat derajat sekolah kampung mereka dalam karna'),
(12, 'istimewa.jpg', 'Kamu Tidak Istimewa', 'ada deh', 'Gagas Media', '2003', 'Riwayat ini mengandung banyak paham. Bias prasangka hadir melengkapi desus. Remuk redam menjadi sorakan. Bimbang. Barangkali jenaka? Atma lunglai rasa tak menapak. Kosong termanipulasi gelatnya sendiri. Piala penderitaan terbaik tergenggam erat. Enggan lepas. Hingga sebuah utas melingkupi. Yang istimewa bukan hanya kamu. Dirimu jauh dari satu-satunya. Allah mencintai semua.  Buku ini ditulis dengan membawa pembacanya menikmati lorong-lorong pikiran yang gelap dan getir. Buku ini merangkum kisah yang melibatkan paham, prasangka, dan ketidak-istimewaan. Buku ini akan menghadirkan sebuah perjalanan yang bermakna yang membuka mata kita mengenai kompleksitas kemanusiaan.');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nama_buku` varchar(255) DEFAULT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `status` enum('Dipinjam','Dikembalikan') DEFAULT 'Dipinjam'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `id_anggota`, `nama`, `nama_buku`, `tanggal_pinjam`, `tanggal_kembali`, `status`) VALUES
(26, 13, 'Tegar', 'Pulang Pergi', '2025-02-28', '2025-03-01', 'Dipinjam'),
(28, 14, 'Avta', 'Bumi Manusia', '2025-03-02', '2025-03-04', 'Dipinjam'),
(29, 14, 'Avta', 'Kamu Tidak Istimewa', '2025-02-27', '2025-03-03', 'Dipinjam'),
(30, 9, 'Yenita', 'The Alpha Girls Guide', '2025-02-28', '2025-03-04', 'Dipinjam'),
(31, 9, 'Yenita', 'Kamu Tidak Istimewa', '2025-02-27', '2025-03-03', 'Dipinjam'),
(32, 9, 'Yenita', 'Bumi Manusia', '2025-02-27', '2025-03-03', 'Dipinjam'),
(33, 9, 'Yenita', 'Kamu Tidak Istimewa', '2025-02-25', '2025-03-04', 'Dipinjam'),
(34, 9, 'Yenita', 'Kamu Tidak Istimewa', '2025-02-25', '2025-03-04', 'Dipinjam'),
(36, 9, 'Yenita', 'Kamu Tidak Istimewa', '2025-02-27', '2025-03-06', 'Dipinjam'),
(38, 13, 'Tegar', 'The Alpha Girls Guide', '2025-02-24', '2025-03-04', 'Dipinjam'),
(39, 13, 'Tegar', 'Laut Bercerita', '2025-03-03', '2025-03-06', 'Dipinjam'),
(40, 11, 'Riski', 'Laut Bercerita', '2025-03-03', '2025-03-05', 'Dipinjam'),
(41, 14, 'Avta', 'Pulang Pergi', '2025-03-05', '2025-03-07', 'Dipinjam'),
(42, 10, 'sasa', 'Bumi Manusia', '2025-03-06', '2025-03-07', 'Dipinjam'),
(43, 13, 'Tegar', 'Pulang Pergi', '2025-03-03', '2025-03-04', 'Dipinjam'),
(45, 14, 'Avta', 'The Alpha Girls Guide', '2025-03-04', '2025-03-06', 'Dipinjam');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id` int(11) NOT NULL,
  `id_peminjaman` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nama_buku` varchar(255) DEFAULT NULL,
  `tanggal_kembali` date NOT NULL,
  `status` enum('Dikembalikan','Dipinjam') NOT NULL DEFAULT 'Dikembalikan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`id`, `id_peminjaman`, `nama`, `nama_buku`, `tanggal_kembali`, `status`) VALUES
(23, 28, 'Avta', 'Laskar Pelangi', '2025-03-04', 'Dikembalikan'),
(24, 26, 'Tegar', 'Kamu Tidak Istimewa', '2025-03-06', 'Dikembalikan'),
(30, 39, 'Tegar', 'Laut Bercerita', '2025-03-06', 'Dikembalikan'),
(31, 40, 'Riski', 'Laut Bercerita', '2025-03-05', 'Dikembalikan'),
(32, 45, 'Avta', 'The Alpha Girls Guide', '2025-03-06', 'Dikembalikan'),
(33, 43, 'Tegar', 'Pulang Pergi', '2025-03-01', 'Dikembalikan');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'admin@email.com', '123456'),
(2, 'admin@gmail.com', '12345678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_buku` (`nama_buku`),
  ADD KEY `fk_peminjaman_anggota` (`id_anggota`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_peminjaman` (`id_peminjaman`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `fk_peminjaman_anggota` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD CONSTRAINT `pengembalian_ibfk_1` FOREIGN KEY (`id_peminjaman`) REFERENCES `peminjaman` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
