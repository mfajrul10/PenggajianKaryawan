<?php
// koneksi database
include "../config/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Custom fonts for this template-->
  <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<div class="container mt-5">

  <div class="card-header">
    <div class="card-body">
      <div class="text-center h3 m-0 font-weight-bold text-primary">
        Informasi Rekrutmen
      </div>
      <hr>

      <?php
      $rekrutmen = mysqli_query($koneksi, "SELECT * FROM tb_rekrutmen ORDER BY id_rekrutmen DESC ");
      foreach ($rekrutmen as $d) { ?>
        <?php
        if ($d['aktif'] == 'N') {
          echo '<div class="alert alert-danger">
               <b>Rekrutmen pada CV.Flexco Ltd Telah Ditutup</b>
               </div>';
        } else {
          $rekrutmen = mysqli_query($koneksi, "SELECT *,DATE_ADD(tanggal,INTERVAL waktu DAY) AS jatuh_tempo ,DATEDIFF(DATE_ADD(tanggal,INTERVAL waktu DAY),CURDATE()) AS selisih FROM tb_rekrutmen INNER JOIN tb_bagian ON tb_rekrutmen.id_bagian = tb_bagian.id_bagian WHERE tb_rekrutmen.id_rekrutmen='$d[id_rekrutmen]' ORDER BY tb_rekrutmen.id_rekrutmen DESC ");
          foreach ($rekrutmen as $t)
        ?>

          <div class="col-md col-xs">
            <div class="alert alert-dark alert-dismissible" role="alert">Rekrutmen Karyawan
              <br>
              <br>
              <table class="table table-striped">
                <tr>
                  <th>Tanggal</th>
                  <th>:</th>
                  <th> <?= date('d-F-Y', strtotime($t['tanggal'])) ?></th>
                </tr>
                <tr>
                  <th>Bagian</th>
                  <th>:</th>
                  <th> <?= $t['nama_bagian'] ?></th>
                </tr>
                <tr>
                  <th>Persyaratan</th>
                  <th>:</th>
                  <th> <?= $t['syarat'] ?></th>
                </tr>
                <tr>
                  <th>Batas Akhir Rekrutmen</th>
                  <th>:</th>
                  <th> <?= date('d-F-Y', strtotime($t['jatuh_tempo'])) ?></th>
                </tr>
                <tr>
                  <th>Sisa Waktu</th>
                  <th>:</th>
                  <th><?= $t['selisih'] ?> Hari Lagi </th>
                </tr>
              </table>
              <hr>
              <p>

                <?php
                if ($t['selisih'] < 1) {
                ?>

              <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Waktu Rekrutmen Habis!</strong> Anda tidak dapat melamar pada CV.Flexco Ltd. Silahkan coba lagi pada perekrutan berikutnya.
              </div>

              <?php
                } else {
                  $cekrekrutmen = mysqli_query($koneksi, "SELECT * FROM tb_pelamar WHERE id_rekrutmen='$d[id_rekrutmen]' AND id_karyawan='$_SESSION[karyawan]'");
                  $jml = mysqli_num_rows($cekrekrutmen);
                  if ($jml < 1) {
                    echo "<b class='badge badge-pill badge-primary'>Silahkan Registrasi untuk melamar</b> ";
              ?>
                <p>
                  <a href="register_pelamar.php?id_rekrutmen=<?php echo $d['id_rekrutmen']; ?>" class="btn btn-light"><i class="fa fa-pencil"></i> Register </a>
                  <button class="btn btn-danger mr-2" value="Go Back" onclick="history.back(-1)" />Kembali</button>
                </p>

          <?php
                  } else {
                    echo "<b class='badge badge-pill badge-success'>Anda Sudah Apply Lamaran</b>";
                  }
                }
              }
          ?>
          </p>
            </div>
          </div>

        <?php
      }


        ?>

        <!-- Bootstrap core JavaScript-->
        <script src="../assets/vendor/jquery/jquery.min.js"></script>
        <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="../assets/js/sb-admin-2.min.js"></script>