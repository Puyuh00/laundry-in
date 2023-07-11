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

// Periksa apakah parameter "id_layanan" ada dalam URL
if (isset($_GET['id_layanan'])) {
    $id_layanan = $_GET['id_layanan'];

    // Hapus data layanan dari database
    $delete_query = "DELETE FROM layanan WHERE id_layanan = '$id_layanan'";
    $delete_result = mysqli_query($koneksi, $delete_query);

    if ($delete_result) {
         // Set session untuk alert berhasil
         $_SESSION['success_message'] = "Data layanan berhasil dihapus.";

        // Redirect ke halaman layanan setelah berhasil menghapus data
        header("Location: layanan.php");
        exit();
    } else {
        echo "Gagal menghapus data layanan.";
    }
} else {
    echo "ID layanan tidak ditemukan.";
    exit();
}
