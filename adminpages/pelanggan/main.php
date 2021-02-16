<?php
session_start();
if (empty($_SESSION['username']) and empty($_SESSION['level'])) {
	echo "<center>Untuk mengakses halaman, Anda harus login <br>";
	echo "<a href=../index.php><b>LOGIN</b></a></center>";
} else {
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";
	// include "../../lib/pagination.php";
	// //
	// // untuk mengetahui halaman keberapa yang sedang dibuka
	// // juga untuk men-set nilai default ke halaman 1 jika tidak ada
	// // data $_GET['page'] yang dikirimkan
	// $page = 1;
	// if (isset($_GET['page']) && !empty($_GET['page']))
	// 	$page = (int)$_GET['page'];

	// // untuk mengetahui berapa banyak data yang akan ditampilkan
	// // juga untuk men-set nilai default menjadi 5 jika tidak ada
	// // data $_GET['perPage'] yang dikirimkan
	// $dataPerPage = 5;
	// if (isset($_GET['perPage']) && !empty($_GET['perPage']))
	// 	$dataPerPage = (int)$_GET['perPage'];

	// // tabel yang akan diambil datanya
	// $table = 'pelanggan';

	// // ambil data
	// $dataTable = getTableData($koneksi, $table, $page, $dataPerPage);

	include "../../lib/function.php";

	$table = "pelanggan";

	$tableProduk = query("SELECT * FROM " . $table);

	include "../templates/header.php";
?>

	<!-- page content -->
	<div class="right_col" role="main">
		<div class="">
			<div class="page-title">
				<div class="title_left">
					<h3>Manajemen <small>Data Pelanggan</small></h3>
				</div>
			</div>

			<div class="clearfix"></div>

			<div class="row">

				<div class="col-xs-12">
					<a href="<?php echo $admin_url; ?>pelanggan/form_tambah.php">
						<button class="btn btn-primary">
							<i class="fa fa-plus"></i> Tambah
						</button>
					</a>
					<form action="" method="POST">
						<div class="title_right">
							<div class="mb">
								<input type="text" name="search" id="search" class="form-control" placeholder="Username / Nama / No Hp" autocomplete="off" autofocus>
							</div>
						</div>
					</form>
				</div>

				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_title">
							<h2><small>Data Pelanggan</small></h2>

							<div class="clearfix"></div>
						</div>
						<div class="x_content">

							<table class="table table-striped">
								<thead>
									<tr>
										<th style="width: 50px;">No</th>
										<th style="width: 100px;">Username</th>
										<th style="width: 100px;">Password</th>
										<th style="width: 100px;">Nama</th>
										<th style="width: 150px;">Alamat</th>
										<th style="width: 100px;">No hp</th>
										<th style="width: 100px;">Email</th>
										<th style="width: 110px;">Aksi</th>

									</tr>
								</thead>
								<tbody id="lives_content">
									<?php
									$no = 1;
									foreach ($tableProduk as $data) :
									?>
										<tr>
											<th scope="row"><?php echo $no; ?></th>
											<td><?php echo $data['username']; ?></td>
											<td><?php echo $data['password']; ?></td>
											<td><?php echo $data['nama']; ?></td>
											<td><?php echo $data['alamat']; ?></td>
											<td><?php echo $data['no_hp']; ?></td>
											<td><?php echo $data['email']; ?></td>
											<td><a href="<?php echo $admin_url; ?>pelanggan/form_edit.php?id_pelanggan=<?php echo $data['id_pelanggan']; ?>">
													<button class="btn btn-warning">
														<i class="fa fa-edit"></i>
													</button></a>
												<a href="<?php echo $admin_url; ?>pelanggan/hapus.php?id_pelanggan=<?php echo $data['id_pelanggan']; ?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')">
													<button class="btn btn-danger">
														<i class="fa fa-remove"></i>
													</button>
												</a>
											</td>

										</tr>

									<?php
										$no++;
									endforeach;
									?>
								</tbody>
							</table>

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
					url: 'ajax_pelanggan.php',
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