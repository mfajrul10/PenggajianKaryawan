<div class="container">
    <div class="card shadow mb-4">
        <h5 class="card-header text-center">Data Karyawan</h5>
        <div class="card-body">
            <a href="?page=karyawan&act=add" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Tambah Karyawan</a></button>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Karyawan</th>
                            <th>Nama Karyawan</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $sql = mysqli_query($koneksi, "SELECT * FROM tb_karyawan");
                        foreach ($sql as $d) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $d['kode_karyawan']; ?></td>
                                <td><?= $d['nama_karyawan']; ?></td>
                                <td>
                                    <a href="?page=karyawan&act=detail&id=<?= $d['id_karyawan']; ?>" class="btn btn-primary text-white text-right"> <i class="fa fa-user text-white"></i></a>

                                    <a href="?page=karyawan&act=edit&id_karyawan=<?= $d['id_karyawan']; ?>" class="btn btn-warning text-white text-right"> <i class="fa fa-user-edit text-white"></i> </a>

                                    <a href="?page=karyawan&act=del&id_karyawan=<?= $d['id_karyawan']; ?>" class="btn btn-danger text-white text-right"> <i class="fas fa-trash-alt fa-1x text-white"></i> </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<!-- Modal Hapus-->
<div class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="hapusModalLabel">Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah data akan dihapus ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <a href="?page=karyawan&act=del&id=<?= $d['id_karyawan'] ?>" class="btn btn-primary">Hapus</a>
            </div>
        </div>
    </div>
</div>