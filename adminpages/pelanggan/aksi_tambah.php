<?php
	// untuk memasukkan file config_web.php dan file koneksi.php
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";

	// untuk menangkap variabel 'pelanggan' yang dikirim oleh form_tambah.php
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];
    
	
	// query untuk menyimpan ke tabel pelanggan
	
	$querySimpan = mysqli_query($koneksi, "INSERT INTO pelanggan (username,password,nama,alamat,no_hp,email ) VALUES ('$username', '$password', '$nama', '$alamat', '$no_hp', '$email')");
	

	// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar pelanggan
	if ($querySimpan) {
		echo "<script> alert('Data Pelanggan Berhasil Masuk'); window.location = '$admin_url'+'pelanggan/main.php';</script>";
		// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form tambah pelanggan
	} else {
		echo "<script> alert('Data Pelanggan Gagal Dimasukkan'); window.location = '$admin_url'+'pelanggan/form_tambah.php';</script>";
	}
?>