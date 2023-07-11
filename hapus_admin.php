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

// Periksa apakah parameter "id_admin" ada dalam URL
if (isset($_GET['id_admin'])) {
    $id_admin = $_GET['id_admin'];
    
    // Hapus data admin dari database
    $delete_query = "DELETE FROM admin WHERE id_admin = '$id_admin'";
    $delete_result = mysqli_query($koneksi, $delete_query);

    if ($delete_result) {
         // Set session untuk alert berhasil
         $_SESSION['success_message'] = "Data admin berhasil dihapus.";

        // Redirect ke halaman admin setelah berhasil menghapus data
        header("Location: admin.php");
        exit();
    } else {
        echo "Gagal menghapus data admin.";
    }
} else {
    echo "ID admin tidak ditemukan.";
    exit();
}
