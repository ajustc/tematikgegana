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
 					<h2 class="panel-title">Halaman Masuk</h2>
 				</div>
 				<div class="panel-body">
 					</br>
 					<form method="post" class="form-horizontal">
 						<div class="form-group">
 							<label class="control-label col-md-3">Email</label>
 							<div class="col-md-7">
 								<input type="text" class="form-control" name="email" required>
 							</div>
 						</div>

 						<div class="form-group">
 							<label class="control-label col-md-3">Password</label>
 							<div class="col-md-7">
 								<input type="password" class="form-control" name="password" required>
 							</div>
 						</div>
 						<div class="form-group">
 							<div class="col-md-7 col-md-offset-3">
 								<button class="btn btn-primary" name="login" type="submit" value=" Login ">Masuk</button>
 								<h5>Belum Punya Akun?<a href="daftar.php"> Daftar</a></h5>
 							</div>
 						</div>
 					</form>
 				</div>
 			</div>
 		</div>
 		<!-- jika ada tombol login  -->
 		<?php
			if (isset($_POST["login"])) {
				$email = $_POST["email"];
				$password = $_POST["password"];

				//melakukan query untuk mengecek akun di tabel pelanggan dalam database
				$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email='$email' AND password='$password' ");

				//hitung akun yang terambil
				$akunyangcocok = $ambil->num_rows;

				//jika ada 1 akun yang cocok, maka di loginkan
				if ($akunyangcocok == 1) {
					//anda sukses login
					//mendapatkan akun dalam bentuk array
					$akun = $ambil->fetch_assoc();
					//simpan di dalama session pelanggan
					$_SESSION["pelanggan"] = $akun;
					// echo "<script>alert('anda sukses login ');</script>";
					echo "<script>location='index.php';</script>";
					//jika sudah belanja
					if (isset($_SESSION["cart"]) or !empty($_SESSION["cart"])) {
						echo "<script>location='checkout.php';</script>";
					} else {
						echo "<script>location='riwayat_belanja.php';</script>";
					}
				} else {
					//anda gagal login
					echo "<script>alert('anda gagal login, periksa akun anda ');</script>";
					echo "<script>location='login.php';</script>";
				}
			}
			?>
 	</div>
 	<!--/login form-->
 	</div>
 	</div>
 	</div>
 </section>
 <!--/form-->

 <?php
	include "templates/footer.php";
	?>