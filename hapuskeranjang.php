<?php
session_start();
/* mengambi id_produk dari url */
$id_produk = $_GET["id"];
unset($_SESSION["cart"][$id_produk]);

echo "<script>alert('Produk di hapus dari keranjang.');</script>";
echo "<script>location='keranjang.php';</script>";
