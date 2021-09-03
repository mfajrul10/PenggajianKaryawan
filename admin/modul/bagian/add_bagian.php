<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="text-center h3 m-0 font-weight-bold text-primary">Tambah Data Bagian</div>
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nama Bagian </label>
                    <input type="text" class="form-control" placeholder="Masukkan Nama Bagian" name="nama_bagian" required="required">
                </div>
                <div class="form-group">
                    <label>Gaji Pokok</label>
                    <input type="number" class="form-control" placeholder="Masukkan Jumlah Gaji" name="gapok" required="required">
                </div>

                <button name="saveBagian" type="submit" class="btn btn-success mr-2">Simpan</button>
            </form>
        </div>
    </div>
</div>

<?php
// cek nis
if (isset($_POST['saveBagian'])) {
    $id = $_POST['id_bagian'];
    $nama = $_POST['nama_bagian'];
    $gapok = $_POST['gapok'];

    //query INSERT disini
    $save = mysqli_query($koneksi, "INSERT INTO tb_bagian VALUES(NULL,'$nama','$gapok')");

    if ($save) {
        echo " <script>
      alert('Data Berhasil disimpan !');
      window.location='?page=bagian';
      </script>";
    }
}

?>