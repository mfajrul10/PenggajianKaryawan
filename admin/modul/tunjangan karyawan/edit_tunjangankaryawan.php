<?php
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * from tb_tunjangankaryawan where id_tunjangankaryawan='$id'");
while ($d = mysqli_fetch_array($data)) {
?>

    <?php
    $karyawan = mysqli_query($koneksi, "SELECT * FROM tb_karyawan 
    INNER JOIN tb_tunjangankaryawan ON tb_karyawan.id_karyawan = tb_tunjangankaryawan.id_karyawan 
    WHERE id_tunjangankaryawan='$id'");
    foreach ($karyawan as $r)
    ?>
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="text-center h3 m-0 font-weight-bold text-primary">Form Edit Tunjangan Karyawan</div>
            </div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama Bagian</label>
                        <input type="hidden" name="id_tunjangankaryawan" value="<?php echo $d['id_tunjangankaryawan']; ?>">
                        <input type="text" class="form-control" name="nama_tunjangan" value="<?php echo $r['nama_karyawan']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Tunjangan</label>
                        <select class="form-control" id="nama_tunjangan" name="nama_tunjangan">
                            <option>-- Pilih --</option>
                            <?php
                            $sqlTunjangan = mysqli_query($koneksi, "SELECT * FROM tb_tunjangan ORDER BY id_tunjangan DESC");
                            while ($tunjangan = mysqli_fetch_array($sqlTunjangan)) {
                                if ($tunjangan['id_tunjangan'] == $d['id_tunjangan']) {
                                    $selected = "selected";
                                } else {
                                    $selected = "";
                                }
                                echo "<option value='$tunjangan[id_tunjangan]' $selected>$tunjangan[nama_tunjangan]</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <button name="updateTunjanganKaryawan" type="submit" class="btn btn-success mr-2">Simpan</button>
                </form>
            </div>
        </div>
    </div>

<?php
}
?>

<?php
// cek nis
if (isset($_POST['updateTunjanganKaryawan'])) {
    $id = $_POST['id_tunjangankaryawan'];
    $id2 = $_POST['id_tunjangan'];
    $id3 = $_POST['id_karyawan'];

    //query INSERT disini
    $save = mysqli_query($koneksi, "UPDATE tb_tunjangankaryawan SET 
    id_tunjangan='$_POST[nama_tunjangan]' WHERE id_tunjangankaryawan='$_POST[id_tunjangankaryawan]'");

    if ($save) {
        echo " <script>
      alert('Data Berhasil Diubah !');
      window.location='?page=tunjangankaryawan';
      </script>";
    }
}

?>