<?php
include "../../lib/config_web.php";
include "../../lib/koneksi.php";

$idPelanggan = $_GET['id_pelanggan'];
$queryHapus = mysqli_query($koneksi, "DELETE FROM pelanggan WHERE id_pelanggan='$idPelanggan'");
if ($queryHapus) {
    echo "<script> alert('Data Pelanggan Berhasil Dihapus'); window.location = '$admin_url'+'pelanggan/main.php';</script>";
} else {
    echo "<script> alert('Data Pelanggan Gagal Dihapus'); window.location = '$admin_url'+'pelanggan/main.php';</script>";
}
