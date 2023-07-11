<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Layanan</title>
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
                                <a href="#" class="waves-effect"><i class="ion-md-person"></i> <span>Pengguna</span> <span class="pull-right"><i class="ion-ios-arrow-down"></i></span>
                                </a>
                                <ul class="list-unstyled">
                                    <li><a class='ion-md-contacts' href="admin.php"> Data Admin</a></li>
                                    <li><a class='ion-md-contacts' href="karyawan.php"> Data Karyawan</a></li>
                                </ul>
                            </li>
                            <li><a href="admin_pelanggan.php" class="waves-effect"><i class="ion-ios-person"></i><span> Pelanggan</a></li>
                            <li><a href="layanan.php" class="waves-effect"><i class="ion-ios-shirt"></i><span> Layanan</a></li>
                            <li><a href="admin_pesanan.php" class="waves-effect"><i class="ion-ios-clipboard"></i><span> Pesanan</a></li>
                            <li><a href="admin_pembayaran.php" class="waves-effect"><i class="ion-ios-wallet"></i><span> Pembayaran</a></li>    
                            <li><a href="Laporan.php" class="waves-effect"><i class="ion-ios-book"></i><span> Laporan</span></a></li>
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
                                    <li><a href="layanan.php">Data layanan</a></li>
                                    <li class="active">Tambah Layanan</li>
                                </ol>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="panel panel-border panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title ion-md-add"> Tambah Layanan</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="form">
                                        <form method="POST" action="layanan.php" enctype="multipart/form-data" class="cmxform form-horizontal tasi-form" id="commentForm">
                                            <div class="form-group">
                                                <label class="control-label col-lg-2">ID Layanan :</label>
                                                <div class="col-lg-5">
                                                    <input type="text" class="form-control" name="id_layanan" id="layanan" placeholder="Masukan ID Layanan" required autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-lg-2">Nama Layanan :</label>
                                                <div class="col-lg-5">
                                                    <input type="text" class="form-control" name="nama_layanan" id="nama" placeholder="Masukan Nama Layanan" required autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-lg-2">Biaya (Rp) / Kg :</label>
                                                <div class="col-lg-5">
                                                    <input type="text" class="form-control" name="biaya" placeholder="Masukan Biaya" id="biaya" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-lg-2">Deskripsi :</label>
                                                <div class="col-lg-5">
                                                    <input type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="Masukan Deskripsi" required autocomplete="off">
                                                </div>
                                            </div><br>
                                            <div class="form-group">
                                                <div class="col-lg-offset-5 col-lg-10">
                                                    <input type="submit" name="kirim" value="Tambah Layanan" class="btn-primary btn-rounded">
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