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
?>
<div class="container">
    <div class="col-lg-4">
        <div class="page-header">
            <h3>Form Laporan Pelanggan</h3>
        </div>

        <form method="POST" role="form" enctype="multipart/form-data" class="form-horizontal mb">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]["nama"] ?>" name="nama" class="form-control">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]["email"] ?>" name="email" class="form-control">
            </div>

            <div class="form-group">
                <label>Laporkan</label>
                <textarea name="isi" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <input onchange="previewImg()" type="file" class="mb" name="gambar" id="file_bukti" required>
                <img src="file/bukti_pembayaran/default.jpg" style="width:150px; height:auto; " class="img-thumbnail img-preview mb">
            </div>

            <div class="form-group">
                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
            </div>
        </form>
        <?php
        if (isset($_POST["simpan"])) {

            //upload dulu foto laporannya
            $pemisah = "_";
            $namabukti = $_FILES["gambar"]["name"];
            $lokasibukti = $_FILES["gambar"]["tmp_name"];
            $namafik = date("y-m-d") . $pemisah . $namabukti;
            move_uploaded_file($lokasibukti, "file/laporan_pesanan/$namafik");

            $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
            $nama = $_POST["nama"];
            $email = $_POST["email"];
            $isi = $_POST["isi"];
            $tanggal = date("y-m-d");

            $querySimpan = mysqli_query($koneksi, "INSERT INTO laporan_pesanan (id_pelanggan, id_pesanan, nama, email, isi, gambar, tanggal)
                        VALUES ('$id_pelanggan', '$idpsn', '$nama', '$email', '$isi', '$namafik', '$tanggal' )");


            // $koneksi->query("INSERT INTO testimoni (`id_pelanggan`, id_pesanan, nama, email, isi, gambar, tanggal)
            //             VALUES ('$id_pelanggan', '$idpsn', '$nama', '$email', '$isi', '$namafik', '$tanggal' )");


            // jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar kategori
            if ($querySimpan) {
                echo "<script> alert('Laporan Produk Berhasil Masuk'); window.location = 'riwayat_belanja.php';</script>";
                // jika query gagal, akan tampil alert dan halaman akan diarahkan ke form tambah kategori
            } else {
                echo "<script> alert('Laporan Produk Gagal Dimasukkan'); window.location = 'laporan_produk.php?id=$idpsn';</script>";
            }

            // echo "<script>alert('Terimakasih sudah memberikan laporan, semoga anda puas dengan pelayanan kami');</script>";
            // echo "<script>location='index.php';</script>";
        }
        ?>

    </div>
</div>

<?php
include "templates/footer.php";
?>