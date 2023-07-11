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

$query = "SELECT id_pesanan FROM pesanan ORDER BY id_pesanan DESC LIMIT 1";
$result = mysqli_query($koneksi, $query);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $lastOrderID = $row['id_pesanan'];

    // Menghasilkan ID pesanan berikutnya
    $nextOrderID = generateNextOrderID($lastOrderID);
} else {
    // Jika belum ada data pesanan, menghasilkan ID pesanan awal
    $nextOrderID = "P001";
}

// Fungsi untuk menghasilkan ID pesanan berikutnya
function generateNextOrderID($lastOrderID) {
    // Mengambil angka dari ID pesanan terakhir
    $lastNumber = (int) substr($lastOrderID, 1);

    // Menambahkan 1 ke angka terakhir
    $nextNumber = $lastNumber + 1;

    // Menghasilkan ID pesanan berikutnya dengan format PXXX
    $nextOrderID = "P" . str_pad($nextNumber, 3, "0", STR_PAD_LEFT);

    return $nextOrderID;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pesanan</title>
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
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Laundry-In
                                    <span class="caret"></span>
                                </a>
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
                                    <li class="active">Pesanan</li>
                                </ol>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="panel panel-border panel-dark">
                                <div class="panel-heading">
                                    <div class="pull-right">
                                        <a href="data_pesanan.php" class="btn btn-success ion-ios-clipboard"> Riwayat Pesanan</a>
                                    </div>
                                    <h3 class="panel-title ion-ios-clipboard"> Pesanan</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="form">
                                        <form method="POST" action="detail_pesanan.php" enctype="multipart/form-data" class="cmxform form-horizontal tasi-form" id="commentForm">
                                            <div class="form-group">
                                                <label class="control-label col-lg-2">ID Pesanan :</label>
                                                <div class="col-lg-5">
                                                    <input type="text" class="form-control" name="id_pesanan" id="pesanan" value="<?php echo $nextOrderID; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-lg-2">Layanan :</label>
                                                <div class="col-lg-5">
                                                    <select class="form-control" name="layanan" id="layanan" required>
                                                        <option value="">Pilih Jenis Layanan</option>
                                                        <option value="Cuci Reguler" data-biaya="5.000">Cuci Reguler</option>
                                                        <option value="Cuci Kilat" data-biaya="6.500">Cuci Kilat</option>
                                                        <option value="Cuci Setrika" data-biaya="7.000">Cuci Setrika</option>
                                                        <option value="Cuci Kering" data-biaya="7.500">Cuci Kering</option>
                                                        <option value="Cuci Selimut" data-biaya="8.000">Cuci Selimut</option>
                                                        <option value="Cuci Sprei" data-biaya="8.000">Cuci Sprei</option>
                                                        <option value="Cuci Komplit" data-biaya="10.000">Cuci Komplit</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-lg-2">Biaya Layanan (Rp)/Kg :</label>
                                                <div class="col-lg-5">
                                                    <input type="text" class="form-control" name="biaya_layanan" id="biaya_layanan" placeholder="Biaya Layanan" required autocomplete="off" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-lg-2">Berat (Kg):</label>
                                                <div class="col-lg-5">
                                                    <input type="text" class="form-control" name="berat" placeholder="Masukan Berat" id="berat" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-lg-2">Total Biaya (Rp) :</label>
                                                <div class="col-lg-5">
                                                    <input type="text" class="form-control" name="total_biaya" id="total_biaya" placeholder="Total Biaya" required autocomplete="off" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-lg-2">Tanggal Masuk :</label>
                                                <div class="col-lg-5">
                                                    <input type="text" class="form-control" name="tanggal_masuk" placeholder="dd/mm/yyyy" id="datepicker-multiple1" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-lg-2">Tanggal Keluar :</label>
                                                <div class="col-lg-5">
                                                    <input type="text" class="form-control" name="tanggal_keluar" placeholder="dd/mm/yyyy" id="datepicker-multiple2" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-lg-offset-5 col-lg-10">
                                                    <input type="submit" name="kirim" value="Tambah Pesanan" class="btn-primary btn-rounded">
                                                </div>
                                            </div>
                                        </form>

                                    </div>
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
            // Mendapatkan elemen select dan input biaya layanan
            var layananSelect = document.getElementById('layanan');
            var biayaInput = document.getElementById('biaya_layanan');
            var beratInput = document.getElementById('berat');
            var totalBiayaInput = document.getElementById('total_biaya');

            // Menambahkan event listener saat pilihan layanan berubah
            layananSelect.addEventListener('change', function() {
                // Mendapatkan biaya layanan dari atribut data-biaya pilihan yang dipilih
                var biaya = this.options[this.selectedIndex].getAttribute('data-biaya');

                // Mengupdate nilai biaya layanan pada input
                biayaInput.value = biaya;
            });

            // Menambahkan event listener saat nilai biaya layanan atau berat berubah
            biayaInput.addEventListener('input', hitungTotalBiaya);
            beratInput.addEventListener('input', hitungTotalBiaya);

            // Fungsi untuk menghitung total biaya
            function hitungTotalBiaya() {
                var biaya = biayaInput.value;
                var berat = beratInput.value;
                var totalBiaya = biaya * berat;

                // Menambahkan ".000" di belakang total biaya
                var totalBiayaFormatted = totalBiaya.toFixed(3);

                // Mengubah format total biaya menjadi ribuan
                var totalBiayaFormattedWithCommas = totalBiayaFormatted.replace('.', '.');

                // Mengupdate nilai total biaya pada input
                totalBiayaInput.value = totalBiayaFormattedWithCommas;
            }
        </script>

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