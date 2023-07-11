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

// Periksa apakah parameter "id_pelanggan" ada dalam URL
if (isset($_GET['id_pelanggan'])) {
    $id_pelanggan = $_GET['id_pelanggan'];

    // Hapus data pelanggan dari database
    $delete_query = "DELETE FROM pelanggan WHERE id_pelanggan = '$id_pelanggan'";
    $delete_result = mysqli_query($koneksi, $delete_query);

    if ($delete_result) {
         // Set session untuk alert berhasil
         $_SESSION['success_message'] = "Data pelanggan berhasil dihapus.";

        // Redirect ke halaman admin pelanggan setelah berhasil menghapus data
        header("Location: admin_pelanggan.php");
        exit();
    } else {
        echo "Gagal menghapus data pelanggan.";
    }
} else {
    echo "ID pelanggan tidak ditemukan.";
    exit();
}
