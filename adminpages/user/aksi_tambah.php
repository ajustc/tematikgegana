<?php
	// untuk memasukkan file config_web.php dan file koneksi.php
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";

	// untuk menangkap variabel 'tbl_user' yang dikirim oleh form_tambah.php
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $level = $_POST['level'];
    
	
	// query untuk menyimpan ke tabel user
	
	$querySimpan = mysqli_query($koneksi, "INSERT INTO tbl_user (username,password,nama,email,level ) VALUES ('$username', '$password', '$nama', '$email', '$level')");
	

	// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar pengguna
	if ($querySimpan) {
		echo "<script> alert('Data Pengguna Berhasil Masuk'); window.location = '$admin_url'+'user/main.php';</script>";
		// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form tambah pengguna
	} else {
		echo "<script> alert('Data Pengguna Gagal Dimasukkan'); window.location = '$admin_url'+'user/form_tambah.php';</script>";
	}
?>