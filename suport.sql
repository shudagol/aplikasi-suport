-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 17 Feb 2017 pada 10.17
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `suport`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `isi` text NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `issue_id` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `comment`
--

INSERT INTO `comment` (`comment_id`, `isi`, `user_id`, `issue_id`, `created_at`, `tgl`) VALUES
(2, '<p>dsdsdsd</p>', '2', '80', '2017-02-13 22:01:07', '2017-02-14'),
(3, '<p>askmkask</p>', '2', '80', '2017-02-13 22:02:00', '2017-02-14'),
(4, '<p>asassd</p>', '2', '80', '2017-02-13 22:05:35', '2017-02-14'),
(5, '<p>sddsd</p><p><br></p>', '2', '80', '2017-02-13 22:06:07', '2017-02-14'),
(6, 'Coba cari&nbsp;aplikasi&nbsp;untuk melakukan&nbsp;restore', '2', '78', '2017-02-13 22:31:00', '2017-02-14'),
(7, '<p>Sekarang tolong dicoba lagi, tadi ada pemadaman listrik dari PLN</p>', '2', '79', '2017-02-13 22:52:37', '2017-02-14'),
(8, '<p>cari di menu</p>', '1', '82', '2017-02-15 20:42:35', '2017-02-16'),
(9, '<p>klik insert chart</p>', '1', '82', '2017-02-16 00:54:06', '2017-02-16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `issue`
--

CREATE TABLE `issue` (
  `issue_id` int(11) NOT NULL,
  `judul` varchar(250) NOT NULL DEFAULT '0',
  `isi` text NOT NULL,
  `user_id` varchar(50) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `status` enum('solved','open') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `issue`
--

INSERT INTO `issue` (`issue_id`, `judul`, `isi`, `user_id`, `created_at`, `tgl`, `status`) VALUES
(74, 'Wifi Limit Akses', '<p>wifi tidak bisa menyambung karena&nbsp;limit akses</p>', '1', '2017-02-11 00:55:45', '2017-02-11', 'solved'),
(75, 'Email Tidak Bisa Terkirim', '<p>email yang saya kirimkan tidak bisa&nbsp; terkirim</p>', '1', '2017-02-11 01:20:39', '2017-02-11', 'solved'),
(76, 'Tidak Bisa Menerima Email', '<p>Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur aliquet quam id dui posuere blandit. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada.<br></p>', '1', '2017-02-11 01:27:38', '2017-02-11', 'solved'),
(77, 'Tidak Bisa Login DMS Alfresco', '<p>user dan password saya&nbsp;tidak&nbsp;bisa&nbsp;digunakan login alfresco</p>', '1', '2017-02-11 01:29:39', '2017-02-11', 'solved'),
(78, 'Bagaimana mengembalikan file di flashdisk yang hilang', '<p>Flasdisk saya terformat dan itu merupakan data yang penting, bagaimana cara mengembalikannya ya ?</p>', '1', '2017-02-11 01:32:50', '2017-02-11', 'solved'),
(79, 'Printer tiba tiba mati ketika digunakan', '<p>Quisque velit nisi, pretium ut lacinia in, elementum id enim. Pellentesque in ipsum id orci porta dapibus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Nulla quis lorem ut libero malesuada feugiat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Proin eget tortor risus. Cras ultricies ligula sed magna dictum porta. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.<br></p>', '1', '2017-02-11 02:00:38', '2017-02-11', 'solved'),
(80, 'Wifi putus nyambung', '<p>Donec rutrum congue leo eget malesuada. Curabitur aliquet quam id dui posuere blandit. Donec rutrum congue leo eget malesuada. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Vivamus suscipit tortor eget felis porttitor volutpat. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Cras ultricies ligula sed magna dictum porta. Pellentesque in ipsum id orci porta dapibus. Pellentesque in ipsum id orci porta dapibus.<br></p>', '2', '2017-02-12 21:45:28', '2017-02-13', 'solved'),
(82, 'Bagaimana cara membuat grafik di excel ?', '<p>Saya ingin membuat&nbsp;grafik chart di excel</p>', '1', '2017-02-13 23:16:57', '2017-02-14', 'solved'),
(83, 'ckeditor', '<p>teks&nbsp;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Curabitur aliquet quam id dui posuere blandit. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eget tortor risus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.</p>\r\n', '9', '2017-02-16 04:30:37', '2017-02-16', 'solved'),
(84, 'gambar', '<p><img alt="" src="/assets/ckeditor/plugins/fileman/Uploads/Cristiano_Ronaldo.jpg" style="height:166px; width:250px" /></p>\r\n\r\n<p>tes</p>\r\n', '9', '2017-02-16 04:55:21', '2017-02-16', 'solved');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` bigint(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','member') NOT NULL,
  `nama` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`, `nama`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'Admin Master'),
(2, 'member', '202cb962ac59075b964b07152d234b70', 'member', 'Member sample'),
(7, 'alex', '202cb962ac59075b964b07152d234b70', 'member', 'alex gordon '),
(8, 'maya', '202cb962ac59075b964b07152d234b70', 'member', 'Maya Sari Dewanti'),
(9, 'iwobi', '202cb962ac59075b964b07152d234b70', 'member', 'iwobi trofi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `issue`
--
ALTER TABLE `issue`
  ADD PRIMARY KEY (`issue_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `issue`
--
ALTER TABLE `issue`
  MODIFY `issue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
