-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2021 at 05:34 PM
-- Server version: 10.1.39-MariaDB
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
-- Database: `tematikgegana`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `id_detail_pesanan` int(10) NOT NULL,
  `id_pesanan` int(5) NOT NULL,
  `id_produk` int(5) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `nama` varchar(500) NOT NULL,
  `harga` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`id_detail_pesanan`, `id_pesanan`, `id_produk`, `jumlah`, `nama`, `harga`) VALUES
(26, 22, 20, 30, 'Paket 4', 15000),
(27, 23, 24, 30, 'Ayam Goreng Bumbu', 8000),
(28, 23, 16, 31, 'Paket 2', 13000),
(29, 23, 17, 30, 'Paket 3', 15000),
(30, 24, 24, 30, 'Ayam Goreng Bumbu', 8000),
(31, 25, 16, 30, 'Paket 2', 13000),
(32, 26, 17, 30, 'Paket 3', 15000),
(33, 26, 13, 30, 'Paket 1', 11500),
(35, 28, 20, 30, 'Paket 4', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `laporan_pesanan`
--

CREATE TABLE `laporan_pesanan` (
  `id_laporan` int(11) NOT NULL,
  `id_pelanggan` int(10) NOT NULL,
  `id_pesanan` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `isi` varchar(500) NOT NULL,
  `gambar` varchar(300) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laporan_pesanan`
--

INSERT INTO `laporan_pesanan` (`id_laporan`, `id_pelanggan`, `id_pesanan`, `nama`, `email`, `isi`, `gambar`, `tanggal`) VALUES
(1, 7, 27, 'Rio Justicio', 'riojusticiof@gmail.com', '27', '20210216162102666.jpg', '2021-02-16'),
(2, 7, 27, 'Rio Justicio', 'riojusticiof@gmail.com', '27', '20210216162107666.jpg', '2021-02-16'),
(3, 7, 28, 'Rio Justicio', 'riojusticiof@gmail.com', '28', '20210216164326666.jpg', '2021-02-16'),
(4, 7, 28, 'Rio Justicio', 'riojusticiof@gmail.com', '28', '20210216170630-666.jpg', '2021-02-16'),
(5, 7, 28, 'Rio Justicio', 'riojusticiof@gmail.com', '28', '21-02-16_666.jpg', '2021-02-16');

-- --------------------------------------------------------

--
-- Table structure for table `navigasi`
--

CREATE TABLE `navigasi` (
  `id_navigasi` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `isi` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `navigasi`
--

INSERT INTO `navigasi` (`id_navigasi`, `nama`, `isi`) VALUES
(1, 'Cara Bayar', '<p>1. Melakukan pemesanan</p>\r\n\r\n<p>2. Menunggu konfirmasi admin</p>\r\n\r\n<ul>\r\n	<li>( Jika Bisa Pesan ) ada tombol input pembayaran&nbsp;</li>\r\n	<li>( Jika Pesanan penuh ) tidak ada tombol input pembayaran</li>\r\n</ul>\r\n\r\n<p>3. Jika sudah menginputkan pembayaran ( transfer ) tunggu pesanan sampai.</p>\r\n'),
(2, 'Cara Pesan', '<p>1. Silahkan daftar dahulu jika belum mempunyai akun.</p>\r\n\r\n<p>2. Silahkan Login.</p>\r\n\r\n<p>3. Website menyediakan pilihan paket, rekomendasi dan request ( memilih sendiri pilihan menu yang di sediakan sistem&nbsp; seperti : Nasi, Lauk, Sayur, Tambahan<br />\r\n&nbsp;&nbsp;&nbsp; dan minuman yang akan di jadikan satu paket dalam keranjang ).</p>\r\n\r\n<p>4. Jika sudah memilih pilihan, silahkan klik selesai belanja.</p>\r\n\r\n<p>5. Pada halaman checkout ( selesai belanja ), pelanggan di persilahkan mengisi form pemesanan.</p>\r\n\r\n<p>6.&nbsp;Jika sudah mengisi form, silahkan klik lanjutkan pembayaran.</p>\r\n\r\n<p>7. Tunggu konfirmasi admin.<br />\r\n&nbsp;&nbsp;&nbsp; - Jika bisa pesan ( tombol pembayaran tersedia) silahkan transfer ke rekening yang sudah di sediakan dan kirim bukti pembayaran dengan meng klik tombol pembayaran. Jika sudah, tunggu pesanan sampai.</p>\r\n\r\n<ol>\r\n	<li>333333</li>\r\n</ol>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `username`, `password`, `nama`, `alamat`, `no_hp`, `email`) VALUES
(7, 'justc', '!justc', 'Rio Justicio', 'asdqwe1', '12312312', 'riojusticiof@gmail.com'),
(8, 'user', 'user', 'user', 'ciledug', '081234567890', 'user@gmail.com'),
(9, 'iman', 'iman1945', 'iman lintang pranata', 'cipondoh makmur', '21234', 'xxx@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(10) NOT NULL,
  `id_pesanan` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `jumlah` int(200) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pesanan`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(29, 23, 'Rio', 'BCA', 1093, '2021-02-08', '20210208124707666.jpg'),
(30, 23, 'Rio', 'BCA', 1093, '2021-02-08', '20210208124707666.jpg'),
(31, 22, 'Justc', 'BCA', 460500, '2021-02-08', '20210208125733666.jpg'),
(32, 22, 'Justc', 'BCA', 460500, '2021-02-08', '20210208125733666.jpg'),
(33, 25, 'Fauziah', 'BNI', 390, '2021-02-14', '20210214094118666.jpg'),
(34, 25, 'Fauziah', 'BNI', 390, '2021-02-14', '20210214094118666.jpg'),
(35, 26, 'iman ', 'bca', 795000, '2021-02-14', '20210214095855666.jpg'),
(36, 26, 'iman ', 'bca', 795000, '2021-02-14', '20210214095855666.jpg'),
(39, 28, 'Siapa', 'bca', 120500, '2021-02-16', '20210216163020666.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(5) NOT NULL,
  `id_pelanggan` int(10) NOT NULL,
  `status_produk` varchar(100) NOT NULL DEFAULT 'Menunggu konfirmasi admin',
  `status_pesanan` varchar(50) NOT NULL DEFAULT 'Pending',
  `tgl_pesanan` date NOT NULL,
  `tgl_pengiriman` date NOT NULL,
  `jam_pesanan` time NOT NULL,
  `total_pesanan` int(50) NOT NULL,
  `Alamat_pengiriman` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_pelanggan`, `status_produk`, `status_pesanan`, `tgl_pesanan`, `tgl_pengiriman`, `jam_pesanan`, `total_pesanan`, `Alamat_pengiriman`) VALUES
(22, 7, 'Bisa pesan', 'Barang dikirim', '2021-02-08', '2021-02-08', '11:22:00', 450000, 'test'),
(23, 7, 'Bisa pesan', 'Batal', '2021-02-08', '0000-00-00', '11:11:00', 1093000, 'test2'),
(24, 7, 'Bisa pesan', 'Pending', '2021-02-08', '0000-00-00', '11:22:00', 240000, 'test3'),
(25, 8, 'Bisa pesan', 'Lunas', '2021-02-14', '2021-02-14', '20:38:00', 390000, 'parung serab, ciledug'),
(26, 9, 'Bisa pesan', 'Sudah kirim pembayaran', '2021-02-14', '2021-02-14', '18:52:00', 795000, 'cipondoh makmur'),
(28, 7, 'Bisa pesan', 'Lunas', '2021-02-16', '0000-00-00', '01:02:00', 450000, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(5) NOT NULL,
  `nama_kategori` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Paket '),
(2, 'Minuman'),
(3, 'Tambahan'),
(4, 'Nasi'),
(6, 'Sayur');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id_produk` int(5) NOT NULL,
  `id_kategori` int(5) DEFAULT NULL,
  `nama_produk` varchar(50) DEFAULT NULL,
  `harga` int(10) DEFAULT NULL,
  `gambar` varchar(50) DEFAULT NULL,
  `deskripsi` text,
  `slide` char(1) NOT NULL,
  `rekomendasi` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_produk`
--

INSERT INTO `tbl_produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga`, `gambar`, `deskripsi`, `slide`, `rekomendasi`) VALUES
(13, 1, 'Paket 1', 11500, 'Nasi+Nila Bakar+Sayur-min.jpg', '<p>Nasi Putih</p>\r\n\r\n<p>Nila Bakar</p>\r\n\r\n<p>Sayur sawi</p>\r\n\r\n<p>Sambel</p>\r\n', 'N', 'Y'),
(16, 1, 'Paket 2', 13000, 'Nasi+Ayam Goreng+Kentang Balado (2)-min.jpg', '<p>Nasi Putih</p>\r\n\r\n<p>Ayam Kecap</p>\r\n\r\n<p>Sambel Kentang</p>\r\n\r\n<p>Sayur kacang panjang</p>\r\n', 'N', 'Y'),
(17, 1, 'Paket 3', 15000, 'Nasi+Ayam Bakar-min.jpg', '<p>Nasi Putih&nbsp;</p>\r\n\r\n<p>Ayam Bakar</p>\r\n\r\n<p>Kerupuk</p>\r\n\r\n<p>capcay</p>\r\n\r\n<p>Sambel&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'N', 'Y'),
(20, 1, 'Paket 4', 15000, 'Nasi+Ayam Opor+Telur Balado-min.jpg', '<p>Nasi</p>\r\n\r\n<p>Ayam Opor</p>\r\n\r\n<p>Telor Balado</p>\r\n\r\n<p>Sayur sawi</p>\r\n\r\n<p>Sambel</p>\r\n', 'N', 'Y'),
(22, NULL, 'Ayam Bakar', 8000, 'ayam bakar.jpg', '<p>Ayam bakar dengan rasa yang nikmat</p>\r\n', 'Y', 'N'),
(23, 6, 'Ayam Cabe Hijau', 8000, 'ayam cabe hijau 2.png', '<p>Ayam goreng dengan tambahan cabe hijau yang nikmat&nbsp;</p>\r\n', 'N', 'N'),
(24, NULL, 'Ayam Goreng Bumbu', 8000, 'ayam goreng bumbu.png', '<p>Ayam goreng dengan bumbu rempah-rempah</p>\r\n', 'Y', 'N'),
(27, 6, 'Cap cay', 4000, 'capcay.jpg', '<p>Cap Cay dengan berbagai sayur wortel</p>\r\n\r\n<p>brokoli dan kol</p>\r\n', 'N', 'N'),
(28, 6, 'Ca kangkung', 4000, 'kangkung 2.jpg', '<p>Ca kangkung dengan di tumis&nbsp;</p>\r\n', 'Y', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(5) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `level` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `nama`, `email`, `level`) VALUES
(6, 'justc', '!justc', 'Rio Justicio', 'riojusticiof@gmail.com', 'A'),
(8, 'justco', '!justc', 'Rio Justicio', 'riojusticiof@gmail.com', 'O');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `id_testi` int(11) NOT NULL,
  `id_pelanggan` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `isi` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`id_testi`, `id_pelanggan`, `nama`, `email`, `tanggal`, `isi`) VALUES
(6, 1, 'Tirta Prasetyo', 'tirtaprasetyo1111@gmail.com', '2020-01-06', 'Sangat membantu yang sedang mencari makanan untuk acara seperti arisan dan pelayanan nya bagus. terimakasih'),
(8, 2, 'tyo', 'bayukuncoro@gmail.com', '2020-01-06', 'Keren sangat membantu'),
(9, 6, 'Kass', 'ee99@gmail.com', '2020-01-06', 'Tepat waktu dan masakan nya enak'),
(10, 7, 'Rio Justicio', 'riojusticiof@gmail.com', '2021-02-15', 'Mau meninggal, enak banget males.'),
(11, 7, 'Rio Justicio', 'riojusticiof@gmail.com', '2021-02-15', 'Hahahaha ngaco enak bgt');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`id_detail_pesanan`),
  ADD KEY `id_pesanan` (`id_pesanan`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `laporan_pesanan`
--
ALTER TABLE `laporan_pesanan`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `id_pesanan` (`id_pesanan`),
  ADD KEY `fk_pelanggan` (`id_pelanggan`) USING BTREE;

--
-- Indexes for table `navigasi`
--
ALTER TABLE `navigasi`
  ADD PRIMARY KEY (`id_navigasi`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_pesanan` (`id_pesanan`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `fk_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id_testi`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  MODIFY `id_detail_pesanan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `laporan_pesanan`
--
ALTER TABLE `laporan_pesanan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `navigasi`
--
ALTER TABLE `navigasi`
  MODIFY `id_navigasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id_produk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id_testi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD CONSTRAINT `fk_pesanan` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `fk_pelanggan` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD CONSTRAINT `tbl_produk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tbl_kategori` (`id_kategori`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
