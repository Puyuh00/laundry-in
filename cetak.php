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

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Laporan Laundry</title>
    <style type="text/css">
        #judul {
            width: 100%;
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
    <link href="../css/style.default.css" rel="stylesheet" type="text/css" />


    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <script type="text/javascript" src="../assets/js/jquery.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.js"></script>
    <script>
        // Fungsi untuk menampilkan popup alert
        function showPopupAlert(message) {
            alert(message);
        }
    </script>
</head>
<div id='contentwrapper' class='contentwrapper'>
    <div id="judul">
        <br />
        <br />
        <font size="+2">LAPORAN PESANAN LAUNDRY </font><br />
        JL. Sultan Agung No. 50, Gunung Ketur, Pakualaman, Yogyakarta<br />
        Hp. 0812345678 Email : <a href="" class="email" data-cfemail="b3d2ddd6d8d2ecc4d6d1f3cad2dbdcdc9dd0dc9ddad7">laundryin@gmail.com</a> Website : www.laundryin.com

        <hr color="#eee" />
    </div>
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
    <?php
    if (isset($_GET['dari']) && isset($_GET['sampai'])) {
        $dari       = $_GET['dari'];
        $sampai     = $_GET['sampai'];
    ?>
        <table class='table table-bordered table-striped' id='dyntable2'>
            <colgroup>
                <col class='con0' style='width: 4%' />
                <col class='con1' />
                <col class='con0' />
                <col class='con1' />
                <col class='con0' />
            </colgroup>
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Tanggal Masuk</th>
                    <th class="text-center">Tanggal Keluar</th>
                    <th class="text-center">Nama Pelanggan</th>
                    <th class="text-center">Layanan</th>
                    <th class="text-center">Biaya Layanan (Rp)/Kg</th>
                    <th class="text-center">Berat (Kg)</th>
                    <th class="text-center">Total Biaya (Rp)</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query      = "select * from pesanan INNER JOIN pelanggan ON pesanan.id_pelanggan = pelanggan.id_pelanggan where date(tanggal_masuk) > '$dari' and date(tanggal_masuk) < '$sampai' order by id_pesanan";
                $result     = mysqli_query($koneksi, $query);
                if (!$result) {
                    die('Query error: ' . mysqli_error($koneksi));
                }
                $i = 1;
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        <td><?= $row['id_pesanan'] ?></td>
                        <td><?= $row['tanggal_masuk'] ?></td>
                        <td><?= $row['tanggal_keluar'] ?></td>
                        <td><?= $row['nama_pelanggan'] ?></td>
                        <td><?= $row['layanan'] ?></td>
                        <td><?= $row['biaya_layanan'] ?></td>
                        <td><?= $row['berat'] ?></td>
                        <td><?= $row['total_biaya'] ?></td>
                        <td><?= $row['status'] ?></td>
                    </tr>

                <?php
                }

                ?>

            </tbody>
        </table>
    <?php
    }
    ?>
</div>
</div>
<script type="text/javascript">
    window.print();
</script>
</body>
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>

</html>