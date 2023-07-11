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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pembayaran</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 2px solid grey;
        }
    </style>

</head>

<body>

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
                                <button class="button-menu-mobile open-left">
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
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Laundry-In <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="profil.php"><i class="ion-md-contact"></i> Profil<div class="ripple-wrapper"></div></a></li>
                                    <li><a href="logout.php"><i class="ion-ios-log-out"></i> Logout</a></li>
                                </ul>
                            </div>
                            <p class="text-muted m-0">Karyawan</p>
                        </div>
                    </div>
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="beranda.php" class="waves-effect"><i class="ion-md-home"></i><span> Beranda</a>
                            </li>
                            <li><a href="pelanggan.php" class="waves-effect"><i class="ion-ios-person"></i><span> Pelanggan</a></li>
                            <li><a href="pesanan.php" class="waves-effect"><i class="ion-ios-clipboard"></i><span> Pesanan</a></li>
                            <li><a href="pembayaran.php" class="waves-effect"><i class="ion-ios-wallet"></i><span> Pembayaran</a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="content-page">

                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <ol class="breadcrumb pull-right">
                                    <li><a href="pembayaran.php">Pembayaran</a></li>
                                    <li class="active">Konfirmasi Pembayaran</li>
                                </ol>
                            </div>
                        </div>
                        <div class="panel panel-dark">
                            <div class="panel-heading text-center">
                                <div class="alert alert-success" role="alert">
                                    <h4><strong>Pembayaran Berhasil!</strong></h4>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="col">
                                    <?php
                                    // Pastikan form telah dikirim dengan metode POST
                                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                        // Mendapatkan nilai-nilai yang dikirim melalui form
                                        $id_pembayaran = $_POST['id_pembayaran'];
                                        $metode_pembayaran = $_POST['metode_pembayaran'];
                                        $tanggal_pembayaran = $_POST['tanggal_pembayaran'];
                                        $total_pembayaran = $_POST['total_pembayaran'];

                                        // Mengubah format tanggal menjadi "yyyy/mm/dd"
                                        $tanggalpembayaranFormatted = date("Y/m/d", strtotime($tanggal_pembayaran));

                                        // Query SQL untuk menambahkan data ke tabel pembayaran
                                        $sql = "INSERT INTO pembayaran (id_pembayaran, metode_pembayaran, tanggal_pembayaran, total_pembayaran) 
                                        VALUES (' $id_pembayaran', '$metode_pembayaran', '$tanggalpembayaranFormatted', ' $total_pembayaran')";

                                        // Eksekusi query dan periksa keberhasilannya
                                        if (mysqli_query($koneksi, $sql)) {
                                            // Jika berhasil, tampilkan pesan sukses                             
                                            echo '<script>alert("Data pembayaran berhasil ditambahkan.");</script>';
                                        } else {
                                            // Jika terjadi kesalahan, tampilkan pesan error
                                            echo "Terjadi kesalahan: " . mysqli_error($koneksi);
                                        }
                                    } 
                                                                  
                                    ?>
                                    <table class="">
                                        <tr>
                                            <th>ID Pembayaran :</th>
                                            <th>Metode Pembayaran :</th>
                                            <th>Tanggal Pembayaran :</th>
                                            <th>Total Pembayaran (Rp) :</th>
                                        </tr>
                                        <tr>
                                            <td><?php echo $id_pembayaran; ?></td>
                                            <td><?php echo $metode_pembayaran; ?></td>
                                            <td><?php echo $tanggal_pembayaran; ?></td>
                                            <td><?php echo $total_pembayaran; ?></td>
                                        </tr>
                                    </table><br>
                                </div>
                                <div class="col text-right">
                                    <a href="invoice.php?id_pembayaran=<?php echo $id_pembayaran; ?>" class="btn btn-info btn-rounded end">Cetak Invoice</a>
                                </div>
                            </div>
                        </div>

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