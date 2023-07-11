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

// Fungsi untuk melakukan login
function login($username, $password)
{
    global $koneksi;

    // Melakukan sanitasi pada data masukan
    $username = mysqli_real_escape_string($koneksi, $username);
    $password = mysqli_real_escape_string($koneksi, $password);

    // Query untuk memeriksa username dan password dalam tabel pengguna
    $query = "SELECT * FROM pengguna WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($koneksi, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Menyimpan informasi pengguna ke dalam session
        $_SESSION['pengguna_id'] = $row['id'];
        $_SESSION['pengguna_nama'] = $row['nama'];
        $_SESSION['pengguna_role'] = $row['role'];

        // Redirect ke halaman yang sesuai berdasarkan peran pengguna
        if ($row['role'] == 'Admin') {
            header("Location: admin_beranda.php");
            exit();
        } elseif ($row['role'] == 'Karyawan') {
            header("Location: beranda.php");
            exit();
        }
    } else { 
        $msg = 'Username atau Password salah';
        header('location:login.php?msg='.$msg);
    }
}

// Proses login saat tombol "Login" diklik
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password)) {
        login($username, $password);
    } else {
        echo "Harap lengkapi semua field.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="assets/login/images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/css/util.css">
    <link rel="stylesheet" type="text/css" href="assets/login/css/main.css">
    <!--===============================================================================================-->
</head>

<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-form-title" style="background-image: url(assets/login/images/bg-02.jpg);">
                    <span class="login100-form-title-1">
                        LAUNDRY-IN
                    </span>
                </div>
                <form class="login100-form validate-form" method="POST" action="">
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                        <span class="label-input100">Username</span>
                        <input class="input100" type="text" name="username" id="username" placeholder="Enter username" autocomplete="off" required>
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-18" data-validate="Password is required">
                        <span class="label-input100">Password</span>
                        <input class="input100" type="password" name="password" id="password" placeholder="Enter password" autocomplete="off" required>
                        <span class="focus-input100"></span>
                    </div>
                    <?php if (isset($_GET['msg'])): ?>
						<medium class="text-danger"><?= $_GET['msg'];  ?></medium>
					<?php endif ?>
                    <div class="container-login100-form-btn px-lg-5 m-t-20">
                        <input class="login100-form-btn" type="submit" name="login" value="Login">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>