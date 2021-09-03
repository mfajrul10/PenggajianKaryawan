<?php
$oke = mysqli_query($koneksi, "SELECT * FROM tb_sekolah where id_sekolah='1'");
$oke1 = mysqli_fetch_array($oke);

if (@$_SESSION['Admin']) {
?>
    <?php
    if (@$_SESSION['Admin']) {
        $sesi = @$_SESSION['Admin'];
    }
    $sql = mysqli_query($koneksi, "SELECT * FROM tb_admin WHERE id_admin = '$sesi'") or die(mysqli_error($koneksi));
    $data = mysqli_fetch_array($sql);
    ?>

    <div class="card mt-3">
        <div class="card-body text-center">
            <h2>Selamat Datang <strong><?= $data['nama_admin'] ?></strong></h2>
            <h2>Pada Halaman Administrator <strong><?= $oke1['nama_sekolah'] ?></strong> </h2>
        </div>
    </div>

<?php
}
?>