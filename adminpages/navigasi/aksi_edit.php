<?php
	// untuk memasukkan file config_web.php dan file koneksi.php
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";

	// untuk menangkap variabel 'nama' dan 'id_navigasi' yang dikirim oleh form_edit.php
	$idnav = $_POST['id_navigasi'];
    $nama = $_POST['nama'];
    $isi = $_POST['isi'];
	// query untuk mengubah ke tabel navigasi
	
	$querySimpan = mysqli_query($koneksi, "UPDATE navigasi SET nama='$nama', isi='$isi' WHERE id_navigasi='$idnav'");

	// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar navigasi
	if ($querySimpan) {
		echo "<script> alert('Data navigasi Berhasil Diubah'); window.location = '$admin_url'+'navigasi/main.php';</script>";
		// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form edit navigasi
	} else {
		echo "<script> alert('Data navigasi Gagal Dimasukkan'); window.location = '$admin_url'+'navigasi/form_edit.php?id_navigasi=$idnav';</script>";
	}
?>