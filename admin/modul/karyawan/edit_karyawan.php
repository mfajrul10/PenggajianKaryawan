<?php
$id = $_GET['id_karyawan'];
$data = mysqli_query($koneksi, "SELECT * FROM tb_karyawan WHERE id_karyawan='$id'");
while ($d = mysqli_fetch_array($data)) {
?>

    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Data Karyawan</h6>
            </div>
            <div class="card-header py-2">
                <div class="card-body">

                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Nama Karyawan :</label>
                            <input type="hidden" class="form-control" name="id_karyawan" value="<?php echo $d['id_karyawan']; ?>">
                            <input type="text" class="form-control" name="nama_karyawan" value="<?php echo $d['nama_karyawan']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="nama_bagian">Bagian </label>
                            <select class="form-control" id="nama_bagian" name="nama_bagian">
                                <option>-- Pilih --</option>
                                <?php
                                $sqlbagian = mysqli_query($koneksi, "SELECT * FROM tb_bagian ORDER BY id_bagian DESC");
                                while ($bagian = mysqli_fetch_array($sqlbagian)) {
                                    if ($bagian['id_bagian'] == $d['id_bagian']) {
                                        $selected = "selected";
                                    } else {
                                        $selected = "";
                                    }
                                    echo "<option value='$bagian[id_bagian]' $selected>$bagian[nama_bagian]</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Foto</label>
                            <input name="foto" type="file" class="form-control" value="<?php echo $d['foto']; ?>">
                        </div>

                        <button name="updateKaryawan" type="submit" class="btn btn-success mr-2">Simpan</button>
                        <button class="btn btn-success mr-2" a href="index.php">Kembali</button></a>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <?php

    if (isset($_POST['updateKaryawan'])) {
        $gambar = @$_FILES['foto']['name'];
        if (!empty($gambar)) {
            move_uploaded_file($_FILES['foto']['tmp_name'], "karyawan/images/$gambar");
            $ganti = mysqli_query($koneksi, "UPDATE tb_karyawan SET foto='$gambar' 
	    	WHERE id_karyawan='$_POST[id_karyawan]' ");
        }
        $updatekaryawan = mysqli_query($koneksi, "UPDATE tb_karyawan SET 
			nama_karyawan='$_POST[nama_karyawan]', id_bagian='$_POST[nama_bagian]'
			WHERE id_karyawan='$_POST[id_karyawan]' ");

        if ($updatekaryawan) {
            echo " <script>
	  alert('Data Berhasil diperbarui !');
	  window.location='?page=karyawan';
	  </script>";
        }
    }

    ?>

<?php
}
?>

</body>

</html>