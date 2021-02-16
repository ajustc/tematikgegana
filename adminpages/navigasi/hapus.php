<?php
    include "../../lib/config_web.php";
    include "../../lib/koneksi.php";

    $idnav = $_GET['id_navigasi'];
    $queryHapus = mysqli_query($koneksi, "DELETE FROM navigasi WHERE id_navigasi='$idnav'");
    if ($queryHapus) {
        echo "<script> alert('Data navigasi Berhasil Dihapus'); window.location = '$admin_url'+'navigasi/main.php';</script>";
    } else {
        echo "<script> alert('Data navigasi Gagal Dihapus'); window.location = '$admin_url'+'navigasi/main.php';</script>";

    }
?>