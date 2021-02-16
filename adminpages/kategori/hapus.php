<?php
    include "../../lib/config_web.php";
    include "../../lib/koneksi.php";

    $idKategori = $_GET['id_kategori'];
    $queryHapus = mysqli_query($koneksi, "DELETE FROM tbl_kategori WHERE id_kategori='$idKategori'");
    if ($queryHapus) {
        echo "<script> alert('Data Kategori Berhasil Dihapus'); window.location = '$admin_url'+'kategori/main.php';</script>";
    } else {
        echo "<script> alert('Data Kategori Gagal Dihapus'); window.location = '$admin_url'+'kategori/main.php';</script>";

    }
?>