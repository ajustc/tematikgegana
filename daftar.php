<?php
include "lib/koneksi.php";
include "templates/header.php";
?>

<section id="form">
	<!--form-->
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2 class="panel-title" class="center">Halaman Daftar</h2>
				</div>
				<div class="panel-body">
					</br>
					<form method="post" class="form-horizontal">
						<div class="form-group">
							<label class="control-label col-md-3">Username *</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="username" placeholder="username" required>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Password *</label>
							<div class="col-md-7">
								<input type="password" class="form-control" name="password" placeholder="password" required>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Nama *</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="nama" placeholder="nama lengkap" required>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Alamat *</label>
							<div class="col-md-7">
								<textarea type="text" class="form-control" name="alamat" placeholder="alamat lengkap" required></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">No HP *</label>
							<div class="col-md-7">
								<input type="text" class="form-control no_hp" name="no_hp" placeholder="081234567890" required>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Email *</label>
							<div class="col-md-7">
								<input type="email" class="form-control" name="email" placeholder="example@gmail" required>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-7 col-md-offset-3">
								<button class="btn btn-primary" name="daftar" type="submit" value=" daftar ">Daftar</button>
								<h5>Sudah Punya Akun?<a href="login.php"> Masuk</a></h5>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>

		<?php
		//jika ada tombol daftar
		if (isset($_POST["daftar"])) {
			//mengambil isian dari form
			$username = $_POST["username"];
			$password = $_POST["password"];
			$nama = $_POST["nama"];
			$alamat = $_POST["alamat"];
			$no_hp = $_POST["no_hp"];
			$email = $_POST["email"];

			//cek apakah email sudah digunakan
			$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email='$email' ");
			$cocok = $ambil->num_row;
			if ($cocok == 1) {
				echo "<script>alert('Pendaftaran gagal, email sudah digunakan'); </script>";
				echo "<script>location='login.php';</script>";
			} else {
				//query di masukkan ke dalam tabel pelanggan
				$koneksi->query("INSERT INTO pelanggan (username, password, nama, alamat, no_hp, email) 
								VALUES ('$username','$password','$nama','$alamat','$no_hp','$email')");
				echo "<script>alert('Pendaftaran berhasil'); </script>";
				echo "<script>location='login.php';</script>";
			}
		}
		?>



	</div>
	<!--/sign up form-->
</section>


<?php
include "templates/footer.php";
?>