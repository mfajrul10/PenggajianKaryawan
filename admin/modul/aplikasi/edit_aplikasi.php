<?php
$id = $_GET['id_aplikasi'];
$data = mysqli_query($koneksi, "SELECT * FROM tb_aplikasi WHERE id_aplikasi='$id'");
while ($d = mysqli_fetch_array($data)) {
?>

    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Data aplikasi</h6>
            </div>
            <div class="card-header py-2">
                <div class="card-body">

                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Nama Instansi</label>
                            <input type="hidden" class="form-control" name="id_aplikasi" value="<?= $d['id_aplikasi']; ?>">
                            <input type="text" class="form-control" name="nama_aplikasi" value="<?= $d['nama_instansi']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Nama Aplikasi</label>
                            <input type="text" class="form-control" name="nama_aplikasi" value="<?= $d['nama_aplikasi']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Foto</label>
                            <input name="foto" type="file" class="form-control" value="<?= $d['foto']; ?>">
                        </div>

                        <button name="updateAplikasi" type="submit" class="btn btn-success mr-2">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <?php

    if (isset($_POST['updateAplikasi'])) {
        $gambar = @$_FILES['foto']['name'];
        if (!empty($gambar)) {
            move_uploaded_file($_FILES['foto']['tmp_name'], "../assets/img/app/$gambar");
            $ganti = mysqli_query($koneksi, "UPDATE tb_aplikasi SET foto='$gambar' 
	    	WHERE id_aplikasi='$_POST[id_aplikasi]' ");
        }
        $updateaplikasi = mysqli_query($koneksi, "UPDATE tb_aplikasi SET 
			nama_instansi='$_POST[nama_instansi]',nama_aplikasi='$_POST[nama_aplikasi]' WHERE id_aplikasi='$_POST[id_aplikasi]' ");

        if ($updateaplikasi) {
            echo " <script>
	  alert('Data Berhasil diperbarui !');
	  window.location='?page=aplikasi';
	  </script>";
        }
    }

    ?>

<?php
}
?>

</body>

</html>