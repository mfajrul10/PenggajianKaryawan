<body>
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="text-center h3 m-0 font-weight-bold text-primary">Data Potongan Karyawan</div>
            </div>
            <div class="card-body">

                <a href="?page=pinjaman&act=add" class="btn btn-success text-white text-right"> <i class="fas fa-folder-plus text-white"></i> Tambah Data</a>

                <div class="text-center">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Karyawan</th>
                                    <th>Nama Karyawan</th>
                                    <th>Jumlah Potongan</th>
                                    <th colspan=" 3" scope="col">Opsi</th>
                                </tr>
                            </thead>
                            <?php
                            $no = 1;
                            $data = mysqli_query($koneksi, "SELECT * FROM tb_pinjaman INNER JOIN tb_karyawan ON tb_pinjaman.id_karyawan = tb_karyawan.id_karyawan");
                            while ($d = mysqli_fetch_array($data)) {
                            ?>
                                <tbody>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $d['kode_karyawan'] ?></td>
                                        <td><?= $d['nama_karyawan'] ?></td>
                                        <td><?= rupiah($d['jumlah_pinjaman']) ?></td>
                                        <td>
                                            <a href="?page=gaji&act=detail&id_itemgaji=<?= $d['id_itemgaji']; ?>" class="btn btn-warning text-white text-right"> <i class="fa fa-user-edit text-white"></i> Detail</a>
                                            <a href="index.php?page=hgaji&id_gaji=<?= $d['id_gaji']; ?>" class="btn btn-danger text-white text-right"> <i class="fas fa-trash-alt fa-1x text-white"></i> Hapus</a>
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
        </div>
    </div>
</body>


<!-- Button trigger modal -->