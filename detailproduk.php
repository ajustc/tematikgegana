<?php
session_start();
?>

<?php
include "lib/koneksi.php";
include "templates/header.php";
//mendapatakan id_produk dari url
$id_produk = $_GET["id_produk"];

//query mengambil data 
$ambil = $koneksi->query("SELECT * FROM tbl_produk WHERE id_produk='$id_produk'");
//lalu di simpan dalam bentuk array
$detail = $ambil->fetch_assoc();

?>

<section class="content">
	<div class="container">
		<div class="row">
			<div class="col-md-6 mt">
				<img src="file/produk/<?php echo $detail["gambar"] ?>" alt="" class="img-responsive mt" />
			</div>

			<div class="col-md-6">
				<div class="row mb">
					<div class="product-information mb">
						<!--/product-information -->
						<h1>Detail Produk</h1>
						<h1><?php echo $detail["nama_produk"]; ?></h1>
						<span>
							<span>Rp. <?php echo number_format($detail["harga"]); ?></span>
							<span>
								<form method="post">
									<div class="form-group">
										<div class="input-group">
											<input type="number" min="30" class="form-control" placeholder="Min 30" name="jumlah">
											<span class="input-group-btn text-center">
												<button class="btn btn-primary cart" name="beli"><i class="fa fa-shopping-cart"></i>
													Pesan
												</button>
										</div>
									</div>
									<hr>
									<div>
										<label>Deskripsi:</label>
										<h4><?php echo $detail["deskripsi"]; ?></h4>
									</div>
								</form>
							</span>
							<?php
							//jika ada tombol pesan
							if (isset($_POST["beli"])) {
								//mendapatkan jumlah yang di inputkan 
								$jumlah = $_POST["jumlah"];
								//masukan di keranjang belanja
								$_SESSION["cart"][$id_produk] = $jumlah;

								echo "<script> alert('produk telah masuk ke keranjang belanja');</script>";
								echo "<script> location='keranjang.php';</script>";
							}
							?>
						</span>
					</div>
				</div>
			</div>
		</div><!-- div row -->
	</div><!-- div container -->
</section>

<?php
include "templates/footer.php";
?>