<?php
	// untuk memasukkan file config_web.php dan file koneksi.php
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";

	// untuk menangkap variabel 'nama' dan 'id_testi' yang dikirim oleh form_edit.php
	$id_testi = $_POST['id_testi'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $isi = $_POST['isi'];
	// query untuk mengubah ke tabel testimoni
	
	$querySimpan = mysqli_query($koneksi, "UPDATE testimoni SET nama='$nama', email='$email', isi='$isi' WHERE id_testi='$id_testi'");

	// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar testimoni
	if ($querySimpan) {
		echo "<script> alert('Data Testimoni Berhasil Diubah'); window.location = '$admin_url'+'testimoni/main.php';</script>";
		// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form edit testimoni
	} else {
		echo "<script> alert('Data Testimoni Gagal Dimasukkan'); window.location = '$admin_url'+'testimoni/form_edit.php?id_testi=$id_testi';</script>";
	}
?>