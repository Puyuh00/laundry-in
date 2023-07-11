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

// Periksa apakah parameter "id_karyawan" ada dalam URL
if (isset($_GET['id_karyawan'])) {
    $id_karyawan = $_GET['id_karyawan'];
    
    // Hapus data karyawan dari database
    $delete_query = "DELETE FROM karyawan WHERE id_karyawan = '$id_karyawan'";
    $delete_result = mysqli_query($koneksi, $delete_query);

    if ($delete_result) {
         // Set session untuk alert berhasil
         $_SESSION['success_message'] = "Data karyawan berhasil dihapus.";

        // Redirect ke halaman karyawan setelah berhasil menghapus data
        header("Location: karyawan.php");
        exit();
    } else {
        echo "Gagal menghapus data karyawan.";
    }
} else {
    echo "ID karyawan tidak ditemukan.";
    exit();
}
