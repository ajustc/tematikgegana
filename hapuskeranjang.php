<?php
session_start();
/* mengambi id_produk dari url */
$id_produk=$_GET["id"];
unset($_SESSION["cart"][$id_produk]);

echo"<script>alert('produk dihapus dari keranjang');</script>";
echo"<script>location='keranjang.php';</script>";
