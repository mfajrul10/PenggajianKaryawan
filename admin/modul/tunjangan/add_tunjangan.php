<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="text-center h3 m-0 font-weight-bold text-primary">Form Tambah Data Tunjangan</div>
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nama Tunjangan </label>
                    <input type="text" class="form-control" placeholder="Masukkan Nama Bagian" name="nama_tunjangan" required="required">
                </div>
                <div class="form-group">
                    <label>Jumlah Tunjangan</label>
                    <input type="number" class="form-control" placeholder="Masukkan Jumlah Gaji" name="jumlah_tunjangan" required="required">
                </div>

                <button name="saveBagian" type="submit" class="btn btn-success mr-2">Simpan</button>
            </form>
        </div>
    </div>
</div>

<?php
// cek nis
if (isset($_POST['saveBagian'])) {
    $nama               = $_POST['nama_tunjangan'];
    $jumlah_tunjangan   = $_POST['jumlah_tunjangan'];

    //query INSERT disini
    $save = mysqli_query($koneksi, "INSERT INTO tb_tunjangan VALUES(NULL,'$nama','$jumlah_tunjangan')");

    if ($save) {
        echo " <script>
      alert('Data Berhasil disimpan !');
      window.location='?page=tunjangan';
      </script>";
    }
}

?>