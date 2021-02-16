<?php
    include "../../lib/config_web.php";
    include "../../lib/koneksi.php";

    $idTesti = $_GET['id_testi'];
    $queryHapus = mysqli_query($koneksi, "DELETE FROM testimoni WHERE id_testi='$idTesti'");
    if ($queryHapus) {
        echo "<script> alert('Data testimoni Berhasil Dihapus'); window.location = '$admin_url'+'testimoni/main.php';</script>";
    } else {
        echo "<script> alert('Data testimoni Gagal Dihapus'); window.location = '$admin_url'+'testimoni/main.php';</script>";

    }
?>