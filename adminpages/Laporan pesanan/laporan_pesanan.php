<!DOCTYPE html>
<html>

<head>
	<title>Laporan Pesanan</title>
</head>

<body>

	<center>

		<h2>DATA LAPORAN PESANAN</h2>
		<h2>Tematik Gegana</h2>

	</center>

	<?php
	include "../../lib/koneksi.php";
	$tgl_mulai = $_POST["tglm"];
	$tgl_selesai = $_POST["tgls"];
	?>
	<h2>Laporan Pesanan dari <?php echo $tgl_mulai ?> sampai <?php echo $tgl_selesai  ?></h2>
	<table border="1" style="width: 100%">
		<tr>
			<th width="1%">No</th>
			<th>Nama</th>
			<th width="25%">Tanggal Pesanan</th>
			<th>Status</th>
			<th width="25%">Total Pesanan</th>
		</tr>
		<?php
		$barangkrm = "Barang dikirim";
		$batal = "Batal";
		// $tgl_mulai = $_POST["tglm"];
		// $tgl_selesai = $_POST["tgls"];
		$ambil = $koneksi->query("SELECT * FROM pesanan JOIN pelanggan 
								ON pesanan.id_pelanggan=pelanggan.id_pelanggan 
								-- WHERE tgl_pesanan BETWEEN '$tgl_mulai' AND '$tgl_selesai'
								WHERE status_pesanan = '$barangkrm'
								 ")  ?>
		<?php while ($pecah = $ambil->fetch_assoc()) {
			$data[] = $pecah;
		}

		?>

		<?php $nomor = 1; ?>
		<?php $total = 0; ?>
		<?php foreach ($data as $key => $nilai) : ?>
			<?php $total += $nilai['total_pesanan'] ?>
			<tr>
				<td><?php echo $nomor; ?></td>
				<td><?php echo $nilai['nama']; ?></td>
				<td><?php echo $nilai['tgl_pesanan']; ?></td>
				<td><?php echo $nilai['status_pesanan']; ?></td>
				<td>Rp. <?php echo number_format($nilai['total_pesanan']); ?></td>
			</tr>
			<?php $nomor++ ?>
		<?php endforeach; ?>
		<tr>
			<th colspan=4>Total Pendapatan</th>
			<th>Rp. <?php echo number_format($total) ?></th>
		</tr>
	</table>

	<script>
		window.print();
	</script>

</body>

</html>