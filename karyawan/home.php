<?php

if (@$_SESSION['nama_karyawan']) {
?>
    <?php
    if (@$_SESSION['nama_karyawan']) {
        $sesi = @$_SESSION['nama_karyawan'];
    }
    $sql = mysqli_query($koneksi, "SELECT * FROM tb_karyawan WHERE id_karyawan = '$sesi'") or die(mysqli_error($koneksi));
    $data = mysqli_fetch_array($sql);
    ?>

    <div class="card mt-3">
        <div class="card-body text-center">
            <h2>Selamat Datang <strong><?= $data['nama_karyawan'] ?></strong></h2>
        </div>
    </div>
<?php
}
?>