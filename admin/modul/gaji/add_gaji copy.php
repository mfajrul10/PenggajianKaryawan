<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-2">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Gaji</h6>
        </div>
        <div class="card-body">
            <div class="container">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" class="form-control" name="tanggal_gaji">
                    </div>
                    <div class="form-group">
                        <label>Pilih Kode Karyawan</label>
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
                        <label>Bagian</label>
                        <input type="text" class="form-control" name="nama_bagian" id="nama_bagian" readonly>
                    </div>
                    <div class="form-group">
                        <label>Gaji Pokok</label>
                        <input type="text" class="form-control" name="gapok" id="gapok" readonly>
                    </div>
                    <div class="form-group">
                        <label>Bonus</label>
                        <input type="text" class="form-control" name="bonus" placeholder="Masukkan Jumlah Bonus">
                    </div>
                    <button name="saveGaji" type="submit" class="btn btn-success mr-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>



<?php
// cek nis
if (isset($_POST['saveGaji'])) {
    $tanggal_gaji = $_POST['tanggal_gaji'];
    $id = $_POST['id_karyawan'];
    $gapok = $_POST['gapok'];
    $bonus = $_POST['bonus'];
    $total = $gapok + $bonus;
    //query INSERT disini
    $save = mysqli_query($koneksi, "INSERT INTO tb_gaji VALUES(NULL,'$tanggal_gaji','$id','$gapok','$bonus','$total')");

    if ($save) {
        echo " <script>
      alert('Data Berhasil disimpan !');
      window.location='?page=gaji';
      </script>";
    }
}

?>