
<?php
	// untuk memasukkan file config_web.php dan file koneksi.php
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";

	// untuk menangkap variabel  yang dikirim oleh form_tambah.php
	$nama = $_POST['nama'];
    $email = $_POST['email'];
    $tanggal = date("y-m-d");
	$isi = $_POST['isi'];
	
	// query untuk menyimpan ke tabel testimoni
	
	$querySimpan = mysqli_query($koneksi, "INSERT INTO testimoni ( nama, email, tanggal, isi) VALUES ('$nama', '$email', '$tanggal', '$isi')");
	

	// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar testimoni
	if ($querySimpan) {
		echo "<script> alert('Data testimoni Berhasil Masuk'); window.location = '$admin_url'+'testimoni/main.php';</script>";
		// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form tambah testimoni
	} else {
		echo "<script> alert('Data testimoni Gagal Dimasukkan'); window.location = '$admin_url'+'testimoni/form_tambah.php';</script>";
	}
?>