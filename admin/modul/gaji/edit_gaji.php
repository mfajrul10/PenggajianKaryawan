<?php
$id = $_GET['id_gaji'];
$data = mysqli_query($koneksi, "SELECT * from tb_gaji where id_gaji='$id'");
while ($d = mysqli_fetch_array($data)) {

    $karyawan = mysqli_query($koneksi, "SELECT * FROM tb_karyawan INNER JOIN tb_gaji ON tb_karyawan.id_karyawan = tb_gaji.id_karyawan WHERE id_gaji='$id'");
    foreach ($karyawan as $r)
?>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Form Edit Gaji Karyawan</h4>
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
                          INNER JOIN tb_bagian ON tb_karyawan.id_bagian=tb_bagian.id_bagian WHERE id_karyawan='$r[id_karyawan]'");
                            $b = mysqli_fetch_array($bagian); ?>
                            <tr>
                                <th>Bagian</th>
                                <th>:</th>
                                <th><?= $b['nama_bagian'] ?></th>
                            </tr>
                            <tr>
                                <th>Tanggal</th>
                                <th>:</th>
                                <th><?= strftime('%A, %d %B %Y', strtotime(($d['tgl_gaji']))); ?></th>
                            </tr>
                        </table>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <form action="" enctype="multipart/form-data" method="POST">
        <input type="hidden" name="id_karyawan" value="<?= $r['id_karyawan'] ?>">
        <input type="hidden" name="id_gaji" value="<?= $d['id_gaji']; ?>">
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
                                                    <input type="number" class="form-control" name="tunjangan" value="<?= $d['tunjangan']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Gaji Pokok</label>
                                                    <input type="number" class="form-control" name="gapok" value="<?= $d['gapok']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Potongan</label>
                                                    <input type="number" class="form-control" name="potongan" value="<?= $d['potongan']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Bonus</label>
                                                    <input type="number" class="form-control" name="bonus" value="<?= $d['bonus']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <button name="updateGaji" type="submit" class="btn btn-success mr-2">Submit</button>
                </div>
            </div>
        </div>
    </form>
<?php } ?>


<?php
if (isset($_POST['updateGaji'])) {
    $id         = $_POST['id_gaji'];
    $potongan   = $_POST['potongan'];
    $gapok      = $_POST['gapok'];
    $tunjangan  = $_POST['tunjangan'];
    $bonus      = $_POST['bonus'];

    //query INSERT disini
    $save = mysqli_query($koneksi, "UPDATE tb_gaji SET 
    potongan='$_POST[potongan]',gapok='$_POST[gapok]',tunjangan='$_POST[tunjangan]',bonus='$_POST[bonus]' WHERE id_gaji='$_POST[id_gaji]'");

    if ($save) {
        echo " <script>
      alert('Data Berhasil Diubah !');
      window.location='?page=gaji';
      </script>";
    }
}

?>