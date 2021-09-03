<div class="container">
    <div class="card shadow mb-4">
        <h5 class="card-header text-center">Data Absensi Karyawan</h5>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Kode Karyawan</th>
                            <th>Nama Karyawan</th>
                            <th>Jam Absen</th>
                            <th>Keterangan</th>
                            <th>Status Validasi</th>
                        </tr>
                    </thead>
            </div>

            <?php
            $no = 1;
            // $data = mysqli_query($koneksi,"SELECT * FROM tb_karyawan");
            $data = mysqli_query($koneksi, "SELECT * FROM tb_absenkaryawan 
                    INNER JOIN tb_karyawan ON tb_absenkaryawan.id_karyawan = tb_karyawan.id_karyawan");
            while ($d = mysqli_fetch_array($data)) {
            ?>
                <tbody>
                    <tr>
                        <td><?= strftime('%A, %d %B %Y', strtotime(($d['tgl_absensi']))); ?></td>
                        <td><?= $d['kode_karyawan']; ?></td>
                        <td><?= $d['nama_karyawan']; ?></td>
                        <td>
                            <?= $d['jam_masuk']; ?>
                            ||
                            <?= $d['jam_keluar']; ?>
                        </td>
                        <td>
                            <?php
                            if ($d['status_absensi'] == 'hadir') {
                            ?>
                                <span class="badge badge-pill badge-success">
                                    Hadir
                                </span>
                            <?php
                            } elseif ($d['status_absensi'] == 'sakit') {
                            ?>
                                <span class="badge badge-pill badge-warning">
                                    Sakit
                                </span>
                                <a href="?page=absen&act=detail&id=<?= $d['id_absensikaryawan']; ?>" class="btn btn-success text-white text-right"> <i class="fas fa-file"></i></a>
                            <?php
                            } elseif ($d['status_absensi'] == 'izin') {
                            ?>
                                <span class="badge badge-pill badge-warning">
                                    Izin
                                </span>
                                <a href="?page=absen&act=detail&id=<?= $d['id_absensikaryawan']; ?>" class="btn btn-success text-white text-right"> <i class="fas fa-file"></i></a>
                            <?php
                            } else {
                            ?>
                                <span class="badge badge-pill badge-danger">
                                    Tidak Hadir
                                </span>
                            <?php
                            }
                            ?>

                            <?php
                            if ($d['valid_absensi'] == 'Y') {
                            ?>
                                <span class="badge badge-pill badge-primary">
                                    Divalidasi
                                </span>
                            <?php
                            } else {
                            ?>
                                <span class="badge badge-pill badge-danger">
                                    Belum Divalidasi
                                </span>
                            <?php
                            }
                            ?>
                        </td>
                        <td>
                            <a href="?page=absen&act=confirm&id=<?= $d['id_absensikaryawan']; ?>" class="btn btn-success text-white text-right"> <i class="fas fa-check-double"></i></a>
                            <a href="?page=absen&act=unconfirm&id=<?= $d['id_absensikaryawan']; ?>" class="btn btn-danger text-white text-right"> <i class="fas fa-times-circle"></i></a>
                        </td>


                    </tr>
                <?php
            }
                ?>
                </tbody>
                </table>
        </div>
    </div>
</div>