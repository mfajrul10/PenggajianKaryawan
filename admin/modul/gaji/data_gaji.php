<body>
    <div class="container">
        <div class="card shadow mb-4">
            <h5 class="card-header text-center">Data Gaji Karyawan</h5>
            <div class="card-body">
                <a href="?page=gaji&act=add" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Tambah Gaji</a></button>
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Karyawan</th>
                                <th>Nama Karyawan</th>
                                <th>Gaji Bersih</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <?php
                        $no = 1;
                        $data = mysqli_query($koneksi, "SELECT * FROM tb_gaji INNER JOIN tb_karyawan ON tb_gaji.id_karyawan = tb_karyawan.id_karyawan");
                        while ($d = mysqli_fetch_array($data)) {
                        ?>
                            <tbody>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $d['kode_karyawan'] ?></td>
                                    <td><?= $d['nama_karyawan'] ?></td>
                                    <td>
                                        <?php
                                        $gaber = $d['gapok'] + $d['tunjangan'] + $d['bonus'] -
                                            $d['potongan'];
                                        echo rupiah($gaber);
                                        ?>
                                    </td>
                                    <td>
                                        <a href="?page=gaji&act=edit&id_gaji=<?= $d['id_gaji']; ?>" class="btn btn-warning text-white text-right"> <i class="fa fa-user-edit text-white"></i> </a>
                                        <a href="?page=gaji&act=del&id_gaji=<?= $d['id_gaji']; ?>" class="btn btn-danger text-white text-right"> <i class="fas fa-trash-alt fa-1x text-white"></i></a>
                                        <a href="modul/laporan/cetak_perkaryawan.php?gaji=<?= $_GET['gaji']; ?>&id=<?= $d['id_gaji'] ?>" target="_blank" class="btn btn-success text-white text-right"><i class="fa fa-print text-white"></i> </a>
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