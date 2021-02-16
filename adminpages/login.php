<?php
session_start();

include "../lib/koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];


$query = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE username='$username' AND password='$password'");
$data = mysqli_fetch_array($query);
$jml_data = mysqli_num_rows($query);


if($jml_data==1){
$_SESSION['username']=$data['username'];
$_SESSION['level']=$data['level'];

$_SESSION['user']=$data;
echo "<script>alert('Selamat Datang di Halaman Administrator');</script>";
echo "<script>location='home/main.php';</script>";
} else {
    echo "<script>alert('Mohon Maaf Periksa Akun Anda ');</script>";
    echo "<script>location='index.php';</script>";
}

?>