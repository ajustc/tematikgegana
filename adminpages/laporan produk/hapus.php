<?php
include "../../lib/config_web.php";
include "../../lib/koneksi.php";

$idlaporan = $_GET['id_laporan'];
$queryHapus = mysqli_query($koneksi, "DELETE FROM laporan_pesanan WHERE id_laporan='$idlaporan'");
if ($queryHapus) {
    echo "<script> alert('Data Laporan Berhasil Dihapus'); window.location = '$admin_url'+'laporan produk/main.php';</script>";
} else {
    echo "<script> alert('Data Laporan Gagal Dihapus'); window.location = '$admin_url'+'laporan produk/main.php';</script>";
}
