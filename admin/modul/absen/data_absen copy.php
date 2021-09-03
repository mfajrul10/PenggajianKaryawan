<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="text-center h3 m-0 font-weight-bold text-primary">Data Absensi</div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <a href="modul/absen/cetak.php?karyawan=<?= $_GET['karyawan']; ?>" target="_blank" class="btn btn-success text-white text-right"><i class="fa fa-print text-white"></i> Print</a>
                <div class="text-center">
                    <table class="table table-bordered" id="dataTable" width="100%">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Kode Karyawan</th>
                                <th>Nama Karyawan</th>
                                <th>Jam Masuk</th>
                                <th>Jam Keluar</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                </div>
                <tbody>
                    <?php
                    $sql = "SELECT *, tb_karyawan.id_karyawan AS empid, tb_absensi.id_absensi AS attid FROM tb_absensi LEFT JOIN tb_karyawan ON tb_karyawan.id_karyawan=tb_absensi.id_karyawan ORDER BY tb_absensi.tgl_absensi DESC, tb_absensi.jam_masuk DESC";
                    $query = $koneksi->query($sql);
                    while ($row = $query->fetch_assoc()) {
                        $status = ($row['status']) ?
                            '<span class="badge badge-success">Ontime</span>'
                            :
                            '<span class="badge badge-danger">Terlambat</span>';
                    ?>
                        <tr>
                            <td><?= date('M d, Y', strtotime($row['tgl_absensi'])) ?></td>
                            <td><?= $row['kode_karyawan'] ?></td>
                            <td><?= $row['nama_karyawan'] ?></td>
                            <td><?= date('h:i A', strtotime($row['jam_masuk'])) ?></td>
                            <td><?= date('h:i A', strtotime($row['jam_keluar'])) ?></td>
                            <td></td>
                        </tr>
                    <?php
                    }
                    ?>


                </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

</body>

</html>