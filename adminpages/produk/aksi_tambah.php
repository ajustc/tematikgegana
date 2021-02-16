<?php
// untuk memasukkan file config_web.php dan file koneksi.php
include "../../lib/config_web.php";
include "../../lib/koneksi.php";

// untuk menangkap variabel 'nama_kategori' yang dikirim oleh form_tambah.php
$namaKategori = $_POST['nama_kategori'];
$namaProduk = $_POST['nama_produk'];
$fileName = $_FILES['gambar']['name'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];
$slide = $_POST['slide'];
$rekomendasi = $_POST['rekomendasi'];
// query untuk menyimpan ke tabel tbl_produk

$querySimpan = mysqli_query($koneksi, "INSERT INTO tbl_produk (id_kategori, nama_produk, harga, gambar, deskripsi, slide, rekomendasi) 
VALUES ('$namaKategori', '$namaProduk', '$harga', '$fileName', '$deskripsi', '$slide', '$rekomendasi')");

move_uploaded_file($_FILES['gambar']['tmp_name'], "../../file/produk/" . $_FILES['gambar']['name']);

// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar kategori
if ($querySimpan) {
	echo "<script> alert('Data Produk Berhasil Masuk'); window.location = '$admin_url'+'produk/main.php';</script>";
	// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form tambah kategori
} else {
	echo "<script> alert('Data Produk Gagal Dimasukkan'); window.location = '$admin_url'+'produk/form_tambah.php';</script>";
}
