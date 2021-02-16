<?php
	// untuk memasukkan file config_web.php dan file koneksi.php
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";

	// untuk menangkap variabel 'pengguna' dan 'id_user' yang dikirim oleh form_edit.php
	$id_user = $_POST['id_user'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $level = $_POST['level'];
	// query untuk mengubah ke tabel pengguna
	
		$querySimpan = mysqli_query($koneksi, "UPDATE tbl_user SET username='$username', password='$password', nama='$nama', email='$email', level='$level' WHERE id_user='$id_user'");
	

	// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar pengguna
	if ($querySimpan) {
		echo "<script> alert('Data Pengguna Berhasil Diubah'); window.location = '$admin_url'+'user/main.php';</script>";
		// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form edit pengguna
	} else {
		echo "<script> alert('Data Pengguna Gagal Dimasukkan'); window.location = '$admin_url'+'user/form_edit.php?id_user=$id_user';</script>";
	}
?>