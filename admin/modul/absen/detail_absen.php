<?php
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * from tb_absenkaryawan where id_absensikaryawan='$id'");
while ($d = mysqli_fetch_array($data)) {
?>
    <?php
    $karyawan = mysqli_query($koneksi, "SELECT * from tb_absenkaryawan INNER JOIN tb_karyawan ON tb_absenkaryawan.id_karyawan=tb_karyawan.id_karyawan where id_absensikaryawan='$id'");
    foreach ($karyawan as $r)
    ?>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Keterangan Absensi Karyawan</h4>
            <div class="row purchace-popup">
                <div class="col-8">
                    <span class="d-flex alifn-items-center">
                        <table class="table">
                            <tr>
                                <th>Nama Lengkap</th>
                                <th>:</th>
                                <th><?= $r['nama_karyawan'] ?></th>
                            </tr>
                            <tr>
                                <th>Kode Karyawan</th>
                                <th>:</th>
                                <th><?= $r['kode_karyawan'] ?></th>
                            </tr>
                            <?php $bagian = mysqli_query($koneksi, "SELECT * FROM tb_karyawan
                          INNER JOIN tb_bagian ON tb_karyawan.id_bagian=tb_bagian.id_bagian WHERE id_karyawan='$r[id_karyawan]'");
                            $b = mysqli_fetch_array($bagian); ?>
                            <tr>
                                <th>Bagian</th>
                                <th>:</th>
                                <th><?= $b['nama_bagian'] ?></th>
                            </tr>
                            <tr>
                                <th>Tanggal</th>
                                <th>:</th>
                                <th><?= strftime('%A, %d %B %Y', strtotime(($d['tgl_absensi']))); ?></th>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <th>:</th>
                                <th>
                                    <?php
                                    if ($d['status_absensi'] == 'sakit') {
                                        echo "Sakit";
                                    ?>

                                    <?php
                                    } elseif ($d['status_absensi'] == 'izin') {
                                        echo "Izin";
                                    ?>
                                    <?php } ?>
                                </th>
                            </tr>
                            <tr>
                                <th>Keterangan</th>
                                <th>:</th>
                                <th><?= $d['keterangan'] ?></th>
                            </tr>
                            <tr>
                                <th>Bukti</th>
                                <th>:</th>
                                <th>
                                    <img src="../assets/img/bukti/<?= $d['foto'] ?>" class="img-fluid" style="width:300px;height:350px;" alt="">
                                </th>
                            </tr>
                        </table>
                    </span>
                </div>
            </div>
        </div>
    </div>

<?php
}
?>