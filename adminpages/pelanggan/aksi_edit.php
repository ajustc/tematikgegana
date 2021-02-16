<?php
	// untuk memasukkan file config_web.php dan file koneksi.php
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";

	// untuk menangkap variabel 'pelanggan' dan 'id_pelanggan' yang dikirim oleh form_edit.php
	$id_pelanggan = $_POST['id_pelanggan'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];
	// query untuk mengubah ke tabel pelanggan
	
		$querySimpan = mysqli_query($koneksi, "UPDATE pelanggan SET username='$username', password='$password', nama='$nama', alamat='$alamat', email='$email', no_hp='$no_hp' WHERE id_pelanggan='$id_pelanggan'");
	

	// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar kategori
	if ($querySimpan) {
		echo "<script> alert('Data Pelanggan Berhasil Diubah'); window.location = '$admin_url'+'pelanggan/main.php';</script>";
		// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form edit kategori
	} else {
		echo "<script> alert('Data Pelanggan Gagal Dimasukkan'); window.location = '$admin_url'+'pelanggan/form_edit.php?id_pelanggan=$id_pelanggan';</script>";
	}
?>