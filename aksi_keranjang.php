<?php
session_start();
include "lib/koneksi.php";
// mendapatkan id produk dari url
$id_produk = $_GET['id_produk'];


// jika sudah ada produk di keranjang, maka produk itu jumlahnya di +1
if (isset($_SESSION['cart'][$id_produk])) {
    $_SESSION['cart'][$id_produk] += 1;
}
// jika belum ada di tbl_produk, maka produk dianggap beli
else {
    $_SESSION['cart'][$id_produk] = 30;
}

// di larikan ke halaman keranjang
echo "<script>alert('Produk telah masuk ke keranjang belanja.');</script>";
echo "<script>location='keranjang.php';</script>";

/* //di cek apakah barang yang di beli sudah ada di tabel order temp
$sql = mysqli_query("SELECT id_produk FROM pesanan WHERE id_produk='$id_pro' AND id_session='$sid'");
    $ketemu = mysqli_num_rows($sql);
    //jika ketemu
    //exit();
    if ($ketemu==0){
        //kalau barang belum ada, maka di jalankan perintah insert(masukkan)
        mysqli_query("INSERT INTO pesanan (status_pesanan, id_produk, jumlah, id_session)
        VALUE ('P','$id_pro', 1, '$sid')");
    } else {
        //kalau barang ada, maka di jalankan perintah update
        mysqli_query("UPDATE pesanan SET jumlah = jumlah + 1 
                        WHERE id_session = '$sid' AND id_produk = '$id_pro'");
    }
    header ('location:tampil  keranjang.php'); */
