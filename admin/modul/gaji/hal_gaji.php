<?php
$tgl = date('Y-m-d');
$bulan = date('m');
?>
<?php
$idk = $_POST['id'];
$id = $_POST['kode_karyawan'];
$query = mysqli_query($koneksi, "SELECT * FROM tb_karyawan WHERE kode_karyawan='$id'");
$r = mysqli_fetch_array($query);
$cek = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_karyawan WHERE kode_karyawan='$_POST[kode_karyawan]'"));
if ($cek == 0) {
    echo "<script>window.alert('Nomor Identitas Tidak Ada !')
    window.location='?page=gaji&act=add'</script>";
} else {
?>

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Form Input Gaji Karyawan</h4>
            <div class="row purchace-popup">
                <div class="col-8">
                    <span class="d-flex alifn-items-center">
                        <table class="table">
                            <tr>
                                <th>Nama Lengkap</th>
                                <th>:</th>
                                <th><?= $r['nama_karyawan'] ?></th>
                            </tr>
                            <tr>
                                <th>Kode Karyawan</th>
                                <th>:</th>
                                <th><?= $r['kode_karyawan'] ?></th>
                            </tr>
                            <tr>
                                <th>Status Karyawan</th>
                                <th>:</th>
                                <th>
                                    <?php if ($r['status_karyawan'] == "tetap") {
                                        echo "Karyawan Tetap";
                                    } else {
                                        echo "Karyawan Kontrak";
                                    }
                                    ?>
                                </th>
                            </tr>
                            <?php $bagian = mysqli_query($koneksi, "SELECT * FROM tb_karyawan
                          INNER JOIN tb_bagian ON tb_karyawan.id_bagian=tb_bagian.id_bagian WHERE kode_karyawan='$id'");
                            $b = mysqli_fetch_array($bagian); ?>
                            <tr>
                                <th>Bagian</th>
                                <th>:</th>
                                <th><?= $b['nama_bagian'] ?></th>
                            </tr>
                            <tr>
                                <th>Tanggal</th>
                                <th>:</th>
                                <th><?= $tgl ?></th>
                            </tr>
                        </table>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <form action="" enctype="multipart/form-data" method="POST">
        <input type="hidden" name="id_karyawan" value="<?= $r['id_karyawan'] ?>">
        <?php
        $tunjangan = mysqli_query($koneksi, "SELECT * FROM tb_tunjangan WHERE id_karyawan='$r[id_karyawan]'");
        $t = mysqli_fetch_array($tunjangan);
        ?>

        <?php
        $tunjangan = mysqli_query($koneksi, "SELECT SUM(jumlah_tunjangan) as tunjangan FROM tb_tunjangan INNER JOIN tb_tunjangankaryawan ON tb_tunjangan.id_tunjangan = tb_tunjangankaryawan.id_tunjangan WHERE id_karyawan='$r[id_karyawan]' ");
        $row_tunjangan = mysqli_fetch_array($tunjangan);
        $total = $row_tunjangan['tunjangan'];
        ?>

        <div class=" container mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="col" role="main">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_content">

                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label>Total Tunjangan</label>
                                                    <input type="number" class="form-control" name="tunjangan" value="<?= $row_tunjangan['tunjangan']; ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label>Gaji Pokok</label>
                                                    <?php
                                                    if ($r['status_karyawan'] == "harian") {
                                                    ?>
                                                        <input type="number" class="form-control" name="gapok" value="<?= $b['gapok'] = 0; ?>" readonly>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <input type="number" class="form-control" name="gapok" value="<?= $b['gapok']; ?>" readonly>
                                                    <?php } ?>
                                                </div>
                                                <?php
                                                $data = mysqli_query($koneksi, "SELECT * FROM tb_absenkaryawan WHERE id_karyawan='$r[id_karyawan]' OR status_absensi=='tidak hadir' AND tgl_absensi='$bln'");
                                                $total_absen = mysqli_num_rows($data);

                                                $tidakhadir = 30 - $total_absen;
                                                $potongan = $tidakhadir * 50000;
                                                ?>
                                                <div class="form-group">
                                                    <label>Potongan</label>
                                                    <input type="number" class="form-control" name="potongan" value="<?= $potongan ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label>Bonus</label>
                                                    <input type="number" class="form-control" name="bonus">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <input type="submit" name="saveGaji" class="btn btn-primary btn-lg" />
                </div>
            </div>
        </div>
    </form>
<?php } ?>


<?php
// cek nis
if (isset($_POST['saveGaji'])) {
    $tgl_gaji = $tgl;
    $id = $_POST['id_karyawan'];
    $potongan = $_POST['potongan'];
    $gapok = $_POST['gapok'];
    $tunjangan = $_POST['tunjangan'];
    $bonus = $_POST['bonus'];

    //query INSERT disini
    $save = mysqli_query($koneksi, "INSERT INTO tb_gaji VALUES(NULL,'$tgl_gaji','$id','$potongan','$gapok','$tunjangan','$bonus')");

    if ($save) {
        echo " <script>
      alert('Data Berhasil disimpan !');
      window.location='?page=gaji';
      </script>";
    }
}

?>