<?php
	// untuk memasukkan file config_web.php dan file koneksi.php
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";

	// untuk menangkap variabel 'nama_kategori' yang dikirim oleh form_tambah.php
	$nama_kategori = $_POST['nama_kategori'];
	// query untuk menyimpan ke tabel tbl_kategori
	
	$querySimpan = mysqli_query($koneksi, "INSERT INTO tbl_kategori (nama_kategori) VALUES ('$nama_kategori')");

	// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar kategori
	if ($querySimpan) {
		echo "<script> alert('Data Kategori Berhasil Masuk'); window.location = '$admin_url'+'kategori/main.php';</script>";
		// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form tambah kategori
	} else {
		echo "<script> alert('Data Kategori Gagal Dimasukkan'); window.location = '$admin_url'+'kategori/form_tambah.php';</script>";
	}
?>