<div class="container">
    <div class="card shadow mb-4">
        <h5 class="card-header text-center">Data Tunjangan Karyawan</h5>
        <div class="card-body">
            <a href="?page=tunjangankaryawan&act=add" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Tambah Tunjangan Karyawan</a></button>
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Karyawan</th>
                            <th>Nama Karyawan</th>
                            <th>Nama Tunjangan</th>
                            <th>Jumlah Tunjangan</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
            </div>

            <?php
            $no = 1;
            $data = mysqli_query($koneksi, "SELECT * FROM tb_karyawan
                INNER JOIN tb_tunjangankaryawan ON tb_karyawan.id_karyawan=tb_tunjangankaryawan.id_karyawan  
                INNER JOIN tb_tunjangan ON tb_tunjangankaryawan.id_tunjangan=tb_tunjangan.id_tunjangan ");
            while ($d = mysqli_fetch_array($data)) {
            ?>
                <tbody>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $d['kode_karyawan']; ?></td>
                        <td><?= $d['nama_karyawan']; ?></td>
                        <td><?= $d['nama_tunjangan']; ?></td>
                        <td><?= rupiah($d['jumlah_tunjangan']); ?></td>
                        <td>
                            <a href="?page=tunjangankaryawan&act=edit&id=<?= $d['id_tunjangankaryawan']; ?>" class="btn btn-warning text-white text-right"> <i class="fa fa-user-edit text-white"></i> </a>
                            <a href="?page=tunjangankaryawan&act=del&id=<?= $d['id_tunjangankaryawan']; ?>" class="btn btn-danger text-white text-right"> <i class="fas fa-trash-alt fa-1x text-white"></i> </a>
                        </td>
                    </tr>
                <?php
            }
                ?>
                </tr>
        </div>
        </tbody>
        </table>
    </div>
</div>