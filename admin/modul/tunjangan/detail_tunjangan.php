<?php
$id = $_GET['id_tunjangan'];
$data = mysqli_query($koneksi, "SELECT * FROM tb_tunjangan WHERE id_tunjangan='$id'");
while ($d = mysqli_fetch_array($data)) {
?>

    <body>
        <div class="container">
            <div class="card shadow mb-4">
                <div class="text-center">
                    <div class="card-header py-3">
                        <h3 class="m-0 font-weight-bold text-primary">Tunjangan <?php echo $d['nama_tunjangan'];  ?></h6>
                    </div>
                    <div class="card-body">
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th width="10%">No</th>
                                        <th width="30%">Kode Karyawan</th>
                                        <th width="50%">Nama Karyawan</th>
                                    </tr>
                                </thead>
                        </div>

                        <?php
                        $no = 1;
                        $data = mysqli_query($koneksi, "SELECT * FROM tb_karyawan WHERE id_tunjangan='$id'");
                        while ($d = mysqli_fetch_array($data)) {
                        ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $d['kode_karyawan']; ?></td>
                                    <td><?php echo $d['nama_karyawan']; ?></td>
                                </tr>
                        <?php
                        }
                    }
                        ?>
                        </tr>
                    </div>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>


    </body>

    </html>