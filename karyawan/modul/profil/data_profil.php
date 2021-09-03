<?php
if (@$_SESSION['Karyawan']) {
?>
    <?php
    if (@$_SESSION['Karyawan']) {
        $sesi = @$_SESSION['Karyawan'];
    }
    $sql = mysqli_query($koneksi, "SELECT * FROM tb_karyawan WHERE id_karyawan = '$sesi'") or die(mysqli_error($koneksi));
    $data = mysqli_fetch_array($sql);
    ?>

    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="text-center h3 m-0 font-weight-bold text-primary">Profil Karyawan</div>
            </div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="hidden" name="id_karyawan" value="<?= $data['id_karyawan']; ?>">
                        <input type="text" class="form-control" name="nama_karyawan" value="<?= $data['nama_karyawan']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" value="<?= $data['username']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" value="<?= $data['password']; ?>">
                    </div>
                    <button name="updateProfil" type="submit" class="btn btn-success mr-2">Simpan</button>
                </form>
            </div>
        </div>
    </div>

<?php
}
?>

<?php
// cek nis
if (isset($_POST['updateProfil'])) {
    $id         = $_POST['id_karyawan'];
    $nama       = $_POST['nama_karyawan'];
    $username   = $_POST['username'];
    $password   = $_POST['password'];

    //query INSERT disini
    $save = mysqli_query($koneksi, "UPDATE tb_karyawan SET nama_karyawan='$nama',username='$username', password='$password' WHERE id_karyawan='$id'");

    if ($save) {
        echo " <script>
      alert('Data Berhasil Diubah !');
      window.location='?page=profil';
      </script>";
    }
}

?>