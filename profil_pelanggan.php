<?php
include "lib/koneksi.php";
include "templates/header.php";

$id_pelanggan = $_GET["id_pelanggan"];
$ambil = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE id_pelanggan='$id_pelanggan'");
$profil = mysqli_fetch_assoc($ambil);

/* echo"<pre>";
print_r ($_SESSION["pelanggan"]);
echo"</pre>"; */
?>

<section id="form">
	<!--form-->
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="index.php">Beranda</a></li>
				<li class="active">Profile Pelanggan</li>
			</ol>
		</div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default mt">
					<div class="panel-heading">
						<h2 class="panel-title" class="center">Data Pelanggan</h2>
					</div>
					<div class="panel-body">
						<form method="post" class="form-horizontal">
							<div class="form-group">
								<label class="control-label col-md-3">Username</label>
								<div class="col-md-7">
									<input type="text" class="form-control" name="username" value="<?php echo $profil['username']; ?>" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Password</label>
								<div class="col-md-7">
									<input type="password" class="form-control" name="password" value="<?php echo $profil['password']; ?>" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Nama</label>
								<div class="col-md-7">
									<input type="text" class="form-control" name="nama" value="<?php echo $profil['nama']; ?>" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Alamat</label>
								<div class="col-md-7">
									<textarea type="text" class="form-control" name="alamat" required><?php echo $profil['alamat']; ?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">No HP</label>
								<div class="col-md-7">
									<input type="no_hp" class="form-control" name="no_hp" value="<?php echo $profil['no_hp']; ?>" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Email</label>
								<div class="col-md-7">
									<input type="email" class="form-control" name="email" value="<?php echo $profil['email']; ?>" required>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-7 col-md-offset-3">
									<button class="btn btn-primary" name="simpan" type="submit" value=" simpan ">Simpan</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php
	//jika ada tombol simpan
	if (isset($_POST["simpan"])) {
		//mengambil isian dari form
		$username = $_POST["username"];
		$password = $_POST["password"];
		$nama = $_POST["nama"];
		$alamat = $_POST["alamat"];
		$no_hp = $_POST["no_hp"];
		$email = $_POST["email"];


		//update data pelanggan
		$querySimpan = mysqli_query($koneksi, "UPDATE pelanggan SET username='$username', password='$password', nama='$nama', alamat='$alamat', email='$email', no_hp='$no_hp' WHERE id_pelanggan='$id_pelanggan'");


		// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar pelanggan
		if ($querySimpan) {
			echo "<script> alert('Data Berhasil Diubah'); window.location = 'index.php';</script>";
			// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form edit pelanggan
		} else {
			echo "<script> alert('Data Pelanggan Gagal Dimasukkan'); window.location = profil_pelanggan.php;</script>";
		}
	}


	?>



	</div>
	<!--/sign up form-->
	</div>


	<?php
	include "templates/footer.php";
	?>