<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="text-center h3 m-0 font-weight-bold text-primary">Form Tambah Data Tunjangan</div>
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Karyawan</label>
                    <select class="form-control" name="id_karyawan">
                        <?php $c = mysqli_query($koneksi, "SELECT * FROM tb_karyawan");
                        while ($dc = mysqli_fetch_array($c)) { ?>
                            <option value="<?= $dc['id_karyawan'] ?>"><?= $dc['kode_karyawan'] ?>-<?= $dc['nama_karyawan'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Tunjangan</label>
                    <select class="form-control" name="id_tunjangan">
                        <?php $c = mysqli_query($koneksi, "SELECT * FROM tb_tunjangan");
                        while ($dc = mysqli_fetch_array($c)) { ?>
                            <option value="<?= $dc['id_tunjangan'] ?>"><?= $dc['nama_tunjangan'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <button name="saveTunjanganKaryawan" type="submit" class="btn btn-success mr-2">Simpan</button>
            </form>
        </div>
    </div>
</div>

<?php
// cek nis
if (isset($_POST['saveTunjanganKaryawan'])) {
    $id1    = $_POST['id_tunjangan'];
    $id2    = $_POST['id_karyawan'];

    //query INSERT disini
    $save = mysqli_query($koneksi, "INSERT INTO tb_tunjangankaryawan VALUES(NULL,'$id1','$id2')");

    if ($save) {
        echo " <script>
      alert('Data Berhasil disimpan !');
      window.location='?page=tunjangankaryawan';
      </script>";
    }
}

?>