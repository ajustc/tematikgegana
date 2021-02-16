<?php
include "lib/koneksi.php"; ?>


<?php
$testimoni = mysqli_query($koneksi, "SELECT * FROM tbl_produk WHERE slide LIKE '%Y%' ORDER BY id_produk DESC LIMIT 6")
?>
<section id="slider">
	<!--slider-->
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="hayo1">

				</div>
				<div id="slider-carousel" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<?php
						$no = 0;
						for ($no = 0; $no < 3; $no++) {
						?>
							<li data-target="#slider-carousel" data-slide-to="<?php echo $no ?>" class="<?php if ($no == 0) {
																											echo 'active';
																										} else {
																											echo 'notactive';
																										} ?>"></li>
						<?php
						};
						?>
					</ol>

					<div class="carousel-inner">
						<?php
						$no = 0;
						while ($row = mysqli_fetch_array($testimoni)) {
						?>
							<div class="item <?php if ($no == 0) {
													echo 'active';
												} else {
													echo 'notactive';
												} ?>">
								<div class="col-sm-6">
									<h1><span><?php echo $row['nama_produk']; ?></span></h1>
									<h2><?php echo $row['harga']; ?></h2>
									<p><?php echo $row["deskripsi"]; ?> </p>
									<a href="aksi_keranjang.php?id_produk=<?php echo $row['id_produk']; ?>" class="btn btn-default get">Pesan Sekarang</a>
								</div>
								<div class="col-sm-6">
									<img src="file/produk/<?php echo $row['gambar']; ?>" alt="" class="img-responsive" />
								</div>
							</div>
						<?php
							$no++;
						}
						?>

					</div>

					<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
						<i class="fa fa-angle-left"></i>
					</a>
					<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
						<i class="fa fa-angle-right"></i>
					</a>
				</div>

			</div>
		</div>
	</div>
