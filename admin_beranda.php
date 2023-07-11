<?php
session_start(); // Mulai session

// Koneksi ke database dan operasional lainnya (seperti include file koneksi ke database) di sini
define('hostname', 'localhost');
define('db_user', 'root');
define('db_pass', '');
define('db_name', 'laundry_in');

$koneksi = mysqli_connect(hostname, db_user, db_pass, db_name);

if (!$koneksi) {
  die('Gagal terkoneksi ke database. ' . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Beranda</title>
  <link rel="stylesheet" href="CSS/bootstrap.min.css">
  <link rel="stylesheet" href="Assets/FontAwesome/font-awesome.min.css">
  <link rel="stylesheet" href="Assets/Ionicons/ionicons.min.css">
  <link rel="stylesheet" href="CSS/material-design-iconic-font.min.css" />
  <link rel="stylesheet" href="CSS/animate.css" />
  <link rel="stylesheet" href="CSS/waves-effect.css" />
  <link rel="stylesheet" href="Assets/Tagsinput/jquery.tagsinput.css">
  <link rel="stylesheet" href="Assets/Toggles/toggles.css">
  <link rel="stylesheet" href="Assets/Timepicker/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="Assets/Timepicker/bootstrap-datepicker.min.css">
  <link rel="stylesheet" type="text/css" href="Assets/Colorpicker/colorpicker.css">
  <link rel="stylesheet" type="text/css" href="Assets/Jquery-multi-select/multi-select.css">
  <link rel="stylesheet" type="text/css" href="Assets/Select2/select2.css">
  <link rel="stylesheet" type="text/css" href="CSS/helper.css">
  <link rel="stylesheet" type="text/css" href="CSS/style.css">
  <link rel="stylesheet" type="text/css" href="Assets/DataTables/jquery.dataTables.min.css">
  <script src="JS/modernizr.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/onsen/2.10.10/css/ionicons/css/ionicons.min.css">
  <script>
    // Fungsi untuk menampilkan popup alert
    function showPopupAlert(message) {
      alert(message);
    }
  </script>
  
  <style>
    .carousel-inner .item img {
      width: 100%;
      height: 400px;
      /* Atur tinggi gambar sesuai kebutuhan */
    }
  </style>
<body class="fixed-left">
  <!-- Begin page -->
  <div id="wrapper">

    <!-- Top Bar Start -->
    <div class="topbar">
      <!-- LOGO -->
      <div class="topbar-left">
        <div class="text-center">
        <a href="#" class="logo"><span>LAUNDRY-IN</span></a>      
        </div>
      </div>
      <!-- Button mobile view to collapse sidebar menu -->
      <div class="navbar navbar-default" role="navigation">
        <div class="container">
          <div class="">
            <div class="pull-left">
              <button class="button-menu-mobile  open-left">
                <i class="ion-md-reorder"></i>
              </button>
              <span class="clearfix"></span>
            </div>
            <ul class="nav navbar-nav navbar-right pull-right">            
              <li class="hidden-xs">
                <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="ion-ios-expand"></i></a>
              </li>            
            </ul>
          </div>
          <!--/.nav-collapse -->
        </div>
      </div>
    </div>
    <!-- Top Bar End -->


    <!-- ========== Left Sidebar Start ========== -->

    <div class="left side-menu">
      <div class="sidebar-inner slimscrollleft">
        <div class="user-details">
          <div class="pull-left">
            <i class="ion-ios-contact"></i>
          </div>
          <div class="user-info">
            <div class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Laundry-In
                <span class="caret"></span>               
              </a>
              <ul class="dropdown-menu">
                <li><a href="admin_profil.php"><i class="ion-md-contact"></i> Profil<div class="ripple-wrapper"></div></a></li>
                <li><a href="logout.php"><i class="ion-ios-log-out"></i> Logout</a></li>
              </ul>
            </div>           
            <p class="text-muted m-0">Admin</p>
          </div>
        </div>
        <!--- Divider -->
        <div id="sidebar-menu">
          <ul>
            <li>
              <a href="admin_beranda.php" class="waves-effect"><i class="ion-md-home"></i><span> Beranda</a>
            </li>

            <li class="has_sub">
              <a href="#" class="waves-effect"><i class="ion-md-person"></i> <span>Pengguna</span> <span
                class="pull-right"><i class="ion-ios-arrow-down"></i></span>
              </a>
              <ul class="list-unstyled">
                <li><a class='ion-md-contacts' href="admin.php">  Data Admin</a></li>
                <li><a class='ion-md-contacts' href="karyawan.php">  Data Karyawan</a></li>
              </ul>
            </li>
            <li><a href="admin_pelanggan.php" class="waves-effect"><i class="ion-ios-person"></i><span> Pelanggan</a></li>
            <li><a href="layanan.php" class="waves-effect"><i class="ion-ios-shirt"></i><span> Layanan </a></li>
            <li><a href="admin_pesanan.php" class="waves-effect"><i class="ion-ios-clipboard"></i><span> Pesanan</a></li>
            <li><a href="admin_pembayaran.php" class="waves-effect"><i class="ion-ios-wallet"></i><span> Pembayaran</a></li>                 
            <li><a href="laporan.php" class="waves-effect"><i class="ion-ios-book"></i><span> Laporan</span></a></li>

          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
    <div class="content-page">

      <div class="content">
        <div class="container">

          <!DOCTYPE html
            PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
          <html xmlns="http://www.w3.org/1999/xhtml">
          <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />            
          </head>

          <body>
            <div class='row'>
              <div class='col-sm-12'>
                <h4 class='pull-left page-title'><strong> Selamat Datang di Web Aplikasi Kasir Laundry-In</strong></h4>
                <ol class='breadcrumb pull-right'>
                  <li class='active'>Beranda</li>
                </ol>
              </div>
            </div>           
            <div class='panel panel-border panel-primary'>
              <div class='panel-heading'>
              <h4><strong>PROMO!!!</strong></h4>
              <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                  <div class="item active">
                    <img src="Assets/Pictures/promo1.png" alt="" width="100%">  
                     <div class="carousel-caption">
                      Promo 1
                    </div>                  
                  </div>
                  <div class="item">
                    <img src="Assets/Pictures/promo2.png" alt="" width="100%">  
                    <div class="carousel-caption">
                      Promo 2
                    </div>                 
                  </div>
                  <div class="item">
                    <img src="Assets/Pictures/promo3.png" alt="" width="100%">
                    <div class="carousel-caption">
                      Promo 3
                    </div>
                  </div>
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                  <span class="sr-only">Next</span>
                </a>
              </div><br>
                <h3 class='panel-title'><i class='ion-ios-clipboard'></i> Info Pesanan </h3>
              </div>
              <div class='panel-body'>
              <?php
                // Periksa apakah session success_message ada dan tampilkan alert jika ada
                if (isset($_SESSION['success_message'])) {
                ?>
                  <script>
                    // Panggil fungsi showPopupAlert dengan pesan success_message
                    showPopupAlert("<?php echo $_SESSION['success_message']; ?>");
                  </script>
                <?php
                  unset($_SESSION['success_message']); // Hapus session setelah ditampilkan
                }
                ?>
                <table id='info_pesanan' class='table table-hover'>
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>ID Pesanan</th>
                      <th>Layanan</th>
                      <th>Berat (kg)</th>
                      <th>Tanggal Masuk</th>
                      <th>Tanggal Keluar</th>
                      <th>Total Pembayaran (Rp)</th>
                      <th>Status</th>
                      <th>Aksi</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $query = "SELECT * FROM pesanan";
                    $result = mysqli_query($koneksi, $query);
                    $i = 1;

                    if (mysqli_num_rows($result) > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                          <td><?= $i ?></td>
                          <td><?= $row['id_pesanan'] ?></td>
                          <td><?= $row['layanan'] ?></td>
                          <td><?= $row['berat'] ?></td>
                          <td><?= $row['tanggal_masuk'] ?></td>
                          <td><?= $row['tanggal_keluar'] ?></td>
                          <td><?= $row['total_biaya'] ?></td>
                          <td><?= $row['status'] ?></td>
                          <td>
                            <a class="btn btn-info ion-ios-refresh" href="admin_update.php?id_pesanan=<?= $row['id_pesanan'] ?>"> Update</a>
                          </td>
                        </tr>
                    <?php
                        $i++;
                      }
                    }
                    mysqli_close($koneksi);
                    ?>
                  </tbody>
                </table>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </body>

          </html>
        </div>

      </div>

      <footer class="footer text-left">
        <strong>Copyright &copy;2023 <a href="#">Laundry-In</a>.</strong> All rights reserved.
      </footer>

    </div>
  </div>

  <script>
    var resizefunc = [];
  </script>

  <script src="JS/jquery.min.js"></script>
  <script src="JS/bootstrap.min.js"></script>
  <script src="JS/waves.js"></script>
  <script src="JS/wow.min.js"></script>
  <script src="JS/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="JS/jquery.scrollTo.min.js"></script>
  <script src="Assets/DetectMobile/detect.js"></script>
  <script src="Assets/Fastclick/fastclick.js"></script>
  <script src="Assets/Jquery-slimscroll/jquery.slimscroll.js"></script>
  <script src="Assets/Jquery-blockUI/jquery.blockUI.js"></script>
  <script src="JS/jquery.app.js"></script>
  <script src="Assets/Tagsinput/jquery.tagsinput.min.js"></script>
  <script src="Assets/Toggles/toggles.min.js"></script>
  <script src="Assets/Timepicker/bootstrap-timepicker.min.js"></script>
  <script src="Assets/Timepicker/bootstrap-datepicker.js" type="text/javascript"></script>
  <script src="Assets/Colorpicker/bootstrap-colorpicker.js" type="text/javascript"></script>
  <script src="Assets/Jquery-multi-select/jquery.multi-select.js" type="text/javascript"></script>
  <script src="Assets/Jquery-multi-select/jquery.quicksearch.js" type="text/javascript"></script>
  <script src="Assets/Inputmask/bootstrap-inputmask.min.js" type="text/javascript"></script>
  <script src="Assets/Spinner/spinner.js" type="text/javascript"></script>
  <script src="Assets/Select2/select2.min.js" type="text/javascript"></script>
  <script src="Assets/DataTables/jquery.dataTables.min.js"></script>
  <script src="Assets/DataTables/dataTables.bootstrap.js"></script>

  <script type="text/javascript">
    $(document).ready(function () {
      $('#info_pesanan').dataTable();
    });

    // Date Picker
    jQuery('#datepicker').datepicker();
    jQuery('#datepicker-inline').datepicker();
    jQuery('#datepicker-multiple1').datepicker();
    jQuery('#datepicker-multiple2').datepicker();
    jQuery('#datepicker-multiple').datepicker({
      numberOfMonths: 5,
      showButtonPanel: true
    });
    // Select2
    jQuery(".select2").select2({
      width: '100%'
    });
  </script>
  


</body>
</html>