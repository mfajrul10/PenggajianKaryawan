<?php
$id = $_GET['id_bagian'];
$data = mysqli_query($koneksi, "SELECT * from tb_bagian where id_bagian='$id'");
while ($d = mysqli_fetch_array($data)) {
?>

    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="text-center h3 m-0 font-weight-bold text-primary">Edit Data Bagian</div>
            </div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama Bagian</label>
                        <input type="hidden" name="id_bagian" value="<?php echo $d['id_bagian']; ?>">
                        <input type="text" class="form-control" name="nama_bagian" value="<?php echo $d['nama_bagian']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Gaji Pokok</label>
                        <input type="text" class="form-control" name="gapok" value="<?php echo $d['gapok']; ?>">
                    </div>
                    <button name="updateBagian" type="submit" class="btn btn-success mr-2">Simpan</button>
                </form>
            </div>
        </div>
    </div>

<?php
}
?>

<?php
// cek nis
if (isset($_POST['updateBagian'])) {
    $id = $_POST['id_bagian'];
    $nama = $_POST['nama_bagian'];
    $gapok = $_POST['gapok'];

    //query INSERT disini
    $save = mysqli_query($koneksi, "UPDATE tb_bagian SET nama_bagian='$nama',gapok='$gapok' WHERE id_bagian='$id'");

    if ($save) {
        echo " <script>
      alert('Data Berhasil Diubah !');
      window.location='?page=bagian';
      </script>";
    }
}

?>