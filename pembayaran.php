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

$query = "SELECT TRIM(id_pembayaran) AS id_pembayaran FROM pembayaran ORDER BY id_pembayaran DESC LIMIT 1";
$result = mysqli_query($koneksi, $query);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $lastPayID = $row['id_pembayaran'];

    // Menghasilkan ID pembayaran berikutnya
    $nextPayID = generateNextPayID($lastPayID);
} else {
    // Jika belum ada data pembayaran, menghasilkan ID pembayaran awal
    $nextPayID = "B001";
}

// Fungsi untuk menghasilkan ID pesanan berikutnya
function generateNextPayID($lastPayID)
{
    // Mengambil angka dari ID pembayaran terakhir
    $lastNumber = (int) substr($lastPayID, 1);

    // Menambahkan 1 ke angka terakhir
    $nextNumber = $lastNumber + 1;

    // Menghasilkan ID pembayaran berikutnya dengan format BXXX
    $nextPayID = "B" . str_pad($nextNumber, 3, "0", STR_PAD_LEFT);

    return $nextPayID;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pembayaran</title>
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
                                    <li class="active">Pembayaran</li>
                                </ol>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="panel panel-border panel-dark">
                                <div class="panel-heading">
                                    <div class="pull-right">
                                        <a href="rwt_pembayaran.php" class="btn btn-success ion-ios-wallet"> Riwayat Pembayaran</a>
                                    </div>
                                    <h3 class="panel-title ion-ios-wallet"> Pembayaran</h3>
                                </div>
                                <div class="panel-body">

                                    <div class="form">
                                        <form method="POST" action="konfirmasi_pembayaran.php" enctype="multipart/form-data" class="cmxform form-horizontal tasi-form" id="commentForm">
                                            <div class="form-group">
                                                <label class="control-label col-lg-2">ID Pembayaran :</label>
                                                <div class="col-lg-5">
                                                    <input type="text" class="form-control" name="id_pembayaran" id="pembayaran" value="<?php echo $nextPayID; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-lg-2">Metode Pembayaran :</label>
                                                <div class="col-lg-5">
                                                    <select class="form-control" name="metode_pembayaran" id="metode" required>
                                                        <option value="">Pilih Metode Pembayaran</option>
                                                        <option value="Tunai">Tunai</option>
                                                        <option value="QRIS">QRIS</option>
                                                        <option value="OVO">OVO</option>
                                                        <option value="DANA">DANA</option>
                                                        <option value="GoPay">GoPay</option>
                                                        <option value="Link Aja">Link Aja</option>
                                                        <option value="VA MAndiri">VA Mandiri</option>
                                                        <option value="VA BRI">VA BRI</option>
                                                        <option value="VA BNI">VA BNI</option>
                                                        <option value="VA BCA">VA BCA</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-lg-2">Tanggal Pembayaran :</label>
                                                <div class="col-lg-5">
                                                    <input type="text" class="form-control" name="tanggal_pembayaran" placeholder="dd/mm/yyyy" id="datepicker-multiple" autocomplete="off">
                                                </div>
                                            </div>
                                            <?php                                                                                                                      
                                           $query = "SELECT total_biaya FROM pesanan ORDER BY id_pesanan DESC LIMIT 1";
                                           $result = mysqli_query($koneksi, $query);
                                           
                                           if (mysqli_num_rows($result) > 0) {
                                               $row = mysqli_fetch_assoc($result);
                                               $total_biaya = $row['total_biaya'];
                                           } else {
                                               $total_biaya = 0; // Jika tidak ada data total biaya ditemukan, maka diatur sebagai 0
                                           }

                                            ?>
                                            <div class="form-group">
                                                <label class="control-label col-lg-2">Total Pembayaran (Rp) :</label>
                                                <div class="col-lg-5">
                                                    <input type="text" class="form-control" name="total_pembayaran" id="bayar" value="<?php echo $total_biaya; ?>" readonly>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <div class="col-lg-offset-5 col-lg-10">
                                                    <input type="submit" name="kirim" value="Konfirmasi Pembayaran" class="btn-primary btn-rounded">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">                                                   
                                                    <div class="col-lg-4 m-t-15">
                                                        <div class="card-body text-center">
                                                            <img src="https://www.static-src.com/siva/asset//12_2020/qris-footer.png" alt="VeritransQRIS" />
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 m-t-20">
                                                        <div class="card-body text-center">
                                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADsAAAAiCAMAAADWIlHSAAAAXVBMVEX///9NdZcKPXcoUo3F1eR0krKpuND7wAr5qBD79/fs8fbT3uva6/X+78yPp8r7zXH/0gP+9eT8si797aMPJ1f+0Cz+1km6xdz954b6vkxTir9tfbv83bdSVov71JoPnwK9AAABFElEQVQ4y+2Qy26EMAxFbcdOJm8GGJhn//8z6wxqN9UMtKsuuKDoyvLJkQJ79vwxPn+1PORfkbl23Sk/2+Xg3Lm1+/m4BT27ruvcSe31cFC2u+sdzp3W4aF3TrW1TlOvaD8NQyvKDutS19Y8wLGhlwyL39V1LUzOVQ/RAuS+/1hmx0vN2564CYSCIv576OFnEsQIiQOEyEmPoCcEjkIphvT8XloMGtLfeNHGtvXZGw0xWUQSI29YQAqWZvDRoKWik0KsQx4t0hzo+pq1IAbiaK1BZUelzI0AZPECkLxlHxCp6A6ibcaHUGrsuLBX/5Iti7cQCpnFy4RIG7zCMBcIyIxiJWICK8CIfEvIpeiChT17/nk+AQ62C6pkyuQwAAAAAElFTkSuQmCC" alt="mandiri">
                                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADoAAAAiBAMAAAD8ENftAAAALVBMVEX///95qs/r8fYRYas5ebWoyeG6xdyavNpjmcTb6fPT3uvF1OMEUJxTir+Vr9UlfJ6qAAABOklEQVQoz2IYBWhgaml4aTUuSU6XyybGlzfgkGW05D49haMBl6wR5zEWjYaHogyJCzZueCrNWKAoOFtQKBEmq+vly9FgIhxk7PDGyNewecGaFsMTFjJQWSsXXU+OBpfHS81PFZt7GB9jWCx78aijMFTWzFBZgKPBuWWF+fHYELDslcYjp2GyloulDTkabDdf8bUNYTlh6KKwOPDsSUMZmL2AsZ5aXNFwxTeEIUWW1dFdpWGKy3MniScwWa5T3MYNSgpMDExMDAoKTApMSgwKQCYYsBqGmGYLP8AVWImCgoLiuCSZUOkJqFz28m1ZUbOXzVQtS9u2e9tKqdCVaWorQ6eJQWTZ4t6li8eJRas9DCutEwsILFv6NLwyte45zAwlpqmTFBQ4mRTYixQUJk3QVJikwKCkxDAKUAEA8DVadpU4bbAAAAAASUVORK5CYII=" alt="bri">
                                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADkAAAAkCAMAAAAEjmLyAAAAbFBMVEX///8UZYPlSAvs8fbj5OTF1eTa6/X96+h0krJNdZe4t7n2wLzxiVKpyuL5saj4o38KPXeqq6v63NrQ0NCPp8r5yMjT3uuyzcnuXhapuNDc3NygoJ+u2vDEw8SQkJCYw+FtfbvxeCXeMBD3npRPtWHXAAABgUlEQVRIx+2S2XKEIBBFu0EFBBVEXGbL9v//mG7IZExVfMtTak4p0i3HW5TAkyd/g7U2wWgzCkAuHbHMQMzdAgT3Fq66ei8qIYSDQWR6amjMaJrWiBMw2k+52n4112FMihoXNAAL+o6yEPECwFJDI9K4g6U3sO+r+nApr2ITJq+LaY5NcEKMSgz0EOnbNCXzFVEfmkqtwoG1eZ/FrGtNApu6QewOTLWqUQgL6mFmzCWbMCHKA5MC+/c3gOGR2TSzRl9nEwyaA5PXO6cA3LdZfsRrMSXiNB+YwkJaHaW68WFu3hQTOo/dkTkAbdVZlcZ9ps5mORu/m2saHCT6wCr6+0moJ8QaoJhg/Jcpf5rWcWpy99PnkfBmLvFMk9NmxAX2jGroe0vPvh9G3uD2sr3w2ebkqaRIM+dqgz9BhlhVsZJVdaqqK92EhKuk3o6WXxNyb7btma8Qrq2ksb2FGKG9Bm4yt3OMMpxDDG24VT9CM5WUILmI90nmFPlFLuHE0yf/kE/0thOnGG0U5gAAAABJRU5ErkJggg==" alt="bni">
                                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADkAAAAkCAMAAAAEjmLyAAAAOVBMVEX///8oUo0JO5D5/P5NdZcKPXe6xdzs8fapuNDT3ut0krLF1eTa6/WPp8pTir/8+Pdtfbvr7OtSVouSiGo6AAABY0lEQVRIx+1SzXKDIQiUPwV/vqR9/4ftYpKDuXWmhx6yM46A7IJo+eCDf4AWNTHltzyvYw6PSPKOiEgTyLyc5wbjRG1YZhQpspPuCtzrQ7b3vlqZOzYOomSGMtn1VCnLGDDzIk6W+J5qjH0dzDmKNDWyDlZAZhgRmMT61WFuq8KAeTIxmDspMVaX6VIcqZcrc1+WYZw1583sJ7NBELRseDQwG5F5wIXBGgI5zIE1teRkDsjtqjSTCaHdYyxEnoMFyy/m6/ZWEzSURFu75mJQ0XHNIs8caNw6s541pxtTktnGxIQU1/xanO2R7iKNdoK9MeeQ6q6q7rUEBo1efXSwFPk9JNyzCcgn83xPmdJa/pt8z0GPa9pypj3ypfBUET6ZxSP66nUsH+GlXEYMmDbRPSv1/djwMO63f+v5Y6Oi6Vak64YLTnqKrIyAsvZ2QGRGjBHRBM5NNh4nLcZ8uXv74IM/wQ8VewssFjQXfwAAAABJRU5ErkJggg==" alt="bca">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 m-t-20">
                                                        <div class="card-body text-center">
                                                            <img src="https://www.static-src.com/siva/asset//12_2020/linkaja-footer.png" alt="LinkAja" />
                                                            <img src="https://www.static-src.com/siva/asset//12_2020/ovo-footer.png" alt="OVO" />
                                                            <img src="https://www.static-src.com/siva/asset//12_2020/gopay-footer.png" alt="VeritransGoPay" />
                                                            <img src="https://www.static-src.com/siva/asset//12_2020/dana-footer.png" alt="DANA" />
                                                        </div>
                                                    </div>
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