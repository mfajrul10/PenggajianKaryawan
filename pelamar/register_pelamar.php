<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Form Pelamar</title>

  <!-- Custom fonts for this template-->
  <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>
<style>
  body {
    background-image: url('assets/img/bg/herringbone.png');
  }
</style>
<?php
// https://www.malasngoding.com
// menghubungkan dengan koneksi database
include "../config/koneksi.php";

// mengambil data barang dengan kode paling besar
$query = mysqli_query($koneksi, "SELECT max(kode_pelamar) as kodeTerbesar FROM tb_pelamar");
$data = mysqli_fetch_array($query);
$kodePelamar = $data['kodeTerbesar'];

// mengambil angka dari kode barang terbesar, menggunakan fungsi substr
// dan diubah ke integer dengan (int)
$urutan = (int) substr($kodePelamar, 3, 3);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$urutan++;

// membentuk kode barang baru
// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
$huruf = "FCI";
$kodePelamar = $huruf . sprintf("%03s", $urutan);
?>
<?php
$level = "pelamar";
?>
<?php
include "../config/koneksi.php";
$id = $_GET['id_rekrutmen'];
$data = mysqli_query($koneksi, "SELECT * FROM tb_rekrutmen WHERE id_rekrutmen='$id'");
while ($d = mysqli_fetch_array($data)) {
?>

  <body class="bg-gradient-success">
    <div class="container">
      <div class="row justify-content-center">
        <div class="card-body">
          <div class="card shadow mb-4">
            <div class="card-header py-2">
              <h6 class="m-0 font-weight-bold text-primary">Form Input Data Pelamar</h6>
            </div>
            <div class="card-body">

              <body>
                <div class="container">
                  <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>Kode Pelamar</label>
                      <input type="text" class="form-control" name="kode_pelamar" required="required" value="<?= $kodePelamar ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label>Nama Lengkap</label>
                      <input type="text" class="form-control" placeholder="Masukkan Nama Langkap" name="nama_pelamar" required="required">
                    </div>
                    <div class="form-group">
                      <label>Alamat Lengkap</label>
                      <textarea class="form-control" placeholder="Masukkan Alamat Lengkap" name="alamat" rows="3" required="required"></textarea>
                    </div>
                    <div class="form-group">
                      <label>Tempat Lahir</label>
                      <input type="text" class="form-control" placeholder="Masukkan Tempat Lahir" name="tempat_lahir" required="required">
                    </div>
                    <div class="form-group">
                      <label>Tanggal Lahir</label>
                      <input type="date" class="form-control" placeholder="Masukkan Nama" name="tgl_lahir" required="required">
                    </div>
                    <hr>
                    <div class="form-group">
                      <label>Foto :</label>
                      <input type="file" name="foto" required="required">
                      <p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .gif</p>
                    </div>

                    <input name="id_rekrutmen" type="hidden" value="<?= $d['id_rekrutmen']; ?>">

                    <button class="btn btn-success mr-2" name="savePelamar" type="submit" class="btn btn-success mr-2">Simpan</button>
                    <button class="btn btn-danger mr-2" value="Go Back" onclick="history.back(-1)" />Kembali</button>
                  </form>
                </div>

                </form>
            </div>
          </div>
        </div>




      <?php

      // cek nis
      if (isset($_POST['savePelamar'])) {
        $kode         = $_POST['kode_pelamar'];
        $id           = $_POST['id_rekrutmen'];
        $nama         = $_POST['nama_pelamar'];
        $alamat       = $_POST['alamat'];
        $tgl          = $_POST['tgl_lahir'];
        $tempat       = $_POST['tempat_lahir'];
        $sumber       = @$_FILES['foto']['tmp_name'];
        $target       = '../assets/img/pelamar/';
        $nama_gambar  = @$_FILES['foto']['name'];
        $pindah       = move_uploaded_file($sumber, $target . $nama_gambar);
        $date         = date('Y-m-d');


        //query INSERT disini
        $nama = addslashes($_POST['nama_pelamar']);
        $save = mysqli_query($koneksi, "INSERT INTO tb_pelamar VALUES(NULL,'$id','$kode','$nama','$tgl','$tempat','$alamat','$nama_gambar')");

        if ($save) {
          echo " <script>
            alert('Data Berhasil Disimpan, Silahkan Tunggu Proses Seleksi !');
            window.location='home.php';
            </script>";
        }
      }
    }
      ?>