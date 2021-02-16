<?php
session_start();
include "lib/koneksi.php";
include "templates/header.php";

//jika tidak ada session pelanggan (blm melakukan login), maka dilarikan ke login.php
if (!isset($_SESSION["pelanggan"]) or empty($_SESSION["pelanggan"])) {
    echo "<script>alert('Silahkan login');</script>";
    echo "<script>location='login.php';</script>";
}

$idpsn = $_GET["id"];
$ambil = $koneksi->query("SELECT * FROM pesanan WHERE id_pesanan='$idpsn'");
$detpsn = $ambil->fetch_assoc();

//mendapatkan id pelanggan yang beli 
$pelangganbeli = $detpsn["id_pelanggan"];
//mendapatkan id pelanggan yang login
$pelagganlogin = $_SESSION["pelanggan"]["id_pelanggan"];

if ($pelangganbeli !== $pelagganlogin) {
    echo "<script>alert('Hayo, mau lihat yaaa');</script>";
    echo "<script>location='riwayat_belanja.php'</script>";
    exit();
}
?>
<div class="container">
    <div class="breadcrumbs">
        <ol class="breadcrumb">
            <li><a href="index.php">Beranda</a></li>
            <li><a href="riwayat_belanja.php">Riwayat Belanja</a></li>
            <li class="active">Input Pembayaran</li>
        </ol>
        <h2>Konfirmasi Pembayaran</h2>
        <p>Kirim bukti pembayaran anda disini untuk melanjutkan pesanan agar dikirim</p>
        <div class="alert alert-info">Total tagihan anda :
            <strong>
                Rp. <?php echo number_format($detpsn["total_pesanan"]) ?>
            </strong>
            <br>
            <strong>BANK BRI 1231-1231-1323-1323 AN. XXXX XXXX</strong>
        </div>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nama Pengirim</label>
                <input type="text" class="form-control" name="nama" placeholder="Albert Juno" required>
            </div>
            <div class="form-group">
                <label>Bank</label>
                <input type="text" class="form-control" name="bank" placeholder="MANDIRI" style="text-transform:uppercase" required>
                <!-- <input type="radio" class="form-control" name="bank" placeholder="MANDIRI" style="text-transform:uppercase" required> -->
            </div>
            <div class="form-group">
                <label>Jumlah</label>
                <input type="number" class="form-control" name="jumlah" min="10" placeholder="120500" required>
            </div>
            <div class="form-group">
                <label for="file">Unggah Bukti Transfer</label>
                <p class="help-block text-danger">* Foto bukti harus JPG maksimal 2MB</p>
                <input onchange="previewImg()" type="file" name="bukti" id="file_bukti">
                <img src="file/bukti_pembayaran/default.jpg" style="width:150px; height:auto; " class="img-thumbnail img-preview mt mb" alt="">
                </br>
                <button class="btn btn-primary" name="kirim">Kirim</button>
            </div>
            <hr>
        </form>
    </div>
</div>

<?php
//jika ada tombol kirim di pencet
if (isset($_POST["kirim"])) {

    //upload dulu foto buktinya
    $pemisah = "_";
    $namabukti = $_FILES["bukti"]["name"];
    $lokasibukti = $_FILES["bukti"]["tmp_name"];
    $namafik = date("y-m-d") . $pemisah . $namabukti;
    move_uploaded_file($lokasibukti, "file/bukti_pembayaran/$namafik");

    $nama = $_POST["nama"];
    $bank = $_POST["bank"];
    $jumlah = $_POST["jumlah"];
    $tanggal = date("y-m-d");

    // $koneksi->query("INSERT INTO pembayaran(id_pesanan, nama, bank, jumlah, tanggal, bukti)
    // VALUES ('$idpsn','$nama','$bank','$jumlah','$tanggal','$namafik')");

    //Simpan pembayaran
    $koneksi->query("INSERT INTO pembayaran(id_pesanan, nama, bank, jumlah, tanggal, bukti)
                        VALUES ('$idpsn','$nama','$bank','$jumlah','$tanggal','$namafik')");

    //update data pembelian dari pending menjadi sudah kirim pembayaran
    $koneksi->query("UPDATE pesanan SET status_pesanan='Sudah kirim pembayaran'
                        WHERE id_pesanan='$idpsn' ");

    echo "<script>alert('Terima kasih sudah mengirim pembayaran, tunggu pesanan kamu ya!');</script>";
    echo "<script>location='riwayat_belanja.php';</script>";
}
?>

<?php
include "templates/footer.php";
?>