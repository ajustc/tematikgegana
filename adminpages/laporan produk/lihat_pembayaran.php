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
    <div class="right_col" role="main">

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
                        <h2><small>Lihat pembayaran</small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <?php
                        //mendapatkan id pembelian
                        $id_pesanan = $_GET['id'];

                        //membuat query data pembayaran
                        $ambil = $koneksi->query("SELECT * FROM pembayaran WHERE id_pesanan='$id_pesanan'");
                        $pembayaran = $ambil->fetch_assoc();
                        ?>
                        <div class="row">
                            <div class="col-md-8">
                                <table class="table">
                                    <tr>
                                        <th>Nama</th>
                                        <td><?php echo $pembayaran['nama']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Bank</th>
                                        <td><?php echo $pembayaran['bank']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Jumlah</th>
                                        <td>Rp.<?php echo number_format($pembayaran['jumlah']); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal</th>
                                        <td><?php echo $pembayaran['tanggal']; ?></td>
                                    </tr>
                                </table>
                                <div class="row">
                                    <form method="post">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select name="status" class="form-control">
                                                <option value="">Pilih Status</option>
                                                <option value="Lunas">Lunas</option>
                                                <option value="Barang dikirim">Barang Dikirim</option>
                                                <option value="Batal">Batal</option>
                                            </select>
                                        </div>
                                        <a href="main.php" class="btn btn-default">
                                            <i class="fa fa-mail-forward"></i> Kembali
                                        </a>
                                        <button type="submit" name="proses" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                                    </form>
                                </div>
                            </div>
                            <!-- gambar bukti pembayaran -->
                            <div class="col-md-4">
                                <img src="../../file/bukti_pembayaran/<?php echo $pembayaran['bukti'] ?>" style="width:300px; height:auto;" class="img-responsive">
                            </div>

                            <?php
                            if (isset($_POST["proses"])) {
                                $status = $_POST["status"];
                                $koneksi->query("UPDATE pesanan SET status_pesanan='$status'
                        WHERE id_pesanan='$id_pesanan'");

                                echo "<script>alert('data pembayaran terupdate');</script>";
                                echo "<script>location='main.php'</script>";
                            }
                            ?>
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