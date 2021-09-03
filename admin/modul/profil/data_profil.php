<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="text-center h3 m-0 font-weight-bold text-primary">Profil Administrator</div>
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="hidden" name="id_admin" value="<?= $data['id_admin']; ?>">
                    <input type="text" class="form-control" name="nama_admin" value="<?= $data['nama_admin']; ?>">
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
// cek nis
if (isset($_POST['updateProfil'])) {
    $nama = $_POST['nama_admin'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    //query INSERT disini
    $save = mysqli_query($koneksi, "UPDATE tb_admin SET nama_admin='$nama',username='$username', password='$password' WHERE id_admin='$id'");

    if ($save) {
        echo " <script>
      alert('Data Berhasil Diubah !');
      window.location='?page=profil';
      </script>";
    }
}

?>