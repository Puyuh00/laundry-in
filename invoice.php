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

// Periksa apakah parameter ID pembayaran ada dalam URL
if (isset($_GET['id_pembayaran'])) {
  $id_pembayaran = $_GET['id_pembayaran'];

  // Menggunakan ID pembayaran sebagai nomor invoice
  $nomor_invoice = $id_pembayaran;

  // Mendapatkan bagian angka dari ID pembayaran 
  $nomor_pesanan = substr($id_pembayaran, 1);

  // Membuat ID pelanggan dan ID pesanan
  $id_pesanan = "P" . $nomor_pesanan;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Invoice</title>
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
    .invoice-header {
      border: 3px solid grey;
      padding: 20px;
    }

    .invoice-title {
      font-size: 24px;
      font-weight: 600;
      margin-bottom: 10px;
    }

    .invoice-details {
      margin-top: 20px;
      margin-bottom: 20px;

    }

    .invoice-details .row {
      margin-bottom: 10px;
      border: 3px solid grey;
    }

    .invoice-details .col {
      padding: 5px;
    }

    .invoice-footer {
      border: 3px solid grey;
      padding: 20px;

    }
  </style>

</head>

<body><br>
  <div class="container">
    <div class="panel">
      <div class="panel-body">
        <div class="">
          <div class="invoice-header bg-info">
            <h2 class="invoice-title text-center"> LAUNDRY-IN</h2>
            <h4 class="text-center">Nomor Invoice: <?php echo $id_pembayaran; ?> </h4>
          </div>
          <div class="invoice-details m-l-10 m-r-10">
            <div class="row">
              <div class="col">
                <table class="table table-striped">
                  <?php
                  // Query SQL untuk mendapatkan data pelanggan berdasarkan ID pelanggan
                  $query_pelanggan = "SELECT * FROM pelanggan WHERE TRIM(id_pelanggan) = CONCAT('C', SUBSTR('$id_pembayaran', 2))";

                  // Eksekusi query pesanan
                  $result_pelanggan = mysqli_query($koneksi, $query_pelanggan);

                  // Periksa apakah data pelanggan ditemukan
                  if (mysqli_num_rows($result_pelanggan) > 0) {
                    // Mendapatkan data pelanggan
                    $row_pelanggan = mysqli_fetch_assoc($result_pelanggan);
                    $id_pelanggan = $row_pelanggan['id_pelanggan'];
                    $nama_pelanggan = $row_pelanggan['nama_pelanggan'];
                    $alamat = $row_pelanggan['alamat'];
                    $no_telepon = $row_pelanggan['no_telepon'];
                  ?>
                    <tr>
                      <th class>ID Pelanggan</th>
                      <th>:</th>
                      <th><?php echo $id_pelanggan; ?> </th>
                    </tr>
                    <tr>
                      <th>Nama Pelanggan</th>
                      <th>:</th>
                      <th><?php echo $nama_pelanggan; ?></th>
                    </tr>
                    <tr>
                      <th>Alamat </th>
                      <th>:</th>
                      <th><?php echo $alamat; ?></th>
                    <tr>
                    </tr>
                    <th>No.Telepon</th>
                    <th>:</th>
                    <th><?php echo $no_telepon; ?></th>
                    </tr>
                  <?php
                  } else {
                    // Jika data pelanggan tidak ditemukan, tampilkan pesan error
                    echo '<td colspan="4">Data pelanggan tidak ditemukan.</td>';
                  }
                  ?>
                  </tr>
                </table>
                <table class="table">
                  <thead>
                    <tr>
                      <th>ID Pesanan</th>
                      <th>Tanggal Masuk</th>
                      <th>Tanggal Keluar</th>
                      <th>Layanan</th>
                      <th>Berat (Kg)</th><br>
                      <th>Total Pembayaran (Rp)</th>

                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <?php
                      // Query SQL untuk mendapatkan data pesanan berdasarkan ID pesanan
                      $query_pesanan = "SELECT * FROM pesanan WHERE id_pesanan = '$id_pesanan'";

                      // Eksekusi query pesanan
                      $result_pesanan = mysqli_query($koneksi, $query_pesanan);

                      // Periksa apakah data pesanan ditemukan
                      if (mysqli_num_rows($result_pesanan) > 0) {
                        // Mendapatkan data pesanan
                        $row_pesanan = mysqli_fetch_assoc($result_pesanan);
                        $layanan = $row_pesanan['layanan'];
                        $berat = $row_pesanan['berat'];
                        $total_biaya = $row_pesanan['total_biaya'];
                        $tanggal_masuk = $row_pesanan['tanggal_masuk'];
                        $tanggal_keluar = $row_pesanan['tanggal_keluar'];
                      ?>
                        <td><?php echo $id_pesanan; ?></td>
                        <td><?php echo $tanggal_masuk; ?></td>
                        <td><?php echo $tanggal_keluar; ?></td>
                        <td><?php echo $layanan; ?></td>
                        <td><?php echo $berat; ?></td>
                        <td><?php echo $total_biaya; ?></td>

                      <?php
                      } else {
                        // Jika data pesanan tidak ditemukan, tampilkan pesan error
                        echo '<td colspan="6">Data pesanan tidak ditemukan.</td>';
                      }
                      ?>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="invoice-footer bg-info">
            <h4 class="text-center"><strong>TERIMA KASIH</strong></h4>
          </div>

        </div>
      </div>
    </div>
  </div>
  <div class="text-center">
    <button class="btn btn-success btn-rounded m-r-10" id="printButton">Cetak</button>
    <a href="beranda.php" class="btn btn-danger btn-rounded">Kembali</a>
  </div>


  <script>
    function printWindow() {
      window.print();
    }
    // Panggil fungsi printWindow() ketika tombol cetak ditekan
    var printButton = document.getElementById('printButton');
    printButton.addEventListener('click', printWindow);
  </script>

</body>

</html>