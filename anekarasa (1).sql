-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jan 2020 pada 10.04
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anekarasa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pesanan`
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
-- Dumping data untuk tabel `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`id_detail_pesanan`, `id_pesanan`, `id_produk`, `jumlah`, `nama`, `harga`) VALUES
(7, 4, 15, 30, 'Paket 3', 16000),
(8, 5, 16, 30, 'Paket 4', 13000),
(10, 7, 17, 30, 'Paket 5', 15000),
(11, 8, 16, 30, 'Paket 4', 13000),
(12, 9, 17, 30, 'Paket 5', 15000),
(13, 10, 19, 30, 'Es Teh', 4000),
(14, 11, 17, 30, 'Paket 5', 15000),
(15, 12, 19, 30, 'Es Teh', 4000),
(16, 13, 19, 30, 'Es Teh', 4000),
(17, 13, 14, 30, 'Paket 2', 15000),
(19, 15, 13, 30, 'Paket 1', 15000),
(20, 16, 17, 30, 'Paket 5', 15000),
(21, 17, 22, 30, 'Ayam Bakar', 8000),
(22, 18, 13, 30, 'Paket 1', 15000),
(23, 19, 13, 30, 'Paket 1', 15000),
(24, 20, 13, 30, 'Paket 1', 15000),
(25, 21, 28, 50, 'Ca kangkung', 4000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `navigasi`
--

CREATE TABLE `navigasi` (
  `id_navigasi` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `isi` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `navigasi`
--

INSERT INTO `navigasi` (`id_navigasi`, `nama`, `isi`) VALUES
(1, 'Cara Bayar', '<p>1. melakukan pemesanan</p>\r\n\r\n<p>2. menunggu konfirmasi admin</p>\r\n\r\n<ul>\r\n	<li>( jika bisa pesan ) ada tombol input pembayaran&nbsp;</li>\r\n	<li>( jika pesanan penuh ) tidak ada tombol input pembayaran</li>\r\n</ul>\r\n\r\n<p>3. jika sudah menginputkan pembayaran ( transfer ) tunggu pesanan sampai.</p>\r\n'),
(2, 'Cara Pesan', '<p>1. Silahkan daftar dahulu jika belum mempunyai akun.</p>\r\n\r\n<p>2. Silahkan Login.</p>\r\n\r\n<p>3. website menyediakan pilihan paket, rekomendasi dan request ( memilih sendiri pilihan menu yang di sediakan sistem&nbsp; seperti : Nasi, Lauk, Sayur, Tambahan dan minuman yang akan di jadikan satu paket dalam keranjang ).</p>\r\n\r\n<p>4. Jika sudah memilih pilihan, silahkan klik selesai belanja.</p>\r\n\r\n<p>5. pada halaman checkout ( selesai belanja ), pelanggan di persilahkan mengisi form pemesanan</p>\r\n\r\n<p>6. jika sudah mengisi form, silahkan klik lanjutkan pembayaran.</p>\r\n\r\n<p>7 tunggu konfirmasi admin</p>\r\n\r\n<p>&nbsp; &nbsp;a. jika bisa pesan ( tombol pembayaran muncul ) silahkan transfer ke rekening yang sudah di sediakan</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp;dan kirim bukti pembayaran dengan meng klik tombol pembayaran. jika sudah tunggu pesanan datang.</p>\r\n\r\n<p>&nbsp; &nbsp;b. jika pesanan penuh tidak bisa melanjutkan pemesanan dan gagal.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;</p>\r\n\r\n<');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
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
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `username`, `password`, `nama`, `alamat`, `no_hp`, `email`) VALUES
(1, 'Tirta Prasetyo', '12345678', 'Tirta Prasetyo', 'Jaten sendangadi', '089607707067', 'tirtaprasetyo1111@gmail.com'),
(2, 'tyo', '12345', 'tyo', 'Jaten Rt 04 Rw 30', '089607707067', 'bayukuncoro@gmail.com'),
(5, 'sanitya novitasari', '201196', 'sanitya', 'godean', '089671372404', 'sanitya@gmail.com'),
(6, 'ksksks', 'ksksksks', 'Kass', 'Kjak', '08899899000', 'ee99@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
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
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pesanan`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(5, 7, 'tyo', 'BRI', 450000, '2019-11-02', '20191102075046'),
(6, 7, 'tyo', 'BRI', 450000, '2019-11-02', '20191102075046'),
(7, 8, 'tyo', 'BRI', 390000, '2019-11-02', '20191102081205'),
(8, 8, 'tyo', 'BRI', 390000, '2019-11-02', '20191102081205'),
(9, 9, 'tyo', 'Mandiri', 450000, '2019-11-02', '20191102081722'),
(10, 9, 'tyo', 'Mandiri', 450000, '2019-11-02', '20191102081722'),
(11, 10, 'tyo', 'BRI', 120000, '2019-11-02', '20191102082153'),
(12, 10, 'tyo', 'BRI', 120000, '2019-11-02', '20191102082153'),
(13, 11, 'sanitya', 'Mandiri', 450000, '2019-11-02', '20191102085046'),
(14, 11, 'sanitya', 'Mandiri', 450000, '2019-11-02', '20191102085046'),
(15, 12, 'sanitya', 'Mandiri', 120000, '2019-11-02', '20191102085823IMG_20180306_125800.jpg'),
(16, 12, 'sanitya', 'Mandiri', 120000, '2019-11-02', '20191102085823IMG_20180306_125800.jpg'),
(17, 13, 'sanitya', 'BRI', 570000, '2019-11-02', '2019110209030915_12_8960.jpg'),
(18, 13, 'sanitya', 'BRI', 570000, '2019-11-02', '2019110209030915_12_8960.jpg'),
(19, 15, 'sanitya', 'mandiri', 450000, '2019-11-07', '201911070631534.jpg'),
(20, 15, 'sanitya', 'mandiri', 450000, '2019-11-07', '201911070631534.jpg'),
(21, 16, 'Tirta Prasetyo', 'Mandiri', 450000, '2019-11-08', '201911080336482.jpg'),
(22, 16, 'Tirta Prasetyo', 'Mandiri', 450000, '2019-11-08', '201911080336482.jpg'),
(23, 17, 'Kass', 'BNI Syariah', 240000, '2019-12-20', '20191220073336[NaishoGroup] NOGIZAKA46 5th YEAR BIRTHDAY LIVE Day 1 (Hashimoto Nanami Graduation).mp4_snapshot_02.28.23_[2019.10.23_17.03.03].jpg'),
(24, 17, 'Kass', 'BNI Syariah', 240000, '2019-12-20', '20191220073336[NaishoGroup] NOGIZAKA46 5th YEAR BIRTHDAY LIVE Day 1 (Hashimoto Nanami Graduation).mp4_snapshot_02.28.23_[2019.10.23_17.03.03].jpg'),
(25, 5, 'tirta', 'Mandiri', 390000, '2020-01-06', '20200106031527Belimbing-wuluh.jpg'),
(26, 5, 'tirta', 'Mandiri', 390000, '2020-01-06', '20200106031527Belimbing-wuluh.jpg'),
(27, 19, '', '', 0, '2020-01-11', '20200111135316Nogizaka46-Mizuki-Yamashita-First-Photobook-Unforgettable-Person.jpg'),
(28, 19, '', '', 0, '2020-01-11', '20200111135316Nogizaka46-Mizuki-Yamashita-First-Photobook-Unforgettable-Person.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(5) NOT NULL,
  `id_pelanggan` int(10) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Menunggu konfirmasi admin',
  `status_pesanan` varchar(50) NOT NULL DEFAULT 'Pending',
  `tgl_pesanan` date NOT NULL,
  `tgl_pengiriman` date NOT NULL,
  `jam_pesanan` time NOT NULL,
  `total_pesanan` int(50) NOT NULL,
  `Alamat_pengiriman` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_pelanggan`, `status`, `status_pesanan`, `tgl_pesanan`, `tgl_pengiriman`, `jam_pesanan`, `total_pesanan`, `Alamat_pengiriman`) VALUES
(4, 1, 'menunggu konfirmasi admin', 'Pending', '2019-10-31', '2019-11-04', '09:00:00', 480000, 'tambun selatan, bekasi'),
(5, 1, 'bisa pesan', 'Sudah kirim pembayaran', '2031-10-19', '2019-11-22', '11:00:00', 390000, 'sleman'),
(7, 2, 'menunggu konfirmasi admin', 'batal', '2019-11-02', '2019-11-04', '08:00:00', 450000, 'Beran kidul, sleman DIY'),
(8, 2, 'bisa pesan', 'Sudah kirim pembayaran', '2019-11-02', '2019-11-07', '12:00:00', 390000, 'kulonprogo'),
(9, 2, 'bisa pesan', 'Sudah kirim pembayaran', '2019-11-02', '2019-11-14', '13:00:00', 450000, 'mlati'),
(10, 2, 'bisa pesan', 'Sudah kirim pembayaran', '2019-11-02', '2019-11-21', '13:00:00', 120000, 'papua'),
(11, 5, 'bisa pesan', 'Sudah kirim pembayaran', '2019-11-02', '2019-11-13', '08:30:00', 450000, 'godean sleman'),
(12, 5, 'bisa pesan', 'Sudah kirim pembayaran', '2019-11-02', '2019-11-20', '15:00:00', 120000, 'Jaten Rt 04 Rw 30'),
(13, 5, 'bisa pesan', 'barang dikirim', '2019-11-02', '2019-11-10', '20:00:00', 570000, 'condongcatur depok'),
(15, 5, 'bisa pesan', 'barang dikirim', '2019-11-07', '2019-11-09', '10:30:00', 450000, 'jaten sendangadi mlati sleman'),
(16, 1, 'bisa pesan', 'lunas', '2019-11-08', '2019-11-13', '19:58:00', 450000, 'Jaten Rt 04 Rw 30'),
(17, 6, 'bisa pesan', 'barang dikirim', '2019-12-20', '2016-07-29', '03:33:00', 240000, 'gggg'),
(18, 1, 'pesanan penuh', 'Pending', '2020-01-06', '2020-01-08', '00:08:00', 450000, ''),
(19, 6, 'bisa pesan', 'Sudah kirim pembayaran', '2020-01-11', '0000-00-00', '00:00:00', 450000, ''),
(20, 1, 'bisa pesan', 'Pending', '2020-01-16', '2020-01-18', '08:10:00', 450000, 'Bekasi'),
(21, 1, 'pesanan penuh', 'Pending', '2020-01-17', '2020-01-20', '20:30:00', 200000, 'Jaten Rt 04 Rw 30 sendangadi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(5) NOT NULL,
  `nama_kategori` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Paket '),
(2, 'Minuman'),
(3, 'Tambahan'),
(4, 'Nasi'),
(5, 'Lauk'),
(6, 'Sayur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_produk`
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
-- Dumping data untuk tabel `tbl_produk`
--

INSERT INTO `tbl_produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga`, `gambar`, `deskripsi`, `slide`, `rekomendasi`) VALUES
(13, 1, 'Paket 1', 15000, 'Nasi+Nila Bakar+Sayur-min.jpg', '<p>Nasi Putih</p>\r\n\r\n<p>Nila Bakar</p>\r\n\r\n<p>Sayur sawi</p>\r\n\r\n<p>Sambel</p>\r\n', 'N', 'Y'),
(16, 1, 'Paket 2', 13000, 'Nasi+Ayam Goreng+Kentang Balado (2)-min.jpg', '<p>Nasi Putih</p>\r\n\r\n<p>Ayam Kecap</p>\r\n\r\n<p>Sambel Kentang</p>\r\n\r\n<p>Sayur kacang panjang</p>\r\n', 'N', 'Y'),
(17, 1, 'Paket 3', 15000, 'Nasi+Ayam Bakar-min.jpg', '<p>Nasi Putih&nbsp;</p>\r\n\r\n<p>Ayam Bakar</p>\r\n\r\n<p>Kerupuk</p>\r\n\r\n<p>capcay</p>\r\n\r\n<p>Sambel&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'N', 'Y'),
(20, 1, 'Paket 4', 15000, 'Nasi+Ayam Opor+Telur Balado-min.jpg', '<p>Nasi</p>\r\n\r\n<p>Ayam Opor</p>\r\n\r\n<p>Telor Balado</p>\r\n\r\n<p>Sayur sawi</p>\r\n\r\n<p>Sambel</p>\r\n', 'N', 'Y'),
(22, 5, 'Ayam Bakar', 8000, 'ayam bakar.jpg', '<p>Ayam bakar dengan rasa yang nikmat</p>\r\n', 'Y', 'N'),
(23, 5, 'Ayam Cabe Hijau', 8000, 'ayam cabe hijau 2.png', '<p>Ayam goreng dengan tambahan cabe hijau yang nikmat&nbsp;</p>\r\n', 'Y', 'N'),
(24, 5, 'Ayam Goreng Bumbu', 8000, 'ayam goreng bumbu.png', '<p>Ayam goreng dengan bumbu rempah-rempah</p>\r\n', 'Y', 'N'),
(27, 6, 'Cap cay', 4000, 'capcay.jpg', '<p>Cap Cay dengan berbagai sayur wortel</p>\r\n\r\n<p>brokoli dan kol</p>\r\n', 'N', 'N'),
(28, 6, 'Ca kangkung', 4000, 'kangkung 2.jpg', '<p>Ca kangkung dengan di tumis&nbsp;</p>\r\n', 'N', 'N');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
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
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `nama`, `email`, `level`) VALUES
(1, 'admin', 'admin', 'Tirta Prasetyo', 'tirtaprasetyo1111@gmail.com', 'A'),
(2, 'operator', 'operator', 'Bayu Kuncoro', 'bayukuncoro@gmail.com', 'O'),
(4, 'Tirta Prasetyo', 'admin', 'tirta prasetyo', 'prasetyotirta2@gmail.com', 'A'),
(5, 'tyo', 'rahasia', 'Tirta Prasetyo', 'tirtaprasetyo1111@gmail.com', 'O');

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimoni`
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
-- Dumping data untuk tabel `testimoni`
--

INSERT INTO `testimoni` (`id_testi`, `id_pelanggan`, `nama`, `email`, `tanggal`, `isi`) VALUES
(6, 1, 'Tirta Prasetyo', 'tirtaprasetyo1111@gmail.com', '2020-01-06', 'Sangat membantu yang sedang mencari makanan untuk acara seperti arisan dan pelayanan nya bagus. terimakasih'),
(8, 2, 'tyo', 'bayukuncoro@gmail.com', '2020-01-06', 'Keren sangat membantu'),
(9, 6, 'Kass', 'ee99@gmail.com', '2020-01-06', 'Tepat waktu dan masakan nya enak');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`id_detail_pesanan`),
  ADD KEY `id_pesanan` (`id_pesanan`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `navigasi`
--
ALTER TABLE `navigasi`
  ADD PRIMARY KEY (`id_navigasi`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_pesanan` (`id_pesanan`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `fk_pelanggan` (`id_pelanggan`);

--
-- Indeks untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id_testi`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  MODIFY `id_detail_pesanan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `navigasi`
--
ALTER TABLE `navigasi`
  MODIFY `id_navigasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id_produk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id_testi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD CONSTRAINT `fk_pesanan` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `fk_pelanggan` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD CONSTRAINT `tbl_produk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tbl_kategori` (`id_kategori`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Ketidakleluasaan untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  ADD CONSTRAINT `testimoni_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
