    <div class="container">
        <div class="card shadow mb-4">
            <h5 class="card-header text-center">Data Aplikasi</h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Instansi</th>
                                <th>Nama Aplikasi</th>
                                <th>Logo</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>

                        <?php
                        $no = 1;
                        $data = mysqli_query($koneksi, "SELECT * FROM tb_aplikasi");
                        while ($d = mysqli_fetch_array($data)) {
                        ?>
                            <tbody>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $d['nama_instansi']; ?></td>
                                    <td><?= $d['nama_aplikasi']; ?></td>
                                    <td>
                                        <img src="../assets/img/app/<?= $d['foto'] ?>" class="img-thumbnail" style="width:50px;height:50px;">
                                    </td>
                                    <td>
                                        <a href="?page=aplikasi&act=edit&id_aplikasi=<?= $d['id_aplikasi']; ?>" class="btn btn-warning text-white text-right"> <i class="fa fa-user-edit text-white"></i> </a>
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
    </div>