<?php
session_start();
include "lib/koneksi.php";
include "templates/header.php";

//jika tidak ada session pelanggan (blm melakukan login), maka dilarikan ke login.php
if (!isset($_SESSION["pelanggan"]) or empty($_SESSION["pelanggan"])) {
    echo "<script>alert('Silahkan login');</script>";
    echo "<script>location='login.php';</script>";
}
?>



<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li> <a href="keranjang.php">Keranjang Belanja</a></li>
                <li class="active">Checkout</li>
                <ol>
                    <h3>Daftar Belanja Anda</h3>
                    <div class="table-responsive cart_info">
                        <table class="table table-condensed text-center">
                            <thead>
                                <tr class="cart_menu">
                                    <td>No</td>
                                    <td>Barang</td>
                                    <td>Deskripsi</td>
                                    <td>Harga</td>
                                    <td>Jumlah</td>
                                    <td>Subtotal</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $nomer = 1; ?>
                                <?php $total = 0; ?>
                                <?php foreach ($_SESSION["cart"] as $id_produk => $jumlah) : ?>
                                    <?php
                                    $sql = mysqli_query($koneksi, "SELECT * from tbl_produk WHERE id_produk='$id_produk'");
                                    $d = $sql->fetch_assoc();
                                    $subtotal = $d['harga'] * $jumlah;
                                    ?>
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
                                        <!-- <td class="cart_delete">
                                <a class="cart_quantity_delete" href="hapuskeranjang.php?id=<?php echo $id_produk ?>"><i class="fa fa-times"></i></a>
                            </td> -->
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
                    <!--  <a href="index.php" class="btn btn-primary">Tambah Pesanan</a>
                    <a href="checkout.php" class="btn btn-primary">Selesai Belanja </a>
                  -->
                    <form method="post">
                        <h3>Form Pesanan</h3>
                        <h5>Silahkan lengkapi form di bawah ini untuk melanjutkan ke tahap pembayaran :</h5>
                        <div class="row">
                            <br>
                            <!-- nama -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Nama</label>
                                    <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]["nama"] ?>" class="form-control">
                                </div>
                            </div>
                            <!-- No hp -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">No Hp</label>
                                    <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]["no_hp"] ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <!-- Alamat -->
                        <div class="form-group">
                            <label class="control-label col-md-3">Alamat Pengiriman</label>
                            <textarea name="alamat" class="form-control" placeholder="Masukkan Alamat lengkap pengiriman beserta RT, RW, Kelurahan, Kecamatan, dan Kabupaten" required></textarea>
                        </div>

                        <!-- Tanggal Pembelian -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Tanggal di kirim</label>
                                    <input type="date" class="form-control" name="tanggal_kirim" placeholder="dd/mm/yyyy" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Jam di antar</label>
                                    <input type="time" class="form-control" name="jam_kirim" placeholder="01:02" required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="alert alert-info">
                                    <p>
                                        <strong>* Informasi</strong> Pesanan dapat di kirim 3 hari setelah melakukan pesanan dan menunggu konfirmasi admin. Terimakasih
                                    </p>
                                </div>
                            </div>

                        </div>
                        <button class="btn btn-primary" name="pembayaran" type="submit" value=" pembayaran ">Lanjut Pembayaran</button>
                    </form>
        </div>
        <?php
        if (isset($_POST["pembayaran"])) {
            $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
            $alamat_pengiriman = $_POST["alamat"];
            $tanggal_pesanan = date("y-m-d");
            $tanggal_dikirim = $_POST["tanggal_kirim"];
            $jam_dikirim = $_POST["jam_kirim"];
            $total_pesanan = $total;

            /* 1) menyimpan data ke tabel pesanan */
            $koneksi->query("INSERT INTO pesanan(id_pelanggan, tgl_pesanan, tgl_pengiriman, jam_pesanan, total_pesanan, Alamat_pengiriman ) 
                    VALUES ('$id_pelanggan','$tanggal_pesanan','$tanggal_dikirim','$jam_dikirim','$total_pesanan','$alamat_pengiriman')");

            /* 2) mendapatkan id_pesanan baru terjadi  */
            $id_pesanan_baru = $koneksi->insert_id;

            foreach ($_SESSION["cart"] as $id_produk => $jumlah) {
                /* mendapatkan data produk berdasarkan id_produk */
                $ambil = $koneksi->query("SELECT*FROM tbl_produk WHERE id_produk='$id_produk'");
                $produk = $ambil->fetch_assoc();

                $nama = $produk['nama_produk'];
                $harga = $produk['harga'];

                $koneksi->query("INSERT INTO detail_pesanan(id_pesanan,id_produk,jumlah, nama, harga)
                        VALUES ('$id_pesanan_baru','$id_produk','$jumlah','$nama','$harga')");
            }

            /* jika sudah selesai belanja, keranjang di kosongkan */
            unset($_SESSION["cart"]);

            /* tampilan di alihkan ke halaman nota pembayaraan */
            echo "<script>alert('Pembelian berhasil, silahkan tunggu konfirmasi admin setelah itu melakukan pembayaran.');</script>";
            echo "<script>location='nota.php?id=$id_pesanan_baru';</script>";
        }
        ?>
    </div>
</section>




<?php
include "templates/footer.php";
?>