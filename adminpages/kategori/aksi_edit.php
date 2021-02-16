<?php
	// untuk memasukkan file config_web.php dan file koneksi.php
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";

	// untuk menangkap variabel 'nama_kategori' dan 'id_kategori' yang dikirim oleh form_edit.php
	$id_kategori = $_POST['id_kategori'];
	$nama_kategori = $_POST['nama_kategori'];
	// query untuk mengubah ke tabel tbl_kategori
	
	$querySimpan = mysqli_query($koneksi, "UPDATE tbl_kategori SET nama_kategori='$nama_kategori' WHERE id_kategori='$id_kategori'");

	// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar kategori
	if ($querySimpan) {
		echo "<script> alert('Data Kategori Berhasil Diubah'); window.location = '$admin_url'+'kategori/main.php';</script>";
		// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form edit kategori
	} else {
		echo "<script> alert('Data Kategori Gagal Dimasukkan'); window.location = '$admin_url'+'kategori/form_edit.php?id_kategori=$id_kategori';</script>";
	}
?>