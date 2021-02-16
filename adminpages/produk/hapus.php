<?php
    include "../../lib/config_web.php";
    include "../../lib/koneksi.php";

    $idProduk = $_GET['id_produk'];
    $queryHapus = mysqli_query($koneksi, "DELETE FROM tbl_produk WHERE id_produk='$idProduk'");
    if ($queryHapus) {
        echo "<script> alert('Data Produk Berhasil Dihapus'); window.location = '$admin_url'+'produk/main.php';</script>";
    } else {
        echo "<script> alert('Data Produk Gagal Dihapus'); window.location = '$admin_url'+'produk/main.php';</script>";

    }
