<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="text-center h3 m-0 font-weight-bold text-primary">Data Penggajian</div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Gaji Bersih</th>
                            <th>Cetak</th>
                        </tr>
                    </thead>
                    <?php
                    $no = 1;
                    $data = mysqli_query($koneksi, "SELECT * FROM tb_gaji WHERE id_karyawan = '$sesi'");
                    while ($d = mysqli_fetch_array($data)) {
                    ?>
                        <tbody>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= strftime('%A, %d %B %Y', strtotime(($d['tgl_gaji']))); ?></td>
                                <td>
                                    <?php
                                    $gaber = $d['gapok'] + $d['tunjangan'] + $d['bonus'] -
                                        $d['potongan'];
                                    echo rupiah($gaber);
                                    ?>
                                </td>
                                <td>
                                    <a href="modul/gaji/cetak_gaji.php?gaji=<?= $_GET['gaji']; ?>&id=<?= $d['id_gaji'] ?>" target="_blank" class="btn btn-success text-white text-right"><i class="fa fa-print text-white"></i> </a>
                                </td>
                            <?php
                        }
                            ?>
                            </tr>
                        </tbody>
                </table>
                </tr>
            </div>
        </div>
    </div>