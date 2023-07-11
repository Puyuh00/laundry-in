<?php
include_once './koneksi.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Riwayat Pembayaran</title>
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
        .dataTables_filter input {
            width: 100%; /* Atur lebar pencarian menjadi 100% dari elemen induknya */
            box-sizing: border-box; /* Pastikan lebar termasuk padding dan border */
            max-width: 150px; /* Atur lebar maksimum sesuai dengan batas panel body */
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
                                    <li class="active">Riwayat Pembayaran</li>
                                </ol>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="panel panel-border panel-dark">
                                <div class="panel-heading">
                                    <h3 class="panel-title ion-ios-wallet"> Riwayat Pembayaran</h3>
                                </div>
                                <div class="panel-body">
                                    <table id="rwt_pembayaran" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID Pembayaran</th>                                                                                               
                                                <th>Metode Pembayaran</th>
                                                <th>Tanggal Pembayaran</th>
                                                <th>Total Pembayaran (Rp)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = "SELECT * FROM pembayaran";                                           
                                            $rows = mysqli_query($koneksi, $query);                                            
                                            $i = 1;                                            
                                            while ($row = mysqli_fetch_assoc($rows)) {
                                            ?>
                                                <tr>
                                                    <td><?= $i ?></td>
                                                    <td><?= $row['id_pembayaran'] ?></td>                                                                                                  
                                                    <td><?= $row['metode_pembayaran'] ?></td>
                                                    <td><?= $row['tanggal_pembayaran'] ?></td>
                                                    <td><?= $row['total_pembayaran'] ?></td>
                                                </tr>
                                            <?php
                                                $i++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
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

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#rwt_pembayaran').DataTable({
                    "lengthMenu": [10, 25, 50, 75, 100], // Menampilkan opsi "showing entries"
                    "searching": true, // Menampilkan fungsi "searching"
                    "paging": true, // Menampilkan fungsi "next" dan "previous"
                    "ordering": true,
                    "info": true
                });
            });
        </script>

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