<?php
session_start();
if (empty($_SESSION['username']) and empty($_SESSION['level'])) {
  echo "<center>Untuk mengakses halaman, Anda harus login <br>";
  echo "<a href=../index.php><b>LOGIN</b></a></center>";
} else {
  include "../../lib/config_web.php";
  include "../../lib/koneksi.php";

  $id_produk = $_GET['id_produk'];
  $query = mysqli_query($koneksi, "SELECT * FROM tbl_produk WHERE id_produk='$id_produk'");

  $dataProduk = mysqli_fetch_array($query);

  include "../templates/header.php"; ?>

  <script type="text/javascript" src="../../assets/admin/vendors/ckeditor/ckeditor.js"></script>
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
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Form Tambah <small>data produk</small></h2>

              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <br />
              <form method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="aksi_edit.php" enctype="multipart/form-data">
                <input type="hidden" name="id_produk" value="<?php echo $dataProduk['id_produk']; ?>">

                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Nama Kategori <span class="required">*</span>
                  </label>
                  <div class="col-md-10 col-sm-10 col-xs-12">

                    <select class="form-control col-md-7 col-xs-12" name="nama_kategori">
                      <?php
                      $query = mysqli_query($koneksi, "SELECT * FROM tbl_kategori");
                      while ($data = mysqli_fetch_array($query)) {
                      ?>
                        <option value="<?php echo $data['id_kategori']; ?>" selected><?php echo $data['nama_kategori']; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Nama Produk <span class="required">*</span>
                  </label>
                  <div class="col-md-10 col-sm-10 col-xs-12">
                    <input type="text" id="first-name" name="nama_produk" value="<?php echo $dataProduk['nama_produk']; ?>" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"> <span class="required"></span>
                  </label>
                  <div class="col-md-10 col-sm-10 col-xs-12">
                    <img src="../../file/produk/<?php echo $dataProduk['gambar']; ?>" width='180px' height='150px' />
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Gambar <span class="required"></span>
                  </label>
                  <div class="col-md-10 col-sm-10 col-xs-12">
                    <input type="file" id="first-name" name="gambar">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Harga <span class="required">*</span>
                  </label>
                  <div class="col-md-10 col-sm-10 col-xs-12">
                    <input type="text" id="first-name" name="harga" value="<?php echo $dataProduk['harga']; ?>" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12" for="deskripsi">Deskripsi <span class="required">*</span>
                  </label>
                  <div class="col-md-10 col-sm-10 col-xs-12">
                    <textarea type="text/javascript" id="deskripsi" name="deskripsi" required="required" class="form-control col-md-7 col-xs-12"><?php echo $dataProduk['deskripsi']; ?></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Slide</label>
                  <div class="col-sm-10">
                    <div class="radio">
                      <?php $slide = $dataProduk['slide']; ?>
                      <label>
                        <input type="radio" name="slide" id="slide" value="Y" <?php echo ($slide == "Y") ? "checked" : "" ?>>
                        Ya
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="slide" id="slide" value="N" <?php echo ($slide == "N") ? "checked" : "" ?>>
                        Tidak
                      </label>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Rekomendasi</label>
                  <div class="col-sm-10">
                    <div class="radio">
                      <?php $rekomendasi = $dataProduk['rekomendasi']; ?>
                      <label>
                        <input type="radio" name="rekomendasi" id="rekomendasi" value="Y" <?php echo ($rekomendasi == "Y") ? "checked" : "" ?>>
                        Ya
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="rekomendasi" id="rekomendasi" value="N" <?php echo ($rekomendasi == "N") ? "checked" : "" ?>>
                        Tidak
                      </label>
                    </div>
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
                CKEDITOR.replace('deskripsi');
              </script>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php include "../templates/footer.php";
} ?>