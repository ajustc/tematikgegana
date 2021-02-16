<?php
    include "../../lib/config_web.php";
    include "../../lib/koneksi.php";

    $idpesanan = $_GET['id'];
    $queryHapus = mysqli_query($koneksi, "DELETE FROM pesanan WHERE id_pesanan='$idpesanan'");
    if ($queryHapus) {
        echo "<script> alert('Data Pesanan Berhasil Dihapus'); window.location = '$admin_url'+'pesanan/main.php';</script>";
    } else {
        echo "<script> alert('Data Pesanan Gagal Dihapus'); window.location = '$admin_url'+'pesanan/main.php';</script>";

    }
?>