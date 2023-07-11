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

// Periksa apakah parameter "id_pesanan" ada dalam URL
if (isset($_GET['id_pesanan'])) {
    $id_pesanan = $_GET['id_pesanan'];

    // Hapus data pembayaran dari database
    $delete_query = "DELETE FROM pesanan WHERE id_pesanan = '$id_pesanan'";
    $delete_result = mysqli_query($koneksi, $delete_query);

    if ($delete_result) {
         // Set session untuk alert berhasil
         $_SESSION['success_message'] = "Data pesanan berhasil dihapus.";

        // Redirect ke halaman admin pesanan setelah berhasil menghapus data
        header("Location: admin_pesanan.php");
        exit();
    } else {
        echo "Gagal menghapus data pesanan.";
    }
} else {
    echo "ID pesanan tidak ditemukan.";
    exit();
}