</section>
<!--/slider-->
<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 mb">
				<div class="recommended_items">
					<!--recommended_items-->
					<h2 class="title text-center ">Rekomendasi</h2>
					<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner">

							<?php
							$recslide = "SELECT * FROM tbl_produk WHERE rekomendasi LIKE '%Y%' ORDER BY id_produk DESC LIMIT 4";
							if ($res = $koneksi->query($recslide)) {
								$x = 0;
								while ($row = $res->fetch_assoc()) {
									if ($x == 0) $aktif = "active";
									else $aktif = '';
							?>

									<div class="col-sm-3">
										<div class="item <?php echo $aktif ?>">
											<div class="product-image-wrapper">
												<div class="single-products">
													<div class="productinfo text-center">
														<img src="file/produk/<?php echo $row['gambar']; ?>" alt="" />
														<h2>Rp. <?php echo $row['harga']; ?></h2>
														<p><?php echo $row["nama_produk"]; ?></p>
														<!-- <a href="aksi_keranjang.php?id_produk=<?php echo $row['id_produk']; ?>" class="btn btn-default add-to-cart">
															<i class="fa fa-shopping-cart"></i>
															Add to cart
														</a> -->
													</div>
													<div class="product-overlay">
														<div class="overlay-content">
															<h2><?php echo $row["deskripsi"]; ?></h2>

															<a href="aksi_keranjang.php?id_produk=<?php echo $row['id_produk']; ?>" class="btn btn-default add-to-cart">
																<i class="fa fa-shopping-cart"></i>
																Tambahkan Ke Keranjang
															</a>
															<a href="detailproduk.php?id_produk=<?php echo $row['id_produk']; ?>" class="btn btn-default add-to-cart">
																<i class="fa fa-info-circle"></i>
																Detail Produk
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
							<?php
									$x++;
								} //tutup while
							} //tutup if
							?>

						</div>
						<!--  <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>	 -->
					</div>
				</div>
				<!--/recommended_items-->
			</div>

			<section>
				<div class="text-center mt mb">
					<div class="container">
						<div class="row">
							<div class="col-lg-6">
								<img src="assets\frontend\images\home\food.png" class="img-foot" alt="">
								<p class="lead">Pilih Makanan Untuk<br>
									Berbagai Acara</p>
							</div>
							<div class="col-lg-6">
								<img src="assets\frontend\images\home\gift.png" class="img-foot" alt="">
								<p class="lead">Kirim Kapanpun<br>
									Kamu Mau</p>
							</div>
						</div>
					</div>
					<p id="paginationarea"></p>
				</div>
			</section>

			<div class="col-sm-3">
				<div class="left-sidebar">
					<h2>Pilihan Menu</h2>
					<div class="panel-group category-products" id="accordian">
						<!--category-productsr-->
						<?php
						$kategori = mysqli_query($koneksi, "select * from tbl_kategori");
						while ($isi = mysqli_fetch_array($kategori)) {
						?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="produk_kategori.php?id_kategori=<?php echo $isi['id_kategori']; ?>"><?php echo $isi['nama_kategori'] ?></a></h4>
									</h4>
								</div>
							</div>
						<?php } ?>

					</div>
					<!--/category-products-->
					<!--Iklan samping -->

				</div>
			</div>

			<div class="col-sm-9 padding-right">
				<div class="features_items">
					<!--features_items-->
					<div class="hayo2">
						<h2 class="title text-center">Pilihan Paket</h2>
					</div>
					<?php
					/* 1. Tentukan batas dan cek halaman & posisi data */
					$batas = 6;
					$halaman = @$_GET['halaman'];
					if (empty($halaman)) {
						$posisi = 0;
						$halaman = 1;
					} else {
						$posisi = ($halaman - 1) * $batas;
					}


					$id_kategori = $_GET['id_kategori'];
					$pro = mysqli_query($koneksi, "SELECT * FROM tbl_produk WHERE id_kategori='$id_kategori' ORDER BY id_produk DESC LIMIT $posisi,$batas");
					while ($duk = mysqli_fetch_array($pro)) {
					?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="file/produk/<?php echo $duk['gambar']; ?>" alt="" />
										<h2>Rp. <?php echo $duk['harga']; ?></h2>
										<p><?php echo $duk["nama_produk"]; ?></p>
										<!-- <a href="aksi_keranjang.php?id_produk=<?php echo $duk['id_produk']; ?>" class="btn btn-default add-to-cart">
											<i class="fa fa-shopping-cart"></i>
											Add to cart
										</a> -->
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<p><?php echo $duk["nama_produk"]; ?></p>
											<a href="aksi_keranjang.php?id_produk=<?php echo $duk['id_produk']; ?>" class="btn btn-default add-to-cart">
												<i class="fa fa-shopping-cart"></i>
												Tambahkan Ke Keranjang
											</a>
											<a href="detailproduk.php?id_produk=<?php echo $duk['id_produk']; ?>" class="btn btn-default add-to-cart">
												<i class="fa fa-info-circle"></i>
												Detail Produk
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>

				<?php
				/* hitung total data dan halaman serta link  */
				$ambil2 = mysqli_query($koneksi, "SELECT * FROM tbl_produk WHERE id_kategori='$id_kategori'");
				$jmldata = mysqli_num_rows($ambil2);

				$previous = $halaman - 1;
				$next = $halaman + 1;

				$jmlhalaman = ceil($jmldata / $batas);
				?>
				<nav class="text-center">
					<ul class="pagination center-block">
						<li class="page-item">
							<a class="page-link" <?php if ($halaman > 1) {
														echo "href='produk_kategori.php?id_kategori=$x?halaman=$previous#paginationarea'";
													} ?>>Previous</a>
						</li>
						<?php
						for ($x = 1; $x <= $jmlhalaman; $x++) {
						?>
							<li class="page-item"><a class="page-link" href="produk_kategori.php?id_kategori=<?php echo $x ?>?halaman=<?php echo $x ?>#paginationarea"><?php echo $x; ?></a></li>
						<?php
						}
						?>
						<li class="page-item">
							<a class="page-link" <?php if ($halaman < $jmlhalaman) {
														echo "href='produk_kategori.php?id_kategori=$x?halaman=$next#paginationarea'";
													} ?>>Next</a>
						</li>
					</ul>
				</nav>
			</div>
			<!--features_items-->
			<!--category-tab-->
			<!--/category-tab-->
		</div>
		<br>
		<?php
		$testimoni = mysqli_query($koneksi, "SELECT * FROM testimoni ORDER BY id_testi DESC LIMIT 5");
		?>
		<section id="testimoni">
			<!--testimoni-->
			<div id="testimoni-carousel" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner" role="listbox">
					<?php
					$no = 0;
					while ($row = mysqli_fetch_array($testimoni)) {
					?>
						<div class="item <?php if ($no == 0) {
												echo 'active';
											} else {
												echo 'notactive';
											} ?>">
							<center>
								<h3 class="text-info"><span>"<?php echo $row['isi']; ?>"</span></h3>
								<small><?php echo $row['nama']; ?></small>
								<center>
						</div>
					<?php
						$no++;
					}
					?>
				</div>

				<a href="#testimoni-carousel" class="left control-carousel hidden-xs" data-slide="prev">
					<i class="fa fa-angle-left"></i>
				</a>
				<a href="#testimoni-carousel" class="right control-carousel hidden-xs" data-slide="next">
					<i class="fa fa-angle-right"></i>
				</a>
			</div>
		</section>



</section>
<br>
<br>
<!-- Testimoni -->