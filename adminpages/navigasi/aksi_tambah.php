
<?php
	// untuk memasukkan file config_web.php dan file koneksi.php
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";

	// untuk menangkap variabel  yang dikirim oleh form_tambah.php
	$nama = $_POST['nama'];
	$isi = $_POST['isi'];
	
	// query untuk menyimpan ke tabel navigasi
	
	$querySimpan = mysqli_query($koneksi, "INSERT INTO navigasi ( nama, isi) VALUES ('$nama', '$isi')");
	

	// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar navigasi
	if ($querySimpan) {
		echo "<script> alert('Data navigasi Berhasil Masuk'); window.location = '$admin_url'+'navigasi/main.php';</script>";
		// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form tambah navigasi
	} else {
		echo "<script> alert('Data navigasi Gagal Dimasukkan'); window.location = '$admin_url'+'navigasi/form_tambah.php';</script>";
	}
?>