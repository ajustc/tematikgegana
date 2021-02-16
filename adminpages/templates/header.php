<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Admin Pages</title>
  <!-- Bootstrap -->
  <link href="../../assets/admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../../assets/admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../../assets/admin/vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="../../assets/admin/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  <!-- bootstrap-progressbar -->
  <link href="../../assets/admin/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <!-- JQVMap -->
  <link href="../../assets/admin/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
  <!-- bootstrap-daterangepicker -->
  <link href="../../assets/admin/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
  <!-- CKEditor -->

  <!-- Main.css -->
  <link href="../../assets/frontend/css/main.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="../../assets/admin/build/css/custom.min.css" rel="stylesheet">

</head>

<!--  -->
<?php
include "../../lib/koneksi.php";
include "../../lib/config_web.php";
?>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="<?php echo $admin_url; ?>home/main.php" class="site_title"><i class="fa fa-paw"></i> <span>Halaman Admin</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile">
            <div class="profile_pic">
              <img src="../../assets/admin/images/img.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Selamat datang,</span>
              <h2><?php echo $_SESSION['user']['nama'] ?> | <b><?php echo $_SESSION['level'] ?></b></h2>
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>
                <?php echo $_SESSION['username'] ?>
              </h3>
              <ul class="nav side-menu">
                <?php if ($_SESSION['level'] == "O") { ?>
                  <li><a class="active" href="<?php echo $admin_url; ?>home/main.php"><i class="fa fa-home"></i> Beranda </a></li>
                  <li><a href="<?php echo $admin_url; ?>kategori/main.php"><i class="fa fa-th"></i> Kategori </a></li>
                  <li><a href="<?php echo $admin_url; ?>produk/main.php"><i class="fa fa-camera"></i> Produk </a></li>
                  <li><a href="<?php echo $admin_url; ?>pesanan/main.php"><i class="fa fa-cc"></i> Pesanan </a></li>
                  <li><a href="<?php echo $admin_url; ?>laporan produk/main.php"><i class="fa fa-file"></i> Laporan Produk </a></li>
                  <li><a href="<?php echo $admin_url; ?>testimoni/main.php"><i class="fa fa-comment"></i> Testimoni </a></li>
                  <li><a href="../logout.php"><i class="fa fa-sign-out"></i> Keluar </a></li>

                <?php } else { ?>
                  <li><a href="<?php echo $admin_url; ?>home/main.php"><i class="fa fa-home"></i> Beranda </a></li>
                  <li><a href="<?php echo $admin_url; ?>kategori/main.php"><i class="fa fa-th"></i> Kategori </a></li>
                  <li><a href="<?php echo $admin_url; ?>produk/main.php"><i class="fa fa-camera"></i> Produk </a></li>
                  <li><a href="<?php echo $admin_url; ?>pelanggan/main.php"><i class="fa fa-user"></i> Pelanggan </a></li>
                  <li><a href="<?php echo $admin_url; ?>pesanan/main.php"><i class="fa fa-cc"></i> Pesanan </a></li>
                  <li><a href="<?php echo $admin_url; ?>Laporan pesanan/main.php "><i class="fa fa-file"></i> Laporan Pesanan </a></li>
                  <li><a href="<?php echo $admin_url; ?>laporan produk/main.php"><i class="fa fa-file"></i> Laporan Produk </a></li>
                  <li><a href="<?php echo $admin_url; ?>user/main.php"><i class="fa fa-user"></i> User </a></li>
                  <li><a href="<?php echo $admin_url; ?>testimoni/main.php"><i class="fa fa-comment"></i> Testimoni </a></li>
                  <li><a href="<?php echo $admin_url; ?>navigasi/main.php"><i class="fa fa-bookmark"></i> Navigasi </a></li>
                  <li><a href="../logout.php"><i class="fa fa-sign-out"></i> Keluar </a></li>
                <?php } ?>
              </ul>
            </div>

          </div>
          <!-- /sidebar menu -->

        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <nav>
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="<?= $web_url ?>">
                  Main Website
                </a>
            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->