<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-2">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Pinjaman</h6>
        </div>
        <div class="card-body">
            <div class="container">
                <h2 style="text-align: center;">Tambah Data Pinjaman</h2>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" class="form-control" name="tgl_pinjaman">
                    </div>
                    <div class="form-group">
                        <label>Pilih Karyawan</label>
                        <select class="form-control" name="id_karyawan" onchange="cek_database()" id="kode_karyawan">
                            <option value='' selected>- Pilih -</option>
                            <?php
                            $pegawai = mysqli_query($koneksi, "SELECT * FROM tb_bagian INNER JOIN tb_karyawan ON tb_bagian.id_bagian = tb_karyawan.id_bagian");
                            while ($row = mysqli_fetch_array($pegawai)) {
                                echo "<option value='$row[kode_karyawan]'>$row[kode_karyawan]-$row[nama_karyawan]</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Karyawan</label>
                        <input type="text" class="form-control" id="nama_karyawan" readonly>
                        <input type="hidden" class="form-control" name="id_karyawan" id="id_karyawan">
                    </div>
                    <div class="form-group">
                        <label>Jumlah Pinjaman</label>
                        <input type="number" class="form-control" name="jumlah_pinjaman" placeholder="Masukkan Jumlah pinjaman">
                    </div>
                    <button name="savePinjaman" type="submit" class="btn btn-success mr-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
// cek nis
if (isset($_POST['savePinjaman'])) {
    $tanggal_pinjaman = $_POST['tanggal_pinjaman'];
    $id = $_POST['id_karyawan'];
    $tanggal_pinjaman = $_POST['tgl_pinjaman'];
    $jumlah_pinjaman = $_POST['jumlah_pinjaman'];
    //query INSERT disini
    $save = mysqli_query($koneksi, "INSERT INTO tb_pinjaman VALUES(NULL,'$id','$tanggal_pinjaman','$jumlah_pinjaman')");

    if ($save) {
        echo " <script>
      alert('Data Berhasil disimpan !');
      window.location='?page=pinjaman';
      </script>";
    }
}

?>