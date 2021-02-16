<?php
session_start();
if (empty($_SESSION['username']) and empty($_SESSION['level'])) {
  echo "<center>Untuk mengakses halaman, Anda harus login <br>";
  echo "<a href=../index.php><b>LOGIN</b></a></center>";
} else {
  include "../../lib/config_web.php";
  include "../../lib/koneksi.php";

  $idnav = $_GET['id_navigasi'];
  $query = mysqli_query($koneksi, "SELECT * FROM navigasi WHERE id_navigasi='$idnav'");

  $datanav = mysqli_fetch_array($query);

  include "../templates/header.php"; ?>
  <script type="text/javascript" src="../../assets/admin/vendors/ckeditor/ckeditor.js"></script>
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Manajemen <small>Data Navigasi</small></h3>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Form Tambah <small>data navigasi</small></h2>

              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <br />
              <form method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="aksi_edit.php">
                <input type="hidden" name="id_navigasi" value="<?php echo $datanav['id_navigasi']; ?>">
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Nama<span class="required">*</span>
                  </label>
                  <div class="col-md-10 col-sm-10 col-xs-12">
                    <input type="text" id="first-name" name="nama" value="<?php echo $datanav['nama']; ?>" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12" for="isi">Isi <span class="required">*</span>
                  </label>
                  <div class="col-md-10 col-sm-10 col-xs-12">
                    <textarea type="text/javascript" id="isi" name="isi" required="required" class="form-control col-md-7 col-xs-12"><?php echo $datanav['isi']; ?></textarea>
                  </div>
                </div>

                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-3 col-sm-3 col-xs-12 col-md-offset-2">
                    <a href="main.php" class="btn btn-default">
                      <i class="fa fa-mail-forward"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                  </div>
                </div>

              </form>
              <script>
                CKEDITOR.replace('isi');
              </script>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php include "../templates/footer.php";
}
?>