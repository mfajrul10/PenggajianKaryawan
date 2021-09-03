<?php
include "config/koneksi.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Halaman Login</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>
<style>
    body {
        background-image: url('assets/assets1/img/bg/herringbone.png');
    }
</style>

<body>

    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">

                                    <div class="text-center">
                                        <h1>Halaman Login</h1>
                                        <br>
                                    </div>
                                    <form method="POST" action="">
                                        <div class="form-group">
                                            <input class="form-control py-4 rounded-pill" type="text" name="username" placeholder="Masukkan Username" />
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control py-4 rounded-pill" type="password" name="password" placeholder="Masukkan Password" />
                                        </div>
                                        <div class="wrap-input100 validate-input " data-validate="Password is required">
                                            <select name="level" class="form-control rounded-pill" required>
                                                <option value="">-- Pilih Level --</option>
                                                <option value="1"> Admin </option>
                                                <option value="2"> Karyawan </option>
                                            </select>
                                        </div>
                                        <hr>
                                        <button type="submit" value="LOGIN" name="Login" class="btn btn-primary btn-lg btn-block rounded-pill">Login</button>
                                        <a href="pelamar/home.php" class="btn btn-success btn-lg btn-block rounded-pill">Rekrutmen</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>


    <?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = trim(mysqli_real_escape_string($koneksi, $_POST['username']));
        $level = $_POST['level'];
        $pass =  $_POST['password'];

        if ($level == '1') {

            $sql = mysqli_query($koneksi, "SELECT * FROM tb_admin WHERE username='$username' AND password='$pass'") or die(mysqli_error($koneksi));
            $data = mysqli_fetch_array($sql);
            $id = $data[0];
            $cek = mysqli_num_rows($sql);

            if ($cek > 0) {
                $_SESSION['Admin'] = $id;
                echo " <script>
window.location='admin/index.php';
</script>";
            } else {
                echo " <script>
alert('Username atau Password Salah !');
window.location='login.php';
</script>";
            }
        } elseif ($level == '2') {

            $sql = mysqli_query($koneksi, "SELECT * FROM tb_karyawan WHERE username='$username' AND password='$pass'") or die(mysqli_error($koneksi));
            $data = mysqli_fetch_array($sql);
            $id = $data[0];
            $cek = mysqli_num_rows($sql);

            if ($cek > 0) {
                $_SESSION['Karyawan'] = $id;
                echo " <script>
window.location='karyawan/index.php';
</script>";
            } else {
                echo " <script>
alert('Username atau Password Salah !');
window.location='login.php';
</script>";
            }
        }
    }


    ?>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

</body>

</html>