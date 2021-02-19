<?php
session_start();
include "lib/koneksi.php";
include "templates/header.php";

if (empty($_SESSION["cart"]) or !isset($_SESSION["cart"])) {
    echo "<script>alert('Keranjang Kosong, Silahkan belanja dahulu');</script>";
    echo "<script>location='index.php';</script>";
}

?>
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class="active">Keranjang Belanja</li>
                <ol>
                    <h3>Daftar Keranjang Anda</h3>
                    <div class="table-responsive cart_info">
                        <table class="table table-condensed text-center">
                            <thead class="text-center">
                                <tr class="cart_menu">
                                    <td>No</td>
                                    <td>Barang</td>
                                    <td>Deskripsi</td>
                                    <td>Harga</td>
                                    <td>Jumlah</td>
                                    <td>Subtotal</td>
                                    <td></td>
                                </tr>
                            </thead>
                            <?php $nomer = 1; ?>
                            <?php $total = 0; ?>
                            <?php foreach ($_SESSION["cart"] as $id_produk => $jumlah) : ?>
                                <?php
                                $sql = mysqli_query($koneksi, "SELECT * from tbl_produk WHERE id_produk='$id_produk'");
                                $d = $sql->fetch_assoc();
                                $subtotal = ((int)$d['harga'] * (int)$jumlah);
                                ?>
                                <tbody>
                                    <tr>
                                        <td class="cart_nomer">
                                            <p><?php echo $nomer; ?></p>
                                        </td>
                                        <td class="cart_image">
                                            <img src="file/produk/<?php echo $d['gambar']; ?>" width='100px' height='70px' alt="">
                                        </td>
                                        <td class="cart_description">
                                            <p><?php echo $d['nama_produk']; ?></p>
                                        </td>
                                        <td class="cart_price">
                                            <p>Rp. <?php echo number_format($d['harga']); ?></p>
                                        </td>
                                        <td class="cart_quantity">
                                            <p><?php echo $jumlah; ?></p>
                                        </td>
                                        <td class="cart_subtotal">
                                            <p class="cart_subtotal_price">Rp.<?php echo number_format($subtotal); ?></p>
                                        </td>

                                        <td class="cart_delete">
                                            <a class="cart_quantity_delete" href="hapuskeranjang.php?id=<?php echo $id_produk ?>"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                    <?php $nomer++; ?>
                                    <?php $total += $subtotal; ?>
                                <?php endforeach ?>
                                <tr>
                                    <td class="cart_total_price text-end" colspan="5">Total Belanja</td>
                                    <td class="cart_total_price">Rp. <?php echo number_format($total) ?></td>
                                </tr>
                                </tbody>
                        </table>
                    </div>
                    <a href="index.php" class="btn btn-primary">Tambah Pesanan</a>
                    <a href="checkout.php" class="btn btn-primary">Selesai Belanja</a>
        </div>
</section>
<?php include "templates/footer.php"; ?>