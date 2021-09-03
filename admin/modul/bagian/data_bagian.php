<div class="container">
    <div class="card shadow mb-4">
        <h5 class="card-header text-center">Data Bagian</h5>
        <div class="card-body">
            <a href="?page=bagian&act=add" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Tambah Bagian</a></button>
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Bagian</th>
                            <th>Gaji Pokok</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
            </div>
            <?php
            $no = 1;
            $data = mysqli_query($koneksi, "SELECT * FROM tb_bagian");
            while ($d = mysqli_fetch_array($data)) {
            ?>
                <tbody>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $d['nama_bagian']; ?></td>
                        <td><?= rupiah($d['gapok']); ?></td>
                        <td>
                            <a href="?page=bagian&act=detail&id_bagian=<?= $d['id_bagian']; ?>" class="btn btn-primary text-white text-right"> <i class="fa fa-user text-white"></i></a>
                            <a href="?page=bagian&act=edit&id_bagian=<?= $d['id_bagian']; ?>" class="btn btn-warning text-white text-right"> <i class="fa fa-user-edit text-white"></i></a>
                            <a href="?page=bagian&act=del&id_bagian=<?= $d['id_bagian']; ?>" class="btn btn-danger text-white text-right"> <i class="fas fa-trash-alt fa-1x text-white"></i></a>
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