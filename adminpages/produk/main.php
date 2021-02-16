<?php
session_start();
if (empty($_SESSION['username']) and empty($_SESSION['level'])) {
	echo "<center>Untuk mengakses halaman, Anda harus login <br>";
	echo "<a href=../index.php><b>LOGIN</b></a></center>";
} else {
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";
	// include "../../lib/pagination.php";
	//
	// untuk mengetahui halaman keberapa yang sedang dibuka
	// juga untuk men-set nilai default ke halaman 1 jika tidak ada
	// data $_GET['page'] yang dikirimkan
	// $page = 1;
	// if (isset($_GET['page']) && !empty($_GET['page']))
	// $page = (int)$_GET['page'];

	// // untuk mengetahui berapa banyak data yang akan ditampilkan
	// // juga untuk men-set nilai default menjadi 5 jika tidak ada
	// // data $_GET['perPage'] yang dikirimkan
	// $dataPerPage = 5;
	// if (isset($_GET['perPage']) && !empty($_GET['perPage']))
	// $dataPerPage = (int)$_GET['perPage'];

	// // tabel yang akan diambil datanya
	// $table = 'tbl_produk';

	// // ambil data
	// $dataTable = getTableData($koneksi, $table, $page, $dataPerPage);
	include "../../lib/function.php";

	/* 1. Tentukan batas dan cek halaman & posisi data */
	$batas = 5;
	$halaman = @$_GET['halaman'];
	if (empty($halaman)) {
		$posisi = 0;
		$halaman = 1;
		$no = 1;
	} else {
		$no = 6;
		$posisi = ($halaman - 1) * $batas;
	}

	$table = "tbl_produk";
	$idproduk = "id_produk";

	$tableProduk = query("SELECT * FROM " . $table . " ORDER BY " . " $idproduk " . "DESC LIMIT " . "$posisi, $batas");

	// // tombol cari
	// if (isset($_POST["searchya"])) {
	// 	$tableProduk = getCari($_POST["livesearch"]);
	// }


	include "../templates/header.php";
?>

	<!-- page content -->
	<div class="right_col" role="main">
		<div class="">
			<div class="page-title">
				<div class="title_left">
					<h3>Manajemen <small>Data Produk</small></h3>
				</div>

			</div>

			<div class="clearfix"></div>

			<div class="row">

				<div class="col-xs-12">
					<a href="<?php echo $admin_url; ?>produk/form_tambah.php">
						<button class="btn btn-primary">
							<i class="fa fa-plus"></i> Tambah
						</button>
					</a>
					<?php
					/* hitung total data dan halaman serta link  */

					$ambil2 = mysqli_query($koneksi, "SELECT * FROM tbl_produk");
					$jmldata = mysqli_num_rows($ambil2);

					$previous = $halaman - 1;
					$next = $halaman + 1;


					$jmlhalaman = ceil($jmldata / $batas);
					?>
					<ul class="pagination pull-right">
						<li class="page-item">
							<a class="page-link" <?php if ($halaman > 1) {
														echo "href='?halaman=$previous'";
													} ?>>Previous</a>
						</li>
						<?php
						for ($x = 1; $x <= $jmlhalaman; $x++) {
						?>
							<li class="page-item">
								<a class="page-link" href="?halaman=<?php echo $x ?>">
									<?php echo $x; ?>
								</a>
							</li>
						<?php
						}
						?>
						<li class="page-item">
							<a class="page-link" <?php if ($halaman < $jmlhalaman) {
														echo "href='?halaman=$next'";
													} ?>>Next</a>
						</li>
					</ul>
					<form action="" method="POST">
						<div class="title_right">
							<div class="mb">
								<input type="text" name="search" id="search" class="form-control" placeholder="Nama Produk / Harga" autocomplete="off" autofocus>
							</div>
						</div>
					</form>
				</div>

				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_title">
							<h2><small>Data Produk</small></h2>

							<div class="clearfix"></div>
						</div>

						<div class="x_content">

							<table class="table table-striped">
								<thead>
									<tr>
										<th style="width: 50px;">No</th>
										<th style="width: 190px;">Nama Produk</th>
										<th style="width: 150px;">Gambar</th>
										<th style="width: 110px;">Harga</th>
										<th>Deskripsi</th>
										<th style="width: 70px;">Slide</th>
										<th style="width: 70px;">Rekomendasi</th>
										<th style="width: 110px;">Aksi</th>

									</tr>
								</thead>
								<tbody id="lives_content">
									<?php
									foreach ($tableProduk as $data) :
										// while ($data = mysqli_fetch_array($tableProduk)) {
									?>
										<tr>
											<th scope="row"><?php echo $no; ?></th>
											<td><?php echo $data['nama_produk']; ?></td>
											<td><img src="../../file/produk/<?php echo $data['gambar']; ?>" width='130px' height='100px' /></td>
											<td>Rp. <?php echo $data['harga']; ?></td>
											<td><?php echo $data['deskripsi']; ?></td>
											<td><?php echo $data['slide']; ?></td>
											<td><?php echo $data['rekomendasi']; ?></td>
											<td><a href="<?php echo $admin_url; ?>produk/form_edit.php?id_produk=<?php echo $data['id_produk']; ?>">
													<button class="btn btn-warning">
														<i class="fa fa-edit"></i>
													</button></a>

												<a href="<?php echo $admin_url; ?>produk/hapus.php?id_produk=<?php echo $data['id_produk']; ?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')">

													<button class="btn btn-danger">
														<i class="fa fa-remove"></i>
													</button></a>
											</td>

										</tr>

									<?php
										$no++;
									endforeach;
									// }
									?>
								</tbody>
							</table>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /page content -->
	<script src="../../assets/admin/vendors/jquery/dist/jquery-3.5.1.min.js"></script>
	<!-- Live Search -->
	<script type="text/javascript">
		$(document).ready(function() {
			$('#search').on('keyup', function() {
				$.ajax({
					type: 'POST',
					url: 'ajax_produk.php',
					data: {
						search: $(this).val()
					},
					cache: false,
					success: function(data) {
						$('#lives_content').html(data);
					}
				});
			});
		});
	</script>
<?php
	include "../templates/footer.php";
}
?>