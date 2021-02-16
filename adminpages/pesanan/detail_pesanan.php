<?php
session_start();
if (empty($_SESSION['username']) and empty($_SESSION['level'])) {
    echo "<center>Untuk mengakses halaman, Anda harus login <br>";
    echo "<a href=../index.php><b>LOGIN</b></a></center>";
} else {

    include "../../lib/config_web.php";
    include "../../lib/koneksi.php";

    include "../templates/header.php";
?>

    <style>
        @media print {

            .nav_menu,
            .page-title,
            .clearfix,
            .pilihan {
                display: none;
            }
        }
    </style>


    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Manajemen <small>Data Pesanan</small></h3>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2><small>Detail Pesanan</small></h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <!-- content page -->
                            <section class="konten">
                                <div class="container">
                                    <h2>Nota Pesanan</h2>
                                    <h3 align="center">Tematik Gegana</h3>
                                    <h5 align="center">Alamat</h5>
                                    <?php
                                    /* menggabungkan data pesanan dan data pelanggan */
                                    $idpsn = $_GET["id"];
                                    $ambil = $koneksi->query("SELECT*FROM pesanan JOIN pelanggan
                                                                ON pesanan.id_pelanggan=pelanggan.id_pelanggan
                                                                WHERE pesanan.id_pesanan='$idpsn'");
                                    $detail = $ambil->fetch_assoc();
                                    ?>

                                    <!-- header nota -->
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h3>Pembelian</h3>
                                            <strong>No. Pembelian: <?php echo $detail['id_pesanan']; ?></strong><br>
                                            Tanggal : <?php echo $detail['tgl_pesanan']; ?><br>
                                            Total : <?php echo number_format($detail['total_pesanan']); ?>
                                        </div>

                                        <div class="col-md-4">
                                            <h3>Pelanggan</h3>
                                            <strong><?php echo $detail['nama']; ?></strong><br>
                                            <p>
                                                <?php echo $detail['no_hp']; ?><br>
                                                <?php echo $detail['email']; ?>
                                            </p>
                                        </div>

                                        <div class="col-md-4">
                                            <h3>Pengiriman</h3>
                                            <strong>Alamat : <?php echo $detail['Alamat_pengiriman']; ?></strong><br>
                                            Tanggal : <?php echo $detail['tgl_pengiriman']; ?><br>
                                            Jam dikirim : <?php echo $detail['jam_pesanan']; ?>
                                        </div>
                                    </div>

                                    <table class=" table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Harga</th>
                                                <th>Jumlah</th>
                                                <th>Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $nomor = 1; ?>
                                            <?php $ambil = $koneksi->query("SELECT * FROM detail_pesanan WHERE id_pesanan='$idpsn'"); ?>
                                            <?php while ($pecah = $ambil->fetch_assoc()) { ?>
                                                <tr>
                                                    <td><?php echo $nomor; ?></td>
                                                    <td><?php echo $pecah['nama']; ?></td>
                                                    <td>Rp. <?php echo number_format($pecah['harga']); ?></td>
                                                    <td><?php echo $pecah['jumlah']; ?></td>
                                                    <td>Rp. <?php echo number_format($pecah['harga'] * $pecah['jumlah']); ?>
                                                    </td>
                                                </tr>
                                                <?php $nomor++; ?>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <div class="row">
                                        <form method="post" class="pilihan">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select name="pesan" class="form-control">
                                                    <option value="">Pilih Status</option>
                                                    <option value="Bisa pesan">Bisa Pesan</option>
                                                    <option value="Pesanan penuh">Pesanan Penuh</option>
                                                </select>
                                            </div>
                                            <a href="main.php" class="btn btn-default">
                                                <i class="fa fa-mail-forward"></i> Kembali
                                            </a>
                                            <button type="submit" name="proses" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                                        </form>
                                    </div>

                                    <?php
                                    if (isset($_POST["proses"])) {
                                        $status = $_POST["pesan"];
                                        $koneksi->query("UPDATE pesanan SET status_produk='$status'
                                                        WHERE id_pesanan='$idpsn'");

                                        echo "<script>alert('data pesanan terupdate');</script>";
                                        echo "<script>location='main.php'</script>";
                                    }
                                    ?>
                                    <div class="row mt">
                                        <div class="alert alert-info" role="alert">
                                            Bisa langsung diprint dan disimpan dengan menekan ctrl + P
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- akhir section -->
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
<?php
    include "../templates/footer.php";
}
?>