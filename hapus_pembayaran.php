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

// Periksa apakah parameter "id_pembayaran" ada dalam URL
if (isset($_GET['id_pembayaran'])) {
    $id_pembayaran = $_GET['id_pembayaran'];

    // Hapus data pembayaran dari database
    $delete_query = "DELETE FROM pembayaran WHERE id_pembayaran = '$id_pembayaran'";
    $delete_result = mysqli_query($koneksi, $delete_query);

    if ($delete_result) {
         // Set session untuk alert berhasil
         $_SESSION['success_message'] = "Data pembayaran berhasil dihapus.";

        // Redirect ke halaman admin pembayaran setelah berhasil menghapus data
        header("Location: admin_pembayaran.php");
        exit();
    } else {
        echo "Gagal menghapus data pembayaran.";
    }
} else {
    echo "ID pembayaran tidak ditemukan.";
    exit();
}
