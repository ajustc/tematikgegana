<?php
session_start();
if (empty($_SESSION['username']) and empty($_SESSION['level'])) {
	echo "<center>Untuk mengakses halaman, Anda harus login <br>";
	echo "<a href=../index.php><b>LOGIN</b></a></center>";
} else {
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";
	/* include "../../lib/pagination.php"; */
	//
	// untuk mengetahui halaman keberapa yang sedang dibuka
	// juga untuk men-set nilai default ke halaman 1 jika tidak ada
	// data $_GET['page'] yang dikirimkan
	/* $page = 1;
if (isset($_GET['page']) && !empty($_GET['page']))
	$page = (int)$_GET['page'];

// untuk mengetahui berapa banyak data yang akan ditampilkan
// juga untuk men-set nilai default menjadi 5 jika tidak ada
// data $_GET['perPage'] yang dikirimkan
$dataPerPage = 5;
if (isset($_GET['perPage']) && !empty($_GET['perPage']))
	$dataPerPage = (int)$_GET['perPage'];

// tabel yang akan diambil datanya
/* $table = ''; */

	// ambil data
	/* $dataTable = getTableData($koneksi, $page, $dataPerPage); */

	include "../../lib/function.php";

	$tableProduk = query("SELECT * FROM pesanan INNER JOIN pelanggan  
	ON pesanan.id_pelanggan=pelanggan.id_pelanggan");

	include "../templates/header.php";

	// /* 1. Tentukan batas dan cek halaman & posisi data */
	// $batas = 10;
	// $halaman = @$_GET['halaman'];
	// if (empty($halaman)) {
	// 	$posisi = 0;
	// 	$halaman = 1;
	// } else {
	// 	$posisi = ($halaman - 1) * $batas;
	// }
?>

	<!-- page content -->
	<div class="right_col" role="main">
		<div class="">
			<div class="page-title">
				<div class="title_left">
					<h3>Manajemen <small>Data Pesanan</small></h3>
				</div>
			</div>

			<div class="clearfix"></div>

			<div class="row">

				<div class="col-xs-12">
					<form action="" method="POST">
						<div class="title_right">
							<div class="mb">
								<input type="text" name="search" id="search" class="form-control" placeholder="Nama / Tgl Pesanan / Tgl Pengiriman / Status Produk / Status Pesanan" autocomplete="off" autofocus>
							</div>
						</div>
					</form>
				</div>

				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_title">
							<h2><small>Data Pesanan</small></h2>

							<div class="clearfix"></div>
						</div>
						<div class="x_content">

							<table class="table table-striped">
								<thead>
									<tr>
										<th style="width: 0px;">No</th>
										<th style="width: 0px;">Nama</th>
										<th style="width: 0px;">Tgl pesanan</th>
										<th style="width: 0px;">Tgl pengiriman</th>
										<th style="width: 0px;">Jam pengiriman</th>
										<th style="width: 0px;">Status pesanan</th>
										<th style="width: 0px;">Status pembayaran</th>
										<th style="width: 0px;">Total pesanan</th>
										<th style="width: 0px;">Aksi</th>

									</tr>
								</thead>
								<tbody id="lives_content">

									<?php
									$no = 1;
									foreach ($tableProduk as $data) :
									?>
										<tr>
											<th scope="row"><?php echo $no; ?></th>
											<td><?php echo $data['nama']; ?></td>
											<td><?php echo $data['tgl_pesanan']; ?></td>
											<td><?php echo $data['tgl_pengiriman']; ?></td>
											<td><?php echo $data['jam_pesanan']; ?></td>
											<td><?php echo $data['status_produk']; ?></td>
											<td><?php echo $data['status_pesanan']; ?></td>
											<td>Rp. <?php echo number_format($data['total_pesanan']); ?></td>

											<!-- tombol detail -->
											<td>
												<a class="btn btn-warning btn-xs" href="<?php echo $admin_url; ?>pesanan/detail_pesanan.php?id=<?php echo $data['id_pesanan']; ?>">
													Detail
												</a>

												<a class="btn btn-danger btn-xs" href="<?php echo $admin_url; ?>pesanan/hapus.php?id=<?php echo $data['id_pesanan']; ?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')">
													<i class="fa fa-remove"></i>
												</a>

												<!-- tombol lihat pembayaran -->
												<?php if ($data['status_pesanan'] !== "Pending") : ?>
													<a class="btn btn-success btn-xs" href="<?php echo $admin_url; ?>pesanan/lihat_pembayaran.php?id=<?php echo $data['id_pesanan']; ?>">Lihat Pembayaran</a>
												<?php endif ?>
											</td>

										</tr>
									<?php
										$no++;
									endforeach;
									?>
								</tbody>
							</table>

							<?php
							// /* hitung total data dan halaman serta link  */
							// $ambil2 = mysqli_query($koneksi, "SELECT * FROM pesanan");
							// $jmldata = mysqli_num_rows($ambil2);

							// $jmlhalaman = ceil($jmldata / $batas);
							// echo "<br> Halaman :";
							// for ($i = 1; $i <= $jmlhalaman; $i++) {
							// 	if ($i != $halaman) {
							// 		echo "<a href=\"main.php?halaman=$i\">$i</a>|";
							// 	} else {
							// 		echo "<b>$i</b>|";
							// 	}
							// }
							// echo "<p>Jumlah data pesanan  :<b>$jmldata</b></p>";
							?>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
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
					url: 'ajax_pesanan.php',
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