<?php
session_start();
include "lib/koneksi.php";
include "templates/header.php";

$id_pesanan = $_GET["id"];

$ambil = $koneksi->query("SELECT * FROM pembayaran
LEFT JOIN pesanan ON pembayaran.id_pesanan=pesanan.id_pesanan
WHERE pesanan.id_pesanan='$id_pesanan'");
$lhtpembayaran = $ambil->fetch_assoc();

if (empty($lhtpembayaran)) {
    echo "<script>alert('Data pembayaran kosong')</script>";
    echo "<script>location='riwayat_belanja.php';</script>";
    exit();
}

if ($_SESSION["pelanggan"]["id_pelanggan"] !== $lhtpembayaran["id_pelanggan"]) {
    echo "<script>alert('Anda tidak berhak melakukan akses!')</script>";
    echo "<script>location='riwayat_belanja.php';</script>";
    exit();
}
?>

<div class="container">
    <div class="breadcrumbs">
        <ol class="breadcrumb">
            <li><a href="index.php">Beranda</a></li>
            <li><a href="riwayat_belanja.php">Riwayat Belanja</a></li>
            <li class="active">Lihat Pembayaran</li>
        </ol>
        <h2>Lihat Pembayaran</h2>
        <div class="row mb">
            <div class="col-md-8">
                <table class="table">
                    <tr>
                        <th>Nama</th>
                        <td><?php echo $lhtpembayaran["nama"]; ?></td>
                    </tr>
                    <tr>
                        <th>Bank</th>
                        <td style="text-transform:uppercase"><?php echo $lhtpembayaran["bank"]; ?></td>
                    </tr>
                    <tr>
                        <th>Jumlah</th>
                        <td>Rp. <?php echo number_format($lhtpembayaran["jumlah"]); ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td><?php echo $lhtpembayaran["tanggal"]; ?></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-4 mb">
                <img src="file/bukti_pembayaran/<?php echo $lhtpembayaran["bukti"] ?>" style="width:300px; height:auto;" class="img-responsive">
            </div>
        </div>
    </div>
</div>
<?php
include "templates/footer.php";
?>