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

	include "../templates/header.php";

	/* 1. Tentukan batas dan cek halaman & posisi data */
	/* $batas =10;
$halaman =@$_GET['halaman'];
if (empty($halaman)) {
	$posisi=0;
	$halaman=1;
} else{
	$posisi=($halaman-1) * $batas;
} */
?>

	<style>
		@media print {

			.nav_menu,
			.page-title,
			.clearfix,
			.tanggal {
				display: none;
			}
		}
	</style>


	<!-- page content -->
	<div class="right_col" role="main">
		<div class="">
			<div class="page-title">
				<div class="title_left">
					<h3>Manajemen <small>Laporan Pesanan</small></h3>
				</div>
			</div>

			<div class="clearfix"></div>

			<div class="row">

				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_title">
							<?php
							$data = array();
							$tgl_mulai = "-";
							$tgl_selesai = "-";
							if (isset($_POST["kirim"])) {
								$tgl_mulai = $_POST["tglm"];
								$tgl_selesai = $_POST["tgls"];

								$ambil = $koneksi->query("SELECT * FROM pesanan JOIN pelanggan 
								ON pesanan.id_pelanggan=pelanggan.id_pelanggan WHERE tgl_pesanan BETWEEN '$tgl_mulai' AND '$tgl_selesai' ")
							?>

							<?php while ($pecah = $ambil->fetch_assoc()) {
									$data[] = $pecah;
								}
							}
							?>
							<h2>Laporan Pesanan dari <?php echo $tgl_mulai ?> sampai <?php echo $tgl_selesai  ?></h2>
							<div class="clearfix"></div>
						</div>
						<div class="x_content">

							<form method="post" action="laporan_pesanan.php" target="_blank" class="tanggal">
								<div class="row">
									<div class="col-md-5">
										<div class="form-group">
											<label>Tanggal Mulai</label>
											<input type="date" class="form-control" name="tglm">
										</div>
									</div>
									<div class="col-md-5">
										<div class="form-group">
											<label>Selesai</label>
											<input type="date" class="form-control" name="tgls">
										</div>
									</div>
									<div class="col-md-2">
										<label>&nbsp;</label><br>
										<button class="btn btn-primary" name="kirim">Cetak</button>
									</div>
								</div>
							</form>
							<!-- 
						<table class="table table-striped">
							<thead>
								<tr>
									<th style="width: 0px;">No</th>
									<th style="width: 0px;">Nama</th>
									<th style="width: 0px;">Tgl pesanan</th>
									<th style="width: 0px;">Status pesanan</th>
                                    <th style="width: 0px;">Total pesanan</th>
									

								</tr>
							</thead>
							<tbody>
								<?php ?>
								<?php $nomor = 1; ?>
								<?php $total = 0; ?>
								<?php foreach ($data as $key => $nilai) : ?>
								<?php $total += $nilai['total_pesanan'] ?>
								<tr>
								<td><?php echo $nomor; ?></td>
								<td><?php echo $nilai['nama']; ?></td>
                                <td><?php echo $nilai['tgl_pesanan']; ?></td>
								<td><?php echo $nilai['status_pesanan']; ?></td>
                                <td> <?php echo number_format($nilai['total_pesanan']); ?></td>
								</tr>
								<?php $nomor++ ?>
								<?php endforeach; ?>
							</tbody>
							<tfoot>
							<tr>
							<th colspan=4>Total Pendapatan</th>
							<th>Rp. <?php echo number_format($total) ?></th>
							</tr>
							</tfoot>
						</table>
 -->
						</div>
					</div>
				</div>
				<div class="col-xs-12">

				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!-- /page content -->


<?php
	include "../templates/footer.php";
}
?>